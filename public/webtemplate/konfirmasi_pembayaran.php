<?php include ('title.php');?>
<?php include ('header.php');?>
<!-- 
Body Section 
-->
<?php include ('sidebar.php');?>
	<div class="span9">
    <ul class="breadcrumb">
    <li><a href="index.php">Home</a> <span class="divider">/</span></li>
    <li class="active">Konfirmasi Pembayaran</li>
    </ul>
	<div class="well well-small">
	<div class="row-fluid">
			</div>
            <h3>Konfirmasi Pembayaran</h3>
				<hr class="softn clr"/>
                
                <?php $sql=mysql_query("select * from pemesanan where kodepemesanan='$_GET[kode]'")or die(mysql_error());
while($d=mysql_fetch_array($sql)){
$kode= $d['kodepemesanan'];
	?>	
<table class="table">

		<tr>
                <td width='30%'><b>No Invoice</b></td><td width='1%'>:</td>                
                <td><?php echo $d['kodepemesanan'];?></td>
                
        </tr>
        <tr>
                <td width='30%'><b>Status Pesanan</b></td><td width='1%'>:</td>
                <td><?php echo $d['Status'];?></td>
                
        </tr>
        <tr>
                <td width='30%'><b>Tanggal Pemesanan</b></td><td width='1%'>:</td>
                <td><?php echo $d['TanggalPemesanan'];?></td>
                
        </tr>
        <form class="leave-comment" action="konfirmasi_proses.php" method="post" enctype="multipart/form-data">
        <tr>
                <td width='30%'><b>Pilih Rekening</b></td><td width='1%'>:</td>
                <td><input type="hidden" name="kdpsn" value="<?php echo $kode;?>">
						<div class="bo4 of-hidden size15 m-b-20">
                        	<select class="sizefull s-text7 p-l-22 p-r-22" name="kdbank">
                            <option value="">--Pilih Rekening Bank--</option>
                            <?php $sql=mysql_query("SELECT * FROM bank");
								  while($r=mysql_fetch_array($sql)) {?>
                            <option value="<?php echo $r['kodebank'];?>">
							<?php echo $r['rekening'];?> - <?php echo $r['namabank'];?> - <?php echo $r['namapemilikakun'];?>
                            </option>
                            <?php } ?>
                            </select></td>
                
        </tr>
        <tr>
                <td width='30%'><b>Media Transfer</b></td><td width='1%'>:</td>
                <td><select name="media">
                <option value="E-Banking Transfer">E-Banking Transfer</option>
                <option value="Setor Tunai BanK">Setor Tunai Bank</option>
                <option value="Transfer ATM">Transfer ATM</option>
                </select></td>
                
        </tr>
        <tr>
                <td width='30%'><b>Foto Bukti Transfer</b></td><td width='1%'>:</td>
                <td><input type = "file" id = "fotobukti" name = "fotobukti" /></td>
                
        </tr>
         <tr>
                <td width='30%'></td><td width='1%'></td>
                <td style=" vertical-align:middle;"><input class="btn btn-primary"  type="submit" name="pesan" value="Konfirmasi" /></td>     
        </tr>
</table>
<?php } ?>
</form>


</div>
</div>
</div> <!-- Body wrapper -->
<!-- 
Clients 
-->
<?php include ('footer.php');?>