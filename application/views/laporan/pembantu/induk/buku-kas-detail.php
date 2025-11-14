
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered mb-0 fs-7">
							<thead class="table-info">
								<tr class="text-center">
									<th colspan="8"> BUKU KAS INDUK </th>
								</tr>
							</thead>
							<tbody>

								<tr>
									<td colspan="6"></td>
									<td> Periode : </td>
									<td><strong><?php echo bulan($bulan); ?> <?php echo $tahun; ?></strong></td>
								</tr>

								<tr class="kandel text-center table-secondary">
									<td colspan="3"> NO. </td>
									<td> NO. BUKTI </td>
									<td> U R A I A N </td>
									<td> DEBET </td>
									<td> KREDIT </td>
									<td> SALDO </td>
								</tr>


								<tr>
									<td colspan="3"></td>
									<td></td>
									<td></td>
									<td></td>
									<td class="kandel text-uppercase"> Saldo awal </td>
									<td>Rp. <?php if($bulan == '01') { $saldo_awal = total_kas_induk($tahun); } else { $saldo_awal = total_kas_induk($tahun) + $this->transaksi->transaksi_debet_induk_bulanan($bulan) - $this->transaksi->transaksi_kredit_induk_bulanan($bulan); } echo number_format($saldo_awal, 0, ', ', '.'); ?></td>
								</tr>
<?php foreach($hasil as $row) { $no = 1; ?>
								<tr>
									<td colspan="3"><?php echo $no++; ?>.</td>
									<td class="kandel text-primary"><?php echo $row->kode; ?></td>
									<td class="kandel"><?php echo $row->keterangan; ?></td>
<?php if($row->jenis == 'debet') { ?>
									<td>Rp. <?php echo number_format($row->jumlah, 0,',','.');?></td>
									<td></td>
<?php } else { ?>
									<td></td>
									<td>Rp. <?php echo number_format($row->jumlah, 0,',','.');?></td>
<?php } ?>
								</tr>
<?php } ?>


							</tbody>
						</table>
					</div>
				</div>
			</div>