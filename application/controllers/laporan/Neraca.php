<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Neraca extends App_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->vars['page'] 	    = 'Laporan';
		$this->vars['title'] 	    = 'Neraca';
		$this->vars['content']      = 'laporan/akuntansi/neraca';
		$this->load->view('templates/index', $this->vars);
	}

}
