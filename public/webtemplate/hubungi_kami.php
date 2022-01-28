<?php include ('title.php');?>

<?php include ('header.php');?>
<!-- 
Body Section 
-->
<?php include ('sidebar.php');?>

	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active">Hubungi Kami</li>
    </ul>
<div class="well well-small">
	<h2> Hubungi Kami</h2>	
	<hr class="soft"/>
<p>
	 <?php 
									include("admin/config.php");
									$query = mysql_query("select * from infotoko");
									$hsl = mysql_fetch_array($query);
									echo base64_decode($hsl[1]);
									?>
</p>
</div>
</div>
</div>
<!-- 
Clients 
-->

<?php include ('footer.php');?>