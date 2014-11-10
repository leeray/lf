<?php 
include("../header.php");
include("../db/conn.php");
?>

<?php 
if(!empty ($_GET['id'])){ 
	$sql="select * from lf_car where id='".$_GET['id']."'"; 
	$query=mysql_query($sql); 
	$rs=mysql_fetch_array($query); 
} 
if(!empty($_POST['carname'])){ 
	$carname=$_POST['carname']; 
	$carbrand=$_POST['carbrand']; 
	$cardisplacement=$_POST['cardisplacement'];
	$cartype=$_POST['cartype'];
	$caridnum=$_POST['caridnum'];
	$caryearcheckstarttime=$_POST['caryearcheckstarttime'];
	$caryearcheckendtime=$_POST['caryearcheckendtime'];
	$hid=$_POST['hid'];
	
	$sql="update lf_car set carname='$carname',carbrand='$carbrand',cardisplacement='$cardisplacement',cartype='$cartype',caridnum='$caridnum',caryearcheckstarttime='$caryearcheckstarttime',caryearcheckendtime='$caryearcheckendtime', where id='$hid' limit 1 "; 
	mysql_query($sql); 
	echo "<script> alert('更新车辆信息成功'); location.href='./allcar.php'</script>"; 
	echo"更新成功"; 
} 
?> 

<form action="./editcar.php" method="post"> 
<input type="hidden" name="hid" value="<?php echo $rs['id']?>"/> 
车名:<input type="text" name="carname" value="<?php echo $rs['carname']?>"/><br> 
品牌:<input type="text" name="carbrand" value="<?php echo $rs['carbrand']?>"/><br> 
排量:<input type="text" name="cardisplacement" value="<?php echo $rs['cardisplacement']?>"/><br> 
类型:<input type="text" name="cartype" value="<?php echo $rs['cartype']?>"/><br> 
车牌:<input type="text" name="caridnum" value="<?php echo $rs['caridnum']?>"/><br> 
年检日期(开始):<input type="text" name="caryearcheckstarttime" value="<?php echo $rs['caryearcheckstarttime']?>"/><br> 
年检日期(结束):<input type="text" name="caryearcheckendtime" value="<?php echo $rs['caryearcheckendtime']?>"/><br> 
<input type="submit" name="sub" value="修改"> 
</form>
