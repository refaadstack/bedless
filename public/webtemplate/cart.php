<?php include ('title.php');?>

<?php include ('header.php');?>

<!-- 
Body Section 
-->
	<div class="row">
	<div class="span12">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active">Keranjang Belanja</li>
    </ul>
	<div class="well well-small">
		<h1>Keranjang Belanja <small class="pull-right"> 
		<?php if(isset($_SESSION["products"]) && count($_SESSION["products"]) > 0){
				  echo count($_SESSION["products"]);
				  }
		?> Produk di Keranjang Anda </small></h1>
	<hr class="soften"/>	
<script language="javascript">
					function hanyaAngka(e, decimal) {
					var key;
					var keychar;
					 if (window.event) {
						 key = window.event.keyCode;
					 } else
					 if (e) {
						 key = e.which;
					 } else return true;
				   
					keychar = String.fromCharCode(key);
					if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==13) || (key==27) ) {
						return true;
					} else
					if ((("0123456789").indexOf(keychar) > -1)) {
						return true;
					} else
					if (decimal && (keychar == ".")) {
						return true;
					} else return false;
					}
</script>
	<table class="table table-bordered table-condensed">
              <thead>
                <tr>
                  <th>Produk</th>
                  <th>Nama Produk</th>
                  <th>Harga Produk</th>
                  <th>Qty </th>
                  <th>Subtotal</th>
				</tr>
              </thead>
              <tbody>
              <?php
											 
											 $total = 0;
											$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
											if(isset($_SESSION["products"]))
											{
												$total = 0;
												$totalberat = 0;
												
												echo '<div style = "width:800px;float:left;"><ul ">';
												$cart_items = 0;
												$no = 1;
												foreach ($_SESSION["products"] as $cart_itm)
												{
												   $product_code = $cart_itm["code"];
												   $results = mysql_query("SELECT kode_produk, nama_barang as product_name,deskripsi as product_desc ,harga_barang as price ,foto1,berat  FROM produk WHERE kode_produk='$product_code' LIMIT 1");
												   $obj = mysql_fetch_array($results);
											?>
                <tr>
                  <td><img  style = "width:100px" src="<?php echo "admin/$obj[foto1]"; ?>" alt="" /></td>
                  <td><?php echo $obj['product_name'] . " [Ukuran : $cart_itm[size] ]"; ?></td>
                  <td>Rp <?php $cart_itm["price"] ;
				  			echo  number_format($cart_itm["price"],0,',','.'); 
					  ?></td>
                  <td>
                  <?php $query = mysql_query("select * from produk where kode_produk = '$product_code'");
	  					$hsl = mysql_fetch_array($query);	
				  ?>
					<input type="number" name="product_qty" min="1" max="<?php echo $hsl['stok'] ;?>" value="<?php echo $cart_itm["qty"] ; ?>" style="width:136px;" placeholder="Qty" onkeypress="return hanyaAngka(event, false)"/>
				</td>
                  <td>Rp <?php $subtotal = ($cart_itm["price"] * $cart_itm["qty"]);
				  			echo  number_format($subtotal,0,',','.'); 
					  ?></td>
                </tr>
                <?php
											$total = ($total + $subtotal);
											
											$totalberat = $totalberat + ($obj['berat'] * $cart_itm["qty"]) ;
											 	$no++;
											
												echo '<input type="hidden" name="item_qty['.$cart_items.']" value="'.$cart_itm["qty"].'" />';
												echo '<input type="hidden" name="item_name['.$cart_items.']" value="'.$obj['product_name'].'" />';
												echo '<input type="hidden" name="item_code['.$cart_items.']" value="'.$product_code.'" />';
												echo '<input type="hidden" name="item_desc['.$cart_items.']" value="'.$obj['product_desc'].'" />';
											 }
											}else{
												echo 'Keranjang Kosong';
											}
										
		
											?>
                                            <input type="hidden" name="total" value="<?php echo $total;?>"/>
            </tbody>                               
            </table><br/>
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
	<a href="galery.php" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continue Shopping </a>
	<a href="prosescheckout.php" class="shopBtn btn-large pull-right">Next <span class="icon-arrow-right"></span></a>

</div>
</div>
</div>
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
<script>
		var ttlsmua = 0;
		var potongan = 0;
$(function(){
	
	$("#wilayah").change(function() {
		//$("#proses").html("<img src='css/images/ajax-loader.gif'>");
		$.ajax({
		url: "bacaongkir.php?kd=" + this.value, // Url to which the request is send
		type: "GET",             // Type of request to be send, called as method
		//data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
		contentType: false,       // The content type used when sending data to the server.
		cache: true,             // To unable request pages to be cached
		processData:false,        // To send DOMDocument or non processed data file it is set to false
		success: function(data)   // A function to be called if request succeeds
		{
		
		$("#biayakirim").html("Rp. " + addCommas(data) );
		$("#totalbiayakirim").html("Rp. " + addCommas(parseInt(data) * <?php if($totalberat <=0){ echo "1";}else{echo ceil($totalberat);} ?> ) );
		
		ttlsmua = parseInt(<?php echo $total  ?>) + (parseInt(data) * <?php if($totalberat <=0){ echo "1";}else{echo ceil($totalberat);} ?> ) ;
		$("#total").html("Rp. " + addCommas(ttlsmua - potongan) );
		$("#ttl2").val(ttlsmua - potongan);
		
		
		}
		});
		});	
		
	$("#cekvoucher").click(function() {
		//$("#proses").html("<img src='css/images/ajax-loader.gif'>");
		$.ajax({
		url: "bacavoucher.php?kd=" + $("#kodevoucher").val(), // Url to which the request is send
		type: "GET",             // Type of request to be send, called as method
		//data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
		contentType: false,       // The content type used when sending data to the server.
		cache: true,             // To unable request pages to be cached
		processData:false,        // To send DOMDocument or non processed data file it is set to false
		success: function(data)   // A function to be called if request succeeds
		{
			if(data){
				$("#potongan").html("Rp. " + addCommas(parseInt(data)) );
				potongan = parseInt(data);
			}else{
				$("#potongan").html("Voucher Tidak Valid") ;
				potongan = 0;
			}
			$("#ptg").val(potongan);
			$("#total").html("Rp. " + addCommas(ttlsmua - potongan) );
			$("#ttl2").val(ttlsmua - potongan);
		}
		});
		});	
});
</script>
<!-- 
Clients 
-->
<?php include ('footer.php');?>
