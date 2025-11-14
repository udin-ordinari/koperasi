<?php echo link_tag('assets/plugins/datatable/css/dataTables.bootstrap5.css');?>
<?php echo link_tag('assets/plugins/datatable/css/buttons.bootstrap5.min.css');?>
<?php echo link_tag('assets/plugins/datatable/css/responsive.bootstrap5.css');?>

<div class="main-content side-content pt-0">
	<div class="main-container container-fluid">
		<div class="inner-body">
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-20 mg-b-5"><?php echo $page; ?> <span class="text-muted"><?php echo $title; ?></span></h2>
				</div>
				<div class="d-flex">
					<div class="justify-content-center">
						<button type="button" class="btn btn-success btn-icon-text my-2 me-2 rodo-melengkung" onclick="location.href='<?php echo base_url("transaksi/simpanan/form_simpanan"); ?>'">
							<i class="fal fa-plus-circle fa fw- fa-lg me-2"></i> Baru
						</button>
						<button type="button" class="btn btn-primary btn-icon-text my-2 me-2 rodo-melengkung" onclick="Reload();">
							<i class="fal fa-circle-radiation me-2 fa-lg muter"></i> Reload
						</button>
						<button type="button" class="btn btn-danger my-2 btn-icon-text button_export_pdf">
							<i class="far fa-file-pdf fa-lg me-2"></i> Pdf
						</button>					
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table text-nowrap text-md-nowrap mg-b-0 table-bordered align-middle display" style="width:100%" id="simpanan">
							<thead class="table-dark">
								<tr>
									<th class="text-center text-white">No</th>
									<th class="text-center text-white">Anggota</th>
									<th class="text-center text-white">Cabang</th>
									<th class="text-center text-white">Pokok</th>
									<th class="text-center text-white">Wajib</th>
									<th class="text-center text-white">Lain / SWP</th>
									<th class="text-center text-white">Jumlah</th>
									<th class="text-center text-white">Sukarela</th>
									<th class="text-center text-white">Jasa SS</th>
									<th class="text-center text-white">Total</th>
									<th class="text-center text-white">Aksi</th>
								</tr>
							</thead>
							<tbody class="tx-14" style="text-align: left;"></tbody>
							<tfoot class="tx-14">
								<tr>
									<td class="kandel text-end" colspan="3">Total : </td>
									<td class="kandel text-left text-primary">Rp. <?php $pokok = $this->db->select_sum('jumlah', 'total')->where('jns_simp', '1')->where('is_deleted', '0')->get('app_simpanan')->row(); echo number_format((int)$pokok->total, 0, ', ', '.'); ?></td>
									<td class="kandel text-left text-success">Rp. <?php $wajib = $this->db->select_sum('jumlah', 'total')->where('jns_simp', '2')->where('is_deleted', '0')->get('app_simpanan')->row(); echo number_format((int)$wajib->total, 0, ', ', '.'); ?></td>
									<td class="kandel text-left text-warning">Rp. <?php $swp   = $this->db->select_sum('jumlah', 'total')->where('jns_simp', '4')->where('is_deleted', '0')->get('app_simpanan')->row(); echo number_format((int)$swp->total, 0, ', ', '.'); ?></td>
									<td class="kandel text-left text-info">Rp. <?php $sub 	   = $pokok->total + $wajib->total + $swp->total; echo number_format((int)$sub, 0, ', ', '.');?></td>	
									<td class="kandel text-left text-danger">Rp. <?php $suka   = $this->db->select_sum('jumlah', 'total')->where('jns_simp', '3')->where('is_deleted', '0')->get('app_simpanan')->row(); echo number_format((int)$suka->total - total_tarikan_sukarela()->total, 0, ', ', '.'); ?></td>
									<td class="kandel text-left text-muted">Rp. <?php $sukarela = jasa_sukarela() * ($suka->total - total_tarikan_sukarela()->total); echo number_format((int)$sukarela, 0, ', ', '.'); ?></td>
									<td class="kandel text-left" colspan="2">Rp. <?php echo number_format($sub + $suka->total + $sukarela - total_tarikan_sukarela()->total, 0, ', ', '.'); ?></td>
										
								</tr>

							</tfoot>
						</table>
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
<script type="text/javascript">
$(document).ready(function() {
	var table = $('#simpanan').DataTable( {
		language: {url:"<?php echo base_url('assets/js/Indonesian.json');?>"},
		autoWidth: false,
        	processing: true,
        	serverSide: false,
		ordering: true,
		order: [],
		ajax: "<?php echo base_url('transaksi/simpanan/get_data_simpanan');?>",
		buttons: [
				{
					extend: 'excelHtml5',
					filename: 'Daftar Simpanan Anggota',
					messageTop: 'Daftar Simpanan Anggota',
					header: true,
					title: 'KOPKAR "TIRTA LANGGENG"',
					exportOptions: {columns: ':visible', },

				},
				{
					extend : 'pdfHtml5',
					title : 'Daftar Simpanan Anggota',
            				orientation : 'landscape',
            				pageSize : 'A4',
					header: true,
					alignment: 'center',
					exportOptions: {columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
						customize: function(doc) {
    							doc.content[1].table.widths =Array(doc.content[1].table.body[0].length + 1).join('*').split('');
   							doc.defaultStyle.alignment = 'center';
    							doc.styles.tableHeader.alignment = 'center';
						},
					}
        			},
          			{
					extend: 'print',
					messageTop: function () {
						return '<h4 style="text-align:center;font-weight: bold;letter-spacing: .2rem; line-height: 150%;">Daftar Simpanan Anggota</h4>';
					},
					title : 'Daftar Simpanan Anggota',
					exportOptions: {
						columns: ':visible',
						stripHtml: false,
					}
				}
        		]
	});
	$('.button_export_pdf').click(() => { $('#simpanan').DataTable().buttons(0,1).trigger() });
});
function Reload()
{
	var table = $('#simpanan').DataTable();
	$('.muter').addClass('fa-spin');
	table.ajax.reload(function() {
		$('.muter').removeClass('fa-spin');
	});
	return false;
}

function Peringatan($id)
{
	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: "btn btn-success",
			cancelButton: "btn btn-danger"
		},
		buttonsStyling: true
	});
	swalWithBootstrapButtons.fire({
		title: "Anda Yakin ?",
		html: "Yakin Ingin Mengubah Database Ini ?<br>Perubahan Ini Akan<p class='kandel text-danger mb-0 pt-3'>Merubah Semua Laporan Dan Database !</p><br><b>Dan Pasti Semrawut !</b>",		
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Iya, Lakukan !",
		cancelButtonText: "Batal !",
		reverseButtons: true
	}).then((result) => {
		if (result.isConfirmed) {
			location.href="<?php echo base_url('transaksi/simpanan/edit_simpanan/'); ?>" + $id;
		}
		else if (result.dismiss === Swal.DismissReason.cancel) {
			swalWithBootstrapButtons.fire({
				title: "Pyuhhh !",
				html: "Selamet Database Saya !<br>Terima Kasih Ya ?!",
				icon: "success"
			});
		}
	});
}
</script>
