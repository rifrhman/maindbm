<?php

// header("Content-type: application/vnd-ms-excel");

// header("Content-Disposition: attachment; filename=$title.xls");

// header("Pragma: no-cache");


header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment;filename=$title.xls");
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');
header('Cache-Control: cache, must-revalidate');
header('Pragma: public');
header("Expires: 0");

?>

<table border="1" width="100%">
  <thead>
    <tr>
      <th>No</th>
      <th>ID Karyawan</th>
      <th>Klien</th>
      <th>CC</th>
      <th>Kanrep</th>
      <!-- Status MTA / M+ -->
      <th>Status</th>
      <th>ID Payroll 1</th>
      <th>ID Payroll 2</th>
      <th>ID Privy</th>
      <!-- status pengganti -->
      <th>Status Karyawan</th>
      <!-- rekrutan dari mutual atau client -->
      <th>Rekrutmen</th>
      <th>Nama Karyawan</th>
      <th>Jenis Kelamin</th>
      <th>Jabatan</th>
      <th>Tempat Lahir</th>
      <th>Tanggal Lahir</th>
      <th>Status Pernikahan</th>
      <th>Gaji Pokok</th>
      <th>Tunjangan Premium</th>
      <th>Tunjangan Lain-lain</th>
      <th>Penempatan</th>
      <th>Kota Penempatan</th>
      <th>Kabupaten Penempatan</th>
      <th>Bank</th>
      <th>Nomor Rekening</th>
      <th>Atas Nama</th>
      <th>No. BPJS Ketenagakerjaan</th>
      <th>No. BPJS Kesehatan</th>
      <th>No. NPWP</th>
      <th>Alamat Email</th>
      <th>Agama</th>
      <th>Gol. Darah</th>
      <th>Alamat Sesuai KTP</th>
      <th>Kode POS</th>
      <th>Alamat Saat Ini</th>
      <th>Nomor Handphone</th>
      <th>Nomor Kartu Keluarga</th>
      <th>Nomor KTP</th>
      <th>Tingkat Pendidikan Akhir</th>
      <th>Jurusan</th>
      <th>Institusi</th>
      <th>Tahun Masuk</th>
      <th>Tahun Keluar</th>
      <th>IPK</th>
      <th>Nama Emergency Contract Person</th>
      <th>HP / Telp Emergency Contract Person</th>
      <th>Hubungan Keluarga</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1;
    foreach ($actived as $i) : ?>
    <tr>
      <td><?= $no++ ?></td>
      <td>'<?= $i['id_emp'] ?></td>
      <td><?= $i['client'] ?></td>
      <td><?= $i['cc'] ?></td>
      <td><?= $i['branch_company'] ?></td>
      <td><?= $i['status_company'] ?></td>
      <td>'<?= $i['payroll_one'] ?></td>
      <td>'<?= $i['payroll_two'] ?></td>
      <td>'<?= $i['id_privy'] ?></td>
      <td><?= $i['surrogate_status'] ?></td>
      <td><?= $i['type_recruitment'] ?></td>
      <td><?= $i['fullname'] ?></td>
      <td><?= $i['gender'] ?></td>
      <td><?= $i['position'] ?></td>
      <td><?= $i['place_of_birth'] ?></td>
      <td><?= $i['date_of_birth'] ?></td>
      <td><?= $i['marital_status'] ?></td>
      <td>'<?= $i['salary'] ?></td>
      <td><?= $i['allowance_premium'] ?></td>
      <td><?= $i['allowance_others'] ?></td>
      <td><?= $i['placement'] ?></td>
      <td><?= $i['placement_city'] ?></td>
      <td><?= $i['placement_district'] ?></td>
      <td><?= $i['type_bank'] ?></td>
      <td>'<?= $i['account_number'] ?></td>
      <td><?= $i['name_of_bank'] ?></td>
      <td>'<?= $i['bpjs_tk'] ?></td>
      <td>'<?= $i['bpjs_ks'] ?></td>
      <td>'<?= $i['npwp'] ?></td>
      <td><?= $i['email'] ?></td>
      <td><?= $i['religion'] ?></td>
      <td><?= $i['blood_type'] ?></td>
      <td><?= $i['address_ktp'] ?></td>
      <td><?= $i['postal_code_ktp'] ?></td>
      <td><?= $i['domicile'] ?></td>
      <td>'<?= $i['phone_number'] ?></td>
      <td>'<?= $i['no_kk'] ?></td>
      <td>'<?= $i['regis_num_resident'] ?></td>
      <td><?= $i['degree'] ?></td>
      <td><?= $i['major'] ?></td>
      <td><?= $i['institute'] ?></td>
      <td><?= $i['year_in_edu'] ?></td>
      <td><?= $i['year_out_edu'] ?></td>
      <td><?= $i['score'] ?></td>
      <td><?= $i['name_emergency'] ?></td>
      <td>'<?= $i['phone_emergency'] ?></td>
      <td><?= $i['relation_emergency'] ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>