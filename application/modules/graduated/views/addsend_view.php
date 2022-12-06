<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Pengiriman Kandidat <?= $basic['fullname']; ?></h1>
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
              <h3 class="card-title font-weight-bold">Pengiriman Kandidat</h3>
              <div class="card-tools">
              </div>
            </div>
            <!-- /.card-header -->

            <form action="<?= base_url('graduated/addsend_candidate/') . $basic['id_candidate']; ?>" method="POST">
              <input type="hidden" name="<?= $basic['id_candidate'] ?>" value="<?= $basic['id_candidate'] ?>" id="">
              <div class="card-body">
                <div class="row">
                  <div class="form-row col-lg-12">

                    <div class="form-group col-md-6">
                      <label for="institute">Klien / Perusahaan</label>
                      <input type="text" name="client" class="form-control" id="client" placeholder="Perusahaan ...">
                      <?= form_error('client', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="major">Posisi / Jabatan</label>
                      <input type="text" name="position" class="form-control" id="position"
                        placeholder="Frontliner ...">
                      <?= form_error('position', '<small class="text-danger">', '</small>') ?>
                    </div>

                  </div>
                  <div class="form-row col-lg-12">
                    <div class="form-group col-md-6">
                      <label for="city">Tanggal Kirim</label>
                      <input type="date" name="date_send" class="form-control" id="date_send" placeholder="Jakarta ...">
                      <?= form_error('date_send', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="result_send">Status / Hasil</label>
                      <select id="inputState" name="result_send" class="form-control">
                        <option selected="selected" disabled="disabled">Choose...</option>
                        <option value="Sedang Dikirim">Sedang Dikirim</option>
                      </select>
                      <?= form_error('result_send', '<small class="text-danger">', '</small>') ?>
                    </div>
                  </div>
                  <div class="form-row col-lg-12">
                    <div class="form-group col-lg-6">
                      <label for="major">Dibuat oleh</label>
                      <input type="text" name="created_by" class="form-control" id="created_by"
                        value="<?= $this->session->userdata('username'); ?>" readonly>
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="major">Submit Data</label>
                      <button type="submit" class="form-control btn btn-danger font-weight-bold"><i
                          class="fas fa-fw fa-edit"></i>
                        Tambah Data Kirim</button>
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