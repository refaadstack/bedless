<?php include ('title.php');?>
<?php include ('header.php');?>
<!-- 
Body Section 
-->
<?php include ('sidebar.php');?>
	<div class="span9">
    <ul class="breadcrumb">
    <li><a href="index.php">Home</a> <span class="divider">/</span></li>
    <li class="active">Lihat Pesanan</li>
    </ul>
	<div class="well well-small">
	<div class="row-fluid">
			</div>
            <h3>Lihat Pesanan</h3>
				<hr class="softn clr"/>
			<table class="table table-bordered table-hover table-condensed">
    <tr align="center">
        <td>No Invoice</td>
        <td>Tanggal Pemesanan</td>
        <td>Status Pembayaran</td>
        <td>Aksi</td>
    </tr>
    <?php $sql = mysql_query("SELECT p.*, w.* FROM pemesanan p left join wilayah w on w.namawilayah=p.alamatkirim where kodemember = '$_SESSION[kodemember]' order by TanggalPemesanan desc");
	  while($hasil = mysql_fetch_array($sql)){ 
?>
<tr class="active">
        <td align="center"><?php echo $hasil['kodepemesanan'];?></td>
        <td align="center"><?php echo $hasil['TanggalPemesanan'];?></td>
        <td align="center"><?php echo $hasil['Status'];?></td>
        
        <td align="center">
        <a class="btn btn-primary"href="detail_pesanan.php?kode=<?php echo $hasil['kodepemesanan'];?>"> Detail </a>
</tr>
<?php } ?>
<!--
<tr>
        <td colspan="5" align="center">Maaf Informasi pesanan belum tersedia</td>
</tr>
-->
</table>


</div>
</div>
</div> <!-- Body wrapper -->
<!-- 
Clients 
-->
<?php include ('footer.php');?>