<?php
header("Content-type: text/html; charset=utf-8"); 
//包含文件

//接受变量
$type_id = $_GET["type_id"];
$blog_id = $_GET["blog_id"];
//读取分类信息
$query_edit = "select * from blog_type_info where id='$type_id'";
$rst_edit = mysql_query($query_edit);
$info_edit = mysql_fetch_array($rst_edit);
//读取日志信息
$query = "select * from blog_info where id='$blog_id'";
$rst = mysql_query($query);
$info = mysql_fetch_array($rst);
//修改日志信息
$submit_edit = $_POST["submit_edit"];
if($submit_edit == "提交"){
  $type_name_id = $_POST["type_name_id"];
  $title = $_POST["title"];
  $cont = $_POST["content"];
  if($type_name_id == ""){
    js_alert("请选择日志类型！","user.php?target=blog_edit&type_id=".$type_id."&blog_id=".$blog_id);
    exit;
  }else if ($title == "") {
   js_alert("标题不能为空,请重新填写！","user.php?target=blog_edit&type_id=".$type_id."&blog_id=".$blog_id);
    exit;
  }else if ($cont == "") {
  js_alert("内容不能为空,请重新填写！","user.php?target=blog_edit&type_id=".$type_id."&blog_id=".$blog_id);
    exit;
  }else{
    $query = "update blog_info set type_id='$type_name_id',title='$title',cont='$cont' where user_id='$_SESSION[user_id]' and id='$blog_id'";
    if(mysql_query($query)){
      js_alert("恭喜您,日志编辑成功！","user.php?target=blog_edit&type_id=".$type_id."&blog_id=".$blog_id);
      exit;
    }else{
      js_alert("对不起,日志编辑失败,请联系管理员！","user.php?target=blog_edit&type_id=".$type_id."&blog_id=".$blog_id);
      exit;
    }
  }

}

?>
<br />
<h4>编辑日志</h4>
<form id="form1" name="form1" method="post" action="user.php?target=blog_edit&type_id=<?php echo $type_id;?>&blog_id=<?php echo $blog_id;?>">
<table width="450" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td width="20%" align="right" valign="middle" bgcolor="#FFFFFF">选择日志类型:</td>
    <td width="80%" height="26" align="left" valign="middle" bgcolor="#FFFFFF">
	<select name="type_name_id">
	<option value="<?php echo $info_edit["id"];?>" selected="selected"><?php echo $info_edit["type_name"];?></option>

  <?php
   $query_t = "select * from blog_type_info where user_id='$_SESSION[user_id]' order by show_order";
   $rst_t = mysql_query($query_t);
   while ($info_t = mysql_fetch_array($rst_t)){
  ?>

	 <option value="<?php echo $info_t["id"];?>"><?php echo $info_t["type_name"];?></option>
  <?php }?>

	  </select></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle" bgcolor="#FFFFFF">日志标题:</td>
    <td align="left" valign="middle" bgcolor="#FFFFFF"><input name="title" type="text" value="<?php echo $info["title"];?>" size="40" maxlength="60" /></td>
  </tr>
  <tr>
    <td align="right" valign="middle" bgcolor="#FFFFFF">日志内容:</td>
    <td align="left" valign="middle" bgcolor="#FFFFFF">
	<textarea name="content" cols="45" rows="15"><?php echo $info["cont"];?></textarea></td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><input type="submit" name="submit_edit" value="提交" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="Submit2" value="重置" /></td>
  </tr>
</table>
</form>