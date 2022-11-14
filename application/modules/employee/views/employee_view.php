<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="font-weight-bold text-secondary text-uppercase">Karyawan Aktif</h1>
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
              <span class="badge badge-danger"><?= $countNull; ?> Karyawan Aktif</span>
              <div class="form-group row">
                <div class="col-md mt-2">

                  <table border="0" cellspacing="5" cellpadding="5">
                    <thead>
                      <tr>
                        <th>Pencarian Tanggal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Dari Tanggal:</td>
                        <td><input type="text" id="min" name="min"></td>
                      </tr>
                      <tr>
                        <td>Sampai Tanggal:</td>
                        <td><input type="text" id="max" name="max"></td>
                      </tr>
                    </tbody>
                  </table>


                </div>
                <!-- <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i>
                  Reload</button> -->

              </div>
            </div>

            <div class="card-body">
              <table id="employee" class="table table-bordered table-dark table-striped text-center">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Klien</th>
                    <th>CC</th>
                    <th>Jabatan</th>
                    <th>Tgl Awal</th>
                    <th>Tgl Akhir</th>
                    <th>Sisa Hari</th>
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
          <input type="hidden" value="" name="id" />
          <div class="form-body">

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