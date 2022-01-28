<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/tabel.css"> 
<title>Laporan Pelanggan</title>
</head>

<?php
session_start();
	include("config.php");

	$hari1 = date("j F Y");
?>
<?php include('cetak/tglindo.php'); ?>
<body>
<table width="100%" border = 0 cellspacing = 0>
			<tr >
			<td align =center><p><img src="img/logo.jpg" alt="" width="77" height="55" /> 
			  <h1>Omdut Coffee</h1>
			  <h3>Laporan Pelanggan</h3></td>
	  </tr>
			<tr >
			  <td align="center"> </td>
			  
	  </tr>
			<tr >
            <td align="right"><p>Jumlah Pelanggan : <?php 
			$sql   = "Select * from member ";
			$hasil = mysql_query($sql);
			echo mysql_num_rows($hasil);
			?></p></td>
      </tr>
	</table>
    
<table width="100%" border="1" cellpadding="10" cellspacing = 0 class="bordered">
  <tr>
    <td  align="center">No</td>
    <td  align="center">Nama Lengkap</td>
    <td  align="center">Tempar, Tanggal lahir</td>
    <td  align="center">Alamat</td>
    <td align="center">E-Mail</td>
    <td  align="center">Nomor HP</td>
  </tr>

  <?php
		
	$no = 1;
		while($record = mysql_fetch_array($hasil))
		{
	?>
  <tr>
    <td  align="center"><?php echo $no ; ?></td>
    <td  align="center"><?php echo $record['namamember'] ; ?></td>
    <td  align="center"><?php echo $record['tempatlahir'] ; ?>, <?php echo TanggalIndo($record['tanggallahir']) ; ?></td>
    <td  align="center"><?php echo $record['alamat'] ; ?></td>
    <td  align="center"><?php echo $record['email'] ; ?></td>
    <td align="center"><?php echo $record['nohp'] ; ?></td>

<?php $no +=1 ;} ?>
</table>
<br>
<br>
<h5 align ="right">Jambi, <?php echo $hari1; ?></h5>
<p align ="right">&nbsp;</p>
<p align ="right"><?php 
					$username=$_SESSION['username'];
					$mysql="select * from admin where username='$username'";
					$rs=mysql_query($mysql);
					while ($row=mysql_fetch_array($rs)){
					echo $row['nama_lengkap'];
					} ?><br />
</p>

 			<p>
         
            </p>
<script> print();</script>
</body>

</html>
