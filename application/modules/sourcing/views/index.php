<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm mt-2 mb-2">
          <h1 class="font-weight-bold text-secondary text-uppercase text-center">Data Kandidat</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
  <div class="flash-data-err" data-flashdata-err="<?= $this->session->flashdata('err') ?>"></div>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="row col-lg-12 d-block">
                <div class="col-lg-6 mb-2">
                  <a href="<?= base_url('sourcing/addNewCandidate') ?>" class="btn bg-cyan"><i
                      class="fas fa-plus-circle"></i> Tambah Data Kandidat</a>
                </div>
                <div class="col-lg-12 d-flex justify-content-end">
                  <?php echo form_open_multipart('sourcing/upload_candidate'); ?>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="importexcel" id="custom-file-input"
                          accept=".xlsx,.xls">
                        <label class="custom-file-label" for="exampleInputFile">Import Data Excel</label>
                      </div>
                      <div class="input-group-append">
                        <button type="submit" id="submit" class="btn bg-gradient-maroon">Upload</button>
                      </div>
                    </div>
                  </div>
                  <?php form_close() ?>
                </div>

              </div>
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
              <table id="exam" class="table table-bordered table-striped table-dark text-center">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Pendidikan</th>
                    <th>Jadwal Test Satu</th>
                    <th>Jadwal Test Dua</th>
                    <th>Jadwal Test tiga</th>
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

<script>
document.getElementById("submit").onclick = function(e) {
  if (document.getElementById("custom-file-input").value == "") {
    e.preventDefault();
    alert("Tolong Masukan File Kandidat");
  }
}
</script>