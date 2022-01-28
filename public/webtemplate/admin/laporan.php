<?php 
include 'header.php';
?>

<?php
$a = mysql_query("select * from barang_laku");
?>
<style type="text/css">
@import url(font.css);
*{margin:0;padding:0;}
body
{
  color: #fff;
  font-size: 14px;
  font-family: Lobster, Helvetica, Arial, sans-serif;
  background-image: url(img/pencitraanbg.jpg), url();
  background-repeat: repeat, repeat;
}
input{
	padding:10px;
	background:rgba(255,255,255,0.1) repeat;
	min-width:480px;
	border:0;
	font-family: Lobster, Helvetica, Arial, sans-serif;
	color:#000;
	font-size:12px;
	border:3px solid #666666;
	border-radius:8px;
}
h1,h2,h3{text-shadow: 0 0 10px #000;margin: 10px 0;}
.wrapper{margin:0 auto; width:960px;}
.dark-shadow{box-shadow: 0 0 20px #000;}
input:hover{background:rgba(200,75,255,0.1)}
#filters img{margin:10px;cursor:pointer;}
.center{text-align:center;}
</style>
<div class="col-md-10" align="center">
	<table align="center">


<tr><td> <input type="button" value="LAPORAN PRODUK" onclick = "window.open('laporanproduk.php','','width = 1200 height = 1000')"></td></tr>
<tr><td> <input type="button" value="LAPORAN PELANGGAN" onclick = "window.open('laporanpelanggan.php','','width = 1200 height = 1000')"></td></tr>
<tr><td> <input type="button" value="LAPORAN PEMESANAN ONLINE" onclick = "window.open('laporantransaksi2.php','','width = 1200 height = 1000')"></td></tr>
<tr><td> <input type="button" value="LAPORAN PENJUALAN OFFLINE" onclick = "window.open('laporanpenjualan2.php','','width = 1200 height = 1000')"></td></tr>
<tr><td> <input type="button" value="LAPORAN TRANSFER" onclick = "window.open('laporantransfer2.php','','width = 1200 height = 1000')"></td></tr>

</table>
</div>
<!-- kalender -->
<div class="pull-right">
	<div id="kalender"></div>
</div>

<?php 
include 'footer.php';

?>