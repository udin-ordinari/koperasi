
		<div class="row">
			<div class="col-xl-12 mx-auto">
				<div class="card">
					<div class="card-body p-4">
<?php foreach($hasil as $row) { ?>
						<form id="update_form" class="row g-3 ui-widget">

							<input type="text" name="app_token" id="app_token" class="form-control sembunyi" value="<?php echo session('app_token'); ?>">
							<input type="text" name="id" id="id" class="form-control sembunyi" burem readonly value="<?php echo $row->id; ?>">
							<div class="col-md-6">
								<label for="input30" class="form-label">Pilih Anggota</label>
								<div class="input-group"> <span class="input-group-text"><i class="bx bx-group"></i></span>
									<input type="text" id="nama" name="nama" class="form-control" value="<?php echo get_anggota($row->member_id)->nama; ?>" disabled>
								</div>
							</div>
							<div class="col-md-6">
								<label for="input33" class="form-label">Level</label>
								<div class="input-group"> <span class="input-group-text"><i class="bx bx-user-plus"></i></span>
									<?php $level = $this->model->select_level('app_level'); echo form_dropdown('level', $level, $row->user_type, 'class="form-select" id="level"');?>
								</div>
							</div>
							<div class="col-md-6">
								<label for="input30" class="form-label">Username</label>
								<div class="input-group"> <span class="input-group-text"><i class="bx bx-user"></i></span>
									<input type="text" class="form-control" id="username" name="username" value="<?php echo $row->username; ?>">
								</div>
							</div>
							<div class="col-md-6">
								<label for="input33" class="form-label">Password</label>
								<div class="input-group" id="show_hide_password">
									<input type="password" class="form-control" id="password" name="password" value="<?php echo $row->password; ?>"><a href="javascript:void(0);" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
								</div>
							</div>
							<div class="col-md-12 text-center">
								<div class="d-md-flex d-grid align-items-center gap-3">
									<button type="button" class="btn btn-warning radius-30 px-3 btn-sm" data-bs-dismiss="modal"><i class="bx bx-x-circle fs-5"></i>Tutup &nbsp;</button>
									<button type="submit" class="btn btn-success radius-30 btn-sm btnUpdate" id="btnUpdate">&nbsp; Simpan <i class="bx bx-check-circle"></i></button>
								</div>
							</div>

						</form>
<?php } ?>
					</div>
				</div>
			</div>
		</div>

<script>
$(document).ready(function () {

$('form').submit(function(e) {
	var form = $(this);
	e.preventDefault();

	$('.btnUpdate').html("<i class='bx bx-loader-circle bx-spin'></i>&nbsp;Memproses");   

	$.ajax({
        	url: "<?php echo base_url('superuser/proses_update_user');?>",
        	type: 'POST',
        	data: form.serialize(),
		success: function(data) {
			$('.btnUpdate').html('&nbsp;Simpan <i class="bx bx-check-circle"></i>');   
			$('#EditModal').modal('hide');
			Lobibox.notify(data.status, {title: data.title, pauseDelayOnHover: false, sound: false, continueDelayOnInactiveTab: false, position: 'top right', icon: 'fa fa-circle-check', msg: data.message});
			setInterval(function() { location.reload(); }, 2500);
		},
		error: function(data) {
			$('.btnUpdate').html('&nbsp;Simpan <i class="bx bx-check-circle"></i>');   
			Lobibox.notify(data.status, {title: data.title, pauseDelayOnHover: false, sound: false, continueDelayOnInactiveTab: false, position: 'top right', icon: 'fa fa-circle-check', msg: data.message});
			$('#EditModal').modal('hide');
			setInterval(function() { location.reload(); }, 2500);
		}
	});  
	return false;      
});
$("#show_hide_password a").on('click', function (event) {

	event.preventDefault();
		if ($('#show_hide_password input').attr("type") == "text")
		{
			$('#show_hide_password input').attr('type', 'password');
			$('#show_hide_password i').addClass("bx-hide");
			$('#show_hide_password i').removeClass("bx-show");
		}
		else if ($('#show_hide_password input').attr("type") == "password")
		{
			$('#show_hide_password input').attr('type', 'text');
			$('#show_hide_password i').removeClass("bx-hide");
			$('#show_hide_password i').addClass("bx-show");
		}
	});
});

</script>