<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="font-weight-bold text-secondary text-uppercase">Approve Kandidat</h1>
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
              <!-- <span class="badge badge-danger"><?= $count_stat; ?> Kandidat</span>
              Belum dinilai -->
            </div>

            <div class="card-body">
              <table id="head" class="table table-bordered table-responsive table-dark table-striped text-center">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Client</th>
                    <th>Penempatan</th>
                    <th>Tanggal Mulai - Tanggal Akhir</th>
                    <th>Diajukan Oleh</th>
                    <th>Status Karyawan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php $no = 1;
                  foreach ($candidate as $can) : ?>

                  <tr>
                    <?php if ($can['confirm'] == 'Approved') : ?>
                    <?php else : ?>
                    <td><?= $no++; ?></td>
                    <td><?= $can['fullname'] ?></td>
                    <td><?= $can['client'] ?></td>
                    <td><?= $can['placement'] ?></td>
                    <?php if ($can['start_date'] && $can['end_date'] != null) : ?>
                    <td><?= date('d-M-Y', strtotime($can['start_date'])) ?> -
                      <?= date('d-M-Y', strtotime($can['end_date'])) ?></td>
                    <?php else : ?>
                    <td></td>
                    <?php endif; ?>


                    <td><?= $can['created_by'] ?></td>

                    <?php if ($can['confirm'] == 'Back') : ?>
                    <td>Dikembalikan Admin</td>
                    <?php elseif ($can['confirm'] == '' || $can['confirm' == null]) : ?>
                    <td>Diterima dari Recruitment</td>
                    <?php endif; ?>

                    <td>
                      <a href="<?= base_url('head/detailcandidate/') . $can['id_candidate']; ?>"
                        class="badge bg-olive btn-sm"><i class="fas fa-fw fa-info-circle"></i> Detail</a><br>

                      <a href="<?= base_url('head/approved/') . $can['id_candidate'] ?>"
                        class="badge badge-danger btn-sm"><i class="fas fa-fw fa-info-circle"></i>
                        Approve</a><br>

                    </td>
                    <?php endif; ?>
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