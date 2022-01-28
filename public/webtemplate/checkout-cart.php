<?php include ('title.php');?>
<?php include ('header.php');?>
<div id="mainBody">
	<div class="container">
	<div class="row">
<?php include('sidebar.php');?>
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active"> Keranjang Belanja</li>
    </ul>
	<?php  if(isset($_SESSION['kodemember'])){
											
											$query = mysql_query("select * from member where kodemember  = '$_SESSION[kodemember]'");
											$row = mysql_fetch_array($query);
										?>
     <?php 	$jumlah_record=mysql_query("SELECT COUNT(*) from pemesanan_temp where kodemember='$_SESSION[kodemember]'");
						$jum=mysql_result($jumlah_record, 0);?>
	<h3>  Produk di Keranjang Anda [ <small><?php echo $jum;?> Item(s) </small>]<?php } ?></h3>	
	<hr class="soft"/>	
	<table class="table table-bordered">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Description</th>
                  <th>Quantity</th>
				  <th>Price</th>
                  <th>Total</th>
				</tr>
              </thead>
              <tbody>
                 <?php $total=0;
$periksa=mysql_query("select p.*, m.* from pemesanan_temp p left join produk m on m.kode_produk=p.kode_produk where p.kodemember='$_SESSION[kodemember]'");
										$no=1;
										while($q=mysql_fetch_array($periksa)){?>
                <tr>
                  <td> <img width="60" src="admin/<?php echo $q['foto1']; ?>" alt=""/></td>
                  <td><?php echo $q['nama_barang']; ?><br/>Description : <?php echo $q['deskripsi']; ?></td>
				  <td><?php echo $q['jumlah'];?></td>
                  <td>Rp <?php echo number_format($q['harga_barang']); ?></td>
                   <?php 
											$hasil = ($q['jumlah'] * $q['harga_barang']);
											$total=$total+$hasil;
											?>
                  <td>Rp <?php echo number_format($hasil);?></td>
                </tr>
                <?php } ?>
				
                <tr>
                  <td colspan="4" style="text-align:right">Subtotal Price:	</td>
                  <td class="label label-important" style="display:block"><strong>Rp <?php echo number_format($total);?></strong></td>
                </tr>
				</tbody>
            </table>
					
			<table class="table table-bordered">
			<thead>
            <th>Data Pengiriman</th>
            <th>Total Biaya Keseluruhan</th>
            </thead>
            
            <tbody>
				 <td>
                 <?php	$query = mysql_query("select * from member where kodemember  = '$_SESSION[kodemember]'");
						$row = mysql_fetch_array($query);
				 ?>
                 
					<form action="" class="form-horizontal" method="post" name="form1" id="form1" enctype="multipart/form-data">
                    
                      <div class="control-group">
						<label class="control-label" for="inputEmail">Nama Penerima :</label>
						<div class="controls">
						  <input type="text" placeholder="Nama Penerima" value="<?php echo $row['namamember']; ?>">
						</div>
					  </div>
                      <div class="control-group">
						<label class="control-label" for="inputEmail">No HP :</label>
						<div class="controls">
						  <input type="text" placeholder="No HP" value="<?php echo $row['nohp']; ?>">
						</div>
					  </div>
					  <div class="control-group">
						<label class="control-label" for="inputEmail">Jasa Pengiriman :</label>
						<div class="controls">
						  <select name="jasakirim" id="jasakirim" class="form-control" onchange="tampilkan()">
                				  <option value='0' selected>- Pilih Jasa Pengiriman -</option>
                                  
                                  <?php
                                  		$prov = mysql_query("SELECT * FROM jasakirim");
										while($hasil = mysql_fetch_array($prov)){
										echo "<option value='$hasil[kodejp]'>$hasil[namajp]</option>";
										} ?>
                        </select>
						</div>
					  </div>
					  <div class="control-group">
						<label class="control-label" for="inputPassword">Wilayah Pengiriman</label>
						<div class="controls">
						  <select name="wilayah"  id="wilayah" class="form-control" required>
                				  <option value='' selected>Pilih Jasa Pengiriman Dulu</option>
                        </select>
						</div>
					  </div>
					</form> 
				  </td>
				 <td width="50%">
                 <div class="cart-total-table">
										<table class="table">
											<tbody>
												<tr class="subtotal">
													<th>Total Berat :</th>
													<td><?php echo number_format($totalberat,2,',','.'); ?> Kg</td>
												</tr>
												<tr class="subtotal">
													<th>Subtotals :</th>
													<td>Rp <?php echo  number_format($total,0,',','.');?></td>
												</tr>
												<tr class="order-total">
													<th>Total Keseluruhan :</th>
													<td>Rp <?php echo  number_format($total,0,',','.');?></td>
												</tr>
											</tbody>
										</table>
									</div>
				  </td>
              </tbody>
            </table> 	
	
</div>
</div></div>
</div>
<!-- MainBody End ============================= -->
<?php include ('footer.php');?>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>
    <script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
    <script>
					function tampilkan(){
  					var kodejp=document.getElementById("form1").jasakirim.value;
  					if (kodejp=="JP0000001")
    				{
        			document.getElementById("wilayah").innerHTML=
					"<?php
                                  		$kat1 = mysql_query("select * from wilayah where kodejp='JP0000001'");
										while($hasil1 = mysql_fetch_array($kat1)){
										echo "<option value='$hasil1[kodewilayah]'>$hasil1[namawilayah]</option>";
										} ?>
					";
    				}
  					else if (kodejp=="JP0000002")
    				{
        			document.getElementById("wilayah").innerHTML=
					"<?php
                                  		$kat1 = mysql_query("select * from wilayah where kodejp='JP0000002'");
										while($hasil1 = mysql_fetch_array($kat1)){
										echo "<option value='$hasil1[kodewilayah]'>$hasil1[namawilayah]</option>";
										} ?>
					";
    				}
					else if (kodejp=="JP0000003")
    				{
        			document.getElementById("wilayah").innerHTML=
					"<?php
                                  		$kat1 = mysql_query("select * from wilayah where kodejp='JP0000003'");
										while($hasil1 = mysql_fetch_array($kat1)){
										echo "<option value='$hasil1[kodewilayah]'>$hasil1[namawilayah]</option>";
										} ?>
					";
    				}
					else if (kodejp=="JP0000004")
    				{
        			document.getElementById("wilayah").innerHTML=
					"<?php
                                  		$kat1 = mysql_query("select * from wilayah where kodejp='JP0000004'");
										while($hasil1 = mysql_fetch_array($kat1)){
										echo "<option value='$hasil1[kodewilayah]'>$hasil1[namawilayah]</option>";
										} ?>
					";
    				}
					else if (kodejp=="JP0000005")
    				{
        			document.getElementById("wilayah").innerHTML=
					"<?php
                                  		$kat1 = mysql_query("select * from wilayah where kodejp='JP0000005'");
										while($hasil1 = mysql_fetch_array($kat1)){
										echo "<option value='$hasil1[kodewilayah]'>$hasil1[namawilayah]</option>";
										} ?>
					";
    				}
					}
					</script>
	
	<!-- Themes switcher section ============================================================================================= -->
<div id="secectionBox">
<link rel="stylesheet" href="themes/switch/themeswitch.css" type="text/css" media="screen" />
<script src="themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>
	<div id="themeContainer">
	<div id="hideme" class="themeTitle">Style Selector</div>
	<div class="themeName">Oregional Skin</div>
	<div class="images style">
	<a href="themes/css/#" name="bootshop"><img src="themes/switch/images/clr/bootshop.png" alt="bootstrap business templates" class="active"></a>
	<a href="themes/css/#" name="businessltd"><img src="themes/switch/images/clr/businessltd.png" alt="bootstrap business templates" class="active"></a>
	</div>
	<div class="themeName">Bootswatch Skins (11)</div>
	<div class="images style">
		<a href="themes/css/#" name="amelia" title="Amelia"><img src="themes/switch/images/clr/amelia.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="spruce" title="Spruce"><img src="themes/switch/images/clr/spruce.png" alt="bootstrap business templates" ></a>
		<a href="themes/css/#" name="superhero" title="Superhero"><img src="themes/switch/images/clr/superhero.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="cyborg"><img src="themes/switch/images/clr/cyborg.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="cerulean"><img src="themes/switch/images/clr/cerulean.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="journal"><img src="themes/switch/images/clr/journal.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="readable"><img src="themes/switch/images/clr/readable.png" alt="bootstrap business templates"></a>	
		<a href="themes/css/#" name="simplex"><img src="themes/switch/images/clr/simplex.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="slate"><img src="themes/switch/images/clr/slate.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="spacelab"><img src="themes/switch/images/clr/spacelab.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="united"><img src="themes/switch/images/clr/united.png" alt="bootstrap business templates"></a>
		<p style="margin:0;line-height:normal;margin-left:-10px;display:none;"><small>These are just examples and you can build your own color scheme in the backend.</small></p>
	</div>
	<div class="themeName">Background Patterns </div>
	<div class="images patterns">
		<a href="themes/css/#" name="pattern1"><img src="themes/switch/images/pattern/pattern1.png" alt="bootstrap business templates" class="active"></a>
		<a href="themes/css/#" name="pattern2"><img src="themes/switch/images/pattern/pattern2.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern3"><img src="themes/switch/images/pattern/pattern3.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern4"><img src="themes/switch/images/pattern/pattern4.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern5"><img src="themes/switch/images/pattern/pattern5.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern6"><img src="themes/switch/images/pattern/pattern6.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern7"><img src="themes/switch/images/pattern/pattern7.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern8"><img src="themes/switch/images/pattern/pattern8.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern9"><img src="themes/switch/images/pattern/pattern9.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern10"><img src="themes/switch/images/pattern/pattern10.png" alt="bootstrap business templates"></a>
		
		<a href="themes/css/#" name="pattern11"><img src="themes/switch/images/pattern/pattern11.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern12"><img src="themes/switch/images/pattern/pattern12.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern13"><img src="themes/switch/images/pattern/pattern13.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern14"><img src="themes/switch/images/pattern/pattern14.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern15"><img src="themes/switch/images/pattern/pattern15.png" alt="bootstrap business templates"></a>
		
		<a href="themes/css/#" name="pattern16"><img src="themes/switch/images/pattern/pattern16.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern17"><img src="themes/switch/images/pattern/pattern17.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern18"><img src="themes/switch/images/pattern/pattern18.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern19"><img src="themes/switch/images/pattern/pattern19.png" alt="bootstrap business templates"></a>
		<a href="themes/css/#" name="pattern20"><img src="themes/switch/images/pattern/pattern20.png" alt="bootstrap business templates"></a>
		 
	</div>
	</div>
</div>
<span id="themesBtn"></span>
</body>
</html><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
