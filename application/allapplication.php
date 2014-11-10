<?php 
include("../header.php");
include("../db/conn.php");
?>
<?php
$w=1; 

$workunitsql="select * from lf_workunit where $w order by id desc"; 
$workunitquery=mysql_query($workunitsql);

$usersql="select * from lf_user where $w order by id desc";
$userquery=mysql_query($usersql);

$carsql = "select * from lf_car where $w order by id desc";
$carquery = mysql_query($carsql);

if(!empty($_GET['workunit_id'])){ 
	$wid = "wid='%".$_GET['workunit_id']."%'";
}else{
	$wid = 1;
}

if(!empty($_GET['workunit_id'])){ 
	$wid = "wid='%".$_GET['workunit_id']."%'";
}else{
	$wid = 1;
}

if(!empty($_GET['car_id'])){ 
	$cid = "cid='%".$_GET['workunit_id']."%'";
}else{
	$cid = 1;
}

if(!empty($_GET['apptime'])){ 
	$apptimeid = "appstarttime <='%".$_GET['apptime']."%' and appendtime<='%".$_GET['apptime']."%'";
}else{
	$apptimeid = 1;
}

$applicationsql = "select * from lf_application where $w and $cid and $apptimeid order by id desc";
$applicationquery = mysql_query($applicationsql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="zh-cn" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>申请用车查询</title>
</head>
<body>

<p>部门:
<select name="workunit_id" style="width: 100px" >
	<?php
	while($workunitrs=mysql_fetch_array($workunitquery)){ 
	?>
	<option value="<?php echo $workunitrs['id']?>" <?php if($workunitrs['id']==1) echo "selected"?>><?php echo $workunitrs['unitname'] ?></option>
	<?php
	}
	?>
</select>js

用车时间:<input name="apptime" type="text" />

车型:
<select name="car_id">
	<?php
	while($carrs=mysql_fetch_array($carquery)){ 
	?>
	<option value="<?php echo $carrs['id']?>" <?php if($carrs['cartype']==1) echo "selected"?>><?php echo $carrs['cartype'] ?></option>
	<?php
	}
	?>
</select>

<input name="Button1" type="button" value="查询" /></p>
<form method="post">
</form>

<table>
<tr>
<th>计划名称</th>
<th>用车类型</th>
<th>部门</th>
<th>联系人</th>
<th>电话</th>
<th>用车开始时间</th>
<th>用车结束时间</th>
<th> # </th>
</tr>
<?php
while($applicationrs=mysql_fetch_array($applicationquery)){ 
?> 
	<tr>
	<th><?php echo $applicationrs['appname'] ?></th>
	<th><?php echo $applicationrs['cid'] ?></th>
	<th><?php echo $applicationrs['wid'] ?></th>
	<th><?php echo $applicationrs['uid'] ?></th>
	<th><?php echo $applicationrs['uid'] ?></th>
	<th><?php echo $applicationrs['appstarttime'] ?></th>
	<th><?php echo $applicationrs['appendtime'] ?></th>
	<th>
	<a href="editapplication.php?id=<?php echo $applicationrs['id'] ?>">编辑</a>｜｜<a href="delapplication.php?del=<?php echo $applicationrs['id'] ?>">删除</a></th>
	</tr>  
<?php 
} 
?>
</body>

</html>
