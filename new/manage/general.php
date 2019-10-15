<?php
header("Content-type: text/html; charset=utf-8"); 
//包含配置文件

//接受变量，更改配置文件
$name = "config".$_SESSION["user_id"];
$config_tag = $_GET["config_tag"];
if($config_tag ==1){
  $margin_top = $_POST["margin-top"];
  $margin_bottom = $_POST["margin-bottom"];
  $background_color = $_POST["background-color"];
  $title = $_POST["title"];
  $copy_right = $_POST["copy-right"];
  $str_in = "<?php\n";
  $str_in .= "global \$config;\n";
  $str_in .= "//网页布局参数\n";
  $str_in .= "\$config['margin-top'] = \"".$margin_top."\";\n";
  $str_in .= "\$config['margin-bottom'] = \"".$margin_bottom."\";\n";
  $str_in .= "\$config['background-color'] = \"".$background_color."\";\n";
  $str_in .= "\n";
  $str_in .= "//头信息和版权设置\n";
  $str_in .= "\$config['title'] = \"".$title."\";\n";
  $str_in .= "\$config['copy-right'] = \"".$copy_right."\";\n";
  $str_in .= "\n?>";
  if($fp = fopen("../config/$name.inc","w")){
    fwrite($fp, $str_in);
    fclose($fp);
  }
}
//读出
// @include "../config/$name.inc";
?>
<br>
<h4>常 规 设 置</h4>
<form id="form1" name="form1" method="post" action="user.php?target=general&config_tag=1">
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td width="20%" height="20" align="right" valign="middle" bgcolor="#FFFFFF">上边距:</td>
    <td width="80%" bgcolor="#FFFFFF"><input name="margin-top" type="text" value="<?php echo $config['margin-top']?>" size="4" />
    像素(在英文或中文半角下输入,否则不能生效)</td>
  </tr>
  <tr>
    <td height="20" align="right" valign="middle" bgcolor="#FFFFFF">下边距:</td>
    <td bgcolor="#FFFFFF"><input name="margin-bottom" type="text" value="<?php echo $config['margin-bottom']?>" size="4" />
像素(在英文或中文半角下输入,否则不能生效)</td>
  </tr>
  <tr>
    <td height="20" align="right" valign="middle" bgcolor="#FFFFFF">网页背景颜色:</td>
    <td bgcolor="#FFFFFF"><input name="background-color" type="text" value="<?php echo $config['background-color']?>" size="10" />
输入以#开头的6位16进制数的颜色值(在英文或中文半角下输入)</td>
  </tr>
  <tr>
    <td height="20" align="right" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="20" align="right" valign="middle" bgcolor="#FFFFFF">网站头名称:</td>
    <td bgcolor="#FFFFFF"><input name="title" type="text" value="<?php echo $config['title']?>" size="30" /></td>
  </tr>
  <tr>
    <td height="20" align="right" valign="middle" bgcolor="#FFFFFF">版权信息:</td>
    <td bgcolor="#FFFFFF"><input name="copy-right" type="text" id="copy-right" value="<?php echo $config['copy-right']?>" size="40" /></td>
  </tr>
  <tr>
    <td height="20" colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><input type="submit" name="Submit" value="提交" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="Submit2" value="重置" /></td>
  </tr>
</table>
</form>