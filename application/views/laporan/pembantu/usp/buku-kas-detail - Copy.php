
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered mb-0 fs-7">
							<thead class="table-info">
								<tr class="text-center">
									<th colspan="8"> BUKU KAS USP </th>
								</tr>
							</thead>
							<tbody>

								<tr>
									<td colspan="4"></td>
									<td class="text-right">Periode :</td>
									<td><strong><?php echo bulan($bulan); ?> <?php echo $tahun; ?></strong></td>
								</tr>

								<tr class="kandel text-center table-secondary">
									<td>NO.</td>
									<td>NO BUKTI</td>
									<td>URAIAN</td>
									<td>DEBET</td>
									<td>KREDIT</td>
									<td>SALDO</td>
								</tr>


								<tr>
									<td></td>
									<td></td>
									<td class="kandel text-capitalize text-right" colspan="3">Saldo awal</td>
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


									<td class="kandel text-end">Rp. <?php echo number_format($saldo, 0, ', ', '.'); ?></td>
								<tr>
									<td></td>
									<td></td>
									<td>Angsuran / Pelunasan Pinjaman</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td>Pembayaran Per Kas</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td>Jasa Pelunasan</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td>Jasa Per kas</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								</tr>
<?php $no = 1; foreach($hasil->result() as $row) { ?>
								<tr>
									<td><?php echo $no++; ?>.</td>
									<td class="kandel text-primary"><?php echo $row->kode; ?></td>
									<td class="kandel"><?php echo $row->keterangan; ?></td>
<?php if($row->jenis == 'debet') { ?>
									<td>Rp. <?php echo number_format($this->transaksi->transaksi_debet_usp_bulanan($bulan), 0, ', ', '.');?></td>
									<td></td>
<?php } else { ?>
									<td></td>
									<td>Rp. <?php echo number_format($row->jumlah, 0, ', ', '.');?></td>
<?php } ?>

									<td></td>
								</tr>
<?php } ?>

							</tbody>
							<tfoot>
								<td></td>
								<td></td>
								<td>Total</td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_debet_usp_bulanan($bulan), 0, ', ', '.');?></td>
								<td>Rp. <?php echo number_format((int)$this->transaksi->transaksi_kredit_usp_bulanan($bulan), 0, ', ', '.');?></td>

								<td class="kandel text-end">Rp. <?php echo number_format($saldo + $this->transaksi->transaksi_debet_usp_bulanan($bulan) - $this->transaksi->transaksi_kredit_usp_bulanan($bulan), 0, ', ', '.');?></td>

							</tfoot>
						</table>
					</div>
				</div>
			</div>
