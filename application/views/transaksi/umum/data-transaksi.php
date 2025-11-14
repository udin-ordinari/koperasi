<div class="main-content">
	<div class="page-content">
		<div class="container-fluid">
			<div class="row">
                        	<div class="col-12">
                            		<div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                		<h4 class="mb-sm-0"><?php echo $page; ?> <span class="text-muted"><?php echo $title; ?></span></h4>
						<div class="page-title-right">
                                    			<ol class="breadcrumb m-0">
								<button type="button" class="btn btn-success btn-icon-text my-2 me-2 rodo-melengkung"  data-href="<?php echo base_url('transaksi/umum/add_transaksi'); ?>" data-name="Tambah Transaksi" data-bs-toggle="modal" data-bs-target="#modalGede">
									<i class="fal fa-plus-circle fa fw- fa-lg me-2"></i> Baru
								</button>
								<button type="button" class="btn btn-primary btn-icon-text my-2 me-2 rodo-melengkung" onclick="Reload();">
									<i class="fal fa-circle-radiation me-2 fa-lg muter"></i> Reload
								</button>
								<button type="button" class="btn btn-danger my-2 btn-icon-text rodo-melengkung" onclick="Print();">
									<i class="fal fa-print fa-lg me-2"></i> Cetak
								</button>					
							</ol>
						</div>
					</div>
                        	</div>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered border-bottom align-middle" id="data-transaksi">
							<thead class="table-dark">
								<tr>
									<th class="text-white">No</th>
									<th class="text-white">Tgl</th>
									<th class="text-white">Akun</th>
									<th class="text-white">Keterangan</th>
									<th class="text-white">Posisi</th>
									<th class="text-white">Jumlah</th>
									<th class="text-white">Aksi</th>
								</tr>
							</thead>
							<tbody class="tx-14 text-nowrap text-md-nowrap"></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
	var table = $('#data-transaksi').DataTable( {
		language: {url:"<?php echo base_url('assets/js/Indonesian.json');?>"},
		autoWidth: false,
        	processing: true,
        	serverSide: false,
		ordering: true,
		order: [],
		ajax: "<?php echo base_url('transaksi/umum/get_trans_new');?>",
	});
});
function Reload()
{
	var table = $('#data-transaksi').DataTable();
	$('.muter').addClass('fa-spin');
	table.ajax.reload(function() {
		$('.muter').removeClass('fa-spin');
	});
	return false;
}
function Print()
{
	Swal.fire({
		icon: "info",
		title: "Maaf !",
		html: "<h5>Module Ini Belum Diaktifkan.<br>Sabar Ya ?!</h5>",
		showClass: {
			popup: `
      			animate__animated
      			animate__slideInDown
      			animate__faster
    			`
  		},
  		hideClass: {
    			popup: `
      			animate__animated
      			animate__slideOutDown
      			animate__faster
    		`
  		}
	});	
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
			location.href="<?php echo base_url('transaksi/umum/edit_transaksi/'); ?>" + $id;
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
