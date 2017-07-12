<?php
$appid='wx1c46e84da8c08edd';
$secret='2de9fa0fbf8f23961e2d593a536568ce';
$url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx6b099591e1916ea8&secret=a13b565a815ec44f983d895e04294437";

   $ch = curl_init();
 
 curl_setopt($ch,CURLOPT_URL,$url); 
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

 //不验证证书 
 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
  //不验证证书
   curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

      $str = curl_exec($ch);
    
      curl_close($ch);



  $v=json_decode($str,TRUE);

$access_token=$v['access_token'];

 $url="https://api.weixin.qq.com/cgi-bin/menu/create?access_token={$access_token}";



//  $data='{
// "button":[
// {
// "name":"一语知心",
// "sub_button":[
// {
// "type":"click",
// "name":"一语知心1",
// "key":"name1"
// },
// {
// "type":"click",
// "name":"一语知心2",
// "key":"name2"
// }
// ]
// },
// {
// "name":"一语知心",
// "sub_button":[
// {
// "type":"click",
// "name":"一语知心1",
// "key":"name1"
// },
// {
// "type":"click",
// "name":"一语知心2",
// "key":"name2"
// }
// ]
// },
// {
// "type":"view",
// "name":"更多...",
// "url":"http://www.baidu.com"
// }
// ]
// }';
$data='{
  "button":[
    {"name":"一语知心",
        "sub_button":[
        {
          "type":"click",
          "name":"音乐",
          "key":"music"
        },
        {
          "type":"click",
          "name":"笑话",
          "key":"laught"
        },
        {
          "type":"click",
          "name":"新闻",
          "key":"news"
        },
          {
          "type":"click",
          "name":"抽奖活动",
          "key":"chou"
        }
        ,
           {
          "type":"view",
          "name":"图片",
          "url":"http://shuaizi.mylzs.cn/JSSDK/js.php"
        }
        ]
      },
       {
        "type":"view",
          "name":"更多...",
          "key":"news",
          "url":"http://www.baidu.com"
      }
      ]

}';
  $ch = curl_init();
 
 curl_setopt($ch,CURLOPT_URL,$url); 
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

 //不验证证书 
 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
  //不验证证书
   curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

curl_setopt($ch,CURLOPT_POST,1); 
curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
      $str = curl_exec($ch);
      var_dump($str);
    
      curl_close($ch);































 //   $ch = curl_init();
 
 // curl_setopt($ch,CURLOPT_URL,$url); 
 //    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

 // //不验证证书   
 // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

 // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
 //  //不验证证书

 //    curl_setopt($ch,CURLOPT_POST,1);
 //     curl_setopt($ch,CURLOPT_POSTFIELDS,$postData);
 //      $rs = curl_exec($ch);
 //  	$rs=json_decode($rs,TRUE);
 //  	var_dump($rs);   
 //      curl_close($ch);
 //  