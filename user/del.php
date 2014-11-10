<?php include("header.php")?>
<?php 
include("conn.php");//引入链接数据库

if(!empty($_GET['del'])){ 
	$d=$_GET['del']; 
	$sql="delete from lf_user where id ='$d'"; 
} 

$query=mysql_query($sql); 
echo "删除成功"; 
?>