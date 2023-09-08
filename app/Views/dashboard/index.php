<?= $this->extend('layout/default'); ?>
<?= $this->section('content'); ?>
<h1 class="mt-4">Dashboard</h1>
<div class="row">
  <div class="col-lg-4 mb-4">
    <!-- Count user-->
    <div class="card h-100 border-start-lg border-start-primary">
      <div class="card-body d-flex justify-content-between align-items-end">
        <div>
          <div class="small text-muted">All Users</div>
          <div class="h3 text-success"><?= $countUsers; ?> User</div>
        </div>
        <a href="<?= base_url(); ?>user" class="text-decoration-none text-primary">List users</a>
      </div>
    </div>
  </div>
  <div class="col-lg-4 mb-4">
    <!-- Count article-->
    <div class="card h-100 border-start-lg border-start-primary">
      <div class="card-body d-flex justify-content-between align-items-end">
        <div>
          <div class="small text-muted">All articles</div>
          <div class="h3 text-danger"><?= $countArticles; ?> articles</div>
        </div>
        <a href="<?= base_url(); ?>article" class="text-decoration-none text-primary">List articles</a>
      </div>
    </div>
  </div>
  <div class="col-lg-4 mb-4">
    <!-- Count author-->
    <div class="card h-100 border-start-lg border-start-primary">
      <div class="card-body d-flex justify-content-between align-items-end">
        <div>
          <div class="small text-muted">All author</div>
          <div class="h3 text-info">20 author</div>
        </div>
        <a href="<?= base_url(); ?>author" class="text-decoration-none text-primary">List author</a>
      </div>
    </div>
  </div>
</div>
<div class="card mb-4">
  <div class="card-header d-flex justify-content-between align-content-center">
    <span><i class="fas fa-table me-1"></i>
      Latest users</span>
    <a href="<?= base_url(); ?>user" class="btn btn-sm btn-primary px-4">
      <i class="fas fa-users"></i>
      See all
    </a>
  </div>
  <?php if (empty($userData)) : ?>
    <div class="card-body d-flex justify-content-center align-items-center flex-column w-25 mx-auto gap-4">
      <img src="<?= base_url(); ?>sb-admin/assets/img/nodata.svg" width="100px" alt="nodata">
      <a href="<?= base_url(); ?>user/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>&nbsp;Create new user</a>
    </div>
  <?php else : ?>
    <div class="card-body">
      <table class="table table-bordered table-hover">
        <thead>
          <th>No.</th>
          <th>Fullname</th>
          <th>Phone Number</th>
          <th>Created</th>
        </thead>
        <tbody>
          <?php $i = 1;
          foreach ($userData as $user) : ?>
            <tr>
              <td><?= $i++; ?></td>
              <td><a href="<?= base_url(); ?>user/<?= $user['user_username']; ?>" class="text-decoration-none text-dark"><?= esc($user['user_fullname']); ?></a></td>
              <td><?= esc($user['user_phone_number']); ?></td>
              <td><?= esc($user['created_at']); ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</div>
<?= $this->endSection(); ?>