<div class="main-content side-content pt-0">
	<div class="main-container container-fluid">
		<div class="inner-body">
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-24 mg-b-5"><?php echo $page; ?> <span class="text-muted"><?php echo $title; ?></span></h2>
				</div>
				<div class="d-flex">
					<div class="justify-content-center">
						<span class="middle" style="white-space: nowrap;display: flex;">
							Pilih Bulan : &nbsp;							 
							<select class="form-control" id="bulan" name="bulan" onchange="SelectChanged();">
								<option value="" selected> Silahkan Pilih </option>
								<option value="01"> Januari </option>
								<option value="02"> Februari </option>
								<option value="03"> Maret </option>
								<option value="04"> April </option>
								<option value="05"> Mei </option>
								<option value="06"> Juni </option>
								<option value="07"> Juli </option>
								<option value="08"> Agustus </option>
								<option value="09"> September </option>
								<option value="10"> Oktober </option>
								<option value="11"> Nopember </option>
								<option value="12"> Desember </option>
							</select>
						
							&nbsp;&nbsp;<?php echo $tahun; ?>
						</span>
					</div>
				</div>
			</div>
			<div class="row row-sm sembunyi" id="metune">
				<div class="col-lg-12">
					<div class="card custom-card">
						<div class="card-body">
							<div class="table-responsive border">
								<table class="table text-nowrap text-md-nowrap mg-b-0">
									<thead class="tx-14">
										<tr class="text-center bg-primary">
											<th colspan="9" class="text-white"> BUKU KAS USP </th>
										</tr>
										<tr>
											<td colspan="7"></td>
											<td class="text-end"> Periode : </td>
											<td class="text-start"><strong><span id="bulane"></span> <?php echo $tahun; ?></strong></td>
										</tr>
										<tr class="text-center bg-secondary">
											<td class="text-white"> No. </td>
											<td class="text-white" colspan="3"> Tanggal </td>
											<td class="text-white"> U r a i a n </td>
											<td class="text-white"> No. Bukti </td>
											<td class="text-white"> Debet </td>
											<td class="text-white"> Kredit </td>
											<td class="text-white"> Saldo </td>
										</tr>
										<tr class="tx-13">
											<td colspan="6"></td>
											<td></td>
											<td class="text-uppercase tx-13"> Saldo awal </td>
											<td> Rp. <?php echo number_format(get_saldo_awal('1', '01', $tahun - 1), 0, ', ', '.');?> </td>
										</tr>
									</thead>
									<tbody>
										<tr class="tx-14">
											<td></td>
											<td colspan="3"></td>
											<td class="tx-bold text-capitalize"> Rekapitulasi pemotongan gaji </td>
											<td></td>
											<td>Rp. <?php echo number_format('197710500', 0,',','.');?> </td>
											<td></td>
											<td></td>
										</tr>
										<tr class="tx-14">
											<td></td>
											<td colspan="3">-</td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
										<tr class="tx-14">
											<td></td>
											<td colspan="3"></td>
											<td> Angs. / pelunasan pinjaman </td>
											<td></td>
											<td> Rp.
												<?php echo number_format('39268000', 0,',','.');?>
											</td>
											<td></td>
											<td></td>
										</tr>
									</tbody>
								</table>
							</div>

						</div>
					</div>
				</div>
			</div>


		</div>
	</div>
</div>
<script type='text/javascript'>
function SelectChanged()
{
	var bulan = $('#bulan').val();
	if(bulan == '')
	{
		$('#metune').addClass('sembunyi');
	}
	else
	{
		$.ajax({
			url: "<?php echo base_url('laporan/kas/get_kas');?>",
			data: {'bulan':bulan},
			type: 'POST',
			async: false,

			success: function(response)
			{
				$('#metune').removeClass('sembunyi');
				$('#bulane').text(response.bulan);
			},
			error: function(response)
			{
				alert('Waduh ! Musmet.');
			}
		});
	}
}

</script>