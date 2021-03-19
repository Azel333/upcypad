<link href="<?= base_url('assets/'); ?>css/style_toko/my_toko.css" rel="stylesheet">

<div class="container text-center col-12" id="head-toko">
	<div class="row back-toko">
    <div class="col-12">
      <div class="profile_background">
      	<img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" height=200>
      </div><br>
      <div class="text-head col-9">
      <h5 class=""><?= $user['username']; ?></h5>
      <p class="quote"><i class="fas fa-quote-left"></i> Hidup adalah tentang pilihan mau jadi seperti apa nantinya di tentukan oleh pilihan yang di ambil <i class="fas fa-quote-right"></i></p>
      </div>
    </div>
  </div>
</div>

<hr>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <strong>Data Toko</strong>
        </div>
        <div class="card-body card-block">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">


			<div class="col-lg-12">
			    <div class="card">
			        <div class="card-header"><strong>Company Profile</strong></div>
			        <div class="card-body card-block">


			            <div class="form-group"><label for="company" class=" form-control-label">Nama Toko</label>
			            	<input type="text" id="company" placeholder="Enter your company name" class="form-control" readonly=""></div>

			            <div class="form-group"><label for="vat" class=" form-control-label">Your Email</label>
			            	<input type="text" id="vat" placeholder="Enter Your Email" class="form-control" readonly=""></div>

			            <div class="form-group"><label for="street" class=" form-control-label">Nama Komplek/Desa</label>
			            	<input type="text" id="street" placeholder="Enter street name" class="form-control" readonly=""></div>

			            <div class="form-group"><label for="street" class=" form-control-label">No. Rumah/RT/RW</label>
			            	<input type="text" id="street" placeholder="Enter street name" class="form-control" readonly=""></div>

			            <div class="form-group"><label for="street" class=" form-control-label">Nama Jalan</label>
			            	<input type="text" id="street" placeholder="Enter street name" class="form-control" readonly=""></div>
			            	

			            <div class="row form-group">
			                <div class="col-6">
			                    <div class="form-group"><label for="city" class=" form-control-label">Kota</label>
			                    	<input type="text" id="city" placeholder="Enter your city" class="form-control" readonly=""></div>
			                </div>

			                <div class="col-6">
			                        <div class="form-group"><label for="postal-code" class=" form-control-label">Kode POS</label>
			                        	<input type="text" id="postal-code" placeholder="Postal Code" class="form-control" readonly=""></div>
			                </div>
			            </div>

			            <div class="form-group"><label for="country" class=" form-control-label">Negara</label>
			            	<input type="text" id="country" placeholder="Country name" class="form-control" readonly=""></div>

			        </div>
			    </div>
			</div>
			                                
         


			<div class="col-lg-12 mt-5">
			    <div class="card">
			        <div class="card-header">
			            <strong class="card-title">Credit Card</strong>
			        </div>

				    <div class="card-body">
				        <!-- Credit Card -->
				        <div id="pay-invoice">
				            <div class="card-body">
				                <div class="card-title">
				                    <h3 class="text-center">Daftar Kartu Pembayaran</h3>
				                </div>
			                	<hr>

			                    <div class="form-group text-center">
			                        <ul class="list-inline">
			                            <li class="list-inline-item"><i class="text-muted fab fa-cc-visa fa-2x"></i></li>
			                            <li class="list-inline-item"><i class="fab fa-cc-mastercard fa-2x"></i></li>
			                            <li class="list-inline-item"><i class="fab fa-cc-amex fa-2x"></i></li>
			                            <li class="list-inline-item"><i class="fab fa-cc-discover fa-2x"></i></li>
			                        </ul>
			                    </div>
			                     	<label for="cc-name" class="control-label mb-1">Pemilik Kartu</label>
			                     	<input id="cc-name" name="cc-name" type="text" class="form-control" readonly="">
			                    <div class="form-group has-success row">
			                           
			                            <div class="col-6">
			                            	<label>Nama Depan</label>
			                            	<input id="cc-name" name="cc-name" type="text" class="form-control" readonly="">
			                            </div>


			                            <div class="col-6">
			                            	<label>Nama Belakang</label>
			                            	<input id="cc-name" name="cc-name" type="text" class="form-control" readonly="">
			                            </div>
			                            
			                    </div>
			                    <div class="form-group">
			                        <label for="cc-payment" class="control-label mb-1">Nama Bank</label>
			                        <input id="cc-pament" name="cc-payment" type="text" class="form-control" readonly="">
			                    </div>
			                    <div class="form-group">
			                        <label for="cc-payment" class="control-label mb-1">Nomor Rekening</label>
			                        <input id="cc-pament" name="cc-payment" type="text" class="form-control" readonly="">
			                    </div>
			                    
			                    <div class="form-group">
			                        <label for="cc-number" class="control-label mb-1">Card number</label>
			                        <input id="cc-number" name="cc-number" type="tel" class="form-control" readonly="">
			                    </div>
				            </div>
				        </div>
					</div>
				</div>
			</div>

			<div class="col-12 mt-5">
				<div class="card">
				    <div class="card-header">
				        <strong class="card-title">Upload Dokumen</strong>
				    </div>

				    <div class="card-body text-center">
				        <!-- Credit Card -->
				        <div id="pay-invoice">
				            <div class="card-body">
			                    <div class="form-group text-center">
								    <div class="">
								    	<div class="row">
									    	<div class="col-sm-6">
								    			<div>KTP/SIM</div>
									    		<img src="<?= base_url('assets/img/dokumen/default.png'); ?>" class="img-thumbnail" alt="">
									    	</div>
									    	<div class="col-sm-6">
								    			<div>BUKU REKENING</div>
									    		<img src="<?= base_url('assets/img/dokumen/default.png'); ?>" class="img-thumbnail" alt="">
									    	</div>
								    	</div>
								    </div>
								</div>
				            </div>
				        </div>
					</div>
				</div>
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