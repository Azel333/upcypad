<link rel="stylesheet" href="<?php echo base_url('assets/style_css/template/navigasi/navigasi_tentang.css') ?>">
<div class="container-fluid">

	<!-- Timeline -->
	<nav class="timeline col-lg-12">
		<div class="timeline-cover">
			<img src="<?php echo base_url('assets/img/background/').$data_user['back_image'];?>" class="timeline-cover">
			<div class="timeline-nav-bar hidden-sm hidden-xs">
				<div class="row">
					<div class="col-md-3">
						<div class="profile-info">
							<img src="<?php echo base_url('assets/img/profile/').$user['image'];?>" alt="" class="img-responsive profile-photo" />
							<h3><?php echo $user['username'];?></h3>
							<p class="text-muted text-capitalize"><?php echo ($data_user['nama_depan']);?> <?php echo $data_user['nama_belakang'];?></p>
						</div>
					</div>
					<div class="col-md-9">
						<ul class="list-inline profile-menu">
							<li>
								<a href="<?php echo base_url('user/recreate') ?>">Recreate</a>
							</li>
							<li>
								<a href="<?php echo base_url('pengguna/profile-saya') ?>" class="active">Tentang Saya</a>
							</li>
							<li>
								<a href="">Diikuti</a>
							</li>
							<li>
								<a href="">Pengikut</a>
							</li>
							<li>
								<a href="">Bookmark</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>

</div>