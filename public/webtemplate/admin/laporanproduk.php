<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/tabel.css"> 
<title>Laporan Produk</title>
</head>

<?php
session_start();
	include("config.php");

	$hari1 = date("j F Y");
?>

<body>
<table width="100%" border = 0 cellspacing = 0>
			<tr >
			<td align =center><p><img src="img/logo.jpg" alt="" width="77" height="55" /> 
			  <h1>Omdut Coffee
			    </p>
		      </h1>
			  <h3>Laporan Produk</h3></td>
	  </tr>
			<tr >
			  <td align="center"> </td>
			  
	  </tr>
			<tr >
            <td align="right"><p>Jumlah Produk : 
              <?php 
			$sql   = "Select * from produk 
			";
			$hasil = mysql_query($sql);
			echo mysql_num_rows($hasil);
			?></p></td>
      </tr>
	</table>
    
<table width="100%" border="1" cellpadding="10" cellspacing = 0 class="bordered">
  <tr>
    <td  align="center">No</td>
	  <td  align="center">Kode Produk</td>
    <td  align="center">Nama Produk</td>
    <td  align="center">Harga</td>
    <td align="center">Berat (Kg)</td>
	
	<td align="center">Stok</td>
  </tr>
 
  <?php
		
	$no = 1;
	$total = 0;
		while($record = mysql_fetch_array($hasil))
		{
	?>
  <tr>
    <td  align="center"><?php echo $no ; ?></td>
    <td  align="center"><?php echo $record['kode_produk'] ; ?></td>
    <td  align="center"><?php echo $record['nama_barang'] ; ?></td>
    <td align="center"><?php echo "Rp." . number_format($record['harga_barang'] ,0,',','.'); ?></td>
	 <td  align="center"><?php echo $record['berat'] ; ?></td>
	
	   <td  align="center"><?php echo $record['stok'] ; ?></td>



<?php $no +=1 ;

} ?>

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
