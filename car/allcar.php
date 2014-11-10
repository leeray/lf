<?php 
include("../header.php");
include("../db/conn.php");
?>

<pre name="code" class="html">
	<a href="./addcar.php">添加车辆信息</a> 
</pre>

<form> 
<input type="text" name="carname" /> 
<input type="submit" name="subs" value="搜索"/> 
</form> 
<?php 
if(!empty($_GET['carname'])){ 
	$w=" carname like '%".$_GET['carname']."%'"; 
}else{ 
	$w=1; 
} 
$sql="select * from lf_car where $w order by id desc"; 
$query=mysql_query($sql); 
?>
<table>
<tr>
<th>车辆名称</th>
<th>品牌</th>
<th>类型</th>
<th>车牌</th>
<th>年检日期</th>
<th> # </th>
</tr>

<?php
while($rs=mysql_fetch_array($query)){ 
?> 
	<tr>
	<th><a href="viewcar.php?id=<?php echo $rs['id'] ?>"><?php echo $rs['carname'] ?></a> </th>
	<th><?php echo $rs['carbrand'] ?></th>
	<th><?php echo $rs['cartype'] ?></th>
	<th><?php echo $rs['caridnum'] ?></th>
	<th><?php echo $rs['caryearcheckstarttime'] ?></th>
	<th>
	<a href="editcar.php?id=<?php echo $rs['id'] ?>">编辑</a>｜｜<a href="delcar.php?del=<?php echo $rs['id'] ?>">删除</a></th>
	</tr>  
<?php 
} 
?>
</table> 
