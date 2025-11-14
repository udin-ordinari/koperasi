<?php echo link_tag('assets/plugins/fancyuploder/fancy_fileupload.css');?>
<?php
$bunga = $this->sistem->RowObject('nama', 'jasa-pinjaman', 'app_jasa')->isi;
if($pengajuan->status == '')
{
?>
<div class="text-center" style="position: absolute; display: block;z-index: 100;">
	<img src="<?php echo base_url('assets/img/lunas.png');?>" width="90%">
</div>

		<div class="row row-sm">
			<div class="col-lg-12">
				<div class="card p-1">
					<div class="card-body">
						<form class="row g-3" id="upload_form" enctype="multipart/form-data">
						<input type="hidden" name="app_token" id="app_token" class="form-control sembunyi" value="<?php echo session('app_token'); ?>">
						<input type="text" name="userid" id="userid" class="form-control sembunyi" burem readonly>
						<div class="col-md-3 ui-widget">
							<label for="tgl">Tanggal Pengajuan</label>
							<input type="text" class="form-control" id="tgl_trans" name="tgl_trans">
						</div>
						<div class="col-md-3">
							<label for="nik">Cari NIK Anggota</label>
							<input type="text" class="form-control" id="ktp" name="ktp" burem readonly>
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

						<div class="mt-2" id="hidden_div" style="display: none;">
							<div class="row">
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											<input id="demo" name="jaminan" type="file" accept="image/*,.pdf" multiple>
										</div>
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
		<?php } else { ?>

		<div class="row row-sm">
			<div class="col-lg-12 mb-3">
				<div class="card p-1">
					<div class="card-body">
						<form class="row g-3" id="upload_form" enctype="multipart/form-data">
						<input type="hidden" name="app_token" id="app_token" class="form-control sembunyi" value="<?php echo session('app_token'); ?>">
						<input type="text" name="userid" id="userid" class="form-control sembunyi" burem readonly>
						<div class="col-md-3 mb-2">
							<label for="tgl">Tanggal Pengajuan</label>
							<input type="text" class="form-control" id="tgl_trans" name="tgl_trans" value="<?php echo tgl_indo($pengajuan->tgl); ?>" burem readonly>
						</div>
						<div class="col-md-3">
							<label for="kode">Kode Transaksi</label>
							<input type="text" class="form-control" name="kode_trans" id="kode_trans" value="<?php echo $pengajuan->kode; ?>" burem readonly>
						</div>
						<div class="col-md-6">
					
						</div>
						<div class="col-md-3">
							<label for="input2">E KTP</label>
							<input type="text" class="form-control" name="ktp" id="ktp" value="<?php echo $anggota->ktp; ?>" burem readonly>
						</div>
						<div class="col-md-6 mb-2">
							<label for="input3">Nama Anggota</label>
							<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $anggota->nama; ?>" burem readonly>
						</div>
						<div class="col-md-3">
							<label for="input4">Cabang</label>
							<input type="text" class="form-control" id="cabang" name="cabang" value="<?php echo get_cabang($anggota->cabang)->nama; ?>" burem readonly>
						</div>
						<div class="col-md-3 mb-2">
							<label for="input6">No HP / WA</label>
							<input type="text" class="form-control" id="phone" name="phone" value="<?php echo $anggota->phone; ?>" burem readonly>
						</div>
						<div class="col-md-9">
							<label for="input5">Alamat</label>
							<input type="text" class="form-control text-dark" id="alamat" name="alamat" value="<?php echo $anggota->alamat; ?>" burem readonly>
						</div>
						<div class="col-lg-12">
							<div class="p-0 rounded"></div>
						</div>
						<div class="col-lg-12 mt-4">
							<div class="border border-3 p-2 rounded">
								<div class="row g-3">
									<div class="col-md-4">
										<label for="jns_pinj">Jenis Pinjaman</label>
										<?php echo form_dropdown('jns_pinj', $jns_drop, $pengajuan->jns_pinj, 'class="form-control" id="jns_pinj" burem readonly');?> 
									</div>
									<div class="col-md-2">
										<label for="jns_pinj">Angsuran</label>
										<div class="input-group">
											<input type="text" class="form-control" name="tempo" id="tempo" style="text-align: right;" value="<?php echo $pengajuan->cicil; ?>" burem readonly>
											<div class="input-group-text bg-info">X Bln</div>
										</div>
									</div>
                            						<div class="col-md-3 mb-3">
										<label for="input25">Jumlah Pinjaman</label>
										 <div class="input-group">
											<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
											<input type="text" class="form-control uang" id="jumlah" name="jumlah" value="<?php echo number_format($pengajuan->jumlah, 0, ",", "."); ?>" burem readonly>
										 </div>
									</div>
                            						<div class="col-md-3 mb-3">
										<label for="input25">Diterima</label>
										 <div class="input-group">
											<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
											<input type="text" class="form-control uang" id="diterima" name="diterima" value="<?php echo number_format($pengajuan->pencairan, 0, ",", "."); ?>" burem readonly>
										 </div>
									</div>


									<div class="col-md-4">
										<label for="jns_pinj" class="form-label">Angsuran Pokok Per Bulan</label>
								 		<div class="input-group">
											<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
											<input type="text" class="form-control uang" id="pokok" name="pokok" value="<?php $pokoknya = penggenapan($pengajuan->total / $pengajuan->cicil); echo number_format($pokoknya, 0, ', ', '.'); ?>" burem readonly>
										</div>
									</div>
									<div class="col-md-4">
										<label for="input25" class="form-label">Jasa Pinjaman</label>
								 		<div class="input-group">
											<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
											<input type="text" class="form-control uang" id="bunga" name="bunga" value="<?php $bunganya = $pengajuan->total * $bunga / 100; echo number_format($bunganya, 0, ', ', '.'); ?>" burem readonly>
										</div>
									</div>
									<div class="col-md-4">
										<label for="input25" class="form-label">Total Angsuran</label>
								 		<div class="input-group">
											<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
											<input type="text" class="form-control uang" id="totang" name="totang" value="<?php echo number_format($pokoknya + $bunganya, 0, ",", "."); ?>" burem readonly>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12 mb-3">
				<div class="card p-0">
					<div class="card-body">
						<div class="mt-2">
							<input id="demo" type="file" name="files" accept="image/jpeg, image/png, text/html, application/zip, text/css, text/js" multiple>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="card p-0">
					<div class="card-body">				
						<label for="jns_pinj" class="form-label">Alasan</label>
						<input type="text" class="form-control" name="alasan" id="alasan">
					</div>				
				</div>
			</div>
			<div class="col-lg-12 text-center mt-3">
				<div class="align-items-center mb-3">
					<button type="button" class="btn btn-warning me-2 py-2" data-bs-dismiss="modal">Tutup<i class="fa-light fa-circle-xmark fa-fw fa-lg ml-1"></i></button>
					<?php
						$aktif = $pengajuan->status;
						if($aktif == 'baru') { ?>
					<button type="button" class="btn ripple btn-success setujui me-2 py-2" onclick="Setujui(); return false;">Setuju <i class="fal fa-check-circle fa-fw fa-lg ml-1"></i></button>
					<button class="btn ripple btn-danger tolak me-2 py-2" onclick="Tolak(); return false;" id="tolak">Tolak <i class="fal fa-hand fa-fw fa-lg ml-1"></i></button>
					<?php } elseif($aktif == 'tolak') { ?>
					<button class="btn ripple btn-info ulang me-2 py-2" onclick="Ulang(); return false;" id="ulang"> Ajukan Ulang <i class="fal fa-book-open-reader fa-fw fa-lg ml-1"></i></button>
					<?php } ?>

				</div>
			</div>
		</div>
		<?php echo form_close() ?>
<?php } ?>


<?php echo script_tag('assets/plugins/fancyuploder/jquery.ui.widget.js');?>
<?php echo script_tag('assets/plugins/fancyuploder/jquery.fileupload.js');?>
<?php echo script_tag('assets/plugins/fancyuploder/jquery.iframe-transport.js');?>

<?php echo script_tag('assets/plugins/fancyuploder/jquery.fancy-fileupload.js');?>

<script type="text/javascript">

	$('#demo').FancyFileUpload({
	params : {
		 action : 'fileuploader'
		},
		maxfilesize : 1000000
	});

</script>