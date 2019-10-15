<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>多用户博客系统</title>
<link href="inc/css.css" rel="stylesheet" type="text/css">
</head>
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
<table width="752" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse">
  <tr>
    <td width="1" height="199" bgcolor="#CCCCCC"></td>
    <td colspan="2" align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="25" align="center"><table width="98%" border="0" cellspacing="0" cellpadding="0">
			<form action="index.php?search_tag=1" method="post">
              <tr>
                <td width="10%" align="right" valign="middle">用户名：</td>
                <td width="90%"><input type="text" name="user_name" />
                  &nbsp; <input type="submit" name="Submit" value="搜索" /></td>
              </tr>
			  </form>
            </table></td>
          </tr>
          <tr>
            <td align="center">
			<table width="94%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="26" align="left" valign="middle"> </td>
              </tr>
            </table>
			<table width="94%" border="1" cellpadding="0" cellspacing="0" bordercolor="#666666" style="border-collapse:collapse;">
			  <tr>
			    <td width="180" height="170" align="center"><a href="myblog.php?user_id=<?php echo $info["user_id"];?>" target='_blank'>用户头像图片</a></td>
			    <td width="519" align="center" valign="top"><table width="98%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
			        <td width="15%" height="30" align="right" valign="middle">博主昵称：</td>
			        <td width="85%" align="left" valign="middle"><a href="myblog.php?user_id=<?php echo $info["user_id"];?>" target='_blank'>从数据库中读出用户设定的昵称</a></td>
			        </tr>
			      <tr>
			        <td height="30" align="right" valign="top">博主的话：</td>
			        <td valign="top">从文件中读出用户设定的博主的话</td>
			        </tr>
			      </table></td>
		      </tr>
			  </table>
			<br />
            <table width="94%" border="1" cellpadding="0" cellspacing="0" bordercolor="#666666" style="border-collapse:collapse;">
              <tr>
                <td width="180" height="170" align="center"><a href=myblog.php?user_id=<?php echo $info["user_id"];?> target='_blank'>用户头像图片</a></td>
                <td width="519" align="center" valign="top"><table width="98%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="15%" height="30" align="right" valign="middle">博主昵称：</td>
                    <td width="85%" align="left" valign="middle"><a href=myblog.php?user_id=<?php echo $info["user_id"];?> target='_blank'>从数据库中读出用户设定的昵称</a></td>
                  </tr>
                  <tr>
                    <td height="30" align="right" valign="top">博主的话：</td>
                    <td valign="top">从文件中读出用户设定的博主的话</td>
                  </tr>
                </table></td>
              </tr>
            </table>
            </td>
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