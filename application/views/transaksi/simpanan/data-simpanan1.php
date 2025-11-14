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
	<tfoot align="right">
		<tr>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
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


    	"footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // converting to interger to find total
	    var intVal = function (i) {
            	return typeof i === 'string'
                	? i.replace(/[\$,]/g, '') * 1
                	: typeof i === 'number'
                	? i
                	: 0;
	    };
 
            // computing column Total of the complete result 
            var pokTotal = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
	    var jibTotal = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
            var swpTotal = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
	     var subTotal = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
	     var sukaTotal = api
                .column( 7 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
			
				
            // Update footer by showing the total with the reference of the column index 
	    $( api.column( 2 ).footer() ).html('Total');
            $( api.column( 3 ).footer() ).html('Rp. '+ pokTotal );
            $( api.column( 4 ).footer() ).html('Rp. '+ jibTotal);
            $( api.column( 5 ).footer() ).html('Rp. '+ swpTotal);
            $( api.column( 6 ).footer() ).html('Rp. '+ subTotal);
            $( api.column( 7 ).footer() ).html('Rp. '+ sukaTotal);

        },
	"language": {url:"<?php echo base_url('assets/js/Indonesian.json');?>"},
        "processing": true,
        "serverSide": false,
        "ajax": "<?php echo base_url('transaksi/simpanan/get_data_simpanan');?>",



	});

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
