<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends App_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->vars['title'] = 'Dashboard';
	}
	public function index()
	{
		if(session('level') == '1') 
		{
			redirect('superuser');
		}
		if(session('level') == '5') 
		{
			redirect('nasabah/dashboard');
		}
		else
		{
			$this->vars['title']			= 'Dashboard';
			$this->vars['content']			= 'app/dashboard';
			$this->vars['pemasukanPerBulan']    	= $this->transaksi->getSimpananPerBulan();
			$this->vars['pengeluaranPerBulan']      = $this->transaksi->getPinjamanPerBulan();
			$this->vars['angsuranPerBulan']    	= $this->transaksi->getAngsuranPerBulan();
			$this->vars['penarikanPerBulan']        = $this->transaksi->getPenarikanPerBulan();	
			$this->load->view('templates/index', $this->vars);
		}
	}

}
