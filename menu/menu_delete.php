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

$url="https://api.weixin.qq.com/cgi-bin/menu/delete?access_token={$access_token}";

  $ch = curl_init();
 
 curl_setopt($ch,CURLOPT_URL,$url); 
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

 //不验证证书 
 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
  //不验证证书
   curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

      $str = curl_exec($ch);
  
echo "<pre>";
      var_dump($str);
         curl_close($ch);
