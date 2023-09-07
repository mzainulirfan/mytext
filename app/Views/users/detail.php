<?= $this->extend('layout/default'); ?>
<?= $this->section('content'); ?>
<h1 class="my-4">Detail <?= $userData['user_fullname']; ?></h1>
<?php if ($message = session()->getFlashdata('errors')) : ?>
  <div class="alert alert-danger" role="alert">
    <?= $message; ?>
  </div>
<?php elseif ($message = session()->getFlashdata('success')) : ?>
  <div class="alert alert-success" role="alert">
    <?= $message; ?>
  </div>
<?php endif; ?>
<div class="row">
  <div class="col-lg-8">
    <div class="card mb-4">
      <div class="card-header"><i class="fas fa-user"></i>&nbsp;User Information</div>
      <div class="card-body">
        <form class="row g-3">
          <div class="col-12">
            <label for="fullname" class="form-label">Fullname</label>
            <input type="text" class="form-control" id="fullname" readonly value="<?= $userData['user_fullname']; ?>">
          </div>
          <div class="col-12">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" readonly value="<?= $userData['user_phone_number']; ?>">
          </div>
          <div class="col-12">
            <label for="gender" class="form-label">Gender</label>
            <input type="text" class="form-control" id="gender" readonly value="<?= $userData['user_gender']; ?>">
          </div>
          <div class="col-12">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" readonly rows="5"><?= $userData['user_address']; ?></textarea>
          </div>
        </form>
        <div class="mt-3">
          <a href="javascript();" class="btn btn-primary btn-sm px-4" data-bs-toggle="modal" data-bs-target="#editUserdata">Edit user data</a>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header">User account</div>
      <div class="card-body">
        <?php if (empty($userByAccountId)) : ?>
          <p class="text-danger">Account not found!</p>
          <a href="javascript();" class="btn btn-primary btn-sm px-4" data-bs-toggle="modal" data-bs-target="#createUserAccount">Create account</a>
        <?php else : ?>
          <form class="row g-3">
            <div class="col-12">
              <label for="fullname" class="form-label">Email</label>
              <input type="text" class="form-control" id="fullname" readonly value="<?= $userByAccountId['account_email']; ?>">
            </div>
            <div class="col-12">
              <label for="password" class="form-label">Password</label>
              <input type="text" class="form-control" id="password" readonly value="******">
            </div>
          </form>
          <div class="mt-3">
            <a href="javascript();" class="btn btn-primary btn-sm px-4" data-bs-toggle="modal" data-bs-target="#changePassword">Change password</a>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header">Delete User</div>
      <div class="card-body">
        <p> Deleting your account is a permanent action and cannot be undone. If you are sure you want to delete your account, select the button below.</p>
        <button type="button" class="btn btn-danger btn-sm px-4 d-block" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">Delete</button>
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


<!--Create user account Modal-->
<div class="modal fade" id="createUserAccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create User Account</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url(); ?>user/createAccount">
          <?= csrf_field(); ?>
          <input type="hidden" name="user_id" value="<?= $userData['user_id']; ?>">
          <input type="hidden" name="user_username" value="<?= $userData['user_username']; ?>">
          <div class="mb-3">
            <label for="email" class="col-form-label">Email:</label>
            <input type="text" class="form-control <?= (session()->has('validation') && ($validation = session('validation'))->hasError('email')) ? 'is-invalid' : '' ?>" name="email" id="email" value="<?= old('email'); ?>" autofocus>
            <?php
            if (session()->has('validation') && ($validation = session('validation'))->hasError('email')) {
              echo $validation->getError('email');
            }
            ?>
          </div>
          <div class="mb-3">
            <label for="password" class="col-form-label">Password:</label>
            <input type="password" class="form-control  <?= (session()->has('validation') && ($validation = session('validation'))->hasError('password')) ? 'is-invalid' : '' ?>" name="password" id="password">
            <?php
            if (session()->has('validation') && ($validation = session('validation'))->hasError('password')) {
              echo $validation->getError('password');
            }
            ?>
          </div>
          <div class="mb-3">
            <label for="confirmPassword" class="col-form-label">Confirm Password:</label>
            <input type="password" class="form-control  <?= (session()->has('validation') && ($validation = session('validation'))->hasError('confirmPassword')) ? 'is-invalid' : '' ?>" name="confirmPassword" id="confirmPassword">
            <?php
            if (session()->has('validation') && ($validation = session('validation'))->hasError('confirmPassword')) {
              echo $validation->getError('confirmPassword');
            }
            ?>
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-primary btn-sm px-4">Create</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- changer password Modal-->
<?php if (!empty($userByAccountId)) : ?>
  <div class="modal fade" id="changePassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Create User Account</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?= base_url(); ?>user/changePassword">
            <?= csrf_field(); ?>
            <input type="hidden" name="account_id" value="<?= $userByAccountId['account_id']; ?>">
            <input type="hidden" name="user_username" value="<?= $userData['user_username']; ?>">
            <div class="mb-3">
              <label for="password" class="col-form-label">New Password:</label>
              <input type="password" class="form-control  <?= (session()->has('validation') && ($validation = session('validation'))->hasError('password')) ? 'is-invalid' : '' ?>" name="password" id="password">
              <?php
              if (session()->has('validation') && ($validation = session('validation'))->hasError('password')) {
                echo $validation->getError('password');
              }
              ?>
            </div>
            <div class="mb-3">
              <label for="confirmPassword" class="col-form-label">Confirm Password:</label>
              <input type="password" class="form-control  <?= (session()->has('validation') && ($validation = session('validation'))->hasError('confirmPassword')) ? 'is-invalid' : '' ?>" name="confirmPassword" id="confirmPassword">
              <?php
              if (session()->has('validation') && ($validation = session('validation'))->hasError('confirmPassword')) {
                echo $validation->getError('confirmPassword');
              }
              ?>
            </div>
            <div class="mb-3">
              <button type="submit" class="btn btn-primary btn-sm px-4">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<!-- delete confirmation modal  -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this data?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancel</button>
        <form action="<?= base_url(); ?>user/<?= $userData['user_id']; ?>" method="post">
          <?= csrf_field(); ?>
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Edit user data modal  -->
<div class="modal fade" id="editUserdata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit data : <?= $userData['user_fullname']; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3" method="post" action="<?= base_url(); ?>user/update">
          <?= csrf_field(); ?>
          <input type="hidden" name="userId" value="<?= $userData['user_id']; ?>">
          <input type="hidden" name="username" value="<?= $userData['user_username']; ?>">
          <div class="col-12">
            <label for="fullname" class="form-label">Fullname</label>
            <input type="text" class="form-control <?= (session()->has('validation') && ($validation = session('validation'))->hasError('fullname')) ? 'is-invalid' : '' ?>" value="<?= (old('fullname')) ? old('fullname') : $userData['user_fullname']; ?>" placeholder="ex: zara naila" name="fullname" id="fullname" <?= (session()->has('validation') && ($validation = session('validation'))->hasError('fullname')) ? 'autofocus' : '' ?> <?= (old('fullname')) ? '' : 'autofocus'; ?>>
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
            <input type="text" class="form-control <?= (session()->has('validation') && ($validation = session('validation'))->hasError('phone')) ? 'is-invalid' : '' ?>" value="<?= (old('phone')) ? old('phone') : $userData['user_phone_number']; ?>" id="phone" name="phone" placeholder="ex: 087378393030" <?= (session()->has('validation') && ($validation = session('validation'))->hasError('phone')) ? 'autofocus' : '' ?>>
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
                <input class="form-check-input <?= (session()->has('validation') && ($validation = session('validation'))->hasError('gender')) ? 'is-invalid' : '' ?>" type="radio" name="gender" id="male" value="male" <?= ($userData['user_gender'] == 'male' || old('gender') == 'male') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="male">Male</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input <?= (session()->has('validation') && ($validation = session('validation'))->hasError('gender')) ? 'is-invalid' : '' ?>" type="radio" name="gender" id="female" value="female" <?= ($userData['user_gender'] == 'female' || old('gender') == 'female') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="female">Female</label>
              </div>
            </div>
          </div>
          <div class="col-12">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control <?= (session()->has('validation') && ($validation = session('validation'))->hasError('address')) ? 'is-invalid' : '' ?>" id="address" name="address" rows="5" <?= (session()->has('validation') && ($validation = session('validation'))->hasError('address')) ? 'autofocus' : '' ?>><?= (old('address')) ? old('address') : $userData['user_address']; ?></textarea>
            <div class="invalid-feedback">
              <?php
              if (session()->has('validation') && ($validation = session('validation'))->hasError('address')) {
                echo $validation->getError('address');
              }
              ?>
            </div>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary px-4 btn-sm">Update user</button>
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<?= $this->endSection(); ?>