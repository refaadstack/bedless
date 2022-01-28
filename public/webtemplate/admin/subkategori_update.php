<?php 
include 'config.php';
$id=$_POST['id'];
$id_subkategori=$_POST['id_subkategori'];
$nama=$_POST['nama'];

mysql_query("update subkategori set nama_subkategori='$nama' where id_subkategori='$id_subkategori'");
header("location:subkategori.php?id=$id");

?>