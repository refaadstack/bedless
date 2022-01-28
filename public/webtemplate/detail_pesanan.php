<?php include ('title.php');?>
<?php include ('header.php');?>
<!-- 
Body Section 
-->
<?php include ('sidebar.php');?>
	<div class="span9">
    <ul class="breadcrumb">
    <li><a href="index.php">Home</a> <span class="divider">/</span></li>
    <li><a href="lihat_pesanan.php">Lihat Pesanan</a> <span class="divider">/</span></li>
    <li class="active">Detail Pesanan</li>
    </ul>
	<div class="well well-small">
	<div class="row-fluid">
			</div>
            <h3>Detail Pesanan</h3>
				<hr class="softn clr"/>
                <?php $sql=mysql_query("select p.*, w.* FROM pemesanan p left join wilayah w on w.namawilayah=p.alamatkirim where kodepemesanan='$_GET[kode]'")or die(mysql_error());
while($d=mysql_fetch_array($sql)){
	$total= $d['total'];
	$wilayah=$d['kodewilayah'];
	?>	
                <table class="table table-striped">
				<tbody>
				<tr class="techSpecRow">
                <td><b>No Invoice</b></td>
                <td width="65%">: <?php echo $d['kodepemesanan'];?></td>
                </tr>
				<tr class="techSpecRow">
                <td><b>Status Pembayaran</b></td>
                <td width="65%">: <?php echo $d['Status'];?></td>
                </tr>
				</tbody>
				</table>
                <?php } ?>
                <hr>
			<table class="table table-bordered table-hover table-condensed">
    <tr align="center">

        <td><b>Nama Produk</b></td>
        <td><b>Harga</b></td>
        <td><b>Qty</b></td>
        <td><b>Total Harga</b></td>
    </tr>
    <?php $sql1=mysql_query("select pm.*, p.* from detailpemesanan pm left join produk p on p.kode_produk=pm.kodeproduk where kodepemesanan='$_GET[kode]'")or die(mysql_error());
while($r=mysql_fetch_array($sql1)){
$hargabarang=0;
$hargabarang= $r['jumlah']*$r['harga'];
	?>
<tr class="active">

        <td align="center"><?php echo $r['nama'];?></td>
        <td align="center">Rp <?php echo number_format($r['harga']);?>,-</td>
        <td align="center"><?php echo $r['jumlah'];?></td>
        <td align="center">Rp <?php echo number_format($hargabarang);?>,-</td>
</tr>
<?php } ?>
<tr>
<td colspan="4" align="right"><b>Harga Total</b></td>
<td><b>Rp <?php $hargatotal=0; $hargatotal= $hargabarang; echo number_format($hargatotal);?>,-</b> </td>
</tr>
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