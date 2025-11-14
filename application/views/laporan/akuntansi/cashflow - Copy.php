			<div class="main-content side-content pt-0">

				<div class="main-container container-fluid">
					<div class="inner-body">
						<!-- Row -->
						<div class="row row-sm pt-4">
							<div class="col-lg-12">
								<div class="card custom-card overflow-hidden">
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered border-bottom">
												<thead class="table-dark">
													<tr class="text-center">
														<th class="text-white">No</th>
														<th class="text-white">Uraian</th>
														<th class="text-white">Kas <?php echo $tahun - 1; ?></th>
														<th class="text-white">Kas <?php echo $tahun; ?></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>1.</td>
														<td><a href="<?php echo base_url('laporan/akuntansi/cashflow_usp');?>" class="kandel">Usaha Simpan Pinjam [USP]</a></td>
														<td>Rp. <?php echo number_format((int)get_saldo_awal('1', '01', $tahun - 1), 0, ', ', '.'); ?></td>
														<td>Rp. <?php echo number_format((int)$this->transaksi->total_kas_usp($tahun), 0, ', ', '.'); ?></td>
													</tr>
							
													<tr>
														<td>2.</td>
														<td><a href="<?php echo base_url('laporan/akuntansi/cashflow_induk');?>" class="kandel">Induk Koperasi</a></td>
														<td>Rp. <?php echo number_format((int)get_saldo_awal('1', '02', $tahun - 1), 0, ', ', '.'); ?></td>
														<td>Rp. <?php echo number_format((int)$this->transaksi->total_kas_induk($tahun), 0, ', ', '.'); ?></td>
													</tr>
												</tbody>
												<tfoot>
													<tr>
														<td class="kandel fs-6 text-right" colspan="2">Jumlah</td>
														<td class="kandel fs-6">Rp. <?php echo number_format((int)get_saldo_awal('1', '01', $tahun - 1) + get_saldo_awal('1', '02', $tahun - 1), 0, ', ', '.'); ?></td>
														<td class="kandel fs-6">Rp. <?php echo number_format($this->transaksi->total_kas_usp($tahun) + $this->transaksi->total_kas_induk($tahun), 0, ', ', '.'); ?></td>
													</tr>
												</tfoot>
											</table>
										</div>
									</div>
									<span class="mb-4 pt-0 mt-0 kandel text-warning text-center" style="text-shadow: 1px 1px 0px #000000; font-size: 18px;">Aliran kas selengkapnya bisa di klik pada Cashflow masing - masing. * Silahkan klik salah satu untuk detailnya.</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>