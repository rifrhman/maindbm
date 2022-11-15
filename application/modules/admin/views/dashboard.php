<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box dark-mode">
            <span class="info-box-icon bg-gradient-olive elevation-1"><i class="fas fa-user-check"></i></span>

            <a href="<?= base_url('contract') ?>">
              <div class="info-box-content">
                <span class="info-box-text text-dark font-weight-bold">Join Kontrak</span>
                <span class="info-box-number">
                  <?= $countjoin; ?>
                </span>
              </div>
            </a>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- ./col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-purple elevation-1"><i class="fas fa-database"></i></span>


            <a href="<?= base_url('employee') ?>">
              <div class="info-box-content">
                <span class="info-box-text text-dark font-weight-bold">Data Karyawan</span>
                <span class="info-box-number">
                  <?= $countemp; ?>
                </span>
              </div>
            </a>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- ./col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box dark-mode">
            <span class="info-box-icon bg-gradient-info elevation-1"><i class="fas fa-user-times"></i></span>
            <a href="<?= base_url('resign') ?>">
              <div class="info-box-content">
                <span class="info-box-text text-dark font-weight-bold">Karyawan Resign</span>
                <span class="info-box-number">
                  <?= $countempresign; ?>
                </span>
              </div>
            </a>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- ./col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-gradient-maroon elevation-1"><i class="fas fa-user-alt-slash"></i></span>
            <a href="<?= base_url('blacklist') ?>">
              <div class="info-box-content">
                <span class="info-box-text text-dark font-weight-bold">Karyawan Blacklist</span>
                <span class="info-box-number">
                  <?= $countempblacklist; ?>
                </span>
              </div>
            </a>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->




      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->