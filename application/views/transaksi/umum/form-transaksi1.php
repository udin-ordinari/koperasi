<form id="transaksi" enctype="multipart/form-data">
<input type="text" id="app_token" name="app_token" class="form-control sembunyi" value="<?php echo session('app_token'); ?>">
<div class="row row-sm">
	<div class="col-lg-12 col-md-12">
		<div class="card custom-card">
			<div class="card-body p-1">		
				<div class="row row-sm">
					<div class="col-md-2">
						<div class="form-group">
							<p class="mg-b-10">Tanggal</p>
							<input type="date" class="form-control" id="tgl" name="tgl">
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<p class="mg-b-10">Pilih Akun Transaksi</p>
							<?php echo form_dropdown('akun', $this->sistem->selectdropdown('app_akun'), set_value('akun'), 'class="form-control select2" id="akun" '); ?>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<p class="mg-b-10">Posisi</p>
							<select class="form-control select2" id="posisi" name="posisi">
								<option value="debet">Masuk / Debet</option>
								<option value="kredit">Keluar / Kredit</option>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<p class="mg-b-10">Unit Kerja</p>
							<select class="form-control select2" id="unit" name="unit">
								<option value="01">Usaha Simpan Pinjam (USP)</option>
								<option value="02">Usaha INDUK</option>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<p class="mg-b-10">Jumlah</p>
							<div class="input-group">
								<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
								<input type="text" class="form-control uang" id="jumlah" name="jumlah" placeholder="1.000.000">
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<p class="mg-b-10">Pokok</p>
							<div class="input-group">
								<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
								<input type="text" class="form-control uang" id="pokok" name="pokok" placeholder="1.000.000">
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<p class="mg-b-10">Profit</p>
							<div class="input-group">
								<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
								<input type="text" class="form-control uang" id="bunga" name="bunga" placeholder="1.000.000">
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<p class="mg-b-10">Upload Bukti</p>
							<div class="input-group file-browser">				
								<input type="text" class="form-control border-end-0 browse-file" id="bukti" name="bukti" readonly>
								<label class="input-group-btn">
									<span class="btn btn-primary cursor-pointer">
										Pilih <input type="file" id="bukti" name="bukti" style="display: none;" accept="image/*" onchange="onFileSelected(event)">
									</span>
								</label>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<p class="mg-b-10">Keterangan</p>
							<input type="text" class="form-control uang" id="bunga" name="bunga" placeholder="1.000.000">
						</div>
					</div>
				</div>
				<div class="form-group row justify-content-end mb-0">
					<div class="col-md-8 ps-md-2">
						<button type="button" class="btn ripple btn-secondary pd-x-30" data-bs-dismiss="modal">Cancel</button>
						<button class="btn ripple btn-primary pd-x-30 mg-r-5">Register</button>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<?php echo form_close() ?>
<script>
$(document).ready(function(){
	$('.uang').mask('000.000.000.000.000.000', {reverse: true});
});
$(document).ready(function(){
	$('form').on('submit', function(e) { 
		e.preventDefault();
		$('.btnTambah').html("<i class='bx bx-loader-alt bx-spin'></i>Memproses");
		$.ajax({  
			url:"<?php echo base_url('transaksi/umum/proses'); ?>",
                     	method:"POST",  
                     	data:new FormData(this),  
                     	contentType: false,  
                     	cache: false,  
                     	processData:false,  
                     	success:function(data)  
                     	{
				//$('.btnTambah').attr('disabled', 'disabled');
				if(data.status == 'success')
				{
					$('#TambahModal').hide();
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
					$('.btnTambah').html(' Simpan <i class="far fa-circle-check fs-5"></i>');
					Lobibox.notify(data.status, {title: data.title, delayIndicator: false, delay: 2000, pauseDelayOnHover: false, rounded: true, continueDelayOnInactiveTab: false, position: 'top right', icon: 'bx bx-check-circle', msg: data.message});
				}
			},
                	error: function(XMLHttpRequest, textStatus, errorThrown)
			{
				$('.btnTambah').html('Simpan <i class="far fa-circle-check fs-5"></i>');
				Lobibox.notify(textStatus, {title: 'Informasi', delayIndicator: false, delay: 2000, pauseDelayOnHover: false, rounded: true, continueDelayOnInactiveTab: false, position: 'top right', icon: 'bx bx-info-circle', msg: errorThrown});
			}
		});
	});
});
// Filebrowser
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
$(document).ready(function() {
	$('.select2').select2({
		minimumResultsForSearch: '',
		placeholder: "Silahkan Cari",
		width: '100%'
	});
});
</script>

