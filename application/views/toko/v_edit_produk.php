<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  
<div class="col-lg-12 mt-5">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Tambahkan Produk</strong>
        </div>

	    <div class="card-body">
	        <!-- Credit Card -->
	        <div id="pay-invoice">
	            <div class="card-body">
	                <div class="card-title">
	                    <h5 class="text-center">Upload Gambar Produk</h5>
	                </div>

                	<hr>
                	<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

	                    <div class="col-sm-10">
					    	<div class="row">
						    	<div class="col-sm-3">
						    		<img src="<?= base_url('assets/img/produk/'); ?><?= $produk['gambar']; ?>" class="img-thumbnail" alt="">
						    	</div>
						    	<div class="col-sm-9">
						    		<div class="custom-file">
									  <input type="file" class="custom-file-input" id="image" name="image">
									  <label class="custom-file-label" for="customFile">Choose file</label>
									</div>
						    	</div>
					    	</div>
					    </div>

	                	<hr>

	                    <div class="form-group has-success">
	                            <label for="cc-name" class="control-label mb-1">Nama Produk</label>
	                            <input id="cc-name" name="cc-name" type="text" class="form-control" value="<?= $produk['nama_produk']; ?>">
	                    </div>
	                    <div class="form-group">
	                        <label for="cc-payment" class="control-label mb-1">Deskripsi Produk</label>
	                        <input id="cc-pament" name="cc-payment" type="text" class="form-control" value="<?= $produk['spesifikasi_produk']; ?>">
	                    </div>
	                    <div class="form-group">
	                        <label for="cc-payment" class="control-label mb-1">Harga Produk</label>
	                        <input id="cc-pament" name="cc-payment" type="text" class="form-control" value="<?= $produk['harga_produk']; ?>">
	                    </div>
	                    
	                    <div class="form-group">
	                        <label for="cc-number" class="control-label mb-1">Jumlah Stok</label>
	                        <input id="cc-number" name="cc-number" type="tel" class="form-control">
	                    </div>

	                    <div class="col-12 text-center">
							<div class="row">
				            	<div class="col-3 mt-5">
				                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">Submit</button>
					            </div>
							</div>
			            </div>

					</form>
	            </div>
	        </div>
		</div>
	</div>
</div>