<?php 
include("../header.php");
include("../db/conn.php");
?>

<?php 
if(!empty($_POST['carname'])){ 
	$carname=$_POST['carname']; 
	$carbrand=$_POST['carbrand']; 
	$cardisplacement=$_POST['cardisplacement']; 
	$cartype=$_POST['cartype']; 
	$caridnum=$_POST['caridnum']; 
	$caryearcheckstarttime=$_POST['caryearcheckstarttime']; 
	$caryearcheckendtime=$_POST['caryearcheckendtime']; 

	echo $sql="insert into lf_car(id,carname,carbrand, cardisplacement, cartype, caridnum, caryearcheckstarttime, caryearcheckendtime) 
	value (null,'$carname', '$carbrand', '$cardisplacement', '$cartype', '$caridnum', '$caryearcheckstarttime', '$caryearcheckendtime')" ; 
	mysql_query($sql); 
	echo "车辆信息添加成功"; 
} 
?> 

<h1>添加车辆信息</h1>
<form action="./addcar.php" method="post"> 
车名:<input type="text" name="carname"/><br> 
品牌:<input type="text" name="carbrand"/><br> 
排量:<input type="text" name="cardisplacement"/><br> 
类型:<input type="text" name="cartype"/><br> 
车牌:<input type="text" name="caridnum"/><br> 
年检日期(开始):<input type="text" name="caryearcheckstarttime"/><br> 
年检日期(结束):<input type="text" name="caryearcheckendtime"/><br> 
<input type="submit" name="sub" value="完成"> 
</form>