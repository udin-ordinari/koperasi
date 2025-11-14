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
					<div class="d-lg-flex align-items-center gap-3">
						<div class="ms-auto">
							<a href="javascript:void(0);" class="btn btn-success radius-30 btn-sm" data-href="<?php echo base_url('master/anggota/add_cabang'); ?>" data-name="Tambah Cabang" data-bs-toggle="modal" data-bs-target="#TambahModal"><i class="fal fa-plus-circle fa-fw"></i>Tambah&nbsp;</a>
						</div>
						<div class="ms-auto">
							<a href="javascript:void(0);" class="btn btn-primary btn-sm radius-30" onclick="reload_table(); return false;"><i class="fa-solid fa-rotate fs-5 muter"></i>Reload&nbsp;</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-body">

				<div class="table-responsive">
					<table id="cabang" class="cabang table mb-0 align-middle">
						<thead class="table-secondary">
							<tr>
								<th cols="2">No</th>
								<th>Cabang</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	var table = $('#cabang').DataTable( {
		language: {url:"<?php echo base_url('assets/js/Indonesian.json');?>"},
		autoWidth: false,
        	processing: true,
        	serverSide: false,
		ordering: true,
		order: [],
		ajax: '<?php echo base_url();?>master/anggota/get_cabang',
		columns: [
			{ "width": "10%" },
			{ "width": "80%" },
			{ "width": "20%" }	
		]
	});
} );
function reload_table()
{
	var table = $('#cabang').DataTable();
	$('.muter').addClass('fa-spin');
	table.ajax.reload(function() {
		$('.muter').removeClass('fa-spin');
	});
}
</script>