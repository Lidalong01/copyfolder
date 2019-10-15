<?php
//从文件中读出个人博客的配置信息
//$name="config".$user_id;
//@include "config/$name.inc";
include "inc/font.inc";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:::<?php echo $config["title"];?>-多用户博客系统:::</title>
<link href="inc/css.css" rel="stylesheet" type="text/css">
</head>
<table width="750" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse">
  <tr>
    <td height="100"><img title="读出用户上传的banner头图片信息" src="pic_sys/" width="750" height="100"></td>
  </tr>
  <tr>
    <td height="30" class="title"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="88%" class="title"><?php echo $config['title'];?>&nbsp;&nbsp;<a href="myblog.php?user_id=<?php echo $user_id;?>">首页</a></td>
        <td width="12%" class="title"><a href="login1.php" target="_blank">&lt;&lt;管理登陆</a></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="752" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse">
  <tr>
    <td width="1" height="199" bgcolor="#CCCCCC"></td>
    <td width="488" align="center" valign="top"><table width="490" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td height="660" align="center" valign="top"><br />
		<!--显示日志内容 -->
        从数据库中逆序读出发表的博文信息
		<table width="98%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td height="30" class="title1">从数据库中读出发表的博文标题信息</td>
          </tr>
          <tr>
            <td class="cont">从数据库中读出发表的博文信息</td>
          </tr>
          <tr>
            <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20%" align="center" class="title2"><a href="blog_comm.php?user_id=<?php echo $user_id;?>&blog_id=<?php echo $info_blog["id"];?>">发表评论</a></td>
                <td width="30%" class="title2">分类：<?php //echo $crazy->blog_type_idto_name($info_blog["type_id"]);?></td>
                <td width="50%" class="title2">时间：<?php echo $info_blog["add_time"];?>&nbsp;&nbsp; <a href="blog_comm.php?user_id=<?php echo $user_id;?>&blog_id=<?php echo $info_blog["id"];?>">查看全文</a></td>
              </tr>
            </table></td>
          </tr>
        </table>
          <hr />
		<table width="98%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td height="30" class="title1">从数据库中读出发表的博文标题信息</td>
          </tr>
          <tr>
            <td class="cont">从数据库中读出发表的博文信息</td>
          </tr>
          <tr>
            <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20%" align="center" class="title2"><a href="blog_comm.php?user_id=<?php echo $user_id;?>&blog_id=<?php echo $info_blog["id"];?>">发表评论</a></td>
                <td width="30%" class="title2">分类：<?php //echo $crazy->blog_type_idto_name($info_blog["type_id"]);?></td>
                <td width="50%" class="title2">时间：<?php echo $info_blog["add_time"];?>&nbsp;&nbsp; <a href="blog_comm.php?user_id=<?php echo $user_id;?>&blog_id=<?php echo $info_blog["id"];?>">查看全文</a></td>
              </tr>
            </table></td>
          </tr>
        </table>
          <hr />
		  </td>
      </tr>
    </table></td>
    <td width="1" bgcolor="#CCCCCC"></td>
    <td width="257" align="center" valign="top">
	
    <table width="220" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="8"></td>
  </tr>
  <tr>
    <td><h5>推荐连接</h5>
	<?php
	//从config/link.txt中读出数据
	
     ?></td>
  </tr>
  <tr>
    <td height="1" bgcolor="#cccccc"></td>
  </tr>
  <tr>
    <td height="20"><br>
    <h5>博主的话</h5>
      <?php
	//输出站长的话
	
	?></td>
  </tr>
  <tr>
    <td height="1" bgcolor="#cccccc"></td>
  </tr>
  <tr>
    <td align="center" valign="middle"><br>
      <h5>站长形象</h5>
      <table width="133" height="152" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><img title="读出站长上穿的自己的头像" src="pic_sys/" width="133" height="152" /></td>
        </tr>
      </table>
    <br /></td>
  </tr>
  
  <tr>
    <td height="1"  bgcolor="#cccccc"></td>
  </tr>
  <tr>
    <td><br /><h5>归类</h5>
      <table width="180" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td>日期面板<?php //include "time.php";?></td>
        </tr>
      </table>    </td>
  </tr>
  <tr>
    <td height="1" bgcolor="#cccccc"></td>
  </tr>
  <tr>
    <td><br />
    <h5>日志分类</h5>
      <table width="180" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td>分类名称</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="1" bgcolor="#cccccc"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
    
    </td>
    <td width="1" bgcolor="#CCCCCC"></td>
  </tr>
  <tr>
    <td height="1" colspan="3" bgcolor="#CCCCCC"></td>
    <td width="258" colspan="2" bgcolor="#CCCCCC"></td>
  </tr>
</table>
<table width="752" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="50" align="center"><?php echo $config['copy-right']?><br />
        支持多用户博客系统 技术支持:<a href="http://www.php653.cn" target="_parent">PHP653</a> <a href="http://www.17php.com" target="_blank">17PHP技术论坛</a> <a href="http://www.etpt.com.cn" target="_blank">ET工作室</a> </td>
      </tr>      
</table>