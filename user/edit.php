<?php 
include("header.php");
include("conn.php");//引入链接数据库 

if(!empty ($_GET['id'])){ 
	$sql="select * from lf_user where id='".$_GET['id']."'"; 
	$query=mysql_query($sql); 
	$rs=mysql_fetch_array($query); 
} 
if(!empty($_POST['user_name'])){ 
	$username=$_POST['user_name']; 
	$password=$_POST['user_password']; 
	$type=$_POST['user_type'];
	$usertime=$_POST['user_time'];
	$hid=$_POST['hid'];
	
	$sql="update lf_user set user_name='$username',user_password='$password' where id='$hid' limit 1 "; 
	mysql_query($sql); 
	echo "<script> alert('更新成功'); location.href='index.php'</script>"; 
	echo"更新成功"; 
} 
?> 
<html>
<head>
<title>编辑用户信息</title>
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
    $('#caryearcheckstarttime').calendar({ noToday:false,btnBar:false,targetFormat:'yyyy-MM-dd',maxDate:'#caryearcheckstarttime',format:'yyyy-MM-dd'});
    $('#caryearcheckendtime').calendar({ noToday:false,btnBar:false,targetFormat:'yyyy-MM-dd',minDate:'#caryearcheckendtime',format:'yyyy-MM-dd'});
});
</script>
<body>
<form action="edit.php" method="post"> 
<input type="hidden" name="hid" value="<?php echo $rs['id']?>"/> 
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
            <TD class=manageHead>当前位置：车辆调度系统 &gt; 用户管理 &gt; 编辑用户信息</TD></TR>
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
                      <TD>用户名:</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD><input type="text" name="username" value="<?php echo $rs['user_name']?>"/></TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                    </TR>
					<TR>
                      <TD>密码:</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD><input type="password" name="password" value="<?php echo $rs['user_password']?>"/></TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                    </TR>
                    <TR>
                      <TD>重复密码:</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD><input type="password" name="password1"/></TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                    </TR>
                    <TR>
                      <TD>用户类型:</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>
                      	<select name="cartype" style="width: 100px">
							<option value="1">科员 </option>
							<option value="2">科长 </option>
							<option value="3">处长 </option>
							<option value="4">干部 </option>
						</select>
                      </TD>
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
                      <TD><input type="submit" name="sub" value="修改"> </TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
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