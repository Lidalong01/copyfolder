<?php
header("Content-type: text/html; charset=utf-8"); 
//接收变量
$sta_say = $_POST["sta_say"];
if($sta_say != ""){
  $name = "sta_say".$_SESSION["user_id"];
  // echo $name;
  if($fp = fopen("../config/$name.txt","w")){
    fwrite($fp, $sta_say);
    fclose($fp);
  }
}

//读出文件
if(@$fp = file("../config/$name.txt")){
  for ($i=0; $i < count($fp) ; $i++){
    @$str_out .= $fp[$i];
  }
}

//包含文件
?>
<br><h4>博 主 的 话</h4>
<table width="98%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="1" bgcolor="#CCCCCC"></td>
  </tr>
  <tr>
    <td height="30" align="left" valign="middle">请在下面的标单中输出站长的话</td>
  </tr>
  <tr>
    <td height="1" bgcolor="#CCCCCC"></td>
  </tr><form id="form1" name="form1" method="post" action="user.php?target=sta_say">
  <tr>
    <td height="200" align="center" valign="middle">
      <textarea name="sta_say" cols="40" rows="12"><?php echo $str_out;?></textarea></td>
  </tr>
  <tr>
    <td height="30" align="center" valign="middle"><input type="submit" name="Submit" value="提交" />
&nbsp;&nbsp;&nbsp;&nbsp;
<input type="reset" name="Submit2" value="重置" /></td>
  </tr></form>
  <tr>
    <td height="1" bgcolor="#CCCCCC"></td>
  </tr>
</table>
