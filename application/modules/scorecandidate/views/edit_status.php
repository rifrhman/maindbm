<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Penjadwalan Kandidat Tidak Hadir</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <?= $this->session->flashdata('msg') ?>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title font-weight-bold">Edit Status</h3>
              <div class="card-tools">
              </div>
            </div>
            <!-- /.card-header -->

            <form action="<?= base_url('scorecandidate/editStatus/') . $basic['basic_id']; ?>" method="POST">
              <input type="hidden" name="basic_id" id="basic_id" value="<?= $basic['basic_id'] ?>">
              <div class="card-body">
                <div class="row">
                  <div class="form-row col-lg-12">
                    <div class="form-group col-lg">
                      <label for="status_test">Status Test</label>
                      <select id="status_test" name="status_test" class="form-control is-warning">
                        <option selected="selected" value="" disabled="disabled"><?= $basic['status_test'] ?>
                        </option>
                        <option value="Lulus">Lulus</option>
                        <option value="Referensi">Referensi</option>
                        <option value="Tidak Lulus">Tidak Lulus</option>
                        <option value="Tidak Hadir">Tidak Hadir</option>
                      </select>
                    </div>


                  </div>
                  <div class="form-row col-lg-12">

                    <div class="form-group col-lg-6">
                      <label for="status_test">Submit Data</label>
                      <button type="submit" class="form-control btn btn-warning font-weight-bold"><i
                          class="fas fa-calendar-alt"></i>
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