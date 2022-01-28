<div class="row">
<div id="sidebar" class="span3">
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

<div class="well well-small">
<img src="assets/img/coffee-cup.png" alt="bootstrap sexy shop">
<h3>Kategori</h3>
	<ul class="nav nav-list" style="padding-left:10px;">
        <?php   include('config.php');
				$sql=mysql_query('select * from kategori'); $no=1;
				while($row=mysql_fetch_array($sql)){
		?>
		<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $no; $no++;?>. <?php echo $row['nama_kategori'];?> <b class="caret"></b></a>
        		<ul class="dropdown-menu">
				<?php 
				$kode= $row['id_kategori'];
				$query=mysql_query("select * from subkategori where id_kategori='$kode'");
				while($row1=mysql_fetch_array($query)){?>
                <li><a href="products.php?&id=<?php echo $row1['id_subkategori'];?>">- <?php echo $row1['nama_subkategori'];?></a></li>
                <?php } ?>
                </ul>
        </li>
        <br />
        <?php } ?>
	</ul>
</div>
			  
	</div>