<?= $this->extend('layout/default'); ?>
<?= $this->section('content'); ?>
<h1 class="mt-4">User lists</h1>
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
    <span><i class="fas fa-table me-1"></i>List users</span>
  </div>
  <?php if (empty($userData)) : ?>
    <div class="card-body d-flex justify-content-center align-items-center flex-column w-25 mx-auto gap-4">
      <img src="<?= base_url(); ?>sb-admin/assets/img/nodata.svg" width="100px" alt="nodata">
      <a href="<?= base_url(); ?>user/create" class="btn btn-sm btn-primary">
        <i class="fas fa-plus"></i>
        Create
      </a>
    </div>
  <?php else : ?>
    <div class="card-body">
      <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
          <?= session()->getFlashdata('success'); ?>
        </div>
      <?php endif; ?>
      <div class="mb-3">
        <form method="post" class="row g-3">
          <div class="col-10">
            <input type="text" class="form-control form-control-sm" name="keyword" placeholder="Search here ..." autofocus>
          </div>
          <div class="col-2 text-end">
            <button type="submit" class="btn btn-primary btn-sm">Search</button>
            <a href="<?= base_url(); ?>user/create" class="btn btn-sm btn-primary">
              <i class="fas fa-plus"></i>
              Create
            </a>
          </div>
        </form>
      </div>
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
              <td><a href="<?= base_url(); ?>user/<?= $user['user_username']; ?>" class="text-decoration-none text-dark"><?= esc($user['user_fullname']); ?></a></td>
              <td><?= esc($user['user_phone_number']); ?></td>
              <td><?= esc($user['created_at']); ?></td>
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
        <p class="text-secondary">total users :<?= $countAllUser; ?></p>
      </div>
    </div>
  <?php endif; ?>
</div>
<?= $this->endSection(); ?>