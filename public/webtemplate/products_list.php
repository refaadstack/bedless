<?php include ('title.php');?>
<?php include ('header.php');?>
<!-- 
Body Section 
-->
<?php include ('sidebar.php');?>
<div class="span9">
<ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active">Galeri</li>
    </ul>
<!-- 
New Products
-->
	<div class="well well-small">
    <div class="view-mode">
	<div class="nav">
    <span>View Style:</span>
    <?php 	$id=$_GET['id'];?>
		<a href="products.php?&id=<?php echo $id; ?>" title="Grid"><img src="assets/img/icon/grid.png" style="width:20px;" alt=""></a>
        &nbsp;
		<a href="products_list.php?&id=<?php echo $id; ?>" title="List"><img src="assets/img/icon/list.png" style="width:20px;" alt=""></a>
        <?php 	$sql= mysql_query("select * from produk where id_subkategori = '$id' AND stok > 0");
				$nume = mysql_num_rows($sql);
		?>
        <p class="pull-right">Showing <?php echo $nume ; ?> Results</p>
	</div>
	</div>
        <?php 
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
			$this1 = $eu + $limit; 
			$back = $eu - $limit; 
			$next = $eu + $limit;
			$sql="select * from produk  where id_subkategori='$id' AND stok > 0 $order limit $eu, $limit";
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
            <div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="pagination-area fix">
		<p class="items-shown"><span><?php echo $nume ; ?></span> products of <span><?php echo ceil($nume/$limit) ; ?></span> pages</p>
		<div class="pagination-links">
        <ul>			
			<?php if($nume > $limit ){
				  if($back >=0) { 
				  print "<li>
				  <a href='products_list.php?&id=$id&start=$back' class='prev'>
				  <span><i class='fa fa-angle-left'></i></span>prev
				  </a>
				  </li>"; 
				  } else {
				  print ""; 
				  }
				  $i=0;
				  $l=1;
				  for($i=0;$i < $nume;$i=$i+$limit){
				  if($i <> $eu){
				  echo "<li><a href='products_list.php?&id=$id&start=$i'>$l</a></li>  ";
				  } else { 
				  echo "<li class='active'><a href='#'>$l</a></li> ";} 
				  $l=$l+1;
				  }
				  if($this1 < $nume) { 
				  print " <li>
				  <a href='products_list.php?&id=$id&start=$next' class='next'>
				  next<span><i class='fa fa-angle-right'></i></span>
				  </a>
				  </li>"; 
				  }else{
				  print " ";
				  }
				  }
			 ?> 
        </ul>
		</div>
		</div><!-- /.pagination-area -->
		</div>
		</div>
        
	
	</div>
	</div>
	</div>
<!-- 
Clients 
-->
<?php include ('footer.php');?>
