<?php
header("Content-type: text/html; charset=utf-8"); 
class myfunction{
////////字符转换：向数据库中插入或更新时用//////////////////////////
      function str_to($str)
      {
        $str=str_replace(" ","&nbsp;",$str);  //把空格替换html的字符串空格
        $str=str_replace("<","&lt;",$str);  //把html的输出标志正常输出
        $str=str_replace(">","&gt;",$str);  //把html的输出标志正常输出
        $str=nl2br($str);               //把回车替换成html中的br
        return $str;
        }
////////字符转换：从数据库中读出显示在表单文本框中用//////////////////////////
      function str_to2($str)
      {
        $str=str_replace("&nbsp;"," ",$str);  //把空格替换html的字符串空格
        $str=str_replace("<br />","",$str);  //把html的输出标志正常输出
        return $str;
        }
//JS弹出信息框
	function js_alert($message,$url){
		echo "<script language=javascript>alert('";
		echo $message;
		echo "');location.href='";
		echo $url;
		echo "';</script>";
	}
//判断是否为整数
	function int_estimation($num){
		if (eregi("^[0-9]+$", $num)){
			return true;
		} else {
			return false;
		}
	}
//类型id返回类型名称
	function type_idto_name($type_id){
		$folie=new mysql;
        $folie->link("");
		$query="select type_name from blog_type_info where id='$type_id'";
		$rst=$folie->excu($query);
		$info=mysql_fetch_array($rst);
		return $info["type_name"];
	}
	/*
//用户名返回用户id
	function user_nameto_id($user_name){
		$folie=new mysql;
        $folie->link("");
		$query="select id from user_info where user_name='$user_name' and tag='1' and last_time='0000-00-00 00:00:00'";
		$rst=$folie->excu($query);
		if(mysql_num_rows($rst)>=1){
		$info=mysql_fetch_array($rst);
		return $info['id'];
		}else {
		$query="select id from user_info where user_name='$user_name' and tag='0' and last_time='0000-00-00 00:00:00'";
		$rst=$folie->excu($query);
		if(mysql_num_rows($rst)>=1){
			echo "<script language=javascript>alert('用户已被屏蔽！');location.href='index.php';</script>";
		}
		}
		$query1="select id from user_info where user_name='$user_name'";
		$rst1=$folie->excu($query1);
		if(mysql_num_rows($rst1)<1){
			echo "<script language=javascript>alert('用户名不存在！');location.href='index.php';</script>";
		}
	}
*/
//博客信息表中的类型id返回博客类型名称
	function blog_type_idto_name($type_id){
		$folie=new mysql;
        $folie->link("");
		$query="select * from blog_type_info where id='$type_id'";
		$rst=$folie->excu($query);
		$info=mysql_fetch_array($rst);
		return $info["type_name"];
	}

//////////分页函数 返回：首页 上一页 [1][2][...] 下一页 尾页//////////
  function pagination($query,$page_id,$add,$pagesize){
  //  include "mysql.inc";
     ////////使用方法为:
     ///////  $myf=new myfunction;
     ///////  $query="";
	 ///////  $myf->pagination($query,$page_id,$add,$num_per_page);
     ///////  $crazy=$folie->excu($query);
    $aa=new mysql;
	global $query; //声明全局变量 方便后面 limit 输出
	$aa->link("");
	$rst=$aa->excu($query);
	$total_num=mysql_num_rows($rst);
	$page_id=$_GET['page_id'];
	if($page_id==""){
	  $page_id=1;
	}
	$total_page=ceil($total_num/$pagesize);	
	$up=$page_id-1;
	$down=$page_id+1;
	if($total_num<=0){
		echo "暂无内容.";
	}else {
		echo "<a href=".$add."page_id=1>首页</a>&nbsp;";
		if($up<1){
		$up=1;
		//echo "上一页";
		}else {
		echo "<a href=".$add."page_id=".$up.">上一页</a>";
		}
		for($i=1;$i<=$total_page;$i++){
	  	echo "[<a href=".$add."page_id=".$i.">".$i."</a>]&nbsp;";
		}
		if($down>$total_page){
	 	 $down=$total_page;
	  	//echo "下一页&nbsp;";
		}else {
		echo "<a href=".$add."page_id=".$down.">下一页</a>&nbsp;";
		}
		echo "<a href=".$add."page_id=$total_page>尾页</a>";
		$begin=($page_id-1)*$pagesize;
		$query=$query." limit $begin,$pagesize";
	}
  }
}
?>