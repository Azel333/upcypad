

			<form action="" method="post">
                
				<div class="col-12 text-center card-header">
					
					<div class="col-12">
						<div class="form-group">
	                        <label for="tambah"><strong class="card-title">Masukan Jumlah Langkah Yang Di butuhkan!</strong></label>
	                    </div>
	                </div>
	                <div class="container text-center">
						<div class="row">

		                    <div class="form-group col-9">
		                        <input id="tambah" name="tambah" type="text" class="form-control">
		                    </div>

			            	<div class="col-3">
			                <button id="tambah" type="submit" class="btn btn-info btn-block">Submit</button>
				            </div>

						</div>
					</div>

	            </div>
			</form>

  
<div class="col-lg-12 mt-5">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Tambahkan Artikel</strong>
        </div>

	    <div class="card-body">
	        <!-- Credit Card -->
	        <div id="pay-invoice">
	            <div class="card-body">

                	<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                		<div class="form-group has-success">
                            <label for="cc-name" class="control-label mb-1">Judul Artikel</label>
                            <input id="cc-name" name="cc-name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
	                    </div>
	                    <div class="form-group">
	                        <label for="cc-payment" class="control-label mb-1">Sub Judul</label>
	                        <input id="cc-pament" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false">
	                    </div>



<?php $b = 10; ?>
<?php for ($a = 1; $a <= $b; $a++): ?>


		                <div class="col-lg-12 mt-5">
						    <div class="card">
						        <div class="card-header">
						            <strong class="card-title">Langkah ke-<?= $a; ?></strong>
						        </div>

							    <div class="card-body">
							        <!-- Credit Card -->
							        <div id="pay-invoice">
							            <div class="card-body">

							                <div class="card-title">
							                    <h5 class="text-center">Upload Gambar Artikel - Langkah <?= $a; ?></h5>
							                </div>

						                	<hr>

						                    <div class="col-sm-10">
										    	<div class="row">
											    	<div class="col-sm-3">
											    		<img src="<?= base_url('assets/img/dokumen/default.png'); ?>" class="img-thumbnail" alt="">
											    	</div>
											    	<div class="col-sm-9 mt-5">
											    		<div class="custom-file">
														  <input type="file" class="custom-file-input" id="image" name="image">
														  <label class="custom-file-label" for="customFile">Choose file</label>
														</div>
											    	</div>
										    	</div>
										    </div>

										    <div class="row form-group">
                                                <div class="col-12 mt-4"><textarea name="textarea-input" id="textarea-input" rows="4" placeholder="Masukan isi langkah ke-<?= $a; ?>" class="form-control"></textarea></div>
                                            </div>


							            </div>
							        </div>
								</div>
							</div>
						</div>

<?php endfor; ?>

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