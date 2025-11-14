<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends App_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->vars['jk_dropdown'] = enum_select('app_anggota', 'jk'); 
	}
	public function index()
	{
		echo show_404();
	}
	public function user_edit()
	{
		$this->vars['user'] = get_anggota(session('member_id'));
		$this->load->view('users/form-profile', $this->vars);
	}
	public function update_user()
	{
		if ($this->input->is_ajax_request())
		{	
			if ($this->updateform())
			{
				$id		= session('member_id');
				$nik 		= $this->input->post('nik', TRUE);
				$nama  		= $this->input->post('nama', TRUE);
				$tempat		= $this->input->post('tempat', TRUE);
				$tgl  		= $this->input->post('tgl', TRUE);
				$jk  		= $this->input->post('jk', TRUE);
				$cabang		= $this->input->post('cabang', TRUE);
				$telp		= $this->input->post('telp', TRUE);
				$token 		= $this->input->post('app_token', TRUE);

				$dataset = array('nik' => $nik, 'nama' => strtoupper($nama), 'tempat_lahir' => ucwords($tempat), 'tanggal_lahir' => $tgl, 'jk' => $jk, 'cabang' => $cabang, 'phone' => $telp);

				if($token = session('app_token'))
				{
					$proses 		= $this->model->update($id, 'app_nasabah', $dataset) ? 'success':'error';
					$this->vars['status'] 	= $proses;
					$this->vars['title']  	= $proses == 'success' ? 'Berhasil !' : 'Upss !';
					$this->vars['message'] 	= $proses == 'success' ? 'Data Sudah Di Perbarui !' : 'Gagal Memperbarui Data !';
				}
			}
			else
			{
				$this->vars['status'] 	= 'warning';
				$this->vars['title'] 	= 'Ooops !';
				$this->vars['message'] 	= validation_errors();
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
			exit;
		}
	}

	private function updateform()
	{
		$val = $this->form_validation;
		$val->set_rules('nik', 'No NIK', 'trim|required|numeric|min_length[9]|max_length[9]');
		$val->set_rules('nama', 'Nama', 'trim|required');
		$val->set_rules('tempat', 'Tempat Lahir', 'trim|required');
		$val->set_rules('tgl', 'Tanggal Lahir', 'trim|required');
		$val->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$val->set_rules('cabang', 'Cabang', 'trim|required');
		$val->set_rules('telp', 'Telp / Whatsapp', 'trim|required|numeric|min_length[8]');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		$val->set_message('required', '{field} harus diisi');
		return $val->run();
	}
	public function edit_username()
	{
		$a = $this->db->where('id', session('user_id'))->get('app_users')->row();
		$this->vars['user'] = $a->username;
		$this->load->view('users/form-username', $this->vars);
	}

	public function update_username()
	{
		if ($this->input->post())
		{
			if ($this->usernamevalidation())
			{
				$username    = ['username' => $this->input->post('newusername', TRUE)];

				$token       = $this->input->post('app_token', TRUE);
				if($token = session('app_token'))
				{
					$anyari 		= $this->db->where('id', session('user_id'))->update('app_users', $username) ? 'success' : 'error';
					$this->vars['status'] 	= $anyari;
					$this->vars['title']  	= $anyari == 'success' ? 'Selamat !' : 'Waduh !';
					$this->vars['message'] 	= $anyari == 'success' ? 'Username Anda Sudah Diganti.' : 'Coba Ulangi Lagi !';
				}
			}
			else
			{
				$this->vars['status'] 	= 'info';
				$this->vars['title'] 	= 'Mohon Teliti !';
				$this->vars['message'] 	= validation_errors();
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
			exit;
		}
	}

	private function usernamevalidation()
	{
		$val = $this->form_validation;
		$val->set_rules('newusername', 'Username Baru', 'trim|required|is_unique[app_users.username]');
		$val->set_message('required', '{field} harus diisi');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		return $val->run();
	}

	public function edit_password()
	{
		$this->vars['user'] = $this->db->where('id', session('user_id'))->get('app_users')->row();
		$this->load->view('users/form-password', $this->vars);
	}

	public function update_password()
	{
		if ($this->input->post())
		{
			if ($this->passvalidation())
			{
				$enkripsipas = ['password' => password_hash($this->input->post('newpassword', true), PASSWORD_BCRYPT)];
				$token       = $this->input->post('app_token', TRUE);

				if($token = session('app_token'))
				{
					$anyari = $this->db->where('id', session('user_id'))->update('app_users', $enkripsipas) ? 'success' : 'error';
					$this->vars['status'] = $anyari;
					$this->vars['title']  = $anyari == 'success' ? 'Selamat !' : 'Waduh !';
					$this->vars['message'] = $anyari == 'success' ? 'Password Anda Sudah Diganti.' : 'Coba Ulangi Lagi !';
				}
			}
			else
			{
				$this->vars['status'] 	= 'warning';
				$this->vars['title'] 	= 'Mohon Teliti !';
				$this->vars['message'] 	= validation_errors();
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
			exit;
		}
	}

	private function passvalidation()
	{
		$val = $this->form_validation;
		$val->set_rules('newpassword', 'Password Baru', 'trim|required');
		$val->set_rules('conpassword', 'Ulangi Password Baru', 'trim|required|matches[newpassword]');
		$val->set_message('required', '{field} harus diisi');
		$val->set_message('matches', 'Kata sandi tidak sama');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		return $val->run();
	}

	public function upload_photo()
	{
		$query = $this->model->RowObject('id', session('user_id'), 'app_nasabah');
		$file_name = $query->photo;
        	$config['upload_path']		= "./assets/img/avatars/";
        	$config['allowed_types']	= 'gif|jpg|png';
		$config['encrypt_name'] 	= TRUE;
        	$this->load->library('upload',$config);
        	if($this->upload->do_upload("file"))
		{
        		$data 	= array('upload_data' => $this->upload->data());
        		$gambar = array('photo' => $data['upload_data']['file_name']);  
        		$result	= $this->db->where('id', session('user_id'))->update('app_nasabah', $gambar);
        		$hasil	= $this->db->where('id', session('user_id'))->get('app_nasabah')->row();
        		if ($result == TRUE)
			{ 
				$this->vars['status'] 	= 'success';
				$this->vars['title'] 	= 'Selamat !';
				$this->vars['message'] 	= 'Berhasil Upload Foto !';
				@unlink(FCPATH.'./assets/img/avatars/'.$file_name);
        		}
			else
			{
				$this->vars['status'] 	= 'warning';
				$this->vars['title'] 	= 'Waduh !';
				$this->vars['message'] 	= 'Maaf ! Gagal Memperbarui Data !';
			}
        	}
		else
		{
				$this->vars['status'] 	= 'info';
				$this->vars['title'] 	= 'Uups !';
				$this->vars['message'] 	= $this->upload->display_errors();
		}
		$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
		exit;
	}

	public function proses_edit_anggota()
	{
		if ($this->input->is_ajax_request())
		{	
			if ($this->validationo())
			{
				$id 		= $this->input->post('uid', TRUE);
				$ktp 		= $this->input->post('ktp', TRUE);
				$nama 		= $this->input->post('nama', TRUE);
				$tempat		= $this->input->post('tempat_lahir', TRUE);
				$tanggal 	= $this->input->post('tanggal_lahir', TRUE);
				$jk	 	= $this->input->post('jk', TRUE);
				$cabang	 	= $this->input->post('cabang', TRUE);
				$telp	 	= $this->input->post('telp', TRUE);
				$email	 	= $this->input->post('email', TRUE);
				$alamat	 	= $this->input->post('alamat', TRUE);
				$token    	= $this->input->post('app_token', TRUE);	

				if($this->token->is_valid_token($token))
				{
					$query = $this->sistem->RowObject('id', $id, 'app_anggota');
					$file_name = $query->photo;
					$config['upload_path']          = './assets/img/users/';
					$config['allowed_types']        = 'jpeg|jpg|png';
					$config['max_size']             = '0';
					$config['remove_spaces'] 	= true;
					$config['encrypt_name'] 	= true;
					$this->load->library('upload', $config);

					if(empty($this->upload->do_upload('gambar')))
					{
						$gambar		= $file_name;
					}
					else
					{
						$upload_data 	= $this->upload->data();
						@chmod(FCPATH.'assets/img/users/'.$upload_data['file_name'], 0777);
						@chmod(FCPATH.'assets/img/users/'.$file_name, 0777);
						// unlink old file
						@unlink(FCPATH.'assets/img/users/'.$file_name);
						$this->image_resize(FCPATH.'assets/img/users/', $upload_data['file_name']);
						$gambar		= $upload_data['file_name'];

						$data = array(
							'ktp' 		=> $ktp,
							'nama' 		=> strtoupper($nama),
        						'tempat_lahir' 	=> ucwords($tempat),
        						'tanggal_lahir' => $tanggal,
        						'cabang' 	=> $cabang,
        						'phone' 	=> $telp,
        						'email'		=> $email,
        						'alamat'	=> ucwords($alamat),
        						'jk' 		=> $jk,
        						'photo' 	=> $gambar,
        						'updated_at' 	=> date('Y-m-d H:i:s'),
        						'updated_by' 	=> session('user_id'),
						);
						$masuk			= $this->sistem->update($id, 'app_anggota', $data);
						if($masuk)
						{
							$this->vars['status']   = 'green';
							$this->vars['title']    = 'Berhasil !';	
							$this->vars['message']  = 'Data Diperbarui !';
						}
						else
						{
							$this->vars['status']   = 'red';
							$this->vars['title']    = 'Oops !';	
							$this->vars['message']  = 'Ada Masalah Memasukkan Data Nih !';
						}
					}
				}
			}
			else
			{
				$this->vars['status'] 	= 'yellow';
				$this->vars['title']  	= 'Oops !';
				$this->vars['message'] 	= validation_errors();				
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
			exit;
		}
	}
	private function validationo()
	{
		$val = $this->form_validation;
		$val->set_rules('ktp', 'KTP', 'trim|required|min_length[9]|max_length[16]');
		$val->set_rules('nama', 'Nama Lengkap', 'trim|required');
		$val->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
		$val->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
		$val->set_rules('cabang', 'Cabang', 'trim|required');
		$val->set_rules('telp', 'Whatsapp/Telp', 'trim|required|numeric');
		$val->set_rules('alamat', 'Alamat Lengkap', 'trim|required');
		$val->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		$val->set_message('required', '{field} harus diisi');
		return $val->run();
	}
	private function image_resize($path, $file_name)
	{
		$this->load->library('image_lib');
		$config['image_library'] 	= 'gd2';
		$config['source_image'] 	= $path .'/'.$file_name;
		$config['maintain_ratio'] 	= true;
		$config['width'] 		= 800;
		$config['height'] 		= 500;
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		@chmod($path.'/'.$file_name, 0644);
		$this->image_lib->clear();
	} 
}
