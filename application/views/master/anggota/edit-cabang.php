<form id="form">
<input type="hidden" class="form-control" id="app_token" name="app_token" value="<?php echo session('app_token');?>">
<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $cab->id;?>">
<div class="card">
	<div class="card-body p-4">
		<div class="row">
			<label for="nama" class="col-sm-3 col-form-label">Nama Cabang</label>
			<div class="col-sm-9">
				<div class="input-group">
					<span class="input-group-text"><i class='bx bx-map'></i></span>
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $cab->nama; ?>">
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal-footer">
	<button type="button" class="btn btn-secondary radius-30" data-bs-dismiss="modal"><i class="fa fa-circle-xmark fa-fw"></i>Tutup</button>
	<button type="submit" class="btn btn-success radius-30 btnUpdate" id="btnUpdate">Perbarui <i class="fa-solid fa-circle-plus fa-fw"></i></button>
</div>
</form>
<script type="text/javascript">
$('.btnUpdate').click(function(e) {
	e.preventDefault();
	let form = $(this).closest('#form');
	$(".btnUpdate").html("<i class='bx bx-loader-alt bx-spin mr-2'></i>&nbsp;Memproses");
	$.ajax({
		url: "<?php echo base_url('master/anggota/proses_edit_cabang');?>",
		data: form.serialize(),
		type: 'POST',
		async: false,
		dataType: 'json',
		success: function(response)
		{
			if (response.status == 'success')
			{
				$('#EditModal').hide();
				Lobibox.notify(response.status, {title: response.title, delayIndicator: false, pauseDelayOnHover: false, continueDelayOnInactiveTab: false, delay: 2000, position: 'top right', icon: 'bx bx-check-circle', msg: response.message});
				setInterval(function()
				{
					location.reload();
				}, 1500);
			}
			else
			{
				Lobibox.notify(response.status, {title: response.title, delayIndicator: false, pauseDelayOnHover: false, continueDelayOnInactiveTab: false, delay: 2000, position: 'top right', icon: 'bx bx-error-circle', msg: response.message});
			}			
		},

	});
});
</script> 