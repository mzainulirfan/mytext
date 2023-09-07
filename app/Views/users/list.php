<?= $this->extend('layout/default'); ?>
<?= $this->section('content'); ?>
<h1 class="mt-4">User lists</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="index.html">User lists</a></li>
  <li class="breadcrumb-item active">Sidenav Light</li>
</ol>
<div class="card mb-4">
  <div class="card-body">
    This page is an example of using the light side navigation option. By appending the
    <code>.sb-sidenav-light</code>
    class to the
    <code>.sb-sidenav</code>
    class, the side navigation will take on a light color scheme. The
    <code>.sb-sidenav-dark</code>
    is also available for a darker option.
  </div>
</div>

<div class="card mb-4">
  <div class="card-header d-flex justify-content-between align-content-center">
    <span><i class="fas fa-table me-1"></i>
      Data users</span>
    <a href="<?= base_url(); ?>user/create" class="btn btn-sm btn-primary px-4">
      <i class="fas fa-plus"></i>
      Create
    </a>
  </div>

  <?php if (empty($userData)) : ?>
    <div class="card-body d-flex justify-content-center align-items-center flex-column w-25 mx-auto gap-4">
      <img src="<?= base_url(); ?>sb-admin/assets/img/nodata.svg" width="100px" alt="nodata">
      <a href="<?= base_url(); ?>user/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>&nbsp;Create new user</a>
    </div>
  <?php else : ?>
    <div class="card-body">
      <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
          <?= session()->getFlashdata('success'); ?>
        </div>
      <?php endif; ?>
      <table class="table table-bordered table-hover">
        <thead>
          <th>No.</th>
          <th>Fullname</th>
          <th>Phone Number</th>
          <th colspan="2">Created</th>
        </thead>
        <tbody>
          <?php $i = 1 + ($perPage * ($currentPage - 1));
          foreach ($userData as $user) : ?>
            <tr>
              <td><?= $i++; ?></td>
              <td><a href="<?= base_url(); ?>user/<?= $user['user_username']; ?>" class="text-decoration-none text-dark"><?= $user['user_fullname']; ?></a></td>
              <td><?= $user['user_phone_number']; ?></td>
              <td><?= $user['created_at']; ?></td>
              <td class="text-end">
                <?= ($user['is_user_account']) == 0 ? '<a href="#"><i class=\'bx bxs-plus-square text-primary\'></i></a>' : ''; ?>
                <a href="#"><i class='bx bxs-edit text-dark'></i></a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <div class="d-flex gap-3">
        <?= $pager->links('users', 'pagination'); ?>
        <form action="" method="post" id="perPageForm">
          <div class="input-group">
            <select class="form-select form-select-sm" name="perPage" id="perPageSelect">
              <option value="5" <?= ($perPage == 5) ? 'selected' : ''; ?>>show 5 data per page</option>
              <option value="10" <?= ($perPage == 10) ? 'selected' : ''; ?>>show 10 data per page</option>
              <option value="25" <?= ($perPage == 25) ? 'selected' : ''; ?>>show 25 data per page</option>
              <option value="50" <?= ($perPage == 50) ? 'selected' : ''; ?>>show 50 data per page</option>
            </select>
          </div>
        </form>
      </div>
    </div>
  <?php endif; ?>
</div>
<?= $this->endSection(); ?>