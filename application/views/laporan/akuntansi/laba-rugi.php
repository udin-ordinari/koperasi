<div class="main-content side-content pt-0">
	<div class="main-container container-fluid">
		<div class="inner-body">
			<div class="page-header d-flex justify-content-center">
				<div class="pt-1 text-center mb-2">
					<h2 class="text-uppercase tx-bold tx-20"><?php echo $page; ?> <?php echo $title; ?><br>periode <?php echo $tahun;?></h2>						
				</div>
			</div>
		</div>

		<div class="row row-sm">
			<div class="col-lg-12">
				<div class="card custom-card">
					<div class="card-body">
						<div class="table-responsive border tx-14">
							<table class="table text-nowrap text-md-nowrap mg-b-0">
								<thead>
									<tr class="bg-primary">
										<th scope="col"></th>
										<th scope="col" class="text-end text-white" style="font-weight: 700;">Bulan : </th>
										<th scope="col" class="text-start tx-bold text-white" style="font-weight: 700;">Januari <?php echo $tahun; ?></th>
									</tr>
									<tr>
										<th scope="col" style="font-weight: 700;">No</th>
										<th scope="col" style="font-weight: 700;">Uraian</th>
										<th scope="col" class="text-center" style="font-weight: 700;">Total</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td scope="col">I.</td>
										<td class="text-uppercase tx-bold tx-13">pendapatan</td>
										<td></td>										
									</tr>
									<?php 
										$ang 	= $this->db->select_sum('bunga', 'total')->where('MONTH(tgl)', '01')->where('YEAR(tgl)', $tahun)->get('app_angsuran')->row();
										$tran	= $this->db->select_sum('bunga', 'total')->where('kode', '4100')->where('MONTH(tgl)', '01')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
										$trans	= $this->db->select_sum('bunga', 'total')->where('kode', '4200')->where('MONTH(tgl)', '01')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
										$tot	= $ang->total + $tran->total + $trans->total;
									?>
									<tr>
										<td></td>
                                            					<td class="text-secondary tx-bold tx-13">UNIT SIMPAN PINJAM</td>
										<td>Rp. <?php echo number_format((int)$ang->total, 0, ', ', '.'); ?></td>
									</tr>	
									<tr>
										<td></td>
                                            					<td class="text-secondary tx-bold tx-13">UNIT INDUK KOPERASI</td>
										<td>Rp. <?php echo number_format((int)$tran->total + $trans->total, 0, ', ', '.'); ?></td>
									</tr>
									<tr>
										<td scope="col"></td>
										<td class="text-capitalize tx-bold text-right">jumlah</td>
										<td class="kandel">Rp. <?php echo number_format((int)$tot, 0, ', ', '.'); ?></td>
									</tr>
									<tr>
										<td scope="col">II.</td>
										<td class="text-uppercase tx-bold tx-13">Pajak Penghasilan [PPh]</td>
										<td></td>										
									</tr>
									<tr>
										<td></td>
										<td class="text-secondary tx-bold tx-13">Beban Pajak Penghasilan (PPh)</td>
										<?php $ppn = $this->sistem->RowObject('nama', 'persen-aph', 'app_jasa')->isi; ?>
										<td>Rp. </td>
									</tr>
									<tr>
										<td></td>
										<td class="text-secondary tx-bold tx-13">Laba setelah dipotong pajak</td>
										<td>Rp. </td>
									</tr>
									<tr>
										<td scope="col">III.</td>
										<td class="text-uppercase tx-bold tx-13">beban kelancaran usaha</td>
										<td></td>										
									</tr>
									<?php 
										$jasa 	= $this->db->select_sum('jumlah', 'total')->where('akun_id', '36')->where('MONTH(tgl)', '01')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
										$biaya 	= $this->db->select_sum('jumlah', 'total')->where('akun_id', '17')->where('MONTH(tgl)', '01')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
										$bungan = $this->db->select_sum('jumlah', 'total')->where('akun_id', '44')->where('MONTH(tgl)', '01')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
										$bu	= $this->db->select_sum('jumlah', 'total')->where('akun_id', '19')->where('MONTH(tgl)', '01')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
										$a	= $this->db->select_sum('jumlah', 'total')->where('akun_id', '35')->where('MONTH(tgl)', '01')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
										$b	= $this->db->select_sum('jumlah', 'total')->where('akun_id', '37')->where('MONTH(tgl)', '01')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();

										$f	= $this->db->select_sum('jumlah', 'total')->where('akun_id', '55')->where('MONTH(tgl)', '01')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
										$g	= $this->db->select_sum('jumlah', 'total')->where('akun_id', '56')->where('MONTH(tgl)', '01')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
										$h	= $this->db->select_sum('jumlah', 'total')->where('akun_id', '57')->where('MONTH(tgl)', '01')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
										$i	= $this->db->select_sum('jumlah', 'total')->where('akun_id', '58')->where('MONTH(tgl)', '01')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
										$j	= $this->db->select_sum('jumlah', 'total')->where('akun_id', '59')->where('MONTH(tgl)', '01')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
										$k	= $this->db->select_sum('jumlah', 'total')->where('akun_id', '60')->where('MONTH(tgl)', '01')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
										$total = $jasa->total + $biaya->total + $bungan->total + $bu->total;
									?>
									<tr>
										<td></td>
                                            					<td class="text-secondary tx-bold tx-13">UNIT SIMPAN PINJAM</td>
										<td>Rp. <?php echo number_format((int)$total, 0, ', ', '.'); ?></td>
									</tr>
									<tr>
										<td></td>
                                            					<td class="text-secondary tx-bold tx-13">UNIT INDUK KOPERASI</td>
										<td>Rp. <?php echo number_format((int)$tran->total + $trans->total, 0, ', ', '.'); ?></td>
									</tr>
									<tr>
									<?php $lancar = $jasa->total + $biaya->total + $bungan->total + $bu->total + $a->total + $b->total; ?>										<tr>
										<td scope="col">IV.</td>
										<td class="text-uppercase tx-bold tx-13">biaya biaya rat</td>
										<td>Rp. <?php echo number_format((int)total_biaya_rat($tahun), 0, ', ', '.'); ?></td>										
									</tr>

								</tbody>
								<tfoot>
								<?php $rat = $f->total + $g->total + $h->total + total_biaya_rat($tahun); $kujur = $rat + $lancar; ?>
									<tr>
										<td class="text-capitalize tx-bold tx-13 text-end" colspan="2">jumlah</td>
										<td class="kandel">Rp. <?php echo number_format((int)$rat, 0, ', ', '.'); ?></td>
									</tr>
									<tr>
										<td class="text-capitalize tx-bold tx-13 text-end" colspan="2">total</td>
										<td class="kandel">Rp. <?php echo number_format((int)$ang->total - $kujur, 0, ', ', '.'); ?></td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>



		<div class="row row-sm">
			<div class="col-lg-12">
				<div class="card custom-card">
					<div class="card-body">
						<div class="table-responsive border tx-14">
							<table class="table text-nowrap text-md-nowrap mg-b-0">
								<thead>
									<tr class="bg-success">
										<th scope="col"></th>
										<th scope="col" class="text-end text-white" style="font-weight: 700;">Bulan : </th>
										<th scope="col" class="text-start text-white" style="font-weight: 700;">Februari <?php echo $tahun; ?></th>
									</tr>
									<tr class="tx-bold">
										<th scope="col" style="font-weight: 700;">No</th>
										<th scope="col" style="font-weight: 700;">Uraian</th>
										<th scope="col" class="text-center" style="font-weight: 700;">Total</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td scope="col">I.</td>
										<td class="text-uppercase tx-bold tx-13">pendapatan</td>
										<td></td>										
									</tr>
									<?php 
										$ang 	= $this->db->select_sum('bunga', 'total')->where('MONTH(tgl)', '02')->where('YEAR(tgl)', $tahun)->get('app_angsuran')->row();
										$tran	= $this->db->select_sum('bunga', 'total')->where('kode', '4100')->where('MONTH(tgl)', '02')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
										$trans	= $this->db->select_sum('bunga', 'total')->where('kode', '4200')->where('MONTH(tgl)', '02')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
										$tot	= $ang->total + $tran->total + $trans->total;
									?>
									<tr>
										<td></td>
                                            					<td class="text-secondary tx-bold tx-13">UNIT SIMPAN PINJAM</td>
										<td>Rp. <?php echo number_format((int)$ang->total, 0, ', ', '.'); ?></td>
									</tr>	
									<tr>
										<td></td>
                                            					<td class="text-secondary tx-bold tx-13">UNIT INDUK KOPERASI</td>
										<td>Rp. <?php echo number_format((int)$tran->total + $trans->total, 0, ', ', '.'); ?></td>
									</tr>
									<tr>
										<td scope="col"></td>
										<td class="text-capitalize tx-bold text-right">jumlah</td>
										<td class="kandel">Rp. <?php echo number_format((int)$tot, 0, ', ', '.'); ?></td>
									</tr>
									<tr>
										<td scope="col">II.</td>
										<td class="text-uppercase tx-bold tx-13">Pajak Penghasilan [PPh]</td>
										<td></td>										
									</tr>
									<tr>
										<td></td>
										<td class="text-secondary tx-bold tx-13">Beban Pajak Penghasilan (PPh)</td>
										<?php $ppn = $this->sistem->RowObject('nama', 'persen-aph', 'app_jasa')->isi; ?>
										<td>Rp. </td>
									</tr>
									<tr>
										<td></td>
										<td class="text-secondary tx-bold tx-13">Laba setelah dipotong pajak</td>
										<td>Rp. </td>
									</tr>
									<tr>
										<td scope="col">III.</td>
										<td class="text-uppercase tx-bold tx-13">beban kelancaran usaha</td>
										<td></td>										
									</tr>
									<?php 
										$jasa 	= $this->db->select_sum('jumlah', 'total')->where('akun_id', '36')->where('MONTH(tgl)', '02')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
										$biaya 	= $this->db->select_sum('jumlah', 'total')->where('akun_id', '17')->where('MONTH(tgl)', '02')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
										$bungan = $this->db->select_sum('jumlah', 'total')->where('akun_id', '44')->where('MONTH(tgl)', '02')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
										$bu	= $this->db->select_sum('jumlah', 'total')->where('akun_id', '19')->where('MONTH(tgl)', '02')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
										$a	= $this->db->select_sum('jumlah', 'total')->where('akun_id', '35')->where('MONTH(tgl)', '02')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
										$b	= $this->db->select_sum('jumlah', 'total')->where('akun_id', '37')->where('MONTH(tgl)', '02')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();

										$f	= $this->db->select_sum('jumlah', 'total')->where('akun_id', '55')->where('MONTH(tgl)', '02')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
										$g	= $this->db->select_sum('jumlah', 'total')->where('akun_id', '56')->where('MONTH(tgl)', '02')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
										$h	= $this->db->select_sum('jumlah', 'total')->where('akun_id', '57')->where('MONTH(tgl)', '02')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
										$i	= $this->db->select_sum('jumlah', 'total')->where('akun_id', '58')->where('MONTH(tgl)', '02')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
										$j	= $this->db->select_sum('jumlah', 'total')->where('akun_id', '59')->where('MONTH(tgl)', '02')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
										$k	= $this->db->select_sum('jumlah', 'total')->where('akun_id', '60')->where('MONTH(tgl)', '02')->where('YEAR(tgl)', $tahun)->get('app_transaksi')->row();
										$total = $jasa->total + $biaya->total + $bungan->total + $bu->total;
									?>
									<tr>
										<td></td>
                                            					<td class="text-secondary tx-bold tx-13">UNIT SIMPAN PINJAM</td>
										<td>Rp. <?php echo number_format((int)$total, 0, ', ', '.'); ?></td>
									</tr>
									<tr>
										<td></td>
                                            					<td class="text-secondary tx-bold tx-13">UNIT INDUK KOPERASI</td>
										<td>Rp. <?php echo number_format((int)$tran->total + $trans->total, 0, ', ', '.'); ?></td>
									</tr>
									<tr>
									<?php $lancar = $jasa->total + $biaya->total + $bungan->total + $bu->total + $a->total + $b->total; ?>										<tr>
										<td scope="col">IV.</td>
										<td class="text-uppercase tx-bold tx-13">biaya biaya rat</td>
										<td>Rp. <?php echo number_format((int)total_biaya_rat($tahun), 0, ', ', '.'); ?></td>										
									</tr>

								</tbody>
								<tfoot>
								<?php $rat = $f->total + $g->total + $h->total + total_biaya_rat($tahun); $kujur = $rat + $lancar; ?>
									<tr>
										<td class="text-capitalize tx-bold tx-13 text-end" colspan="2">jumlah</td>
										<td class="kandel">Rp. <?php echo number_format((int)$rat, 0, ', ', '.'); ?></td>
									</tr>
									<tr>
										<td class="text-capitalize tx-bold tx-13 text-end" colspan="2">total</td>
										<td class="kandel">Rp. <?php echo number_format((int)$ang->total - $kujur, 0, ', ', '.'); ?></td>
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
