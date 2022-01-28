<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-usd"></span>  Data Bank</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span> Tambah Data</button>
<br/>
<br/>


<?php 
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from bank");
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
		<th class="col-md-3">Nama Bank</th>
        <th class="col-md-3">Nama Pemilik Rekening</th>
        <th class="col-md-3">No Rekening</th>
		<th class="col-md-3">Opsi</th>
	</tr>
<?php 
$periksa=mysql_query("select * from bank");
$no=1;
while($q=mysql_fetch_array($periksa)){	?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $q['namabank'] ?></td>
            <td><?php echo $q['namapemilikakun'] ?></td>
            <td><?php echo $q['rekening'] ?></td>
			<td>
                <a href="bank_edit.php?id=<?php echo $q['kodebank']; ?>" class="btn btn-warning">Edit</a>
				<a onClick="if(confirm('Apakah anda yakin ingin menghapus data ini ?')){ location.href='bank_hapus.php?id=<?php echo $q['kodebank']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>
        <?php $no++;} ?>		
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
				<h4 class="modal-title">Tambah Data Bank</h4>
			</div>
			<div class="modal-body">
				<form action="bank_add.php" method="post">
					<div class="form-group">
						<label>Kode Bank</label>
						<input readonly = "1" name="kode" type="text" class="form-control" value = "<?php  include("config.php");
						$query = mysql_query("Select right(max(kodebank),3) from bank where kodebank like 'B%'");
						$result = mysql_fetch_array($query);
	
						$jumlahrow = mysql_num_rows($query);
	
						if ($jumlahrow == 0){
		
							echo "B001";
	
							}else{
							
							echo "B" . str_pad(strval($result[0] + 1),3,"0",STR_PAD_LEFT);
		
							}?>">
					</div>
                    <div class="form-group">
						<label>Nama Bank</label>
						<input name="nama" type="text" class="form-control" placeholder="Nama Bank">
					</div>
                    <div class="form-group">
						<label>Nama Pemilik Rekening</label>
						<input name="nprek" type="text" class="form-control" placeholder="Nama Pemilik Rekening">
					</div>
                    <div class="form-group">
						<label>No Rekening</label>
						<input name="norek" type="text" class="form-control" placeholder="No Rekening">
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