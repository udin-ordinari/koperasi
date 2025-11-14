<form id="form">
<input type="hidden" class="form-control" id="app_token" name="app_token" value="<?php echo session('app_token'); ?>">
<input type="hidden" class="form-control sembunyi" id="userid" name="userid" value="<?php echo $anggota->id; ?>">
<div class="main-content side-content pt-0 mb-4">
	<div class="main-container container-fluid">
		<div class="inner-body">
			<div class="text-center pt-4 mb-4">
				<div>
					<h2 class="main-content-title tx-20 mb-2">Edit <span class="text-muted"><?php echo $title; ?></span></h2>
				</div>
			</div>
			<div class="card">
				<div class="row row-sm">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="row row-sm">
									<div class="col-lg-12 text-center">
										<p class="h5 text-primary kandel"><?php echo $anggota->nama; ?><span class="text-danger"> [ <?php echo get_cabang($anggota->cabang)->nama; ?> ]</span></p>
										<address><span class="tx-14 text-muted"><font class="text-info"><?php echo $anggota->ktp; ?></font><br><?php echo $anggota->phone; ?><br><?php echo $anggota->email; ?><br><?php echo $anggota->alamat; ?><br></address>
									</div>
								</div>
								<div class="table-responsive mg-t-20">
									<table class="table table-invoice table-bordered">
										<thead class="table-primary">
											<tr class="text-center">
												<th width="15">No</th>
												<th>Tanggal</th>
												<th>Jenis Simpanan</th>
												<th class="total">Total</th>
											</tr>
										</thead>
									<tbody>
						
								<?php

									$simp = $this->db->where('user_id', $anggota->id)->get('app_simpanan');
									$no = 1;
									foreach($simp->result() as $ro) {
									if($ro->saldo_awal == '1')
									{
										$awal = '<span class="text-danger" style="font-weight: 600;font-size: 13px;">Saldo Awal</span>';
									}
									else
									{
										$awal = '';
									}
									if($ro->jns_simp == '3')
									{
										$sukarela = $this->db->select_sum('jumlah')->where('user_id', $ro->user_id)->where('jns_simp', '3')->get('app_simpanan')->row();
										$suka	  = $sukarela->jumlah - tarikan_sukarela($ro->user_id)->total;
										if($suka == '0')
										{

										}
										else
										{
								?>
				
										<tr>
											<td class="no"><input type="hidden" class="form-control" id="id[]" name="id[]" value="<?php echo $ro->id; ?>"><?php echo $no++; ?>.</td>
											<td><input type="date" class="form-control" id="tgl[]" name="tgl[]" value="<?php echo $ro->tgl; ?>"></td>
											<td><input type="hidden" class="form-control" id="jns_simp[]" name="jns_simp[]" value="<?php echo $ro->jns_simp; ?>"> <?php echo get_jenis_simpanan($ro->jns_simp)->nama.' '.$awal; ?></td>
											<td class="total"><input type="text" class="form-control uang" id="jumlah[]" name="jumlah[]" value="<?php echo $ro->jumlah; ?>"></td>
										</tr>
			
								<?php
										}
									}
									else
									{
								?>
										<tr>
											<td class="no"><input type="hidden" class="form-control" id="id[]" name="id[]" value="<?php echo $ro->id; ?>"><?php echo $no++; ?>.</td>
											<td><input type="date" class="form-control" id="tgl[]" name="tgl[]" value="<?php echo $ro->tgl; ?>"></td>
											<td><input type="hidden" class="form-control" id="jns_simp[]" name="jns_simp[]" value="<?php echo $ro->jns_simp; ?>"> <?php echo get_jenis_simpanan($ro->jns_simp)->nama.' '.$awal; ?></td>
											<td class="total"><input type="text" class="form-control uang" id="jumlah[]" name="jumlah[]" value="<?php echo $ro->jumlah; ?>"></td>
										</tr>
									<?php } ?>
								<?php } ?>
						
									</tbody>
								</table>

							</div>
						</div>
						<div class="col-lg-12 mt-1" style="text-align: center;">
							<div class="align-items-center gap-3 mb-3">
								<button type="button" class="btn btn-dark" onclick="history.back(-1);"><i class="fal fa-xmark-circle fa-fw fa-lg mr-2"></i>Kembali &nbsp;</button>
								&nbsp;<button type="submit" class="btn btn-success btnUpdate ">Perbarui <i class="fal fa-check-circle fa-fw fa-lg ml-2"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</form>

<script type="text/javascript">
$(document).ready(function(){
	$('.uang').mask('000.000.000.000.000.000', {reverse: true});
});
$('.btnUpdate').click(function(e) {
	e.preventDefault();
	let form = $(this).closest('#form');
	$(".btnUpdate").html('<div class="light-loader1" role="status"><span class="sr-only"></span></div>&nbsp; Memproses');
	$(".btnUpdate").addClass("disabled");
	$.ajax({
		url: "<?php echo base_url('transaksi/simpanan/proses_edit_simpanan');?>",
		data: form.serialize(),
		type: 'POST',
		async: false,
		dataType: 'json',
		success: function(response)
		{
			if (response.status == 'true')
			{
				$('#EditModal').hide();
				$(".btnUpdate").html('Perbarui <i class="fal fa-check-circle fa-fw fa-lg"></i>');
				Lobibox.notify('success', {title: response.title, delayIndicator: true, position: 'top right', icon: true, msg: response.message});
				setInterval(function()
				{
					location.reload();
				}, 1500);
			}
			else
			{
				$(".btnUpdate").removeClass("disabled");
				$(".btnUpdate").html('Perbarui <i class="fal fa-check-circle fa-fw fa-lg"></i>');
				Lobibox.notify(response.status, {title: response.title, delayIndicator: true, delay: 2500, position: 'top right', icon: true, msg: response.message});
			}			
		},

	});
});
</script>