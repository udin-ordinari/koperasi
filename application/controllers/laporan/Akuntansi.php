<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Akuntansi extends App_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->vars['page'] = 'Laporan';
	}
	public function neraca()
	{
		$this->vars['title'] 	    = 'Neraca';
		$this->vars['content']      = 'laporan/akuntansi/neraca';
		$this->load->view('templates/index', $this->vars);		
	}
	public function cashflow()
	{
		$this->vars['title'] 	    = 'Arus Kas';
		$this->vars['content']      = 'laporan/akuntansi/cashflow';
		$this->load->view('templates/index', $this->vars);
	}
	public function cashflow_usp()
	{
		$this->vars['page'] 		= 'Arus Kas USP (Usaha Simpan Pinjam)';
		$this->vars['title'] 	   	= 'Periode '. tahun_buku()->periode;
		$this->vars['content']      	= 'laporan/akuntansi/cashflow-usp';
		$this->load->view('templates/index', $this->vars);
	}
	public function cetak_cashflow($unit)
	{
		$this->vars['page'] 		= 'Arus Kas '.$unit;
		$this->vars['unit'] 		= $unit;
		$this->vars['title'] 	   	= 'Periode <strong>'. tahun_buku()->periode.'</strong>';
		$this->load->view('laporan/akuntansi/cetak-cashflow', $this->vars);
	}
	public function detail_kas_usp($month)
	{	
		$this->vars['bln']		= $month;
		$this->vars['page'] 		= 'Detail Arus Kas';
		$this->vars['title'] 	   	= 'USP (Usaha Simpan Pinjam) Periode <strong>'. tahun_buku()->periode.'</strong>';
		$this->vars['content']      	= 'laporan/akuntansi/detail-cashflow-usp';
		$this->load->view('templates/index', $this->vars);		
	}
	public function cashflow_induk()
	{
		$this->vars['page'] 		= 'Arus Kas INDUK';
		$this->vars['title'] 	   	= 'Periode '. tahun_buku()->periode;
		$this->vars['content']      	= 'laporan/akuntansi/cashflow-induk';
		$this->load->view('templates/index', $this->vars);
	}
	public function detail_kas_induk($month)
	{	
		$this->vars['bln']		= $month;
		$this->vars['page'] 		= 'Detail Arus Kas';
		$this->vars['title'] 	   	= 'Unit Usaha Induk Periode';
		$this->vars['content']      	= 'laporan/akuntansi/detail-cashflow-induk';
		$this->load->view('templates/index', $this->vars);		
	}
	public function lossprofit()
	{
		$this->vars['title'] 	    = 'Laba - Rugi';
		$this->vars['content']      = 'laporan/akuntansi/laba-rugi';
		$this->load->view('templates/index', $this->vars);
	}

	public function aph()
	{
		$this->vars['title'] 	    = 'Akumulasi Penyusutan Harta';
		$this->vars['content']      = 'laporan/akuntansi/penyusutan';
		$this->load->view('templates/index', $this->vars);		
	}

	public function phu()
	{
		$this->vars['title'] 	    = 'Perhitungan Hasil Usaha';
		$this->vars['content']      = 'laporan/akuntansi/formula-shu';
		$this->load->view('templates/index', $this->vars);		
	}

	public function shu()
	{
		$this->vars['title'] 	    = 'Sisa Hasil Usaha';
		$this->vars['content']      = 'laporan/akuntansi/sisa-usaha';
		$this->load->view('templates/index', $this->vars);		
	}
	public function neraca_print()
	{
		$this->vars['title'] 	    = 'Neraca';
		$this->load->view('laporan/akuntansi/cetak-neraca', $this->vars);
	}
	public function detail_cetak($month)
	{
		$this->vars['title'] 	    = 'Arus Kas USP';
		$this->vars['bln'] 	    = $month;
		$this->load->view('laporan/akuntansi/cetak-detail-arus-kas', $this->vars);
	}
}
