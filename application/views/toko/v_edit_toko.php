        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>




<div class="col-12">
    <div class="card">
        <div class="card-header">
            <strong>Form Pendaftaran-isi guna keamanan bertransaksi</strong>
        </div>
        <div class="card-body card-block">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">


			<div class="col-lg-12">
			    <div class="card">
			        <div class="card-header"><strong>Company Profile</strong></div>
			        <div class="card-body card-block">


			            <div class="form-group"><label for="company" class=" form-control-label">Nama Toko</label>
			            	<input type="text" id="company" placeholder="Enter your company name" class="form-control"></div>

			            <div class="form-group"><label for="vat" class=" form-control-label">Your Email</label>
			            	<input type="text" id="vat" placeholder="Enter Your Email" class="form-control"></div>

			            <div class="form-group"><label for="street" class=" form-control-label">Nama Komplek/Desa</label>
			            	<input type="text" id="street" placeholder="Enter street name" class="form-control"></div>

			            <div class="form-group"><label for="street" class=" form-control-label">No. Rumah/RT/RW</label>
			            	<input type="text" id="street" placeholder="Enter street name" class="form-control"></div>

			            <div class="form-group"><label for="street" class=" form-control-label">Nama Jalan</label>
			            	<input type="text" id="street" placeholder="Enter street name" class="form-control"></div>

			            <div class="row form-group">
			                <div class="col-8">
			                    <div class="form-group"><label for="city" class=" form-control-label">Kota</label>
			                    	<input type="text" id="city" placeholder="Enter your city" class="form-control"></div>
			                </div>

			                <div class="col-8">
			                        <div class="form-group"><label for="postal-code" class=" form-control-label">Kode POS</label>
			                        	<input type="text" id="postal-code" placeholder="Postal Code" class="form-control"></div>
			                </div>
			            </div>

			            <div class="form-group"><label for="country" class=" form-control-label">Negara</label>
			            	<input type="text" id="country" placeholder="Country name" class="form-control"></div>

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
			                    <div class="form-group has-success">
			                            <label for="cc-name" class="control-label mb-1">Name Pemilik Kartu</label>
			                            <input id="cc-name" name="cc-name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
			                            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
			                    </div>
			                    <div class="form-group">
			                        <label for="cc-payment" class="control-label mb-1">Nama Bank</label>
			                        <input id="cc-pament" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false">
			                    </div>
			                    <div class="form-group">
			                        <label for="cc-payment" class="control-label mb-1">Nomor Rekening</label>
			                        <input id="cc-pament" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false">
			                    </div>
			                    
			                    <div class="form-group">
			                        <label for="cc-number" class="control-label mb-1">Card number</label>
			                        <input id="cc-number" name="cc-number" type="tel" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
			                        <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
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

				    <div class="card-body">
				        <!-- Credit Card -->
				        <div id="pay-invoice">
				            <div class="card-body">
				                    <div class="form-group row">
									    <div class="col-sm-12">KTP/SIM</div>
									    <div class="col-sm-10">
									    	<div class="row">
										    	<div class="col-sm-3">
										    		<img src="<?= base_url('assets/img/dokumen/default.png'); ?>" class="img-thumbnail" alt="">
										    	</div>
										    	<div class="col-sm-9">
										    		<div class="custom-file">
													  <input type="file" class="custom-file-input" id="image" name="image">
													  <label class="custom-file-label" for="customFile">Choose file</label>
													</div>
										    	</div>
									    	</div>
									    </div>
									</div>
									<div class="form-group row">
									    <div class="col-sm-12">BUKU REKENING</div>
									    <div class="col-sm-10">
									    	<div class="row">
										    	<div class="col-sm-3">
										    		<img src="<?= base_url('assets/img/dokumen/default.png'); ?>" class="img-thumbnail" alt="">
										    	</div>
										    	<div class="col-sm-9">
										    		<div class="custom-file">
													  <input type="file" class="custom-file-input" id="image" name="image">
													  <label class="custom-file-label" for="customFile">Choose file</label>
													</div>
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


















        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

