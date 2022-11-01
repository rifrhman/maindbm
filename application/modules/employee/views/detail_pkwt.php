<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm">
          <h1>Detail PKWT <?= $list['fullname'] ?></h1>
        </div>
        <!-- <button type="button" class="btn btn-dark mr-2 btn-sm" data-toggle="modal" data-target="#infoemp">
          <i class="fas fa-fw fa-user-edit"></i> Tambah/Edit Info Karyawan
        </button>
        <button type="button" class="btn btn-dark mr-2 btn-sm" data-toggle="modal" data-target="#allow">
          <i class="fas fa-money-check-alt"></i> Tambah/Edit Bank dan Data
        </button>
        <button type="button" class="btn btn-dark justify-content-end btn-sm" data-toggle="modal"
          data-target="#emergency">
          <i class="fas fa-fw fa-exclamation-triangle"></i> Tambah Kontak Darurat
        </button> -->

      </div>
    </div><!-- /.container-fluid -->
  </section>


  <div class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Table History PKWT</h3>

            </div>

            <div class="card-body">

              <table class="table table-bordered table-hover ">
                <thead class="text-center">
                  <tr>
                    <th>No</th>
                    <th>Nomor PKWT</th>
                    <th>Tanggal PKWT</th>
                    <th>Tanggal Awal PKWT</th>
                    <th>Tanggal Akhir PKWT</th>
                    <th>Status PKWT</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($pkwt_add as $pk_add) : ?>
                  <tr data-widget="expandable-table" aria-expanded="false">
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="text-center"><?= $pk_add['pkwt_number'] ?></td>
                    <td class="text-center"><?= $pk_add['date_pkwt'] ?></td>
                    <td class="text-center"><?= $pk_add['start_of_contract'] ?></td>
                    <td class="text-center"><?= $pk_add['end_of_contract'] ?></td>
                    <td class="text-center">
                      <?php if ($pk_add['status_pkwt'] == 'Belum Dibalas' || $pk_add['status_pkwt'] == 'Belum Dibuat') { ?>
                      <a href="<?= $pk_add['id'] ?>" class="badge badge-danger justify-content-end" data-toggle="modal"
                        data-target="#updateStatus">
                        <i class="fas fa-fw fa-exclamation-triangle"></i> <?= $pk_add['status_pkwt'] ?>
                      </a>


                      <!-- Modal -->
                      <div class="modal fade" id="updateStatus" data-backdrop="static" data-keyboard="false"
                        tabindex="-1" aria-labelledby="updateStatusLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="updateStatusLabel">Form updateStatus <?= $list['fullname'] ?>
                              </h5>

                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>

                            <form action="<?= base_url('employee/update_status_file/') . $pk_add['id'] ?>"
                              method="POST">
                              <div class="modal-body">
                                <div class="card-body">
                                  <input type="hidden" name="id" id="id" value="<?= $pk_add['id'] ?>">
                                  <div class="form-group">
                                    <label for="status_pkwt">Status Berkas</label>

                                    <select id="inputState" name="status_pkwt" class="form-control">
                                      <option selected="selected" value="">
                                        <?= $pk_add['status_pkwt'] ?>
                                      </option>
                                      <option value="Belum Dibalas">Belum Dibalas</option>
                                      <option value="Belum Dibuat">Belum Dibuat</option>
                                      <option value="Belum Kembali">Belum Kembali</option>
                                      <option value="Selesai">Selesai</option>

                                    </select>
                                    <?= form_error('status_pkwt', '<small class="text-danger pl-2">', '</small>') ?>

                                  </div>


                                </div>

                              </div>
                              <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                              </div>
                            </form>

                          </div>
                        </div>
                      </div>

                      <br>
                      <?php } ?>
                      <?php if ($pk_add['status_pkwt'] == 'Belum Kembali') { ?>
                      <a href="<?= $pk_add['id'] ?>" class="badge badge-warning justify-content-end" data-toggle="modal"
                        data-target="#updateData">
                        <i class="fas fa-fw fa-info-circle"></i> <?= $pk_add['status_pkwt'] ?>
                      </a>

                      <!-- Modal -->
                      <div class="modal fade" id="updateData" data-backdrop="static" data-keyboard="false" tabindex="-1"
                        aria-labelledby="updateDataLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="updateDataLabel">Form updateStatus <?= $list['fullname'] ?>
                              </h5>

                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>

                            <form action="<?= base_url('employee/update_status_file/') . $pk_add['id'] ?>"
                              method="POST">
                              <div class="modal-body">
                                <div class="card-body">
                                  <input type="hidden" name="id" id="id" value="<?= $pk_add['id'] ?>">
                                  <div class="form-group">
                                    <label for="status_pkwt">Status Berkas</label>

                                    <select id="inputState" name="status_pkwt" class="form-control">
                                      <option selected="selected" value="">
                                        <?= $pk_add['status_pkwt'] ?>
                                      </option>
                                      <option value="Belum Dibalas">Belum Dibalas</option>
                                      <option value="Belum Dibuat">Belum Dibuat</option>
                                      <option value="Belum Kembali">Belum Kembali</option>
                                      <option value="Selesai">Selesai</option>

                                    </select>
                                    <?= form_error('status_pkwt', '<small class="text-danger pl-2">', '</small>') ?>

                                  </div>


                                </div>

                              </div>
                              <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                              </div>
                            </form>

                          </div>
                        </div>
                      </div>

                      <br>
                      <?php } ?>
                      <?php if ($pk_add['status_pkwt'] == 'Selesai') { ?>
                      <a class="badge badge-primary justify-content-end">
                        <i class="fas fa-fw fa-check-circle"></i> <?= $pk_add['status_pkwt'] ?>
                      </a>
                      <br>

                      <?php } ?>
                    </td>
                  </tr>
                  <tr class="expandable-body">
                    <td colspan="5">
                      <p>
                        <?= $pk_add['desc_pkwt'] ?>
                      </p>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>

          </div>

        </div>

      </div>
    </div>
  </div>
</div>