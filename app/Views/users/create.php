<?= $this->extend('layout/default'); ?>
<?= $this->section('content'); ?>
<h1 class="my-4">Create user</h1>
<div class="row">
  <div class="col-lg-8">
    <div class="card mb-4">
      <div class="card-header"><i class="fas fa-user-plus"></i>&nbsp;Form new user</div>
      <div class="card-body">
        <form class="row g-3" method="post" action="<?= base_url(); ?>user/save">
          <?= csrf_field(); ?>
          <div class="col-12">
            <label for="fullname" class="form-label">Fullname</label>
            <input type="text" class="form-control <?= (session()->has('validation') && ($validation = session('validation'))->hasError('fullname')) ? 'is-invalid' : '' ?>" value="<?= old('fullname'); ?>" placeholder="ex: zara naila" name="fullname" id="fullname" <?= (session()->has('validation') && ($validation = session('validation'))->hasError('fullname')) ? 'autofocus' : '' ?> <?= (old('fullname')) ? '' : 'autofocus'; ?>>
            <div class="invalid-feedback">
              <?php
              if (session()->has('validation') && ($validation = session('validation'))->hasError('fullname')) {
                echo $validation->getError('fullname');
              }
              ?>
            </div>
          </div>
          <div class="col-12">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control <?= (session()->has('validation') && ($validation = session('validation'))->hasError('phone')) ? 'is-invalid' : '' ?>" value="<?= old('phone'); ?>" id="phone" name="phone" placeholder="ex: 087378393030" <?= (session()->has('validation') && ($validation = session('validation'))->hasError('phone')) ? 'autofocus' : '' ?>>
            <div class="invalid-feedback">
              <?php
              if (session()->has('validation') && ($validation = session('validation'))->hasError('phone')) {
                echo $validation->getError('phone');
              }
              ?>
            </div>
          </div>
          <div class="col-12">
            <label for="gender" class="form-label">Gender</label>
            <div class="d-block">
              <div class="form-check form-check-inline">
                <input class="form-check-input <?= (session()->has('validation') && ($validation = session('validation'))->hasError('gender')) ? 'is-invalid' : '' ?>" type="radio" name="gender" id="male" value="male" <?= (old('gender') == 'male') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="male">Male</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input <?= (session()->has('validation') && ($validation = session('validation'))->hasError('gender')) ? 'is-invalid' : '' ?>" type="radio" name="gender" id="female" value="female" <?= (old('gender') == 'female') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="female">Female</label>
              </div>
            </div>
          </div>
          <div class="col-12">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control <?= (session()->has('validation') && ($validation = session('validation'))->hasError('address')) ? 'is-invalid' : '' ?>" id="address" name="address" rows="5" <?= (session()->has('validation') && ($validation = session('validation'))->hasError('address')) ? 'autofocus' : '' ?>><?= old('address'); ?></textarea>
            <div class="invalid-feedback">
              <?php
              if (session()->has('validation') && ($validation = session('validation'))->hasError('address')) {
                echo $validation->getError('address');
              }
              ?>
            </div>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary px-4 btn-sm">Save user</button>
            <a href="<?= base_url(); ?>user" type="button" class="btn btn-outline-secondary px-4 btn-sm">Back to user</a>
          </div>
        </form>
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