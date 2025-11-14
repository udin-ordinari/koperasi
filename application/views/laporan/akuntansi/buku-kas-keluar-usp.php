<div class="page-wrapper">
	<div class="page-content">
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3"><?php echo $title; ?></div>
				<div class="ps-3">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb mb-0 p-0">
							<li class="breadcrumb-item active" aria-current="page"><?php echo $page; ?></li>
						</ol>
					</nav>
				</div>
				<div class="ms-auto">
					<div class="btn-group">
						<a href="javascript:history.back();" class="btn btn-primary radius-30 btn-sm"><i class="bx bx-left-arrow-circle bx-sm"></i>Kembali</a>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
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
								<td class="kandel">Saldo Periode Berjalan</td>
								<td colspan="2"></td>
								<td class="kandel">Rp. <?php echo number_format((int)total_kas_usp_berjalan(),0,",","."); ?></td>
							</tr>							
							<tr>
								<td>1.</td>
								<td><a href="<?php echo base_url('laporan/kas/detail_kas_keluar/01');?>" class="kandel">Januari</a></td>
								<td></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('01'),0,",","."); ?></td>
								<td>Rp. <?php $januari = total_kas_usp_berjalan() - $this->transaksi->transaksi_kredit_usp_bulanan('01'); echo number_format((int)$januari,0,",","."); ?></td>
							</tr>							
							<tr>
								<td>2.</td>
								<td><a href="<?php echo base_url('laporan/kas/detail_kas_keluar/02');?>" class="kandel">Februari</a></td>
								<td></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('02'),0,",","."); ?></td>
								<td>Rp. <?php $februari = ($januari - $this->transaksi->transaksi_kredit_usp_bulanan('02')); echo number_format($februari,0,",","."); ?></td>
							</tr>
							<tr>
								<td>3.</td>
								<td><a href="<?php echo base_url('laporan/kas/detail_kas_keluar/03');?>" class="kandel">Maret</a></td>
								<td></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('03'),0,",","."); ?></td>
								<td>Rp. <?php $maret = ($februari - $this->transaksi->transaksi_kredit_usp_bulanan('03')); echo number_format((int)$maret,0,",","."); ?></td>
							</tr>
							<tr>
								<td>4.</td>
								<td><a href="<?php echo base_url('laporan/kas/detail_kas_keluar/04');?>" class="kandel">April</a></td>
								<td></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('04'),0,",","."); ?></td>
								<td>Rp. <?php $april = ($maret - $this->transaksi->transaksi_kredit_usp_bulanan('04')); echo number_format((int)$april,0,",","."); ?></td>
							</tr>
							<tr>
								<td>5.</td>
								<td><a href="<?php echo base_url('laporan/kas/detail_kas_keluar/05');?>" class="kandel">Mei</a></td>
								<td></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('05'),0,",","."); ?></td>
								<td>Rp. <?php $mei = ($april - $this->transaksi->transaksi_kredit_usp_bulanan('05')); echo number_format((int)$mei,0,",","."); ?></td>
							</tr>
							<tr>
								<td>6.</td>
								<td><a href="<?php echo base_url('laporan/kas/detail_kas_keluar/06');?>" class="kandel">Juni</a></td>
								<td></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('06'),0,",","."); ?></td>
								<td>Rp. <?php $juni = ($mei - $this->transaksi->transaksi_kredit_usp_bulanan('06')); echo number_format((int)$juni,0,",","."); ?></td>
							</tr>
							<tr>
								<td>7.</td>
								<td><a href="<?php echo base_url('laporan/kas/detail_kas_keluar/07');?>" class="kandel">Juli</a></td>
								<td></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('07'),0,",","."); ?></td>
								<td>Rp. <?php $juli = ($juni - $this->transaksi->transaksi_kredit_usp_bulanan('07')); echo number_format((int)$juli,0,",","."); ?></td>
							</tr>
							<tr>
								<td>8.</td>
								<td><a href="<?php echo base_url('laporan/kas/detail_kas_keluar/08');?>" class="kandel">Agustus</a></td>
								<td></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('08'),0,",","."); ?></td>
								<td>Rp. <?php $agustus = ($juli - $this->transaksi->transaksi_kredit_usp_bulanan('08')); echo number_format((int)$agustus,0,",","."); ?></td>
							</tr>
							<tr>
								<td>9.</td>
								<td><a href="<?php echo base_url('laporan/kas/detail_kas_keluar/09');?>" class="kandel">September</a></td>
								<td></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('09'),0,",","."); ?></td>
								<td>Rp. <?php $september = ($agustus - $this->transaksi->transaksi_kredit_usp_bulanan('09')); echo number_format((int)$september,0,",","."); ?></td>
							</tr>
							<tr>
								<td>10.</td>
								<td><a href="<?php echo base_url('laporan/kas/detail_kas_keluar/10');?>" class="kandel">Oktober</a></td>
								<td></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('10'),0,",","."); ?></td>
								<td>Rp. <?php $oktober = ($september - $this->transaksi->transaksi_kredit_usp_bulanan('10')); echo number_format((int)$oktober,0,",","."); ?></td>
							</tr>
							<tr>
								<td>11.</td>
								<td><a href="<?php echo base_url('laporan/kas/detail_kas_keluar/11');?>" class="kandel">Nopember</a></td>
								<td></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('11'),0,",","."); ?></td>
								<td>Rp. <?php $november = ($oktober- $this->transaksi->transaksi_kredit_usp_bulanan('11')); echo number_format((int)$november,0,",","."); ?></td>
							</tr>
							<tr>
								<td>12.</td>
								<td><a href="<?php echo base_url('laporan/kas/detail_kas_keluar/12');?>" class="kandel">Desember</a></td>
								<td></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('12'),0,",","."); ?></td>
								<td>Rp. <?php $desember = ($november - $this->transaksi->transaksi_kredit_usp_bulanan('12')); echo number_format((int)$desember,0,",","."); ?></td>
							</tr>
						</tbody>
						<tfoot>
							<?php
 								$totalK = $this->transaksi->transaksi_kredit_usp_bulanan('01')
									 + $this->transaksi->transaksi_kredit_usp_bulanan('02')
									 + $this->transaksi->transaksi_kredit_usp_bulanan('03')
									 + $this->transaksi->transaksi_kredit_usp_bulanan('04')
									 + $this->transaksi->transaksi_kredit_usp_bulanan('05')
									 + $this->transaksi->transaksi_kredit_usp_bulanan('06')
									 + $this->transaksi->transaksi_kredit_usp_bulanan('07')
									 + $this->transaksi->transaksi_kredit_usp_bulanan('08')
									 + $this->transaksi->transaksi_kredit_usp_bulanan('09')
									 + $this->transaksi->transaksi_kredit_usp_bulanan('10')
									 + $this->transaksi->transaksi_kredit_usp_bulanan('11')
									 + $this->transaksi->transaksi_kredit_usp_bulanan('12');
							?>
							<tr>
								<td class="kandel" colspan="3" style="text-align: center;">Jumlah</td>
								<td class="kandel">Rp. <?php echo number_format($totalK, 0,',','.'); ?></td>
								<td class="kandel">Rp. <?php echo number_format($desember, 0,',','.'); ?></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
