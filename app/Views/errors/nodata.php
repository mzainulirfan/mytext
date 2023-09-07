<?= $this->extend('layout/default'); ?>
<?= $this->section('content'); ?>
<h1 class="mt-4">User lists</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="index.html">User lists</a></li>
  <li class="breadcrumb-item active">Sidenav Light</li>
</ol>
<div class="card mb-4">
  <div class="card-body d-flex justify-content-center align-items-center flex-column w-25 mx-auto gap-4">
    <img src="<?= base_url(); ?>sb-admin/assets/img/nodata.svg" width="100px" alt="nodata">
    <h5>Data <?= $username; ?> not found</h5>
    <a href="<?= base_url(); ?>user" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>&nbsp;Back to user</a>
  </div>
</div>
<?= $this->endSection(); ?>