<?php 
include 'config.php';
$kode=$_GET['kode'];
$id=$_GET['id'];
mysql_query("delete from wilayah where kodewilayah='$id'");
header("location:wilayah.php?id=$kode");

?>