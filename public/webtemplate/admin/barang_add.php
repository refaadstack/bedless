<?php
session_start();
	error_reporting(1);
	
	
	
	include('config.php');
	$query = mysql_query("Select right(max(kode_produk),9) from produk where kode_produk like 'B%'");
	$result = mysql_fetch_array($query);
	
	$jumlahrow = mysql_num_rows($query);
	
	if ($jumlahrow == 0){
		
		$kdproduk =  "B000000001";
	
	}else
	{
		$kdproduk =  "B" . str_pad(strval($result[0] + 1),9,"0",STR_PAD_LEFT);
		
		
	} 
	
	define ("MAX_SIZE","1000000");

	$errors=0;
	$foto1 = 0;
	$foto2 = 0;
	$foto3 = 0;
	if($_SERVER["REQUEST_METHOD"] == "POST"){
        
		
		
		$image =$_FILES["foto1"]["name"];
		$uploadedfile = $_FILES['foto1']['tmp_name'];

		if ($image) {
			$filename = stripslashes($_FILES['foto1']['name']);
			$extension = pathinfo($filename);
			$extension = strtolower($extension['extension']);
			if (($extension != "jpg") && ($extension != "jpeg") 
			&& ($extension != "png") && ($extension != "gif")) {
				echo ' Ekstensi Tidak Didukung ';
				$errors=1;
			}else
			{
				$size=filesize($_FILES['foto1']['tmp_name']);
				if ($size > MAX_SIZE*1024){
					echo "You have exceeded the size limit";
					$errors=1;
				}
				if($extension=="jpg" || $extension=="jpeg" ){
					$uploadedfile = $_FILES['foto1']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);
				}else if($extension=="png"){
					$uploadedfile = $_FILES['foto1']['tmp_name'];
					$src = imagecreatefrompng($uploadedfile);
				}else {
					$src = imagecreatefromgif($uploadedfile);
				}
 
				list($width,$height)=getimagesize($uploadedfile);
				$newwidth=640;
				$newheight=640;
				$tmp=imagecreatetruecolor($newwidth,$newheight);

			

				imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
				
				$filename1 = "fotoproduk/". $kdproduk . "1." . $extension;
				$path = "fotoproduk/". $kdproduk . "1." . $extension;
				
				imagejpeg($tmp,$path,100);
				
				imagedestroy($src);
				imagedestroy($tmp);
				$foto1 = 1;
			}
		}
		$image2 =$_FILES["foto2"]["name"];
		$uploadedfile = $_FILES['foto2']['tmp_name'];

		if ($image2) {
			$filename = stripslashes($_FILES['foto2']['name']);
			$extension = pathinfo($filename);
			$extension = strtolower($extension['extension']);
			if (($extension != "jpg") && ($extension != "jpeg") 
			&& ($extension != "png") && ($extension != "gif")) {
				echo ' Ekstensi Tidak Didukung ';
				$errors=1;
			}else
			{
				$size=filesize($_FILES['foto2']['tmp_name']);
				if ($size > MAX_SIZE*1024){
					echo "You have exceeded the size limit";
					$errors=1;
				}
				if($extension=="jpg" || $extension=="jpeg" ){
					$uploadedfile = $_FILES['foto2']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);
				}else if($extension=="png"){
					$uploadedfile = $_FILES['foto2']['tmp_name'];
					$src = imagecreatefrompng($uploadedfile);
				}else {
					$src = imagecreatefromgif($uploadedfile);
				}
 
				list($width,$height)=getimagesize($uploadedfile);
				$newwidth=1000;
				$newheight=1000;
				$tmp=imagecreatetruecolor($newwidth,$newheight);

			

				imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
				
				$filename2 = "fotoproduk/". $kdproduk . "2." . $extension;
				$path = "fotoproduk/". $kdproduk . "2." . $extension;
				
				imagejpeg($tmp,$path,100);
				
				imagedestroy($src);
				imagedestroy($tmp);
				$foto2 = 1;
			}
		}
		$image3 =$_FILES["foto3"]["name"];
		$uploadedfile = $_FILES['foto3']['tmp_name'];

		if ($image3) {
			$filename = stripslashes($_FILES['foto3']['name']);
			$extension = pathinfo($filename);
			$extension = strtolower($extension['extension']);
			if (($extension != "jpg") && ($extension != "jpeg") 
			&& ($extension != "png") && ($extension != "gif")) {
				echo ' Ekstensi Tidak Didukung ';
				$errors=1;
			}else
			{
				$size=filesize($_FILES['foto3']['tmp_name']);
				if ($size > MAX_SIZE*1024){
					echo "You have exceeded the size limit";
					$errors=1;
				}
				if($extension=="jpg" || $extension=="jpeg" ){
					$uploadedfile = $_FILES['foto3']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);
				}else if($extension=="png"){
					$uploadedfile = $_FILES['foto3']['tmp_name'];
					$src = imagecreatefrompng($uploadedfile);
				}else {
					$src = imagecreatefromgif($uploadedfile);
				}
 
				list($width,$height)=getimagesize($uploadedfile);
				$newwidth=640;
				$newheight=640;
				$tmp=imagecreatetruecolor($newwidth,$newheight);

			

				imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
				
				$filename3 = "fotoproduk/". $kdproduk . "3." . $extension;
				$path = "fotoproduk/". $kdproduk . "3." . $extension;
				
				imagejpeg($tmp,$path,100);
				
				imagedestroy($src);
				imagedestroy($tmp);
				$foto3 = 1;
			}
		}
	}
	
	if($foto1 == 0){
		$filename1 = "fotoproduk/no_img.png";
	}
	if($foto2 == 0){
		$filename2 = "fotoproduk/no_img.png";
	}
	if($foto3 == 0){
		$filename3 = "fotoproduk/no_img.png";
	}
	$hargabarang = str_replace(",","",$_POST["hargabarang"]);
	
$subkategori=$_POST['subkategori'];
$kode=$_POST['kode'];
$nama=$_POST['nama'];
$harga=$_POST['harga'];
$berat=$_POST['berat'];
$deskripsi=$_POST['deskripsi'];
$stok=$_POST['stok'];
$ukuran=$_POST['ukuran'];

$hasil = mysql_query("insert into produk values('$kdproduk','$subkategori','$nama','$harga','$berat','$deskripsi','$filename1','$filename2','$filename3','$stok',NOW(),'$ukuran')");
if($hasil)
	{
		echo "<script>alert('Data Barang Telah Tersimpan');
			  </script>";
		header("location:barang.php");
	}
	else
	{
		echo "<script>alert('Data Barang Gagal di Simpan');
			  </script>";
	}

 ?>