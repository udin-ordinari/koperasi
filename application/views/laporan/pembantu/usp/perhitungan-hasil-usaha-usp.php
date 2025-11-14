<div class="card"> 
	<div class="card-body">
		<div class="col-xl-12 mx-auto" style="text-align: right;">Bulan : <strong><?php echo bulan($bulan); ?> <?php echo $tahun; ?></strong></div>
		<table id="" class="table table-bordered mb-0 fs-7">
			<thead class="table-secondary text-center">
				<tr>
					<th scope="col">I</th>
					<th scope="col" class="text-start">PENDAPATAN</th>
					<th scope="col"></th>
					<th scope="col">Debet</th>
					<th scope="col">Kredit</th>
					<th scope="col">Total</th>
				</tr>
				<tr class="table-info">
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6">1.</td>
					<td class="text-start fs-6">Pendapatan Jasa</td>
					<?php $ang = $this->db->select_sum('bunga', 'total')->where('MONTH(tgl)', $bulan)->where('YEAR(tgl)', $tahun)->get('app_angsuran')->row(); ?>
					<td class="text-right fs-6">Rp. <?php echo number_format((int)$ang->total, 0, ', ', '.'); ?></td>
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
				</tr>
				<tr>
					<th scope="col">II</th>
					<th scope="col" class="text-start">PAJAK PENGHASILAN (PPh)</th>
					<th scope="col"></th>
					<th scope="col"></th>
					<th scope="col"></th>
					<th scope="col"Total</th>
				</tr>
				<tr class="table-info">
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6">1.</td>
					<td class="text-start fs-6">Beban Pajak Penghasilan (Pph)</td>
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
				</tr>
				<tr class="table-info">
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6">2.</td>
					<td class="text-start fs-6">Laba setelah dipotong pajak</td>
					<td class="text-right fs-6">Rp. <?php echo number_format((int)$ang->total, 0, ', ', '.'); ?></td>
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
				</tr>

				<tr>
					<th scope="col">III</th>
					<th scope="col" class="text-start">BEBAN KELANCARAN USAHA</th>
					<th scope="col"></th>
					<th scope="col"></th>
					<th scope="col"></th>
					<th scope="col"Total</th>
				</tr>
				<tr class="table-info">
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6">1.</td>
					<td class="text-start fs-6">Beban Rapat - rapat</td>
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
				</tr>
				<tr class="table-info">
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6">2.</td>
					<td class="text-start fs-6">Dana Kematian</td>
					<td class="text-right fs-6">Rp. <?php echo number_format((int)$ang->total, 0, ', ', '.'); ?></td>
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
				</tr>
				<tr class="table-info">
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6">3.</td>
					<td class="text-start fs-6">Beban ATK</td>
					<td class="text-right fs-6">Rp. <?php echo number_format((int)$ang->total, 0, ', ', '.'); ?></td>
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
				</tr>
				<tr class="table-info">
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6">4.</td>
					<td class="text-start fs-6">Beban Kelancaran Usaha</td>
					<td class="text-right fs-6">Rp. <?php echo number_format((int)$ang->total, 0, ', ', '.'); ?></td>
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
				</tr>
				<tr class="table-info">
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6">5.</td>
					<td class="text-start fs-6">Penghargaan Purnatugas</td>
					<td class="text-right fs-6">Rp. <?php echo number_format((int)$ang->total, 0, ', ', '.'); ?></td>
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
				</tr>
				<tr class="table-info">
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6">6.</td>
					<td class="text-start fs-6">Beban Lain-lain</td>
					<td class="text-right fs-6">Rp. <?php echo number_format((int)$ang->total, 0, ', ', '.'); ?></td>
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
				</tr>
				<tr class="table-info">
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
					<td class="text-start fs-6"></td>
					<td class="text-right fs-6">.</td>
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
				</tr>
				<tr class="table-info">
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
					<td class="text-start fs-6 kandel">Laba Kotor</td>
					<td class="text-right fs-6">Rp. <?php echo number_format((int)$ang->total, 0, ', ', '.'); ?></td>
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
				</tr>
				<tr class="table-info">
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
					<td class="text-start fs-6"></td>
					<td class="text-right fs-6">.</td>
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
				</tr>
				<tr>
					<th scope="col">IV</th>
					<th scope="col" class="text-start">BIAYA BIAYA RAT</th>
					<th scope="col"></th>
					<th scope="col"></th>
					<th scope="col"></th>
					<th scope="col"Total</th>
				</tr>
<?php $no = 1; $rat = $this->db->where('akun_id', '15')->where('YEAR(tgl)', $tahun)->get('app_transaksi'); foreach($rat->result() as $row) { ?>
				<tr class="table-info">
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"><?php echo $no++; ?>.</td>
					<td class="text-start fs-6"><?php echo $row->keterangan; ?></td>
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
				</tr>
<?php } ?>

				<tr class="table-info">
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6">.</td>
					<td class="text-start fs-6">Jasa Sukarela</td>
					<td class="text-right fs-6">Rp. <?php echo number_format((int)$ang->total, 0, ', ', '.'); ?></td>
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
				</tr>
				<tr class="table-info">
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
					<td class="text-start fs-6"></td>
					<td class="text-right fs-6">.</td>
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
				</tr>
				<tr class="table-info">
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
					<td class="text-start fs-6 kandel">Laba Bersih</td>
					<td class="text-right fs-6">Rp. <?php echo number_format((int)$ang->total, 0, ', ', '.'); ?></td>
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
				</tr>
				<tr class="table-info">
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
					<td class="text-start fs-6"></td>
					<td class="text-right fs-6">.</td>
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
				</tr>
				<tr>
					<th scope="col">V</th>
					<th scope="col" class="text-start">PEMBAGIAN SISA HASIL USAHA</th>
					<th scope="col"></th>
					<th scope="col"></th>
					<th scope="col"></th>
					<th scope="col"Total</th>
				</tr>
				<tr class="table-info">
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"><?php echo $this->model->RowObject('nama', 'persen-shu', 'app_jasa')->isi; ?> %</td>
					<td class="text-start fs-6 text-capitalize">Dibagikan kepada anggota yang bertransaksi<br>di Unit Simpan Pinjam ( USP ) Koperasi</td>
					<td class="text-right fs-6">Rp. <?php echo number_format((int)$ang->total, 0, ', ', '.'); ?></td>
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
				</tr>
				<tr class="table-info">
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"><?php echo $this->model->RowObject('nama', 'setor-induk-koperasi', 'app_jasa')->isi; ?> %</td>
					<td class="text-start fs-6 text-capitalize">disetorkan ke unit induk koperasi</td>
					<td class="text-right fs-6">Rp. <?php echo number_format((int)$ang->total, 0, ', ', '.'); ?></td>
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
				</tr>
				<tr class="table-info">
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"><?php echo $this->model->RowObject('nama', 'cadangan-modal', 'app_jasa')->isi; ?> %</td>
					<td class="text-start fs-6 text-capitalize">cadangan modal</td>
					<td class="text-right fs-6">Rp. <?php echo number_format((int)$ang->total, 0, ', ', '.'); ?></td>
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
				</tr>
				<tr class="table-info">
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"><?php echo $this->model->RowObject('nama', 'dana-pengurus', 'app_jasa')->isi; ?> %</td>
					<td class="text-start fs-6 text-capitalize">dana pengurus dan karyawan</td>
					<td class="text-right fs-6">Rp. <?php echo number_format((int)$ang->total, 0, ', ', '.'); ?></td>
					<td class="text-right fs-6"></td>
					<td class="text-right fs-6"></td>
				</tr>
				<tr>
					<td class="text-right kandel fs-6" colspan="3">Jumlah : </td>
					<td class="text-right kandel fs-6">Rp. 0</td>
					<td class="text-right kandel fs-6">Rp. 0</td>
					<td class="text-right kandel fs-6">Rp. 0</td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>