<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Reject Kandidat <?= $all['fullname']; ?></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="content">
    <div class="container-fluid">
      <?= $this->session->flashdata('msg'); ?>
      <div class="row">
        <div class="col-md">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title font-weight-bold">Reject Kandidat</h3>
              <div class="card-tools">
              </div>
            </div>
            <!-- /.card-header -->

            <form action="<?= base_url('graduated/reject_data/') . $all['id_candidate']; ?>" method="POST">
              <input type="hidden" name="<?= $all['id_candidate'] ?>" value="<?= $all['id_candidate'] ?>" id="">
              <div class="card-body">
                <div class="row">
                  <div class="form-row col-lg-12">
                    <div class="form-group col-md">
                      <label for="fullname">Nama</label>
                      <input type="text" name="fullname" class="form-control" id="fullname"
                        value="<?= $all['fullname'] ?>" readonly>
                      <?= form_error('fullname', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md">
                      <label for="desc_reject">Keterangan Reject</label>
                      <textarea name="desc_reject" id="desc_reject" placeholder="Sudah Bekerja..." class="form-control"
                        cols="30" rows="3"><?= $all['desc_reject'] ?></textarea>
                      <?= form_error('desc_reject', '<small class="text-danger">', '</small>') ?>
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
                          class="fas fa-fw fa-user-times"></i>
                        Reject Data</button>
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