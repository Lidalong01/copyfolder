<?php
header("Content-type: text/html; charset=utf-8"); 
//接受变量
 $user_pw = $_POST["user_pw"];
 $user_pw1 = $_POST["user_pw1"];
 $user_pw2 = $_POST["user_pw2"];
 //先判断是接受页面
 if($_POST["submit"] == "提交"){
   //新密码和重复密码是否一致
   if($user_pw1 != $user_pw2){
      js_alert("密码和重复密码不匹配,请重新设置!","user.php?target=key");
   }else{
    //旧密码是否正确
    $query = "select * from user_info where user_name='$_SESSION[user_name]'";
    $rst = mysql_query($query);
    $info = mysql_fetch_array($rst); 
    if($info["user_pw"] != $user_pw){
      js_alert("原密码不正确,请重新填写!","user.php?target=key");
    }else{
        //更改用户密码
    $query2 = "update user_info set user_pw='$user_pw1' where user_name='$_SESSION[user_name]'";
    if(mysql_query($query2)){
      js_alert("恭喜您，密码更改成功!","user.php?target=key");
  }
  }
}
 }
?>
<h4>安 全 设 置</h4>
<form id="form1" name="form1" method="post" action="user.php?target=key">

<table width="80%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse">
  <tr>
    <td width="30%" height="25" align="right">原密码：</td>
    <td width="70%"><input name="user_pw" type="password" id="user_pw" size="15" /></td>
  </tr>
  <tr>
    <td height="25" align="right">新密码：</td>
    <td><input type="password" name="user_pw1" size="15" /></td>
  </tr>
  <tr>
    <td height="25" align="right">重复密码：</td>
    <td><input type="password" name="user_pw2" size="15" /></td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="center"><input type="submit" name="submit" value="提交" /></td>
  </tr>
</table>
</form>