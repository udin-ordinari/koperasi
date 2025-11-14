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
						
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="col-xl-12 mx-auto" style="text-align: center;"><strong><?php echo $tahun; ?></strong></div>
						<table id="" class="table table-bordered mb-0 fs-7">
							<thead class="table-secondary text-center">
								<tr>
									<th scope="col">No</th>
									<th scope="col">Bulan</th>
									<th scope="col">Uraian</th>
									<th scope="col">Jumlah</th>
								</tr>
							</thead>
							<tbody>
<?php
$no = 1;
$purna = $this->db->where('akun_id', '19')->where('YEAR(tgl)', $tahun)->order_by('tgl', 'asc')->get('app_transaksi');
foreach($purna->result() as $row) {
?>
								<tr>
									<td><?php echo $no++; ?> .</td>
									<td><?php echo tgl_jabar($row->tgl); ?></td>
									<td class="kandel text-primary"> <?php echo $row->keterangan; ?></td>
									<td>Rp. <?php echo number_format($row->jumlah, 0, ', ', '.'); ?></td>
								</tr>
<?php } ?>
							</tbody>
							<tfoot>
<?php $jumlahe = $this->db->select_sum('jumlah', 'total')->where('akun_id', '19')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row(); ?>
								<tr>
									<th scope="col"></th>
									<th scope="col"></th>
									<th scope="col" class="text-right">Total</th>
									<th scope="col">Rp. <?php echo number_format($jumlahe->total, 0, ', ', '.'); ?></th>
								</tr>
							</tfoot>
						</table>



				</div>
			</div>
		</div>
	</div>
</div>