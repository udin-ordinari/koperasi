<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('mobiledetect');
		$this->lang->load('autentikasi', 'indonesia');
		if ($this->authentication->hasLogin()) redirect('dashboard', 'refresh');
	}
	public function index()
	{
		$this->vars['title'] 	= 'Login';
		$this->vars['content'] 	= 'login/login';
		$this->load->view('login/index', $this->vars);
	}
	public function proses_login()
	{
		if ($this->input->is_ajax_request())
		{	
			if ($this->validation())
			{
				$identity = $this->input->post('identity', TRUE);
				$password = $this->input->post('password', TRUE);
				$token    = $this->input->post('app_token', TRUE);

				if($this->token->is_valid_token($token))
				{
					$login = $this->users_model->logged_in($identity);
					if($login->num_rows() == 1)
					{
						$data = $login->row();
						if($this->authentication->ip_banned($identity, get_ip_address()))
						{
							$this->vars['banned'] 	= TRUE;
							$this->vars['status'] 	= 'blue';
							$this->vars['title'] 	= 'Perhatian !';
							$this->vars['message'] 	= 'Anda Telah 5 Kali Salah Login.<br>Silahkan Tunggu Beberapa Menit Lagi Untuk Mencoba Kembali.';
						}
						elseif($data->aktifasi === 'belum')
						{
							$this->vars['email']	= $data->email;
							$this->vars['aktifasi']	= TRUE;
							$this->vars['status'] 	= 'blue';
							$this->vars['title'] 	= 'Maaf !';
							$this->vars['message'] 	= 'Anda Belum Menyelesaikan Aktifasi Pendaftaran.<br>Tunggu Sebentar...Anda Akan Dialihkan.';
						}
						elseif(!(empty($data->user_forgot_password_key)))
						{
							$this->vars['forgot'] 	= TRUE;
							$this->vars['status'] 	= 'blue';
							$this->vars['title'] 	= 'Maaf !';
							$this->vars['message'] 	= 'Anda Belum Melakukan Perubahan Password.<br>Cek Instruksi Yang Kami Kirimkan Ke Email Anda.';
						}
						elseif($data->status !== 'diterima')
						{
							$this->vars['tolak'] 	= $data->status;
							$this->vars['message'] 	= "Kami Sedang Memproses Pendaftaran Anda.";
						}
						elseif (password_verify($password, $data->password))
						{
							if($data->member_id == '0')
							{
								$member = '0';
							}
							else
							{
								$member = $data->member_id;
							}
							$session_data = [
									'user_id'   => $data->id,
									'member_id' => $member,
									'level'     => $data->group_id,
									'user_name' => $data->username,
									'has_login' => TRUE,
									'ip_address'=> get_ip_address(),
									'sessionid' => session_id()
							];
							if($this->mobiledetect->isMobile($this->agent->agent_string()))		
							{ 
								if($this->mobiledetect->isTablet($this->agent->agent_string()))
                						{ 
                    							$alat = 'Tablet Device Detected !'; 
                						}
                						else
                						{ 
                    							$alat = 'Mobile Device Detected !'; 
            							} 
     
            							if($this->mobiledetect->isiOS($this->agent->agent_string()))
            							{ 
                							$alat = 'IOS / Apple'; 
            							}
            							elseif($this->mobiledetect->isAndroidOS($this->agent->agent_string()))
            							{ 
                							$alat = 'Hp Android'; 
            							} 
							}
							else
							{ 
                						$alat = 'Laptop / PC Detected !'; 
							}
							if($data->member_id == '0')
							{
								$anggota = 'Achmad Solachudin';
							}
							else
							{
								$anggota = get_anggota($data->member_id)->nama;
							}
							if($data->email == NULL)
							{
								$this->vars['status'] 	= 'blue';
								$this->vars['title'] 	= 'Perhatian !';
								$this->vars['message'] 	= 'Alamat Email Belum Di Isi Di Profil Anda.';
							}
							else
							{
								$this->email->from('admin@legolas.my.id', get_setting('aplikasi').' '.get_setting('nama_aplikasi'));
								$this->email->to($data->email);
								$this->email->cc(['yahyahaetami@gmail.com', 'wahyubintariyanti@gmail.com']);
								$this->email->bcc(['admin@pdamkabdemak.com', 'info@pdamkabdemak.com']);
								$message = "Hai " . $anggota;
								$message .= "<br><br>";
								$message .= "Anda telah login pada waktu : ".date('Y-m-d H:i:s');
								$message .= "<br><br>";
								$message .= "Username : <a href='#'>".$data->username."</a>";
								$message .= "<br>";
								$message .= "IP Address : ".get_ip_address();
								$message .= "<br>";
								$message .= "Perangkat  : ".$alat;
								$message .= "<br>";
								$message .= "Perkiraan Asal : ".dapatkan_jejak(get_ip_address());
								$message .= "<br><br>";
								$message .= "Jika bukan anda segera lakukan perubahan password sesegera mungkin.";
								$message .= "<br><br>";
								$message .= "Terima Kasih.";
								$message .= "<br><br><br>";
								$message .= get_setting('aplikasi').' " '.get_setting('nama_aplikasi').' "';
								$content = $this->email->message($message);
								$subject = $this->email->subject('Notifikasi Login');

								$send_mail = $this->email->send();

								if ($send_mail)
								{
									$this->session->set_userdata($session_data);
									$this->authentication->last_logged_in($data->id);
									$this->authentication->reset_attempts($identity, get_ip_address());
									$this->vars['status'] 	= 'green';
									$this->vars['title'] 	= 'Selamat !';
									$this->vars['message'] 	= 'Anda Akan Dialihkan ...<br>';
								}
								else
								{
									$this->vars['status']   = 'blue';
									$this->vars['title']    = 'Waduh !';
									$this->vars['message']  = $this->email->print_debugger();
								}
							}
							
						}
						else
						{
							$this->authentication->increase_login_attempts($identity, get_ip_address());
							$this->vars['status'] 	= 'red';
							$this->vars['title'] 	= 'Maaf !';
							$this->vars['message'] 	= 'Login Anda Salah !<br>Coba Pakai Login Anda Yang Benar.';
						}
					}
					else
					{
						$this->vars['status'] 	= 'blue';
						$this->vars['title'] 	= 'Maaf !';
						$this->vars['message'] 	= 'Anda Tidak Terdaftar.';
					}
				}
				else
				{
					$this->vars['status'] 	= 'blue';
					$this->vars['title'] 	= 'Maaf !';
					$this->vars['message'] 	= 'Tolong Refresh Halaman Ini [ F5 ].';
				}
			}
			else
			{
				$this->vars['status'] 	= 'yellow';
				$this->vars['title'] 	= 'Perhatian !';
				$this->vars['message'] 	= validation_errors();
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
			exit;
		}
		else
		{
			redirect('login');
		}
	}
	private function validation()
	{
		$val = $this->form_validation;
		$val->set_rules('identity', 'Username / Email', 'trim|required');
		$val->set_rules('password', 'Password', 'trim|required');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		$val->set_message('required', '{field} harus diisi');
		return $val->run();
	}
	public function lupa_password()
	{
		$this->vars['title'] 	= 'Password | Lupa';
		$this->vars['content'] 	= 'login/forgot';
		$this->load->view('login/index', $this->vars);
	}
	public function proseslupapassword()
	{
		if ($this->input->is_ajax_request())
		{	
			if ($this->lupa_validation())
			{
				$email	  = $this->input->post('email', TRUE);
				$token    = $this->input->post('app_token', TRUE);

				if($token = session('app_token'))
				{
					$query = $this->users_model->get_user_by_email($email);
					if ($query == NULL)
					{
						$this->vars['title'] = 'Maaf !';
						$this->vars['status'] = 'blue';
						$this->vars['message'] = 'Email anda tidak terdaftar !';
					}
					else
					{

						$forgot_password_key = sha1($email . uniqid(mt_rand(), true));

						$from = $this->email->from('admin@legolas.my.id', 'Koperasi TIRTA LANGGENG');
						$to = $this->email->to($query['email']);
						$message = "Hai " . $query['nama'];
						$message .= "<br><br>";
						$message .= "Silahkan klik tautan berikut untuk melakukan perubahan kata sandi Anda.";
						$message .= "<br>";
						$message .= "<a href=".base_url() . 'reset-password/' . $forgot_password_key.">".base_url() . 'reset-password/' . $forgot_password_key."</a>";
						$message .= "<br><br>";
						$message .= "Abaikan email ini jika Anda tidak mengajukan perubahan kata sandi ini.";
						$message .= "<br><br>";
						$message .= "Terima Kasih.";
						$message .= "<br><br>";
						$message .= "Admin";
						$message .= "<br>";
						$message .= 'Koperasi TIRTA LANGGENG';
						$content = $this->email->message($message);
						$subject = $this->email->subject('Lupa Password');

						$send_mail = $this->email->send();

						if ($send_mail)
						{
							$a = $this->db->where('email', $query['email'])->get('app_users')->row();
							$kode_token = mt_rand(10000000,99999999);
							$update = $this->users_model->set_forgot_password_key($a->email, $forgot_password_key, $kode_token);
							if ($update)
							{
								$this->vars['status'] = 'green';
								$this->vars['title'] = 'Selamat !';
								$this->vars['message'] = 'Instruksi untuk mengubah kata sandi<br>sudah kami kirimkan melalui email<br>'.$query['email'];
							}
							else
							{
								$this->vars['status'] = 'blue';
								$this->vars['title'] = 'Waduh !';
								$this->vars['message'] = 'Terjadi kesalahan dalam proses ubah kata sandi.<br>Silahkan hubungi kami di whatsapp ' . $this->config->item('developer');
							}
						}
						else
						{
							$this->vars['status'] = 'red';
							$this->vars['title'] = 'Waduh !';
							$this->vars['message'] = $this->email->print_debugger();
						}
					}
				}
			}
			else
			{
				$this->vars['status'] 	= 'yellow';
				$this->vars['title'] 	= 'Ooops !';
				$this->vars['message'] 	= validation_errors();
				$this->vars['banned'] 	= FALSE;
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
			exit;
		}
		else
		{
			redirect('login');
		}
	}
	private function lupa_validation()
	{
		$val = $this->form_validation;
		$val->set_rules('email', 'Alamat Email', 'trim|required|valid_email|min_length[6]');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		$val->set_message('required', '{field} harus diisi');
		return $val->run();
	}
	public function reset_password()
	{
		$this->vars['page_title'] 	= 'Reset Password';
		$this->vars['title'] 		= 'Reset Password';
		$user_forgot_password_key 	= $this->uri->segment(2);
		$is_exists 			= $this->sistem->is_exists('user_forgot_password_key', $user_forgot_password_key, 'app_users');
		if ( $is_exists )
		{
			$this->vars['content'] 	= 'login/reset-password';
			$this->load->view('login/index', $this->vars);
		}
		else
		{
			redirect(base_url(), 'refresh');
		}
	}
	public function reset_password_process()
	{
		if ($this->input->is_ajax_request())
		{
			if ($this->resetvalidation())
			{
				$user_forgot_password_key = $this->uri->segment(2);
				$query = $this->sistem->RowObject('user_forgot_password_key', $user_forgot_password_key, 'app_users');
				if ( is_object($query) )
				{
					$request_date = new DateTime($query->user_forgot_password_request_date);
					$today = new DateTime(date('Y-m-d H:i:s'));
					$diff = $today->diff($request_date);
					$hours = $diff->h;
					$hours = $hours + ($diff->days * 24);
					if ($hours > 24)
					{
						$this->users_model->remove_forgot_password_key($query->id);
						$this->vars['status']   = 'yellow';
						$this->vars['title']    = 'Oops !';
						$this->vars['message']  = 'Tautan untuk mengubah kata sandi Anda sudah kadaluarsa !<br>Silahkan Lakukan reset Password Ulang !';
						$this->vars['outdate'] 	= TRUE;
					}
					else
					{
						$query = $this->users_model->reset_password($query->id) ? 'green' : 'red';
						$this->vars['status']   = $query;
						$this->vars['title']    = $query ? 'Berhasil !' : 'Waduh !';
						$this->vars['message']  = $query ? 'Kata sandi sudah diperbaharui.<br>Halaman akan dialihkan dalam 2 detik.' : 'Terjadi kesalahan pada sistem kami.<br>Silahkan hubungi Operator !';
						$this->vars['outdate'] 	= FALSE;
					}
				}
				else
				{
					$this->vars['status'] = 'blue';
					$this->vars['title']    = 'Maaf !';
					$this->vars['message'] = '404';
					$this->vars['outdate'] 	= FALSE;
				}
			}
			else
			{
				$this->vars['status']  = 'warning';
				$this->vars['title']    = 'Waduh !';
				$this->vars['message'] = validation_errors();
				$this->vars['outdate'] 	= FALSE;
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
			exit;
		}
	}

	private function resetvalidation() {
		$val = $this->form_validation;
		$val->set_rules('password', 'Kata Sandi Baru', 'trim|required|min_length[6]');
		$val->set_rules('c_password', 'Ulangi Kata Sandi Baru', 'trim|required|min_length[6]|matches[password]');
		$val->set_message('min_length', '{field} harus diisi minimal 6 karakter');
		$val->set_message('required', '{field} harus diisi');
		$val->set_message('matches', '{field} kata sandi harus sama');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		return $val->run();
	}
	public function daftar()
	{
		$this->vars['title'] 	= 'Formulir Pendaftaran';
		$this->vars['content'] 	= 'login/daftar';
		$this->load->view('login/index', $this->vars);
	}
	public function prosesdaftar()
	{
		if ($this->input->post())
		{	
			if ($this->val())
			{
				$nama 		= ucwords($this->input->post('nama', TRUE));
				$jk 		= $this->input->post('jk', TRUE);
				$ktp 		= $this->input->post('ktp', TRUE);
				$telp 		= $this->input->post('telp', TRUE);
				$email 		= $this->input->post('email', TRUE);
				$alamat		= ucwords($this->input->post('alamat', TRUE));
				$token    	= $this->input->post('app_token', TRUE);

				$kode_token     = mt_rand(10000000,99999999);

				if($token = session('app_token'))
				{
					$datanya = array('ktp' => $ktp, 'nama' => $nama, 'phone' => $telp, 'email' => $email);

					$dataset = array('ktp' => $ktp, 'nama' => $nama, 'jk' => $jk, 'phone' => $telp, 'email' => $email, 'alamat' => ucwords($alamat), 'photo' => 'avatar.png', 'kode_token' => $kode_token, 'created_at' => date('Y-m-d H:i:s'));

					$cek	 = $this->authentication->cek_registered($datanya);
					if(empty($cek))
					{
						$daftar = get_instance()->db->insert('app_anggota', $dataset);
						$a = get_instance()->db->insert_id();

						$password = password_hash($dataset['ktp'], PASSWORD_BCRYPT);
						$data = array('member_id' => $a, 'group_id' => '5', 'username' => $dataset['ktp'], 'email' => $dataset['email'], 'password' => $password, 'created_at' => date('Y-m-d H:i:s'));
						$res = get_instance()->db->insert('app_users', $data) ? 'success' : 'error';
	

						$from = $this->email->from('admin@legolas.my.id', 'Koperasi TIRTA LANGGENG');
						$to = $this->email->to($dataset['email']);
						$message = "Hai " . $nama;
						$message .= "<br><br>";
						$message .= "Silahkan klik tautan berikut untuk konfirmasi email Anda. Dan Masukkan Kode Anda.";
						$message .= "<br>";
						$message .= "<a href=".base_url() . 'aktifasi-email/' . $dataset['email'].">".base_url() . 'aktifasi-email/' . $dataset['email']."</a>";
						$message .= "<br>";
						$message .= "<b>Kode : ".$kode_token."</b>";
						$message .= "<br>";
						$message .= "Abaikan email ini jika Anda sudah konfirmasi.";
						$message .= "<br><br>";
						$message .= "Terima Kasih.";
						$message .= "<br><br>";
						$message .= "Admin";
						$message .= "<br>";
						$message .= 'Koperasi TIRTA LANGGENG';
						$content = $this->email->message($message);
						$subject = $this->email->subject('Konfirmasi Pendaftaran Nasabah');

						$send_mail = $this->email->send() ? 'green' : 'red';

						$this->vars['status'] 		= $res;
						$this->vars['title']  		= $res == 'success' ? 'Selamat !' : 'Waduh !';
						$this->vars['message'] 		= $res == 'success' ? 'Anda Telah Mendaftar Nasabah Kami.<br>Silahkan Cek Email Anda Untuk Konfirmasi Pendaftaran Anda !' : 'Proses Pendaftaran Gagal.<br>Silahkan Coba Kembali !';
						$this->vars['registered'] 	= $res == 'success' ? TRUE : FALSE;

					}
					else
					{
						$this->vars['status'] 		= 'blue';
						$this->vars['title']  		= 'Waduh !';
						$this->vars['message'] 		= 'Maaf Anda Sudah Terdaftar ?!';
						$this->vars['registered'] 	= TRUE;
					}

				}

			}
			else
			{
				$this->vars['status'] 	= 'yellow';
				$this->vars['title'] 	= 'Ooops !';
				$this->vars['message'] 	= validation_errors();
				$this->vars['banned'] 	= FALSE;
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
			exit;
		}
		else
		{
			redirect('login');
		}
	}

	private function val()
	{
		$val = $this->form_validation;
		$val->set_rules('nama', 'Nama Lengkap', 'trim|required|is_unique[app_anggota.nama]');
		$val->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$val->set_rules('ktp', 'No E-KTP', 'trim|required|numeric|exact_length[16]|is_unique[app_anggota.ktp]');
		$val->set_rules('telp', 'No Whatsapp / Telp', 'trim|required|numeric|is_unique[app_anggota.phone]');
		$val->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[app_anggota.email]');
		$val->set_rules('alamat', 'Alamat Lengkap', 'trim|required');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		$val->set_message('required', '{field} harus diisi');
		return $val->run();
	}
	public function aktifasi_email()
	{
		$email = $this->uri->segment(2);
		$a     = $this->db->where('email', $email)->get('app_anggota')->row();
		$this->vars['codeken']  = $a->kode_token ?? '';
		$this->vars['title'] 	= 'Aktifasi Pendaftaran';
		$this->vars['content'] 	= 'login/aktifasi';
		$this->load->view('login/index', $this->vars);
	}

	public function proses_aktifasi_email()
	{
		if ($this->input->is_ajax_request())
		{
			if ($this->aktifasivalidation())
			{
				$code 		= $this->input->post('token', TRUE);
				$email 		= $this->input->post('email', TRUE);
				$token		= $this->input->post('app_token', TRUE);

				if($token = session('app_token'))
				{
					$a = $this->db->where('email', $email)->where('kode_token', $code)->get('app_anggota');
					if($a->num_rows() == 1)
					{
						$datanya = array('aktifasi' => 'sudah');
						$data    = array('kode_token' => NULL);
						$c = $this->db->where('email', $email)->update('app_users', $datanya);
						$d = $this->db->where('email', $email)->update('app_anggota', $data);	
						if($c && $d)
						{
							$this->vars['status'] 	= 'success';
							$this->vars['title'] 	= 'Terima Kasih !';
							$this->vars['message'] 	= 'Silahkan Isi Username & Password<br>Dengan <b>No KTP</b> Untuk Login !';
						}
						else
						{
							$this->vars['status'] 	= 'info';
							$this->vars['title'] 	= 'Maaf !';
							$this->vars['message'] 	= 'Proses Aktifasi Anda Gagal !<br>Silahkan Coba Kembali.';
						}				
					}
					else
					{
						$this->vars['status'] 	= 'error';
						$this->vars['title'] 	= 'Hayooo !';
						$this->vars['message'] 	= 'Kode Token / Email Aktifasi Anda Salah!';
					}
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
		else
		{
			redirect('login');
		}
	}
	private function aktifasivalidation()
	{
		$val = $this->form_validation;
		$val->set_rules('token', 'Kode Token', 'trim|required');
		$val->set_rules('email', 'Alamat Email', 'trim|required');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		$val->set_message('required', '{field} harus diisi');
		return $val->run();
	}
}
