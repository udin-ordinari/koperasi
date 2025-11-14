<div class="main-content side-content pt-0">
	<div class="main-container container-fluid">
		<div class="">
			<div class="page-header">
				<div>
					<h6 class="main-content-title tx-16 mg-b-5">Perhatian ! <span class="text-muted">Bila kolom Tabel Tidak Sesuai Silahkan Di Perbesar Layar Melalui Menu Garis 3 Diatas Kiri Sebelah Waktu.</span></h6>
				</div>
				<div class="d-flex">
					<div class="justify-content-center">
						<button type="button" class="btn btn-primary btn-icon-text my-2 me-2" onclick="Reload();"><i class="fal fa-circle-radiation me-2 fa-lg muter"></i>Reload</button>
						<button type="button" class="btn btn-secondary btn-icon-text my-2 me-2" onclick="window.open('<?php echo base_url(); ?>laporan/akuntansi/neraca_print');"><i class="fal fa-print fa-fw fa-lg mr-2"></i>Cetak</button>
					</div>
				</div>
			</div>

			<h5 class="mb-4 text-uppercase text-center">neraca usaha simpan pinjam ( usp )<br>periode <?php echo $tahun;?></h5>
			<div id="neraca">
			<div class="card mb-4">
				<div class="row row-lg p-1">
					<div class="col-lg-6">
						<div class="table-responsive border">
							<table class="table text-nowrap text-md-nowrap table-hover tx-14 mb-0">
								<thead class="table-secondary">
									<tr>
										<th scope="col" class="wd-10"></th>
										<th scope="col">aktiva</th>
										<th scope="col" class="text-center"><?php echo $tahun - 1; ?></th>
										<th scope="col" class="text-center"><?php echo $tahun; ?></th>
									</tr>
								</thead>
								<tbody>
									<tr class="tx-14 kandel">
										<td>I</td>
										<td class="text-uppercase tx-13"><strong>aktiva lancar</strong></td>
										<td></td>
										<td></td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="table-responsive border">
							<table class="table text-nowrap text-md-nowrap table-hover tx-14 mb-0">
								<thead class="table-secondary">
									<tr>
										<th scope="col" class="wd-10"></th>
										<th scope="col">pasiva</th>
										<th scope="col" class="text-center"><?php echo $tahun - 1; ?></th>
										<th scope="col" class="text-center"><?php echo $tahun; ?></th>
									</tr>
								</thead>
								<tbody>
									<tr class="tx-14 kandel">
										<td>II</td>
										<td colspan="3" class="text-uppercase tx-13">kewajiban lancar</td>
									</tr>

									</tr>

									<tr>
										<td></td>
										<td class="text-right tx-semibold">sub jumlah</td>
										<td>Rp. <?php echo number_format(total_simpanan_sukarela($tahun-1) + modal_tidak_tetap($tahun - 1), 0, ', ','.'); ?></td>
										<td>Rp. </td>
									</tr>
									<tr class="tx-14 kandel">
										<td>III</td>
										<td colspan="3" class="text-uppercase tx-13">kewajiban jangka panjang</td>
									</tr>

									<tr>
										<td></td>
										<td class="text-right tx-semibold">sub jumlah</td>
										<td>Rp. <?php echo number_format('2', 0, ', ','.'); ?></td>
										<td>Rp. </td>
									</tr>
									<tr class="tx-14 kandel">
										<td>IV</td>
										<td colspan="3" class="text-uppercase tx-13">kekayaan bersih</td>
									</tr>

									<tr>
										<td></td>
										<td class="text-right tx-semibold">sub jumlah</td>
										<td>Rp. </td>
										<td>Rp. </td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="table-responsive border">
							<table class="table text-nowrap text-md-nowrap table-hover tx-14 mb-0">
								<thead class="table-secondary">
									<tr>
										<th scope="col" class="wd-10"></th>
										<th scope="col">total aktiva</th>
										<th scope="col" class="text-start text-capitalize">Rp. <?php echo number_format('0', 0, ', ','.'); ?></th>
										<th scope="col" class="text-start text-capitalize">Rp. <?php echo number_format('1', 0, ', ','.'); ?></th>

										<th scope="col" class="wd-10"></th>
										<th scope="col">total pasiva</th>
										<th scope="col" class="text-end text-capitalize">Rp. 3.000.000.000</th>
										<th scope="col" class="text-end text-capitalize">Rp. 4.000.000.000</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>


			<h5 class="mb-4 text-uppercase text-center">neraca usaha induk<br>periode <?php echo $tahun;?></h5>

			<div class="card mb-4">
				<div class="row row-lg p-1">
					<div class="col-lg-6">
						<div class="table-responsive border">
							<table class="table text-nowrap text-md-nowrap table-hover tx-14 mb-0">
								<thead class="table-secondary">
									<tr>
										<th scope="col" class="wd-10"></th>
										<th scope="col">aktiva</th>
										<th scope="col" class="text-center"><?php echo $tahun - 1; ?></th>
										<th scope="col" class="text-center"><?php echo $tahun; ?></th>
									</tr>
								</thead>
								<tbody>
									<tr class="tx-14 kandel">
										<td>I</td>
										<td class="text-uppercase tx-13"><strong>aktiva lancar</strong></td>
										<td></td>
										<td></td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="table-responsive border">
							<table class="table text-nowrap text-md-nowrap table-hover tx-14 mb-0">
								<thead class="table-secondary">
									<tr>
										<th scope="col" class="wd-10"></th>
										<th scope="col">pasiva</th>
										<th scope="col" class="text-center"><?php echo $tahun - 1; ?></th>
										<th scope="col" class="text-center"><?php echo $tahun; ?></th>
									</tr>
								</thead>
								<tbody>
									<tr class="tx-14 kandel">
										<td>II</td>
										<td colspan="3" class="text-uppercase tx-13">kewajiban lancar</td>
									</tr>

									<tr>
										<td></td>
										<td class="text-right tx-semibold">sub jumlah</td>
										<td>Rp. </td>
										<td>Rp. </td>
									</tr>
									<tr class="tx-14 kandel">
										<td>III</td>
										<td colspan="3" class="text-uppercase tx-13">kewajiban jangka panjang</td>
									</tr>

									<tr>
										<td></td>
										<td class="text-right tx-semibold">sub jumlah</td>
										<td>Rp. </td>
										<td>Rp. </td>
									</tr>
									<tr class="tx-14 kandel">
										<td>IV</td>
										<td colspan="3" class="text-uppercase tx-13">kekayaan bersih</td>
									</tr>

									<tr>
										<td></td>
										<td class="text-right tx-semibold">sub jumlah</td>
										<td>Rp. </td>
										<td>Rp. </td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="table-responsive border">
							<table class="table text-nowrap text-md-nowrap table-hover tx-14 mb-0">
								<thead class="table-secondary">
									<tr>
										<th scope="col" class="wd-10"></th>
										<th scope="col">total aktiva</th>
										<th scope="col" class="text-start">Rp.</th>
										<th scope="col" class="text-start">Rp. </th>

										<th scope="col" class="wd-10"></th>
										<th scope="col">total pasiva</th>
										<th scope="col" class="text-center text-capitalize">Rp. </th>
										<th scope="col" class="text-center text-capitalize">Rp. </th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
<script type="text/javascript">
function Reload()
{
	$('.muter').addClass('fa-spin');
	setInterval(function(){
		$('.muter').removeClass('fa-spin');
		document.getElementById('neraca').src;
	}, 1000);
}
</script>
