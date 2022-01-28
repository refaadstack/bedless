<?php 
include 'config.php';
$kode=$_POST['kode'];
$nama=$_POST['nama'];

mysql_query("insert into kategori values('$kode','$nama')");
header("location:kategori.php");

 ?>