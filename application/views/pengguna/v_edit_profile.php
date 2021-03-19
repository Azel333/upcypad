
<div class="col-lg-12 mt-5">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Form Data Diri</strong>
        </div>

	    <div class="card-body">
	        <!-- Credit Card -->
	        <div id="pay-invoice">
	            <div class="card-body">

                	<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

	                	<div class="form-group row">
						    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
						    <div class="col-sm-10">
						      <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
						    </div>
						</div>
						<div class="form-group row">
						    <label for="inputEmail3" class="col-sm-2 col-form-label">Full name</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
						      <?= form_error('name','<small class="text-danger pl-3">','</small>'); ?>
						    </div>
						</div>
						<div class="form-group row">
						    <div class="col-sm-2">Picture</div>
						    <div class="col-sm-10">
						    	<div class="row">
							    	<div class="col-sm-3">
							    		<img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail" alt="">
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

                		<div class="form-group has-success">
                            <label for="cc-name" class="control-label mb-1">No. Handphone</label>
                            <input id="cc-name" name="cc-name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
	                    </div>




		                <div class="col-lg-12 mt-5 mb-5">
						    <div class="card">
						        <div class="card-header">
						            <strong class="card-title">Alamat</strong>
						        </div>

							    <div class="card-body">
							        <!-- Credit Card -->
							        <div id="pay-invoice">
							            <div class="card-body">

							            	<div class="form-group row">
											    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Perumahan/Desa</label>
											    <div class="col-sm-9">
											      <input type="email" class="form-control" id="email" name="email" value="">
											    </div>
											</div>

											<div class="form-group row">
											    <label for="inputEmail3" class="col-sm-3 col-form-label">No. Rumah</label>
											    <div class="col-sm-9">
											      <input type="email" class="form-control" id="email" name="email" value="">
											    </div>
											</div>

											<div class="form-group row">
											    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Jalan</label>
											    <div class="col-sm-9">
											      <input type="email" class="form-control" id="email" name="email" value="">
											    </div>
											</div>

											<div class="form-group row">
											    <label for="inputEmail3" class="col-sm-3 col-form-label">RT</label>
											    <div class="col-sm-9">
											      <input type="email" class="form-control" id="email" name="email" value="">
											    </div>
											</div>

											<div class="form-group row">
											    <label for="inputEmail3" class="col-sm-3 col-form-label">RW</label>
											    <div class="col-sm-9">
											      <input type="email" class="form-control" id="email" name="email" value="">
											    </div>
											</div>

											<div class="form-group row">
											    <label for="inputEmail3" class="col-sm-3 col-form-label">Kelurahan</label>
											    <div class="col-sm-9">
											      <input type="email" class="form-control" id="email" name="email" value="">
											    </div>
											</div>

											<div class="form-group row">
											    <label for="inputEmail3" class="col-sm-3 col-form-label">Kecamatan</label>
											    <div class="col-sm-9">
											      <input type="email" class="form-control" id="email" name="email" value="">
											    </div>
											</div>

											<div class="form-group row">
											    <label for="inputEmail3" class="col-sm-3 col-form-label">Kota</label>
											    <div class="col-sm-9">
											      <input type="email" class="form-control" id="email" name="email" value="">
											    </div>
											</div>

											<div class="form-group row">
											    <label for="inputEmail3" class="col-sm-3 col-form-label">Provinsi</label>
											    <div class="col-sm-9">
											      <input type="email" class="form-control" id="email" name="email" value="">
											    </div>
											</div>

										    <div class="row form-group">
                                                <div class="col-12 mt-4"><textarea name="textarea-input" id="textarea-input" rows="4" placeholder="Masukan deskripsi lokasi tempat tinggal" class="form-control"></textarea></div>
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
</div>
