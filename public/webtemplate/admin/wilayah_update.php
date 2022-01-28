<?php 
include 'config.php';
$id=$_POST['id'];
$id_wilayah=$_POST['id_wilayah'];
$kodejp=$_POST['jasapengiriman'];
$nama=$_POST['nama'];
$ongkir=$_POST['ongkir'];

mysql_query("update wilayah set kodejp='$kodejp', namawilayah='$nama',ongkir='$ongkir' where kodewilayah='$id_wilayah'");
$id=$kodejp;
header("location:wilayah.php?id=$id");

?>