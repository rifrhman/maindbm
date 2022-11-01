<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?= base_url('assets/'); ?>img/logo2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">Mutualplus</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <a href="" class="d-block"><?= $users['username'] ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-header">DASHBOARD</li>
        <li class="nav-item">
          <a href="<?= base_url('admin') ?>"
            class="nav-link <?= $this->uri->segment(1) == 'admin' ||  $this->uri->segment(1) == '' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-fw fa-home"></i>
            <p>
              Home
            </p>
          </a>
        </li>

        <li class="nav-header">KONTRAK BARU</li>
        <li class="nav-item">
          <a href="<?= base_url('contract') ?>"
            class="nav-link <?= $this->uri->segment(1) == 'contract' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-fw fa-user-check"></i>
            <p>
              Join Kontrak
            </p>
          </a>
        </li>
        <li class="nav-header">DATA KARYAWAN</li>
        <li class="nav-item">
          <a href="<?= base_url('employee') ?>"
            class="nav-link <?= $this->uri->segment(1) == 'employee' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-fw fa-users"></i>
            <p>
              Karyawan Aktif
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('pkwt') ?>" class="nav-link <?= $this->uri->segment(1) == 'pkwt' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-fw fa-chalkboard-teacher"></i>
            <p>
              Karyawan PKWT
            </p>
          </a>
        </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>