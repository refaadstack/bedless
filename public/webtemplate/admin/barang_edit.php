<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-folder-close"></span>  Edit Barang</h3>
<a class="btn" href="barang.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id_brg=mysql_real_escape_string($_GET['id']);
$det=mysql_query("select * from produk where kode_produk='$id_brg'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>					
	<form action="barang_update.php" method="post" name="form1" id="form1" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<td width="20%"></td>
				<td><input type="hidden" name="id" value="<?php echo $d['kode_produk'] ?>"></td>
			</tr>
            <script>
					function tampilkan(){
  					var id_kategori=document.getElementById("form1").kategori.value;
  					if (id_kategori=="K001")
    				{
        			document.getElementById("subkategori").innerHTML=
					"<?php
                                  		$kat1 = mysql_query("select * from subkategori where id_kategori='K001'");
										while($hasil1 = mysql_fetch_array($kat1)){
										echo "<option value='$hasil1[id_subkategori]'>$hasil1[nama_subkategori]</option>";
										} ?>
					";
    				}
  					else if (id_kategori=="K002")
    				{
        			document.getElementById("subkategori").innerHTML=
					"<?php
                                  		$kat1 = mysql_query("select * from subkategori where id_kategori='K002'");
										while($hasil1 = mysql_fetch_array($kat1)){
										echo "<option value='$hasil1[id_subkategori]'>$hasil1[nama_subkategori]</option>";
										} ?>
					";
    				}
					else if (id_kategori=="K003")
    				{
        			document.getElementById("subkategori").innerHTML=
					"<?php
                                  		$kat1 = mysql_query("select * from subkategori where id_kategori='K003'");
										while($hasil1 = mysql_fetch_array($kat1)){
										echo "<option value='$hasil1[id_subkategori]'>$hasil1[nama_subkategori]</option>";
										} ?>
					";
    				}
					else if (id_kategori=="K004")
    				{
        			document.getElementById("subkategori").innerHTML=
					"<?php
                                  		$kat1 = mysql_query("select * from subkategori where id_kategori='K004'");
										while($hasil1 = mysql_fetch_array($kat1)){
										echo "<option value='$hasil1[id_subkategori]'>$hasil1[nama_subkategori]</option>";
										} ?>
					";
    				}
					else if (id_kategori=="K005")
    				{
        			document.getElementById("subkategori").innerHTML=
					"<?php
                                  		$kat1 = mysql_query("select * from subkategori where id_kategori='K005'");
										while($hasil1 = mysql_fetch_array($kat1)){
										echo "<option value='$hasil1[id_subkategori]'>$hasil1[nama_subkategori]</option>";
										} ?>
					";
    				}
					}
		   			</script>
			<tr>
				<td>Kategori Barang</td>
				<td><select name="kategori" id="kategori" class="form-control" onchange="tampilkan()">
                				  <option value='<?php echo $hasil['id_kategori']; ?>'>- Pilih Kategori -</option>
								  <?php
                                  		$prov = mysql_query("SELECT * FROM kategori");
										while($hasil = mysql_fetch_array($prov)){ ?>
										<option value='<?php echo $hasil['id_kategori']; ?>'><?php echo $hasil['nama_kategori']; ?></option>
								  <?php } ?>                                                              
                     </select>
                </td>
			</tr>
			<tr>
				<td>SubKategori Barang</td>
				<td><select name="subkategori"  id="subkategori" class="form-control">
                				<?php
                                  		$prov = mysql_query("SELECT * FROM subkategori");
										while($hasil = mysql_fetch_array($prov)){ ?>
                		<option value='<?php echo $d['id_subkategori']; ?>' selected>Pilih Kategori Dahulu</option>
                        <?php } ?>
                    </select>
                </td>
			</tr>
            <tr>
				<td>Nama Barang</td>
				<td><input type="text" class="form-control" name="nama" value="<?php echo $d['nama_barang'] ?>"></td>
			</tr>
			<tr>
				<td>Harga Barang</td>
				<td><input type="text" class="form-control" name="harga" value="<?php echo $d['harga_barang'] ?>"></td>
			</tr>
			<tr>
				<td>Berat Barang</td>
				<td><input type="text" class="form-control" name="berat" value="<?php echo $d['berat'] ?>"></td>
			</tr>
			<tr>
				<td>Deskripsi</td>
				<td><input type="text" class="form-control" name="deskripsi" value="<?php echo $d['deskripsi'] ?>"></td>
			</tr>
			<tr>
				<td>Foto 1</td>
				<td><input type = "file" id = "foto1" name = "foto1" />
                <img src='<?php echo $d['foto1'];?>' width = "50" height = "60" ></td>
			</tr>
			<tr>
				<td>Foto 2</td>
				<td><input type = "file" id = "foto2" name = "foto2" />
                <img src='<?php echo $d['foto2'];?>' width = "50" height = "60" ></td>
			</tr>
            <tr>
				<td>Foto 3</td>
				<td><input type = "file" id = "foto3" name = "foto3" />
                <img src='<?php echo $d['foto3'];?>' width = "50" height = "60" ></td>
			</tr>
			<tr>
				<td>Stok</td>
				<td><input type="text" class="form-control" name="stok" value="<?php echo $d['stok'] ?>"></td>
			</tr>
            <tr>
				<td>Ukuran</td>
				<td><input type="text" class="form-control" name="ukuran" value="<?php echo $d['ukuran'] ?>"></td>
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