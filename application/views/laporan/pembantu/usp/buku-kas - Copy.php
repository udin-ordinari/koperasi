<style>
.display-none {
    display: none !important;
}

.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    background: rgba(0,0,0,.8);
    z-index: 999;
    opacity: 1;
    transition: all 0.5s;
}
 

.lds-dual-ring {
    display: inline-block;
}

.lds-dual-ring:after {
    content: " ";
    display: block;
    width: 64px;
    height: 64px;
    margin: 20% auto;
    border-radius: 50%;
    border: 6px solid #fff;
    border-color: #fff transparent #fff transparent;
    animation: lds-dual-ring 1.2s linear infinite;
}
@keyframes lds-dual-ring {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
</style>

<div class="page-wrapper">
	<div class="page-content">
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">
				<?php echo $title; ?>
			</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item active" aria-current="page">
							<?php echo $page; ?>
						</li>
					</ol>
				</nav>
			</div>
			<div class="ms-auto">
				<div class="btn-group"></div>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="row  align-items-center">
					<label for="input39" class="col-md-2 col-form-label">Pilih Bulan </label>
					<div class="col-md-3">
						<form id="goleki">
							<select class="form-select" id="bulan" name="bulan" onchange="SelectChanged();">
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
						</form>
					</div>
					<?php echo $tahun; ?>
				</div>
			</div>
		</div>
		<div id="content"></div>
	</div>
</div>

<div id="loader" class="lds-dual-ring display-none overlay"></div>

<?php echo link_tag('assets/plugins/sweetalert2/sweetalert2.css');?>
<script src="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.js');?>"></script>

<script type='text/javascript'>
function SelectChanged()
{
	var bulan = $('#bulan').val();
	$.ajax({
		url: "<?php echo base_url('akuntansi/usp/get_buku_kas/');?>" + bulan,
		data: {'bulan':bulan},
		type: 'POST',
		beforeSend: function () {
			$('#loader').removeClass('display-none')
		},
		success: function(response)
		{
			if ($.trim(response) == '' )
			{
				Swal.fire({
					title: "Maaf !",
					text: "Silahkan Pilih Bulan Dahulu !",
					icon: "info"
				});
			} 
			else
			{
				$('#content').html(response);
			}
		},
		complete: function () {
			$('#loader').addClass('display-none')
		},

	});
}

</script>