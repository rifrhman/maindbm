<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/adminlte.min.css">
  <style>
  body {
    font-family: 'Poppins';
  }
  </style>
</head>

<body class="hold-transition bg-navy login-page">

  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-indigo p-2 bg-white rounded">
      <div class="card-header text-center">
        <!-- <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a> -->
        <img src="<?= base_url('assets/img/logo.png') ?>" alt="logo" class="img-fluid">
        <p class="font-weight-bold text-indigo font-italic">Candidate Database System</p>
      </div>
      <div class="card-body">

        <p class="login-box-msg text-dark font-weight-bold">Halaman Login</p>

        <?= $this->session->flashdata('msg'); ?>

        <form action="<?= base_url('auth/login'); ?>" method="POST">
          <div class="input-group mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username...">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" id="id_password" class="form-control" placeholder="Password...">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-unlock"></span>
              </div>
            </div>
          </div>
          <div class="form-group" style="float: right;">
            <div class="custom-control custom-switch custom-switch-off-secondary custom-switch-on-danger">
              <input type="checkbox" class="custom-control-input" id="customSwitch1" onclick="showPass()">
              <label class="custom-control-label text-dark" style="cursor: pointer; font-size: 14px"
                for="customSwitch1">Show Password</label>
            </div>
          </div>
          <button type="submit" class="btn bg-gradient-indigo btn-block"><i class="fas fa-fw fa-shield-alt"></i>
            Login</button>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
  <script>
  function showPass() {
    var x = document.getElementById("id_password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
  </script>
</body>

</html>