<?php defined('BASEPATH') OR exit('No direct script access allowed');

class App_Controller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->authentication->restrict();
		$this->load->model('App_menu_model');
		$this->vars['tahun'] 	= tahun_buku()->periode;
	}

}
