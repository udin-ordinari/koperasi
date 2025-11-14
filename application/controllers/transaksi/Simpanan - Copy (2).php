<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Simpanan extends App_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->vars['page']	= 'Daftar';
	}	
	public function index()
	{
		redirect('transaksi/simpanan/data_simpanan');
	}
	public function data_simpanan()
	{
		$this->vars['title']	= 'Simpanan Anggota';
		$this->vars['content']  = 'transaksi/simpanan/data-simpanan';
		$this->load->view('templates/index', $this->vars);
	}
	public function get_data_simpanan()
	{
		$draw 	= intval($this->input->get('draw'));
		$start 	= intval($this->input->get('start'));
		$length = intval($this->input->get('length'));
		$hasil 	= $this->db->where('is_deleted', '0')->group_by('user_id')->get('app_simpanan');
		$data 	= [];
		$no 	= 1;
		foreach($hasil->result() as $row)
		{
			$pokok 		= $this->db->select_sum('jumlah', 'total')->where('user_id', $row->user_id)->where('jns_simp', '1')->where('is_deleted', '0')->get('app_simpanan')->row();
			$wajib 		= $this->db->select_sum('jumlah', 'total')->where('user_id', $row->user_id)->where('jns_simp', '2')->where('is_deleted', '0')->get('app_simpanan')->row();
			$swp   		= $this->db->select_sum('jumlah', 'total')->where('user_id', $row->user_id)->where('jns_simp', '4')->where('is_deleted', '0')->get('app_simpanan')->row();
			$sukarela   	= $this->db->select_sum('jumlah', 'total')->where('user_id', $row->user_id)->where('jns_simp', '3')->where('is_deleted', '0')->get('app_simpanan')->row();
			$suka		= $sukarela->total - tarikan_sukarela($row->user_id)->total;
			$jasanya	= $suka * jasa_sukarela();

			$data[] = array(
					$no++.'.',
					get_anggota($row->user_id)->nama,
					get_cabang(get_anggota($row->user_id)->cabang)->nama,
					'Rp. '.number_format((int)$pokok->total, 0, ', ', '.'),
					'Rp. '.number_format((int)$wajib->total, 0, ', ', '.'),
					'Rp. '.number_format((int)$swp->total, 0, ', ', '.'),
					'Rp. '.number_format((int)$pokok->total + $wajib->total + $swp->total, 0, ', ', '.'),
					'Rp. '.number_format((int)$suka, 0, ', ', '.'),
					'Rp. '.number_format((int)$jasanya, 0, ', ', '.'),
					'Rp. '.number_format((int)$pokok->total + $wajib->total + $swp->total + $suka + $jasanya, 0, ', ', '.'),
					'<button class="btn btn-info btn-sm" title="Lihat Detail" data-href="'.base_url('transaksi/simpanan/detail_simpanan/'.$row->user_id).'" data-name="Detail Data" data-bs-toggle="modal" data-bs-target="#modalKing"><i class="fa fa-eye fa-fw fa-1x"></i></button>
					<button class="btn btn-warning btn-sm" title="Edit" onclick="Peringatan('.$row->user_id.');"><i class="fa fa-pencil fa-fw fa-1x"></i></button>
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

	public function form_simpanan()
	{
		$this->vars['title']	= 'Simpanan Anggota';
		$this->vars['content']  = 'transaksi/simpanan/form-simpanan';
		$this->load->view('templates/index', $this->vars);
	}

	public function add_simpanan()
	{
		if($this->input->is_ajax_request())
		{
			if($this->validasi())
			{
				$oto		= $this->sistem->kodesimpanan();
				$userid	 	= $this->input->post('userid', TRUE);
				$tgl		= $this->input->post('tgl_trans', TRUE);
				$simp		= $this->input->post('jns_simp', TRUE);
				$awal		= $this->input->post('saldo_awal', TRUE);
				$jumlah		= str_replace(".", "", $this->input->post('jumlah', TRUE));

				$token		= $this->input->post('app_token', TRUE);

				if($token = session('app_token'))
				{
					$tanggal = date('m', strtotime($tgl));
					$query   = $this->db->where('MONTH(tgl)', $tgl)->where('YEAR(tgl)', $tgl)->where('user_id', $userid)->where('jns_simp', $simp)->where('jumlah', $jumlah)->get('app_simpanan');

					if($query->num_rows() > 0)
					{
						$data = $query->row();
						if($data->jns_simp == $data->jns_simp and $data->saldo_awal == '1')
						{
							$this->vars['status'] = 'info';
							$this->vars['title']  = 'Maaf !';
							$this->vars['message']= get_jenis_simpanan($data->jns_simp)->nama.' Sudah Ada !'; 
						}
						else
						{
							$this->vars['status'] = 'info';
							$this->vars['title']  = 'Perhatian !';
							$this->vars['message']= get_jenis_simpanan($data->jns_simp)->nama.' '.bulan(date('m', strtotime($data->tgl))).' Sudah Ada !'; 
						}
					}
					else
					{
						$tanggal = date('y', strtotime($tgl)).''.date('m', strtotime($tgl)).''.date('d', strtotime($tgl));
						$dataset = array(
									'kode'		=> 'SMP-'.$tanggal.'-'.$oto,
									'tgl'		=> $tgl,
									'user_id'	=> $userid,
									'jns_simp'	=> $simp,
									'jumlah'	=> $jumlah,
									'saldo_awal'	=> $awal,
									'created_at' 	=> date('Y-m-d H:i:s'),
									'created_by' 	=> session('user_id')
					    		);
						$proses  = $this->db->insert('app_simpanan', $dataset) ? 'success' : 'error';

						$this->vars['status'] 	= $proses;
						$this->vars['title']  	= $proses == 'success' ? 'Berhasil !' : 'Upss !';
						$this->vars['message'] 	= $proses == 'success' ? 'Data Berhasil Masuk !' : 'Gagal Memasukkan Data !';
					}
				
				}
			}
			else
			{
				$this->vars['status'] 	= 'warning';
				$this->vars['title'] 	= 'Waduh !';
				$this->vars['message'] 	= validation_errors();
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
			exit;
		}
	}
	private function validasi()
	{
		$val = $this->form_validation;
		$val->set_rules('userid', 'Anggota', 'trim|required');
		$val->set_rules('tgl_trans', 'Tanggal Transaksi', 'trim|required');
		$val->set_rules('jns_simp', 'Jenis Simpanan', 'trim|required');
		$val->set_rules('saldo_awal', 'Saldo Awal', 'trim|required');
		$val->set_rules('jumlah', 'Nominal Simpanan', 'trim|required');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		$val->set_message('required', '{field} mohon diisi');
		return $val->run();
	}

	public function detail_simpanan($id)
	{
		$this->vars['title']   		= 'Detail Simpanan Anggota';
		$this->vars['simpanan'] 	= $this->db->where('user_id', $id)->get('app_simpanan')->row();
		$this->vars['anggota'] 		= $this->db->where('id', $id)->get('app_anggota')->row();
		$this->load->view('transaksi/simpanan/detail-simpanan-anggota', $this->vars);
	}
	public function edit_simpanan($id)
	{
		$this->vars['title']   	= 'Simpanan Anggota';
		$this->vars['simpanan'] = $this->db->where('user_id', $id)->get('app_simpanan');
		$this->vars['anggota'] 	= $this->db->where('id', $id)->get('app_anggota')->row();
		$this->vars['content'] = 'transaksi/simpanan/edit-simpanan-anggota';
		$this->load->view('templates/index', $this->vars);
	}
	public function proses_edit_simpanan()
	{
		if($this->input->is_ajax_request())
		{
			$id		= $this->input->post('id', TRUE);
			$tgl		= $this->input->post('tgl', TRUE);
			$jml		= str_replace(".", "", $this->input->post('jumlah', TRUE));
			$token		= $this->input->post('app_token', TRUE);

			if($token = session('app_token'))
			{	
				foreach ($id as $key => $value) {
            				$data[] = [
                				'id'       => $value,
						'tgl' 	   => $tgl[$key],
						'jumlah'   => $jml[$key],
            				];
        			}

				$proses  = $this->sistem->batch_data('app_simpanan', $data, 'id') ? 'true' : 'false';

				$this->vars['status'] 	= $proses;
				$this->vars['title'] 	= $proses == 'true' ? 'Berhasil !' : 'Upss !';
				$this->vars['message'] 	= $proses == 'true' ? 'Simpanan Berhasil Disimpan !' : 'Gagal Menyimpan Simpanan Wajib !';


			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
			exit;
		}
	}

	public function penarikan()
	{
		$this->vars['title']   = 'Penarikan Simpanan';
		$this->vars['content'] = 'transaksi/simpanan/data-tarikan';
		$this->load->view('templates/index', $this->vars);
	}
	public function get_data_tarikan()
	{
		$draw = intval($this->input->get('draw'));
		$start = intval($this->input->get('start'));
		$length = intval($this->input->get('length'));
		$tahun = tahun_buku()->periode;
		$hasil = $this->db->get('app_penarikan');
		$data = [];
		$no = 1;
		foreach($hasil->result() as $row)
		{
			$a = $this->db->where('id', $row->user_id)->get('app_anggota')->row();
			$data[] = array(
					$no++.'.',
					tgl_jabar($row->tgl),
					$a->nama,
					get_cabang($a->cabang)->nama,
					'Rp. '.number_format($row->jumlah, 0, ', ', '.').'</span>',
					$row->keterangan);
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

	public function tarikan()
	{
		$this->vars['pagetitle']    = 'Form';
		$this->vars['title'] 	    = 'Penarikan Simpanan Anggota';
		$this->vars['content']      = 'transaksi/simpanan/form-tarikan';
		$this->load->view('templates/index', $this->vars);
	}

	public function proses_penarikan()
	{
		if($this->input->is_ajax_request())
		{
			$kodeoto	= $this->sistem->kodepenarikan();
			$user	 	= $this->input->post('userid', TRUE);
			$tgl		= $this->input->post('tgl_trans', TRUE);
			$desc		= $this->input->post('keterangan', TRUE);
			$jumlah		= str_replace(".", "", $this->input->post('jumlah', TRUE));

			$token		= $this->input->post('app_token', TRUE);
			if($token = session('app_token'))
			{
				$dataset = array(
						'kode'		=> $kodeoto,
						'user_id'	=> $user,
						'tgl'		=> date('Y-m-d', strtotime($tgl)),
						'jumlah'	=> $jumlah,
						'keterangan'	=> $desc,
						'created_at' 	=> date('Y-m-d H:i:s'),
						'created_by' 	=> session('user_id')
					    );
				$proses  = $this->db->insert('app_penarikan', $dataset) ? 'success' : 'error';
				$this->vars['status'] 	= $proses;
				$this->vars['title']  	= $proses == 'success' ? 'Berhasil !' : 'Upss !';
				$this->vars['message'] 	= $proses == 'success' ? 'Penarikan Simpanan Berhasil Diproses !' : 'Gagal Memproses Penarikan Simpanan !';
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
			exit;
		}
	}

	public function penutupan()
	{
		$this->vars['pagetitle']    = 'Form';
		$this->vars['title'] 	    = 'Penutupan Simpanan Anggota';
		$this->vars['content']      = 'transaksi/simpanan/form-penutupan';
		$this->load->view('templates/index', $this->vars);
	}
	public function proses_penutupan_simpanan()
	{
		if($this->input->is_ajax_request())
		{
			if($this->cek_valid())
			{
				$kodeoto	= $this->sistem->kodepenutupan();
				$user	 	= $this->input->post('userid', TRUE);
				$tgl		= $this->input->post('tgl_trans', TRUE);
				$desc		= str_replace(" ", "<br>", $this->input->post('keterangan', TRUE));
				$jumlah		= str_replace(".", "", $this->input->post('kabeh', TRUE));
				$token		= $this->input->post('app_token', TRUE);
				if($token = session('app_token'))
				{
					$dataset = array(
						'kode'		=> "PNS-".date("y", strtotime($tgl)).''.date("m", strtotime($tgl)).''.date("d", strtotime($tgl)).'-'.$kodeoto,
						'tgl'		=> $tgl,
						'user_id'	=> $user,
						'jumlah'	=> $jumlah,
						'keterangan'	=> $desc,
						'created_at' 	=> date('Y-m-d H:i:s'),
						'created_by' 	=> session('user_id')
					);
					$proses  = $this->db->insert('app_penutupan', $dataset);
					if($proses)
					{
						$data	 = array('updated_at' => date('Y-m-d H:i:s'),'updated_by' => session('user_id'), 'is_deleted' => '1');
						$lakukan = $this->db->where('user_id', $user)->update('app_simpanan', $data) ? 'success' : 'error';
						$datanya = array('status' => 'nonaktif');
						$setaktif= $this->db->where('id', $user)->update('app_anggota', $datanya) ? 'success' : 'error';
						$this->vars['status'] 	= $lakukan;
						$this->vars['title']  	= $lakukan == 'success' ? 'Berhasil !' : 'Upss !';
						$this->vars['message'] 	= $lakukan == 'success' ? 'Penutupan Rekening Simpanan Berhasil Ditutup !' : 'Gagal Memproses Penutupan Simpanan !';
					}
					else
					{
						$this->vars['status'] 	= 'info';
						$this->vars['title'] 	= 'Waduh !';
						$this->vars['message'] 	= 'Gagal Memproses Penutupan Simpanan !';
					}
				}
			}
			else
			{
				$this->vars['status'] 	= 'warning';
				$this->vars['title'] 	= 'Waduh !';
				$this->vars['message'] 	= validation_errors();
			}
			$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
			exit;
		}
	}
	private function cek_valid()
	{
		$val = $this->form_validation;
		$val->set_rules('userid', 'Anggota', 'trim|required');
		$val->set_rules('tgl_trans', 'Tanggal Transaksi', 'trim|required');
		$val->set_rules('keterangan', 'Alasan Penutupan Simpanan', 'trim|required');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		$val->set_message('required', '{field} mohon diisi');
		return $val->run();
	}

}