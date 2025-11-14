<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php echo link_tag('assets/plugins/nestable/jquery.nestable.css');?>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/nestable/jquery.nestable.js')?>"></script>
<input type="hidden" class="form-control" id="app_token" name="app_token" value="<?php echo session('app_token');?>">
<input type="hidden" class="form-control" id="table" name="table" value="app_menus">

<div class="main-content side-content pt-0">
	<div class="main-container container-fluid">
		<div class="inner-body">
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-20 mb-0"><?php echo $page; ?><span class="text-muted"> <?php echo $title; ?> </span></h2>
				</div>

				<div class="ms-auto">
					<div class="btn-group middle">
						<button type="button" class="btn ripple btn-danger btn-icon-text my-2 me-2" onclick="Kosongi();" data-bs-toggle="tooltip-primary" data-bs-placement="bottom" data-bs-title="Kosongi Data">
							<i class="fal fa-trash fa-lg me-2"></i> Kosongi
						</button>
					</div>
				</div>
			</div>
			<div class="row row-sm mb-4">
				<div class="col-12 col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="accordion" id="accordionExample">
								<div class="accordion-item">
									<h2 class="accordion-header" id="headingOne">
						  				<button class="btn ripple btn-warning collapsed kandel w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Menu</button>
									</h2>
									<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
										<div class="accordion-body">
											<div class="mb-2">
												<label for="menu_url" class="mb-2">Link URL</label>
												<input type="text" class="form-control" id="alamat_url" name="alamat_url">
											</div>
											<div class="mb-2">
												<label for="menu_title" class="mb-2">Menu Text</label>
												<input type="text" class="form-control" id="nama_menu" name="nama_menu">
											</div>
											<div class="mb-2">
												<label for="menu_title" class="mb-2">Module</label>
												<select class="form-control select2" id="module_id" name="module_id">
													<option selected> -- Silahkan Pilih -- </option>
												<?php $hasil = $this->db->get('app_modules')->result(); ?>
												<?php foreach($hasil as $row) { ?>
													<option value="<?php echo $row->id; ?>"><?php echo $row->module_name; ?></option>
												<?php } ?>
												</select>
											</div>
											<div class="mb-3">
												<label for="menu_title" class="mb-2">Menu Ikon</label>
												<input type="text" class="form-control mb-2" id="ikon_menu" name="ikon_menu">
												<span class="text-danger tx-14 kandel">* Jika Kosong Isi Dengan "fal" tanpa ""</span>
											</div>
										</div>
										<div class="accordion-body text-center">
											<div class="align-items-center gap-3">
												<button type="submit" class="btn btn-secondary px-4 pe-4" onclick="save_links(); return false;">Simpan <i class="fa-light fa-floppy-disk-circle-arrow-right fa-fw fa-lg ml-2"></i></button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="col-12 col-lg-8">
					<div class="card">
						<div class="card-body tabs-style-2">
							<div class=" tab-menu-heading">
								<div class="tabs-menu1">
									<ul class="nav panel-tabs main-nav-line">
										<li><a class="nav-link active mt-1" data-bs-toggle="tab" href="#menu_structure" role="tab" aria-selected="true"><i class="fa fa-arrow-down-a-z font-18 me-1"></i> Struktur Menu </a></li>
										<li><a class="nav-link mt-1" data-bs-toggle="tab" href="#kelolamenu" role="tab" aria-selected="false"><i class="fa fa-wrench font-18 me-1"></i> Kelola Menu</a></li>
							
									</ul>
								</div>
							</div>
							<div class="panel-body tabs-menu-body main-content-body-right border">
								<div class="tab-content">
									<div class="tab-pane active" id="menu_structure" role="tabpanel">
										<div class="cf nestable-lists">
											<div class="dd mb-4" id="nestable"></div>
										</div>
										<button class="btn btn-primary px-4 pe-4" onclick="save_menu_position();">Simpan <i class="fal fa-check-circle fa-fw fa-lg ml-2 me-2 mr-0"></i></button>
									</div>
									<div class="tab-pane" id="kelolamenu" role="tabpanel">
										<div class="tx-14" id="list-menus" style="margin-bottom:10px;"></div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal modal-form fade" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
		<div class="modal-content modal-content-demo">
			<div class="modal-header">
				<h6 class="modal-title">Edit Menu</h6>
				<a aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></a>
			</div>
			<form role="form">
			<input type="hidden" class="form-control" id="app_token" name="app_token" value="<?php echo session('app_token');?>">
			<input type="hidden" id="record_id" name="record_id">
			<div class="modal-body">
				<div class="card-body">
					<div class="row row-sm">
						<div class="col-md-4">
							<div class="form-group">
								<p class="mg-b-10">Teks Menu</p>
								<input type="text" class="form-control" id="c_nama_menu" name="c_nama_menu">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<p class="mg-b-10">Link URL</p>
								<input type="text" class="form-control" id="c_alamat_url" name="c_alamat_url">
							</div>
						</div>
	
						<div class="col-md-4">
							<div class="form-group">
								<p class="mg-b-10">Module</p>
								<select class="form-control select2" id="c_module_id" name="c_module_id">					
									<option selected>Silahkan Pilih</option>
									<?php $hasil = $this->db->get('app_modules')->result(); ?>
									<?php foreach($hasil as $row) { ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->module_name; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="col-md-12 ">
							<div class="form-group row justify-content-end mb-0">
								<div class="col-md-8 ps-md-2">
									<button type="button" class="btn btn-secondary tengah mg-r-5" data-bs-dismiss="modal">Tutup</button>
									<button class="btn btn-primary tengah" onclick="SubmitForm(); return false;">Perbarui</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>


<script type="text/javascript">
const BASE_URL = '<?php echo base_url();?>';
MenuTypes = {
	'1': 'Transaksi',
	'2': 'Rekap Laporan',
	'3': 'Laporan',
	'4': 'Master Data',
	'5': 'Pengaturan Lain'
};

function OnEdit( id ) {
	$('.modal-form').modal('show');
	$('#record_id').val(id);
	$.post(BASE_URL + 'superuser/find_id', {'id':id}, function( response ) {
		var res = response;
		$('#c_nama_menu').val(res.nama_menu);
		$('#c_alamat_url').val(res.alamat_url);
		$('#c_module_id option[value="' + res.c_modue_id + '"]').attr('selected','selected');
	});
}

/**
* Update Menu
*/
function SubmitForm() {
	var values = {
		nama_menu: $('#c_nama_menu').val(),
		alamat_url: $('#c_alamat_url').val(),
		module_id: $('#c_module_id').val(),
		id: $('#record_id').val()
	};
	showLoading();
	$.post(BASE_URL + 'superuser/save', values, function( response ) {
		Swal.hideLoading();
		var res = response;
		if (res.status == 'success') {
			var notif = Lobibox.notify(response.status, {title: response.title, position: 'top right', icon: true, msg: response.message});
			setTimeout(() => {
				notif.remove();
				get_menus();
				$('#modal-form').modal('hide');
			}, 2000);
			
		} else {
			Lobibox.notify(res.status, {title: res.title, position: 'top right', icon: true, msg: res.message});
		}
	});
}


function save_links() {
	var values = {
		alamat_url: $('#alamat_url').val(),
		nama_menu: $('#nama_menu').val(),
		module_id: $('#module_id').val(),
		ikon_menu: $('#ikon_menu').val(),
	};
	if (values['alamat_url'] && values['nama_menu'] && values['module_id'] && values['ikon_menu']) {
		showLoading();
		$.post(BASE_URL + 'superuser/save_links', values, function( response ) {
			Swal.hideLoading();
			var res = response;
			Lobibox.notify(res.status, {title: res.title, position: 'top right', icon: true, msg: res.message});
			$('#alamat_url, #nama_menu, #module_id, #ikon_menu').val('');
			nested_menus();
		});
	} else {
		Lobibox.notify('info', {title: 'Maaf !', position: 'top right', icon: true, msg: 'Data Ada Yang Belum Diisi !'});
	}
}


/**
* Save List Modules
*/
function save_modules() {
	var inputs = $('#modules').find('input[type="checkbox"]:checked');
	var modules = [];
	inputs.each(function() {
		var value = $(this).val();
		modules.push(value);
	});
	var values = {
		'modules': modules.join(',')
	};
	if (modules.length) {
		showLoading();
		$.post(BASE_URL + 'superuser/save_modules', values, function( response ) {
			Swal.hideLoading();
			inputs.each(function() {
				$( this ).prop('checked', false);
			});
			$( '.checkall-modules' ).prop('checked', false);
			var res = response;
			Lobibox.notify(res.status, {title: res.title, position: 'top right', icon: true, msg: res.message});
			nested_menus();
			get_menus();
		});
	} else {
		Lobibox.notify('warning', {title: 'Waduh !', position: 'top right', icon: true, msg: 'Apa ya !'});
	}
}

/**
* Get All Menus
*/
function get_menus() {
	$.get(BASE_URL + 'superuser/get_menus', function( response ) {
		var res = response;
		var rows = res.rows;
		var str = '<table class="table table-hover table-striped table-condensed">'
		+ '<thead class="table-primary">'
		+ '<tr>'
		+ '<th>No.</th>'
		+ '<th>Menu</th>'
		+ '<th>Link</th>'
		+ '<th>Menu Dari</th>'
		+ '<th colspan="2" class="text-center">Aksi</th>'

		+ '</tr>'
		+ '</thead>'
		+ '<tbody>';
		var no = 1;
		for (var z in rows) {
			var row = rows[ z ];
			str += '<tr>'
			+ '<td>' + no + '.</td>'
			+ '<td>' + row.nama_menu + '</td>'
			+ '<td>' + row.alamat_url + '</td>'
			+ '<td>' + MenuTypes[ row.module_id ] + '</td>'
			+ '<td><a class="text-info" href="javascript:void(0)" onclick="OnEdit(' + row.id + ')"><i class="far fa-pencil"></i></a></td>'
			+ '<td><a class="text-danger" href="javascript:void(0)" onclick="delete_permanently(' + row.id + ')"><i class="far fa-trash"></i></a></td>'
			+ '</tr>';
			no++;
		}
		str += '</tbody>'
		+ '</table>';
		$('#list-menus').html(str);
	});
}

/**
* Delete Menus
* @param Number
*/
function delete_permanently( id ) {
	Swal.fire({
		title: "Data Akan Dihapus !",
		text: "Apakah anda yakin akan menghapus menu ?",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Konfirmasi"
		}).then((result) => {
			if (result.isConfirmed) {
				$.post( BASE_URL + 'superuser/delete_permanently', {id:id}, function( response )
				{
					var res = response;
					Swal.fire({
						title: "Deleted!",
						text: "Your file has been deleted.",
						icon: "success"
					});
					get_menus();
					nested_menus();
				});
			}
		});


}

/**
* Delete All Menus
*/
function truncate_table() {
	eModal.confirm('Apakah anda yakin akan menghapus semua menu ?', 'Konfirmasi').then(function() {
		$.get(BASE_URL + 'superuser/truncate_table', function( response ) {
			var res = response;
			Lobibox.notify(res.status, {title: res.title, position: 'top right', icon: true, msg: res.message});
			get_menus();
			nested_menus();
		});
	});
}

/**
* Nested List for drag n drop menu position
*/
function nested_menus() {
	$.get(BASE_URL + 'superuser/nested_menus', function( response ) {
		var menus = response.query;
		var NestedList = function( menus ) {
			var str = '';
			for ( var z in menus ) {
				var menu = menus[ z ];
				str += '<li class="dd-item" data-id="' + menu.id + '">';
				str += '<div class="dd-handle">'+ menu.nama_menu.toUpperCase() +'</div>';
				var sub_menu = NestedList(menu.children);
				if (sub_menu) {
					str += '<ol class="dd-list">' + sub_menu + '</ol>';
				}
				str += '</li>';
			}
			return str;
		}
		if ( menus.length ) {
			var menu = '<ol class="dd-list">';
			menu += NestedList( menus );
			menu += '</ol>';
			$( '.dd' ).html( menu );
		}

	});
}

/**
* Check all checkbox
* @param String
* @param Boolean
* Check all checkbox
*/
function checkAll( target, isTrue ) {
	$( document ).find('input[type="checkbox"].' + target).prop('checked', isTrue);
}

/**
* Save Menu
*/
function save_menu_position() {
	showLoading();
	var serialize_menus = window.serialize_menus;
	$.post(BASE_URL + 'superuser/save_menu_position', {"menus":serialize_menus}, function( response ) {
		Swal.hideLoading();
		var res = response;
		Lobibox.notify(res.status, {title: res.title, position: 'top right', icon: true, msg: res.message});
	});
}

$( document ).ready(function() {
	nested_menus();
	get_menus();
	var updateOutput = function(e) {
		var list = e.length ? e : $(e.target), output = list.data('output');
		if ( window.JSON ) window.serialize_menus = window.JSON.stringify(list.nestable('serialize'));
	};
	$('#nestable').nestable().on('change', updateOutput);
});

const showLoading = function() {
	let timerInterval;
	Swal.fire({
		title: 'Tunggu Sebentar !',
		html: '<span class="tx-18">Memproses...</span><br><br><div class="dark-loader1" style="width: 1.5rem; height: 1.5rem;" role="status"></div>',
		icon: 'info',
		timer: 1000,
		timerProgressBar: false,
		showConfirmButton: false,
		didOpen: () => {
			//Swal.showLoading();
		},
		willClose: () => {
			clearInterval(timerInterval);
		}
	}).then((result) => {
		if (result.dismiss === Swal.DismissReason.timer) {
			location.reload();
		}
	});
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
			$.post("<?php echo base_url('superuser/hapus_database');?>", values, function(response)
			{
				var res = response;
				if (res.status == 'success')
				{
					Notiflix.Loading.remove();
					var notif = Lobibox.notify(response.status, {title: response.title, position: 'top right', icon: true, msg: response.message});
					setTimeout(() => {
						$('#modalGede').modal('hide');
						notif.remove();
						location.reload();
					}, 2000);
				}
				else
				{
					Notiflix.Loading.remove();
					Lobibox.notify(res.status, {title: res.title, rounded: true, position: 'top right', icon: true, msg: res.message});
				}
			});
  		}
	});
}
</script>
