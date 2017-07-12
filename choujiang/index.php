﻿<?php

require_once('../memcache/cache.class.php');
 $cache= new cache();
      $link = mysqli_connect("localhost", "root", "", "wechat");
        mysqli_set_charset($link, "utf8");
        $sqll="select * from chou where openid='$_REQUEST[openid]'";
 
      $res=mysqli_query($link,$sqll);
		$row=mysqli_fetch_assoc($res);

?>
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<title>抽奖活动</title>
</head>

<style type="text/css">
/* === CSS Reset ========== */
body, div, dl, dt, dd, ul, ol, li, h1, h2, h3, h4, h5, h6, pre, code, form, fieldset, legend, input, button, textarea, blockquote, th, td, p { margin:0; padding:0 }
input, button, select, textarea, a:fouse {outline:none}
li {list-style:none;}
img {border:none;}
textarea {resize:none;}
body {margin:0;font: 12px "微软雅黑"; background: #feecd4;}
/* === End CSS Reset ========== */

body{
    min-width: 1000px;
    _width:expression((document.documentElement.clientWidth||document.body.clientWidth)<950?"950px":"");
}
a{
    text-decoration: none;
}
.clearfix:after {
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0;
}
.clearfix{*zoom:1;}

.container{
    width: 1000px;
    margin: 0 auto;
    position: relative;
    /*height: 198px;*/
}


.main2{
    background: url("images/main2.png") no-repeat center;

    height: 689px;
    _width:expression((document.documentElement.clientWidth||document.body.clientWidth)<1000?"1000px":"");
    /*最小宽度*/
}
.main3{

    _width:expression((document.documentElement.clientWidth||document.body.clientWidth)<1000?"1000px":"");
}
.main3-text{
    color:#744b00;
    font-size: 23px;
    font-weight: bold;
    position: absolute;
    left: 74px;
    top: 210px;
}
.main3-text2{
    color:#744b00;
    font-size: 14px;
    position: absolute;
    left: 74px;
    top: 254px;
    line-height: 22px;
    width: 867px;
}
.main-text{
    position: absolute;
    left: 360px;
    top: 325px;
    color:#b03b01;
    font-size: 16px;
}
.main2-text1{
    position: absolute;
    left: 79px;
    top: 45px;
    color:#ffffff;
    font-size: 16px;
}
.main2-text2{
    position: absolute;
    left: 69px;
    top: 67px;
    color:#ffffff;
    font-size: 23px;
    font-weight: bold;
}
.main2-text2 span{
    color:#ffff00;
}
.main2-text3{
    position: absolute;
    left: 69px;
    top: 97px;
    color:#ffffff;
    font-size: 18px;
}
.main2-text4{
    position: absolute;
    left: 382px;
    top: 34px;
    color:#ffffff;
    font-size: 18px;
}
.main2-text4 span{
    color:#ffe700;
    font-weight: bold;
}
.main2-text5{
    position: absolute;
    left: 665px;
    top: 34px;
    color:#ffffff;
    font-size: 18px;
}
.main2-text5 span{
    color:#ffe700;
    font-weight: bold;
}
.num{
    position: absolute;
    left: 248px;
    top: 171px;
    width: 124px;
    height: 198px;
    overflow: hidden;
}
.num-con{
    position: relative;
    top:-430px;
}
.num-img{
    background: url("images/num.png") no-repeat;
    width: 124px;
    height: 1298px;
    margin-bottom: 4px;
}
.num2{
    left: 399px;
}
.num3{
    left: 551px;
}

.main3-btn{
    width: 307px;
    height: 95px;
    position: absolute;
    left: 313px;
    top: -290px;
    cursor: pointer;
}
</style>
<body>

<div class="main2">
	<div class="container">

		<div class="num num1">
			<div class="num-con num-con1">
				<div class="num-img"></div>
				<div class="num-img"></div>
			</div>
		</div>
		<div class="num num2">
			<div class="num-con num-con2">
				<div class="num-img"></div>
				<div class="num-img"></div>
			</div>
		</div>
		<div class="num num3">
			<div class="num-con num-con3">
				<div class="num-img"></div>
				<div class="num-img"></div>
			</div>
		</div>
	</div>
</div>
<div class="main3">
	<div class="container">
		<div class="main3-btn"></div>
		
	</div>
</div>
</body>
</html>
<script type="text/javascript"  src="js/jquery.js"></script>
<script type="text/javascript">

	var totle=<?php echo $row['nums']; ?>;
	$(".main3-btn").click(function () {
	
	if (!totle) {
		alert("你的抽奖机会已经用完!");
		return;
	}
		if(!flag){
			flag=true;
			
			totle--;
			$.get('http://shuaizi.mylzs.cn/choujiang/ajax.php',{'openid':"<?php echo $row['openid']; ?>",'nums':totle},function(data){
				if (data==1) {
			reset();		
		letGo();
					};
			});

			
			setTimeout(function () {
				flag=false;
				if(index==2){
					$(".fix,.pop-form").show();
				}else{
					$(".fix,.pop").show();
					$(".pop-text span").text(""+String(4-TextNum1)+(8-TextNum2))
				}
			},4000);
			index++;
		}
	});

	var flag=false;
	var index=0;
	var TextNum1
	var TextNum2
	var TextNum3

	function letGo(){

		TextNum1=parseInt(Math.random()*1)//随机数
		TextNum2=parseInt(Math.random()*1)
		TextNum3=parseInt(Math.random()*1)

		var num1=[-549,-668,-786,-904][TextNum1];//在这里随机
		
		var num2=[-1377,-1495,-1614,-430,-549,-668,-786,-904][TextNum2];
		var num3=[-1377,-1495,-1614,-430,-549,-668,-786,-904][TextNum3];
		$(".num-con1").animate({"top":-1140},1000,"linear", function () {
			$(this).css("top",0).animate({"top":num1},1000,"linear");
		});
		$(".num-con2").animate({"top":-1140},1000,"linear", function () {
			$(this).css("top",0).animate({"top":num2},1800,"linear");
		});
		$(".num-con3").animate({"top":-1140},1000,"linear", function () {
			$(this).css("top",0).animate({"top":num3},1300,"linear");
		});
		if (TextNum3==TextNum2 && TextNum2==TextNum3) {
            <?php 
                  $query="select * from user where openid='$_REQUEST[openid]'";

      $ress=mysqli_query($link,$query);
        $rows=mysqli_fetch_assoc($ress);
              $array=array('name'=>$rows['nickname'],'goods'=>'获取3000万');
     $cache->sendTmp($_REQUEST['openid'],'V2W9Y8VF3iyzJCY8gLnP0huLC72sKdFuiiII1bubIbw',$array);
     ?>
			alert("恭喜你中奖了!");
		}

	}

	function reset(){
		$(".num-con1,.num-con2,.num-con3").css({"top":-430});
	}


</script>


</body>
</html>