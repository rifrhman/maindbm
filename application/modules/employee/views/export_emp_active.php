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
      <th>Kode POS KTP</th>
      <th>Alamat Saat Ini</th>
      <th>Kode POS Domisili</th>
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
      <th>PKWT</th>
      <th>Tanggal Awal JOIN</th>
      <th>Tanggal Akhir JOIN</th>
      <th>Tanggal PKWT</th>
      <th>Tanggal Awal</th>
      <th>Tanggal Akhir</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php $no = 1;
      foreach ($actived as $i) : ?>
      <td><?= $no++ ?></td>
      <td><?= $i['id_emp'] ?></td>
      <td><?= $i['fullname'] ?></td>

      <?php endforeach; ?>
    </tr>
  </tbody>
</table>