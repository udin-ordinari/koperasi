<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	protected $vars = [];
	public const REQUIRED_FLAGS = JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT | JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES;
	public function __construct()
	{
		parent::__construct();
		$session['app_token'] 	= $this->token->get_token();
		$this->session->set_userdata($session);
		$this->vars['tahun'] 	= tahun_buku()->periode;
		$timezone 		= NULL !== get_instance()->session->userdata('timezone') ? get_instance()->session->userdata('timezone') : 'Asia/Jakarta';
		date_default_timezone_set($timezone);
	}
}
require_once(APPPATH.'/core/App_Controller.php');