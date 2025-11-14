<style>
.page-loader{
    width: 96%;
    min-height: 40vh;
    position: absolute;
    background: #272727;
    z-index: 9000;
    .txt{
        color: #666;
        text-align: center;
        top: 40%;
        position: relative;
        text-transform: capitalize;
        letter-spacing: 0.3rem;
        font-weight: bold;
        line-height: 1.5;
    }
}

/* Spinner animation */
.spinner {
  position: relative;
  top: 35%;
  width: 80px;
  height: 80px;
  margin: 0 auto;
  border: 3px solid #FFF;
  border-radius: 50%;  
  -webkit-animation: prixClipFix 2s linear infinite;
  animation: prixClipFix 2s linear infinite;
}

</style>

<div class="page-loader">
    <div class="spinner"></div>
    <div class="txt">memproses...</div>
</div>


<div class="content">
<?php echo link_tag('assets/plugins/datatable/css/dataTables.bootstrap5.css');?>
<?php echo link_tag('assets/plugins/datatable/css/responsive.bootstrap5.css');?>
<form id="form">
<div class="card">
	<div class="card-body p-2">

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
					$hasil = $this->db->get('app_pinjaman');
					$no = 1;
					foreach($hasil->result() as $row) {
					$user = $this->db->where('id', $row->user_id)->get('app_anggota')->row();
					$cab = $this->db->where('id', $user->cabang)->get('app_cabang')->row();
				?>
					<tr>
						<td class="hidden" style="display: none;"><?php echo $row->user_id; ?></td>
						<td><?php echo $user->ktp; ?></td>
						<td><?php echo $user->nama; ?></td>
						<td><?php echo $user->jk; ?></td>
						<td><?php echo $user->tempat_lahir; ?></td>
						<td><?php echo $user->tanggal_lahir; ?></td>
						<td><?php echo $cab->nama; ?></td>
						<td><?php echo $user->phone; ?></td>
						<td class="hidden" style="display: none;"><?php echo $user->alamat; ?></td>
					</tr>
				<?php } ?>

				</tbody>
			</table>
		</div>
	</div>
</div>
</form>

<?php echo script_tag('assets/plugins/datatable/js/jquery.dataTables.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/js/dataTables.bootstrap5.js'); ?>
<?php echo script_tag('assets/plugins/datatable/dataTables.responsive.min.js'); ?>
<?php echo script_tag('assets/plugins/datatable/responsive.bootstrap5.min.js'); ?>
<script type="text/javascript">
$(function() {
	$(".page-loader").fadeOut('show', function() {
        	$(".content").fadeIn(1000);        
	});
});
var table= $('.lookup').DataTable( {
		language: {url:"<?php echo base_url('assets/js/Indonesian.json');?>"},
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
        $('#modalKing').modal("hide");
	
});
</script>

</div>


