<?php include('../admin/koneksi.php'); ?>
<?php include('tglindo.php'); ?>
<html>
<head>
<title>Cetak Data Guru</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../styles/styles_cetak.css" rel="stylesheet" type="text/css">
</head>
<body onLoad="window.print()">
<center><h1>DATA GURU </h1></center>
<center><h1>SMP NEGERI 4 KOTA JAMBI</h1></center>
<b><hr width="50%" align="center"></b>
<?php
	
	$sql="select * from guru where nip='$_GET[id]'";
	$rs=mysql_query($sql); $no=1;
	while($row=mysql_fetch_array($rs)){	 ?>
  <table width="800" border="0" cellpadding="3" cellspacing="1" align="center">
    <tr>
    <td>
      <img src="../admin/img/<?php echo $row['foto']; ?>" width="150" height="200">
    </td>
    </tr>
    <tr>
      <td width="199"><b>NIP</b></td>
      <td width="10"><b>:</b></td>
      <td width="521"><?php echo $row['nip']; ?></td>
    </tr>
    <tr>
      <td><b>Nama</b></td>
      <td><b>:</b></td>
      <td> <?php echo $row['nama']; ?> </td>
    </tr>
    <tr>
      <td><b>Tempat Lahir</b></td>
      <td><b>:</b></td>
      <td> <?php echo $row['tmp_lahir']; ?> </td>
    </tr>
    <tr>
      <td><b>Tanggal Lahir</b></td>
      <td><b>:</b></td>
      <td> <?php echo TanggalIndo($row['tgl_lahir']); ?> </td>
    </tr>
    <tr>
      <td><b>Jenis Kelamin </b></td>
      <td><b>:</b></td>
      <td><?php echo $row['jk']; ?></td>
    </tr>
    <tr>
      <td><b>Golongan</b></td>
      <td><b>:</b></td>
      <td> <?php echo $row['gol']; ?> </td>
    </tr>
    <tr>
      <td><b>Jabatan</b></td>
      <td><b>:</b></td>
      <td> <?php echo $row['jabatan']; ?> </td>
    </tr>
    <tr>
      <td><b>Masa Kerja</b></td>
      <td><b>:</b></td>
      <td> <?php echo $row['masa_thn']; ?> <b>Tahun</b> <?php echo $row['masa_bln']; ?><b> Bulan</b> </td>
    </tr>
    <tr>
      <td><b>Mengajar Kelas</b></td>
      <td><b>:</b></td>
      <td> <?php echo $row['mengajar_kelas']; ?> </td>
    </tr>
    <tr>
      <td><b>Tanggal Bekerja</b></td>
      <td><b>:</b></td>
      <td><?php echo TanggalIndo($row['tgl_bekerja']); ?></td>
    </tr>
    <tr>
      <td><b>Tanggal SK</b></td>
      <td><b>:</b></td>
      <td> <?php echo TanggalIndo($row['tgl_sk']); ?> </td>
    </tr>
    <tr>
      <td><b>Golongan Darah</b></td>
      <td><b>:</b></td>
      <td><?php echo $row['no_sk']; ?></td>
    </tr>
    <tr>
      <td><b>Status</b></td>
      <td><b>:</b></td>
      <td> <?php echo $row['status']; ?> </td>
    </tr>
    <tr>
      <td><b>No Telp</b></td>
      <td><b>:</b></td>
      <td><?php echo $row['notelp']; ?></td>
    </tr>
</table>
<?php } ?>

</body>
</html>
