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



<!-- Modal -->
<div class="modal fade" id="updateRemainder" data-backdrop="static" data-keyboard="false" tabindex="-1"
  aria-labelledby="updateRemainderLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateRemainderLabel">Form updateStatus <?= $list['fullname'] ?>
        </h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?= base_url('employee/update_status_file/')  ?>" method="POST">
        <div class="modal-body">
          <div class="card-body">
            <input type="hidden" name="id" id="id" value="id">
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