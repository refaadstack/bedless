
<?php
session_start();

include("config.php");

 
$username = $_POST['username'];
$password = $_POST['password'];


$link  	= mysql_query("SELECT * FROM member WHERE username='$username' and password='$password'");
$array	= mysql_fetch_array($link);

$match 	= mysql_num_rows($link);
 
if ($match>0){
			//session_destroy();
			unset($_SESSION['username']);
			$_SESSION['namamember'] = $array['namamember'];
			$_SESSION['kodemember'] = $array['kodemember'];
			
	echo "	<script>alert('Selamat Datang $_SESSION[namamember] ');
			window.location.href='index.php';
			</script>";
			
}
else {
    echo "	<script>alert('Username / Password Anda Tidak Sesuai');
			window.location.href='index.php';
			</script>";   
}
?> 
