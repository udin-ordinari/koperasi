<form id="submit">
	<input type="text" name="app_token" id="app_token" class="form-control sembunyi" value="<?php echo session('app_token'); ?>">
		<div class="card">
			<div class="card-body p-4 row g-3 pinjaman">
<?php foreach($piutang->result() as $row) { ?>
				<input type="text" name="userid" id="userid" value="<?php echo $row->user_id; ?>" class="form-control sembunyi" burem readonly>
					<div class="col-md-2 ui-widget">
						<label for="tgl" class="form-label">Tanggal</label>
						<input type="date" class="form-control" id="tgl_trans" name="tgl_trans" value="<?php echo $row->tgl; ?>">
					</div>

					<div class="col-md-3">
						<label for="nik" class="form-label">NIK Anggota</label>
						<input type="text" class="form-control" id="nik" name="nik" value="<?php echo get_anggota($row->user_id)->nik; ?>" burem readonly>
					</div>
					<div class="col-md-5">
						<label for="input2" class="form-label">Nama Lengkap</label>
						<input type="text" class="form-control" id="nama" name="nama" value="<?php echo get_anggota($row->user_id)->nama; ?>" burem readonly>
					</div>
					<div class="col-md-2">
						<label for="input3" class="form-label">Jenis Kelamin</label>
						<input type="text" class="form-control" id="jk" name="jk" value="<?php echo get_anggota($row->user_id)->jk; ?>" burem readonly>
					</div>
					<div class="col-md-3">
						<label for="input4" class="form-label">Tempat Lahir</label>
						<input type="text" class="form-control" id="tempat" name="tempat" value="<?php echo get_anggota($row->user_id)->tempat_lahir; ?>" burem readonly>
					</div>
					<div class="col-md-3">
						<label for="input3" class="form-label">Tanggal Lahir</label>
						<input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo get_anggota($row->user_id)->tanggal_lahir; ?>" burem readonly>
					</div>
					<div class="col-md-3">
						<label for="input5" class="form-label">Cabang</label>
						<input type="text" class="form-control" id="cabang" name="cabang" value="<?php echo get_cabang(get_anggota($row->user_id)->cabang)->nama; ?>" burem readonly>
					</div>
					<div class="col-md-3">
						<label for="input6" class="form-label">No HP / WA</label>
						<input type="text" class="form-control" id="phone" name="phone" value="<?php echo get_anggota($row->user_id)->phone; ?>" burem readonly>
					</div>

					<hr/>
					<div class="mt-2">
						<div class="row">
							<div class="col-lg-12">
								<div class="border border-3 p-4 rounded">
									<div class="row g-3">
										<div class="col-md-3">
											<label for="jns_pinj" class="form-label">Pokok Belum Terbayar</label>
										 	<div class="input-group">
												<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
												<input type="text" class="form-control uang" id="pokok" name="pokok" value="<?php echo $row->pokok; ?>">
										 	</div>
										</div>
										<div class="col-md-3">
											<label for="input25" class="form-label">Bunga Belum Terbayar</label>
										 	<div class="input-group">
												<span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
												<input type="text" class="form-control uang" id="bunga" name="bunga" value="<?php echo $row->bunga; ?>">
										 	</div>
										</div>	
										<div class="col-md-6">
											<label for="input25" class="form-label">Keterangan</label>
										 	<div class="input-group">
												<input type="text" class="form-control" id="uraian" name="uraian" value="<?php echo $row->uraian; ?>">
										 	</div>
										</div>									
                                    					</div>
								</div>
							</div>
						</div>
					</div>
<?php } ?>
				</div>
				<div class="col-lg-12" style="text-align: center;">
					<div class="align-items-center mb-3">
						<button type="button" class="btn btn-dark radius-30 btn-sm px-3" data-bs-dismiss="modal"><i class="bx bx-x-circle"></i>Tutup&nbsp;&nbsp;</button>
						&nbsp;<button type="submit" class="btn btn-success radius-30 btnEdit btn-sm px-3">&nbsp;&nbsp;Simpan <i class="bx bx-check-circle"></i></button>
					</div>
				</div>
			</div>
<?php echo form_close() ?>			
<script>

$(document).ready(function(){
	$('.uang').mask('000.000.000.000.000.000', {reverse: true});
	$('form').on('submit', function(e){  
		e.preventDefault();  
		$('.btnEdit').html('<i class="fa fa-circle-notch fa-spin mr-2"></i>Memproses');
		$('.btnEdit').attr('disabled', 'disabled');
		$.ajax({  
			url:"<?php echo base_url('transaksi/pinjaman/proses_edit_saldo_awal_pinjaman'); ?>",
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
									window.location.href="<?php echo base_url('transaksi/pinjaman/piutang_blm_terbayar'); ?>";
								}
							});
				}
				else
				{
					$('.btnEdit').html('&nbsp;&nbsp;Simpan <i class="far fa-circle-check fs-5"></i>');
					$('.btnEdit').removeAttr('disabled');
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
				$('.btnEdit').html('&nbsp;&nbsp;Simpan <i class="far fa-circle-check fs-5"></i>');
				$('.btnEdit').removeAttr('disabled');
				Swal.fire({
					title: "Waduh !",
					html: errorThrown,
					icon: "error",
					confirmButtonColor: "#3085d6",
					cancelButtonColor: "#d33",
					confirmButtonText: "Oke"
				});
			}
                });  
	});  
});  

</script>

