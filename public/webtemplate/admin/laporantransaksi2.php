<?php 
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/tabel.css">



</head>

<?php
	$hari1 = date("j F Y");	  
?>

<body><form action="laporantransaksi.php" method="post" >
<table width="499" border="2" align="center" cellspacing="0" class="bordered" style ="margin-top:200px">
  <tr>
    <td colspan="3" align="center"><p>Laporan Pemesanan Online</p>
      <p> |Omdut Coffee|</p>      <img src="img/printer.png" width="100" height="100" />      <p>&nbsp;</p></td>
    </tr>
  <tr>
    <td width="35%">Periode</td>
    <td width="1%" align="center">&nbsp;</td>
    <td width="64%">Bulan 
      <select name="bulan" id="bulan">
        
        <option value="01">Januari</option>
		 <option value="02">Februari</option>
		 <option value="03">Maret</option>
		 <option value="04">April</option>
		 <option value="05">Mei</option>
		 <option value="06" selected="selected">Juni</option>
		 <option value="07">Juli</option>
		 <option value="08">Agustus</option>
		 <option value="09">September</option>
		 <option value="10">Oktober</option>
		 <option value="11" >November</option>
		 <option value="12" >Desember</option>
		
		 
  </select>
	Tahun 
	<select name="tahun" id="tahun">

		 <option value="2019" selected="selected" >2019</option>
		 <option value="2020">2020</option>
    </select>
  </tr>
 
  <tr>
    <td colspan="2" align="right">&nbsp;</td>
    <td align="left" width="64%"><input class="btn" type="submit" name="button" id="button" value="Lihat Laporan" />   
		<br><br><input class="btn" type="button" onClick = "window.location.href = 'laporantransaksiseluruh.php'" id="button2" value="Laporan Keseluruhan" /> </td>
  </tr>
</table>
		</form>

</body>

</html>