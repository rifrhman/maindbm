<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm">
          <h1>Detail Pendidikan</h1>
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
              <h3 class="card-title">Table List Pendidikan</h3>

            </div>

            <div class="card-body">

              <table class="table table-bordered table-hover ">
                <thead class="text-center bg-navy">
                  <tr>
                    <th>Tingkatan</th>
                    <th>Institut</th>
                    <th>Jurusan</th>
                    <th>Tahun Masuk</th>
                    <th>Tahun Keluar</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php foreach ($educate as $e) : ?>

                  <tr class="text-center">
                    <td><?= $e['degree'] ?></td>
                    <td><?= $e['institute'] ?></td>
                    <td><?= $e['major'] ?></td>
                    <td><?= $e['year_in_edu'] ?></td>
                    <td><?= $e['year_out_edu'] ?></td>
                    <td>
                      <a class="btn bg-primary btn-sm" href="javascript:void(0)" title="Edit"
                        onclick=edit_education("<?= $e['id_education'] ?>")><i class=" fas fa-fw fa-pen"></i> Update</a>

                      <a class="btn bg-maroon btn-sm" href="javascript:void(0)" title="Edit"
                        onclick=del_education("<?= $e['id_education'] ?>")><i class=" fas fa-fw fa-trash"></i>
                        Delete</a>


                    </td>
                  </tr>

                  <?php endforeach; ?>

                </tbody>
              </table>
            </div>


            <!-- Modal -->
            <!-- Bootstrap modal -->
            <div class="modal fade" id="modal_form" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title">Update Form</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body form">
                    <form action="#" id="form" class="form-horizontal">
                      <input type="hidden" value="" name="id_education" />
                      <input type="hidden" value="" name="basic_id" />
                      <div class="form-body">
                        <div class="form-group">
                          <label class="">Tingkatan</label>

                          <select name="degree" class="form-control">
                            <option value="SMK">SMK</option>
                            <option value="SMA">SMA</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="D4">D4</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                          </select>
                          <span class="help-block"></span>

                        </div>
                        <div class="form-group">
                          <label class="">Institute</label>

                          <input name="institute" class="form-control" type="text">
                          <span class="help-block"></span>

                        </div>
                        <div class="row">
                          <div class="col form-group">
                            <label class="">Jurusan</label>

                            <input name="major" class="form-control" type="text">
                            <span class="help-block"></span>

                          </div>
                          <div class="col form-group">
                            <label class="">Kota/Kabupaten Institut</label>

                            <input name="city" class="form-control" type="text">
                            <span class="help-block"></span>

                          </div>
                        </div>

                        <div class="form-group">
                          <label class="">IPK/Nilai</label>

                          <input name="score" class="form-control" type="text">
                          <span class="help-block"></span>

                        </div>

                        <div class="row">

                          <div class="col form-group">
                            <label class="">Tahun Masuk</label>

                            <input name="year_in_edu" class="form-control" type="text">
                            <span class="help-block"></span>

                          </div>
                          <div class="col form-group">
                            <label class="">Tahun Keluar</label>

                            <input name="year_out_edu" class="form-control" type="text">
                            <span class="help-block"></span>

                          </div>
                        </div>

                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="button" id="btnSaveEdit" onclick="save_edit()" class="btn btn-primary">Save</button>
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