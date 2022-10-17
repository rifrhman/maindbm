<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Hasil Kirim Kandidat</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <?= $this->session->flashdata('msg') ?>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md">
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title font-weight-bold">Edit Hasil</h3>
              <div class="card-tools">
              </div>
            </div>
            <!-- /.card-header -->

            <form action="<?= base_url('graduated/update_status/') . $status['id']; ?>" method="POST">
              <input type="hidden" name="id" id="id" value="<?= $status['id'] ?>">
              <div class="card-body">
                <div class="row">
                  <div class="form-row col-lg-12">
                    <div class="form-group col-lg-12">
                      <label for="client">Dari Client</label>
                      <input type="text" class="form-control" value="<?= $status['client'] ?>" name="client" readonly>
                    </div>
                    <div class="form-group col-lg-12">
                      <label for="position">Posisi</label>
                      <input type="text" class="form-control" value="<?= $status['position'] ?>" name="position"
                        readonly>
                    </div>
                    <div class="form-group col-lg-12">
                      <label for="date_send">Tanggal Dikirim</label>
                      <input type="date" class="form-control" value="<?= $status['date_send'] ?>" name="date_send"
                        readonly>
                    </div>
                    <div class="form-group col-lg">
                      <label for="result_send">Hasil Kirim Kandidat</label>
                      <select id="result_send" name="result_send" class="form-control is-warning">
                        <option selected="selected" value="" disabled="disabled"><?= $status['result_send'] ?>
                        </option>
                        <option value="Lolos">Lolos</option>
                        <option value="Tidak Lolos">Tidak Lolos</option>
                      </select>
                    </div>

                  </div>
                  <div class="form-row col-lg-12">

                    <div class="form-group col-lg-6">
                      <label for="result_send">Submit Data</label>
                      <button type="submit" class="form-control btn btn-primary font-weight-bold"><i
                          class="fas fa-check-circle"></i>
                        Edit Data Hasil</button>
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