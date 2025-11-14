<?php
$bunga = $this->sistem->RowObject('nama', 'jasa-pinjaman', 'app_jasa')->isi;
if($pengajuan->status == 'lunas')
{
?>
<div class="text-center" style="position: absolute; display: block;z-index: 100;">
	<img src="<?php echo base_url('assets/img/lunas.png');?>" width="90%">
</div>
<div class="row row-sm">
	<div class="col-lg-12">
		<div class="card custom-card overflow-hidden">
			<div class="card-body g-2">
				<input type="hidden" name="app_token" id="app_token" class="form-control" value="<?php echo session('app_token'); ?>">
				<input type="hidden" name="id" id="id" class="form-control" value="<?php echo $pengajuan->id; ?>">
				<div class="col-md-3">
					<label for="tgl" class="form-label">Tanggal Pengajuan</label>
					<input type="text" class="form-control" name="tgl" id="tgl" value="<?php echo tgl_indo($pengajuan->tgl); ?>" disabled>
				</div>
				<div class="col-md-3">
					<label for="kode" class="form-label">Kode Transaksi</label>
					<input type="text" class="form-control" name="kode_trans" id="kode_trans" value="<?php echo $pengajuan->kode; ?>" disabled>
				</div>
				<div class="col-md-6">

				</div>
			<div class="col-md-3">
				<label for="ktp" class="form-label">E KTP</label>
				<input type="text" class="form-control" name="ktp" id="ktp" value="<?php echo $anggota->ktp; ?>" disabled>
			</div>
			<div class="col-md-6">
				<label for="nama" class="form-label">Nama Anggota</label>
				<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $anggota->nama; ?>"  disabled>
			</div>

			<div class="col-md-3">
				<label for="cabang" class="form-label">Cabang</label>
				<input type="text" class="form-control" id="cabang" name="cabang" value="<?php echo get_cabang($anggota->cabang)->nama; ?>" disabled>
			</div>
			<hr/>
			<div class="mt-2">
				<div class="row">
					<div class="col-lg-8">
						<div class="border border-2 p-2 rounded">
							<div class="row g-2">
								<div class="col-md-8">
									<label for="jns_pinj" class="form-label">Jenis Pinjaman</label>
									<?php echo form_dropdown('jns_pinj', $jns_drop, $pengajuan->jns_pinj, 'class="form-control" id="jns_pinj" disabled');?> 
								</div>
								<div class="col-md-4">
									<label for="jns_pinj" class="form-label">Angsuran (X) Bulan</label>
									<div class="input-group">
										<input type="text" class="form-control" name="tempo" id="tempo" style="text-align: right;" value="<?php echo $pengajuan->cicil; ?>" disabled>
										<div class="input-group-text">Bln</div>
									</div>
								</div>
                            				</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="border border-2 p-2 rounded">
							<div class="row g-2">
								<div class="col-md-12">
									<label for="input25" class="form-label">Sisa Pinjaman</label>
								 	<div class="input-group">
										<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
										<input type="text" class="form-control uang" id="jumlah" name="jumlah" value="<?php echo number_format($pengajuan->jumlah, 0, ",", "."); ?>" disabled>
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
						<div class="border border-2 p-2 rounded">
							<div class="row g-2">
								<div class="col-md-4">
									<label for="jns_pinj" class="form-label">Angsuran Pokok Per Bulan</label>
								 	<div class="input-group">
										<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
										<input type="text" class="form-control uang" id="pokok" name="pokok" value="<?php $pokoknya = penggenapan($pengajuan->total / $pengajuan->cicil); echo number_format($pokoknya, 0, ', ', '.'); ?>" disabled>
									</div>
								</div>
								<div class="col-md-4">
									<label for="input25" class="form-label">Jasa Pinjaman</label>
								 	<div class="input-group">
										<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
										<input type="text" class="form-control uang" id="bunga" name="bunga" value="<?php $bunganya = $pengajuan->total * $bunga / 100; echo number_format($bunganya, 0, ', ', '.'); ?>" disabled>
									</div>
								</div>
								<div class="col-md-4">
									<label for="input25" class="form-label">Total Angsuran</label>
								 	<div class="input-group">
										<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
										<input type="text" class="form-control uang" id="totang" name="totang" value="<?php echo number_format($pokoknya, 0, ",", "."); ?>" disabled>
									</div>
								</div>
						  	</div>
						</div>
					</div>
				</div>
			</div>



			<hr/>
			<div class="mt-2">
				<div class="row">
					<div class="col-lg-12">
						<div class="border border-2 p-2 rounded">
							<div class="row g-2">
								<div class="col-md-12 text-center">
									<label for="jns_pinj" class="form-label">Jaminan Pinjaman</label>
<?php if($pengajuan->jaminan == 'NULL') { $pengajuan->jaminan = 'plang.png'; } else { ?>
									<img src="<?php echo base_url('assets/img/jaminan/'.$pengajuan->jaminan); ?>" data-fancybox data-src="#GambarModal" class="w-100">
<?php } ?>
								</div>
                            				</div>
						</div>
					</div>
				</div>
			</div>

			
			<div class="mt-2 sembunyi">
				<div class="row">
					<div class="col-lg-12">
						<div class="border border-2 p-2 rounded">
							<div class="row g-2">
								<div class="col-md-12 text-center">
									<input type="text" class="form-control" name="alasan" id="alasan">
								</div>
                            				</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-lg-12" style="text-align: center;">
				<div class="align-items-center gap-3 mb-3">
					<button type="button" class="btn btn-warning radius-30 btn-sm px-2" data-bs-dismiss="modal"><i class="bx bx-x-circle bx-sm"></i>Tutup &nbsp;</button>
					<?php $aktif = $pengajuan->status; if($aktif == 'baru') { ?>
					&nbsp;<button type="button" class="btn btn-success radius-30 setujui btn-sm" onclick="Setujui(); return false;"> Setujui <i class="bx bx-check-circle bx-sm"></i></button>
					&nbsp;<button class="btn btn-danger radius-30 tolak btn-sm" onclick="Tolak(); return false;" id="tolak"> Tolak <i class="fa-regular fa-hand"></i></button>
					<?php } ?>
					<?php $aktif = $pengajuan->status; if($aktif == 'ditolak') { ?>
					&nbsp;<button class="btn btn-primary radius-30 ulang btn-sm" onclick="Ulang(); return false;" id="ulang"> Ajukan Ulang <i class="fa fa-book-open-reader fa-fw"></i></button>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php } else { ?>
<div class="row row-sm">
	<div class="col-lg-12">
		<div class="card custom-card overflow-hidden">
			<div class="card-body g-2">
		<input type="hidden" name="app_token" id="app_token" class="form-control" value="<?php echo session('app_token'); ?>">
		<input type="hidden" name="id" id="id" class="form-control" value="<?php echo $pengajuan->id; ?>">

			<div class="col-md-4">
				<label for="tgl" class="form-label">Tanggal Pengajuan</label>
				<input type="text" class="form-control" name="tgl" id="tgl" value="<?php echo tgl_indo($pengajuan->tgl); ?>" disabled>
			</div>
			<div class="col-md-4">
				<label for="kode" class="form-label">Kode Transaksi</label>
				<input type="text" class="form-control" name="kode_trans" id="kode_trans" value="<?php echo $pengajuan->kode; ?>" disabled>
			</div>
			<div class="col-md-4">

			</div>
			<div class="col-md-3">
				<label for="nik" class="form-label">E KTP</label>
				<input type="text" class="form-control" name="ktp" id="ktp" value="<?php echo $anggota->ktp; ?>" disabled>
			</div>
			<div class="col-md-6">
				<label for="nama" class="form-label">Nama Anggota</label>
				<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $anggota->nama; ?>" disabled>
			</div>

			<div class="col-md-3">
				<label for="cabang" class="form-label">Cabang</label>
				<input type="text" class="form-control" id="cabang" name="cabang" value="<?php echo get_cabang($anggota->cabang)->nama; ?>" disabled>
			</div>
			<hr/>
			<div class="mt-2">
				<div class="row">
					<div class="col-lg-8">
						<div class="border border-2 p-2 rounded">
							<div class="row g-2">
<?php if ($pengajuan->jns_pinj == '13') { ?>
								<div class="col-md-12">
									<label for="jns_pinj" class="form-label">Jenis Pinjaman</label>
									<?php echo form_dropdown('jns_pinj', $jns_drop, $pengajuan->jns_pinj, 'class="form-control" id="jns_pinj" disabled');?> 
								</div>
<?php } else { ?>
								<div class="col-md-8">
									<label for="jns_pinj" class="form-label">Jenis Pinjaman</label>
									<?php echo form_dropdown('jns_pinj', $jns_drop, $pengajuan->jns_pinj, 'class="form-control" id="jns_pinj" disabled');?> 
								</div>
								<div class="col-md-4">
									<label for="jns_pinj" class="form-label">Angsuran</label>
									<div class="input-group">
										<input type="text" class="form-control" name="tempo" id="tempo" style="text-align: right;" value="<?php echo $pengajuan->cicil; ?>" disabled>
										<div class="input-group-text">X</div>
									</div>
								</div>
<?php } ?>
                            				</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="border border-2 p-2 rounded">
							<div class="row g-2">
								<div class="col-md-12">
									<label for="input25" class="form-label">Sisa Pinjaman</label>
								 	<div class="input-group">
										<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
										<input type="text" class="form-control uang" id="jumlah" name="jumlah" value="<?php echo number_format($pengajuan->jumlah, 0, ",", "."); ?>" disabled>
									</div>
								</div>
						  	</div>
						</div>
					</div>
				</div>
			</div>

<?php if ($pengajuan->jns_pinj == '13') { } else { ?>

			<div class="mt-2">
				<div class="row">
					<div class="col-lg-12">
						<div class="border border-2 p-2 rounded">
							<div class="row g-2">
								<div class="col-md-4">
									<label for="jns_pinj" class="form-label">Angsuran Pokok Per Bulan</label>
								 	<div class="input-group">
										<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
										<input type="text" class="form-control uang" id="pokok" name="pokok" value="<?php $pokoknya = penggenapan($pengajuan->total / $pengajuan->cicil); echo number_format($pokoknya, 0, ', ', '.'); ?>" disabled>
									</div>
								</div>
								<div class="col-md-4">
									<label for="input25" class="form-label">Jasa Pinjaman</label>
								 	<div class="input-group">
										<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
										<input type="text" class="form-control uang" id="bunga" name="bunga" value="<?php $bunganya = ($pengajuan->total * $bunga) / 100; echo number_format($bunganya, 0, ', ', '.'); ?>" disabled>
									</div>
								</div>
								<div class="col-md-4">
									<label for="input25" class="form-label">Total Angsuran</label>
								 	<div class="input-group">
										<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
										<input type="text" class="form-control uang" id="jumlah" name="jumlah" value="<?php echo number_format($pokoknya + $bunganya, 0, ",", "."); ?>" disabled>
									</div>
								</div>
						  	</div>
						</div>
					</div>
				</div>
			</div>
<?php if($pengajuan->jns_pinj == '12') { ?>
			<hr/>
			<div class="mt-2">
				<div class="row">
					<div class="col-lg-12">
						<div class="border border-2 p-2 rounded">
							<div class="row g-2">
								<div class="col-md-12 text-center">
									<label for="jns_pinj" class="form-label">Jaminan Pinjaman</label>
<?php if($pengajuan->jaminan == 'NULL') { } else { ?>
									<img src="<?php echo base_url('assets/img/jaminan/'.$pengajuan->jaminan); ?>" data-fancybox data-src="#GambarModal" class="w-100">
<?php } ?>
								</div>
                            				</div>
						</div>
					</div>
				</div>
			</div>
<?php } ?>

<?php } ?>
			
			<div class="mt-2 sembunyi">
				<div class="row">
					<div class="col-lg-12">
						<div class="border border-2 p-2 rounded">
							<div class="row g-2">
								<div class="col-md-12 text-center">
									<input type="text" class="form-control" name="alasan" id="alasan">
								</div>
                            				</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-lg-12" style="text-align: center;">
				<div class="align-items-center gap-3 mb-3">
					<button type="button" class="btn btn-warning radius-30 btn-sm" data-bs-dismiss="modal"><i class="bx bx-x-circle"></i>Tutup&nbsp;</button>
					<?php $aktif = $pengajuan->status; if($aktif == 'baru') { ?>
					&nbsp;<button type="button" class="btn btn-success radius-30 setujui btn-sm" onclick="Setujui(); return false;">&nbsp;&nbsp;Setujui <i class="bx bx-check-circle"></i></button>
					&nbsp;<button class="btn btn-danger radius-30 tolak btn-sm" onclick="Tolak(); return false;" id="tolak">&nbsp; Tolak <i class="fa-regular fa-hand fa-fw fs-6"></i></button>
					<?php } ?>
					<?php $aktif = $pengajuan->status; if($aktif == 'ditolak') { ?>
					&nbsp;<button class="btn btn-primary radius-30 ulang btn-sm" onclick="Ulang(); return false;" id="ulang"> Ajukan Ulang <i class="fa fa-book-open-reader fa-fw"></i></button>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
function Setujui()
{
	//$('.setujui').attr('disabled', 'disabled');
	//$('.tolak').attr('disabled', 'disabled');
	var values = {app_token	: $('#app_token').val(), id : $('#id').val(), alasan : $('#alasan').val()};
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
				icon: "success",
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
			$.post("<?php echo base_url('transaksi/pinjaman/tolak');?>", values, function(response)
			{
				var res = response;
				if (res.status == 'success')
				{
					$("#PreviewModal").modal('hide');
					Lobibox.notify('info', {title: res.title, position: 'top right', icon: 'fa fa-exclamation-circle', msg: res.message});
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
function Ulang()
{
	Swal.fire({
		title: "Alasan ? ",
		text: "Anda mengajukan ulang pinjaman ini ?",
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
			$.post("<?php echo base_url('transaksi/pinjaman/ajukan_ulang');?>", values, function(response)
			{
				var res = response;
				if (res.status == 'success')
				{
					$("#PreviewModal").modal('hide');
					Lobibox.notify('info', {title: res.title, position: 'top right', icon: 'fa fa-exclamation-circle', msg: res.message});
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
</script>
<div class="sembunyi" id="GambarModal">
<?php if($pengajuan->jaminan == 'NULL') { } else { ?>
	<img src="<?php echo base_url('assets/img/jaminan/'.$pengajuan->jaminan);?>" width="100%">
<?php } ?>
</div>
<?php } ?>
