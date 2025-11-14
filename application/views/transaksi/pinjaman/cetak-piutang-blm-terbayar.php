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
				<div class="card">
					<div class="card-body">
						<div id="invoice">
							<div class="overflow-auto">
								<div style="min-width: 600px">
									<header>
										<div class="row">
											<div class="col company-details text-center">											
												<p class="text-secondary mb-0"><span style="text-transform: uppercase;font-size: 16px; font-weight: bold;"><?php echo $title; ?></span></p>

											</div>
										</div>
									</header>
						<table class="table mb-0 align-middle">
							<thead class="table-secondary">
								<tr>
									<th class="text-center">No</th>
									<th class="text-center">Anggota</th>
									<th class="text-center">Pokok</th>
									<th class="text-center">Bunga</th>
									<th class="text-center">Jasa</th>
									<th class="text-center">Jumlah</th>

								</tr>
							</thead>
							<tbody>
<?php
$hasil = $this->db->order_by('user_id', 'asc')->get('app_pinjaman_lalu');
$total = $this->db->select_sum('pokok')->get('app_pinjaman_lalu')->row();
$terima = $this->db->select_sum('bunga')->get('app_pinjaman_lalu')->row();
$no = 1;
foreach($hasil->result() as $row) {
?>
								<tr>
									<td><?php echo $no++; ?>.</td>
									<td><?php echo get_anggota($row->user_id)->nama; ?></td>
									<td class="text-primary kandel">Rp. <?php echo number_format($row->pokok, 0, ', ', '.'); ?></td>
									<td class="text-success kandel">Rp. <?php echo number_format($row->bunga, 0, ', ', '.'); ?></td>
									<td>-</td>
									<td class="text-danger kandel">Rp. <?php echo number_format($row->pokok + $row->bunga, 0, ', ', '.'); ?></td>
								</tr>
<?php } ?>
							</tbody>
							</tfoot>
								<tr>
									<th class="text-center"></th>
									<th class="text-right">Total</th>
									<th class="text-left text-secondary">Rp. <?php echo number_format((int)$total->pokok, 0, ', ', '.'); ?></th>
									<th class="text-left text-secondary">Rp. <?php echo number_format((int)$terima->bunga, 0, ', ', '.'); ?></th>
									<th class="text-center">-</th>
									<th class="text-left text-secondary">Rp. <?php echo number_format((int)$total->pokok + $terima->bunga, 0, ', ', '.'); ?></th>
								</tr>

							</tfoot>		
						</table>
								</div>
								<div></div>
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