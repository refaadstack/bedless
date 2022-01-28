<?php 
session_start();
include("config.php");
?>
<!-- 
	Upper Header Section 
-->
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="topNav">
		<div class="container">
			<div class="alignR">
            <?php  if(isset($_SESSION['kodemember'])){
											
											$query = mysql_query("select * from member where kodemember  = '$_SESSION[kodemember]'");
											$row = mysql_fetch_array($query);
										?>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Hallo, 
					<?php 
					echo $row['namamember']; ?><b class="caret"></b>
                    </a><ul class="dropdown-menu">
                    	<li><a href="lihat_pesanan.php"> Lihat Pesanan</a></li>
                        <li><a href="konfirmasi_data.php"> Konfirmasi Pembayaran</a></li>
                        </ul>
                    </li>
                    <a href="#"><?php $namahari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu"); 
			$namabulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
			echo $namahari[date("w")].", ".date("j")." ".$namabulan[date("n")]." ".date("Y"); ?></a>
                    <?php }else{ ?>
                    <a href="#"><?php $namahari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu"); 
			$namabulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
			echo $namahari[date("w")].", ".date("j")." ".$namabulan[date("n")]." ".date("Y"); ?></a>
            <?php } ?>
			</div>
		</div>
	</div>
</div>

<!--
Lower Header Section 
-->
<div class="container">
<div id="gototop"> </div>
<header id="header">
<div class="row">
	<div class="span4">
	<h1>
	<a class="logo" href="index.php"><span>Twitter Bootstrap ecommerce template</span> 
		
	</a>
	</h1>
	</div>
</div>
</header>
<!--
Navigation Bar Section 
-->
<style>
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 12px 16px;
    z-index: 1;
}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </a>
		  <div class="nav-collapse">
			<ul class="nav">
			  <li class=""><a href="index.php">Home</a></li>
              <li class=""><a href="profil.php">Profil</a></li>
              <li class=""><a href="cara_pesan.php">Cara Pesan</a></li>
              <li class=""><a href="galery.php">Galeri</a></li>
              <li class=""><a href="hubungi_kami.php">Hubungi Kami</a></li>
			</ul>          
			<ul class="nav pull-right">
            <form  class="navbar-search pull-left" method="post">
			  <input type="text" placeholder="Search" class="search-query span2">
			</form>
            
             <?php  if(isset($_SESSION['kodemember'])){
											
											$query = mysql_query("select * from member where kodemember  = '$_SESSION[kodemember]'");
											$row = mysql_fetch_array($query);
			?>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
            <span class="icon-shopping-cart"> 
			<?php if(isset($_SESSION["products"]) && count($_SESSION["products"]) > 0){
				  echo count($_SESSION["products"]);
				  }
			?>
            </span></a>
            <ul class="dropdown-menu">
            <?php $total = 0;
				  if(isset($_SESSION["products"]))
				  {
				  $total = 0;
				  $totalberat = 0;
				  $cart_items = 0;
				  foreach ($_SESSION["products"] as $cart_itm)
				  {
				  $product_code = $cart_itm["code"];
				  $results = mysql_query("SELECT nama_barang as product_name,deskripsi as product_desc ,harga_barang as price , foto1, berat FROM produk WHERE kode_produk='$product_code' LIMIT 1");
				  $obj = mysql_fetch_array($results);
			?>
               	  
                  <li class="row span6">
                  <table>
                  <tr align="center">
				  <td width="80">
                  <img src="admin/<?php echo $obj['foto1'] ; ?>" alt="" width="50" height="50" />
                  </td>
                  <td width="300">
                  <h5><?php echo $obj['product_name']; ?></h5>
                  </td>
                  <td width="100">
                  <h5>Rp <?php $subtotal = ($cart_itm["price"] * $cart_itm["qty"]);
				  			echo  number_format($subtotal,0,',','.'); 
					  ?>
                  </h5>
                  </td>
                  <td width="100">
                  <a href="<?php $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
				  echo 'cart_input.php?removep='.$cart_itm["code"] . '&return_url='.$current_url  ; ?>" class="defaultBtn">
				  Delete
                  </a>
                  </td>
                  </tr>
                  </table>
                  <br />
				  <?php  $total = ($total + $subtotal); 
				  }
				  }else{
				  ?>
				  <?php echo '0';
						}
						echo '<input type="hidden" id = "ttl" name="total" value="'. ($total - 20000) .'" />';
				  ?>
                  <div class="cart-total">
                  <h3><span class="lbl">TOTAL : </span> Rp <span><?php echo number_format($total,0,',','.');  ?></span></h3>
                  <a href="cart.php" class="shopBtn">check out</a>
                  </div>
                  </li>
                  </ul>
                  
            <?php }else{ ?>
            <?php } ?> 
            </li>
            
            <?php  if(isset($_SESSION['kodemember'])){
											
											$query = mysql_query("select * from member where kodemember  = '$_SESSION[kodemember]'");
											$row = mysql_fetch_array($query);
										?>
            <li><a href="logout.php"><span class="icon-lock"></span> Logout</a></li>
            <?php }else{ ?>
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="icon-lock"></span> Login <b class="caret"></b></a>
				<div class="dropdown-menu">
				<form action="cek_login_pelanggan.php" class="form-horizontal loginFrm" method="post">
				  <div class="control-group">
					<input type="text" class="span2" name="username" placeholder="Username">
				  </div>
				  <div class="control-group">
					<input type="password" class="span2" name="password" placeholder="Password">
				  </div>
				  <div class="control-group">
					<label class="checkbox">
					<input type="checkbox"> Remember me
					</label>
					<input type="submit" class="shopBtn btn-block"  name="login" value="Login"/>
                    <!--<input type="submit" class="shopBtn btn-block" name="reg" value="Register"/>-->
                  </div>
				</form>
                <form action="register.php" class="form-horizontal loginFrm" method="post">
				  <div class="control-group">

					<input type="submit" class="shopBtn btn-block"  name="Registrasi" value="Registrasi"/>
                  </div>
				</form>
                <?php
    			if(isset($_POST['reg'])){
				echo '<script type="text/javascript">
            	window.location="register.php"
        		</script>';
				}else{
				}?>
				</div>
			</li>
          <?php } ?>
          
			</ul>
		  </div>
		</div>
	  </div>
</div>