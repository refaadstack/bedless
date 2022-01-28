<?php
include("config.php");
$isi = base64_encode($_POST["kontak"]);

$hasil = mysql_query("Update infotoko set info = '$isi' where kodeinfo = 'PD001'");
if ($hasil){
echo "<script>alert('Info Toko Berhasil Diubah');window.location= 'infotoko.php' </script>";
}else
{
echo "<script>alert('Info Toko Gagal Diubah');window.location= 'infotoko.php' </script>";
}
?>