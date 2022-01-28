<?php
session_start();
	
 define ("MAX_SIZE","5000");

 $errors=0;
 
 if($_SERVER["REQUEST_METHOD"] == "POST"){
        
		
		
		$image =$_FILES["file"]["name"];
		$uploadedfile = $_FILES['file']['tmp_name'];

		if ($image) {
			$filename = stripslashes($_FILES['file']['name']);
			$extension = pathinfo($filename);
			$extension = strtolower($extension['extension']);
			if (($extension != "jpg") && ($extension != "jpeg") 
			&& ($extension != "png") && ($extension != "gif")) {
				echo ' Ekstensi Tidak Didukung ';
				$errors=1;
			}else
			{
				$size=filesize($_FILES['file']['tmp_name']);
				if ($size > MAX_SIZE*1024){
					echo "You have exceeded the size limit";
					$errors=1;
				}
				if($extension=="jpg" || $extension=="jpeg" ){
					$uploadedfile = $_FILES['file']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);
				}else if($extension=="png"){
					$uploadedfile = $_FILES['file']['tmp_name'];
					$src = imagecreatefrompng($uploadedfile);
				}else {
					$src = imagecreatefromgif($uploadedfile);
				}
 
				list($width,$height)=getimagesize($uploadedfile);
				$newwidth=640;
				$newheight=426;
				$tmp=imagecreatetruecolor($newwidth,$newheight);

			

				imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
				
				$filename = "fotobukti/". $_POST["kdpsn"] . "." . $extension;
				$flname = "admin/fotobukti/". $_POST["kdpsn"] . "." . $extension;
				imagejpeg($tmp,$flname,100);
				
				imagedestroy($src);
				imagedestroy($tmp);
			}
			
			
		}else{
			$filename = "fotobukti/no_img.png";
			
		}
 }
	
	$link=mysql_connect('localhost','root','') or die ("Database tidak dapat dihubungkan!");
	mysql_select_db('omdut_coffee',$link);
	
	$query = mysql_query("select * from konfirmasi where kodepemesanan = '$_POST[kdpsn]'");
	$jml = mysql_num_rows($query);
	$row = mysql_fetch_array($query);
	if($jml > 0){
	
	$hasil = mysql_query("update konfirmasi set norekening = '$_POST[kdbank]', melalui = '$_POST[media]' where kodekonfirmasi = $row[0]  ");

	}else{
	$hasil = mysql_query("insert into konfirmasi(kodepemesanan, norekening, melalui, fotobukti) values ('$_POST[kdpsn]',  '$_POST[kdbank]', '$_POST[media]','$filename')");
	}
	
	mysql_query("update pemesanan set status = 'Menunggu Konfirmasi' where kodepemesanan = '$_POST[kdpsn]'");
	if($hasil)
	{
		echo "
		<script>alert('Konfirmasi Pembayaran Berhasil');
				window.location.href='lihat_pesanan.php';
			  </script>";
	}
	else
	{
		echo "<script>alert('Konfirmasi Pembayaran Gagal');
					window.location.href='konfirmasi_pembayaran.php?kode=$_POST[kdpsn]';
			  </script>";
	}
?>
