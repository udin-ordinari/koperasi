<div class="page-wrapper">
	<div class="page-content">
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="ms-auto">
				<div class="btn-group"></div>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered mb-0 fs-7">
						<thead class="table-info">
							<tr class="text-center">
								<th colspan="6"> <?php echo $page; ?> </th>
							</tr>
						</thead>
						<thead>
							<tr>
								<td colspan="4"></td>
								<td class="text-right">Periode :</td>
								<td><strong>Januari <?php echo $tahun; ?></strong></td>
							</tr>
							<tr class="kandel text-center table-secondary">
								<td>Tanggal</td>
								<td>No Bukti</td>
								<td>Uraian</td>
								<td>Kode</td>
								<td>Debet</td>
								<td>Kredit</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td></td>
								<td>BKM / BBM</td>
								<td>Angsuran / Pelunasan <?php echo get_akun('2')->row()->akun; ?></td>
								<td><?php echo get_akun('2')->row()->tipe.'.'.get_akun('2')->row()->jenis.'.'.get_akun('2')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('13')->row()->akun; ?></td>
								<td><?php echo get_akun('13')->row()->tipe.'.'.get_akun('13')->row()->jenis.'.'.get_akun('13')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('28')->row()->akun; ?></td>
								<td><?php echo get_akun('28')->row()->tipe.'.'.get_akun('28')->row()->jenis.'.'.get_akun('28')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('29')->row()->akun; ?></td>
								<td><?php echo get_akun('29')->row()->tipe.'.'.get_akun('29')->row()->jenis.'.'.get_akun('29')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('5')->row()->akun; ?></td>
								<td><?php echo get_akun('5')->row()->tipe.'.'.get_akun('5')->row()->jenis.'.'.get_akun('5')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td class="kandel">Jumlah</td>
								<td></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td>BKM / BBM</td>
								<td>Angsuran / Pelunasan <?php echo get_akun('2')->row()->akun; ?></td>
								<td><?php echo get_akun('2')->row()->tipe.'.'.get_akun('2')->row()->jenis.'.'.get_akun('2')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('8')->row()->akun; ?></td>
								<td><?php echo get_akun('8')->row()->tipe.'.'.get_akun('8')->row()->jenis.'.'.get_akun('8')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('3')->row()->akun; ?></td>
								<td><?php echo get_akun('3')->row()->tipe.'.'.get_akun('3')->row()->jenis.'.'.get_akun('3')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('36')->row()->akun; ?></td>
								<td><?php echo get_akun('36')->row()->tipe.'.'.get_akun('36')->row()->jenis.'.'.get_akun('36')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('7')->row()->akun; ?></td>
								<td><?php echo get_akun('7')->row()->tipe.'.'.get_akun('7')->row()->jenis.'.'.get_akun('7')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('11')->row()->akun; ?></td>
								<td><?php echo get_akun('11')->row()->tipe.'.'.get_akun('11')->row()->jenis.'.'.get_akun('11')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('13')->row()->akun; ?></td>
								<td><?php echo get_akun('13')->row()->tipe.'.'.get_akun('13')->row()->jenis.'.'.get_akun('13')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('14')->row()->akun; ?></td>
								<td><?php echo get_akun('14')->row()->tipe.'.'.get_akun('14')->row()->jenis.'.'.get_akun('14')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('6')->row()->akun; ?> USP</td>
								<td><?php echo get_akun('6')->row()->tipe.'.'.get_akun('6')->row()->jenis.'.'.get_akun('6')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('5')->row()->akun; ?></td>
								<td><?php echo get_akun('5')->row()->tipe.'.'.get_akun('5')->row()->jenis.'.'.get_akun('5')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('35')->row()->akun; ?></td>
								<td><?php echo get_akun('35')->row()->tipe.'.'.get_akun('35')->row()->jenis.'.'.get_akun('35')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td>Jumlah</td>
								<td></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td>BKK / BBK</td>
								<td><?php echo get_akun('2')->row()->akun; ?></td>
								<td><?php echo get_akun('2')->row()->tipe.'.'.get_akun('2')->row()->jenis.'.'.get_akun('2')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('3')->row()->akun; ?></td>
								<td><?php echo get_akun('3')->row()->tipe.'.'.get_akun('3')->row()->jenis.'.'.get_akun('3')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('36')->row()->akun; ?></td>
								<td><?php echo get_akun('36')->row()->tipe.'.'.get_akun('36')->row()->jenis.'.'.get_akun('36')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('9')->row()->akun; ?></td>
								<td><?php echo get_akun('9')->row()->tipe.'.'.get_akun('9')->row()->jenis.'.'.get_akun('9')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('8')->row()->akun; ?></td>
								<td><?php echo get_akun('8')->row()->tipe.'.'.get_akun('8')->row()->jenis.'.'.get_akun('8')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('15')->row()->akun; ?></td>
								<td><?php echo get_akun('15')->row()->tipe.'.'.get_akun('15')->row()->jenis.'.'.get_akun('15')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('31')->row()->akun; ?></td>
								<td><?php echo get_akun('31')->row()->tipe.'.'.get_akun('31')->row()->jenis.'.'.get_akun('31')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('37')->row()->akun; ?></td>
								<td><?php echo get_akun('37')->row()->tipe.'.'.get_akun('37')->row()->jenis.'.'.get_akun('37')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('28')->row()->akun; ?></td>
								<td><?php echo get_akun('28')->row()->tipe.'.'.get_akun('28')->row()->jenis.'.'.get_akun('28')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('29')->row()->akun; ?></td>
								<td><?php echo get_akun('29')->row()->tipe.'.'.get_akun('29')->row()->jenis.'.'.get_akun('29')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('7')->row()->akun; ?></td>
								<td><?php echo get_akun('7')->row()->tipe.'.'.get_akun('7')->row()->jenis.'.'.get_akun('7')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('5')->row()->akun; ?></td>
								<td><?php echo get_akun('5')->row()->tipe.'.'.get_akun('5')->row()->jenis.'.'.get_akun('5')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('11')->row()->akun; ?></td>
								<td><?php echo get_akun('11')->row()->tipe.'.'.get_akun('11')->row()->jenis.'.'.get_akun('11')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('38')->row()->akun; ?></td>
								<td><?php echo get_akun('38')->row()->tipe.'.'.get_akun('38')->row()->jenis.'.'.get_akun('38')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('16')->row()->akun; ?></td>
								<td><?php echo get_akun('16')->row()->tipe.'.'.get_akun('16')->row()->jenis.'.'.get_akun('16')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('17')->row()->akun; ?></td>
								<td><?php echo get_akun('17')->row()->tipe.'.'.get_akun('17')->row()->jenis.'.'.get_akun('17')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('22')->row()->akun; ?></td>
								<td><?php echo get_akun('22')->row()->tipe.'.'.get_akun('22')->row()->jenis.'.'.get_akun('22')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('19')->row()->akun; ?></td>
								<td><?php echo get_akun('19')->row()->tipe.'.'.get_akun('19')->row()->jenis.'.'.get_akun('19')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('18')->row()->akun; ?></td>
								<td><?php echo get_akun('18')->row()->tipe.'.'.get_akun('18')->row()->jenis.'.'.get_akun('18')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('20')->row()->akun; ?></td>
								<td><?php echo get_akun('20')->row()->tipe.'.'.get_akun('20')->row()->jenis.'.'.get_akun('20')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo get_akun('39')->row()->akun; ?></td>
								<td><?php echo get_akun('39')->row()->tipe.'.'.get_akun('39')->row()->jenis.'.'.get_akun('39')->row()->kode; ?></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td class="kandel">Jumlah</td>
								<td></td>
								<td>Rp. 0</td>
								<td>Rp. 0</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td class="kandel text-end">Saldo Awal</td>
								<td></td>
								<td>Rp. 0</td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td class="kandel text-end">Saldo Akhir</td>
								<td></td>
								<td>Rp. 0</td>
								<td>Rp. 0</td>
							</tr>
						</tbody>
						<tfoot>
							<td></td>
							<td></td>
							<td></td>
							<td class="kandel">Total</td>
							<td class="kandel text-end">Rp. 0</td>
							<td class="kandel text-end">Rp. 0</td>
						</tfoot>
					</table>
				</div>
			</div>
		</div>


	</div>
</div>
