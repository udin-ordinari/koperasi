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
						<a href="javascript:void(0);" onclick="reload_table();" class="btn btn-primary radius-30 btn-sm"><i class="bx bx-reset"></i>Reload</a>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="table-responsive fs-7">
						<table id="pinjaman" class="pinjaman table mb-0 align-middle">
							<thead class="table-secondary">
								<tr>
									<th class="text-center">No</th>
									<th class="text-center">Tanggal</th>
									<th class="text-center">Kode Trans</th>
									<th class="text-center">Nama</th>
									<th class="text-center">Cabang</th>
									<th class="text-center">Jumlah</th>
									<th class="text-center">Status</th>
									<th class="text-center">Alasan</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	var table = $('#pinjaman').DataTable( {
		language: {url:"<?php echo base_url('assets/js/Indonesian.json');?>"},
		autoWidth: false,
        	processing: true,
        	serverSide: false,
		ordering: true,
		order: [],
		ajax: '<?php echo base_url();?>transaksi/pinjaman/data_pinjaman_tolak',
	});
} );
function reload_table()
{
	var table = $('#pinjaman').DataTable();
	table.ajax.reload(null, false);
	return false;
}
</script>