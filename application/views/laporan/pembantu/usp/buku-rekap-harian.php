<div class="main-content side-content pt-0">
	<div class="main-container container-fluid">
		<div class="inner-body">
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-20 mg-b-5"><?php echo $page; ?> <span class="text-muted"><?php echo $title; ?></span></h2>
				</div>
				<div class="d-flex">
					<div class="justify-content-center">
						<span class="middle" style="white-space: nowrap;display: flex;">
							Pilih Bulan : &nbsp;							 
							<select class="form-control" id="bulan" name="bulan" onchange="SelectChanged();">
								<option value="00" selected>Silahkan Pilih</option>
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
							</select>
						
							&nbsp;&nbsp;<?php echo $tahun; ?>
						</span>
					</div>
				</div>
			</div>
			<div id="content" class="mb-4"></div>
		</div>
	</div>
</div>
<script type='text/javascript'>
function SelectChanged() {
	var bulan = $('#bulan').val();
	if (bulan == '') {
        	$('#metune').addClass('sembunyi');
    	}
	else
	{
		$('#loader').removeClass('display-none');
        
		$.ajax({
			url: "<?php echo base_url('laporan/pembantu/usp/get_buku_rekap_harian_kas/');?>" + bulan,
            		data: {'bulan':bulan},
            		type: 'POST',
            		beforeSend: function () {
                		Notiflix.Loading.circle('Memuat Data');
            		},
            		success: function(response) {
                		$('#metune').removeClass('sembunyi');
                		$('#bulane').text(response.bulan);
                		$('#content').html(response);
            		},
            		complete: function () {
                		setTimeout(function() {
					Notiflix.Loading.remove();
                		}, 100);
            		},
			error: function(jqXHR, textStatus, errorThrown)
			{
				Lobibox.notify(textStatus, {title: 'Wadidaw !', delayIndicator: false, position: 'top right', icon: true, msg: 'Sistem Sedang Tidak Baik - baik Saja !<br>-----------------------------------'});
			}
		});
	}
}
</script>