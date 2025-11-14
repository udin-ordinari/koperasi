<div class="main-content">
	<div class="page-content">
		<div class="container-fluid">
			<div class="row">
                        	<div class="col-12">
                            		<div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                		<h4 class="mb-sm-0"><?php echo $page; ?> <span class="text-muted"><?php echo $title; ?></span></h4>
						<div class="page-title-right">
                                    			<ol class="breadcrumb m-0">
								<button type="button" class="btn btn-success btn-icon-text my-2 me-2" onclick="location.href='<?php echo base_url("transaksi/pinjaman/pengajuan_baru");?>'">
							<i class="fal fa-plus-circle fa-fw fa-lg me-2"></i> Baru
						</button>
						<button type="button" class="btn btn-primary btn-icon-text my-2 me-2" onclick="Reload();">
							<i class="fal fa-circle-radiation me-2 fa-lg muter"></i> Reload
						</button>
							</ol>
						</div>
					</div>
                        	</div>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table mb-0 align-middle table-bordered" id="pinjaman">
							<thead class="table-dark">
								<tr>
									<th class="text-center text-white">No</th>
									<th class="text-center text-white">Kode</th>
									<th class="text-center text-white">Tanggal</th>
									<th class="text-center text-white">Nama</th>
									<th class="text-center text-white">Pengajuan</th>
									<th class="text-center text-white">Diterima</th>
									<th class="text-center text-white">Sisa</th>
									<th class="text-center text-white">Aksi</th>
								</tr>
							</thead>
							<tbody></tbody>
							</tfoot>
							<?php
								$total = $this->db->select_sum('total')->where('status', 'disetujui')->where('YEAR(tgl)', $tahun)->get('app_pinjaman')->row();
								$terima = $this->db->select_sum('pencairan')->where('status', 'disetujui')->where('YEAR(tgl)', $tahun)->get('app_pinjaman')->row();
								$sisane = $this->db->select_sum('jumlah')->where('status', 'disetujui')->where('YEAR(tgl)', $tahun)->get('app_pinjaman')->row();
							?>
								<tr>
									<th class="text-center"></th>
									<th class="text-center"></th>
									<th class="text-center"></th>
									<th class="text-center fs-6">Total</th>
									<th class="text-center fs-6 text-info">Rp. <?php echo number_format((int)$total->total, 0, ', ', '.'); ?></th>
									<th class="text-center fs-6 text-warning">Rp. <?php echo number_format((int)$terima->pencairan, 0, ', ', '.'); ?></th>
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

<script type="text/javascript">
$(document).ready(function() {
	var table = $('#pinjaman').DataTable( {
		language: {url:"<?php echo base_url('assets/js/Indonesian.json');?>"},
		autoWidth: true,
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