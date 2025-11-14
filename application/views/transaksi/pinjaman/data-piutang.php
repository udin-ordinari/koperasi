<div class="page-wrapper">
	<div class="page-content">
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3"><?php echo $page; ?></div>
				<div class="ps-3">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb mb-0 p-0">
							<li class="breadcrumb-item active kandel" aria-current="page"><?php echo $title; ?></li>
						</ol>
					</nav>
				</div>
				<div class="ms-auto">
					<div class="btn-group">
						<a href="<?php echo base_url('transaksi/pinjaman/form_piutang');?>" class="btn btn-success radius-30 btn-sm text-white"><i class="bx bx-plus-circle"></i>Baru</a>
						<a href="javascript:void(0);" onclick="reload_table();" class="btn btn-primary radius-30 btn-sm"><i class="bx bx-reset"></i>Reload</a>
						<a href="<?php echo base_url('transaksi/pinjaman/cetak_piutang_blm_terbayar'); ?>" target="_blank" class="btn btn-danger radius-30 btn-sm"><i class="bx bx-printer"></i>Cetak</a>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="table-responsive fs-7">
						<table id="piutang_terbayar" class="table mb-0 align-middle">
							<thead class="table-secondary">
								<tr>
									<th class="text-center">No</th>
									<th class="text-center">Anggota</th>
									<th class="text-center">Piutang Pokok</th>
									<th class="text-center">Piutang Bunga</th>
									<th class="text-center">Jumlah</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
<?php
$hasil = $this->db->order_by('user_id', 'asc')->where('pokok >', '0')->where('YEAR(tgl)', $tahun - 1)->get('app_pinjaman_lalu');
$pokok = $this->db->select_sum('pokok')->where('pokok >', '0')->get('app_pinjaman_lalu')->row();
$bunga = $this->db->select_sum('bunga')->where('bunga >', '0')->get('app_pinjaman_lalu')->row();
$no = 1;
foreach($hasil->result() as $row) {
?>
								<tr>
									<td><?php echo $no++; ?>.</td>
									<td><?php echo get_anggota($row->user_id)->nama; ?></td>
									<td class="text-primary kandel">Rp. <?php echo number_format($row->pokok, 0, ', ', '.'); ?></td>
									<td class="text-success kandel">Rp. <?php echo number_format($row->bunga, 0, ', ', '.'); ?></td>
									<td class="text-dark kandel">Rp. <?php echo number_format($row->pokok + $row->bunga, 0, ', ', '.'); ?></td>
									<td><!--<a href="javascript:void(0);" class="btn btn-primary radius-30 btn-xs" title="Bayar" data-href="<?php echo base_url('transaksi/pinjaman/form_bayar_piutang_lalu/'.$row->user_id); ?>" data-name="Pembayaran Piutang Lalu" data-bs-toggle="modal" data-bs-target="#CariModal"><i class="bx bx-credit-card bx-xs"></i></a>-->
									    <a href="javascript:void(0);" class="btn btn-success radius-30 btn-xs" title="Edit" data-href="<?php echo base_url('transaksi/pinjaman/edit_piutang_blm_terbayar/'.$row->user_id); ?>" data-name="Edit Data" data-bs-toggle="modal" data-bs-target="#CariModal"><i class="bx bx-pencil bx-xs"></i></a>
									</td>
								</tr>
<?php } ?>
							</tbody>
							</tfoot>
								<tr>
									<th class="text-center"></th>
									<th class="text-right">Total</th>
									<th class="text-left text-secondary">Rp. <?php echo number_format((int)$pokok->pokok, 0, ', ', '.'); ?></th>
									<th class="text-left text-secondary">Rp. <?php echo number_format((int)$bunga->bunga, 0, ', ', '.'); ?></th>
									<th class="text-left text-secondary">Rp. <?php echo number_format((int)$pokok->pokok + $bunga->bunga, 0, ', ', '.'); ?></th>
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
	var table = $('#piutang_terbayar').DataTable( {
		language: {url:"<?php echo base_url('assets/js/Indonesian.json');?>"},
		autoWidth: false,
        	processing: true,
        	serverSide: false,
		ordering: true,
		order: []
	});
} );
function reload_table()
{
	location.reload();
}

</script>					