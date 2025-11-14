<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="login100-form">
	<span class="login100-form-title p-b-13"> <?php echo $title; ?> </span>
	<p class="text-center p-b-23 fs-15"><?php echo $this->lang->line('login_message'); ?></p>
	<input type="hidden" id="app_token" name="app_token" value="<?php echo session('app_token'); ?>">
	<div class="wrap-input100">
		<input type="text" class="input100" id="identity" name="identity">
		<span class="focus-input100"></span>
		<span class="label-input100"><?php echo $this->lang->line('username'); ?></span>
	</div>
	<div class="wrap-input100 position-relative">
		<input type="password" class="input100" id="password" name="password">
		<span class="focus-input100"></span>
		<span class="label-input100"><?php echo $this->lang->line('password'); ?></span>
		<span class="toggle-password" id="mybutton" onclick="change(); return false;"><i id="adClass" class="fa-regular fa-eye-slash fa-1x fa-fw"></i></span>
	</div>
	<div class="w-full p-t-3 p-b-12 text-end">
		<a href="lupa-password" class="txt1"><?php echo $this->lang->line('lupa_pass'); ?></a>
	</div>
	<div class="container-login100-form-btn">
		<button class="login100-form-btn" id="masuk" onclick="Login(); return false;"><?php echo $this->lang->line('login_page_btn'); ?></button>
	</div>
	<div class="text-center p-t-26 p-b-2">
		<span class="txt2"><?php echo $this->lang->line('register_title'); ?> <a href="daftar"><?php echo $this->lang->line('register'); ?></a></span>
	</div>
</div>
