<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">




    <li class="nav-item">
      <a class="nav-link btn btn-danger btn-sm text-light" data-toggle="modal" data-target="#logoutmodal">
        <i class="fas fa-fw fa-sign-out-alt"></i> Logout
      </a>
    </li>

  </ul>
</nav>
<!-- /.navbar -->

<!-- Modal -->
<div class="modal fade" id="logoutmodal" tabindex="-1" aria-labelledby="logoutmodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutmodalLabel">Keluar aplikasi ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-danger text-center">
          Terima kasih telah menggunakan aplikasi database MutualPlus.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="<?= base_url('auth/logout'); ?>" class="btn btn-primary">Logout</a>
      </div>
    </div>
  </div>
</div>