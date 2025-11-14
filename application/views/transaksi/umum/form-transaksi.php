<form id="transaksi" enctype="multipart/form-data">
<input type="text" id="app_token" name="app_token" class="form-control sembunyi" value="<?php echo session('app_token'); ?>">
<div class="row row-sm">
	<div class="col-md-3">
		<div class="form-group">
			<p class="mg-b-10">Tanggal</p>
			<input type="date" class="form-control" id="tgl_trans" name="tgl_trans">
		</div>							
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<p class="mg-b-10">Pilih Akun Transaksi</p>
			<?php echo form_dropdown('akun', $this->sistem->selectdropdown('app_akun'), set_value('akun'), 'class="form-control select2" id="akun" '); ?>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<p class="mg-b-10">Posisi</p>
			<select class="form-control select2" id="posisi" name="posisi">
				<option value="debet">Masuk / Debet</option>
				<option value="kredit">Keluar / Kredit</option>
			</select>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<p class="mg-b-10">Unit Kerja</p>
			<select class="form-control select2" id="unit" name="unit">
				<option value="01">Usaha Simpan Pinjam (USP)</option>
				<option value="02">Usaha INDUK</option>
			</select>
		</div>
	</div>
	<div class="col-md-8">
		<div class="form-group">
			<label class="mg-b-10">Upload Bukti</label>
			<div class="input-group file-browser">				
				<input type="text" class="form-control browse-file" placeholder="Silahkan Pilih" readonly>
				<label class="input-group-btn" style="margin-bottom: -6px;">
					<span class="btn btn-primary cursor-pointer">
						Pilih Gambar <input type="file" id="bukti" name="bukti" class="sembunyi" accept="image/*" onchange="onFileSelected(event)">
					</span>
				</label>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<p class="mg-b-10">Jumlah</p>
			<div class="input-group">
				<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
				<input type="text" class="form-control uang" id="jumlah" name="jumlah" placeholder="1.000.000">
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<p class="mg-b-10">Pokok</p>
			<div class="input-group">
				<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
				<input type="text" class="form-control uang" id="pokok" name="pokok" placeholder="1.000.000">
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<p class="mg-b-10">Profit</p>
			<div class="input-group">
				<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
				<input type="text" class="form-control uang" id="bunga" name="bunga" placeholder="1.000.000">
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group mb-0">
			<p class="mg-b-10">Keterangan</p>
			<textarea class="form-control" id="keterangan" name="keterangan" rows="4" placeholder="Silahkan Isi Keterangan"></textarea>
		</div>
	</div>
	<div class="col-md-6">
		<img id="buktine" class="buktine">
	</div>

</div>
<div class="modal-footer form-group mb-0">
	<div class="col-md-8">
		<button type="button" class="btn ripple btn-secondary pd-x-10" data-bs-dismiss="modal"><i class="fa-light fa-circle-xmark fa-fw fa-lg mr-2"></i> Tutup</button>&nbsp;
		<button type="submit" class="btn ripple btn-primary pd-x-10 mg-r-5 BtnSimpan">Simpan <i class="fa-light fa-envelope-circle-check fa-fw fa-lg ml-2"></i></button>
	</div>
</div>
</form>



<script type="text/javascript">
$(document).on('change', ':file', function() {
	var input = $(this),
	numFiles = input.get(0).files ? input.get(0).files.length : 1,
	label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
	input.trigger('fileselect', [numFiles, label]);
});


$(document).ready( function() {
	$(':file').on('fileselect', function(event, numFiles, label)
	{
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
$(document).ready(function() {
	$('.select2').select2({
		minimumResultsForSearch: '',
		placeholder: "Silahkan Cari",
		width: '100%'
	});
	$('.uang').mask('000.000.000.000', {reverse: true});
});
function onFileSelected(event)
{
	var selectedFile = event.target.files[0];
	if (selectedFile)
	{
		var reader 	 = new FileReader();
		var imgtag 	 = $(".buktine");
		imgtag.title 	 = selectedFile.name;
		reader.onload 	 = function(event)
		{
			$(".buktine").attr("src", event.target.result);
		};
		reader.readAsDataURL(selectedFile);
	}
}
$(document).ready(function () {
	$('form').one('submit', function (event) {
		event.preventDefault();
		$('.BtnSimpan').attr('disabled', 'disabled');
		$('.BtnSimpan').html('<div class="light-loader1" role="status"><span class="sr-only"></span></div>&nbsp; Memproses');
		$.ajax({
        		url: "<?php echo base_url('transaksi/umum/proses_transaksi'); ?>",
        		type: "POST",
        		dataType: "JSON",
        		data: new FormData(this),
        		processData: false,
        		contentType: false,
        		success: function (data)
        		{
				var res = data;
				if (res.status == 'success')
				{
					$('#modalGede').hide();
					Swal.fire({
						title: "Terima Kasih !",
						text: "Apakah Anda Ingin Melakukan Transaksi Lagi ?",
						icon: "success",
						showDenyButton: true,
						confirmButtonColor: "#3085d6",
						cancelButtonColor: "#d33",
						confirmButtonText: "Iya ",
						denyButtonText: "Tidak",
						}).then((result) => {
							if (result.isConfirmed)
							{
								location.reload();
							}
							else if (result.isDenied)
							{
								window.location.href="<?php echo base_url('transaksi/umum'); ?>";
							}
					});
				}
				else
				{
					$('.BtnSimpan').removeClass('disabled');
					$('.BtnSimpan').html('Simpan <i class="fa-light fa-envelope-circle-check fa-fw fa-lg ml-2"></i>');
					Lobibox.notify(res.status, {title: true, delayIndicator: false, position: 'top right', icon: true, msg: data.message});
				}
        		},
        		error: function (xhr, desc, err)
        		{
				let timerInterval;
				Swal.fire({
					title: "Maaf !",
					html: '<p class="tx-18 tx-semibold text-danger mb-0">Sistem Sedang Rawat Jalan.</p><br>Kembali Lagi Nanti.<br>Atau Coba Lagi !',
					imageUrl: "<?php echo base_url('assets/img/rawat.png'); ?>",
					imageWidth: 160,
					imageHeight: 100,
					timer: 4000,
					timerProgressBar: false,
					allowOutsideClick: false,
            				allowEscapeKey: false,
					closeOnClickOutside: false,
					didOpen: () => {
						Swal.showLoading();
					},
					willClose: () => {
						clearInterval(timerInterval);
					}
				}).then((result) => {
					if (result.dismiss === Swal.DismissReason.timer) {
						//location.reload();
						$('.BtnSimpan').removeClass('disabled');
						$('.BtnSimpan').html('Simpan <i class="fa-light fa-envelope-circle-check fa-fw fa-lg ml-2"></i>');
					}
				});
        		}		
		});
	});
});
</script>