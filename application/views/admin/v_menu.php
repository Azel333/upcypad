
	<link href="<?= base_url('assets/'); ?>style_css/admin/menu.css" rel="stylesheet">
	<!-- Button trigger modal -->
<div class="offset-1">
	<button type="button" class="btn btn-success btn-add-role" data-toggle="modal" data-target="#exampleModal">
		Add New Menu
	</button>
</div>
	
 <div id="contain-role" class="col-8 offset-2 mt-5 text-center">
	<div class="card card-nav-tabs">
	  	<div class="card-header card-header-danger">
	    Edit Role Access
	  	</div>
	  	<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Role</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1; ?>
				<?php foreach($menu as $m) : ?>
					<tr>
						<th scope="row"><?= $i; ?></th>
						<td><?= $m['menu']; ?></td>
						<td class="text-left">
							<span class="" style="margin-left: 150px;">
							<a href="<?= base_url('menu/menu_edit/'); ?><?= $m['id']; ?>" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_menu<?= $m['id']; ?>">edit</a>
							<?php if($m['id']!='1'): ?>
							<a href="<?= base_url('menu/menu_delete/'); ?><?= $m['id']; ?>" class="btn btn-danger btn-sm">delete</a>
							<?php endif; ?>
							</span>
						</td>
					</tr>
					<?php $i++; ?>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>



<!-- Modal Edit Menu-->

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
					
					<div class="col-md-12">
				      <div class="card">
				          <div class="card-header card-header-text card-header-primary">
				            <div class="card-text col-6">
				              <h4 class="card-title">Tambahkan Menu Baru</h4>
				            </div>
				          </div>
				          <div class="card-body">
				              	<form action="<?= base_url('menu'); ?>" method="post">
									<div class="modal-body col-10 offset-1 row">
										<div class="form-group input-group">
											<input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
											<span class="input-group-btn">
									            <button type="button" class="btn btn-fab btn-round btn-primary">
									                <i class="material-icons">create</i>
									            </button>
									        </span>
										</div>
									</div>
									<div class="modal-body col-10 offset-1 row">
										<div class="form-group input-group">
											<input type="text" class="form-control" id="menu" name="icon_menu" placeholder="Menu icon name">
											<span class="input-group-btn">
									            <button type="button" class="btn btn-fab btn-round btn-primary">
									                <i class="material-icons">create</i>
									            </button>
									        </span>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Add</button>
									</div>
								</form>
				          </div>
				      </div>
				   </div>


				</div>
			</div>
		</div>



<!-- Modal Edit Menu-->

<?php foreach($menu as $m) : ?>
		<div class="modal fade" id="edit_menu<?= $m['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					
					<div class="col-md-12">
				      <div class="card">
				          <div class="card-header card-header-text card-header-primary">
				            <div class="card-text col-4">
				              <h4 class="card-title">Edit Menu</h4>
				            </div>
				          </div>
				          <div class="card-body">
				              	<form action="<?= base_url('menu/menu_edit/'); ?><?= $m['id']; ?>" method="post">
									<div class="modal-body col-10 offset-1 row">
										<div class="form-group input-group">
											<input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name" value="<?= $m['menu']; ?>">
											<span class="input-group-btn">
									            <button type="button" class="btn btn-fab btn-round btn-primary">
									                <i class="material-icons">create</i>
									            </button>
									        </span>
										</div>
										<div class="form-group input-group">
											<input type="text" class="form-control" id="menu" name="icon_menu" placeholder="Menu icon name" value="<?= $m['icon_menu']; ?>">
											<span class="input-group-btn">
									            <button type="button" class="btn btn-fab btn-round btn-primary">
									                <i class="material-icons">create</i>
									            </button>
									        </span>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Edit</button>
									</div>
								</form>
				          </div>
				      </div>
				   </div>


				</div>
			</div>
		</div>
<?php endforeach; ?>
