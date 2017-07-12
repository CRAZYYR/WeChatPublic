<?php

$url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx1c46e84da8c08edd&secret=2de9fa0fbf8f23961e2d593a536568ce";
$str = file_get_contents($url);
	$v=json_decode($str,TRUE);
echo($v['access_token']);




