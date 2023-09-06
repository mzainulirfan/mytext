<?= $this->extend('layout/default'); ?>
<?= $this->section('content'); ?>
<h1 class="my-4">Detail <?= $userData['user_fullname']; ?></h1>

<div class="row">
  <div class="col-lg-8">
    <div class="card mb-4">
      <div class="card-header"><i class="fas fa-user"></i>&nbsp;User Information</div>
      <div class="card-body">
        <form class="row g-3">
          <div class="col-12">
            <label for="fullname" class="form-label">Fullname</label>
            <input type="text" class="form-control" readonly value="<?= $userData['user_fullname']; ?>">
          </div>
          <div class="col-12">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" readonly value="<?= $userData['user_phone_number']; ?>">
          </div>
          <div class="col-12">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" readonly rows="5"><?= $userData['user_address']; ?></textarea>
          </div>
        </form>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header">User account</div>
      <div class="card-body">
        kdkdkdk
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="card">
      <div class="card-header">Profile photo</div>
      <div class="card-body text-center">
        <div class="d-flex justify-content-center align-items-center flex-column gap-3 my-3">
          <img src="<?= base_url(); ?>sb-admin/assets/img/profile.png" alt="profile" class="w-50 d-block">
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>