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
      <th>Terakhir Kerja</th>
      <th>Tanggal Keluar</th>
      <th>Catatan Keluar</th>
      <th>Catatan Khusus</th>
      <th>Info</th>
      <th>Maker</th>
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
      <td><?= $i['work_end_date'] ?></td>
      <td><?= $i['date_resign'] ?></td>
      <td><?= $i['resign_status'] ?></td>
      <td><?= $i['desc_resign'] ?></td>
      <td></td>
      <td></td>
      <?php } ?>
    </tr>
  </tbody>
</table>