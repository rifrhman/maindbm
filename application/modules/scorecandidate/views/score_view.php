<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm mb-2 mt-2">
          <h1 style="font-weight: bold; color: #6B728E;" class="text-uppercase text-center font-italic">Penilaian
            Kandidat</h1>
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
              Belum Di Nilai
            </div>


            <style>
            table th {
              font-size: 14px;
            }

            table tbody {
              font-size: 14px;
            }
            </style>

            <div class="card-body">
              <table id="examscore" class="table table-bordered table-dark table-striped text-center">
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
                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

        <!-- Bootstrap modal -->
        <div class="modal fade" id="modal_nilai" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title font-weight-bold"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body form_nilai">
                <form action="#" id="form_nilai" class="form-horizontal">
                  <!-- <input type="hidden" value="" name="basic_id" /> -->
                  <input type="hidden" value="" name="basic_id" />
                  <input type="hidden" value="" name="id" />

                  <div class="form-body">

                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-6">
                          <label for="regis_num_candidate">Nomor Induk Kandidat</label>
                          <input type="text" name="regis_num_candidate" placeholder="Ex : MP001" class="form-control">
                        </div>
                        <div class="col-lg-6">
                          <label for="regis_num_resident">Nomor KTP</label>
                          <input type="text" name="regis_num_resident" placeholder="Ex: 3201120086..."
                            class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">

                      <label for="email">Email</label>
                      <input type="text" placeholder="john@gmail.com" name="email" class="form-control">

                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-6">
                          <label for="marital_status">Status Perkawinan</label>
                          <select class="form-control" id="marital_status" name="marital_status">
                            <option selected="selected" disabled="disabled">Choose...</option>
                            <option value="SG">SG</option>
                            <option value="M0">M0</option>
                            <option value="M1">M1</option>
                            <option value="M2">M2</option>
                            <option value="M3">M3</option>
                            <option value="M4">M4</option>
                            <option value="M5">M5</option>
                          </select>
                        </div>
                        <div class="col-lg-6">
                          <label for="religion">Agama</label>
                          <select class="form-control" id="religion" name="religion">
                            <option selected="selected" disabled="disabled">Choose...</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katholik">Katholik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-4">
                          <label for="tall">Tinggi</label>
                          <input type="text" placeholder="Ex: 175" name="tall" class="form-control">
                        </div>
                        <div class="col-lg-4">
                          <label for="weight">Berat Badan</label>
                          <input type="text" placeholder="Ex: 56" name="weight" class="form-control">
                        </div>
                        <div class="col-lg-4">
                          <label for="postal_code">Kode Pos</label>
                          <input type="text" name="postal_code" placeholder="Ex: 12310" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-6">
                          <label for="certificate">Sertifikat Tambahan <span>*Opsional</span></label>
                          <input type="text" name="certificate" class="form-control">
                        </div>
                        <div class="col-lg-6">
                          <label for="validity_period">Masa Berlaku Sertifikat</label>
                          <input type="text" name="validity_period" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="status_test">Status Test / Hasil Test</label>
                      <select id="status_test" name="status_test" class="form-control is-warning">
                        <option selected="selected" disabled="disabled">Choose...</option>
                        <option value="Lulus">Lulus</option>
                        <option value="Referensi">Referensi</option>
                        <option value="Tidak Lulus">Tidak Lulus</option>
                        <option value="Tidak Hadir">Tidak Hadir</option>
                      </select>
                    </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" id="btnSaveNilai" onclick="save_nilai()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- End Bootstrap modal -->


      </div>
      <!-- /.row -->




    </div>
    <!-- /.container-fluid -->

    <!-- Bootstrap modal -->
    <div class="modal fade" id="modal_test" role="dialog" data-backdrop="static" data-keyboard="false" tabindex="-1"
      aria-labelledby="testLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title-test font-weight-bold"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body form_test">
            <form action="#" id="form_test" class="form-horizontal">
              <!-- <input type="hidden" value="" name="basic_id" /> -->
              <input type="hidden" value="" name="id_candidate" />
              <!-- <input type="hidden" value="" name="id" /> -->

              <div class="form-group">

                <label for="test_one">Test Satu</label>
                <input type="date" value="" name="test_one" class="form-control" readonly>

              </div>

              <div class="form-body">

                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-6">
                      <label for="test_two">Test Dua</label>
                      <input type="date" name="test_two" class="form-control">
                    </div>
                    <div class="col-lg-6">
                      <label for="test_three">Test Tiga</label>
                      <input type="date" name="test_three" class="form-control">
                    </div>
                  </div>
                </div>


            </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnUpdateTest" onclick="update_test()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- End Bootstrap modal -->

  </section>
  <!-- /.content -->

  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_status" role="dialog" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="testLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body form_status">
          <form action="#" id="form_status" class="form-horizontal">
            <!-- <input type="hidden" value="" name="basic_id" /> -->
            <input type="hidden" value="" name="basic_id" />
            <!-- <input type="hidden" value="" name="id" /> -->

            <div class="form-group">
              <label for="test_one">Status Test</label>
              <select id="status_test" name="status_test" class="form-control is-warning">
                <option selected="selected" value="" disabled="disabled">
                </option>
                <option value="Lulus">Lulus</option>
                <option value="Referensi">Referensi</option>
                <option value="Tidak Lulus">Tidak Lulus</option>
                <option value="Tidak Hadir">Tidak Hadir</option>
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" id="btnUpdateStatus" onclick="update_status_test()"
            class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- End Bootstrap modal -->

</div>
<!-- /.content-wrapper -->