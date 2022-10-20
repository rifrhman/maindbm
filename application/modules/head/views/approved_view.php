<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Approved Kandidat</h1>
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
              <h3 class="card-title font-weight-bold">Form Approved</h3>
              <div class="card-tools">
              </div>
            </div>
            <!-- /.card-header -->

            <form action="<?= base_url('head/approved/') . $send['basic_id']; ?>" method="POST">
              <input type="hidden" name="basic_id" id="basic_id" value="<?= $send['basic_id'] ?>">
              <div class="card-body">
                <div class="row">
                  <div class="form-row col-lg-12">
                    <div class="form-group col-lg">
                      <div class="alert alert-danger text-center font-weight-bold" role="alert">
                        Apakah anda yakin approve data ? <br> Jika iya data akan dikirim ke admin.
                        Dan data ini akan hilang dari table.
                      </div>
                    </div>
                  </div>
                  <div class="form-row col-lg-12">

                    <div class="form-group col-lg">


                    </div>
                  </div>
                  <div class="form-row col-lg-12">
                    <div class="form-group col-lg">
                      <button type="submit" class="form-control btn btn-warning font-weight-bold"><i
                          class="fas fa-paper-plane"></i>
                        <input type="hidden" name="confirm" value="Approved">
                        Approve</button>
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