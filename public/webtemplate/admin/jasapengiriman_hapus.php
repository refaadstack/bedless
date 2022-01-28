<?php 
include 'config.php';
$id=$_GET['id'];
mysql_query("delete from jasakirim where kodejp='$id'");
header("location:jasapengiriman.php");

?>