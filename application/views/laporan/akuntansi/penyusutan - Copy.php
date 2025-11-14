<div class="main-content side-content pt-0">
	<div class="main-container container-fluid">
		<div class="inner-body">
			<div class="page-header d-flex justify-content-center">
				<div class="pt-1 text-center mb-2">
					<h2 class="text-uppercase tx-bold tx-20"><?php echo $title; ?><br>periode <?php echo $tahun;?></h2>						
				</div>
			</div>
		</div>

		<div class="row row-sm">
			<div class="col-lg-12">
				<div class="card custom-card">
					<div class="card-body">
						<div class="table-responsive border tx-14">
							<table class="table text-nowrap text-md-nowrap table-bordered mg-b-0">
									<thead>
										<tr class="bg-secondary">
											<th colspan="2" class="text-center"></th>
											<th colspan="5" scope="col" class="text-center text-uppercase text-white">perolehan</th>
											<th colspan="3" scope="col" class="text-center text-uppercase text-white">penyusutan</th>
											<th scope="col" class="text-center text-uppercase text-white">nilai buku</th>
											<th scope="col" class="text-center text-uppercase text-white">keterangan</th>


										</tr>
										<tr class="bg-primary">
											<th scope="col" class="text-center text-white">No</th>
											<th scope="col" class="text-center text-white">Nama Barang</th>
											<th scope="col" class="text-center text-uppercase text-white">Aktiva</th>
											<th scope="col" class="text-center text-white">Vol</th>
											<th scope="col" class="text-center text-white">Sat</th>
											<th scope="col" class="text-center text-white">Nilai (Rp.)</th>
											<th scope="col" class="text-center text-white">Jumlah (Rp.)</th>
											<th scope="col" class="text-center text-white">10 %</th>
											<th scope="col" class="text-center text-white">Jumlah (%)</th>
											<th scope="col" class="text-center text-white">Nilai Susut (Rp.)</th>
											<th scope="col" class="text-center text-white">(Rp.)</th>
											<th scope="col" class="text-center text-white">-</th>
										</tr>
										<tr>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center"><?php echo $tahun; ?></th>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center"></th>
										</tr>
									</thead>
									<tbody>
<?php $no = 1; foreach(get_list_barang()->result() as $row) { ?>
										<tr>
											<td>I</td>
											<td></td>
											<td class="text-center"></td>
											<td><?php $cek = $this->db->where('akun_id', '6')->get('app_transaksi');?></td>
											<td class="text-center">Item</td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
<?php } ?>
<?php if($cek->num_rows() > 0) { $no = 1; foreach($cek->result() as $row) { ?>
										<tr>
											<td style="text-align: right;"><?php echo $no++; ?>.</td>
											<td class="text-uppercase"><?php echo $row->keterangan; ?></td>
											<td class="text-center"></td>
											<td></td>
											<td class="text-center"></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
<?php } } ?>

									</tbody>
									<tfoot>
										<tr>
											<td class="kandel text-uppercase" colspan="2" style="text-align: center;">jumlah dipindahkan</td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td>12</td>
										</tr>
									</tfoot>
								</table>

								<hr>

								<table class="table mb-0 fs-7">
									<thead class="table-secondary">
										<tr>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center"></th>
										</tr>
										<tr>
											<th colspan="2" scope="col" class="text-center">jumlah pindahan</th>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center">Rp. </th>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center"></th>
											<th scope="col" class="text-center"></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th scope="col">II.</th>
											<td class="text-uppercase kandel">sub</td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
										<?php $hasil = $this->db->where('id', '32')->get('app_akun'); foreach($hasil->result() as $row) { ?>
										<tr>

											<td style="text-align: right;"><?php echo $row->tipe.'.'.$row->jenis.'.'.$row->kode; ?></td>
											<td><?php echo $row->akun; ?></td>
											<td style="text-align: right;">Rp. 0</td>
											<td style="text-align: right;">Rp. 0</td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
										<?php } ?>
									</tbody>
									<tfoot>
										<tr>
											<td class="kandel text-uppercase" colspan="2" style="text-align: center;">jumlah</td>
											<td class="kandel" style="text-align: right;">Rp. -</td>
											<td class="kandel" style="text-align: right;">Rp. -</td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
									</tfoot>
								</table>

							</div>
						</div>
			</div>
		</div>
	</div>
</div>
