<div class="app-menu navbar-menu">
	<div class="navbar-brand-box">
		<a href="<?php echo base_url('dashboard');?>" class="logo">
			<span class="logo-sm">
                        	<img src="<?php echo base_url('assets/img/logo-light.webp'); ?>" alt="<?php echo get_setting('aplikasi'); ?>" height="22">
                    	</span>
                    	<span class="logo-lg">
                        	<img src="<?php echo base_url('assets/img/logo-light.webp'); ?>" alt="<?php echo get_setting('aplikasi'); ?>" height="22">
                    	</span>
		</a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
			<i class="ri-record-circle-line"></i>
                </button>
	</div>

	<div id="scrollbar">
    		<div class="container-fluid">
        		<div id="two-column-menu"></div>
        		<ul class="navbar-nav" id="navbar-nav">
				<li class="nav-item">
                			<a class="nav-link menu-link <?php if($this->uri->segment(1) == 'dashboard') { echo 'active'; } else { echo ''; } ?>" href="<?= base_url('dashboard'); ?>">
                    				<i class="bx bxs-dashboard"></i> <span>Dashboard</span>
                			</a>
            			</li>
<?php if(session('level') == '1') { $this->load->view('templates/superuser'); } else { ?>
				<?php
                			$menus = $this->App_menu_model->get_all_menus();
                			$menu_tree = $this->App_menu_model->build_tree($menus);
                			render_bootstrap_menu($menu_tree);
            			?>
<?php } ?>
			</ul>
		</div>
	</div>

</div>