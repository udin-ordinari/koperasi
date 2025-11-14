<div class="main-content side-content">
	<div class="main-container container-fluid">
		<div class="inner-body">
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-24 mg-b-5"><?php echo $page; ?> <span class="breadcrumb-item"><a href="javascript:void(0);"><?php echo $title; ?></a></span></h2>
				</div>
				<div class="col-md-6 d-flex">
					<div class="row row-sm align-items-center">
						<div class="col-md-5">
							<label class="mg-b-0">Pilih Bulan : </label>
						</div>
						<div class="col-md-7">
							<form id="goleki"> 
							<select class="form-control select2" id="bulan" name="bulan" onchange="SelectChanged();">
								<option selected>Silahkan Pilih</option>
								<option value="01">Januari</option>
								<option value="02">Februari</option>
								<option value="03">Maret</option>
								<option value="04">April</option>
								<option value="05">Mei</option>
								<option value="06">Juni</option>
								<option value="07">Juli</option>
								<option value="08">Agustus</option>
								<option value="09">September</option>
								<option value="10">Oktober</option>
								<option value="11">Nopember</option>
								<option value="12">Desember</option>
							</select><?php echo $tahun; ?>
							</form>
						</div>	
					</div>
				</div>
			</div>
			<div class="row row-sm">
				<div class="col-lg-12">
					<div class="card custom-card">
						<div class="card-body row row-xs align-items-center mg-b-20 card-header p-2 tx-medium my-auto bg-secondary">
							<div class="col-md-5">	
								<div class="">
									<div class="col-md-4 text-end">
										<label class="text-white mg-b-0">Pilih Bulan: </label>
									</div>
									<div class="col-md-6 mg-md-t-0">

									</div>
									<div class="col-md-2">
										
									</div>
								</div>
							</div>
						</div>
						<div class="">
							<div id="bulan">
								<div class="table-responsive">
									<table class="table table-bordered mb-0 fs-7">
										<thead class="table-info">
											<tr class="text-center">
												<th colspan="9"> BUKU KAS USP </th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td colspan="7"></td>
												<td> Periode : </td>
												<td><strong><?php echo bulan('01'); ?> <?php echo $tahun; ?></strong></td>
											</tr>
											<tr class="kandel text-center table-secondary">
									<td> NO. </td>
									<td colspan="3"> TANGGAL </td>
									<td> U R A I A N </td>
									<td> No. Bukti </td>
									<td> DEBET </td>
									<td> KREDIT </td>
									<td> SALDO </td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td class="kandel text-uppercase"> Saldo awal </td>
									<td></td>
									<td></td>
									<td></td>
									<td> Rp.
										<?php echo number_format('509180207', 0,',','.');?>
									</td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td class="kandel text-uppercase"> Rekapitulasi pemotongan gaji </td>
									<td></td>
									<td> Rp.
										<?php echo number_format('197710500', 0,',','.');?>
									</td>
									<td></td>
									<td></td>
								</tr>
								<tr>
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
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Pembayaran per - kas </td>
									<td></td>
									<td> Rp.
										<?php echo number_format('11982500', 0,',','.');?>
									</td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Jasa pelunasan </td>
									<td></td>
									<td> Rp.
										<?php echo number_format('2287500', 0,',','.');?>
									</td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Jasa per - kas </td>
									<td></td>
									<td> Rp.
										<?php echo number_format('2175000', 0,',','.');?>
									</td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Pinjaman anggota </td>
									<td></td>
									<td></td>
									<td> Rp.
										<?php echo number_format('248000000', 0,',','.');?>
									</td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Piutang Unit Usaha Induk Koperasi </td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Piutang Unit Usaha SR Baru </td>
									<td></td>
									<td></td>
									<td>Rp. 0</td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Simpanan Lain-lain / SWP </td>
									<td></td>
									<td> Rp.
										<?php echo number_format('4740000', 0,',','.');?>
									</td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Resiko Kredit </td>
									<td></td>
									<td> Rp.
										<?php echo number_format('2370000', 0,',','.');?>
									</td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Piutang Demak EXPO </td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td class="kandel text-uppercase"> Simpanan Sukarela ( Debet ) </td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> 1. </td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> 2. </td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> 3. </td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td class="kandel text-uppercase"> Jumlah </td>
									<td></td>
									<td> - </td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td class="kandel text-uppercase"> MODAL TIDAK TETAP </td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Dana Pendidikan </td>
									<td></td>
									<td> Rp.
										<?php echo number_format('3672504', 0,',','.');?>
									</td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Dana Sosial </td>
									<td></td>
									<td> Rp.
										<?php echo number_format('1836252', 0,',','.');?>
									</td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Dana Pengembangan Daerah Kerja </td>
									<td></td>
									<td> Rp.
										<?php echo number_format('1836252', 0,',','.');?>
									</td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Cadangan Modal </td>
									<td></td>
									<td> Rp.
										<?php echo number_format('22035027', 0,',','.');?>
									</td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td class="kandel text-uppercase"> Jumlah </td>
									<td></td>
									<td> Rp.
										<?php echo number_format('29380036', 0,',','.');?>
									</td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td class="kandel text-uppercase"> BIAYA-BIAYA RAT </td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Uang Hadir </td>
									<td></td>
									<td></td>
									<td> Rp.
										<?php echo number_format('63600000', 0,',','.');?>
									</td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Konsumsi RAT </td>
									<td></td>
									<td></td>
									<td> Rp.
										<?php echo number_format('14840000', 0,',','.');?>
									</td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Persiapan-persiapan RAT </td>
									<td></td>
									<td></td>
									<td> Rp.
										<?php echo number_format('5000000', 0,',','.');?>
									</td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Bendel RAT </td>
									<td></td>
									<td></td>
									<td> Rp.
										<?php echo number_format('4000000', 0,',','.');?>
									</td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Lain-lain </td>
									<td></td>
									<td></td>
									<td> Rp.
										<?php echo number_format('500000', 0,',','.');?>
									</td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td class="kandel text-uppercase"> Jumlah </td>
									<td></td>
									<td></td>
									<td> Rp.
										<?php echo number_format('87940000', 0,',','.');?>
									</td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> SHU dibagikan ke anggota </td>
									<td></td>
									<td></td>
									<td> Rp.
										<?php echo number_format('110611907', 0,',','.');?>
									</td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Honor Pengurus &amp; Karyawan </td>
									<td></td>
									<td></td>
									<td> Rp.
										<?php echo number_format('27652976', 0,',','.');?>
									</td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Disetorkan ke Unit Induk Koperasi </td>
									<td></td>
									<td></td>
									<td> Rp.
										<?php echo number_format('69132441', 0,',','.');?>
									</td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Simpanan Pokok ( Kredit ) </td>
									<td></td>
									<td></td>
									<td> - </td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Simpanan Wajib ( Kredit) </td>
									<td></td>
									<td></td>
									<td> - </td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Simpanan Lain-lain / SWP ( Kredit ) </td>
									<td></td>
									<td></td>
									<td> - </td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Simpanan Sukarela ( Kredit ) </td>
									<td></td>
									<td></td>
									<td> - </td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Resiko Kredit ( Kredit ) </td>
									<td></td>
									<td></td>
									<td> - </td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td class="kandel text-uppercase"> Beban Pajak Penghasilan (PPh) </td>
									<td></td>
									<td></td>
									<td> - </td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Pengembalian piutang Unit Induk Koperasi </td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Pengembalian piutang Unit SR Baru </td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td class="kandel text-uppercase"> BEBAN KELANCARAN USAHA : </td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Konsumsi Rapat </td>
									<td></td>
									<td></td>
									<td> - </td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Dana Sosial/Kematian </td>
									<td></td>
									<td></td>
									<td> Rp.
										<?php echo number_format('450000', 0,',','.');?>
									</td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Alat Tulis Kantor </td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Beban Hutang Usaha </td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Penghargaan Purna Tugas </td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td> Lain-lain </td>
									<td></td>
									<td></td>
									<td> Rp.
										<?php echo number_format('9166', 0,',','.');?>
									</td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td class="kandel text-uppercase"> Jumlah </td>
									<td></td>
									<td></td>
									<td> Rp.
										<?php echo number_format('459166', 0,',','.');?>
									</td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"></td>
									<td class="kandel text-uppercase"> Jumlah </td>
									<td></td>
									<td> Rp.
										<?php echo number_format('289913536', 0,',','.');?>
									</td>
									<td>Rp. 0</td>
									<td>Rp. 0</td>
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
</div>



<script type='text/javascript'>
function SelectChanged()
{
	var bulan = $('#bulan').val();
	$.ajax({
		url: "<?php echo base_url('laporan/kas/get_kas');?>",
		data: {'bulan':bulan},
		type: 'POST',
		async: false,
		dataType: 'json',
		success: function(response)
		{

		},
		error: function(response)
		{

		}
	});
}

</script>