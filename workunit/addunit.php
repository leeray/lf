<?php 
include("../header.php");
include("../db/conn.php");
?>

<?php 
if(!empty($_POST['unitname'])){ 
	$unitname=$_POST['unitname']; 
	$unitworkernumber=$_POST['unitworkernumber']; 
	$unitdescript=$_POST['unitdescript']; 

	echo $sql="insert into lf_workunit(id,unitname,unitworkernumber, unitdescript) 
	value (null,'$unitname', '$unitworkernumber', '$unitdescript')" ; 
	mysql_query($sql); 
	echo "车辆信息添加成功"; 
} 
?> 

<h1>添加车辆信息</h1>
<form action="./addunit.php" method="post"> 
单位名称:<input type="text" name="unitname"/><br> 
单位人数:<input type="text" name="unitworkernumber"/><br> 
描述:<textarea type="text" name="unitdescript"> </textarea><br> 
<input type="submit" name="sub" value="完成"> 
</form>