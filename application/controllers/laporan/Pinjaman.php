<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjaman extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->vars['page'] = 'Laporan';
	}

	public function index()
	{
		$this->vars['title'] 	    = 'Data Pinjaman';
		$this->vars['content']      = 'laporan/kas';
		$this->load->view('template/index', $this->vars);
	}

	public function get_data()
	{
		$draw = intval($this->input->get('draw'));
		$start = intval($this->input->get('start'));
		$length = intval($this->input->get('length'));
		$hasil = $this->db->query("SELECT * FROM app_kas");
		$data = [];
		$no = 1;
		foreach($hasil->result() as $row)
		{
			$tipe = $this->db->where('id', $row->tipe)->get('app_type')->row();
			
			$data[] = array($no++.'.', $tipe->kode, $tipe->nama, 'Rp. '. number_format($row->jumlah,0,",","."), $row->keterangan, '<a href="javascript:void(0);" class="btn btn-warning rounded-pill btn-xs" data-href="'.base_url().'"master/barang/edit_barang/"'.$row->id.'" data-name="Edit Data" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="bx bx-pencil bx-xs"></i></a>&nbsp;<a href="javascript:void(0);" class="btn btn-danger rounded-pill btn-xs" data-name="Hapus Data" data-bs-toggle="modal" data-bs-target="#HapusModal"><i class="bx bx-trash bx-xs"></i></a>');
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