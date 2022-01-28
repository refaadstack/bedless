<?php 
include 'config.php';
$id_kategori=$_POST['id_kategori'];
$nama=$_POST['nama'];

mysql_query("update kategori set nama_kategori='$nama' where id_kategori='$id_kategori'");
header("location:kategori.php");

?>