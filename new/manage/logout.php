<?php
//清空session
$_SESSION["user_name"] = "";
$_SESSION["user_id"] = "";
$_SESSION["user_tag"] = "";
header("location:../index.php");
exit;
//跳转到首页
?>