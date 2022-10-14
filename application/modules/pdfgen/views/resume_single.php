<html>

<head>
  <style>
  table,
  th,
  td {
    border: 1px solid white;
    border-collapse: collapse;

  }

  td,
  th {
    padding: 5px;
    text-align: left;
  }

  td,
  th {
    text-align: left;
  }

  table {
    border-spacing: 1px;
  }

  * {
    box-sizing: border-box;
  }

  /* Create two unequal columns that floats next to each other */
  .column {
    float: left;
    padding: 10px;
    height: 100px;
    /* Should be removed. Only for demonstration */
  }

  .left {
    width: 80%;
  }

  .right {
    width: 20%;
  }

  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }
  </style>




</head>

<body>

  <br><br>
  <center>
    <h2><b>RESUME PELAMAR</b></h2>
  </center>
  <h3><b>A. IDENTITAS PELAMAR</b></h3>
  <table style="width:100%">
    <tr>
      <td><b>Nama Lengkap</b></td>
      <td>: <?= $list['fullname'] ?></td>
      <td rowspan="7" valign="top"><img src="<?= base_url('assets/uploads/image/candidate-image/') . $list['image'] ?>"
          width="150" /></td>
    </tr>
    <tr>
      <td><b>Tempat/Tanggal Lahir</b></td>
      <td>: <?= $list['place_of_birth'] ?>, <?= date("d-m-Y", strtotime($list['date_of_birth']))  ?></td>
    </tr>
    <tr>
      <td><b>Kota tempat tinggal</b></td>
      <td>: <?= $list['domicile'] ?></td>
    </tr>
    <tr>
      <td><b>Status Perkawinan </b></td>
      <?php if ($second['marital_status'] == 'SG') : ?>
      <td>: Single</td>
      <?php else : ?>
      <td>: Menikah</td>
      <?php endif; ?>
    </tr>
    <tr>
      <td><b>Tinggi Badan</b></td>
      <td>: <?= $second['tall'] ?> cm</td>
    </tr>
    <tr>
      <td><b>Berat Badan</b></td>
      <td>: <?= $second['weight'] ?> kg</td>
    </tr>
  </table>

  <h3><b>B. PENDIDIKAN FORMAL</b></h3>
  <?php foreach ($educate as $ed) : ?>
  <table style="width:100%; text-align:center">
    <tr style="background-color:#eee;">
      <th>Tingkat </th>
      <th>Institut </th>
      <th>Jurusan </th>
      <th>Kota </th>
      <th>Thn.keluar</th>
    </tr>
    <tr>
      <td><?= $ed['degree'] ?></td>
      <td> <?= $ed['institute'] ?></td>
      <td><?= $ed['major'] ?></td>
      <td><?= $ed['city'] ?></td>
      <td><?= $ed['year_out'] ?></td>
    </tr>

  </table>
  <?php endforeach; ?>


  <br></br>
  <h3><b>D. PENGALAMAN KERJA</b></h3>
  <?php foreach ($exp as $ex) : ?>
  <table style="width:100%; text-align: center;">
    <tr style="background-color:#eee;">
      <th>Perusahaan</th>
      <th>Posisi</th>
      <th>Thn Masuk</th>
      <th>Periode(bln)</th>
    </tr>
    <tr>
      <td> <?= $ex['company'] ?></td>
      <td><?= $ex['position'] ?></td>
      <td><?= $ex['year_in'] ?></td>
      <td><?= $ex['month_period'] ?></td>
    </tr>

  </table>
  <?php endforeach; ?>


  <h3><b>E. REKOMENDASI</b></h3>
  <a>
    <?= $list['note_recommend'] ?> </a>
</body>

</html>';