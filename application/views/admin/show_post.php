<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Page Header -->
<div class="page-header row no-gutters py-4">
  <div class="col-12 col-sm-6 text-center text-sm-left mb-0">
    <span class="text-uppercase page-subtitle">Taxmedia Dashboard</span>
    <h3 class="page-title"><?= $query->post_title ?></h3>
  </div>
</div>
<div class="info-box col-lg-9 col-md-12">
  <?php if (isset($_POST['submit'])): ?>
    <div class="alert <?= $type == 'error' ? 'alert-danger' : 'alert-success' ?>">
      <?= $message ?>
      <a href="<?= base_url() ?>pending">< List Pending Post</a>
    </div>
  <?php endif ?> 
</div>
<!-- Default Light Table -->
<div class="row">
  <div class="col">
    <div class="card card-small mb-4">
      <div class="card-header border-bottom px-5">
      <div class="row">
      <?= form_open_multipart($action);?>
        <input type="hidden" name="id" value="1">
        <input type="hidden" name="is_public" value="1">
        <button type="submit" name="submit" id="change_public" class="btn btn-primary">Publish</button>
      <?= form_close(); ?>&ensp;
      <a href="<?= site_url('news/create/'.$id) ?>" class="btn btn-warning">Edit</a>&ensp;
      <form action="<?= site_url('pending/delete/'.$id) ?>" method="post">
			<input type="hidden" class="d-none" name="id" value="<?= $id ?>">
			<button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure to delete this news?');">
				Delete
			</button>
		</form>
      </div>
      </div>
      <div class="card-body p-3">
         <p class="card-text"><?= $query->post_content ?></p>
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

$('#change_public').on('click', function(){
  confirm('Apakah anda akan Pulish post ini?');
});
</script>