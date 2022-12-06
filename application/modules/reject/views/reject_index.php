<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm mb-2 mt-2">
          <h1 class="font-weight-bold text-secondary text-center text-uppercase">Reject Kandidat</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <?= $this->session->flashdata('msg'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <!-- <span class="badge badge-danger"><?= $count_stat; ?> Kandidat</span>
              Belum dinilai -->
            </div>

            <div class="card-body">
              <table id="reject" class="table table-bordered table-dark table-striped text-center">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>No. Induk Kandidat</th>
                    <th>Nama</th>
                    <th>Keterangan Reject</th>
                  </tr>
                </thead>
                <tbody>

                  <?php $no = 1;
                  foreach ($rejects as $re) : ?>

                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $re['regis_num_candidate'] ?></td>
                    <td><?= $re['fullname'] ?></td>
                    <td><?= $re['desc_reject'] ?></td>
                  </tr>

                  <?php endforeach; ?>



                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->