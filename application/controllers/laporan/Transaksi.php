<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends Admin_Controller {

	public function index()
	{
		
	}
	public function laba_rugi()
	{
		$this->vars['title'] 	    = 'Pembelian Langsung';
		$this->vars['content']      = 'app/master_nasabah';
		$this->load->view('template/index', $this->vars);
	}
	public function cashflow()
	{
		$this->vars['title'] 	    = 'Pembelian Langsung';
		$this->vars['content']      = 'app/master_nasabah';
		$this->load->view('template/index', $this->vars);
	}
}
