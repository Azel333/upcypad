<body>
	<link rel="stylesheet" href="<?php echo base_url('assets/style_css/template/navigasi/navigasi_admin.css') ?>">
	<script src="<?php echo base_url('assets/js/navigasi-admin.js'); ?>"></script>
	<div>
		<nav class="navbar navbar-expand-lg" id="navigasi">
			<a class="navbar-brand"><i class="fa fa-tachometer-alt"></i></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fa fa-bars"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
				</ul>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href=""><span><i class="fa fa-bell"></i></span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href=""><span><i class="fa fa-envelope"></i></span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link"><i class="fa fa-user"></i></a>
					</li>
				</ul>
			</div>
		</nav>
	</div>

	<!-- SIDEBAR NAVIGASI -->
	<!-- ############################################################### -->
	<!-- ############################################################### -->
	<!-- ############################################################### -->
	<!-- ############################################################### -->
	<!-- ############################################################### -->
	<div class="contain-profile" id="contain-profile">
		<div class="card mb-3 text-center" id="card-profile">
			<div class="row no-gutters">
				<div class="col-md-12">
					<img src="<?= base_url('assets/img/') ?>default.png" alt="">
				</div>
				<div class="col-md-12">
					<div class="card-body">
						<strong class="card-title">Tedi Lesmana</strong>
						<p><small class="card-text">tedi.lesmana0123@gmail.com.</small></p>
						<p><a href="<?= base_url('admin/logout'); ?>">Keluar</a></p>
						<hr>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="contain-sidebar" class="col-12 pl-0">
		<!-- Sidebar -->
		<div class="navbar-nav"> 
			<ul id="menu">
				<!-- QUERY DARI MENUU -->
				<?php
					$role_id = $this->session->userdata('role_id');
					$queryMenu = " SELECT `user_menu`.`id`, `menu`, `icon_menu`
						FROM `user_menu`
						JOIN `user_access_menu`
						ON `user_menu`.`id` = `user_access_menu`.`menu_id`
						WHERE `user_access_menu`.`role_id` = $role_id
						ORDER BY `user_access_menu`.`menu_id` ASC
					";

					$menu = $this->db->query($queryMenu)->result_array();
				?>

				<!-- Looping Menu -->
				<nav class="navbar">
					<?php foreach ($menu as $m): ?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-item icon-menu" href="#" id="drop-menu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="<?= $m['icon_menu']; ?>"></i>
								<?= $m['menu']; ?>
							</a>
							<ul id="sub-menu">
								<!-- siapkan sub menu sesuai menu -->
								<?php
									$menuId = $m['id'];
									$querySubMenu = " SELECT *
										FROM `user_sub_menu`
										JOIN `user_menu`
										ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
										WHERE `user_sub_menu`.`menu_id` = $menuId
										AND `user_sub_menu`.`is_active` = 1
									";
									$subMenu = $this->db->query($querySubMenu)->result_array();
								?>
								<?php foreach ($subMenu as $sm): ?>
									<li class="">
										<a class="icon-submenu dropdown-item" href="<?= base_url($sm['url']); ?>">
											<span><?= $sm['title']; ?></span>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</li>
					<?php endforeach; ?>
				</nav>
			</ul>
	  	</div>
	 </div>
</body>