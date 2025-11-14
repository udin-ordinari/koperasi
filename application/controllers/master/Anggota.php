<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends App_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->vars['title'] = 'Anggota';
		$this->vars['content'] = 'master/anggota/data-anggota';
		$this->load->view('templates/index', $this->vars);		
	} 
	public function get_data()
	{
		$draw = intval($this->input->get('draw'));
		$start = intval($this->input->get('start'));
		$length = intval($this->input->get('length'));
		$hasil = $this->db->order_by('nama', 'ASC')->get('app_anggota');
		$data = [];
		$no = 1;
		foreach($hasil->result() as $row)
		{
			$cab = $this->db->where('id', $row->cabang)->get('app_cabang')->row();
			if($cab == 'NULL')
			{
				$cab = '0';
			}
			if($row->status == 'baru')
			{
				$label = '<span class="badge bg-pill bg-info text-capitalize px-3">'.$row->status.'</span>';
			}
			elseif($row->status == 'aktif')
			{
				$label = '<span class="badge bg-pill bg-success text-capitalize px-3">'.$row->status.'</span>';
			}
			elseif($row->status == 'nonaktif')
			{
				$label = '<span class="badge bg-pill bg-warning text-capitalize px-3 text-white">'.$row->status.'</span>';
			}
			else
			{
				$label = '<span class="badge bg-pill bg-secondary text-capitalize px-3">'.$row->status.'</span>';
			}
			$data[] = array(
					$no++.'.',
					$row->nama,
					$row->tempat_lahir.', '.$row->tanggal_lahir,
					'<span style="text-transform: capitalize;">'.$row->jk.'</span>',
					$cab->nama,
					$label,
					'<a href="javascript:void(0);" class="btn btn-info btn-sm" title="Lihat Detail" data-href="'.base_url('master/anggota/detail_anggota/'.$row->id).'" data-name="Detail Data" data-bs-toggle="modal" data-bs-target="#modalKing"><i class="fal fa-eye fa-fw fa-1x"></i></a>
					<a href="javascript:void(0);" class="btn btn-warning btn-sm" title="Edit" data-href="'.base_url('master/anggota/edit_anggota/'.$row->id).'" data-name="Edit Data" data-bs-toggle="modal" data-bs-target="#modalKing"><i class="fal fa-pencil fa-fw fa-1x"></i></a>
					<a href="javascript:void(0);" class="btn btn-danger btn-sm" title="Hapus" data-href="'.base_url('master/anggota/hapus_anggota/'.$row->id).'" data-name="Hapus Anggota ?" data-bs-toggle="modal" data-bs-target="#modalSedeng"><i class="fal fa-trash fa-fw fa-1x"></i></a>'
					
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
	public function get_data_baru()
	{
		$draw = intval($this->input->get('draw'));
		$start = intval($this->input->get('start'));
		$length = intval($this->input->get('length'));
		$hasil = $this->db->where('status', 'baru')->order_by('nama', 'ASC')->get('app_anggota');
		$data = [];
		$no = 1;
		foreach($hasil->result() as $row)
		{
			$cab = $this->db->where('id', $row->cabang)->get('app_cabang')->row();
			if($cab == 'NULL')
			{
				$cab = '0';
			}
			$data[] = array(
					$no++.'.',
					$row->ktp,
					$row->nama,
					$row->tempat_lahir.', '.$row->tanggal_lahir,
					'<span style="text-transform: capitalize;">'.$row->jk.'</span>',
					$cab->nama,
					'<a href="javascript:void(0);" class="btn btn-info btn-sm" title="Lihat" data-href="'.base_url('master/anggota/detail_anggota/'.$row->id).'" data-name="Detail Data" data-bs-toggle="modal" data-bs-target="#modalKing"><i class="fal fa-eye fa-fw fa-1x"></i></a>
					<a href="javascript:void(0);" class="btn btn-warning btn-sm" title="Edit" data-href="'.base_url('master/anggota/edit_anggota/'.$row->id).'" data-name="Edit Data" data-bs-toggle="modal" data-bs-target="#modalKing"><i class="fal fa-pencil fa-fw fa-1x"></i></a>
					<a href="javascript:void(0);" class="btn btn-danger btn-sm" title="Hapus" data-href="'.base_url('master/anggota/hapus_anggota/'.$row->id).'" data-name="Hapus Anggota ?" data-bs-toggle="modal" data-bs-target="#modalGede"><i class="fal fa-trash fa-fw fa-1x"></i></a>'
					
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

	public function get_data_nonaktif()
	{
		$draw = intval($this->input->get('draw'));
		$start = intval($this->input->get('start'));
		$length = intval($this->input->get('length'));
		$hasil = $this->db->where('status', 'nonaktif')->order_by('nama', 'ASC')->get('app_anggota');
		$data = [];
		$no = 1;
		foreach($hasil->result() as $row)
		{
			$cab = $this->db->where('id', $row->cabang)->get('app_cabang')->row();
			if($cab == 'NULL')
			{
				$cab = '0';
			}
			$data[] = array(
					$no++.'.',
					$row->ktp,
					$row->nama,
					$row->tempat_lahir.', '.$row->tanggal_lahir,
					'<span style="text-transform: capitalize;">'.$row->jk.'</span>',
					$cab->nama,
					$row->phone,
					'					
					<button class="btn ripple btn-info btn-sm me-1" title="Lihat" data-href="'.base_url('master/anggota/detail_anggota/'.$row->id).'" data-name="Detail Data" data-bs-toggle="modal" data-bs-target="#modalKing"><i class="fal fa-eye"></i></button>
					<button class="btn ripple btn-warning btn-sm me-1" title="Edit" data-href="'.base_url('master/anggota/edit_anggota/'.$row->id).'" data-name="Edit Data" data-bs-toggle="modal" data-bs-target="#modalKing"><i class="fal fa-pencil"></i></button>
					<button class="btn ripple btn-danger btn-sm" title="Hapus" data-href="'.base_url('master/anggota/hapus_anggota/'.$row->id).'" data-name="Hapus Anggota ?" data-bs-toggle="modal" data-bs-target="#modalSedeng"><i class="fal fa-trash"></i></button>
					'					
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
	public function baru()
	{
		$this->vars['title'] = 'Anggota Baru';
		$this->vars['content'] = 'master/anggota/data-anggota-baru';
		$this->load->view('templates/index', $this->vars);		
	}
	public function add_anggota()
	{
		$this->load->view('master/anggota/form-anggota');		
	} 
	public function proses_add_anggota()
	{
		if ($this->input->is_ajax_request())
		{
			if ($this->cekvalid())
			{

				$ktp 		= $this->input->post('ktp', TRUE);
				$nama 		= $this->input->post('nama', TRUE);
				$tempat		= $this->input->post('tempat_lahir', TRUE);
				$tanggal 	= $this->input->post('tanggal_lahir', TRUE);
				$jk	 	= $this->input->post('jk', TRUE);
				$email	 	= $this->input->post('email', TRUE);
				$alamat	 	= $this->input->post('alamat', TRUE);
				$cabang	 	= $this->input->post('cabang', TRUE);
				$telp	 	= $this->input->post('telp', TRUE);
				$token    	= $this->input->post('app_token', TRUE);	
				$kode_token     = mt_rand(10000000,99999999);
				if($token = session('app_token'))
				{
					$config['upload_path']          = './assets/img/users/';
					$config['allowed_types']        = 'jpeg|jpg|png';
					$config['max_size']             = '0';
					$config['remove_spaces'] 	= true;
					$config['encrypt_name'] 	= true;
					$this->load->library('upload', $config);

					if(empty($this->upload->do_upload('photo')))
					{
						$gambar		= 'avatar.png';
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
					}

					$data = array(
							'ktp' 		=> $ktp,
							'nama' 		=> ucwords($nama),
        						'tempat_lahir' 	=> ucwords($tempat),
        						'tanggal_lahir' => $tanggal,
        						'cabang' 	=> $cabang,
        						'phone' 	=> $telp,
        						'email' 	=> $email,
        						'alamat' 	=> $alamat,
							'kode_token' 	=> $kode_token,
        						'jk' 		=> $jk,
        						'photo' 	=> $gambar,
							'status'	=> 'baru',
        						'created_at' 	=> date('Y-m-d H:i:s'),
        						'created_by' 	=> session('user_id')
					);

					$masuk = $this->db->insert('app_anggota', $data);
					$a = get_instance()->db->insert_id();
					if($masuk)
					{
						$datanya = array(
								'group_id'	=> '5',
								'member_id'	=> $a,
								'username'  	=> $ktp,
        							'password' 	=> password_hash($ktp, PASSWORD_BCRYPT),
        							'email' 	=> $email,
        							'aktifasi' 	=> 'belum'
						);


						//Kode OTP Email
						$from = $this->email->from('admin@legolas.my.id', 'Koperasi TIRTA LANGGENG');
						$to = $this->email->to($email);
						$message = "Hai " . $nama;
						$message .= "<br><br>";
						$message .= "Silahkan klik tautan berikut untuk konfirmasi email Anda. Dan Masukkan Kode Anda.";
						$message .= "<br>";
						$message .= "<a href=".base_url() . 'aktifasi-email/' . $email.">".base_url() . 'aktifasi-email/' . $email."</a>";
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

						$this->email->send();

						$buat  = $this->db->insert('app_users', $datanya) ? 'success' : 'error';

						$this->vars['status']   = $buat;
						$this->vars['title']    = $buat == 'success' ? 'Berhasil !' : 'Oops !';	
						$this->vars['message']  = $buat == 'success' ? 'Data Sudah Masuk !' : 'Ada Masalah Memasukkan Data Nih !';
					}					
				}
			}
			else
			{
				$this->vars['status'] 	= 'warning';
				$this->vars['title']  	= 'Oops !';
				$this->vars['message'] 	= validation_errors();				
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
			exit;
		}
	}
	private function cekvalid()
	{
		$val = $this->form_validation;
		$val->set_rules('ktp', 'No E-KTP', 'trim|required|is_unique[app_anggota.ktp]');
		$val->set_rules('nama', 'Nama Lengkap', 'trim|required|is_unique[app_anggota.nama]');
		$val->set_rules('cabang', 'Cabang', 'trim|required');
		$val->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$val->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
		$val->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
		$val->set_rules('telp', 'No Whatsapp / Telp', 'trim|required|is_unique[app_anggota.phone]');
		$val->set_rules('email', 'Alamat Email', 'trim|required|is_unique[app_anggota.email]');
		$val->set_rules('alamat', 'Alamat Lengkap', 'trim|required');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		$val->set_message('required', '{field} harus diisi');
		return $val->run();
	}
	public function detail_anggota($id)
	{
		$this->vars['title']   = 'Detail Anggota';
		$this->vars['nasabah'] = $this->db->where('id', $id)->get('app_anggota')->row();
		$this->load->view('master/anggota/detail-anggota', $this->vars);
	}

	public function edit_anggota($id)
	{
		$this->vars['title']   = 'Edit Anggota';
		$this->vars['nasabah'] = $this->db->where('id', $id)->get('app_anggota')->row();
		$this->load->view('master/anggota/edit-anggota', $this->vars);
	}
	public function proses_edit_anggota()
	{
		if ($this->input->is_ajax_request())
		{
			$id 		= $this->input->post('uid', TRUE);
			$ktp 		= $this->input->post('ktp', TRUE);
			$nama 		= $this->input->post('nama', TRUE);
			$tempat		= $this->input->post('tempat_lahir', TRUE);
			$tanggal 	= $this->input->post('tanggal_lahir', TRUE);
			$jk	 	= $this->input->post('jk', TRUE);
			$email	 	= $this->input->post('email', TRUE);
			$alamat	 	= $this->input->post('alamat', TRUE);
			$cabang	 	= $this->input->post('cabang', TRUE);
			$telp	 	= $this->input->post('telp', TRUE);
			$token    	= $this->input->post('app_token', TRUE);	

			if($token = session('app_token'))
			{
				$query 				= $this->db->where('id', $id)->get('app_anggota')->row();
				$file_name 			= $query->photo;
				$config['upload_path']          = './assets/img/users/';
				$config['allowed_types']        = 'jpeg|jpg|png';
				$config['max_size']             = '0';
				$config['remove_spaces'] 	= true;
				$config['encrypt_name'] 	= true;
				$this->load->library('upload', $config);

				if(empty($this->upload->do_upload('photo')))
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
				}

				$data = array(
						'ktp' 		=> $ktp,
						'nama' 		=> ucwords($nama),
        					'tempat_lahir' 	=> ucwords($tempat),
        					'tanggal_lahir' => $tanggal,
        					'cabang' 	=> $cabang,
        					'phone' 	=> $telp,
        					'email' 	=> $email,
        					'alamat' 	=> $alamat,
        					'jk' 		=> $jk,
        					'photo' 	=> $gambar,
        					'updated_at' 	=> date('Y-m-d H:i:s'),
        					'updated_by' 	=> session('user_id')
				);

				$anyar = $this->db->where('id', $id)->update('app_anggota', $data);
				if($anyar)
				{
					$datanya = array(
							'email' => $email
					);

					$buat  = $this->db->where('member_id', $id)->update('app_users', $datanya) ? 'success' : 'error';

					$this->vars['status']   = $buat;
					$this->vars['title']    = $buat == 'success' ? 'Berhasil !' : 'Oops !';	
					$this->vars['message']  = $buat == 'success' ? 'Data Sudah Masuk !' : 'Ada Masalah Memasukkan Data Nih !';				
				}
			}
			else
			{
				$this->vars['status'] 	= 'warning';
				$this->vars['title']  	= 'Oops !';
				$this->vars['message'] 	= 'Bikinnya Susah Lho...! Seenaknya Saja Comot.';				
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
			exit;
		}
	}
	public function hapus_anggota($id)
	{
		$this->vars['hasil'] = $this->db->where('id', $id)->get('app_anggota')->row();
		$this->load->view('master/anggota/hapus-anggota', $this->vars);
	}
	public function proses_hapus_anggota()
	{
		if ($this->input->is_ajax_request())
		{
			$id 		= $this->input->post('id', TRUE);
			$token    	= $this->input->post('app_token', TRUE);	
			if($token = session('app_token'))
			{
				if($id == session('user_id'))
				{
					$this->vars['status'] 	= 'info';
					$this->vars['title']  	= 'Waduh !';
					$this->vars['message'] 	= 'Maaf ! Tidak Bisa Menghapus Akun Yang Lagi Aktif Login.';					
				}
				else
				{
					$hapus = $this->db->delete('app_anggota', array('id' => $id));

					if($hapus == true)
					{
						$del = $this->db->delete('app_users', array('member_id' => $id));
						$this->vars['status'] 	= 'success';
						$this->vars['title']  	= 'Berhasil !';
						$this->vars['message'] 	= 'Data Sudah Dihapus !';
					}
					else
					{
						$this->vars['status'] 	= 'error';
						$this->vars['title']  	= 'Uups !';
						$this->vars['message'] 	= 'Gagal Menghapus Data !';
					}
				}
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
			exit;
		}		
	}
	public function aktif()
	{
		$this->vars['title']   = 'Anggota';
		$this->vars['content'] = 'master/anggota/data-anggota';
		$this->load->view('templates/index', $this->vars);
	}
	public function get_data_aktif()
	{
		$draw = intval($this->input->get('draw'));
		$start = intval($this->input->get('start'));
		$length = intval($this->input->get('length'));
		$hasil = $this->db->where('status', 'aktif')->order_by('nama', 'ASC')->get('app_anggota');
		$data = [];
		$no = 1;
		foreach($hasil->result() as $row)
		{
			$cab = $this->db->where('id', $row->cabang)->get('app_cabang')->row();
			if($cab == 'NULL')
			{
				$cab = '0';
			}
			$data[] = array(
					$no++.'.',
					$row->ktp,
					$row->nama,
					$row->tempat_lahir.', '.$row->tanggal_lahir,
					'<span style="text-transform: capitalize;">'.$row->jk.'</span>',
					$cab->nama,
					'<a href="javascript:void(0);" class="btn btn-info btn-sm" title="Lihat" data-href="'.base_url('master/anggota/detail_anggota/'.$row->id).'" data-name="Detail Data" data-bs-toggle="modal" data-bs-target="#modalKing"><i class="fa fa-eye fa-fw fa-1x"></i></a>
					<a href="javascript:void(0);" class="btn btn-warning btn-sm" title="Edit" data-href="'.base_url('master/anggota/edit_anggota/'.$row->id).'" data-name="Edit Data" data-bs-toggle="modal" data-bs-target="#modalKing"><i class="fa fa-pencil fa-fw fa-1x"></i></a>
					<a href="javascript:void(0);" class="btn btn-danger btn-sm" title="Hapus" data-href="'.base_url('master/anggota/hapus_anggota/'.$row->id).'" data-name="Hapus Anggota ?" data-bs-toggle="modal" data-bs-target="#modalGede"><i class="fa fa-trash fa-fw fa-1x"></i></a>'
					
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
	public function aktifkan()
	{
		if ($this->input->is_ajax_request())
		{
			$id 		= $this->input->post('id', TRUE);
			$token    	= $this->input->post('app_token', TRUE);
			if($token = session('app_token'))
			{
				$data	= array('status' => 'aktif', 'created_at' => date('Y-m-d H:i:s'));
				$aktif	= $this->sistem->update($id, 'app_anggota', $data);
				if($aktif == true)
				{
					$status = array('aktifasi' => 'sudah', 'status' => 'diterima');
					$ubah = $this->db->where('member_id', $id)->update('app_users', $status) ? 'success' : 'error';

					$oto = $this->sistem->kodesimpanan();
					$datane	= array(
						'kode'		=> 'SMP-'.date('ymd').'-'.$oto,
						'tgl'		=> date('Y-m-d'),	
						'user_id'	=> $id,
						'jns_simp'	=> '1',
						'jumlah'	=> $this->sistem->RowObject('nama', 'iuran-sp', 'app_jasa')->isi,
						'saldo_awal'	=> '0',
						'created_at'	=> date('Y-m-d H:i:s'),
						'created_by'	=> session('user_id')				
					);
					$simpanan  = $this->db->insert('app_simpanan', $datane);
					$b = get_instance()->db->insert_id();
					$coden = $this->sistem->kodesimpanan();
					if($simpanan == true)
					{
						$isine	= array(
							'kode'		=> 'SMP-'.date('ymd').'-'.$coden,
							'tgl'		=> date('Y-m-d'),	
							'user_id'	=> $id,
							'jns_simp'	=> '2',
							'jumlah'	=> $this->sistem->RowObject('nama', 'iuran-sw', 'app_jasa')->isi,
							'saldo_awal'	=> '0',
							'created_at'	=> date('Y-m-d H:i:s'),
							'created_by'	=> session('user_id')				
						);
						$nabung = $this->db->insert('app_simpanan' , $isine) ? 'success' : 'error';
						$this->vars['status'] 	= $nabung;
						$this->vars['title']  	= $nabung == 'success' ? 'Berhasil !' : 'Uups !';
						$this->vars['message'] 	= $nabung == 'success' ? 'Data Sudah Diproses !' : 'Ada Masalah Memproses Data Nih !';

						$this->vars['status'] 	= $ubah;
						$this->vars['title']  	= $ubah == 'success' ? 'Berhasil !' : 'Uups !';
						$this->vars['message'] 	= $ubah == 'success' ? 'Data Sudah Diproses !' : 'Ada Masalah Memproses Data Nih !';
					}
				}
				else
				{
					$this->vars['status'] 	= 'error';
					$this->vars['title']  	= 'Uups !';
					$this->vars['message'] 	= 'Gagal Memproses Data !';
				}
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
			exit;
		}
	}

	public function nonaktive()
	{
		$this->vars['title']   	= 'Anggota Tidak Aktif';
		$this->vars['content'] 	= 'master/anggota/anggota-nonaktif';
		$this->load->view('templates/index', $this->vars);
	}
	public function nonaktifkan()
	{
		if ($this->input->is_ajax_request())
		{
			$id 		= $this->input->post('id', TRUE);
			$token    	= $this->input->post('app_token', TRUE);
			if($token = session('app_token'))
			{
				$data	= array('status' => 'nonaktif', 'created_at' => date('Y-m-d H:i:s'));
				$aktif	= $this->sistem->update($id, 'app_anggota', $data);
				if($aktif == true)
				{
					$datasi	= array('is_deleted' => '1');
					$this->db->where('user_id', $id)->update('app_simpanan', $datasi);
					$status = array('status' => 'ditolak');
					$ubah = $this->db->where('member_id', $id)->update('app_users', $status);
					$this->vars['status'] 	= 'success';
					$this->vars['title']  	= 'Berhasil !';
					$this->vars['message'] 	= 'Data Sudah Diproses !';
				}
				else
				{
					$this->vars['status'] 	= 'error';
					$this->vars['title']  	= 'Uups !';
					$this->vars['message'] 	= 'Gagal Memproses Data !';
				}
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
			exit;
		}
	}
	public function terima()
	{
		if ($this->input->is_ajax_request())
		{
			$id 		= $this->input->post('id', TRUE);
			$token    	= $this->input->post('app_token', TRUE);
			if($token = session('app_token'))
			{
				$data	= array('status' => 'aktif', 'created_at' => date('Y-m-d H:i:s'));
				$aktif	= $this->sistem->update($id, 'app_anggota', $data);
				if($aktif == true)
				{
					$status = array('status' => 'diterima');
					$ubah = $this->db->where('member_id', $id)->update('app_users', $status);
					$this->vars['status'] 	= 'success';
					$this->vars['title']  	= 'Berhasil !';
					$this->vars['message'] 	= 'Data Sudah Diproses !';
				}
				else
				{
					$this->vars['status'] 	= 'error';
					$this->vars['title']  	= 'Uups !';
					$this->vars['message'] 	= 'Gagal Memproses Data !';
				}
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
			exit;
		}
	}
	public function tolak()
	{
		if ($this->input->is_ajax_request())
		{
			$id 		= $this->input->post('id', TRUE);
			$token    	= $this->input->post('app_token', TRUE);
			if($token = session('app_token'))
			{
				$data	= array('status' => 'tolak', 'created_at' => date('Y-m-d H:i:s'));
				$aktif	= $this->sistem->update($id, 'app_anggota', $data);
				if($aktif == true)
				{
					$status = array('status' => 'ditolak');
					$ubah = $this->db->where('member_id', $id)->update('app_users', $status);
					$this->vars['status'] 	= 'success';
					$this->vars['title']  	= 'Berhasil !';
					$this->vars['message'] 	= 'Data Sudah Diproses !';
				}
				else
				{
					$this->vars['status'] 	= 'error';
					$this->vars['title']  	= 'Uups !';
					$this->vars['message'] 	= 'Gagal Memproses Data !';
				}
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
			exit;
		}
	}
	public function cari_anggota()
	{
		$this->load->view('master/anggota/cari-anggota');
	}
	public function cari_pinjaman_anggota()
	{
		$this->load->view('master/anggota/cari-pinjaman-anggota');
	}
	public function cari_angsuran()
	{
		$this->load->view('transaksi/angsuran/cari-angsuran');
	}

	public function cari_piutang()
	{
		$this->load->view('transaksi/angsuran/cari-piutang-lalu');
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


	public function hapus_database()
	{
		if ($this->input->is_ajax_request())
		{
			$token    	= $this->input->post('app_token', TRUE);
			if($token = session('app_token'))
			{
				$aktif	= $this->db->truncate('app_anggota');
				if($aktif)
				{
					$ubah = $this->db->where('id >', '1')->delete('app_users');
					$this->vars['status'] 	= 'success';
					$this->vars['title']  	= 'Berhasil !';
					$this->vars['message'] 	= 'Data Sudah Diproses !';
				}
				else
				{
					$this->vars['status'] 	= 'error';
					$this->vars['title']  	= 'Uups !';
					$this->vars['message'] 	= 'Gagal Memproses Data !';
				}
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
			exit;
		}
	}

	public function get_simpanan()
	{
		$id = $this->input->post('userid', TRUE);
		$tarik  = $this->db->select_sum('jumlah', 'total')->where('user_id', $id)->get('app_penarikan')->row();
		$simp	= $this->db->select('SUM(jumlah) as total')->where('user_id', $id)->where('jns_simp', '3')->get('app_simpanan')->row();
		$hasil  = $simp->total - $tarik->total;
		if($hasil > 0)
		{
			$this->vars['hasil'] = $hasil;
		}
		$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
		exit;
	}

}
