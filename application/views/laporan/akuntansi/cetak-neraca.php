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

	<?php echo link_tag('assets/plugins/datatable/css/dataTables.bootstrap5.min.css');?>


	<?php echo link_tag('assets/plugins/bootstrap/css/bootstrap.min.css');?>

	<!-- Theme Style CSS -->
	<?php echo link_tag('assets/css/style.css');?>

	<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>

	<script type="text/javascript">
		const BASE_URL = '<?php echo base_url();?>';
	</script>
</head>

<body style="background: #ffffff;">
<div class="main-content pt-0">
	<div class="main-container container-fluid">
		<div class="nduwur">
			<h5 class="mb-4 text-uppercase text-center">neraca usaha simpan pinjam ( usp )<br>periode <?php echo $tahun;?></h5>

			<div class="card custom-card mb-4">
				<div class="row row-lg p-1">
					<div class="col-lg-6">
						<div class="table-responsive border">
							<table class="table text-nowrap text-md-nowrap table-bordered tx-14 mb-0">
								<thead class="table-secondary">
									<tr>
										<th scope="col" class="wd-10"></th>
										<th scope="col">aktiva</th>
										<th scope="col" class="text-center"><?php echo $tahun - 1; ?></th>
										<th scope="col" class="text-center"><?php echo $tahun; ?></th>
									</tr>
								</thead>
								<tbody>
									<tr class="tx-14 kandel">
										<td>I</td>
										<td class="text-uppercase tx-13"><strong>aktiva lancar</strong></td>
										<td></td>
										<td></td>
									</tr>
<?php
$aset = $this->db->where('jenis', '1')->where('tampil', 'Iya')->get('app_akun');
$no = 1;
foreach($aset->result() as $row) {	
?>
									<tr>
										<td class="text-right"><?php echo $no++; ?> .</td>
										<td><?php echo $row->akun; ?></td>	
<?php if($row->id == '1') { ?>									
										<td class="text-right">Rp. <?php echo number_format(get_trans_akun($row->id, $tahun - 1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format($this->transaksi->total_kas_usp($tahun), 0, ', ','.'); ?></td>
<?php } if($row->id == '2') { ?>
										<td class="text-right">Rp. <?php echo number_format(get_trans_akun($row->id, $tahun - 1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)total_pinjaman($tahun - 1) + total_pinjaman($tahun), 0, ', ', '.'); ?></td>
<?php } if($row->id == '3') { ?>
										<td class="text-right">Rp. <?php echo number_format(get_trans_akun($row->id, $tahun - 1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)'0', 0, ', ', '.'); ?></td>
<?php } if($row->id == '4') { ?>
										<td class="text-right">Rp. <?php echo number_format(get_trans_akun($row->id, $tahun - 1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)'0', 0, ', ', '.'); ?></td>
<?php } if($row->id == '5') { ?>
										<td class="text-right">Rp. <?php echo number_format(get_trans_akun($row->id, $tahun - 1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)get_trans_akun($row->id, $tahun - 1) + get_trans_akun($row->id, $tahun), 0, ', ', '.'); ?></td>
<?php } else {} ?>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="table-responsive border">
							<table class="table text-nowrap text-md-nowrap table-bordered tx-14 mb-0">
								<thead class="table-secondary">
									<tr>
										<th scope="col" class="wd-10"></th>
										<th scope="col">pasiva</th>
										<th scope="col" class="text-center"><?php echo $tahun - 1; ?></th>
										<th scope="col" class="text-center"><?php echo $tahun; ?></th>
									</tr>
								</thead>
								<tbody>
									<tr class="tx-14 kandel">
										<td>II</td>
										<td colspan="3" class="text-uppercase tx-13">kewajiban lancar</td>
									</tr>
<?php
$aset = $this->db->where('jenis', '4')->where('tampil', 'Iya')->get('app_akun');
$n = 1;
foreach($aset->result() as $r) {	
?>
									<tr>
										<td class="text-right"><?php echo $n++; ?> .</td>
										<td><?php echo $r->akun; ?></td>
<?php if($r->id == '6') { ?>									
										<td class="text-right">Rp. <?php echo number_format(total_simpanan_sukarela($tahun-1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format(total_simpanan_sukarela($tahun), 0, ', ','.'); ?></td>
<?php } if($r->id == '7') { ?>
										<td class="text-right">Rp. <?php echo number_format(modal_tidak_tetap($tahun - 1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)modal_tidak_tetap($tahun - 1) + modal_tidak_tetap($tahun), 0, ', ', '.'); ?></td>
<?php } ?>
									</tr>
									<?php } ?>
									<tr>
										<td></td>
										<td class="text-right tx-semibold">sub jumlah</td>
										<td>Rp. </td>
										<td>Rp. </td>
									</tr>
									<tr class="tx-14 kandel">
										<td>III</td>
										<td colspan="3" class="text-uppercase tx-13">kewajiban jangka panjang</td>
									</tr>
<?php
$aset = $this->db->where('jenis', '5')->where('tampil', 'Iya')->get('app_akun');
$n = 1;
foreach($aset->result() as $ro) {	
?>
									<tr>
										<td class="text-right"><?php echo $n++; ?> .</td>
										<td><?php echo $ro->akun; ?></td>
<?php if($ro->id == '8') { ?>									
										<td class="text-right">Rp. <?php echo number_format(total_simpanan_sukarela($tahun-1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format(total_simpanan_sukarela($tahun), 0, ', ','.'); ?></td>
<?php } if($ro->id == '9') { ?>
										<td class="text-right">Rp. <?php echo number_format(modal_tidak_tetap($tahun - 1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)modal_tidak_tetap($tahun - 1) + modal_tidak_tetap($tahun), 0, ', ', '.'); ?></td>
<?php } if($ro->id == '10') { ?>
										<td class="text-right">Rp. <?php echo number_format(modal_tidak_tetap($tahun - 1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)modal_tidak_tetap($tahun - 1) + modal_tidak_tetap($tahun), 0, ', ', '.'); ?></td>
<?php } ?>
									</tr>
									<?php } ?>
									<tr>
										<td></td>
										<td class="text-right tx-semibold">sub jumlah</td>
										<td>Rp. </td>
										<td>Rp. </td>
									</tr>
									<tr class="tx-14 kandel">
										<td>IV</td>
										<td colspan="3" class="text-uppercase tx-13">kekayaan bersih</td>
									</tr>
<?php
$aset = $this->db->where('jenis', '6')->where('tampil', 'Iya')->get('app_akun');
$n = 1;
foreach($aset->result() as $ros) {	
?>
									<tr>
										<td class="text-right"><?php echo $n++; ?> .</td>
										<td><?php echo $ros->akun; ?></td>
<?php if($ros->id == '11') { ?>									
										<td class="text-right">Rp. <?php echo number_format(total_simpanan_sukarela($tahun-1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format(total_simpanan_sukarela($tahun), 0, ', ','.'); ?></td>
<?php } if($ros->id == '12') { ?>
										<td class="text-right">Rp. <?php echo number_format(modal_tidak_tetap($tahun - 1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)modal_tidak_tetap($tahun - 1) + modal_tidak_tetap($tahun), 0, ', ', '.'); ?></td>
<?php } if($ros->id == '13') { ?>
										<td class="text-right">Rp. <?php echo number_format(modal_tidak_tetap($tahun - 1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)modal_tidak_tetap($tahun - 1) + modal_tidak_tetap($tahun), 0, ', ', '.'); ?></td>
<?php } if($ros->id == '20') { ?>
										<td class="text-right">Rp. <?php echo number_format(modal_tidak_tetap($tahun - 1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)modal_tidak_tetap($tahun - 1) + modal_tidak_tetap($tahun), 0, ', ', '.'); ?></td>
<?php } if($ros->id == '21') { ?>
										<td class="text-right">Rp. <?php echo number_format(modal_tidak_tetap($tahun - 1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)modal_tidak_tetap($tahun - 1) + modal_tidak_tetap($tahun), 0, ', ', '.'); ?></td>
<?php } ?>
									</tr>
									<?php } ?>
									<tr>
										<td></td>
										<td class="text-right tx-semibold">sub jumlah</td>
										<td>Rp. </td>
										<td>Rp. </td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>




					<div class="col-lg-12">
						<div class="table-responsive border">
							<table class="table text-nowrap text-md-nowrap table-bordered tx-14 mb-0">
								<thead class="table-secondary">
									<tr>
										<th scope="col" class="wd-10"></th>
										<th scope="col">total aktiva</th>
										<th scope="col" class="text-center">Rp. </th>
										<th scope="col" class="text-center">Rp. </th>

										<th scope="col" class="wd-10"></th>
										<th scope="col">total pasiva</th>
										<th scope="col" class="text-center">Rp. </th>
										<th scope="col" class="text-center">Rp. </th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<br>

	<div class="main-container container-fluid">
		<div class="nduwur">
	<br>
			<h5 class="mb-4 text-uppercase text-center">neraca usaha induk<br>periode <?php echo $tahun;?></h5>

			<div class="card custom-card mb-4">
				<div class="row row-lg p-1">
					<div class="col-lg-6">
						<div class="table-responsive border">
							<table class="table text-nowrap text-md-nowrap table-bordered tx-14 mb-0">
								<thead class="table-secondary">
									<tr>
										<th scope="col" class="wd-10"></th>
										<th scope="col">aktiva</th>
										<th scope="col" class="text-center"><?php echo $tahun - 1; ?></th>
										<th scope="col" class="text-center"><?php echo $tahun; ?></th>
									</tr>
								</thead>
								<tbody>
									<tr class="tx-14 kandel">
										<td>I</td>
										<td class="text-uppercase tx-13"><strong>aktiva lancar</strong></td>
										<td></td>
										<td></td>
									</tr>
<?php
$aset = $this->db->where('jenis', '1')->where('tampil', 'Iya')->get('app_akun');
$no = 1;
foreach($aset->result() as $row) {	
?>
									<tr>
										<td class="text-right"><?php echo $no++; ?> .</td>
										<td><?php echo $row->akun; ?></td>	
<?php if($row->id == '1') { ?>									
										<td class="text-right">Rp. <?php echo number_format(get_trans_akun($row->id, $tahun - 1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format($this->transaksi->total_kas_usp($tahun), 0, ', ','.'); ?></td>
<?php } if($row->id == '2') { ?>
										<td class="text-right">Rp. <?php echo number_format(get_trans_akun($row->id, $tahun - 1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)total_pinjaman($tahun - 1) + total_pinjaman($tahun), 0, ', ', '.'); ?></td>
<?php } if($row->id == '3') { ?>
										<td class="text-right">Rp. <?php echo number_format(get_trans_akun($row->id, $tahun - 1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)'0', 0, ', ', '.'); ?></td>
<?php } if($row->id == '4') { ?>
										<td class="text-right">Rp. <?php echo number_format(get_trans_akun($row->id, $tahun - 1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)'0', 0, ', ', '.'); ?></td>
<?php } if($row->id == '5') { ?>
										<td class="text-right">Rp. <?php echo number_format(get_trans_akun($row->id, $tahun - 1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)get_trans_akun($row->id, $tahun - 1) + get_trans_akun($row->id, $tahun), 0, ', ', '.'); ?></td>
<?php } else {} ?>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="table-responsive border">
							<table class="table text-nowrap text-md-nowrap table-bordered tx-14 mb-0">
								<thead class="table-secondary">
									<tr>
										<th scope="col" class="wd-10"></th>
										<th scope="col">pasiva</th>
										<th scope="col" class="text-center"><?php echo $tahun - 1; ?></th>
										<th scope="col" class="text-center"><?php echo $tahun; ?></th>
									</tr>
								</thead>
								<tbody>
									<tr class="tx-14 kandel">
										<td>II</td>
										<td colspan="3" class="text-uppercase tx-13">kewajiban lancar</td>
									</tr>
<?php
$aset = $this->db->where('jenis', '4')->where('tampil', 'Iya')->get('app_akun');
$n = 1;
foreach($aset->result() as $r) {	
?>
									<tr>
										<td class="text-right"><?php echo $n++; ?> .</td>
										<td><?php echo $r->akun; ?></td>
<?php if($r->id == '6') { ?>									
										<td class="text-right">Rp. <?php echo number_format(total_simpanan_sukarela($tahun-1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format(total_simpanan_sukarela($tahun), 0, ', ','.'); ?></td>
<?php } if($r->id == '7') { ?>
										<td class="text-right">Rp. <?php echo number_format(modal_tidak_tetap($tahun - 1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)modal_tidak_tetap($tahun - 1) + modal_tidak_tetap($tahun), 0, ', ', '.'); ?></td>
<?php } ?>
									</tr>
									<?php } ?>
									<tr>
										<td></td>
										<td class="text-right tx-semibold">sub jumlah</td>
										<td>Rp. </td>
										<td>Rp. </td>
									</tr>
									<tr class="tx-14 kandel">
										<td>III</td>
										<td colspan="3" class="text-uppercase tx-13">kewajiban jangka panjang</td>
									</tr>
<?php
$aset = $this->db->where('jenis', '5')->where('tampil', 'Iya')->get('app_akun');
$n = 1;
foreach($aset->result() as $ro) {	
?>
									<tr>
										<td class="text-right"><?php echo $n++; ?> .</td>
										<td><?php echo $ro->akun; ?></td>
<?php if($ro->id == '8') { ?>									
										<td class="text-right">Rp. <?php echo number_format(total_simpanan_sukarela($tahun-1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format(total_simpanan_sukarela($tahun), 0, ', ','.'); ?></td>
<?php } if($ro->id == '9') { ?>
										<td class="text-right">Rp. <?php echo number_format(modal_tidak_tetap($tahun - 1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)modal_tidak_tetap($tahun - 1) + modal_tidak_tetap($tahun), 0, ', ', '.'); ?></td>
<?php } if($ro->id == '10') { ?>
										<td class="text-right">Rp. <?php echo number_format(modal_tidak_tetap($tahun - 1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)modal_tidak_tetap($tahun - 1) + modal_tidak_tetap($tahun), 0, ', ', '.'); ?></td>
<?php } ?>
									</tr>
									<?php } ?>
									<tr>
										<td></td>
										<td class="text-right tx-semibold">sub jumlah</td>
										<td>Rp. </td>
										<td>Rp. </td>
									</tr>
									<tr class="tx-14 kandel">
										<td>IV</td>
										<td colspan="3" class="text-uppercase tx-13">kekayaan bersih</td>
									</tr>
<?php
$aset = $this->db->where('jenis', '6')->where('tampil', 'Iya')->get('app_akun');
$n = 1;
foreach($aset->result() as $ros) {	
?>
									<tr>
										<td class="text-right"><?php echo $n++; ?> .</td>
										<td><?php echo $ros->akun; ?></td>
<?php if($ros->id == '11') { ?>									
										<td class="text-right">Rp. <?php echo number_format(total_simpanan_sukarela($tahun-1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format(total_simpanan_sukarela($tahun), 0, ', ','.'); ?></td>
<?php } if($ros->id == '12') { ?>
										<td class="text-right">Rp. <?php echo number_format(modal_tidak_tetap($tahun - 1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)modal_tidak_tetap($tahun - 1) + modal_tidak_tetap($tahun), 0, ', ', '.'); ?></td>
<?php } if($ros->id == '13') { ?>
										<td class="text-right">Rp. <?php echo number_format(modal_tidak_tetap($tahun - 1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)modal_tidak_tetap($tahun - 1) + modal_tidak_tetap($tahun), 0, ', ', '.'); ?></td>
<?php } if($ros->id == '20') { ?>
										<td class="text-right">Rp. <?php echo number_format(modal_tidak_tetap($tahun - 1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)modal_tidak_tetap($tahun - 1) + modal_tidak_tetap($tahun), 0, ', ', '.'); ?></td>
<?php } if($ros->id == '21') { ?>
										<td class="text-right">Rp. <?php echo number_format(modal_tidak_tetap($tahun - 1), 0, ', ','.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)modal_tidak_tetap($tahun - 1) + modal_tidak_tetap($tahun), 0, ', ', '.'); ?></td>
<?php } ?>
									</tr>
									<?php } ?>
									<tr>
										<td></td>
										<td class="text-right tx-semibold">sub jumlah</td>
										<td>Rp. </td>
										<td>Rp. </td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="table-responsive border">
							<table class="table text-nowrap text-md-nowrap table-bordered tx-14 mb-0">
								<thead class="table-secondary">
									<tr>
										<th scope="col" class="wd-10"></th>
										<th scope="col">total aktiva</th>
										<th scope="col" class="text-center">Rp. </th>
										<th scope="col" class="text-center">Rp. </th>

										<th scope="col" class="wd-10"></th>
										<th scope="col">total pasiva</th>
										<th scope="col" class="text-center">Rp. </th>
										<th scope="col" class="text-center">Rp. </th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>

var css = '@page { size: landscape; }',
    head = document.head || document.getElementsByTagName('head')[0],
    style = document.createElement('style');

style.type = 'text/css';
style.media = 'print';

if (style.styleSheet){
  style.styleSheet.cssText = css;
} else {
  style.appendChild(document.createTextNode(css));
}

head.appendChild(style);

window.print();

</script>
</body>
</html>