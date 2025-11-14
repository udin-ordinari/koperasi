<div class="main-content side-content">
	<div class="main-container container-fluid">
		<div class="inner-body">
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-20 mg-b-5">Form <span class="breadcrumb-item"><a href="javascript:void(0);"><?php echo $title; ?></a></span></h2>
				</div>
			</div>	
			
			<div class="card custom-card" style="margin-top: -20px;">
				<div class="card-body">
				<form class="row g-3">
					<input type="text" name="app_token" id="app_token" class="form-control sembunyi" value="<?php echo session('app_token'); ?>">
					<input type="text" name="userid" id="userid" class="form-control sembunyi">
					<div class="col-md-3">
						<label for="tgl">Tanggal</label>
						<div class="input-group">
							<div class="input-group-text border-end-0">
								<i class="fe fe-calendar lh--9 op-6"></i>
							</div>
							<input type="text" class="form-control text-dark fc-datepicker" name="tgl_trans" id="tgl_trans" placeholder="mm / dd / yyyy">
						</div>
					</div>
					<div class="col-md-3 mb-2">
						<label for="ktp">Cari Anggota</label>
						<input type="text" class="form-control text-dark" id="ktp" name="ktp" data-bs-toggle="modal" data-bs-target="#modalKing" data-href="<?php echo base_url('master/anggota/cari_anggota');?>" data-name="Cari Data Anggota">
					</div>
					<div class="col-md-4">
						<label for="input2">Nama Lengkap</label>
						<input type="text" class="form-control text-dark" id="nama" name="nama" readonly>
					</div>
					<div class="col-md-2">
						<label for="input3">Jenis Kelamin</label>
						<input type="text" class="form-control text-dark" id="jk" name="jk" readonly>
					</div>
					<div class="col-md-3 mb-2">
						<label for="input4">Tempat Lahir</label>
						<input type="text" class="form-control text-dark" id="tempat" name="tempat" readonly>
					</div>
					<div class="col-md-3">
						<label for="input3">Tanggal Lahir</label>
						<input type="text" class="form-control text-dark" id="tgl_lahir" name="tgl_lahir" readonly>
					</div>
					<div class="col-md-3">
						<label for="input6">No HP / WA</label>
						<input type="text" class="form-control text-dark" id="phone" name="phone" readonly>
					</div>
					<div class="col-md-3">
						<label for="input5">Cabang</label>
						<input type="text" class="form-control text-dark" id="cabang" name="cabang" readonly>
					</div>
					<div class="col-md-12">
						<label for="input5">Alamat</label>
						<input type="text" class="form-control text-dark" id="alamat" name="alamat" readonly>
					</div>
					<div class="col-lg-12 mt-4"><div class="border border-3 p-0 rounded"></div></div>

					<div class="col-lg-12 mt-4">
						<div class="border border-3 p-4 rounded">
							<div class="row g-3">
								<div class="col-md-4">
									<label for="jumlah">Jumlah Tarikan</label>
									<div class="input-group">
										<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
										<input type="text" class="form-control uang" id="jumlah" name="jumlah" placeholder="1.000.000">
									</div>
								</div>
								<div class="col-md-8">
									<label for="keterangan">Keterangan</label>
									<input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan penarikan simpanan">
                            					</div>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group row justify-content-end mb-4">
					<div class="col-md-8 ps-md-2">
						<button type="reset" class="btn ripple btn-secondary pd-x-30 mr-3"><i class="fa-light fa-broom-wide fa-fw fa-lg mr-2"></i>Reset</button>
						<button class="btn ripple btn-primary pd-x-30 mg-r-5 btnTambah" id="btnTambah" onclick="Proses(); return false;">Simpan <i class="fal fa-envelope-circle-check fa-fw fa-lg ml-2"></i></button>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>


<script type="text/javascript">
$(document).ready(function(){
	$('.uang').mask('000.000.000.000.000.000', {reverse: true});
});
function Proses()
{
	$("#btnTambah").html('<div class="light-loader1" role="status"><span class="sr-only"></span></div>&nbsp; Memproses');
	$("#btnTambah").addClass("disabled");
	var app_token	= $('#app_token').val();
	var userid 	= $('#userid').val();
	var nama 	= $('#nama').val();
	var tgl_trans	= $('#tgl_trans').val();
	var jumlah 	= $('#jumlah').cleanVal();
	var keterangan	= $('#keterangan').val();
	$.ajax({
		url: "<?php echo base_url('master/anggota/get_simpanan'); ?>",
		method: 'post',
		data: { app_token:app_token, tgl_trans:tgl_trans, userid:userid, jumlah:jumlah },
		success: function(data)
		{
			$("#btnTambah").html('Simpan <i class="fal fa-envelope-circle-check fa-fw fa-lg ml-2"></i>');
			$("#btnTambah").removeClass("disabled");
			var nilai = data.hasil;
			if(parseFloat(nilai) < parseFloat(jumlah))
			{
				Swal.fire({
					title: "Maaf !",
					customClass: { },
					html: "<h5 class='kandel mb-0'>" + nama + "</h5><br>Tidak Diperkenankan<br>Melakukan Penarikan Saldo<br>Lebih dari Simpanan Sukarelanya !",
					icon: "error",
					confirmButtonColor: "#3085d6",
					cancelButtonColor: "#d33",
					confirmButtonText: " Ulangi ",
					}).then((result) => {
						if (result.isConfirmed) {
						
						} else {
							
						}
				});
			}
			else if (tgl_trans == "")
			{
				Swal.fire({
					title: "Maaf !",
					html: "Silahkan Pilih Tanggal Transaksi<br>Terlebih Dahulu !",
					icon: "warning",
					confirmButtonColor: "#3085d6",
					cancelButtonColor: "#d33",
					confirmButtonText: "Ok",
					}).then((result) => {
						if (result.isConfirmed) {
						
						} else {
						
						}
				});
			}
			else if(userid == "")
			{
				Swal.fire({
					title: "Maaf !",
					text: "Silahkan Pilih Anggota Dulu",
					icon: "warning",
					confirmButtonColor: "#3085d6",
					cancelButtonColor: "#d33",
					confirmButtonText: "Ulangi",
					}).then((result) => {
						if (result.isConfirmed) {
						
						} else {
						
						}
				});
			}
			else if (nilai == null)
			{
				Swal.fire({
					title: "Maaf !",
					html: "<h5 class='kandel mb-0'>" + nama + "</h5><br>Tidak Memiliki<br>Saldo Tabungan Sukarela !",
					icon: "info",
					confirmButtonColor: "#3085d6",
					cancelButtonColor: "#d33",
					confirmButtonText: "Ok",
					}).then((result) => {
						if (result.isConfirmed) {
						
						} else {
						
						}
				});
			}
			else if (jumlah == "")
			{
				Swal.fire({
					title: "Maaf !",
					html: "Silahkan Isi Nilai Saldo<br>Yang Ingin Anda Ambil !",
					icon: "warning",
					confirmButtonColor: "#3085d6",
					cancelButtonColor: "#d33",
					confirmButtonText: "Ok",
					}).then((result) => {
						if (result.isConfirmed) {
						
						} else {
						
						}
				});
			}

			else if (keterangan == "")
			{
				Swal.fire({
					title: "Maaf !",
					html: "<p class='mb-3'>Silahkan Isi<br>Keterangan Pengambilan Terlebih Dahulu !</p>",
					icon: "warning",
					confirmButtonColor: "#3085d6",
					cancelButtonColor: "#d33",
					confirmButtonText: "Ok",
					}).then((result) => {
						if (result.isConfirmed) {
						
						} else {
						
						}
				});
			}
			else
			{
				Swal.fire({
					title: "Terima Kasih !",
					html: "Anda Boleh Mengambil Uang<br>Sebesar Rp. " + formatRupiah(jumlah),
					icon: "success",
					confirmButtonColor: "#3085d6",
					cancelButtonColor: "#d33",
					confirmButtonText: "Proses",
					}).then((result) => {
						if (result.isConfirmed) {
							Notiflix.Loading.circle('Sebentar ...');
							$.ajax({
								type: "POST",
								url: "<?php echo base_url('transaksi/simpanan/proses_penarikan'); ?>",
								data: {app_token:app_token, userid:userid, tgl_trans:tgl_trans, jumlah:jumlah, keterangan:keterangan},
								success: function(data)
								{
									if(data.status == 'success')
									{
										Notiflix.Loading.remove();
										var notif = Lobibox.notify(data.status, {title: data.title, position: 'top right', icon: true, msg: data.message});
										setTimeout(() => {
											notif.remove();
										}, 2000);
									}
									else
									{
										Notiflix.Loading.remove();
										Lobibox.notify(data.status, {title: data.title, position: 'top right', icon: true, msg: data.message});
									}
								},
								error: function(data)
								{
									Notiflix.Loading.remove();
									Lobibox.notify(data.status, {title: data.title, position: 'top right', icon: true, msg: data.message});
								}
							});
						} else {
						//location.reload();
						}
				});
			}
		}
	});
}

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
	// Fc-datepicker

</script>

