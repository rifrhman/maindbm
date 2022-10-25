<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Pengalaman <?= $basic['fullname']; ?></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="content">
    <div class="container-fluid">
      <?= $this->session->flashdata('msg'); ?>
      <div class="row">
        <div class="col-md">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title font-weight-bold">Data Tambahan Pengalaman</h3>
              <div class="card-tools">
              </div>
            </div>
            <!-- /.card-header -->

            <form action="<?= base_url('experience/add_exp/') . $basic['id_candidate']; ?>" method="POST">
              <input type="hidden" name="<?= $basic['id_candidate'] ?>" value="<?= $basic['id_candidate'] ?>" id="">
              <div class="card-body">
                <div class="row">
                  <div class="form-row col-lg-12">

                    <div class="form-group col-md-4">
                      <label for="company">Perusahaan</label>
                      <input type="text" name="company" class="form-control" id="company" placeholder="Perusahaan ...">
                      <?= form_error('company', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="position">Posisi</label>
                      <input type="text" name="position" class="form-control" id="position" placeholder="Posisi ...">
                      <?= form_error('position', '<small class="text-danger">', '</small>') ?>
                    </div>

                    <div class="form-group col-md-4">
                      <label for="year_in">Tahun Masuk</label>
                      <input type="date" name="year_in" class="form-control" id="year_in" placeholder="2018 ..">
                      <?= form_error('year_in', '<small class="text-danger">', '</small>') ?>
                    </div>
                  </div>

                  <div class="form-row col-lg-12">

                    <div class="form-group col-md-4">
                      <label for="month_period">Periode Bulan</label>
                      <input type="text" name="month_period" class="form-control" id="month_period"
                        placeholder="Bulan ...">
                      <?= form_error('month_period', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="last_salary">Gaji Terakhir</label>
                      <input type="text" name="last_salary" class="form-control" id="last_salary" placeholder="5000000">
                      <?= form_error('last_salary', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="resign">Alasan Resign</label>
                      <input type="text" name="resign" class="form-control" id="resign">
                      <?= form_error('resign', '<small class="text-danger">', '</small>') ?>
                    </div>

                  </div>
                  <div class="form-row col-lg-12">
                    <div class="form-group col-lg-6">
                      <button type="submit" class="form-control btn btn-info font-weight-bold"><i
                          class="fas fa-fw fa-edit"></i>
                        Tambah Data Pengalaman</button>
                    </div>
                  </div>
                </div>
                <!-- /.row -->
              </div>

            </form>

            <!-- /.card -->
          </div>


        </div>
      </div>
    </div>
  </div>
</div>