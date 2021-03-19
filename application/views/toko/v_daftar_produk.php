        <!-- Begin Page Content -->
        <div class="container-fluid">


<div class="col-12">
    <div class="card">
        <div class="card-header">
            <strong>Daftar Barang</strong>
        </div>
        <div class="card-body card-block">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">


<?php foreach ($produk as $pd): ?>

          <div class="container">
          	<div class="row">
      			<div class="kartu col-2">
		          <img src="../assets/img/produk/<?= $pd['gambar']; ?>" height="100" width="100" alt="">
		        </div>
		        <div class="col-6">
		          <strong><?= $pd['nama_produk'];?></strong>
		          <p>Diskon : <?= $pd['jumlah_diskon'];?> </p>
		          <p>Harga : Rp. <?= $pd['harga_produk'];?></p>
		          <p>Harga Promo : Rp.<?= $pd['harga_promo'];?></p>
		      	</div>
		      	<div class="col-4">
		          <p>
		              <a href="<?= base_url('toko/edit_produk/') . $pd['id_produk']; ?>" class="badge badge-primary">Edit Produk</a>
					  <a href="" class="badge badge-primary">Tambah stok</a>
					  <a href="" class="badge badge-success">Hapus Produk</a></span>
		          </p>
			         
		      	</div>
          	</div>
          </div>

<?php endforeach; ?>


			</form>
		</div>
	</div>
</div>



		