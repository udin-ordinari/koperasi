<form id="form">
<div class="card custom-card">
	<div class="card-body p-1">
		<div class="table-responsive">
			<table class="table table-striped table-bordered lookup" style="cursor:pointer">
				<thead class="table-dark text-center">
					<tr>
						<th class="hidden" style="display: none;">No</th>
						<th class="text-white">E KTP</th>
						<th class="text-white">Nama Anggota</th>
						<th class="text-white">L / P</th>
						<th class="text-white">Tempat Lahir</th>
						<th class="text-white">Tanggal Lahir</th>
						<th class="text-white">Cabang</th>
						<th class="text-white">No HP / WA</th>
						<th class="hidden" style="display: none;">Alamat</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$hasil = $this->db->where('status', 'aktif')->get('app_anggota');
					$no = 1;
					foreach($hasil->result() as $row) {
					$cab = $this->db->where('id', $row->cabang)->get('app_cabang')->row();
				?>
					<tr>
						<td class="hidden" style="display: none;"><?php echo $row->id; ?></td>
						<td><?php echo $row->ktp; ?></td>
						<td><?php echo $row->nama; ?></td>
						<td><?php echo $row->jk; ?></td>
						<td><?php echo $row->tempat_lahir; ?></td>
						<td><?php echo $row->tanggal_lahir; ?></td>
						<td><?php echo $cab->nama; ?></td>
						<td><?php echo $row->phone; ?></td>
						<td class="hidden" style="display: none;"><?php echo $row->alamat; ?></td>
					</tr>
				<?php } ?>

				</tbody>
			</table>
		</div>
	</div>
</div>
</form>

<script type="text/javascript">
var table= $('.lookup').DataTable( {
		autoWidth: false,
        	processing: true,
        	serverSide: false,
		ordering: true,
		order: []
} );
var tableBody = '.lookup tbody';
$(tableBody).on('click', 'tr', function () {
	var cursor = table.row($(this));
	var data = cursor.data();
	$('form').find("input[name='userid'][type='text']").val(data[0]);
	$('form').find("input[name='ktp'][type='text']").val(data[1]);
	$('form').find("input[name='nama'][type='text']").val(data[2]);
	$('form').find("input[name='jk'][type='text']").val(data[3]);
	$('form').find("input[name='tempat'][type='text']").val(data[4]);
	$('form').find("input[name='tgl_lahir'][type='text']").val(data[5]);
	$('form').find("input[name='cabang'][type='text']").val(data[6]);
	$('form').find("input[name='phone'][type='text']").val(data[7]);
	$('form').find("input[name='alamat'][type='text']").val(data[8]);
        $('#modalFull').modal("hide");
	
});
</script>

</div>