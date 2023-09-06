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
        <?php if (empty($userByAccountId)) : ?>
          <p class="text-danger">Account not found!</p>
          <a href="javascript();" class="btn btn-primary btn-sm px-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Create account</a>
        <?php else : ?>
          this is account
        <?php endif; ?>
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


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create User Account</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url(); ?>user/createAccount">
          <div class="mb-3">
            <label for="email" class="col-form-label">Email:</label>
            <input type="text" class="form-control" name="email" id="email">
          </div>
          <div class="mb-3">
            <label for="password" class="col-form-label">Password:</label>
            <input type="password" class="form-control" name="password" id="password">
          </div>
          <div class="mb-3">
            <label for="confirmPassword" class="col-form-label">Confirm Password:</label>
            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm px-4">Create</button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>