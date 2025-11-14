<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Simpanan extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->vars['page'] = 'Laporan';
	}

	public function index()
	{
		//$this->vars['title'] 	    = 'Daftar Simpanan Anggota';
		//$this->vars['content']      = 'laporan/simpanan/data-simpanan';
		//$this->load->view('template/index', $this->vars);


		$this->vars['title'] 	    = 'Daftar Simpanan Anggota';
		$this->vars['content']      = 'laporan/anggota/master-simpanan';
		$this->load->view('template/index', $this->vars);


	}
	public function get_data_simp()
	{
		$draw = intval($this->input->get('draw'));
		$start = intval($this->input->get('start'));
		$length = intval($this->input->get('length'));
		$hasil = $this->db->group_by('user_id')->get('app_simpanan');
		$data = [];
		$no = 1;
		foreach($hasil->result() as $row)
		{
			$user = $this->db->where('id', $row->user_id)->get('app_nasabah')->row();
			$tipe = $this->db->where('id', $row->jns_simp)->get('app_jns_simp')->row();
			
			if($row->jns_simp == '1')
			{
				$jns = $this->db->where('jns_simp', $row->jns_simp)->get('app_simpanan');	
			}
			$pokok  = $this->model->RowObject('nama', 'iuran-sw', 'app_jasa')->isi;
			$jasass = $this->model->RowObject('nama', 'jasa-ss', 'app_jasa')->isi;
			$sw	= $this->db->where('user_id', $row->user_id)->where('jns_simp', '2')->limit(1)->get('app_simpanan');
			if ($sw->num_rows() === 1)
			{
				$result = $sw->row();
				$simw = $result->jumlah;
			}
			else
			{
				$simw = '0';
			}
			$ss	= $this->db->where('user_id', $row->user_id)->where('jns_simp', '3')->limit(1)->get('app_simpanan');
			if ($ss->num_rows() === 1)
			{
				$result = $ss->row();
				$simss = $result->jumlah;
			}
			else
			{
				$simss = '0';
			}
			$swp	= $this->db->where('user_id', $row->user_id)->where('jns_simp', '4')->limit(1)->get('app_simpanan');
			if ($swp->num_rows() === 1)
			{
				$result = $swp->row();
				$simswp = $result->jumlah;
			}
			else
			{
				$simswp = '0';
			}
			$jum = $simw + $simswp + $pokok;
			$jasa = $simss / 100 * $jasass * 10;
			$tot = $jum + $jasa + $simss;
			$data[] = array(
					$no++.'.',
					$user->nama,
					'Rp. '.number_format($pokok,0,',','.'),	
					'Rp. '.number_format($simw,0,',','.'),
					'Rp. '.number_format($simswp,0,',','.'),
					'Rp. '.number_format($jum,0,',','.'),
					'Rp. '. number_format($simss,0,",","."),
					'Rp. '. number_format($jasa,0,",","."),
					'Rp. '. number_format($simss + $jasa,0,",","."),
					'Rp. '. number_format($tot,0,",","."),
					'<a href="javascript:void(0);" class="btn btn-warning rounded-pill btn-xs" data-href="'.base_url().'"master/barang/edit_barang/"'.$row->id.'" data-name="Edit Data" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="bx bx-pencil bx-xs"></i></a>
					&nbsp;<a href="javascript:void(0);" class="btn btn-danger rounded-pill btn-xs" data-name="Hapus Data" data-bs-toggle="modal" data-bs-target="#HapusModal"><i class="bx bx-trash bx-xs"></i></a>
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
}