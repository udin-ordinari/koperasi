<?php echo link_tag('assets/plugins/datatable/css/dataTables.bootstrap5.css');?>
<?php echo link_tag('assets/plugins/datatable/css/buttons.bootstrap5.min.css');?>
<?php echo link_tag('assets/plugins/datatable/css/responsive.bootstrap5.css');?>
<div class="main-content side-content pt-0">
	<div class="main-container container-fluid">
		<div class="inner-body">
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-20 mg-b-5"><?php echo $page; ?></h2>
				</div>
				<div class="d-flex">
					<div class="justify-content-center">
						<button type="button" class="btn btn-primary" onclick="javascript:history.back();"><i class="fal fa-circle-left fa-fw fa-lg mr-1"></i>Kembali</button>
						<button type="button" class="btn btn-danger" onclick="window.open('<?php echo base_url(); ?>laporan/akuntansi/cetak_cashflow/usp');"><i class="fal fa-print fa-fw fa-lg mr-1"></i>Cetak</button>
					</div>
				</div>
			</div>

						<div class="row row-sm">
							<div class="col-lg-12">
								<div class="card custom-card overflow-hidden">
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered border-bottom" >
												<thead class="table-dark">
													<tr class="text-center">
														<th class="text-white">No</th>
														<th class="text-white">Bulan</th>
														<th class="text-white">Debet</th>
														<th class="text-white">Kredit</th>
														<th class="text-white">Saldo</th>
													</tr>
												</thead>
												<tbody class="tx-14">
													<tr>
														<td></td>
														<td></td>
														<td></td>
														<td class="kandel">Saldo Awal : </td>
														<td class="kandel">Rp. <?php echo number_format((int)get_saldo_awal('1', '01', $tahun - 1),0,",","."); ?></td>
													</tr>							
													<tr>
														<td>1.</td>
														<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_usp/01');?>" class="kandel">Januari</a></td>
														<td class="">Rp. <?php $masuk   = $this->transaksi->transaksi_debet_usp_bulanan('01', $tahun); echo number_format((int)$masuk,0,",","."); ?></td>
														<td class="">Rp. <?php $keluar  = $this->transaksi->transaksi_kredit_usp_bulanan('01', $tahun); echo number_format((int)$keluar,0,",","."); ?></td>
														<td class="">Rp. <?php $januari = get_saldo_awal('1', '01', $tahun - 1) + $masuk - $keluar; echo number_format((int)$januari,0,",","."); ?></td>
													</tr>							
													<tr>
														<td>2.</td>
														<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_usp/02');?>" class="kandel">Februari</a></td>
														<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('02', $tahun),0,",","."); ?></td>
														<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('02', $tahun),0,",","."); ?></td>
														<td class="">Rp. <?php $februari = ($januari + $this->transaksi->transaksi_debet_usp_bulanan('02', $tahun)) - $this->transaksi->transaksi_kredit_usp_bulanan('02', $tahun); echo number_format($februari,0,",","."); ?></td>
													</tr>
													<tr>
														<td>3.</td>
														<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_usp/03');?>" class="kandel">Maret</a></td>
														<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('03', $tahun),0,",","."); ?></td>
														<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('03', $tahun),0,",","."); ?></td>
														<td class="">Rp. <?php $maret = ($februari + $this->transaksi->transaksi_debet_usp_bulanan('03', $tahun)) - $this->transaksi->transaksi_kredit_usp_bulanan('03', $tahun); echo number_format((int)$maret,0,",","."); ?></td>
													</tr>
													<tr>
														<td>4.</td>
														<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_usp/04');?>" class="kandel">April</a></td>
														<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('04', $tahun),0,",","."); ?></td>
														<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('04', $tahun),0,",","."); ?></td>
														<td class="">Rp. <?php $april = ($maret + $this->transaksi->transaksi_debet_usp_bulanan('04', $tahun)) - $this->transaksi->transaksi_kredit_usp_bulanan('04', $tahun); echo number_format((int)$april,0,",","."); ?></td>
													</tr>
													<tr>
														<td>5.</td>
														<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_usp/05');?>" class="kandel">Mei</a></td>
														<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('05', $tahun),0,",","."); ?></td>
														<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('05', $tahun),0,",","."); ?></td>
														<td class="">Rp. <?php $mei = ($april + $this->transaksi->transaksi_debet_usp_bulanan('05', $tahun)) - $this->transaksi->transaksi_kredit_usp_bulanan('05', $tahun); echo number_format((int)$mei,0,",","."); ?></td>
													</tr>
													<tr>
														<td>6.</td>
														<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_usp/06');?>" class="kandel">Juni</a></td>
														<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('06', $tahun),0,",","."); ?></td>
														<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('06', $tahun),0,",","."); ?></td>
														<td class="">Rp. <?php $juni = ($mei + $this->transaksi->transaksi_debet_usp_bulanan('06', $tahun)) - $this->transaksi->transaksi_kredit_usp_bulanan('06', $tahun); echo number_format((int)$juni,0,",","."); ?></td>
													</tr>
													<tr>
														<td>7.</td>
														<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_usp/07');?>" class="kandel">Juli</a></td>
														<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('07', $tahun),0,",","."); ?></td>
														<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('07', $tahun),0,",","."); ?></td>
														<td class="">Rp. <?php $juli = ($juni + $this->transaksi->transaksi_debet_usp_bulanan('07', $tahun)) - $this->transaksi->transaksi_kredit_usp_bulanan('07', $tahun); echo number_format((int)$juli,0,",","."); ?></td>
													</tr>
													<tr>
														<td>8.</td>
														<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_usp/08');?>" class="kandel">Agustus</a></td>
														<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('08', $tahun),0,",","."); ?></td>
														<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('08', $tahun),0,",","."); ?></td>
														<td class="">Rp. <?php $agustus = ($juli + $this->transaksi->transaksi_debet_usp_bulanan('08', $tahun)) - $this->transaksi->transaksi_kredit_usp_bulanan('08', $tahun); echo number_format((int)$agustus,0,",","."); ?></td>
													</tr>
													<tr>
														<td>9.</td>
														<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_usp/09');?>" class="kandel">September</a></td>
														<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('09', $tahun),0,",","."); ?></td>
														<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('09', $tahun),0,",","."); ?></td>
														<td class="">Rp. <?php $september = ($agustus + $this->transaksi->transaksi_debet_usp_bulanan('09', $tahun)) - $this->transaksi->transaksi_kredit_usp_bulanan('09', $tahun); echo number_format((int)$september,0,",","."); ?></td>
													</tr>
													<tr>
														<td>10.</td>
														<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_usp/10');?>" class="kandel">Oktober</a></td>
														<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('10', $tahun),0,",","."); ?></td>
														<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('10', $tahun),0,",","."); ?></td>
														<td class="">Rp. <?php $oktober = ($september + $this->transaksi->transaksi_debet_usp_bulanan('10', $tahun)) - $this->transaksi->transaksi_kredit_usp_bulanan('10', $tahun); echo number_format((int)$oktober,0,",","."); ?></td>
													</tr>
													<tr>
														<td>11.</td>
														<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_usp/11');?>" class="kandel">Nopember</a></td>
														<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('11', $tahun),0,",","."); ?></td>
														<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('11', $tahun),0,",","."); ?></td>
														<td class="">Rp. <?php $november = ($oktober+ $this->transaksi->transaksi_debet_usp_bulanan('11', $tahun)) - $this->transaksi->transaksi_kredit_usp_bulanan('11', $tahun); echo number_format((int)$november,0,",","."); ?></td>
													</tr>
													<tr>
														<td>12.</td>
														<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_usp/12');?>" class="kandel">Desember</a></td>
														<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('12', $tahun),0,",","."); ?></td>
														<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('12', $tahun),0,",","."); ?></td>
														<td class="">Rp. <?php $desember = ($november + $this->transaksi->transaksi_debet_usp_bulanan('12', $tahun)) - $this->transaksi->transaksi_kredit_usp_bulanan('12', $tahun); echo number_format((int)$desember,0,",","."); ?></td>
													</tr>
												</tbody>
												<tfoot>
													<tr>
														<td class="kandel" colspan="2" style="text-align: center;">Jumlah</td>
														<td class="kandel">Rp. <?php $debet  = $this->transaksi->transaksi_debet_usp_bulanan('01', $tahun) + $this->transaksi->transaksi_debet_usp_bulanan('02', $tahun) + $this->transaksi->transaksi_debet_usp_bulanan('03', $tahun) + $this->transaksi->transaksi_debet_usp_bulanan('04', $tahun) + $this->transaksi->transaksi_debet_usp_bulanan('05', $tahun) + $this->transaksi->transaksi_debet_usp_bulanan('06', $tahun) + $this->transaksi->transaksi_debet_usp_bulanan('07', $tahun) + $this->transaksi->transaksi_debet_usp_bulanan('08', $tahun) + $this->transaksi->transaksi_debet_usp_bulanan('09', $tahun) + $this->transaksi->transaksi_debet_usp_bulanan('10', $tahun) + $this->transaksi->transaksi_debet_usp_bulanan('11', $tahun) + $this->transaksi->transaksi_debet_usp_bulanan('12', $tahun); echo number_format($debet, 0, ', ','.'); ?></td>
														<td class="kandel">Rp. <?php $kredit = $this->transaksi->transaksi_kredit_usp_bulanan('01', $tahun) + $this->transaksi->transaksi_kredit_usp_bulanan('02', $tahun) + $this->transaksi->transaksi_kredit_usp_bulanan('03', $tahun) + $this->transaksi->transaksi_kredit_usp_bulanan('04', $tahun) + $this->transaksi->transaksi_kredit_usp_bulanan('05', $tahun) + $this->transaksi->transaksi_kredit_usp_bulanan('06', $tahun) + $this->transaksi->transaksi_kredit_usp_bulanan('07', $tahun) + $this->transaksi->transaksi_kredit_usp_bulanan('08', $tahun) + $this->transaksi->transaksi_kredit_usp_bulanan('09', $tahun) + $this->transaksi->transaksi_kredit_usp_bulanan('10', $tahun) + $this->transaksi->transaksi_kredit_usp_bulanan('11', $tahun) + $this->transaksi->transaksi_kredit_usp_bulanan('12', $tahun); echo number_format($kredit, 0, ', ','.'); ?></td>
														<td class="kandel">Rp. <?php $total  = $desember; echo number_format($total, 0, ', ','.'); ?></td>
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
			</div>
<?php echo script_tag('assets/plugins/datatable/js/jquery.dataTables.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/js/dataTables.bootstrap5.js'); ?>
<?php echo script_tag('assets/plugins/datatable/js/dataTables.buttons.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/js/buttons.bootstrap5.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/js/jszip.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/pdfmake/pdfmake.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/pdfmake/vfs_fonts.js'); ?>
<?php echo script_tag('assets/plugins/datatable/js/buttons.html5.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/js/buttons.print.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/js/buttons.colVis.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/dataTables.responsive.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/responsive.bootstrap5.min.js'); ?>
<script type="text/javascript">
function AddSaldoAwal()
{
	$("#tombol").attr('disabled', 'disabled');
	$("#tombol").html("<i class='bx bx-loader-alt bx-spin'></i>&nbsp;Memproses");
	var values = {app_token: $('#app_token').val(), akun_id: $('#akun_id').val(), unit: $('#unit').val(), saldo: $('#saldo').val()};
	$.post("<?php echo base_url('dashboard/add_saldo_awal');?>", values, function(response)
	{
		$("#tombol").html('&nbsp;Post Saldo <i class="bx bx-send"></i>');
		if (response.status == 'success')
		{
			Lobibox.notify(response.status, {title: response.title, position: 'top right', icon: 'fa fa-check-circle', msg: response.message});
			setInterval(function()
			{
				location.reload();
			}, 1500);
		}
		else
		{
			Lobibox.notify(response.status, {title: response.title, position: 'top right', icon: 'fa fa-exclamation-circle', msg: response.message});
		}
	});
}
</script>
