<?php 
include 'config.php';
$kode=$_POST['kode'];
$nama=$_POST['nama'];
$jk=$_POST['jeniskelamin'];
$templhr=$_POST['templhr'];
$tgllhr=$_POST['tgllhr'];
$alamat=$_POST['alamat'];
$nohp=$_POST['nohp'];
$email=$_POST['email'];
$user=$_POST['user'];
$pass=$_POST['password'];
$status=$_POST['status'];

if (empty($_POST['password']) && $_POST['password'] == ""){
$query= mysql_query("update member set namamember = '$nama', jeniskelamin = '$jk', tempatlahir = '$templhr', tanggallahir = '$tgllhr', 			alamat = '$alamat',	nohp = '$nohp',	email = '$email', username = '$user', status = '$status' where kodemember = '$kode' ") or die ("<script>alert('Data Pelanggan Gagal Diedit'); window.location = 'pelanggan.php'</script>"); 
			echo "<script>alert('Data Pelanggan Berhasil di Edit'); window.location = 'pelanggan.php' </script>";
}  else	{
$query= mysql_query("update member set
						namamember = '$nama',
						jeniskelamin = '$jk',
						tempatlahir = '$templhr',
						tanggallahir = '$tgllhr',
						alamat = '$alamat',
						nohp = '$nohp',
						email = '$email',
						username = '$user',
						password = '$pass',
						status = '$_POST[status]'
						where kodemember = '$kode' ") or die ("<script>alert('Data Pelanggan Gagal Diedit');</script>");
			echo "<script>alert('Data Pelanggan Berhasil di Edit'); window.location = 'pelanggan.php' </script>";
}?>