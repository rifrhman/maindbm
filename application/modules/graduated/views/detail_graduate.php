<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Detail Kandidat</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <?= $this->session->flashdata('msg'); ?>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title font-weight-bold">Data Basic Kandidat</h3>
              <div class="d-flex justify-content-end">
                <!-- <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#basic">
                  <i class="fas fa-fw fa-user-edit"></i> Edit Data
                </button> -->
              </div>


            </div>

            <form>
              <div class="card-body">
                <div class="row mb-3">

                  <div class="col d-flex justify-content-center">
                    <img src="<?= base_url('assets/uploads/image/candidate-image/') . $list['image'] ?>" width="222px"
                      alt="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Lengkap</label>
                  <input type="text" class="form-control" name="fullname" value="<?= $list['fullname'] ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="place_of_birth">Tempat Lahir</label>
                  <input type="text" class="form-control" id="place_of_birth" value="<?= $list['place_of_birth'] ?>"
                    readonly>
                </div>
                <div class="form-group">
                  <label for="date_of_birth">Tanggal Lahir</label>
                  <input type="text" class="form-control" id="date_of_birth" value="<?= $list['date_of_birth'] ?>"
                    readonly>
                </div>
                <div class="form-group">
                  <label for="phone_number">Nomor Handphone</label>
                  <input type="text" class="form-control" id="phone_number" value="<?= $list['phone_number'] ?>"
                    readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  <input type="text" class="form-control" id="domicile" value="<?= $list['domicile'] ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInput1">Jenis Kelamin</label>
                  <?php if ($list['gender'] == 'L') : ?>
                  <input type="text" class="form-control" id="gender" value="Laki - Laki" readonly>
                  <?php elseif ($list['gender'] == 'P') : ?>
                  <input type="text" class="form-control" id="gender" value="Perempuan" readonly>
                  <?php endif; ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Pendidikan Terakhir</label>
                  <input type="text" class="form-control" id="domicile" value="<?= $list['last_education'] ?>" readonly>
                </div>
              </div>

            </form>

          </div>


        </div>

        <?php if ($second == null) : ?>
        <div class="col-lg">
          <div class="row">
            <div class="alert alert-danger col-lg" role="alert">
              Data Secondary Belum Diinput.
            </div>
          </div>
        </div>
        <?php else : ?>
        <div class="col-md-6">
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title font-weight-bold">Data Secondary Kandidat</h3>
              <div class="d-flex justify-content-end">
                <!-- <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#secondary">
                  <i class="fas fa-fw fa-user-edit"></i> Edit Data
                </button> -->
              </div>
            </div>

            <form>
              <div class="card-body">
                <div class="row mb-3">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nomor Induk Kandidat</label>
                  <input type="text" class="form-control" name="regis_num_candidate"
                    value="<?= $second['regis_num_candidate'] ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="place_of_birth">Nomor Induk Kependudukan</label>
                  <input type="text" class="form-control" id="regis_num_resident"
                    value="<?= $second['regis_num_resident'] ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="date_of_birth">Email</label>
                  <input type="text" class="form-control" id="email" value="<?= $second['email'] ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="phone_number">Agama</label>
                  <input type="text" class="form-control" id="religion" value="<?= $second['religion'] ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tinggi</label>
                  <input type="text" class="form-control" id="tall" value="<?= $second['tall'] ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Berat</label>
                  <input type="text" class="form-control" id="weight" value="<?= $second['weight'] ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Status Perkawinan</label>
                  <input type="text" class="form-control" id="marital_status" value="<?= $second['marital_status'] ?>"
                    readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kode Pos</label>
                  <input type="text" class="form-control" id="postal_code" value="<?= $second['postal_code'] ?>"
                    readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Status Test Kandidat</label>
                  <input type="text" class="form-control" id="status_test" value="<?= $second['status_test'] ?>"
                    readonly>
                </div>

              </div>

            </form>

          </div>


        </div>
        <?php endif; ?>




        <div class="col-md-6">
          <!-- Form Element sizes -->
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title font-weight-bold">Jadwal Test</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-4">
                  <label for="test_one">Test Pertama</label>
                  <input type="text" class="form-control" value="<?= $list['test_one'] ?>" readonly>
                </div>
                <div class="col-4">
                  <label for="test_two">Test Kedua</label>
                  <input type="text" class="form-control" value="<?= $list['test_two'] ?>" readonly>
                </div>
                <div class="col-4">
                  <label for="test_three">Test Ketiga</label>
                  <input type="text" class="form-control" value="<?= $list['test_three'] ?>" readonly>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

        <div class="col-md-6">
          <!-- Form Element sizes -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title font-weight-bold">Berkas Kandidat</h3>
              <div class="d-flex justify-content-end">

              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-4">
                  <label for="test_two">Psikogram Satu</label>
                  <?php if (isset($list['psikogram'])) : ?>
                  <a class="btn btn-info btn-sm form-control"
                    href="<?= base_url('assets/uploads/psikogram/') . $list['psikogram'] ?>" target="_blank">
                    <i class="fas fa-fw fa-file-upload"></i> Psikogram Satu
                  </a>
                  <?php else : ?>
                  <p class="text-danger font-weight-bold">Belum di Upload</p>
                  <?php endif; ?>
                </div>
                <div class="col-4">
                  <label for="test_two">Psikogram Dua</label>
                  <?php if (isset($list['psikogram_two'])) : ?>
                  <a class="btn btn-primary btn-sm form-control"
                    href="<?= base_url('assets/uploads/psikogram/') . $list['psikogram_two'] ?>" target="_blank">
                    <i class="fas fa-fw fa-file-upload"></i> Psikogram Dua
                  </a>
                  <?php else : ?>
                  <p class="text-danger font-weight-bold">Belum di Upload</p>
                  <?php endif; ?>
                </div>
                <div class="col-4">
                  <label for="test_two">Psikogram Tiga</label>
                  <?php if (isset($list['psikogram_three'])) : ?>
                  <a class="btn bg-olive btn-sm form-control"
                    href="<?= base_url('assets/uploads/psikogram/') . $list['psikogram_three'] ?>" target="_blank">
                    <i class="fas fa-fw fa-file-upload"></i> Psikogram Tiga
                  </a>
                  <?php else : ?>
                  <p class="text-danger font-weight-bold">Belum di Upload</p>
                  <?php endif; ?>
                </div>

                <div class="col-6">
                  <label for="test_one">Foto Kandidat</label>
                  <?php if (isset($list['image'])) : ?>
                  <a class="btn bg-gradient-purple btn-sm form-control"
                    href="<?= base_url('assets/uploads/image/candidate-image/') . $list['image'] ?>" target="_blank">
                    <i class="fas fa-fw fa-camera-retro"></i> Foto
                  </a>
                  <?php else : ?>
                  <p class="text-danger font-weight-bold">Belum di Upload</p>
                  <?php endif; ?>
                </div>
                <div class="col-6">
                  <label for="test_three">Form Interview</label>
                  <?php if (isset($list['interview'])) : ?>
                  <a class="btn btn-danger btn-sm form-control"
                    href="<?= base_url('assets/uploads/interview/') . $list['interview'] ?>" target="_blank">
                    <i class="fas fa-fw fa-file-pdf"></i> Interview
                  </a>
                  <?php else : ?>
                  <p class="text-danger font-weight-bold">Belum di Upload</p>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>


        <div class="col-lg-12">
          <?php if ($educate == null) : ?>
          <div class="col-lg">
            <div class="row">
              <div class="alert alert-danger col-lg" role="alert">
                Data Pendidikan Belum Diinput.
              </div>
            </div>
          </div>
          <?php else : ?>
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title font-weight-bold">Pendidikan</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>

              </div>
            </div>
            <?php foreach ($educate as $ed) : ?>
            <div class="card-body">
              <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title font-weight-bold">List Pendidikan Kandidat</h3>

                </div>


                <div class="card-body">
                  <div class="row col-lg-12">

                    <div class="form-group col-md-3">
                      <label for="degree">Tingkat Pendidikan</label>
                      <input type="text" class="form-control" id="degree" value="<?= $ed['degree'] ?>" readonly>
                    </div>

                    <div class="form-group col-md-5">
                      <label for="institute">Institute</label>
                      <input type="text" class="form-control" id="institute" value="<?= $ed['institute'] ?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="major">Jurusan</label>
                      <input type="text" class="form-control" id="major" value="<?= $ed['major'] ?>" readonly>
                    </div>

                  </div>
                  <div class="row col-lg-12">
                    <div class="col-md-3">
                      <label for="city">Kota Institute</label>
                      <input type="text" class="form-control" id="city" value="<?= $ed['city'] ?>" readonly>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="score">Nilai</label>
                        <input type="text" class="form-control" id="score" value="<?= $ed['score'] ?>" readonly>
                      </div>

                    </div>

                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="year_in">Tahun Masuk</label>
                        <input type="text" class="form-control" id="year_in" value="<?= $ed['year_in_edu'] ?>" readonly>
                      </div>

                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="year_out">Tahun Keluar</label>
                        <input type="text" class="form-control" id="year_out" value="<?= $ed['year_out_edu'] ?>"
                          readonly>
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
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title font-weight-bold">Pengalaman</h3>
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
                  <h3 class="card-title font-weight-bold">List Pengalaman Kandidat</h3>

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


        <div class="col-lg">
          <!-- Form Element sizes -->
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title font-weight-bold">Catatan Rekomendasi</h3>
            </div>
            <div class="card-body">
              <form action="<?= base_url('graduated/detailgraduatecandidate/') . $list['id_candidate'] ?>"
                method="POST">
                <input type="hidden" name="id_candidate" value="<?= $list['id_candidate'] ?>" id="">
                <div class="row">
                  <div class="col-lg-12 mb-3">
                    <input type="text" class="form-control" name="note_recommend" value="<?= $list['note_recommend'] ?>"
                      placeholder="Disarankan 'kandidat' bekerja sebagai ...">
                  </div>
                  <div class="col-lg">
                    <button type="submit" class="btn btn-primary d-block">Submit</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>



      </div>

    </div>
  </div>


</div>



<!-- Modal -->
<div class="modal fade" id="basic" data-backdrop="static" data-keyboard="false" tabindex="-1"
  aria-labelledby="basicLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="basicLabel">Edit Berkas Basic</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('graduated/editbasic/') . $list['id_candidate'] ?>" method="POST">
        <div class="modal-body">
          <div class="card-body">
            <input type="hidden" name="id_candidate" id="id_candidate" value="<?= $list['id_candidate'] ?>">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Lengkap</label>
              <input type="text" class="form-control" name="fullname" value="<?= $list['fullname'] ?>">
              <?= form_error('fullname', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="place_of_birth">Tempat Lahir</label>
              <input type="text" class="form-control" name="place_of_birth" id="place_of_birth"
                value="<?= $list['place_of_birth'] ?>">
              <?= form_error('place_of_birth', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="date_of_birth">Tanggal Lahir</label>
              <input type="date" class="form-control" name="date_of_birth" id="date_of_birth"
                value="<?= $list['date_of_birth'] ?>">
              <?= form_error('date_of_birth', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="phone_number">Nomor Handphone</label>
              <input type="text" class="form-control" name="phone_number" id="phone_number"
                value="<?= $list['phone_number'] ?>">
              <?= form_error('phone_number', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Alamat</label>
              <input type="text" class="form-control" name="domicile" id="domicile" value="<?= $list['domicile'] ?>">
              <?= form_error('domicile', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="gender">Jenis Kelamin</label>
              <select id="gender" name="gender" class="form-control">
                <option selected="selected" disabled="disabled"><?= $list['gender'] ?></option>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
              </select>
              <?= form_error('gender', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="last_education">Pendidikan Terakhir</label>
              <input type="text" class="form-control" name="last_education" id="last_education"
                value="<?= $list['last_education'] ?>">
              <?= form_error('last_education', '<small class="text-danger">', '</small>') ?>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Edit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="secondary" data-backdrop="static" data-keyboard="false" tabindex="-1"
  aria-labelledby="secondaryLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="secondaryLabel">Edit Berkas Secondary</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('graduated/editsecondary/') . $second['basic_id'] ?>" method="POST">
        <div class="modal-body">
          <div class="card-body">
            <input type="hidden" name="basic_id" value="<?= $second['basic_id'] ?>">
            <div class="form-group">
              <label for="regis_num_candidate">Nomor Induk Kandidat</label>
              <input type="text" class="form-control" name="regis_num_candidate"
                value="<?= $second['regis_num_candidate'] ?>">
              <?= form_error('regis_num_candidate', '<small class="text-danger pl-2">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="place_of_birth">Nomor Induk Kependudukan</label>
              <input type="text" class="form-control" name="regis_num_resident" id="regis_num_resident"
                value="<?= $second['regis_num_resident'] ?>">
              <?= form_error('regis_num_resident', '<small class="text-danger pl-2">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="date_of_birth">Email</label>
              <input type="text" class="form-control" name="email" id="email" value="<?= $second['email'] ?>">
              <?= form_error('email', '<small class="text-danger pl-2">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="religion">Agama</label>
              <select id="religion" name="religion" class="form-control">
                <option selected="selected" disabled="disabled"><?= $second['religion'] ?></option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katholik">Katholik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
              </select>
              <?= form_error('religion', '<small class="text-danger pl-2">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Tinggi</label>
              <input type="text" class="form-control" name="tall" id="tall" value="<?= $second['tall'] ?>">
              <?= form_error('tall', '<small class="text-danger pl-2">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Berat</label>
              <input type="text" class="form-control" name="weight" id="weight" value="<?= $second['weight'] ?>">
              <?= form_error('weight', '<small class="text-danger pl-2">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="marital_status">Marital Status</label>
              <select id="inputState" name="marital_status" class="form-control">
                <option selected="selected" disabled="disabled"><?= $second['marital_status'] ?></option>
                <option value="SG">SG</option>
                <option value="M0">M0</option>
                <option value="M1">M1</option>
                <option value="M2">M2</option>
              </select>
              <?= form_error('marital_status', '<small class="text-danger pl-2">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="postal_code">Kode Pos</label>
              <input type="text" class="form-control" name="postal_code" id="postal_code"
                value="<?= $second['postal_code'] ?>">
              <?= form_error('postal_code', '<small class="text-danger pl-2">', '</small>') ?>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Edit</button>
        </div>
      </form>
    </div>
  </div>
</div>