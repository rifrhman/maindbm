<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="font-weight-bold text-secondary text-uppercase">Data Kandidat Lulus</h1>
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
              <table id="example" class="table table-bordered table-dark table-striped ">
                <thead class="text-center">
                  <tr>

                    <th>Kandidat</th>
                    <th>Info</th>
                    <th>Draft</th>
                    <th>Klien</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($candidate as $can) : ?>
                  <tr>
                    <td class="text-center"><img
                        src="<?= base_url('assets/uploads/image/candidate-image/') . $can['image'] ?>"
                        width="120px auto"><br>
                      <?= $can['fullname'] ?>
                    </td>
                    <td>
                      <span>Nomor Induk Kandidat </span>
                      <br>
                      <span>Pendidikan Terakhir </span>
                      <br>
                      <span>Tanggal Lahir </span>
                      <br>
                      <span>Domisili </span>
                      <br>
                      <span>Test Terakhir </span>
                      <br>
                      <span>Status Test</span>
                      <br>
                      <span>Psikogram </span>
                      <br>
                      <span>Interview </span>
                      <br>
                      <span>Pengalaman (bln) </span>
                    </td>
                    <td>
                      <span>: <?= $can['regis_num_candidate'] ?></span>
                      <br>
                      <span>: <?= $can['last_education'] ?></span>
                      <br>
                      <span>: <?= date('d-M-Y', strtotime($can['date_of_birth']))  ?></span>
                      <br>
                      <span>: <?= $can['domicile'] ?></span>
                      <br>
                      <?php if (isset($can['test_one']) && isset($can['test_two'])) : ?>
                      : <?= date('d-M-Y', strtotime($can['test_two'])) ?>
                      <?php elseif (isset($can['test_one']) && isset($can['test_two']) && isset($can['test_three'])) : ?>
                      : <?= date('d-M-Y', strtotime($can['test_three'])) ?>
                      <?php else : ?>
                      : <?= date('d-M-Y', strtotime($can['test_one'])) ?>
                      <?php endif; ?>
                      <br>
                      <span>: <?= $can['status_test'] ?></span>
                      <br>
                      <?php if (isset($can['psikogram'])) : ?>
                      : <a href="<?= base_url('assets/uploads/psikogram/') . $can['psikogram'] ?>" target="_blank">Cek
                        Disini...</a>
                      </a>
                      <?php else : ?>
                      : <span class="text-danger">Belum di Upload</span>
                      <?php endif; ?>
                      <br>
                      <?php if (isset($can['interview'])) : ?>
                      : <a href="<?= base_url('assets/uploads/interview/') . $can['interview'] ?>" target="_blank">Cek
                        Disini...</a>
                      </a>
                      <?php else : ?>
                      : <span class="text-danger">Belum di Upload</span>
                      <?php endif; ?>

                      <br>
                      <?php foreach ($exp as $ex) : ?>
                      <?php if ($ex['id_candidate'] == $can['id_candidate']) : ?>
                      <span><?= $ex['position']; ?> (<?= $ex['month_period'] ?>), </span>
                      <?php endif; ?>
                      <?php endforeach; ?>

                    </td>
                    <td>
                      <?php foreach ($send as $s) : ?>
                      <?php if ($s['id_candidate'] == $can['id_candidate']) { ?>

                      <?php if ($s['result_send'] == 'Sedang Dikirim') { ?>

                      <a href="<?= base_url('graduated/update_status/') . $s['id'] ?>">
                        <span class="text-light"><?= $s['client'] ?></span>
                        <span class="badge badge-pill badge-secondary"><?= $s['result_send'] ?></span>
                      </a>
                      <br>
                      <?php } ?>
                      <?php if ($s['result_send'] == 'Lulus') { ?>
                      <a href="<?= base_url('graduated/contract_form/') . $s['id'] ?>">
                        <span class="text-light"><?= $s['client'] ?></span>
                        <span class="badge badge-pill badge-success"><?= $s['result_send'] ?></span>
                      </a>
                      <br>
                      <?php } ?>
                      <?php if ($s['result_send'] == 'Tidak Lulus') { ?>

                      <span class="text-light"><?= $s['client'] ?></span>
                      <span class="badge badge-pill badge-danger"><?= $s['result_send'] ?></span>
                      <br>

                      <?php } ?>
                      <?php } ?>
                      <?php endforeach; ?>
                    </td>




                    <td class="text-center">
                      <a href="<?= base_url('graduated/detailgraduatecandidate/') . $can['id_candidate'] ?>"
                        class="badge badge-danger  mb-2"><i class="fas fa-fw fa-info"></i> Detail</a>
                      <br>
                      <a href="<?= base_url('pdfgen/resumesingle/') . $can['id_candidate'] ?>"
                        class="badge badge-warning  mb-2" target="_blank"><i class="fas fa-fw fa-file-pdf"></i>
                        Resume-User</a>
                      <br>
                      <a href="<?= base_url('graduated/addsend_candidate/') . $can['id_candidate'] ?>"
                        class="badge badge-info mb-2"><i class="fas fa-fw fa-paper-plane"></i>
                        Kirim Kandidat</a>

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