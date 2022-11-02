<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="font-weight-bold text-secondary text-uppercase">Karyawan Aktif</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <span class="badge badge-danger"><?= $countNull; ?> Karyawan Aktif</span>
              <form method="GET" action="<?= base_url('employee') ?>">
                <div class="row mt-4 justify-content-end">
                  <div class="col-3">
                    <input type="date" class="form-control" name="dateFirst">
                  </div>
                  <div class="col-3">

                    <input type="date" class="form-control" name="dateSecond">
                  </div>
                  <div class="col-3">

                    <button class="btn bg-gradient-purple" type="submit"><i class="fas fa-fw fa-search"></i></button>
                  </div>
                </div>
              </form>
            </div>

            <div class="card-body">
              <table id="employee" class="table table-bordered table-dark table-striped text-center">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Klien</th>
                    <th>CC</th>
                    <th>Jabatan</th>
                    <th>Tgl Awal - Tgl Akhir</th>
                    <th>Sisa Hari</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->