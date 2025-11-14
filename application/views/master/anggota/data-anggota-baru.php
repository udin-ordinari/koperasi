<?php echo link_tag('assets/plugins/datatable/css/dataTables.bootstrap5.css');?>
<?php echo link_tag('assets/plugins/datatable/css/buttons.bootstrap5.min.css');?>
<?php echo link_tag('assets/plugins/datatable/css/responsive.bootstrap5.css');?>
<div class="main-content side-content pt-0">
	<div class="main-container container-fluid">
		<div class="inner-body">
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-24 mg-b-5">Master <span class="breadcrumb-item"><a href="javascript:void(0);"><?php echo $title; ?></a></span></h2>
				</div>
				<div class="d-flex">
					<div class="justify-content-center">
						<button type="button" class="btn btn-success btn-icon-text my-2 me-2" data-href="<?php echo base_url('master/anggota/add_anggota'); ?>" data-name="Tambah Anggota" data-bs-toggle="modal" data-bs-target="#modalKing">
							<i class="fal fa-circle-plus me-2 fa-lg"></i> Tambah
						</button>
						<button type="button" class="btn btn-primary btn-icon-text my-2 me-2" onclick="Reload();">
							<i class="fal fa-circle-radiation me-2 fa-lg muter"></i> Reload
						</button>
						<!--<button type="button" class="btn btn-danger my-2 btn-icon-text">
							<i class="fal fa-file fa-lg me-2"></i> Cetak
						</button>-->
					</div>
				</div>
			</div>
			<div class="row row-sm">
				<div class="col-lg-12">
					<div class="card custom-card overflow-hidden">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered border-bottom" id="anggota">
									<thead class="table-dark">
										<tr>
											<th class="text-white text-center">No</th>
											<th class="text-white text-center">E-KTP</th>
											<th class="text-white text-center">Nama</th>
											<th class="text-white text-center">TTL</th>
											<th class="text-white text-center">JK</th>
											<th class="text-white text-center">Cabang</th>
											<th class="text-white text-center">Aksi</th>
										</tr>
									</thead>
									<tbody class="tx-14"></tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo script_tag('assets/plugins/datatable/js/jquery.dataTables.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/js/dataTables.bootstrap5.js'); ?>
<?php echo script_tag('assets/plugins/datatable/js/dataTables.buttons.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/js/buttons.bootstrap5.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/js/jszip.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/pdfmake/pdfmake.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/pdfmake/vfs_fonts.js'); ?>
<?php echo script_tag('assets/plugins/datatable/js/buttons.html5.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/js/buttons.print.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/js/buttons.colVis.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/dataTables.responsive.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/responsive.bootstrap5.min.js'); ?>
<script>
$(document).ready(function() {
	var lang = "<?php echo base_url('assets/js/Indonesian.json');?>";
	var table = $('#anggota').DataTable( {
		language: {url:lang},
		autoWidth: false,
        	processing: true,
        	serverSide: false,
		ordering: true,
		order: [],
		ajax: "<?php echo base_url('master/anggota/get_data_baru');?>",
	});
});
function Reload()
{
	var table = $('#anggota').DataTable();
	$('.muter').addClass('fa-spin');
	table.ajax.reload(function() {
		$('.muter').removeClass('fa-spin');
	});
}
</script>