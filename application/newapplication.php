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
$workunitsql="select * from lf_workunit where $w order by id desc"; 
$workunitquery=mysql_query($workunitsql);

$usersql="select * from lf_user where $w order by id desc";
$userquery=mysql_query($usersql);

$carsql = "select * from lf_car where $w order by id desc";
$carquery = mysql_query($carsql);
?>
<html>
<head>
<title>车辆申请</title>
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
<link href="../css/calendar.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="../js/calendar/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../js/calendar/lhgcalendar.min.js"></script>
<script type="text/javascript" src="../js/calendar/calendar.js"></script>
<script type="text/javascript">
$(function(){
    $('#appstarttime').calendar({ noToday:false,btnBar:false,targetFormat:'yyyy-MM-dd',maxDate:'#appstarttime',format:'yyyy-MM-dd'});
    $('#appendtime').calendar({ noToday:false,btnBar:false,targetFormat:'yyyy-MM-dd',minDate:'#appendtime',format:'yyyy-MM-dd'});
});
</script>
<body>
<form action="./addcar.php" method="post"> 
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
            <TD class=manageHead>当前位置：车辆调度系统 &gt; 车辆申请管理 &gt; 填写申请</TD></TR>
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
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                    </TR>
                    <TR>
                      <TD>用车计划名称:</TD>
                      <TD>
						<select name="appname" style="width: 119px">
              <?php 
              if ($user_type == 3) {
              ?>
							<option selected="selected" value="固定用车计划">固定用车计划</option>
              <?php
              }
              ?>
							<option>临时用车计划</option>
							<option>长途用车计划</option>
						</select>
                      </TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                    </TR>
                    <TR>
                      <TD>车型:</TD>
                      <TD>
						<select name="car" style="width: 60px">
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
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                    </TR>
                    <TR>
                      <TD COLSPAN=10>&nbsp;</TD>
                    </TR>
					<TR>
                      <TD>用车开始时间:</TD>
                      <TD><input id="appstarttime" name="appstarttime" type="text" class="runcode"/></TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>用车结束时间:</TD>
                      <TD><input id="appendtime" name="appendtime" type="text" class="runcode"/></TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                    </TR>
                    <TR>
                      <TD>联系人:</TD>
                      <TD>
						<select name="user" style="width: 91px" />
							<?php
							while($userrs=mysql_fetch_array($userquery)){ 
							?>
							<option value="<?php echo $userrs['id']?>" <?php if($userrs['id']==1) echo "selected"?>><?php echo $userrs['user_name'] ?></option>
							<?php
							}
							?>
						</select>
                      </TD>
                      <TD>部门:</TD>
                      <TD>
						<select name="workunit" style="width: 100px" >
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
                      <TD>联系电话:</TD>
                      <TD><input name="userphone" type="text" style="width: 171px" /></TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                    </TR>
                    </TR>
                    <TR>
                      <TD COLSPAN=10>&nbsp;</TD>
                    </TR>
                    <TR>
                      <TD>备注:</TD>
                      <TD COLSPAN=9>
                      	<textarea name="appdescript" style="width: 1002px; height: 170px"></textarea>
                      </TD>
                    </TR>
                    <TR>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                    </TR>
                    <TR>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD><input name="Button1" type="button" value="申请" style="width: 77px" /> </TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD><input name="Button2" type="button" value="退回" style="width: 85px" /></TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                    </TR>
                  </TBODY>
                </TABLE>
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

