	<?php echo link_tag('assets/plugins/datatable/css/dataTables.bootstrap5.css');?>
	<?php echo link_tag('assets/plugins/datatable/css/buttons.bootstrap5.min.css');?>
	<?php echo link_tag('assets/plugins/datatable/css/responsive.bootstrap5.css');?>
			<!-- Main Content-->
			<div class="main-content side-content pt-0">

				<div class="main-container container-fluid">
					<div class="inner-body">
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Master <span class="text-muted"><?php echo $title; ?></span></h2>
							</div>
							<div class="d-flex">
								<div class="justify-content-center">
									<button type="button" class="btn btn-primary btn-icon-text my-2 me-2" onclick="Reload();">
										<i class="fal fa-circle-radiation me-2 fa-lg muter"></i> Reload
									</button>
								</div>
							</div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row row-sm">
							<div class="col-lg-12">
								<div class="card custom-card overflow-hidden">
									<div class="card-body">
										<div class="table-responsive">
											<table id="anggota" class="anggota table mb-0 align-middle display">
												<thead class="table-dark text-center">
													<tr>
														<th class="text-white">No</th>
														<th class="text-white">E-KTP</th>
														<th class="text-white">Nama</th>
														<th class="text-white">TTL</th>
														<th class="text-white">L/P</th>
														<th class="text-white">Cabang</th>
														<th class="text-white">No HP / WA</th>
														<th class="text-white">Aksi</th>
													</tr>
												</thead>
												<tbody class="tx-14">
													
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->

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
<script type="text/javascript">
$(document).ready(function() {
	var table = $('#anggota').DataTable( {
		language: {url:"<?php echo base_url('assets/js/Indonesian.json');?>"},
		autoWidth: false,
        	processing: true,
        	serverSide: false,
		ordering: true,
		order: [],
		ajax: '<?php echo base_url();?>master/anggota/get_data_nonaktif',
		buttons: [
				{
					extend: 'excelHtml5',
					filename: 'Daftar Anggota Koperasi',
					messageTop: 'DAFTAR ANGGOTA KOPERASI',
					header: true,
					title: 'KOPKAR "TIRTA LANGGENG"',
					exportOptions: {columns: ':visible', },

				},
				{
					extend : 'pdfHtml5',
					title : 'Daftar Anggota Koperasi',
            				orientation : 'portrait',
            				pageSize : 'A4',
					header: true,
					exportOptions: {
						columns: ':visible',
					},
        			},
          			{
					extend: 'print',
					messageTop: function () {
						return '<h4 style="text-align:center;font-weight: bold;letter-spacing: .2rem; line-height: 150%;">Daftar Anggota Koperasi</h4>';
					},
					title : 'Daftar Anggota Koperasi',
					exportOptions: {
						columns: ':visible',
						stripHtml: false,
					}
				}
        	]
	});
	$('.button_export_excel').click(() => { $('#anggota').DataTable().buttons(0,0).trigger() });
	$('.button_export_pdf').click(() => { $('#anggota').DataTable().buttons(0,1).trigger() });
	$('.button_export_print').click(() => { $('#anggota').DataTable().buttons(0,2).trigger() });
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