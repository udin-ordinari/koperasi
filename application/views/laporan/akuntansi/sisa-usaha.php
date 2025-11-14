<?php echo link_tag('assets/plugins/datatable/css/dataTables.bootstrap5.css');?>
<?php echo link_tag('assets/plugins/datatable/css/buttons.bootstrap5.min.css');?>
<?php echo link_tag('assets/plugins/datatable/css/responsive.bootstrap5.css');?>
<div class="main-content side-content pt-0">
	<div class="main-container container-fluid">
		<div class="inner-body">
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-20 mg-b-5"><?php echo $page; ?> <span class="text-muted"><?php echo $title; ?></span></h2>
				</div>
				<div class="d-flex">
					<div class="justify-content-center">
						<a href="javascript:void(0);" class="btn bg-primary text-white">Cetak</a>
					</div>
				</div>
			</div>
			<h6 class="mb-0 text-uppercase text-center bolder text-uppercase" style="line-height: 1.5rem;"><?php echo $title; ?><br>periode <?php echo $tahun;;?></h6>
			<hr/>

				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered tx-14">
								<thead class="bg-secondary">
									<tr>
										<th class="text-white align-middle">No</th>
										<th class="text-white align-middle">Nama</th>
										<th class="text-center align-middle text-white" style="white-space:normal">Jml Simpanan</th>
										<th class="text-center align-middle text-white" style="white-space:normal">Jml Pinjaman & Belanja</th>
										<th class="text-center align-middle text-white" style="white-space:normal">SHU Simpanan</th>
										<th class="text-center align-middle text-white" style="white-space:normal">SHU Pinjaman & Belanja</th>
										<th class="text-white align-middle">Jumlah</th>
										<th class="text-center align-middle text-white" style="white-space:normal">SHU USP Pemberi Jasa</th>
										<th class="text-center align-middle text-white" style="white-space:normal">SHU</th>
										<th class="text-center align-middle text-white" style="white-space:normal">PPH SHU 10%</th>
										<th class="text-center align-middle text-white" style="white-space:normal">SHU Dibagi</th>
									</tr>
								</thead>
								<tbody>
<?php $hasil = $this->db->where('status', 'aktif')->get('app_anggota'); $no = 1; foreach($hasil->result() as $row) { ?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $row->nama; ?></td>
<?php $sim = $this->db->select_sum('jumlah')->where('YEAR(tgl) <=', $tahun)->where('user_id', $row->id)->group_start()->where('jns_simp', '1')->or_where('jns_simp', '2')->or_where('jns_simp', '4')->group_end()->get('app_simpanan')->row(); ?>
										<td>Rp. <?php if($sim->jumlah == '') { echo '0'; } else { echo number_format($sim->jumlah, 0, ', ', '.'); } ?></td>
										<td>-</td>


<?php
$simp 		= $this->db->select_sum('jumlah')->where('YEAR(tgl) <=', $tahun)->where('user_id', $row->id)->get('app_simpanan')->row();
$sima 		= $this->db->select_sum('jumlah')->where('YEAR(tgl) <=', $tahun)->get('app_simpanan')->row();
$phu_induk 	= $this->db->where('akun_id', '31')->where('unit', '02')->where('YEAR(tgl) <=', $tahun)->get('app_transaksi')->row();
$phu_usp 	= $this->db->where('akun_id', '31')->where('unit', '01')->where('YEAR(tgl) <=', $tahun)->get('app_transaksi')->row();
$bb 		= $this->db->where('user_id', $row->id)->where('YEAR(tgl) <=', $tahun)->get('app_pinjaman')->row();
$jbb 		= $this->db->select_sum('bunga', 'total')->where('YEAR(tgl) <=', $tahun)->get('app_pinjaman_lalu')->row();
$shu_simp 	= $phu_induk->jumlah ?? '0' * $sim->jumlah ?? '0' / $sima->jumlah ?? '0';
$shu_usp 	= $phu_usp->jumlah ?? '0' * $sim->jumlah ?? '0' / $sima->jumlah ?? '0';

if(empty($bb->bunga)) { $jasan = '0'; } else { $jasan = $bb->bunga; } $shu_jasa = $phu_usp->jumlah ?? '0' * $jasan ?? '0' / $jbb->total ?? '0';

$mbuh 		= $phu_usp->jumlah ?? '0' * 0.50;

$bung_terbayar	= $this->db->select_sum('bunga', 'total')->where('user_id', $row->id)->where('YEAR(tgl) <=', $tahun)->get('app_angsuran')->row();
$bunga_terbayar	= $this->db->select_sum('bunga', 'total')->where('YEAR(tgl) <=', $tahun)->get('app_angsuran')->row();


?>
										<td>Rp. <?php echo number_format((int)($mbuh * $sim->jumlah) ?? '0' / $sima->jumlah, 0, ', ', '.'); ?></td>
										<td>-</td>
										<td>Rp. <?php echo number_format((int)($mbuh * $sim->jumlah) ?? '0' / $sima->jumlah, 0, ', ', '.'); ?></td>
										<td>Rp. <?php echo number_format($mbuh * $bung_terbayar->total ?? '0' / $bunga_terbayar->total ?? '0', 0, ', ', '.'); ?></td>
<?php $hasil = ($mbuh * $sim->jumlah) ?? '0' / $sima->jumlah; $presen = $hasil / 100 * 10; ?>
										<td>Rp. <?php echo number_format($hasil, 0, ', ', '.'); ?></td>
										<td>Rp. <?php echo number_format($presen, 0, ', ', '.'); ?></td>
										<td>Rp. <?php echo number_format($hasil - $presen, 0, ', ', '.'); ?></td>
									</tr>
<?php } ?>
								</tbody>
								<tfoot>
									<tr>
										<th colspan="2" style="text-align: right;">Jumlah</th>
										<th>Rp. <?php echo number_format((int)$sima->jumlah, 0, ', ', '.'); ?></th>
										<th>-</th>
										<th>Rp. </th>
										<th>Rp. </th>
										<th>Rp. </th>
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
<?php echo script_tag('assets/plugins/datatable/js/dataTables.buttons.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/js/buttons.bootstrap5.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/js/jszip.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/pdfmake/pdfmake.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/pdfmake/vfs_fonts.js'); ?>
<?php echo script_tag('assets/plugins/datatable/js/buttons.html5.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/js/buttons.print.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/js/buttons.colVis.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/dataTables.responsive.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/responsive.bootstrap5.min.js'); ?>
<script type="text/javascript">
$(document).ready(function() {
	var table = $('#example').DataTable( {
		language: {url:"<?php echo base_url('assets/js/Indonesian.json');?>"},
		autoWidth: false,
        	processing: true,
        	serverSide: false,
		ordering: true,
		order: []
	});
} );
</script>