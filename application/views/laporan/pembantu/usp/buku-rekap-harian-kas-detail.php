<div class="card">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered mb-0 fs-7">
				<thead class="table-info">
					<tr class="text-center">
						<th colspan="6"> <?php echo $page; ?> </th>
					</tr>
				</thead>		

				<thead class="table text-capitalize">
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>Periode : </td>
						<td><?php echo bulan($bulan); ?> <?php echo $tahun; ?></td>
					</tr>
				</thead>
				<thead class="table-secondary">
					<tr class="kandel text-uppercase">
						<td>Tanggal</td>
						<td>Akun Perkiraan</td>
						<td>Nama Akun</td>
						<td>Tanda Bukti</td>
						<td>debet</td>
						<td>kredit</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td></td>
						<td class="text-primary kandel"><?php echo get_akun('1')->row()->tipe.'.'.get_akun('1')->row()->jenis.'.'.get_akun('1')->row()->code; ?></td>
						<td><?php echo get_akun('1')->row()->nama; ?> Pada Unit [USP]</td>
						<td></td>
						<td>Rp. </td>
						<td>Rp. </td>
					</tr>
					<tr>
						<td></td>
						<td class="text-primary kandel"><?php echo get_akun('2')->row()->tipe.'.'.get_akun('2')->row()->jenis.'.'.get_akun('2')->row()->code; ?></td>
						<td>Angsuran / Pelunasan <?php echo get_akun('2')->row()->nama; ?></td>
						<td></td>
						<td></td>
						<td>Rp. 135.515.500</td>
					</tr>
					<tr>
						<td></td>
						<td class="text-primary kandel"><?php echo get_akun('13')->row()->tipe.'.'.get_akun('13')->row()->jenis.'.'.get_akun('13')->row()->code; ?></td>
						<td><?php echo get_akun('13')->row()->nama; ?></td>
						<td></td>
						<td>Rp. </td>
						<td>Rp. </td>
					</tr>
					<tr>
						<td></td>
						<td class="text-primary kandel"><?php echo get_akun('28')->row()->tipe.'.'.get_akun('28')->row()->jenis.'.'.get_akun('28')->row()->code; ?></td>
						<td><?php echo get_akun('28')->row()->nama; ?></td>
						<td></td>
						<td></td>
						<td>Rp. </td>
					</tr>
					<tr>
						<td></td>
						<td class="text-primary kandel"><?php echo get_akun('29')->row()->tipe.'.'.get_akun('29')->row()->jenis.'.'.get_akun('29')->row()->code; ?></td>
						<td><?php echo get_akun('29')->row()->nama; ?></td>
						<td></td>
						<td></td>
						<td>Rp. </td>
					</tr>
					<tr>
						<td></td>
						<td class="text-primary kandel"><?php echo get_akun('5')->row()->tipe.'.'.get_akun('5')->row()->jenis.'.'.get_akun('5')->row()->code; ?></td>
						<td><?php echo get_akun('5')->row()->nama; ?></td>
						<td></td>
						<td></td>
						<td>Rp. </td>
					</tr>
					<tr>
						<td></td>
						<td class="text-primary kandel"><?php echo get_akun('35')->row()->tipe.'.'.get_akun('35')->row()->jenis.'.'.get_akun('35')->row()->code; ?></td>
						<td><?php echo get_akun('35')->row()->nama; ?></td>
						<td></td>
						<td></td>
						<td>Rp. </td>
					</tr>
					<tr>
						<td></td>
						<td class="text-primary kandel"><?php echo get_akun('8')->row()->tipe.'.'.get_akun('8')->row()->jenis.'.'.get_akun('8')->row()->code; ?></td>
						<td><?php echo get_akun('8')->row()->nama; ?></td>
						<td></td>
						<td></td>
						<td>Rp. </td>
					</tr>
					<tr>
						<td></td>
						<td class="text-primary kandel"><?php echo get_akun('3')->row()->tipe.'.'.get_akun('3')->row()->jenis.'.'.get_akun('3')->row()->code; ?></td>
						<td><?php echo get_akun('3')->row()->nama; ?></td>
						<td></td>
						<td></td>
						<td>Rp. </td>
					</tr>
					<tr>
						<td></td>
						<td class="text-primary kandel"><?php echo get_akun('36')->row()->tipe.'.'.get_akun('36')->row()->jenis.'.'.get_akun('36')->row()->code; ?></td>
						<td><?php echo get_akun('36')->row()->nama; ?></td>
						<td></td>
						<td></td>
						<td>Rp. </td>
					</tr>
					<tr>
						<td></td>
						<td class="text-primary kandel"><?php echo get_akun('7')->row()->tipe.'.'.get_akun('7')->row()->jenis.'.'.get_akun('7')->row()->code; ?></td>
						<td><?php echo get_akun('7')->row()->nama; ?></td>
						<td></td>
						<td></td>
						<td>Rp. </td>
					</tr>
					<tr>
						<td></td>
						<td class="text-primary kandel"><?php echo get_akun('11')->row()->tipe.'.'.get_akun('11')->row()->jenis.'.'.get_akun('11')->row()->code; ?></td>
						<td><?php echo get_akun('11')->row()->nama; ?></td>
						<td></td>
						<td></td>
						<td>Rp. </td>
					</tr>
					<tr>
						<td></td>
						<td class="text-primary kandel"><?php echo get_akun('14')->row()->tipe.'.'.get_akun('14')->row()->jenis.'.'.get_akun('14')->row()->code; ?></td>
						<td><?php echo get_akun('14')->row()->nama; ?></td>
						<td></td>
						<td></td>
						<td>Rp. </td>
					</tr>
					<tr>
						<td></td>
						<td class="text-primary kandel"><?php echo get_akun('6')->row()->tipe.'.'.get_akun('6')->row()->jenis.'.'.get_akun('6')->row()->code; ?></td>
						<td><?php echo get_akun('6')->row()->nama; ?> USP</td>
						<td></td>
						<td></td>
						<td>Rp. </td>
					</tr>
					<tr>

						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td class="kandel">Rp. </td>
					</tr>
					<tr>
						<td></td>
						<td class="text-primary kandel"><?php echo get_akun('2')->row()->tipe.'.'.get_akun('2')->row()->jenis.'.'.get_akun('2')->row()->code; ?></td>
						<td><?php echo get_akun('2')->row()->nama; ?></td>
						<td></td>
						<td>Rp. </td>
						<td>Rp. </td>
					</tr>
				</tbody>
			</table>






		</div>
	</div>
</div>
