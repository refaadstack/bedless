<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-user"></span>  Edit Pelanggan</h3>
<br/><br/>
<br/>
<div class="col-md-5 col-md-offset-3">
	<form action="pelanggan_update.php" method="post">
    <?php $id=$_GET['id'];
			  $periksa=mysql_query("select * from member where kodemember='$id'");
			  $no=1;
			  while($q=mysql_fetch_array($periksa)){ ?>
		<div class="form-group">
			<label>Nama Lengkap</label>
            <input name="kode" type="hidden" class="form-control" value="<?php echo $_GET['id'];?>"/>
			<input name="nama" type="text" class="form-control" value="<?php echo $q['namamember'] ?>">
		</div>
        <div class="form-group">
			<label>Jenis Kelamin</label>
            <select  style = "width:250px;" name = "jeniskelamin" class = "form-control" >
            <?php if ($q['jeniskelamin'] == "Laki-Laki") echo "<option value = 'Laki-Laki' selected>Laki-Laki</option>";
				  else echo "<option value='Laki-Laki'>Laki-Laki</option>";
				  if ($q['jeniskelamin'] == "Perempuan") echo "<option value = 'Perempuan' selected>Perempuan</option>";
				  else echo "<option value='Perempuan'>Perempuan</option>"; ?>
            </select>
		</div>
        <div class="form-group">
			<label>Tempat Lahir</label>
			<input type="text" name="templhr"class="form-control"="Tempat Lahir" value="<?php echo $q['tempatlahir']; ?>">
		</div>
        <div class="form-group">
			<label>Tanggal Lahir</label><br />
			<input required type="date" date-format="yyyy-mm-dd" name = "tgllhr" value="<?php echo $q['tanggallahir']; ?>">
		</div>
        <div class="form-group">
			<label>Alamat</label>
			<input name="alamat" type="text" class="form-control" value="<?php echo $q['alamat'] ?>">
		</div>
        <div class="form-group">
			<label>No HP</label>
			<input name="nohp" type="text" class="form-control" value="<?php echo $q['nohp'] ?>">
		</div>
        <div class="form-group">
			<label>Email</label>
			<input name="email" type="text" class="form-control" value="<?php echo $q['email'] ?>">
		</div>
        <div class="form-group">
        	<label>Username</label>
			<input name="user" class="form-control" value="<?php echo $q['username']; ?>">
		</div>
        <div class="form-group">
        	<label>Password</label>
			<input type="password" name="password" class="form-control" value="">
		</div>
        <div class="form-group">
        	<label>Status</label>
            <select  style = "width:250px;" name = "status" class = "form-control" >
            <?php if ($q['status'] == "Aktif") echo "<option value = 'Aktif' selected>Aktif</option>";
				  else echo "<option value='Aktif'>Aktif</option>";
				  if ($q['status'] == "Blokir") echo "<option value = 'Blokir' selected>Blokir</option>";
				  else echo "<option value='Blokir'>Blokir</option>"; ?>
            </select>
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