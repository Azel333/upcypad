<body>
	<nav class="navbar navbar-expand-lg" id="navigasi">
		<a class="navbar-brand" href="<?= base_url('admin-login'); ?>"><i class="fa fa-home"></i></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="fa fa-bars"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li>
					<a class="nav-link" href="<?= base_url('admin-login'); ?>">Beranda</a>
				</li>
				<li class="nav nav-item">
					<a class="nav-link" href="<?= base_url(''); ?>">Beranda User</a>
				</li>
			</ul>

			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('auth'); ?>">Masuk User</a>
				</li>
			</ul>
		</div>
	</nav>
</body>