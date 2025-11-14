<h6 class="text-center"><strong>Apakah Anda Yakin Ingin Menghapus Data Dibawah Ini ?!</strong></h6>

	<input type="hidden" id="app_token" name="app_token" class="form-control" value="<?php echo htmlentities(session('app_token'), ENT_QUOTES); ?>">
	<input type="hidden" id="id" name="id" class="form-control" value="<?php echo $hasil->id; ?>">
	
	<div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
		<div class="col-span-12 sm:col-span-6">
			<label>Level</label>
			<input type="text" class="form-control" style="color: darkorange;" value="<?php echo get_level($hasil->level_id)->nama; ?>" disabled>
		</div>
		<div class="col-span-12 sm:col-span-6">
			<label>Module</label>
			<input type="text" class="form-control" style="color: darkorange;" value="<?php echo get_modules($hasil->module_id)->module_name; ?>" disabled>
		</div>

	</div>
	<div class="modal-footer px-5 pb-8 text-center">
		<button type="button" data-bs-dismiss="modal" class="btn btn-dark radius-30 w-24 mr-2"><i class="fa-regular fa-circle-xmark fa-fw fa-lg mr-1"></i> Batal</button>
		<button type="button" class="btn btn-danger hapus w-32 radius-30 hapus" onclick="HapusAksi(); return false;" id="hapus">Hapus <i class="fa-regular fa-trash-can fa-fw fa-lg ml-1"></i></button>
	</div>

<script type="text/javascript">
function HapusAksi()
{
	$('#hapus').attr('disabled', 'disabled');
	var values = {app_token: $('#app_token').val(), id: $('#id').val()};
	$(".hapus").html('<div class="spinner-border spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div>');
	$.post("<?php echo base_url('superuser/proses_hapus_menu_level');?>", values, function(response)
	{
		$(".hapus").html("Hapus <i class='fa-regular fa-trash-can fa-fw fa-xs'></i>");
		var res = response;
		if (res.status == 'success')
		{
			$('#modalSedeng').hide();
			var notif = Lobibox.notify(response.status, {title: response.title, position: 'top right', icon: true, msg: response.message});
			setTimeout(() => {
				notif.remove();
				var table = $('#menu_level').DataTable();
				table.ajax.reload();
				$('#modalSedeng').modal('hide');
			}, 2000);
		}
		else
		{
			Lobibox.notify(res.status, {title: res.title, pauseDelayOnHover: false, rounded: true, continueDelayOnInactiveTab: false, delay: 2000, position: 'top right', icon: 'fa-light fa-circle-exclamation', msg: res.message});
		}
	})
}
</script>
