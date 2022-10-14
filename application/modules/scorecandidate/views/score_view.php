<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Penilaian Kandidat</h1>
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
              <span class="badge badge-danger"><?= $count_stat; ?> Kandidat</span>
              Belum dinilai
            </div>

            <div class="card-body">
              <table id="example" class="table table-bordered table-striped text-center">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Pendidikan</th>
                    <th>Test Terakhir</th>
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

                    <?php if (isset($can['test_one']) && isset($can['test_two'])) : ?>
                    <td><?= date('d-M-Y', strtotime($can['test_two'])) ?></td>
                    <?php elseif (isset($can['test_one']) && isset($can['test_two']) && isset($can['test_three'])) : ?>
                    <td><?= date('d-M-Y', strtotime($can['test_three'])) ?></td>
                    <?php else : ?>
                    <td><?= date('d-M-Y', strtotime($can['test_one'])) ?></td>
                    <?php endif; ?>


                    <?php if ($can['status_test'] == 'Lulus') : ?>
                    <td>
                      <span class="badge badge-pill badge-success">Lulus</span>
                    </td>
                    <?php elseif ($can['status_test'] == 'Tidak Lulus') : ?>
                    <td>
                      <span class="badge badge-pill badge-danger">Tidak Lulus</span>
                    </td>
                    <?php elseif ($can['status_test'] == 'Referensi') : ?>
                    <td>
                      <span class="badge badge-pill badge-info">Referensi</span>
                    </td>
                    <?php elseif ($can['status_test'] == 'Tidak Hadir') : ?>
                    <td>
                      <span class="badge badge-pill badge-warning">Tidak Hadir</span>
                    </td>
                    <?php else : ?>
                    <td>

                    </td>
                    <?php endif; ?>
                    <td>
                      <a href="<?= base_url('scorecandidate/score_candidate/') . $can['id_candidate']; ?>"
                        class="badge badge-info btn-sm"><i class="fas fa-fw fa-pen"></i> Nilai</a><br>
                      <a href="<?= base_url('scorecandidate/update_test/') . $can['id_candidate']; ?>"
                        class="badge badge-info btn-sm"><i class="fas fa-fw fa-calendar-alt"></i> Update Jadwal</a>
                      <a href="<?= base_url('scorecandidate/editStatus/') . $can['id_candidate']; ?>"
                        class="badge badge-info btn-sm"><i class="fas fa-fw fa-user-edit"></i> Edit Status</a>
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