<?php 
include 'config.php';
$kode=$_GET['kode'];
$id=$_GET['id'];
mysql_query("delete from subkategori where id_subkategori='$id'");
header("location:subkategori.php?id=$kode");

?>