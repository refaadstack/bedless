<?php 
include 'config.php';
$id_jp=$_POST['id_jp'];
$nama=$_POST['nama'];

mysql_query("update jasakirim set namajp='$nama' where kodejp='$id_jp'");
header("location:jasapengiriman.php");

?>