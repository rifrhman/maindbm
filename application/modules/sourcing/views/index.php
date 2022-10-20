<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="font-weight-bold text-secondary text-uppercase">Data Kandidat</h1>
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
              <div class="row col-lg-12 d-block">
                <div class="col-lg-6 mb-2">
                  <a href="<?= base_url('sourcing/addNewCandidate') ?>" class="btn bg-gradient-primary"><i
                      class="fas fa-plus-circle"></i> Tambah Data Kandidat</a>
                </div>
                <div class="col-lg-12 d-flex justify-content-end">
                  <?php echo form_open_multipart('sourcing/upload_candidate'); ?>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="importexcel" id="custom-file-input"
                          accept=".xlsx,.xls">
                        <label class="custom-file-label" for="exampleInputFile">Import Excel Kandidat</label>
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

            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped table-dark text-center">
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
                  <?php $no = 1;
                  foreach ($candidate as $can) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $can['fullname'] ?></td>
                    <td><?= $can['domicile'] ?></td>
                    <td><?= $can['last_education'] ?></td>
                    <td><?= date('d-M-Y', strtotime($can['test_one'])) ?></td>
                    <?php if ($can['test_two'] == null) : ?>
                    <td><?= $can['test_two'] ?></td>
                    <?php else : ?>
                    <td><?= date('d-M-Y', strtotime($can['test_two'])) ?></td>
                    <?php endif; ?>
                    <?php if ($can['test_three'] == null) : ?>
                    <td><?= $can['test_three'] ?></td>
                    <?php else : ?>
                    <td><?= date('d-M-Y', strtotime($can['test_three'])) ?></td>
                    <?php endif; ?>
                    <td>
                      <a href="<?= base_url('sourcing/detailcandidate/') . $can['id_candidate'] ?>"
                        class="badge bg-lime"><i class="fas fa-fw fa-info"></i> Detail</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
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