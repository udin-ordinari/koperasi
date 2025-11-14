<div class="main-content side-content pt-0">
	<div class="main-container container-fluid">
		<div class="inner-body">
			<div class="page-header d-flex justify-content-center">
				<div class="pt-1 text-center mb-2">
					<h2 class="text-uppercase tx-bold tx-18"><?php echo $title; ?><br>periode <?php echo $tahun;?></h2>						
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
									<tr class="bg-secondary table-bordered">
										<th scope="col" colspan="2"></th>
										<th colspan="4" scope="col" class="text-center text-uppercase text-white">perolehan</th>
										<th colspan="2" scope="col" class="text-center text-uppercase text-white">penyusutan</th>
										<th scope="col" class="text-center text-uppercase text-white">nilai buku</th>
										<th scope="col" class="text-center text-uppercase text-white">keterangan</th>
									</tr>
									<tr class="bg-primary table-bordered">
										<th scope="col" class="text-center text-white">No</th>
										<th scope="col" class="text-center text-white">Nama Barang</th>
										<th scope="col" class="text-center text-white">Vol</th>
										<th scope="col" class="text-center text-white">Sat</th>
										<th scope="col" class="text-center text-white">Nilai</th>
										<th scope="col" class="text-center text-white">Jumlah</th>
										<th scope="col" class="text-center text-white">Dalam %</th>
										<th scope="col" class="text-center text-white">Nilai Susut</th>
										<th scope="col" class="text-center text-white">(Rp.)</th>
										<th scope="col" class="text-center text-white">-</th>
									</tr>
								</thead>
								<tbody>

								<?php $no = 1; foreach(get_list_barang()->result() as $row) { ?>

									<tr>
										<td class="text-center tx-13"><?php echo $no++; ?>. </td>
										<td class="tx-13"><?php echo $row->nama; ?></td>
										<td class="text-center tx-13"><?php echo $row->jumlah; ?></td>
										<td class="text-center tx-13"><?php echo get_satuan($row->satuan)->nama; ?></td>
										<td class="text-center tx-13"></td>
										<td class="tx-13">Rp. <?php echo number_format((int)$row->jumlah * $row->harga, 0, ' , ' , '.'); ?></td>
										<td class="text-center tx-13"><?php echo $this->sistem->RowObject('nama', 'persen-aph', 'app_jasa')->isi; ?></td>
										<td class="tx-13">Rp. <?php echo number_format(($this->sistem->RowObject('nama', 'persen-aph', 'app_jasa')->isi / 100) * ($row->jumlah * $row->harga), 0, ' , ' , '.'); ?></td>
										<td class="tx-13">Rp. <?php echo number_format(($row->jumlah * $row->harga) - ($this->sistem->RowObject('nama', 'persen-aph', 'app_jasa')->isi / 100) * ($row->jumlah * $row->harga), 0, ' , ' , '.'); ?></td>
										<td class="text-center tx-13"><?php echo $row->keterangan; ?></td>
									</tr>
								<?php } ?>

								</tbody>
								<tfoot>
									<tr>
										<td class="tx-bold text-capitalize text-end" colspan="5">Sub jumlah</td>
										<?php $totsub = $this->db->select_sum('total')->get('app_barang')->row(); ?>
										<td>Rp. <?php echo number_format((int)$totsub->total, 0, ' , ' , '.'); ?></td>
										<td class="text-center"><?php echo $this->sistem->RowObject('nama', 'persen-aph', 'app_jasa')->isi;?></td>
										<td class="text-center"><?php $asil = ($this->sistem->RowObject('nama', 'persen-aph', 'app_jasa')->isi / 100) * $totsub->total; echo number_format((int)$asil, 0, ' , ' , '.');?></td>
										<td>Rp. <?php echo number_format((int)$totsub->total - $asil, 0, ' , ' , '.'); ?></td>
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
</div>
