<form id="password" method="post">
<div class="">
	<div class="p-1">
		<h6 class="mb-4 text-biru">Bila ingin dirubah password silahkan isi form dibawah ini, bila tidak ingin dirubah tutup saja.</h6>
		<input type="hidden" name="app_token" id="app_token" value="<?php echo session('app_token'); ?>" class="form-control">
		<div class="form-group mb-3">
			<label for="newpassword">Password Baru</label>
			<div class="input-group" id="show_hide_password">
				<input type="password" class="form-control" id="newpassword" name="newpassword"><a href="javascript:void(0);" class="input-group-text bg-transparent"><i class="fa fa-eye-slash"></i></a>
			</div>
		</div>

		<div class="form-group mb-3">
			<label for="conpassword">Ulangi Password Baru</label>
			<div class="input-group" id="show_hide_password1">
				<input type="password" class="form-control" id="conpassword" name="conpassword"><a href="javascript:void(0);" class="input-group-text bg-transparent"><i class="fa fa-eye-slash"></i></a>
			</div>
		</div>	
	</div>
</div>

<div class="modal-footer">
	<button type="button" class="btn btn-danger radius-30" data-bs-dismiss="modal"><i class="fal fa-circle-xmark mr-2 fa-lg fa-fw"></i>Tutup </button>
	<button type="submit" class="btn btn-primary radius-30 Update" id="Update"> Simpan <i class="fal fa-circle-check fa-lg ml-2 fa-fw"></i></button>
</div>
</form>
<script type="text/javascript">
$('form').submit(function(e) {
	var form = $(this);
	e.preventDefault();

	$('.Kirim').html("<i class='bx bx-loader-circle bx-spin'></i>&nbsp;Memproses");   

	$.ajax({
        	url: '<?php echo base_url();?>user/profile/update_password',
        	type: 'POST',
        	data: form.serialize(),
		error: function() {
			$('.Kirim').text('Simpan'); 
			Lobibox.notify(data.status, {title: data.title, pauseDelayOnHover: false, sound: false, continueDelayOnInactiveTab: false, position: 'top right', icon: 'fa fa-circle-check', msg: data.message});
		},
		success: function(data) {
			$('.Kirim').text('Simpan');   
			$('#EditModal').modal('hide');
			Lobibox.notify(data.status, {title: data.title, pauseDelayOnHover: false, sound: false, continueDelayOnInactiveTab: false, position: 'top right', icon: 'fa fa-circle-check', msg: data.message});
			setInterval(function() { location.reload(); }, 1500);
		}
	});  
	return false;      
});


$(document).ready(function () {

	$("#show_hide_password a").on('click', function (event) {

		event.preventDefault();
		if ($('#show_hide_password input').attr("type") == "text")
		{
			$('#show_hide_password input').attr('type', 'password');
			$('#show_hide_password i').addClass("fa-eye-slash");
			$('#show_hide_password i').removeClass("fa-eye");
		}
		else if ($('#show_hide_password input').attr("type") == "password")
		{
			$('#show_hide_password input').attr('type', 'text');
			$('#show_hide_password i').removeClass("fa-eye-slash");
			$('#show_hide_password i').addClass("fa-eye");
		}
	});


	$("#show_hide_password1 a").on('click', function (event) {

		event.preventDefault();
		if ($('#show_hide_password1 input').attr("type") == "text")
		{
			$('#show_hide_password1 input').attr('type', 'password');
			$('#show_hide_password1 i').addClass("fa-eye-slash");
			$('#show_hide_password1 i').removeClass("fa-eye");
		}
		else if ($('#show_hide_password1 input').attr("type") == "password")
		{
			$('#show_hide_password1 input').attr('type', 'text');
			$('#show_hide_password1 i').removeClass("fa-eye-slash");
			$('#show_hide_password1 i').addClass("fa-eye");
		}
	});
});

</script>