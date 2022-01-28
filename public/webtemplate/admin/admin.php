<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-user"></span>  Data Admin</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Admin</button>
<br/>
<br/>


<?php 
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from admin");
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
		<th class="col-md-3">Nama Admin</th>
        <th class="col-md-2">Email</th>
        <th class="col-md-2">No HP</th>
	</tr>
<?php 
$periksa=mysql_query("select * from admin");
$no=1;
while($q=mysql_fetch_array($periksa)){	?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $q['nama_lengkap'] ?></td>
            <td><?php echo $q['email'] ?></td>
            <td><?php echo $q['no_telp'] ?></td>
		</tr>
        <?php $no++;} ?>		
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
				<h4 class="modal-title">Tambah Admin</h4>
			</div>
			<div class="modal-body">
				<form action="admin_add.php" method="post">
					<div class="form-group">
						<label>Username</label>
						<input name="username" type="text" class="form-control" placeholder="Username">
					</div>
                    <div class="form-group">
						<label>Password</label>
						<input name="password" type="password" class="form-control" placeholder="Password">
					</div>
                    <div class="form-group">
						<label>Nama Lengkap</label>
						<input name="nama" type="text" class="form-control" placeholder="Nama Lengkap">
					</div>
                    <div class="form-group">
						<label>Email</label>
						<input name="email" type="text" class="form-control" placeholder="Email">
					</div>
                    <div class="form-group">
						<label>No. HP</label>
						<input name="nohp" type="text" class="form-control" placeholder="No. HP">
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