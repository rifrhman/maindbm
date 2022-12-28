<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm mb-2 mt-2">
          <h1 class="font-weight-bold text-secondary text-center text-uppercase">Data Kandidat Lulus</h1>
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
              <table id="example2" class="table table-bordered table-dark table-striped ">
                <thead class="text-center">
                  <tr>
                    <th>Kandidat</th>
                    <th width="100">Info</th>
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
                      : <a href="<?= base_url('assets/uploads/psikogram/') . $can['psikogram'] ?>" target="_blank"
                        class="badge badge-info">Psikogram 1</a>,
                      <?php else : ?>
                      : <span class="text-danger">Belum di Upload</span>
                      <?php endif; ?>
                      <?php if (isset($can['psikogram_two'])) : ?>
                      <a href="<?= base_url('assets/uploads/psikogram/') . $can['psikogram_two'] ?>" target="_blank"
                        class="badge badge-primary">Psikogram 2</a>,
                      <?php else : ?>
                      <span class="text-danger">Belum di Upload</span>
                      <?php endif; ?>
                      <?php if (isset($can['psikogram_three'])) : ?>
                      <a href="<?= base_url('assets/uploads/psikogram/') . $can['psikogram_three'] ?>" target="_blank"
                        class="badge bg-olive">Psikogram 3</a>,
                      <?php else : ?>
                      <span class="text-danger">Belum di Upload</span>
                      <?php endif; ?>
                      <br>
                      <?php if (isset($can['interview'])) : ?>
                      : <a href="<?= base_url('assets/uploads/interview/') . $can['interview'] ?>" target="_blank"
                        class="badge bg-maroon">Cek
                        Disini</a>
                      </a>
                      <?php else : ?>
                      : <span class="text-danger">Belum di Upload</span>
                      <?php endif; ?>

                      <br>
                      <?php foreach ($exp as $ex) : ?>
                      <?php if ($ex['id_candidate'] == $can['id_candidate']) : ?>
                      <span><?= $ex['position_exp']; ?> (<?= $ex['month_period'] ?>), </span>
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
                      <?php if ($this->session->userdata('level_id') == 2) { ?>
                      <a href="#">
                        <span class="text-light"><?= $s['client'] ?></span>
                        <span class="badge badge-pill badge-success"><?= $s['result_send'] ?></span>
                      </a>
                      <br>
                      <?php } ?>
                      <?php if ($this->session->userdata('level_id') == 3) { ?>
                      <a href="<?= base_url('graduated/contract_form/') . $s['id'] ?>">
                        <span class="text-light"><?= $s['client'] ?></span>
                        <span class="badge badge-pill badge-success"><?= $s['result_send'] ?></span>
                      </a>
                      <br>
                      <?php } ?>
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
                      <?php if ($users['level_id'] != 3) : ?>

                      <?php else : ?>
                      <br>
                      <a href="<?= base_url('graduated/addsend_candidate/') . $can['id_candidate'] ?>"
                        class="badge badge-info mb-2"><i class="fas fa-fw fa-paper-plane"></i>
                        Kirim Kandidat</a>
                      <?php endif; ?>
                      <br>
                      <a href="<?= base_url('graduated/add_psikogram_many/') . $can['id_candidate'] ?>"
                        class="badge badge-primary mb-2">
                        <i class="fas fa-fw fa-upload"></i>
                        Tambah Psikogram
                      </a> <br>
                      <?php if ($this->session->userdata('level_id') != 3) : ?>
                      <?php else : ?>
                      <a href="<?= base_url('graduated/reject_data/') . $can['id_candidate'] ?>"
                        class="badge bg-maroon mb-2">
                        <i class="fas fa-fw fa-times"></i>
                        Reject
                      </a>
                      <?php endif ?>

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



<div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title"></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="basic_id" />
          <input type="hidden" value="" name="id" />
          <div class="form-body">

            <div class="form-group">
              <label for="exampleInputEmail1">Nomor PKWT</label>
              <input type="text" class="form-control" name="pkwt_number" value="">

            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Tanggal PKWT</label>
              <input type="date" class="form-control" name="date_pkwt" value="">

            </div>
            <div class="row">
              <div class="col form-group">
                <label for="exampleInputEmail1">Tanggal Kontrak Awal PKWT</label>
                <input type="date" class="form-control" name="start_of_contract" value="">

              </div>
              <div class="col form-group">
                <label for="exampleInputEmail1">Tanggal Kontrak Akhir PKWT</label>
                <input type="date" class="form-control" name="end_of_contract" value="">

              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Status PKWT</label>
              <div class="col-md">
                <select name="status_pkwt" class="form-control">
                  <option value="">--Select Status--</option>
                  <option value="Belum Dibalas">Belum Dibalas</option>
                  <option value="Belum Dibuat">Belum Dibuat</option>
                  <option value="Belum Kembali">Belum Kembali</option>
                  <option value="Selesai">Selesai</option>
                </select>
                <span class="help-block"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Description</label>
              <div class="col-md">
                <textarea name="desc_pkwt" placeholder="Description" class="form-control"></textarea>
                <span class="help-block"></span>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->