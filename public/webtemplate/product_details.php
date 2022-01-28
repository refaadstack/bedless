<?php include ('title.php');?>
<?php include ('header.php');?>
<!-- 
Body Section 
-->
<?php include ('sidebar.php');?>
	<div class="span9">
    <ul class="breadcrumb">
    <li><a href="index.php">Home</a> <span class="divider">/</span></li>
    <li><a href="galery.php.">Galeri</a> <span class="divider">/</span></li>
    <li class="active">Detail Produk</li>
    </ul>
<?php $query = mysql_query("select * from produk where kode_produk = '$_GET[id]'");
	  $hsl = mysql_fetch_array($query);	
?>
	<div class="well well-small">
	<div class="row-fluid">
			<div class="span5">
			<div id="myCarousel" class="carousel slide cntr">
                <div class="carousel-inner">
                <?php 
				$foto2= $hsl['foto2'];
				$foto3= $hsl['foto3'];
				if ($foto2=='fotoproduk/no_img.png'){ ?>
                  <div class="item active">
                   <img src="admin/<?php echo $hsl['foto1'] ;?>" alt="">
                  </div>
                <?php }elseif ($foto3=='fotoproduk/no_img.png'){ ?>
                  <div class="item active">
                   <img src="admin/<?php echo $hsl['foto1'] ;?>" alt="">
                  </div>
                  <div class="item">
                   <img src="admin/<?php echo $hsl['foto2'] ;?>" alt="">
                  </div>
                <?php }else { ?>
                  <div class="item active">
                   <img src="admin/<?php echo $hsl['foto1'] ;?>" alt="">
                  </div>
                  <div class="item">
                   <img src="admin/<?php echo $hsl['foto2'] ;?>" alt="">
                  </div>
                  <div class="item">
                   <img src="admin/<?php echo $hsl['foto3'] ;?>" alt="">
                  </div>
                <?php } ?>
                </div>
            </div>
			</div>
			<div class="span7">
				<h3><?php echo strtoupper($hsl['nama_barang'])  ;?> 
                <br \>
                [Rp. <?php echo number_format($hsl['harga_barang'],0,',','.') ;?>]</h3>
				<hr class="soft"/>
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
				<form action="cart_input.php" class="form-horizontal qtyFrm" id = "addcart" method="post">
				  <div class="control-group">
					<label class="control-label"><span>Jumlah</span></label>
					<div class="controls">
                    <input type="hidden" name='type' value="add" />
                    <input type="hidden" name='return_url' value="<?php echo base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);?>" />
                    <input type="hidden" name='product_code' value="<?php echo $hsl['kode_produk'] ;?>">
                    <input type="number" name="product_qty" min="1" max="<?php echo $hsl['stok'] ;?>" value="" style="width:136px;" placeholder="Qty" onkeypress="return hanyaAngka(event, false)"/>
					</div>
				  </div>              
				  <div class="control-group">
					<label class="control-label"><span>Ukuran</span></label>
					<div class="controls">
					  <select onchange = "document.getElementById('jl').value = '1'; var stk = this.value.split('Stok'); if(stk[1] != null){batas = parseInt(stk[1])}; " id = "ukr" name = "ukuran" style = "width :150px" required >
					<?php if ($a = explode(",",  $hsl['ukuran'])) { 
						  foreach ($a as $s) { // each part
						  if ($s) {
						  echo "<option    selected='selected' data-sku='' value='$s'>
							$s </option>";
							}}}?>
                      </select>
					</div>
				  </div>
				  <h4>Stok Produk : <?php echo $hsl['stok'] ;?></h4>
				  <button type="submit" onClick = "document.getElementById('addcart').submit();" class="shopBtn"><span class=" icon-shopping-cart"></span> Add to cart</button>
				</form>
			</div>
			</div>
				<hr class="softn clr"/>


            <ul id="productDetail" class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">Detail Produk</a></li>
              <li class=""><a href="#profile" data-toggle="tab">Produk Serupa</a></li>
            </ul>
            <div id="myTabContent" class="tab-content tabWrapper">
            <div class="tab-pane fade active in" id="home">
			  <h4>Informasi Produk</h4>
                <table class="table table-striped">
				<tbody>
				<tr class="techSpecRow">
                <td>Ukuran</td>
                <td>:</td>
                <td><?php echo $hsl['ukuran'] ;?></td>
                </tr>
				<tr class="techSpecRow">
                <td>Deskripsi Barang</td>
                <td>:</td>
                <td><?php echo $hsl['deskripsi'] ;?></td>
                </tr>
				</tbody>
				</table>
			</div>
			<div class="tab-pane fade" id="profile">
             <?php 
			$id=$hsl['id_subkategori'];
			$kode=$hsl['kode_produk'];
			$order = "order by 1 asc";
			$start =0;
			if(isset($_GET['start'])){
			$start=$_GET['start'];
			}
			if(strlen($start) > 0 and !is_numeric($start)){
			echo "Data Error";
			exit;
			}
			$eu = ($start - 0); 
			$limit = 6;
			$sql="select * from produk where id_subkategori='$id' AND kode_produk!='$kode' AND stok>0 $order limit $eu, $limit";
          $rs=mysql_query($sql); $no=1;
          while($row=mysql_fetch_array($rs)){?> 
			<div class="row-fluid">	
			<div class="span2">
				<img src="admin/<?php echo $row['foto1'] ;?>" alt="" width="200" height="200">
			</div>
			<div class="span6">
				<h5><?php echo $row['nama_barang'] ;?></h5>
				<p>
				<?php echo $row['deskripsi'] ;?>
				</p>
			</div>
			<div class="span4 alignR">
			<form class="form-horizontal qtyFrm">
			<h3>Rp. <?php echo number_format($row['harga_barang'],0,',','.') ;?></h3>
			<div class="btn-group">
			  <a href="product_details.php?&id=<?php echo $row['kode_produk'];?>" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
			  <a href="product_details.php?&id=<?php echo $row['kode_produk'];?>" class="shopBtn">VIEW</a>
			 </div>
				</form>
			</div>
		</div>
			<hr class="soft"/>
            <?php } ?>
			</div>
            </div>
</div>
</div>
</div> <!-- Body wrapper -->
<!-- 
Clients 
-->
<?php include ('footer.php');?>