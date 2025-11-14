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
						<a href="<?php echo base_url('transaksi/pinjaman/pengajuan');?>" class="btn btn-success radius-30 btn-sm text-white"><i class="bx bx-plus-circle"></i>Baru</a>
						<a href="javascript:void(0);" onclick="reload_table();" class="btn btn-primary radius-30 btn-sm"><i class="bx bx-reset"></i>Reload</a>
						<a href="<?php echo base_url('transaksi/pinjaman/cetak_piutang_blm_terbayar'); ?>" target="_blank" class="btn btn-danger radius-30 btn-sm"><i class="bx bx-printer"></i>Cetak</a>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="table-responsive fs-7">
						<table id="piutang_belum_terbayar" class="piutang_belum_terbayar table mb-0 align-middle">
							<thead class="table-secondary">
								<tr>
									<th class="text-center">No</th>
									<th class="text-center">Tgl</th>
									<th class="text-center">Anggota</th>
									<th class="text-center">Uraian</th>
									<th class="text-center">Sisa Pinjaman</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>	
							<tbody>
<?php
$hasil = $this->db->where('jenis', 'palunasan')->where('YEAR(tgl) <=', $tahun)->order_by('user_id', 'asc')->get('app_angsuran');
$a = $this->db->select_sum('pokok')->where('jenis', 'palunasan')->where('YEAR(tgl) <=', $tahun)->get('app_angsuran')->row();
$b = $this->db->select_sum('bunga')->where('jenis', 'palunasan')->where('YEAR(tgl) <=', $tahun)->get('app_angsuran')->row();

$total = $a->pokok + $b->bunga;

$no = 1;
foreach($hasil->result() as $row) {
?>
								<tr>
									<td><?php echo $no++; ?>.</td>
									<td><?php echo tgl_jabar($row->tgl); ?></td>
									<td><?php echo get_anggota($row->user_id)->nama; ?> <span class="text-danger kandel"><?php echo get_cabang(get_anggota($row->user_id)->cabang)->nama; ?></span></td>
									<td>Pinjaman <?php echo get_jenis_pinjaman($row->jns_pinj)->nama; ?> Rp. <?php echo number_format($row->jumlah, 0, ', ', '.'); ?> [ <?php echo $row->cicil; ?> X ] </td>
									<td class="text-success kandel">Rp. <?php echo number_format($row->total, 0, ', ', '.'); ?></td>
									
									<td>
										<a href="<?php echo base_url('transaksi/pinjaman/piutang_lalu_anggota/'.$row->user_id); ?>" class="btn btn-info text-white radius-30 btn-xs" title="Angsur"><i class="bx bx-credit-card bx-xs"></i></a>
										<a href="javascript:void(0);" class="btn btn-warning radius-30 btn-xs" title="Edit" data-href="<?php echo base_url('transaksi/pinjaman/edit_piutang/'.$row->user_id); ?>" data-name="Edit Data" data-bs-toggle="modal" data-bs-target="#CariModal"><i class="bx bx-pencil bx-xs"></i></a>
									</td>
								</tr>
<?php } ?>
							</tbody>
							</tfoot>
								<tr>
									<th></th>
									<th></th>
									<th class="text-right text-secondary">Total Pinjaman : </th>
									<th class="text-center text-secondary">Rp. <?php echo number_format((int)$total, 0, ', ', '.'); ?></th>
									<th class="text-center text-secondary">Rp. <?php echo number_format((int)$total, 0, ', ', '.'); ?></th>
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
	var table = $('#piutang_belum_terbayar').DataTable( {
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