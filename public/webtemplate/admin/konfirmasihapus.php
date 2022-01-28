<?php
$kode = $_GET['kode'];


?>
<center style = "font-size:18px">
<form action = "pk.php?op=hapustransaksi" method = "post">
Kode penjualan [<?php echo $kode ?>] akan dihapus.<br>Silahkan masukan password admin untuk konfirmasi penghapusan data penjualan tersebut.<br><br>
<input type = "hidden" name = "kode" value = "<?php echo $kode ?>" />
<input type = 'password' name = 'password'  required/><br><br>
<input type = 'submit' value = 'Hapus Data Penjualan' /><input value = "Batal" type = "button" onClick = "window.location='penjualan.php'" />
</form>
</center>