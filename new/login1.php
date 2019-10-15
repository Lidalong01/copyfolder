<meta charset="utf-8">
<?php
//连接数据库服务器
$id = mysql_connect("localhost","root","root");
//选择数据库
mysql_select_db("blog_db",$id);
//本页使用函数
function js_alert($message,$url){
  echo "<script language=javascript>alert('";
  echo $message;
  echo "');location.href='";
  echo $url;
  echo "';</script>";
}
$register_tag = $_GET['register_tag'];
//包含文件，初始化对象
//接受变量
if ($register_tag == 1){
    if($_POST["up2"] == "提交"){
      $user_name = $_POST["user_name"];
      $user_pw1 = $_POST["user_pw1"];
      $user_pw2 = $_POST["user_pw2"];
//表单数据的有效性验证
      if ($user_name == "" or $user_pw1 == "" or $user_pw2 == ""){
        // echo "用户名和密码、重复密码均不能为空！";
        js_alert("用户名和密码、重复密码均不能为空！","login1.php?register_tag=1");
        eixt;
      }
      if ($user_pw1 != $user_pw2){
        js_alert("两次密码不匹配!","login1.php?register_tag=1");
          eixt;
      }
// 验证用户登陆信息
$query = "select * from user_info where user_name='$user_name'";
$rst = mysql_query($query);
if (mysql_num_rows($rst) < 1){
          //用户名不存在
          $r_time = date("Y-m-d H:i:s");
          $query2 = "insert into user_info(user_name,user_pw,r_time) values('$user_name','$user_pw1','$r_time')";
         if(mysql_query($query2)){
            js_alert("恭喜您，注册成功，请登录!","login1.php");
             eixt;
           }
         else{
            js_alert("很遗憾，注册失败，未知错误,请重新注册!","login1.php?register_tag=1");
             eixt;
         }
        }else{
           //用户名存在
           js_alert("用户名已经存在，请重新注册!","login1.php?register_tag=1");
            eixt;
}
      }
}

//下面是登录的验证代码
if ($_POST["up"] == "提交"){
   $user_name = $_POST["user_name"];
   $user_pw = $_POST["user_pw"];
   //表单数据有效验证
   if($user_name == "" or $user_pw == ""){
    js_alert("登录用户名和密码均不能为空","login1.php");
    exit;
   }
   //查询用户名是否存在
   $query3 = "select * from user_info where user_name='$user_name'";
   $rst = mysql_query($query3);
   if (mysql_num_rows($rst) < 1 ){
    //用户不存在
    js_alert("用户名不存在，请重新登录","login1.php");
    exit;
   }else{
    //用户存在，验证密码
    $info = mysql_fetch_array($rst);
    if($user_pw == $info["user_pw"]){
      //密码正确
      //注册session
      $_SESSION["user_name"] = $user_name;
      $_SESSION["user_id"] = $info["id"];
      $_SESSION["user_tag"] = $info["tag"];
      //更新最后登录的时间
      $today = date("Y-m-d  H:i:s");
      $query4 = "update user_info set last_time='$today' where user_name='$user_name'";
      //跳转到管理首页
      if(mysql_query($query4)){
        js_alert("恭喜您登录成功","manage/user.php");
        exit;
      }
    }else{ 
      //密码不正确
        js_alert("密码不正确，请重新登录","login1.php");
        exit;
    }
   }
   //验证登录密码是否正确
   
}


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
<table width="752" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse">
  <tr>
    <td width="1" bgcolor="#CCCCCC"></td>
    <td colspan="2" align="center" valign="top"><table width="490" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td align="center" valign="top">
		<table width="90%" border="0" cellspacing="0" cellpadding="10">
          <tr>
            <td height="30" align="left" valign="middle"><span style="font-size:15px; font-weight:bold">系统说明：</span></td>
          </tr>
          <tr>
            <td align="left" valign="top"><p>该多用户博客系统，仅用做随书范例，不存在任何商业目的！</p>
              <p>任何单位及个人不得用于任何商业活动！</p>
              <p>在您的使用过程中，如有问题，欢迎一起交流！</p></td>
          </tr>
          <tr>
            <td align="left" valign="top"><hr /></td>
          </tr>
        </table>
		<!--系统简介，用户登陆 -->
		<?php
		if($register_tag!=1){
		?>
		<form action="login1.php" method="post">
              <table width="90%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse">
              <tr>
                <td height="25" colspan="2" align="center">&lt;&lt;用户登陆&gt;&gt;</td>
                </tr>
              <tr>
                <td width="29%" height="25" align="right">用户名：</td>
                <td width="71%"><input type="text" name="user_name" size="15" /></td>
              </tr>
              <tr>
                <td height="25" align="right">密码：</td>
                <td><input type="password" name="user_pw" size="15" /></td>
              </tr>
              <tr>
                <td height="25" colspan="2" align="center"><input type="submit" name="up" value="提交" />
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="login1.php?register_tag=1">注册</a></td>
                </tr>
            </table>
			<input type="hidden" name="up_login" value="1">
			</form>		
		<?php
		}else {
		?>
		<!--用户注册 -->
		<form action="login1.php?register_tag=1" method="post">
                <table width="80%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse">
                  <tr>
                    <td height="25" colspan="2" align="center">&lt;&lt;用户注册&gt;&gt;</td>
                  </tr>
                  <tr>
                    <td width="30%" height="25" align="right">用户名：</td>
                    <td width="70%"><input type="text" name="user_name" size="15" /></td>
                  </tr>
                  <tr>
                    <td height="25" align="right">密码：</td>
                    <td><input type="password" name="user_pw1" size="15" /></td>
                  </tr>
                  <tr>
                    <td height="25" align="right">重复密码：</td>
                    <td><input type="password" name="user_pw2" size="15" /></td>
                  </tr>
                  <tr>
                    <td height="25" colspan="2" align="center"><input type="submit" name="up2" value="提交" /></td>
                  </tr>
              </table>
			  <input type="hidden" name="up_register" value="1">
			  </form>		
		<?php
		}
		?><br></td>
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