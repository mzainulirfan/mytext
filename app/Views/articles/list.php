<?= $this->extend('layout/default'); ?>
<?= $this->section('content'); ?>
<h1 class="mt-4">Article lists</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="index.html">Article lists</a></li>
  <li class="breadcrumb-item active">Sidenav Light</li>
</ol>
<div class="card">
  <div class="card-header">Article list</div>
  <div class="card-body">
    <?php if (empty($articleData)) : ?>
      <div class="card-body d-flex justify-content-center align-items-center flex-column w-25 mx-auto gap-4">
        <img src="<?= base_url(); ?>sb-admin/assets/img/nodata.svg" width="100px" alt="nodata">
        <a href="<?= base_url(); ?>article/create" class="btn btn-sm btn-primary">
          <i class="fas fa-plus"></i>
          Create
        </a>
      </div>
    <?php else : ?>
      <div class="mb-3 text-end">
        <a href="<?= base_url(); ?>article/create" class="btn btn-sm btn-primary">
          <i class="fas fa-plus"></i>
          Create
        </a>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <th>No.</th>
            <th>Title</th>
            <th>Created</th>
            <th>Status</th>
            <th>Author</th>
          </thead>
          <tbody>
            <?php $i = 1 + ($viewPerPage * ($currentPage - 1));
            foreach ($articleData as $article) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><a href="<?= base_url(); ?>article/<?= $article['article_slug']; ?>" class="text-decoration-none"><?= esc($article['article_title']); ?></a></td>
                <td><?= esc((new DateTime($article['created_at']))->format('F jS, Y')); ?></td>
                <td>
                  <span class="badge text-bg-<?php if ($article['article_status'] == 'draft') {
                                                echo 'secondary';
                                              } elseif ($article['article_status'] == 'pending') {
                                                echo 'warning';
                                              } else {
                                                echo 'success';
                                              } ?>">
                    <?= esc($article['article_status']); ?>
                  </span>
                </td>
                <td><?= esc($article['user_fullname']); ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="d-flex gap-3">
        <?= $pager->links('articles', 'pagination'); ?>
        <form action="" method="post" id="perPageForm">
          <div class="input-group">
            <select class="form-select form-select-sm" name="viewPerPage" id="perPageSelect">
              <option value="5" <?= ($viewPerPage == 5) ? 'selected' : ''; ?>>show 5 data per page</option>
              <option value="10" <?= ($viewPerPage == 10) ? 'selected' : ''; ?>>show 10 data per page</option>
              <option value="25" <?= ($viewPerPage == 25) ? 'selected' : ''; ?>>show 25 data per page</option>
              <option value="50" <?= ($viewPerPage == 50) ? 'selected' : ''; ?>>show 50 data per page</option>
            </select>
          </div>
        </form>
        <p class="text-secondary">total articles :<?= $counAllArticle; ?></p>
      </div>
    <?php endif; ?>
  </div>
</div>
<?= $this->endSection(); ?>