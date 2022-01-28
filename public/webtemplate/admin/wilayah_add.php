<?php 
include 'config.php';
$id=$_POST['id'];
$kode=$_POST['kode'];
$nama=$_POST['nama'];
$ongkir=$_POST['ongkir'];

mysql_query("insert into wilayah values('$kode','$id','$nama','$ongkir')");
header("location:wilayah.php?id=$id");

 ?>