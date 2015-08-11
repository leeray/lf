<?php 
include("../header.php");
include("../db/conn.php");
?>
<?php
include("../user/user_session.php");
Session_start();
$userSession = $_SESSION["userSession"];
if (!$userSession) {
  echo "<alert>你没有登陆！</alert>"

  return;
}
$user_type = $userSession.getUsertype();
?>

<?php
$w=1;

if ($user_type != 3) {
  $uquery = "uid = ".$userSession.getUserid()."'";
} else {
  $uquery = 1;
}

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

$applicationsql = "select * from lf_application where $w and $cid and $apptimeid and $uquery order by id desc";
$applicationquery = mysql_query($applicationsql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<title>申请列表</title>
</head>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<LINK href="../css/Style.css" type=text/css rel=stylesheet>
<LINK href="../css/Manage.css" type=text/css rel=stylesheet>
<SCRIPT language=javascript src="../js/FrameDiv.js"></SCRIPT>
<SCRIPT language=javascript src="../js/Common.js"></SCRIPT>
<SCRIPT language=javascript>
        function selectallbox()
        {
            var list = document.getElementsByName('setlist');
            var listAllValue='';
             if(document.getElementById('checkAll').checked)
             {
                  for(var i=0;i<list.length;i++)
                  {
                    list[i].checked = true;
                    if(listAllValue=='')
                        listAllValue=list[i].value;
                    else
                        listAllValue = listAllValue + ',' + list[i].value;
                  }
                  document.getElementById('boxListValue').value=listAllValue;
             }
             else 
             {
                  for(var i=0;i<list.length;i++)
                  {
                    list[i].checked = false;
                  }
                  document.getElementById('boxListValue').value='';
             }
         } 
    </SCRIPT>

<META content="MSHTML 6.00.2900.3492" name=GENERATOR>
<body>
<form>
<TABLE cellSpacing=0 cellPadding=0 width="98%" border=0>
<TBODY>
  <TR>
    <TD width=15><IMG src="../images/YHChannelApply.files/new_019.jpg" border=0></TD>
    <TD width="100%" background=../images/YHChannelApply.files/new_020.jpg height=20></TD>
    <TD width=15><IMG src="../images/YHChannelApply.files/new_021.jpg" border=0></TD>
  </TR>
</TBODY>
</TABLE>
<TABLE cellSpacing=0 cellPadding=0 width="98%" border=0>
  <TBODY>
    <TR>
      <TD width=15 background=../images/YHChannelApply.files/new_022.jpg>
        <IMG src="../images/YHChannelApply.files/new_022.jpg" border=0> 
      </TD>
      <TD vAlign=top width="100%" bgColor=#ffffff>
        <TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>
          <TR>
            <TD class=manageHead>当前位置：车辆调度系统 &gt; 车辆申请管理 &gt; 车辆申请列表</TD></TR>
          <TR>
            <TD height=2></TD></TR>
        </TABLE>
        <TABLE borderColor=#cccccc cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
          <TBODY>
            <TR>
              <TD height=25>
                <TABLE cellSpacing=0 cellPadding=2 border=0>
                  <TBODY>
                    <TR>
                      <TD>部门:</TD>
                      <TD>
                      	<select name="workunit_id" style="width: 100px" >
							<?php
							while($workunitrs=mysql_fetch_array($workunitquery)){ 
							?>
							<option value="<?php echo $workunitrs['id']?>" <?php if($workunitrs['id']==1) echo "selected"?>><?php echo $workunitrs['unitname'] ?></option>
							<?php
							}
							?>
						</select>
                      </TD>
                      <TD>&nbsp;</TD>
                      <TD>用车时间:</TD>
                      <TD>
                        <INPUT class=textbox id=sChannel2 style="WIDTH: 80px" maxLength=50 name=apptime/>
                       </TD>
                      <TD>&nbsp;</TD>
                      <TD>车型:</TD>
                      <TD>
                      	<select name="car_id">
							<?php
							while($carrs=mysql_fetch_array($carquery)){ 
							?>
							<option value="<?php echo $carrs['id']?>" <?php if($carrs['cartype']==1) echo "selected"?>><?php echo $carrs['cartype'] ?></option>
							<?php
							}
							?>
						</select>
					  </TD>
                      <TD>&nbsp;</TD>
                      <TD>
                        <INPUT class=button id=sButton2 type=submit value=" 查询 " name=sButton2>
                      </TD>
                    </TR>
                  </TBODY>
                </TABLE>
              </TD>
            </TR>
            <TR>
              <TD>
                <TABLE id=grid 
                style="BORDER-TOP-WIDTH: 0px; FONT-WEIGHT: normal; BORDER-LEFT-WIDTH: 0px; BORDER-LEFT-COLOR: #cccccc; BORDER-BOTTOM-WIDTH: 0px; BORDER-BOTTOM-COLOR: #cccccc; WIDTH: 100%; BORDER-TOP-COLOR: #cccccc; FONT-STYLE: normal; BACKGROUND-COLOR: #cccccc; BORDER-RIGHT-WIDTH: 0px; TEXT-DECORATION: none; BORDER-RIGHT-COLOR: #cccccc" 
                cellSpacing=1 cellPadding=2 rules=all border=0>
                  <TBODY>
                    <TR style="FONT-WEIGHT: bold; FONT-STYLE: normal; BACKGROUND-COLOR: #eeeeee; TEXT-DECORATION: none">
                      <TD>#</TD>
                      <TD>计划名称</TD>
                      <TD>用车类型</TD>
                      <TD>部门</TD>
                      <TD>联系人</TD>
                      <TD>电话</TD>
                      <TD>时间</TD>
                      <TD>操作</TD>
                  	</TR>
                  	<?php
					while($applicationrs=mysql_fetch_array($applicationquery)){ 
					?> 
                    <TR style="FONT-WEIGHT: normal; FONT-STYLE: normal; BACKGROUND-COLOR: white; TEXT-DECORATION: none">
                      <TD><?php echo $applicationrs['id']?></TD>
                      <TD><?php echo $applicationrs['appname'] ?></TD>
                      <TD><?php echo $applicationrs['cid'] ?></TD>
                      <TD><?php echo $applicationrs['wid'] ?></TD>
                      <TD><?php echo $applicationrs['uid'] ?></TD>
                      <TD><?php echo $applicationrs['uid'] ?></TD>
                      <TD><?php echo $applicationrs['appstarttime'] ?> -  <?php echo $applicationrs['appendtime'] ?></TD>
                      <TD>
                      	<a href="editapplication.php?id=<?php echo $applicationrs['id'] ?>">通过</a>
                      	｜｜
                      	<a href="delapplication.php?del=<?php echo $applicationrs['id'] ?>">拒绝申请</a>
                      </TD>
                    </TR>
                    <?php 
					} 
					?>
                  </TBODY>
                </TABLE>
              </TD>
            </TR>
            <TR>
              <TD align=right height=25>
                <INPUT id=boxListValue type=hidden name=boxListValue>
                <INPUT class=button id=button1 type=submit value=批量审核通过 name=button1> 
                <INPUT class=button id=button2 type=submit value=批量拒绝申请 name=button2> 
                <INPUT onclick=selectallbox(); type=checkbox name=checkAll> 
                全选&nbsp;&nbsp;&nbsp; 
              </TD>
            </TR>
            <TR>
              <TD>
                <SPAN id=pagelink>
                  <DIV style="LINE-HEIGHT: 20px; HEIGHT: 20px; TEXT-ALIGN: right">
                    [<B>84</B>]条记录 [6]页 当前是[46-60]条 
                    [<A href="#">前一页</A>] 
                    <A class="" href="#">1</A> 
                    <A class="" href="#">2</A> 
                    <A class="" href="#">3</A> 
                    <B>4</B> 
                    <A class="" href="#">5</A> 
                    <A class="" href="#">6</A> 
                    [<A class="" href="#">后一页</A>] 
                    <SELECT>
                      <OPTION value=1>第1页</OPTION>
                      <OPTION value=2>第2页</OPTION>
                      <OPTION value=3>第3页</OPTION>
                      <OPTION value=4 selected>第4页</OPTION>
                      <OPTION value=5>第5页</OPTION>
                      <OPTION value=6>第6页</OPTION>
                    </SELECT>
                  </DIV>
                </SPAN>
              </TD>
            </TR>
          </TBODY>
        </TABLE>
      </TD>
      <TD width=15 background=../images/YHChannelApply.files/new_023.jpg>
        <IMG src="../images/YHChannelApply.files/new_023.jpg" border=0> 
      </TD>
    </TR>
  </TBODY>
</TABLE>
<TABLE cellSpacing=0 cellPadding=0 width="98%" border=0>
  <TBODY>
    <TR>
      <TD width=15><IMG src="../images/YHChannelApply.files/new_024.jpg" border=0></TD>
      <TD align=middle width="100%" background=../images/YHChannelApply.files/new_025.jpg height=15></TD>
      <TD width=15><IMG src="../images/YHChannelApply.files/new_026.jpg" border=0></TD>
    </TR>
  </TBODY>
</TABLE>
</form> 
</body>
</html>
