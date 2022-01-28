<?php 

include("config.php");

$query = mysql_query("select * from voucher where kodevoucher = '$_GET[kd]' and tanggalberlaku >= date(now()) ");
$row = mysql_fetch_array($query);

echo $row['potongan'];

?>