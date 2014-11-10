<?php include("header.php")?>

<pre name="code" class="html">
	<a href="add.php">添加用户</a> 
<hr> 
<hr> 
<form> 
<input type="text" name="username" /> 
<input type="submit" name="subs" value="搜索"/> 
</form> 
<?php 
include("conn.php");//引入链接数据库 
if(!empty($_GET['keys'])){ 
$w=" user_name like '%".$_GET['username']."%'"; 
}else{ 
$w=1; 
} 
$sql="select * from lf_user where $w order by id desc"; 
$query=mysql_query($sql); 
while($rs=mysql_fetch_array($query)){ 
?> 
<h2>
	用户名:<a href="view.php?id=<?php echo $rs['id'] ?>"><?php echo $rs['user_name'] ?></a> 
	<?php echo $rs['user_type'] ?>
	<?php echo $rs['user_time'] ?>
	<a href="edit.php?id=<?php echo $rs['id'] ?>">编辑</a>｜｜<a href="del.php?del=<?php echo $rs['id'] ?>">删除</a>
</h2>  
<hr> 
<?php 
} 
?> 
