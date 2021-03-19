
	<link href="<?= base_url('assets/'); ?>style_css/admin/role.css" rel="stylesheet">
		<!-- Button trigger modal -->
<div class="offset-1">
	<button type="button" class="btn btn-success btn-add-role" data-toggle="modal" data-target="#exampleModal">
		Add new role
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
				<?php foreach($role as $r) : ?>
					<tr>
						<th scope="row"><?= $i; ?></th>
						<td><?= $r['role']; ?></td>
						<td class="text-left">
							<span class="" style="margin-left: 120px;">
							<a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="btn btn-primary btn-sm">access</a>
							<a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-role<?= $r['id']; ?>">edit</a>
							<?php if($r['id']!='1'): ?>
							<a href="<?= base_url('admin/role_delete/'); ?><?= $r['id']; ?>" class="btn btn-danger btn-sm">delete</a>
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





	<!-- Modal add Role-->

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					
					<div class="col-md-12">
				      <div class="card">
				          <div class="card-header card-header-text card-header-primary">
				            <div class="card-text col-6">
				              <h4 class="card-title">Tambahkan Role Baru</h4>
				            </div>
				          </div>
				          <div class="card-body">
				              	<form action="<?= base_url('admin/role_add'); ?>" method="post">
									<div class="modal-body col-10 offset-1 row">
										<div class="form-group input-group">
											<input type="text" class="form-control" id="role" name="role" placeholder="Role name">
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


	<!-- Modal Edit Role-->

	<?php foreach($role as $r) : ?>
		<div class="modal fade" id="edit-role<?= $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					
					<div class="col-md-12">
				      <div class="card">
				          <div class="card-header card-header-text card-header-primary">
				            <div class="card-text col-4">
				              <h4 class="card-title">Edit Role</h4>
				            </div>
				          </div>
				          <div class="card-body">
				              	<form action="<?= base_url('admin/role_edit/'); ?><?= $r['id']; ?>" method="post">
									<div class="modal-body col-10 offset-1 row">
										<div class="form-group input-group">
											<input type="text" class="form-control" id="role" name="role" placeholder="Role name" value="<?= $r['role']; ?>">
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