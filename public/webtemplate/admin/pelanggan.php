<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-user"></span>  Data Pelanggan</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Pelanggan</button>
<br/>
<br/>


<?php 
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from member");
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
		<th class="col-md-3">Nama Pelanggan</th>
        <th class="col-md-2">Alamat</th>
        <th class="col-md-2">Email</th>
        <th class="col-md-2">No HP</th>
        <th class="col-md-3">Opsi</th>
	</tr>
<?php 
$periksa=mysql_query("select * from member");
$no=1;
while($q=mysql_fetch_array($periksa)){	?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $q['namamember'] ?></td>
            <td><?php echo $q['alamat'] ?></td>
            <td><?php echo $q['email'] ?></td>
            <td><?php echo $q['nohp'] ?></td>
            <td>
                <a href="pelanggan_edit.php?id=<?php echo $q['kodemember']; ?>" class="btn btn-warning">Edit</a>
				<a onClick="if(confirm('Apakah anda yakin ingin menghapus data ini ?')){ location.href='pelanggan_hapus.php?id=<?php echo $q['kodemember']; ?>' }" class="btn btn-danger">Hapus</a>
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
				<h4 class="modal-title">Tambah Pelanggan</h4>
			</div>
			<div class="modal-body">
				<form action="pelanggan_add.php" method="post">
                	<div class="form-group">
						<label>Kode Pelanggan</label>
                        <input name="id" type="hidden" class="form-control" value="<?php echo $_GET['id'];?>"/>
						<input readonly = "1" name="kode" type="text" class="form-control" value = "<?php  include("config.php");
						$query = mysql_query("Select right(max(kodemember),9) from member where kodemember like 'M%'");
						$result = mysql_fetch_array($query);
	
						$jumlahrow = mysql_num_rows($query);
	
						if ($jumlahrow == 0){
		
							echo "M000000001";
	
							}else{
							
							echo "M" . str_pad(strval($result[0] + 1),9,"0",STR_PAD_LEFT);
		
							}?>">
					</div>
                    <div class="form-group">
						<label>Nama Lengkap</label>
						<input name="nama" type="text" class="form-control" placeholder="Nama Lengkap">
					</div>
                    <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <label class="radio inline" style="padding-left:50px;">
                    <input type="radio" checked = 1 name="jk" value = "Laki-Laki"> Laki-Laki
                    </label>
                    <label class="radio inline" style="padding-left:50px;">
                    <input type="radio" name="jk" value = "Perempuan"> Perempuan
                    </label>
            		</div>
                    <div class="form-group">
						<label>Tempat Lahir</label>
						<input type="text" name="templhr"class="form-control"="Tempat Lahir">
					</div>
                    <div class="form-group">
						<label>Tanggal Lahir</label><br />
						<input required type="date" date-format="yyyy-mm-dd" name = "tgllhr">
					</div>
                    <div class="form-group">
						<label>Alamat</label>
						<input name="alamat" type="text" class="form-control" placeholder="Alamat Lengkap">
					</div>
                    <div class="form-group">
						<label>No. HP</label>
						<input name="nohp" type="text" class="form-control" placeholder="No. HP">
					</div>
                    <div class="form-group">
						<label>Email</label>
						<input name="email" type="text" class="form-control" placeholder="Email">
					</div>
					<div class="form-group">
						<label>Username</label>
						<input name="username" type="text" class="form-control" placeholder="Username">
					</div>
                    <div class="form-group">
						<label>Password</label>
						<input name="password" type="password" class="form-control" placeholder="Password">
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