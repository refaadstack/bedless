<?php


include("config.php");
$query = mysql_query("Select right(max(kodemember),9) from member where kodemember like 'M%'");
	$result = mysql_fetch_array($query);
	
	$jumlahrow = mysql_num_rows($query);
	
	if ($result[0] == Null){
		
		$kdpelanggan =  "M000000001";
	
	}else
	{
		$kdpelanggan =  "M" . str_pad(strval($result[0] + 1),9,"0",STR_PAD_LEFT);
		
		
	} 
		$pass = md5($_POST['i']);
		$filenm = "fotoprofil/no-photo.jpg";
		$query = mysql_query("Insert into member values('$kdpelanggan',
															   '$_POST[a]',
															   '$_POST[b]',
															   '$_POST[c]',
															   '$_POST[d]',
															   '$_POST[e]',
															   '$_POST[f]',
															   '$_POST[g]',
															   '$_POST[h]',
															   '$pass',
															   '$filenm',
															   NOW(),'Aktif')") or die ("<script>alert('Gagal Registrasi'); window.location =  'register.php' </script>");

		echo "<script>alert('Terima Kasih. Registrasi Member Berhasil. Silahkan Login untuk memulai berbelanja '); window.location = 'index.php' </script>";
		

?>
