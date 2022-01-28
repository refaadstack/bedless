<?php
session_start();
include("config.php");
if(!isset($_SESSION["products"])){
echo "<script>alert('Keranjang Kosong');window.location = 'index.php'</script>";
	
}
if(!isset($_SESSION["kodemember"])){
echo "<script>alert('Login Terlebih Dahulu');window.location = 'index.php'</script>";
	
}
//empty cart by distroying current session
$query = mysql_query("Select right(max(kodepemesanan),9) from pemesanan where kodepemesanan like 'P%'");
	$result = mysql_fetch_array($query);
	
	$jumlahrow = mysql_num_rows($query);
	
	if ($jumlahrow == 0){
		
		$kdpesan =  "P000000001";
	
	}else
	{
		$kdpesan =  "P" . str_pad(strval($result[0] + 1),9,"0",STR_PAD_LEFT);
		
		
	} 

$proses = mysql_query("Insert into pemesanan values ('$kdpesan','$_SESSION[kodemember]','$_POST[nama]','$_POST[alamat]','$_POST[notelp]','$totalharga','Pemesanan Baru',now(),'$_POST[kodewilayah]','','$_POST[kodevoucher]','$_POST[potongan]');");

	if(isset($_SESSION["products"]))
    {
		foreach ($_SESSION["products"] as $cart_itm)
        {
			$query = mysql_query("Select nama_barang from produk where kode_produk  = '$cart_itm[code]'");
			$result = mysql_fetch_array($query);
			mysql_query("insert into detailpemesanan(kodepemesanan,kodeproduk,nama,jumlah,harga,ukuran) values('$kdpesan','$cart_itm[code]','$result[nama_barang]', $cart_itm[qty], '$cart_itm[price]', '$cart_itm[size]') ");
			
			$stk = explode("Stok",$cart_itm['size']);
			$stklama = $cart_itm['size'];
			if(isset($stk[1])){
				$jmlstok = (int)$stk[1] - $cart_itm['qty'];
				mysql_query("Update produk set ukuran = replace(ukuran,'$stklama','$stk[0] Stok $jmlstok') where kode_produk = '$cart_itm[code]' ");
			}
			mysql_query("Update produk set stok = stok - $cart_itm[qty] where kode_produk = '$cart_itm[code]' ");
		}
	}
	
	if($proses){
		unset($_SESSION['products']); 
		echo "<script>alert('Check Out Berhasil'); window.location = 'index.php';</script>";
	}
?>