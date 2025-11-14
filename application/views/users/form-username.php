<form id="username" method="post">
<div class="">
	<div class="p-1">
		<h6 class="mb-4 text-biru">Silahkan Ubah Username Anda Untuk Mempermudah Login.</h6>
		<input type="hidden" name="app_token" value="<?php echo session('app_token'); ?>" class="form-control">
		<div class="form-group mb-3">
			<label for="oldusername">Username Lama</label>
			<input type="text" class="form-control" name="oldusername" value="<?php echo $user;?>" disabled>
		</div>

		<div class="form-group mb-3">
			<label for="newusername">Username Baru</label>
			<input type="text" class="form-control" name="newusername">
		</div>	
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-danger radius-30" data-bs-dismiss="modal"><i class="fal fa-circle-xmark mr-2 fa-lg fa-fw"></i>Tutup </button>
	<button type="submit" class="btn btn-primary radius-30 Kirim" id="Kirim"> Simpan <i class="fal fa-circle-check fa-lg ml-2 fa-fw"></i></button>
</div>
</form>
<script type="text/javascript">
$('form').submit(function(e) {
	var form = $(this);
	e.preventDefault();

	$('.Kirim').html("<i class='fa fa-spin bx-spin'></i>&nbsp;Memproses");   

	$.ajax({
        	url: '<?php echo base_url();?>user/profile/update_username',
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

</script>