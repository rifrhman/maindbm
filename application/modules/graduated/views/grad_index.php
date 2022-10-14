<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Kandidat Lulus</h1>
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
              <table id="example" class="table table-bordered table-striped ">
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
                      <span>Nomor Induk Kandidat : </span>
                      <br>
                      <span>Pendidikan Terakhir : </span>
                      <br>
                      <span>Tanggal Lahir : </span>
                      <br>
                      <span>Domisili : </span>
                      <br>
                      <span>Test Terakhir : </span>
                      <br>
                      <span>Psikogram : </span>
                      <br>
                      <span>Interview : </span>
                      <br>
                      <span>Pengalaman (bln) : </span>
                    </td>
                    <td>
                      <span><?= $can['regis_num_candidate'] ?></span>
                      <br>
                      <span><?= $can['last_education'] ?></span>
                      <br>
                      <span><?= date('d-M-Y', strtotime($can['date_of_birth']))  ?></span>
                      <br>
                      <span><?= $can['domicile'] ?></span>
                      <br>
                      <?php if (isset($can['test_one']) && isset($can['test_two'])) : ?>
                      <?= date('d-M-Y', strtotime($can['test_two'])) ?>
                      <?php elseif (isset($can['test_one']) && isset($can['test_two']) && isset($can['test_three'])) : ?>
                      <?= date('d-M-Y', strtotime($can['test_three'])) ?>
                      <?php else : ?>
                      <?= date('d-M-Y', strtotime($can['test_one'])) ?>
                      <?php endif; ?>
                      <br>
                      <?php if (isset($can['psikogram'])) : ?>
                      <a href="<?= base_url('assets/uploads/psikogram/') . $can['psikogram'] ?>">Cek Disini...</a>
                      </a>
                      <?php else : ?>
                      <span class="text-danger">Belum di Upload</span>
                      <?php endif; ?>
                      <br>
                      <?php if (isset($can['interview'])) : ?>
                      <a href="<?= base_url('assets/uploads/interview/') . $can['interview'] ?>">Cek Disini...</a>
                      </a>
                      <?php else : ?>
                      <span class="text-danger">Belum di Upload</span>
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

                      <span class="text-dark"><?= $s['client'] ?></span>
                      <span class="badge badge-pill badge-secondary"><?= $s['result_send'] ?></span>
                      <br>
                      <?php } ?>
                      <?php if ($s['result_send'] == 'Lolos') { ?>

                      <span class="text-dark"><?= $s['client'] ?></span>
                      <span class="badge badge-pill badge-success"><?= $s['result_send'] ?></span>
                      <br>
                      <?php } ?>
                      <?php if ($s['result_send'] == 'Tidak Lolos') { ?>

                      <span class="text-dark"><?= $s['client'] ?></span>
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
                        class="badge badge-info"><i class="fas fa-fw fa-paper-plane"></i>
                        Kirim Kandidat</a>

                      <a href="<?= base_url('graduated/editStatusCandidateSend/') . $candi['basic_id'] ?>"
                        class="badge badge-dark" data-toggle="modal" data-target="#exampleModal"><i
                          class="fas fa-fw fa-paper-plane"></i>
                        Update Hasil</a>
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

<!-- Vertically centered modal -->
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Hasil Dikirim</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('graduated/editStatusCandidateSend/') . $candi['basic_id']; ?>" method="POST">
        <div class="modal-body">
          <input type="hidden" name="basic_id" id="basic_id" value="<?= $candi['basic_id'] ?>">
          <div class="form-row col-lg-12">
            <div class="form-group col-lg">
              <label for="result_send">Hasil</label>
              <select id="result_send" name="result_send" class="form-control">
                <option selected="selected" disabled="disabled">
                  Choose...
                </option>
                <option value="Lolos">Lolos</option>
                <option value="Tidak Lolos">Tidak Lolos</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

      </form>


    </div>
  </div>
</div>