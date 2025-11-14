<div class="main-content">
	<div class="page-content">
		<div class="container-fluid">
			<div class="row">
                        	<div class="col-12">
                            		<div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                		<h4 class="mb-sm-0"><?php echo $pagetitle; ?> <span class="breadcrumb-item"><a href="javascript:void(0);"><?php echo $title; ?></a></span></span></h4>
						<div class="page-title-right">
                                    			<ol class="breadcrumb m-0">
								<button class="btn btn-success btn-icon-text" onclick="location.href='<?php echo base_url("transaksi/pinjaman/pengajuan_baru");?>'">
									<i class="fal fa-circle-plus fa-fw me-2 fa-lg"></i> Baru
								</button>
							</ol>
						</div>
					</div>
                        	</div>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table id="pengajuan" class="pengajuan table mb-0 align-middle">
							<thead class="bg-dark">
								<tr>
									<th class="text-center text-white">No</th>
									<th class="text-center text-white">Kode</th>
									<th class="text-center text-white">Tanggal</th>
									<th class="text-center text-white">E KTP</th>
									<th class="text-center text-white">Nama</th>
									<th class="text-center text-white">Cabang</th>
									<th class="text-center text-white">Pengajuan</th>
									<th class="text-center text-white">Diterima</th>
									<th class="text-center text-white">Aksi</th>
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
	var table = $('#pengajuan').DataTable( {
		language: {url:"<?php echo base_url('assets/js/Indonesian.json');?>"},
		autoWidth: false,
        	processing: true,
        	serverSide: false,
		ordering: true,
		order: [],
		ajax: '<?php echo base_url();?>transaksi/pinjaman/get_data_pengajuan',
	});
} );
</script>