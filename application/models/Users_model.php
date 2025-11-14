<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	public static $pk = 'id';
	public static $table = 'app_users';
	public function __construct()
	{
		
	}
	public function logged_in($identity)
	{
		return $this->db->where('username', $identity)->or_where('email', $identity)->limit(1)->get(self::$table);
	}
	public function last_logged_in($id)
	{
		$this->db->delete('app_sessions', array('id' => $this->db->get('app_users')->row()->sessionid)); 
		$fields = ['last_logged_in' => date('Y-m-d H:i:s'), 'ip_address' => get_ip_address(), 'sessionid' => session_id(), 'has_login' => 'true'];
		$user   = array('identity' => session('user_name'));
		$this->db->where('id', session_id())->update('app_sessions', $user);
		return $this->db->where(self::$pk, $id)->update(self::$table, $fields);
	}
	public function reset_logged_in($id)
	{
		$this->db->where(self::$pk, $id)->update(self::$table, ['has_login' => 'false']);
		$data = array('ip_address' => NULL, 'sessionid' => NULL);
		$this->db->where('id', $id);
		$this->db->update('app_users', $data);
	}
	public function get_attempts($ip_address)
	{
		$query = $this->db->where('ip_address', $ip_address)->get('app_login_attempts');
		if ($query->num_rows() === 1)
		{
			return $query->row();
		}
		return NULL;
	}
	public function increase_login_attempts($ip_address)
	{
		$identity = session('app_token');
		$query = $this->db->where('ip_address', $ip_address)->or_where('identity', $identity)->get('app_login_attempts');
		if ($query->num_rows() === 1)
		{
			$result = $query->row();
			$this->db->where('ip_address', $ip_address)->or_where('identity', $identity)->update('app_login_attempts', ['counter' => ($result->counter + 1)]);
		}
		else
		{
			$this->db->insert('app_login_attempts', ['created_at' => date('Y-m-d H:i:s'),'ip_address' => $ip_address,'counter' => 1, 'identity' => $identity]);
		}
	}
	public function reset_attempts($identity, $ip_address)
	{
		$this->db->where('identity', $identity)->where('ip_address', $ip_address)->delete('app_login_attempts');
	}
	public function get_last_login()
	{
		return $this->db->select("CASE WHEN x1.user_type = 'administrator' THEN x1.user_full_name WHEN x1.user_type = 'student' THEN x2.full_name WHEN x1.user_type = 'employee' THEN x3.full_name END AS full_name, x1.last_logged_in")
			->join('students x2', 'x1.user_profile_id = x2.id', 'LEFT')
			->join('employees x3', 'x1.user_profile_id = x3.id', 'LEFT')
			->where('x1.user_type !=', 'super_user')
			->where('x1.last_logged_in IS NOT NULL')
			->order_by('x1.last_logged_in', 'DESC')
			->limit(10)
			->get(self::$table.' x1');
	}
	public function get_jumlah_anggota()
	{
		return $this->db->from('app_nasabah')->count_all_results();
	}

	public function reset_user_email($user_email)
	{
		$user_id = session('user_id');
		$count = $this->db->where('user_email', $user_email)->where('id <> ', $user_id)->count_all_results(self::$table);
		if ( $count == 0 ) {
			return $this->db->where('id', $user_id)->update(self::$table, ['user_email' => $user_email]);
		}
		return false;
	}

	public function set_forgot_password_key($email, $user_forgot_password_key, $kode_token)
	{
		$dataset = ['user_forgot_password_key' => $user_forgot_password_key, 'user_forgot_password_request_date' => date('Y-m-d H:i:s')];
		$data    = ['kode_token' => $kode_token];
		$this->db->where('email', $email)->update('app_anggota', $data);
		return $this->db->where('email', $email)->update(self::$table, $dataset);
	}

	public function remove_forgot_password_key($id)
	{
		return $this->db->where(self::$pk, $id)->update(self::$table, ['user_forgot_password_key' => NULL, 'user_forgot_password_request_date' => NULL]);
	}

	public function reset_password( $id )
	{
		return $this->db->where(self::$pk, $id)->update(self::$table, ['user_forgot_password_key' => NULL, 'user_forgot_password_request_date' => NULL, 'password' => password_hash($this->input->post('password', true), PASSWORD_BCRYPT)]);
	}

	public function get_user_by_email($email)
	{
		$query = $this->db->where('email', $email)->get(self::$table);
		if ($query->num_rows() === 1)
		{
			$result = $query->row();
			$a	= $this->db->where('id', $result->member_id)->get('app_anggota')->row();
			if($result->member_id == '0')
			{
				return ['userid' => $result->id, 'email' => $result->email, 'nama' => 'Achmad Solachudin'];
			}
			else
			{
				return ['userid' => $result->id, 'email' => $result->email, 'nama' => $a->nama];
			}
		}
		return NULL;
	}

	public function get_data_anggota($user_id)
	{
		$this->db->select('*');
		$this->db->where('id', $user_id);
		$query = $this->db->get('app_anggota');
		if ($query->num_rows() == 1)
		{
			return $query->row();
		}
		return false;
	}

	public function get_data_anggota_online($user_id)
	{
		return $this->db->select('has_login')->where('member_id', $user_id)->get('app_users')->row();
	}

	public function email_exists( $user_email, $id = 0 )
	{
		$this->db->where('user_email', $user_email);
		if ( _isNaturalNumber($id) ) $this->db->where('id <>', _toInteger($id));
		$this->db->where('is_deleted', 'false');
		$count = $this->db->count_all_results(self::$table);
		return $count > 0;
	}

	public function is_exists($key, $value, $table)
	{
		$count = $this->db->where($key, $value)->count_all_results($table);
		return $count > 0;
	}


	public function get_user_privileges($group_id)
	{
		return $this->db->select('*')->join('app_menus x2', 'ON x1.module_id = x2.id', 'LEFT')->where('x1.level_id', $group_id)->get('app_users_privileges x1');
	}

	public function getUsers($searchTerm="")
	{

		$this->db->select('*');
		$this->db->where("nama like '%".$searchTerm."%' ");
		$fetched_records = $this->db->get('app_nasabah');
		$users = $fetched_records->result_array();

		$data = array();
		foreach($users as $user)
		{
			$data[] = array("id"=>$user['id'], "nama"=>$user['nama']);
		}
		return $data;
	}

	public function cek_reset_pass($identity)
	{
		$query = $this->db->where('user_forgot_password_key', NULL)->group_start()->where('username', $identity)->or_where('email', $identity)->group_end()->get('app_users');
		if ($query->num_rows() === 1)
		{
			return TRUE;
		}
		return FALSE;
	}

	public function cek_aktif($identity)
	{
		$query = $this->db->where('status', 'sudah')->group_start()->where('username', $identity)->or_where('email', $identity)->group_end()->get('app_users');
		if ($query->num_rows() === 1)
		{
			return TRUE;
		}
		return FALSE;
	}
	public function kodeanggota($table)
	{
		$this->db->select('RIGHT('.$table.'.kode_anggota,6) as kode', FALSE);
		$this->db->order_by('kode_anggota','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get($table);
		if($query->num_rows() <> 0)
		{      
			$data = $query->row();
			$kode = intval($data->kode) + 1; 
		}
		else
		{      
			$kode = 1;  
		}
		$batas = str_pad($kode, 6, "0", STR_PAD_LEFT);    
		$kodetampil = $batas;
		return $kodetampil;  
	}

	public function anggota_baru()
	{
		return $this->db->where('status', 'baru')->get('app_anggota');
	}
}
