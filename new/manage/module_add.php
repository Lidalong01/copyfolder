<?php
header("Content-type: text/html; charset=utf-8"); 
//包含文件
$edit_tag = $_POST["edit_tag"];
//接收日志类型，并写入数据库
if($_POST["Submit"] == "提交"){
 $type_name = $_POST["type_name"];
 $show_order = $_POST["show_order"];
 if($type_name == "" or $show_order == ""){
   js_alert("显示序号和类型均不能为空！","user.php?target=module_add");
   exit;
  }else{
    $add_time = date("Y-m-d H:i:s");
    $query= "insert into blog_type_info(user_id,type_name,add_time,show_order) values('$_SESSION[user_id]','$type_name','$add_time','$show_order')";
    if(mysql_query($query)){
      js_alert("分类成功！","user.php?target=module_add");
      exit;
    }else{
      js_alert("分类添加失败！","user.php?target=module_add");
      exit;
    }
   }
 
}
//接收编辑信息，并写入数据库
if($_POST["queren"] == "确认"){
  $blog_id = $_POST["blog_id"];
  $edit_show_order = $_POST["edit_show_order"];
  $edit_type_name = $_POST["edit_type_name"];
  if ($edit_show_order == "" or $edit_type_name == ""){
    js_alert("显示序号和类型均不能为空,请重新填写！","user.php?target=module_add");
    exit;
}else{
  $query = "update blog_type_info set show_order='$edit_show_order',type_name='edit_type_name' where id='blog_id'";
  mysql_query($query);

}
}
//删除日志类型
$del_id=$_GET["del_id"];
if($del_id!=""){
  $query="delete from blog_type_info where id='$del_id'";
  if(mysql_query($query)){
    js_alert("恭喜您,删除成功！","user.php?target=module_add");
    exit;
  }
}
?>
<!--添加日志类型 -->
<h4>日 志 分 类</h4>
<form action="user.php?target=module_add" method="post">
<table width="80%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse">
  <tr>
    <td height="30" colspan="2" align="center" bgcolor="#CCCCCC">&lt;&lt;日志分类添加&gt;&gt;</td>
  </tr>
  <tr>
    <td height="30" align="right">序号：</td>
    <td><input type="text" name="show_order"></td>
  </tr>
  <tr>
    <td width="20%" height="30" align="right">日志类型：</td>
    <td width="80%"><input type="text" name="type_name"></td>
  </tr>
  
  <tr>
    <td height="30" colspan="2" align="center"><input type="submit" name="Submit" value="提交">
      &nbsp;&nbsp; <input type="reset" name="Submit2" value="重置"></td>
  </tr>
</table>
</form>
<!--显示所有日志类型 -->
<?php
$query = "select * from blog_type_info where user_id='$_SESSION[user_id]' order by show_order ";
$rst = mysql_query($query);
?>
<table width="70%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse">
  <tr>
    <td height="25" colspan="3" align="center" bgcolor="#CCCCCC">&lt;&lt;日志类型管理&gt;&gt;</td>
  </tr>
  <tr>
    <td width="10%" height="25" align="center">序号</td>
    <td width="60%" align="center">类型名称</td>
    <td width="30%" align="center">操作</td>
  </tr>
  
<?php
    $i = 0;
     while ($info = mysql_fetch_array($rst)) {
      $i++;
    ?>
<form action="user.php?target=module_add&page_id=<?php echo $page_id;?>" method="post">
  <tr> 
    <td width="10%" height="25" align="center">
   <?php if($edit_tag == $i){?>

	<input type="text" name="edit_show_order" value="<?php echo $info["show_order"];?>" size="5">
 <?php } else { echo $info["show_order"]; }?>
</td>
    <td width="60%">
<?php
    if($edit_tag == $i){
    ?>
	<input type="text" name="edit_type_name" value="<?php echo $info["type_name"];?>">
	<?php
   }else{
    echo $info["type_name"];
   }
   ?>
  </td>
    <td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="50%" align="center">
<?php
    if($edit_tag == $i){
    ?>
		<input type="submit" name="queren" value="确认" class="input2">
		<?php }else{?>
		<input type="submit" value="编辑" class="input1">
  <?php }?>
		</td>
        <td width="50%" align="center"><a href="user.php?target=module_add&page_id=&del_id=<?php echo $info["id"];?>">删除</a></td>
      </tr>
    </table></td>
  </tr>
  <input type="hidden" value="<?php echo $i;?>" name="edit_tag">
  <input type="hidden" name="blog_id" value="<?php echo $info["id"];?>">
<?php }?>
  </form>
</table>

