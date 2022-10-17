<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-warning elevation-4">
  <a href="<?= $this->uri->segment(1); ?>" class="brand-link">
    <img src="<?= base_url('assets/'); ?>img/logo2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light font-weight-bold">M+ DBM</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('assets/uploads/image/candidate-image/user.png'); ?>" class="img-circle elevation-2"
          alt="User Image">
      </div>
      <div class="info">
        <a href="" class="d-block"><?= $users['username'] ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-header font-weight-bold bg-purple mb-2" style="border-radius: 5px;">SOURCING MENU</li>
        <li class="nav-item">
          <a href="<?= base_url('sourcing') ?>"
            class="nav-link <?= $this->uri->segment(1) == 'sourcing' ||  $this->uri->segment(1) == '' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Data Kandidat
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('scorecandidate') ?>"
            class="nav-link <?= $this->uri->segment(1) == 'scorecandidate' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-pen"></i>
            <p>
              Penilaian Kandidat
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#"
            class="nav-link <?= $this->uri->segment(1) == 'education' || $this->uri->segment(1) == 'experience' || $this->uri->segment(1) == 'uploadcandidate' ? 'active menu-is-opening menu-open' : '' ?>">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Data Kandidat Lainnya
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul
            class="nav nav-treeview <?= $this->uri->segment(1) == 'education' || $this->uri->segment(1) == 'experience' || $this->uri->segment(1) == 'uploadcandidate' ? 'd-block' : '' ?>">
            <li class="nav-item">
              <a href="<?= base_url('education') ?>"
                class="nav-link <?= $this->uri->segment(1) == 'education' ? 'active' : '' ?>">
                <i class="fas fa-graduation-cap nav-icon"></i>
                <p>Pendidikan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('experience') ?>"
                class="nav-link <?= $this->uri->segment(1) == 'experience' ? 'active menu-is-opening menu-open' : '' ?>">
                <i class="fab fa-black-tie nav-icon"></i>
                <p>Pengalaman</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('uploadcandidate') ?>"
                class="nav-link <?= $this->uri->segment(1) == 'uploadcandidate' ? 'active menu-is-opening menu-open' : '' ?>">
                <i class="fas fa-file-image nav-icon"></i>
                <p>Upload File & Gambar</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-header font-weight-bold bg-purple mb-2" style="border-radius: 5px;">RECRUITMENT MENU</li>
        <li class="nav-item">
          <a href="<?= base_url('graduated') ?>"
            class="nav-link <?= $this->uri->segment(1) == 'graduated' ? 'active menu-is-opening menu-open' : '' ?>">
            <i class="nav-icon fas fa-user-graduate"></i>
            <p>
              Kandidat Lulus
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('reference') ?>"
            class="nav-link <?= $this->uri->segment(1) == 'reference' ? 'active menu-is-opening menu-open' : '' ?>">
            <i class="nav-icon fas fa-user-check"></i>
            <p>
              Referensi
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('scorecandidate') ?>"
            class="nav-link <?= $this->uri->segment(1) == '' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-hand-holding-usd"></i>
            <p>
              Kontrak Form
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>