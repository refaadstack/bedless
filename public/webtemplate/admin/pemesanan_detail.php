<?php 
include 'header.php';
?>

<?php
$a = mysql_query("select * from barang_laku");
?>

  <script>
  $(function() {
    $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'});
  });
  </script>
</head>
<body>

<form action="konfirmasi_pesanan.php" method="post">
<fieldset>

<legend>DETAIL PEMESANAN</legend>
<?php 
include("config.php");
$query2 = mysql_query("select * from pemesanan where kodepemesanan = '$_GET[id]'");
$row2= mysql_fetch_array($query2);
$total= $row2['total'];
$member=$row2['kodemember'];

 $query3 = mysql_query("select * from konfirmasi where kodepemesanan = '$_GET[id]'");
$row3= mysql_fetch_array($query3);
$jml = mysql_num_rows($query3);
if($jml>0){
$tglkonfirmasi = $row3['tgltransfer'];
$jumlahbayar = $row3['jumlahbayar'];
$norekening = $row3['norekening'];
$melalui = $row3['melalui'];
$foto = $row3['fotobukti'];
}else
{
$tglkonfirmasi = "";
$jumlahbayar = 0;
$norekening = "";
$melalui = "";
$foto = "fotobukti/no_img.png";  
}
?>

<table border = 0 >
<tr>
<td>Kode Pemesanan</td><td>: <input name="kdpsn" type="hidden" value="<?php echo $row2['kodepemesanan'];?>">
				<?php echo $row2['kodepemesanan'];?></td>
</tr>
<td>Nama pelanggan </td><td>: <?php $sql1=mysql_query("select * from member where kodemember='$member'")or die(mysql_error());
while($d1=mysql_fetch_array($sql1)){ ?>
				<?php echo $d1['namamember'];}?> </td>
</tr>
<tr>
<td>Alamat Kirim </td><td>: <?php $query4=mysql_query("select * from member where kodemember='$member'")or die(mysql_error());
while($d1=mysql_fetch_array($query4)){ ?>
				<?php echo $d1['alamat'];}?></td>
</tr>
<tr>
<td>STATUS </td><td>: 
<select  id = "status" name="status" style = "margin-left:5px" >
				<?php
				if ($row2['Status'] == "Pesanan Baru") echo "<option value = 'Pesanan Baru' selected>Pesanan Baru</option>";
				else echo "<option value='Pesanan Baru'>Pesanan Baru</option>";
				if ($row2['Status'] == "Menunggu Konfirmasi") echo "<option value = 'Menunggu Konfirmasi' selected>Menunggu Konfirmasi</option>";
				else echo "<option value='Menunggu Konfirmasi'>Menunggu Konfirmasi</option>";
				if ($row2['Status'] == "Telah di Konfirmasi") echo "<option value = 'Telah di Konfirmasi' selected>Telah di Konfirmasi</option>";
				else echo "<option value='Telah di Konfirmasi'>Telah di Konfirmasi</option>"; ?>
</select>
</td>
</tr>
<!--<tr>
<td><b>Input Resi</b></td>
                <td width="65%">: <input name="resi" type="text" value=""></td>
</tr>-->
<tr>
<td>Tanggal Pemesanan </td><td>: <?php echo $row2['TanggalPemesanan'];?> </td>
</tr>
<tr>
<td>Bukti Pembayaran</td><td><?php 
						$jumlah_record=mysql_query("SELECT COUNT(*) from konfirmasi where kodepemesanan='$_GET[id]'");
						$jum=mysql_result($jumlah_record, 0);
						if($jum==0){?>
                <td>: Pelanggan belum melakukan pembayaran</td>
                <?php } else { ?>
                <td> 
                <?php        
						$sql1=mysql_query("select * from konfirmasi where kodepemesanan='$_GET[id]'")or die(mysql_error());
						while($d1=mysql_fetch_array($sql1)){ $foto=$d1['fotobukti']; } ?>
				<img src="<?php echo $foto;?>" width="100" height="150"></td>
                <?php } ?>
</tr>

</table>


<table class="table table-striped" border = "1" cellspacing = "0">  
        <thead>  
          <tr>  
            <th>Kode Produk</th>  
            <th>Nama Produk</th> 
			<th>Ukuran</th> 
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
            			
          </tr>  
        </thead> 
<?php 


		$query = mysql_query("select * from detailpemesanan where kodepemesanan = '$row2[kodepemesanan]' order by 1 asc");
$ttl = 0;
while($row= mysql_fetch_array($query)){
	$sql = mysql_query("Select * from produk where kode_produk = '$row[kodeproduk]'");
	$brs = mysql_fetch_array($sql);
	
	$nmbrg = $brs['nama_barang'];
	$harga = $row['harga'];
	$ttl += ($row['jumlah'] * $harga); 
?>		
        <tbody>  
          <tr>  
            <td><?php echo $row['kodeproduk'] ; ?> </td>  
            <td><?php echo $brs['nama_barang']; ?> </td>  
			<td><?php echo $row['ukuran'] ; ?> </td> 
			<td><?php echo $harga ; ?> </td> 
			<td><?php echo $row['jumlah'] ; ?> </td> 
			<td><?php echo $row['jumlah'] * $harga; ?> </td> 
			
          </tr>  
   
        </tbody>  
<?php 
}
?>
      </table>

	  </fieldset>	  
	<button type="submit">Simpan</button><input type = "button" value = "Kembali" onclick = "window.location = 'pemesanan.php'" />
</div>

<script>document.getElementById("status").value = '<?php echo $row2['Status']; ?>'; </script>
<br />

<?php 
include 'footer.php';

?>