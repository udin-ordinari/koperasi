<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Umum extends App_Controller {

	public function __construct()
	{
		parent::__construct();
	}	
	public function index()
	{
		$this->vars['page']	= 'Daftar';
		$this->vars['title']	= 'Transaksi Kas';
		$this->vars['content']  = 'transaksi/umum/data-transaksi';
		$this->load->view('templates/index', $this->vars);		
	}
	public function get_trans_new()
	{
		$draw = intval($this->input->get('draw'));
		$start = intval($this->input->get('start'));
		$length = intval($this->input->get('length'));
		$hasil = $this->db->where('YEAR(tgl)', tahun_buku()->periode)->order_by('tgl', 'desc')->get('app_transaksi');
		$data = [];
		$no = 1;
		foreach($hasil->result() as $row)
		{
			$a = $this->db->where('id', $row->akun_id)->get('app_akun')->row();
			if($row->jenis == 'debet')
			{
				$label = 'text-capitalize btn-success';
			}
			else
			{
				$label = 'text-capitalize btn-danger';
			}
			if($row->unit == '01')
			{
				$unit = 'USP';
			}
			else
			{
				$unit = 'INDUK';
			}
			$data[] = array(
					$no++.'.',
					tgl_jabar($row->tgl),
					'<div style="white-space: normal">'.$a->akun.' '.$unit.'<span class="badge '.$label.' px-3 radius-30">'.$row->jenis.'</span></div>',
					'<div style="white-space: normal">'.$row->keterangan.'</div>',
					'<span class="badge '.$label.' px-3 radius-30">'.$row->jenis.'</span>',
					'Rp. '.number_format($row->jumlah, 0, ",", ".").'</span>',
					'<button class="btn ripple btn-primary btn-sm" data-href="'.base_url('transaksi/umum/detail/'.$row->id).'" data-name="Lihat Data" data-bs-toggle="modal" data-bs-target="#modalGede" title="Detail"><i class="fal fa-eye fa-fw"></i></button>
					<button class="btn ripple btn-warning btn-sm" title="Edit" data-href="'.base_url('transaksi/umum/edit/'.$row->id).'" data-name="Edit Transaksi" data-bs-toggle="modal" data-bs-target="#modalGede"><i class="fal fa-pencil fa-fw"></i></button>
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
	public function add_transaksi()
	{
		$this->load->view('transaksi/umum/form-transaksi', $this->vars);
	}
	public function proses_transaksi()
	{
		if($this->input->is_ajax_request())
		{
			if($this->validasi())
			{
				$oto		= nootomatis();
				$tgl		= $this->input->post('tgl_trans', TRUE);
				$akun		= $this->input->post('akun', TRUE);
				$unit		= $this->input->post('unit', TRUE);
				$posisi		= $this->input->post('posisi', TRUE);
				$keterangan	= $this->input->post('keterangan', TRUE);
				$jumlah		= str_replace(".", "", $this->input->post('jumlah', TRUE));
				$pokok		= str_replace(".", "", $this->input->post('pokok', TRUE));
				$bunga		= str_replace(".", "", $this->input->post('bunga', TRUE));
				$token		= $this->input->post('app_token', TRUE);

				if($token = session('app_token'))
				{
					$config['upload_path']          = './assets/img/bukti/';
					$config['allowed_types']        = 'jpeg|JPG|JPEG|jpg|png|PNG';
					$config['max_size']             = '0';
					$config['encrypt_name'] 	= true;
					$this->load->library('upload',$config);
					if ( ! $this->upload->do_upload('bukti'))
                			{
						$this->vars['status'] 	= 'info';
						$this->vars['title']  	= 'Upss !';
						$this->vars['message'] 	= $this->upload->display_errors();
                			}
                			else
                			{
						$upload_data 	= $this->upload->data();
						@chmod(FCPATH.'assets/img/bukti/'.$upload_data['file_name'], 0777);
						$this->image_resize(FCPATH.'assets/img/bukti/', $upload_data['file_name']);
						$bukti		= $upload_data['file_name'];


						$dataset = array(
								'kode'		=> $oto,
								'tgl'		=> $tgl,
								'jenis'		=> $posisi,
								'unit'		=> $unit,
								'akun_id'	=> $akun,
								'keterangan'	=> ucwords($keterangan),
								'jumlah'	=> $jumlah,
								'pokok'		=> $pokok ?? '0',
								'bunga'		=> $bunga ?? '0',
								'bukti'		=> $bukti,
								'created_at' 	=> date('Y-m-d H:i:s'),
								'created_by' 	=> session('user_id')
							);
						$proses  = $this->db->insert('app_transaksi', $dataset) ? 'success' : 'error';

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
	private function validasi()
	{
		$val = $this->form_validation;
		$val->set_rules('tgl_trans', 'Tanggal Transaksi', 'trim|required');
		$val->set_rules('akun', 'Akun', 'trim|required');
		$val->set_rules('unit', 'Unit Satuan Kerja', 'trim|required');
		$val->set_rules('posisi', 'Kredit / Debet', 'trim|required');
		$val->set_rules('keterangan', 'Keterangan', 'trim|required');
		$val->set_rules('jumlah', 'Nominal', 'trim|required');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		$val->set_message('required', '{field} mohon diisi');
		return $val->run();
	}
	public function detail($id)
	{
		$this->vars['title']   		= 'Detail Transaksi';
		$this->vars['transaksi'] 	= $this->db->where('id', $id)->get('app_transaksi')->row();
		$this->vars['akuntansi'] 	= $this->db->where('id', $this->vars['transaksi']->akun_id)->get('app_akun')->row();
		$this->load->view('transaksi/umum/detail-transaksi', $this->vars);		
	}
	public function edit($id)
	{
		$this->vars['transaksi'] 	= $this->db->where('id', $id)->get('app_transaksi')->row();
		$this->vars['akuntansi'] 	= $this->db->where('id', $this->vars['transaksi']->akun_id)->get('app_akun')->row();
		$this->vars['title'] 	        = 'Transaksi Umum';
		$this->load->view('transaksi/umum/edit-transaksi', $this->vars);
	}
	public function update()
	{
		if($this->input->is_ajax_request())
		{
			$id		= $this->input->post('id', TRUE);
			$tgl		= $this->input->post('tgl_trans', TRUE);
			$akun		= $this->input->post('akun', TRUE);
			$unit		= $this->input->post('unit', TRUE);
			$posisi		= $this->input->post('posisi', TRUE);
			$keterangan	= $this->input->post('keterangan', TRUE);
			$jml		= str_replace(".", "", $this->input->post('jumlah', TRUE));
			$pokok		= str_replace(".", "", $this->input->post('pokok', TRUE));
			$bunga		= str_replace(".", "", $this->input->post('bunga', TRUE));
			$token		= $this->input->post('app_token', TRUE);

			if($token = session('app_token'))
			{
				$gambar = $this->db->where('id', $id)->get('app_transaksi')->row();
				$file_name = $gambar->bukti;
				$config['upload_path']          = './assets/img/bukti/';
				$config['allowed_types']        = 'jpeg|JPG|JPEG|jpg|png';
				$config['max_size']             = '0';
				$config['encrypt_name'] 	= true;
				$this->load->library('upload',$config);
				
				if($this->upload->do_upload('bukti'))
				{
					$upload_data 	= $this->upload->data();
					@chmod(FCPATH.'assets/img/bukti/'.$upload_data['file_name'], 0777);
					@chmod(FCPATH.'assets/img/bukti/'.$file_name, 0777);
					// unlink old file
					@unlink(FCPATH.'assets/img/bukti/'.$file_name);
					$this->image_resize(FCPATH.'assets/img/bukti/', $upload_data['file_name']);
					$buktine		= $upload_data['file_name'];
				}
				else
				{
					$buktine = $gambar->bukti;
				}
				$dataset = array(
							'tgl'		=> $tgl,
							'jenis'		=> $posisi,
							'akun_id'	=> $akun,
							'unit'		=> $unit,
							'keterangan'	=> $keterangan,
							'bukti'		=> $buktine,
							'jumlah'	=> $jml,
							'pokok'		=> $pokok,
							'bunga'		=> $bunga,
							'updated_at' 	=> date('Y-m-d H:i:s'),
							'updated_by' 	=> session('user_id')
				);
				$proses  = $this->db->where('id', $id)->update('app_transaksi', $dataset) ? 'success' : 'error';

				$this->vars['status'] 	= $proses;
				$this->vars['title'] 	= $proses == 'success' ? 'Berhasil !' : 'Upss !';
				$this->vars['message'] 	= $proses == 'success' ? 'Data Berhasil Diperbarui !' : 'Gagal Memperbarui Data !';

			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
			exit;
		}
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


}