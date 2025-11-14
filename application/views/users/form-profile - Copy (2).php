<input type="text" name="app_token" id="app_token" value="<?php echo session('app_token'); ?>" class="form-control sembunyi">
<?php
if(session('member_id') == '0')
{
	$data = $this->db->where('member_id', '0')->get('app_users');
	foreach($data->result() as $roda)
	{
?>

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="row align-items-center g-3">
					<div class="col-lg-4">
                                                <label for="validationDefault01" class="form-label">First name</label>
						<input class="form-control form-control" type="text" placeholder=".form-control-sm">
					</div>
					<div class="col-lg-4">
                                                <label for="validationDefault01" class="form-label">First name</label>
						<input class="form-control form-control" type="text" placeholder=".form-control-sm">
					</div>
					<div class="col-lg-4">
                                                <label for="validationDefault01" class="form-label">First name</label>
						<input class="form-control form-control" type="text" placeholder=".form-control-sm">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12">
		<div class="text-center align-items-center justify-content-between gap-3">
			<button class="btn btn-primary" type="submit">Submit form</button>
			<button class="btn btn-success" type="submit">Submit form</button>
		</div>
	</div>
</div>


<?php
	}
}
else
{ ?>
<form id="profile" enctype="multipart/form-data">
<input type="text" name="uid" id="uid" value="<?php echo session('member_id'); ?>" class="form-control sembunyi">
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="row align-items-center g-3">
					<div class="col-lg-3">
                                                <label for="E-KTP" class="form-label">E-KTP</label>
                                                <div class="input-group">
                                                	<span class="input-group-text"><i class="bx bx-id-card"></i></span>
                                                	<input type="text" class="form-control" id="ktp" name="ktp" value="<?php echo $user->ktp; ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                                </div>
					</div>
					<div class="col-lg-5">
                                                <label for="Nama Lengkap" class="form-label">Nama Lengkap</label>
                                                <div class="input-group">
                                                	<span class="input-group-text"><i class="bx bx-user"></i></span>
                                                	<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $user->nama; ?>">
                                                </div>
					</div>
					<div class="col-lg-4">
                                                <label for="Cabang" class="form-label">Cabang</label>
                                                <div class="input-group">
                                                	<span class="input-group-text"><i class="bx bx-map"></i></span>
							<?php echo form_dropdown('cabang', $this->sistem->dropdowne('app_cabang'), $user->cabang, 'class="form-select" name="cabang" id="cabang"');?>
                                                </div>
					</div>
					<div class="col-lg-3">
						<label for="jk" class="form-label">Jenis Kelamin</label>
						<div class="input-group">
                                                	<span class="input-group-text"><i class="mdi mdi-gender-male-female"></i></span>
							<select class="form-select" id="jk" name="jk">
								<option value="<?php echo $user->jk; ?>"><?php echo $user->jk; ?></option>
								<option>----------------</option>
								<option value="Laki - laki">Laki - laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</div>
					</div>
					<div class="col-lg-3">
						<label for="born" class="form-label">Tempat Lahir</label>
						<div class="input-group">
                                                	<span class="input-group-text"><i class="mdi mdi-hospital-building"></i></span>
							<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $user->tempat_lahir; ?>">
						</div>
					</div>
					<div class="col-lg-3">
						<label for="tlahir" class="form-label">Tanggal Lahir</label>
						<div class="input-group">
                                                	<span class="input-group-text"><i class="bx bx-calendar"></i></span>
							<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $user->tanggal_lahir; ?>">
						</div>
					</div>
					<div class="col-lg-3">
						<label for="telp" class="form-label">No Whatsapp / Telp</label>
						<div class="input-group">
                                                	<span class="input-group-text"><i class="bx bxl-whatsapp"></i></span>
							<input type="text" class="form-control" id="telp" name="telp" value="<?php echo $user->phone; ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						</div>
					</div>
					<div class="col-lg-5">
						<label for="email" class="form-label">Email</label>
						<div class="input-group">
                                                	<span class="input-group-text"><i class="bx bx-envelope"></i></span>
							<input type="email" class="form-control" id="email" name="email" value="<?php echo $user->email; ?>">
						</div>
					</div>
					<div class="col-lg-7">
    						<label for="foto" class="form-label">Photo</label>




<div class="input-group mb-3">
  <button class="btn btn-outline-danger" type="button" id="unggahBtn">Unggah</button>
  <input type="text" class="form-control" placeholder="No file selected" readonly>
  <input type="file" id="gambar" name="gambar" multiple style="display: none;">
</div>





						<div class="input-group">
                                                        <input type="text" class="form-control browse-file" placeholder="Silahkan Pilih" readonly>
                                                        <button class="btn btn-outline-danger" type="button" id="unggahBtn">Unggah <input type="file" class="sembunyi" id="gambar" name="gambar" multiple></button>
						</div>
					</div>

					<div class="col-md-12">
						<label for="alamat" class="form-label">Alamat Lengkap</label>
						<div class="input-group">
                                                	<span class="input-group-text"><i class="bx bx-home-heart"></i></span>
							<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $user->alamat; ?>">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12">
		<div class="text-center align-items-center justify-content-between gap-3">
			<button type="button" class="btn btn-dark" data-bs-dismiss="modal"><i class="fal fa-circle-xmark mr-2 fa-lg fa-fw"></i>Tutup </button> &nbsp; | &nbsp;
			<button type="submit" class="btn btn-success sub" id="sub"> Simpan <i class="fal fa-circle-check fa-lg ml-2 fa-fw"></i></button>
		</div>
	</div>
</div>
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
			new jBox('Notice', {attributes: {x: 'right', y: 'top'}, stack: false, animation: 'flip', showCountdown: false, color: data.status, title: data.title, content: data.message});
			setInterval(function() { location.reload(); }, 1500);
		}
		else
		{
			$('#modalGede').modal('hide');
			new jBox('Notice', {attributes: {x: 'right', y: 'top'}, stack: false, animation: 'flip', showCountdown: false, color: data.status, title: data.title, content: data.message});
		}
		},
		error: function(data){
			new jBox('Notice', {attributes: {x: 'right', y: 'top'}, stack: false, animation: 'flip', showCountdown: false, color: data.status, title: data.title, content: data.message});
		}
	});

});  





$(document).ready(function() {
  const $fileInput = $('#gambar');
  const $textInput = $fileInput.siblings('input[type="text"]');
  const $button = $('#unggahBtn');

  // Trigger file input when button is clicked
  $button.on('click', function() {
    $fileInput.click();
  });

  // Detect file selection
  $fileInput.on('change', function() {
    const files = this.files;
    if (files.length === 0) {
      $textInput.val('No file selected');
    } else if (files.length === 1) {
      $textInput.val(files[0].name);
    } else {
      $textInput.val(files.length + ' files selected');
    }
  });
});





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
		} else {
			if( log ) alert(log);
		}
	});
});
</script>
<?php } ?>