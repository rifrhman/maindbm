<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Form Kontrak</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <?= $this->session->flashdata('msg') ?>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title font-weight-bold">Form Kontrak</h3>
              <div class="card-tools">
              </div>
            </div>
            <!-- /.card-header -->

            <form action="<?= base_url('graduated/contract_form/') . $status['id']; ?>" method="POST">
              <input type="hidden" name="id" id="id" value="<?= $status['id'] ?>">
              <div class="card-body">
                <div class="row">
                  <div class="form-row col-lg-12">
                    <div class="form-group col-lg-6">
                      <label for="client">Client</label>
                      <input type="text" class="form-control" value="<?= $status['client'] ?>" name="client" readonly>
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="position">Posisi</label>
                      <input type="text" class="form-control" value="<?= $status['position'] ?>" name="position"
                        readonly>
                    </div>
                  </div>
                  <div class="form-row col-lg-12">
                    <div class="form-group col-lg-6">
                      <label for="date_send">Tanggal Dikirim</label>
                      <input type="date" class="form-control" value="<?= $status['date_send'] ?>" name="date_send"
                        readonly>
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="result_send">Hasil Kirim Kandidat</label>
                      <input type="text" class="form-control" value="<?= $status['result_send'] ?>" name="result_send"
                        readonly>
                    </div>
                  </div>
                  <div class="form-row col-lg-12">
                    <div class="form-group col-lg-6">
                      <label for="placement">Penempatan</label>
                      <input type="text" class="form-control" value="<?= $status['placement'] ?>" name="placement">
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="salary">Gaji</label>
                      <input type="text" class="form-control" value="<?= $status['salary'] ?>" name="salary">
                    </div>
                  </div>
                  <div class="form-row col-lg-12">
                    <div class="form-group col-lg-6">
                      <label for="start_date">Mulai Tanggal</label>
                      <input type="date" class="form-control" value="<?= $status['start_date'] ?>" name="start_date">
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="end_date">Akhir Tanggal</label>
                      <input type="date" class="form-control" value="<?= $status['end_date'] ?>" name="end_date">
                    </div>
                  </div>

                  <div class="form-row col-lg-12">
                    <div class="form-group col-lg-6">
                      <label for="desc_send">Keterangan Lain</label>
                      <input type="text" class="form-control" value="<?= $status['desc_send'] ?>" name="desc_send">
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="result_send">Submit Data</label>
                      <button type="submit" class="form-control btn btn-warning font-weight-bold"><i
                          class="fas fa-paper-plane"></i>
                        Kirim Data</button>
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