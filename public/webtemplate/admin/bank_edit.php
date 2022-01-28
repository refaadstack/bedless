<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-usd"></span>  Edit Bank</h3>
<a class="btn" href="bank.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id_bank=mysql_real_escape_string($_GET['id']);
$det=mysql_query("select * from bank where kodebank='$id_bank'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>					
	<form action="bank_update.php" method="post">
		<table class="table">
            <tr>
				<td width="20%">Nama Bank</td>
				<td>
                <input type="hidden" class="form-control" name="id_bank" value="<?php echo $id_bank; ?>">
                <input type="text" class="form-control" name="nama" value="<?php echo $d['namabank']; ?>"></td>
			</tr>
            <tr>
				<td>Nama Pemilik Rekening</td>
				<td><input type="text" class="form-control" name="nprek" value="<?php echo $d['namapemilikakun']; ?>"></td>
			</tr>
            <tr>
				<td>Nomor Rekening</td>
				<td><input type="text" class="form-control" name="norek" value="<?php echo $d['rekening']; ?>"></td>
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