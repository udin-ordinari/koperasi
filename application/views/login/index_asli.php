<?php echo doctype(); ?>

<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<title><?php echo isset($title) ? $title : 'Login'; ?> | <?php echo get_setting('aplikasi'); ?> "<?php echo get_setting('nama_aplikasi'); ?>"</title>
	<?php echo meta('keywords', get_setting('meta_keywords')); ?>
	<?php echo meta('description', get_setting('meta_description')); ?>
	<?php echo meta('author', get_setting('author')); ?>
	<?php echo meta('robots', 'noindex,nofollow'); ?>
	<link rel="icon" href="<?php echo base_url('assets/img/'.get_setting('favicon'));?>" type="image/x-icon">
	<link rel="canonical" href="<?php echo base_url(); ?>" />
	<meta property="og:title" content="<?php echo get_setting('aplikasi'); ?> <?php echo get_setting('nama_aplikasi'); ?>" />
	<meta property="og:description" content="<?php echo get_setting('meta_description'); ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?php echo base_url(); ?>" />
	<meta property="og:image" content="<?php echo base_url('assets/img/logo.png'); ?>" />
	<meta name="twitter:card" content="<?php echo base_url(); ?>" />
	<meta name="twitter:title" content="<?php echo get_setting('aplikasi'); ?> <?php echo get_setting('nama_aplikasi'); ?>" />
	<meta name="twitter:description" content="<?php echo get_setting('meta_description'); ?>" />
	<meta name="twitter:image" content="<?php echo base_url('assets/img/logo.png'); ?>" />
	<?php echo link_tag('assets/css/bootstrap.min.css');?>
	<?php echo link_tag('assets/plugins/fontawesome/css/all.css');?>
	<?php echo link_tag('assets/css/animate.css');?>	
	<?php echo link_tag('assets/css/util.css');?>
	<?php echo link_tag('assets/css/main.css');?>
	<?php echo link_tag('assets/css/loader.css');?>
	<?php echo link_tag('assets/plugins/sweet-alert/sweetalert2.css');?>
	<?php echo link_tag('assets/plugins/jBox/dist/jBox.all.min.css'); ?>


	<script> localStorage.clear(); </script>
</head>
<body style="background-color: #666666;">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<?php $this->load->view($content); ?>
			</div>
			<div class="login100-more" style="background-image: url(<?php echo base_url('assets/img/login-bg.png'); ?>);"></div>
		</div>
	</div>
</div>
<?php echo script_tag('assets/plugins/jquery/jquery-3.7.1.min.js'); ?>
<?php echo script_tag('assets/plugins/jBox/dist/jBox.all.min.js');?>
<?php echo script_tag('assets/js/popper.js'); ?>
<?php echo script_tag('assets/js/bootstrap.min.js'); ?>
<?php echo script_tag('assets/js/moment.min.js'); ?>
<?php echo script_tag('assets/js/main.js'); ?>
<?php echo script_tag('assets/plugins/sweet-alert/sweetalert2.js'); ?>
<script type="text/javascript">
//document.oncontextmenu = function(){return false;};
function change()
{
	var x = document.getElementById('password').type;
	if (x == 'password')
	{
		document.getElementById('password').type = 'text';
		$('#adClass').addClass('fa-eye');
		$('#adClass').removeClass('fa-eye-slash');
	}
	else
	{
		document.getElementById('password').type = 'password';
		$('#adClass').addClass('fa-eye-slash');
		$('#adClass').removeClass('fa-eye');
	}
}
function Login()
{
	$('#masuk, #identity, #password').attr('disabled', 'disabled');
	$("#masuk").html('<div class="light-loader1" role="status"><span class="sr-only"></span></div>');
	var values = {app_token: $('#app_token').val(), identity: $('#identity').val(), password: $('#password').val()};
	$.post("<?php echo base_url('verifikasi');?>", values, function(response)
	{
		var res = response;

		if (res.status == 'green')
		{
			$('#masuk').text('Masuk');
			//new jBox('Notice', {attributes: {x: 'right', y: 'top'}, stack: false, animation: 'flip', showCountdown: false, color: res.status, title: res.title, content: res.message});
			//Lobibox.notify(res.status, {title: true, delayIndicator: false, position: 'top right', icon: true, msg: res.message});
			//setTimeout(function()
			//{
				//document.location.href = '<?php echo base_url();?>dashboard';
			//}, 2000);



			let timerInterval;
			Swal.fire({
				title: "Terima kasih !",
				html: "Maaf !<br>Aplikasi Ini Dibuat Selama +- 3 Tahun Untuk Menjadi Sempurna.<br>Untuk Yang Pengen Jiplak Silahkan Minggir !",
				icon: "success",
				allowOutsideClick: false,
				showCancelButton: true,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: "Oke, Lanjut !",
				cancelButtonText: "Ngga Jadi Deh !"
				}).then((result) => {
					if (result.isConfirmed) {
						Swal.fire({
						timer: 1500,
						title: "Terima Kasih !",
						text: "Anda Akan Dialihkan Ke Dashboard.",
						icon: "success",
						showConfirmButton: false,
						}).then((result) => { location.reload(); });
					}
					else if (result.dismiss === Swal.DismissReason.cancel) {
						swal.fire({
							title: "Terima Kasih !",
							allowOutsideClick: false,
							text: "Karena Anda Menghargai Keringat Orang Lain !",
							icon: "success"
						}).then((result) => {	$.post("<?php echo base_url('logout');?>", function(response) { location.reload(); });
						});
					}
				});
		}
		else
		{
			$("#masuk").text("Masuk");
			$('#masuk, #identity, #password').removeAttr('disabled');
			if(res.banned)
			{
				new jBox('Notice', {attributes: {x: 'right', y: 'top'}, stack: false, animation: 'flip', showCountdown: false, color: res.status, title: res.title, content: res.message});
				//Lobibox.notify('info', {title: 'Maaf !', delayIndicator: false, position: 'top right', icon: true, msg: 'Anda Telah 5 Kali Salah Login.<br>Silahkan Tunggu Beberapa Menit Lagi Untuk Mencoba Kembali.'});
			}
			if(res.aktifasi)
			{
				new jBox('Notice', {attributes: {x: 'right', y: 'top'}, stack: false, animation: 'flip', showCountdown: true, color: res.status, title: res.title, content: res.message});
				
				setInterval(function()
				{
					window.location.href = '<?php echo base_url();?>aktifasi-email/' + res.email;
				}, 2500);
			}
			if(res.tolak)
			{
				new jBox('Notice', {attributes: {x: 'right', y: 'top'}, stack: false, animation: 'flip', showCountdown: false, color: 'info', title: 'Maaf !', content: 'Anda Telah 5 Kali Salah Login.<br>Silahkan Tunggu Beberapa Menit Lagi Untuk Mencoba Kembali.'});
				//Lobibox.notify('info', {title: 'Maaf !', delayIndicator: false, position: 'top right', icon: true, msg: res.message});
			}
			if(res.reject)
			{	
				new jBox('Notice', {attributes: {x: 'right', y: 'top'}, stack: false, animation: 'flip', showCountdown: false, color: 'info', title: 'Maaf !', content: 'Anda Telah 5 Kali Salah Login.<br>Silahkan Tunggu Beberapa Menit Lagi Untuk Mencoba Kembali.'});
				//Lobibox.notify('info', {title: 'Maaf !', delayIndicator: false, position: 'top right', icon: true, msg: 'Maaf Anda Telah Login Menggunakan Perangkat Lain.'});
			}
			if(res.forgot)
			{
				new jBox('Notice', {attributes: {x: 'right', y: 'top'}, stack: false, animation: 'flip', showCountdown: false, color: res.status, title: res.title, content: res.message});
				//Lobibox.notify('info', {title: 'Maaf !', delayIndicator: false, position: 'top right', icon: true, msg: 'Anda Belum Melakukan Perubahan Password.<br>Cek Instruksi Yang Kami Kirimkan Ke Email Anda.'});
			}
			else
			{
				$('#identity, #password').addClass('is-invalid');
				setInterval(function()
				{
					$('#identity, #password').removeClass('is-invalid');
				}, 1500);

				new jBox('Notice', {attributes: {x: 'right', y: 'top'}, stack: false, animation: 'slide', showCountdown: false, color: res.status, title: res.title, content: res.message});

				//Lobibox.notify(res.status, {title: true, delayIndicator: false, position: 'top right',  icon: true, msg: res.message});
			}
		}
	});
}
</script>
</body>
</html>