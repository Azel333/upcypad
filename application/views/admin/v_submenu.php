
	<link href="<?= base_url('assets/'); ?>style_css/admin/submenu.css" rel="stylesheet">

<!-- Button trigger modal -->
<div class="offset-1">
	<button type="button" class="btn btn-success btn-add-role" data-toggle="modal" data-target="#newSubMenuModal">
		Add New Submenu
	</button>
</div>
	

<div id="contain-role" class="col-8 offset-2 mt-5 text-center">
	<div class="card card-nav-tabs">
		<?php if (validation_errors()) : ?>
			<div class="alert alert-danger" role="alert">
				<?= validation_errors(); ?>
			</div>
		<?php endif; ?>
		<?= $this->session->flashdata('message'); ?>
	  	<div class="card-header card-header-danger">
	    Edit Sub Menu
	  	</div>
	  	<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Title</th>
					<th scope="col">Menu</th>
					<th scope="col">Url</th>
					<th scope="col">Active</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1; ?>
				<?php foreach($subMenu as $sm) : ?>
					<tr>
						<th scope="row"><?= $i; ?></th>
						<td><?= $sm['title']; ?></td>
						<td><?= $sm['menu']; ?></td>
						<td><?= $sm['url']; ?></td>
						<td><?= $sm['is_active']; ?></td>
						<td>
							<a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_submenu<?= $sm['id']; ?>">edit</a>
							<a href="<?= base_url('menu/submenu_delete/'); ?><?= $sm['id']; ?>" class="btn btn-danger btn-sm">delete</a>
						</td>
					</tr>
					<?php $i++; ?>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
		
</div>

	<!-- Modal Edit Role-->

<?php foreach($subMenu as $sm) : ?>
		<div class="modal fade" id="edit_submenu<?= $sm['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					
					<div class="col-md-12">
				      <div class="card">
				          <div class="card-header card-header-text card-header-primary">
				            <div class="card-text col-4">
				              <h4 class="card-title">Edit Sub Menu</h4>
				            </div>
				          </div>
				          <div class="card-body">
				              	<form action="<?= base_url('menu/submenu_edit/'); ?><?= $sm['id']; ?>" method="post">
									<div class="modal-body">
										<div class="form-group col-10 offset-1 row">
											<!-- QUERY DARI MENUU -->
											<?php
												$id = $sm['menu_id'];
												$queryMenu = " SELECT `user_menu`.`id`, `menu`, `icon_menu`
												FROM `user_menu`
												WHERE `user_menu`.`id` = $id
												";
												$menuid = $this->db->query($queryMenu)->result_array();
											?>
											<select name="menu_id" id="menu_id" class="form-control">
												<?php foreach ($menuid as $mi) : ?>
													<option value="<?= $mi['id']; ?>"><?= $mi['menu']; ?></option>
												<?php endforeach; ?>
												<?php foreach ($menu as $m) : ?>
													<option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="modal-body col-10 offset-1 row">
											<div class="form-group input-group">
												<input type="text" class="form-control" id="title" name="title" placeholder="Submenu title" value="<?= $sm['title']; ?>">
												<span class="input-group-btn">
										            <button type="button" class="btn btn-fab btn-round btn-primary">
										                <i class="material-icons">create</i>
										            </button>
										        </span>
											</div>
										</div>
										<div class="modal-body col-10 offset-1 row">
											<div class="form-group input-group">
												<input type="text" class="form-control" id="url" name="url" placeholder="Submenu url" value="<?= $sm['url']; ?>">
												<span class="input-group-btn">
										            <button type="button" class="btn btn-fab btn-round btn-primary">
										                <i class="material-icons">create</i>
										            </button>
										        </span>
											</div>
										</div>
										<div class="modal-body col-10 offset-1 row">
											<div class="form-group input-group">
												<input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon" value="<?= $sm['icon']; ?>">
												<span class="input-group-btn">
										            <button type="button" class="btn btn-fab btn-round btn-primary">
										                <i class="material-icons">create</i>
										            </button>
										        </span>
											</div>
										</div>
										<div class="form_group">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
												<label class="form-check-label" for="is_active">
													Active?
												</label>
											</div>
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



	<!-- Modal -->

	<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
					
					<div class="col-md-12">
				      <div class="card">
				          <div class="card-header card-header-text card-header-primary">
				            <div class="card-text col-8">
				              <h4 class="card-title">Tambahkan Submenu Baru</h4>
				            </div>
				          </div>
				          <div class="card-body">
								<form action="<?= base_url('menu/submenu'); ?>" method="post">
									<div class="modal-body">
										<div class="form-group col-10 offset-1 row">
											<select name="menu_id" id="menu_id" class="form-control">
												<option value="">Select Menu</option>
												<?php foreach ($menu as $m) : ?>
													<option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="modal-body col-10 offset-1 row">
											<div class="form-group input-group">
												<input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
												<span class="input-group-btn">
										            <button type="button" class="btn btn-fab btn-round btn-primary">
										                <i class="material-icons">create</i>
										            </button>
										        </span>
											</div>
										</div>
										<div class="modal-body col-10 offset-1 row">
											<div class="form-group input-group">
												<input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
												<span class="input-group-btn">
										            <button type="button" class="btn btn-fab btn-round btn-primary">
										                <i class="material-icons">create</i>
										            </button>
										        </span>
											</div>
										</div>
										<div class="modal-body col-10 offset-1 row">
											<div class="form-group input-group">
												<input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
												<span class="input-group-btn">
										            <button type="button" class="btn btn-fab btn-round btn-primary">
										                <i class="material-icons">create</i>
										            </button>
										        </span>
											</div>
										</div>
										<div class="form_group">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
												<label class="form-check-label" for="is_active">
													Active?
												</label>
											</div>
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








