<?php 
include("header.php");
include("conn.php");//引入链接数据库 

if(!empty($_GET['keys'])){ 
	$w=" user_name like '%".$_GET['username']."%'"; 
}else{ 
	$w=1; 
} 

$sql="select * from lf_user where $w order by id desc"; 
$query=mysql_query($sql); 
?> 
<html>
<head>
<title>用户列表</title>
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
            <TD class=manageHead>当前位置：车辆调度系统 &gt; 用户管理 &gt; 用户列表</TD></TR>
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
                      <TD>搜索用户:</TD>
                      <TD>
                        <INPUT class=textbox id=sChannel2 style="WIDTH: 80px" maxLength=50 name=username>
                      </TD>
                      <TD>
                        <INPUT class=button id=sButton2 type=submit value=" 搜索 " name=sButton2>
                      </TD>
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
            <TR>
              <TD>
                <TABLE id=grid 
                style="BORDER-TOP-WIDTH: 0px; FONT-WEIGHT: normal; BORDER-LEFT-WIDTH: 0px; BORDER-LEFT-COLOR: #cccccc; BORDER-BOTTOM-WIDTH: 0px; BORDER-BOTTOM-COLOR: #cccccc; WIDTH: 100%; BORDER-TOP-COLOR: #cccccc; FONT-STYLE: normal; BACKGROUND-COLOR: #cccccc; BORDER-RIGHT-WIDTH: 0px; TEXT-DECORATION: none; BORDER-RIGHT-COLOR: #cccccc" 
                cellSpacing=1 cellPadding=2 rules=all border=0>
                  <TBODY>
                    <TR style="FONT-WEIGHT: bold; FONT-STYLE: normal; BACKGROUND-COLOR: #eeeeee; TEXT-DECORATION: none">
                      <TD>#</TD>
                      <TD>用户名</TD>
                      <TD>类型</TD>
                      <TD>创建日期</TD>
                      <TD>操作</TD>
                  	</TR>
                  	<?php
					while($rs=mysql_fetch_array($query)){ 
					?> 
                    <TR style="FONT-WEIGHT: normal; FONT-STYLE: normal; BACKGROUND-COLOR: white; TEXT-DECORATION: none">
                      <TD><?php echo $rs['id']?></TD>
                      <TD><a href="view.php?id=<?php echo $rs['id'] ?>"><?php echo $rs['user_name'] ?></a> </TD>
                      <TD><?php echo $rs['user_type'] ?> </TD>
                      <TD><?php echo $rs['user_time'] ?> </TD>
                      <TD>
                      	<a href="edit.php?id=<?php echo $rs['id'] ?>">编辑</a>｜｜<a href="del.php?del=<?php echo $rs['id'] ?>">删除</a>
                      </TD>
                    </TR>
                    <?php 
					} 
					?>
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
