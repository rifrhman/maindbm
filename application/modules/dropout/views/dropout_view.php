<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm mb-2 mt-2">
          <h1 class="font-weight-bold text-center text-secondary text-uppercase">Karyawan keluar (out)</h1>
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
              <!-- <span class="badge badge-danger"><?= $countNull; ?> Karyawan Aktif</span> -->
              <p> <a class="btn btn-danger btn-sm" href="<?php echo base_url('dropout/export_excel') ?>"><i
                    class="fas fa-fw fa-file-export"></i> Export ke
                  Excel</a>
              </p>
              <h5 class="font-weight-bold text-gray">Daftar Karyawan Menuju Resign</h5>
              <div class="form-group row">
                <!-- <div class="col-md mt-2">

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


                </div> -->
                <!-- <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i>
                  Reload</button> -->

              </div>
            </div>

            <div class="card-body">
              <table id="dropout" class="table table-bordered table-striped text-center">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Klien</th>
                    <th>CC</th>
                    <th>Jabatan</th>
                    <th>Tgl Awal</th>
                    <th>Tgl Akhir</th>
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
<div class="modal fade" id="modal_out_emp" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title"></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body form_out_emp">
        <form action="#" id="form_out_emp" class="form-horizontal">
          <input type="hidden" value="" name="basic_id" />

          <div class="form-body">

            <div class="form-group">
              <label class="control-label col-md-6">Fix Resign Karyawan ?</label>
              <div class="col-md">
                <select name="flags_resign" class="form-control">
                  <option value="" selected="selected" disabled="disabled">--Select Status--</option>
                  <option value="Fix Resign">Resign</option>
                  <option value="Blacklist">Blacklist</option>
                </select>
                <span class="help-block"></span>
              </div>
            </div>

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnSaveOut" onclick="save_out_emp()" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->