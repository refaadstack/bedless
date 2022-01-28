<?php

$link=mysql_connect('localhost','root','') or die ("Database tidak dapat dihubungkan!");
mysql_select_db('omdut_coffee',$link);

/*session_start();
if(!isset($_SESSION['username']))
{
header("location:login.php");

}
*/
?>
