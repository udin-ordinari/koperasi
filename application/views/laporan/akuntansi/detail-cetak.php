<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cetak Form Untuk Pencairan Dana</title>
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

			<h6 class="mb-0 text-uppercase text-center bolder" style="line-height: 1.5rem;">NERACA USAHA SIMPAN PINJAM ( USP )<br>periode <?php echo $tahun; ?></h6>
			<hr/>
			<div class="card">
				<div class="card-body row">
						<div class="col-md-6">
							<table class="table mb-0 fs-7">
								<thead class="table-secondary">
									<tr class="text-center">
										<th scope="col"></th>
										<th scope="col">AKTIVA</th>
										<th scope="col"><?php echo tahun_buku()->periode - 1; ?></th>
										<th scope="col"><?php echo $tahun; ?></th>
									</tr>
								</thead>
								<tbody>
									<tr class="kandel">
										<td>I</td>
										<td>AKTIVA LANCAR</td>
										<td></td>
										<td></td>
									</tr>
								<?php
									$tipe	= $this->db->where('jenis', '01')->where('unit', '01')->get('app_akun');
									$no     = 1;
									foreach($tipe->result() as $r)
									{
										$awal  = $r->saldo_awal;
										$akhir = $r->saldo;
								?>
									<tr>
										<td class="text-right"><?php echo $no++; ?> .</td>
										<td><?php echo $r->akun; ?></td>
									<?php if($r->akun == 'Kas USP') { ?>
										<td>Rp. <?php echo number_format((int)$awal, 0, ', ', '.'); ?></td>
										<td>Rp. <?php echo number_format((int)total_kas(), 0, ', ', '.'); ?></td>
									<?php } if($r->akun == 'Pinjaman Anggota') { ?>
										<td>Rp. <?php echo number_format((int)$awal, 0, ', ', '.'); ?></td>
										<td>Rp. <?php echo number_format((int)total_pinjaman(), 0, ', ', '.'); ?></td>
									<?php } if($r->akun == 'Piutang SR Baru') { ?>
										<td>Rp. <?php echo number_format((int)$awal, 0, ', ', '.'); ?></td>
										<td>Rp. <?php echo number_format('0', 0, ', ', '.'); ?></td>
									<?php } if($r->akun == 'Piutang Lain') { ?>
										<td>Rp. <?php echo number_format((int)$awal, 0, ', ', '.'); ?></td>
										<td>Rp. <?php echo number_format('0', 0, ', ', '.'); ?></td>
									<?php } if($r->akun == 'Aset Lancar Lainnya') { ?>
										<td>Rp. <?php echo number_format((int)$awal, 0, ', ', '.'); ?></td>
										<td>Rp. <?php echo number_format('0', 0, ', ', '.'); ?></td>
									<?php } ?>
									</tr>
								<?php } ?>
								</tbody>
								<tfoot>
							</table>
							<table class="table mb-0 fs-7">
								<thead>
									<tr class="kandel" style="width:200px;white-space: nowrap; overflow: hidden; text-overflow:ellipsis;">
										<th scope="col" colspan="2" class="text-center">Jumlah</th>
										<th scope="col" class="text-center">Rp. <?php $sum = 0; $sumeh = 0; foreach($tipe->result() as $key => $value) { $sum += $value->saldo_awal; $sumeh += $value->saldo; } echo number_format($sum, 0, ', ', '.'); ?></th>
										<th scope="col">Rp. <?php $a = total_kas() + total_pinjaman(); echo number_format($a, 0, ', ', '.'); ?></th>
									</tr>
								</thead>
								<tbody>
									<tr class="kandel">
										<td>II</td>
										<td>AKTIVA TETAP</td>
										<td></td>
										<td></td>
									</tr>
								<?php
									$tipe	= $this->db->where('jenis', '02')->where('unit', '01')->get('app_akun');
									$no     = 1;
									foreach($tipe->result() as $ro)
									{
								?>

									<tr>
										<td class="text-right"><?php echo $no++; ?> .</td>
										<td><?php echo $ro->akun; ?></td>
										<td>Rp. 0</td>
										<td>Rp. 0</td>
									</tr>
								<?php } ?>
								</tbody>
								<tfoot class="text-center">
									<tr class="kandel table-secondary">
										<td></td>
										<td class="text-right">TOTAL AKTIVA</td>
										<td class="text-right">Rp. 1</td>
										<td class="text-right">Rp. 2</td>
									</tr>
								</tfoot>
							</table>
						</div>

						<div class="col-md-6">
							<table class="table mb-0 fs-7">
								<thead class="table-secondary">
									<tr class="text-center">
										<th scope="col"></th>
										<th scope="col">PASIVA</th>
										<th scope="col"><?php echo tahun_buku()->periode - 1; ?></th>
										<th scope="col"><?php echo $tahun; ?></th>
									</tr>
								</thead>
								<tbody>
									<tr class="kandel">
										<td>I</td>
										<td>KEWAJIBAN LANCAR</td>
										<td></td>
										<td></td>
									</tr>
								<?php
									$tipe	= $this->db->where('jenis', '03')->where('unit', '01')->get('app_akun');
									$no     = 1;
									foreach($tipe->result() as $row)
									{
								?>
									<tr>
										<td class="text-right"><?php echo $no++; ?> .</th>
										<td><?php echo $row->akun; ?></td>
										<td>Rp. </td>
										<td>Rp. </td>
									</tr>
								<?php } ?>
								</tbody>
							</table>





							<table class="table mb-0 fs-7">
								<thead>
									<tr>
										<th scope="col"></th>
										<th scope="col" class="text-right">Jumlah</th>
										<th scope="col" class="text-right">Rp. </th>
										<th scope="col" class="text-right">Rp. </th>
									</tr>
								</thead>
								<tbody>
									<tr class="kandel">
										<td>II</td>
										<td>EKUITAS</td>
										<td></td>
										<td></td>
									</tr>
								<?php
									$tipe	= $this->db->where('jenis', '04')->where('unit', '01')->get('app_akun');
									$no     = 1;
									foreach($tipe->result() as $r)
									{
								?>
									<tr>
										<td class="text-right"><?php echo $no++; ?> .</th>
										<td><?php echo $r->akun;?></td>
										<td>Rp. </td>
										<td>Rp. </td>
									</tr>
								<?php } ?>
								</tbody>

								<tfoot class="table-secondary">
									<tr>
										<th scope="col"></th>
										<th scope="col" class="text-right">TOTAL PASIVA</th>
										<th scope="col" class="text-right">Rp. </th>
										<th scope="col" class="text-right">Rp. </th>
									</tr>
								</tfoot>

							</table>
						


						</div>
					</div>
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