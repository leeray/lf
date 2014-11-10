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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="zh-cn" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/calendar.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="../js/calendar/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../js/calendar/lhgcalendar.min.js"></script>
<script type="text/javascript" src="../js/calendar/calendar.js"></script>
<script type="text/javascript">
$(function(){
    $('#appstarttime').calendar({ noToday:false,btnBar:false,targetFormat:'yyyy-MM-dd',maxDate:'#appendtime',format:'yyyy-MM-dd'});
    $('#appendtime').calendar({ noToday:false,btnBar:false,targetFormat:'yyyy-MM-dd',minDate:'#appstarttime',format:'yyyy-MM-dd'});
});
</script>
<title>用车计划申请</title>
</head>

<body>
<form method="post">
用车计划名称:&nbsp;&nbsp; 
<select name="appname" style="width: 119px">
	<option selected="selected" value="固定用车计划">固定用车计划</option>
	<option>临时用车计划</option>
	<option>工程用车计划</option>
	<option>长途用车计划</option>
</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 

车型:&nbsp; 
<select name="car" style="width: 60px">
	<?php
	while($carrs=mysql_fetch_array($carquery)){ 
	?>
	<option value="<?php echo $carrs['id']?>" <?php if($carrs['cartype']==1) echo "selected"?>><?php echo $carrs['cartype'] ?></option>
	<?php
	}
	?>
</select>&nbsp; 

用车开始时间:<input id="appstarttime" name="appstarttime" type="text" class="runcode"/>
用车结束时间:<input id="appendtime" name="appendtime" type="text" class="runcode"/>&nbsp;&nbsp; 
<br />

联系人:
<select name="user" style="width: 91px" />
	<?php
	while($userrs=mysql_fetch_array($userquery)){ 
	?>
	<option value="<?php echo $userrs['id']?>" <?php if($userrs['id']==1) echo "selected"?>><?php echo $userrs['user_name'] ?></option>
	<?php
	}
	?>
</select>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 

部门:
<select name="workunit" style="width: 100px" >
	<?php
	while($workunitrs=mysql_fetch_array($workunitquery)){ 
	?>
	<option value="<?php echo $workunitrs['id']?>" <?php if($workunitrs['id']==1) echo "selected"?>><?php echo $workunitrs['unitname'] ?></option>
	<?php
	}
	?>
</select>
&nbsp; 

联系电话:<input name="userphone" type="text" style="width: 171px" />

备注:<textarea name="appdescript" style="width: 1002px; height: 170px"></textarea>


<input name="Button1" type="button" value="同意" style="width: 77px" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input name="Button2" type="button" value="退回" style="width: 85px" />

</form>

</body>
</html>
