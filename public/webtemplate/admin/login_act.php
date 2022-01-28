<?php 
session_start();
include 'config.php';
$username=$_POST['username'];
$password=$_POST['password'];
$query=mysql_query("select * from admin where username='$username' and password='$password'");
if(mysql_num_rows($query)){
	$_SESSION['username']=$username;
	header("location:dashboard.php");
}else{
	header("location:index.php?pesan=gagal");
	// mysql_error();
}
// echo $pas;
 ?>