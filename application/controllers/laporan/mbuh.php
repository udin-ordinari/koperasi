<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kas extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->vars['page'] 	    = 'Laporan';
		$this->vars['title'] 	    = 'Cashflow';
		$this->vars['content']      = 'laporan/kas';
		$this->load->view('template/index', $this->vars);
	}
	public function buku_kas()
	{
		$this->vars['page'] 	    = 'Laporan Pembantu';
		$this->vars['title'] 	    = 'Buku Kas';
		$this->vars['content']      = 'laporan/pembantu/buku-kas';
		$this->load->view('template/index', $this->vars);
	}
	public function bkk()
	{
		$this->vars['page'] 	    = 'Laporan Pembantu';
		$this->vars['title'] 	    = 'Buku Kas Keluar';
		$this->vars['content']      = 'laporan/pembantu/buku-kas-keluar';
		$this->load->view('template/index', $this->vars);
	}
	public function bkm()
	{
		$this->vars['page'] 	    = 'Laporan Pembantu';
		$this->vars['title'] 	    = 'Buku Kas Masuk';
		$this->vars['content']      = 'laporan/pembantu/buku-kas-masuk';
		$this->load->view('template/index', $this->vars);
	}
	public function bhk()
	{
		$this->vars['page'] 	    = 'Laporan Pembantu';
		$this->vars['title'] 	    = 'Buku Harian Kas';
		$this->vars['content']      = 'laporan/pembantu/buku-kas-harian';
		$this->load->view('template/index', $this->vars);
	}
	public function rhk()
	{
		$this->vars['page'] 	    = 'Laporan Pembantu';
		$this->vars['title'] 	    = 'Rekapitulasi Harian Kas';
		$this->vars['content']      = 'laporan/pembantu/buku-rekap-harian';
		$this->load->view('template/index', $this->vars);
	}
	public function bb()
	{
		$this->vars['page'] 	    = 'Laporan Pembantu';
		$this->vars['title'] 	    = 'Buku Besar';
		$this->vars['content']      = 'laporan/pembantu/buku-rekap-harian';
		$this->load->view('template/index', $this->vars);
	}
	public function phu()
	{
		$this->vars['page'] 	    = 'Laporan Pembantu';
		$this->vars['title'] 	    = 'Perhitungan Hasil Usaha';
		$this->vars['content']      = 'laporan/pembantu/buku-rekap-harian';
		$this->load->view('template/index', $this->vars);
	}
	public function cashflow()
	{
		$this->vars['page'] 	    = 'Laporan';
		$this->vars['title'] 	    = 'Cashflow';
		$this->vars['content']      = 'laporan/akuntansi/kas';
		$this->load->view('template/index', $this->vars);
	}
	public function usp()
	{
		$this->vars['page'] 		= 'Laporan Kas USP (Usaha Simpan Pinjam)';
		$this->vars['title'] 	   	= 'Cash Flow (Arus Kas) Periode <strong>'. session('thn_buku')->periode.'</strong>';
		$this->vars['content']      	= 'laporan/akuntansi/cashflow-usp';
		$this->load->view('template/index', $this->vars);
	}
	public function detail_kas_usp($month)
	{	
		$this->vars['bln']		= $month;
		$this->vars['page'] 		= 'Detail Cash Flow (Arus Kas)';
		$this->vars['title'] 	   	= 'USP (Usaha Simpan Pinjam) Periode <strong>'. session('thn_buku')->periode.'</strong>';
		$hasil				= $this->db->where('MONTH(tgl)', $month)->get('app_transaksi');
		$this->vars['content']      	= 'laporan/detail-cashflow-usp';
		$this->load->view('template/index', $this->vars);		
	}
	public function induk()
	{
		$this->vars['page'] 		= 'Laporan Kas INDUK';
		$this->vars['title'] 	    	= 'Cash Flow (Arus Kas) Periode <strong>'. session('thn_buku')->periode.'</strong>';
		$this->vars['content']      	= 'laporan/cashflow-induk';
		$this->load->view('template/index', $this->vars);
	}
	public function detail_kas_induk($month)
	{	
		$this->vars['bln']		= $month;
		$this->vars['page'] 		= 'Detail Cash Flow (Arus Kas)';
		$this->vars['title'] 	   	= 'Unit Usaha Induk Periode <strong>'. session('thn_buku')->periode.'</strong>';
		$hasil				= $this->db->where('MONTH(tgl)', $month)->get('app_transaksi');
		$this->vars['content']      	= 'laporan/detail-cashflow-usp';
		$this->load->view('template/index', $this->vars);		
	}
	public function neraca()
	{
		$this->vars['page'] 	    = 'Laporan';
		$this->vars['title'] 	    = 'Neraca';
		$this->vars['content']      = 'laporan/neraca';
		$this->load->view('template/index', $this->vars);
	}
	public function rugilaba()
	{
		$this->vars['page'] 	    = 'Laporan';
		$this->vars['title'] 	    = 'Laba Rugi';
		$this->vars['content']      = 'laporan/laba-rugi';
		$this->load->view('template/index', $this->vars);
	}
	public function penyusutan()
	{
		$this->vars['page'] 	    = 'Laporan';
		$this->vars['title'] 	    = 'Penyusutan APH';
		$this->vars['content']      = 'laporan/penyusutan';
		$this->load->view('template/index', $this->vars);
	}
	public function perhitungan_shu()
	{
		$this->vars['page'] 	    = 'Laporan';
		$this->vars['title'] 	    = 'Formula Perhitungan SHU';
		$this->vars['content']      = 'laporan/formula-shu';
		$this->load->view('template/index', $this->vars);
	}
	public function shu()
	{
		$this->vars['page'] 	    = 'Laporan';
		$this->vars['title'] 	    = 'Sisa Hasil Usaha (SHU)';
		$this->vars['content']      = 'laporan/sisa-usaha';
		$this->load->view('template/index', $this->vars);
	}
}
