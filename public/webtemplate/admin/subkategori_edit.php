<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-book"></span>  Edit SubKategori</h3>
<a class="btn" href="subkategori.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id_subkategori=mysql_real_escape_string($_GET['id']);
$det=mysql_query("select * from subkategori where id_subkategori='$id_subkategori'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>					
	<form action="subkategori_update.php" method="post">
		<table class="table">
            <tr>
				<td>Nama</td>
				<td>
                <input name="id" type="hidden" class="form-control" value="<?php echo $_GET['kode'];?>"/>
                <input type="hidden" class="form-control" name="id_subkategori" value="<?php echo $id_subkategori; ?>">
                <input type="text" class="form-control" name="nama" value="<?php echo $d['nama_subkategori']; ?>"></td>
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