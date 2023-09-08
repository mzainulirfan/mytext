<?= $this->extend('layout/default'); ?>
<?= $this->section('content'); ?>
<h1 class="mt-4">Detail Article</h1>
<div class="mt-4">
  <div class="row">
    <div class="col-lg-8 mb-4">
      <div class="card">
        <div class="card-body">
          <h3 class="mb-3"><?= esc($articleData['article_title']); ?></h3>
          <div class="small text-bg-light d-inline px-4 py-1 rounded-1 border border-1">
            <span><?= esc($articleData['article_status']); ?></span>&nbsp;|&nbsp;
            <span><a href="<?= base_url(); ?>user/<?= $articleData['user_username']; ?>" class="text-decoration-none"><?= esc($articleData['user_fullname']); ?></a></span>&nbsp;|&nbsp;
            <span><?= esc($articleData['category_name']); ?></span> &nbsp;|&nbsp;
            <span><?= esc($articleData['created_at']); ?></span>
          </div>
          <article class="mt-4">
            <?= esc($articleData['article_content']); ?>
          </article>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card">
        <div class="card-header">Action</div>
        <div class="card-body">
          <div class="d-grid gap-2">
            <a href="<?= base_url(); ?>article/<?= $articleData['article_slug']; ?>/edit" class="btn btn-outline-dark border border-1" type="button">Preview</a>
            <a href="<?= base_url(); ?>article/<?= $articleData['article_slug']; ?>/edit" class="btn btn-outline-dark border border-1" type="button">Edit article</a>
            <button class="btn btn-primary mt-3" type="button">Publish</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>