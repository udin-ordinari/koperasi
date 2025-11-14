<div class="main-content side-content">
	<div class="main-container container-fluid">
		<div class="inner-body">
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-20 mg-b-5"><?php echo $pagetitle; ?> <span class="breadcrumb-item"><a href="javascript:void(0);"><?php echo $title; ?></a></span></h2>
				</div>
			</div>
		</div>
		<div class="row row-sm">
			<div class="col-lg-12">
				<div class="card custom-card overflow-hidden">
					<div class="card-body">
						<form class="row g-3" id="upload_form" enctype="multipart/form-data">
						<input type="hidden" name="app_token" id="app_token" class="form-control sembunyi" value="<?php echo session('app_token'); ?>">
						<input type="text" name="userid" id="userid" class="form-control sembunyi" burem readonly>
						<div class="col-md-3 ui-widget">
							<label for="tgl">Tanggal Pengajuan</label>
							<input type="date" class="form-control" id="tgl_trans" name="tgl_trans">
						</div>
						<div class="col-md-3">
							<label for="nik">Cari Anggota</label>
							<input type="text" class="form-control" id="ktp" name="ktp" data-bs-toggle="modal" data-bs-target="#modalFull" data-href="<?php echo base_url('master/anggota/cari_anggota');?>" data-name="Cari Data Anggota">
						</div>
						<div class="col-md-3">
							<label for="input2">Nama Lengkap</label>
							<input type="text" class="form-control" id="nama" name="nama" burem readonly>
						</div>
						<div class="col-md-3 mb-2">
							<label for="input3">Jenis Kelamin</label>
							<input type="text" class="form-control" id="jk" name="jk" burem readonly>
						</div>
						<div class="col-md-3">
							<label for="input4">Tempat Lahir</label>
							<input type="text" class="form-control" id="tempat" name="tempat" burem readonly>
						</div>
						<div class="col-md-3">
							<label for="input3">Tanggal Lahir</label>
							<input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" burem readonly>
						</div>
						<div class="col-md-3">
							<label for="input5">Cabang</label>
							<input type="text" class="form-control" id="cabang" name="cabang" burem readonly>
						</div>
						<div class="col-md-3 mb-2">
							<label for="input6">No HP / WA</label>
							<input type="text" class="form-control" id="phone" name="phone" burem readonly>
						</div>
						<div class="col-md-12">
							<label for="input5">Alamat</label>
							<input type="text" class="form-control text-dark" id="alamat" name="alamat" readonly>
						</div>
						<div class="col-lg-12 mt-4 text-center">
							<div class="p-0 rounded"></div>
						</div>
						<div class="col-lg-12 mt-4">
							<div class="border border-3 p-4 rounded">
								<div class="row g-3">
									<div class="col-md-5">
										<label for="jns_pinj">Jenis Pinjaman</label>
										<?php echo form_dropdown('jns_pinj', $jns_drop, '', 'class="form-control select2" id="jns_pinj" onchange="showDiv(this)"');?> 
									</div>
									<div class="col-md-3">
										<label for="jns_pinj">Angsuran (X) Kali</label>
										<div class="input-group">
											<input type="text" class="form-control" name="tempo" id="tempo" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" style="text-align: right;" placeholder="24">
											<div class="input-group-text bg-info" style="cursor: pointer;" onclick="Check();return false;">Cek</div>
										</div>
									</div>
                            						<div class="col-md-4">
										<label for="input25">Jumlah Pinjaman</label>
										 <div class="input-group">
											<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
											<input type="text" class="form-control uang" id="jumlah" name="jumlah" placeholder="1.000.000">
										 </div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12 mt-4" id="hidden_div" style="display: none;">
							<div class="border border-3 p-4 rounded">
								<div class="row g-3">
									<div class="col-md-12">
										<input id="jaminan" name="jaminan" type="file" accept="image/*,.pdf" multiple>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12" style="text-align: center;">
						<div class="align-items-center mb-3">
							<button type="reset" class="btn btn-secondary px-2"><i class="fa-light fa-broom-wide fa-fw fa-lg mr-2"></i>Reset</button>
							<button type="submit" class="btn btn-success btnTambah px-2">Simpan <i class="fal fa-check-circle fa-fw fa-lg ml-2"></i></button>
						</div>
					</div>
				</div>
			<?php echo form_close() ?>
			</div>
		</div>
	</div>
</div>

<?php echo link_tag('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css');?>
<script src="<?php echo base_url('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js');?>"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.uang').mask('000.000.000.000', {reverse: true});
});
function Check()
{
	var pensiun  = "<?php echo get_setting('usia_pensiun'); ?>";
	var sekarang = new Date();
	var lahir    = new Date($('#tgl_lahir').val().split('-'));
	var mbuh     = sekarang-lahir;
	var umur     = Math.floor(mbuh/31536000000);
	var hasil    = pensiun - umur;
	var tempo    = 12 * hasil;
	var input    = document.getElementById("tempo").value;
	var wedhus   = tempo - input;
	var angs     = document.getElementById("jumlah").value;
	var jeneng   = document.getElementById("nama").value;

	var pinjaman = $("#jumlah").unmask().val();
	var kembang  = ("<?php echo $this->sistem->RowObject('nama', 'jasa-pinjaman', 'app_jasa')->isi; ?>" * pinjaman) / 100;
	var baliki   = kembang.toString().split('').reverse().join(''),
	jasane       = baliki.match(/\d{1,3}/g);
	jasane       = jasane.join('.').split('').reverse().join('');

	var angsuran = Math.round(parseInt(pinjaman) / parseInt(input));
	var balik    = angsuran.toString().split('').reverse().join(''),
	njupuk       = balik.match(/\d{1,3}/g);
	if(njupuk == null)
	{
		Swal.fire({
				title: "Maaf !",
				text: "Silahkan isi tempo angsuran & Jumlah Pinjaman",
				icon: "warning",
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: "Ulangi",
				}).then((result) => {
					if (result.isConfirmed) {
						//location.reload();
					} else {
						//location.reload();
					}
				});

		$('.uang').mask('000.000.000.000', {reverse: true});

	}
	njupuk       = njupuk.join('.').split('').reverse().join('');

	var utang    = angsuran + kembang;
	var mbalik   = utang.toString().split('').reverse().join(''),
	utange       = mbalik.match(/\d{1,3}/g);
	utange	     = utange.join('.').split('').reverse().join('');
	if(tempo < input)
	{
			Swal.fire({
				title: "Maaf !",
				customClass: { },
				html: jeneng + "<br>Tidak Diperkenankan<br>Untuk Mengambil Tempo Cicilan<br>Lebih dari Masa Pensiun",
				icon: "info",
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: "Ulangi",
				}).then((result) => {
					if (result.isConfirmed) {
						//location.reload();
					} else {
						location.reload();
					}
				});
		$('.uang').mask('000.000.000.000', {reverse: true});
	}
	else if(tempo == "")
	{
		Swal.fire({
				title: "Maaf !",
				text: "Silahkan isi jangka waktu",
				icon: "warning",
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: "Ulangi",
				}).then((result) => {
					if (result.isConfirmed) {
						//location.reload();
					} else {
						//location.reload();
					}
				});

		$('.uang').mask('000.000.000.000', {reverse: true});

	}
	else
	{		
		Swal.fire({
			title: "Setuju !",
			html: "Cicilan <b>" + input + "</b> Kali<br>Angsuran Pokok : <b>Rp. " + njupuk + "</b><br>Jasa : <b>Rp. " + jasane + "</b><br>Total Angsuran : <b>Rp. " + utange + "</b>",
			icon: "success",
			confirmButtonColor: "#5c9c64",
			confirmButtonText: "Lanjut",
			}).then((result) => {
				if (result.isConfirmed) {
						//location.reload();
				} else if (result.isDenied) {
					window.location.href="<?php echo base_url('transaksi/pinjaman/pengajuan'); ?>";
				}
			});
			$('.uang').mask('000.000.000.000', {reverse: true});
	}

}

$(document).ready(function(){

	$('#jaminan').imageuploadify();

	$('#upload_form').on('submit', function(e){  
		e.preventDefault();  
		$('.btnTambah').html('<i class="fa fa-circle-notch fa-spin mr-2"></i>Memproses');
		$.ajax({  
			url:"<?php echo base_url('transaksi/pinjaman/add_pengajuan'); ?>",
                     	method:"POST",  
                     	data:new FormData(this),  
                     	contentType: false,  
                     	cache: false,  
                     	processData:false,  
                     	success:function(data)  
                     	{
				if(data.status == 'success')
				{
					$('#CariModal').hide();
					Swal.fire({
							title: "Terima Kasih !",
							html: "<b>Untuk Pinjaman Per Kas<br>Mohon Jaminan Sesuai Dengan Bukti Lampiran</b><br>Apakah Anda Ingin Mengajukan Pinjaman Lagi ?",
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
									window.location.href="<?php echo base_url('transaksi/pinjaman/pengajuan'); ?>";
								}
							});
					
				}
				else
				{
					$('.btnTambah').html('Simpan <i class="fal fa-check-circle fa-fw fa-lg ml-2"></i>');
					Lobibox.notify(data.status, {title: data.title, delayIndicator: false, delay: 3000, pauseDelayOnHover: false, continueDelayOnInactiveTab: false, position: 'top right', icon: true, msg: data.message});
				}
			},
                	error: function(XMLHttpRequest, textStatus, errorThrown)
			{
				$('.btnTambah').html('Simpan <i class="fal fa-check-circle fa-fw fa-lg ml-2"></i>');
				Lobibox.notify(textStatus, {title: 'Maaf !', delayIndicator: false, delay: 3000, pauseDelayOnHover: false, continueDelayOnInactiveTab: false, position: 'top right', icon: true, msg: errorThrown});
			}
                });  
	});  
});  
function formatRupiah(angka, prefix){
	var number_string = angka.replace(/[^,\d]/g, '').toString(),
	split   		= number_string.split(','),
	sisa     		= split[0].length % 3,
	rupiah     		= split[0].substr(0, sisa),
	ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

	if(ribuan){
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}
 
	rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
	return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

function showDiv(select)
{
	if(select.value == 11)
	{
		document.getElementById('hidden_div').style.display = "block";
	}
	else
	{
		document.getElementById('hidden_div').style.display = "none";
	}
} 


</script>

