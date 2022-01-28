<?php 
include 'config.php';
$id=$_GET['id'];
mysql_query("delete from bank where kodebank='$id'");
header("location:bank.php");

?>