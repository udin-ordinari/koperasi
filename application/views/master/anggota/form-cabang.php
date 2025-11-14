<form>
<input type="hidden" class="form-control" id="app_token" value="<?php echo session('app_token');?>">
<div class="card">
	<div class="card-body p-4">
		<div class="row">
			<label for="nama" class="col-sm-3 col-form-label">Nama Cabang</label>
			<div class="col-sm-9">
				<div class="input-group">
					<span class="input-group-text"><i class='bx bx-map'></i></span>
					<input type="text" class="form-control" id="nama" placeholder="Demak Pusat">
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal-footer">
	<button type="button" class="btn btn-secondary radius-30" data-bs-dismiss="modal"><i class="bx bx-x-circle bx-sm"></i>Tutup</button>
	<button type="button" class="btn btn-success radius-30" id="tambah" onclick="TambahCabang();return false;">Tambah <i class="bx bx-plus-circle bx-sm" style="margin-right: -4px;"></i></button>
</div>
<form>
<script type="text/javascript">
function TambahCabang()
{
	$('#tambah, #nama').attr('disabled', 'disabled');
	var values = {app_token: $('#app_token').val(), nama: $('#nama').val()};
	$("#tambah").html("<i class='bx bx-loader-circle bx-spin'></i>&nbsp;Memproses");
	$.post("<?php echo base_url('master/anggota/proses_tambah_cabang');?>", values, function(response)
	{
		$("#tambah").html("Tambah <i class='fa-solid fa-circle-plus fa-fw'></i>");
		var res = response;
		if (res.status == 'success')
		{
			$('#TambahModal').hide();
			Lobibox.notify(res.status, {title: res.title, position: 'top right', icon: 'fa fa-check-circle', msg: res.message});
			setInterval(function()
			{
				location.reload();
			}, 2000);
		}
		else
		{
			jQuery('#tambah, #nama').removeAttr('disabled');
			Lobibox.notify(res.status, {title: res.title, position: 'top right', icon: 'fa fa-exclamation-circle', msg: res.message});
		}
	});
}
</script>