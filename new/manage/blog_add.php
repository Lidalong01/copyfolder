<?php
header("Content-type: text/html; charset=utf-8"); 


//接受变量
$submit = $_POST["submit"];
if($submit == "提交"){
  $type_name_id = $_POST["type_name_id"];
  $title = $_POST["title"];
  $cont = $_POST["content"];
  if($type_name_id == ""){
    js_alert("请选择日志类型！","user.php?target=blog_add");
    exit;
  }else if ($title == "") {
   js_alert("标题不能为空,请重新填写！","user.php?target=blog_add");
    exit;
  }else if ($cont == "") {
  js_alert("内容不能为空,请重新填写！","user.php?target=blog_add");
    exit;
  }else{
    //构造SQL语句，写入数据库
    $query = "insert into blog_info(user_id,type_id,title,cont,add_time) values('$_SESSION[user_id]','$type_name_id','$title','$cont','$add_time')";
    if(mysql_query($query)){
      js_alert("恭喜您,日志添加成功！","user.php?target=blog_add");
      exit;
    }else{
      js_alert("对不起,日志添加失败,请联系管理员！","user.php?target=blog_add");
      exit;
    }
  }

}

//添加日志信息
?>
<br />
<h4>书 写 日 志</h4>
<form id="form1" name="form1" method="post" action="user.php?target=blog_add">
<table width="450" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td width="20%" align="right" valign="middle" bgcolor="#FFFFFF">选择日志类型:</td>
    <td width="80%" height="26" align="left" valign="middle" bgcolor="#FFFFFF">
	<select name="type_name_id">
	 <option value="" selected="selected">请选择...</option>
	 <?php
   $query = "select * from blog_type_info where user_id='$_SESSION[user_id]' order by show_order";
   $rst = mysql_query($query);
   while ($info = mysql_fetch_array($rst)){
    ?>
	 <option value="<?php echo $info["id"];?>"><?php echo $info["type_name"];?></option>
	<?php } ?>
	  </select></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle" bgcolor="#FFFFFF">日志标题:</td>
    <td align="left" valign="middle" bgcolor="#FFFFFF"><input name="title" type="text" size="40" maxlength="60" /></td>
  </tr>
  <tr>
    <td align="right" valign="middle" bgcolor="#FFFFFF">日志内容:</td>
    <td align="left" valign="middle" bgcolor="#FFFFFF">
	<textarea name="content" cols="45" rows="15"></textarea></td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><input type="submit" name="submit" value="提交" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="Submit2" value="重置" /></td>
  </tr>
</table>
</form>