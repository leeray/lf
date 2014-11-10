<?php include("header.php")?>
<pre name="code" class="html">
<?php 
include("conn.php");//引入链接数据库 
if(!empty ($_GET['id'])){ 
$sql="select * from lf_user where id='".$_GET['id']."'"; 
$query=mysql_query($sql); 
$rs=mysql_fetch_array($query); 
} 
if(!empty($_POST['user_name'])){ 
	$username=$_POST['user_name']; 
	$password=$_POST['user_password']; 
	$type=$_POST['user_type'];
	$usertime=$_POST['user_time'];
	$hid=$_POST['hid'];
	
	$sql="update lf_user set user_name='$username',user_password='$password' where id='$hid' limit 1 "; 
	mysql_query($sql); 
	echo "<script> alert('更新成功'); location.href='index.php'</script>"; 
	echo"更新成功"; 
} 
?> 
<form action="edit.php" method="post"> 
<input type="hidden" name="hid" value="<?php echo $rs['id']?>"/> 
用户名: <input type="text" name="user_name" value="<?php echo $rs['user_name']?>"><br> 
密码: <input type="password" name="user_password" value="<?php echo $rs['user_password']?>"/>
<input type="submit" name="sub" value="修改"> 
</form></pre><br>