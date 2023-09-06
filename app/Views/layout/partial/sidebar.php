<?php $uri = service('uri'); { ?>
  <div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
      <div class="sb-sidenav-menu">
        <div class="nav">
          <div class="sb-sidenav-menu-heading">Core</div>
          <a class="nav-link <?= ($uri->getSegment(1) === '' || $uri->getSegment(1) == 'dashboard') ? 'active' : ''; ?>" href="<?= base_url(); ?>">
            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
            Dashboard
          </a>
          <a class="nav-link <?= ($uri->getSegment(1) === 'user') ? 'active' : ''; ?>" href="<?= base_url(); ?>user">
            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
            Users management
          </a>
        </div>
      </div>
      <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Start Bootstrap
      </div>
    </nav>
  </div>
<?php } ?>