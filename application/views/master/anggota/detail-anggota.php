<input type="hidden" id="app_token" name="app_token" value="<?php echo session('app_token'); ?>">
<input type="hidden" id="id" name="id" value="<?php echo $nasabah->id; ?>">
<div class="row row-sm">
	<div class="col-lg-12 col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="row row-sm">
					<div class="col-lg-4">
						<div class="card border border-3 border-primary rounded bg-light">
							<div class="card-body">
								<div class="text-center item-user">
									<div class="profile-pic">
										<div class="profile-pic-img">												
											<img src="<?php $photo = $nasabah->photo ? $nasabah->photo : 'avatar.png'; echo base_url('assets/img/users/'.$photo); ?>" class="rounded-circle" alt="user">
										</div>
										<a href="#" class="text-dark"><h5 class="mt-3 mb-3 font-weight-semibold"><?php $aktif = get_online($nasabah->id)->has_login ?? 'None'; if($aktif == 'true') { echo '<span class="badge bg-success dots" data-bs-toggle="tooltip" data-bs-placement="top" title="Aktif">Online</span>'; } else { echo '<span class="badge bg-danger dots" data-bs-toggle="tooltip" data-bs-placement="top" title="Offline">Offline</span>'; } ?></h5></a>
									</div>
								</div>
								<ul class="item1-links nav nav-tabs mb-0">
									<li class="nav-item" data-bs-placement="bottom" data-bs-toggle="tooltip" title="<?php echo $nasabah->status; ?>">
										<a href="javascript:void(0);" class="nav-link"><i class="fa-light fa-user-plus fa-fw"></i>
										<?php
											if ($nasabah->status == 'aktif')
											{
												echo '<span class="badge bg-success text-capitalize tx-14">Anggota Aktif</span>';
											}
											if ($nasabah->status == 'nonaktif')
											{
												echo '<span class="badge bg-warning text-capitalize tx-14 text-white">Tidak Aktif</span>';
											}
											if ($nasabah->status == 'baru')
											{
												echo '<span class="badge bg-info text-capitalize tx-14">Pendaftar Baru</span>';
											}
											if ($nasabah->status == 'tolak')
											{
												echo '<span class="badge bg-danger text-capitalize tx-14">Pendaftaran Ditolak</span>';
											}
										?>	
										</a>
									</li>
									<li class="nav-item" style="margin-bottom: -20px;">
										<a href="javascript:void(0);" class="nav-link middle"><i class="fa-light fa-envelope-circle-check icon1 fa-fw"></i>

										<?php
											$anggota = $this->db->where('member_id', $nasabah->id)->get('app_users')->row();
											$statuse = $anggota->aktifasi ?? 'None';
											if ($statuse == 'sudah')
											{
												echo '<span class="badge bg-success text-capitalize tx-14">'.$statuse.' Aktifasi / Konfirmasi Email</span>';
											}
											else
											{
												echo '<span class="badge bg-warning text-capitalize text-white tx-14">'.$statuse.' Aktifasi / Konfirmasi Email</span>';
											}
										?>

										</a>
									</li>
								</ul>
							</div>

						</div>
					</div>
					<div class="col-lg-8">
						<div class="card border border-3 border-primary rounded bg-light">
							<div class="card-body">
								<div class="row mb-3">
									<div class="col-md-3">
										<h6 class="mb-0">Nama Lengkap</h6>
									</div>
									<div class="col-md-9 text-secondary">: <b><?php echo $nasabah->nama; ?></b></div>
								</div>

								<div class="row mb-3">
									<div class="col-md-3">
										<h6 class="mb-0">E KTP</h6>
									</div>
									<div class="col-md-9 text-secondary">
										: <b><?php echo $nasabah->ktp; ?></b>
									</div>
								</div>

								<div class="row mb-3">
									<div class="col-md-3">
										<h6 class="mb-0">Tempat, Tgl Lahir</h6>
									</div>
									<div class="col-md-9 text-secondary">
										: <?php echo $nasabah->tempat_lahir; ?>, <?php if(empty($nasabah->tanggal_lahir)) { } else { echo tgl_jabar($nasabah->tanggal_lahir); } ?>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-3">
										<h6 class="mb-0">Jenis Kelamin</h6>
									</div>
									<div class="col-md-9 text-secondary" style="text-transform: capitalize;">
										: <?php echo $nasabah->jk; ?>
									</div>
								</div>

								<div class="row mb-3">
									<div class="col-md-3">
										<h6 class="mb-0">Cabang</h6>
									</div>
									<div class="col-md-9 text-secondary">
										: <?php echo get_cabang($nasabah->cabang)->nama; ?>
									</div>
								</div>

								<div class="row mb-3">
									<div class="col-md-3">
										<h6 class="mb-0">No Whatsapp / Telp</h6>
									</div>
									<div class="col-md-9 text-secondary">
										: <?php echo $nasabah->phone; ?>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-3">
										<h6 class="mb-0">Alamat</h6>
									</div>
									<div class="col-md-9 text-secondary">
										: <?php echo $nasabah->alamat; ?>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-3">
										<h6 class="mb-0">Bergabung Pada</h6>
									</div>
									<div class="col-md-9 text-secondary">
										: <?php echo waktu_lalu($nasabah->created_at).' / '.tgl_jabar($nasabah->created_at); ?>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-3">
										<h6 class="mb-0">Masa Pensiun </h6>
									</div>
									<div class="col-md-9 text-secondary"> : <b>
										<?php
											$awal  = date_create($nasabah->tanggal_lahir ?? '');
											$akhir = date_create();
											$diff  = date_diff( $awal, $akhir );
											$pensiun = get_setting('usia_pensiun') - $diff->y;
											echo $pensiun.' Tahun '.$diff->m . ' bulan Lagi';
										?>
										</b>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="mb-4">  </div>
					<div class="col-lg-12 text-center modal-footer middle">
						<div style="display: inline-table; margin-bottom:-22px;">
							<button class="btn ripple btn-dark" data-bs-dismiss="modal"><i class="fa-light fa-circle-xmark fa-fw fa-lg ml-0"></i> Tutup </button>
							<?php if ($nasabah->status == 'baru') { ?>
								<button class="btn ripple btn-success" id="proses" onclick="Aktifkan(); return false;">Terima <i class="fa-light fa-circle-check fa-fw fa-lg mr-0"></i> </button>
								<button class="btn ripple btn-danger" id="tolak" onclick="Tolak();">Tolak <i class="fa-regular fa-hand fa-fw fa-lg mr-0"></i></button>
							<?php } ?>
							<?php if ($nasabah->status == 'aktif') { ?>
								<button class="btn ripple btn-warning" id="nonaktif" onclick="NonAktif(); return false;">Non Aktifkan <i class="fa-light fa-circle-exclamation fa-fw fa-lg mr-0"></i> </button>
							<?php } ?>
							<?php if ($nasabah->status == 'nonaktif') { ?>
								<button class="btn ripple btn-danger" id="aktif" onclick="Aktifkan(); return false;">Aktifkan <i class="fa-light fa-circle-xmark fa-fw fa-lg mr-0"></i></button>
							<?php } ?>
							<?php if ($nasabah->status == 'tolak') { ?>
								<button class="btn ripple btn-primary" id="terima"  onclick="Terima();">Terima <i class="fa-light fa-circle-xmark fa-fw fa-lg mr-0"></i></button>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
function Aktifkan()
{
	var values = {app_token: $('#app_token').val(), id: $('#id').val()};
	$("#aktif").html('<div class="light-loader1" role="status"><span class="sr-only"></span></div>&nbsp; Memproses');
	$.post("<?php echo base_url('master/anggota/aktifkan');?>", values, function(response)
	{
		var res = response;
		if (res.status == 'success')
		{
			$('#modalKing').modal('hide');

			var notif = Lobibox.notify(response.status, {title: response.title, position: 'top right', icon: true, msg: response.message});
			setTimeout(() => {
				notif.remove();
				var table = $('#anggota').DataTable();
				table.ajax.reload();
				$('#modalKing').modal('hide');
			}, 2000);
		}
		else
		{
			Lobibox.notify(res.status, {title: res.title, position: 'top right', icon: true, msg: res.message});
		}
	});
}
function NonAktif()
{
	var values = {app_token: $('#app_token').val(), id: $('#id').val()};
	$("#nonaktif").html('<div class="light-loader1" role="status"><span class="sr-only"></span></div>&nbsp; Memproses');
	$.post("<?php echo base_url('master/anggota/nonaktifkan');?>", values, function(response)
	{
		var res = response;
		if (res.status == 'success')
		{
			$('#modalKing').modal('hide');
			var notif = Lobibox.notify(response.status, {title: response.title, position: 'top right', icon: true, msg: response.message});
			setTimeout(() => {
				notif.remove();
				var table = $('#anggota').DataTable();
				table.ajax.reload();
				$('#modalKing').modal('hide');
			}, 2000);
		}
		else
		{
			Lobibox.notify(res.status, {title: res.title, position: 'top right', icon: true, msg: res.message});
		}
	});
}
function Terima()
{
	var values = {app_token: $('#app_token').val(), id: $('#id').val()};
	$("#aktif").html('<div class="light-loader1" role="status"><span class="sr-only"></span></div>&nbsp; Memproses');
	$.post("<?php echo base_url('master/anggota/terima');?>", values, function(response)
	{
		var res = response;
		if (res.status == 'success')
		{
			$('#modalKing').modal('hide');

			var notif = Lobibox.notify(response.status, {title: response.title, position: 'top right', icon: true, msg: response.message});
			setTimeout(() => {
				notif.remove();
				var table = $('#anggota').DataTable();
				table.ajax.reload();
				$('#modalKing').modal('hide');
			}, 2000);
		}
		else
		{
			Lobibox.notify(res.status, {title: res.title, position: 'top right', icon: true, msg: res.message});
		}
	});
}
function Tolak()
{
	var values = {app_token: $('#app_token').val(), id: $('#id').val()};
	$("#aktif").html('<div class="light-loader1" role="status"><span class="sr-only"></span></div>&nbsp; Memproses');
	$.post("<?php echo base_url('master/anggota/tolak');?>", values, function(response)
	{
		var res = response;
		if (res.status == 'success')
		{
			$('#modalKing').modal('hide');

			var notif = Lobibox.notify(response.status, {title: response.title, position: 'top right', icon: true, msg: response.message});
			setTimeout(() => {
				notif.remove();
				var table = $('#anggota').DataTable();
				table.ajax.reload();
				$('#modalKing').modal('hide');
			}, 2000);
		}
		else
		{
			Lobibox.notify(res.status, {title: res.title, position: 'top right', icon: true, msg: res.message});
		}
	});
}
</script>