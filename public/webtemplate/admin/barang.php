<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-folder-close"></span>  Data Barang</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Barang</button>
<br/>
<br/>

<?php 
$periksa=mysql_query("select * from produk where stok <=3");
while($q=mysql_fetch_array($periksa)){	
	if($q['stok']<=3){	
		?>	
		<script>
			$(document).ready(function(){
				$('#pesan_sedia').css("color","red");
				$('#pesan_sedia').append("<span class='glyphicon glyphicon-asterisk'></span>");
			});
		</script>
		<?php
		echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $q['nama_barang']."</a> yang tersisa sudah kurang dari 3 . silahkan pesan lagi !!</div>";	
	}
}
?>
<?php 
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from produk");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<div class="col-md-12">
	<table class="col-md-2">
		<tr>
			<td>Jumlah Record</td>		
			<td><?php echo $jum; ?></td>
		</tr>
		<tr>
			<td>Jumlah Halaman</td>	
			<td><?php echo $halaman; ?></td>
		</tr>
	</table>
	<a style="margin-bottom:10px" href="lap_barang.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
</div>
<form action="cari_act.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari nama barang di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table table-condensed table-hover table-bordered" id="example">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-4">Nama Barang</th>
		<th class="col-md-3">Harga Jual</th>
		<th class="col-md-1">Stok</th>
		<!-- <th class="col-md-1">Sisa</th>		 -->
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("select * from produk where nama_barang like '%$cari%'");
	}else{
		$brg=mysql_query("select * from produk limit $start, $per_hal");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['nama_barang'] ?></td>
			<td>Rp.<?php echo number_format($b['harga_barang']) ?>,-</td>
			<td><?php echo $b['stok'] ?></td>
			<td>
				<a href="barang_detail.php?id=<?php echo $b['kode_produk']; ?>" class="btn btn-info">Detail</a>
				<a href="barang_edit.php?id=<?php echo $b['kode_produk']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='barang_hapus.php?id=<?php echo $b['kode_produk']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>		
		<?php 
	}
	?>
</table>
<ul class="pagination">			
			<?php 
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
				<?php
			}
			?>						
		</ul>
<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Barang Baru</h4>
			</div>
			<div class="modal-body">
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
					else if (id_kategori=="K006")
    				{
        			document.getElementById("subkategori").innerHTML=
					"<?php
                                  		$kat1 = mysql_query("select * from subkategori where id_kategori='K006'");
										while($hasil1 = mysql_fetch_array($kat1)){
										echo "<option value='$hasil1[id_subkategori]'>$hasil1[nama_subkategori]</option>";
										} ?>
					";
    				}
					else if (id_kategori=="K007")
    				{
        			document.getElementById("subkategori").innerHTML=
					"<?php
                                  		$kat1 = mysql_query("select * from subkategori where id_kategori='K007'");
										while($hasil1 = mysql_fetch_array($kat1)){
										echo "<option value='$hasil1[id_subkategori]'>$hasil1[nama_subkategori]</option>";
										} ?>
					";
    				}
					else if (id_kategori=="K008")
    				{
        			document.getElementById("subkategori").innerHTML=
					"<?php
                                  		$kat1 = mysql_query("select * from subkategori where id_kategori='K008'");
										while($hasil1 = mysql_fetch_array($kat1)){
										echo "<option value='$hasil1[id_subkategori]'>$hasil1[nama_subkategori]</option>";
										} ?>
					";
    				}
					else if (id_kategori=="K009")
    				{
        			document.getElementById("subkategori").innerHTML=
					"<?php
                                  		$kat1 = mysql_query("select * from subkategori where id_kategori='K009'");
										while($hasil1 = mysql_fetch_array($kat1)){
										echo "<option value='$hasil1[id_subkategori]'>$hasil1[nama_subkategori]</option>";
										} ?>
					";
    				}
					else if (id_kategori=="K010")
    				{
        			document.getElementById("subkategori").innerHTML=
					"<?php
                                  		$kat1 = mysql_query("select * from subkategori where id_kategori='K010'");
										while($hasil1 = mysql_fetch_array($kat1)){
										echo "<option value='$hasil1[id_subkategori]'>$hasil1[nama_subkategori]</option>";
										} ?>
					";
    				}
					}
		   			</script>                    
				<form action="barang_add.php" method="post" name="form1" id="form1" enctype="multipart/form-data">
					<div class="form-group">
						<label>Kategori Barang</label>
                        <select name="kategori" id="kategori" class="form-control" onchange="tampilkan()">
                				  <option value='0' selected>- Pilih Kategori Barang -</option>
                                  
                                  <?php
                                  		$prov = mysql_query("SELECT * FROM kategori");
										while($hasil = mysql_fetch_array($prov)){
										echo "<option value='$hasil[id_kategori]'>$hasil[nama_kategori]</option>";
										} ?>
                        </select>
					</div>
                    <div class="form-group">
						<label>Sub Kategori Barang</label>
                        <select name="subkategori"  id="subkategori" class="form-control">
                				  <option value='0' selected>Pilih Kategori Dahulu</option>
                        </select>
					</div>
                    <div class="form-group">
						<label>Kode Barang</label>
						<input readonly = "1" name="kode" type="text" class="form-control" value = "<?php  include("config.php");
						$query = mysql_query("Select right(max(kode_produk),9) from produk where kode_produk like 'B%'");
						$result = mysql_fetch_array($query);
	
						$jumlahrow = mysql_num_rows($query);
	
						if ($jumlahrow == 0){
		
							echo "B001";
	
							}else{
							
							echo "B" . str_pad(strval($result[0] + 1),9,"0",STR_PAD_LEFT);
		
							}?>">
					</div>        
                    <div class="form-group">
						<label>Nama Barang</label>
						<input name="nama" type="text" class="form-control" placeholder="Nama Barang ..">
					</div>
                    <div class="form-group">
						<label>Harga Barang</label>
						<input name="harga" type="text" class="form-control" placeholder="Harga Barang per unit">
					</div>
					<div class="form-group">
						<label>Berat Barang</label>
						<input name="berat" type="text" class="form-control" placeholder="Berat Barang..">
					</div>
					<div class="form-group">
						<label>Deskripsi</label>
						<input name="deskripsi" type="text" class="form-control" placeholder="Deskripsi Barang">
					</div>	
					<div>
						<label>Foto1</label>
						<input type = "file" id = "foto1" name = "foto1" />
					</div>
                    <div>
						<label>Foto2</label>
						<input type = "file" id = "foto2" name = "foto2" />
					</div>
                    <div>
						<label>Foto3</label>
						<input type = "file" id = "foto3" name = "foto3" />
					</div>
                    <div class="form-group">
						<label>Stok</label>
						<input name="stok" type="text" class="form-control" placeholder="Stok Barang">
					</div>	
					<div class="form-group">
						<label>Ukuran</label>
						<input name="ukuran" type="text" class="form-control" placeholder="Ukuran">
					</div>																	
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>



<?php 
include 'footer.php';

?>