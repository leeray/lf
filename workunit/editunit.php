<?php 
include("../header.php");
include("../db/conn.php");
?>

<?php 
if(!empty ($_GET['id'])){ 
	$sql="select * from lf_workunit where id='".$_GET['id']."'"; 
	$query=mysql_query($sql); 
	$rs=mysql_fetch_array($query); 
} 
if(!empty($_POST['unitname'])){ 
	$unitname=$_POST['unitname']; 
	$unitworkernumber=$_POST['unitworkernumber']; 
	$unitdescript=$_POST['unitdescript'];

	$hid=$_POST['hid'];
	
	$sql="update lf_workunit set unitname='$unitname',unitworkernumber='$unitworkernumber',unitdescript='$unitdescript' where id='$hid' limit 1 "; 
	mysql_query($sql); 
	echo "<script> alert('更新部门信息成功'); location.href='./allunit.php'</script>"; 
	echo"更新成功"; 
} 
?> 

<form action="./editunit.php" method="post"> 
<input type="hidden" name="hid" value="<?php echo $rs['id']?>"/> 
单位名称:<input type="text" name="unitname" value="<?php echo $rs['unitname']?>"/><br> 
单位人数:<input type="text" name="unitworkernumber" value="<?php echo $rs['unitworkernumber']?>"/><br> 
描述:<textarea name="unitdescript" ><?php echo $rs['cardisplacement']?> </textarea><br> 
<input type="submit" name="sub" value="修改"> 
</form>
