<form id="EditTransaksi" enctype="multipart/form-data">
<input type="hidden" name="app_token" id="app_token" class="form-control" value="<?php echo session('app_token'); ?>">
<input type="hidden" name="id" id="id" class="form-control" value="<?php echo $transaksi->id; ?>">
<div class="row row-sm">
	<div class="col-md-3">
		<div class="form-group">
			<p class="mg-b-10">Tanggal</p>
			<input type="date" class="form-control" id="tgl_trans" name="tgl_trans" value="<?php echo $transaksi->tgl; ?>">
		</div>							
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<p class="mg-b-10">Pilih Akun Transaksi</p>
			<?php $isi = $this->sistem->selectdropdown('app_akun'); echo form_dropdown('akun', $isi, $transaksi->akun_id, 'class="form-select select2" id="akun"'); ?>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<p class="mg-b-10">Posisi</p>
			<select class="form-control select2" id="posisi" name="posisi">
				<option value="<?php echo $transaksi->jenis; ?>" selected><?php echo $transaksi->jenis; ?></option>
				<option value="">==== Silahkan Pilih ====</option>
				<option value="debet">Masuk / Debet</option>
				<option value="kredit">Keluar / Kredit</option>
			</select>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<p class="mg-b-10">Unit Kerja</p>
			<select class="form-control select2" id="unit" name="unit">
				<option value="<?php echo $transaksi->unit; ?>" selected><?php if($transaksi->unit == '01') { $unit = 'Usaha Simpan Pinjam (USP)'; } else{ $unit = 'Usaha INDUK'; } echo $unit; ?></option>
				<option value="00">==== Silahkan Pilih ====</option>
				<option value="01">Usaha Simpan Pinjam (USP)</option>
				<option value="02">Usaha INDUK</option>
			</select>
		</div>
	</div>
	<div class="col-md-8">
		<div class="form-group">
			<label class="">Upload Bukti</label>
			<div class="input-group file-browser">				
				<input type="text" class="form-control browse-file" placeholder="Silahkan Pilih" readonly>
				<label class="input-group-btn" style="margin-bottom: -6px;">
					<span class="btn btn-primary cursor-pointer">
							Pilih Gambar <input type="file" class="sembunyi" id="bukti" name="bukti" accept="image/*" onchange="onFileSelected(event)">
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
				<input type="text" class="form-control uang" id="jumlah" name="jumlah" value="<?php echo number_format($transaksi->jumlah, 0, ', ', '.'); ?>">
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<p class="mg-b-10">Pokok</p>
			<div class="input-group">
				<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
				<input type="text" class="form-control uang" id="pokok" name="pokok" value="<?php echo number_format($transaksi->pokok, 0, ', ', '.'); ?>">
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<p class="mg-b-10">Profit</p>
			<div class="input-group">
				<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
				<input type="text" class="form-control uang" id="bunga" name="bunga" value="<?php echo number_format($transaksi->bunga, 0, ', ', '.'); ?>">
			</div>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group mb-0">
			<p class="mg-b-10">Keterangan</p>
			<textarea class="form-control" id="keterangan" name="keterangan" rows="4" value="<?php echo $transaksi->keterangan; ?>"><?php echo $transaksi->keterangan; ?></textarea>
		</div>
	</div>
	<div class="col-md-12 pt-2">
		<div class="border border-3 p-2 rounded">
			<div class="row g-3">
				<div class="col-md-12 text-center">
					<label for="jns_pinj" class="form-label">Bukti Transaksi</label>
					<img src="<?php echo base_url('assets/img/bukti/'.$transaksi->bukti);?>" id="buktine" class="buktine" data-fancybox data-src="#GambarModal" class="w-100">
				</div>
			</div>
		</div>
	</div>

</div>
<div class="modal-footer form-group mb-0">
	<div class="col-md-8">
		<button type="button" class="btn ripple btn-secondary pd-x-10" data-bs-dismiss="modal"><i class="fa-light fa-circle-xmark fa-fw fa-lg mr-2"></i> Tutup</button>&nbsp;
		<button type="submit" class="btn ripple btn-primary pd-x-10 mg-r-5 btnUpdate">Perbarui <i class="fa-light fa-envelope-circle-check fa-fw fa-lg ml-2"></i></button>
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
$(document).on("submit", "form", function (e) {	
	e.preventDefault();
	e.stopPropagation();
	$('.btnUpdate').html('<i class="fa-solid fa-circle-notch fa-spin"></i>Memproses');
	$('.btnUpdate').attr('disabled', 'disabled');

	$.ajax({  
		url		: "<?php echo base_url('transaksi/umum/update'); ?>",
        	type		: "POST",
        	dataType	: "JSON",
        	data		: new FormData(this),
        	processData	: false,
        	contentType	: false,
		success		: function(data)  
		{
			$('#modalGede').modal('hide');
			Lobibox.notify(data.status, {title: data.title, delayIndicator: false, pauseDelayOnHover: false, position: 'top right', icon: true, msg: data.message});
			location.reload();
		},
		error: function(XMLHttpRequest, textStatus, errorThrown)
		{
			$('.btnUpdate').html('Simpan <i class="far fa-circle-check fs-5"></i>');
			$('.btnUpdate').removeAttr('disabled');
			Lobibox.notify(textStatus, {title: true, delayIndicator: false, delay: 2500, pauseDelayOnHover: false, continueDelayOnInactiveTab: false, position: 'top right', icon: true, msg: errorThrown});
		}
	});
});
$(document).ready(function(){
	$('.uang').mask('000.000.000.000', {reverse: true});
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
</script>
<div class="sembunyi" id="GambarModal">
	<img src="<?php echo base_url('assets/img/bukti/'.$transaksi->bukti);?>" width="100%">
</div>
