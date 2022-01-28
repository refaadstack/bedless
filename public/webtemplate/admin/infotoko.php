<?php include 'header.php'; ?>


<h3><span class="glyphicon glyphicon-list-alt"></span>  Profil Toko</h3>

<?php
$det=mysql_query("select * from infotoko where kodeinfo='PD001'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	?>					
<form action = "infotoko_simpan.php" method="POST" >
<textarea name="kontak"><?php echo base64_decode($d["info"]); ?></textarea>
<input type="submit" value ="Simpan" /> <input type="reset" value ="Batal" /> <a href = "../profil.php" target = "_blank"  >Lihat Info Toko</a>
</form>
<?php } ?>
<?php 
include 'footer.php';

?>