<div class="card custom-card">
	<div class="p-0">
		<input type="hidden" name="app_token" id="app_token" class="form-control" value="<?php echo session('app_token'); ?>">
		<input type="hidden" name="id" id="id" class="form-control" value="<?php echo $transaksi->id; ?>">
		<div class="row ro-sm">
			<div class="col-md-4">
				<label for="tgl" class="form-label">Tanggal</label>
				<input type="text" class="form-control" name="tgl" id="tgl" value="<?php echo tgl_indo($transaksi->tgl); ?>" disabled>
			</div>
			<div class="col-md-4">
				<label for="kode" class="form-label">Kode Transaksi</label>
				<input type="text" class="form-control" name="kode" id="kode" value="<?php echo $transaksi->kode; ?>" disabled>
			</div>

			<div class="col-md-4">
				<label for="posisi" class="form-label">Posisi</label>
				<input type="text" class="form-control" value="<?php echo $transaksi->jenis; ?>" disabled>				
			</div>
			<div class="col-md-8">
				<label for="kode" class="form-label">Akun</label>
				<input type="text" class="form-control" name="kode_trans" id="kode_trans" value="<?php echo $akuntansi->tipe; ?>.<?php echo $akuntansi->jenis; ?>.<?php echo $akuntansi->kode; ?> <?php echo $akuntansi->akun; ?>" disabled>
			</div>
			<div class="col-lg-4">
				<label for="jumlah" class="form-label">Nominal</label>
				<div class="input-group">
					<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
					<input type="text" class="form-control uang" id="jumlah" name="jumlah" value="<?php echo number_format($transaksi->jumlah, 0, ",", "."); ?>" disabled>
				</div>
			</div>
			<div class="col-lg-6">
				<label for="keterangan" class="form-label">Keterangan</label>
				<textarea class="form-control" disabled><?php echo $transaksi->keterangan; ?></textarea>
			</div>
			<div class="col-lg-3">
				<label for="pokok" class="form-label">Pokok</label>
				<div class="input-group">
					<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
					<input type="text" class="form-control" value="<?php echo number_format($transaksi->pokok, 0, ",", "."); ?>" disabled>
				</div>
			</div>
			<div class="col-lg-3">
				<label for="bunga" class="form-label">Bunga</label>
				<div class="input-group">
					<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
					<input type="text" class="form-control" value="<?php echo number_format($transaksi->bunga, 0, ",", "."); ?>" disabled>
				</div>
			</div>
			<div class="col-lg-12">
				<label for="bukti" class="text-center">Bukti</label>
				<img src="<?php echo base_url('assets/img/bukti/'.$transaksi->bukti); ?>" width="100%">
			</div>
			<div class="col-lg-12 mt-3" style="text-align: center;">
				<div class="align-items-center gap-3 mb-3">
					<button type="button" class="btn ripple btn-warning radius-30" data-bs-dismiss="modal"><i class="fal fa-xmark-circle fa-fw fa-lg mr-2"></i>Tutup &nbsp;</button>
				</div>
			</div>
		</div>
	</div>
</div>