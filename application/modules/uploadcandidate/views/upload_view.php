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

            <div class="card-body">
              <table id="example" class="table table-bordered table-striped table-responsive-lg text-center">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Foto Kandidat</th>
                    <th>Jadwal Test Terakhir</th>
                    <th>Psikogram</th>
                    <th>Interview</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($candidate as $can) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $can['fullname'] ?></td>
                    <td>
                      <?php if ($can['image'] != null) : ?>
                      <div class="img-fluid">
                        <img src="<?= base_url('assets/uploads/image/candidate-image/') . $can['image'] ?>" alt=""
                          width="70px">
                      </div>
                      <?php endif; ?>
                    </td>
                    <?php if (isset($can['test_one']) && isset($can['test_two'])) : ?>
                    <td><?= $can['test_two'] ?></td>
                    <?php elseif (isset($can['test_one']) && isset($can['test_two']) && isset($can['test_three'])) : ?>
                    <td><?= $can['test_three'] ?></td>
                    <?php else : ?>
                    <td><?= $can['test_one'] ?></td>
                    <?php endif; ?>
                    <td>
                      <?php if (isset($can['psikogram'])) : ?>
                      <a class="btn btn-primary btn-sm"
                        href="<?= base_url('assets/uploads/psikogram/') . $can['psikogram'] ?>" target="_blank">
                        <i class="fas fa-fw fa-file-upload"></i>
                      </a>
                      <?php else : ?>
                      <p class="text-danger font-weight-bold">Belum di Upload</p>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if (isset($can['interview'])) : ?>
                      <a class="btn btn-primary btn-sm"
                        href="<?= base_url('assets/uploads/interview/') . $can['interview'] ?>" target="_blank">
                        <i class="fas fa-fw fa-file-pdf"></i>
                      </a>
                      <?php else : ?>
                      <p class="text-danger font-weight-bold">Belum di Upload</p>
                      <?php endif; ?>
                    </td>

                    <td>
                      <a href="<?= base_url('uploadcandidate/add_image/') . $can['id_candidate']; ?>"
                        class="badge badge-warning btn-sm"><i class="fas fa-fw fa-camera-retro"></i> Foto</a>
                      <a href="<?= base_url('uploadcandidate/add_psikogram/') . $can['id_candidate']; ?>"
                        class="badge badge-info btn-sm"><i class="fas fa-fw fa-file-upload"></i> Psikogram</a>
                      <a href="<?= base_url('uploadcandidate/add_interview/') . $can['id_candidate']; ?>"
                        class="badge badge-danger btn-sm"><i class="fas fa-fw fa-file-pdf"></i> Interview</a>
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