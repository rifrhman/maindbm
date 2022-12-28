<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Pengalaman</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="content">
    <div class="container-fluid">
      <?= $this->session->flashdata('msg'); ?>
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-success">
            <div class="card-header d-flex justify-content-xl-center">
              <h3 class="card-title font-weight-bold mr-4">Form Tambah Pengalaman</h3>
              <h3 class="card-title font-weight-bold ">[ <strong
                  class="text-gray-dark"><?= $basic['fullname']; ?></strong>
                ]</h3>
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
                      <input type="text" name="position_exp" class="form-control" id="position_exp"
                        placeholder="Posisi ...">
                      <?= form_error('position_exp', '<small class="text-danger">', '</small>') ?>
                    </div>

                    <div class="form-group col-md-4">
                      <label for="year_in">Tanggal dan Tahun Masuk</label>
                      <input type="date" name="year_in_exp" class="form-control" id="year_in_exp" placeholder="2018 ..">
                      <?= form_error('year_in_exp', '<small class="text-danger">', '</small>') ?>
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
                  <div class="form-row col-lg-12 justify-content-end">
                    <div class="form-group col-lg-3">
                      <button type="submit" class="form-control btn btn-primary font-weight-bold"><i
                          class="fas fa-fw fa-edit"></i>
                        Submit</button>
                    </div>
                  </div>
                </div>
                <!-- /.row -->
              </div>

            </form>

            <!-- /.card -->
          </div>


        </div>


        <div class="col-lg-12">
          <?php if ($exp == null) : ?>
          <div class="col-lg">
            <div class="row">
              <div class="alert alert-danger col-lg" role="alert">
                Data Pengalaman Belum Diinput.
              </div>

            </div>
          </div>
          <?php else : ?>
          <div class="card card-dark">
            <div class="card-header">
              <h3 class="card-title font-weight-bold">List Daftar Pengalaman</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>

              </div>
            </div>
            <?php foreach ($exp as $ex) : ?>
            <div class="card-body">
              <div class="card card-default">
                <div class="card-header">
                  <h5 class="card-title font-weight-bold" style="font-size: 14px !important;">Rincian Pengalaman
                    Kandidat</h5>

                </div>


                <div class="card-body">
                  <div class="row col-lg-12">

                    <div class="form-group col-md-3">
                      <label for="degree">Perusahaan</label>
                      <input type="text" class="form-control" id="company" value="<?= $ex['company'] ?>" readonly>
                    </div>

                    <div class="form-group col-md-5">
                      <label for="institute">Posisi</label>
                      <input type="text" class="form-control" id="position_exp" value="<?= $ex['position_exp'] ?>"
                        readonly>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="major">Tahun Masuk</label>
                      <?php if (isset($ex['year_in_exp'])) : ?>
                      <input type="text" class="form-control" id="year_in_exp"
                        value="<?= date('d F Y', strtotime($ex['year_in_exp'])) ?>" readonly>
                      <?php else : ?>
                      <input type="text" class="form-control" id="year_in_exp" value="<?= $ex['year_in_exp'] ?>"
                        readonly>
                      <?php endif; ?>
                    </div>

                  </div>
                  <div class="row col-lg-12">
                    <div class="col-md-3">
                      <label for="city">Periode Bulan</label>
                      <input type="text" class="form-control" id="month_period" value="<?= $ex['month_period'] ?>"
                        readonly>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-group">
                        <label for="score">Gaji Terakhir</label>
                        <input type="text" class="form-control" id="last_salary" value="<?= $ex['last_salary'] ?>"
                          readonly>
                      </div>

                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="resign">Alasan Resign</label>
                        <input type="text" class="form-control" id="resign" value="<?= $ex['resign'] ?>" readonly>
                      </div>

                    </div>


                  </div>


                </div>





              </div>
            </div>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>

        </div>

      </div>
    </div>
  </div>
</div>