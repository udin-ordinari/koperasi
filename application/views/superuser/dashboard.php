<div class="main-content">
	<div class="page-content">
                <div class="container-fluid">
			<div class="mb-3">
                        	<div class="card-body">
                            		<div class="row g-2">
                                		<div class="col-sm-auto ms-auto">
                                    			<div class="d-flex">
                                        			<button class="btn btn-danger Hapusi" onclick="Kosongi();"><i class="bx bxs-trash me-2 fs-16 align-middle"></i> Hapus Session ?</button>
                                    			</div>
                                		</div>
					</div>
				</div>
			</div>
			<div class="row">
                        	<div class="col-lg-12">
                            	<div class="card">
                                	<div class="card-header">
                                    		<h4 class="card-title mb-0 text-center">Histori Pengunjung</h4>
					</div>
                                	<div class="card-body">
                                		<div class="table-responsive">
						<table class="pengunjung table align-middle mb-0" id="pengunjung">
							<thead class="table-dark tengah">
								<tr class="text-center">
									<th class="text-white">No</th>
									<th class="text-white">IP Address</th>
									<th class="text-white">Waktu</th>
									<th class="text-white">Alat</th>
									<th class="text-white">Perkiraan Asal</th>
								</tr>
							</thead>
							<tbody> </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
	var table = $('#pengunjung').DataTable( {

		ajax: "<?php echo base_url('superuser/get_pengunjung');?>",
	});
});
function Kosongi()
{
	$('.Hapusi').attr('disabled', 'disabled');
	Notiflix.Confirm.show(
		'Konfirmasi Kosongi Session',
		'Apakah Anda Ingin Menghapus Semua Session Yang Ada Di Database ?',
		'Iya','Tidak', () => {
			$(".Hapusi").removeAttr('disabled');
			Notiflix.Loading.circle('Tunggu Sebentar !', {backgroundColor: 'rgba(0,0,0,0.9)', messageMaxLength: '100'});
			setTimeout(function()
			{
				Notiflix.Loading.change('Sedang Memproses...');
				$.post("<?php echo base_url('superuser/hapus_session');?>", function(response)
				{
					var res = response;

					if (res.status == 'green')
					{
						new jBox('Notice', {attributes: {x: 'right', y: 'top'}, stack: false, animation: {open: 'fadeIn', close: 'zoomIn'}, showCountdown: true, color: res.status, title: res.title, content: res.message});
						setTimeout(function()
						{
							document.location.href = '<?php echo base_url();?>';
						}, 2500);
					}
					else
					{
						new jBox('Notice', {attributes: {x: 'right', y: 'top'}, stack: false, animation: {open: 'fadeIn', close: 'zoomIn'}, showCountdown: true, color: 'red', title: 'Maaf !', content: 'Ada Masalah Dengan Databasenya !'});				
					}
				});

			}, 2000);
			Notiflix.Loading.remove(3000);
		},
		() => {
			$(".Hapusi").removeAttr('disabled');
			Notiflix.Loading.remove();
			Notiflix.Report.info('Lah !','Ngga Jadi Dihapus Gan ?!','Iya',);
		},
	);
}
</script>