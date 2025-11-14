<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">
				<?php echo $page; ?>
			</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item active" aria-current="page">
							<?php echo $title; ?>
						</li>
					</ol>
				</nav>
			</div>

					<div class="ms-auto">
						<div class="btn-group">
							<a href="<?php echo base_url('superuser/tambah_pengguna');?>" class="btn btn-success px-2 radius-30 btn-sm"><i class="bx bx-plus-circle"></i>Baru&nbsp;</a>
						</div>
					</div>
		</div>
		<!--end breadcrumb-->

				<div class="card">
					<div class="card-body">
						<div class="table-responsive fs-7">
							<table id="anggota" class="table table-striped table-bordered" style="width:100%">
								<thead class="table-dark text-center">
									<tr>
										<th>No</th>
										<th>Pemegang Hak Akses</th>
										<th>Username</th>
										<th>Level</th>
										<th>Aktifitas</th>
										<th>Terakhir Login</th>
										<th class="text-center">Aksi</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
	</div>
</div>


<script>
$(document).ready(function() {
	var table = $('#anggota').DataTable( {
		language: {url:"<?php echo base_url('assets/js/Indonesian.json');?>"},
		autoWidth: false,
        	processing: true,
        	serverSide: false,
		ordering: true,
		order: [],
		ajax: '<?php echo base_url();?>superuser/get_members',
	});
});
</script>