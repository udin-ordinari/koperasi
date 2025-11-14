<h6 class="text-center"><strong>Apakah Anda Yakin Ingin Menghapus Data Dibawah Ini ?!</strong></h6>

	<input type="hidden" id="app_token" name="app_token" class="form-control" value="<?php echo htmlentities(session('app_token'), ENT_QUOTES); ?>">
	<input type="hidden" id="id" name="id" class="form-control" value="<?php echo $hasil->id; ?>">
	
	<div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
		<div class="col-span-12 sm:col-span-6">
			<label>E-KTP</label>
			<input type="text" class="form-control" style="color: darkorange;" value="<?php echo $hasil->ktp; ?>" disabled>
		</div>
		<div class="col-span-12 sm:col-span-6">
			<label>Nama Anggota</label>
			<input type="text" class="form-control" style="color: darkorange;" value="<?php echo $hasil->nama; ?>" disabled>
		</div>
		<div class="col-span-12 sm:col-span-6">
			<label>Cabang</label>
			<input type="text" class="form-control" style="color: darkorange;" value="<?php echo get_cabang($hasil->cabang)->nama; ?>" disabled>
		</div>
		<div class="col-span-12 sm:col-span-6">
			<label>Whatsapp / Telp</label>
			<input type="text" class="form-control" style="color: darkorange;" value="<?php echo $hasil->phone; ?>" disabled>
		</div>
	</div>
	<div class="modal-footer px-5 pb-8 text-center">
		<button type="button" data-bs-dismiss="modal" class="btn btn-dark radius-30 w-24 mr-2"><i class="fal fa-circle-xmark fa-fw fa-lg"></i> Batal</button>
		<button type="button" class="btn btn-danger hapus w-32 radius-30" onclick="HapusAksi(); return false;" id="hapus">Hapus <i class="fal fa-trash-can fa-fw fa-lg"></i></button>
	</div>

<script type="text/javascript">
function HapusAksi()
{
	var values = {app_token: $('#app_token').val(), id: $('#id').val()};
	$(".hapus").html('<div class="light-loader1" role="status"><span class="sr-only"></span></div>&nbsp; Memproses');
	$.post("<?php echo base_url('master/anggota/proses_hapus_anggota');?>", values, function(response)
	{
		$(".hapus").html("Hapus <i class='fa-regular fa-trash-can fa-fw fa-xs'></i>");
		var res = response;
		if (res.status == 'success')
		{
			$('#HapusModal').hide();
			Lobibox.notify(res.status, {title: res.title, position: 'top right', icon: true, msg: res.message});
			setInterval(function()
			{
				location.reload();
			}, 2500);
		}
		else
		{
			Lobibox.notify(res.status, {title: res.title, position: 'top right', delay: 2500, icon: true, msg: res.message});
		}
	})
}
</script>
