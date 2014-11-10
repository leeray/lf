<?php 
include("../header.php");
include("../db/conn.php");
?>

<?php
if(!empty($_GET['del'])){ 
	$d=$_GET['del']; 
	$sql="delete from lf_car where id ='$d'"; 
} 

$query=mysql_query($sql); 
echo "删除成功"; 
?>