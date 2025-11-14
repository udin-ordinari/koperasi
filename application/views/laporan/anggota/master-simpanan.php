<div class="page-wrapper">
	<div class="page-content">
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3"><?php echo $page; ?></div>
				<div class="ps-3">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb mb-0 p-0">
							<li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
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
					<div class="table-responsive fs-7">
						<table id="data_simp" class="table table-bordered mb-0">
							<thead class="table-secondary">
								<tr>
									<th scope="col">No</th>
									<th scope="col">Nama</th>
									<th scope="col" class="text-center" style="white-space:normal">Simpanan Pokok</th>
									<th scope="col" class="text-center" style="white-space:normal">Simpanan Wajib</th>
									<th scope="col">Simpanan SWP</th>
									<th scope="col">Jumlah</th>
									<th scope="col" class="text-center" style="white-space:normal">Simpanan Sukarela</th>
									<th scope="col" class="text-center" style="white-space:normal">Jasa Simpanan Sukarela</th>
									<th scope="col" class="text-center">Jumlah</th>
									<th scope="col" class="text-center">Total</th>
								</tr>
							</thead>
							<tbody>
							<?php $hasil = $this->db->get('app_simpanan'); $no = 1; foreach($hasil->result() as $row) { ?>
								<tr>
									<td><?php echo $no++; ?>.</td>
									<td><?php echo $row->user_id; ?></td>
									<td>Rp. <?php echo number_format('5000',0,",","."); ?></td>
									<td>Rp. <?php echo number_format('17120000',0,",","."); ?></td>
									<td>Rp. <?php echo number_format('4035000',0,",","."); ?></td>
									<td>Rp. <?php echo number_format('4035000',0,",","."); ?></td>
									<td>Rp. <?php echo number_format('4035000',0,",","."); ?></td>
									<td>Rp. <?php echo number_format('4035000',0,",","."); ?></td>
									<td>Rp. <?php echo number_format('4035000',0,",","."); ?></td>
									<td>Rp. <?php echo number_format('4035000',0,",","."); ?></td>
								</tr>
							<?php } ?>
							</tbody>
							<tfoot>
								<tr>
									<td class="kandel" colspan="2">Jumlah</td>
									<td class="kandel">Rp.</td>
									<td class="kandel">Rp.</td>
									<td class="kandel">Rp. </td>
									<td class="kandel">Rp. </td>
									<td class="kandel">Rp. </td>
									<td class="kandel">Rp. </td>
									<td class="kandel">Rp. </td>
									<td class="kandel">Rp. </td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
	var table = $('#data_simp').DataTable( {
		language: {url:"<?php echo base_url('assets/js/Indonesian.json');?>"},
		autoWidth: false,
        	processing: true,
        	serverSide: false,
		ordering: true,
		order: [],
	});
} );
function reload_table()
{
	var table = $('#data_simp').DataTable();
	table.ajax.reload(null, false);
	return false;
}
</script>
