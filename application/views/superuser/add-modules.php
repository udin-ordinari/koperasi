<div class="col-lg-12 col-md-12">
	<div class="card">
		<div class="card-body">
			<form id="module">
			<input type="hidden" class="form-control" name="app_token" id="app_token" value="<?php echo session('app_token'); ?>">
			<div class="">
				<div class="row row-xs align-items-center mg-b-20">
					<div class="col-md-3">
						<label class="mg-b-0">Menu Modul</label>
					</div>
					<div class="col-md-9 mg-t-5 mg-md-t-0">
						<input type="text" class="form-control" id="modul" name="modul">		
					</div>
				</div>
				<div class="form-group row justify-content-end mb-0">
					<div class="col-md-8 ps-md-2">
						<button type="button" class="btn btn-secondary me-1 middle" data-bs-dismiss="modal"><i class="fe fe-x-circle me-1"></i>Tutup</button>
						<button type="submit" class="btn btn-primary me-1 middle simpan" id="simpan">Simpan <i class="fe fe-play-circle ml-1"></i></button>
					</div>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<script type="text/javascript">
$('form').submit(function(e) {
	$(".simpan").addClass('disabled');
	$(".simpan").html('<div class="light-loader1" role="status"><span class="sr-only"></span></div>&nbsp; Memproses');
	e.preventDefault();
	var form = $(this);
	$.ajax({
        	type: "POST",
        	url: "<?php echo base_url('superuser/proses_add_modules'); ?>",
        	data: form.serialize(),
        	error: function() {
			Swal.fire({
				title: "Maaf !",
				text: "Sistem Sedang Tidak Baik - Baik Saja !",
				icon: "error"
			});
		},
        	success: function(data){
			$(".simpan").removeClass('disabled');
			$(".simpan").html('Simpan <i class="fe fe-play-circle ml-1"></i>');
			if(data.status == 'success')
			{
				Swal.fire({
					title: data.title,
					html: data.message,
					icon: data.status
				}).then((result) => {
					if (result.isConfirmed)
					{
						location.reload();
					}
					else if (result.isDenied)
					{
						window.location.href="<?php echo base_url('superuser/modules'); ?>";
					}
				});
			}
			else
			{

				Swal.fire({
					title: data.title,
					html: data.message,
					icon: data.status
				});
			}
		}
	});
});
</script>