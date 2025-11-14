			<div class="row row-sm sembunyi" id="metune">
				<div class="col-lg-12">
					<div class="card custom-card">
						<div class="card-body">
							<div class="table-responsive border">
								<table class="table text-nowrap text-md-nowrap mg-b-0">
									<thead class="tx-14">
										<tr class="text-center bg-primary">
											<th colspan="9" class="text-white"> BUKU KAS USP </th>
										</tr>
										<tr>
											<td colspan="7"></td>
											<td class="text-end"> Periode : </td>
											<td class="text-capitalize"><strong><span id="bulane"></span> <?php echo $tahun; ?></strong></td>
										</tr>
										<tr class="text-center bg-secondary">
											<td class="text-white"> No. </td>
											<td class="text-white" colspan="3"> Tanggal </td>
											<td class="text-white"> U r a i a n </td>
											<td class="text-white"> No. Bukti </td>
											<td class="text-white"> Debet </td>
											<td class="text-white"> Kredit </td>
											<td class="text-white"> Saldo </td>
										</tr>
										<tr class="tx-13">
											<td colspan="6"></td>
											<td></td>
											<td class="text-uppercase tx-13"> Saldo awal </td>
											<td> Rp. <?php echo number_format(get_saldo_awal('1', '01', $tahun - 1), 0, ', ', '.');?> </td>
										</tr>
									</thead>
									<tbody>

									</tbody>
								</table>
							</div>

						</div>
					</div>
				</div>
			</div>
