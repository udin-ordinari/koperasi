<div class="main-content side-content">
	<div class="main-container container-fluid">
		<div class="inner-body">
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-20 mg-b-5">Form <span class="text-muted"><?php echo $title; ?></span></h2>
				</div>
			</div>
		</div>
		<div class="row row-sm">
			<div class="col-lg-12">
				<div class="card custom-card overflow-hidden">
					<div class="card-body">
						<form class="row g-3 pinjaman" id="form">
						<input type="text" name="app_token" id="app_token" class="form-control sembunyi" value="<?php echo session('app_token'); ?>">
						<input type="text" name="userid" id="userid" class="form-control sembunyi" burem readonly>
						<div class="col-md-3 mb-2">
							<label for="tgl">Tanggal</label>
							<input type="date" class="form-control" id="tgl_trans" name="tgl_trans" value="2023-01-26">
						</div>
						<div class="col-md-3">
							<label for="nik">E KTP Anggota</label>
							<input type="text" class="form-control" id="ktp" name="ktp" data-bs-toggle="modal" data-bs-target="#modalKing" data-href="<?php echo base_url('master/anggota/cari_pinjaman_anggota');?>" data-name="Cari Data Anggota">
						</div>
						<div class="col-md-4">
							<label for="input2">Nama Lengkap</label>
							<input type="text" class="form-control" id="nama" name="nama" burem readonly>
						</div>
						<div class="col-md-2">
							<label for="input3">Jenis Kelamin</label>
							<input type="text" class="form-control" id="jk" name="jk" burem readonly>
						</div>
						<div class="col-md-3">
							<label for="input4">Tempat Lahir</label>
							<input type="text" class="form-control" id="tempat" name="tempat" burem readonly>
						</div>
						<div class="col-md-3">
							<label for="input3">Tanggal Lahir</label>
							<input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" burem readonly>
						</div>
						<div class="col-md-3">
							<label for="input5">Cabang</label>
							<input type="text" class="form-control" id="cabang" name="cabang" burem readonly>
						</div>
						<div class="col-md-3 mb-5">
							<label for="input6">No HP / WA</label>
							<input type="text" class="form-control" id="phone" name="phone" burem readonly>
						</div>

						<div class="col-md-12 mb-5">
							<div class="border border-2 p-4 rounded bg-primary">
								<div class="row g-3">
									<div class="col-md-4">
										<label for="jns_pinj" class="text-white">Pokok Belum Terbayar</label>
										 <div class="input-group">
											<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
											<input type="text" class="form-control uang" id="pokok_belum" name="pokok_belum" value="" burem readonly="">
										 </div>
									</div>
									<div class="col-md-4">
										<label for="input25" class="text-white">Bunga Belum Terbayar</label>
										 <div class="input-group">
											<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
											<input type="text" class="form-control uang" id="bunga_belum" name="bunga_belum" value="" burem readonly="">
										 </div>
									</div>									
									<div class="col-md-4">
										<label for="input25" class="text-white">Total Belum Terbayar</label>
										 <div class="input-group">
											<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
											<input type="text" class="form-control uang" id="total_belum" name="total_belum" value="" burem readonly="">
										 </div>
									</div>	
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="border border-3 p-4 rounded">
									<div class="row g-3">
										<div class="col-md-4 mb-2">
											<label for="jns_pinj">Pokok</label>
										 	<div class="input-group">
												<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
												<input type="text" class="form-control uang" id="pokok_bayar" name="pokok_bayar" placeholder="1.000.000" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
										 	</div>
										</div>
										<div class="col-md-4">
											<label for="input25">Bunga</label>
										 	<div class="input-group">
												<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
												<input type="text" class="form-control uang" id="bunga_bayar" name="bunga_bayar" placeholder="1.000.000" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
										 	</div>
										</div>									
										<div class="col-md-4">
											<label for="input25">Total</label>
										 	<div class="input-group">
												<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
												<input type="text" class="form-control uang" id="total" name="total" burem readonly>
										 	</div>
										</div>	

										<div class="col-md-3 mb-2">
											<label for="jns_pinj">Jenis</label>
										 	<div class="input-group">
													<select class="form-control select2" id="jenis" name="jenis">
														<option selected> --- Silahkan Pilih ---</option>	
														<option value="pelunasan">Pelunasan</option>
														<option value="perkas">Perkas</option>
														<option value="cicilan">Angsuran</option>
													</select>
										 	</div>
										</div>
										<div class="col-md-2 sembunyi" id="dari">
											<label for="input25">Dari</label>
										 	<div class="input-group">
												<input type="text" class="form-control text-right" id="dari" name="dari" placeholder="48">
												<span class="input-group-text"><i class="fa-solid fa-x"></i></span>
										 	</div>
										</div>									
										<div class="col-md-2 sembunyi" id="ke">
											<label for="input25">Ke</label>
										 	<div class="input-group">
												<input type="text" class="form-control text-right" id="ke" name="ke" placeholder="48">
												<span class="input-group-text"><i class="fa-solid fa-x"></i></span>
										 	</div>
										</div>	
										<div class="col-md-12">	
											<label for="jns_pinj">Keterangan</label>										
											<input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Pelunasan TL 1 / Per Kas An Sumitro Ngabehi [ P: 23 x 100.000 B: 11.5 x 20.000 ]">
										</div>
						  			</div>
								</div>
							</div>
						</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary radius-30" onclick="history.back()"><i class="fal fa-chevron-left fa-fw fa-lg"></i>Kembali&nbsp;&nbsp;</button>
						<button type="submit" class="btn btn-success radius-30 btnTambah">&nbsp;&nbsp;Simpan <i class="fal fa-check-circle fa-fw fa-lg"></i></button>
					</div>

				</div>

			</div>
			<?php echo form_close() ?>
		</div>
	</div>
</div>

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
									window.location.href="<?php echo base_url('transaksi/pinjaman/angs_piutang_lalu'); ?>";
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
$('#jenis').change(function() {
	var text = $('#jenis').val();
	if (text == 'cicilan')
	{
		$('#dari').removeClass('sembunyi');
		$('#ke').removeClass('sembunyi');
	}
	else
	{
		$('#dari').addClass('sembunyi');
		$('#ke').addClass('sembunyi');
	}
});
</script>
