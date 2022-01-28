<?php 
include 'config.php';
$kode=$_POST['kode'];
$nama=$_POST['nama'];
$nprek=$_POST['nprek'];
$norek=$_POST['norek'];

mysql_query("insert into bank values('$kode','$nama','$nprek','$norek','')");
header("location:bank.php");

 ?>