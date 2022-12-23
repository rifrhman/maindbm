<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm">
          <h1>Detail Pengalaman</h1>
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

  <?= $this->session->flashdata('msg') ?>



  <div class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Table List Pengalaman</h3>

            </div>

            <div class="card-body">

              <table class="table table-bordered table-hover ">
                <thead class="text-center bg-navy">
                  <tr>
                    <th>Perusahaan</th>
                    <th>Posisi/Jabatan</th>
                    <th>Tahun Masuk</th>
                    <th>Lama (Bulan)</th>
                    <th>Gaji Terakhir</th>
                    <th>Alasan Keluar</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php foreach ($expert as $e) : ?>

                  <tr class="text-center">
                    <td><?= $e['company'] ?></td>
                    <td><?= $e['position_exp'] ?></td>
                    <td><?= $e['year_in_exp'] ?></td>
                    <td><?= $e['month_period'] ?></td>
                    <td><?= $e['last_salary'] ?></td>
                    <td><?= $e['resign'] ?></td>
                    <td>
                      <a class="btn bg-primary btn-sm mt-1 mb-1" href="javascript:void(0)" title="Edit"
                        onclick=edit_exp("<?= $e['id_exp'] ?>")><i class=" fas fa-fw fa-pen"></i> Update</a>

                      <a class="btn bg-maroon btn-sm mt-1 mb-1" href="javascript:void(0)" title="Hapus"
                        onclick=del_exp("<?= $e['id_exp'] ?>")><i class=" fas fa-fw fa-trash"></i>
                        Delete</a>


                    </td>
                  </tr>

                  <?php endforeach; ?>

                </tbody>
              </table>
            </div>


            <!-- Modal -->
            <!-- Bootstrap modal -->
            <div class="modal fade" id="modal_form_exp" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title-exp">Update Form</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body form_exp">
                    <form action="#" id="form_exp" class="form-horizontal">
                      <input type="hidden" value="" name="id_exp" />
                      <input type="hidden" value="" name="basic_id" />
                      <div class="form-body">
                        <div class="form-group">
                          <label class="">Perusahaan</label>
                          <input name="company" class="form-control" type="text">
                          <span class="help-block"></span>

                          <span class="help-block"></span>

                        </div>
                        <div class="form-group">
                          <label class="">Posisi</label>

                          <input name="position_exp" class="form-control" type="text">
                          <span class="help-block"></span>

                        </div>
                        <div class="row">
                          <div class="col form-group">
                            <label class="">Tahun Masuk</label>

                            <input name="year_in_exp" class="form-control" type="date">
                            <span class="help-block"></span>

                          </div>
                          <div class="col form-group">
                            <label class="">Lama (Bulan)</label>

                            <input name="month_period" class="form-control" type="number">
                            <span class="help-block"></span>

                          </div>
                        </div>

                        <div class="form-group">
                          <label class="">Gaji Terakhir</label>

                          <input name="last_salary" class="form-control" type="number">
                          <span class="help-block"></span>

                        </div>

                        <div class="form-group">
                          <label class="">Alasan Resign</label>

                          <input name="resign" class="form-control" type="text">
                          <span class="help-block"></span>

                        </div>

                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="button" id="btnSaveEditExp" onclick="save_edit_exp()"
                      class="btn btn-primary">Save</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- End Bootstrap modal -->

          </div>
        </div>
      </div>
    </div>
  </div>



</div>