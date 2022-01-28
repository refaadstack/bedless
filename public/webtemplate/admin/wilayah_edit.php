<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-book"></span>  Edit SubKategori</h3>
<a class="btn" href="subkategori.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id_wilayah=mysql_real_escape_string($_GET['id']);
$det=mysql_query("select * from wilayah where kodewilayah='$id_wilayah'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>					
	<form action="wilayah_update.php" method="post">
		<table class="table">    
			<tr>
				<td width="20%">Jasa Pengiriman</td>
				<td><select name="jasapengiriman" id="jasapengiriman" class="form-control" onchange="tampilkan()">
                				  <option value='<?php echo $d['kodejp']; ?>'>- Pilih Jasa Pengiriman -</option>
								  <?php
                                  		$prov = mysql_query("SELECT * FROM jasakirim");
										while($hasil = mysql_fetch_array($prov)){ ?>
										<option value='<?php echo $hasil['kodejp']; ?>'><?php echo $hasil['namajp']; ?></option>
								  <?php } ?>                                                              
                     </select>
                </td>
			</tr>
            <tr>
				<td>Nama Wilayah</td>
				<td>
                <input name="id" type="hidden" class="form-control" value="<?php echo $_GET['kode'];?>"/>
                <input type="hidden" class="form-control" name="id_wilayah" value="<?php echo $id_wilayah; ?>">
                <input type="text" class="form-control" name="nama" value="<?php echo $d['namawilayah']; ?>"></td>
			</tr>
            <tr>
				<td>Ongkos Kirim</td>
				<td><input type="text" class="form-control" name="ongkir" value="<?php echo $d['ongkir']; ?>"></td>
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