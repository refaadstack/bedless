<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Barang</h3>
<a class="btn" href="barang.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_brg=mysql_real_escape_string($_GET['id']);


$det=mysql_query("select * from produk where kode_produk='$id_brg'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	?>					
	<table class="table" >
		<tr>
			<td width="20%">Sub Kategori</td>
            <?php 
			 $id= $d['id_subkategori'];
			$kode=mysql_query("select * from subkategori where id_subkategori='$id'");
			while($f=mysql_fetch_array($kode)){?>
			<td><b>:</b> <?php echo $f['nama_subkategori'] ?></td>
            <?php } ?>
		</tr>
        <tr>
			<td>Nama Barang</td>
			<td><b>:</b> <?php echo $d['nama_barang'] ?></td>
		</tr>
		<tr>
			<td>Harga Barang</td>
			<td><b>:</b> Rp.<?php echo number_format($d['harga_barang']); ?>,-</td>
		</tr>
		<tr>
			<td>Berat Barang</td>
			<td><b>:</b> <?php echo $d['berat'] ?> Kg</td>
		</tr>
		<tr>
			<td>Deskripsi</td>
			<td><b>:</b> <?php echo $d['deskripsi']; ?></td>
		</tr>
		<tr>
			<td>Foto 1</td>
			<td><b>:</b> <img src="<?php echo $d['foto1'] ?>" width = "50" height = "60" /></td>
		</tr>
		<tr>
			<td>Foto 2</td>
			<td><b>:</b> <img src="<?php echo $d['foto2'] ?>" width = "50" height = "60" /></td>
		</tr>
        <tr>
			<td>Foto 3</td>
			<td><b>:</b> <img src="<?php echo $d['foto3'] ?>" width = "50" height = "60" /></td>
		</tr>
        <tr>
			<td>Stok Barang</td>
			<td><b>:</b> <?php echo $d['stok'] ?> Pcs</td>
		</tr>
        <tr>
			<td>Ukuran</td>
			<td><b>:</b> <?php echo $d['ukuran'] ?></td>
		</tr>
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>