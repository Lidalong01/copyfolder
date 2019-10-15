<?php
//包含文件，初始化对象


//接受变量
$register_tag = $_GET['register_tag'];

//验证用户登陆信息


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>多用户博客系统</title>
<link href="inc/css.css" rel="stylesheet" type="text/css">
<table width="750" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse">
  <tr>
    <td height="100"><img src="pic_sys/00.jpg" width="750" height="100"></td>
  </tr>
  <tr>
    <td height="30" class="title"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="80%" class="title">多用户博客系统</td>
        <td width="20%" class="title"><a href="./login1.php">登陆</a>&nbsp;&nbsp;<a href="login1.php?register_tag=1">注册</a></td>
      </tr>
    </table></td>
  </tr>
</table>
<form action="login.php" method="post">
<table width="752" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse">
  <tr>
    <td height="25" colspan="2" align="center">管理员登陆</td>
  </tr>
  <tr>
    <td width="30%" height="25" align="right">用户名：</td>
    <td width="70%" align="left"><input type="text" name="user_name" size="20"></td>
  </tr>
  <tr>
    <td height="25" align="right">口令：</td>
    <td align="left"><input type="password" name="user_pw" size="20"></td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="center"><input type="submit" name="submit" value="提交"></td>
  </tr>
</table>
</form>
<table width="752" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="50" align="center">copyright&copy;2008 支持多用户博客系统<br />
          版权所有:<a href="http://www.php653.cn" target="_parent">PHP653</a> <a href="http://www.17php.com" target="_blank">17PHP技术论坛</a> <a href="http://www.etpt.com.cn" target="_blank">ET工作室</a> </td>
      </tr>      
</table>