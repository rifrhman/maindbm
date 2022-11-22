<?php

header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">
  <thead>
    <tr>
      <th>No</th>
      <th>Klien</th>
      <th>Nama Karyawan</th>
      <th>Jenis Kelamin</th>
      <th>Jabatan</th>
      <th>Tempat Lahir</th>
      <th>Tgl Lahir</th>
      <th>Start Date</th>
      <th>End Date</th>
      <th>Status</th>
      <th>Gaji Pokok</th>
      <th>Penempatan</th>
      <th>Kabupaten Penempatan</th>
      <th>Kota Penempatan</th>
      <th>Bank</th>
      <th>No Rekening</th>
      <th>Atas Nama</th>
      <th>No. Jamsostek</th>
      <th>No. BPJS Kesehatan</th>
      <th>No. NPWP</th>
      <th>Alamat Email</th>
      <th>Agama</th>
      <th>Gol. Darah</th>
      <th>Alamat Saat Ini</th>
      <th>Kode POS</th>
      <th>No. HP</th>
      <th>No. PKWT</th>
      <th>Tgl PKWT</th>
      <th>No. KTP</th>
      <th>Tingkat Pendidikan</th>
      <th>Jurusan Pendidikan</th>
      <th>Institusi Pendidikan</th>
      <th>Tahun Masuk</th>
      <th>Tahun Keluar</th>
      <th>IPK</th>
      <th>Nama Emergency Contact Person</th>
      <th>HP / Telp Emergency Contact</th>
      <th>Hubungan Kekeluargaan</th>
      <th>Pengalaman Kerja Terakhir (Nama Perusahaan)</th>
      <th>Jabatan</th>
      <th>Tanggal Masuk</th>
      <th>Tanggal Keluar</th>
      <th>Gaji Terakhir</th>
      <th>Alasan Berhenti</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php $no = 1;
      foreach ($in as $i) { ?>
      <td><?= $no++ ?></td>
      <td><?= $i['client'] ?></td>
      <td><?= $i['fullname'] ?></td>
      <td><?= $i['gender'] ?></td>
      <td><?= $i['position'] ?></td>
      <td><?= $i['place_of_birth'] ?></td>
      <td><?= $i['date_of_birth'] ?></td>
      <td><?= $i['start_of_contract'] ?></td>
      <td><?= $i['end_of_contract'] ?></td>
      <td><?= $i['marital_status'] ?></td>
      <td><?= $i['salary'] ?></td>
      <td><?= $i['placement'] ?></td>
      <td><?= $i['placement_district'] ?></td>
      <td><?= $i['placement_city'] ?></td>
      <td><?= $i['type_bank'] ?></td>
      <td><?= $i['account_number'] ?></td>
      <td><?= $i['name_of_bank'] ?></td>
      <td>'<?= strval($i['bpjs_tk']) ?></td>
      <td>'<?= strval($i['bpjs_ks']) ?></td>
      <td>'<?= strval($i['npwp']) ?></td>
      <td><?= $i['email'] ?></td>
      <td><?= $i['religion'] ?></td>
      <td><?= $i['blood_type'] ?></td>
      <td><?= $i['domicile'] ?></td>
      <td><?= $i['postal_code'] ?></td>
      <td><?= $i['phone_number'] ?></td>
      <td><?= $i['pkwt_number'] ?></td>
      <td><?= $i['date_pkwt'] ?></td>
      <td>'<?= strval($i['regis_num_resident']) ?></td>
      <td><?= $i['degree'] ?></td>
      <td><?= $i['major'] ?></td>
      <td><?= $i['institute'] ?></td>
      <td><?= $i['year_in'] ?></td>
      <td><?= $i['year_out'] ?></td>
      <td><?= $i['score'] ?></td>
      <td><?= $i['name_emergency'] ?></td>
      <td><?= $i['phone_emergency'] ?></td>
      <td><?= $i['relation_emergency'] ?></td>
      <td><?= $i['company'] ?></td>
      <td><?= $i['position'] ?></td>
      <td><?= $i['year_in'] ?></td>
      <td><?= $i['last_salary'] ?></td>
      <td><?= $i['resign'] ?></td>
      <?php } ?>
    </tr>
  </tbody>
</table>