<?= $this->extend('layout/default'); ?>
<?= $this->section('content'); ?>
<h1 class="mt-4">Detail Article</h1>
<?php if (session()->getFlashdata('success')) : ?>
  <div class="alert alert-success" role="alert">
    <?= session()->getFlashdata('success'); ?>
  </div>
<?php endif; ?>
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
            <?= $articleData['article_content']; ?>
          </article>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card">
        <div class="card-header">Action</div>
        <div class="card-body">
          <div class="d-grid gap-2">
            <a href="<?= base_url(); ?>article/<?= $articleData['article_slug']; ?>/preview" class="btn btn-outline-dark border border-1" type="button">Preview</a>
            <a href="<?= base_url(); ?>article/<?= $articleData['article_slug']; ?>/edit" class="btn btn-outline-dark border border-1" type="button">Edit article</a>
            <form action="" method="post" class="d-grid">
              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmPublishModal" type="button">Publish</button>
            </form>
            <form action="" method="post" class="d-grid">
              <button class="btn btn-outline-danger mt-3" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" type="button">Delete</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- publish confirmation modal  -->
<div class="modal fade" id="confirmPublishModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to publis <strong><?= esc($articleData['article_title']); ?></strong> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancel</button>
        <form action="<?= base_url(); ?>article/<?= $articleData['article_id']; ?>" method="post">
          <?= csrf_field(); ?>
          <input type="hidden" name="slug" value="<?= esc($articleData['article_slug']); ?>">
          <button type="submit" class="btn btn-danger">Publish</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- delete confirmation modal  -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete <strong><?= esc($articleData['article_title']); ?></strong> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancel</button>
        <form action="<?= base_url(); ?>article/<?= $articleData['article_id']; ?>" method="post">
          <?= csrf_field(); ?>
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>