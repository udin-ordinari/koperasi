<div class="row">
	<div class="col-lg-12 mx-auto">
		<div class="card">
			<div class="card-body p-4">
				<form id="module">
				<input type="hidden" class="form-control" name="app_token" id="app_token" value="<?php echo session('app_token'); ?>">
				<div class="row mb-3">
					<label for="input39" class="col-sm-3 col-form-label">Level Pengguna</label>
					<div class="col-sm-9">
						<select class="form-control select2" id="level" name="level">
						<?php $level = $this->db->where('id >', '1')->get('app_groups'); foreach($level->result() as $lev) { ?>
							<option value="<?php echo $lev->id; ?>"><?php echo $lev->nama; ?></option>
						<?php } ?>	
						</select>	
					</div>
				</div>
				<div class="row mb-3">
					<label for="input39" class="col-sm-3 col-form-label">Modul Aplikasi</label>
					<div class="col-sm-9">
						<select class="form-control select2" id="modul" name="modul">
						<?php $modul = $this->db->get('app_modules'); foreach($modul->result() as $row) { ?>
							<option value="<?php echo $row->id; ?>"><?php echo $row->module_name; ?></option>
						<?php } ?>	
						</select>	
					</div>
				</div>
				<div class="col-lg-12">
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary px-4 radius-30" data-bs-dismiss="modal"><i class="fa-light fa-xmark-circle fa-fw fa-lg mr-2 me-2"></i>Tutup</button>
						<button type="submit" class="btn btn-primary px-4 radius-30">Simpan <i class="fa-light fa-circle-plus fa-fw fa-lg ml-2 me-2 mr-0"></i></button>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
$('form').on('submit',function(e){
	var form = $(this);
	e.preventDefault();
	$.ajax({
        	type: "POST",
        	url: "<?php echo base_url('superuser/proses_add_privileges'); ?>",
        	data: form.serialize(),

        	error: function() {
			Swal.fire({
				title: "Maaf !",
				text: "Sistem Sedang Tidak Baik - Baik Saja !",
				icon: "error"
			});
		},
        	success: function(data){
			if(data.status == 'success')
			{
				Swal.fire({
					title: "Berhasil !",
					text: "Data Tersimpan !",
					icon: "success"
				}).then((result) => {
					if (result.isConfirmed)
					{
						location.reload();
					}
					else if (result.isDenied)
					{
						window.location.href="<?php echo base_url('superuser/menu_level'); ?>";
					}
				});
			}
			else
			{
				Swal.fire({
					title: "Waduh !",
					text: "Ada Gagal Sistem Nih !",
					icon: "info"
				});
			}
		}
	});
});
</script>