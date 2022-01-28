<?php include 'header.php'; ?>


<h3><span class="glyphicon glyphicon-list-alt"></span>  Cara Pemesanan</h3>

<?php
$det=mysql_query("select * from cara_pesan where id_cara='CP001'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	?>					
<form action = "carapesan_simpan.php" method="POST" >
<textarea name="kontak1"><?php echo base64_decode($d["caranya"]); ?></textarea>
<input type="submit" value ="Simpan" /> <input type="reset" value ="Batal" /> <a href = "../profil.php" target = "_blank"  >Lihat Info Toko</a>
</form>
<?php } ?>
<?php 
include 'footer.php';

?>