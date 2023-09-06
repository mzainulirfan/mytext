<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title><?= $title; ?> - myTExt</title>
  <link rel="icon" type="image/png" href="<?= base_url(); ?>sb-admin/assets/img/logo.png" />
  <link href="<?= base_url(); ?>sb-admin/css/styles.css" rel="stylesheet" />
  <script src="<?= base_url(); ?>sb-admin/js/fontawesome/fontawesome.js"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="sb-nav-fixed">
  <?= $this->include('layout/partial/header'); ?>
  <div id="layoutSidenav">
    <?= $this->include('layout/partial/sidebar'); ?>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <?= $this->renderSection('content'); ?>
        </div>
      </main>
      <?= $this->include('layout/partial/footer'); ?>
    </div>
  </div>
  <script src="<?= base_url(); ?>sb-admin/js/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>sb-admin/js/scripts.js"></script>
</body>

</html>