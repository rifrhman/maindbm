<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-navy elevation-4" style="font-size: 14px;">
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
        <li class="nav-header font-weight-bold mb-2" style="border-radius: 5px;">Menu Sourcing</li>
        <li class="nav-item">
          <a href="<?= base_url('manage') ?>"
            class="nav-link <?= $this->uri->segment(1) == 'manage' ||  $this->uri->segment(1) == '' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-fw fa-users"></i>
            <p>
              Candidate Basic
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('manage_secondary') ?>"
            class="nav-link <?= $this->uri->segment(1) == 'manage_secondary' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-fw fa-user-check"></i>
            <p>
              Candidate Secondary
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('manage_education') ?>"
            class="nav-link <?= $this->uri->segment(1) == 'manage_education' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-fw fa-graduation-cap"></i>
            <p>
              Education
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('manage_experience') ?>"
            class="nav-link <?= $this->uri->segment(1) == 'manage_experience' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-fw fa-tasks"></i>
            <p>
              Experience
            </p>
          </a>
        </li>

        <li class="nav-header font-weight-bold mb-2 mt-3" style="border-radius: 5px;">Menu Recruitment</li>
        <li class="nav-item">
          <a href="<?= base_url('contract') ?>"
            class="nav-link <?= $this->uri->segment(1) == 'contract' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-fw fa-paper-plane"></i>
            <p>
              Send Candidate
            </p>
          </a>
        </li>
        <li class="nav-header font-weight-bold mb-2 mt-3" style="border-radius: 5px;">Menu Admin</li>
        <li class="nav-item">
          <a href="<?= base_url('signin') ?>"
            class="nav-link <?= $this->uri->segment(1) == 'signin' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-fw fa-user-shield"></i>
            <p>
              Basic Admin
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('signin') ?>"
            class="nav-link <?= $this->uri->segment(1) == 'signin' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-fw fa-child"></i>
            <p>
              Secondary Admin
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('signin') ?>"
            class="nav-link <?= $this->uri->segment(1) == 'signin' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-book-reader"></i>
            <p>
              PKWT Employee
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('signin') ?>"
            class="nav-link <?= $this->uri->segment(1) == 'signin' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-fw fa-address-card"></i>
            <p>
              Emergency Contact
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('signin') ?>"
            class="nav-link <?= $this->uri->segment(1) == 'signin' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-fw fa-user-slash"></i>
            <p>
              Resign Employee
            </p>
          </a>
        </li>

        <li class="nav-header font-weight-bold mb-2 mt-3" style="border-radius: 5px;">Super Admin Control</li>
        <li class="nav-item">
          <a href="<?= base_url('signin') ?>"
            class="nav-link <?= $this->uri->segment(1) == 'signin' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-fw fa-user-cog"></i>
            <p>
              Users Access
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('signin') ?>"
            class="nav-link <?= $this->uri->segment(1) == 'signin' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-fw fa-layer-group"></i>
            <p>
              Level Access
            </p>
          </a>
        </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>