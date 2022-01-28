<!DOCTYPE html>
<html>
<head>
	<?php 
	session_start();
	include 'cek.php';
	include 'config.php';
	?>
	<title>Omdut Coffee</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.js"></script>
    <script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
    <script type="text/javascript">
tinyMCE.init({
        	// General options
        	mode : "textareas",
        	theme : "advanced",
			width : "800px",
			height : "400px",
});
</script>	
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">Omdut Coffee</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">				
				<ul class="nav navbar-nav navbar-right">
					<li><a id="pesan_sedia" href="#" data-toggle="modal" data-target="#modalpesan"><span class='glyphicon glyphicon-comment'></span>  Pesan</a></li>
					<li><a href="#"><?php $namahari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu"); 
			$namabulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
			echo $namahari[date("w")].", ".date("j")." ".$namabulan[date("n")]." ".date("Y"); ?></a></li>
                    <li><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Hallo, 
					<?php 
					$username=$_SESSION['username'];
					$mysql="select * from admin where username='$username'";
					$rs=mysql_query($mysql);
					while ($row=mysql_fetch_array($rs)){
					echo $row['nama_lengkap'];
					} ?>
                    &nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a>
                    <ul class="dropdown-menu">
                    	<li><a href="admin_edit.php"><span class="glyphicon glyphicon-user"></span> Edit Profil</a></li>
                        <li><a href="ganti_pass.php"><span class="glyphicon glyphicon-lock"></span> Ganti Password</a></li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
                    </li>
				</ul>
			</div>
		</div>
	</div>

	<!-- modal input -->
	<div id="modalpesan" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Pesan Notification</h4>
				</div>
				<div class="modal-body">
					<?php 
					$periksa=mysql_query("select * from produk where stok <=3");
					while($q=mysql_fetch_array($periksa)){	
						if($q['jumlah']<=3){			
							echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $q['nama']."</a> yang tersisa sudah kurang dari 3 . silahkan pesan lagi !!</div>";	
						}
					}
					?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>						
				</div>
				
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="row">
				<div class="col-xs-6 col-md-12">
					<a class="thumbnail">
						<img class="img-responsive" src="foto/kopi2.png">
					</a>
				</div>
		</div>

		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
        	<li><a href="dashboard.php"><span class="glyphicon glyphicon-home"></span>   Dashboard</a></li>
			<li><a href="admin.php"><span class="glyphicon glyphicon-user"></span>  Admin</a></li>
            <li><a href="pelanggan.php"><span class="glyphicon glyphicon-user"></span>  Pelanggan</a></li>
            <li><a href="infotoko.php"><span class="glyphicon glyphicon-list-alt"></span>   Profil Toko</a></li>
            <li><a href="carapesan.php"><span class="glyphicon glyphicon-list-alt"></span>   Cara Pemesanan</a></li>
            <li><a href="kategori.php"><span class="glyphicon glyphicon-book"></span>   Kategori</a></li>			
			<li><a href="barang.php"><span class="glyphicon glyphicon-folder-close"></span>   Data Barang</a></li>
            <li><a href="jasapengiriman.php"><span class="glyphicon glyphicon-map-marker"></span>   Jasa Pengiriman</a></li>
            <li><a href="bank.php"><span class="glyphicon glyphicon-usd"></span>   Bank</a></li>
            <li><a href="pemesanan.php"><span class="glyphicon glyphicon-inbox"></span>   Pemesanan</a></li>
            <!--<li><a href="penjualan.php?page=penjualan&act=tambah"><span class="glyphicon glyphicon-shopping-cart"></span> Entry Penjualan</a></li>-->
            <li><a href="laporan.php"><span class="glyphicon glyphicon-list-alt"></span>   Laporan</a></li>
            <br /><br /><br /><br /><br /><br />        														
		</ul>
	</div>
	<div class="col-md-10">