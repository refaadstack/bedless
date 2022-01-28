<?php include('../admin/koneksi.php'); ?>
<?php include('tglindo.php'); ?>
<html>
<head>
<title>Cetak Struk Pemesanan</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../styles/styles_cetak.css" rel="stylesheet" type="text/css">
</head>
<body onLoad="window.print()">
<center><h1>STRUK PEMESANAN</h1></center>
<center><h1>CHOO CHOO PETSHOP</h1></center>
<b><hr width="50%" align="center"></b>
<br>

  <table width="800" border="0" cellpadding="3" cellspacing="1" align="center">
    <tr>
    <td><b>No Order</b></td>
    <td width="10"><b>:</b></td>
      <td width="521"><?php $id=$_GET['id']; echo $id;?></td>
    </tr>
    <?php $nama="select b.*, p.*, w.* from pembelian b left join pelanggan p on p.username = b.username left join wilayah w on w.kodewilayah=b.kodewilayah  where id_beli='$id'";
				$rs=mysql_query($nama);
				while($row=mysql_fetch_array($rs)){
				$ongkir=$row['ongkos'];?>
    <tr>
      <td width="199"><b>Nama Pelanggan</b></td>
      <td width="10"><b>:</b></td>
      <td width="521"><?php echo $row['namalengkap'];?></td>
    </tr>
    <tr>
      <td><b>Alamat</b></td>
      <td><b>:</b></td>
      <td><?php echo $row['alamat'];?></td>
    </tr>
    <tr>
      <td><b>No. Handphone</b></td>
      <td><b>:</b></td>
      <td><?php echo $row['nohp'];?></td>
    </tr>
    <?php 
				$wilayah=$row['kodewilayah'];
				$jp=mysql_query("select w.*, j.* from wilayah w left join jasapengiriman j on j.kodejp=w.kodejp where kodewilayah='$wilayah'");
					  while($z=mysql_fetch_array($jp)){?>
    <tr>
      <td><b>Jasa Pengiriman</b></td>
      <td><b>:</b></td>
      <td><?php echo $z['namajp'];?></td>
    </tr>
    <tr>
      <td><b>Kota Tujuan</b></td>
      <td><b>:</b></td>
	  <td><?php echo $row['namawilayah'];?></td>
    </tr>
    <?php } ?>
    <?php } ?>
    </tr>
</table>
<br />
<table width="800" cellpadding="0" cellspacing="0" border="1" align="center" >
          <tr align="center">
          <th>Nama Produk</th>
          <th>Qty</th>
          <th>Berat(Kg)</th>
          <th>Harga</th>
          <th>Subtotal Harga</th>
          </tr>
          <?php $tampilkan= mysql_query("SELECT d.*, p.* FROM detail_beli d left join produk p on p.kodeproduk=d.kodeproduk where id_beli='$id'");
		  $totalberat=0;
		  $total=0;
		  while ($p=mysql_fetch_array($tampilkan)) {
		  $subtotal   	 = $p['harga']* $p['jumlah'];
          $total      	 = $total + $subtotal;
		  $totalberat	 = $totalberat + $p['berat'];?>
          <tr align="center">
          <td width="170px"><?php echo $p['namaproduk'];?></td>
          <td width="50px"><?php echo $p['jumlah'];?></td>
          <td width="80px"><?php echo $p['berat'];?></td>
          <td width="150px"><?php echo $p['harga'];?></td>
          <td width="150px"><?php echo $subtotal; ?></td>
          </tr>
          <?php }?>
</table>
<br />
<table width="800" border="0" cellpadding="3" cellspacing="1" align="center">
    <tr>
    <td><b>Total</b></td>
    <td width="10"><b>:</b></td>
      <td width="521">Rp <?php echo number_format($total);?></td>
    </tr>
    <tr>
      <td width="199"><b>Total Berat</b></td>
      <td width="10"><b>:</b></td>
      <td width="521"><?php echo $totalberat;?> Kg</td>
    </tr>
    <tr>
      <td><b>Ongkir</b></td>
      <td><b>:</b></td>
      <td>Rp <?php echo number_format($ongkir);?></td>
    </tr>
    <tr>
      <td><b>Total Ongkir</b></td>
      <td><b>:</b></td>
      <td>Rp <?php $totalongkir= $totalberat*$ongkir;
		  echo number_format($totalongkir);?></td>
    </tr>
    <tr>
      <td><b>Total Harga</b></td>
      <td><b>:</b></td>
      <td>Rp 
    <?php $totalharga=$totalongkir+$total;
		  echo number_format($totalharga);?></td>
    </tr>
    </tr>
</table>

</body>
</html>
