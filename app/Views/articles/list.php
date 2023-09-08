<?= $this->extend('layout/default'); ?>
<?= $this->section('content'); ?>
<h1 class="mt-4">Article lists</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="index.html">Article lists</a></li>
  <li class="breadcrumb-item active">Sidenav Light</li>
</ol>
<?php if (session()->getFlashdata('success')) : ?>
  <div class="alert alert-success" role="alert">
    <?= session()->getFlashdata('success'); ?>
  </div>
<?php endif; ?>
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
      <?php foreach ($articleData as $article) : ?>
        <div class="card mb-4">
          <div class="card-body">
            <h4 class="mb-3"><a href="<?= base_url(); ?>article/<?= $article['article_slug']; ?>" class="text-decoration-none"><?= esc($article['article_title']); ?></a></h4>
            <div class="small text-bg-light d-inline px-4 py-1 rounded-1 border border-1">
              <span><?= esc($article['article_status']); ?></span>&nbsp;|&nbsp;
              <span><?= esc($article['user_fullname']); ?></span>&nbsp;|&nbsp;
              <span><?= esc($article['category_name']); ?></span> &nbsp;|&nbsp;
              <span><?= esc($article['created_at']); ?></span>
            </div>
            <article class="mt-4">
              <?= $article['article_intro']; ?>
            </article>
            <div class="mt-4">
              <a href="<?= base_url(); ?>article/<?= $article['article_slug']; ?>" class="btn btn-sm btn-primary px-4">Detail article</a>
              <button class="btn btn-sm btn-outline-none px-4">Edit article</button>
              <button class="btn btn-sm btn-outline-none text-danger px-4">Delete</button>

            </div>
          </div>
        </div>
      <?php endforeach; ?>
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