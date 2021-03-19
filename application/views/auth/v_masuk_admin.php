

	<!-- Landing Page Contents -->
	<div id="lp-register">
		<div class="container wrapper">
			<div class="row justify-content-center">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="reg-form-container">

						  <div class="col-12">
						      <div class="card">
						          <div class="card-header card-header-text card-header-primary">
						            <div class="card-text">
						              <h4 class="card-title">Login</h4>
						            </div>
						          </div>
						          <div class="card-body">
						              <form method="post" action="<?php echo base_url('admin_login') ?>" id='Login_form'>




  <div class="form-group form-file-upload form-file-simple">
  	<?php if ($this->session->flashdata('username_salah')): ?>
		<div class="alert alert-warning" role="alert">
		  <?php echo $this->session->flashdata('username_salah'); ?>
		</div>
	<?php endif; ?>
	<?php if ($this->session->flashdata('password_salah')): ?>
		<div class="alert alert-warning" role="alert">
		  <?php echo $this->session->flashdata('password_salah'); ?>
		</div>
	<?php endif; ?>
    <hr>
  </div>

  <div class="form-group form-file-upload form-file-multiple">
    <input type="file" multiple="" class="inputFileHidden">
    <div class="input-group">
        <input type="text" class="form-control inputFileVisible" name="username" placeholder="Masukan Username">
        
        <span class="input-group-btn">
            <button type="button" class="btn btn-fab btn-round btn-primary">
                <i class="material-icons">face</i>
            </button>
        </span>
    </div>
  </div>

  <div class="form-group form-file-upload form-file-multiple">
    <input type="file" multiple="" class="inputFileHidden">
    <div class="input-group">
        <input type="password" class="form-control inputFileVisible" name="password" placeholder="Masukan Password" multiple>
        
        <span class="input-group-btn">
            <button type="submit" class="btn btn-fab btn-round btn-info">
                <i class="material-icons">lock</i>
            </button>
        </span>
    </div>
  </div>

  <button type="submit" class="btn btn-primary btn-block">MASUK</button>


									</form>
						          </div>
						      </div>
						  </div>
						</div>
						

					</div>
				</div>
			</div>