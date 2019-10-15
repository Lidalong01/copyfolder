<meta charset="utf-8">
<?php
header("Content-type: text/html; charset=utf-8"); 
//包含文件

//上传文件
  $add_tag = $_POST["add_tag"];
if ($add_tag == "1") {
    $target2 = $_POST["target2"];
    $rand1 = rand(0, 9); //使每秒内的重复几率降到千分之一
    $rand2 = rand(0, 9);
    $rand3 = rand(0, 9);
    $filename = date("Ymdhms") . $rand1 . $rand2 . $rand3;
    //获取机器端文件原名
    if (empty($_FILES['file_name']['name'])){
        js_alert("上传地址不能为空", "user.php?target=pic_add");
        exit;
    }
    $oldfilename = $_FILES['file_name']['name'];
    $filetype = substr($oldfilename, strrpos($oldfilename, "."), strlen($oldfilename) - strrpos($oldfilename, "."));
    if (($filetype != '.jpg') && ($filetype != '.JPG') && ($filetype != '.gif') && ($filetype != '.GIF')&& ($filetype != '.swf') && ($filetype != '.SWF')) {
        js_alert("上传的图片类型不支持（仅支持jpg，gif，swf）", "user.php?target=pic_add");
        exit;
    }
    //获取机器端文件的大小，单位为b
    if ($_FILES['file_name']['size'] > 2000000) {
        js_alert("上传图片不得超过2M", "user.php?target=pic_add");
        exit;
    }
    //取得保存文件的临时文件名
    $filename = $filename . $filetype;
    $savedir = "../pic_sys/" . $filename;//移动文件到指定目录，
    if (move_uploaded_file($_FILES['file_name']['tmp_name'], $savedir)) {
        $file_name = basename($savedir);//取得保存新文件名
    } else {
        js_alert("错误，无法写入", "user.php?target=pic_add");
        exit;
    }
$query = "insert into pic_info(addr, tag, target, user_id) values('$filename','1','$target2','$_SESSION[user_id]')";
    if (mysql_query($query)){
        js_alert("恭喜您，上传成功！", "user.php?target=pic_add");
        exit;
    }
}
//删除图片操作
$del_id = $_GET["del_id"];
if($del_id != ""){
  //先删除图片本身
  $query = "select * from pic_info where id='$del_id' and user_id='$_SESSION[user_id]'";
  $rst = mysql_query($query);
  $info = mysql_fetch_array($rst);
  $pic_addr = "../pic_sys/".$info["addr"];
  unlink($pic_addr);
  //再删除表记录
  $query = "delete from pic_info where id='$del_id' and user_id='$_SESSION[user_id]'";
  if(mysql_query($query)){
    js_alert("恭喜您，图片删除成功！","user.php?target=pic_add");
    exit;
  }

}

//显/隐图片
$show_tag = $_GET["show_tag"];
$pic_id = $_GET["pic_id"];
if ($show_tag != "" and $pic_id != ""){
  $query = "update pic_info set tag='$show_tag' where id='$pic_id'";
  if(mysql_query($query)){
    js_alert("恭喜您，显示状态更改成功！","user.php?target=pic_add");
    exit;
  }else{
    js_alert("对不起，显示状态更改失败！","user.php?target=pic_add");
    exit;
  }

}

?>
<h4>图 片 管 理</h4>
<form enctype="multipart/form-data" action="user.php?target=pic_add" method="post" name="form1" id="form1">
<div align="center">
  <meta charset="utf-8">
  <center>
  <table width="450" border="0" cellpadding="0" cellspacing="1" bordercolorlight="#cccccc" bordercolordark="#cccccc" bgcolor="#CCCCCC" id="AutoNumber1" style="border-collapse: collapse">
    <tr>
      <td height="31" colspan="2" align="center" valign="middle" bgcolor="#CCCCCC">&lt;&lt;图片添加&gt;&gt;</td>
    </tr>
    <tr>
      <td width="20%" bgcolor="#FFFFFF" height="26" align="right">图片地址:</td>
      <td width="80%" height="12" bgcolor="#FFFFFF"><input type="file" name="file_name" size="36" /></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" height="26" align="right">显示位置:</td>
      <td height="26" bgcolor="#FFFFFF"><select name="target2">
        <option value="1">顶部banner</option>
        <option value="2">博主形象</option>
      </select>      </td>
    </tr>
    <tr>
      <td width="123" bgcolor="#FFFFFF" height="27" align="right">添加人:</td>
      <td width="439" height="27" bgcolor="#FFFFFF">&nbsp;<?php echo $_SESSION["user_name"]?></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCCC" height="31" align="right" colspan="2">
      <p align="center">
        <input type="submit" value="提交" name="B1">&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="reset" value="重置" name="B2"></td>
    </tr>
  </table>
  </center>
</div>
<input type="hidden" name="add_tag" value="1">
</form>
<!--显示图片 -->

<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse">
  <tr>
    <td width="5%" height="25" align="center">序号</td>
    <td width="79%" align="center">图片</td>
    <td colspan="2" align="center">操作</td>
  </tr>
<?php 
$query = "select * from pic_info where user_id='$_SESSION[user_id]' order by id desc";
$rst = mysql_query($query);
$i = 0;
while ($info = mysql_fetch_array($rst)){
 $i++;
?>
  <tr>
    <td width="5%" height="60" align="center"><?php echo $i;?></td>
    <td width="79%" align="center" valign="middle"><a href="../pic_sys/<?php echo $info["addr"]?>" target="_blank"><img src="../pic_sys/<?php echo $info["addr"]?>" height="50" border="0"></a></td>
    <td width="8%" align="center">

	<a href="user.php?target=pic_add&pic_id=<?php echo $info["id"];?>&show_tag=1">显示</a>

	<a href="user.php?target=pic_add&pic_id=<?php echo $info["id"];?>&show_tag=0">隐藏</a>
	
	</td>
    <td width="8%" align="center"><a href="user.php?target=pic_add&del_id=<?php echo $info["id"];?>">删除</a></td>
  </tr>
<?php }?>
</table>
