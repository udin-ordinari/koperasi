<div class="main-content side-content pt-0">
	<div class="main-container container-fluid">
		<div class="inner-body">
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-20 mg-b-5"><?php echo $title; ?> <span class="text-muted"><?php echo $page; ?></span></h2>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<table class="table table-bordered mb-0 fs-7">
						<thead class="table-info">
							<tr>
								<th scope="col">No</th>
								<th scope="col">Uraian</th>
								<th scope="col">Total Debet</th>
								<th scope="col">Total Kredit</th>
							</tr>
						</thead>
						<tbody>
							
							<tr>
								<td>1.</td>
								<td><a href="<?php echo base_url('laporan/kas/buku_kas_keluar_usp');?>" class="kandel">USP (Usaha Simpan Pinjam)</a></td>
								<td>Rp. -</td>
								<td>Rp. <?php echo number_format(0, 0, ', ', '.'); ?></td>
							</tr>
							
							<tr>
								<td>2.</td>
								<td><a href="<?php echo base_url('laporan/akuntansi/cashflow_induk');?>" class="kandel">Induk Koperasi</a></td>
								<td>Rp. -</td>
								<td>Rp. <?php echo number_format(0, 0, ', ', '.'); ?></td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<td class="kandel fs-6 text-right" colspan="2">Jumlah</td>
								<td class="kandel fs-6">Rp. -</td>
								<td class="kandel fs-6">Rp. <?php echo number_format(0, 0, ', ', '.'); ?></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
			<span class="mb-0 kandel" style="color: darkorange; text-align: center; font-size: 19px; text-shadow: 1px 1px 1px #000000;">* Silahkan klik salah satu untuk detailnya.</span>
		</div>
	</div>
</div>
