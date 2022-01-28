<?php
session_start();
include("config.php");


if(!isset($_SESSION['kodemember'])){
echo "<script>alert('Login terlebih dahulu');window.location = 'index.php'</script>";
	

}else{


//empty cart by distroying current session
if(isset($_GET["emptycart"]) && $_GET["emptycart"]==1)
{
	$return_url = base64_decode($_GET["return_url"]); //return url
	session_destroy();
	header('Location:'.$return_url);
}

//add item in shopping cart
if(isset($_POST["type"]) && $_POST["type"]=='add')
{
	$product_size 	= filter_var($_POST["ukuran"], FILTER_SANITIZE_STRING); //product code
	$product_code 	= filter_var($_POST["product_code"], FILTER_SANITIZE_STRING); //product code
	$product_qty 	= filter_var($_POST["product_qty"], FILTER_SANITIZE_NUMBER_INT); //product code
	$return_url 	= base64_decode($_POST["return_url"]); //return url
	
	//limit quantity for single product
	if($product_qty <= 0){
		die("
		<script>alert('Masukan quantity produk dengan benar');window.location = '$return_url'</script>");
	}

	//mysql query - get details of item from db using product code
	
	

	$results = mysql_query("SELECT nama_barang, harga_barang, stok FROM produk WHERE kode_produk = '$product_code' LIMIT 1");
	$obj = mysql_fetch_array($results);
	
	if ($results) { //we have the product info 
		$stok=$obj['stok'];
		if($product_qty > $stok ){
		echo "<script>alert('Stok Tidak Cukup');window.location = '$return_url'</script>";
		//header('Location:'.$return_url);
		}else{
			$hargabrg = 0;
			
				$hargabrg = $obj['harga_barang'];
			
		//prepare array for the session variable
		$new_product = array(array('name'=>$obj['nama_barang'], 'code'=>$product_code, 'qty'=>$product_qty, 'price'=>$hargabrg, 'size'=>$product_size));
		
		
		if(isset($_SESSION["products"])) //if we have the session
		{
			$found = false; //set found item to false
			
			foreach ($_SESSION["products"] as $cart_itm) //loop through session array
			{
				if($cart_itm["code"] == $product_code){ //the item exist in array

					$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$product_qty, 'price'=>$cart_itm["price"], 'size'=>$product_size);
					$found = true;
				}else{
					//item doesn't exist in the list, just retrive old info and prepare array for session var
					$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$cart_itm["qty"], 'price'=>$cart_itm["price"], 'size'=>$product_size);
				}
			}
			
			if($found == false) //we didn't find item in array
			{
				//add new user item in array
				$_SESSION["products"] = array_merge($product, $new_product);
			}else{
				//found user item in array list, and increased the quantity
				$_SESSION["products"] = $product;
			}
			
		}else{
			//create a new session var if does not exist
			$_SESSION["products"] = $new_product;
		}
		//redirect back to original page
		echo "<script>alert('Produk Ditambahkan Ke Keranjang');window.location = 'cart.php'</script>";
		}
		
	}
	
	
	//header('Location:'.$return_url);
}


//remove item from shopping cart
if(isset($_GET["removep"]) && isset($_GET["return_url"]) && isset($_SESSION["products"]))
{
	$product_code 	= $_GET["removep"]; //get the product code to remove
	$return_url 	= base64_decode($_GET["return_url"]); //get return url

	
	foreach ($_SESSION["products"] as $cart_itm) //loop through session array var
	{
		if($cart_itm["code"]!=$product_code){ //item does,t exist in the list
			$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$cart_itm["qty"], 'price'=>$cart_itm["price"]);
		}
		
		//create a new product list for cart
		$_SESSION["products"] = $product;
	}
	
	//redirect back to original page
	header('Location:'.$return_url);
}

}
?>