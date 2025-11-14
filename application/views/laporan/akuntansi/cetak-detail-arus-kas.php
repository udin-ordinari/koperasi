<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cetak Form Untuk Pencairan Dana</title>
	<meta name="app_token" content="<?php echo session('app_token'); ?>">
	<meta name="keywords" content="<?php echo get_setting('meta_keywords'); ?>">
	<meta name="description" content="<?php echo get_setting('meta_description'); ?>">
	<link rel="shortcut icon" href="<?php echo site_url('assets/img/'.get_setting('favicon'));?>" type="image/x-icon">
	<!--plugins-->
	<?php echo link_tag('assets/plugins/simplebar/css/simplebar.css');?>
	<?php echo link_tag('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css');?>
	<?php echo link_tag('assets/plugins/metismenu/css/metisMenu.min.css');?>
	<?php echo link_tag('assets/plugins/datatable/css/dataTables.bootstrap5.min.css');?>
	<!--<?php echo link_tag('assets/css/pace.min.css');?>-->
	<!--<script src="<?php echo base_url();?>assets/js/pace.min.js"></script>-->

	<?php echo link_tag('assets/plugins/bootstrap/css/bootstrap.min.css');?>
	<?php echo link_tag('assets/plugins/bootstrap/css/bootstrap-extended.css');?>
	<!-- Theme Style CSS -->
	<?php echo link_tag('assets/css/app.css');?>
	<?php echo link_tag('assets/css/icons.css');?>
	<?php echo link_tag('assets/css/animate.min.css');?>
	<?php echo link_tag('assets/plugins/fontawesome/css/all.css');?>
	<?php echo link_tag('assets/plugins/notifications/css/lobibox.min.css');?>
	<?php echo link_tag('assets/plugins/fancybox/css/jquery.fancybox.min.css');?>
	<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>

	<script type="text/javascript">
		const BASE_URL = '<?php echo base_url();?>';
	</script>
</head>

<body>
<div class="wrapper">
	<div class="header">
		<div class="page-content">
		<h6 class="mb-0 text-uppercase text-center bolder" style="line-height: 1.5rem;">ARUS KAS ( USP )<br>Bulan <?php echo bulan($bln); ?> <?php echo $tahun; ?></h6>
		<hr/>
		<div class="card">
				<div class="card-body row">

					<table class="table table-bordered mb-0 fs-7">
						<thead class="table-secondary text-center">
							<tr>
								<th scope="col" style="width: 3%;">NO</th>
								<th scope="col" style="width: 5%;">Tanggal</th>
								<th scope="col" style="width: 8%;">No Bukti</th>
								<th scope="col" style="width: 43%;">Keterangan</th>
								<th scope="col" style="width: 13%;">Debet</th>
								<th scope="col" style="width: 13%;">Kredit</th>
								<th scope="col" style="width: 15%;">Total</th>
							</tr>
							<tr class="table-info">
								<td></td>
								<td></td>
								<td></td>
								<td class="kandel" style="text-align:left">Saldo Awal <?php echo bulan($bln); ?> <?php echo $tahun; ?></td>
								<td colspan="2">
<?php
	$januari	= ($this->transaksi->transaksi_debet_usp_bulanan('01') + kas_awal_periode_usp(tahun_buku()->periode)) - $this->transaksi->transaksi_kredit_usp_bulanan('01');
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

if($bln == '01')
{
	$saldo = kas_awal_periode_usp(tahun_buku()->periode);
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
?>	
								</td>
								<td class="kandel">Rp. <?php echo number_format($saldo, 0, ', ', '.'); ?></td>
							</tr>
						</thead>
						<tbody>			
							<tr>
								<td class="kandel text-center" colspan="6">Transaksi Umum</td>
							</tr>
						 	<?php
							$no 	= 1;
							$trans 	= $this->db->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->get('app_transaksi');
							foreach ($trans->result() as $row) {
								$debet 	= $this->db->select("SUM(jumlah) as total")->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->where('jenis', 'debet')->get('app_transaksi')->row();
								$kredit = $this->db->select("SUM(jumlah) as total")->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->where('jenis', 'kredit')->get('app_transaksi')->row();
							?>	
							<tr>
								<td><?php echo $no++; ?> .</td>
								<td><?php echo date("d-m-Y", strtotime($row->tgl)); ?></td>
								<td class="kandel text-primary fs-7"><?php echo $row->kode; ?></td>
								<td style="word-wrap: normal;"><?php echo $row->keterangan; ?></td>
								<?php if($row->jenis == 'debet') { ?>

									<td class="text-right">Rp. <?php echo number_format($row->jumlah, 0,',','.'); ?></td>
									<td class="text-right"></td>
								<?php } else { ?>

									<td class="text-right"></td>
									<td class="text-right">Rp. <?php echo number_format($row->jumlah, 0,',','.'); ?></td>
								<?php } ?>
								<td></td>
							</tr>	
							<?php } ?>
							<tr>
								<td class="kandel text-center" colspan="6">Simpanan Anggota</td>
							</tr>
						 	<?php
								$simp  = $this->db->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->get('app_simpanan');
								foreach ($simp->result() as $rowa)
								{ 
									$istilah = $this->db->where('id', $rowa->jns_simp)->get('app_jns_simp')->row();
									$totsimpanan = $this->db->select("SUM(jumlah) as total")->where('YEAR(tgl)', $tahun)->get('app_simpanan')->row();

							?>
							<tr>
								<td><?php echo $no++; ?> .</td>
								<td><?php echo date("d-m-Y", strtotime($rowa->tgl)); ?></td>
								<td class="kandel text-primary fs-7"><?php echo $rowa->kode; ?></td>
								<td><?php echo $istilah->nama.' '.get_anggota($rowa->user_id)->nama; ?></td>
								<td class="text-right">Rp. <?php echo number_format($rowa->jumlah, 0,',','.'); ?></td>
								<td class="text-right"></td>
								<td class="text-right"></td>
							</tr>
							<?php } ?>
							<tr>
								<td class="kandel text-center" colspan="6">Pinjaman Anggota</td>
							</tr>
							<?php
								$pinj  = $this->db->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->where('status', 'disetujui')->get('app_pinjaman');
								foreach ($pinj->result() as $ro)
								{ 
									$totpinjaman = $this->db->select("SUM(total) as total")->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->where('status', 'disetujui')->get('app_pinjaman')->row();
							?>	

							<tr>
								<td><?php echo $no++; ?> .</td>
								<td><?php echo date("d-m-Y", strtotime($ro->tgl)); ?></td>
								<td class="kandel text-primary fs-7"><?php echo $ro->kode; ?></td>
								<td><?php echo 'Pinjaman '.get_jenis_pinjaman($ro->jns_pinj)->nama; ?> <?php echo get_anggota($ro->user_id)->nama; ?> (<?php echo $ro->tempo; ?> X)</td>
								<td class="text-right"></td>
								<td class="text-right">Rp. <?php echo number_format($ro->total, 0,',','.'); ?></td>
								<td class="text-right"></td>
							</tr>	

							<?php }
								$angs  = $this->db->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->get('app_angsuran');
								foreach ($angs->result() as $r)
								{ 
									$totangsuran = $this->db->select("SUM(jumlah) as total")->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->get('app_angsuran')->row();								

							?>	
							<tr>
								<td><?php echo $no++; ?> .</td>
								<td><?php echo date("d-m-Y", strtotime($r->tgl)); ?></td>
								<td class="kandel text-primary fs-7"><?php echo $r->kode; ?></td>
								<td><?php $sileh = get_pinjaman($r->id_pinj); if($r->jenis == 'pelunasan') { echo 'Pelunasan '; } else { echo 'Angsuran '; } echo get_pinjaman($r->id_pinj)->kode; ?> <?php echo get_anggota($sileh->user_id)->nama; ?></td>
								<td class="text-right">Rp. <?php echo number_format($r->jumlah, 0,',','.'); ?></td>
								<td class="text-right"></td>
								<td class="text-right"></td>
							</tr>
							<?php } ?>
							<?php 
								$pena  = $this->db->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->get('app_penarikan');
								foreach ($pena->result() as $rod)
								{ 
									$totpenarikan = $this->db->select("SUM(jumlah) as total")->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->get('app_penarikan')->row();
							?>	
							<tr>
								<td><?php echo $no++; ?> .</td>
								<td><?php echo date("d-m-Y", strtotime($rod->tgl)); ?></td>
								<td class="kandel text-primary fs-7"><?php echo $rod->kode; ?></td>
								<td><?php echo 'Tarikan '.$rod->jenis; ?> <?php echo get_anggota($rod->user_id)->nama; ?> (<?php echo $rod->keterangan; ?>)</td>
								<td class="text-right"></td>
								<td class="text-right">Rp. <?php echo number_format($rod->jumlah, 0,',','.'); ?></td>
								<td class="text-right"></td>
							</tr>
							<?php } ?>	
							<tr>
								<td class="kandel text-center" colspan="6">Pendapatan SWP</td>
							</tr>
							<?php 
								$untungswp  = $this->db->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->group_start()->where('status', 'disetujui')->or_where('status', 'lunas')->group_end()->get('app_pinjaman');
								foreach ($untungswp->result() as $rode)
								{ 
									$totswp = $this->db->select("SUM(swp) as total")->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->group_start()->where('status', 'disetujui')->or_where('status', 'lunas')->group_end()->get('app_pinjaman')->row();
							?>	
							<tr>
								<td><?php echo $no++; ?> .</td>
								<td><?php echo date("d-m-Y", strtotime($rode->tgl)); ?></td>
								<td class="kandel text-primary fs-7"><?php echo $rode->kode; ?></td>
								<td><?php echo 'SWP '; ?><?php echo $rode->kode; ?> <?php echo get_anggota($rode->user_id)->nama; ?></td>
								<td class="text-right">Rp. <?php echo number_format($rode->swp, 0,',','.'); ?></td>
								<td class="text-right"></td>
								<td class="text-right"></td>
							</tr>
							<?php } ?>
							<tr>
								<td class="kandel text-center" colspan="6">Pendapatan RSK</td>
							</tr>
							<?php 
								$untungrsk  = $this->db->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->group_start()->where('status', 'disetujui')->or_where('status', 'lunas')->group_end()->get('app_pinjaman');
								foreach ($untungrsk->result() as $roden)
								{ 
									$totrsk = $this->db->select("SUM(rsk) as total")->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->group_start()->where('status', 'disetujui')->or_where('status', 'lunas')->group_end()->get('app_pinjaman')->row();
							?>	
							<tr>
								<td><?php echo $no++; ?> .</td>
								<td><?php echo date("d-m-Y", strtotime($roden->tgl)); ?></td>
								<td class="kandel text-primary fs-7"><?php echo $roden->kode; ?></td>
								<td><?php echo 'RSK '; ?><?php echo $roden->kode; ?> <?php echo get_anggota($roden->user_id)->nama; ?></td>
								<td class="text-right">Rp. <?php echo number_format($roden->rsk, 0,',','.'); ?></td>
								<td class="text-right"></td>
								<td class="text-right"></td>
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
if(empty($totsimpanan->total))
{
	$a = '0';
}
else
{
	$a = $totsimpanan->total;
}
if(empty($totpinjaman->total))
{
	$b = '0';
}
else
{
	$b = $totpinjaman->total;
}
if(empty($totangsuran->total))
{
	$c = '0';
}
else
{
	$c = $totangsuran->total;
}
if(empty($totswp->total))
{
	$d = '0';
}
else
{
	$d = $totswp->total;
}
if(empty($totpenarikan->total))
{
	$e = '0';
}
else
{
	$e = $totpenarikan->total;
}
if(empty($totrsk->total))
{
	$f = '0';
}
else
{
	$f = $totrsk->total;
}
$melbet = $masuk + $c + $d + $f;
$medal  = $keluar + $b + $e;
$nongol = ($melbet + $saldo) - $medal;
?>
							<tr>
								<td class="text-right kandel fs-7" colspan="3">Jumlah : </td>
								<td class="text-right kandel fs-7">Rp. <?php echo number_format($melbet, 0,',','.'); ?></td>
								<td class="text-right kandel fs-7">Rp. <?php echo number_format($medal, 0,',','.'); ?></td>
								<td class="text-right kandel fs-7">Rp. <?php echo number_format($nongol, 0,',','.'); ?></td>
							</tr>
						</tfoot>
					</table>


				</div>
			</div>
		</div>
	</div>
		</div>
	<script>
		window.print();
	</script>
</body>
</html>