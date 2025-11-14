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
			<p class="mg-b-10">Upload Bukti</p>
			<div class="input-group file-browser">				
				<input type="text" class="form-control browse-file" placeholder="Silahkan Pilih" id="bukti" name="bukti" readonly>
				<label class="input-group-btn" style="margin-bottom: -6px;">
				<span class="btn btn-primary cursor-pointer">
					Pilih Gambar <input type="file" id="bukti" name="bukti" style="display: none;" accept="image/*" onchange="onFileSelected(event)">
				</span>
				</label>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<img id="buktine" width="300" />
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

	<div class="col-md-12 ">
		<div class="form-group mb-0">
			<p class="mg-b-10">Keterangan</p>
			<textarea class="form-control" id="keterangan" name="keterangan" rows="4" placeholder="Silahkan Isi Keterangan"></textarea>
		</div>
	</div>

</div>
<div class="modal-footer form-group mb-0">
	<div class="col-md-8">
		<button type="button" class="btn ripple btn-secondary pd-x-10" data-bs-dismiss="modal"><i class="fa-light fa-circle-xmark fa-fw fa-lg mr-2"></i> Tutup</button>&nbsp;
		<button class="btn ripple btn-primary pd-x-10 mg-r-5">Simpan <i class="fa-light fa-envelope-circle-check fa-fw fa-lg ml-2"></i></button>
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

	// We can watch for our custom `fileselect` event like this
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
});
function onFileSelected(event)
{
	var selectedFile = event.target.files[0];
    
	if (selectedFile)
	{
		var reader = new FileReader();
		var imgtag = document.getElementById("buktine");
		imgtag.title = selectedFile.name;
      
		reader.onload = function(event) {
			imgtag.src = event.target.result;
		};
      
		reader.readAsDataURL(selectedFile);
	}
}
</script>