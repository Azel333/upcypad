<link rel="stylesheet" href="<?= base_url('assets/style_css/'); ?>template/body_pengunjung.css">

<body>

<div>
	<nav class="navbar navbar-expand-lg" id="navigasi">
	  <a class="navbar-brand" href="<?= base_url('pengunjung'); ?>"><i class="fa fa-home"></i></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="fa fa-bars"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
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
	    	<li class="nav-item">
			        <a class="nav-link" href="<?= base_url('pengunjung/kontak'); ?>">Kontak</a>
			    </li>

			    <li class="nav-item">
			        <a class="nav-link" href="<?= base_url('pengunjung/tentang_kami'); ?>">Tentang Kami</a>
			    </li>

			    <li class="nav-item">
			        <a class="nav-link" href="<?= base_url('auth/daftar'); ?>">Daftar</a>
			    </li>

			    <li class="nav-item">
			        <a class="nav-link" href="<?= base_url('auth'); ?>">Masuk</a>
			    </li>
	    </ul>
	  </div>


			   	<div class="bmd-form-group bmd-collapse-inline" id="search">
						<button class="btn bmd-btn-icon" for="search" data-toggle="collapse" data-target="#collapse-search" aria-expanded="false" aria-controls="collapse-search" id="search">
							<i class="fa fa-search"></i>
						</button>  
						<span id="collapse-search" class="collapse">
							<input class="form-control" type="text" id="text-search" placeholder="Cari...">
						</span>
				</div>

	</nav>
</div>
	

	<div id="content-header">
		<?php 
		/*
			Variabel $contentnya diambil dari libraries template.php
			(application/libraries/template.php)
		*/
			echo $content;
		?>
	</div>

</body>