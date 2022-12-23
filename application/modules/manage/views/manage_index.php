<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="font-weight-bold text-secondary text-uppercase">Candidate Basic</h1>
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
                <button class="btn btn-success" onclick="add_person()"><i class="fas fa-fw fa-plus-circle"></i> Add
                  Person</button>
                </p>
              </div>

            </div>

            <div class="card-body">
              <table id="candidate_basic_table" class="table table-bordered table-dark table-striped text-center">
                <thead>
                  <tr>
                    <th>Id Candidate</th>
                    <th>Fullname</th>
                    <th>Domisili</th>
                    <th>Tanggal Lahir</th>
                    <th>No. Handphone</th>
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
          <input type="hidden" value="" name="id_candidate" />
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md">Nama Lengkap</label>
              <div class="col-md">
                <input name="fullname" placeholder="Nama Lengkap" class="form-control" type="text">
                <span class="help-block"></span>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 form-group">
                <label class="control-label col-md">Tempat Lahir</label>
                <div class="col-md">
                  <input name="place_of_birth" placeholder="Tempat Lahir" class="form-control" type="text">
                  <span class="help-block"></span>
                </div>
              </div>
              <div class="col-lg-6 form-group">
                <label class="control-label col-md">Tanggal Lahir</label>
                <div class="col-md">
                  <input name="date_of_birth" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                  <span class="help-block"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 form-group">
                <label class="control-label col-md">Domisili</label>
                <div class="col-md">
                  <input name="domicile" placeholder="Domisili" class="form-control" type="text">
                  <span class="help-block"></span>
                </div>
              </div>
              <div class="col-lg-6 form-group">
                <label class="control-label col-md">No. Handphone</label>
                <div class="col-md">
                  <input name="phone_number" placeholder="No. HP" class="form-control" type="number">
                  <span class="help-block"></span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md">Gender</label>
              <div class="col-md">
                <select name="gender" class="form-control">
                  <option value="">--Select Gender--</option>
                  <option value="L">Pria</option>
                  <option value="P">Wanita</option>
                </select>
                <span class="help-block"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md">Pendidikan Terakhir</label>
              <div class="col-md">
                <input name="last_education" placeholder="S1 - Sistem Informasi" class="form-control" type="text">
                <span class="help-block"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md">Test Pertama</label>
              <div class="col-md">
                <input name="test_one" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
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