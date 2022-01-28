<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Page Title</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
 <link rel="stylesheet" href="css/jquery-ui.css">
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'});
  });
  </script>
</head>
<body>
<div class="container">

<fieldset>
<legend>DATA PRODUK</legend>

<input  id="cari" style = "margin-left:200px" type="text" /> 
<button style = "font-size:14px" type = "button" class="btn btn-default"  onClick="window.location='cariproduk.php?cari=' + document.getElementById('cari').value" >Cari</button> 
</fieldset>
<table class="table table-striped table-bordered" style = "font-size:14px">  
        <thead>  
          <tr>  
            <th>Kode Produk</th>  
            <th>Nama Barang</th> 
			<th>Stok</th>
			<th>Foto</th> 			
            <th>Aksi</th>  
            			
          </tr>  
        </thead> 
<?php 
include("config.php");
if (isset($_GET['cari'])){
		$query = mysql_query("select * from produk where kode_produk like '%$_GET[cari]%'or nama_barang like '%$_GET[cari]%'   
			  order by kode_produk desc");
		
}else
{
		$query = mysql_query("select * from produk order by kode_produk desc");
}

while($row= mysql_fetch_array($query)){
?>		
        <tbody>  
          <tr>  
            <td><?php echo $row['kode_produk'] ; ?> </td>  
            <td><?php echo $row['nama_barang'] ; ?> </td>  
			 <td><?php echo $row['stok'] ; ?> </td> 

			<td><img src="<?php echo $row['foto1'] ; ?>" width = "70" height = "80" /></td> 
			
			<td>
			<button style = "font-size:14px" type = "button" class="btn btn-success"  onClick="window.opener.document.getElementById('kode').value = '<?php echo  $row['kode_produk'] ?>';window.opener.document.getElementById('harga').value = '<?php echo  $row['harga_barang'] ?>';window.opener.document.getElementById('nama').value = '<?php echo  $row['nama_barang'] ?>'; window.close()" >
				Pilih</button>
		
			</td>
          </tr>  
   
        </tbody>  
<?php 
}
?>
      </table>  

</div>

</body>
</html>