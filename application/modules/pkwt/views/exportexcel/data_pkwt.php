<?php
header("Content-type:application/octet-stream/");

header("Content-Disposition:attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>
<style>
h2,
h5,
table {
  font-family: Arial, Helvetica, sans-serif;
}
</style>

<h5>Laporan Pada Tanggal : <?= date('d F Y') ?></h5>

<table border="1" width="100%">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Nomor PKWT</th>
      <th>Client</th>
      <th>Tanggal PKWT</th>
      <th>Tanggal Awal PKWT</th>
      <th>Tanggal Akhir PKWT</th>
      <th>Keterangan PKWT</th>
      <th>Status PKWT</th>
    </tr>
  </thead>
  <?php $no = 1;
  foreach ($all as $pk_add) : ?>
  <tbody>
    <tr>
      <td><?= $no++; ?></td>
      <td><?= $pk_add['fullname'] ?></td>
      <td><?= $pk_add['pkwt_number'] ?></td>
      <td><?= $pk_add['client'] ?></td>
      <td><?= $pk_add['date_pkwt'] ?></td>
      <td><?= $pk_add['start_of_contract'] ?></td>
      <td><?= $pk_add['end_of_contract'] ?></td>
      <td><?= $pk_add['desc_pkwt'] ?></td>
      <td><?= $pk_add['status_pkwt'] ?></td>
    </tr>
  </tbody>
  <?php endforeach; ?>
</table>