<?php 
include 'config.php';
$user=$_POST['user'];
$lama=$_POST['lama'];
$baru=$_POST['baru'];
$ulang=$_POST['ulang'];

$cek=mysql_query("select * from admin where username='$user'");
while($q=mysql_fetch_array($cek)){
$password=$q['password'];
if($password==$lama){
	if($baru==$ulang){
		mysql_query("update admin set password='$baru' where username='$user'");
		echo "<script>alert('Password Baru Berhasil di Edit'); window.location = 'ganti_pass.php' </script>";
	}else{
		echo "<script>alert('Password Konfirmasi Tidak Sama'); window.location = 'ganti_pass.php' </script>";
	}
}else{
	echo "<script>alert('Password Lama Salah'); window.location = 'ganti_pass.php' </script>";
}}
 ?>