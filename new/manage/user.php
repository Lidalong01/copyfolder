<?php
//后台管理，需要登陆的，安全机制：SESSION
if($_SESSION["user_name"] == "" or $_SESSION["user_id"] == ""){
  header("location:../login1.php");
  exit;
}
header("Content-type: text/html; charset=utf-8"); 

function js_alert($message,$url){
  echo "<script language=javascript>alert('";
  echo $message;
  echo "');location.href='";
  echo $url;
  echo "';</script>";
}
//连接数据库服务器
$id = mysql_connect("localhost","root","root");
//选择数据库
mysql_select_db("blog_db",$id);

$target = $_GET["target"];

?>
<link rel="stylesheet" type="text/css" href="../inc/css.css">
<table width="750" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse">
  <tr>
    <td height="100"><img src="../pic_sys/00.jpg" width="750" height="100"></td>
  </tr>
  <tr>
    <td height="30" class="title"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="80%" class="title">多用户博客系统</td>
        <td width="20%" class="title"><a href="./login1.php">登陆</a>&nbsp;&nbsp;<a href="login1.php?register_tag=1">注册</a>&nbsp;&nbsp;<a href="./logout.php">退出</a></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="752" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse">
  <tr>
    <td width="1" height="199" bgcolor="#CCCCCC"></td>
    <td width="490" align="center" valign="top"><table width="490" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td height="400" align="center" valign="top">
		<br /><?php
		//接受传递过来的参数，构造包含文件
    if($target){
      $addr = $target.".php";
      include $addr;
    }else{
      echo "===欢迎您登录多用户博客管理后台！===<br>";
      echo "===点击右侧链接，进行相关操作。===<br>";
    }
   
		?></td>
      </tr>
    </table></td>
    <td width="1" bgcolor="#CCCCCC"></td>
    <td width="257" align="center" valign="top">
    
<table width="220" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="8"></td>
  </tr>
  <tr>
    <td>
	  <table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="25"><span style="font-weight:bold; font-size:14px;">管理菜单&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><a href="../myblog.php?user_id=<?php echo $_SESSION["user_id"];?>" target="_blank">预览</a></td>
        </tr>
        <tr>
          <td class="line_height_m_menu">
		  <a href="user.php?target=general">常规设置</a><br />
		  <a href="user.php?target=link">友情连接管理</a><br />
		  <a href="user.php?target=pic_add">图片管理</a><br />
		  <a href="user.php?target=sta_say">博主的话</a><br />
          <a href="user.php?target=module_add">日志分类</a><br />
		  <a href="user.php?target=blog_add">日志添加</a><br />
		  <a href="#">日志管理<br /></a>
		  <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
            <?php
            $query_m = "select * from blog_type_info where user_id='$_SESSION[user_id]' order by show_order";
            $rst_m = mysql_query($query_m);
            while ($info_m = mysql_fetch_array($rst_m)) {

            ?>
            <tr>
              <td><a href="user.php?target=blog_manage&type_id=<?php echo $info_m["id"];?>"><?php echo $info_m["type_name"];?></a></td>
            </tr>
          <?php } ?>
          </table>
		  <a href="user.php?target=key">安全设置</a>
		  </td>
        </tr>
      </table></td>
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
        <td height="50" align="center">copyright&copy;2008 支持多用户博客系统<br />
          版权所有:<a href="http://www.php653.cn" target="_parent">PHP653</a> <a href="http://www.17php.com" target="_blank">17PHP技术论坛</a> <a href="http://www.etpt.com.cn" target="_blank">ET工作室</a> </td>
      </tr>      
</table>