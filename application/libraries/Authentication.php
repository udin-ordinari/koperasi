<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication {

	protected $CI;
	public function __construct()
	{

	}

	public function get_user_id()
	{
		$id = (int) session('user_id');
		return !empty($id) ? $id : NULL;
	}
	public function level()
	{
		return (int) session('group_id');
	}
	public function last_logged_in($id)
	{
		get_instance()->users_model->last_logged_in($id);
	}
	public function hasLogin()
	{
		return (bool) session('has_login');
	}
	public function restrict()
	{
		if ( ! $this->hasLogin())
		{
			redirect('login', 'refresh');
		}
	}
	public function ip_banned($identity, $ip_address)
	{
		$max_attempts = 6;
		$banned_time  = 300;
		$query        = get_instance()->users_model->get_attempts($identity, $ip_address);
		if (is_object($query) && $query->counter >= $max_attempts)
		{
			$datetime  = strtotime($query->updated_at);
			$time_diff = time() - $datetime;
			if ($time_diff >= $banned_time)
			{
				$this->reset_attempts($identity, $ip_address);
				return FALSE;
			}
			return TRUE;
		}
		return FALSE;
	}

	public function increase_login_attempts($identity, $ip_address)
	{
		get_instance()->users_model->increase_login_attempts($identity, $ip_address);
	}

	public function reset_attempts($identity, $ip_address)
	{
		get_instance()->users_model->reset_attempts($identity, $ip_address);
	}

	public function cek_reset_proses($identity)
	{
		return get_instance()->users_model->cek_reset_pass($identity);

	}
	public function cek_aktifasi($identity)
	{
		return get_instance()->users_model->cek_aktif($identity);
	}

	public function cek_registered($data)
	{
		$query = get_instance()->db->where('nama', $data['nama'])->or_where('ktp', $data['ktp'])->or_where('phone', $data['phone'])->or_where('email', $data['email'])->get('app_anggota');
		if ($query)
		{
			$res = $query->row();
			return $res;
		}
		else
		{
			return FALSE;
		}
	}

	public function register_process($dataset)
	{
		$daftar = get_instance()->model->insert('app_anggota', $dataset);
		$str = get_instance()->db->insert_id();
		$password = password_hash($dataset['nik'], PASSWORD_BCRYPT);
		$data = array('member_id' => $str, 'user_type' => '4', 'username' => $dataset['ktp'], 'email' => $dataset['email'], 'password' => $password, 'created_at' => date('Y-m-d H:i:s'), 'ip_address' => get_ip_address());
		$res = get_instance()->model->insert('app_users', $data);
		if($res == true)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

}
