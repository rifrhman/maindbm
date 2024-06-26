<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-purple elevation-4" style="font-size: 14px;">
  <!-- Brand Logo -->
  <a href="" class="brand-link">
    <img src="<?= base_url('assets/'); ?>img/logo2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
    <span class=" brand-text font-weight-light font-weight-bold">Mutualplus</span>
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
        <li class="nav-header font-weight-bold bg-light mb-2" style="border-radius: 5px;">DASHBOARD</li>
        <li class="nav-item">
          <a href="<?= base_url('admin') ?>"
            class="nav-link <?= $this->uri->segment(1) == 'admin' ||  $this->uri->segment(1) == '' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-fw fa-home"></i>
            <p>
              Home
            </p>
          </a>
        </li>

        <li class="nav-header font-weight-bold bg-light mb-2 mt-3" style="border-radius: 5px;">KONTRAK BARU</li>
        <li class="nav-item">
          <a href="<?= base_url('contract') ?>"
            class="nav-link <?= $this->uri->segment(1) == 'contract' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-fw fa-user-check"></i>
            <p>
              Join Kontrak
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('signin') ?>"
            class="nav-link <?= $this->uri->segment(1) == 'signin' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-fw fa-inbox"></i>
            <p>
              Karyawan Masuk (IN)
            </p>
          </a>
        </li>
        <li class="nav-header font-weight-bold bg-light mb-2 mt-3" style="border-radius: 5px;">DATA KARYAWAN</li>
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
        <li class="nav-header font-weight-bold bg-light mb-2 mt-3" style="border-radius: 5px;">DATA LAINNYA</li>
        <li class="nav-item">
          <a href="<?= base_url('dropout') ?>"
            class="nav-link <?= $this->uri->segment(1) == 'dropout' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-fw fa-reply"></i>
            <p>
              Karyawan Keluar (OUT)
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('resign') ?>"
            class="nav-link <?= $this->uri->segment(1) == 'resign' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-fw fa-user-minus"></i>
            <p>
              Karyawan Resign
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('blacklist') ?>"
            class="nav-link <?= $this->uri->segment(1) == 'blacklist' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-fw fa-user-times"></i>
            <p>
              Karyawan BlackList
            </p>
          </a>
        </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>