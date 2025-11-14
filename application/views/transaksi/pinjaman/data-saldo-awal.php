<div class="page-wrapper">
	<div class="page-content">
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3"><?php echo $page; ?></div>
				<div class="ps-3">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb mb-0 p-0">
							<li class="breadcrumb-item active kandel" aria-current="page"><?php echo $title; ?></li>
						</ol>
					</nav>
				</div>
				<div class="ms-auto">
					<div class="btn-group">
						<a href="<?php echo base_url('transaksi/pinjaman/saldo_awal_pinjaman');?>" class="btn btn-success radius-30 btn-sm text-white"><i class="bx bx-plus-circle"></i>Baru</a>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="table-responsive fs-7">
						<table id="pinjaman" class="table mb-0 align-middle">
							<thead class="table-secondary">
								<tr>
									<th class="text-center">No</th>
									<th class="text-center">Tanggal</th>
									<th class="text-center">Kode</th>
									<th class="text-center">Nama</th>
									<th class="text-center">Tempo</th>
									<th class="text-center">Sisa Pinjaman</th>
									<th class="text-center">Angsuran</th>
									<th class="text-center">Bunga</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							</tfoot>
								<tr>
									<th class="text-center">No</th>
									<th class="text-center">Tanggal</th>
									<th class="text-center">Kode</th>
									<th class="text-center">Nama</th>
									<th class="text-center">Pengajuan</th>
									<th class="text-center">Diterima</th>
									<th class="text-center">Sisa</th>
									<th class="text-center">Aksi</th>
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
	var table = $('#pinjaman').DataTable( {
		language: {url:"<?php echo base_url('assets/js/Indonesian.json');?>"},
		autoWidth: false,
        	processing: true,
        	serverSide: false,
		ordering: true,
		order: []
	});
} );
</script>