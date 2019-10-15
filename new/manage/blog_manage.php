<?php
header("Content-type: text/html; charset=utf-8"); 
//包含文件

//接受变量
$type_id = $_GET["type_id"];
$query_t = "select * from blog_type_info where id='$type_id'";
$rst_t = mysql_query($query_t);
$info_t = mysql_fetch_array($rst_t);
//删除日志操作
$del_id = $_GET["del_id"];
if ($del_id != ""){
  $query = "delete from blog_info where id='$del_id' and user_id='$_SESSION[user_id]'";
  if (mysql_query($query)){
    js_alert("恭喜您删除成功！","user.php?target=blog_manage&type_id=".$type_id);
    exit;
  }
}
?>
<h4>日 志 管 理<br>-<?php echo $info_t["type_name"]?></h4>
日志分页（下面循环输出本页的日志信息）
<table width="450" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse">
  <tr>
    <td width="8%" height="25" align="center">序号</td>
    <td width="62%" align="center">标题</td>
    <td colspan="2" align="center">操作</td>
  </tr>
  <?php
  $query = "select * from blog_info where type_id='$type_id' and user_id='$_SESSION[user_id]' order by id desc";
  $rst = mysql_query($query);
  $i = 0;
  while ($info = mysql_fetch_array($rst)){
    $i++;
  ?>
  <tr>
    <td width="8%" height="25" align="center"><?php echo $i;?> </td>
    <td width="62%"><?php echo $info["title"]?></td>
    <td width="15%" align="center"><a href="user.php?target=blog_edit&type_id=&blog_id=<?php echo $type_id;?>&blog_id=<?php echo $info["id"]?>">编辑</a></td>
    <td width="15%" align="center"><a href="user.php?target=blog_manage&type_id=&del_id=<?php echo $type_id;?>&del_id=<?php echo $info["id"]?>">删除</a></td>
  </tr>
<?php }?>
</table>
