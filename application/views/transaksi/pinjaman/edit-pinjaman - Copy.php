<div class="row row-sm">
	<div class="col-lg-12 mb-3">
		<div class="card p-1">
			<div class="card-body">
				<form class="row g-3 pinjaman" id="upload_form" enctype="multipart/form-data">
				<input type="hidden" name="app_token" id="app_token" class="form-control" value="<?php echo session('app_token'); ?>">
				<input type="hidden" name="id" id="id" class="form-control" value="<?php echo $pengajuan->id; ?>">
				<div class="row g-3">
					<div class="col-md-4">
						<label for="tgl" class="form-label">Tanggal Pengajuan</label>
						<input type="date" class="form-control" name="tgl" id="tgl" value="<?php echo $pengajuan->tgl; ?>">
					</div>
					<div class="col-md-5">
						<label for="kode" class="form-label">Kode Transaksi</label>
						<input type="text" class="form-control" name="kode" id="kode" value="<?php echo $pengajuan->kode; ?>" burem readonly>
					</div>

					<div class="col-md-4">
						<label for="nik" class="form-label">E KTP</label>
						<input type="text" class="form-control" name="ktp" id="ktp" value="<?php echo $anggota->ktp; ?>" burem readonly>
					</div>
					<div class="col-md-4">
						<label for="nama" class="form-label">Nama Anggota</label>
						<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $anggota->nama; ?>" burem readonly>
					</div>
					<div class="col-md-4">
						<label for="jk" class="form-label">Jenis Kelamin</label>
						<input type="text" class="form-control" id="jk" name="jk" value="<?php echo $anggota->jk; ?>" burem readonly>
					</div>
					<div class="col-md-3">
						<label for="tempat" class="form-label">Tempat Lahir</label>
						<input type="text" class="form-control" id="tempat" name="tempat" value="<?php echo $anggota->tempat_lahir; ?>" burem readonly>
					</div>
					<div class="col-md-3">
						<label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
						<input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $anggota->tanggal_lahir; ?>" burem readonly>
					</div>
					<div class="col-md-3">
						<label for="phone" class="form-label">No HP / WA</label>
						<input type="text" class="form-control" id="phone" name="phone" value="<?php echo $anggota->phone; ?>" burem readonly>
					</div>
					<div class="col-md-3">
						<label for="cabang" class="form-label">Cabang</label>
						<input type="text" class="form-control" id="cabang" name="cabang" value="<?php echo get_cabang($anggota->cabang)->nama; ?>" burem readonly>
					</div>
					<hr/>
					<div class="mt-2">
						<div class="row">
							<div class="col-lg-8">
								<div class="border border-3 p-2 rounded">
									<div class="row g-3">
										<div class="col-md-8">
											<label for="jns_pinj" class="form-label">Jenis Pinjaman</label>
											<?php echo form_dropdown('jns_pinj', $jns_drop, $pengajuan->jns_pinj, 'class="form-select" id="jns_pinj"');?> 
										</div>
										<div class="col-md-4">
											<label for="jns_pinj" class="form-label">Angsuran (X)</label>
											<div class="input-group">
												<input type="text" class="form-control" id="tempo" name="tempo" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" style="text-align: right;" value="<?php echo $pengajuan->cicil; ?>">
												<div class="input-group-text bg-info" style="cursor: pointer;" onclick="Check();">Cek</div>
											</div>
										</div>
                            						</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="border border-3 p-2 rounded">
									<div class="row g-3">
										<div class="col-md-12">
											<label for="input25" class="form-label">Jumlah Pinjaman</label>
								 			<div class="input-group">
												<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
												<input type="text" class="form-control uang" id="jumlah" name="jumlah" value="<?php echo number_format($pengajuan->jumlah, 0, ",", "."); ?>">
											</div>
										</div>
						  			</div>
								</div>
							</div>
						</div>
					</div>
					<div class="mt-2">
						<div class="row">
							<div class="col-lg-6">
								<div class="border border-3 p-2 rounded">
									<div class="row g-3">
										<div class="col-md-12">
											<input type="file" class="form-control" id="jaminan" name="jaminan" accept="image/*">
										</div>

                            						</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="border border-3 p-2 rounded">
									<div class="row g-3">
										<div class="col-md-12 text-center">
											<label for="jns_pinj" class="form-label">Jaminan Pinjaman</label>
											<?php if($pengajuan->jaminan == 'NULL') { } else { ?>
											<img src="<?php echo base_url('assets/img/jaminan/'.$pengajuan->jaminan);?>" data-fancybox data-src="#GambarModal" class="w-100 zoom-in">
											<?php } ?>
										</div>
                            						</div>
								</div>
							</div>
						</div>
					</div>
					<div class="mt-2">
						<div class="row">
							<div class="col-lg-12">
								<div class="border border-3 p-2 rounded">
									<div class="row g-3">
										<div class="col-md-12 text-center">
											<input type="text" class="form-control" name="alasan" id="alasan" placeholder="Alasan Diubah ?">
										</div>
                            						</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-12" style="text-align: center;">
						<div class="align-items-center gap-3 mb-3">
							<button type="button" class="btn btn-warning radius-30 btn-sm" data-bs-dismiss="modal"><i class="bx bx-x-circle bx-sm"></i>Tutup &nbsp;</button>&nbsp;
							<button class="btn btn-primary radius-30 btn-sm ubah" onclick="Ubahin(); return false;" id="ubah"><i class="bx bx-plus-circle bx-sm"></i>Update &nbsp;</button>
							<?php $aktif = $pengajuan->status; if($aktif == 'baru') { ?>
							&nbsp;<button type="button" class="btn btn-success radius-30 setujui btn-sm" onclick="Setujui(); return false;" id="setujui"> Setujui <i class="bx bx-check-circle bx-sm"></i></button>
							&nbsp;<button class="btn btn-danger radius-30 tolak btn-sm" onclick="Tolak(); return false;" id="tolak"> Tolak <i class="fa-regular fa-hand"></i></button>
							<?php } ?>
						</div>
					</div>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
function Check()
{
	var pensiun  = "<?php echo get_setting('usia_pensiun'); ?>";
	var sekarang = new Date();
	var lahir    = new Date($('#tgl_lahir').val().split('-'));
	var mbuh     = sekarang-lahir;
	var umur     = Math.floor(mbuh/31536000000);
	var hasil    = pensiun - umur;
	var tempo    = 12 * hasil;
	var input    = $("#tempo").val();
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
function Ubahin()
{
	$('.ubah').attr('disabled', 'disabled');
	$('.setujui').attr('disabled', 'disabled');
	$('.tolak').attr('disabled', 'disabled');
	$('.ubah').html("<i class='bx bx-loader-circle bx-spin'></i>&nbsp;Memproses");
	var values = {app_token	: $('#app_token').val(), id : $('#id').val(), tgl : $('#tgl').val(), jns_pinj : $('#jns_pinj').val(), tempo : $('#tempo').val(), jumlah : $('#jumlah').val(), alasan : $('#alasan').val()};
	$.post("<?php echo base_url('transaksi/pinjaman/ubah');?>", values, function(response)
	{
		$('.ubah').html("<i class='bx bx-plus-circle bx-sm'></i> Update");
		var res = response;
		if (res.status == 'success')
		{

		}
		else
		{
			jQuery('#ubah, #setujui, #tolak').removeAttr('disabled');
			Lobibox.notify(res.status, {title: res.title, position: 'top right', icon: 'fa fa-exclamation-circle', msg: res.message});
		}
	});
}
function Setujui()
{
	$('.setujui').attr('disabled', 'disabled');
	$('.tolak').attr('disabled', 'disabled');
	var values = {app_token	: $('#app_token').val(), id : $('#id').val()};
	$('.setujui').html("<i class='bx bx-loader-circle bx-spin'></i>&nbsp;Memproses");
	$.post("<?php echo base_url('transaksi/pinjaman/setujui');?>", values, function(response)
	{
		$('.setujui').html("Setujui <i class='bx bx-check-circle bx-sm'></i>");
		var res = response;
		if (res.status == 'success')
		{
			$("#PreviewModal").modal('hide');
			Swal.fire({
				title: "Terima Kasih !",
				text: "Apakah Anda Ingin Mencetak Persetujuan Ini ?",
				icon: "warning",
				showDenyButton: true,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: "Iya ",
				denyButtonText: "Tidak",
				}).then((result) => {
					if (result.isConfirmed) {
						window.open("<?php echo base_url('transaksi/pinjaman/cetak/');?>" + res.id, '_blank');
						location.reload();
					} else if (result.isDenied) {
						location.reload();
					}
				});



			//Lobibox.notify(res.status, {title: res.title, position: 'top right', icon: 'fa fa-check-circle', msg: res.message});
			//setInterval(function()
			//{
				//location.reload();
			//}, 2000);
		}
		else
		{
			jQuery('#masuk, #identity, #password').removeAttr('disabled');
			Lobibox.notify(res.status, {title: res.title, position: 'top right', icon: 'fa fa-exclamation-circle', msg: res.message});
		}
	});
} 
function Tolak()
{
	Swal.fire({
		title: "Alasan ? ",
		text: "Mengapa anda menolak pengajuan ini ?",
		input: 'textarea',
		icon: 'warning',
		inputAttributes: {
			autocapitalize: 'on',
			required: 'true'
		},
		confirmButtonColor: "#52b726",
		cancelButtonColor: "#d33",
		showCancelButton: true,
		cancelButtonText: "Tutup",
		confirmButtonText: "Lanjut"
	}).then((result) => {
		if (result.isConfirmed) {
			$("input[name='alasan'][type='text']").val(result.value);

			var values = {app_token	: $('#app_token').val(), id : $('#id').val(), alasan : $('#alasan').val()};
			$.post("<?php echo base_url('transaksi/pinjaman/setujui');?>", values, function(response)
			{
				var res = response;
				if (res.status == 'success')
				{
					$("#PreviewModal").modal('hide');
					Lobibox.notify(res.status, {title: res.title, position: 'top right', icon: 'fa fa-exclamation-circle', msg: res.message});
					setInterval(function()
					{
						location.reload();
					}, 2000);
				}
				else
				{
					Lobibox.notify(res.status, {title: res.title, position: 'top right', icon: 'fa fa-exclamation-circle', msg: res.message});
				}
			});
		}
	});
}
$(document).ready(function(){
	$('.uang').mask('000.000.000.000.000.000', {reverse: true});
});

</script>
<div class="sembunyi" id="GambarModal">
<?php if($pengajuan->jaminan == 'NULL') { } else { ?>
	<img src="<?php echo base_url('assets/img/jaminan/'.$pengajuan->jaminan);?>" width="100%">
<?php } ?>
</div>
