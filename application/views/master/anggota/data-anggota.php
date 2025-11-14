
<div class="main-content">
	<div class="page-content">
		<div class="container-fluid">
			<div class="row">
                        	<div class="col-12">
                            		<div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                		<h4 class="mb-sm-0">Master  <span class="text-muted"><?php echo $title; ?></span></h4>
						<div class="page-title-right">
                                    			<ol class="breadcrumb m-0">
								<button type="button" class="btn btn-success btn-icon-text my-2 me-2" data-href="<?php echo base_url('master/anggota/add_anggota'); ?>" data-name="Tambah Data" data-bs-toggle="modal" data-bs-target="#modalKing" title="Tambah">
									<i class="fal fa-circle-plus me-2 fa-lg"></i> Tambah
								</button>
								<button type="button" class="btn btn-primary btn-icon-text my-2 me-2" onclick="Reload();">
									<i class="fal fa-circle-radiation me-2 fa-lg muter"></i> Reload
								</button>
								<button type="button" class="button_export_excel btn btn-info btn-icon-text my-2 me-2">
									<i class="fal fa-file me-2 fa-lg"></i> Excel
								</button>
								<button type="button" class="button_export_pdf btn btn-warning btn-icon-text my-2 me-2">
									<i class="fal fa-file fa-lg me-2"></i>Pdf
								</button>
								<input type="hidden" id="app_token" name="app_token" value="<?php echo session('app_token'); ?>">
								<input type="hidden" id="table" name="table" value="app_anggota">
								<button type="button" class="btn btn-danger my-2 btn-icon-text" onclick="Kosongi();" data-bs-toggle="tooltip-primary" data-bs-placement="bottom" data-bs-title="Kosongi Data">
									<i class="fal fa-trash fa-lg me-2"></i> Kosongi
								</button>
							</ol>
						</div>
					</div>
                        	</div>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered border-bottom" id="anggota">
							<thead class="table-dark">
								<tr>
									<th class="text-white wdp-10">No</th>
									<th class="text-white wdp-60">Nama</th>
									<th class="text-white">TTL</th>
									<th class="text-white">JK</th>
									<th class="text-white">Cabang</th>
									<th class="text-white">Status</th>
									<th class="text-white text-center">Aksi</th>
								</tr>
							</thead>
							<tbody class="tx-14"></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
$(document).ready(function() {
	var table = $('#anggota').DataTable( {
		ajax: "<?php echo base_url('master/anggota/get_data');?>",
		buttons: [
				{
					extend: 'excelHtml5',
					filename: 'Daftar Anggota Koperasi',
					messageTop: 'DAFTAR ANGGOTA KOPERASI',
					header: true,
					title: 'KOPKAR "TIRTA LANGGENG"',
					exportOptions: {columns: ':visible', },

				},
				{
extend: 'pdfHtml5',
messageTop: 'KOPKAR "TIRTA LANGGENG"',
header: true,
title: 'DAFTAR ANGGOTA KOPERASI',
orientation: 'landscape',
pageSize: 'A4',

customize: function (doc) {


doc.content[2].layout = {
    hLineWidth: function (i, node) { return 0.8; },
    vLineWidth: function (i, node) { return 0.8; },
    hLineColor: function (i, node) { return '#000'; },
    vLineColor: function (i, node) { return '#000'; },
    paddingLeft: function(i, node) { return 4; },
    paddingRight: function(i, node) { return 4; },
    paddingTop: function(i, node) { return 3; },
    paddingBottom: function(i, node) { return 3; }
};



    // --- FIX: reorder messageTop ABOVE title ---
    const title = doc.content[0];       // "KOPKAR TIRTA LANGGENG"
    const message = doc.content[1];     // "DAFTAR ANGGOTA KOPERASI"

    // Insert messageTop before the title
    doc.content[0] = message;
    doc.content[1] = title;

    // Add margins & style
    doc.content[0].margin = [0, 0, 0, 10];   // messageTop
    doc.content[1].margin = [0, 0, 0, 20];   // title
    doc.content[0].style = { fontSize: 16, bold: true, alignment: 'center' };
    doc.content[1].style = { fontSize: 12, bold: true, alignment: 'center' };
    // FIXED: proportional column widths for A4 landscape
    doc.content[2].table.widths = [
        '5%',   // No
        '30%',  // Nama
        '25%',  // TTL
        '10%',  // JK
        '20%',  // Cabang
        '10%'   // Status
    ];

    // default alignments
    doc.defaultStyle.alignment = 'center';
    doc.styles.tableHeader.alignment = 'center';

    // Left align Nama, TTL, Cabang
    doc.content[2].table.body.forEach(function (row, rowIndex) {
        if (rowIndex > 0) {
            row[1].alignment = 'left';
            row[2].alignment = 'left';
            row[4].alignment = 'left';
        }
    });

    doc.styles.tableBodyOdd = { noWrap: true };
    doc.styles.tableBodyEven = { noWrap: true };
},

exportOptions: {
    columns: ':not(:eq(6))'
}


        			},
          			{
					extend: 'print',
					messageTop: function () {
						return '<h4 style="text-align:center;font-weight: bold;letter-spacing: .2rem; line-height: 150%;">Daftar Anggota Koperasi</h4>';
					},
					title : 'Daftar Anggota Koperasi',
					exportOptions: {
						columns: ':visible',
						stripHtml: false,
					}
				}
        	]
	});
	$('.button_export_excel').click(() => { $('#anggota').DataTable().buttons(0,0).trigger() });
	$('.button_export_pdf').click(() => { $('#anggota').DataTable().buttons(0,1).trigger() });
	$('.button_export_print').click(() => { $('#anggota').DataTable().buttons(0,2).trigger() });
});
function Reload()
{
	var table = $('#anggota').DataTable();
	if (!$('.reload-overlay').length)
	{
		$('body').append('<div class="reload-overlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:#000; opacity:0.5; z-index:9999;"></div>');
	}

	$('.muter').addClass('fa-spin');
	$('.reload-overlay').show();
	table.ajax.reload(function() {
		$('.muter').removeClass('fa-spin');
		$('.reload-overlay').hide();
	});
	return false;
}
function Kosongi()
{
	Swal.fire({
		title: "Peringatan !",
		html: "<span class='tx-16 mb-0'>Menghapus Database Bisa Merusak Aplikasi !<br>Anda Tidak Bisa Membatalkan Setelah Diproses !</span>",
		imageUrl: "<?php echo base_url('assets/img/stop.png'); ?>",
		imageWidth: 150,
		imageHeight: 150,
		imageAlt: "Stop",
		showCancelButton: true,
		confirmButtonColor: "#d33",
		cancelButtonColor: "#3085d6",
		confirmButtonText: "<i class='fal fa-circle-exclamation fa-fw fa-lg mr-1'></i> Ya, Hapus",
		cancelButtonText: "Batal <i class='fal fa-xmark-circle fa-fw fa-lg ml-1'></i>"
	}).then((result) => {
		if (result.isConfirmed) {
			Notiflix.Loading.circle('Memproses.....');
			var values = {app_token: $('#app_token').val(), table: $('#table').val()};
			$.post("<?php echo base_url('master/anggota/hapus_database');?>", values, function(response)
			{
				var res = response;
				if (res.status == 'success')
				{
					Notiflix.Loading.remove();
					var notif = Lobibox.notify(response.status, {title: response.title, position: 'top right', icon: true, msg: response.message});
					setTimeout(() => {
						notif.remove();
						var table = $('#anggota').DataTable();
						table.ajax.reload();
						$('#modalGede').modal('hide');
					}, 2000);
				}
				else
				{
					Notiflix.Loading.remove();
					Lobibox.notify(res.status, {title: res.title, rounded: true, position: 'top right', icon: true, msg: res.message});
				}
			});
  		}
	});
}
</script>