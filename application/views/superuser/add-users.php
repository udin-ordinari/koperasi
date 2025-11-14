<div class="main-content side-content">
	<div class="main-container container-fluid">
		<div class="inner-body">
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-24 mg-b-5"><?php echo $page; ?>
					<span class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></span>
					</h2>
				</div>
			</div>
			<div class="row row-sm">
				<div class="col-lg-12 col-md-12">
					<div class="card">
						<div class="card-body">
							<form>
							<input type="hidden" name="app_token" id="app_token" class="form-control" value="<?php echo session('app_token'); ?>">
							<input type="text" name="userid" id="userid" class="form-control" readonly>
							<div class="col-md-6">
								<label for="input30">Pilih Anggota</label>
								<div class="input-group"> <span class="input-group-text"><i class="fa fa-user"></i></span>
									<input type="text" id="nama" name="nama" class="form-control" placeholder="Cari Anggota" data-bs-toggle="modal" data-bs-target="#modalKing" data-href="<?php echo base_url('master/anggota/cari_anggota');?>" data-name="Cari Data Anggota">
								</div>
							</div>
							<div class="col-md-6">
								<label for="input33">Level</label>
								<div class="input-group"> <span class="input-group-text"><i class="fa fa-user-plus"></i></span>
									<?php $level = $this->sistem->select_dropdown('app_groups'); echo form_dropdown('level', $level, '', 'class="form-control select2" id="level"');?>
								</div>
							</div>
							<div class="col-md-6">
								<label for="input30">Username</label>
								<div class="input-group"> <span class="input-group-text"><i class="fa fa-user"></i></span>
									<input type="text" class="form-control" id="username" name="username">
								</div>
							</div>
							<div class="col-md-6">
								<label for="input33">Password</label>
								<div class="input-group">
									<span class="input-group-text cursor-pointer" id="mybutton" onclick="change(); return false;"><i id="adClass" class="fa fa-eye-slash"></i></span>
									<input type="password" name="password" id="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password">
								</div>
							</div>
							</form>
				
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
