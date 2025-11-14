<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjaman extends App_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->vars['page'] 	= 'Daftar';
		$this->vars['jns_drop']	= $this->sistem->selected('app_jns_pinj');
	}
	public function index()
	{
		redirect('transaksi/pinjaman/data_pinjaman');
	}	
	public function data_pinjaman()
	{
		$this->vars['title'] 		= 'Pinjaman Anggota';
		$this->vars['content'] 		= 'transaksi/pinjaman/data-pinjaman';
		$this->load->view('templates/index', $this->vars);
	}
	public function get_data_pinjaman()
	{
		$draw 	= intval($this->input->get('draw'));
		$start 	= intval($this->input->get('start'));
		$length = intval($this->input->get('length'));
		$hasil 	= $this->db->where('status', 'disetujui')->where('saldo_awal', 'false')->order_by('tgl', 'desc')->get('app_pinjaman');
		$data 	= [];
		$no 	= 1;
		foreach($hasil->result() as $row)
		{
			$data[] = array(
					$no++.'.',
					'<span class="text-primary">'.$row->kode.'</span>',
					tgl_indo($row->tgl),
					get_anggota($row->user_id)->nama,
					'Rp. '.number_format($row->jumlah, 0, ', ', '.'),
					'<span style="text-transform: capitalize;">Rp. '.number_format($row->pencairan, 0, ', ', '.').'</span>',
					'Rp. '.number_format($row->total, 0, ', ', '.'),
					'<a href="javascript:void(0);" class="btn btn-info btn-sm" title="Lihat Detail" data-href="'.base_url('transaksi/pinjaman/detail_pinjaman/'.$row->id).'" data-name="Detail Data" data-bs-toggle="modal" data-bs-target="#modalKing"><i class="fa fa-eye fa-fw fa-1x"></i></a>
					<a href="javascript:void(0);" class="btn btn-warning btn-sm" title="Edit" data-href="'.base_url('transaksi/pinjaman/edit_pinjaman/'.$row->id).'" data-name="Edit Data" data-bs-toggle="modal" data-bs-target="#modalKing"><i class="fa fa-pencil fa-fw fa-1x"></i></a>
					<a href="javascript:void(0);" class="btn btn-danger btn-sm" title="Hapus" data-href="'.base_url('transaksi/pinjaman/hapus_pinjaman/'.$row->id).'" data-name="Hapus ?" data-bs-toggle="modal" data-bs-target="#modalSedeng"><i class="fa fa-trash fa-fw fa-1x"></i></a>'
					
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

	public function pengajuan()
	{
		$this->vars['pagetitle'] 	= 'Pengajuan';
		$this->vars['title'] 		= 'Pinjaman Baru Anggota';
		$this->vars['content'] 		= 'transaksi/pinjaman/data-pengajuan';
		$this->load->view('templates/index', $this->vars);
	}
	public function get_data_pengajuan()
	{
		$draw = intval($this->input->get('draw'));
		$start = intval($this->input->get('start'));
		$length = intval($this->input->get('length'));
		$hasil = $this->db->where('status', 'baru')->order_by('tgl', 'desc')->get('app_pinjaman');
		$data = [];
		$no = 1;
		foreach($hasil->result() as $row)
		{
			$a 	= $this->db->where('id', $row->user_id)->get('app_anggota')->row();
			$b 	= $this->db->where('id', $a->cabang)->get('app_cabang')->row();
			$swp 	= $this->sistem->RowObject('nama', 'potongan-swp', 'app_jasa')->isi;
			$rk 	= $this->sistem->RowObject('nama', 'potongan-rsk', 'app_jasa')->isi;
			$total 	= $swp + $rk;		
			$uang 	= $row->jumlah / 100 * $total; 

			$data[] = array(
					$no++.'.',
					'<span class="text-primary">'.$row->kode.'</span>',
					tgl_jabar($row->tgl),
					$a->ktp,
					$a->nama,
					$b->nama,
					'Rp. '.number_format($row->jumlah, 0, ",", ".").'</span>',
					'Rp. '.number_format($row->jumlah - $uang, 0, ",", ".").'</span>',
					'<div class="d-flex ">
					<button class="btn ripple btn-primary btn-sm" data-href="'.base_url('transaksi/pinjaman/detail_pinjaman/'.$row->id).'" data-name="Persetujuan Pinjaman Baru" data-bs-toggle="modal" data-bs-target="#modalKing" title="Setujui / Tidak"><i class="fal fa-eye fa-fw"></i></button>&nbsp;
					<button class="btn ripple btn-success btn-sm" title="Edit" data-href="'.base_url('transaksi/pinjaman/edit_pinjaman/'.$row->id).'" data-name="Edit Data" data-bs-toggle="modal" data-bs-target="#modalKing"><i class="fal fa-pencil fa-fw"></i></button>
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
	public function edit_pinjaman($id)
	{
		$this->vars['pengajuan'] 	= $this->db->where('id', $id)->get('app_pinjaman')->row();
		$this->vars['anggota'] 		= $this->db->where('id', $this->vars['pengajuan']->user_id)->get('app_anggota')->row();
		$this->vars['title'] 	        = 'Pinjaman Anggota';
		$this->load->view('transaksi/pinjaman/edit-pinjaman', $this->vars);
	}
	public function detail_pinjaman($id)
	{
		$this->vars['title']   		= 'Detail Pinjaman Baru Anggota';
		$this->vars['pengajuan'] 	= $this->db->where('id', $id)->get('app_pinjaman')->row();
		$this->vars['anggota'] 		= $this->db->where('id', $this->vars['pengajuan']->user_id)->get('app_anggota')->row();
		$this->load->view('transaksi/pinjaman/detail-pinjaman-anggota', $this->vars);
	}
	public function ubah()
	{
		if($this->input->is_ajax_request())
		{
			if($this->cek_inputan())
			{
				$alasan	 	= $this->input->post('alasan', TRUE);
				$token    	= $this->input->post('app_token', TRUE);

				if($token = session('app_token'))
				{
					$this->vars['status'] 	= 'warning';
					$this->vars['title'] 	= 'Perhatian !';
					$this->vars['message'] 	= 'Kosong';
				}
			}
			else
			{
				$this->vars['status'] 	= 'warning';
				$this->vars['title'] 	= 'Perhatian !';
				$this->vars['message'] 	= validation_errors();
			}
		}
		$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
		exit;
	}
	private function cek_inputan()
	{
		$val = $this->form_validation;
		$val->set_rules('id', 'Transaksi Salah', 'trim|required');
		$val->set_rules('alasan', 'Alasan Diubah', 'trim|required');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		$val->set_message('required', '{field} mohon diisi');
		return $val->run();
	}
	public function setujui()
	{
		if($this->input->is_ajax_request())
		{
			if($this->cek_input())
			{
				$id	 	= $this->input->post('id', TRUE);
				$token		= $this->input->post('app_token', TRUE);

				if($token = session('app_token'))
				{
					$dataset = array('status' => 'disetujui', 'updated_at' => date('Y-m-d H:i:s'));
					$proses  = $this->sistem->update($id, 'app_pinjaman', $dataset) ? 'success' : 'error';

					$this->vars['status'] 	= $proses;
					$this->vars['id'] 	= $id;
					$this->vars['title']  	= $proses == 'success' ? 'Berhasil !' : 'Upss !';
					$this->vars['message'] 	= $proses == 'success' ? 'Data Berhasil Di Setujui !' : 'Gagal Memproses Data !';
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
	public function tolak()
	{
		if($this->input->is_ajax_request())
		{
			if($this->cek_input())
			{
				$id	 	= $this->input->post('id', TRUE);
				$alasan	 	= $this->input->post('alasan', TRUE);
				$token		= $this->input->post('app_token', TRUE);

				if($token = session('app_token'))
				{
					$dataset = array('status' => 'ditolak', 'alasan' => $alasan, 'updated_at' => date('Y-m-d H:i:s'));
					$proses  = $this->sistem->update($id, 'app_pinjaman', $dataset) ? 'success' : 'error';

					$this->vars['status'] 	= $proses;
					$this->vars['title']  	= $proses == 'success' ? 'Berhasil !' : 'Upss !';
					$this->vars['message'] 	= $proses == 'success' ? 'Data Diajukan Ditolak !' : 'Gagal Memproses Data !';
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
	private function cek_input()
	{
		$val = $this->form_validation;
		$val->set_rules('id', 'Transaksi Salah', 'trim|required');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		$val->set_message('required', '{field} mohon diisi');
		return $val->run();
	}
	public function ditolak()
	{
		$this->vars['pagetitle'] 	= 'Daftar';
		$this->vars['title'] 		= 'Pinjaman Anggota Yang DiTolak';
		$this->vars['content'] 		= 'transaksi/pinjaman/data-tolak';
		$this->load->view('templates/index', $this->vars);
	}
	public function data_pinjaman_tolak()
	{
		$draw = intval($this->input->get('draw'));
		$start = intval($this->input->get('start'));
		$length = intval($this->input->get('length'));
		$hasil = $this->db->where('status', 'ditolak')->get('app_pinjaman');
		$data = [];
		$no = 1;
		foreach($hasil->result() as $row)
		{
			$a = $this->db->where('id', $row->user_id)->get('app_anggota')->row();
			$b = $this->db->where('id', $a->cabang)->get('app_cabang')->row();
			$tot = ($row->jumlah/100) * $this->sistem->RowObject('nama', 'potongan-swp', 'app_jasa')->isi; 
			$tot2 = ($row->jumlah/100) * $this->sistem->RowObject('nama', 'potongan-rk', 'app_jasa')->isi; 
			$total = $tot + $tot2;		
			$uang = $row->jumlah - $total; 

			if($row->status == 'disetujui')
			{
				$label = '<span class="badge bg-success text-uppercase">'.$row->status.'</span>';
			}
			if($row->status == 'ditolak')
			{
				$label = '<span class="badge bg-danger text-uppercase">'.$row->status.'</span>';
			}
			else
			{
				$label = '';
			}

			$data[] = array(
					$no++.'.',
					$row->tgl,
					$row->kode,
					$a->nama,
					$b->nama,
					'Rp. '.number_format($row->jumlah, 0).'</span>',
					'<div class="">'.$label.'</div>',
					'<span style="white-space:normal">'.$row->alasan.'</span>',
					'<a href="javascript:void(0);" class="btn btn-primary radius-30 btn-xs" title="Detail Data Pinjaman" data-href="'.base_url('transaksi/pinjaman/detail_pinjaman/'.$row->id).'" data-name="Detail Data Pinjaman" data-bs-toggle="modal" data-bs-target="#PreviewModal"><i class="bx bx-check-circle bx-xs" style="padding-bottom: 2px;"></i></a>
					&nbsp;<a href="javascript:void(0);" class="btn btn-warning rounded-pill btn-xs" title="Edit" data-href="'.base_url('transaksi/pinjaman/edit/'.$row->id).'" data-name="Edit Data" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="bx bx-pencil bx-xs" style="padding-bottom: 2px;"></i></a>
					');
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
	public function cetak($id)
	{
		$pot				= $this->sistem->RowObject('nama', 'potongan-swp', 'app_jasa')->isi;
		$rk				= $this->sistem->RowObject('nama', 'potongan-rsk', 'app_jasa')->isi;
		$this->vars['jasa'] 		= $pot + $rk;
		$this->vars['title']   		= 'Detail Pinjaman Baru Anggota';
		$this->vars['pengajuan'] 	= $this->db->where('id', $id)->get('app_pinjaman')->row();
		$this->vars['anggota'] 		= $this->db->where('id', $this->vars['pengajuan']->user_id)->get('app_anggota')->row();
		$this->load->view('transaksi/pinjaman/detail-cetak', $this->vars);
	}
	public function pengajuan_baru()
	{
		$this->vars['pagetitle']    = 'Form';
		$this->vars['title'] 	    = 'Pengajuan Pinjaman';
		$this->vars['content']      = 'transaksi/pinjaman/form-pinjaman';
		$this->load->view('templates/index', $this->vars);
	}
	public function add_pengajuan()
	{
		if($this->input->is_ajax_request())
		{
			if($this->cek_kosong())
			{
				$oto		= $this->sistem->CreateCode();
				$id 		= _toInteger($this->input->post('userid', true));
				$tgl		= $this->input->post('tgl_trans', TRUE);
				$jns_pinj	= $this->input->post('jns_pinj', TRUE);
				$tempo		= $this->input->post('tempo', TRUE);
				$jumlah		= str_replace(".", "", $this->input->post('jumlah', TRUE));
				$swp 		= $this->sistem->RowObject('nama', 'potongan-swp', 'app_jasa')->isi;
				$rk 		= $this->sistem->RowObject('nama', 'potongan-rsk', 'app_jasa')->isi;
				$total 		= $swp + $rk;		
				$uang 		= $jumlah / 100 * $total; 
				$uangswp	= $jumlah / 100 * $swp; 
				$uangrsk	= $jumlah / 100 * $rk; 
				$token		= $this->input->post('app_token', TRUE);

				if($token = session('app_token'))
				{
					if($jns_pinj == '12')
					{
						$config['upload_path']          = './assets/img/jaminan/';
						$config['allowed_types']        = 'jpeg|JPG|JPEG|jpg|png|PNG';
						$config['max_size']             = '0';
						$config['encrypt_name'] 	= true;
						$this->load->library('upload',$config);


						if ( ! $this->upload->do_upload('jaminan'))
                				{
							$this->vars['status'] 	= 'warning';
							$this->vars['title']  	= 'Upss !';
							$this->vars['message'] 	= $this->upload->display_errors();
                				}
                				else
                				{
							$upload_data 		= $this->upload->data();
							$this->image_resize(FCPATH.'assets/img/jaminan/', $upload_data['file_name']);
							@chmod(FCPATH.'assets/img/jaminan/'.$upload_data['file_name'], 0777);
							@chmod(FCPATH.'assets/img/jaminan/'.$file_name, 0777);
							// unlink old file
							@unlink(FCPATH.'assets/img/jaminan/'.$file_name);
							$jaminan		= $upload_data['file_name'];


							$dataset = array(
								'kode'		=> $oto,
								'tgl'		=> $tgl,
								'user_id'	=> $id,
								'jns_pinj'	=> $jns_pinj,
								'tempo'		=> $tempo,
								'cicil'		=> $tempo,
								'total'		=> $jumlah,
								'jumlah'	=> $jumlah,
								'pencairan'	=> $jumlah - $uang,
								'swp'		=> $uangswp,
								'rsk'		=> $uangrsk,
								'jaminan'	=> $jaminan,
								'status'	=> 'baru',
								'created_at' 	=> date('Y-m-d H:i:s'),
								'created_by' 	=> session('user_id')
							);
							$proses  = $this->db->insert('app_pinjaman', $dataset) ? 'success' : 'error';

							$this->vars['status'] 	= $proses;
							$this->vars['title']  	= $proses == 'success' ? 'Berhasil !' : 'Upss !';
							$this->vars['message'] 	= $proses == 'success' ? 'Data Berhasil Masuk !' : 'Gagal Memasukkan Data !';
						}

					}
					else
					{
						$dataset = array(
								'kode'		=> $oto,
								'tgl'		=> $tgl,
								'user_id'	=> $id,
								'jns_pinj'	=> $jns_pinj,
								'tempo'		=> $tempo,
								'cicil'		=> $tempo,
								'total'		=> $jumlah,
								'jumlah'	=> $jumlah,
								'pencairan'	=> $jumlah - $uang,
								'swp'		=> $uangswp,
								'rsk'		=> $uangrsk,
								'jaminan'	=> 'NULL',
								'status'	=> 'baru',
								'created_at' 	=> date('Y-m-d H:i:s'),
								'created_by' 	=> session('user_id')
						);
						$proses  = $this->db->insert('app_pinjaman', $dataset) ? 'success' : 'error';

						$this->vars['status'] 	= $proses;
						$this->vars['title']  	= $proses == 'success' ? 'Berhasil !' : 'Upss !';
						$this->vars['message'] 	= $proses == 'success' ? 'Data Berhasil Masuk !' : 'Gagal Memasukkan Data !';
					}
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
	private function cek_kosong()
	{
		$val = $this->form_validation;
		$val->set_rules('userid', 'Anggota', 'trim|required');
		$val->set_rules('tgl_trans', 'Tanggal Transaksi', 'trim|required');
		$val->set_rules('jns_pinj', 'Jenis Pinjaman', 'trim|required');
		$val->set_rules('tempo', 'Tempo Angsuran', 'trim|required');
		$val->set_rules('jumlah', 'Nominal Pinjaman', 'trim|required');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		$val->set_message('required', '{field} mohon diisi');
		return $val->run();
	}



	private function image_resize($path, $file_name)
	{
		$this->load->library('image_lib');
		$config['image_library'] 	= 'gd2';
		$config['source_image'] 	= $path .'/'.$file_name;
		$config['maintain_ratio'] 	= false;
		$config['quality'] 		= '60%'; 
		$config['width'] 		= 800;
		$config['height'] 		= 500;
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();
	} 
	public function pelunasan()
	{
		$this->vars['title'] 		= 'Pelunasan Pinjaman Anggota';
		$this->vars['content'] 		= 'transaksi/pinjaman/data-pelunasan-pinjaman';
		$this->load->view('templates/index', $this->vars);
	}
	public function angsuran()
	{
		$this->vars['title'] 	    = 'Angsuran Pinjaman';
		$this->vars['content']      = 'transaksi/pinjaman/data-angsuran';
		$this->load->view('templates/index', $this->vars);
	}
	public function get_daftar_angsuran()
	{
		$draw = intval($this->input->get('draw'));
		$start = intval($this->input->get('start'));
		$length = intval($this->input->get('length'));
		$hasil = $this->db->get('app_angsuran');

		$data = [];
		$no = 1;
		foreach($hasil->result() as $row)
		{
			$a = $this->db->where('id', $row->id_pinj)->get('app_pinjaman')->row();
			$b = $this->db->where('id', $a->user_id)->get('app_nasabah')->row();
			$c = $this->db->where('id', $b->cabang)->get('app_cabang')->row();

			if($row->jenis == 'cicilan')
			{
				$jenis  = '<div class="text-center">'.$a->tempo.'</div>';
			}
			elseif($row->jenis == 'pelunasan')
			{
				$jenis = '<div class="text-center">Pelunasan</div>';
			}
			$data[] = array(
					$no++.'.',
					$row->tgl,
					'<a href="'.base_url('transaksi/pinjaman/detail_pinj/'.$a->kode).'">'.$a->kode.' ['.get_jenis_pinjaman($a->jns_pinj)->nama.', '.$a->cicil.'x]</a>',
					$b->nama,
					$c->nama,
					$jenis,
					'Rp. '.number_format($a->jumlah, 0, ", ", ".").'</span>',
					'Rp. '.number_format($a->total, 0, ", ", ".").'</span>',
					'<a href="'.base_url('transaksi/pinjaman/detail_pinj/'.$a->kode).'" class="btn btn-primary radius-30 px-2 btn-xs" title="Detail Data Pinjaman"><i class="bx bx-check-circle bx-xs"></i></a>
					&nbsp;<a href="javascript:void(0);" class="btn btn-warning rounded-pill px-2 btn-xs" title="Edit" data-href="'.base_url('transaksi/pinjaman/edit/'.$row->id).'" data-name="Edit Data" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="bx bx-pencil bx-xs"></i></a>
					');
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
	public function form_angsuran()
	{
		$this->vars['title'] 	    = 'Angsuran Pinjaman';
		$this->vars['content']      = 'transaksi/pinjaman/form-angsuran';
		$this->load->view('templates/index', $this->vars);
	}
	public function add_angsuran_pinjaman()
	{
		if($this->input->is_ajax_request())
		{
			$userid		= $this->input->post('userid', TRUE);
			$tgl		= $this->input->post('tgl_trans', TRUE);
			$jenis		= $this->input->post('jenis', TRUE);
			$dari		= $this->input->post('dari', TRUE);
			$ke		= $this->input->post('ke', TRUE);
			$pokok		= str_replace(".", "", $this->input->post('pokok_bayar', TRUE));
			$bunga		= str_replace(".", "", $this->input->post('bunga_bayar', TRUE));
			$keterangan	= $this->input->post('keterangan', TRUE);
			$token		= $this->input->post('app_token', TRUE);

			$cek		= $this->db->select_sum('pokok', 'total')->where('user_id', $userid)->get('app_pinjaman_lalu')->row();
			if($cek->total == '0')
			{
				$this->vars['status'] 	= 'info';
				$this->vars['title'] 	= 'Maaf !';
				$this->vars['message'] 	= 'Sudah Tidak Memiliki Hutang !';
			}
			else
			{
				if($token = session('app_token'))
				{			
					$data 	= array(
						'kode' 		=> $this->sistem->angsuran(),
						'jenis'		=> $jenis,
						'tgl'		=> $tgl,
						'user_id' 	=> $userid,
						'jenis'		=> $jenis,
						'dari'		=> $dari,
						'ke'		=> $ke,
						'pokok'		=> $pokok,
						'bunga'		=> $bunga,
						'keterangan'	=> ucwords($keterangan),
						'created_at'	=> date('Y-m-d H:i:s'),
						'created_by'	=> session('user_id')
					);
					$porses	 = $this->db->insert('app_angsuran', $data);
					if($porses == true)
					{
						$golek   = $this->db->where('user_id', $userid)->get('app_pinjaman_lalu')->row(); 
						$pok     = $golek->pokok - $pokok;


						if($jenis == 'pelunasan')
						{
							$potbung = $bunga + $bunga;
							$bung    = $golek->bunga - $potbung;
							$total   = $golek->pokok + $bung;
						}
						else
						{
							$bung    = $golek->bunga - $bunga;
							$total   = $golek->pokok + $bung;
						}
						$this->vars['status'] 	= 'success';
						$this->vars['title'] 	= 'Berhasil !';
						$this->vars['message'] 	= 'Data Telah Diperbarui !';
						$dataset 		= array('pokok' => $pok, 'bunga' => $bung, 'total' => $total);	
						$lanjut 		= $this->db->where('user_id', $userid)->update('app_pinjaman_lalu', $dataset) ? 'success' : 'error';
						$this->vars['status'] 	= $lanjut;
						$this->vars['title'] 	= $lanjut == 'success' ? 'Berhasil !' : 'Waduh !';
						$this->vars['message'] 	= $lanjut == 'success' ? 'Data Telah Diperbarui !' : 'Gagal Memperbarui Data !';
					}
					else
					{
						$this->vars['status'] 	= 'error';
						$this->vars['title'] 	= 'Maaf !';
						$this->vars['message'] 	= 'Data Gagal Diproses !';
					}
				}
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
			exit;
		}
	}

	public function angs_awal_pinjaman()
	{
		$this->vars['page'] 	    = 'Angsuran';
		$this->vars['title'] 	    = 'Saldo Awal Pinjaman';
		$this->vars['content']      = 'transaksi/pinjaman/data-angsuran-saldo-awal';
		$this->load->view('templates/index', $this->vars);
	}

	public function get_daftar_angsuran_lalu()
	{
		$draw = intval($this->input->get('draw'));
		$start = intval($this->input->get('start'));
		$length = intval($this->input->get('length'));
		$hasil = $this->db->where('jenis', 'piutang_awal')->get('app_angsuran');

		$data = [];
		$no = 1;
		foreach($hasil->result() as $row)
		{
			$a = $this->db->where('user_id', $row->user_id)->get('app_pinjaman_lalu')->row();
			$b = $this->db->where('id', $a->user_id)->get('app_anggota')->row();
			$c = $this->db->where('id', $b->cabang)->get('app_cabang')->row();

			if($row->jenis == 'cicilan')
			{
				$jenis  = '<div class="text-center">'.$a->tempo.'</div>';
			}
			if($row->jenis == 'pelunasan')
			{
				$jenis = '<div class="text-center">Pelunasan</div>';
			}
			else
			{
				$jenis = '<div class="text-center">Mbbuh</div>';
			}
			$data[] = array(
					$no++.'.',
					tgl_jabar($row->tgl),
					$b->nama.' <span class="text-primary">'.$c->nama.'</span>',
					'Rp. '.number_format($row->pokok, 0, ", ", ".").'</span>',
					'Rp. '.number_format($row->bunga, 0, ", ", ".").'</span>',
					'Rp. '.number_format($row->pokok + $row->bunga, 0, ", ", ".").'</span>',
					'<button type="button" class="btn btn-primary btn-sm" data-href="'.base_url('transaksi/pinjaman/detail_angs_saldo_awal/'.$a->id).'" data-name="Detail Angsuran" data-bs-toggle="modal" data-bs-target="#modalKing" title="Detail Data Pinjaman"><i class="far fa-eye"></i></button>
					&nbsp;<a href="javascript:void(0);" class="btn btn-warning btn-sm" title="Edit" data-href="'.base_url('transaksi/pinjaman/edit/'.$row->id).'" data-name="Edit Data" data-bs-toggle="modal" data-bs-target="#modalKing"><i class="far fa-pencil"></i></a>
					');
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
	public function saldo_wal_pinjaman()
	{
		$this->vars['title'] 	    = 'Saldo Awal Pinjaman';
		$this->vars['content']      = 'master/pinjaman/data-saldo-awal';
		$this->load->view('templates/index', $this->vars);
	}
	public function saldo_awal_pinjaman()
	{
		$this->vars['title']    = 'Saldo Awal Pinjaman';
		$this->vars['content']  = 'master/pinjaman/form-saldo-awal';
		$this->load->view('templates/index', $this->vars);
	}
	public function get_saldo_awal()
	{
		$draw = intval($this->input->get('draw'));
		$start = intval($this->input->get('start'));
		$length = intval($this->input->get('length'));
		$hasil = $this->db->order_by('user_id', 'asc')->where('saldo_awal', 'true')->get('app_pinjaman');
		$data = [];
		$no = 1;
		foreach($hasil->result() as $row)
		{
			$data[] = array(
					$no++.'.',
					get_anggota($row->user_id)->nama.' <span class="text-danger">'.get_cabang(get_anggota($row->user_id)->cabang)->nama.'</span>',
					'Rp. '.number_format((int)$row->pokok, 0, ', ', '.'),
					'Rp. '.number_format((int)$row->bunga, 0, ', ', '.'),
					'Rp. '.number_format((int)$row->pokok + $row->bunga, 0, ', ', '.'),
					'<div class="middle" style="gap: 4px;">
					<a href="'.base_url('transaksi/pinjaman/form_pembayaran_saldo_awal/'.$row->id).'" class="btn btn-success btn-sm radius-30" title="Bayar" data-tooltip="tooltip" data-bs-placement="left"><i class="fa-regular fa-rupiah-sign fa-fw"></i></a>
					<a href="javascript:void(0);" class="btn btn-info btn-sm radius-30" title="Detail" data-href="'.base_url('transaksi/pinjaman/detail_saldo_awal/'.$row->id).'" data-name="Detail" data-bs-toggle="modal" data-bs-target="#modalKing" data-tooltip="tooltip" data-bs-placement="bottom"><i class="fal fa-eye fa-fw"></i></a>
					<a href="'.base_url('transaksi/pinjaman/edit_saldo_awal/'.$row->id).'" class="btn btn-secondary btn-sm radius-30" title="Edit" data-tooltip="tooltip" data-bs-placement="right"><i class="fal fa-pencil fa-fw"></i></a></div>'
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

	public function form_pembayaran_saldo_awal($id)
	{
		$this->vars['title'] 	= 'Angsuran / Pelunasan Saldo Awal Pinjaman';
		$this->vars['hasil'] 	= $this->db->where('id', $id)->get('app_pinjaman_lalu')->row();
		$this->vars['content']  = 'master/pinjaman/form-pembayaran-saldo-awal';
		$this->load->view('templates/index', $this->vars);	
	}
	public function add_pembayaran_saldo_awal($id)
	{
		$this->vars['hasil'] = $this->db->where('id', $id)->get('app_pinjaman_lalu')->row();
		$this->load->view('master/pinjaman/form-pembayaran-saldo-awal', $this->vars);		
	}
	public function add_angsuran_saldo_awal()
	{
		$val = $this->form_validation;
		if ($this->input->is_ajax_request())
		{
			$kode	= $this->sistem->kodepiutang('app_angsuran');
			$id 	= $this->input->post('id', TRUE);
			$user 	= $this->input->post('user_id', TRUE);
			$tgl 	= $this->input->post('tgl_trans', TRUE);
			$jenis 	= $this->input->post('tipe', TRUE);
			$ke 	= $this->input->post('ke', TRUE);
			$dari 	= $this->input->post('dari', TRUE);
			$pokok  = $this->input->post('pokok_bayar', TRUE);
			$bunga 	= $this->input->post('bunga_bayar', TRUE);
			$pokokl = $this->input->post('pokokl', TRUE);
			$bungal	= $this->input->post('bungal', TRUE);
			$desc 	= $this->input->post('keterangan', TRUE);

			$tipe   = $this->input->post('tipe', TRUE);

			$token  = $this->input->post('app_token', TRUE);

			if($token = session('app_token'))
			{
				if($tipe == 'cicilan')
				{
					if($this->cek_validi())
					{
						$data	= array(
							'kode'		=> "APL-".date("y").''.date("m").''.date("d").'-'.$kode,
							'tgl'		=> $tgl,
							'jenis'		=> $jenis,
							'user_id'	=> $user,
							'id_pinj'	=> '0',
							'dari'		=> $dari,
							'ke'		=> $dari - $ke,
							'pokok'		=> str_replace(".", "", $pokok),
							'bunga'		=> str_replace(".", "", $bunga),	
							'keterangan'	=> $desc,
							'created_at' 	=> date('Y-m-d H:i:s'),
							'created_by' 	=> session('user_id')									
						);
						$proses = $this->db->insert('app_angsuran', $data);
						if($proses == true)
						{
							$golek   = $this->db->where('id', $id)->get('app_pinjaman_lalu')->row();

							$pokoke  = $golek->pokok;
							$bungane = $golek->bunga;

							$pok	 = $pokoke - str_replace(".", "", $pokok);
							$bun	 = $bungane - str_replace(".", "", $bunga);

							$kurange = $dari - $ke;

							$dataset = array('ke' => $kurange, 'pokok' => $pok, 'bunga' => $bun, 'updated_at' => date('Y-m-d H:i:s'), 'updated_by' => session('user_id'));
							$lakukan = $this->db->where('id', $id)->update('app_pinjaman_lalu', $dataset) ? 'success' : 'error';
							$this->vars['status'] 	= $lakukan;
							$this->vars['title']  	= $lakukan == 'success' ? 'Berhasil !' : 'Upss !';
							$this->vars['message'] 	= $lakukan == 'success' ? 'Data Berhasil Masuk !' : 'Gagal Memasukkan Data !';	
						}
						else
						{
							$this->vars['status'] 	= 'info';
							$this->vars['title'] 	= 'Maaf !';
							$this->vars['message'] 	= 'Proses Tidak Bisa Dilakukan !';
						}
					}
					else
					{
						$this->vars['status'] 	= 'warning';
						$this->vars['title'] 	= 'Perhatian !';
						$this->vars['message'] 	= validation_errors();
					}
				}
				elseif($tipe == 'pelunasan')
				{
					$datane	= array(
							'kode'		=> "PPL-".date("y").''.date("m").''.date("d").'-'.$kode,
							'tgl'		=> $tgl,
							'jenis'		=> $jenis,
							'user_id'	=> $user,
							'id_pinj'	=> '0',
							'dari'		=> $dari,
							'ke'		=> $ke,
							'pokok'		=> str_replace(".", "", $pokok),
							'bunga'		=> str_replace(".", "", $bunga),	
							'keterangan'	=> $desc,
							'created_at' 	=> date('Y-m-d H:i:s'),
							'created_by' 	=> session('user_id')									
					);
					$prosesa = $this->db->insert('app_angsuran', $datane);
					if($prosesa == true)
					{
						$lakukan = $this->db->where('id', $id)->delete('app_pinjaman_lalu') ? 'success' : 'error';
						$this->vars['status'] 	= $lakukan;
						$this->vars['title']  	= $lakukan == 'success' ? 'Berhasil !' : 'Upss !';
						$this->vars['message'] 	= $lakukan == 'success' ? 'Data Berhasil Masuk !' : 'Gagal Memasukkan Data !';	
					}
					else
					{
						$this->vars['status'] 	= 'info';
						$this->vars['title'] 	= 'Maaf !';
						$this->vars['message'] 	= 'Proses Tidak Bisa Dilakukan !';
					}
				}	
				else
				{
					$this->vars['status'] 	= 'error';
					$this->vars['title'] 	= 'Maaf !';
					$this->vars['message'] 	= 'Pilih Mode Pembayaran Dahulu !';
				}
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
			exit;
		}
	}
	private function cek_validi()
	{
		$val = $this->form_validation;
		$val->set_rules('ke', 'Angsuran Ke', 'trim|required');
		$val->set_rules('pokok_bayar', 'Sisa Pokok Pinjaman', 'trim|required');
		$val->set_rules('bunga_bayar', 'Sisa Bunga Pinjaman', 'trim|required');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		$val->set_message('required', '{field} harus diisi');
		return $val->run();
	}
	public function detail_saldo_awal($id)
	{
		$this->vars['hasil'] = $this->db->where('id', $id)->get('app_pinjaman_lalu')->row();
		$this->load->view('master/pinjaman/detail-saldo-awal', $this->vars);
	}
	public function edit_saldo_awal($id)
	{
		$this->vars['title'] 	= 'Edit Saldo Awal Pinjaman';
		$this->vars['hasil'] 	= $this->db->where('id', $id)->get('app_pinjaman_lalu')->row();
		$this->vars['content'] 	= 'master/pinjaman/edit-saldo-awal';
		$this->load->view('templates/index', $this->vars);	
	}
	public function detail_angs_saldo_awal($id)
	{
		$this->load->view('templates/index', $this->vars);
	}
	public function form_angs_saldo_awal()
	{
		$this->vars['title'] 	= 'Angsuran / Pelunasan Saldo Awal Pinjaman';
		$this->vars['content']  = 'master/pinjaman/form-pembayaran-saldo-awal';
		$this->load->view('templates/index', $this->vars);	
	}

}