<?php 
include 'config.php';
$kode=$_POST['kode'];
$nama=$_POST['nama'];

mysql_query("insert into jasakirim values('$kode','$nama','')");
header("location:jasapengiriman.php");

 ?>