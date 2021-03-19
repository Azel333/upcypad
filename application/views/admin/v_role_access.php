<link href="<?= base_url('assets/'); ?>style_css/admin/roleaccess.css" rel="stylesheet">

<div id="contain-roleaccess" class="col-8 offset-2 mt-5 text-center">
	<?= $this->session->flashdata('message'); ?>
	<div class="card card-nav-tabs">
	  	<div class="card-header card-header-danger">
	    Edit Role Access <?= $role['role']; ?>
	  	</div>
	  	<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Menu</th>
					<th scope="col">Access</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1; ?>
				<?php foreach($menu as $m) : ?>
					<tr>
						<th scope="row"><?= $i; ?></th>
						<td><?= $m['menu']; ?></td>
						<td>
							<div class="">
								<input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
							</div>
						</td>
					</tr>
					<?php $i++; ?>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>



<script>
	$('.form-check-input').on('click', function()
	{
		const menuId = $(this).data('menu');
		const roleId = $(this).data('role');
		$.ajax(
		{
			url: "<?= base_url('admin/changeaccess'); ?>",
			type: 'post',
			data:
			{
				menuId: menuId,
				roleId: roleId
			},
			success: function()
			{
				document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
			}
		});
	});
</script>