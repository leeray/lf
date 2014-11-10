<?php include("header.php")?>
<?php 
include("conn.php");//引入链接数据库 

if(!empty($_POST['username'])){ 
	$username=$_POST['username']; 
	$password=$_POST['password']; 
	echo $sql="insert into lf_user(id,user_name,user_password, user_type, user_time) value (null,'$username', '$password', 1, now())" ; 
	mysql_query($sql); 
	echo"插入成功"; 
} 
?> 

<form action="add.php" method="post"> 
用户名: <input type="text" name="username"/><br> 
密码: <input type="password" name="password"/><br> 

<input type="submit" name="sub" value="完成"> 
</form>