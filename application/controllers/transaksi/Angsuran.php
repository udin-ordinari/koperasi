<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Angsuran extends App_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->vars['page'] = 'Pinjaman Anggota';

	}
	public function index()
	{
		$this->vars['title'] 	= 'Angsuran Pinjaman';
		$this->vars['content'] 	= 'transaksi/angsuran/data-angsuran';
		$this->load->view('template/index', $this->vars);
	}

	public function get_data_angsuran()
	{
		$draw = intval($this->input->get('draw'));
		$start = intval($this->input->get('start'));
		$length = intval($this->input->get('length'));
		$hasil = $this->db->where('YEAR(tgl)', tahun_buku()->periode)->group_by('id_pinj')->get('app_angsuran');

		$data = [];
		$no = 1;
		foreach($hasil->result() as $row)
		{
			$a = $this->db->where('id', $row->id_pinj)->get('app_pinjaman')->row();
			$b = $this->db->where('id', $a->user_id)->get('app_anggota')->row();
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

	public function get_kodepinjaman()
	{
		$kode = $this->input->post('id');
		$hasil = $this->db->where('id', $kode)->get('app_pinjaman');

		foreach($hasil->result() as $row)
		{
			$angsuran = $row->total / $row->tempo;
			$data     = array("id_pinj" => $row->id, "tempo" => $row->tempo, "cicil" => $row->cicil, "total" => $row->total, "jumlah" => $row->jumlah, "pokok" => $angsuran, "jns_pinj" => $row->jns_pinj);
		}
		$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($data, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
		exit;
	}
	public function get_piutang_lalu()
	{
		$kode  = $this->input->post('id');
		$hasil = $this->db->where('user_id', $kode)->get('app_piutang_pinjaman')->row();
		if(empty($hasil->pokok_blm_terbayar) && empty($hasil->bunga_blm_terbayar))
		{
			$this->vars['status'] 	= 'info';
			$this->vars['title']  	= 'Mohon Maaf !';
			$this->vars['message'] 	= get_anggota($kode)->nama.'<br>Sudah Tidak Memiliki Piutang !';
		}
		else
		{
			$this->vars['tanggal'] 	= $hasil->tgl;
			$this->vars['pokok']  	= number_format($hasil->pokok_blm_terbayar, 0, ', ', '.');
			$this->vars['bunga'] 	= number_format($hasil->bunga_blm_terbayar, 0, ', ', '.');	
			$this->vars['kabehane'] = number_format($hasil->pokok_blm_terbayar + $hasil->bunga_blm_terbayar, 0, ', ', '.');		
		}
		$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
		exit;
	}
	public function formangsuran()
	{
		$this->vars['title'] 	= 'Angsuran Pinjaman';
		$this->vars['content'] 	= 'transaksi/angsuran/form-angsuran';
		$this->load->view('template/index', $this->vars);
	}
	public function add_angsuran()
	{
		if($this->input->is_ajax_request())
		{
			if($this->cek_kosongan())
			{
				$id_pinj 	= $this->input->post('id_pinj', TRUE);
				$tgl		= $this->input->post('tgl_trans', TRUE);
				$jenis		= $this->input->post('jenis', TRUE);
				$pokok		= str_replace(".", "", $this->input->post('pokok', TRUE));
				$bunga		= str_replace(".", "", $this->input->post('bunga', TRUE));
				$jumlah		= str_replace(".", "", $this->input->post('jumlah', TRUE));
				$token		= $this->input->post('app_token', TRUE);

				if($token = session('app_token'))
				{
					
					$hasil = $this->db->where('id', $id_pinj)->get('app_pinjaman')->row();

					if($jenis == 'pelunasan')
					{
						$cicil  = '0';
						$tempo  = '0';
						$status = 'lunas';
						$jumlah = $jumlah;

						$dataset = array(
								'jenis'		=> $jenis,
								'id_pinj'	=> $hasil->id,
								'tgl'		=> $tgl,
								'cicil'		=> $cicil,
								'jumlah'	=> $jumlah,
								'pokok'		=> $pokok,
								'bunga'		=> $bunga,
								'created_at' 	=> date('Y-m-d H:i:s'),
								'created_by' 	=> session('user_id')
						);
						$data    = array(
								'tempo'		=> $hasil->tempo - 1,
								'jumlah'	=> '',
								'status'	=> $status,
								'updated_at' 	=> date('Y-m-d H:i:s'),
								'updated_by' 	=> session('user_id')
						);
						$proses  = $this->model->insert('app_angsuran', $dataset);
						if($proses == TRUE)
						{
							$prosesa  = $this->model->update($id_pinj, 'app_pinjaman', $data) ? 'success' : 'error';
							$this->vars['status'] 	= $prosesa;
							$this->vars['title']  	= $prosesa == 'success' ? 'Berhasil !' : 'Maaf !';
							$this->vars['message'] 	= $prosesa == 'success' ? 'Data Pelunasan Berhasil Masuk !' : 'Data Pelunasan Gagal Tersimpan !';
						}
						else
						{
							$this->vars['status'] 	= 'error';
							$this->vars['title']  	= 'Upss !';
							$this->vars['message'] 	= 'Gagal Memasukkan Data !';
						}


					}
					else
					{
						$this->form_validation->set_rules('cicil', 'Cicilan Ke', 'trim|required');
						$cicil	= $this->input->post('cicil', TRUE);

						$dataset = array(
								'jenis'		=> $jenis,
								'id_pinj'	=> $id_pinj,
								'tgl'		=> $tgl,
								'cicil'		=> $cicil,
								'jumlah'	=> $jumlah,
								'pokok'		=> $pokok,
								'bunga'		=> $bunga,
								'created_at' 	=> date('Y-m-d H:i:s'),
								'created_by' 	=> session('user_id')
						);
						$data    = array(
								'tempo'		=> $hasil->tempo - 1,
								'jumlah'	=> $hasil->jumlah - $jumlah,
								'updated_at' 	=> date('Y-m-d H:i:s'),
								'updated_by' 	=> session('user_id')
						);
						$proses  = $this->model->insert('app_angsuran', $dataset);
						if($proses == TRUE)
						{
							$prosesa  = $this->model->update($id_pinj, 'app_pinjaman', $data) ? 'success' : 'error';
							$this->vars['status'] 	= $prosesa;
							$this->vars['title']  	= $prosesa == 'success' ? 'Berhasil !' : 'Maaf !';
							$this->vars['message'] 	= $prosesa == 'success' ? 'Data Angsuran Berhasil Masuk !' : 'Data Angsuran Gagal Tersimpan !';
						}
						else
						{
							$this->vars['status'] 	= 'error';
							$this->vars['title']  	= 'Upss !';
							$this->vars['message'] 	= 'Gagal Memasukkan Data !';
						}


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
	private function cek_kosongan()
	{
		$val = $this->form_validation;
		$val->set_rules('id_pinj', 'Pinjaman', 'trim|required');
		$val->set_rules('tgl_trans', 'Tanggal Transaksi', 'trim|required');
		$val->set_rules('jenis', 'Angsuran / Pelunasan', 'trim|required');
		$val->set_rules('jumlah', 'Nominal', 'trim|required');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		$val->set_message('required', '{field} mohon diisi');
		return $val->run();
	}
	public function formpelunasan()
	{
		$this->vars['title'] 	= 'Pelunasan / Perkas';
		$this->vars['content'] 	= 'transaksi/angsuran/form-pelunasan';
		$this->load->view('template/index', $this->vars);
	}
	public function pelunasan()
	{
		$this->vars['title'] 	= 'Pelunasan Pinjaman';
		$this->vars['content'] 	= 'transaksi/angsuran/data-pelunasan';
		$this->load->view('template/index', $this->vars);
	}

	public function get_data_pelunasan()
	{
		$tahun = tahun_buku()->periode;
		$draw = intval($this->input->get('draw'));
		$start = intval($this->input->get('start'));
		$length = intval($this->input->get('length'));
		$hasil = $this->db->where('akun_id', '3')->where('YEAR(tgl)', $tahun)->order_by('tgl', 'DESC')->get('app_transaksi');
		$data = [];
		$no = 1;
		foreach($hasil->result() as $row)
		{

			$data[] = array(
					$no++.'.',
					tgl_jabar($row->tgl),
					'<span class="kandel text-primary">'.$row->kode.'</span>',
					'<span style="white-space:normal">'.$row->keterangan.'</span>',
					'Rp. '.number_format($row->jumlah, 0, ",",".").'</span>',
					'Rp. '.number_format($row->pokok, 0, ",",".").'</span>',
					'Rp. '.number_format($row->bunga, 0, ",",".").'</span>',
					'<a href="javascript:void(0);" class="btn btn-warning rounded-pill px-1 btn-xs" title="Edit" data-href="'.base_url('transaksi/angsuran/edit/'.$row->kode).'" data-name="Edit Data" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="bx bx-pencil bx-xs"></i></a>
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
	public function transpelang()
	{
		$this->vars['title'] 	= 'Transaksi Pelunasan Pinjaman';
		$this->vars['content'] 	= 'transaksi/angsuran/data-pelunasan';
		$this->load->view('template/index', $this->vars);
	}
	
	public function detail($kode)
	{
		$this->vars['hasil'] = $this->db->where('kode', $kode)->get('app_transaksi');

		$this->load->view('transaksi/angsuran/detail-data-pelunasan', $this->vars);
	}	

}