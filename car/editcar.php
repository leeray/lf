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
<html>
<head>
<title>编辑车辆信息</title>
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
<form action="./editcar.php" method="post"> 
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
            <TD class=manageHead>当前位置：车辆调度系统 &gt; 车辆管理 &gt; 修改车辆信息</TD></TR>
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
                      <TD>品牌:</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD><input type="text" name="carbrand" value="<?php echo $rs['carbrand']?>"/></TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                    </TR>
                    <TR>
                      <TD>类型:</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>
                      	<input type="text" name="cartype" value="<?php echo $rs['cartype']?>"/>
                      	<select name="cartype" style="width: 100px">
							<option value="1">皮卡 </option>
							<option value="2">轿车 </option>
							<option value="3">板车 </option>
							<option value="4">吊车 </option>
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
                      <TD>车牌:</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD><input type="text" name="caridnum" value="<?php echo $rs['caridnum']?>"/></TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                    </TR>
                    <TR>
                      <TD>年检日期(开始):</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>
                      	<input id="caryearcheckstarttime" type="text" name="caryearcheckstarttime" value="<?php echo $rs['caryearcheckstarttime']?>"/>
                      </TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                    </TR>
                    <TR>
                      <TD>年检日期(结束):</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>
                      	<input id="caryearcheckendtime" type="text" name="caryearcheckendtime" value="<?php echo $rs['caryearcheckendtime']?>"/>
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