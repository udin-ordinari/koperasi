<div class="main-content">
	<div class="page-content">
		<div class="container-fluid">
			<div class="row">
                        	<div class="col-12">
                            		<div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                		<h4 class="mb-sm-0"><?php echo $page; ?> <span class="text-muted"><?php echo $title; ?></span></h4>
						<div class="page-title-right">
							<div class="d-flex align-items-center">
        							<label for="bulan" class="mb-0 me-2">Pilih Bulan :</label>
        							<select class="form-select me-2" id="bulan" name="bulan" onchange="SelectChanged();" style="width: auto;">
            								<option value="" selected>Silahkan Pilih</option>
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
        							<span class="fw-bold"><?php echo $tahun; ?></span>
    							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="content" class="mb-4"></div>			
		</div>

<script type='text/javascript'>
function SelectChanged() {
	var bulan = $('#bulan').val();
	if (bulan == '') {
        	$('#metune').addClass('sembunyi');
    	}
	else
	{
		$.ajax({
			url: "<?php echo base_url('laporan/pembantu/usp/get_buku_kas/');?>" + bulan,
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
			error: function(jqXHR, textStatus, errorThrown) {
				new jBox('Notice', {attributes: {x: 'right', y: 'top'}, stack: false, animation: 'flip', showCountdown: false, color: 'red', title: 'Wadidaw !', content: 'Sistem Sedang Tidak Baik - baik Saja !<br>-----------------------------------'});
				//Lobibox.notify(textStatus, {title: 'Wadidaw !', delayIndicator: false, position: 'top right', icon: true, msg: 'Sistem Sedang Tidak Baik - baik Saja !<br>-----------------------------------'});
			}
		});
	}
}

</script>