<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cetak Form</title>
	<meta name="app_token" content="<?php echo session('app_token'); ?>">
	<meta name="keywords" content="<?php echo get_setting('meta_keywords'); ?>">
	<meta name="description" content="<?php echo get_setting('meta_description'); ?>">
	<link rel="shortcut icon" href="<?php echo site_url('assets/img/'.get_setting('favicon'));?>" type="image/x-icon">
	<!--plugins-->
	<?php echo link_tag('assets/plugins/simplebar/css/simplebar.css');?>
	<?php echo link_tag('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css');?>
	<?php echo link_tag('assets/plugins/metismenu/css/metisMenu.min.css');?>
	<?php echo link_tag('assets/plugins/datatable/css/dataTables.bootstrap5.min.css');?>
	<!--<?php echo link_tag('assets/css/pace.min.css');?>-->
	<!--<script src="<?php echo base_url();?>assets/js/pace.min.js"></script>-->

	<?php echo link_tag('assets/plugins/bootstrap/css/bootstrap.min.css');?>
	<?php echo link_tag('assets/plugins/bootstrap/css/bootstrap-extended.css');?>
	<!-- Theme Style CSS -->
	<?php echo link_tag('assets/css/app.css');?>
	<?php echo link_tag('assets/css/icons.css');?>
	<?php echo link_tag('assets/css/animate.min.css');?>
	<?php echo link_tag('assets/plugins/fontawesome/css/all.css');?>
	<?php echo link_tag('assets/plugins/notifications/css/lobibox.min.css');?>
	<?php echo link_tag('assets/plugins/fancybox/css/jquery.fancybox.min.css');?>
	<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>

	<script type="text/javascript">
		const BASE_URL = '<?php echo base_url();?>';
	</script>
</head>

<body>
<div class="wrapper">
		<div class="header">
			<div class="page-content">

				<div class="row">
					<div class="col-xl-12 mx-auto">
				<div class="card">
					<div class="card-body">
						<div class="">
							<header>
								<div class="row">
									<div class="text-center">
										<p class="text-secondary mb-0"><span style="text-transform: uppercase;font-size: 16px; font-weight: bold;"><?php echo $page; ?></span></p>
										<p class="text-muted font-size-sm"><?php echo $title; ?></p>

									</div>
								</div>
							</header>
<?php if($unit == 'usp') { ?>
					<table class="table table-bordered mb-0 fs-7">
						<thead class="table-secondary">
							<tr>
								<th scope="col">No</th>
								<th scope="col">Bulan</th>
								<th scope="col">Debet</th>
								<th scope="col">Kredit</th>
								<th scope="col">Saldo</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td></td>
								<td></td>
								<td colspan="2" class="kandel text-right">Saldo Awal <?php echo $tahun - 1; ?> : </td>
								<td class="kandel">Rp. <?php echo number_format(get_saldo_awal('1', '01', $tahun - 1),0,",","."); ?></td>
							</tr>							
							<tr>
								<td>1.</td>
								<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_usp/01');?>" class="kandel">Januari</a></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('01'),0,",","."); ?></td>
								<td>Rp. <?php echo number_format($this->transaksi->transaksi_kredit_usp_bulanan('01'),0,",","."); ?></td>
								<td>Rp. <?php $januari = get_saldo_awal('1', '01', $tahun - 1) + $this->transaksi->transaksi_debet_usp_bulanan('01') - $this->transaksi->transaksi_kredit_usp_bulanan('01'); echo number_format((int)$januari,0,",","."); ?></td>
							</tr>							
							<tr>
								<td>2.</td>
								<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_usp/02');?>" class="kandel">Februari</a></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('02'),0,",","."); ?></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('02'),0,",","."); ?></td>
								<td>Rp. <?php $februari = ($januari + $this->transaksi->transaksi_debet_usp_bulanan('02')) - $this->transaksi->transaksi_kredit_usp_bulanan('02'); echo number_format($februari,0,",","."); ?></td>
							</tr>
							<tr>
								<td>3.</td>
								<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_usp/03');?>" class="kandel">Maret</a></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('03'),0,",","."); ?></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('03'),0,",","."); ?></td>
								<td>Rp. <?php $maret = ($februari + $this->transaksi->transaksi_debet_usp_bulanan('03')) - $this->transaksi->transaksi_kredit_usp_bulanan('03'); echo number_format((int)$maret,0,",","."); ?></td>
							</tr>
							<tr>
								<td>4.</td>
								<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_usp/04');?>" class="kandel">April</a></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('04'),0,",","."); ?></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('04'),0,",","."); ?></td>
								<td>Rp. <?php $april = ($maret + $this->transaksi->transaksi_debet_usp_bulanan('04')) - $this->transaksi->transaksi_kredit_usp_bulanan('04'); echo number_format((int)$april,0,",","."); ?></td>
							</tr>
							<tr>
								<td>5.</td>
								<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_usp/05');?>" class="kandel">Mei</a></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('05'),0,",","."); ?></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('05'),0,",","."); ?></td>
								<td>Rp. <?php $mei = ($april + $this->transaksi->transaksi_debet_usp_bulanan('05')) - $this->transaksi->transaksi_kredit_usp_bulanan('05'); echo number_format((int)$mei,0,",","."); ?></td>
							</tr>
							<tr>
								<td>6.</td>
								<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_usp/06');?>" class="kandel">Juni</a></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('06'),0,",","."); ?></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('06'),0,",","."); ?></td>
								<td>Rp. <?php $juni = ($mei + $this->transaksi->transaksi_debet_usp_bulanan('06')) - $this->transaksi->transaksi_kredit_usp_bulanan('06'); echo number_format((int)$juni,0,",","."); ?></td>
							</tr>
							<tr>
								<td>7.</td>
								<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_usp/07');?>" class="kandel">Juli</a></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('07'),0,",","."); ?></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('07'),0,",","."); ?></td>
								<td>Rp. <?php $juli = ($juni + $this->transaksi->transaksi_debet_usp_bulanan('07')) - $this->transaksi->transaksi_kredit_usp_bulanan('07'); echo number_format((int)$juli,0,",","."); ?></td>
							</tr>
							<tr>
								<td>8.</td>
								<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_usp/08');?>" class="kandel">Agustus</a></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('08'),0,",","."); ?></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('08'),0,",","."); ?></td>
								<td>Rp. <?php $agustus = ($juli + $this->transaksi->transaksi_debet_usp_bulanan('08')) - $this->transaksi->transaksi_kredit_usp_bulanan('08'); echo number_format((int)$agustus,0,",","."); ?></td>
							</tr>
							<tr>
								<td>9.</td>
								<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_usp/09');?>" class="kandel">September</a></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('09'),0,",","."); ?></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('09'),0,",","."); ?></td>
								<td>Rp. <?php $september = ($agustus + $this->transaksi->transaksi_debet_usp_bulanan('09')) - $this->transaksi->transaksi_kredit_usp_bulanan('09'); echo number_format((int)$september,0,",","."); ?></td>
							</tr>
							<tr>
								<td>10.</td>
								<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_usp/10');?>" class="kandel">Oktober</a></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('10'),0,",","."); ?></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('10'),0,",","."); ?></td>
								<td>Rp. <?php $oktober = ($september + $this->transaksi->transaksi_debet_usp_bulanan('10')) - $this->transaksi->transaksi_kredit_usp_bulanan('10'); echo number_format((int)$oktober,0,",","."); ?></td>
							</tr>
							<tr>
								<td>11.</td>
								<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_usp/11');?>" class="kandel">Nopember</a></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('11'),0,",","."); ?></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('11'),0,",","."); ?></td>
								<td>Rp. <?php $november = ($oktober+ $this->transaksi->transaksi_debet_usp_bulanan('11')) - $this->transaksi->transaksi_kredit_usp_bulanan('11'); echo number_format((int)$november,0,",","."); ?></td>
							</tr>
							<tr>
								<td>12.</td>
								<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_usp/12');?>" class="kandel">Desember</a></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('12'),0,",","."); ?></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('12'),0,",","."); ?></td>
								<td>Rp. <?php $desember = ($november + $this->transaksi->transaksi_debet_usp_bulanan('12')) - $this->transaksi->transaksi_kredit_usp_bulanan('12'); echo number_format((int)$desember,0,",","."); ?></td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<td class="kandel" colspan="2" style="text-align: center;">Jumlah</td>
								<td class="kandel">Rp. <?php $debet = $this->transaksi->transaksi_debet_usp_bulanan('01') + $this->transaksi->transaksi_debet_usp_bulanan('02') + $this->transaksi->transaksi_debet_usp_bulanan('03') + $this->transaksi->transaksi_debet_usp_bulanan('04') + $this->transaksi->transaksi_debet_usp_bulanan('05') + $this->transaksi->transaksi_debet_usp_bulanan('06') + $this->transaksi->transaksi_debet_usp_bulanan('07') + $this->transaksi->transaksi_debet_usp_bulanan('08') + $this->transaksi->transaksi_debet_usp_bulanan('09') + $this->transaksi->transaksi_debet_usp_bulanan('10') + $this->transaksi->transaksi_debet_usp_bulanan('11') + $this->transaksi->transaksi_debet_usp_bulanan('12'); echo number_format($debet, 0, ', ','.'); ?></td>
								<td class="kandel">Rp. <?php $kredit = $this->transaksi->transaksi_kredit_usp_bulanan('01') + $this->transaksi->transaksi_kredit_usp_bulanan('02') + $this->transaksi->transaksi_kredit_usp_bulanan('03') + $this->transaksi->transaksi_kredit_usp_bulanan('04') + $this->transaksi->transaksi_kredit_usp_bulanan('05') + $this->transaksi->transaksi_kredit_usp_bulanan('06') + $this->transaksi->transaksi_kredit_usp_bulanan('07') + $this->transaksi->transaksi_kredit_usp_bulanan('08') + $this->transaksi->transaksi_kredit_usp_bulanan('09') + $this->transaksi->transaksi_kredit_usp_bulanan('10') + $this->transaksi->transaksi_kredit_usp_bulanan('11') + $this->transaksi->transaksi_kredit_usp_bulanan('12'); echo number_format($kredit, 0, ', ','.'); ?></td>
								<td class="kandel">Rp. <?php $total = $desember; echo number_format($total, 0, ', ','.'); ?></td>
							</tr>
						</tfoot>
					</table>
<?php } else { ?>
					<table class="table table-bordered mb-0 fs-7">
						<thead class="table-secondary">
							<tr>
								<th scope="col">No</th>
								<th scope="col">Bulan</th>
								<th scope="col">Debet</th>
								<th scope="col">Kredit</th>
								<th scope="col">Saldo</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td></td>
								<td></td>
								<td colspan="2" class="kandel text-right">Saldo Awal <?php echo $tahun - 1; ?> : </td>
								<td class="kandel">Rp. <?php echo number_format(get_saldo_awal('2', '02', $tahun - 1),0,",","."); ?></td>
							</tr>							
							<tr>
								<td>1.</td>
								<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_induk/01');?>" class="kandel">Januari</a></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_induk_bulanan('01'),0,",","."); ?></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_induk_bulanan('01'),0,",","."); ?></td>
								<td>Rp. <?php $januari = get_saldo_awal('2', '02', $tahun - 1) + $this->transaksi->transaksi_debet_induk_bulanan('01') - $this->transaksi->transaksi_kredit_induk_bulanan('01'); echo number_format((int)$januari,0,",","."); ?></td>
							</tr>							
							<tr>
								<td>2.</td>
								<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_induk/02');?>" class="kandel">Februari</a></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_induk_bulanan('02'),0,",","."); ?></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_induk_bulanan('02'),0,",","."); ?></td>
								<td>Rp. <?php $februari = ($januari + $this->transaksi->transaksi_debet_induk_bulanan('02')) - $this->transaksi->transaksi_kredit_induk_bulanan('02'); echo number_format($februari,0,",","."); ?></td>
							</tr>
							<tr>
								<td>3.</td>
								<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_induk/03');?>" class="kandel">Maret</a></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_induk_bulanan('03'),0,",","."); ?></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_induk_bulanan('03'),0,",","."); ?></td>
								<td>Rp. <?php $maret = ($februari + $this->transaksi->transaksi_debet_induk_bulanan('03')) - $this->transaksi->transaksi_kredit_induk_bulanan('03'); echo number_format((int)$maret,0,",","."); ?></td>
							</tr>
							<tr>
								<td>4.</td>
								<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_induk/04');?>" class="kandel">April</a></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_induk_bulanan('04'),0,",","."); ?></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_induk_bulanan('04'),0,",","."); ?></td>
								<td>Rp. <?php $april = ($maret + $this->transaksi->transaksi_debet_induk_bulanan('04')) - $this->transaksi->transaksi_kredit_induk_bulanan('04'); echo number_format((int)$april,0,",","."); ?></td>
							</tr>
							<tr>
								<td>5.</td>
								<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_induk/05');?>" class="kandel">Mei</a></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_induk_bulanan('05'),0,",","."); ?></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_induk_bulanan('05'),0,",","."); ?></td>
								<td>Rp. <?php $mei = ($april + $this->transaksi->transaksi_debet_induk_bulanan('05')) - $this->transaksi->transaksi_kredit_induk_bulanan('05'); echo number_format((int)$mei,0,",","."); ?></td>
							</tr>
							<tr>
								<td>6.</td>
								<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_induk/06');?>" class="kandel">Juni</a></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_induk_bulanan('06'),0,",","."); ?></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_induk_bulanan('06'),0,",","."); ?></td>
								<td>Rp. <?php $juni = ($mei + $this->transaksi->transaksi_debet_induk_bulanan('06')) - $this->transaksi->transaksi_kredit_induk_bulanan('06'); echo number_format((int)$juni,0,",","."); ?></td>
							</tr>
							<tr>
								<td>7.</td>
								<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_induk/07');?>" class="kandel">Juli</a></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_induk_bulanan('07'),0,",","."); ?></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_induk_bulanan('07'),0,",","."); ?></td>
								<td>Rp. <?php $juli = ($juni + $this->transaksi->transaksi_debet_induk_bulanan('07')) - $this->transaksi->transaksi_kredit_induk_bulanan('07'); echo number_format((int)$juli,0,",","."); ?></td>
							</tr>
							<tr>
								<td>8.</td>
								<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_induk/08');?>" class="kandel">Agustus</a></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_induk_bulanan('08'),0,",","."); ?></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_induk_bulanan('08'),0,",","."); ?></td>
								<td>Rp. <?php $agustus = ($juli + $this->transaksi->transaksi_debet_induk_bulanan('08')) - $this->transaksi->transaksi_kredit_induk_bulanan('08'); echo number_format((int)$agustus,0,",","."); ?></td>
							</tr>
							<tr>
								<td>9.</td>
								<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_induk/09');?>" class="kandel">September</a></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_induk_bulanan('09'),0,",","."); ?></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_induk_bulanan('09'),0,",","."); ?></td>
								<td>Rp. <?php $september = ($agustus + $this->transaksi->transaksi_debet_induk_bulanan('09')) - $this->transaksi->transaksi_kredit_induk_bulanan('09'); echo number_format((int)$september,0,",","."); ?></td>
							</tr>
							<tr>
								<td>10.</td>
								<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_induk/10');?>" class="kandel">Oktober</a></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_induk_bulanan('10'),0,",","."); ?></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_induk_bulanan('10'),0,",","."); ?></td>
								<td>Rp. <?php $oktober = ($september + $this->transaksi->transaksi_debet_induk_bulanan('10')) - $this->transaksi->transaksi_kredit_induk_bulanan('10'); echo number_format((int)$oktober,0,",","."); ?></td>
							</tr>
							<tr>
								<td>11.</td>
								<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_induk/11');?>" class="kandel">Nopember</a></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_induk_bulanan('11'),0,",","."); ?></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_induk_bulanan('11'),0,",","."); ?></td>
								<td>Rp. <?php $november = ($oktober+ $this->transaksi->transaksi_debet_induk_bulanan('11')) - $this->transaksi->transaksi_kredit_induk_bulanan('11'); echo number_format((int)$november,0,",","."); ?></td>
							</tr>
							<tr>
								<td>12.</td>
								<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_induk/12');?>" class="kandel">Desember</a></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_induk_bulanan('12'),0,",","."); ?></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_induk_bulanan('12'),0,",","."); ?></td>
								<td>Rp. <?php $desember = ($november + $this->transaksi->transaksi_debet_induk_bulanan('12')) - $this->transaksi->transaksi_kredit_induk_bulanan('12'); echo number_format((int)$desember,0,",","."); ?></td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<td class="kandel" colspan="2" style="text-align: center;">Jumlah</td>
								<td class="kandel">Rp. <?php $debet = $this->transaksi->transaksi_debet_induk_bulanan('01') + $this->transaksi->transaksi_debet_induk_bulanan('02') + $this->transaksi->transaksi_debet_induk_bulanan('03') + $this->transaksi->transaksi_debet_induk_bulanan('04') + $this->transaksi->transaksi_debet_induk_bulanan('05') + $this->transaksi->transaksi_debet_induk_bulanan('06') + $this->transaksi->transaksi_debet_induk_bulanan('07') + $this->transaksi->transaksi_debet_induk_bulanan('08') + $this->transaksi->transaksi_debet_induk_bulanan('09') + $this->transaksi->transaksi_debet_induk_bulanan('10') + $this->transaksi->transaksi_debet_induk_bulanan('11') + $this->transaksi->transaksi_debet_induk_bulanan('12'); echo number_format($debet, 0, ', ','.'); ?></td>
								<td class="kandel">Rp. <?php $kredit = $this->transaksi->transaksi_kredit_induk_bulanan('01') + $this->transaksi->transaksi_kredit_induk_bulanan('02') + $this->transaksi->transaksi_kredit_induk_bulanan('03') + $this->transaksi->transaksi_kredit_induk_bulanan('04') + $this->transaksi->transaksi_kredit_induk_bulanan('05') + $this->transaksi->transaksi_kredit_induk_bulanan('06') + $this->transaksi->transaksi_kredit_induk_bulanan('07') + $this->transaksi->transaksi_kredit_induk_bulanan('08') + $this->transaksi->transaksi_kredit_induk_bulanan('09') + $this->transaksi->transaksi_kredit_induk_bulanan('10') + $this->transaksi->transaksi_kredit_induk_bulanan('11') + $this->transaksi->transaksi_kredit_induk_bulanan('12'); echo number_format($kredit, 0, ', ','.'); ?></td>
								<td class="kandel">Rp. <?php $total = $desember; echo number_format($total, 0, ', ','.'); ?></td>
							</tr>
						</tfoot>
					</table>
<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<script>
		window.print();
	</script>
</body>
</html>