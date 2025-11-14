<?php
if(session('member_id') == '0')
{
	$data = $this->db->where('member_id', '0')->get('app_users');
	foreach($data->result() as $roda)
	{
?>
<input type="hidden" name="app_token" id="app_token" value="<?php echo session('app_token'); ?>" class="form-control">
<div class="card">
	<div class="card-body p-0">
		<div class="row row-sm">
			<div class="form-group col-md-2">
				<label for="input13">Member</label>
				<div class="position-relative input-icon">
					<input type="text" class="form-control" id="ktp" name="ktp" value="<?php echo $roda->member_id; ?>" burem readonly>
					<span class="position-absolute top-50 translate-middle-y"><i class="bx bx-id-card"></i></span>
				</div>
			</div>
			<div class="form-group col-md-2">
				<label for="input13">Level</label>
				<div class="position-relative input-icon">
					<input type="text" class="form-control" id="ktp" name="ktp" value="<?php echo get_level($roda->group_id)->nama; ?>" burem readonly>
					<span class="position-absolute top-50 translate-middle-y"><i class="bx bx-id-card"></i></span>
				</div>
			</div>
			<div class="form-group col-md-4">
				<label for="input14">Username</label>
				<div class="position-relative input-icon">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $roda->username; ?>" burem readonly>
					<span class="position-absolute top-50 translate-middle-y"><i class="bx bx-user"></i></span>
				</div>
			</div>
			<div class="form-group col-md-4">
				<label for="input13">Email</label>
				<div class="position-relative input-icon">
					<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $roda->email; ?>" burem readonly>
					<span class="position-absolute top-50 translate-middle-y"></span>
				</div>
			</div>
			<div class="form-group col-md-4">
				<label for="input14">Nama Lengkap</label>
				<div class="position-relative input-icon">
					<input type="text" class="form-control" id="nama" name="nama" value="Achmad Solachudin" burem readonly>
					<span class="position-absolute top-50 translate-middle-y"><i class="bx bx-user"></i></span>
				</div>
			</div>
			<div class="form-group col-md-4">
				<label for="input14">No Whatsapp</label>
				<div class="position-relative input-icon">
					<input type="text" class="form-control" id="nama" name="nama" value="0895603846300" burem readonly>
					<span class="position-absolute top-50 translate-middle-y"><i class="bx bx-user"></i></span>
				</div>
			</div>
			<div class="col-md-12">
				<label for="input13">Alamat Lengkap</label>
				<div class="position-relative input-icon">
					<input type="text" class="form-control" id="alamat" name="alamat" value="Jl. Raya Karanganyar No.15 RT.08/RW.01 Kel. Karanganyar Tugu Semarang 50152 Jawa Tengah Indonesia" burem readonly>
					<span class="position-absolute top-50 translate-middle-y"></span>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn ripple btn-danger radius-30" data-bs-dismiss="modal"><i class="fal fa-circle-xmark mr-2 fa-lg fa-fw"></i>Tutup </button>
	
</div>


	<?php } ?>

<?php } else { ?>



<form id="profile" enctype="multipart/form-data">
<input type="hidden" name="uid" id="uid" value="<?php echo session('member_id'); ?>" class="form-control">
<input type="hidden" name="app_token" id="app_token" value="<?php echo session('app_token'); ?>" class="form-control">
<div class="">
	<div class="card-body p-0">
		<div class="row row-sm">
			<div class="form-group col-md-3">
				<label for="input13">E-KTP</label>
				<div class="position-relative input-icon">
					<input type="text" class="form-control" id="ktp" name="ktp" value="<?php echo $user->ktp; ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
					<span class="position-absolute top-50 translate-middle-y"><i class="bx bx-id-card"></i></span>
				</div>
			</div>
			<div class="form-group col-md-6">
				<label for="input14">Nama Lengkap</label>
				<div class="position-relative input-icon">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $user->nama; ?>">
					<span class="position-absolute top-50 translate-middle-y"><i class="bx bx-user"></i></span>
				</div>
			</div>
			<div class="form-group col-md-3">
				<label for="input23">Cabang <i class="bx bx-map"></i></label>
				<?php echo form_dropdown('cabang', $this->sistem->dropdowne('app_cabang'), $user->cabang, 'class="form-control select2-show-search select2-dropdown" name="cabang" id="cabang"');?>
			</div>
			<div class="form-group col-md-3">
				<label for="input14">Jenis Kelamin</label>
				<div class="position-relative input-icon">
					<select class="form-control select2-show-search select2-dropdown" id="jk" name="jk">
						<option value="<?php echo $user->jk; ?>"><?php echo $user->jk; ?></option>
						<option>----------------</option>
						<option value="Laki - laki">Laki - laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
				</div>
			</div>
			<div class="form-group col-md-3">
				<label for="input13">Tempat Lahir</label>
				<div class="position-relative input-icon">
					<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $user->tempat_lahir; ?>">
					<span class="position-absolute top-50 translate-middle-y"></span>
				</div>
			</div>
			<div class="form-group col-md-3">
				<label for="input14">Tanggal Lahir</label>
				<div class="position-relative input-icon">
					<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $user->tanggal_lahir; ?>">
					<span class="position-absolute top-50 translate-middle-y"></span>
				</div>
			</div>
			<div class="form-group col-md-3">
				<label for="input13">No Whatsapp / Telp</label>
				<div class="position-relative input-icon">
					<input type="text" class="form-control" id="telp" name="telp" value="<?php echo $user->phone; ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
					<span class="position-absolute top-50 translate-middle-y"></span>
				</div>
			</div>
			<div class="col-md-5">
				<label for="input13">Email</label>
				<div class="position-relative input-icon">
					<input type="email" class="form-control" id="email" name="email" value="<?php echo $user->email; ?>">
					<span class="position-absolute top-50 translate-middle-y"></span>
				</div>
			</div>
			<div class="form-group col-md-7">
				<label for="input13">Photo</label>
				<div class="input-group file-browser">
					<input type="text" class="form-control border-end-0 browse-file" placeholder="choose" readonly>
					<label class="input-group-btn cursor-pointer">
						<span class="btn btn-success">
							Browse <input type="file" style="display: none;" id="gambar" name="gambar" multiple>
						</span>
					</label>
				</div>
			</div>
			<div class="col-md-12">
				<label for="input13">Alamat Lengkap</label>
				<div class="position-relative input-icon">
					<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $user->alamat; ?>">
					<span class="position-absolute top-50 translate-middle-y"></span>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn ripple btn-danger radius-30" data-bs-dismiss="modal"><i class="fal fa-circle-xmark mr-2 fa-lg fa-fw"></i>Tutup </button>
	<button type="submit" class="btn ripple btn-primary sub radius-30" id="sub"> Simpan <i class="fal fa-circle-check fa-lg ml-2 fa-fw"></i></button>
</div>
</form>
<script type="text/javascript">
$('form').on('submit',function(e) {
	e.preventDefault();
	$('.sub').html('<div class="spinner-border spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div>&nbsp; Memproses');
	$.ajax({
		url		: "<?php echo base_url('user/profile/proses_edit_anggota'); ?>",
		type		: "post",
		data		: new FormData(this),
		processData	: false,
		contentType	: false,
		cache		: false,
		async		: false,
		success		: function(data){
		if(data.status == 'success')
		{
			$('#modalGede').modal('hide');
			Lobibox.notify(data.status, {title: data.title, pauseDelayOnHover: false, sound: false, continueDelayOnInactiveTab: false, position: 'top right', icon: 'fa fa-circle-check', msg: data.message});
			setInterval(function() { location.reload(); }, 1500);
		}
		else
		{
			$('#modalGede').modal('hide');
			Lobibox.notify(data.status, {title: data.title, pauseDelayOnHover: false, sound: false, delay: 1500, position: 'top right', icon: 'fa fa-circle-check', msg: data.message});
		}
		},
		error: function(data){
			Lobibox.notify(data.status, {title: data.title, pauseDelayOnHover: false, sound: false, continueDelayOnInactiveTab: false, delay: 1500, height : 'auto', position: 'top right', icon: 'fa fa-circle-exclamation', msg: data.message});
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

	// We can watch for our custom `fileselect` event like this
	$(document).ready( function() {
	  $(':file').on('fileselect', function(event, numFiles, label) {

		  var input = $(this).parents('.input-group').find(':text'),
			  log = numFiles > 1 ? numFiles + ' files selected' : label;

		  if( input.length ) {
			  input.val(log);
		  } else {
			  if( log ) alert(log);
		  }

	  });
	});

</script>
<?php } ?>