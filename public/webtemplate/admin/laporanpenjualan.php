<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/tabel.css"> 
<title>Laporan</title>
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
			  <h1>Omdut Coffee</h1>
			  <h3>Laporan Penjualan Offline</h3>
			  <h3>Periode Bulan : <?php echo $_POST["bulan"] ; ?> Tahun : <?php echo $_POST["tahun"] ; ?></h3></td>
	  </tr>
			<tr >
			  <td align="center"> </td>
			  
	  </tr>
			<tr >
            <td align="right"><p>Jumlah Transaksi : 
              <?php 
			$sql   = "Select a.* ,d.* from detailpenjualanproduk d left join penjualanproduk a on d.kodepenjualan = a.kodepenjualan  
			where Month(tanggal) = $_POST[bulan] And Year(tanggal) = $_POST[tahun]";
			$hasil = mysql_query($sql);
			echo mysql_num_rows($hasil);
			?></p></td>
      </tr>
	</table>
    
<table width="100%" border="1" cellpadding="10" cellspacing = 0 class="bordered">
  <tr>
    <td  align="center">No</td>
	  <td  align="center">Nama Produk</td>
    <td  align="center">Kode Produk</td>
    <td  align="center">Jumlah</td>
    <td align="center">Harga</td>
	<td align="center">Total</td>
	<td align="center">Tanggal Transaksi</td>
  </tr>
 
  <?php
		
	$no = 1;
	$total = 0;
		while($record = mysql_fetch_array($hasil))
		{
	?>
  <tr>
    <td  align="center"><?php echo $no ; ?></td>
    <td  align="center"><?php echo $record['namaproduk'] ; ?></td>
    <td  align="center"><?php echo $record['kodeproduk'] ; ?></td>
    <td  align="center"><?php echo $record['jumlah'] ; ?></td>
    <td align="center"><?php echo "Rp." . number_format($record['harga'] ,0,',','.'); ?></td>
 <td align="center"><?php echo "Rp." . number_format($record['harga'] *  $record['jumlah'],0,',','.') ; ?></td>
 <td align="center"><?php echo $record['tanggal'] ; ?></td><tr>


<?php $no +=1 ;
$total = $total + ($record['harga'] *  $record['jumlah']);
} ?>
<tr> <td align="center" colspan = 5 > TOTAL </td><td align="center" ><?php echo "Rp. " . number_format($total,0,',','.'); ?></td><td></td></tr>
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
