
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3"><?php echo $title; ?></div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item active kandel" aria-current="page"><?php echo $kode_pinj; ?></li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="position-relative">
								Kekurangan Pinjaman Rp. <strong><?php echo number_format($pengajuan->jumlah, 0, ', ','.'); ?></strong>
							</div>
						  <div class="ms-auto">Angsuran <?php echo $pengajuan->tempo; ?> X</div>
						</div>
						<div class="table-responsive fs-7">
							<table id="angsuran" class="angsuran table mb-0 display" width="100%">
								<thead class="table-light">
									<tr>
										<th>No</th>
										<th>Tanggal</th>
										<th>Angsuran Ke</th>
										<th>Jumlah</th>
										<th class="text-center">Aksi</th>
									</tr>
								</thead>
								<tbody>
								<?php
									$hasil = $this->db->where('kode', $kode_pinj)->get('app_pinjaman')->row();
									$angsu = $this->db->where('id_pinj', $hasil->id)->order_by('cicil', 'desc')->get('app_angsuran');
									$no = 1; 
									foreach($angsu->result() as $row)
									{
								?>
									<tr>
										<td><?php echo $no++; ?> .</td>
										<td><?php echo tgl_indo($row->tgl); ?></td>
										<td><?php echo $row->cicil; ?></td>
										<td>Rp. <?php echo number_format($row->jumlah, 0, ', ','.'); ?></td>
										<td class="text-center">
											<a href="javascript:void(0);" class="btn btn-warning btn-xs px-1 radius-30"><i class="bx bxs-pencil bx-xs" style="padding-bottom: 2px;"></i></a>
											<a href="javascript:void(0);" class="btn btn-danger btn-xs px-1 radius-30"><i class="bx bxs-trash bx-xs" style="padding-bottom: 2px;"></i></a>
										</td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>


			</div>
		</div>

<script type="text/javascript">
$(document).ready(function() {
	var table = $('#angsuran').DataTable( {
		language: {url:"<?php echo base_url('assets/js/Indonesian.json');?>"},
		autoWidth: false,
        	processing: true,
        	serverSide: false,
		ordering: true,
		order: []
	});
});
function reload_table()
{
	var table = $('#pinjaman').DataTable();
	table.ajax.reload(null, false);
	return false;
}
</script>