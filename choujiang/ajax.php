<?php

  $link = mysqli_connect("localhost", "root", "", "wechat");
 mysqli_set_charset($link, "utf8");
$openid=$_REQUEST['openid'];
$nums=$_REQUEST['nums'];
$sql="update chou set nums={$nums} where openid='{$openid}'";

 $res=mysqli_query($link,$sql);

 if($res){
 	echo "1";
 }