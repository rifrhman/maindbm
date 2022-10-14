<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Form Tambah Kandidat</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <?= $this->session->flashdata('msg'); ?>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md">
          <!-- general form elements -->
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Tambah Kandidat Baru</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= base_url('sourcing/addNewCandidate') ?>" method="POST">
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="fullname">Nama Lengkap</label>
                    <input type="text" name="fullname" class="form-control" id="name">
                    <?= form_error('fullname', '<small class="text-danger">', '</small>') ?>

                  </div>
                  <div class="form-group col-md-6">
                    <label for="phone_number">Nomer Handphone</label>
                    <input type="number" name="phone_number" class="form-control" id="phone_number">
                    <?= form_error('phone_number', '<small class="text-danger">', '</small>') ?>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="place_of_birth">Tempat Lahir</label>
                    <input type="text" name="place_of_birth" class="form-control" id="place_of_birth">
                    <?= form_error('place_of_birth', '<small class="text-danger">', '</small>') ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="date_of_birth">Tanggal Lahir</label>
                    <input type="date" name="date_of_birth" class="form-control" id="date_of_birth">
                    <?= form_error('date_of_birth', '<small class="text-danger">', '</small>') ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="domicile">Alamat Domisili</label>
                  <input type="text" class="form-control" name="domicile" id="domicile" placeholder="Jakarta...">
                  <?= form_error('domicile', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="last_education">Pendidikan</label>
                    <input type="text" class="form-control" name="last_education" id="last_education"
                      placeholder="S1 - Sistem Informasi ...">
                    <?= form_error('last_education', '<small class="text-danger">', '</small>') ?>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="gender">Jenis Kelamin</label>
                    <select id="gender" name="gender" class="form-control">
                      <option selected="selected" disabled="disabled">Choose...</option>
                      <option value="L">Laki-Laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                    <?= form_error('gender', '<small class="text-danger">', '</small>') ?>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputZip">Tanggal Test Awal</label>
                    <input type="date" name="test_one" class="form-control" id="test_one">
                    <?= form_error('test_one', '<small class="text-danger">', '</small>') ?>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-plus-square"></i> Tambah</button>
                <a href="<?= base_url('sourcing') ?>" class="btn btn-warning"><i class="fas fa-fw fa-undo"></i>
                  Kembali</a>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </div>
</div>