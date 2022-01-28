<?php 

$rubahfoto1 = 0;
$rubahfoto2 = 0;
$rubahfoto3 = 0;
if(isset($_FILES["foto1"]["name"])){
 define ("MAX_SIZE","5000000");

 $errors=0;
 
 if($_SERVER["REQUEST_METHOD"] == "POST")
 {
        $image =$_FILES["foto1"]["name"];
 $uploadedfile = $_FILES['foto1']['tmp_name'];

  if ($image) 
  {
  $filename1 = stripslashes($_FILES['foto1']['name']);
        $extension = pathinfo($filename1);
  $extension = strtolower($extension['extension']);
 if (($extension != "jpg") && ($extension != "jpeg") 
&& ($extension != "png") && ($extension != "gif")) 
  {
echo ' Unknown Image extension ';
$errors=1;
  }
 else
{
   $size=filesize($_FILES['foto1']['tmp_name']);
 
if ($size > MAX_SIZE*1024)
{
 echo "You have exceeded the size limit";
 $errors=1;
}
 
if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['foto1']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}
else if($extension=="png")
{
$uploadedfile = $_FILES['foto1']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);
}
else 
{
$src = imagecreatefromgif($uploadedfile);
}
 
list($width,$height)=getimagesize($uploadedfile);

$newwidth=640;
$newheight=640;
$tmp=imagecreatetruecolor($newwidth,$newheight);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,
 $width,$height);


$filename1 = "fotoproduk/". $_POST["kode_produk"] .  "1."  . $extension;

imagejpeg($tmp,$filename1,100);


imagedestroy($src);
imagedestroy($tmp);

$rubahfoto1 = 1;

}
}
}
}


if(isset($_FILES["foto2"]["name"])){
 

 $errors=0;
 
 if($_SERVER["REQUEST_METHOD"] == "POST")
 {
        $image =$_FILES["foto2"]["name"];
 $uploadedfile = $_FILES['foto2']['tmp_name'];

  if ($image) 
  {
  $filename2 = stripslashes($_FILES['foto2']['name']);
        $extension = pathinfo($filename2);
  $extension = strtolower($extension['extension']);
 if (($extension != "jpg") && ($extension != "jpeg") 
&& ($extension != "png") && ($extension != "gif")) 
  {
echo ' Unknown Image extension ';
$errors=1;
  }
 else
{
   $size=filesize($_FILES['foto2']['tmp_name']);
 
if ($size > MAX_SIZE*1024)
{
 echo "You have exceeded the size limit";
 $errors=1;
}
 
if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['foto2']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}
else if($extension=="png")
{
$uploadedfile = $_FILES['foto2']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);
}
else 
{
$src = imagecreatefromgif($uploadedfile);
}
 
list($width,$height)=getimagesize($uploadedfile);

$newwidth=640;
$newheight=640;
$tmp=imagecreatetruecolor($newwidth,$newheight);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,
 $width,$height);


$filename2 = "fotoproduk/". $_POST["kode_produk"] . "2."  . $extension;

imagejpeg($tmp,$filename2,100);


imagedestroy($src);
imagedestroy($tmp);

$rubahfoto2 = 1;

}
}
}
}



if(isset($_FILES["foto3"]["name"])){
 

 $errors=0;
 
 if($_SERVER["REQUEST_METHOD"] == "POST")
 {
        $image =$_FILES["foto3"]["name"];
 $uploadedfile = $_FILES['foto3']['tmp_name'];

  if ($image) 
  {
  $filename3 = stripslashes($_FILES['foto3']['name']);
        $extension = pathinfo($filename3);
  $extension = strtolower($extension['extension']);
 if (($extension != "jpg") && ($extension != "jpeg") 
&& ($extension != "png") && ($extension != "gif")) 
  {
echo ' Unknown Image extension ';
$errors=1;
  }
 else
{
   $size=filesize($_FILES['foto3']['tmp_name']);
 
if ($size > MAX_SIZE*1024)
{
 echo "You have exceeded the size limit";
 $errors=1;
}
 
if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['foto3']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}
else if($extension=="png")
{
$uploadedfile = $_FILES['foto2']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);
}
else 
{
$src = imagecreatefromgif($uploadedfile);
}
 
list($width,$height)=getimagesize($uploadedfile);

$newwidth=640;
$newheight=640;
$tmp=imagecreatetruecolor($newwidth,$newheight);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,
 $width,$height);


$filename3 = "fotoproduk/". $_POST["kode_produk"] . "3."  . $extension;

imagejpeg($tmp,$filename3,100);


imagedestroy($src);
imagedestroy($tmp);

$rubahfoto3 = 1;

}
}
}
}

		include("config.php");
		$ft1 = "";
		$ft2 = "";
		$ft3 = "";
		if ($rubahfoto1 == 1){
			$ft1 = "foto1 = '$filename1',";
		}
		if ($rubahfoto2 == 1){
			$ft2 = "foto2 = '$filename2',";
		}
		if ($rubahfoto3 == 1){
			$ft3 = "foto3 = '$filename3',";
		}
		
		$hargabarang = str_replace(",","",$_POST["harga"]); 


$id=$_POST['id'];
$subkategori=$_POST['subkategori'];
$nama=$_POST['nama'];
$harga=$_POST['harga'];
$berat=$_POST['berat'];
$deskripsi=$_POST['deskripsi'];
$stok=$_POST['stok'];
$ukuran=$_POST['ukuran'];


$hasil = mysql_query("update produk set id_subkategori='$subkategori', 
							   nama_barang='$nama', 
							   harga_barang='$harga', 
							   berat='$berat', 
							   deskripsi='$deskripsi', 
							   $ft1 
							   $ft2 
							   $ft3 
							   stok='$stok',
							   ukuran='$ukuran'
							   where kode_produk='$id'")or die ("<script>alert('Data Barang Gagal di Edit'); window.location = 'barang.php' </script>");
							   echo "<script>alert('Data Barang Berhasil di Edit'); window.location = 'barang.php' </script>";
	
?>