<form>
<div class="main-content side-content">
	<div class="main-container container-fluid">
		<div class="inner-body">
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-20 mg-b-5">Form <span class="breadcrumb-item"><a href="javascript:void(0);"><?php echo $title; ?></a></span></h2>
				</div>
			</div>	
			<div class="card custom-card" style="margin-top: -20px;">
				<div class="card-body row g-3">

						<input type="hidden" name="app_token" id="app_token" class="form-control" value="<?php echo session('app_token'); ?>">
						<input type="text" name="userid" id="userid" class="form-control sembunyi">
						<div class="col-md-3 ui-widget">
							<label for="tgl">Tanggal</label>
							<input type="date" class="form-control" id="tgl_trans" name="tgl_trans" value="2023-01-26">
						</div>
						<div class="col-md-3 mb-2">
							<label for="nik">Cari Anggota</label>
							<input type="text" class="form-control" id="ktp" name="ktp" data-bs-toggle="modal" data-bs-target="#modalKing" data-href="<?php echo base_url('master/anggota/cari_anggota');?>" data-name="Cari Data Anggota">
						</div>
						<div class="col-md-4">
							<label for="input2">Nama Lengkap</label>
							<input type="text" class="form-control" id="nama" name="nama" burem readonly>
						</div>
						<div class="col-md-2">
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
							<label for="input6">No HP / WA</label>
							<input type="text" class="form-control" id="phone" name="phone" burem readonly>
						</div>
						<div class="col-md-3 mb-2">
							<label for="input5">Cabang</label>
							<input type="text" class="form-control" id="cabang" name="cabang" burem readonly>
						</div>
						<div class="col-md-12">
							<label for="input5">Alamat</label>
							<input type="text" class="form-control" id="alamat" name="alamat" burem readonly>
						</div>
						<div class="col-lg-12 mt-4"><div class="border border-3 p-0 rounded"></div></div>


						<div class="col-lg-12 mt-4">
							<div class="border border-3 p-4 rounded">
								<div class="row g-3">
									<div class="col-md-3">
										<label for="jns_pinj">Jenis Simpanan</label>
										<select class="form-control select2" id="jns_simp" name="jns_simp"> 
											<option></option>	
											<option value="1">Simpanan Pokok</option>										
											<option value="2" selected="selected">Simpanan Wajib</option>
											<option value="3">Simpanan Sukarela</option>
											<option value="4">Simpanan Lain - lain</option>
										</select>
									</div>
									<div class="col-md-3">
										<label for="jns_pinj">Saldo Awal Simpanan ?</label>
										<select class="form-control select2" id="saldo_awal" name="saldo_awal"> 
											<option value="" selected="selected"></option>
											<option value="1">Iya</option>
											<option value="0">Tidak</option>
										</select>
									</div>
									<div class="col-md-6">
										<label for="input25">Nominal Simpanan</label>
										 <div class="input-group">
											<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
											<input type="text" class="form-control uang" id="jumlah" name="jumlah" placeholder="1.000.000">
										 </div>
									</div>
						  		</div>
							</div>
						</div>
					</div>

					<div class="form-group row justify-content-end mb-4">
						<div class="col-md-8 ps-md-2">
							<button type="button" class="btn ripple btn-dark pd-x-10 mr-3 kembali" onclick="history.back();"><i class="fal fa-circle-caret-left fa-fw fa-lg mr-2"></i>Kembali</button>
							<button type="reset" class="btn ripple btn-secondary pd-x-10 mr-3"><i class="fa-light fa-broom-wide fa-fw fa-lg mr-2"></i>Reset</button>
							<button class="btn ripple btn-primary pd-x-10 mg-r-5" onclick="AddSimpanan(); return false;" id="btnTambah">Simpan <i class="fal fa-envelope-circle-check fa-fw fa-lg ml-2"></i></button>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
</form>
<script>
$(document).ready(function(){
	$('.uang').mask('000.000.000.000.000.000', {reverse: true});
});
	$('#kembali').removeClass('disabled');
function AddSimpanan()
{
	var values = {
			app_token	: $('#app_token').val(),
			userid		: $('#userid').val(),
			tgl_trans	: $('#tgl_trans').val(),

			jns_simp	: $('#jns_simp').val(),
			saldo_awal	: $('#saldo_awal').val(),
			jumlah		: $('#jumlah').val()
	};
	$("#btnTambah").html('<div class="light-loader1" role="status"><span class="sr-only"></span></div>&nbsp; Memproses');
	$("#btnTambah").addClass("disabled");
	$('#jumlah').removeClass('disabled');
	$.post("<?php echo base_url('transaksi/simpanan/add_simpanan');?>", values, function(response)
	{
		$("#btnTambah").html('Simpan <i class="fal fa-envelope-circle-check fa-fw fa-lg ml-2"></i>');
		var res = response;
		if (res.status == 'success')
		{
			$('#CariModal').hide();
			Swal.fire({
				title: "Terima Kasih !",
				text: "Apakah Anda Ingin Melakukan Simpanan Lagi ?",
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
						window.location.href="<?php echo base_url('transaksi/simpanan'); ?>";
					}
				});
		}
		else
		{
			$('#btnTambah').removeClass('disabled');
			Lobibox.notify(res.status, {title: true, delayIndicator: false, delay: 5000, position: 'top right', icon: true, msg: res.message});
		}			
	}).fail(function(xhr, textStatus, errorThrown) {
		$('#btnTambah').removeClass('disabled');
		$("#btnTambah").html('Simpan <i class="fal fa-envelope-circle-check fa-fw fa-lg ml-2"></i>');
		Lobibox.notify(textStatus, {title: true, delayIndicator: false, pauseDelayOnHover: false, continueDelayOnInactiveTab: false,  delay: 3000, position: 'top right', icon: true, msg: xhr.responseText});
	});
}
$('#jns_simp, #saldo_awal').change(function() {
	var text  = $('#jns_simp').val();
	var saldo = $('#saldo_awal').val();
	if (text == '1' && saldo == '0')
	{
		$('#jumlah').val('<?php echo number_format($this->sistem->RowObject('nama', 'iuran-sp', 'app_jasa')->isi, 0, ', ','.'); ?>');
		$('#jumlah').addClass('disabled');
	}
	if (text == '1' && saldo == '1')
	{
		$('#jumlah').val('<?php echo number_format($this->sistem->RowObject('nama', 'iuran-sp', 'app_jasa')->isi, 0, ', ','.'); ?>');
		$('#jumlah').addClass('disabled');
	}
	if (text == '2' && saldo == '0')
	{
		$('#jumlah').val('<?php echo number_format($this->sistem->RowObject('nama', 'iuran-sw', 'app_jasa')->isi, 0, ', ','.'); ?>');
		$('#jumlah').addClass('disabled');
	}
	if (text == '2' && saldo == '1')
	{
		$('#jumlah').val('');
		$('#jumlah').removeClass('disabled');
	}

});
$("select").closest("form").on("reset",function(ev){
	var targetJQForm = $(ev.target);
	setTimeout((function(){
		this.find("select").trigger("change");
		$('#jumlah').removeClass('disabled');
	}).bind(targetJQForm),0);
});
</script>

