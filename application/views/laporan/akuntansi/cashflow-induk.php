<?php echo link_tag('assets/plugins/datatable/css/dataTables.bootstrap5.css');?>
<?php echo link_tag('assets/plugins/datatable/css/buttons.bootstrap5.min.css');?>
<?php echo link_tag('assets/plugins/datatable/css/responsive.bootstrap5.css');?>
<div class="main-content side-content pt-0">
	<div class="main-container container-fluid">
		<div class="inner-body">
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-20 mg-b-5"><?php echo $page; ?> <?php echo $title; ?></h2>
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
											<th class="text-white wd-5p">No</th>
											<th class="text-white wd-20p">Bulan</th>
											<th class="text-white wd-25p">Debet</th>
											<th class="text-white wd-25p">Kredit</th>
											<th class="text-white wd-25p">Saldo</th>
										</tr>
									</thead>
									<tbody class="tx-14">
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td class="kandel text-end">Saldo Awal : </td>
											<td class="kandel">Rp. <?php echo number_format((int)get_saldo_awal('1', '02', $tahun - 1),0,",","."); ?></td>
										</tr>							
										<tr>
						    					<?php $simkokjan	= $this->db->select_sum('jumlah', 'total')->where('jns_simp', '1')->where('saldo_awal', '0')->where('MONTH(tgl)', '01')->where('YEAR(tgl)', $tahun)->get('app_simpanan')->row(); ?>  
											<?php 
												$shu		= jumlah_hasil_kode('31', '02') / 2;
												$dana_pengurus	= jumlah_hasil_kode('31', '02') / 100 * 10;
												$wajiba		= $this->db->select_sum('jumlah', 'total')->where('jns_simp', '2')->where('saldo_awal', '0')->where('MONTH(tgl)', '01')->where('YEAR(tgl)', $tahun)->get('app_simpanan')->row();
												$suka 		= $this->db->select_sum('jumlah', 'total')->where('jns_simp', '3')->where('saldo_awal', '0')->where('MONTH(tgl)', '01')->where('YEAR(tgl)', $tahun)->get('app_simpanan')->row();

												$rat 		= $shu + $dana_pengurus + $wajiba->total + $suka->total;
											?>  
											<td>1.</td>
											<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_induk/01');?>" class="kandel">Januari</a></td>
											<td>Rp. <?php echo number_format((int)$simkokjan->total + $this->transaksi->total_simpanan_wajib_periode('01')->total + $this->transaksi->transaksi_debet_induk_bulanan('01'), 0, ', ', '.'); ?></td>
											<td>Rp. <?php echo number_format((int)$simkokjan->total + $this->transaksi->total_simpanan_wajib_periode('01')->total + $this->transaksi->transaksi_kredit_induk_bulanan('01'),0,",","."); ?></td>
											<td>Rp. <?php $januari = (get_saldo_awal('1', '02', $tahun - 1) + $this->transaksi->transaksi_debet_induk_bulanan('01')) - $this->transaksi->transaksi_kredit_induk_bulanan('01'); echo number_format((int)$januari,0,",","."); ?></td>
										</tr>							
										<tr>
						    					<?php $simkokfeb	= $this->db->select_sum('jumlah', 'total')->where('jns_simp', '1')->where('saldo_awal', '0')->where('MONTH(tgl)', '02')->where('YEAR(tgl)', $tahun)->get('app_simpanan')->row(); ?>  
											<td>2.</td>
											<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_induk/02');?>" class="kandel">Pebruari</a></td>
											<td>Rp. <?php echo number_format((int)$simkokfeb->total + $this->transaksi->total_simpanan_wajib_periode('02')->total + $this->transaksi->transaksi_debet_induk_bulanan('02'),0,",","."); ?></td>
											<td>Rp. <?php echo number_format((int)$simkokfeb->total + $this->transaksi->total_simpanan_wajib_periode('02')->total + $this->transaksi->transaksi_kredit_induk_bulanan('02'),0,",","."); ?></td>
											<td>Rp. <?php $februari = ($januari + $this->transaksi->transaksi_debet_induk_bulanan('02')) - $this->transaksi->transaksi_kredit_induk_bulanan('02'); echo number_format((int)$februari,0,",","."); ?></td>
										</tr>
										<tr>
						    					<?php $simkokmar	= $this->db->select_sum('jumlah', 'total')->where('jns_simp', '1')->where('saldo_awal', '0')->where('MONTH(tgl)', '03')->where('YEAR(tgl)', $tahun)->get('app_simpanan')->row(); ?>  
											<td>3.</td>
											<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_induk/03');?>" class="kandel">Maret</a></td>
											<td>Rp. <?php echo number_format((int)$simkokmar->total + $this->transaksi->total_simpanan_wajib_periode('03')->total + $this->transaksi->transaksi_debet_induk_bulanan('03'),0,",","."); ?></td>
											<td>Rp. <?php echo number_format((int)$simkokmar->total + $this->transaksi->total_simpanan_wajib_periode('03')->total + $this->transaksi->transaksi_kredit_induk_bulanan('03'),0,",","."); ?></td>
											<td>Rp. <?php $maret = ($februari + $this->transaksi->transaksi_debet_induk_bulanan('03')) - $this->transaksi->transaksi_kredit_induk_bulanan('03'); echo number_format((int)$maret,0,",","."); ?></td>
										</tr>
										<tr>
						    					<?php $simkokapr	= $this->db->select_sum('jumlah', 'total')->where('jns_simp', '1')->where('saldo_awal', '0')->where('MONTH(tgl)', '04')->where('YEAR(tgl)', $tahun)->get('app_simpanan')->row(); ?>  
											<td>4.</td>
											<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_induk/04');?>" class="kandel">April</a></td>
											<td>Rp. <?php echo number_format((int)$simkokapr->total + $this->transaksi->total_simpanan_wajib_periode('04')->total + $this->transaksi->transaksi_debet_induk_bulanan('04'),0,",","."); ?></td>
											<td>Rp. <?php echo number_format((int)$simkokapr->total + $this->transaksi->total_simpanan_wajib_periode('04')->total + $this->transaksi->transaksi_kredit_induk_bulanan('04'),0,",","."); ?></td>
											<td>Rp. <?php $april = ($maret + $this->transaksi->transaksi_debet_induk_bulanan('04')) - $this->transaksi->transaksi_kredit_induk_bulanan('04'); echo number_format((int)$april,0,",","."); ?></td>
										</tr>
										<tr>
						    					<?php $simkokmei	= $this->db->select_sum('jumlah', 'total')->where('jns_simp', '1')->where('saldo_awal', '0')->where('MONTH(tgl)', '05')->where('YEAR(tgl)', $tahun)->get('app_simpanan')->row(); ?>  
											<td>5.</td>
											<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_induk/05');?>" class="kandel">Mei</a></td>
											<td>Rp. <?php echo number_format((int)$simkokmei->total + $this->transaksi->total_simpanan_wajib_periode('05')->total + $this->transaksi->transaksi_debet_induk_bulanan('05'),0,",","."); ?></td>
											<td>Rp. <?php echo number_format((int)$simkokmei->total + $this->transaksi->total_simpanan_wajib_periode('05')->total + $this->transaksi->transaksi_kredit_induk_bulanan('05'),0,",","."); ?></td>
											<td>Rp. <?php $mei = ($april + $this->transaksi->transaksi_debet_induk_bulanan('05')) - $this->transaksi->transaksi_kredit_induk_bulanan('05'); echo number_format((int)$mei,0,",","."); ?></td>
										</tr>
										<tr>
						    					<?php $simkokjun	= $this->db->select_sum('jumlah', 'total')->where('jns_simp', '1')->where('saldo_awal', '0')->where('MONTH(tgl)', '06')->where('YEAR(tgl)', $tahun)->get('app_simpanan')->row(); ?>  
											<td>6.</td>
											<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_induk/06');?>" class="kandel">Juni</a></td>
											<td>Rp. <?php echo number_format((int)$simkokjun->total + $this->transaksi->total_simpanan_wajib_periode('06')->total + $this->transaksi->transaksi_debet_induk_bulanan('06'),0,",","."); ?></td>
											<td>Rp. <?php echo number_format((int)$simkokjun->total + $this->transaksi->total_simpanan_wajib_periode('06')->total + $this->transaksi->transaksi_kredit_induk_bulanan('06'),0,",","."); ?></td>
											<td>Rp. <?php $juni = ($mei + $this->transaksi->transaksi_debet_induk_bulanan('06')) - $this->transaksi->transaksi_kredit_induk_bulanan('06'); echo number_format((int)$juni,0,",","."); ?></td>
										</tr>
										<tr>
						    					<?php $simkokjul	= $this->db->select_sum('jumlah', 'total')->where('jns_simp', '1')->where('saldo_awal', '0')->where('MONTH(tgl)', '07')->where('YEAR(tgl)', $tahun)->get('app_simpanan')->row(); ?>  
											<td>7.</td>
											<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_induk/07');?>" class="kandel">Juli</a></td>
											<td>Rp. <?php echo number_format((int)$simkokjul->total + $this->transaksi->total_simpanan_wajib_periode('07')->total + $this->transaksi->transaksi_debet_induk_bulanan('07'),0,",","."); ?></td>
											<td>Rp. <?php echo number_format((int)$simkokjul->total + $this->transaksi->total_simpanan_wajib_periode('07')->total + $this->transaksi->transaksi_kredit_induk_bulanan('07'),0,",","."); ?></td>
											<td>Rp. <?php $juli = ($juni + $this->transaksi->transaksi_debet_induk_bulanan('07')) - $this->transaksi->transaksi_kredit_induk_bulanan('07'); echo number_format((int)$juli,0,",","."); ?></td>
										</tr>
										<tr>
						    					<?php $simkokagu	= $this->db->select_sum('jumlah', 'total')->where('jns_simp', '1')->where('saldo_awal', '0')->where('MONTH(tgl)', '08')->where('YEAR(tgl)', $tahun)->get('app_simpanan')->row(); ?>  
											<td>8.</td>
											<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_induk/08');?>" class="kandel">Agustus</a></td>
											<td>Rp. <?php echo number_format((int)$simkokagu->total + $this->transaksi->total_simpanan_wajib_periode('08')->total + $this->transaksi->transaksi_debet_induk_bulanan('08'),0,",","."); ?></td>
											<td>Rp. <?php echo number_format((int)$simkokagu->total + $this->transaksi->total_simpanan_wajib_periode('08')->total + $this->transaksi->transaksi_kredit_induk_bulanan('08'),0,",","."); ?></td>
											<td>Rp. <?php $agustus = ($juli + $this->transaksi->transaksi_debet_induk_bulanan('08')) - $this->transaksi->transaksi_kredit_induk_bulanan('08'); echo number_format((int)$agustus,0,",","."); ?></td>
										</tr>
										<tr>
						    					<?php $simkoksep	= $this->db->select_sum('jumlah', 'total')->where('jns_simp', '1')->where('saldo_awal', '0')->where('MONTH(tgl)', '09')->where('YEAR(tgl)', $tahun)->get('app_simpanan')->row(); ?>  
											<td>9.</td>
											<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_induk/09');?>" class="kandel">September</a></td>
											<td>Rp. <?php echo number_format((int)$simkoksep->total + $this->transaksi->total_simpanan_wajib_periode('09')->total + $this->transaksi->transaksi_debet_induk_bulanan('09'),0,",","."); ?></td>
											<td>Rp. <?php echo number_format((int)$simkoksep->total + $this->transaksi->total_simpanan_wajib_periode('09')->total + $this->transaksi->transaksi_kredit_induk_bulanan('09'),0,",","."); ?></td>
											<td>Rp. <?php $september = ($agustus + $this->transaksi->transaksi_debet_induk_bulanan('09')) - $this->transaksi->transaksi_kredit_induk_bulanan('09'); echo number_format((int)$september,0,",","."); ?></td>
										</tr>
										<tr>
						    					<?php $simkokokt	= $this->db->select_sum('jumlah', 'total')->where('jns_simp', '1')->where('saldo_awal', '0')->where('MONTH(tgl)', '10')->where('YEAR(tgl)', $tahun)->get('app_simpanan')->row(); ?>  
											<td>10.</td>
											<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_induk/10');?>" class="kandel">Oktober</a></td>
											<td>Rp. <?php echo number_format((int)$simkokokt->total + $this->transaksi->total_simpanan_wajib_periode('10')->total + $this->transaksi->transaksi_debet_induk_bulanan('10'),0,",","."); ?></td>
											<td>Rp. <?php echo number_format((int)$simkokokt->total + $this->transaksi->total_simpanan_wajib_periode('10')->total + $this->transaksi->transaksi_kredit_induk_bulanan('10'),0,",","."); ?></td>
											<td>Rp. <?php $oktober = ($september + $this->transaksi->transaksi_debet_induk_bulanan('10')) - $this->transaksi->transaksi_kredit_induk_bulanan('10'); echo number_format((int)$oktober,0,",","."); ?></td>
										</tr>
										<tr>
						    					<?php $simkoknov	= $this->db->select_sum('jumlah', 'total')->where('jns_simp', '1')->where('saldo_awal', '0')->where('MONTH(tgl)', '11')->where('YEAR(tgl)', $tahun)->get('app_simpanan')->row(); ?>  
											<td>11.</td>
											<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_induk/11');?>" class="kandel">Nopember</a></td>
											<td>Rp. <?php echo number_format((int)$simkoknov->total + $this->transaksi->total_simpanan_wajib_periode('11')->total + $this->transaksi->transaksi_debet_induk_bulanan('11'),0,",","."); ?></td>
											<td>Rp. <?php echo number_format((int)$simkoknov->total + $this->transaksi->total_simpanan_wajib_periode('11')->total + $this->transaksi->transaksi_kredit_induk_bulanan('11'),0,",","."); ?></td>
											<td>Rp. <?php $november = ($oktober + $this->transaksi->transaksi_debet_induk_bulanan('11')) - $this->transaksi->transaksi_kredit_induk_bulanan('11'); echo number_format((int)$november,0,",","."); ?></td>
										</tr>
										<tr>
						    					<?php $simkokdes	= $this->db->select_sum('jumlah', 'total')->where('jns_simp', '1')->where('saldo_awal', '0')->where('MONTH(tgl)', '12')->where('YEAR(tgl)', $tahun)->get('app_simpanan')->row(); ?>  
											<td>12.</td>
											<td><a href="<?php echo base_url('laporan/akuntansi/detail_kas_induk/12');?>" class="kandel">Desember</a></td>
											<td>Rp. <?php echo number_format((int)$simkokdes->total + $this->transaksi->total_simpanan_wajib_periode('12')->total + $this->transaksi->transaksi_debet_induk_bulanan('12'),0,",","."); ?></td>
											<td>Rp. <?php echo number_format((int)$simkokdes->total + $this->transaksi->total_simpanan_wajib_periode('12')->total + $this->transaksi->transaksi_kredit_induk_bulanan('12'),0,",","."); ?></td>
											<td>Rp. <?php $desember = ($november + $this->transaksi->transaksi_debet_induk_bulanan('12')) - $this->transaksi->transaksi_kredit_induk_bulanan('12'); echo number_format((int)$desember,0,",","."); ?></td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<td class="kandel" colspan="2" style="text-align: center;">Jumlah</td>
											<td class="kandel">Rp. 
<?php
$debet = $this->transaksi->transaksi_debet_induk_bulanan('01')
	+ $this->transaksi->transaksi_debet_induk_bulanan('02')
	+ $this->transaksi->transaksi_debet_induk_bulanan('03')
	+ $this->transaksi->transaksi_debet_induk_bulanan('04')
	+ $this->transaksi->transaksi_debet_induk_bulanan('05')
	+ $this->transaksi->transaksi_debet_induk_bulanan('06')
	+ $this->transaksi->transaksi_debet_induk_bulanan('07')
	+ $this->transaksi->transaksi_debet_induk_bulanan('08')
	+ $this->transaksi->transaksi_debet_induk_bulanan('09')
	+ $this->transaksi->transaksi_debet_induk_bulanan('10')
	+ $this->transaksi->transaksi_debet_induk_bulanan('11')
	+ $this->transaksi->transaksi_debet_induk_bulanan('12');
$kredit = $this->transaksi->transaksi_kredit_induk_bulanan('01')
	+ $this->transaksi->transaksi_kredit_induk_bulanan('02')
	+ $this->transaksi->transaksi_kredit_induk_bulanan('03')
	+ $this->transaksi->transaksi_kredit_induk_bulanan('04')
	+ $this->transaksi->transaksi_kredit_induk_bulanan('05')
	+ $this->transaksi->transaksi_kredit_induk_bulanan('06')
	+ $this->transaksi->transaksi_kredit_induk_bulanan('07')
	+ $this->transaksi->transaksi_kredit_induk_bulanan('08')
	+ $this->transaksi->transaksi_kredit_induk_bulanan('09')
	+ $this->transaksi->transaksi_kredit_induk_bulanan('10')
	+ $this->transaksi->transaksi_kredit_induk_bulanan('11')
	+ $this->transaksi->transaksi_kredit_induk_bulanan('12');
$simpanan = $this->transaksi->total_simpanan_wajib_periode('01')->total
	 + $this->transaksi->total_simpanan_wajib_periode('02')->total
	+ $this->transaksi->total_simpanan_wajib_periode('03')->total
	+ $this->transaksi->total_simpanan_wajib_periode('04')->total
	+ $this->transaksi->total_simpanan_wajib_periode('05')->total
	+ $this->transaksi->total_simpanan_wajib_periode('06')->total
	+ $this->transaksi->total_simpanan_wajib_periode('07')->total
	+ $this->transaksi->total_simpanan_wajib_periode('08')->total
	+ $this->transaksi->total_simpanan_wajib_periode('09')->total
	+ $this->transaksi->total_simpanan_wajib_periode('10')->total
	+ $this->transaksi->total_simpanan_wajib_periode('11')->total
	+ $this->transaksi->total_simpanan_wajib_periode('12')->total;
	echo number_format($debet + $simpanan, 0, ', ','.'); ?>
											</td>
											<td class="kandel">Rp. <?php echo number_format($kredit + $simpanan, 0, ', ','.'); ?></td>
											<td class="kandel">Rp. <?php echo number_format($desember, 0, ', ','.'); ?></td>
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