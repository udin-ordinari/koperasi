<form id="form" enctype="multipart/form-data">
<input type="hidden" class="form-control" id="app_token" name="app_token" value="<?php echo session('app_token');?>">
<div class="row row-sm">
	<div class="col-lg-12 col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="row row-sm">
					<div class="col-lg">
						<label for="input13">E KTP</label>
						<div class="input-group">
							<span class="input-group-text"><i class="fe fe-credit-card" style="font-size:1.5em !important;"></i></span>
							<input type="text" class="form-control" id="ktp" name="ktp" placeholder="0000000000000000" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						</div>
					</div>
					<div class="col-lg mg-t-10 mg-lg-t-0">
						<label for="input14">Nama Lengkap</label>
						<div class="input-group">
							<span class="input-group-text"><i class="fe fe-award" style="font-size:1.5em !important;"></i></span>
							<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
						</div>
					</div>
					<div class="col-lg mg-t-10 mg-lg-t-0">
						<label for="input23">Cabang <a href="<?php echo base_url('master/setting/cabang');?>">Cabang Baru ?</a></label>
						<div class="input-group">
							<span class="input-group-text"><i class="fe fe-map-pin" style="font-size:1.5em !important;"></i></span>
							<?php echo form_dropdown('cabang', $this->sistem->select_dropdown('app_cabang'), set_value('cabang'), 'class="form-control select2-show-search" id="cabang"'); ?>
						</div>
					</div>
				</div>
				<div class="row row-sm mg-t-10">
					<div class="col-lg">
						<label for="input14">Jenis Kelamin</label>
						<div class="input-group">
							<span class="input-group-text"><i class="fa-regular fa-venus-mars fa-fw"></i></span>
							<select class="form-control select2-show-search" id="jk" name="jk">
								<option value="">Silahkan Pilih</option>
								<option value="Laki - laki">Laki - laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</div>
					</div>
					<div class="col-lg mg-t-10 mg-lg-t-0">
						<label for="input13">Tempat Lahir</label>
						<div class="input-group">
							<span class="input-group-text"><i class="fe fe-map" style="font-size:1.5em !important;"></i></span>
							<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Semarang">
						</div>
					</div>
					<div class="col-lg mg-t-10 mg-lg-t-0">
						<label for="input14">Tanggal Lahir</label>
						<div class="input-group">
							<span class="input-group-text"><i class="fe fe-calendar" style="font-size:1.5em !important;"></i></span>
							<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
						</div>
					</div>
				</div>
				<div class="row row-sm mg-t-10">
					<div class="col-lg">
						<label for="input13">No Whatsapp / Telp</label>
						<div class="input-group">
							<span class="input-group-text"><i class="fa-brands fa-whatsapp" style="font-size:1.5em !important;"></i></span>
							<input type="text" class="form-control" id="telp" name="telp" placeholder="No Whatsapp" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						</div>
					</div>
					<div class="col-lg mg-t-10 mg-lg-t-0">
						<label for="input13">Email</label>
						<div class="input-group">				
							<span class="input-group-text"><i class="fe fe-mail" style="font-size:1.5em !important;"></i></span>
							<input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email">
						</div>
					</div>
					<div class="col-lg mg-t-10 mg-lg-t-0">
						<label for="input13">Foto Anggota</label>
						<div class="input-group file-browser">				
							<input type="text" class="form-control border-end-0 browse-file" id="photo" name="photo" placeholder="Silahkan Upload Foto" readonly>
							<label class="input-group-btn">
								<span class="btn btn-primary cursor-pointer">
									Pilih <input type="file" id="photo" name="photo" style="display: none;">
								</span>
							</label>
						</div>
					</div>
					<div class="col-lg-12 mg-t-10 mg-lg-t-0">
						<label for="input13">Alamat Lengkap</label>
						<div class="input-group">				
							<span class="input-group-text"><i class="fe fe-home" style="font-size:1.5em !important;"></i></span>
							<input type="email" class="form-control" id="alamat" name="alamat" placeholder="Isi Dengan Alamat Lengkap Termasuk RT / RW Kel. Kec. Kota/Kab Provinsi Kode Pos">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer1 middle1">
			<button type="button" class="btn ripple btn-secondary tengah" data-bs-dismiss="modal"><i class="fa-light fa-xmark-circle fa-fw fa-lg mr-2 me-2"></i>Tutup</button>
			<button type="submit" class="btn ripple btn-success tengah Tambah" id="tambah">Tambah <i class="fa-light fa-circle-plus fa-fw fa-lg ml-2 me-2 mr-0"></i></button>
		</div>
	</div>
</div>
</form>
<script type="text/javascript">
$('.Tambah').click(function(e) {
	e.preventDefault();
	let form = $(this).closest('#form');
	$('#tambah, #ktp, #nama, #cabang, #jk, #tempat_lahir, #tanggal_lahir, #telp, #email, #alamat').addClass('disabled');
	$('.Tambah').html('<div class="light-loader1" role="status"><span class="sr-only"></span></div>&nbsp; Memproses');
	$.ajax({
		url: "<?php echo base_url('master/anggota/proses_add_anggota');?>",
		data: form.serialize(),
		type: 'POST',
		async: true,
		success: function(response)
		{
			var res = response;
			if (res.status == 'success')
			{
				$(".Tambah").html('Simpan <i class="fal fa-circle-plus fa-fw fa-lg ml-1"></i>');
				$('#modalKing').hide();
				var notif = Lobibox.notify(response.status, {title: response.title, position: 'top right', icon: true, msg: response.message});
				setTimeout(() => {
					notif.remove();
					var table = $('#anggota').DataTable();
					table.ajax.reload();
					$('#modalKing').modal('hide');
				}, 2000);
			}
			else
			{
				$(".Tambah").html('Simpan <i class="fal fa-circle-plus fa-fw fa-lg ml-1"></i>');
				$('#tambah, #ktp, #nama, #cabang, #jk, #tempat_lahir, #tanggal_lahir, #telp, #email, #alamat').removeClass('disabled');
				Lobibox.notify(res.status, {title: res.title, messageHeight: 260, position: 'top right', icon: true, msg: res.message});
			}
		},
		error: function()
		{
			$('#tambah, #ktp, #nama, #cabang, #jk, #tempat_lahir, #tanggal_lahir, #telp, #email, #alamat').removeClass('disabled');
			$(".Tambah").html('Simpan <i class="fal fa-circle-plus fa-fw fa-lg ml-1"></i>');
			Lobibox.notify('error', {title: 'Maaf !', delayIndicator: false, pauseDelayOnHover: false, continueDelayOnInactiveTab: false, delay: 2000, position: 'top right', icon: true, msg: 'Ada Masalah Dengan Sistem !'});
		}
	});
});
// Filebrowser
$(document).on('change', ':file', function() {
	var input = $(this),
	numFiles = input.get(0).files ? input.get(0).files.length : 1,
	label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
	input.trigger('fileselect', [numFiles, label]);
});
$(document).ready( function() {
	$(':file').on('fileselect', function(event, numFiles, label) {
		var input = $(this).parents('.input-group').find(':text'),
		log = numFiles > 1 ? numFiles + ' files selected' : label;
		if( input.length ) {
			input.val(log);
		}
		else
		{
			if( log ) alert(log);
		}
	});
});
$(document).ready(function() {
	$('.select2-show-search').select2({
		minimumResultsForSearch: '',
		placeholder: "Search",
		width: '85%'
	});
	
});
</script>