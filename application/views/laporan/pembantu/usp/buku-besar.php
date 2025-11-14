<div class="main-content side-content">
	<div class="main-container container-fluid">
		<div class="inner-body">
			<div class="nduwur text-center">
				<div>
					<h2 class="main-content-title tx-20 mg-b-30">Kartu Buku Besar
				</div>
			</div>
			<div class="row row-sm">
				<div class="col-lg-12">
						<?php $hasil = $this->db->get('app_akun'); foreach($hasil->result() as $row) { ?>
					<div class="card custom-card">

						<div class="card-body pt-1 p-2">

							<div class="row contacts mb-2">
								<div class="col">
									<div class="text-dark kandel fs-6">Kode Akun : <?php echo $row->tipe.'.'.$row->jenis.'.'.$row->code; ?></div>
									<div class="text-dark">Tahun Buku : <?php echo tahun_buku()->periode; ?></div>
								</div>
								<div class="col">
									<div class="text-dark kandel fs-6"></div>
									<div class="date"></div>
								</div>

								<div class="col">
									<div class="text-dark kandel fs-6">Akun : <?php echo $row->nama; ?></div>
									<div class="date">Halaman : </div>
								</div>
							</div>
							<table class="table table-bordered mb-0 tx-14">
								<thead class="table-secondary">
									<tr>
										<th>Bulan</th>
										<th>Uraian</th>
										<th>Debet</th>
										<th>Kredit</th>
										<th>Saldo</th>
									</tr>
<?php if($row->code == '1000') { ?>
<?php
	$januari	= ($this->transaksi->transaksi_debet_usp_bulanan('01') + get_saldo_awal('1', '01', $tahun - 1)) - $this->transaksi->transaksi_kredit_usp_bulanan('01');
	$februari	= ($januari + $this->transaksi->transaksi_debet_usp_bulanan('02')) - $this->transaksi->transaksi_kredit_usp_bulanan('02');
	$maret		= ($februari + $this->transaksi->transaksi_debet_usp_bulanan('03')) - $this->transaksi->transaksi_kredit_usp_bulanan('03');
	$april		= ($maret + $this->transaksi->transaksi_debet_usp_bulanan('04')) - $this->transaksi->transaksi_kredit_usp_bulanan('04');
	$mei		= ($april + $this->transaksi->transaksi_debet_usp_bulanan('05')) - $this->transaksi->transaksi_kredit_usp_bulanan('05');
	$juni		= ($mei + $this->transaksi->transaksi_debet_usp_bulanan('06')) - $this->transaksi->transaksi_kredit_usp_bulanan('06');
	$juli		= ($juni + $this->transaksi->transaksi_debet_usp_bulanan('07')) - $this->transaksi->transaksi_kredit_usp_bulanan('07');
	$agustus	= ($juli + $this->transaksi->transaksi_debet_usp_bulanan('08')) - $this->transaksi->transaksi_kredit_usp_bulanan('08');
	$september	= ($agustus + $this->transaksi->transaksi_debet_usp_bulanan('09')) - $this->transaksi->transaksi_kredit_usp_bulanan('09');
	$oktober	= ($september + $this->transaksi->transaksi_debet_usp_bulanan('10')) - $this->transaksi->transaksi_kredit_usp_bulanan('10');
	$november	= ($oktober + $this->transaksi->transaksi_debet_usp_bulanan('11')) - $this->transaksi->transaksi_kredit_usp_bulanan('11');
	$desember	= ($november + $this->transaksi->transaksi_debet_usp_bulanan('12')) - $this->transaksi->transaksi_kredit_usp_bulanan('12');
	$saldo 		= get_saldo_awal('1', '01', $tahun - 1);
?>
									<tr class="table-info">
										<th colspan="3"></th>
										<th>Saldo Awal : </th>	
										<th>Rp. <?php echo number_format((int)$saldo, 0, ', ', '.'); ?></th>
									</tr>
								</thead>
								<tbody class="fs-7">
								<tr>
									<td class="">Januari</td>
									<td class="text-left">REKAPITULASI HARIAN KAS</td>
									<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('01'),0,",","."); ?></td>
									<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('01'),0,",","."); ?></td>
									<td class="">Rp. <?php echo number_format((int)$saldo + $this->transaksi->transaksi_debet_usp_bulanan('01') - $this->transaksi->transaksi_kredit_usp_bulanan('01'),0,",","."); ?></td>
								</tr>
								<tr>
									<td class="">Februari</td>
									<td class="text-left">REKAPITULASI HARIAN KAS</td>
									<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('02'),0,",","."); ?></td>
									<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('02'),0,",","."); ?></td>
									<td class="">Rp. <?php echo number_format((int)$februari,0,",","."); ?></td>
								</tr>
								<tr>
									<td class="">Maret</td>
									<td class="text-left">REKAPITULASI HARIAN KAS</td>
									<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('03'),0,",","."); ?></td>
									<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('03'),0,",","."); ?></td>
									<td class="">Rp. <?php echo number_format((int)$maret,0,",","."); ?></td>
								</tr>
							<tr>
								<td class="">April</td>
								<td class="text-left">REKAPITULASI HARIAN KAS</td>
								<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('04'),0,",","."); ?></td>
								<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('04'),0,",","."); ?></td>
								<td class="">Rp. <?php echo number_format((int)$april,0,",","."); ?></td>
							</tr>
							<tr>
								<td class="">Mei</td>
								<td class="text-left">REKAPITULASI HARIAN KAS</td>
								<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('05'),0,",","."); ?></td>
								<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('05'),0,",","."); ?></td>
								<td class="">Rp. <?php echo number_format((int)$mei,0,",","."); ?></td>
							</tr>
							<tr>
								<td class="">Juni</td>
								<td class="text-left">REKAPITULASI HARIAN KAS</td>
								<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('06'),0,",","."); ?></td>
								<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('06'),0,",","."); ?></td>
								<td class="">Rp. <?php echo number_format((int)$juni,0,",","."); ?></td>
							</tr>
							<tr>
								<td class="">Juli</td>
								<td class="text-left">REKAPITULASI HARIAN KAS</td>
								<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('07'),0,",","."); ?></td>
								<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('07'),0,",","."); ?></td>
								<td class="">Rp. <?php echo number_format((int)$juli,0,",","."); ?></td>
							</tr>
							<tr>
								<td class="">Agustus</td>
								<td class="text-left">REKAPITULASI HARIAN KAS</td>
								<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('08'),0,",","."); ?></td>
								<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('08'),0,",","."); ?></td>
								<td class="">Rp. <?php echo number_format((int)$agustus,0,",","."); ?></td>
							</tr>
							<tr>
								<td class="">September</td>
								<td class="text-left">REKAPITULASI HARIAN KAS</td>
								<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('09'),0,",","."); ?></td>
								<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('09'),0,",","."); ?></td>
								<td class="">Rp. <?php echo number_format((int)$september,0,",","."); ?></td>
							</tr>
							<tr>
								<td class="">Oktober</td>
								<td class="text-left">REKAPITULASI HARIAN KAS</td>
								<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('10'),0,",","."); ?></td>
								<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('10'),0,",","."); ?></td>
								<td class="">Rp. <?php echo number_format((int)$oktober,0,",","."); ?></td>
							</tr>
							<tr>
								<td class="">November</td>
								<td class="text-left">REKAPITULASI HARIAN KAS</td>
								<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('11'),0,",","."); ?></td>
								<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('11'),0,",","."); ?></td>
								<td class="">Rp. <?php echo number_format((int)$november,0,",","."); ?></td>
							</tr>
							<tr>
								<td class="">Desember</td>
								<td class="text-left">REKAPITULASI HARIAN KAS</td>
								<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan('12'),0,",","."); ?></td>
								<td class="">Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan('12'),0,",","."); ?></td>
								<td class="">Rp. <?php echo number_format((int)$desember,0,",","."); ?></td>
							</tr>
						</tbody>
					</table>

<?php } if($row->code == '1030') { ?>
							<table class="table table-bordered mb-0 tx-14">
								<thead class="table-secondary">
<?php
	$januari	= $this->transaksi->total_pinjaman_bulanan('01') + get_saldo_awal('2', '01', $tahun - 1);
	$februari	= $this->transaksi->total_pinjaman_bulanan('02');
	$maret		= $this->transaksi->total_pinjaman_bulanan('03');
	$april		= $this->transaksi->total_pinjaman_bulanan('04');
	$mei		= $this->transaksi->total_pinjaman_bulanan('05');
	$juni		= $this->transaksi->total_pinjaman_bulanan('06');
	$juli		= $this->transaksi->total_pinjaman_bulanan('07');
	$agustus	= $this->transaksi->total_pinjaman_bulanan('08');
	$september	= $this->transaksi->total_pinjaman_bulanan('09');
	$oktober	= $this->transaksi->total_pinjaman_bulanan('10');
	$november	= $this->transaksi->total_pinjaman_bulanan('11');
	$desember	= $this->transaksi->total_pinjaman_bulanan('12');
	$saldo 		= get_saldo_awal('2', '01', $tahun - 1);
?>
									<tr class="table-info">
										<th colspan="3"></th>
										<th>Saldo Awal : </th>	
										<th>Rp. <?php echo number_format((int)$saldo, 0, ', ', '.'); ?></th>
									</tr>
								</thead>
								<tbody class="fs-7">
								<tr>
									<td class="">Januari</td>
									<td class="text-left">REKAPITULASI HARIAN KAS</td>
									<td class="">Rp. </td>
									<td class="">Rp. <?php echo number_format((int)$januari,0,",","."); ?></td>
									<td class="">Rp. <?php echo number_format((int)$januari,0,",","."); ?></td>
								</tr>
								<tr>
									<td class="">Februari</td>
									<td class="text-left">REKAPITULASI HARIAN KAS</td>
									<td class="">Rp. </td>
									<td class="">Rp. <?php echo number_format((int)$februari,0,",","."); ?></td>
									<td class="">Rp. <?php echo number_format((int)$februari,0,",","."); ?></td>
								</tr>
								<tr>
									<td class="">Maret</td>
									<td class="text-left">REKAPITULASI HARIAN KAS</td>
									<td class="">Rp. </td>
									<td class="">Rp. <?php echo number_format((int)$maret,0,",","."); ?></td>
									<td class="">Rp. <?php echo number_format((int)$maret,0,",","."); ?></td>
								</tr>
								<tr>
									<td class="">April</td>
									<td class="text-left">REKAPITULASI HARIAN KAS</td>
									<td class="">Rp. </td>
									<td class="">Rp. </td>
									<td class="">Rp. </td>
								</tr>
								<tr>
								<td class="">Mei</td>
									<td class="text-left">REKAPITULASI HARIAN KAS</td>
									<td class="">Rp. </td>
									<td class="">Rp. </td>
									<td class="">Rp. </td>
								</tr>
								<tr>
									<td class="">Juni</td>
									<td class="text-left">REKAPITULASI HARIAN KAS</td>
									<td class="">Rp. </td>
									<td class="">Rp. </td>
									<td class="">Rp. </td>
								</tr>
								<tr>
								<td class="">Juli</td>
									<td class="text-left">REKAPITULASI HARIAN KAS</td>
									<td class="">Rp. </td>
									<td class="">Rp. </td>
									<td class="">Rp. </td>
								</tr>
								<tr>
								<td class="">Agustus</td>
									<td class="text-left">REKAPITULASI HARIAN KAS</td>
									<td class="">Rp. </td>
									<td class="">Rp. </td>
									<td class="">Rp. </td>
								</tr>
								<tr>
								<td class="">September</td>
									<td class="text-left">REKAPITULASI HARIAN KAS</td>
									<td class="">Rp. </td>
									<td class="">Rp. </td>
									<td class="">Rp. </td>
								</tr>
								<tr>
								<td class="">Oktober</td>
									<td class="text-left">REKAPITULASI HARIAN KAS</td>
									<td class="">Rp. </td>
									<td class="">Rp. </td>
									<td class="">Rp. </td>
								</tr>
								<tr>
								<td class="">November</td>
									<td class="text-left">REKAPITULASI HARIAN KAS</td>
									<td class="">Rp. </td>
									<td class="">Rp. </td>
									<td class="">Rp. </td>
								</tr>
								<tr>
								<td class="">Desember</td>
									<td class="text-left">REKAPITULASI HARIAN KAS</td>
									<td class="">Rp. </td>
									<td class="">Rp. </td>
									<td class="">Rp. </td>
								</tr>

						</tbody>
<?php } else { ?>


						<?php } ?>
							</table>
						</div>
					</div>

						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
