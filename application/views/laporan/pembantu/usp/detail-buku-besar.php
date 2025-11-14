<div class="page-wrapper">
	<div class="page-content">
		<div class="card">
			<div class="card-body">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<div class="row mb-0">
					<label class="col-sm-1 col-form-label">Dari</label>
					<div class="col-sm-3">
						<input type="date" class="form-control" name="dari" id="dari" value="<?php echo set_value('dari'); ?>">
					</div>

					<label class="col-sm-1 col-form-label">Sampai</label>
					<div class="col-sm-3">
						<input type="date" class="form-control" name="sampai" id="sampai" value="<?php echo set_value('sampai'); ?>">
					</div>
					<div class="col-sm-2">
						<button type="submit" class="btn btn-primary radius-30">Tampilkan</button>
					</div>
					<div class="col-sm-1 text-right">
						<button type="button" class="btn btn-warning radius-30 btn-sm" onclick="">Kembali</button>
					</div>
					<div class="col-sm-1 text-right">
						<button type="button" class="btn btn-success radius-30 btn-sm" onclick="window.print();">Cetak</button>
					</div>
				</div>
</form>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
				<table class="table mb-0" style="font-size: 15px;">
					<thead>
						<tr class="table-secondary">
							<td>No</td>
							<td>Tanggal</td>
							<td>Kode</td>
							<td>Keterangan</td>
							<td>Debet</td>
							<td>Kredit</td>
							<td>Saldo</td>
						</tr>
						<tr class="table-light">
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>Saldo Awal</td>
							<td class="text-danger">Rp. <?php echo number_format(total_kas_awal_usp(), 0, ', ', '.'); ?></td>
						</tr>
					</thead>
					<tbody>
<?php
$dari 	= $this->input->post('dari', TRUE);
$sampai = $this->input->post('sampai', TRUE);
if(empty($dari && $sampai))
{
	$hasil = $this->db->where('akun_id', $akun)->where('unit', '01')->get('app_transaksi');

	$this->db->select_sum('jumlah'); 
	$this->db->where('akun_id', $akun);
	$this->db->where('unit', '01');
	$this->db->where('jenis', 'debet');
	$tot_debet = $this->db->get('app_transaksi')->row();


	$this->db->select_sum('jumlah'); 
	$this->db->where('akun_id', $akun);
	$this->db->where('unit', '01');
	$this->db->where('jenis', 'kredit');
	$tot_kredit = $this->db->get('app_transaksi')->row();


}
else
{

	$this->db->select("*");
	$this->db->from('app_transaksi');
	$this->db->where('akun_id', $akun);
	$this->db->where('unit', '01');
	$this->db->where("DATE_FORMAT(tgl,'%Y-%m-%d') >='$dari'");
	$this->db->where("DATE_FORMAT(tgl,'%Y-%m-%d') <='$sampai'");
	$hasil = $this->db->get();

	$tot_debet  = $this->db->select_sum('jumlah')->where('jenis', 'debet')->where('akun_id', $akun)->where('unit', '01')->where("DATE_FORMAT(tgl,'%Y-%m-%d') >='$dari'")->where("DATE_FORMAT(tgl,'%Y-%m-%d') <='$sampai'")->get('app_transaksi')->row();
	$tot_kredit = $this->db->select_sum('jumlah')->where('jenis', 'kredit')->where('akun_id', $akun)->where('unit', '01')->where("DATE_FORMAT(tgl,'%Y-%m-%d') >='$dari'")->where("DATE_FORMAT(tgl,'%Y-%m-%d') <='$sampai'")->get('app_transaksi')->row();

}
	$no = 1;
	foreach($hasil->result() as $row) {


?>
						<tr>
							<td><?php echo $no++; ?>.</td>
							<td><?php echo $row->tgl; ?></td>
							<td><?php echo $row->kode; ?></td>
							<td class="text-wrap"><?php echo $row->keterangan; ?></td>
<?php if($row->jenis == 'debet') { ?>
							<td>Rp. <?php echo number_format($row->jumlah, 0, ', ', '.'); ?></td>
							<td>-</td>
							<td>-</td>
<?php } else { ?>
							<td>-</td>
							<td>Rp. <?php echo number_format($row->jumlah, 0, ', ', '.'); ?></td>
							<td>-</td>
<?php } ?>
						</tr>
<?php } ?>
					</tbody>
					<tfoot>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td class="text-right kandel">Total</td>
							<td class="text-primary kandel">Rp. <?php echo number_format((int)$tot_debet->jumlah, 0, ', ', '.'); ?></td>
							<td class="text-success kandel">Rp. <?php echo number_format((int)$tot_kredit->jumlah, 0, ', ', '.'); ?></td>
							<td class="text-warning kandel">Rp. <?php echo number_format(total_kas_awal_usp() + $tot_debet->jumlah - $tot_kredit->jumlah, 0, ', ', '.'); ?></td>

						</tr>	
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>