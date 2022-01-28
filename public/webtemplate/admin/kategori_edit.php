<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Kategori</h3>
<a class="btn" href="kategori.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id_kategori=mysql_real_escape_string($_GET['id']);
$det=mysql_query("select * from kategori where id_kategori='$id_kategori'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>					
	<form action="kategori_update.php" method="post">
		<table class="table">
            <tr>
				<td>Nama</td>
				<td>
                <input type="hidden" class="form-control" name="id_kategori" value="<?php echo $id_kategori; ?>">
                <input type="text" class="form-control" name="nama" value="<?php echo $d['nama_kategori']; ?>"></td>
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