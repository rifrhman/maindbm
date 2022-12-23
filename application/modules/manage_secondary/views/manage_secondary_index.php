<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="font-weight-bold text-secondary text-uppercase">Candidate Secondary</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="d-flex flex-row justify-content-between">

                </p>
              </div>

            </div>

            <div class="card-body">
              <table id="candidate_secondary_table" class="table table-bordered table-dark table-striped text-center">
                <thead>
                  <tr>
                    <th>Id Candidate</th>
                    <th>No Kandidat</th>
                    <th>Fullname</th>
                    <th>Email</th>
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
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form_secondary" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title-secondary"></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body form_secondary">
        <form action="#" id="form_secondary" class="form-horizontal">
          <input type="hidden" value="" name="basic_id" />
          <div class="form-body">
            <div class="row">
              <div class="col-lg-6 form-group">
                <label class="control-label col-md">No. Kandidat</label>
                <div class="col-md">
                  <input name="regis_num_candidate" placeholder="No. kandidat" class="form-control" type="text">
                  <span class="help-block"></span>
                </div>
              </div>
              <div class="col-lg-6 form-group">
                <label class="control-label col-md">No. KTP</label>
                <div class="col-md">
                  <input name="regis_num_resident" placeholder="Nama Lengkap" class="form-control" type="number">
                  <span class="help-block"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 form-group">
                <label class="control-label col-md">Email</label>
                <div class="col-md">
                  <input name="email" placeholder="john@gmail.com" class="form-control" type="text">
                  <span class="help-block"></span>
                </div>
              </div>
              <div class="col-lg-6 form-group">
                <label class="control-label col-md">Agama</label>
                <div class="col-md">
                  <select name="religion" class="form-control">
                    <option value="">--Select Religion--</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katholik">Katholik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                  </select>
                  <span class="help-block"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 form-group">
                <label class="control-label col-md">Tinggi</label>
                <div class="col-md">
                  <input name="tall" placeholder="175" class="form-control" type="text">
                  <span class="help-block"></span>
                </div>
              </div>
              <div class="col-lg-6 form-group">
                <label class="control-label col-md">Berat</label>
                <div class="col-md">
                  <input name="weight" placeholder="65" class="form-control" type="text">
                  <span class="help-block"></span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md">Status Perkawinan</label>
              <div class="col-md">
                <select name="marital_status" class="form-control">
                  <option value="">--Select Status--</option>
                  <option value="SG">SG</option>
                  <option value="M0">M0</option>
                  <option value="M1">M1</option>
                  <option value="M2">M2</option>
                  <option value="M3">M3</option>
                  <option value="M4">M4</option>
                  <option value="M5">M5</option>
                </select>
                <span class="help-block"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md">Kode Pos</label>
              <div class="col-md">
                <input name="postal_code" placeholder="16320" class="form-control" type="text">
                <span class="help-block"></span>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 form-group">
                <label class="control-label col-md">Sertifikat Tambahan</label>
                <div class="col-md">
                  <input name="certificate" placeholder="*Optional" class="form-control" type="text">
                  <span class="help-block"></span>
                </div>
              </div>
              <div class="col-lg-6 form-group">
                <label class="control-label col-md">Masa Berlaku</label>
                <div class="col-md">
                  <input name="validity_period" placeholder="Masa Berlaku Sertifikat" class="form-control" type="text">
                  <span class="help-block"></span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md">Status Test</label>
              <div class="col-md">
                <select name="status_test" class="form-control">
                  <option value="">--Select Status Test--</option>
                  <option value="Lulus">Lulus</option>
                  <option value="Referensi">Referensi</option>
                  <option value="Tidak Lulus">Tidak Lulus</option>
                  <option value="Tidak Hadir">Tidak Hadir</option>
                </select>
                <span class="help-block"></span>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnSaveSecondary" onclick="save_secondary()" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->