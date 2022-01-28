<?php
include("config.php");
$isi = base64_encode($_POST["kontak1"]);

$hasil1 = mysql_query("Update cara_pesan set caranya = '$isi' where id_cara = 'CP001'");
if ($hasil1){
echo "<script>alert('Cara Pemesanan Berhasil Diubah');window.location= 'carapesan.php' </script>";
}else
{
echo "<script>alert('Cara Pemesanan Gagal Diubah');window.location= 'carapesan.php' </script>";
}
?>