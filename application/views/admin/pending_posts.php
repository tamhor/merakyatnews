<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Page Header -->
<div class="page-header row no-gutters py-4">
  <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
    <span class="text-uppercase page-subtitle">Taxmedia Dashboard</span>
    <h3 class="page-title"><?= $title ?></h3>
  </div>
</div>
<!-- Default Light Table -->
<div class="row">
  <div class="col">
    <div class="card card-small mb-4">
      <div class="card-header border-bottom px-5">
      <div class="row justify-content-between">
        <h6 class="m-0">Posts</h6>
        <input type="text" class="form-control w-25" placeholder="Search" id="filter">
      </div>
      </div>
      <div class="card-body p-0 pb-3 text-center">
        <table class="table mb-0" id="tablePost">
          <thead class="bg-light">
            <tr>
              <th scope="col" class="border-0">#</th>
              <th scope="col" class="border-0">Post Title</th>
              <th scope="col" class="border-0">Post Category</th>
              <th scope="col" class="border-0">Created at</th>
              <th class="border-0" colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>
          	<?php $num = 1 ?>
            <?php foreach ($query as $news): ?>
            	<tr>
            		<td><?= $num ?></td>
            		<td><?= $news->post_title ?></td>
            		<td><?= $news->cat_title ?></td>
            		<td><?= $news->created_at ?></td>
            		<td>
            			<a href="<?= base_url('pending/show/' . $news->id) ?>" class="btn btn-info btn-sm">
            				<i class="material-icons">visibility</i> View
            			</a>
            		</td>
            		<td>
            			<form action="<?= base_url('pending/delete') ?>" method="post">
            				<input type="hidden" class="d-none" name="id" value="<?= $news->id ?>">
            				<button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure to delete this news?');">
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
</div>
<!-- End Default Light Table -->

<script>
$(document).ready(function(){
  $("#filter").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tablePost tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>