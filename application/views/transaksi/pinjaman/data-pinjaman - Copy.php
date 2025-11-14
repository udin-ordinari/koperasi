<?php echo link_tag('assets/plugins/datatable/css/dataTables.bootstrap5.css');?>
<?php echo link_tag('assets/plugins/datatable/css/buttons.bootstrap5.min.css');?>
<?php echo link_tag('assets/plugins/datatable/css/responsive.bootstrap5.css');?>
<div class="main-content side-content pt-0">
	<div class="main-container container-fluid">
		<div class="inner-body">
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-20 mg-b-5"><?php echo $page; ?> <span class="breadcrumb-item"><a href="javascript:void(0);"><?php echo $title.' '.$tahun; ?></a></span></h2>
				</div>

				<div class="d-flex">
					<div class="justify-content-center">
						<button type="button" class="btn btn-success btn-icon-text my-2 me-2" onclick="location.href='<?php echo base_url("transaksi/pinjaman/pengajuan_baru");?>'">
							<i class="fal fa-plus-circle fa-fw fa-lg me-2"></i> Baru
						</button>
						<button type="button" class="btn btn-primary btn-icon-text my-2 me-2" onclick="Reload();">
							<i class="fal fa-circle-radiation me-2 fa-lg muter"></i> Reload
						</button>
					</div>
				</div>
			</div>
			<div class="row row-sm">
				<div class="col-lg-12">
					<div class="card custom-card overflow-hidden">
						<div class="card-body">
							<div class="table-responsivetx-14">
								<table id="pinjaman" class="table mb-0 align-middle table-bordered">
									<thead class="table-dark">
										<tr>
											<th class="text-center text-white">No</th>
											<th class="text-center text-white">Tanggal</th>
											<th class="text-center text-white">Kode</th>
											<th class="text-center text-white">Nama</th>
											<th class="text-center text-white">Pengajuan</th>
											<th class="text-center text-white">Diterima</th>
											<th class="text-center text-white">Sisa</th>
											<th class="text-center text-white">Aksi</th>
										</tr>
									</thead>
									<tbody>
									<?php
										$hasil = $this->db->where('status', 'disetujui')->where('YEAR(tgl)', $tahun)->order_by('tgl', 'desc')->get('app_pinjaman');
										$total = $this->db->select_sum('total')->where('status', 'disetujui')->where('YEAR(tgl)', $tahun)->get('app_pinjaman')->row();
										$terima = $this->db->select_sum('pencairan')->where('status', 'disetujui')->where('YEAR(tgl)', $tahun)->get('app_pinjaman')->row();
										$sisane = $this->db->select_sum('jumlah')->where('status', 'disetujui')->where('YEAR(tgl)', $tahun)->get('app_pinjaman')->row();
										$no = 1;
										foreach($hasil->result() as $row) {
									?>
										<tr>
											<td><?php echo $no++; ?>.</td>
											<td><?php echo tgl_jabar($row->tgl); ?></td>
											<td class="text-danger"><?php echo $row->kode; ?></td>
											<td><?php echo get_anggota($row->user_id)->nama; ?> [ <span class="text-primary"><?php echo get_jenis_pinjaman($row->jns_pinj)->nama; ?>, <?php echo $row->tempo; ?> X</span> ]</td>
											<td class="text-primary kandel">Rp. <?php echo number_format($row->total, 0, ', ', '.'); ?></td>
											<td class="text-success kandel">Rp. <?php echo number_format($row->pencairan, 0, ', ', '.'); ?></td>
											<td class="text-warning kandel">Rp. <?php echo number_format($row->jumlah, 0, ', ', '.'); ?></td>
											<td>
												<a href="javascript:void(0);" class="btn btn-primary radius-30 btn-xs" title="Detail Data Pinjaman" data-href="<?php echo base_url('transaksi/pinjaman/detail_pinjaman/'.$row->id); ?>" data-name="Detail Data Pinjaman" data-bs-toggle="modal" data-bs-target="#PreviewModal"><i class="bx bx-check-circle bx-xs"></i></a>	
												<a href="javascript:void(0);" class="btn btn-warning radius-30 btn-xs" title="Edit" data-href="<?php echo base_url('transaksi/pinjaman/edit_pinjaman/'.$row->id); ?>" data-name="Edit Data" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="bx bx-pencil bx-xs"></i></a>
					
											</td>
										</tr>
									<?php } ?>
									</tbody>
									</tfoot>
										<tr>
											<th class="text-center"></th>
											<th class="text-center"></th>
											<th class="text-center"></th>
											<th class="text-center fs-6">Total</th>
											<th class="text-center fs-6 text-secondary">Rp. <?php echo number_format((int)$total->total, 0, ', ', '.'); ?></th>
											<th class="text-center fs-6 text-secondary">Rp. <?php echo number_format((int)$terima->pencairan, 0, ', ', '.'); ?></th>
											<th class="text-center fs-6 text-secondary">Rp. <?php echo number_format((int)$sisane->jumlah, 0, ', ', '.'); ?></th>
											<th class="text-center"></th>
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
	var table = $('#pinjaman').DataTable( {
		language: {url:"<?php echo base_url('assets/js/Indonesian.json');?>"},
		autoWidth: false,
        	processing: true,
        	serverSide: false,
		ordering: true,
		order: [],
		ajax: "<?php echo base_url('transaksi/pinjaman/get_data_pinjaman');?>",
	});
});
function Reload()
{
	var table = $('#pinjaman').DataTable();
	$('.muter').addClass('fa-spin');
	table.ajax.reload(function() {
		$('.muter').removeClass('fa-spin');
	});
	return false;
}
</script>