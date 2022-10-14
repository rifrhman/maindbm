<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Data Pengalaman Kandidat</h1>
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
            <div class="card-body">
              <table id="example" class="table table-bordered table-striped text-center">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Pendidikan</th>
                    <th>Status Test</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($candidate as $can) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $can['fullname'] ?></td>
                    <td><?= $can['domicile'] ?></td>
                    <td><?= $can['last_education'] ?></td>
                    <td><?= $can['status_test'] ?></td>
                    <td>
                      <a href="<?= base_url('experience/add_exp/') . $can['id_candidate']; ?>"
                        class="btn btn-info btn-sm"><i class="fab fa-fw fa-black-tie"></i> Tambah Data
                        Pengalaman</a>
                    </td>
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