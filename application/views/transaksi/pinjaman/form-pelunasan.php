<style>
.sembunyi {
	display: none;
}
</style>
<div class="page-wrapper">
	<div class="page-content">
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3"><?php echo $page; ?></div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="card">
			<div class="card-body p-4">
			<form class="row g-3 pinjaman">
				<input type="text" name="app_token" id="app_token" class="form-control sembunyi" value="<?php echo session('app_token'); ?>">
				<input type="text" name="id" id="id" class="form-control sembunyi" burem readonly>
					<div class="col-md-3 ui-widget">
						<label for="tgl" class="form-label">Tanggal Pengajuan</label>
						<input type="date" class="form-control" id="tgl_trans" name="tgl_trans">
					</div>
					<div class="col-md-3">
						<label for="nik" class="form-label">Cari NIK Anggota</label>
						<input type="text" class="form-control" id="nik" name="nik" data-bs-toggle="modal" data-bs-target="#CariModal" data-href="<?php echo base_url('master/anggota/cari_anggota');?>" data-name="Cari Data Anggota">
					</div>
					<div class="col-md-3">
						<label for="input2" class="form-label">Nama Lengkap</label>
						<input type="text" class="form-control" id="nama" name="nama" burem readonly>
					</div>
					<div class="col-md-3">
						<label for="input3" class="form-label">Jenis Kelamin</label>
						<input type="text" class="form-control" id="jk" name="jk" burem readonly>
					</div>
					<div class="col-md-3">
						<label for="input4" class="form-label">Tempat Lahir</label>
						<input type="text" class="form-control" id="tempat" name="tempat" burem readonly>
					</div>
					<div class="col-md-3">
						<label for="input3" class="form-label">Tanggal Lahir</label>
						<input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" burem readonly>
					</div>
					<div class="col-md-3">
						<label for="input5" class="form-label">Cabang</label>
						<input type="text" class="form-control" id="cabang" name="cabang" burem readonly>
					</div>
					<div class="col-md-3">
						<label for="input6" class="form-label">No HP / WA</label>
						<input type="text" class="form-control" id="phone" name="phone" burem readonly>
					</div>
					<hr/>
					<div class="mt-2">
						<div class="row">
							<div class="col-lg-8">
								<div class="border border-3 p-4 rounded">
									<div class="row g-3">
										<div class="col-md-8">
											<label for="jns_pinj" class="form-label">Jenis Pinjaman</label>
											<?php echo form_dropdown('jns_pinj', $jns_drop, '', 'class="form-select" id="jns_pinj" name="jns_pinj"');?> 
										</div>
										<div class="col-md-4">
											<label for="jns_pinj" class="form-label">Angsuran (X) Kali</label>
											<div class="input-group">
												<input type="text" class="form-control" name="tempo" id="tempo" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" style="text-align: right;" placeholder="24">
												<div class="input-group-text bg-info" style="cursor: pointer;" onclick="Check();return false;">Cek</div>
											</div>
										</div>
                            						</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="border border-3 p-4 rounded">
									<div class="row g-3">
										<div class="col-md-12">
											<label for="input25" class="form-label">Jumlah Pinjaman</label>
										 	<div class="input-group">
												<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
												<input type="text" class="form-control uang" id="jumlah" name="jumlah" placeholder="1.000.000">
										 	</div>
										</div>
						  			</div>
								</div>
							</div>
						</div>
					</div>



					<div class="mt-2">
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-body">
									<form>
										<input id="image-uploadify" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
									</form>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="col-lg-12" style="text-align: center;">
					<div class="align-items-center gap-3 mb-3">
						<button type="reset" class="btn btn-danger rounded-pill px-2 rounded-pill" style="margin-right: 6px;"><i class="bx bx-reset bx-sm"></i>Reset</button>
						<button class="btn btn-primary px-2 rounded-pill btnTambah" onclick="AddPengajuan(); return false;" id="btnTambah">Simpan <i class="far fa-circle-check fs-5"></i></button>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>

<?php echo link_tag('assets/plugins/sweetalert2/sweetalert2.css');?>
<script src="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.js');?>"></script>

<?php echo link_tag('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css');?>
<script src="<?php echo base_url('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js');?>"></script>
<script>
function Check()
{
	var pensiun  = "<?php echo pensiun(); ?>";
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

	}
	else if(input == "")
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



	}
	else
	{
			Swal.fire({
				title: "Setuju !",
				html: "Cicilan " + input + " Kali",
				icon: "success",
				confirmButtonColor: "#5c9c64",
				confirmButtonText: "Lanjut",
				}).then((result) => {
					if (result.isConfirmed) {
						//location.reload();
					} else if (result.isDenied) {
						window.location.href="<?php echo base_url('transaksi/pinjaman/baru'); ?>";
					}
				});
	}

}

$(document).ready(function(){
	$('.uang').mask('000.000.000.000.000.000', {reverse: true});
});
function AddPengajuan()
{
	var values = {
			app_token	: $('#app_token').val(),
			id		: $('#id').val(),
			tgl_trans	: $('#tgl_trans').val(),
			nik		: $('#nik').val(),
			nama		: $('#nama').val(),
			jk		: $('#jk').val(),
			tempat		: $('#tempat').val(),
			tgl_lahir	: $('#tgl_lahir').val(),
			phone		: $('#phone').val(),
			cabang		: $('#cabang').val(),
			jns_pinj	: $('#jns_pinj').val(),
			tempo		: $('#tempo').val(),
			jumlah		: $('#jumlah').val()
	};
	$("#btnTambah").html("<i class='bx bx-loader-alt bx-spin mr-2'></i>&nbsp;Memproses");
	$.post("<?php echo base_url('transaksi/pinjaman/add_pengajuan');?>", values, function(response)
	{
		$("#btnTambah").html("Simpan <i class='far fa-circle-check fs-5'></i>");
		var res = response;
		if (res.status == 'success')
		{
			$('#CariModal').hide();
			Swal.fire({
				title: "Terima Kasih !",
				text: "Apakah Anda Ingin Mengajukan Pinjaman Lagi ?",
				icon: "warning",
				showDenyButton: true,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: "Iya ",
				denyButtonText: "Tidak",
				}).then((result) => {
					if (result.isConfirmed) {
						location.reload();
					} else if (result.isDenied) {
						window.location.href="<?php echo base_url('transaksi/pinjaman/baru'); ?>";
					}
				});
		}
		else
		{
			Lobibox.notify(response.status, {title: response.title, delayIndicator: false, pauseDelayOnHover: false, continueDelayOnInactiveTab: false, delay: 2000, position: 'top right', icon: true, iconSource: 'fontAwesome', msg: response.message});
		}			
	});
}

$(document).ready(function () {
	$('#image-uploadify').imageuploadify();
})
</script>

