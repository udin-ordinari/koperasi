<h6 class="text-center"><strong>Apakah Anda Yakin Ingin Menghapus Data Dibawah Ini ?!</strong></h6>

	<input type="hidden" id="app_token" name="app_token" class="form-control" value="<?php echo htmlentities(session('app_token'), ENT_QUOTES); ?>">
	<input type="hidden" id="id" name="id" class="form-control" value="<?php echo $hasil->id; ?>">
	
	<div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
		<div class="col-span-12 sm:col-span-6">
			<label class="form-label">Cabang</label>
			<input type="text" class="form-control" style="color: darkorange;" value="<?php echo $hasil->nama; ?>" disabled>
		</div>
	</div>
	<div class="modal-footer px-5 pb-8 text-center">
		<button type="button" data-bs-dismiss="modal" class="btn btn-dark radius-30 w-24 mr-2"><i class="fa fa-circle-xmark fa-fw"></i> Batal</button>
		<button type="button" class="btn btn-danger hapus w-32 radius-30" onclick="HapusAksi(); return false;" id="hapus">Hapus <i class="fa-regular fa-trash-can fa-fw fa-xs"></i></button>
	</div>

<script type="text/javascript">
function HapusAksi()
{
	var values = {app_token: $('#app_token').val(), id: $('#id').val()};
	$(".hapus").html("<i class='bx bx-loader-alt bx-spin mr-2'></i>&nbsp;Memproses");
	$.post("<?php echo base_url('master/anggota/proses_hapus_cabang');?>", values, function(response)
	{
		$(".hapus").html("Hapus <i class='fa-regular fa-trash-can fa-fw fa-xs'></i>");
		var res = response;
		if (res.status == 'success')
		{
			$('#HapusModal').hide();
			Lobibox.notify(res.status, {title: res.title, delayIndicator: false, pauseDelayOnHover: false, rounded: true, continueDelayOnInactiveTab: false, delay: 2000, position: 'top right', icon: 'bx bx-check-circle', msg: res.message});
			setInterval(function()
			{
				location.reload();
			}, 1500);
		}
		else
		{
			Lobibox.notify(res.status, {title: res.title, delayIndicator: false, pauseDelayOnHover: false, rounded: true, continueDelayOnInactiveTab: false, delay: 2000, position: 'top right', icon: 'bx bx-error-circle', msg: res.message});
		}
	})
}
</script>
