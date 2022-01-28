<?php include ('title.php');?>
<?php include ('header.php');?>


<!-- 
Body Section 
-->
<?php include ('sidebar.php');?>

<?php include ('slide.php');?>
	
<!--
New Products
-->
	
	<!--
	Products
	-->
		<div class="well well-small">
		  <h3><a class="btn btn-mini pull-right" href="galery.php" title="View more">VIew More<span class="icon-plus"></span></a>Products  </h3>
		  <hr class="soften"/>
		  <div class="row-fluid">
		  <ul class="thumbnails">
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
		  $sql="select * from produk where stok > 0 $order limit $eu, $limit";
          $rs=mysql_query($sql); $no=1;
          while($row=mysql_fetch_array($rs)){
		  if ($no<4){?>
			<li class="span4">
			  <div class="thumbnail">
				 
				<a class="zoomTool" href="product_details.php?&id=<?php echo $row['kode_produk'];?>" title="add to cart">
                <span class="icon-search"></span> QUICK VIEW</a>
				<a href="product_details.php?&id=<?php echo $row['kode_produk'];?>"><img src="admin/<?php echo $row['foto1'];?>" alt=""></a>
				<div class="caption cntr">
					<p><?php echo $row['nama_barang'];?></p>
					<p><strong>Rp <?php echo number_format($row['harga_barang']);?></strong></p>
					<h4><a class="shopBtn" href="product_details.php?&id=<?php echo $row['kode_produk'];?>" title="add to cart"> Add to cart </a></h4>
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
				<a href="product_details.php?&id=<?php echo $row['kode_produk'];?>"><img src="admin/<?php echo $row['foto1'];?>" width = "1000" height = "1000"/></a>
				<div class="caption cntr">
					<p><?php echo $row['nama_barang'];?><?php $no=2; ?></p>
					<p><strong>Rp <?php echo number_format($row['harga_barang']);?></strong></p>
					<h4><a class="shopBtn" href="product_details.php?&id=<?php echo $row['kode_produk'];?>" title="add to cart"> Add to cart </a></h4>
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
            <?php $no=7; }}?>
		</div>
	</div>
	</div>
	</div>
	
<?php include ('footer.php');?>