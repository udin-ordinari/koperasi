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
								<h6 class="main-content-label mb-3 text-end">Bulan : <strong><?php echo bulan($bln); ?> <?php echo $tahun; ?></strong></h6>
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
												$shu		= shu_dibagi_usp();
												$dana_pengurus	= dana_pengurus_karyawan();
												$wajiba     	= $this->db->select_sum('jumlah', 'total')->where('MONTH(tgl)', $bln)->where('YEAR(tgl) <=', $tahun)->where('jns_simp', '2')->where('saldo_awal', '0')->get('app_simpanan')->row();
												$suka 		= $this->db->select_sum('jumlah', 'total')->where('MONTH(tgl)', '01')->where('YEAR(tgl)', $tahun)->where('jns_simp', '3')->where('saldo_awal', '0')->get('app_simpanan')->row();
												$rat 		= $shu + $dana_pengurus + $wajiba->total + $suka->total;

												$januari	= ($this->transaksi->transaksi_debet_induk_bulanan('01') + get_saldo_awal('1', '02', $tahun - 1)) - $this->transaksi->transaksi_kredit_induk_bulanan('01');
												$februari	= ($januari + $this->transaksi->transaksi_debet_induk_bulanan('02')) - $this->transaksi->transaksi_kredit_induk_bulanan('02');
												$maret		= ($februari + $this->transaksi->transaksi_debet_induk_bulanan('03')) - $this->transaksi->transaksi_kredit_induk_bulanan('03');
												$april		= ($maret + $this->transaksi->transaksi_debet_induk_bulanan('04')) - $this->transaksi->transaksi_kredit_induk_bulanan('04');
												$mei		= ($april + $this->transaksi->transaksi_debet_induk_bulanan('05')) - $this->transaksi->transaksi_kredit_induk_bulanan('05');
												$juni		= ($mei + $this->transaksi->transaksi_debet_induk_bulanan('06')) - $this->transaksi->transaksi_kredit_induk_bulanan('06');
												$juli		= ($juni + $this->transaksi->transaksi_debet_induk_bulanan('07')) - $this->transaksi->transaksi_kredit_induk_bulanan('07');
												$agustus	= ($juli + $this->transaksi->transaksi_debet_induk_bulanan('08')) - $this->transaksi->transaksi_kredit_induk_bulanan('08');
												$september	= ($agustus + $this->transaksi->transaksi_debet_induk_bulanan('09')) - $this->transaksi->transaksi_kredit_induk_bulanan('09');
												$oktober	= ($september + $this->transaksi->transaksi_debet_induk_bulanan('10')) - $this->transaksi->transaksi_kredit_induk_bulanan('10');
												$november	= ($oktober + $this->transaksi->transaksi_debet_induk_bulanan('11')) - $this->transaksi->transaksi_kredit_induk_bulanan('11');
												$desember	= ($november + $this->transaksi->transaksi_debet_induk_bulanan('12')) - $this->transaksi->transaksi_kredit_induk_bulanan('12');

												if($bln == '01')
												{
													$saldo = get_saldo_awal('1', '02', $tahun - 1);
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

											<td class="kandel">Rp. <?php echo number_format($saldo, 0, ', ', '.'); ?></td>
										</tr>
									</thead>
									<tbody class="tx-14">	
						 				<?php $no = 1; ?>
										<tr>	
											<td><?php echo $no++; ?> .</td>
											<td></td>
											<td></td>
											<td>Simpanan Pokok ( MTT )</td>
											<td>Rp. <?php echo number_format((int)total_simpanan_pokok_bulanan($bln)->total, 0,',','.'); ?></td>
											<td></td>
											<td></td>
										</tr>	

										<tr>	
											<td><?php echo $no++; ?> .</td>
											<td></td>
											<td></td>
											<td>Simpanan Pokok ( MTT )</td>
											<td></td>
											<td>Rp. <?php echo number_format((int)total_simpanan_pokok_bulanan($bln)->total, 0,',','.'); ?></td>
											<td></td>
										</tr>	

										<tr>	
											<td><?php echo $no++; ?> .</td>
											<td></td>
											<td></td>
											<td>Simpanan Wajib ( MTT )</td>
											<td>Rp. <?php echo number_format((int)$this->transaksi->total_simpanan_wajib_periode($bln)->total, 0,',','.'); ?></td>
											<td></td>
											<td></td>
										</tr>

										<tr>	
											<td><?php echo $no++; ?> .</td>
											<td></td>
											<td></td>
											<td>Simpanan Wajib ( MTT )</td>
											<td></td>
											<td>Rp. <?php echo number_format((int)$this->transaksi->total_simpanan_wajib_periode($bln)->total, 0,',','.'); ?></td>
											<td></td>
										</tr>	
						 				<?php
										$trans 	= $this->db->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->where('unit', '02')->get('app_transaksi');
										foreach ($trans->result() as $row)
										{
											$simkok	= $this->db->select_sum('jumlah', 'total')->where('jns_simp', '1')->where('saldo_awal', '0')->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->get('app_simpanan')->row();
											$debet 	= $this->db->select_sum('jumlah', 'total')->where('jenis', 'debet')->where('unit', '02')->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
											$kredit = $this->db->select_sum('jumlah', 'total')->where('jenis', 'kredit')->where('unit', '02')->where('MONTH(tgl)', $bln)->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
										?>	
										<tr>

											<td><?php echo $no++; ?> .</td>
											<td><?php echo date("d-m-Y", strtotime($row->tgl)); ?></td>
											<td class="text-primary"><?php echo $row->kode; ?></td>
											<td><?php echo $row->keterangan; ?></td>
											<?php if($row->jenis == 'debet') { ?>
											<td>Rp. <?php echo number_format($row->jumlah, 0,',','.'); ?></td>
											<td></td>
											<?php } else { ?>
											<td></td>
											<td>Rp. <?php echo number_format($row->jumlah, 0,',','.'); ?></td>
											<?php } ?>
											<td></td>
										</tr>	
										<?php } ?>	
										<?php if($bln == '01') { ?>
										<tr>
											<td><?php echo $no++; ?> .</td>
											<td></td>
											<td></td>
											<td class="text-capitalize">Perolehan dari USP</td>
											<td>Rp. <?php echo number_format((int)$shu, 0,',','.'); ?></td>
											<td></td>
											<td></td>
										</tr>
										<tr>
											<td><?php echo $no++; ?> .</td>
											<td></td>
											<td></td>
											<td class="text-capitalize">SHU RAT</td>
											<td></td>
											<td>Rp. <?php echo number_format((int)$shu, 0,',','.'); ?></td>
											<td></td>
										</tr>
										<tr>
											<td><?php echo $no++; ?> .</td>
											<td></td>
											<td></td>
											<td class="text-capitalize">Dana Pengurus</td>
											<td></td>
											<td>Rp. <?php echo number_format($dana_pengurus, 0,',','.'); ?></td>
											<td></td>
										</tr>
										<tr>
											<td><?php echo $no++; ?> .</td>
											<td></td>
											<td></td>
											<td class="text-capitalize">MTT induk</td>
											<td></td>
											<td>Rp. <?php echo number_format((int)'0', 0,',','.'); ?></td>
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
										$masuk = $debet->total + total_simpanan_pokok_bulanan($bln)->total;
									
									}
									if(empty($kredit->total))
									{
										$keluar = '0';
									}
									else
									{
										if($bln == '01')
										{
											$keluar = $kredit->total + total_simpanan_pokok_bulanan($bln)->total + $this->transaksi->total_simpanan_wajib_periode($bln)->total + $shu + $dana_pengurus;
										}
										else
										{
											$keluar = $kredit->total + total_simpanan_pokok_bulanan($bln)->total;
										}
									}
									?>
										<tr>
											<td class="kandel text-end" colspan="4">Jumlah : </td>
											<td class="kandel">Rp. <?php echo number_format($masuk + $this->transaksi->total_simpanan_wajib_periode($bln)->total, 0,',','.'); ?></td>
											<td class="kandel">Rp. <?php echo number_format($keluar, 0,',','.'); ?></td>
											<td class="kandel">Rp. <?php echo number_format($masuk + $this->transaksi->total_simpanan_wajib_periode($bln)->total + $saldo - $keluar, 0,',','.'); ?></td>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	var table = $('#neraca').DataTable( {
		language: {url:"<?php echo base_url('assets/js/Indonesian.json');?>"},
		autoWidth: false,
        	processing: true,
        	serverSide: false,
		ordering: true,
		order: [],
	});
} );

</script>
