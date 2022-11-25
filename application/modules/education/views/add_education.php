<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Pendidikan <?= $basic['fullname']; ?></h1>
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
              <h3 class="card-title font-weight-bold">Data Tambahan Pendidikan</h3>
              <div class="card-tools">
              </div>
            </div>
            <!-- /.card-header -->

            <form action="<?= base_url('education/add_education/') . $basic['id_candidate']; ?>" method="POST">
              <input type="hidden" name="<?= $basic['id_candidate'] ?>" value="<?= $basic['id_candidate'] ?>" id="">
              <div class="card-body">
                <div class="row">
                  <div class="form-row col-lg-12">
                    <div class="form-group col-md-4">
                      <label for="degree">Tingkatan</label>
                      <select id="inputState" name="degree" class="form-control">
                        <option selected="selected" disabled="disabled">Choose...</option>
                        <option value="SMK">SMK</option>
                        <option value="SMA">SMA</option>
                        <option value="D1">D1</option>
                        <option value="D2">D2</option>
                        <option value="D3">D3</option>
                        <option value="D4">D4</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                      </select>
                      <?= form_error('degree', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="institute">Institut</label>
                      <input type="text" name="institute" class="form-control" id="institute"
                        placeholder="Universitas ...">
                      <?= form_error('institute', '<small class="text-danger">', '</small>') ?>
                    </div>

                    <div class="form-group col-md-4">
                      <label for="major">Jurusan</label>
                      <input type="text" name="major" class="form-control" id="major"
                        placeholder="Sistem Informatika ...">
                      <?= form_error('major', '<small class="text-danger">', '</small>') ?>
                    </div>
                  </div>
                  <div class="form-row col-lg-12">
                    <div class="form-group col-md-3">
                      <label for="city">Kota Institut</label>
                      <input type="text" name="city" class="form-control" id="city" placeholder="Jakarta ...">
                      <?= form_error('city', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="score">Nilai / IPK</label>
                      <input type="text" name="score" class="form-control" id="score" placeholder="3.89">
                      <?= form_error('score', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="year_in">Tahun Masuk</label>
                      <input type="text" name="year_in_edu" class="form-control" id="year_in_edu">
                      <?= form_error('year_in_edu', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="year_out">Tahun Keluar</label>
                      <input type="text" name="year_out_edu" class="form-control" id="year_out_edu">
                      <?= form_error('year_out_edu', '<small class="text-danger">', '</small>') ?>
                    </div>
                  </div>
                  <div class="form-row col-lg-12">
                    <div class="form-group col-lg-6">
                      <button type="submit" class="form-control btn btn-primary font-weight-bold"><i
                          class="fas fa-fw fa-edit"></i>
                        Tambah Data Penilaian</button>
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