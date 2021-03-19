<?php 
        $contain= $this->cart->contents();
?>

<body>
	<link rel="stylesheet" href="<?php echo base_url('assets/style_css/template/navigasi/navigasi_utama.css') ?>">
	<div>
		<nav class="navbar navbar-expand-lg" id="navigasi">
			<a class="navbar-brand" href="<?= base_url('pengunjung'); ?>"><i class="fa fa-home"></i></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fa fa-bars"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li>
						<a class="nav-link" href="<?= base_url('pengunjung/event'); ?>">Event</a>
					</li>
					<li class="nav nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tutorial</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="<?= base_url('pengunjung/artikel'); ?>">Artikel</a>
							<a class="dropdown-item" href="<?= base_url('pengunjung/video'); ?>">Video</a>
						</div>
					</li>
					<li class="nav nav-item">
						<a class="nav-link" href="<?= base_url('pengunjung/produk'); ?>">Produk</a>
					</li>
				</ul>
				<ul class="navbar-nav">
					<li class="nav-ite  icon-notifikasi">
						<a class="nav-link" href="<?= base_url('cart/shopping-cart'); ?>">
							<span><i class="fa fa-shopping-cart"><b class="text-center" id="jumlah_cart"><?= count($contain); ?></b></i></span>
						</a>
					</li>
					<li class="nav-ite  icon-notifikasi">
						<a class="nav-link" href="<?= base_url('auth/daftar'); ?>">
							<span><i class="fa fa-bell"></i></span>
						</a>
					</li>
					<li class="nav-item ml-1  icon-notifikasi">
						<a class="nav-link" href="<?= base_url('auth/daftar'); ?>">
							<span><i class="fa fa-envelope"></i></span>
						</a>
					</li>
					<li class="nav-item">
						<ul id="contain-menu">
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
							<nav class="">
								<?php foreach ($menu as $m): ?>
									<li class="nav-item list-menu dropdown <?= $m['menu']; ?>">
										<a class="nav-link dropdown-item icon-menu" href="#" id="drop-menu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="<?= $m['icon_menu']; ?>"></i>
											<?= $m['menu']; ?>
										</a>
										<div class="dropdown-menu dropdown-menu-right" id="drop-submenu">
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
													<li class="list-submenu">
														<a class="icon-submenu dropdown-item" href="<?= base_url($sm['url']); ?>">
															<span><i class="<?= $sm['icon']; ?>"></i> <?= $sm['title']; ?></span>
														</a>
													</li>
												<?php endforeach; ?>
											</ul>
										</div>
									</li>
								<?php endforeach; ?>
							</nav>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</body>