<div class="card">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered text-nowrap text-md-nowrap mb-0 tx-14">
				<thead class="">
					<tr class="text-center bg-primary">
						<th colspan="7" class="text-white"> <?php echo $judule; ?> </th>
					</tr>
					<tr class="tx-bold text-capitalize bg-success">
						<td class="text-center text-white" colspan="5">BKM / BBM : 01</td>
						<td class="text-end text-white">Periode : </td>
						<td class="text-start text-white"><?php echo bulan($bulan); ?> <?php echo $tahun; ?></td>
					</tr>
					<tr class="tx-14">
						<td>Telah Terima Dari</td>
						<td class="text-center">:</td>
						<td>Bendahara Koperasi</td>
						<td></td>
						<td></td>
						<td class="text-center">[ Anggota / Bkn. Anggota ]</td>
						<td>Dalam Hurup</td>
					</tr>
					<tr class="tx-14">
						<td>Tunai</td>
						<td class="text-center">:</td>
						<td class="text-capitalize">Rp. 1</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="tx-14">
						<td>Chek No</td>
						<td class="text-center">:</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="tx-14">
						<td>Bank</td>
						<td class="text-center">:</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="tx-14">
						<td class="kandel">Jumlah</td>
						<td class="text-center">:</td>
						<td>Rp. </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="tx-14">
						<td class="kandel text-danger">Peruntukan</td>
						<td class="text-center">:</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="tx-14">
						<td>Angsuran / Pelunasan <?php echo get_akun('2')->row()->nama; ?></td>
						<td class="text-center">:</td>
						<td>Rp. </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="tx-14">
						<td>Pendapatan Jasa</td>
						<td class="text-center">:</td>
						<td>Rp. </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="tx-14">
						<td>Simpanan Pokok</td>
						<td class="text-center">:</td>
						<td>Rp. </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="tx-14">
						<td>Simpanan Wajib</td>
						<td class="text-center">:</td>
						<td>Rp. </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="tx-14">
						<td>Simpanan Sukarela</td>
						<td class="text-center">:</td>
						<td>Rp. </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>

					<tr class="tx-14">
						<td>.</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="tx-14">
						<td class="kandel text-center">Mengetahui, </td>
						<td class="kandel text-center" colspan="4">Sub. Bag. Kas</td>
						<td class="kandel text-center" colspan="2">Yang Menyetor,</td>
					</tr>
					<tr class="table table-borderless">
						<td>.</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="table table-borderless">
						<td>.</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="tx-14">
						<td class="kandel text-center">[......................]</td>
						<td class="kandel text-center" colspan="4">[......................]</td>
						<td class="kandel text-center" colspan="2">[......................]</td>
					</tr>

				</thead>		
			</table>
<br>
			<table class="table table-bordered mb-0 tx-14">
				<thead class="table text-capitalize">
					<tr>
						<td colspan="3" class="kandel text-start">diisi oleh sub akuntansi</td>
						<td class="text-start">Tgl Pembukuan</td>
						<td></td>
						<td>Hal Buku Jurnal</td>
						<td></td>
					</tr>
				</thead>
				<thead class="bg-secondary text-capitalize">
					<tr>
						<td class="text-white" colspan="3"></td>
						<td class="text-white" class="text-start">kode</td>
						<td class="text-white">uraian</td>
						<td class="text-white">debet</td>
						<td class="text-white">kredit</td>
					</tr>
				</thead>
				<tbody class="tx-14">
					<tr class="tx-14">
						<td></td>
						<td></td>
						<td></td>
						<td class="text-primary tx-14"><?php echo get_akun('1')->row()->tipe.'.'.get_akun('1')->row()->jenis.'.'.get_akun('1')->row()->code; ?></td>
						<td><?php echo get_akun('1')->row()->nama; ?> Pada Unit [USP]</td>
						<td>Rp. </td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td class="text-primary tx-14"><?php echo get_akun('2')->row()->tipe.'.'.get_akun('2')->row()->jenis.'.'.get_akun('2')->row()->code; ?></td>
						<td>Angsuran / Pelunasan <?php echo get_akun('2')->row()->nama; ?></td>
						<td></td>
						<td>Rp. 135.515.500</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td class="text-primary tx-14"><?php echo get_akun('13')->row()->tipe.'.'.get_akun('13')->row()->jenis.'.'.get_akun('13')->row()->code; ?></td>
						<td><?php echo get_akun('13')->row()->nama; ?></td>
						<td></td>
						<td>Rp. </td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td class="text-primary tx-14"><?php echo get_akun('17')->row()->tipe.'.'.get_akun('17')->row()->jenis.'.'.get_akun('17')->row()->code; ?></td>
						<td><?php echo get_akun('17')->row()->nama; ?></td>
						<td></td>
						<td>Rp. </td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td class="text-primary tx-14"><?php echo get_akun('18')->row()->tipe.'.'.get_akun('18')->row()->jenis.'.'.get_akun('18')->row()->code; ?></td>
						<td><?php echo get_akun('18')->row()->nama; ?></td>
						<td></td>
						<td>Rp. </td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td class="text-primary tx-14"><?php echo get_akun('5')->row()->tipe.'.'.get_akun('5')->row()->jenis.'.'.get_akun('5')->row()->code; ?></td>
						<td><?php echo get_akun('5')->row()->nama; ?></td>
						<td></td>
						<td>Rp. </td>
					</tr>

					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>Jumlah</td>
						<td>Rp. </td>
						<td>Rp. </td>
					</tr>
				</tbody>
			</table>




			<table class="table table-bordered mb-0 fs-7">
				<thead class="">
					<tr class="text-center">
						<th colspan="7"> . </th>
					</tr>
					<tr class="tx-bold text-capitalize bg-primary">
						<td class="text-center text-white" colspan="5">BKM / BBM : 02</td>
						<td class="text-end text-white">Periode : </td>
						<td class="text-start text-white"><?php echo bulan($bulan); ?> <?php echo $tahun; ?></td>
					</tr>
					<tr class="table">
						<td>Telah Terima Dari</td>
						<td class="text-center">:</td>
						<td>Bendahara Koperasi</td>
						<td></td>
						<td></td>
						<td class="text-center">[ Anggota / Bkn. Anggota ]</td>
						<td>Dalam Hurup</td>
					</tr>
					<tr class="table">
						<td>Tunai</td>
						<td class="text-center">:</td>
						<td>Rp. 0</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="table">
						<td>Chek No</td>
						<td class="text-center">:</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="table">
						<td>Bank</td>
						<td class="text-center">:</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="table">
						<td class="kandel">Jumlah</td>
						<td class="text-center">:</td>
						<td>Rp. </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="table">
						<td class="kandel text-danger">Peruntukan</td>
						<td class="text-center">:</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="table">
						<td>Pelunasan</td>
						<td class="text-center">:</td>
						<td>Rp. </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="table">
						<td>Per Kas</td>
						<td class="text-center">:</td>
						<td>Rp. </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="table">
						<td></td>
						<td class="text-center"></td>
						<td>Rp. </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td><?php echo get_akun('8')->row()->nama; ?></td>
						<td class="text-center">:</td>
						<td>Rp. </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="table">
						<td></td>
						<td class="text-center"></td>
						<td>Rp. </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td><?php echo get_akun('3')->row()->nama; ?></td>
						<td class="text-center">:</td>
						<td>Rp. </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>Apa Ya</td>
						<td class="text-center">:</td>
						<td>Rp. </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="table">
						<td></td>
						<td class="text-center"></td>
						<td>Rp. </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="table">
						<td><?php echo get_akun('7')->row()->nama; ?></td>
						<td class="text-center">:</td>
						<td>Rp. </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="table">
						<td></td>
						<td class="text-center">.</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="table">
						<td></td>
						<td class="text-center"></td>
						<td>Rp. </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="table">
						<td><?php echo get_akun('11')->row()->nama; ?></td>
						<td class="text-center">:</td>
						<td>Rp. </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="table">
						<td></td>
						<td class="text-center"></td>
						<td>Rp. </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>Jasa Pinjaman</td>
						<td class="text-center">:</td>
						<td>Rp. </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>Jasa Per Kas</td>
						<td class="text-center">:</td>
						<td>Rp. </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="table">
						<td></td>
						<td class="text-center"></td>
						<td>Rp. </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="table">
						<td><?php echo get_akun('14')->row()->nama; ?></td>
						<td class="text-center">:</td>
						<td>Rp. </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="table">
						<td></td>
						<td class="text-center">:</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="table">
						<td><?php echo get_akun('6')->row()->nama; ?></td>
						<td class="text-center">:</td>
						<td>Rp. </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="table">
						<td></td>
						<td class="text-center">:</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="table">
						<td><?php echo get_akun('5')->row()->nama; ?></td>
						<td class="text-center">:</td>
						<td>Rp. </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="table">
						<td>Pengembalian Sembako</td>
						<td class="text-center">:</td>
						<td>Rp. </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="table">
						<td></td>
						<td class="text-center">:</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="table">
						<td></td>
						<td>&nbsp;</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="table">
						<td class="kandel text-center">Mengetahui, </td>
						<td class="kandel text-center" colspan="4">Sub. Bag. Kas</td>
						<td class="kandel text-center" colspan="2">Yang Menyetor,</td>
					</tr>
					<tr class="table table-borderless">
						<td>.</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="table table-borderless">
						<td>.</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr class="table">
						<td class="kandel text-center">[......................]</td>
						<td class="kandel text-center" colspan="4">[......................]</td>
						<td class="kandel text-center" colspan="2">[......................]</td>
					</tr>

				</thead>		
			</table>
<br>
			<table class="table table-bordered mb-0 fs-7">
				<thead class="table text-capitalize">
					<tr>
						<td colspan="3" class="kandel text-start">diisi oleh sub akuntansi</td>
						<td class="text-start">Tgl Pembukuan</td>
						<td></td>
						<td>Hal Buku Jurnal</td>
						<td></td>
					</tr>
				</thead>
				<thead class="bg-secondary text-capitalize">
					<tr>
						<td colspan="3"></td>
						<td class="text-center text-white">kode</td>
						<td class="text-center text-white">uraian</td>
						<td class="text-center text-white">debet</td>
						<td class="text-center text-white">kredit</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td class="text-primary tx-14"><?php echo get_akun('1')->row()->tipe.'.'.get_akun('1')->row()->jenis.'.'.get_akun('1')->row()->code; ?></td>
						<td><?php echo get_akun('1')->row()->nama; ?> Pada Unit [USP]</td>
						<td>Rp. </td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td class="text-primary tx-14"><?php echo get_akun('2')->row()->tipe.'.'.get_akun('2')->row()->jenis.'.'.get_akun('2')->row()->code; ?></td>
						<td>Angsuran / Pelunasan <?php echo get_akun('2')->row()->nama; ?></td>
						<td></td>
						<td>Rp. 135.515.500</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td class="text-primary tx-14"><?php echo get_akun('8')->row()->tipe.'.'.get_akun('8')->row()->jenis.'.'.get_akun('8')->row()->code; ?></td>
						<td><?php echo get_akun('8')->row()->nama; ?></td>
						<td></td>
						<td>Rp. </td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td class="text-primary tx-14"><?php echo get_akun('3')->row()->tipe.'.'.get_akun('3')->row()->jenis.'.'.get_akun('3')->row()->code; ?></td>
						<td><?php echo get_akun('3')->row()->nama; ?></td>
						<td></td>
						<td>Rp. </td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td class="text-primary tx-14">2</td>
						<td>Apa Ya </td>
						<td></td>
						<td>Rp. </td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td class="text-primary tx-14"><?php echo get_akun('7')->row()->tipe.'.'.get_akun('7')->row()->jenis.'.'.get_akun('7')->row()->code; ?></td>
						<td><?php echo get_akun('7')->row()->nama; ?></td>
						<td></td>
						<td>Rp. </td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td class="text-primary tx-14"><?php echo get_akun('11')->row()->tipe.'.'.get_akun('11')->row()->jenis.'.'.get_akun('11')->row()->code; ?></td>
						<td><?php echo get_akun('11')->row()->nama; ?></td>
						<td></td>
						<td>Rp. </td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td class="text-primary tx-14"><?php echo get_akun('13')->row()->tipe.'.'.get_akun('13')->row()->jenis.'.'.get_akun('13')->row()->code; ?></td>
						<td><?php echo get_akun('13')->row()->nama; ?></td>
						<td></td>
						<td>Rp. </td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td class="text-primary tx-14"><?php echo get_akun('14')->row()->tipe.'.'.get_akun('14')->row()->jenis.'.'.get_akun('14')->row()->code; ?></td>
						<td><?php echo get_akun('14')->row()->nama; ?></td>
						<td></td>
						<td>Rp. </td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td class="text-primary tx-14"><?php echo get_akun('6')->row()->tipe.'.'.get_akun('6')->row()->jenis.'.'.get_akun('6')->row()->code; ?></td>
						<td><?php echo get_akun('6')->row()->nama; ?> USP</td>
						<td></td>
						<td>Rp. </td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td class="text-primary tx-14"><?php echo get_akun('5')->row()->tipe.'.'.get_akun('5')->row()->jenis.'.'.get_akun('5')->row()->code; ?></td>
						<td><?php echo get_akun('5')->row()->nama; ?></td>
						<td></td>
						<td>Rp. </td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td class="text-primary tx-14">3</td>
						<td>Apa Ya 3</td>
						<td></td>
						<td>Rp. </td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>Jumlah</td>
						<td>Rp. </td>
						<td>Rp. </td>
					</tr>
				</tbody>	
				<tfoot>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td class="bg-dark text-white">Jumlah Kas Masuk</td>
						<td>Rp. </td>
						<td></td>
					</tr>
				</tfoot>
			</table>


		</div>
	</div>
</div>
