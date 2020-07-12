<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Page Header -->
<div class="page-header row no-gutters py-4">
  <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
    <span class="text-uppercase page-subtitle">Taxmedia Dashboard</span>
    <h3 class="page-title"><?= $title ?></h3>
  </div>
</div>
<div class="row">
	<div class="col-lg-10">
		<button id="add-user" class="btn btn-info border-0 mb-4">Add New User</button>
		<div class="card card-lg mb-4">
      <div class="card-header border-bottom">
        <h6 class="m-0">List Users</h6>
      </div>
      <div class="card-body p-0 pb-3 text-center table-responsive">
        <table class="table mb-0">
          <thead class="bg-light">
            <tr>
              <th scope="col" class="border-0">#</th>
              <th scope="col" class="border-0">Username</th>
              <th scope="col" class="border-0">Full Name</th>
              <th scope="col" class="border-0">E-mail</th>
              <th scope="col" class="border-0">Role</th>
              <th scope="col" class="border-0" colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>
          	<?php $num = 1 ?>
            <?php foreach ($query as $user): ?>
            	<tr>
            		<th scope="row"><?= $num ?></th>
            		<td><?= $user->username ?></td>
            		<td><?= $user->full_name ?></td>
            		<td><?= $user->email ?></td>
            		<td>
					<?php if($user->role == 1) {
							echo "Admin";
						}else{
							echo "User";
						} ?>
					</td>
            		<td>
            			<button class="btn btn-info btn-sm update" data-id="<?= $user->id ?>" data-username="<?= $user->username ?>" data-full_name="<?= $user->full_name ?>" data-email="<?= $user->email ?>" data-role="<?= $user->role ?>">
            				<i class="material-icons">edit</i> Edit
            			</button>
            		</td>
            		<td>
            			<form action="<?= base_url('users/delete') ?>" method="post">
            				<input type="hidden" class="d-none" name="id" value="<?= $user->id ?>">
            				<button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure to delete this user?');">
            					<i class="material-icons">delete_outline</i> Delete
            				</button>
            			</form>
            		</td>
            	</tr>
            	<?php $num++; ?>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
	</div>
	<!-- Modal  Edit-->
	<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Insert User</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <form class="form-inline" action="" method="post" id="user-form">
			  <div class="modal-body">
				  	<div class="form-group mb-2">
						<label class="w-25">Username</label>
						<input type="text" id="username" class="form-control" name="username">
					</div>
					<div class="form-group mb-2">
						<label class="w-25">Password</label>
						<input type="password" class="form-control" name="password">
					</div>
					<div class="form-group mb-2">
						<label class="w-25">Full Name</label>
						<input type="text" class="form-control" name="full_name">
					</div>
					<div class="form-group mb-2">
						<label class="w-25">E-mail</label>
						<input type="email" class="form-control" name="email">
					</div>
					<div class="form-group mb-2">
						<label class="w-25">Role</label>
						<select name="role" class="custom-select">
							<option value="0">User</option>
							<option value="1">Admin</option>
						</select>
					</div>
		      			<input type="hidden" name="id">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button class="btn btn-secondary" type="submit">Update</button>
		      </div>
	      </form>
	    </div>
	  </div>
	</div>
</div>
<script>
	$(document).ready(function () {
		$('.update').click(function () {
			$('#modal .modal-title').html('Edit User')
			$('#modal button[type=submit]').removeClass().addClass('btn btn-success').html('Update User');
			$('#modal form').removeAttr('action').attr('action', '<?= base_url('users/update') ?>');
			$('input[name=id]').val($(this).attr('data-id'));
			$('input[name=username]').val($(this).attr('data-username'));
			$('input[name=password]').val('').end();
			$('input[name=full_name]').val($(this).attr('data-full_name'));
			$('input[name=email]').val($(this).attr('data-email'));
			$('select').val($(this).attr('data-role'));
			$('#modal').modal('show');
		})
	})
	$(document).ready(function () {
		$('#add-user').click(function () {
			$('#modal .modal-title').html('Add New User');
			$('#modal button[type=submit]').removeClass().addClass('btn btn-primary').html('Add User');
			$('#modal form').removeAttr('action').attr('action', '<?= base_url('users/create') ?>');
			$('#modal').modal('show');
		})
	})
	$('#modal').on('hidden.bs.modal', function () {
    	$(this).find("input,select").val('').end();
	});
</script>