<?php 
include 'config.php';
$id=$_GET['id'];
mysql_query("delete from produk where kode_produk='$id'");
header("location:barang.php");

?>