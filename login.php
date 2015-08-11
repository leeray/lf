<?php 
include("../header.php");
include("../db/conn.php");
?>
<?php 
if(empty($_POST['username']) || empty($_POST['userpassword'])){ 
	header("Location: ./login.html"); 
	exit;
} else {
	$username=$_POST['username']; 
	$userpassword=$_POST['userpassword']; 
	
	$sql="select * from lf_user where user_name = '$username' and user_password='$userpassword'";
	$mysql_query($sql); 
	echo "车辆信息添加成功"; 
} 
?> 