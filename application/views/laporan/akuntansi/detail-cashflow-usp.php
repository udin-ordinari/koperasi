<div class="main-content side-content pt-0">
	<div class="main-container container-fluid">
		<div class="inner-body">
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-24 mg-b-5"><?php echo $page; ?></h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#"><?php echo $title; ?></li>
					</ol>
				</div>
				<div class="d-flex">
					<div class="justify-content-center">
						<a href="javascript:history.back();" class="btn btn-primary"><i class="fal fa-circle-left fa-fw fa-lg mr-2"></i>Kembali</a>
						<a href="<?php echo base_url('laporan/akuntansi/detail_cetak/'.$bln); ?>" target="_blank" class="btn btn-danger"><i class="fal fa-print fa-fw fa-lg mr-2"></i>Cetak</a>
					</div>
				</div>
			</div>
			<div class="row row-sm">
				<div class="col-lg-12">
					<div class="card custom-card">
						<div class="card-body">
							<div>
								<h6 class="main-content-label mb-3 text-end">Bulan : <?php echo bulan($bln); ?> <?php echo $tahun; ?></h6>
							</div>
							<div class="table-responsive">
								<table class="table text-nowrap text-md-nowrap border mg-b-0 tx-18">
									<thead class="table-dark text-center">
										<tr>
											<th class="text-white">NO</th>
											<th class="text-white">Tanggal</th>
											<th class="text-white">No Bukti</th>
											<th class="text-white">Keterangan</th>
											<th class="text-white">Debet</th>
											<th class="text-white">Kredit</th>
											<th class="text-white">Total</th>
										</tr>
									</thead>
									<thead class="table-info">
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td class="text-end" colspan="2"><b>Saldo Awal :</b>
											<?php
												$januari	= (get_saldo_awal('1', '01', $tahun - 1) + $this->transaksi->transaksi_debet_usp_bulanan('01', $tahun)) - $this->transaksi->transaksi_kredit_usp_bulanan('01', $tahun);
												$februari	= ($januari + $this->transaksi->transaksi_debet_usp_bulanan('02', $tahun)) - $this->transaksi->transaksi_kredit_usp_bulanan('02');
												$maret		= ($februari + $this->transaksi->transaksi_debet_usp_bulanan('03', $tahun)) - $this->transaksi->transaksi_kredit_usp_bulanan('03');
												$april		= ($maret + $this->transaksi->transaksi_debet_usp_bulanan('04', $tahun)) - $this->transaksi->transaksi_kredit_usp_bulanan('04');
												$mei		= ($april + $this->transaksi->transaksi_debet_usp_bulanan('05', $tahun)) - $this->transaksi->transaksi_kredit_usp_bulanan('05');
												$juni		= ($mei + $this->transaksi->transaksi_debet_usp_bulanan('06', $tahun)) - $this->transaksi->transaksi_kredit_usp_bulanan('06');
												$juli		= ($juni + $this->transaksi->transaksi_debet_usp_bulanan('07', $tahun)) - $this->transaksi->transaksi_kredit_usp_bulanan('07');
												$agustus	= ($juli + $this->transaksi->transaksi_debet_usp_bulanan('08', $tahun)) - $this->transaksi->transaksi_kredit_usp_bulanan('08');
												$september	= ($agustus + $this->transaksi->transaksi_debet_usp_bulanan('09', $tahun)) - $this->transaksi->transaksi_kredit_usp_bulanan('09');
												$oktober	= ($september + $this->transaksi->transaksi_debet_usp_bulanan('10', $tahun)) - $this->transaksi->transaksi_kredit_usp_bulanan('10');
												$november	= ($oktober + $this->transaksi->transaksi_debet_usp_bulanan('11', $tahun)) - $this->transaksi->transaksi_kredit_usp_bulanan('11');
												$desember	= ($november + $this->transaksi->transaksi_debet_usp_bulanan('12', $tahun)) - $this->transaksi->transaksi_kredit_usp_bulanan('12');

												if($bln == '01')
												{
													$saldo = get_saldo_awal('1', '01', $tahun - 1);
												}
												elseif($bln == '02')
												{
													$saldo		= $januari;
												} 
												elseif($bln == '03')
												{
													$saldo		= $februari;
												} 
												elseif($bln == '04')
												{
													$saldo		= $maret;
												} 
												elseif($bln == '05')
												{
													$saldo		= $april;
												} 
												elseif($bln == '06')
												{
													$saldo 		= $mei;
												} 
												elseif($bln == '07')
												{
													$saldo 		= $juni;
												} 
												elseif($bln == '08')
												{
													$saldo 		= $juli;
												} 
												elseif($bln == '09')
												{
													$saldo 		= $agustus;
												} 
												elseif($bln == '10')
												{
												$saldo 		= $september;
												} 
												elseif($bln == '11')
												{
													$saldo 		= $oktober;
												} 
												else
												{
													$saldo 		= $november;
												} 
												$no 	= 1;
											?>	
											</td>
											<td class="text-end text-capitalize"><b>Rp. <?php echo number_format((int)$saldo, 0, ', ', '.'); ?></b></td>
										</tr>
									</thead>
									<tbody class="tx-14">			
	
										<tr>
											<td class="kandel text-center" colspan="7">Transaksi</td>
										</tr>
						 				<?php
											$umum 	= $this->db->where('unit', '01')->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->get('app_transaksi');
											foreach ($umum->result() as $rowes)
											{
												$debet 	= $this->db->select("SUM(jumlah) as total")->where('unit', '01')->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->where('jenis', 'debet')->get('app_transaksi')->row();
												$kredit = $this->db->select("SUM(jumlah) as total")->where('unit', '01')->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->where('jenis', 'kredit')->get('app_transaksi')->row();
										?>
										<tr>
											<td><?php echo $no++; ?> .</td>
											<td><?php echo date("d-m-Y", strtotime($rowes->tgl)); ?></td>
											<td class="text-primary kandel tx-14"><?php echo $rowes->kode; ?></td>
											<td><?php echo $rowes->keterangan; ?></td>
											<?php if($rowes->jenis == 'debet') { ?>
											<td class="text-right">Rp. <?php echo number_format($rowes->jumlah, 0,',','.'); ?></td>
											<td class="text-right"></td>
											<?php } else { ?>
											<td class="text-right"></td>
											<td class="text-right">Rp. <?php echo number_format($rowes->jumlah, 0,',','.'); ?></td>
											<?php } ?>
											<td></td>
											<td></td>
										</tr>
										<?php } if($bln == '01') { ?>
										<tr>
											<td><?php echo $no++; ?> .</td>
											<td></td>
											<td></td>
											<td>SHU Ke Anggota</td>
											<td class="text-right"></td>
											<td class="text-right">Rp. <?php echo number_format((int)shu_dibagi_usp(), 0,',','.'); ?></td>
											<td></td>
										</tr>
										<tr>
											<td><?php echo $no++; ?> .</td>
											<td></td>
											<td></td>
											<td>Honor Pengurus Dan Karyawan</td>
											<td class="text-right"></td>
											<td class="text-right">Rp. <?php echo number_format(modal_disetor(), 0,',','.'); ?></td>
											<td></td>
										</tr>
										<tr>
											<td><?php echo $no++; ?> .</td>
											<td></td>
											<td></td>
											<td>Modal Disetor Ke Induk Koperasi</td>
											<td class="text-right"></td>
											<td class="text-right">Rp. <?php echo number_format(modal_disetor(), 0,',','.'); ?></td>
											<td></td>
										</tr>
										<tr>
											<td><?php echo $no++; ?> .</td>
											<td></td>
											<td></td>
											<td>Dana Pengurus Dan Karyawan</td>
											<td class="text-right"></td>
											<td class="text-right">Rp. <?php echo number_format(dana_pengurus_karyawan(), 0,',','.'); ?></td>
											<td></td>
										</tr>
										<tr>
											<td><?php echo $no++; ?> .</td>
											<td></td>
											<td></td>
											<td>Cadangan Modal</td>
											<td class="text-right">Rp. <?php echo number_format(cadangan_modal(), 0,',','.'); ?></td>
											<td class="text-right"></td>
											<td></td>
										</tr>
							<tr>
								<td><?php echo $no++; ?> .</td>
								<td></td>
								<td></td>
								<td>Dana Pendidikan</td>
								<td class="text-right">Rp. <?php echo number_format(dana_pendidikan(), 0,',','.'); ?></td>
								<td class="text-right"></td>
								<td></td>
							</tr>
							<tr>
								<td><?php echo $no++; ?> .</td>
								<td></td>
								<td></td>
								<td>Dana Sosial</td>
								<td class="text-right">Rp. <?php echo number_format(dana_sosial(), 0,',','.'); ?></td>
								<td class="text-right"></td>
								<td></td>
							</tr>
							<tr>
								<td><?php echo $no++; ?> .</td>
								<td></td>
								<td></td>
								<td>Dana Pengembangan Daerah Kerja</td>
								<td class="text-right">Rp. <?php echo number_format(dana_pengembangan_daerah_kerja(), 0,',','.'); ?></td>
								<td class="text-right"></td>
								<td></td>
							</tr>
<?php } ?>

							<tr>
								<td class="kandel text-center" colspan="7">Pinjaman Anggota</td>
							</tr>
							<?php
								$pinj  = $this->db->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->where('status', 'disetujui')->get('app_pinjaman');
								foreach ($pinj->result() as $ro)
								{ 
									$totpinjaman = $this->db->select("SUM(total) as total")->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->where('status', 'disetujui')->get('app_pinjaman')->row();
							?>	

							<tr>
								<td><?php echo $no++; ?> .</td>
								<td><?php echo tgl_jabar($ro->tgl); ?></td>
								<td class="kandel text-primary fs-7"><?php echo $ro->kode; ?></td>
								<td>Pinjaman <?php echo get_jenis_pinjaman($ro->jns_pinj)->nama; ?> <?php echo get_anggota($ro->user_id)->nama; ?> (<?php echo $ro->tempo; ?> X)</td>
								<td class="text-right"></td>
								<td class="text-right">Rp. <?php echo number_format($ro->total, 0,',','.'); ?></td>
								<td class="text-right"></td>
							</tr>	

							<?php } ?>
	
							<tr>
								<td class="kandel text-center" colspan="7">Pendapatan SWP</td>
							</tr>
							<?php 
								$untungswp  = $this->db->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->group_start()->where('status', 'disetujui')->or_where('status', 'lunas')->group_end()->get('app_pinjaman');
								foreach ($untungswp->result() as $rode)
								{ 
									$totswp = $this->db->select("SUM(swp) as total")->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->group_start()->where('status', 'disetujui')->or_where('status', 'lunas')->group_end()->get('app_pinjaman')->row();
							?>	
							<tr>
								<td><?php echo $no++; ?> .</td>
								<td><?php echo tgl_jabar($rode->tgl); ?></td>
								<td class="kandel text-primary fs-7"><?php echo $rode->kode; ?></td>
								<td><?php echo 'SWP '; ?><?php echo $rode->kode; ?> <?php echo get_anggota($rode->user_id)->nama; ?></td>
								<td class="text-right">Rp. <?php echo number_format($rode->swp, 0,',','.'); ?></td>
								<td class="text-right"></td>
								<td class="text-right"></td>
							</tr>
							<?php } ?>
							<tr>
								<td class="kandel text-center" colspan="7">Pendapatan RSK</td>
							</tr>
							<?php 
								$untungrsk  = $this->db->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->group_start()->where('status', 'disetujui')->or_where('status', 'lunas')->group_end()->get('app_pinjaman');
								foreach ($untungrsk->result() as $roden)
								{ 
									$totrsk = $this->db->select("SUM(rsk) as total")->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->group_start()->where('status', 'disetujui')->or_where('status', 'lunas')->group_end()->get('app_pinjaman')->row();
							?>	
							<tr>
								<td><?php echo $no++; ?> .</td>
								<td><?php echo tgl_jabar($roden->tgl); ?></td>
								<td class="kandel text-primary fs-7"><?php echo $roden->kode; ?></td>
								<td><?php echo 'RSK '; ?><?php echo $roden->kode; ?> <?php echo get_anggota($roden->user_id)->nama; ?></td>
								<td class="text-right">Rp. <?php echo number_format($roden->rsk, 0,',','.'); ?></td>
								<td class="text-right"></td>
								<td class="text-right"></td>
							</tr>
							<?php } ?>
							<tr>
								<td class="kandel text-center" colspan="7">Simpanan Anggota</td>
							</tr>
						 	<?php
								$simp  = $this->db->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->where('saldo_awal', '0')->where('is_deleted', '0')->get('app_simpanan');
				
								foreach ($simp->result() as $rowa)
								{ 	
									$totpokok = $this->db->select_sum('jumlah', 'total')->where('jns_simp', '1')->where('YEAR(tgl)', $tahun)->where('MONTH(tgl)', $bln)->where('is_deleted', '0')->get('app_simpanan')->row();								
									$totwajib = $this->db->select_sum('jumlah', 'total')->where('jns_simp', '2')->where('YEAR(tgl)', $tahun)->where('MONTH(tgl)', $bln)->where('is_deleted', '0')->get('app_simpanan')->row();
									$totsukar = $this->db->select_sum('jumlah', 'total')->where('jns_simp', '3')->where('YEAR(tgl)', $tahun)->where('MONTH(tgl)', $bln)->where('is_deleted', '0')->get('app_simpanan')->row();
									$totsimpanan = $totpokok->total + $totwajib->total + $totsukar->total;
							?>
							<tr>
								<td><?php echo $no++; ?> .</td>
								<td><?php echo tgl_jabar($rowa->tgl); ?></td>
								<td class="kandel text-primary tx-14"><?php echo $rowa->kode; ?></td>
								<td><?php echo get_jenis_simpanan($rowa->jns_simp)->nama.' &nbsp;-&nbsp; '.get_anggota($rowa->user_id)->nama; ?></td>
								<td class="text-right">Rp. <?php echo number_format($rowa->jumlah, 0,',','.'); ?></td>
								<td class="text-right"></td>
								<td class="text-right"></td>
							</tr>
							<?php } ?>
							<tr>
								<td class="kandel text-center" colspan="7">Angsuran</td>
							</tr>
							<?php								
								$poto  = $this->db->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->where('jenis', 'cicilan')->get('app_angsuran');
								$pokk  = $this->db->select_sum('pokok', 'total')->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->where('jenis', 'cicilan')->get('app_angsuran')->row();
								$pokk  = $this->db->select_sum('bunga', 'total')->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->where('jenis', 'cicilan')->get('app_angsuran')->row();
								foreach($poto->result() as $gaji) { ?>
							<tr>
								<td><?php echo $no++; ?> .</td>
								<td><?php echo tgl_jabar($gaji->tgl); ?></td>
								<td class="kandel text-primary fs-7"><?php echo $gaji->kode; ?></td>
							<?php if($gaji->id_pinj == '0') { $pinj = 'Saldo Awal Pinjaman'; } else { $pinj = $gaji->id_pinj; } ?>
								<td><?php echo $pinj; ?> [ <?php echo $gaji->ke; ?> | <?php echo $gaji->dari; ?> x ] <b><?php echo get_anggota($gaji->user_id)->nama; ?></b></td>
								<td class="text-right">Rp. <?php echo number_format($gaji->pokok, 0,',','.'); ?></td>
								<td class="text-right"></td>
								<td class="text-right"></td>
							</tr>
							<?php } ?>
							<tr>
								<td class="kandel text-center" colspan="7">Pelunasan / Perkas</td>
							</tr>	
							<?php 
								$pekas     = $this->db->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->where('jenis !=', 'cicilan')->get('app_angsuran');
								$jmlpekas  = $this->db->select_sum('pokok', 'total')->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->where('jenis !=', 'cicilan')->get('app_angsuran')->row();
								foreach ($pekas->result() as $kas)
								{ 
									
							?>	
							<tr>
								<td><?php echo $no++; ?> .</td>
								<td><?php echo date("d-m-Y", strtotime($kas->tgl)); ?></td>
								<td class="kandel text-primary fs-7"><?php echo $kas->kode; ?></td>
								<td><?php echo $kas->keterangan; ?></td>
								<td class="text-right">Rp. <?php echo number_format($kas->pokok + $kas->bunga, 0,',','.'); ?></td>
								<td class="text-right"></td>
								<td class="text-right"></td>
							</tr>
							<?php } ?>
							<tr>
								<td class="kandel text-center" colspan="7">Tabungan</td>
							</tr>
							<?php 
								$pena  = $this->db->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->get('app_penarikan');
								foreach ($pena->result() as $rod)
								{ 
									$totpenarikan = $this->db->select_sum('jumlah', 'total')->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->get('app_penarikan')->row();
							?>	
							<tr>
								<td><?php echo $no++; ?> .</td>
								<td><?php echo date("d-m-Y", strtotime($rod->tgl)); ?></td>
								<td class="text-primary kandel"><?php echo $rod->kode; ?></td>
								<td><?php echo 'Tarikan '; ?> <?php echo get_anggota($rod->user_id)->nama; ?> (<?php echo $rod->keterangan; ?>)</td>
								<td></td>
								<td class="text-right">Rp. <?php echo number_format($rod->jumlah, 0,',','.'); ?></td>
								<td></td>
							</tr>
							<?php } ?>
							<?php 
								$tutup  = $this->db->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->get('app_penutupan');
								foreach ($tutup->result() as $rod)
								{ 
									$tottutup = $this->db->select_sum('jumlah', 'total')->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->get('app_penutupan')->row();
							?>	
							<tr>
								<td><?php echo $no++; ?> .</td>
								<td><?php echo date("d-m-Y", strtotime($rod->tgl)); ?></td>
								<td class="text-primary kandel"><?php echo $rod->kode; ?></td>
								<td><?php echo 'Penutupan Simpanan '; ?> <?php echo get_anggota($rod->user_id)->nama; ?> (<?php echo $rod->keterangan; ?>)</td>
								<td></td>
								<td class="text-right">Rp. <?php echo number_format($rod->jumlah, 0,',','.'); ?></td>
								<td></td>
							</tr>
							<?php } ?>	
						</tbody>
						<tfoot>
<?php
if(empty($debet->total))
{
	$masuk = '0';
}
else
{
	$masuk = $debet->total;
}
if(empty($kredit->total))
{
	$keluar = '0';
}
else
{
	$keluar = $kredit->total;
}
if(empty($totsimpanan))
{
	$sim = '0';
}
else
{
	$sim = $totsimpanan;
}
if(empty($totpinjaman->total))
{
	$pinj = '0';
}
else
{
	$pinj = $totpinjaman->total;
}
if(empty($totangsuran->total))
{
	$angs = '0';
}
else
{
	$angs = $totangsuran->total;
}
if(empty($totswp->total))
{
	$swp = '0';
}
else
{
	$swp = $totswp->total;
}
if(empty($totrsk->total))
{
	$rsk = '0';
}
else
{
	$rsk = $totrsk->total;
}
if(empty($totpenarikan->total))
{
	$tarik = '0';
}
else
{
	$tarik = $totpenarikan->total;
}
if(empty($tottutup->total))
{
	$penutupan = '0';
}
else
{
	$penutupan = $tottutup->total;
}
$totkok = $this->db->select_sum('pokok', 'total')->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->get('app_angsuran')->row();


if($bln == '01')
{ 
	$melbet = $masuk + $sim + $swp + $rsk + $totkok->total;
	$medal  = $keluar + $pinj + $tarik + $penutupan;
}
else  
{
	$melbet = $masuk + $sim + $angs + $swp + $rsk + $jmlpekas->total + $totkok->total;
	$medal  = $keluar + $pinj + $tarik + $penutupan;
}
$nongol = ($melbet + $saldo) - $medal;
?>
							<tr>
								<td class="kandel text-end" colspan="4">Jumlah : </td>
								<td class="text-right kandel">Rp. <?php echo number_format((int)$melbet, 0,',','.'); ?></td>
								<td class="text-right kandel">Rp. <?php echo number_format($medal, 0,',','.'); ?></td>
								<td class="text-right kandel">Rp. <?php echo number_format($nongol, 0,',','.'); ?></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

