
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Pengaturan</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item active" aria-current="page">Aplikasi Sistem</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<!--<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>-->
					</div>
				</div>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead class="table-dark">
									<tr>
										<th>No</th>
										<th>Nama Setting</th>
										<th>Isi / Value</th>
										<th class="text-center">Aksi</th>
									</tr>
								</thead>
								<tbody>
								    <?php $hasil = $this->db->where('nama !=', 'developer')->get('app_system'); if($hasil->num_rows() > 0) { $no = 1;  foreach($hasil->result() as $row) { ?>
									<tr>
										<td><?php echo $no++; ?>.</td>
										<td><?php echo $row->nama; ?></td>
										<td><?php echo $row->isi; ?></td>
										<td class="text-center">
										    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah ?">
										        <a href="javascript:void(0);" class="btn btn-xs btn-success radius-30" data-href="<?php echo base_url('superuser/form_ubah_setting/'.$row->id); ?>" data-name="Ubah Pengaturan Sistem Aplikasi ?" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="bx bx-pencil bx-xs"></i></a>
										    </span>
										    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus ?">
										        <a href="javascript:void(0);" class="btn btn-xs btn-danger radius-30" data-href="<?php echo base_url('superuser/hapus_setting'.$row->id); ?>" data-name="Hapus Pengaturan Sistem ?" data-bs-toggle="modal" data-bs-target="#HapusModal"><i class="bx bx-trash bx-xs"></i></a>
										    </span>
										</td>
									</tr>
                                    <?php } ?>									
                                    <?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				
				
				
				

	<script>
		$(document).ready(function() {
			$('#example').DataTable( {
		        language: {url:"<?php echo base_url('assets/js/Indonesian.json');?>"},
		        autoWidth: false,
        	    processing: true,
        	    serverSide: false,
		        ordering: true,
		        order: []
	        });
        });
	</script>				