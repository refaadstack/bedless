<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-map-marker"></span>  Data Wilayah</h3>
<a class="btn" href="jasapengiriman.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<br />
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span> Tambah Wilayah</button>
<br/>
<br/>


<?php 
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from wilayah where kodejp='$_GET[id]'");
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
</div>

<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
        <th class="col-md-2">Nama Jasa Pengiriman</th>
		<th class="col-md-3">Nama wilayah</th>
        <th class="col-md-2">Ongkos Kirim</th>
		<th class="col-md-3">Opsi</th>
	</tr>
<?php 
$periksa=mysql_query("select * from wilayah where kodejp='$_GET[id]'");
$no=1;
while($q=mysql_fetch_array($periksa)){	?>
		<tr>
			<td><?php echo $no++; ?></td>
            <?php 
				$kodejp=mysql_query("select * from jasakirim where kodejp='$_GET[id]'");
				while($c=mysql_fetch_array($kodejp)){	?>            
            <td><?php echo $c['namajp'] ?></td>
            <?php } ?>
			<td><?php echo $q['namawilayah'] ?></td>
            <td>Rp <?php echo number_format($q['ongkir']) ?></td>
			<td>
                <a href="wilayah_edit.php?id=<?php echo $q['kodewilayah']; ?>&kode=<?php echo $_GET['id'];?>" class="btn btn-warning">Edit</a>
				<a onClick="if(confirm('Apakah anda yakin ingin menghapus data ini ?')){ location.href='wilayah_hapus.php?id=<?php echo $q['kodewilayah']; ?>&kode=<?php echo $_GET['id'];?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>
        <?php } ?>		
		<?php 
	?>
</table>
<ul class="pagination">			
			<?php 
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href=""><?php echo $x ?></a></li>
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
				<h4 class="modal-title">Tambah Wilayah</h4>
			</div>
			<div class="modal-body">
				<form action="wilayah_add.php" method="post">
					<div class="form-group">
						<label>Kode wilayah</label>
                        <input name="id" type="hidden" class="form-control" value="<?php echo $_GET['id'];?>"/>
						<input readonly = "1" name="kode" type="text" class="form-control" value = "<?php  include("config.php");
						$query = mysql_query("Select right(max(kodewilayah),3) from wilayah where kodewilayah like 'W%'");
						$result = mysql_fetch_array($query);
	
						$jumlahrow = mysql_num_rows($query);
	
						if ($jumlahrow == 0){
		
							echo "W001";
	
							}else{
							
							echo "W" . str_pad(strval($result[0] + 1),3,"0",STR_PAD_LEFT);
		
							}?>">
					</div>
                    <div class="form-group">
						<label>Nama Wilayah</label>
						<input name="nama" type="text" class="form-control" placeholder="Nama Wilayah">
					</div>
                    <div class="form-group">
						<label>Ongkos Kirim</label>
						<input name="ongkir" type="text" class="form-control" placeholder="Ongkos Kirim">
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