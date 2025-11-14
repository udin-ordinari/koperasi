<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Superuser extends App_Controller {

	public function __construct()
	{
		parent::__construct();
		if(session('level') != '1') 
		{
			redirect('dashboard');
		}
		$this->load->library('mobiledetect');
		$this->load->model('app_menu_model');
		$this->vars['page'] 	= 'Pengaturan';
		$this->pk 		= app_menu_model::$pk;
		$this->table 		= app_menu_model::$table;
	}
	public function index()
	{
		redirect('superuser/dashboard');
	}
	public function dashboard()
	{
		$this->vars['page_title']	= 'Superuser';
		$this->vars['content']		= 'superuser/dashboard';
		$this->load->view('templates/index', $this->vars);
	}
	public function get_pengunjung()
	{
		$draw = intval($this->input->get('draw'));
		$start = intval($this->input->get('start'));
		$length = intval($this->input->get('length'));
		$hasil = $this->db->order_by('timestamp', 'desc')->get('app_sessions');
		$data = [];
		$no = 1;
		foreach($hasil->result() as $row)
		{
			if($this->mobiledetect->isMobile($row->user_agent))		
			{ 
				if($this->mobiledetect->isTablet($row->user_agent))
                		{ 
                    			$alat = 'Tablet Device Detected!'; 
                		}
                		else
                		{ 
                    			$alat = 'Mobile Device Detected!'; 
            			} 
     
            			if($this->mobiledetect->isiOS($row->user_agent))
            			{ 
                			$alat = 'IOS'; 
            			}
            			elseif($this->mobiledetect->isAndroidOS($row->user_agent))
            			{ 
                			$alat = 'Hp Android'; 
            			} 
			}
			else
			{ 
                		$alat = 'Laptop / PC Detected!'; 
			}
			$data[] = array(
					$no++.'.',
					$row->ip_address,
					waktu_lalu(date('d-m-Y H:i:s', $row->timestamp)),
					$alat,
					dapatkan_jejak($row->ip_address),			
			);
		}
		$result = array(
				"draw" => $draw,
				"recordsTotal" => $hasil->num_rows(),
				"recordsFiltered "=> $hasil->num_rows(),
				"data" => $data
		);
		$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($result, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
		exit;
	}
	public function hapus_session()
	{
		$this->db->query('SET FOREIGN_KEY_CHECKS = 0;');
		$tables = $this->db->list_tables();
		foreach ($tables as $table)
		{
    			if ($table === 'app_sessions')
    			{
        			$this->db->truncate($table);
    			}
		}
		$this->db->query('SET FOREIGN_KEY_CHECKS = 1;');

		$this->vars['status'] = 'green';
		$this->vars['title']  = 'Berhasil !';
		$this->vars['message'] = 'Anda Akan Dialihkan Untuk Login Kembali.';
		$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
		exit;
	}

	public function users()
	{
		$this->vars['title'] 	= 'Daftar Pengguna';
		$this->vars['content']  = 'superuser/users';
		$this->load->view('templates/index', $this->vars);	    
	}
	public function tambah_pengguna()
	{
		$this->vars['title']	= 'Tambah Pengguna';
		$this->vars['content']	= 'superuser/add-users';
		$this->load->view('templates/index', $this->vars);
	}
	public function add_users()
	{
		if($this->input->is_ajax_request())
		{
			if($this->cek_validasi())
			{
				$id 		= _toInteger($this->input->post('userid', true));
				$username	= $this->input->post('username', TRUE);
				$password	= $this->input->post('password', TRUE);
				$level		= $this->input->post('level', TRUE);
				$token		= $this->input->post('app_token', TRUE);

				if($token = session('app_token'))
				{
					$dataset = array(
							'username'	=> $username,
							'password'	=> password_hash($password, PASSWORD_BCRYPT),
							'member_id'	=> $id,
							'user_type'	=> $level,
							'aktifasi'	=> 'sudah',
							'status'	=> 'diterima',
							'created_at' 	=> date('Y-m-d H:i:s'),
							'created_by' 	=> session('user_id')
					);
					$proses  = $this->model->insert('app_users', $dataset) ? 'success' : 'error';					
					$this->vars['status']  = $proses;
					$this->vars['title']   = $proses == 'success' ? 'Berhasil !' : 'Waduh !';
					$this->vars['message'] = $proses == 'success' ? 'Data berhasil masuk ke database !' : 'Data Gagal Di Masukkan !';
				}
			}
			else
			{
				$this->vars['status'] 	= 'warning';
				$this->vars['title'] 	= 'Perhatian !';
				$this->vars['message'] 	= validation_errors();
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
			exit;
		}
	}
	private function cek_validasi()
	{
		$val = $this->form_validation;
		$val->set_rules('userid', 'Anggota', 'trim|required|is_unique[app_users.member_id]');
		$val->set_rules('username', 'Username', 'trim|required|is_unique[app_users.username]');
		$val->set_rules('password', 'Password', 'trim|required');
		$val->set_rules('level', 'Level Pengguna', 'trim|required');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		$val->set_message('required', '{field} mohon diisi');
		return $val->run();
	}
	public function get_members()
	{
		$draw 		= intval($this->input->get('draw'));
		$start 		= intval($this->input->get('start'));
		$length 	= intval($this->input->get('length'));
		$hasil 		= $this->db->where('member_id >', '0')->get('app_users');

		$data 		= [];
		$no 		= 1;
		foreach($hasil->result() as $row)
		{
			if($row->has_login == 'true')
            		{
                		$aktif = '<span class="badge bg-success px-3">Online</span>';
            		}
            		else
            		{
                		$aktif = '<span class="badge bg-danger px-3">Offline</span>'; 
            		}
			if($row->member_id == '0')
			{
				$nama = 'Achmad Solachudin';
			}
			else
			{
				$nama = get_anggota($row->member_id)->nama;
			}
			$data[] = array(
					$no++.'.',
					$nama,
					$row->username,
					get_level($row->user_type)->nama,
					'<div class="text-center">'.$aktif.'</div>',
					'<div class="text-center">'.$row->last_logged_in.'</div>',
					'<div class="text-center"><a href="javascript:void(0);" class="btn bg-info radius-30 btn-xs text-white" data-bs-toggle="modal" data-bs-target="#EditModal" data-href="'.base_url('superuser/edit_member/'.$row->id).'" title="Edit" data-name="Edit Data ?"><i class="bx bx-pencil fs-6"></i></a>
					&nbsp;<a href="javascript:void(0);" class="btn btn-danger radius-30 btn-xs" data-bs-toggle="modal" data-bs-target="#HapusModal" data-href="'.base_url('superuser/hapus_member/'.$row->id).'" title="Hapus" data-name="Hapus Data ?"><i class="bx bx-trash fs-6"></i></a></div>'
			);
            
		}
		$result = array(
				"draw" => $draw,
				"recordsTotal" => $hasil->num_rows(),
				"recordsFiltered "=> $hasil->num_rows(),
				"data" => $data
		);
		$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($result, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
		exit;
	}
	public function edit_member($id)
	{
		$this->vars['hasil'] 	   	= $this->db->where('id', $id)->get('app_users')->result();
		$this->vars['title'] 	   	= 'Pengguna Aplikasi';
		$this->load->view('superuser/edit-users', $this->vars);
	}
	public function proses_update_user()
	{
		if($this->input->is_ajax_request())
		{
			$id 		= _toInteger($this->input->post('id', true));
			$username	= $this->input->post('username', TRUE);
			$password	= $this->input->post('password', TRUE);
			$level		= $this->input->post('level', TRUE);
			$token		= $this->input->post('app_token', TRUE);

			if($token = session('app_token'))
			{
				$dataset = array(
							'username'	=> $username,
							'password'	=> password_hash($password, PASSWORD_BCRYPT),
							'user_type'	=> $level,
							'updated_at' 	=> date('Y-m-d H:i:s'),
							'updated_by' 	=> session('user_id')
				);
				$proses  = $this->model->update($id, 'app_users', $dataset) ? 'success' : 'error';					
				$this->vars['status']  = $proses;
				$this->vars['title']   = $proses == 'success' ? 'Berhasil !' : 'Waduh !';
				$this->vars['message'] = $proses == 'success' ? 'Data berhasil masuk ke database !' : 'Data Gagal Di Masukkan !';
			}

		}
		$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
		exit;
	}
	public function modules()
	{
		$this->vars['title'] 		= 'Module Menu';
		$this->vars['content'] 		= 'superuser/modules';
		$this->load->view('templates/index', $this->vars);
	}
	public function get_modules()
	{
		$draw = intval($this->input->get('draw'));
		$start = intval($this->input->get('start'));
		$length = intval($this->input->get('length'));
		$hasil = $this->menus_model->get_modules();
		$data = [];
		$no = 1;
		foreach($hasil->result() as $row)
		{
			$data[] = array(
					$no++.'.',
					$row->module_name,
					'<div class="text-center">
					<a href="javascript:void(0);" class="btn btn-success btn-sm" data-href="'.base_url('superuser/edit_modules/'.$row->id).'" data-name="Edit Module Menu" data-bs-toggle="modal" data-bs-target="#modalGede" title="Ubah ?"><i class="fa fa-pencil fa-fw"></i></a>
					<a href="javascript:void(0);" class="btn btn-danger btn-sm" data-href="'.base_url('superuser/hapus_modules/'.$row->id).'" data-name="Hapus Module Menu" data-bs-toggle="modal" data-bs-target="#modalSedeng" title="Hapus ?"><i class="fa fa-trash fa-fw"></i></a>
					</div>');
		}
		$result = array(
				"draw" => $draw,
				"recordsTotal" => $hasil->num_rows(),
				"recordsFiltered "=> $hasil->num_rows(),
				"data" => $data
		);
		$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($result, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
		exit;
	}
	public function add_modules()
	{
		$this->load->view('superuser/add-modules');
	}
	public function proses_add_modules()
	{
		if ($this->input->is_ajax_request())
		{
			if($this->cek_input())
			{
				$modules 	= $this->input->post('modul', TRUE);
				$token		= $this->input->post('app_token', TRUE);
				if($token = session('app_token'))
				{
					$dataset = array('module_name' => ucwords($modules), 'created_at' => date('Y-m-d H:i:s'),  'created_by' => session('user_id'));
					$proses  = $this->db->insert('app_modules', $dataset) ? 'success' : 'error';
					$this->vars['status'] 	= $proses;
					$this->vars['title']  	= $proses == 'success' ? 'Berhasil !' : 'Upss !';
					$this->vars['message'] 	= $proses == 'success' ? 'Data Berhasil Di Proses !' : 'Gagal Memproses Data !';
				}
			}
                	else
                	{
				$this->vars['status'] 	= 'warning';
				$this->vars['title'] 	= 'Perhatian !';
				$this->vars['message'] 	= validation_errors();
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, self::REQUIRED_FLAGS))->_display();
			exit;
		}
	}
	private function cek_input()
	{
		$val = $this->form_validation;
		$val->set_rules('modul', 'Menu Modul', 'trim|required');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		$val->set_message('required', '{field} mohon diisi');
		return $val->run();
	}
	public function edit_modules($id)
	{
		$this->vars['hasil'] = $this->db->where('id', $id)->limit('1')->get('app_modules')->row();
		$this->load->view('superuser/edit-modules', $this->vars);
	}
	public function proses_edit_modules()
	{
		if ($this->input->is_ajax_request())
		{
			$id 		= $this->input->post('id', TRUE);
			$modules 	= $this->input->post('modul', TRUE);
			$token		= $this->input->post('app_token', TRUE);
			if($token = session('app_token'))
			{
				$dataset = array('module_name' => ucwords($modules), 'updated_at' => date('Y-m-d H:i:s'),  'updated_by' => session('user_id'));
				$proses  = $this->db->where('id', $id)->update('app_modules', $dataset) ? 'success' : 'error';
				$this->vars['status'] 	= $proses;
				$this->vars['title']  	= $proses == 'success' ? 'Berhasil !' : 'Upss !';
				$this->vars['message'] 	= $proses == 'success' ? 'Data Berhasil Di Proses !' : 'Gagal Memproses Data !';
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, self::REQUIRED_FLAGS))->_display();
			exit;
		}
	}
	public function hapus_modules($id)
	{
		$this->load->view('master/setting/dilarang-hapus');
	}
	public function menus()
	{
		$this->vars['title'] 		= 'Menu';
		$this->vars['content'] 		= 'superuser/menus';
		$this->load->view('templates/index', $this->vars);
	}
	public function get_menus()
	{
		if ($this->input->is_ajax_request())
		{
			$query = $this->menus_model->get_menus();
			$this->vars['rows'] = $query->result();
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, self::REQUIRED_FLAGS))->_display();
			exit;
		}
	}
	public function nested_menus()
	{
		if ($this->input->is_ajax_request())
		{
			$this->vars['query'] = $this->menus_model->nested_menus();
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, self::REQUIRED_FLAGS))->_display();
			exit;
		}
	}
	public function save_menu_position()
	{
		if ($this->input->is_ajax_request())
		{
			if (NULL !== $this->input->post('menus'))
			{
				$menus = json_decode($this->input->post('menus'), true);
				$this->menus_model->save_menu_position(0, $menus);
			}
			$this->vars['status'] = 'success';
			$this->vars['message'] = 'Data Telah Disimpan.';
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, self::REQUIRED_FLAGS))->_display();
			exit;
		}
	}
	public function save_links()
	{
		if ($this->input->is_ajax_request())
		{
			$this->db->set('module_id', $this->input->post('module_id', true));
			$this->db->set('alamat_url', $this->input->post('alamat_url', true));
			$this->db->set('nama_menu', ucwords($this->input->post('nama_menu', true)));
			if(empty($this->input->post('ikon_menu')))
			{

				$this->db->set('icon', '');
			}
			else
			{
				$this->db->set('icon', $this->input->post('ikon_menu'));
			}
			$proses 		= $this->db->insert('app_menus') ? 'success' : 'error';
			$this->vars['status'] 	= $proses;
			$this->vars['title'] 	= $proses == 'success' ? 'Berhasil !' : 'Waduh !';
			$this->vars['message'] 	= $proses == 'success' ? 'Data Telah Diproses.' : 'Data Gagal Diproses';
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, self::REQUIRED_FLAGS))->_display();
			exit;
		}
	}
	public function save()
	{
		if ($this->input->is_ajax_request())
		{
			$id = _toInteger($this->input->post('id', true));
			if ($this->validation()) {
				$dataset = $this->dataset();
				$this->vars['status'] = $this->sistem->update($id, $this->table, $dataset) ? 'success' : 'error';
				$this->vars['message'] = $this->vars['status'] == 'success' ? 'updated' : 'not_updated';
			} else {
				$this->vars['status'] = 'error';
				$this->vars['message'] = validation_errors();
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, self::REQUIRED_FLAGS))->_display();
			exit;
		}
	}


	private function dataset()
	{
		$dataset = [];
		$dataset['nama_menu'] = ucwords($this->input->post('nama_menu', true));
		$dataset['alamat_url'] = $this->input->post('alamat_url', true);
		$dataset['module_id'] = $this->input->post('module_id', true);
		return $dataset;
	}

	private function validation()
	{
		$val = $this->form_validation;
		$val->set_rules('nama_menu', 'Judul Menu', 'trim|required');
		$val->set_rules('alamat_url', 'URL', 'trim|required');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		return $val->run();
	}
	public function save_modules() {
		if ($this->input->is_ajax_request()) {
			$modules = explode(',', $this->input->post('modules'));
			foreach($modules as $module) {
				$this->db->set('nama_menu', modules($module));
				$this->db->set('alamat_url', $module);
				$this->db->set('module_id', 'modules');
				$this->db->insert($this->table);
			}
			$this->vars['status'] = 'success';
			$this->vars['message'] = 'created';
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, self::REQUIRED_FLAGS))->_display();
			exit;
		}
	}
	public function menu_level()
	{
		$this->vars['title'] 		= 'Menu Hak Akses';
		$this->vars['content'] 		= 'superuser/menu-level';
		$this->load->view('templates/index', $this->vars);
	}
	public function get_menu_level()
	{
		$draw = intval($this->input->get('draw'));
		$start = intval($this->input->get('start'));
		$length = intval($this->input->get('length'));
		$hasil = $this->db->order_by('level_id', 'asc')->get('app_users_privileges');
		$data = [];
		$no = 1;
		foreach($hasil->result() as $row)
		{
			$data[] = array(
					$no++.'.',
					get_level($row->level_id)->nama,
					get_modul($row->module_id)->module_name,
					'<div class="text-center">
					<a href="javascript:void(0);" class="btn btn-success btn-sm" data-href="'.base_url('superuser/edit_menu_level/'.$row->id).'" data-name="Edit" data-bs-toggle="modal" data-bs-target="#modalGede" title="Ubah ?"><i class="fal fa-pencil fa-fw"></i></a>
					<a href="javascript:void(0);" class="btn btn-danger btn-sm" data-href="'.base_url('superuser/hapus_menu_level/'.$row->id).'" data-name="Hapus" data-bs-toggle="modal" data-bs-target="#modalSedeng" title="Hapus ?"><i class="fal fa-trash-can fa-fw"></i></a>
					</div>');
		}
		$result = array(
				"draw" => $draw,
				"recordsTotal" => $hasil->num_rows(),
				"recordsFiltered "=> $hasil->num_rows(),
				"data" => $data
		);
		$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($result, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
		exit;
	}
	public function edit_menu_level($id)
	{
		$this->vars['hasil'] 	   	= $this->db->where('id', $id)->get('app_users_privileges')->row();
		$this->load->view('superuser/edit-menu-level', $this->vars);
	}
	public function proses_edit_menu_level()
	{
		if ($this->input->is_ajax_request())
		{
			$id 		= $this->input->post('uid', TRUE);
			$level 		= $this->input->post('level', TRUE);
			$modules 	= $this->input->post('modul', TRUE);
			$token		= $this->input->post('app_token', TRUE);
			if($token = session('app_token'))
			{
				$dataset = array('level_id' => $level, 'module_id' => $modules, 'updated_at' => date('Y-m-d H:i:s'));
				$proses  = $this->db->where('id', $id)->update('app_users_privileges', $dataset) ? 'success' : 'error';
				$this->vars['status'] 	= $proses;
				$this->vars['title']  	= $proses == 'success' ? 'Berhasil !' : 'Upss !';
				$this->vars['message'] 	= $proses == 'success' ? 'Data Berhasil Di Proses !' : 'Gagal Memproses Data !';
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, self::REQUIRED_FLAGS))->_display();
			exit;
		}
	}
	public function hapus_menu_level($id)
	{
		$this->vars['hasil'] = $this->db->where('id', $id)->get('app_users_privileges')->row();
		$this->load->view('superuser/hapus-menu-level', $this->vars);
	}
	public function proses_hapus_menu_level()
	{
		if ($this->input->is_ajax_request())
		{
			$id 		= $this->input->post('id', TRUE);
			$token    	= $this->input->post('app_token', TRUE);	
			if($token = session('app_token'))
			{
				$hapus = $this->db->delete('app_users_privileges', array('id' => $id)) ? 'success':'error';

				$this->vars['status'] 	= $hapus;
				$this->vars['title']  	= $hapus == 'success' ? 'Berhasil !' : 'Upss !';
				$this->vars['message'] 	= $hapus == 'success' ? 'Data Sudah Di Hapus !' : 'Gagal Menghapus Data !';
				
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
			exit;
		}		
	}
	public function delete_permanently()
	{
		if ($this->input->is_ajax_request()) {
			$this->table = 'app_menus';
			$id = _toInteger($this->input->post('id', true));
			if (_isNaturalNumber( $id )) {
				$is_exists = $this->sistem->is_exists('parent_id', $id, $this->table);
				if ( ! $is_exists ) {
					$this->sistem->delete_permanently('id', $id, $this->table);
					$this->vars['status'] = $this->sistem->delete_permanently('id', $id, $this->table) ? 'success' : 'error';
					$this->vars['message'] = $this->vars['status'] == 'success' ? 'deleted' : 'not_deleted';
				} else {
					$this->vars['status'] = 'warning';
					$this->vars['message'] = '"Parent menu" tidak dapat dihapus. Silahkan hapus terlebih dahulu "child menu"!';
				}
			} else {
				$this->vars['status'] = 'error';
				$this->vars['message'] = 'Not initialize id OR id not a number';
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, self::REQUIRED_FLAGS))->_display();
			exit;
		}
	}
	public function delete()
	{
		if ($this->input->is_ajax_request())
		{
			$this->vars['status'] = 'warning';
			$this->vars['message'] = 'not_selected';
			$ids = explode(',', $this->input->post($this->pk));
			if (count($ids) > 0)
			{
				if($this->model->delete($ids, $this->table))
				{
					$this->vars = [
						'status' => 'success',
						'message' => 'deleted',
						'id' => $ids
					];
				}
				else
				{
					$this->vars = [
						'status' => 'error',
						'message' => 'not_deleted'
					];
				}
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, self::REQUIRED_FLAGS))->_display();
			exit;
		}
	}

	public function restore()
	{
		if ($this->input->is_ajax_request())
		{
			$this->vars['status'] = 'warning';
			$this->vars['message'] = 'not_selected';
			$ids = explode(',', $this->input->post($this->pk));
			if (count($ids) > 0)
			{
				if($this->model->restore($ids, $this->table))
				{
					$this->vars = [
						'status' => 'success',
						'message' => 'restored',
						'id' => $ids
					];
				}
				else
				{
					$this->vars = [
						'status' => 'error',
						'message' => 'not_restored'
					];
				}
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, self::REQUIRED_FLAGS))->_display();
			exit;
		}
	}

	public function find_id()
	{
		if ($this->input->is_ajax_request())
		{
			$id = $this->input->post('id', true);
			$query = _isNaturalNumber( $id ) ? $this->sistem->RowObject($this->pk, $id, $this->table) : [];
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($query, self::REQUIRED_FLAGS))->_display();
			exit;
		}
	}
	
	public function pengaturan_sys()
	{
		$this->vars['title'] 	= 'Sistem Aplikasi';
		$this->vars['content']  = 'superuser/pengaturan-sistem';
		$this->load->view('templates/index', $this->vars);	    
	}
	public function form_ubah_setting($id)
	{
		$this->vars['setingane'] = $this->db->where('nama !=', 'developer')->where('id', $id)->get('app_system');
		$this->load->view('superuser/form-ubah-pengaturan-sistem', $this->vars);
	}    
	public function ubah_settings()
	{
		$this->vars['status'] 	= 'success';
		$this->vars['title'] 	= 'Berhasil !';
		$this->vars['message'] 	= 'Data Berhasil Diperbarui';
		$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
		exit;
	}
	public function add_menu_level()
	{
		$this->load->view('superuser/add-menu-level');
	}

	public function proses_add_privileges()
	{
		if ($this->input->is_ajax_request())
		{
			$level		= $this->input->post('level', TRUE);
			$modul		= $this->input->post('modul', TRUE);
			$token		= $this->input->post('app_token', TRUE);

			if($token = session('app_token'))
			{
				$dataset = array('level_id' => $level, 'module_id' => $modul, 'created_at' => date('Y-m-d H:i:s'));
				$proses  = $this->db->insert('app_users_privileges', $dataset) ? 'success' : 'error';					
				$this->vars['status']  = $proses;
				$this->vars['title']   = $proses == 'success' ? 'Berhasil !' : 'Waduh !';
				$this->vars['message'] = $proses == 'success' ? 'Data berhasil masuk ke database !' : 'Data Gagal Di Masukkan !';

			}
			else
			{
				$this->vars['status'] 	= 'warning';
				$this->vars['title'] 	= 'Perhatian !';
				$this->vars['message'] 	= validation_errors();
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
			exit;
		}
	}
	public function pengaturan_database()
	{
		$this->vars['title'] 	= 'Database';
		$this->vars['content']  = 'superuser/pengaturan-database';
		$this->load->view('templates/index', $this->vars);	    
	}

}
