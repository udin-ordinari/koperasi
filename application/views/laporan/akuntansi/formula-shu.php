<?php echo link_tag('assets/plugins/datatable/css/dataTables.bootstrap5.css');?>
<?php echo link_tag('assets/plugins/datatable/css/responsive.bootstrap5.css');?>
<div class="main-content side-content pt-0">
	<div class="main-container container-fluid">
		<div class="inner-body">
			<div class="page-header d-flex justify-content-center">
				<div class="text-center mb-2">
					<h2 class="text-uppercase tx-bold tx-18"><?php echo $title; ?><br>periode <?php echo $tahun;?></h2>						
				</div>
			</div>
		</div>

		<div class="row row-sm">
			<div class="col-lg-12">
				<div class="card custom-card overflow-hidden">
					<div class="card-body">
						<div class="table-responsive tx-14">
							<table class="table " id="phu">
								<thead class="bg-success">							
									<tr style="white-space: normal;">
										<th class="text-center text-white" style="vertical-align: middle;">No</th>
										<th class="text-white" style="vertical-align: middle;">Nama</th>
										<th class="text-center text-white" style="vertical-align: middle;">Jml Simpanan</th>
										<th class="text-center text-white" style="vertical-align: middle;">Jml Simpanan Anggota</th>
										<th class="text-center text-white" style="vertical-align: middle;">Perolehan dari PHU Induk</th>
										<th class="text-center text-white" style="vertical-align: middle;">Perolehan dari PHU USP (50%)</th>
										<th class="text-center text-white" style="vertical-align: middle;">Angs. Bunga Terbayar</th>
										<th class="text-center text-white" style="vertical-align: middle;">Jumlah Angs. Bunga Terbayar</th>
										<th class="text-center text-white" style="vertical-align: middle;">SHU Simpanan (INDUK)</th>
										<th class="text-center text-white" style="vertical-align: middle;">SHU Jasa Simpanan</th>
										<th class="text-center text-white" style="vertical-align: middle;">Jumlah (9+10)</th>
										<th class="text-center text-white" style="vertical-align: middle;">SHU Pemberi Jasa</th>
										<th class="text-center text-white" style="vertical-align: middle;">Total SHU Dibagi <?php echo tahun_buku()->periode; ?></th>
									</tr>
								</thead>
								<tbody>
<?php $hasil = $this->db->where('status', 'aktif')->get('app_anggota'); $no = 1; foreach($hasil->result() as $row) { ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $row->nama; ?></td>
<?php $sim = $this->db->select_sum('jumlah')->where('YEAR(tgl) <=', $tahun)->where('user_id', $row->id)->get('app_simpanan')->row(); ?>
									<td>Rp. <?php if(empty($sim->jumlah)) { echo '0'; } else { echo number_format($sim->jumlah, 0, ', ', '.'); } ?></td>
<?php $sima = $this->db->select_sum('jumlah')->where('YEAR(tgl) <=', $tahun)->get('app_simpanan')->row(); ?>
									<td>Rp. <?php if(empty($sima->jumlah)) { echo '0'; } else { echo number_format($sima->jumlah, 0, ', ', '.'); } ?></td>
<?php $phu_induk = shu_dibagi_induk(); ?>
									<td>Rp. <?php if(empty($phu_induk->total)) { echo '0'; } else { echo number_format($phu_induk->jumlah / 2, 0, ', ', '.'); } ?></td>
<?php $phu_usp = $this->db->where('akun_id', '41')->where('YEAR(tgl) <=', $tahun)->get('app_transaksi')->row(); ?>
									<td>Rp. <?php if(empty($phu_usp->jumlah)) { echo '0'; } else { echo number_format($phu_usp->jumlah / 2, 0, ', ', '.'); } ?></td>
<?php $bb = $this->db->where('user_id', $row->id)->get('app_angsuran')->row(); ?>
									<td>Rp. <?php if(empty($bb->bunga)) { echo '0'; } else { echo number_format((int)$bb->bunga, 0, ', ', '.'); } ?></td>
<?php $jbb = $this->db->select_sum('bunga', 'total')->get('app_angsuran')->row(); ?>
									<td>Rp. <?php if(empty($jbb->total)) { echo '0'; } else { echo number_format((int)$jbb->total, 0, ', ', '.'); } ?></td>

<?php $shu_simp = $phu_induk->jumlah ?? '0' * $sim->jumlah ?? '0' / $sima->jumlah ?? '0'; ?>
									<td>Rp. <?php echo number_format($shu_simp, 0, ', ', '.'); ?></td>
<?php $shu_usp = $phu_usp->jumlah ?? '0' * $sim->jumlah ?? '0' / $sima->jumlah ?? '0'; $shujasasimp = $shu_usp ?? '0' / 2 * $sim->jumlah ?? '0' / $sima->jumlah ?? '0';?>
									<td>Rp. <?php echo number_format((int)$shujasasimp, 0, ', ', '.'); ?></td>
									<td>Rp. <?php echo number_format((int)$shu_usp + $shu_simp, 0, ', ', '.'); ?></td>
<?php if(empty($bb->bunga_terbayar)) { $jasan = '0'; } else { $jasan = $bb->bunga_terbayar; } ?>
									<td>Rp. <?php $shu_jasa = jumlah_hasil_kode('41', '01') ?? '0' * 50 * $sim->jumlah ?? '0' / $sima->jumlah ?? '0'; echo number_format((int)$shu_jasa, 0, ', ', '.'); ?></td>
									<td>Rp. <?php echo number_format($shu_usp + $shu_simp + $shu_jasa, 0, ', ', '.'); ?></td>
								</tr>
<?php } ?>
							</tbody>
							<tfoot>
								<tr>
									<th colspan="2" style="text-align: right;">Jumlah</th>
									<th>Rp. </th>
									<th>Rp. </th>
									<th>Rp. </th>
									<th>Rp. </th>
									<th>Rp. </th>
									<td>Rp. </td>
									<td>Rp. </td>
									<td>Rp. </td>
									<td>Rp. </td>
									<td>Rp. </td>
									<td>Rp. </td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo script_tag('assets/plugins/datatable/js/jquery.dataTables.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/js/dataTables.bootstrap5.js'); ?>
<?php echo script_tag('assets/plugins/datatable/dataTables.responsive.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/responsive.bootstrap5.min.js'); ?>
<script type="text/javascript">
$(document).ready(function() {
	var table = $('#phu').DataTable( {
		language: {url:"<?php echo base_url('assets/js/Indonesian.json');?>"},
		autoWidth: false,
        	processing: true,
        	serverSide: false,
		ordering: true,
		order: []
	});
} );
</script>