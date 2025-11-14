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
	<?php echo link_tag('assets/plugins/datatable/css/dataTables.bootstrap5.min.css');?>
	<!-- Theme Style CSS -->
	<?php echo link_tag('assets/css/style.css');?>
	<?php echo link_tag('assets/css/icons.css');?>
	<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
</head>

<body>
	<div class="page">
		<div class="pt-3">
			<div class="row row-sm">
				<div class="col-lg-12">
					<div class="card custom-card">
						<div class="card-body">
							<div class="d-lg-flex">
								<h2 class="main-content-label mb-1">#<?php echo $pengajuan->kode; ?></h2>
								<div class="ms-auto">
									<p class="mb-1"><span class="font-weight-bold">Pengajuan :</span> <?php echo tgl_indo($pengajuan->tgl); ?></p>
									
								</div>
							</div>
							<hr class="mg-b-40">
							<div class="row row-sm">
								<div class="col-lg-6">
									<address>
										<strong><?php echo $anggota->ktp; ?></strong><br>
										<?php echo $anggota->nama; ?><br>
										<?php echo get_cabang($anggota->cabang)->nama; ?><br>
										<img src="<?php echo base_url('assets/img/phone.png');?>" width="26" height="26" style="margin-right: 8px;margin-top: -4px;"><a href="javascript:void(0);"><?php echo $anggota->phone; ?></a>
									</address>
								</div>
								<div class="col-lg-6 text-end">
									<address>
										<?php echo $pengajuan->kode; ?><br>
										<?php echo tgl_indo($pengajuan->tgl); ?>
										
									</address>
								</div>
							</div>
							<div class="table-responsive mg-t-40">
								<table class="table table-invoice table-bordered">
									<thead>
										<tr>
											<th class="text-left wd-15p">Pinjaman</th>
											<th class="text-right wd-10p">Tempo</th>
											<th class="text-right wd-15p">Pengajuan</th>
											<th class="text-right wd-15p">Diterima</th>
											<th class="text-right wd-15p">Angsuran</th>
											<th class="text-right wd-15p">Jasa</th>
											<th class="text-right wd-20p">Total Angsuran</th>
										</tr>
									</thead>
									<?php $bunga = $this->sistem->RowObject('nama', 'jasa-pinjaman', 'app_jasa')->isi; ?>
									<tbody>
										<tr>
										<?php $a = $this->db->where('id', $pengajuan->jns_pinj)->get('app_jns_pinj')->row(); ?>
											<td class="text-left"> <a href="javascript:void(0);" class="text-dark"><?php echo $a->nama; ?></a> </td>
											<td class="unit"><?php echo $pengajuan->tempo; ?> Bln</td>
											<td class="qty">Rp. <?php echo number_format($pengajuan->jumlah, 0, ', ', '.'); ?></td>
											<td class="total">Rp. <?php $duit = $pengajuan->jumlah / 100 * $jasa; echo number_format($pengajuan->jumlah - $duit, 0, ', ', '.'); ?></td>
											<td class="text-right">Rp. <?php $ang = $pengajuan->jumlah / $pengajuan->tempo; echo number_format($ang, 0,',','.'); ?></td>
											<td class="text-right">Rp. <?php $bunganya = $pengajuan->jumlah * $bunga / 100; echo number_format($bunganya, 0,',','.'); ?></td>
											<td class="text-right">Rp. <?php $total = $ang + $bunganya; echo number_format($total, 0,',','.'); ?></td>
										</tr>
						
										<tr>
											<td class="valign-middle" colspan="4" rowspan="3">
												<div class="invoice-notes">
													<label class="main-content-label tx-14">Terima Kasih !</label>
													<p class="text-secondary tx-15">Periksa kembali print out ini apakah sudah sesuai dengan yang diajukan.<br>dan silahkan cairkan pinjaman anda di kasir dengan membawa bukti print out ini atau tunjukkan print out dari HP anda.</p>
												</div>
											</td>
											<td class="tx-right text-primary">Sub Total</td>
											<td class="tx-right" colspan="2">Rp. <?php $duit = $pengajuan->jumlah / 100 * $jasa; echo number_format($pengajuan->jumlah, 0, ', ', '.'); ?></td>
										</tr>
										<tr>
											<td class="tx-right text-warning">Potongan SWP & RSK</td>
											<td class="tx-right" colspan="2">Rp. <?php $duit = $pengajuan->jumlah / 100 * $jasa; echo number_format($duit, 0, ', ', '.'); ?></td>
										</tr>
										<tr>
											<td class="tx-right tx-inverse text-success"><b>Total Diterima</b></td>
											<td class="tx-right" colspan="2">
												<h5 class="tx-bold">Rp. <?php $duit = $pengajuan->jumlah / 100 * $jasa; echo number_format($pengajuan->jumlah - $duit, 0, ', ', '.'); ?></h5>
											</td>
										</tr>						
									</tbody>
								</table>
							</div>
							<div class="col-lg-12 row">
								<div class="col-lg-9 mb-4">
									Formulir ini dicetak dan sudah diperiksa oleh petugas / kasir kami dan dinyatakan sah.
								</div>
								<div class="col-lg-3 tx-right">
									<span class="text-info">Dicetak : <?php echo date('Y-m-d H:i:s'); ?></span>
								</div>
						</div>

						<div class="card-footer text-center">
							<button type="button" class="btn ripple btn-primary mb-1" onclick="javascript:window.close();"><i class="fe fe-x-circle me-2"></i> Tutup</button>
							<button type="button" class="btn ripple btn-secondary mb-1" onclick="javascript:window.print();">Cetak <i class="fe fe-file-text" style="margin-left: 6px;"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>