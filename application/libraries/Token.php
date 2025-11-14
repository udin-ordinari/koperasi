<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Token {

	protected $CI;
	private $token;
	private $old_token;
	public function __construct()
	{
		$this->CI = &get_instance();
		if (NULL !== session('app_token'))
		{
			$this->old_token = session('app_token');
		}
	}

	private function set_token()
	{
		$ip = $_SERVER['REMOTE_ADDR'];
		$uniqid = uniqid(mt_rand(), true);
		return md5($ip . $uniqid);
	}
	public function get_token()
	{
		$this->token = $this->set_token();
		$this->CI->session->set_userdata('app_token', $this->token);
		return $this->token;
	}

	public function is_valid_token($token)
	{
		return $this->old_token;
	}
}
