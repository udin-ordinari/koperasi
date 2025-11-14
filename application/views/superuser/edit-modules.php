<div class="col-lg-12 col-md-12">
	<div class="card">
		<div class="card-body">
			<form id="update_form">
			<input type="hidden" name="app_token" id="app_token" class="form-control" value="<?php echo session('app_token'); ?>">
			<input type="hidden" name="id" id="id" class="form-control" burem readonly value="<?php echo $hasil->id; ?>">
			<div class="">
				<div class="row row-xs align-items-center mg-b-20">
					<div class="col-md-3">
						<label class="mg-b-0">Menu Modul</label>
					</div>
					<div class="col-md-9 mg-t-5 mg-md-t-0">
						<input type="text" class="form-control" id="modul" name="modul" value="<?php echo $hasil->module_name; ?>">		
					</div>
				</div>
				<div class="form-group row justify-content-end mb-0">
					<div class="col-md-8 ps-md-2">
						<button type="button" class="btn btn-secondary me-1 middle" data-bs-dismiss="modal"><i class="fe fe-x-circle me-1"></i>Tutup</button>
						<button type="submit" class="btn btn-primary me-1 middle update" id="update">Simpan <i class="fe fe-play-circle ml-1"></i></button>
					</div>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
<script type="text/javascript">
$('form').submit(function(e) {
	e.preventDefault();
	$(".update").addClass('disabled');
	$(".update").html('<div class="light-loader1" role="status"><span class="sr-only"></span></div>&nbsp; Memproses');
	var form = $(this);
	$.ajax({
        	type: "POST",
        	url: "<?php echo base_url('superuser/proses_edit_modules'); ?>",
        	data: form.serialize(),
        	success: function(response) {
			if(response.status == 'success')
			{
				$('#modalGede').hide();
				$(".update").removeClass('disabled');
				$(".update").html('Simpan <i class="fe fe-play-circle ml-1"></i>');
				Lobibox.notify(response.status, {title: response.title, position: 'top right', icon: 'fa-solid fa-circle-exclamation', msg: response.message});
				setInterval(function()
				{
					location.reload();
				}, 1500);
			}
			else
			{
				Swal.fire({
					title: data.title,
					html: data.message,
					icon: data.status
				});
			}
		},
        	error: function() {
			$(".update").removeClass('disabled');
			$(".update").html('Simpan <i class="fe fe-play-circle ml-1"></i>');
			Lobibox.notify('error', {title: 'Maaf !', position: 'top right',  delay: 2000, icon: 'fa-solid fa-circle-exclamation', msg: 'Sistem Sedang Tidak Baik - Baik Saja !'});
		}
	});
});
</script>