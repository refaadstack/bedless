<?php 
include 'config.php';
$id=$_GET['id'];
mysql_query("delete from kategori where id_kategori='$id'");
header("location:kategori.php");

?>