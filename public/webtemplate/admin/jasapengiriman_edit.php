<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-map-marker"></span>  Edit Jasa Pengiriman</h3>
<a class="btn" href="jasapengiriman.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id_jp=mysql_real_escape_string($_GET['id']);
$det=mysql_query("select * from jasakirim where kodejp='$id_jp'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>					
	<form action="jasapengiriman_update.php" method="post">
		<table class="table">
            <tr>
				<td width="20%">Nama Jasa pengiriman</td>
				<td>
                <input type="hidden" class="form-control" name="id_jp" value="<?php echo $id_jp; ?>">
                <input type="text" class="form-control" name="nama" value="<?php echo $d['namajp']; ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php 
}
?>
<?php include 'footer.php'; ?>