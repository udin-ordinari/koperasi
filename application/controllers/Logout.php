<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$id = (int) session('user_id');
		$logout =  $this->session->sess_destroy();
		$this->users_model->reset_logged_in($id);
		$this->vars['message'] = '<span class="kandel tx-24">Berhasil Keluar.</span><br>Anda Akan Dialihkan';
		$this->output->set_content_type('application/json', 'utf-8')->set_output(json_encode($this->vars, JSON_HEX_APOS | JSON_HEX_QUOT))->_display();
		exit;
	}
 }
