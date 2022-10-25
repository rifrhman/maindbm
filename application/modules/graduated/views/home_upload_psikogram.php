<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Psikogram Kandidat</h1>
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
              <h3 class="card-title font-weight-bold">Data Psikogram Kandidat</h3>
              <div class="card-tools">
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row justify-content-center">
                <div class="pl-4 ml-2">
                  <a href="<?= base_url('graduated/psikogram_one/') . $basic['id_candidate'] ?>"
                    class="btn bg-olive">Psikogram
                    Satu</a>
                </div>
                <div class="pl-4 ml-2">
                  <a href="<?= base_url('graduated/psikogram_two/') . $basic['id_candidate'] ?>"
                    class="btn bg-cyan">Psikogram Dua</a>

                </div>
                <div class="pl-4 ml-2">
                  <a href="<?= base_url('graduated/psikogram_three/') . $basic['id_candidate'] ?>"
                    class="btn bg-orange">Psikogram Tiga</a>

                </div>
              </div>

              <div class="row justify-content-end">
                <a href="<?= base_url('graduated') ?>" class="btn btn-warning"><i class="fas fa-fw fa-undo"></i>
                  Kembali</a>
              </div>

            </div>


            <!-- /.card -->
          </div>
        </div>
      </div>
    </div>
  </div>


</div>