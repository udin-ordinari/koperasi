<div class="page-wrapper">
	<div class="page-content">
		<div class="card">
			<div class="card-body">
				<div class="text-center kandel text-uppercase fs-5">Kartu Buku Besar</div>
				<hr>
					<?php $hasil = $this->db->get('app_akun'); foreach($hasil->result() as $row) { ?>
					<div class="row contacts">
						<div class="col">
							<div class="text-dark kandel fs-6">Kode : <?php echo $row->tipe.'.'.$row->jenis.'.'.$row->kode; ?></div>
							<div class="text-dark">Tahun Buku : <?php echo tahun_buku()->periode; ?></div>
						</div>
						<div class="col">
							<div class="text-dark kandel fs-6"></div>
							<div class="date"></div>
						</div>
						<div class="col">
							<div class="text-dark kandel fs-6"></div>
							<div class="date"></div>
						</div>
						<div class="col">
							<div class="text-dark kandel fs-6">Nama : <?php echo $row->akun; ?></div>
							<div class="date">Halaman : </div>
						</div>
					</div>
					<table class="table table-bordered mb-0 fs-7">
						<thead class="table-secondary">
							<tr>
								<th>Tanggal</th>
								<th>Uraian</th>
								<th>Debet</th>
								<th>Kredit</th>
								<th>Saldo</th>
							</tr>
							<tr class="table-info">
								<th colspan="3"></th>
								<th>Saldo Awal : </th>
<?php if($row->kode == '1000') { ?>
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
								<th>Rp. <?php echo number_format($saldo, 0, ', ', '.'); ?></th>
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
						<tfoot>
<?php
$tot_deb = $this->transaksi->transaksi_debet_usp_bulanan('01') + $this->transaksi->transaksi_debet_usp_bulanan('02') + $this->transaksi->transaksi_debet_usp_bulanan('03') + $this->transaksi->transaksi_debet_usp_bulanan('04') + $this->transaksi->transaksi_debet_usp_bulanan('05') + $this->transaksi->transaksi_debet_usp_bulanan('06') + $this->transaksi->transaksi_debet_usp_bulanan('07') + $this->transaksi->transaksi_debet_usp_bulanan('08') + $this->transaksi->transaksi_debet_usp_bulanan('09') + $this->transaksi->transaksi_debet_usp_bulanan('10') + $this->transaksi->transaksi_debet_usp_bulanan('11') + $this->transaksi->transaksi_debet_usp_bulanan('12');
$tot_kre = $this->transaksi->transaksi_kredit_usp_bulanan('01') + $this->transaksi->transaksi_kredit_usp_bulanan('02') + $this->transaksi->transaksi_kredit_usp_bulanan('03') + $this->transaksi->transaksi_kredit_usp_bulanan('04') + $this->transaksi->transaksi_kredit_usp_bulanan('05') + $this->transaksi->transaksi_kredit_usp_bulanan('06') + $this->transaksi->transaksi_kredit_usp_bulanan('07') + $this->transaksi->transaksi_kredit_usp_bulanan('08') + $this->transaksi->transaksi_kredit_usp_bulanan('09') + $this->transaksi->transaksi_kredit_usp_bulanan('10') + $this->transaksi->transaksi_kredit_usp_bulanan('11') + $this->transaksi->transaksi_kredit_usp_bulanan('12');
?>
							<tr>
								<td class=""></td>
								<td class="">Jumlah</td>
								<td class="">Rp. <?php echo number_format((int)$tot_deb,0,",","."); ?></td>
								<td class="">Rp. <?php echo number_format((int)$tot_kre,0,",","."); ?></td>
								<td class="">Rp. <?php echo number_format((int)$saldo + $tot_deb - $tot_kre,0,",","."); ?></td>
							</tr>
						</tfoot>
<?php } ?>
					</table>

					<hr>
<?php } if($row->kode == '1030') { ?>



<?php } ?>

			</div>
		</div>
	</div>
</div>
