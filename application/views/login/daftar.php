<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="login100-form">
	<span class="login100-form-title p-b-13"> <?php echo $this->lang->line('register'); ?> </span>
	<p class="text-center p-b-23 fs-15"><?php echo $this->lang->line('register_title'); ?></p>
	<input type="hidden" id="app_token" name="app_token" value="<?php echo session('app_token'); ?>">
	<div class="wrap-input100">
		<input type="email" class="input100" id="email" name="email">
		<span class="focus-input100"></span>
		<span class="label-input100">Alamat Email</span>
	</div>
	<div class="wrap-input100">
		<input type="text" class="input100" id="username" name="username">
		<span class="focus-input100"></span>
		<span class="label-input100">Username</span>
	</div>
	<div class="wrap-input100">
		<input type="password" class="input100" id="password" name="password">
		<span class="focus-input100"></span>
		<span class="label-input100"><?php echo $this->lang->line('password'); ?></span>
		<span class="toggle-password" id="mybutton" onclick="change(); return false;"><i id="adClass" class="fa-regular fa-eye-slash fa-1x fa-fw"></i></span>
	</div>
	<div class="wrap-input100">
		<input type="password" class="input100" id="conf_pass" name="conf_pass">
		<span class="toggle-password" id="mybutton1" onclick="change1(); return false;"><i id="adClass1" class="fa-regular fa-eye-slash fa-1x fa-fw"></i></span>
		<span class="focus-input100"></span>
		<span class="label-input100">Ulangi <?php echo $this->lang->line('password'); ?></span>
	</div>
	<div class="container-login100-form-btn p-t-20">
		<button class="login100-form-btn" id="lanjut" onclick="Daftar(); return false;">Kirim</button>
	</div>
	<div class="text-center p-t-26 p-b-2">
		<span class="txt2">Punya Akun ? <a href="<?php echo base_url(); ?>"> <?php echo $this->lang->line('login_page_btn'); ?></a></span>
	</div>
</div>
