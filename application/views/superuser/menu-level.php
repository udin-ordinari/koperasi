<?php echo link_tag('assets/plugins/datatable/css/dataTables.bootstrap5.css');?>
<?php echo link_tag('assets/plugins/datatable/css/responsive.bootstrap5.css');?>
<input type="hidden" class="form-control" id="app_token" name="app_token" value="<?php echo session('app_token');?>">
<input type="hidden" class="form-control" id="table" name="table" value="app_users_privileges">
<div class="main-content side-content pt-0">
	<div class="main-container container-fluid">
		<div class="inner-body">
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-20 mg-b-5"><?php echo $page; ?> <span class="text-muted"><?php echo $title; ?></span></h2>		
				</div>

				<div class="ms-auto">
					<div class="btn-group middle">
						<button type="button" class="btn ripple btn-success btn-icon-text my-2 me-2" data-bs-toggle="modal" data-bs-target="#modalGede" data-href="<?php echo base_url('superuser/add_menu_level');?>" data-name="Tambah">
							<i class="fal fa-circle-plus me-2 fa-lg"></i> Tambah
						</button>
						<button type="button" class="btn btn-primary btn-icon-text my-2 me-2" onclick="Reload();">
							<i class="fal fa-circle-radiation me-2 fa-lg muter"></i> Reload
						</button>
						<button type="button" class="btn ripple btn-danger btn-icon-text my-2 me-2" onclick="Kosongi();" data-bs-toggle="tooltip-primary" data-bs-placement="bottom" data-bs-title="Kosongi Data">
							<i class="fal fa-trash fa-lg me-2"></i> Kosongi
						</button>
					</div>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="menu_level" class="menu_level table table-striped table-bordered">
						<thead class="bg-primary">
							<tr>
								<th class="text-white wd-10">No</th>
								<th class="text-white wd-180">Level Pengguna</th>
								<th class="text-white wd-600">Modul</th>
								<th class="text-white text-center wd-10">Aksi</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo script_tag('assets/plugins/datatable/js/jquery.dataTables.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/js/dataTables.bootstrap5.js'); ?>
<?php echo script_tag('assets/plugins/datatable/dataTables.responsive.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/responsive.bootstrap5.min.js'); ?>
<script>
$(document).ready(function() {
	$('#menu_level').DataTable({
		language: {url:"<?php echo base_url('assets/js/Indonesian.json');?>"},
		autoWidth: false,
        	processing: true,
        	serverSide: false,
		ordering: true,
		order: [],
		ajax: "<?php echo base_url('superuser/get_menu_level');?>"
	});
} );
function Reload()
{
	var table = $('#menu_level').DataTable();
	$('.muter').addClass('fa-spin');
	table.ajax.reload(function() {
		$('.muter').removeClass('fa-spin');
	});
	return false;
}
function Kosongi()
{
	Swal.fire({
		title: "Peringatan !",
		html: "<span class='tx-16 mb-0'>Menghapus Database Bisa Merusak Aplikasi !<br>Anda Tidak Bisa Membatalkan Setelah Diproses !</span>",
		imageUrl: "<?php echo base_url('assets/img/stop.png'); ?>",
		imageWidth: 150,
		imageHeight: 150,
		imageAlt: "Stop",
		showCancelButton: true,
		confirmButtonColor: "#d33",
		cancelButtonColor: "#3085d6",
		confirmButtonText: "<i class='fal fa-circle-exclamation fa-fw fa-lg mr-1'></i> Ya, Hapus",
		cancelButtonText: "Batal <i class='fal fa-xmark-circle fa-fw fa-lg ml-1'></i>"
	}).then((result) => {
		if (result.isConfirmed) {
			Notiflix.Loading.circle('Memproses.....');
			var values = {app_token: $('#app_token').val(), table: $('#table').val()};
			$.post("<?php echo base_url('database/hapus_database');?>", values, function(response)
			{
				var res = response;
				if (res.status == 'success')
				{
					Notiflix.Loading.remove();
					var notif = Lobibox.notify(response.status, {title: response.title, delayIndicator: false, position: 'top right', icon: true, msg: response.message});
					setTimeout(() => {
						notif.remove();
						var table = $('#menu_level').DataTable();
						table.ajax.reload();
						$('#modalGede').modal('hide');
					}, 2000);
				}
				else
				{
					Notiflix.Loading.remove();
					Lobibox.notify(res.status, {title: res.title, rounded: true, delayIndicator: false, position: 'top right', icon: true, msg: res.message});
				}
			});
  		}
	});
}
</script>