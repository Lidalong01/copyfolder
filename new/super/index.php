<?php
// 包含雷库文件，初始化对象


//设置用户状态

//删除用户

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>多用户博客系统</title>
<link href="../inc/css.css" rel="stylesheet" type="text/css">
</head>
<table width="750" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse">
  <tr>
    <td height="100"><img src="../pic_sys/00.jpg" width="750" height="100"></td>
  </tr>
  <tr>
    <td height="30" class="title"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="68%" class="title">多用户博客系统</td>
        <td width="32%" class="title"><a href="../super/">注册用户管理</a>&nbsp;&nbsp;<a href="../super/super_key.php">安全设置</a>&nbsp;&nbsp;<a href="../super/logout.php">注销</a></td>
        </tr>
    </table></td>
  </tr>
</table>
<table width="752" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse">
  <tr>
    <td width="1" height="199" bgcolor="#CCCCCC"></td>
    <td colspan="2" align="center" valign="top"><table width="90%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td align="center" valign="top">
		<!--显示所有用户 --><br>
		<?php
		$query="select * from user_info order by id desc";
		$rst=$folie->excu($query);
		if(mysql_num_rows($rst)>=1){
		$add="index.php?";
		$pagesize=10;
		$crazy->pagination($query,$page_id,$add,$pagesize);
		$rst=$folie->excu($query);
		?>
		<table width="98%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse">
          <tr>
            <td width="8%" height="25" align="center">序号</td>
            <td width="14%" align="center">昵称</td>
            <td width="30%" align="center">注册时间</td>
            <td width="30%" align="center">最后登录时间</td>
            <td width="9%" align="center">状态</td>
            <td width="9%" align="center">操作</td>
          </tr>
		  <?php
		  $i=1;
		  while($info=mysql_fetch_array($rst)){
		  ?>
          <tr align="center" valign="middle">
            <td height="25"><?php echo $i;?></td>
            <td><?php echo $info["user_name"];?></td>
            <td><?php echo $info["r_time"];?></td>
            <td><?php echo $info["last_time"];?></td>
            <td><?php
			if($info["tag"]==1){
			?><a href="index.php?user_id=<?php echo $info["id"];?>&tag=0">显示</a><?php
			}else {?><a href="index.php?user_id=<?php echo $info["id"];?>&tag=1">隐藏</a><?php
			}
			?></td>
            <td><a href="index.php?del_id=<?php echo $info["id"];?>">删除</a></td>
          </tr>
		  <?php
		  $i++;
		  }
		  ?>
        </table>
		<?php
		}else {
			echo "暂无用户注册。";
		}
		?>
		<!--End -->		</td>
      </tr>
    </table></td>
    <td width="1" bgcolor="#CCCCCC"></td>
  </tr>
  <tr>
    <td height="1" colspan="3" bgcolor="#CCCCCC"></td>
  </tr>
</table>
<table width="752" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="50" align="center">copyright&copy;2008 支持多用户博客系统<br />
          版权所有:<a href="http://www.php653.cn" target="_parent">PHP653</a> <a href="http://www.17php.com" target="_blank">17PHP技术论坛</a> <a href="http://www.etpt.com.cn" target="_blank">ET工作室</a> </td>
  </tr>      
</table>