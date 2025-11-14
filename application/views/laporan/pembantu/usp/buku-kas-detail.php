
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered mb-0 tx-13">
									<thead class="tx-13">
										<tr class="text-center bg-primary">
											<th colspan="9" class="text-white"> BUKU KAS USP </th>
										</tr>
										<tr>
											<td colspan="7"></td>
											<td class="text-end"> Periode : </td>
											<td class="text-capitalize"><strong><?php echo bulan($bulan); ?> <?php echo $tahun; ?></strong></td>
										</tr>

									</thead>
							<tbody>
										<tr class="text-center bg-secondary">
											<td class="text-white"> No. </td>
											<td class="text-white"> Tanggal </td>
											<td class="text-white" colspan="3"> U r a i a n </td>
											<td class="text-white"> No. Bukti </td>
											<td class="text-white"> Debet </td>
											<td class="text-white"> Kredit </td>
											<td class="text-white"> Saldo </td>
										</tr>
										<tr class="tx-13">
											<td colspan="6"></td>
											<td></td>
											<td class="text-uppercase tx-13"> Saldo awal </td>
<?php
	$januari	= (get_saldo_awal('1', '01', $tahun - 1) + $this->transaksi->transaksi_debet_usp_bulanan('01')) - $this->transaksi->transaksi_kredit_usp_bulanan('01');
	$februari	= ($januari + $this->transaksi->transaksi_debet_usp_bulanan('02')) - $this->transaksi->transaksi_kredit_usp_bulanan('02');
	$maret		= ($februari + $this->transaksi->transaksi_debet_usp_bulanan('03')) - $this->transaksi->transaksi_kredit_usp_bulanan('03');
	$april		= ($maret + $this->transaksi->transaksi_debet_usp_bulanan('04')) - $this->transaksi->transaksi_kredit_usp_bulanan('04');
	$mei		= ($april + $this->transaksi->transaksi_debet_usp_bulanan('05')) - $this->transaksi->transaksi_kredit_usp_bulanan('05');
	$juni		= ($mei + $this->transaksi->transaksi_debet_usp_bulanan('06')) - $this->transaksi->transaksi_kredit_usp_bulanan('06');
	$juli		= ($juni + $this->transaksi->transaksi_debet_usp_bulanan('07')) - $this->transaksi->transaksi_kredit_usp_bulanan('07');
	$agustus	= ($juli + $this->transaksi->transaksi_debet_usp_bulanan('08')) - $this->transaksi->transaksi_kredit_usp_bulanan('08');
	$september	= ($agustus + $this->transaksi->transaksi_debet_usp_bulanan('09')) - $this->transaksi->transaksi_kredit_usp_bulanan('09');
	$oktober	= ($september + $this->transaksi->transaksi_debet_usp_bulanan('10')) - $this->transaksi->transaksi_kredit_usp_bulanan('10');
	$november	= ($oktober + $this->transaksi->transaksi_debet_usp_bulanan('11')) - $this->transaksi->transaksi_kredit_usp_bulanan('11');
	$desember	= ($november + $this->transaksi->transaksi_debet_usp_bulanan('12')) - $this->transaksi->transaksi_kredit_usp_bulanan('12');

if($bulan == '01')
{
	$saldo 		= get_saldo_awal('1', '01', $tahun - 1);
}
elseif($bulan == '02')
{
	$saldo		= $januari;
} 
elseif($bulan == '03')
{
	$saldo		= $februari;
} 
elseif($bulan == '04')
{
	$saldo		= $maret;
} 
elseif($bulan == '05')
{
	$saldo		= $april;
} 
elseif($bulan == '06')
{
	$saldo 		= $mei;
} 
elseif($bulan == '07')
{
	$saldo 		= $juni;
} 
elseif($bulan == '08')
{
	$saldo 		= $juli;
} 
elseif($bulan == '09')
{
	$saldo 		= $agustus;
} 
elseif($bulan == '10')
{
	$saldo 		= $september;
} 
elseif($bulan == '11')
{
	$saldo 		= $oktober;
} 
else
{
	$saldo 		= $november;
} 
?>
											<td>Rp. <?php echo number_format($saldo, 0, ', ', '.'); ?></td>
										</tr>
								<tr>
									<td></td>
									<td></td>
									<td class="tx-bold text-start" colspan="3">Rekapitulasi Pemotongan Gaji</td>
									<td></td>
									<td>Rp. </td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td colspan="3">Angsuran / Pelunasan Pinjaman</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td colspan="3">Pembayaran Per Kas</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td colspan="3">Jasa Pelunasan</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td colspan="3">Jasa Per kas</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td class="tx-bold text-danger" colspan="3">Pinjaman Anggota</td>
									<td></td>
									<td></td>
									<td>Rp. <?php echo number_format((int)total_pinjaman_bulanan($bulan), 0, ', ', '.');?></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td class="tx-bold text-danger" colspan="3">Piutang Unit Usaha Induk Koperasi</td>
									<td></td>
									<td></td>
									<td>Rp. <?php echo number_format((int)'0', 0, ', ', '.');?></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td class="tx-bold text-danger" colspan="3">Piutang Unit Usaha SR Baru</td>
									<td></td>
									<td></td>
									<td>Rp. <?php echo number_format((int)'0', 0, ', ', '.');?></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td colspan="3">Simpanan Lain - lain / SWP</td>
									<td></td>

									<td>Rp. <?php $swp = $this->db->select_sum('jumlah')->where('jns_simp', '4')->where('MONTH(tgl)', $bulan)->where('YEAR(tgl)', $tahun)->get('app_simpanan')->row(); echo number_format((int)$swp->jumlah, 0, ', ', '.');?></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td colspan="3">Resiko Kredit [ RSK ]</td>
									<td></td>
									<td>Rp. <?php $rsk = $this->db->select_sum('rsk')->where('MONTH(tgl)', $bulan)->where('YEAR(tgl)', $tahun)->get('app_pinjaman')->row(); echo number_format((int)$rsk->rsk, 0, ', ', '.');?></td>
									<td></td>
									<td></td>
								</tr>
<?php foreach($hasil->result() as $row) { ?>
								<tr>
									<td></td>
									<td></td>
									<td colspan="3"><?php echo $row->keterangan; ?></td>
									<td class="text-primary"><?php echo $row->kode; ?></td>
<?php if($row->jenis == 'debet') { ?>
									<td>Rp. <?php echo number_format((int)$row->jumlah, 0, ', ', '.');?></td>
									<td></td>
<?php } else { ?>
									<td></td>
									<td>Rp. <?php echo number_format($row->jumlah, 0, ', ', '.');?></td>
<?php } ?>

									<td></td>
								</tr>
<?php } ?>

								<tr>
									<td></td>
									<td></td>
									<td class="kandel" colspan="3">Simpanan Sukarela [ Debet ]</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
<?php $sukarela = $this->db->where('jns_simp', '3')->where('MONTH(tgl)', $bulan)->get('app_simpanan'); $no = 1; foreach($sukarela->result() as $row) { ?>
								<tr>
									<td></td>
									<td></td>
									<td><?php echo $no++; ?>. <?php echo get_anggota($row->user_id)->nama; ?></td>
									<td colspan="2">Rp. <?php echo number_format((int)$row->jumlah, 0, ', ', '.');?></td>
									<td></td>
									<td></td>
								</tr>
<?php } ?>
								<tr>
									<td></td>
									<td></td>
									<td class="kandel" colspan="3">Jumlah</td>
									<td></td>
									<td>Rp. <?php $suka = $this->db->select_sum('jumlah')->where('jns_simp', '3')->where('MONTH(tgl)', $bulan)->get('app_simpanan')->row(); echo number_format((int)$suka->jumlah, 0, ', ', '.');?></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td class="kandel" colspan="3">Modal Tidak Tetap [MTT]</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>	

<?php $mtt = $this->db->where('MONTH(tgl)', $bulan)->where('YEAR(tgl)', $tahun)->where('jns_simp', '2')->or_where('jns_simp', '4')->where('saldo_awal', '0')->get('app_simpanan'); foreach($mtt->result() as $row) { ?>
								<tr>
									<td></td>
									<td></td>
									<td colspan="3"><?php echo get_jenis_simpanan($row->jns_simp)->nama.' '.get_anggota($row->user_id)->nama; ?></td>
									<td></td>
									<td>Rp. <?php echo number_format((int)$row->jumlah, 0, ', ', '.');?></td>
									<td></td>
									<td></td>
								</tr>
<?php } ?>
<?php
$jmtt = $this->db->select_sum('jumlah')->where('MONTH(tgl)', $bulan)->where('YEAR(tgl)', $tahun)->where('jns_simp', '2')->or_where('jns_simp', '4')->where('saldo_awal', '0')->get('app_simpanan')->row();
?>
								<tr>
									<td></td>
									<td></td>
									<td class="kandel" colspan="3">Jumlah</td>
									<td></td>
									<td>Rp. <?php echo number_format((int)$jmtt->jumlah, 0, ', ', '.'); ?></td>
									<td></td>
									<td></td>
								</tr>
<?php if($bulan == '01') { ?>
								<tr>
									<td></td>
									<td></td>
									<td class="kandel" colspan="3">Biaya - biaya RAT</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>	

<?php $rat = $this->db->where('akun_id', '15')->where('MONTH(tgl)', $bulan)->where('YEAR(tgl)', $tahun)->get('app_transaksi'); $no = 1; foreach($rat->result() as $row) { ?>
								<tr>
									<td></td>
									<td></td>
									<td colspan="3"><?php echo $no++; ?>. <?php echo $row->keterangan; ?></td>
									<td></td>
									<td>Rp. <?php echo number_format((int)$row->jumlah, 0, ', ', '.');?></td>
									<td></td>
									<td></td>
								</tr>
<?php } ?>
								<tr>
									<td></td>
									<td></td>
									<td class="kandel" colspan="3">Jumlah</td>
									<td></td>
									<td>Rp. <?php $brat = $this->db->select_sum('jumlah')->where('akun_id', '15')->where('MONTH(tgl)', $bulan)->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row(); echo number_format((int)$brat->jumlah, 0, ', ', '.');?></td>
									<td></td>
									<td></td>
								</tr>
<?php } ?>
								<tr>
									<td></td>
									<td></td>
									<td class="text-red" colspan="3">SHU dibagikan ke anggota</td>
									<td></td>
									<td></td>
									<td>Rp. <?php echo number_format((int)'0', 0, ', ', '.');?></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td class="text-red" colspan="3">Honor Pengurus & Karyawan </td>
									<td></td>
									<td></td>
									<td>Rp. <?php echo number_format((int)'0', 0, ', ', '.');?></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td class="text-red" colspan="3">Disetorkan ke Unit Induk Koperasi </td>
									<td></td>
									<td></td>
									<td>Rp. <?php echo number_format((int)'0', 0, ', ', '.');?></td>
									<td></td>
								</tr>

								<tr>
									<td></td>
									<td></td>
									<td class="text-red" colspan="3">Simpanan Pokok ( Kredit ) </td>
									<td></td>
									<td></td>
									<td>Rp. <?php echo number_format((int)'0', 0, ', ', '.');?></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td class="text-red" colspan="3"> Simpanan Wajib ( Kredit)  </td>
									<td></td>
									<td></td>
									<td>Rp. <?php echo number_format((int)'0', 0, ', ', '.');?></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td class="text-red" colspan="3"> Simpanan Lain-lain / SWP ( Kredit )  </td>
									<td></td>
									<td></td>
									<td>Rp. <?php echo number_format((int)'0', 0, ', ', '.');?></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td class="text-red" colspan="3"> Simpanan Sukarela ( Kredit ) </td>
									<td></td>
									<td></td>
									<td>Rp. <?php echo number_format((int)'0', 0, ', ', '.');?></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td class="text-red" colspan="3"> Resiko Kredit ( Kredit )</td>
									<td></td>
									<td></td>
									<td>Rp. <?php echo number_format((int)'0', 0, ', ', '.');?></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td class="text-primary" colspan="3"> Pengembalian piutang Unit Induk Koperasi </td>
									<td></td>
									<td></td>
									<td>Rp. <?php echo number_format((int)'0', 0, ', ', '.');?></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td class="text-primary" colspan="3"> Pengembalian piutang Unit SR Baru </td>
									<td></td>
									<td></td>
									<td>Rp. <?php echo number_format((int)'0', 0, ', ', '.');?></td>
									<td></td>
								</tr>
								
								<tr>
									<td></td>
									<td></td>
									<td class="kandel" colspan="3">Beban Kelancaran Usaha</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>	


<?php $bku = $this->db->where('akun_id', '18')->where('MONTH(tgl)', $bulan)->where('YEAR(tgl)', $tahun)->get('app_transaksi'); $no = 1; foreach($bku->result() as $row) { ?>
								<tr>
									<td></td>
									<td></td>
									<td colspan="3"><?php echo $no++; ?>. <?php echo $row->keterangan; ?></td>
									<td></td>
									<td>Rp. <?php echo number_format((int)$row->jumlah, 0, ', ', '.');?></td>
									<td></td>
									<td></td>
								</tr>
<?php } ?>
								<tr>
									<td></td>
									<td></td>
									<td class="kandel" colspan="3">Jumlah</td>
									<td></td>
									<td></td>
									<td>Rp. <?php $total = $this->db->select_sum('jumlah')->where('akun_id', '18')->where('MONTH(tgl)', $bulan)->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row(); echo number_format((int)$total->jumlah, 0, ', ', '.');?></td>
									<td></td>
								</tr>



							</tbody>
							<tfoot>
								<tr>
									<td></td>
									<td></td>
									<td class="kandel text-end" colspan="4">Total</td>
									<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan($bulan), 0, ', ', '.');?></td>
									<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan($bulan), 0, ', ', '.');?></td>
									<td class="kandel text-end">Rp. <?php echo number_format($saldo + $this->transaksi->transaksi_debet_usp_bulanan($bulan) - $this->transaksi->transaksi_kredit_usp_bulanan($bulan), 0, ', ', '.');?></td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
