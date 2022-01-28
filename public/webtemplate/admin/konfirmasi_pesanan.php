<?php 
session_start();
include('config.php');
$resi=$_POST['resi'];

	if($resi==""){
	$hasil = mysql_query("update pemesanan set Status = '$_POST[status]', noresi = '-' where kodepemesanan = '$_POST[kdpsn]'  ");
	}else{
	$hasil2 = mysql_query("update pemesanan set Status = '$_POST[status]', noresi = '$_POST[resi]' where kodepemesanan = '$_POST[kdpsn]'  ");
	}
	if($hasil)
	{
		echo "
		<script>alert('Konfirmasi telah disimpan');
				window.location.href='pemesanan.php';
			  </script>";
	}
	else
	{
		echo "<script>alert('Konfirmasi Gagal disimpan');
					window.location.href='pemesanan_detail.php?id=$_POST[kdpsn]';
			  </script>";
	}
?>
