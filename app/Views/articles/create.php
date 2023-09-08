<?= $this->extend('layout/default'); ?>
<?= $this->section('content'); ?>
<h1 class="mt-4">Create article</h1>
<form method="post" action="<?= base_url(); ?>article/save">
  <div class="row">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header">New Article</div>
        <div class="card-body">
          <?= csrf_field(); ?>
          <div class="col-lg-12 mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control <?= (session()->has('validation') && ($validation = session('validation'))->hasError('title')) ? 'is-invalid' : '' ?>" value="<?= old('title'); ?>" id=" title">
            <div class="invalid-feedback">
              <?php
              if (session()->has('validation') && ($validation = session('validation'))->hasError('title')) {
                echo $validation->getError('title');
              }
              ?>
            </div>
          </div>
          <div class="col-lg-12 mb-3">
            <label for="categories" class="from-label">Categories</label>
            <select name="categories" class="form-select" id="categories">
              <?php foreach ($categories as $category) : ?>
                <option value="<?= esc($category['category_id']); ?>"><?= esc($category['category_name']); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-lg-12 mb-3">
            <label for="preview" class="form-label">Preview</label>
            <textarea class="form-control <?= (session()->has('validation') && ($validation = session('validation'))->hasError('preview')) ? 'is-invalid' : '' ?>" name="preview" id="preview" rows="5"><?= old('preview'); ?></textarea>
            <div class="invalid-feedback">
              <?php
              if (session()->has('validation') && ($validation = session('validation'))->hasError('preview')) {
                echo $validation->getError('preview');
              }
              ?>
            </div>
          </div>

          <div class="col-lg-12">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control <?= (session()->has('validation') && ($validation = session('validation'))->hasError('content')) ? 'is-invalid' : '' ?>" name="content" id="content" rows="15"><?= old('content'); ?></textarea>
            <div class="invalid-feedback">
              <?php
              if (session()->has('validation') && ($validation = session('validation'))->hasError('content')) {
                echo $validation->getError('content');
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card">
        <div class="card-header">Action</div>
        <div class="card-body">
          <div class="d-grid gap-2">
            <button class="btn btn-outline-secondary" type="submit">Save as Draft</button>
            <button class="btn btn-primary" type="button">Publish</button>
            <a href="<?= base_url(); ?>article" class="btn btn-outline-none border border-1 border-danger mt-3 text-danger">Cancel</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<?= $this->endSection(); ?>