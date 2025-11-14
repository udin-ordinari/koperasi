
<div class="card">
	<div class="card-body p-4">

        	<input type="text" name="app_token" id="app_token" class="form-control sembunyi" value="<?php echo session('app_token'); ?>">
        	<?php foreach($setingane->result() as $row) { ?>
        	<input type="text" name="id" id="id" class="form-control sembunyi" value="<?php echo $row->id; ?>">	 

		<div class="row mb-3 pinjaman">
			<label for="input35" class="col-sm-3 col-form-label">Nama Setting</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row->nama; ?>" burem readonly>
			</div>
		</div>
		<div class="row mb-3">
			<label for="input36" class="col-sm-3 col-form-label">isi / Value</label>
			<div class="col-sm-9">
		    	<input type="text" class="form-control" id="isi" name="isi" value="<?php echo $row->isi; ?>">
			</div>
		</div>
		<?php if($row->nama == 'favicon' || $row->nama == 'logo' || $row->nama == 'logo_koperasi' || $row->nama == 'logo_white' ) { ?>
		<div class="row mb-3">
			<img src="<?php echo base_url('assets/img/'.$row->isi);?>" class="text-center" style="max-width: 30%;">
			<input type="file" class="form-control" id="isi" name="isi" value="<?php echo $row->isi; ?>">
		</div>		
		<?php } ?>
        	<?php } ?>
		<div class="row">
			<label class="col-sm-3 col-form-label"></label>
			<div class="col-sm-9">
				<div class="d-md-flex d-grid align-items-center gap-3">
					<button type="button" class="btn btn-dark px-4 radius-30 btn-sm" data-bs-dismiss="modal">Batal</button>
					<button class="btn btn-success px-4 radius-30 btn-sm Perbarui" onclick="UpdatePengaturan(); return false;" id="Perbarui">Perbarui</button>
				</div>
			</div>
		</div>

	</div>
</div>
	
<?php echo link_tag('assets/plugins/sweetalert2/sweetalert2.css');?>
<script src="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.js');?>"></script>
<script type="text/javascript">
function UpdatePengaturan()
{
	$(".Perbarui").html("<i class='bx bx-loader-circle bx-spin'></i>&nbsp;Memproses");
	var values = {app_token: $('#app_token').val(), id: $('#id').val(), nama: $('#nama').val(), isi: $('#isi').val()};
	$.post("<?php echo base_url('superuser/ubah_settings');?>", values, function(response)
	{
		var res = response;
		if (res.status == 'success')
		{
			$('#EditModal').hide();
			Swal.fire({
				title: "Terima Kasih !",
				text: "Apakah Anda Ingin Melakukan Perubahan Lagi ?",
				icon: "success",
				showDenyButton: true,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: "Iya ",
				denyButtonText: "Tidak",
				}).then((result) => {
					if (result.isConfirmed) {
						location.reload();
					} else if (result.isDenied) {
						window.location.href="<?php echo base_url('superuser/pengaturan_sys'); ?>";
					}
				});
		}
		else
		{
			$(".Perbarui").text("Perbarui");
			Lobibox.notify(response.status, {title: response.title, delayIndicator: false, pauseDelayOnHover: false, continueDelayOnInactiveTab: false, delay: 2000, position: 'top right', icon: true, iconSource: 'fontAwesome', msg: response.message});
		}
	})
}
</script>