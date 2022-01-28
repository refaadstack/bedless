<?php 
include 'config.php';
$user=$_POST['username'];
$pass=$_POST['password'];
$nama=$_POST['nama'];
$email=$_POST['email'];
$nohp=$_POST['nohp'];

mysql_query("insert into admin values('$user','$pass','$nama','$email','$nohp','admin')");
header("location:admin.php");

 ?>