<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm mb-2 mt-2">
          <h1 class="font-weight-bold text-center text-secondary text-uppercase">Join Kontrak</h1>
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
              <span class="badge badge-danger"><?= $countNull; ?> Calon Karyawan</span>
              Belum Sign Kontrak
              <div class="float-right">
                <p>
                  <a class="btn btn-danger btn-sm" href="<?php echo base_url('contract/export_excel_contract') ?>"><i
                      class="fas fa-fw fa-file-export"></i> Export
                    Full Excel</a>
                </p>
              </div>
            </div>


            <div class="card-body">
              <table id="contract" class="table table-bordered table-dark table-striped text-center">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Klien</th>
                    <th>Jabatan</th>
                    <th>Tgl Awal - Tgl Akhir</th>
                    <th>Dikirim Oleh</th>
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