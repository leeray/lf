<?php 
include("../header.php");
include("../db/conn.php");
?>

<pre name="code" class="html">
	<a href="./addunit.php">添加部门信息</a> 
</pre>

<form> 
<input type="text" name="unitname" /> 
<input type="submit" name="subs" value="搜索"/> 
</form> 
<?php 
if(!empty($_GET['unitname'])){ 
	$w=" unitname like '%".$_GET['unitname']."%'"; 
}else{ 
	$w=1; 
} 
$sql="select * from lf_workunit where $w order by id desc"; 
$query=mysql_query($sql); 
?>
<table>
<tr>
<th>部门名称</th>
<th>人数</th>
<th>说明</th>
<th> # </th>
</tr>

<?php
while($rs=mysql_fetch_array($query)){ 
?> 
	<tr>
	<th><a href="viewunit.php?id=<?php echo $rs['id'] ?>"><?php echo $rs['unitname'] ?></a> </th>
	<th><?php echo $rs['unitworkernumber'] ?></th>
	<th><?php echo $rs['unitdescript'] ?></th>
	<th>
	<a href="editunit.php?id=<?php echo $rs['id'] ?>">编辑</a>｜｜<a href="delunit.php?del=<?php echo $rs['id'] ?>">删除</a></th>
	</tr>  
<?php 
} 
?>
</table> 
