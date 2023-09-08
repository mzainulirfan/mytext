<?= $this->extend('layout/default'); ?>
<?= $this->section('content'); ?>
<h1 class="mt-4">Detail Article</h1>
<div class="mt-4">
  <div class="row">
    <div class="col-8 border border-1 p-4 rounded-2">
      <h3><?= esc($articleData['article_title']); ?></h3>
      <div class="small text-bg-light d-inline px-4 py-2 rounded-4 border border-1">
        <span><?= esc($articleData['article_status']); ?></span>&nbsp;|&nbsp;
        <span><?= esc($articleData['article_author_id']); ?></span>&nbsp;|&nbsp;
        <span>catogory</span> &nbsp;|&nbsp;
        <span><?= esc($articleData['created_at']); ?></span>
      </div>
      <article class="mt-4">
        <?= esc($articleData['article_content']); ?>
      </article>
    </div>
    <div class="col-4">
      <div class="card">
        <div class="card-header">Action</div>
        <div class="card-body">
          <button class="btn btn-sm btn-outline-secondary d-inline">Edit</button>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>