<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-user"></span>  Edit Profil</h3>
<br/><br/>
<?php 
if(isset($_GET['pesan'])){
	$pesan=mysql_real_escape_string($_GET['pesan']);
	if($pesan=="gagal"){
		echo "<div class='alert alert-danger'>Password gagal di ganti !!     Periksa Kembali Password yang anda masukkan !!</div>";
	}else if($pesan=="tdksama"){
		echo "<div class='alert alert-warning'>Password yang anda masukkan tidak sesuai  !!     silahkan ulangi !! </div>";
	}else if($pesan=="oke"){
		echo "<div class='alert alert-success'>Password yang anda masukkan tidak sesuai  !!     silahkan ulangi !! </div>";
	}
}
?>

<br/>
<div class="col-md-5 col-md-offset-3">
	<form action="admin_update.php" method="post">
		<div class="form-group">
        	<label>Username</label>
			<input name="user" readonly="1" class="form-control" value="<?php echo $_SESSION['username']; ?>">
		</div>
        <?php $id=$_SESSION['username'];
			  $periksa=mysql_query("select * from admin where username='$id'");
			  $no=1;
			  while($q=mysql_fetch_array($periksa)){ ?>
        <div class="form-group">
			<label>Nama Lengkap</label>
			<input name="nama" type="text" class="form-control" value="<?php echo $q['nama_lengkap'] ?>">
		</div>
        <div class="form-group">
			<label>Email</label>
			<input name="email" type="text" class="form-control" value="<?php echo $q['email'] ?>">
		</div>
        <div class="form-group">
			<label>No HP</label>
			<input name="nohp" type="text" class="form-control" value="<?php echo $q['no_telp'] ?>">
		</div>	
        <?php $no++;} ?>
		<div class="form-group">
			<label></label>
			<input type="submit" class="btn btn-info" value="Simpan">
			<input type="reset" class="btn btn-danger" value="reset">
		</div>																	
	</form>
</div>


<?php 
include 'footer.php';

?>