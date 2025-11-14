<div class="main-content side-content">
	<div class="main-container container-fluid">
		<div class="inner-body">
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-20 mg-b-5"><?php echo $pagetitle; ?> <span class="text-muted"><?php echo $title; ?></span></h2>
				</div>
			</div>	
			
			<div class="card custom-card" style="margin-top: -20px;">
				<div class="card-body">
				<form class="row g-3" id="form">
					<input type="text" name="app_token" id="app_token" class="form-control sembunyi" value="<?php echo session('app_token'); ?>">
					<input type="text" name="userid" id="userid" class="form-control sembunyi">
					<div class="col-md-3">
						<label for="tgl">Tanggal</label>
						<div class="input-group">
							<div class="input-group-text border-end-0">
								<i class="fe fe-calendar lh--9 op-6"></i>
							</div>
							<input type="text" class="form-control text-dark fc-datepicker" name="tgl_trans" id="tgl_trans" placeholder="mm / dd / yyyy">
						</div>
					</div>
					<div class="col-md-3 mb-2">
						<label for="ktp">Cari Anggota</label>
						<input type="text" class="form-control text-dark" id="ktp" name="ktp" data-bs-toggle="modal" data-bs-target="#modalKing" data-href="<?php echo base_url('master/anggota/cari_anggota');?>" data-name="Cari Data Anggota">
					</div>
					<div class="col-md-4">
						<label for="input2">Nama Lengkap</label>
						<input type="text" class="form-control text-dark" id="nama" name="nama" readonly>
					</div>
					<div class="col-md-2">
						<label for="input3">Jenis Kelamin</label>
						<input type="text" class="form-control text-dark" id="jk" name="jk" readonly>
					</div>
					<div class="col-md-3 mb-2">
						<label for="input4">Tempat Lahir</label>
						<input type="text" class="form-control text-dark" id="tempat" name="tempat" readonly>
					</div>
					<div class="col-md-3">
						<label for="input3">Tanggal Lahir</label>
						<input type="text" class="form-control text-dark" id="tgl_lahir" name="tgl_lahir" readonly>
					</div>
					<div class="col-md-3">
						<label for="input6">No HP / WA</label>
						<input type="text" class="form-control text-dark" id="phone" name="phone" readonly>
					</div>
					<div class="col-md-3">
						<label for="input5">Cabang</label>
						<input type="text" class="form-control text-dark" id="cabang" name="cabang" readonly>
					</div>
					<div class="col-md-12">
						<label for="input5">Alamat</label>
						<input type="text" class="form-control text-dark" id="alamat" name="alamat" readonly>
					</div>
					<div class="col-lg-12 mt-4 text-center">
						<div class="p-0 rounded">
							<button type="button" class="btn btn-primary checko" onclick="CekTabungan();"><i class="fal fa-search fa-fw fa-lg mr-2"></i>Cek Tabungan</button>
						</div>
					</div>
					
					<div class="col-lg-12 mt-4">
						<div class="border border-3 p-4 rounded">
							<div class="row g-3">
								<div class="col-md-3">
									<label for="jumlah">Simpanan Pokok</label>
									<div class="input-group">
										<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
										<input type="text" class="form-control" id="pokok" name="pokok" burem readonly>
									</div>
								</div>
								<div class="col-md-3">
									<label for="jumlah">Simpanan Wajib</label>
									<div class="input-group">
										<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
										<input type="text" class="form-control uang" id="wajib" name="wajib" burem readonly>
									</div>
								</div>
								<div class="col-md-3">
									<label for="jumlah">Simpanan Lain - lain / SWP</label>
									<div class="input-group">
										<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
										<input type="text" class="form-control uang" id="lainnya" name="lainnya" burem readonly>
									</div>
								</div>
								<div class="col-md-3 mb-2">
									<label for="jumlah">Simpanan Sukarela</label>
									<div class="input-group">
										<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
										<input type="text" class="form-control uang" id="sukarela" name="sukarela" burem readonly>
									</div>
								</div>
								<div class="col-md-3">
									<label for="jumlah">Jasa Simpanan Sukarela</label>
									<div class="input-group">
										<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
										<input type="text" class="form-control uang" id="jasa" name="jasa" burem readonly>
									</div>
								</div>
								<div class="col-md-3">
									<label for="jumlah">Total Penutupan Simpanan</label>
									<div class="input-group">
										<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
										<input type="text" class="form-control uang" id="kabeh" name="kabeh" burem readonly>
									</div>
								</div>
								<div class="col-md-6 mb-4">	
									<label for="jumlah">Keterangan Penutupan Simpanan</label>
									<div class="input-group">											
										<input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan Penarikan Simpanan / Purna / Keluar dari anggota">
									</div>
								</div>
										<div class="col-md-12">
											<span class="kandel text-warning fs-6">Total Jasa Sukarela Dihitung Dari Total Simpanan Sukarela Periode Berjalan.</span>
										</div>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group row justify-content-end mb-4">
					<div class="col-md-8 ps-md-2">
						<button type="reset" class="btn ripple btn-secondary pd-x-30 mr-3"><i class="fa-light fa-broom-wide fa-fw fa-lg mr-2"></i>Reset</button>
						<button class="btn ripple btn-success pd-x-30 mg-r-5" id="btnProses">Proses <i class="fal fa-envelope-circle-check fa-fw fa-lg ml-2"></i></button>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>

<?php echo script_tag('assets/plugins/bootstrap/js/bootstrap-datepicker.js'); ?>
<?php echo script_tag('assets/js/datepicker.js'); ?>
<script type="text/javascript">
$(document).ready(function(){
	$('.uang').mask('000.000.000.000.000.000', {reverse: true});
});
function CekTabungan()
{
	var tgl_trans = $("#tgl_trans").val();
	var anggota   = $("#userid").val();
	var nama      = $("#nama").val();
	if (tgl_trans == "")
	{
		Swal.fire({
			title: "Maaf !",
			html: "Silahkan Pilih Tanggal Transaksi<br>Terlebih Dahulu !",
			icon: "warning",
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ok",
			}).then((result) => {
				if (result.isConfirmed) {
						
				} else {
						
				}
		});
	}
	else if(anggota == "")
	{
		Swal.fire({
				title: "Maaf !",
				text: "Silahkan Pilih Anggota Dulu !",
				icon: "warning",
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: "Ulangi",
				});
	}
	else
	{
		var values = {app_token: $('#app_token').val(), userid: $('#userid').val()};
		$('#checko').html('<div class="light-loader1" role="status"><span class="sr-only"></span></div>&nbsp; Memproses');
		$.post("<?php echo base_url('master/simpanan/cari_data_simpanan');?>", values, function(response)
		{
			$("#checko").html("<i class='fal fa-search fa-fw fa-lg mr-2'></i>Cek Tabungan");
			if (response.status == 'success')
			{

				var pok	  = response.pokok;
				var re 	  = pok.toString().split('').reverse().join(''),
				pokok	  = re.match(/\d{1,3}/g);
				pokok	  = pokok.join('.').split('').reverse().join('');
				$('#pokok').val(pokok);

				var wjb	  = response.wajib;
				var rev	  = wjb.toString().split('').reverse().join(''),
				wajib	  = rev.match(/\d{1,3}/g);
				wajib	  = wajib.join('.').split('').reverse().join('');
				$('#wajib').val(wajib);

				var swp	  = response.lain;
				var reve  = swp.toString().split('').reverse().join(''),
				lain	  = reve.match(/\d{1,3}/g);
				lain	  = lain.join('.').split('').reverse().join('');
				$('#lainnya').val(lain);

				if(response.sukarela_awal == null)
				{
					sukawal = 0;
				}
				else
				{
					sukawal = response.sukarela_awal;
				}
				if(response.sukarela == null)
				{
					sukarela = 0;
				}
				else
				{
					sukarela = response.sukarela;
				}
				var totsuka = parseInt(sukawal) + parseInt(sukarela);
				var reverb   = totsuka.toString().split('').reverse().join(''),
				totsukarela  = reverb.match(/\d{1,3}/g);
				totsukarela  = totsukarela.join('.').split('').reverse().join('');
				$('#sukarela').val(totsukarela);

				var suka  = sukarela;
				var rever = suka.toString().split('').reverse().join(''),
				sukarela  = rever.match(/\d{1,3}/g);
				sukarela  = sukarela.join('.').split('').reverse().join('');

				var bunga	= "<?php echo $this->sistem->RowObject('nama', 'jasa-ss', 'app_jasa')->isi; ?>";

				var itung 	= Number(bunga) * Number(totsuka);

				var reverse 	= itung.toString().split('').reverse().join(''),
				itungan		= reverse.match(/\d{1,3}/g);
				itungan		= itungan.join('.').split('').reverse().join('');

				var mbuh  = Math.round(itung / 10);
				var jusa  = mbuh.toString().split('').reverse().join(''),
				jasasuk	  = jusa.match(/\d{1,3}/g);
				jasasuk   = jasasuk.join('.').split('').reverse().join(''); 

                		var tarik = parseInt(response.pokok) + parseInt(response.wajib) + parseInt(response.lain) + parseInt(totsuka) + parseInt(mbuh);
				var redol = tarik.toString().split('').reverse().join(''),
				tarikan	  = redol.match(/\d{1,3}/g);
				tarikan   = tarikan.join('.').split('').reverse().join('');                

				$('#jasa').val(jasasuk);
				$('#kabeh').val(tarikan);				
			}
			else
			{
				Swal.fire({
					title: response.title,
					html: '<b>' + nama + '</b><br>' + response.message,
					icon: response.status
				});
				
			}
		})
	}
}
$('#form').on('submit', function(e) {
	$('#btnProses').attr('disabled', 'disabled');
	$('#btnProses').html('<div class="light-loader1" role="status"><span class="sr-only"></span></div>&nbsp; Memproses');
	var userid 	= $('#userid').val();
	var tgl_trans	= $('#tgl_trans').val();
	var form 	= $(this);

	e.preventDefault();

	if(userid == "")
	{
		Swal.fire({
			title: "Maaf !",
			text: "Silahkan Pilih Anggota Dulu",
			icon: "warning",
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ulangi"
		});
		$('#btnProses').removeAttr('disabled');
		$("#btnProses").html("Proses <i class='fal fa-envelope-circle-check fa-fw fa-lg ml-2'></i>");
	}
	else if (tgl_trans == "")
	{
		Swal.fire({
			title: "Maaf !",
			html: "Silahkan Pilih Tanggal Terlebih Dahulu !",
			icon: "warning",
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ok",
		});
		$('#btnProses').removeAttr('disabled');
		$("#btnProses").html("Proses <i class='fal fa-envelope-circle-check fa-fw fa-lg ml-2'></i>");
	}
	else if (keterangan == "")
	{
		Swal.fire({
			title: "Maaf !",
			html: "Silahkan Isi Keterangan Terlebih Dahulu !",
			icon: "warning",
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ok"
		});
		$('#btnProses').removeAttr('disabled');
		$("#btnProses").html("Proses <i class='fal fa-envelope-circle-check fa-fw fa-lg ml-2'></i>");
	}
	else
	{
		$.ajax({
			url: "<?php echo base_url('transaksi/simpanan/proses_penutupan_simpanan'); ?>",
                     	method:"POST",  
                     	data:new FormData(this),  
                     	contentType: false,  
                     	cache: false,  
                     	processData:false,  
			success: function(data)
			{
				$('#btnProses').removeAttr('disabled');
				$("#btnProses").html("Proses <i class='fal fa-envelope-circle-check fa-fw fa-lg ml-2'></i>");
				if(data.status == 'success')
				{
					$('#CariModal').hide();
					Swal.fire({
							title: "Terima Kasih !",
							html: "Apakah Anda Ingin Input Data Lagi ?",
							icon: "success",
							showDenyButton: true,
							confirmButtonColor: "#3085d6",
							cancelButtonColor: "#d33",
							confirmButtonText: "Iya ",
							denyButtonText: "Tidak",
							}).then((result) => {
								if (result.isConfirmed)
								{
									location.reload();
								}
								else if (result.isDenied)
								{
									location.reload();
								}
							});
					
				}
				else
				{
					$('.btnProses').html("Proses <i class='fal fa-envelope-circle-check fa-fw fa-lg ml-2'></i>");
					$('.btnProses').removeAttr('disabled');
					Lobibox.notify(data.status, {title: data.title, position: 'top right', icon: true, msg: data.message});
				}
			},
			error: function()
			{
				Swal.fire({
					title: "Maaf !",
					html: "Permintaan Anda Tidak Bisa Diproses !",
					icon: "error",
					confirmButtonColor: "#3085d6",
					cancelButtonColor: "#d33",
					confirmButtonText: "Ok"
				});
				$("#btnProses").removeAttr('disabled');
				$("#btnProses").html("Proses <i class='fal fa-envelope-circle-check fa-fw fa-lg ml-2'></i>");
			}
		});
	}
});
$('.fc-datepicker').datepicker({
	showOtherMonths: true,
	selectOtherMonths: true
});
</script>

