<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm mb-2 mt-3">
          <h1 class="font-weight-bold text-secondary text-center text-uppercase">Penjadwalan Kandidat</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <?= $this->session->flashdata('msg') ?>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title font-weight-bold">Data Jadwal Test</h3>
              <div class="card-tools">
              </div>
            </div>
            <!-- /.card-header -->

            <form action="<?= base_url('scorecandidate/update_test/') . $basic['id_candidate']; ?>" method="POST">
              <input type="hidden" name="id_candidate" id="id_candidate" value="<?= $basic['id_candidate'] ?>">
              <div class="card-body">
                <div class="row">
                  <div class="form-row col-lg-12">
                    <div class="form-group col-md-4">
                      <label for="test_one">Test Pertama</label>
                      <input type="date" name="test_one" class="form-control" id="test_one"
                        value="<?= $basic['test_one'] ?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="test_two">Test Kedua</label>
                      <input type="date" name="test_two" class="form-control" id="test_two"
                        value="<?= $basic['test_two'] ?>">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="test_three">Test Ketiga</label>
                      <input type="date" name="test_three" class="form-control" id="test_three"
                        value="<?= $basic['test_three'] ?>">
                    </div>
                  </div>
                  <div class="form-row col-lg-12">
                    <div class="form-group col-lg-6">
                      <label for="tall">Nama Lengkap</label>
                      <input type="text" name="tall" class="form-control" id="tall" value="<?= $basic['fullname'] ?>"
                        readonly>
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="status_test">Submit Data</label>
                      <button type="submit" class="form-control btn bg-olive font-weight-bold"><i
                          class="fas fa-calendar-alt"></i>
                        Tambah Jadwal</button>
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