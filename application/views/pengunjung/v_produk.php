<link href="<?= base_url('assets/'); ?>style_css/pengunjung/produk.css" rel="stylesheet">

<div class="contain-artikel" id="contain-artikel">
  <div class="col-12"  id="card-artikel">
    <div class="row">

            <?php foreach ($produk as $pd) : ?>

              <?php $nama_gambar = explode("//-//", $pd['array_gambar']); ?>

               <div class="col-2 mb-4">
                <div class="card">
                    <img class="card-img-top" src="<?= base_url('assets/img/'); ?>profile/<?= $nama_gambar[0]; ?>" alt="Card image cap" height="150">
                    <div class="card-body card-head-body">
                      <p><?= $pd['nama_produk']; ?></p>
                    </div>
                    <div class="card-desk-body">
                    <p class="card-text">Harga : Rp.<?= $pd['harga_produk']; ?>-</p>
                    <p class="harga-asli">Rp. <?php $harga_jual=$pd['harga_produk']-($pd['diskon']/100*$pd['harga_produk']); echo "$harga_jual"; ?> </p>
                    </div>
                    <div class="diskon mb-5">
                      <p><?= $pd['diskon']; ?>%</p>
                    </div>
                </div>
                <a href="<?= base_url('pengguna/keranjang'); ?>"><div class="link_shop"></div></a>
                <input type="number" name="quantity" id="id" value="1" class="quantity form-control" hidden="">
                    <button class="add_cart btn btn-success btn-block" data-id="<?= $pd['id_produk']; ?>" data-produknama="<?= $pd['nama_produk']; ?>" data-produkharga="<?php $harga_jual=$pd['harga_produk']-($pd['diskon']/100*$pd['harga_produk']); echo "$harga_jual"; ?>">Add To Cart
                    </button>
              </div>
 
            <?php endforeach;?>
                 
    </div>
  </div>
</div>