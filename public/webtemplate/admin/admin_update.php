<?php 
include 'config.php';
$user=$_POST['user'];
$nama=$_POST['nama'];
$email=$_POST['email'];
$nohp=$_POST['nohp'];

$sql="update admin set nama_lengkap='$nama', email='$email', no_telp='$nohp' where username='$user'";
if(mysql_query($sql)){
		echo "<script>alert('Profil Admin Berhasil di Edit'); window.location = 'admin.php' </script>";
		}else{
		echo "<script>alert('Profil Admin Gagal di Edit'); </script>";
}
?>