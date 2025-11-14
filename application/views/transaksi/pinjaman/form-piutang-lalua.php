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
		</div>
		<div class="card">
			<div class="card-body p-4">
			<form class="row g-3 pinjaman" id="form">
				<input type="text" name="app_token" id="app_token" class="form-control sembunyi" value="<?php echo session('app_token'); ?>">
				<input type="text" name="userid" id="userid" class="form-control sembunyi" burem readonly>
					<div class="col-md-3 ui-widget">
						<label for="tgl" class="form-label">Tanggal</label>
						<input type="date" class="form-control" id="tgl_trans" name="tgl_trans">
					</div>
					<div class="col-md-3">
						<label for="nik" class="form-label">Cari NIK Anggota</label>
						<input type="text" class="form-control" id="nik" name="nik" data-bs-toggle="modal" data-bs-target="#CariModal" data-href="<?php echo base_url('master/anggota/cari_piutang');?>" data-name="Cari Data Anggota">
					</div>
					<div class="col-md-3">
						<label for="input2" class="form-label">Nama Lengkap</label>
						<input type="text" class="form-control" id="nama" name="nama" burem readonly>
					</div>
					<div class="col-md-3">
						<label for="input3" class="form-label">Jenis Kelamin</label>
						<input type="text" class="form-control" id="jk" name="jk" burem readonly>
					</div>
					<div class="col-md-3">
						<label for="input4" class="form-label">Tempat Lahir</label>
						<input type="text" class="form-control" id="tempat" name="tempat" burem readonly>
					</div>
					<div class="col-md-3">
						<label for="input3" class="form-label">Tanggal Lahir</label>
						<input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" burem readonly>
					</div>
					<div class="col-md-3">
						<label for="input5" class="form-label">Cabang</label>
						<input type="text" class="form-control" id="cabang" name="cabang" burem readonly>
					</div>
					<div class="col-md-3">
						<label for="input6" class="form-label">No HP / WA</label>
						<input type="text" class="form-control" id="phone" name="phone" burem readonly>
					</div>
					<hr/>
					<div class="mt-2 mb-3">
						<div class="row">
							<div class="col-lg-12">
								<div class="border border-2 p-4 rounded bg-info">
									<div class="row g-3">
										<div class="col-md-4">
											<label for="jns_pinj" class="form-label">Pokok Belum Terbayar</label>
										 	<div class="input-group">
												<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
												<input type="text" class="form-control uang" id="pokok_belum" name="pokok_belum" burem readonly="">
										 	</div>
										</div>
										<div class="col-md-4">
											<label for="input25" class="form-label">Bunga Belum Terbayar</label>
										 	<div class="input-group">
												<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
												<input type="text" class="form-control uang" id="bunga_belum" name="bunga_belum" burem readonly="">
										 	</div>
										</div>									
										<div class="col-md-4">
											<label for="input25" class="form-label">Total Belum Terbayar</label>
										 	<div class="input-group">
												<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
												<input type="text" class="form-control uang" id="total_belum" name="total_belum" burem readonly="">
										 	</div>
										</div>	
						  			</div>
								</div>
							</div>

						</div>
					</div>

					<div class="mt-2">
						<div class="row">
							<div class="col-lg-12">
								<div class="border border-3 p-4 rounded">
									<div class="row g-3">
										<div class="col-md-4">
											<label for="jns_pinj" class="form-label">Pokok</label>
										 	<div class="input-group">
												<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
												<input type="text" class="form-control uang" id="pokok_bayar" name="pokok_bayar" placeholder="1.000.000">
										 	</div>
										</div>
										<div class="col-md-4">
											<label for="input25" class="form-label">Bunga</label>
										 	<div class="input-group">
												<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
												<input type="text" class="form-control uang" id="bunga_bayar" name="bunga_bayar" placeholder="1.000.000">
										 	</div>
										</div>									
										<div class="col-md-4">
											<label for="input25" class="form-label">Total</label>
										 	<div class="input-group">
												<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
												<input type="text" class="form-control uang" id="total" name="total" burem readonly>
										 	</div>
										</div>	
										<div class="col-md-12">
											<label for="input25" class="form-label">Keterangan</label>
										 	<div class="input-group">
												
												<input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Pelunasan TL 1 / Per Kas An Sumitro Ngabehi [ P: 23 x 100.000 B: 11.5 x 20.000 ]">
										 	</div>
										</div>
						  			</div>
								</div>
							</div>

						</div>
					</div>
				</div>
				<div class="col-lg-12" style="text-align: center;">
					<div class="align-items-center mb-3">
						<button type="reset" class="btn btn-dark radius-30 btn-sm px-3"><i class="bx bx-reset"></i>Reset&nbsp;&nbsp;</button>
						&nbsp;<button type="submit" class="btn btn-success radius-30 btnTambah btn-sm px-3">&nbsp;&nbsp;Simpan <i class="bx bx-check-circle"></i></button>
					</div>
				</div>
			</div>
			<?php echo form_close() ?>
		</div>
	</div>
</div>


<?php echo link_tag('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css');?>
<script src="<?php echo base_url('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js');?>"></script>
<script>
$(document).ready(function(){
	$('.uang').mask('000.000.000.000.000.000', {reverse: true});
	
	$('#form').on('submit', function(e){  
		e.preventDefault();  
		$('.btnTambah').html('<i class="fa fa-circle-notch fa-spin mr-2"></i>Memproses');
		$('.btnTambah').attr('disabled', 'disabled');
		$.ajax({  
			url:"<?php echo base_url('transaksi/pinjaman/add_angsuran_piutang_pinjaman'); ?>",
                     	method:"POST",  
                     	data:new FormData(this),  
                     	contentType: false,  
                     	cache: false,  
                     	processData:false,  
                     	success:function(data)  
                     	{
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
									window.location.href="<?php echo base_url('transaksi/pinjaman/piutang_terbayar'); ?>";
								}
							});
					
				}
				else
				{
					$('.btnTambah').html('&nbsp;&nbsp;Simpan <i class="far fa-circle-check fs-5"></i>');
					$('.btnTambah').removeAttr('disabled');
					Swal.fire({
						title: data.title,
						html: data.message,
						icon: data.status,
						confirmButtonColor: "#3085d6",
						cancelButtonColor: "#d33",
						confirmButtonText: "Oke"
					});
				}
			},
                	error: function(XMLHttpRequest, textStatus, errorThrown)
			{
				$('.btnTambah').html('&nbsp;&nbsp;Simpan <i class="far fa-circle-check fs-5"></i>');
				$('.btnTambah').removeAttr('disabled');
				Swal.fire({
						title: data.title,
						html: data.message,
						icon: data.status,
						confirmButtonColor: "#3085d6",
						cancelButtonColor: "#d33",
						confirmButtonText: "Oke"
				});
			}
                });  
	});  
});  


$("#pokok_bayar, #bunga_bayar").on('keyup', function()
{
	var pekok  = $("#pokok_bayar").unmask().val();
	var bungo  = $("#bunga_bayar").unmask().val();

	var total  = parseInt(pekok) + parseInt(bungo);

	var balik  = total.toString().split('').reverse().join(''),
	kabeh      = balik.match(/\d{1,3}/g);
	kabeh      = kabeh.join('.').split('').reverse().join('');

	$("#pokok_bayar").mask('000.000.000.000.000.000', {reverse: true}).val();
	$("#bunga_bayar").mask('000.000.000.000.000.000', {reverse: true}).val();

	$("#total").val(kabeh);
});
</script>
