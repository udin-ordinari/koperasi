<div class="main-content side-content">
	<div class="main-container container-fluid">
		<div class="inner-body">
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-20 mg-b-5">Form <span class="text-muted"><?php echo $title; ?></span></h2>
				</div>
			</div>
		</div>
		<div class="row row-sm">
			<div class="col-lg-12">
				<div class="card custom-card overflow-hidden">
					<div class="card-body">
			<form class="row g-3 pinjaman">
				<input type="text" name="app_token" id="app_token" class="form-control sembunyi" value="<?php echo session('app_token'); ?>">
				<input type="text" name="userid" id="userid" class="form-control sembunyi" burem readonly>
					<div class="col-md-3 ui-widget">
						<label for="tgl">Tanggal</label>
						<input type="date" class="form-control" id="tgl_trans" name="tgl_trans">
					</div>
					<div class="col-md-3">
						<label for="nik">Cari NIK Anggota</label>
						<input type="text" class="form-control" id="ktp" name="ktp" data-bs-toggle="modal" data-bs-target="#modalKing" data-href="<?php echo base_url('master/anggota/cari_angsuran');?>" data-name="Cari Data Anggota">
					</div>
					<div class="col-md-3">
						<label for="input2">Nama Lengkap</label>
						<input type="text" class="form-control" id="nama" name="nama" burem readonly>
					</div>
					<div class="col-md-3">
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
					<div class="col-md-3">
						<label for="input6">No HP / WA</label>
						<input type="text" class="form-control" id="phone" name="phone" burem readonly>
					</div>
					<hr/>
					<div class="col-md-12 mt-2">
						<div class="row row-sm mb-3">
							<label for="jenis" class="col-sm-4 col-form-label">Angsuran / Pelunasan ? </label>
							<div class="col-sm-4">
								<div class="input-group mb-3">
									<span class="input-group-text border-end-0" id="basic-addon1"><i class="fa-light fa-credit-card"></i></span>
									<select class="form-control" id="jenis" name="jenis">
										<option selected>--- Silahkan Pilih ---</option>
										<option value="cicilan">Cicilan / Angsuran</option>
										<option value="pelunasan">Pelunasan Pinjaman</option>
									</select>
								</div>
							</div>
						</div>
					</div>

					<div class="mt-2" id="cicil" style="display:none;">
						<div class="row">
							<div class="col-lg-7">
								<div class="border border-3 p-4 rounded">
									<div class="row g-3">
										<div class="col-md-8 mb-2">
											<label for="kode_trans">Kode Transaksi Pinjaman</label>
											<select class="form-control" id="kode_trans" name="kode_trans">
												
											</select>
											<input type="text" name="id_pinj" id="id_pinj" class="form-control sembunyi" burem readonly>
										</div>
										<div class="col-md-4">
											<label for="cicil" class="form-label sembunyi" id="cicilan">Cicilan Ke</label>
											<div class="input-group sembunyi" id="cicilane">
												<input type="text" class="form-control text-right" id="cicilo" name="cicilo" burem readonly>
												<div class="input-group-text">X</div>
											</div>
										</div>
										<div class="col-md-3">
											<label for="jns_pinj">Tempo</label>
											<div class="input-group">
												<input type="text" class="form-control text-right" name="tempo" id="tempo" burem readonly>
												<div class="input-group-text">X</div>
											</div>
										</div>
										<div class="col-md-5">
											<label for="input25">Total Pinjaman</label>
										 	<div class="input-group">
												<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
												<input type="text" class="form-control uang" id="total" name="total" burem disabled>												
										 	</div>
										</div>
										<div class="col-md-4">
											<label for="input25">Sisa Pinjaman</label>
										 	<div class="input-group">
												<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
												<input type="text" class="form-control uang" id="sisa" name="sisa" burem disabled>												
										 	</div>
										</div>
                            						</div>
								</div>
							</div>
							<div class="col-lg-5">
								<div class="border border-3 p-4 rounded">
									<div class="row g-3">
										<div class="col-md-6">
											<label id="input25" for="input25">Pokok </label>
										 	<div class="input-group">
												<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
												<input type="text" class="form-control uang" id="pokok" name="pokok" burem readonly="readonly">
										 	</div>
										</div>
										<div class="col-md-6">
											<label id="input26" for="input26">Bunga</label>
										 	<div class="input-group">
												<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
												<input type="text" class="form-control uang" id="bunga" name="bunga" burem readonly="readonly">
										 	</div>
										</div>
										<div class="col-md-6">
											<label for="input25">Total Bayar</label>
										 	<div class="input-group">
												<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
												<input type="text" class="form-control uang" id="jumlah" name="jumlah" burem readonly="readonly">
										 	</div>
										</div>

						  			</div>
								</div>
							</div>
						</div>
					</div>
					<div class="mt-2" id="piutang" style="display:none;">
						<div class="row">
							<div class="col-lg-12">
								<div class="border border-3 p-4 rounded">
									<div class="row g-3">
										<div class="col-md-3">
											<label for="kode_trans">Tanggal Input</label>
											<input type="text" id="tgl" name="tgl" class="form-control" burem readonly>
										</div>
										<div class="col-md-3">
											<label for="jns_pinj">Pokok Belum Bayar</label>
										 	<div class="input-group">
												<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
												<input type="text" class="form-control uang" id="pokok_blm_bayar" name="pokok_blm_bayar" burem disabled>												
										 	</div>
										</div>
										<div class="col-md-3">
											<label for="input25">Bunga Belum Terbayar</label>
										 	<div class="input-group">
												<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
												<input type="text" class="form-control uang" id="bunga_blm_bayar" name="bunga_blm_bayar" burem disabled>												
										 	</div>
										</div>
										<div class="col-md-3">
											<label for="input25">Total</label>
										 	<div class="input-group">
												<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
												<input type="text" class="form-control uang" id="totale" name="totale" burem disabled>												
										 	</div>
										</div>

										<div class="col-md-3">
											<label id="input25" for="input25">Pokok </label>
										 	<div class="input-group">
												<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
												<input type="text" class="form-control uang" id="duit1" name="pokoke" onkeyup="calculate()">
										 	</div>
										</div>
										<div class="col-md-3">
											<label id="input26" for="input26">Bunga</label>
										 	<div class="input-group">
												<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
												<input type="text" class="form-control uang" id="duit2" name="bungae" onkeyup="calculate()">
										 	</div>
										</div>
										<div class="col-md-3">
											<label for="input25">Total Bayar</label>
										 	<div class="input-group">
												<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
												<input type="text" class="form-control uang" id="jumlahe" name="jumlahe" onkeyup="calculate()" burem readonly="readonly">
										 	</div>
										</div>

						  			</div>
								</div>
							</div>
						</div>
					</div>


				<div class="col-lg-12" style="text-align: center;">
					<div class="align-items-center gap-3 mb-3">
						<button type="button" class="btn btn-danger px-2 radius-30 btn-sm" style="margin-right: 6px;" onclick="location.reload();"><i class="bx bx-reset bx-sm"></i>Ulangi&nbsp;</button>
						<button class="btn btn-success px-2 radius-30 btnTambah btn-sm" onclick="AddAngsuran(); return false;" id="btnTambah">&nbsp;Simpan &nbsp;<i class="far fa-circle-check fs-5"></i></button>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	$('.uang').mask('000.000.000.000', {reverse: true});
});
function AddAngsuran()
{
	var values = {
			app_token	: $('#app_token').val(),
			id		: $('#id').val(),
			id_pinj		: $('#id_pinj').val(),
			tgl_trans	: $('#tgl_trans').val(),
			jumlah		: $('#jumlah').val(),
			pokok		: $('#pokok').val(),
			bunga		: $('#bunga').val(),
			jenis		: $('#jenis').val(),
			cicil		: $('#cicilo').val()
	};
	$("#btnTambah").html("<i class='bx bx-loader-alt bx-spin mr-2'></i>&nbsp;Memproses");
	$.post("<?php echo base_url('transaksi/angsuran/add_angsuran');?>", values, function(response)
	{
		$("#btnTambah").html("Simpan <i class='far fa-circle-check fs-5'></i>");
		var res = response;
		if (res.status == 'success')
		{
			$('#CariModal').hide();
			Swal.fire({
				title: "Terima Kasih !",
				text: "Apakah Anda Ingin Melakukan Angsuran Lagi ?",
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
						window.location.href="<?php echo base_url('transaksi/angsuran'); ?>";
					}
				});
		}
		else
		{
			Lobibox.notify(response.status, {title: response.title, delayIndicator: false, pauseDelayOnHover: false, continueDelayOnInactiveTab: false, delay: 2000, position: 'top right', icon: true, iconSource: 'fontAwesome', msg: response.message});
		}			
	});
}
$('#jenis').change(function() {
	var text = $('#jenis').val();
	if (text == 'cicilan' || text == 'pelunasan')
	{
		$('#cicil').show();	
		$('#kode_trans').change(function() {
			$('#tempo').empty();
			$('#jumlah').empty();

			$.post("<?php echo base_url('transaksi/angsuran/get_kodepinjaman');?>", {id: $('#kode_trans').val()}, function(data)
			{
				$('#tempo').val(data.tempo);
				$('#id_pinj').val(data.id_pinj);

				var sisanya 	= data.jumlah;
				var rev 	= sisanya.toString().split('').reverse().join(''),
				sisanya 	= rev.match(/\d{1,3}/g);
				sisanya		= sisanya.join('.').split('').reverse().join('');
				$('#sisa').val(sisanya);	
	
				var nominal 	= data.total;
				var jasan    	= "6";

				var bunga 	= nominal * jasan / 100;
				var reverse 	= bunga.toString().split('').reverse().join(''),
				jasa 		= reverse.match(/\d{1,3}/g);
				jasa		= jasa.join('.').split('').reverse().join('');
		
				var reverse 	= nominal.toString().split('').reverse().join(''),
				ribuan 		= reverse.match(/\d{1,3}/g);
				ribuan		= ribuan.join('.').split('').reverse().join('');

				var pokok 	= Math.round(data.pokok);		
				var rever 	= pokok.toString().split('').reverse().join(''),
				ribu 		= rever.match(/\d{1,3}/g);
				ribu		= ribu.join('.').split('').reverse().join('');

				var angsur 	= pokok + bunga;
				var reverse 	= angsur.toString().split('').reverse().join(''),
				angsuran 	= reverse.match(/\d{1,3}/g);
				angsuran 	= angsuran.join('.').split('').reverse().join('');

				var totalan 	= data.total;
				var revers 	= totalan.toString().split('').reverse().join(''),
				totale 		= revers.match(/\d{1,3}/g);
				totale		= totale.join('.').split('').reverse().join('');

						$('#cicilan').removeClass('sembunyi');
						$('#cicilane').removeClass('sembunyi');
						$('#cicilo').removeClass('sembunyi');

				$('#jenis').change(function() {
					var text = $('#jenis').val();
					if (text == 'cicilan')
					{

						var hasil = Math.ceil(angsur / 1000) * 1000;
						var re	  = hasil.toString().split('').reverse().join(''),
						tota	  = re.match(/\d{1,3}/g);
						tota	  = tota.join('.').split('').reverse().join('');

						$('#pokok').prop("readonly", true); 
						$('#pokok').attr("burem", true); 
						$('#bunga').prop("readonly", true); 
						$('#bunga').attr("burem", true); 
						$('#jumlah').prop("readonly", true); 
						$('#jumlah').attr("burem", true); 
						$('#pokok').val(ribu);
						$('#cicilo').val(data.cicil);
						$('#bunga').val(jasa);
						$('#jumlah').val(tota);
					}
					else
					{
						$('#pokok').prop("readonly", true); 
						$('#pokok').attr("burem"); 
						$('#bunga').prop("readonly", true); 
						$('#bunga').attr("burem"); 
						$('#jumlah').prop("readonly", true); 
						$('#jumlah').attr("burem"); 
				
						var p 		= data.cicil / 2;
						var a 		= pokok * data.cicil;
						var balik 	= a.toString().split('').reverse().join(''),
						lunas 		= balik.match(/\d{1,3}/g);
						lunas		= lunas.join('.').split('').reverse().join('');

						var b 		= bunga * p;
						var bali 	= b.toString().split('').reverse().join(''),
						kembang		= bali.match(/\d{1,3}/g);
						kembang		= kembang.join('.').split('').reverse().join('');
				
						var c		= a + b;
						var bal 	= c.toString().split('').reverse().join(''),
						kabeh		= bal.match(/\d{1,3}/g);
						kabeh		= kabeh.join('.').split('').reverse().join('');

						$('#cicilo').val(data.cicil);
						$('#pokok').val(lunas);
						$('#bunga').val(kembang);
						$('#jumlah').val(kabeh);
					}
				});

				$('#pokok').val(ribu);
				$('#bunga').val(jasa);
				$('#cicilo').val(data.cicil);
				$('#total').val(totale);
				$('#jumlah').val(angsuran);
			});
		});
	}
});

</script>

