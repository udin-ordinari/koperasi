<form id="submit" accept-charset="utf-8" enctype="multipart/form-data">
<input type="hidden" class="form-control" id="app_token" name="app_token" value="<?php echo session('app_token');?>">
<input type="hidden" class="form-control" id="uid" name="uid" value="<?php echo $nasabah->id;?>">
<div class="row row-sm">
	<div class="col-lg-12 col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="row row-sm">
					<div class="col-lg">
						<label for="input13">E KTP</label>
						<div class="input-group">
							<span class="input-group-text"><i class="fe fe-credit-card" style="font-size:1.5em !important;"></i></span>
							<input type="text" class="form-control" id="ktp" name="ktp" value="<?php echo $nasabah->ktp; ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						</div>
					</div>
					<div class="col-lg mg-t-10 mg-lg-t-0">
						<label for="input14">Nama Lengkap</label>
						<div class="input-group">
							<span class="input-group-text"><i class="fe fe-award" style="font-size:1.5em !important;"></i></span>
							<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nasabah->nama; ?>">
						</div>
					</div>
					<div class="col-lg mg-t-10 mg-lg-t-0">
						<label for="input23">Cabang <a href="<?php echo base_url('master/setting/cabang');?>">Cabang Baru ?</a></label>
						<div class="input-group">
							<span class="input-group-text"><i class="fe fe-map-pin" style="font-size:1.5em !important;"></i></span>
							<?php echo form_dropdown('cabang', $this->sistem->dropdowne('app_cabang'), $nasabah->cabang, 'class="form-control select2-show-search select2-dropdown" id="cabang"'); ?>
						</div>
					</div>
				</div>
				<div class="row row-sm mg-t-10">
					<div class="col-lg">
						<label for="input14">Jenis Kelamin</label>
						<div class="input-group">
							<div class="input-group-text border-end-0">
								<i class="fa-regular fa-venus-mars" style="font-size:1.2em !important;"></i>
							</div>

							<select class="form-control select2-show-search" id="jk" name="jk">
								<option value="<?php echo $nasabah->jk; ?>"><?php echo $nasabah->jk; ?></option>
								<option value="<?php echo $nasabah->jk; ?>">Silahkan Pilih</option>
								<option value="Laki - laki">Laki - laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</div>
					</div>
					<div class="col-lg mg-t-10 mg-lg-t-0">
						<label for="input13">Tempat Lahir</label>
						<div class="input-group">
							<span class="input-group-text"><i class="fe fe-map" style="font-size:1.5em !important;"></i></span>
							<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $nasabah->tempat_lahir; ?>">
						</div>
					</div>
					<div class="col-lg mg-t-10 mg-lg-t-0">
						<label for="input14">Tanggal Lahir</label>
						<div class="input-group">
							<span class="input-group-text"><i class="fe fe-calendar" style="font-size:1.5em !important;"></i></span>
							<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $nasabah->tanggal_lahir; ?>">
						</div>
					</div>
				</div>
				<div class="row row-sm mg-t-10">
					<div class="col-lg">
						<label for="input13">No Whatsapp / Telp</label>
						<div class="input-group">
							<span class="input-group-text"><i class="fa-brands fa-whatsapp" style="font-size:1.5em !important;"></i></span>
							<input type="text" class="form-control" id="telp" name="telp" value="<?php echo $nasabah->phone; ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						</div>
					</div>
					<div class="col-lg mg-t-10 mg-lg-t-0">
						<label for="input13">Email</label>
						<div class="input-group">				
							<span class="input-group-text"><i class="fe fe-mail" style="font-size:1.5em !important;"></i></span>
							<input type="email" class="form-control" id="email" name="email" value="<?php echo $nasabah->email; ?>">
						</div>
					</div>
					<div class="col-lg mg-t-10 mg-lg-t-0">
						<label for="input13">Foto Anggota</label>
						<div class="input-group file-browser">				
							<input type="text" class="form-control border-end-0 browse-file" id="photo" name="photo" placeholder="Silahkan Upload Foto Bila Ingin Diganti">
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
							<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $nasabah->alamat; ?>">
						</div>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary radius-30 tengah" data-bs-dismiss="modal"><i class="fa-light fa-xmark-circle fa-fw fa-lg mr-2 me-2"></i>Tutup</button>
				<button type="submit" class="btn ripple btn-success radius-30 btnUpdate tengah">Perbarui <i class="fa-light fa-circle-check fa-fw fa-lg ml-2 me-1 mr-0"></i></button>
			</div>
		</div>
	</div>
</div>
<?php echo form_close() ?>

<script type="text/javascript">
$('form').on('submit',function(e){
	e.preventDefault();
	$('.btnUpdate').html('<div class="light-loader1" role="status"><span class="sr-only"></span></div>&nbsp; Memproses');
	$.ajax({
		url: "<?php echo base_url('master/anggota/proses_edit_anggota');?>",
		type: "post",
		data: new FormData(this),
		processData: false,
		contentType: false,
		cache: false,
		async: false, 
		success: function(response)
		{
			if (response.status == 'success')
			{
				$('#modalKing').hide();
				$('.btnUpdate').html('Perbarui <i class="fa-light fa-circle-check fa-fw fa-lg ml-2 me-1 mr-0"></i>');
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
				$('.btnUpdate').html('Perbarui <i class="fa-light fa-circle-check fa-fw fa-lg ml-2 me-1 mr-0"></i>');
				Lobibox.notify(response.status, {title: response.title, pauseDelayOnHover: false, continueDelayOnInactiveTab: false, delay: 2000, position: 'top right', icon: true, msg: response.message});
			}			
		},

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