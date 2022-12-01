<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm">
          <h1>Detail Karyawan Resign</h1>
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

  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title font-weight-bold">Data Basic Karyawan</h3>
              <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#basic">
                  <i class="fas fa-fw fa-pen"></i> Edit Data
                </button>
              </div>
            </div>

            <form>
              <div class="card-body">
                <div class="row mb-3">

                  <div class="col d-flex justify-content-center">
                    <img src="<?= base_url('assets/uploads/image/candidate-image/') . $list['image'] ?>" width="222px"
                      alt="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Lengkap</label>
                  <input type="text" class="form-control" name="fullname" value="<?= $list['fullname'] ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="place_of_birth">Tempat Lahir</label>
                  <input type="text" class="form-control" id="place_of_birth" value="<?= $list['place_of_birth'] ?>"
                    readonly>
                </div>
                <div class="form-group">
                  <label for="date_of_birth">Tanggal Lahir</label>
                  <input type="text" class="form-control" id="date_of_birth"
                    value="<?= date('d F Y', strtotime($list['date_of_birth'])) ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="phone_number">Nomor Handphone</label>
                  <input type="text" class="form-control" id="phone_number" value="<?= $list['phone_number'] ?>"
                    readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  <input type="text" class="form-control" id="domicile" value="<?= $list['domicile'] ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInput1">Jenis Kelamin</label>
                  <?php if ($list['gender'] == 'L') : ?>
                  <input type="text" class="form-control" id="gender" value="Laki - Laki" readonly>
                  <?php elseif ($list['gender'] == 'P') : ?>
                  <input type="text" class="form-control" id="gender" value="Perempuan" readonly>
                  <?php endif; ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Pendidikan Terakhir</label>
                  <input type="text" class="form-control" id="domicile" value="<?= $list['last_education'] ?>" readonly>
                </div>
              </div>

            </form>

          </div>


        </div>

        <?php if ($second == null) : ?>
        <div class="col-lg">
          <div class="row">
            <div class="alert alert-danger col-lg" role="alert">
              Data Secondary Belum Diinput.
            </div>
          </div>
        </div>
        <?php else : ?>
        <div class="col-md-6">
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title font-weight-bold">Data Secondary Karyawan</h3>
              <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#secondary">
                  <i class="fas fa-fw fa-pen"></i> Edit Data
                </button>
              </div>
            </div>

            <form>
              <div class="card-body">
                <div class="row mb-3">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nomor Induk Kandidat</label>
                  <input type="text" class="form-control" name="regis_num_candidate"
                    value="<?= $second['regis_num_candidate'] ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="place_of_birth">Nomor Induk Kependudukan</label>
                  <input type="text" class="form-control" id="regis_num_resident"
                    value="<?= $second['regis_num_resident'] ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="date_of_birth">Email</label>
                  <input type="text" class="form-control" id="email" value="<?= $second['email'] ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="phone_number">Agama</label>
                  <input type="text" class="form-control" id="religion" value="<?= $second['religion'] ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tinggi</label>
                  <input type="text" class="form-control" id="tall" value="<?= $second['tall'] ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Berat</label>
                  <input type="text" class="form-control" id="weight" value="<?= $second['weight'] ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Status Perkawinan</label>
                  <input type="text" class="form-control" id="marital_status" value="<?= $second['marital_status'] ?>"
                    readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kode Pos</label>
                  <input type="text" class="form-control" id="postal_code" value="<?= $second['postal_code'] ?>"
                    readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Status Test Kandidat</label>
                  <input type="text" class="form-control" id="status_test" value="<?= $second['status_test'] ?>"
                    readonly>
                </div>

              </div>

            </form>

          </div>


        </div>
        <?php endif; ?>


        <div class="col-lg-12">
          <div class="card card-purple">
            <div class="card-header">
              <h3 class="card-title font-weight-bold">Data Baru Karyawan</h3>
              <div class="d-flex justify-content-end">
              </div>
            </div>

            <form>
              <div class="card-body">
                <div class="row mb-3">
                </div>
                <div class="row">
                  <div class="col form-group">
                    <?php if (isset($basicadmin['id_emp']) == null) : ?>
                    <label for="exampleInputEmail1">Id Karyawan</label>
                    <input type="text" class="form-control" name="id_emp" value="" readonly>
                    <?= form_error('id_emp', '<small class="text-danger">', '</small>') ?>
                    <?php elseif (isset($basicadmin['id_emp']) != null) : ?>
                    <label for="exampleInputEmail1">Id Karyawan</label>
                    <input type="text" class="form-control" name="id_emp" value="<?= $basicadmin['id_emp'] ?>" readonly>
                    <?= form_error('id_emp', '<small class="text-danger">', '</small>') ?>
                    <?php endif; ?>
                  </div>
                  <div class="col form-group">
                    <?php if (isset($basicadmin['id_privy']) == null) : ?>
                    <label for="exampleInputEmail1">Id Privy</label>
                    <input type="text" class="form-control" name="id_privy" value="" readonly>
                    <?= form_error('id_privy', '<small class="text-danger">', '</small>') ?>
                    <?php else : ?>
                    <label for="exampleInputEmail1">Id Privy</label>
                    <input type="text" class="form-control" name="id_privy" value="<?= $basicadmin['id_privy'] ?>"
                      readonly>
                    <?= form_error('id_privy', '<small class="text-danger">', '</small>') ?>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col form-group">
                    <?php if (isset($basicadmin['cc']) == null) : ?>
                    <label for="exampleInputEmail1">CC</label>
                    <input type="text" class="form-control" name="cc" value="" readonly>
                    <?= form_error('cc', '<small class="text-danger">', '</small>') ?>
                    <?php else : ?>
                    <label for="exampleInputEmail1">CC</label>
                    <input type="text" class="form-control" name="cc" value="<?= $basicadmin['cc'] ?>" readonly>
                    <?= form_error('cc', '<small class="text-danger">', '</small>') ?>
                    <?php endif; ?>
                  </div>
                  <div class="col form-group">
                    <?php if (isset($basicadmin['branch_company']) == null) : ?>
                    <label for="exampleInputEmail1">Kanrep</label>
                    <input type="text" class="form-control" name="branch_company" value="" readonly>
                    <?= form_error('branch_company', '<small class="text-danger">', '</small>') ?>
                    <?php else : ?>
                    <label for="exampleInputEmail1">Kanrep</label>
                    <input type="text" class="form-control" name="branch_company"
                      value="<?= $basicadmin['branch_company'] ?>" readonly>
                    <?= form_error('branch_company', '<small class="text-danger">', '</small>') ?>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col form-group">
                    <?php if (isset($basicadmin['payroll_one']) == null) : ?>
                    <label for="exampleInputEmail1">Payroll 1</label>
                    <input type="text" class="form-control" name="payroll_one" value="" readonly>
                    <?= form_error('payroll_one', '<small class="text-danger">', '</small>') ?>
                    <?php else : ?>
                    <label for="exampleInputEmail1">Payroll 1</label>
                    <input type="text" class="form-control" name="payroll_one" value="<?= $basicadmin['payroll_one'] ?>"
                      readonly>
                    <?= form_error('payroll_one', '<small class="text-danger">', '</small>') ?>
                    <?php endif; ?>
                  </div>
                  <div class="col form-group">
                    <?php if (isset($basicadmin['payroll_two']) == null) : ?>
                    <label for="exampleInputEmail1">Payroll 2</label>
                    <input type="text" class="form-control" name="payroll_two" readonly value="">
                    <?= form_error('payroll_two', '<small class="text-danger">', '</small>') ?>
                    <?php else : ?>
                    <label for="exampleInputEmail1">Payroll 2</label>
                    <input type="text" class="form-control" name="payroll_two" value="<?= $basicadmin['payroll_two'] ?>"
                      readonly>
                    <?= form_error('payroll_two', '<small class="text-danger">', '</small>') ?>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col form-group">
                    <?php if (isset($basicadmin['address_ktp']) == null) : ?>
                    <label for="exampleInputEmail1">Alamat KTP</label>
                    <input type="text" class="form-control" name="address_ktp" value="" readonly>
                    <?= form_error('address_ktp', '<small class="text-danger">', '</small>') ?>
                    <?php else : ?>
                    <label for="exampleInputEmail1">Alamat KTP</label>
                    <input type="text" class="form-control" name="address_ktp" value="<?= $basicadmin['address_ktp'] ?>"
                      readonly>
                    <?= form_error('address_ktp', '<small class="text-danger">', '</small>') ?>
                    <?php endif; ?>
                  </div>
                  <div class="col form-group">
                    <?php if (isset($basicadmin['postal_code_ktp']) == null) : ?>
                    <label for="exampleInputEmail1">Kode Pos KTP</label>
                    <input type="text" class="form-control" name="postal_code_ktp" value="" readonly>
                    <?= form_error('postal_code_ktp', '<small class="text-danger">', '</small>') ?>
                    <?php else : ?>
                    <label for="exampleInputEmail1">Kode Pos KTP</label>
                    <input type="text" class="form-control" name="postal_code_ktp"
                      value="<?= $basicadmin['postal_code_ktp'] ?>" readonly>
                    <?= form_error('postal_code_ktp', '<small class="text-danger">', '</small>') ?>
                    <?php endif; ?>
                  </div>
                  <div class="col form-group">
                    <?php if (isset($basicadmin['no_kk']) == null) : ?>
                    <label for="exampleInputEmail1">No Kartu Keluarga</label>
                    <input type="text" class="form-control" name="no_kk" value="" readonly>
                    <?= form_error('no_kk', '<small class="text-danger">', '</small>') ?>
                    <?php else : ?>
                    <label for="exampleInputEmail1">No Kartu Keluarga</label>
                    <input type="text" class="form-control" name="no_kk" value="<?= $basicadmin['no_kk'] ?>" readonly>
                    <?= form_error('no_kk', '<small class="text-danger">', '</small>') ?>
                    <?php endif; ?>
                  </div>
                  <div class="col form-group">
                    <?php if (isset($basicadmin['blood_type']) == null) : ?>
                    <label for="exampleInputEmail1">Golongan Darah</label>
                    <input type="text" class="form-control" name="blood_type" value="" readonly>
                    <?= form_error('blood_type', '<small class="text-danger">', '</small>') ?>
                    <?php else : ?>
                    <label for="exampleInputEmail1">Golongan Darah</label>
                    <input type="text" class="form-control" name="blood_type" value="<?= $basicadmin['blood_type'] ?>"
                      readonly>
                    <?= form_error('blood_type', '<small class="text-danger">', '</small>') ?>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col form-group">
                    <?php if (isset($basicadmin['status_company']) == null) : ?>
                    <label for="exampleInputEmail1">Status (M+ / MTA)</label>
                    <input type="text" class="form-control" name="status_company" value="" readonly>
                    <?= form_error('status_company', '<small class="text-danger">', '</small>') ?>
                    <?php else : ?>
                    <label for="exampleInputEmail1">Status (M+ / MTA)</label>
                    <input type="text" class="form-control" name="status_company"
                      value="<?= $basicadmin['status_company'] ?>" readonly>
                    <?= form_error('status_company', '<small class="text-danger">', '</small>') ?>
                    <?php endif; ?>
                  </div>
                  <div class="col form-group">
                    <?php if (isset($basicadmin['surrogate_status']) == null) : ?>
                    <label for="exampleInputEmail1">Status Pengganti</label>
                    <input type="text" class="form-control" name="surrogate_status" value="" readonly>
                    <?= form_error('surrogate_status', '<small class="text-danger">', '</small>') ?>
                    <?php else : ?>
                    <label for="exampleInputEmail1">Status Pengganti</label>
                    <input type="text" class="form-control" name="surrogate_status"
                      value="<?= $basicadmin['surrogate_status'] ?>" readonly>
                    <?= form_error('surrogate_status', '<small class="text-danger">', '</small>') ?>
                    <?php endif; ?>
                  </div>
                  <div class="col form-group">
                    <?php if (isset($basicadmin['type_recruitment']) == null) : ?>
                    <label for="exampleInputEmail1">Jenis Rekrutment</label>
                    <input type="text" class="form-control" name="type_recruitment" value="" readonly>
                    <?= form_error('type_recruitment', '<small class="text-danger">', '</small>') ?>
                    <?php else : ?>
                    <label for="exampleInputEmail1">Jenis Rekrutment</label>
                    <input type="text" class="form-control" name="type_recruitment"
                      value="<?= $basicadmin['type_recruitment'] ?>" readonly>
                    <?= form_error('type_recruitment', '<small class="text-danger">', '</small>') ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>



        <div class="col-lg-12">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title font-weight-bold">Data BANK Karyawan</h3>
              <div class="d-flex justify-content-end">
              </div>
            </div>

            <form>
              <div class="card-body">
                <div class="row">
                  <div class="col form-group">
                    <?php if (isset($secondadmin['allowance_premium']) == null) { ?>
                    <label for="exampleInputEmail1">Tunjangan Premium</label>
                    <input type="text" class="form-control" name="allowance_premium" value="" readonly>
                    <?= form_error('allowance_premium', '<small class="text-danger">', '</small>') ?>
                    <?php } else { ?>
                    <label for="exampleInputEmail1">Tunjangan Premium</label>
                    <input type="text" class="form-control" name="allowance_premium"
                      value="<?= $secondadmin['allowance_premium'] ?>" readonly>
                    <?= form_error('allowance_premium', '<small class="text-danger">', '</small>') ?>
                    <?php } ?>
                  </div>
                  <div class="col form-group">
                    <?php if (isset($secondadmin['allowance_others']) == null) : ?>
                    <label for="exampleInputEmail1">Tunjangan Lain</label>
                    <input type="text" class="form-control" name="allowance_others" value="" readonly>
                    <?= form_error('allowance_others', '<small class="text-danger">', '</small>') ?>
                    <?php else : ?>
                    <label for="exampleInputEmail1">Tunjangan Lain</label>
                    <input type="text" class="form-control" name="allowance_others"
                      value="<?= $secondadmin['allowance_others'] ?>" readonly>
                    <?= form_error('allowance_others', '<small class="text-danger">', '</small>') ?>
                    <?php endif; ?>
                  </div>
                </div>

                <div class="row">
                  <div class="col form-group">
                    <?php if (isset($secondadmin['placement_city']) == null) : ?>
                    <label for="exampleInputEmail1">Kota Penempatan</label>
                    <input type="text" class="form-control" name="placement_city" value="" readonly>
                    <?= form_error('placement_city', '<small class="text-danger">', '</small>') ?>
                    <?php else : ?>
                    <label for="exampleInputEmail1">Kota Penempatan</label>
                    <input type="text" class="form-control" name="placement_city"
                      value="<?= $secondadmin['placement_city'] ?>" readonly>
                    <?= form_error('placement_city', '<small class="text-danger">', '</small>') ?>
                    <?php endif; ?>
                  </div>
                  <div class="col form-group">
                    <?php if (isset($secondadmin['placement_district']) == null) : ?>
                    <label for="exampleInputEmail1">Kabupaten Penempatan</label>
                    <input type="text" class="form-control" name="placement_district" value="" readonly>
                    <?= form_error('placement_district', '<small class="text-danger">', '</small>') ?>
                    <?php else : ?>
                    <label for="exampleInputEmail1">Kabupaten Penempatan</label>
                    <input type="text" class="form-control" name="placement_district"
                      value="<?= $secondadmin['placement_district'] ?>" readonly>
                    <?= form_error('placement_district', '<small class="text-danger">', '</small>') ?>
                    <?php endif; ?>
                  </div>
                </div>

                <div class="row">
                  <div class="col form-group">
                    <?php if (isset($secondadmin['type_bank']) == null) : ?>
                    <label for="exampleInputEmail1">BANK</label>
                    <input type="text" class="form-control" name="type_bank" value="" readonly>
                    <?= form_error('type_bank', '<small class="text-danger">', '</small>') ?>
                    <?php else : ?>
                    <label for="exampleInputEmail1">BANK</label>
                    <input type="text" class="form-control" name="type_bank" value="<?= $secondadmin['type_bank'] ?>"
                      readonly>
                    <?= form_error('type_bank', '<small class="text-danger">', '</small>') ?>
                    <?php endif; ?>
                  </div>
                  <div class="col form-group">
                    <?php if (isset($secondadmin['account_number']) == null) : ?>
                    <label for="exampleInputEmail1">No. Rekening</label>
                    <input type="text" class="form-control" name="account_number" value="" readonly>
                    <?= form_error('account_number', '<small class="text-danger">', '</small>') ?>
                    <?php else : ?>
                    <label for="exampleInputEmail1">No. Rekening</label>
                    <input type="text" class="form-control" name="account_number"
                      value="<?= $secondadmin['account_number'] ?>" readonly>
                    <?= form_error('account_number', '<small class="text-danger">', '</small>') ?>
                    <?php endif; ?>
                  </div>
                </div>


                <div class="form-group">
                  <?php if (isset($secondadmin['name_of_bank']) == null) : ?>
                  <label for="exampleInputEmail1">Bank Atas Nama</label>
                  <input type="text" class="form-control" name="name_of_bank" value="" readonly>
                  <?= form_error('name_of_bank', '<small class="text-danger">', '</small>') ?>
                  <?php else : ?>
                  <label for="exampleInputEmail1">Bank Atas Nama</label>
                  <input type="text" class="form-control" name="name_of_bank"
                    value="<?= $secondadmin['name_of_bank'] ?>" readonly>
                  <?= form_error('name_of_bank', '<small class="text-danger">', '</small>') ?>
                  <?php endif; ?>
                </div>

                <div class="row">
                  <div class="col form-group">
                    <?php if (isset($secondadmin['bpjs_tk']) == null) : ?>
                    <label for="exampleInputEmail1">BPJS Ketenagakerjaan</label>
                    <input type="text" class="form-control" name="bpjs_tk" value="" readonly>
                    <?= form_error('bpjs_tk', '<small class="text-danger">', '</small>') ?>
                    <?php else : ?>
                    <label for="exampleInputEmail1">BPJS Ketenagakerjaan</label>
                    <input type="text" class="form-control" name="bpjs_tk" value="<?= $secondadmin['bpjs_tk'] ?>"
                      readonly>
                    <?= form_error('bpjs_tk', '<small class="text-danger">', '</small>') ?>
                    <?php endif; ?>
                  </div>
                  <div class="col form-group">
                    <?php if (isset($secondadmin['bpjs_ks']) == null) : ?>
                    <label for="exampleInputEmail1">BPJS Kesehatan</label>
                    <input type="text" class="form-control" name="bpjs_ks" value="" readonly>
                    <?= form_error('bpjs_ks', '<small class="text-danger">', '</small>') ?>
                    <?php else : ?>
                    <label for="exampleInputEmail1">BPJS Kesehatan</label>
                    <input type="text" class="form-control" name="bpjs_ks" value="<?= $secondadmin['bpjs_ks'] ?>"
                      readonly>
                    <?= form_error('bpjs_ks', '<small class="text-danger">', '</small>') ?>
                    <?php endif; ?>
                  </div>

                </div>
                <div class="form-group">
                  <?php if (isset($secondadmin['npwp']) == null) : ?>
                  <label for="exampleInputEmail1">NPWP</label>
                  <input type="text" class="form-control" name="npwp" value="" readonly>
                  <?= form_error('npwp', '<small class="text-danger">', '</small>') ?>
                  <?php else : ?>
                  <label for="exampleInputEmail1">NPWP</label>
                  <input type="text" class="form-control" name="npwp" value="<?= $secondadmin['npwp'] ?>" readonly>
                  <?= form_error('npwp', '<small class="text-danger">', '</small>') ?>
                  <?php endif; ?>
                </div>
              </div>
            </form>
          </div>
        </div>



        <div class="col-md">
          <!-- Form Element sizes -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title font-weight-bold">Berkas Karyawan</h3>
              <div class="d-flex justify-content-end">

              </div>
            </div>
            <div class="card-body text-center">
              <div class="row">
                <div class="col-4">
                  <label for="test_two">Psikogram Satu</label>
                  <?php if (isset($list['psikogram'])) : ?>
                  <a class="btn btn-info btn-sm form-control"
                    href="<?= base_url('assets/uploads/psikogram/') . $list['psikogram'] ?>" target="_blank">
                    <i class="fas fa-fw fa-file-upload"></i> Psikogram Satu
                  </a>
                  <?php else : ?>
                  <p class="text-danger font-weight-bold">Belum di Upload</p>
                  <?php endif; ?>
                </div>
                <div class="col-4">
                  <label for="test_two">Psikogram Dua</label>
                  <?php if (isset($list['psikogram_two'])) : ?>
                  <a class="btn btn-primary btn-sm form-control"
                    href="<?= base_url('assets/uploads/psikogram/') . $list['psikogram_two'] ?>" target="_blank">
                    <i class="fas fa-fw fa-file-upload"></i> Psikogram Dua
                  </a>
                  <?php else : ?>
                  <p class="text-danger font-weight-bold">Belum di Upload</p>
                  <?php endif; ?>
                </div>
                <div class="col-4">
                  <label for="test_two">Psikogram Tiga</label>
                  <?php if (isset($list['psikogram_three'])) : ?>
                  <a class="btn bg-olive btn-sm form-control"
                    href="<?= base_url('assets/uploads/psikogram/') . $list['psikogram_three'] ?>" target="_blank">
                    <i class="fas fa-fw fa-file-upload"></i> Psikogram Tiga
                  </a>
                  <?php else : ?>
                  <p class="text-danger font-weight-bold">Belum di Upload</p>
                  <?php endif; ?>
                </div>

                <div class="col-6">
                  <label for="test_one">Foto Kandidat</label>
                  <?php if (isset($list['image'])) : ?>
                  <a class="btn bg-gradient-purple btn-sm form-control"
                    href="<?= base_url('assets/uploads/image/candidate-image/') . $list['image'] ?>" target="_blank">
                    <i class="fas fa-fw fa-camera-retro"></i> Foto
                  </a>
                  <?php else : ?>
                  <p class="text-danger font-weight-bold">Belum di Upload</p>
                  <?php endif; ?>
                </div>
                <div class="col-6">
                  <label for="test_three">Form Interview</label>
                  <?php if (isset($list['interview'])) : ?>
                  <a class="btn btn-danger btn-sm form-control"
                    href="<?= base_url('assets/uploads/interview/') . $list['interview'] ?>" target="_blank">
                    <i class="fas fa-fw fa-file-pdf"></i> Interview
                  </a>
                  <?php else : ?>
                  <p class="text-danger font-weight-bold">Belum di Upload</p>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>


        <div class="col-lg-12">
          <?php if ($educate == null) : ?>
          <div class="col-lg">
            <div class="row">
              <div class="alert alert-danger col-lg" role="alert">
                Data Pendidikan Belum Diinput.
              </div>
            </div>
          </div>
          <?php else : ?>
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title font-weight-bold">Pendidikan</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>

              </div>
            </div>
            <?php foreach ($educate as $ed) : ?>
            <div class="card-body">
              <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title font-weight-bold">List Pendidikan Kandidat</h3>

                </div>


                <div class="card-body">
                  <div class="row col-lg-12">

                    <div class="form-group col-md-3">
                      <label for="degree">Tingkat Pendidikan</label>
                      <input type="text" class="form-control" id="degree" value="<?= $ed['degree'] ?>" readonly>
                    </div>

                    <div class="form-group col-md-5">
                      <label for="institute">Institute</label>
                      <input type="text" class="form-control" id="institute" value="<?= $ed['institute'] ?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="major">Jurusan</label>
                      <input type="text" class="form-control" id="major" value="<?= $ed['major'] ?>" readonly>
                    </div>

                  </div>
                  <div class="row col-lg-12">
                    <div class="col-md-3">
                      <label for="city">Kota Institute</label>
                      <input type="text" class="form-control" id="city" value="<?= $ed['city'] ?>" readonly>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="score">Nilai</label>
                        <input type="text" class="form-control" id="score" value="<?= $ed['score'] ?>" readonly>
                      </div>

                    </div>

                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="year_in">Tahun Masuk</label>
                        <input type="text" class="form-control" id="year_in" value="<?= $ed['year_in_edu'] ?>" readonly>
                      </div>

                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="year_out">Tahun Keluar</label>
                        <input type="text" class="form-control" id="year_out" value="<?= $ed['year_out_edu'] ?>"
                          readonly>
                      </div>

                    </div>

                  </div>


                </div>





              </div>
            </div>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>

        </div>



        <div class="col-lg-12">
          <?php if ($exp == null) : ?>
          <div class="col-lg">
            <div class="row">
              <div class="alert alert-danger col-lg" role="alert">
                Data Pengalaman Belum Diinput.
              </div>

            </div>
          </div>
          <?php else : ?>
          <div class="card card-orange">
            <div class="card-header">
              <h3 class="card-title font-weight-bold text-light">Pengalaman</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>

              </div>
            </div>
            <?php foreach ($exp as $ex) : ?>
            <div class="card-body">
              <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title font-weight-bold">List Pengalaman Kandidat</h3>
                </div>


                <div class="card-body">
                  <div class="row col-lg-12">

                    <div class="form-group col-md-3">
                      <label for="degree">Perusahaan</label>
                      <input type="text" class="form-control" id="company" value="<?= $ex['company'] ?>" readonly>
                    </div>

                    <div class="form-group col-md-5">
                      <label for="institute">Posisi</label>
                      <input type="text" class="form-control" id="position" value="<?= $ex['position_exp'] ?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="major">Tahun Masuk</label>
                      <input type="text" class="form-control" id="year_in_exp"
                        value="<?= date('d F Y', strtotime($ex['year_in_exp'])) ?>" readonly>
                    </div>

                  </div>
                  <div class="row col-lg-12">
                    <div class="col-md-3">
                      <label for="city">Periode Bulan</label>
                      <input type="text" class="form-control" id="month_period" value="<?= $ex['month_period'] ?>"
                        readonly>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-group">
                        <label for="score">Gaji Terakhir</label>
                        <input type="text" class="form-control" id="last_salary" value="<?= $ex['last_salary'] ?>"
                          readonly>
                      </div>

                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="resign">Alasan Resign</label>
                        <input type="text" class="form-control" id="resign" value="<?= $ex['resign'] ?>" readonly>
                      </div>

                    </div>


                  </div>


                </div>

              </div>
            </div>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>



        </div>

        <div class="col-lg-12">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title font-weight-bold">Kontak Darurat Karyawan</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>

              </div>
            </div>

            <div class="card-body">
              <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title font-weight-bold">List Kontak Darurat</h3>
                </div>
                <div class="card-body">
                  <?php foreach ($detailEmergency as $detail) : ?>
                  <div class="row col-lg-12">

                    <div class="form-group col-md-3">
                      <label for="degree">Nama Kontak Darurat</label>
                      <input type="text" class="form-control" id="company" value="<?= $detail['name_emergency'] ?>"
                        readonly>
                    </div>

                    <div class="form-group col-md-5">
                      <label for="institute">No. Handphone Kontak Darurat</label>
                      <input type="text" class="form-control" id="position" value="<?= $detail['phone_emergency'] ?>"
                        readonly>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="major">Hubungan Kontak Darurat</label>
                      <input type="text" class="form-control" id="year_in" value="<?= $detail['relation_emergency'] ?>"
                        readonly>
                    </div>

                  </div>


                  <?php endforeach; ?>
                </div>

              </div>
            </div>

          </div>
        </div>


        <div class="col-lg-12">
          <div class="card card-maroon">
            <div class="card-header">
              <h3 class="card-title font-weight-bold">Data Resign Karyawan</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>

              </div>
            </div>

            <div class="card-body">
              <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title font-weight-bold"><?= $list['fullname'] ?></h3>
                </div>
                <div class="card-body">
                  <?php foreach ($resign_emp as $res) : ?>
                  <div class="row col-lg-12">

                    <div class="form-group col-md-3">
                      <label for="degree">Tanggal Terakhir Kerja</label>
                      <input type="text" class="form-control" id="work_end_date" value="<?= $res['work_end_date'] ?>"
                        readonly>
                    </div>

                    <div class="form-group col-md-5">
                      <label for="institute">Tanggal Resign</label>
                      <input type="text" class="form-control" id="date_resign" value="<?= $res['date_resign'] ?>"
                        readonly>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="major">Keterangan Resign</label>
                      <input type="text" class="form-control" id="resign_status" value="<?= $res['resign_status'] ?>"
                        readonly>
                    </div>

                  </div>


                  <?php endforeach; ?>
                </div>

              </div>
            </div>

          </div>
        </div>

        <div class="col-lg-12">
          <div class="card card-primary collapsed-card">
            <div class="card-header">
              <h3 class="card-title font-weight-bold">Data PKWT/Addendum Karyawan <?= $list['fullname'] ?></h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>

              </div>
            </div>

            <div class="card-body">
              <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title font-weight-bold">Detail PKWT/Addendum</h3>
                </div>
                <?php foreach ($pkwt_add as $pkw) : ?>
                <div class="card-body">
                  <div class="row col-lg-12">

                    <div class="form-group col-md-6">
                      <label for="degree">Nomor PKWT/Addendum</label>
                      <input type="text" class="form-control" id="company" value="<?= $pkw['pkwt_number'] ?>" readonly>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="institute">Tanggal Pembuatan PKWT</label>
                      <input type="text" class="form-control" id="position" value="<?= $pkw['date_pkwt'] ?>" readonly>
                    </div>

                  </div>

                  <div class="row col-lg-12">
                    <div class="form-group col-md-6">
                      <label for="major">Tanggal Awal PKWT</label>
                      <input type="text" class="form-control" id="year_in" value="<?= $pkw['start_of_contract'] ?>"
                        readonly>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="major">Tanggal AKhir PKWT</label>
                      <input type="text" class="form-control" id="year_in" value="<?= $pkw['end_of_contract'] ?>"
                        readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="major">Keterangan PKWT</label>
                    <textarea class="form-control" rows="3" name="desc_pkwt" readonly><?= $pkw['desc_pkwt'] ?>
                      </textarea>
                  </div>


                </div>
                <?php endforeach; ?>

              </div>
            </div>

          </div>
        </div>

        <!-- <div class="col-lg mb-3 d-flex">
          <button type="button" class="btn bg-gradient-indigo " data-toggle="modal" data-target="#ppkwt">
            <i class="fas fa-fw fa-plus-square"></i> Tambah Data Addendum
          </button>
        </div>
        <div class="col-lg-6 mb-3 d-flex justify-content-end">
          <button type="button" class="btn bg-gradient-maroon " data-toggle="modal" data-target="#formresign">
            <i class="fas fa-fw fa-exclamation-triangle"></i> Resign / Blacklist Karyawan
          </button>
        </div> -->





      </div>

    </div>
  </div>


</div>



<!-- Modal -->
<div class="modal fade" id="basic" data-backdrop="static" data-keyboard="false" tabindex="-1"
  aria-labelledby="basicLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="basicLabel">Edit Berkas Basic</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('employee/editbasic/') . $list['id_candidate'] ?>" method="POST">
        <div class="modal-body">
          <div class="card-body">
            <input type="hidden" name="id_candidate" id="id_candidate" value="<?= $list['id_candidate'] ?>">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Lengkap</label>
              <input type="text" class="form-control" name="fullname" value="<?= $list['fullname'] ?>">
              <?= form_error('fullname', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="place_of_birth">Tempat Lahir</label>
              <input type="text" class="form-control" name="place_of_birth" id="place_of_birth"
                value="<?= $list['place_of_birth'] ?>">
              <?= form_error('place_of_birth', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="date_of_birth">Tanggal Lahir</label>
              <input type="date" class="form-control" name="date_of_birth" id="date_of_birth"
                value="<?= $list['date_of_birth'] ?>">
              <?= form_error('date_of_birth', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="phone_number">Nomor Handphone</label>
              <input type="text" class="form-control" name="phone_number" id="phone_number"
                value="<?= $list['phone_number'] ?>">
              <?= form_error('phone_number', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Alamat</label>
              <input type="text" class="form-control" name="domicile" id="domicile" value="<?= $list['domicile'] ?>">
              <?= form_error('domicile', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="gender">Jenis Kelamin</label>
              <select id="gender" name="gender" class="form-control">
                <option selected="selected" value="<?= $list['gender'] ?>"><?= $list['gender'] ?>
                </option>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
              </select>
              <?= form_error('gender', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="last_education">Pendidikan Terakhir</label>
              <input type="text" class="form-control" name="last_education" id="last_education"
                value="<?= $list['last_education'] ?>">
              <?= form_error('last_education', '<small class="text-danger">', '</small>') ?>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Edit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="secondary" data-backdrop="static" data-keyboard="false" tabindex="-1"
  aria-labelledby="secondaryLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="secondaryLabel">Edit Berkas Secondary</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('employee/editsecondary/') . $second['basic_id'] ?>" method="POST">
        <div class="modal-body">
          <div class="card-body">
            <input type="hidden" name="basic_id" value="<?= $second['basic_id'] ?>">
            <div class="form-group">
              <label for="regis_num_candidate">Nomor Induk Kandidat</label>
              <input type="text" class="form-control" name="regis_num_candidate"
                value="<?= $second['regis_num_candidate'] ?>">
              <?= form_error('regis_num_candidate', '<small class="text-danger pl-2">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="place_of_birth">Nomor Induk Kependudukan</label>
              <input type="text" class="form-control" name="regis_num_resident" id="regis_num_resident"
                value="<?= $second['regis_num_resident'] ?>">
              <?= form_error('regis_num_resident', '<small class="text-danger pl-2">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="date_of_birth">Email</label>
              <input type="text" class="form-control" name="email" id="email" value="<?= $second['email'] ?>">
              <?= form_error('email', '<small class="text-danger pl-2">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="religion">Agama</label>
              <select id="religion" name="religion" class="form-control">
                <option selected="selected" value="<?= $second['religion'] ?>"><?= $second['religion'] ?></option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katholik">Katholik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
              </select>
              <?= form_error('religion', '<small class="text-danger pl-2">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Tinggi</label>
              <input type="text" class="form-control" name="tall" id="tall" value="<?= $second['tall'] ?>">
              <?= form_error('tall', '<small class="text-danger pl-2">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Berat</label>
              <input type="text" class="form-control" name="weight" id="weight" value="<?= $second['weight'] ?>">
              <?= form_error('weight', '<small class="text-danger pl-2">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="marital_status">Marital Status</label>
              <select id="inputState" name="marital_status" class="form-control">
                <option selected="selected" value="<?= $second['marital_status'] ?>"><?= $second['marital_status'] ?>
                </option>
                <option value="SG">SG</option>
                <option value="M0">M0</option>
                <option value="M1">M1</option>
                <option value="M2">M2</option>
              </select>
              <?= form_error('marital_status', '<small class="text-danger pl-2">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="postal_code">Kode Pos</label>
              <input type="text" class="form-control" name="postal_code" id="postal_code"
                value="<?= $second['postal_code'] ?>">
              <?= form_error('postal_code', '<small class="text-danger pl-2">', '</small>') ?>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Edit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="infoemp" data-backdrop="static" data-keyboard="false" tabindex="-1"
  aria-labelledby="infoempLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="infoempLabel">Berkas info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('employee/addMoreDataEmp/') . $list['id_candidate'] ?>" method="POST">
        <div class="modal-body">
          <div class="card-body">
            <input type="hidden" name="basic_id" id="basic_id" value="<?= $list['id_candidate'] ?>">
            <div class="row">
              <div class="col form-group">
                <?php if (isset($basicadmin['id_emp']) == null) : ?>
                <label for="exampleInputEmail1">Id Karyawan</label>
                <input type="text" class="form-control" name="id_emp" value="">
                <?= form_error('id_emp', '<small class="text-danger">', '</small>') ?>
                <?php else : ?>
                <label for="exampleInputEmail1">Id Karyawan</label>
                <input type="text" class="form-control" name="id_emp" value="<?= $basicadmin['id_emp'] ?>">
                <?= form_error('id_emp', '<small class="text-danger">', '</small>') ?>
                <?php endif; ?>
              </div>
              <div class="col form-group">
                <?php if (isset($basicadmin['id_privy']) == null) : ?>
                <label for="exampleInputEmail1">Id Privy</label>
                <input type="text" class="form-control" name="id_privy" value="">
                <?= form_error('id_privy', '<small class="text-danger">', '</small>') ?>
                <?php else : ?>
                <label for="exampleInputEmail1">Id Privy</label>
                <input type="text" class="form-control" name="id_privy" value="<?= $basicadmin['id_privy'] ?>">
                <?= form_error('id_privy', '<small class="text-danger">', '</small>') ?>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-group">
              <?php if (isset($basicadmin['cc']) == null) : ?>
              <label for="exampleInputEmail1">CC</label>
              <input type="text" class="form-control" name="cc" value="">
              <?= form_error('cc', '<small class="text-danger">', '</small>') ?>
              <?php else : ?>
              <label for="exampleInputEmail1">CC</label>
              <input type="text" class="form-control" name="cc" value="<?= $basicadmin['cc'] ?>">
              <?= form_error('cc', '<small class="text-danger">', '</small>') ?>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <?php if (isset($basicadmin['branch_company']) == null) : ?>
              <label for="exampleInputEmail1">Kanrep</label>
              <input type="text" class="form-control" name="branch_company" value="">
              <?= form_error('branch_company', '<small class="text-danger">', '</small>') ?>
              <?php else : ?>
              <label for="exampleInputEmail1">Kanrep</label>
              <input type="text" class="form-control" name="branch_company"
                value="<?= $basicadmin['branch_company'] ?>">
              <?= form_error('branch_company', '<small class="text-danger">', '</small>') ?>
              <?php endif; ?>
            </div>
            <div class="row">
              <div class="col form-group">
                <?php if (isset($basicadmin['payroll_one']) == null) : ?>
                <label for="exampleInputEmail1">Payroll 1</label>
                <input type="text" class="form-control" name="payroll_one" value="">
                <?= form_error('payroll_one', '<small class="text-danger">', '</small>') ?>
                <?php else : ?>
                <label for="exampleInputEmail1">Payroll 1</label>
                <input type="text" class="form-control" name="payroll_one" value="<?= $basicadmin['payroll_one'] ?>">
                <?= form_error('payroll_one', '<small class="text-danger">', '</small>') ?>
                <?php endif; ?>
              </div>
              <div class="col form-group">
                <?php if (isset($basicadmin['payroll_two']) == null) : ?>
                <label for="exampleInputEmail1">Payroll 2</label>
                <input type="text" class="form-control" name="payroll_two" value="">
                <?= form_error('payroll_two', '<small class="text-danger">', '</small>') ?>
                <?php else : ?>
                <label for="exampleInputEmail1">Payroll 2</label>
                <input type="text" class="form-control" name="payroll_two" value="<?= $basicadmin['payroll_two'] ?>">
                <?= form_error('payroll_two', '<small class="text-danger">', '</small>') ?>
                <?php endif; ?>
              </div>
            </div>
            <div class="row">
              <div class="col form-group">
                <?php if (isset($basicadmin['address_ktp']) == null) : ?>
                <label for="exampleInputEmail1">Alamat KTP</label>
                <input type="text" class="form-control" name="address_ktp" value="">
                <?= form_error('address_ktp', '<small class="text-danger">', '</small>') ?>
                <?php else : ?>
                <label for="exampleInputEmail1">Alamat KTP</label>
                <input type="text" class="form-control" name="address_ktp" value="<?= $basicadmin['address_ktp'] ?>">
                <?= form_error('address_ktp', '<small class="text-danger">', '</small>') ?>
                <?php endif; ?>
              </div>
              <div class="col form-group">
                <?php if (isset($basicadmin['postal_code_ktp']) == null) : ?>
                <label for="exampleInputEmail1">Kode Pos KTP</label>
                <input type="text" class="form-control" name="postal_code_ktp" value="">
                <?= form_error('postal_code_ktp', '<small class="text-danger">', '</small>') ?>
                <?php else : ?>
                <label for="exampleInputEmail1">Kode Pos KTP</label>
                <input type="text" class="form-control" name="postal_code_ktp"
                  value="<?= $basicadmin['postal_code_ktp'] ?>">
                <?= form_error('postal_code_ktp', '<small class="text-danger">', '</small>') ?>
                <?php endif; ?>
              </div>
            </div>
            <div class="row">
              <div class="col form-group">
                <?php if (isset($basicadmin['no_kk']) == null) : ?>
                <label for="exampleInputEmail1">No Kartu Keluarga</label>
                <input type="text" class="form-control" name="no_kk" value="">
                <?= form_error('no_kk', '<small class="text-danger">', '</small>') ?>
                <?php else : ?>
                <label for="exampleInputEmail1">No Kartu Keluarga</label>
                <input type="text" class="form-control" name="no_kk" value="<?= $basicadmin['no_kk'] ?>">
                <?= form_error('no_kk', '<small class="text-danger">', '</small>') ?>
                <?php endif; ?>
              </div>
              <div class="col form-group">
                <?php if (isset($basicadmin['blood_type']) == null) : ?>
                <label for="exampleInputEmail1">Golongan Darah</label>
                <input type="text" class="form-control" name="blood_type" value="">
                <?= form_error('blood_type', '<small class="text-danger">', '</small>') ?>
                <?php else : ?>
                <label for="exampleInputEmail1">Golongan Darah</label>
                <input type="text" class="form-control" name="blood_type" value="<?= $basicadmin['blood_type'] ?>">
                <?= form_error('blood_type', '<small class="text-danger">', '</small>') ?>
                <?php endif; ?>
              </div>
            </div>

            <div class="row">
              <div class="col form-group">
                <?php if (isset($basicadmin['status_company']) == null) : ?>
                <label for="exampleInputEmail1">Status (M+ / MTA)</label>
                <input type="text" class="form-control" name="status_company" value="">
                <?= form_error('status_company', '<small class="text-danger">', '</small>') ?>
                <?php else : ?>
                <label for="exampleInputEmail1">Status (M+ / MTA)</label>
                <input type="text" class="form-control" name="status_company"
                  value="<?= $basicadmin['status_company'] ?>">
                <?= form_error('status_company', '<small class="text-danger">', '</small>') ?>
                <?php endif; ?>
              </div>
              <div class="col form-group">
                <?php if (isset($basicadmin['surrogate_status']) == null) : ?>
                <label for="exampleInputEmail1">Status Pengganti</label>
                <input type="text" class="form-control" name="surrogate_status" value="">
                <?= form_error('surrogate_status', '<small class="text-danger">', '</small>') ?>
                <?php else : ?>
                <label for="exampleInputEmail1">Status Pengganti</label>
                <input type="text" class="form-control" name="surrogate_status"
                  value="<?= $basicadmin['surrogate_status'] ?>">
                <?= form_error('surrogate_status', '<small class="text-danger">', '</small>') ?>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-group">
              <?php if (isset($basicadmin['type_recruitment']) == null) : ?>
              <label for="exampleInputEmail1">Jenis Rekrutment</label>
              <input type="text" class="form-control" name="type_recruitment" value="">
              <?= form_error('type_recruitment', '<small class="text-danger">', '</small>') ?>
              <?php else : ?>
              <label for="exampleInputEmail1">Jenis Rekrutment</label>
              <input type="text" class="form-control" name="type_recruitment"
                value="<?= $basicadmin['type_recruitment'] ?>">
              <?= form_error('type_recruitment', '<small class="text-danger">', '</small>') ?>
              <?php endif; ?>
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

<!-- Modal -->
<div class="modal fade" id="allow" data-backdrop="static" data-keyboard="false" tabindex="-1"
  aria-labelledby="allowLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="allowLabel">Berkas Bank Dan Lainnya</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('contract/addBankData/') . $list['id_candidate'] ?>" method="POST">
        <div class="modal-body">
          <div class="card-body">
            <input type="hidden" name="basic_id" id="basic_id" value="<?= $list['id_candidate'] ?>">
            <div class="row">
              <div class="col form-group">
                <?php if (isset($secondadmin['allowance_premium']) == null) { ?>
                <label for="exampleInputEmail1">Tunjangan Premium</label>
                <input type="text" class="form-control" name="allowance_premium" value="">
                <?= form_error('allowance_premium', '<small class="text-danger">', '</small>') ?>
                <?php } else { ?>
                <label for="exampleInputEmail1">Tunjangan Premium</label>
                <input type="text" class="form-control" name="allowance_premium"
                  value="<?= $secondadmin['allowance_premium'] ?>">
                <?= form_error('allowance_premium', '<small class="text-danger">', '</small>') ?>
                <?php } ?>
              </div>
              <div class="col form-group">
                <?php if (isset($secondadmin['allowance_others']) == null) : ?>
                <label for="exampleInputEmail1">Tunjangan Lain</label>
                <input type="text" class="form-control" name="allowance_others" value="">
                <?= form_error('allowance_others', '<small class="text-danger">', '</small>') ?>
                <?php else : ?>
                <label for="exampleInputEmail1">Tunjangan Lain</label>
                <input type="text" class="form-control" name="allowance_others"
                  value="<?= $secondadmin['allowance_others'] ?>">
                <?= form_error('allowance_others', '<small class="text-danger">', '</small>') ?>
                <?php endif; ?>
              </div>
            </div>

            <div class="row">
              <div class="col form-group">
                <?php if (isset($secondadmin['placement_city']) == null) : ?>
                <label for="exampleInputEmail1">Kota Penempatan</label>
                <input type="text" class="form-control" name="placement_city" value="">
                <?= form_error('placement_city', '<small class="text-danger">', '</small>') ?>
                <?php else : ?>
                <label for="exampleInputEmail1">Kota Penempatan</label>
                <input type="text" class="form-control" name="placement_city"
                  value="<?= $secondadmin['placement_city'] ?>">
                <?= form_error('placement_city', '<small class="text-danger">', '</small>') ?>
                <?php endif; ?>
              </div>
              <div class="col form-group">
                <?php if (isset($secondadmin['placement_district']) == null) : ?>
                <label for="exampleInputEmail1">Kabupaten Penempatan</label>
                <input type="text" class="form-control" name="placement_district" value="">
                <?= form_error('placement_district', '<small class="text-danger">', '</small>') ?>
                <?php else : ?>
                <label for="exampleInputEmail1">Kabupaten Penempatan</label>
                <input type="text" class="form-control" name="placement_district"
                  value="<?= $secondadmin['placement_district'] ?>">
                <?= form_error('placement_district', '<small class="text-danger">', '</small>') ?>
                <?php endif; ?>
              </div>
            </div>

            <div class="row">
              <div class="col form-group">
                <?php if (isset($secondadmin['type_bank']) == null) : ?>
                <label for="exampleInputEmail1">BANK</label>
                <input type="text" class="form-control" name="type_bank" value="">
                <?= form_error('type_bank', '<small class="text-danger">', '</small>') ?>
                <?php else : ?>
                <label for="exampleInputEmail1">BANK</label>
                <input type="text" class="form-control" name="type_bank" value="<?= $secondadmin['type_bank'] ?>">
                <?= form_error('type_bank', '<small class="text-danger">', '</small>') ?>
                <?php endif; ?>
              </div>
              <div class="col form-group">
                <?php if (isset($secondadmin['account_number']) == null) : ?>
                <label for="exampleInputEmail1">No. Rekening</label>
                <input type="text" class="form-control" name="account_number" value="">
                <?= form_error('account_number', '<small class="text-danger">', '</small>') ?>
                <?php else : ?>
                <label for="exampleInputEmail1">No. Rekening</label>
                <input type="text" class="form-control" name="account_number"
                  value="<?= $secondadmin['account_number'] ?>">
                <?= form_error('account_number', '<small class="text-danger">', '</small>') ?>
                <?php endif; ?>
              </div>
            </div>


            <div class="form-group">
              <?php if (isset($secondadmin['name_of_bank']) == null) : ?>
              <label for="exampleInputEmail1">Bank Atas Nama</label>
              <input type="text" class="form-control" name="name_of_bank" value="">
              <?= form_error('name_of_bank', '<small class="text-danger">', '</small>') ?>
              <?php else : ?>
              <label for="exampleInputEmail1">Bank Atas Nama</label>
              <input type="text" class="form-control" name="name_of_bank" value="<?= $secondadmin['name_of_bank'] ?>">
              <?= form_error('name_of_bank', '<small class="text-danger">', '</small>') ?>
              <?php endif; ?>
            </div>

            <div class="row">
              <div class="col form-group">
                <?php if (isset($secondadmin['bpjs_tk']) == null) : ?>
                <label for="exampleInputEmail1">BPJS Ketenagakerjaan</label>
                <input type="text" class="form-control" name="bpjs_tk" value="">
                <?= form_error('bpjs_tk', '<small class="text-danger">', '</small>') ?>
                <?php else : ?>
                <label for="exampleInputEmail1">BPJS Ketenagakerjaan</label>
                <input type="text" class="form-control" name="bpjs_tk" value="<?= $secondadmin['bpjs_tk'] ?>">
                <?= form_error('bpjs_tk', '<small class="text-danger">', '</small>') ?>
                <?php endif; ?>
              </div>
              <div class="col form-group">
                <?php if (isset($secondadmin['bpjs_ks']) == null) : ?>
                <label for="exampleInputEmail1">BPJS Kesehatan</label>
                <input type="text" class="form-control" name="bpjs_ks" value="">
                <?= form_error('bpjs_ks', '<small class="text-danger">', '</small>') ?>
                <?php else : ?>
                <label for="exampleInputEmail1">BPJS Kesehatan</label>
                <input type="text" class="form-control" name="bpjs_ks" value="<?= $secondadmin['bpjs_ks'] ?>">
                <?= form_error('bpjs_ks', '<small class="text-danger">', '</small>') ?>
                <?php endif; ?>
              </div>

            </div>
            <div class="form-group">
              <?php if (isset($secondadmin['npwp']) == null) : ?>
              <label for="exampleInputEmail1">NPWP</label>
              <input type="text" class="form-control" name="npwp" value="">
              <?= form_error('npwp', '<small class="text-danger">', '</small>') ?>
              <?php else : ?>
              <label for="exampleInputEmail1">NPWP</label>
              <input type="text" class="form-control" name="npwp" value="<?= $secondadmin['npwp'] ?>">
              <?= form_error('npwp', '<small class="text-danger">', '</small>') ?>
              <?php endif; ?>
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

<!-- Modal -->
<div class="modal fade" id="emergency" data-backdrop="static" data-keyboard="false" tabindex="-1"
  aria-labelledby="emergencyLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="emergencyLabel">Form Kontak Darurat Karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('employee/addDataEmergency/') . $list['id_candidate'] ?>" method="POST">
        <div class="modal-body">
          <div class="card-body">
            <input type="hidden" name="basic_id" id="basic_id" value="<?= $list['id_candidate'] ?>">

            <div class="form-group">
              <label for="exampleInputEmail1">Nama Kontak Darurat</label>
              <input type="text" class="form-control" name="name_emergency" value="">
              <?= form_error('name_emergency', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">No. Handphone Darurat</label>
              <input type="text" class="form-control" name="phone_emergency" value="">
              <?= form_error('phone_emergency', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Hubungan Kontak Darurat</label>
              <input type="text" class="form-control" name="relation_emergency" value="">
              <?= form_error('relation_emergency', '<small class="text-danger">', '</small>') ?>
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



<!-- Modal -->
<div class="modal fade" id="ppkwt" data-backdrop="static" data-keyboard="false" tabindex="-1"
  aria-labelledby="ppkwtLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ppkwtLabel">Form Addendum <?= $list['fullname'] ?></h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('employee/addPkwtEmployee/') . $list['id_candidate'] ?>" method="POST">
        <div class="modal-body">
          <div class="card-body">
            <input type="hidden" name="basic_id" id="basic_id" value="<?= $list['id_candidate'] ?>">

            <div class="form-group">
              <label for="exampleInputEmail1">Nomor PKWT</label>
              <input type="text" class="form-control" name="pkwt_number" value="">
              <?= form_error('pkwt_number', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Tanggal PKWT</label>
              <input type="date" class="form-control" name="date_pkwt" value="">
              <?= form_error('date_pkwt', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="row">
              <div class="col form-group">
                <label for="exampleInputEmail1">Tanggal Kontrak Awal PKWT</label>
                <input type="date" class="form-control" name="start_of_contract" value="">
                <?= form_error('start_of_contract', '<small class="text-danger">', '</small>') ?>
              </div>
              <div class="col form-group">
                <label for="exampleInputEmail1">Tanggal Kontrak Akhir PKWT</label>
                <input type="date" class="form-control" name="end_of_contract" value="">
                <?= form_error('end_of_contract', '<small class="text-danger">', '</small>') ?>
              </div>
            </div>
            <div class="form-group">
              <label for="desc_pkwt">Keterangan PKWT</label>
              <textarea class="form-control" id="desc_pkwt" rows="3" name="desc_pkwt"></textarea>
              <?= form_error('desc_pkwt', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="status_pkwt">Status Berkas</label>
              <select id="inputState" name="status_pkwt" class="form-control">
                <option selected="selected" value="Belum Dibalas">
                </option>
                <option value="Belum Dibalas">Belum Dibalas</option>
                <option value="Belum Dibuat">Belum Dibuat</option>
                <option value="Belum Kembali">Belum Kembali</option>
                <option value="Selesai">Selesai</option>

              </select>
              <?= form_error('status_pkwt', '<small class="text-danger pl-2">', '</small>') ?>
            </div>

            <div class="form-group mb-0">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" name="confirm_admin" value="Approved" class="custom-control-input"
                  id="exampleCheck1" checked>
                <label class="custom-control-label" for="exampleCheck1">Approved Addendum</label>
              </div>
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

<!-- Modal -->
<div class="modal fade" id="formresign" data-backdrop="static" data-keyboard="false" tabindex="-1"
  aria-labelledby="formresignLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formresignLabel">Form Resign/Blacklist <?= $list['fullname'] ?></h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('employee/resign_employee/') . $list['id_candidate'] ?>" method="POST">
        <div class="modal-body">
          <div class="card-body">
            <input type="hidden" name="basic_id" id="basic_id" value="<?= $list['id_candidate'] ?>">


            <div class="row">
              <div class="col form-group">
                <label for="exampleInputEmail1">Tanggal Akhir Bekerja</label>
                <input type="date" class="form-control" name="work_end_date" value="">
                <?= form_error('work_end_date', '<small class="text-danger">', '</small>') ?>
              </div>
              <div class="col form-group">
                <label for="exampleInputEmail1">Tanggal Efektif Resign</label>
                <input type="date" class="form-control" name="date_resign" value="">
                <?= form_error('date_resign', '<small class="text-danger">', '</small>') ?>
              </div>
            </div>
            <div class="form-group">
              <label for="desc_pkwt">Keterangan Resign</label>
              <textarea class="form-control" id="desc_resign" rows="3" name="desc_resign"></textarea>
              <?= form_error('desc_resign', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="resign_status">Status Resign</label>
              <select id="inputState" name="resign_status" class="form-control">
                <option selected="selected" value="Mengundurkan Diri">...
                </option>
                <option value="Mengundurkan Diri">Mengundurkan Diri</option>
                <option value="Habis Kontrak">Habis Kontrak</option>
                <option value="Lainnya...">Lainnya...</option>
              </select>
              <?= form_error('resign_status', '<small class="text-danger pl-2">', '</small>') ?>
            </div>

            <div class="form-group">
              <label for="flags_resign">Flag Resign</label>
              <select id="inputState" name="flags_resign" class="form-control">
                <option selected="selected" value="Resign">...
                </option>
                <option value="Resign">Resign</option>
                <option value="Blacklist">Blacklist</option>
              </select>
              <?= form_error('flags_resign', '<small class="text-danger pl-2">', '</small>') ?>
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