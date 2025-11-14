<div class="main-content">
	<div class="page-content">
		<div class="container-fluid">
			<div class="row">
                        	<div class="col-12">
                            		<div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                		<h4 class="mb-sm-0"><?php echo $page; ?> <span class="text-muted"><?php echo $title; ?></span></h4>
						<div class="page-title-right">
                                    			<ol class="breadcrumb m-0">
								<button type="button" class="btn btn-success btn-icon-text my-2 me-2" onclick="location.href='<?php echo base_url();?>transaksi/pinjaman/form_angs_saldo_awal'">
							<i class="fal fa-plus-circle fa-fw fa-lg me-2"></i> Baru
						</button>
						<button type="button" class="btn btn-primary btn-icon-text my-2 me-2" onclick="Reload();">
							<i class="fal fa-circle-radiation me-2 fa-lg muter"></i> Reload
						</button>
							</ol>
						</div>
					</div>
                        	</div>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table mb-0 align-middle angsuran_lalu" id="angsuran_lalu">
							<thead class="table-dark">
								<tr>
									<th class="text-center text-white">No</th>
									<th class="text-center text-white">Tanggal</th>
									<th class="text-center text-white">Nama</th>
									<th class="text-center text-white">Pokok</th>
									<th class="text-center text-white">Bunga</th>
									<th class="text-center text-white">Jumlah</th>
									<th class="text-center text-white">Aksi</th>
								</tr>
							</thead>
							<tbody class="tx-14"> </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
	var table = $('#angsuran_lalu').DataTable( {
		language: {url:"<?php echo base_url('assets/js/Indonesian.json');?>"},
		autoWidth: false,
        	processing: true,
        	serverSide: false,
		ordering: true,
		order: [],
		ajax: "<?php echo base_url('transaksi/pinjaman/get_daftar_angsuran_lalu');?>"
	});
} );
function Reload()
{
	var table = $('#angsuran_lalu').DataTable();
	$('.muter').addClass('fa-spin');
	table.ajax.reload(function() {
		$('.muter').removeClass('fa-spin');
	});
	return false;
}
</script>