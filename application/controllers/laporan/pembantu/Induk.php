<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Induk extends App_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->vars['page'] 	    = 'Laporan Pembantu';
	}
	public function index()
	{

	}
	public function bukukas()
	{

		$this->vars['title'] 	    = 'Buku Kas';
		$this->vars['content']      = 'laporan/pembantu/induk/buku-kas';
		$this->load->view('templates/index', $this->vars);
	}
	public function bk_masuk()
	{
		$this->vars['title'] 	    = 'Buku Kas Masuk';
		$this->vars['content']      = 'laporan/pembantu/induk/buku-kas-masuk';
		$this->load->view('templates/index', $this->vars);
	}

}
