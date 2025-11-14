<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="login100-form">
	<span class="login100-form-title p-b-13"> <?php echo $this->lang->line('lupa_pass'); ?> </span>
	<p class="text-center p-b-23 fs-15"><?php echo $this->lang->line('lupa_pass_title'); ?></p>
	<input type="hidden" id="app_token" name="app_token" value="<?php echo session('app_token'); ?>">
	<div class="wrap-input100">
		<input type="email" class="input100" id="email" name="email">
		<span class="focus-input100"></span>
		<span class="label-input100">Username / Email</span>
	</div>
	<div class="container-login100-form-btn p-t-20">
		<button class="login100-form-btn" id="lupa" onclick="Forgot(); return false;"><?php echo $this->lang->line('lupa_pass_btn'); ?></button>
	</div>
	<div class="text-center p-t-26 p-b-2">
		<span class="txt2"><?php echo $this->lang->line('login_page'); ?><a href="<?php echo base_url(); ?>"> <?php echo $this->lang->line('login_page_btn'); ?></a></span>
	</div>
</div>
