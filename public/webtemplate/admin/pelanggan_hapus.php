<?php 
include 'config.php';
$id=$_GET['id'];
mysql_query("delete from member where kodemember='$id'");
header("location:pelanggan.php");

?>