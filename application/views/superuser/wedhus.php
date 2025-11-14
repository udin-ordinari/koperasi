<div class="main-content side-content pt-0">
	<div class="main-container container-fluid">
		<div class="inner-body">
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-24 mg-b-5">Basic Tables</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Maps & Tables</a></li>
						<li class="breadcrumb-item active" aria-current="page">Basic Tables</li>
					</ol>
				</div>
				<div class="d-flex">
					<div class="justify-content-center">
						<button type="button" class="btn btn-white btn-icon-text my-2 me-2">
							<i class="fe fe-download me-2"></i> Import
						</button>
						<button type="button" class="btn btn-white btn-icon-text my-2 me-2">
							<i class="fe fe-filter me-2"></i> Filter
						</button>
						<button type="button" class="btn btn-primary my-2 btn-icon-text">
							<i class="fe fe-download-cloud me-2"></i> Download Report
						</button>
					</div>
				</div>
			</div>
			<div class="row row-sm">
				<div class="col-lg-12">
					<div class="card custom-card">
						<div class="card-body">
							<?php $session_data = $this->config->item('member_id'); echo $session_data; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>