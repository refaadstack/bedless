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
        <?php 	$id=$_GET['id'];
				$sql= mysql_query("select * from produk where id_subkategori = '$id' AND stok > 0");
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
	$limit = 9;                                
	$this1 = $eu + $limit; 
	$back = $eu - $limit; 
	$next = $eu + $limit;
	?>
	<h3>Our Products </h3>
		<div class="row-fluid">
        <?php 	$id=$_GET['id']; ?>
            <!-- Sub Kategori View -->
            <ul class="thumbnails">
          <?php $sql="select * from produk where id_subkategori='$id' AND stok > 0 $order limit $eu, $limit";
          $rs=mysql_query($sql); $no=1;
          while($row=mysql_fetch_array($rs)){?>
		  <?php if ($no!=4){?>
			<li class="span4">
			  <div class="thumbnail">
				<a href="product_details?&id=<?php echo $row['kode_produk'];?>" class="overlay"></a>
				<a class="zoomTool" href="product_details.php?&id=<?php echo $row['kode_produk'];?>" title="add to cart">
                <span class="icon-search"></span> QUICK VIEW</a>
				<a href="product_details.php?&id=<?php echo $row['kode_produk'];?>">
                <img src="admin/<?php echo $row['foto1'];?>" alt=""></a>
				<div class="caption cntr">
					<p><?php echo $row['nama_barang'];?></p>
					<p><strong>Rp <?php echo number_format($row['harga_barang']);?></strong></p>
					<h4><a class="shopBtn" href="#" title="add to cart"> Add to cart </a></h4>
					<div class="actionList">
						<a class="pull-left" href="#">Add to Wish List </a> 
						<a class="pull-left" href="#"> Add to Compare </a>
					</div> 
					<br class="clr">
				</div>
			  </div>
			</li>
            <?php  $no++; }elseif ($no=4){ ?>
		  </ul>
            <ul class="thumbnails">
            <li class="span4">
			  <div class="thumbnail">
				<a href="product_details.php?&id=<?php echo $row['kode_produk'];?>" class="overlay"></a>
				<a class="zoomTool" href="product_details.php?&id=<?php echo $row['kode_produk'];?>" title="add to cart">
                <span class="icon-search"></span> QUICK VIEW</a>
				<a href="product_details.php?&id=<?php echo $row['kode_produk'];?>">
                <img src="admin/<?php echo $row['foto1'];?>" width = "1000" height = "1000"/></a>
				<div class="caption cntr">
					<p><?php echo $row['nama_barang'];?><?php $no=2; ?></p>
					<p><strong>Rp <?php echo number_format($row['harga_barang']);?></strong></p>
					<h4><a class="shopBtn" href="#" title="add to cart"> Add to cart </a></h4>
					<div class="actionList">
						<a class="pull-left" href="#">Add to Wish List </a> 
						<a class="pull-left" href="#"> Add to Compare </a>
					</div> 
					<br class="clr">
				</div>
			  </div>
			</li>
            <?php }else{ ?>
            </ul>
            <ul class="thumbnails">
            <?php $no=1; }}?>

		</div>
        <div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="pagination-area fix">
		<p class="items-shown"><span><?php echo $nume ; ?></span> products of <span><?php echo ceil($nume/$limit) ; ?></span> pages</p>
		<div class="pagination-links">
        <ul>			
			<?php if($nume > $limit ){
				  if($back >=0) { 
				  print "<li>
				  <a href='products.php?&id=$id&start=$back' class='prev'>
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
				  echo "<li><a href='products.php?&id=$id&start=$i'>$l</a></li>  ";
				  } else { 
				  echo "<li class='active'><a href='#'>$l</a></li> ";} 
				  $l=$l+1;
				  }
				  if($this1 < $nume) { 
				  print " <li>
				  <a href='products.php?&id=$id&start=$next' class='next'>
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