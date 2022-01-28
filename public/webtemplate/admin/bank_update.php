<?php 
include 'config.php';
$id_bank=$_POST['id_bank'];
$nama=$_POST['nama'];
$nprek=$_POST['nprek'];
$norek=$_POST['norek'];

mysql_query("update bank set namabank='$nama', namapemilikakun='$nprek', rekening='$norek' where kodebank='$id_bank'");
header("location:bank.php");

?>