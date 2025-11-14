<?php echo doctype(); ?>

<html lang="en" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light" data-sidebar-image="none" data-preloader="disable">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<title><?php echo isset($title) ? $title : 'Selamat Datang'; ?> | <?php echo get_setting('aplikasi'); ?> "<?php echo get_setting('nama_aplikasi'); ?>"</title>
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
	<?php echo link_tag('assets/css/style.css');?>
	<?php echo link_tag('assets/css/icons.css');?>
	<?php echo link_tag('assets/plugins/fontawesome/css/all.css');?>
	<?php echo link_tag('assets/css/app.min.css');?>
	<?php echo link_tag('assets/css/loader.css');?>
	<?php echo link_tag('assets/plugins/sweet-alert/sweetalert2.css');?>
	<?php echo link_tag('assets/plugins/notiflix/notiflix-3.2.7.min.css');?>
	<?php echo link_tag('assets/plugins/jBox/dist/jBox.all.min.css'); ?>


	<?php echo link_tag('assets/plugins/datatables/css/dataTables.bootstrap5.min.css'); ?>
	<?php echo link_tag('assets/plugins/datatables/css/responsive.bootstrap.min.css'); ?>
	<?php echo link_tag('assets/plugins/datatables/css/buttons.dataTables.min.css'); ?>


	<?php echo script_tag('assets/plugins/jquery/jquery-3.7.1.min.js'); ?>
	<script type="text/javascript">
		const _BASE_URL = '<?=base_url();?>';
	</script>
</head>

<body>
	<div id="layout-wrapper">

		<?php $this->load->view('templates/header'); ?>

		<?php $this->load->view('templates/topmenu'); ?>

		<?php $this->load->view($content); ?>
	</div>


	<footer class="footer">
                <div class="container-fluid">
                    	<div class="row">
                        	<div class="col-sm-6">
					<a href="<?php echo base_url(); ?>" class="text-danger fs-13 fw-bold"><?php echo get_setting('aplikasi'); ?> " <?php echo get_setting('nama_aplikasi'); ?> "</a>
                        	</div>
                        	<div class="col-sm-6">
                            		<div class="text-sm-end d-none d-sm-block">
						<a href="https://www.legolas.my.id" class="text-primary fs-13 fw-bold" target="_blank"><?php echo get_setting('author'); ?> </a>
					</div>
                        	</div>
                    	</div>
                </div>
	</footer>
</div>
</div>
<button onclick="topFunction();" class="btn btn-danger btn-icon" id="back-to-top">
	<i class="ri-arrow-up-line fs-20"></i>
</button>
<?php $this->load->view('templates/modal');?>
<?php echo script_tag('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>

<?php echo script_tag('assets/plugins/simplebar/simplebar.min.js'); ?>

<?php echo script_tag('assets/plugins/node-waves/waves.min.js'); ?>

<?php echo script_tag('assets/plugins/feather-icons/feather.min.js'); ?>

<?php echo script_tag('assets/js/pages/plugins/lord-icon-2.1.0.js'); ?>

<?php echo script_tag('assets/js/plugins.js'); ?>

<?php echo script_tag('assets/plugins/sweet-alert/sweetalert2.js'); ?>

<?php echo script_tag('assets/plugins/sweet-alert/jquery.sweet-alert.js'); ?>

<?php echo script_tag('assets/js/app.js'); ?>

<?php echo script_tag('assets/js/jquery.mask.min.js'); ?>

<?php echo script_tag('assets/plugins/notiflix/notiflix-3.2.7.min.js'); ?>

<?php echo script_tag('assets/plugins/jBox/dist/jBox.all.min.js');?>

<?php echo script_tag('assets/plugins/datatables/js/jquery.dataTables.min.js'); ?>

<?php echo script_tag('assets/plugins/datatables/js/dataTables.bootstrap5.min.js'); ?>

<?php echo script_tag('assets/plugins/datatables/js/dataTables.responsive.min.js'); ?>

<?php echo script_tag('assets/plugins/datatables/js/dataTables.buttons.min.js'); ?>

<?php echo script_tag('assets/plugins/datatables/js/buttons.print.min.js'); ?>

<?php echo script_tag('assets/plugins/datatables/js/buttons.html5.min.js'); ?>

<?php echo script_tag('assets/plugins/datatables/js/pdfmake.min.js'); ?>
<?php echo script_tag('assets/plugins/datatables/js/vfs_fonts.js'); ?>
<?php echo script_tag('assets/plugins/datatables/js/jszip.min.js'); ?>



<script type="text/javascript">
function showTime() {
	const today = new Date();
	let hour = today.getHours();
	let minute = today.getMinutes();
	let second = today.getSeconds();

	hour = checkTime(hour);
	minute = checkTime(minute);
	second = checkTime(second);

	document.getElementById('jam').textContent = `${hour}:${minute}:${second}`;
}

function checkTime(i) {
  return (i < 10) ? "0" + i : i;
}

setInterval(showTime, 500);
showTime();

const hariList = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
const bulanList = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

const today = new Date();
const hari = hariList[today.getDay()];
const tanggal = today.getDate();
const bulan = bulanList[today.getMonth()];
const tahun = today.getFullYear();

document.getElementById('tanggal').textContent = `${hari}, ${tanggal} ${bulan} ${tahun}`;

function Logout()
{
	$.post("<?php echo base_url('logout');?>", function(response)
	{
		var res = response;
		let timerInterval;
		Swal.fire({
			title: res.title,
			html: res.message,
			icon: 'success',
			timer: 1000,
			timerProgressBar: false,
			allowOutsideClick: false,
            		allowEscapeKey: false,
			closeOnClickOutside: false,
			didOpen: () => {
				Swal.showLoading();
			},
			willClose: () => {
				clearInterval(timerInterval);
			}
		}).then((result) => {
			if (result.dismiss === Swal.DismissReason.timer) {
				location.reload();
			}
		});
	});
}

$.extend(true, $.fn.dataTable.defaults, {
    language: {
        url: "<?= base_url('assets/js/Indonesian.json'); ?>"
    },
    autoWidth: false,
    ordering: true,
    processing: true,
    paging: true,
    searching: true,
    order: [],
});
</script>
</body>
</html>