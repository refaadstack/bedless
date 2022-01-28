<?php 
include 'config.php';
$kode=$_POST['kode'];
$nama=$_POST['nama'];
$jk=$_POST['jk'];
$templhr=$_POST['templhr'];
$tgllhr=$_POST['tgllhr'];
$alamat=$_POST['alamat'];
$nohp=$_POST['nohp'];
$email=$_POST['email'];
$user=$_POST['username'];
$pass=$_POST['password'];
$filenm = "fotoprofil/no-photo.jpg";

mysql_query("insert into member values('$kode',
										'$nama',
										'$jk',
										'$templhr',
										'$tgllhr',
										'$alamat',
										'$nohp',
										'$email',
										'$user',
										'$pass',
										'$filenm',
										NOW(),'Aktif')") or die ("<script>alert('Akun Gagal Dibuat'); window.location =  'pelanggan.php' </script>");
										echo "<script>alert('Pelanggan Berhasil ditambah'); window.location = 'pelanggan.php' </script>";


 ?>