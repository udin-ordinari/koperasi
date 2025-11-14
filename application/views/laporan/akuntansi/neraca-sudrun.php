<div class="main-content side-content pt-0">
	<div class="main-container container-fluid">
		<div class="">
			<div class="page-header">
				<div>
					<h6 class="main-content-title tx-18 mg-b-5">Perhatian ! <span class="breadcrumb-item"><a href="javascript:void(0);">Bila kolom Tabel Tidak Sesuai Silahkan Di Perbesar Layar Melalui Menu Garis 3 Diatas Kiri Sebelah Waktu.</a></span></h6>
				</div>
				<div class="d-flex">
					<div class="justify-content-center">
						<button type="button" class="btn btn-secondary" onclick="window.open('<?php echo base_url(); ?>laporan/akuntansi/neraca_print');"><i class="fal fa-print fa-fw fa-lg mr-2"></i>Cetak</button>
					</div>
				</div>
			</div>
			<h5 class="mb-4 text-uppercase text-center">neraca usaha simpan pinjam ( usp )<br>periode <?php echo $tahun;?></h5>

			<div class="card">
				<div class="row row-lg p-1">
					<div class="col-lg-6">
						<div class="table-responsive border">
							<table class="table text-nowrap text-md-nowrap table-hover tx-14">
								<thead class="table-secondary">
									<tr>
										<th scope="col"></th>
										<th scope="col">AKTIVA</th>
										<th scope="col" class="text-center"><?php echo $tahun - 1; ?></th>
										<th scope="col" class="text-center"><?php echo $tahun; ?></th>
									</tr>
								</thead>
								<tbody>
									<tr class="tx-14 kandel">
										<td>I</td>
										<td class="text-uppercase tx-13"><strong>aktiva lancar</strong></td>
										<td></td>
										<td></td>
									</tr>
<?php $aset = $this->db->where('jenis', '1')->get('app_akun'); $no = 1; foreach($aset->result() as $row) { ?>
									<tr>
										<td class="text-right"><?php echo $no++; ?> .</td>
										<td><?php echo $row->akun; ?></td>										
										<td class="text-right">Rp. <?php echo number_format((int)get_saldo_awal('1', '01', $tahun - 1), 0, ', ', '.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)$this->transaksi->total_kas_usp($tahun), 0, ', ', '.'); ?></td>
									</tr>
<?php } ?>
									<tr>
										<td class="text-right">2 .</td>
										<td>Pinjaman Anggota</td>										
										<td class="text-right">Rp. <?php echo number_format((int)get_saldo_awal('2', '01', $tahun - 1), 0, ', ', '.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)total_pinjaman($tahun - 1) + total_pinjaman($tahun), 0, ', ', '.'); ?></td>													
									</tr>
									<tr>
										<td class="text-right">3 .</td>
										<td>Piutang Lain</td>										
										<td class="text-right">Rp. <?php echo number_format((int)get_saldo_awal('4', '01', $tahun - 1), 0, ', ', '.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)get_saldo_awal('4', '01', $tahun - 1), 0, ', ', '.'); ?></td>														
									</tr>
								</tbody>
								<tfoot class="kandel text-right tx-14">
									<tr>
										<td colspan="2" class="text-capitalize text-end">jumlah</td>
										<td>Rp. <?php echo number_format((int)get_saldo_awal('1', '01', $tahun - 1) + get_saldo_awal('2', '01', $tahun - 1) + get_saldo_awal('4', '01', $tahun - 1), 0, ', ', '.'); ?></td>
										<td>Rp. <?php echo number_format((int)$this->transaksi->total_kas_usp($tahun) + total_pinjaman($tahun) + total_pinjaman($tahun - 1) + get_saldo_awal('4', '01', $tahun - 1) + jumlah_hasil_kode('4', '01', $tahun - 1), 0, ', ', '.'); ?></td>
									</tr>
								</tfoot>
							</table>

							<table class="table text-nowrap text-md-nowrap table-hover mg-b-0 tx-14">
								<thead>
									<tr class="tx-14">
										<td><b>II</b></td>
										<td class="text-uppercase tx-13"><strong>aktiva tetap</strong></td>
										<td></td>
										<td></td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-right">1 .</td>
										<td>Inventaris / Lainnya</td>										
										<td class="text-right">Rp. 0</td>
										<td class="text-right">Rp. 0</td>														
									</tr>
									<tr>
										<td class="text-right">2 .</td>
										<td>Aktiva Lainnya</td>										
										<td class="text-right">Rp. 0</td>
										<td class="text-right">Rp. 0</td>														
									</tr>
								</tbody>
								<tfoot class="kandel text-right tx-14">
									<tr>
										<td colspan="2" class="text-capitalize text-end">jumlah</td>
										<td>Rp. <?php echo number_format((int)'0', 0, ', ', '.'); ?></td>
										<td>Rp. <?php echo number_format((int)'0', 0, ', ', '.'); ?></td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="table-responsive border">
							<table class="table text-nowrap text-md-nowrap table-hover mg-b-0 tx-14">
								<thead class="table-secondary">
									<tr>
										<th scope="col"></th>
										<th scope="col">PASIVA</th>
										<th scope="col" class="text-center"><?php echo $tahun - 1; ?></th>
										<th scope="col" class="text-center"><?php echo $tahun; ?></th>
									</tr>
								</thead>
								<tbody>
									<tr class="tx-14 kandel">
										<td>III</td>
										<td colspan="3" class="text-uppercase tx-13">kewajiban lancar</td>
									</tr>
									<tr>
										<td class="text-right">1 .</td>
										<td>Simpanan Sukarela</td>										
										<td class="text-right">Rp. <?php echo number_format((int)get_saldo_awal('5', '01', $tahun - 1), 0, ', ', '.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)total_simpanan_sukarela($tahun), 0, ', ', '.'); ?></td>														
									</tr>
									<tr>
										<td class="text-right">2 .</td>
										<td>MTT [Modal Tidak tetap]</td>										
										<td class="text-right">Rp. <?php echo number_format((int)get_saldo_awal('28', '01', $tahun - 1) + get_saldo_awal('29', '01', $tahun - 1), 0, ', ', '.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)total_simpanan_pokok($tahun) + total_simpanan_wajib($tahun), 0, ', ', '.'); ?></td>														
									</tr>

								</tbody>
								<tfoot class="kandel text-right tx-14">
									<tr>
										<td colspan="2" class="text-capitalize text-end">jumlah</td>
										<td>Rp. <?php echo number_format((int)get_saldo_awal('5', '01', $tahun - 1) + get_saldo_awal('28', '01', $tahun - 1) + get_saldo_awal('29', '01', $tahun - 1), 0, ', ', '.'); ?></td>
										<td>Rp. <?php echo number_format((int)total_simpanan_sukarela($tahun) + modal_tidak_tetap($tahun - 1) + total_simpanan_pokok($tahun) + total_simpanan_wajib($tahun), 0, ', ', '.'); ?></td>
									</tr>
								</tfoot>
							</table>

							<table class="table text-nowrap text-md-nowrap table-hover mg-b-0 tx-14">
								<thead>
									<tr class="kandel">
										<td><b>IV</b></td>
										<td colspan="3" class="text-uppercase tx-13"><strong>kewajiban jangka panjang</strong></td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-right">1 .</td>
										<td>Simpanan Lain - lain / SWP</td>										
										<td class="text-right">Rp. <?php echo number_format((int)get_saldo_awal('7', '01', $tahun - 1), 0, ', ', '.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)total_simpanan_lain($tahun), 0, ', ', '.'); ?></td>														
									</tr>
									<tr>
										<td class="text-right">2 .</td>
										<td>Hutang Usaha</td>										
										<td class="text-right">Rp. <?php echo number_format((int)get_saldo_awal('8', '01', $tahun - 1), 0, ', ', '.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)get_saldo_awal('8', '01', $tahun - 1) + jumlah_hasil_kode('8', '01'), 0, ', ', '.'); ?></td>														
									</tr>
								</tbody>
								<tfoot class="kandel text-right tx-14">
									<tr>
										<td colspan="2" class="text-capitalize text-end">jumlah</td>
										<td>Rp. <?php echo number_format((int)get_saldo_awal('7', '01', $tahun - 1) + get_saldo_awal('8', '01', $tahun - 1), 0, ', ', '.'); ?></td>
										<td>Rp. <?php echo number_format((int)total_simpanan_lain($tahun) + get_saldo_awal('8', '01', $tahun - 1), 0, ', ', '.'); ?></td>
									</tr>
								</tfoot>
							</table>


							<table class="table text-nowrap text-md-nowrap table-hover mg-b-0 tx-14">
								<thead>
									<tr class="kandel tx-14">
										<td><b>IV</b></td>
										<td colspan="3" class="text-uppercase tx-13"><strong>kekayaan bersih</strong></td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-right">1 .</td>
										<td>Modal Disetor / Modal Tetap</td>										
										<td class="text-right">Rp. <?php echo number_format((int)$this->sistem->RowObject('nama', 'pasiva-mtt', 'app_jasa')->isi, 0, ', ', '.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)$this->sistem->RowObject('nama', 'pasiva-mtt', 'app_jasa')->isi, 0, ', ', '.'); ?></td>														
									</tr>
									<tr>
										<td class="text-right">2 .</td>
										<td>Cadangan Tuj. Resiko [RSK]</td>										
										<td class="text-right">Rp. <?php echo number_format((int)get_saldo_awal('11', '01', $tahun - 1), 0, ', ', '.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)get_saldo_awal('11', '01', $tahun - 1) + cadangan_tujuan_resiko($tahun), 0, ', ', '.'); ?></td>														
									</tr>
									<tr>
										<td class="text-right">3 .</td>
										<td>Cadangan Umum / Modal</td>										
										<td class="text-right">Rp. <?php echo number_format((int)get_saldo_awal('12', '01', $tahun - 1), 0, ', ', '.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)get_saldo_awal('12', '01', $tahun - 1) + jumlah_hasil_kode('12', '01'), 0, ', ', '.'); ?></td>														
									</tr>
									<tr>
										<td class="text-right">4 .</td>
										<td>Biaya RAT Yg Hrs Dibayar</td>										
										<td class="text-right">Rp. <?php echo number_format((int)get_saldo_awal('15', '01', $tahun - 1), 0, ', ', '.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)total_biaya_rat($tahun), 0, ', ', '.'); ?></td>														
									</tr>
									<tr>
										<td class="text-right">5 .</td>
										<td>SHU Yg Hrs Dibagi</td>										
										<td class="text-right">Rp. <?php echo number_format((int)get_saldo_awal('31', '01', $tahun - 1), 0, ', ', '.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)pendapatan_jasa_usp($tahun) - total_biaya_rat($tahun), 0, ', ', '.'); ?></td>														
									</tr>
								</tbody>
								<tfoot class="kandel text-right tx-14">
									<tr>
										<td colspan="2" class="text-capitalize text-end">jumlah</td>
										<?php $equ = $this->sistem->RowObject('nama', 'pasiva-mtt', 'app_jasa')->isi; ?>
										<td>Rp. <?php echo number_format((int)$equ + get_saldo_awal('11', '01', $tahun - 1) + get_saldo_awal('12', '01', $tahun - 1) + get_saldo_awal('15', '01', $tahun - 1) + get_saldo_awal('31', '01', $tahun - 1), 0, ', ', '.'); ?></td>
										<?php $equni = $equ + get_saldo_awal('10', '01', $tahun - 1) + get_saldo_awal('11', '01', $tahun - 1) + cadangan_tujuan_resiko($tahun) + get_saldo_awal('12', '01', $tahun - 1) + jumlah_hasil_kode('12', '01') + total_biaya_rat($tahun) + (pendapatan_jasa_usp($tahun) - total_biaya_rat($tahun)); ?>
										<td>Rp. <?php echo number_format((int)$equni, 0, ', ', '.'); ?></td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
					<div class="col-md-12 pt-2">
						<div class="table-responsive">
							<table class="table text-nowrap text-md-nowrap table-hover mg-b-0">
								<thead class="table-info">
									<tr class="kandel">
										<td colspan="4" class="text-right tx-14 text-uppercase"><b>Total Aktiva</b></td>
										<td class="text-right tx-14 text-capitalize"><b>Rp. <?php echo number_format((int)get_saldo_awal('1', '01', $tahun - 1) + get_saldo_awal('2', '01', $tahun - 1) + get_saldo_awal('4', '01', $tahun - 1), 0, ', ', '.'); ?></b></td>
										<td class="text-right tx-14 text-capitalize"><b>Rp. <?php echo number_format((int)$this->transaksi->total_kas_usp($tahun) + total_pinjaman($tahun - 1) + total_pinjaman($tahun) + (get_saldo_awal('4', '01', $tahun - 1) - jumlah_hasil_kode('4', '01')), 0, ', ', '.'); ?></b></td>

										<td colspan="4" class="text-right tx-14 text-uppercase"><b>Total Pasiva</b></td>
										<td class="text-right tx-14 text-capitalize"><b>Rp. <?php echo number_format((int)get_saldo_awal('5', '01', $tahun - 1) + get_saldo_awal('28', '01', $tahun - 1) + get_saldo_awal('29', '01', $tahun - 1) + get_saldo_awal('7', '01', $tahun - 1) + $equ, 0, ', ', '.'); ?></b></td>
										<td class="text-right tx-14 text-capitalize"><b>Rp. <?php echo number_format((int)$equni + modal_tidak_tetap($tahun - 1) + total_simpanan_lain($tahun - 1) + total_simpanan_sukarela($tahun) + get_saldo_awal('6', '01', $tahun - 1) + total_simpanan_pokok($tahun) + total_simpanan_wajib($tahun), 0, ', ', '.'); ?></b></td>
									</tr>
								</thead>
								<tbody> </tbody>
							</table>
						</div>
					</div>
				</div>
			</div>








			<h5 class="mb-4 text-uppercase text-center mt-4 pt-4">neraca induk koperasi<br>periode <?php echo $tahun;?></h5>
			<div class="card mb-4">
				<div class="row row-sm p-1">
					<div class="col-lg-6">
						<div class="table-responsive border">
							<table class="table text-nowrap text-md-nowrap table-hover mg-b-0 tx-14">
								<thead class="table-secondary">
									<tr>
										<th scope="col"></th>
										<th scope="col">AKTIVA</th>
										<th scope="col" class="text-center"><?php echo $tahun - 1; ?></th>
										<th scope="col" class="text-center"><?php echo $tahun; ?></th>
									</tr>
								</thead>
								<tbody class=" tx-14">
									<tr class="kandel">
										<td>I</td>
										<td class="text-uppercase tx-13">aktiva lancar</td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td class="text-right">1 .</td>
										<td>Kas INDUK</td>										
										<td class="text-right">Rp. <?php echo number_format((int)get_saldo_awal('1', '02', $tahun - 1), 0, ', ', '.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)$this->transaksi->total_kas_induk($tahun), 0, ', ', '.'); ?></td>														
									</tr>
									<tr>
										<td class="text-right">2 .</td>
										<td>Modal Disetor / Modal Tetap</td>										
										<td class="text-right">Rp. <?php echo number_format((int)$this->sistem->RowObject('nama', 'pasiva-mtt', 'app_jasa')->isi, 0, ', ', '.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)$this->sistem->RowObject('nama', 'pasiva-mtt', 'app_jasa')->isi, 0, ', ', '.'); ?></td>														
									</tr>
									<tr>
										<td class="text-right">3 .</td>
										<td>MTT [Modal Tidak tetap]</td>										
										<td class="text-right">Rp. <?php echo number_format((int)modal_tidak_tetap($tahun - 1), 0, ', ', '.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)modal_tidak_tetap($tahun - 1) + (total_simpanan_pokok($tahun) + total_simpanan_wajib($tahun)), 0, ', ', '.'); ?></td>														
									</tr>
									<tr>
										<td class="text-right">4 .</td>
										<td>Piutang Barang [sembako]</td>										
										<td class="text-right">Rp. <?php echo number_format((int)get_saldo_awal('23', '02', $tahun - 1), 0, ', ', '.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)($this->transaksi->pembelian_sembako($tahun) - $this->transaksi->penjualan_sembako($tahun)), 0, ', ', '.'); ?></td>														
									</tr>
								</tbody>
								<tfoot class="kandel text-right tx-14">
								<tr>
									<td colspan="2" class="text-capitalize text-end">jumlah</td>
									<td>Rp. <?php echo number_format((int)modal_tidak_tetap($tahun - 1) + get_saldo_awal('1', '02', $tahun - 1) + $this->sistem->RowObject('nama', 'pasiva-mtt', 'app_jasa')->isi + get_saldo_awal('6', '02', $tahun - 1) + get_saldo_awal('23', '02', $tahun - 1), 0, ', ', '.'); ?></td>
									<?php $ais = modal_tidak_tetap($tahun - 1) + $this->transaksi->total_kas_induk($tahun) + $this->sistem->RowObject('nama', 'pasiva-mtt', 'app_jasa')->isi + (total_simpanan_pokok($tahun) + total_simpanan_wajib($tahun)) + ($this->transaksi->pembelian_sembako($tahun) - $this->transaksi->penjualan_sembako($tahun)); ?>
									<td>Rp. <?php echo number_format((int)$ais, 0, ', ', '.'); ?></td>
								</tr>
								</tfoot>
							</table>

							<table class="table text-nowrap text-md-nowrap table-hover mg-b-0 tx-14">
								<thead>
									<tr class="kandel">
										<td>II</td>
										<td class="text-uppercase tx-13">aktiva tetap</td>
										<td></td>
										<td></td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-right">1 .</td>
										<td>APH [Penyusutan Harta]</td>										
										<td class="text-right">Rp. <?php echo number_format((int)get_saldo_awal('32', '02', $tahun - 1), 0, ', ', '.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)get_saldo_awal('32', '02', $tahun), 0, ', ', '.'); ?></td>														
									</tr>
								</tbody>
								<tfoot class="kandel text-right tx-14">
									<tr>
										<td colspan="2" class="text-capitalize text-end">jumlah</td>
										<td>Rp.  <?php echo number_format((int)get_saldo_awal('32', '02', $tahun - 1), 0, ', ', '.'); ?></td>
										<td>Rp. <?php echo number_format((int)get_saldo_awal('32', '02', $tahun), 0, ', ', '.'); ?></td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="table-responsive border">
							<table class="table text-nowrap text-md-nowrap table-hover mg-b-0 tx-14">
								<thead class="table-secondary">
									<tr>
									<th scope="col"></th>
										<th scope="col">PASIVA</th>
										<th scope="col" class="text-center"><?php echo $tahun - 1; ?></th>
										<th scope="col" class="text-center"><?php echo $tahun; ?></th>
									</tr>
								</thead>
								<tbody>
									<tr class="kandel">
										<td>III</td>
										<td colspan="3" class="text-uppercase tx-13">kewajiban lancar</td>
									</tr>
									<tr>
										<td class="text-right">1 .</td>
										<td>Dana Pendidikan</td>										
										<td class="text-right">Rp. <?php echo number_format((int)get_saldo_awal('25', '02', $tahun - 1), 0, ', ', '.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)get_saldo_awal('25', '02', $tahun - 1) + jumlah_hasil_kode('25', '02'), 0, ', ', '.'); ?></td>														
									</tr>
									<tr>
										<td class="text-right">2 .</td>
										<td>Dana Sosial</td>										
										<td class="text-right">Rp. <?php echo number_format((int)get_saldo_awal('26', '02', $tahun - 1), 0, ', ', '.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)get_saldo_awal('26', '02', $tahun - 1) + jumlah_hasil_kode('26', '02'), 0, ', ', '.'); ?></td>														
									</tr>
									<tr>
										<td class="text-right">3 .</td>
										<td>Dana Peng. Daerah Kerja</td>										
										<td class="text-right">Rp. <?php echo number_format((int)get_saldo_awal('27', '02', $tahun - 1), 0, ', ', '.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)get_saldo_awal('27', '02', $tahun - 1) + jumlah_hasil_kode('27', '02'), 0, ', ', '.'); ?></td>														
									</tr>
								</tbody>
								<tfoot class="kandel text-right tx-14">
									<tr>
										<td colspan="2" class="text-capitalize text-end">jumlah</td>
										<td>Rp. <?php echo number_format((int)get_saldo_awal('25', '02', $tahun - 1) + get_saldo_awal('26', '02', $tahun - 1) + get_saldo_awal('27', '02', $tahun - 1), 0, ', ', '.'); ?></td>
										<?php $lancar = get_saldo_awal('25', '02', $tahun - 1) + jumlah_hasil_kode('25', '02') + get_saldo_awal('26', '02', $tahun - 1) + jumlah_hasil_kode('26', '02') + get_saldo_awal('27', '02', $tahun - 1) + jumlah_hasil_kode('27', '02'); ?>
										<td>Rp. <?php echo number_format((int)$lancar, 0, ', ', '.'); ?></td>
									</tr>
								</tfoot>
							</table>

							<table class="table text-nowrap text-md-nowrap table-hover mg-b-0 tx-14">
								<thead>
									<tr class="kandel">
										<td>IV</td>
										<td colspan="3" class="text-uppercase tx-13">kekayaan bersih</td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-right">1 .</td>
										<td>Simpanan Pokok</td>										
										<td class="text-right">Rp. <?php echo number_format((int)total_simpanan_pokok($tahun - 1), 0, ', ', '.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)total_simpanan_pokok($tahun - 1) + total_simpanan_pokok($tahun), 0, ', ', '.'); ?></td>														
									</tr>
									<tr>
										<td class="text-right">2 .</td>
										<td>Simpanan Wajib</td>										
										<td class="text-right">Rp. <?php echo number_format((int)total_simpanan_wajib($tahun - 1), 0, ', ', '.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)total_simpanan_wajib($tahun - 1) + total_simpanan_wajib($tahun), 0, ', ', '.'); ?></td>														
									</tr>
									<tr>
										<td class="text-right">3 .</td>
										<td>Cadangan Umum / Modal</td>										
										<td class="text-right">Rp. <?php echo number_format((int)get_saldo_awal('12', '02', $tahun - 1), 0, ', ', '.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)get_saldo_awal('12', '02', $tahun - 1) + jumlah_hasil_kode('12', '02'), 0, ', ', '.'); ?></td>														
									</tr>
									<tr>
										<td class="text-right">4 .</td>
										<td>SHU Yg Hrs Dibagi</td>										
										<td class="text-right">Rp. <?php echo number_format((int)get_saldo_awal('31', '02', $tahun - 1), 0, ', ', '.'); ?></td>
										<td class="text-right">Rp. <?php echo number_format((int)jumlah_hasil_kode('14', '02') + pendapatan_sembako($tahun), 0, ', ', '.'); ?></td>														
									</tr>
								</tbody>
								<tfoot class="kandel text-right tx-14">
									<tr>
										<td colspan="2" class="text-capitalize text-end">jumlah</td>
										<?php $equitaslalu = total_simpanan_pokok($tahun - 1) + total_simpanan_wajib($tahun - 1) + get_saldo_awal('12', '02', $tahun - 1) + get_saldo_awal('31', '02', $tahun - 1); ?>
										<td>Rp. <?php echo number_format((int)$equitaslalu, 0, ', ', '.'); ?></td>
										<?php $equitasini  = total_simpanan_pokok($tahun) + total_simpanan_wajib($tahun); ?>
										<td>Rp. <?php echo number_format((int)$equitasini + jumlah_hasil_kode('14', '02') + pendapatan_sembako($tahun), 0, ', ', '.'); ?></td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
					<div class="col-md-12 pt-2">
						<div class="table-responsive tx-14">
							<table class="table text-nowrap text-md-nowrap table-hover mg-b-0">
								<thead class="table-info">
									<tr class="">
										<td colspan="4" class="text-right text-uppercase tx-14"><b>Total Aktiva</b></td>
										<td class="text-right tx-14 text-capitalize"><b>Rp. <?php echo number_format((int)$ais + get_saldo_awal('10', '02', $tahun - 1) + get_saldo_awal('6', '02', $tahun - 1) + get_saldo_awal('23', '02', $tahun - 1) + get_saldo_awal('32', '02', $tahun - 1), 0, ', ', '.'); ?></b></td>
										<td class="text-right tx-14 text-capitalize"><b>Rp. <?php echo number_format((int)$ais + get_saldo_awal('32', '02', $tahun), 0, ', ', '.'); ?></b></td>

										<td colspan="4" class="text-right text-uppercase tx-14"><b>Total Pasiva</b></td>
										<td class="text-right tx-14 text-capitalize"><b>Rp. <?php echo number_format((int)$equitaslalu + (get_saldo_awal('25', '02', $tahun - 1) + get_saldo_awal('26', '02', $tahun - 1) + get_saldo_awal('27', '02', $tahun - 1)), 0, ', ', '.'); ?></b></td>
										<td class="text-right tx-14 text-capitalize"><b>Rp. <?php echo number_format((int)$lancar + $equitasini + jumlah_hasil_kode('14', '02') + pendapatan_sembako($tahun), 0, ', ', '.'); ?></b></td>
									</tr>
								</thead>
								<tbody> </tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
