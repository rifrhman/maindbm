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
      <th>Nama Karyawan</th>
      <th>Tempat Lahir</th>
      <th>Tgl Lahir</th>
      <th>Alamat Domisili</th>
      <th>No. HP</th>
      <th>Jenis Kelamin</th>
      <th>Pendidikan Terakhir</th>
      <th>No. KTP</th>
      <th>Email</th>
      <th>Agama</th>
      <th>Tinggi Badan</th>
      <th>Berat Badan</th>
      <th>Status Perkawinan</th>
      <th>Kode Pos</th>
      <th>Sertifikat</th>
      <th>Masa Berlaku Sertifikat</th>
      <th>Pendidikan</th>
      <th>Institut/Universitas</th>
      <th>Jurusan</th>
      <th>Kota/Kabupaten</th>
      <th>Nilai/IPK</th>
      <th>Tahun Masuk Pendidikan</th>
      <th>Tahun Keluar Pendidikan</th>
      <th>Perusahaan (Pengalaman)</th>
      <th>Jabatan (Pengalaman)</th>
      <th>Tahun Masuk (Pengalaman)</th>
      <th>Periode Bulan (Pengalaman)</th>
      <th>Gaji Terakhir (Pengalaman)</th>
      <th>Alasan Resign (Pengalaman)</th>
      <th>Nama (Kontak Darurat)</th>
      <th>Nomor Handphone (Kontak Darurat)</th>
      <th>Hubungan (Kontak Darurat)</th>
      <th>Klien</th>
      <th>Posisi/Jabatan</th>
      <th>Tanggal Dikirim Karyawan</th>
      <th>Hasil Kirim Karyawan</th>
      <th>Penempatan Karyawan</th>
      <th>Gaji Karyawan</th>
      <th>Tanggal Mulai Karyawan</th>
      <th>Tanggal Habis Karyawan</th>
      <th>Keterangan Pengiriman Karyawan</th>
      <th>Karyawan Dikirim Oleh</th>
      <th>ID Karyawan</th>
      <th>ID Privy</th>
      <th>CC</th>
      <th>Kanrep</th>
      <th>ID Payroll 1</th>
      <th>ID Payroll 2</th>
      <th>Golongan Darah</th>
      <th>Alamat KTP</th>
      <th>Kode Pos KTP</th>
      <th>Nomor Kartu Keluarga</th>
      <th>Status Perusahaan</th>
      <th>Status Pengganti</th>
      <th>Tipe Recruitment</th>
      <th>Tunjangan Premium</th>
      <th>Tunjangan Lainnya</th>
      <th>Kota Penempatan</th>
      <th>Kabupaten Penempatan</th>
      <th>Bank Karyawan</th>
      <th>Nomor Rekening</th>
      <th>Nama Bank</th>
      <th>BPJS Ketenagakerjaan</th>
      <th>BPJS Kesehatan</th>
      <th>NPWP</th>
      <th>Nomor PKWT</th>
      <th>Tanggal PKWT</th>
      <th>Tanggal Mulai Kontrak PKWT</th>
      <th>Tanggal Akhir Kontrak PKWT</th>
      <th>Deskripsi PKWT</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php $no = 1;
      foreach ($actived as $i) : ?>
      <td><?= $no++ ?></td>
      <td><?= $i['fullname'] ?></td>
      <td><?= $i['place_of_birth'] ?></td>
      <td><?= $i['date_of_birth'] ?></td>
      <td><?= $i['domicile'] ?></td>
      <td>'<?= $i['phone_number'] ?></td>
      <td><?= $i['gender'] ?></td>
      <td><?= $i['last_education'] ?></td>
      <td>'<?= strval($i['regis_num_resident']) ?></td>
      <td><?= $i['email'] ?></td>
      <td><?= $i['religion'] ?></td>
      <td><?= $i['tall'] ?></td>
      <td><?= $i['weight'] ?></td>
      <td><?= $i['marital_status'] ?></td>
      <td><?= $i['postal_code'] ?></td>
      <td><?= $i['certificate'] ?></td>
      <td><?= $i['validity_period'] ?></td>
      <td><?= $i['degree'] ?></td>
      <td><?= $i['institute'] ?></td>
      <td><?= $i['major'] ?></td>
      <td><?= $i['city'] ?></td>
      <td><?= $i['score'] ?></td>
      <td><?= $i['year_in_edu'] ?></td>
      <td><?= $i['year_out_edu'] ?></td>
      <td><?= $i['company'] ?></td>
      <td><?= $i['position_exp'] ?></td>
      <td><?= $i['year_in_exp'] ?></td>
      <td><?= $i['month_period'] ?></td>
      <td><?= $i['last_salary'] ?></td>
      <td><?= $i['resign'] ?></td>
      <td><?= $i['name_emergency'] ?></td>
      <td><?= $i['phone_emergency'] ?></td>
      <td><?= $i['relation_emergency'] ?></td>
      <td><?= $i['client'] ?></td>
      <td><?= $i['position'] ?></td>
      <td><?= $i['date_send'] ?></td>
      <td><?= $i['result_send'] ?></td>
      <td><?= $i['placement'] ?></td>
      <td><?= $i['salary'] ?></td>
      <td><?= $i['start_date'] ?></td>
      <td><?= $i['end_date'] ?></td>
      <td><?= $i['desc_send'] ?></td>
      <td><?= $i['created_by'] ?></td>
      <td><?= $i['id_emp'] ?></td>
      <td><?= $i['id_privy'] ?></td>
      <td><?= $i['cc'] ?></td>
      <td><?= $i['branch_company'] ?></td>
      <td><?= $i['payroll_one'] ?></td>
      <td><?= $i['payroll_two'] ?></td>
      <td><?= $i['blood_type'] ?></td>
      <td><?= $i['address_ktp'] ?></td>
      <td><?= $i['postal_code_ktp'] ?></td>
      <td><?= $i['no_kk'] ?></td>
      <td><?= $i['status_company'] ?></td>
      <td><?= $i['surrogate_status'] ?></td>
      <td><?= $i['type_recruitment'] ?></td>
      <td><?= $i['allowance_premium'] ?></td>
      <td><?= $i['allowance_others'] ?></td>
      <td><?= $i['placement_city'] ?></td>
      <td><?= $i['placement_district'] ?></td>
      <td><?= $i['type_bank'] ?></td>
      <td>'<?= $i['account_number'] ?></td>
      <td><?= $i['name_of_bank'] ?></td>
      <td>'<?= strval($i['bpjs_tk']) ?></td>
      <td>'<?= strval($i['bpjs_ks']) ?></td>
      <td>'<?= strval($i['npwp']) ?></td>
      <td>'<?= strval($i['pkwt_number']) ?></td>
      <td><?= $i['date_pkwt'] ?></td>
      <td><?= $i['start_of_contract'] ?></td>
      <td><?= $i['end_of_contract'] ?></td>
      <td><?= $i['desc_pkwt'] ?></td>
      <?php endforeach; ?>
    </tr>
  </tbody>
</table>