<div class="main-content side-content pt-0">
	<div class="main-container container-fluid">
		<div class="inner-body">
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-20 mg-b-5">Pengaturan Database</h2>
				</div>
			</div>
			<div class="row row-sm">
				<div class="col-lg-6 col-md-12">
					<div class="card custom-card">
						<div class="card-body">
							<div class="main-content-label mg-b-5"> Backup Database </div>
							<p class="mg-b-20">Silahkan klik tombol dibawah ini untuk backup database.</p>
							<div class="row row-sm">
								<div class="col-sm-12 col-md-12 col-lg-12">
									<div class="input-group">
										<button type="button" class="btn btn-primary backup w-100" onclick="location.href='<?php echo base_url("superuser/backup_database");?>'" id="backup"> Backup </button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="card custom-card">
						<div class="card-body">
							<div class="main-content-label mg-b-5"> Restore Database </div>
							<p class="mg-b-20">Pilih Database Yang Akan Direstore. Hati - hati merusak aplikasi.</p>
							<div class="row row-sm">
								<div class="col-sm-12 col-md-12 col-lg-12">
									<form id="submit" accept-charset="utf-8" enctype="multipart/form-data">
									<input type="hidden" class="form-control" id="app_token" name="app_token" value="<?php echo session('app_token');?>">
									<div class="input-group file-browser">
										<input type="text" class="form-control border-end-0 browse-file" id="databasenya" name="databasenya" placeholder="choose" readonly>
										<label class="input-group-btn">
											<span class="btn btn-primary cursor-pointer">
												Browse <input type="file" class="form-control" id="databasenya" name="databasenya" style="display: none;">
											</span>
										</label>
									</div><?php echo $_FILES['userfile']['type']; ?>
									<div class="modal-footer">
										<button type="submit" class="btn btn-success radius-30 tengah" id="Proses">Restore <i class="fa-regular fa-database fa-fw fa-lg ml-2 me-2 mr-0"></i></button>
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$('form').on('submit',function(e){
	e.preventDefault();
	$("#Proses").attr('disabled', 'disabled');
	$("#Proses").html('<div class="light-loader1" role="status"><span class="sr-only"></span></div>&nbsp; Memproses');
	$.ajax({
		url: "<?php echo base_url('superuser/restoredb');?>",
		type: "post",
		data: new FormData(this),
		processData: false,
		contentType: false,
		cache: false,
		async: false, 
		success: function(response)
		{
			$("#Proses").html('Restore <i class="fa-regular fa-database fa-fw fa-lg ml-2 me-2 mr-0"></i>');
			if (response.status == 'success')
			{
				Lobibox.notify(response.status, {title: response.title, position: 'top right', icon: true, msg: response.message});
				setInterval(function()
				{
					location.reload();
				}, 2000);
			}
			else
			{
				$('#Proses').removeAttr('disabled');
				Lobibox.notify(response.status, {title: response.title, position: 'top right', icon: true, msg: response.message});
			}
		},
		error: function (jqXHR, textStatus, errorMessage)
		{
			$('#Proses').removeAttr('disabled');
			$("#Proses").html('Restore <i class="fa-regular fa-database fa-fw fa-lg ml-2 me-2 mr-0"></i>');
			//alert(response);
			Lobibox.notify(textStatus, {title: 'Waduh !', position: 'top right', icon: true, msg: errorMessage});
		},
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
		}
		else
		{
			if( log ) alert(log);
		}
	});
});
</script>


