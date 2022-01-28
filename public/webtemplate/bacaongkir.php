<?php 

include("config.php");

$query = mysql_query("select * from wilayah where kodewilayah = '$_GET[kd]'");
$row = mysql_fetch_array($query);

echo $row['ongkir'];

?>