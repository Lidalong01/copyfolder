<?php
header("Content-type: text/html; charset=utf-8"); 
//接受变量，更改配置文件
$name = "link".$_SESSION["user_id"];
//链接的添加
if($_GET["edit_tag"] == 1){
  if(!@$fp = fopen("../config/$name.txt","r")){
    echo "未创建！ <br>";
  }else{
   $link_name = $_GET["link_name"];
   $link_name_new = $_POST["link_name_new"];
   $link_addr_new = $_POST["link_addr_new"];
   @$rst = fgets($fp,3000);//读取
   $link = explode("|",$rst);//分割成数组
   for($i=0;$i<count($link);$i++){
        if($i%2 == 0){
          $j = $i+1;
          if($link[$i]==$link_name){
            //查找原来的然后更换新的
            $link[$i]=$link_name_new;
            $link[$j]=$link_addr_new;
          }
  }
}
//构造新的字符串
for($i=0;$i<count($link);$i++){
   if($i== 0){
    $link_new=$link[$i];
   }else{
    $link_new.="|".$link[$i];
   }
 //重新写入
   if($fp = fopen("../config/$name.txt","w")){
      fwrite($fp,$link_new);
      fclose($fp);
    }
  }
}
}
//链接的修改
if($_GET["add_tag"] == 1){
  $link_name_new = $_POST["link_name_new"];
  $link_addr_new = $_POST["link_addr_new"];
  if($link_name_new != "" and $link_addr_new != ""){
    $fp = fopen("../config/$name.txt","r");
    $rst = fgets($fp,3000);
    if($rst == ""){
      $rst .= $link_name_new;
      $rst .= "|".$link_addr_new;
    }else{
      $rst .= "|".$link_name_new;
      $rst .= "|".$link_addr_new;
    }
    if($fp = fopen("../config/$name.txt","w")){
      fwrite($fp,$rst);
      fclose($fp);
    }
  }
}
//链接的删除
if($_GET["del_tag"] == 1){
$link_name = $_GET["link_name"];
$name = "link".$_SESSION["user_id"];
if(!@$fp = fopen("../config/$name.txt","r")){
    echo "未创建！ <br>";
  }else{
    @$rst = fgets($fp,3000);//读取
   $link = explode("|",$rst);//分割成数组
   for($i=0;$i<count($link);$i++){
        if($i%2 == 0){
          $j = $i+1;
          if($link[$i]==$link_name){
          $link[$i]="";
          $link[$j]="";
          break;
     }       
  }
}
for($i=0;$i<count($link);$i++){ 
  if($link[$i]!=""){
     if($i== 0){
      $str_in=$link[$i];
     }else{
      $str_in.="|".$link[$i];
     }
  }
 }
 //重新写入
   if($fp = fopen("../config/$name.txt","w")){
      fwrite($fp,$str_in);
      fclose($fp);
    }
  }
}
?>
<br>
<h4> 友 情 链 接 管 理</h4>
<table width="500" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="5" bgcolor="#CCCCCC"></td>
  </tr>
  <tr align="center" valign="middle">
    <td height="26">序号</td>
    <td height="26">显示效果</td>
    <td>显示名称</td>
    <td height="26">链接网址</td>
    <td height="26">操作</td>
  </tr>
 <?php
  //从../config/link.txt中读出数据，并循环输出
  if(!$fp = fopen("../config/$name.txt","r")){
    echo "未创建！ <br>";
  }else{
    @$rst = fgets($fp,3000);
    $link = explode("|",$rst);
    if($rst != ""){
      for($i=0;$i<count($link);$i++){
        if($i%2 == 0){
          $j = $i+1;
        
 ?>
  <tr>
    <td height="1" colspan="5" bgcolor="#CCCCCC"></td>
  </tr>
  <tr align="center">
  	<form id="form1" name="form1" method="post" action="user.php?target=link&edit_tag=1&link_name=<?php echo $link[$i]?>">
    <td height="30" valign="middle"><?php echo (ceil($i/2)+1)?></td>
    <td height="30" valign="middle"><?php echo "<a href=".$link[$j]." target=_blank>".$link[$i]."</a>";?></td>
    <td height="30" valign="middle"><input name="link_name_new" type="text" size="10" maxlength="20" value="<?php echo $link[$i]?>" /></td>
    <td height="30" valign="middle"><input name="link_addr_new" type="text" size="20" maxlength="40" value="<?php echo $link[$j]?>" /></td>
    <td height="30" valign="middle"><input type="submit" name="Submit" value="修 改" />
&nbsp;&nbsp;<a href="user.php?target=link&del_tag=1&link_name=<?php echo $link[$i]?>">删 除</a></td>
  	</form>
  </tr>
  <?php
       }   
      }
    }
  }
  ?>
  <tr align="center">
  	<form id="form1" name="form1" method="post" action="user.php?target=link&add_tag=1">
    <td height="30" valign="middle"><?php echo ($i/2)+1?></td>
    <td height="30" valign="middle">&nbsp;</td>
    <td height="30" valign="middle"><input name="link_name_new" type="text" size="10" maxlength="20" /></td>
    <td height="30" valign="middle"><input name="link_addr_new" type="text" size="20" maxlength="40" /></td>
    <td height="30" valign="middle"><input type="submit" name="Submit" value="添 加" /></td>
  	</form>
  </tr>   
  <tr>
    <td height="1" colspan="5" bgcolor="#CCCCCC"></td>
  </tr>
</table>
