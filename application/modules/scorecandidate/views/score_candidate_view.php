<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Penilaian Kandidat Baru</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="content">
    <div class="container-fluid">
      <?= $this->session->flashdata('msg'); ?>
      <div class="row">
        <div class="col-md">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title font-weight-bold">Data Tambahan Penilaian <?= $basic['fullname'] ?> </h3>
              <div class="card-tools">

              </div>
            </div>
            <!-- /.card-header -->

            <form action="<?= base_url('scorecandidate/score_candidate/') . $basic['id_candidate']; ?>" method="POST">
              <input type="hidden" name="<?= $basic['id_candidate'] ?>" id="">
              <div class="card-body">
                <div class="row">
                  <div class="form-row col-lg-12">
                    <div class="form-group col-md-3">
                      <label for="regis_num_candidate">Nomor Induk Kandidat</label>
                      <input type="text" name="regis_num_candidate" class="form-control" id="regis_num_candidate">

                      <?= form_error('regis_num_candidate', '<small class="text-danger pl-2">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="regis_num_resident">Nomor Induk KTP</label>
                      <input type="text" name="regis_num_resident" class="form-control" id="regis_num_resident">
                      <?= form_error('regis_num_resident', '<small class="text-danger pl-2">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="email">Alamat Email</label>
                      <input type="text" name="email" class="form-control" id="email">
                      <?= form_error('email', '<small class="text-danger pl-2">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="marital_status">Status Perkawinan</label>
                      <select id="marital_status" name="marital_status" class="form-control">
                        <option selected="selected" disabled="disabled">Choose...</option>
                        <option value="SG">SG</option>
                        <option value="M0">M0</option>
                        <option value="M1">M1</option>
                        <option value="M2">M2</option>
                      </select>
                      <?= form_error('marital_status', '<small class="text-danger pl-2">', '</small>') ?>
                    </div>
                  </div>

                  <div class="form-row col-lg-12">

                    <div class="form-group col-md-3">
                      <label for="tall">Tinggi Badan</label>
                      <input type="text" name="tall" class="form-control" id="tall" placeholder="Cm">
                      <?= form_error('tall', '<small class="text-danger pl-2">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="weight">Berat Badan</label>
                      <input type="text" name="weight" class="form-control" id="weight" placeholder="Kg">
                      <?= form_error('weight', '<small class="text-danger pl-2">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="postal_code">Kode Pos</label>
                      <input type="text" name="postal_code" class="form-control" id="postal_code" placeholder="10220">
                      <?= form_error('postal_code', '<small class="text-danger pl-2">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="religion">Agama</label>
                      <select id="religion" name="religion" class="form-control">
                        <option selected="selected" disabled="disabled">Choose...</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katholik">Katholik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghucu">Konghucu</option>
                      </select>
                      <?= form_error('religion', '<small class="text-danger pl-2">', '</small>') ?>
                    </div>
                  </div>
                  <div class="form-row col-lg-12">
                    <div class="form-group col-lg-6">
                      <label for="status_test">Sertifikat <small>*Optional</small></label>
                      <input type="text" name="certificate" class="form-control" id="certificate"
                        placeholder="Sertifikat...">
                      <?= form_error('certificate', '<small class="text-danger pl-2">', '</small>') ?>

                    </div>
                    <div class="form-group col-lg-6">
                      <label for="status_test">Masa Berlaku Sertifikat <small>*Optional</small></label>
                      <input type="text" name="validity_period" class="form-control" id="validity_period"
                        placeholder="Masa Berlaku...">
                      <?= form_error('validity_period', '<small class="text-danger pl-2">', '</small>') ?>
                    </div>
                  </div>
                  <div class="form-row col-lg-12">
                    <div class="form-group col-lg-6">
                      <label for="status_test">Status Test</label>
                      <select id="status_test" name="status_test" class="form-control is-warning">
                        <option selected="selected" disabled="disabled">Choose...</option>
                        <option value="Lulus">Lulus</option>
                        <option value="Referensi">Referensi</option>
                        <option value="Tidak Lulus">Tidak Lulus</option>
                        <option value="Tidak Hadir">Tidak Hadir</option>
                      </select>
                      <?= form_error('status_test', '<small class="text-danger pl-2">', '</small>') ?>
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="status_test">Submit Data</label>
                      <button type="submit" class="form-control btn btn-primary font-weight-bold"><i
                          class="fas fa-fw fa-user-plus"></i>
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