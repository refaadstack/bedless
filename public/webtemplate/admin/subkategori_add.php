<?php 
include 'config.php';
$id=$_POST['id'];
$kode=$_POST['kode'];
$nama=$_POST['nama'];

mysql_query("insert into subkategori values('$kode','$id','$nama')");
header("location:subkategori.php?id=$id");

 ?>