<?php
 /**
 * 
 */
 class cache 
 {
 	



 	public function getAccessToken(){
 		 	 	$memcache_obj = new Memcache;
/* connect to memcached server */
	$memcache_obj->connect('123.206.119.161', 11211);	
	if (!$memcache_obj->get('access_token')) {
		$this->setAccessToken();
	}
 		return $memcache_obj->get('access_token');
 	}
 	public function setAccessToken(){
 	 	$memcache_obj = new Memcache;
/* connect to memcached server */
	$memcache_obj->connect('123.206.119.161', 11211);	
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


/*
设置'var_key'对应值，使用即时压缩
失效时间为50秒
*/
$memcache_obj->set('access_token', $access_token, MEMCACHE_COMPRESSED,7000);



 	}
 	//群发文本消息
 	public	function sendText($text){


  $link = mysqli_connect("localhost", "root", "", "wechat");
 mysqli_set_charset($link, "utf8");
 		$sql="select openid from user";
 		 $res=mysqli_query($link,$sql);
 		$this->setAccessToken();
 		$url='https://api.weixin.qq.com/cgi-bin/message/mass/send?access_token='.$this->getAccessToken();
 		while ($row=mysqli_fetch_assoc($res)) {
 			$arr[]=$row['openid'];
 		}

 		$data=array(
 			'touser'=>$arr,
 			'text'=>array('content'=>$text),
 			'msgtype'=>'text'
 			);
 		
 		$data=json_encode($data);
 		
 	
 		$res=$this->https_request($url,$data);
 		var_dump($res);
 	} 
/**
 * 网站请求,并返回数据!
 * @param  [type] $url  [description]
 * @param  [type] $data [description]
 * @return [type]       [description]
 */
 	public function https_request($url, $data){
 		 $ch = curl_init();

 curl_setopt($ch,CURLOPT_URL,$url); 
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

 //不验证证书 
 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
  //不验证证书
   curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
if (!empty($data)) {

	curl_setopt($ch,CURLOPT_POST,1); 
curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
}

      $str = curl_exec($ch);
      curl_close($ch);
      return $str;
 	}
 	/**
 	 * 群发送图片
 	 * @param  [type] $media_id [description]
 	 * @return [type]           [description]
 	 */
 	public function sedImage($media_id){
 		
  $link = mysqli_connect("localhost", "root", "", "wechat");
 mysqli_set_charset($link, "utf8");
 		$sql="select openid from user";
 		 $res=mysqli_query($link,$sql);
 		$this->setAccessToken();
 		$url='https://api.weixin.qq.com/cgi-bin/message/mass/send?access_token='.$this->getAccessToken();
 		while ($row=mysqli_fetch_assoc($res)) {
 			$arr[]=$row['openid'];
 		}

 		$data=array(
 			'touser'=>$arr,
 			'image'=>array('media_id'=>$media_id),
 			'msgtype'=>'image'
 			);
 		$data=json_encode($data);
 		$res=$this->https_request($url,$data,'true');
 		var_dump($res);
 	} 
 	// 发送模板消息
 	public function sendTmp($user,$tmp,$arr){
 		$url='https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$this->getAccessToken().'&cc='.rand(1,100);
 		/**
 		 * [$data description]
 		 * @var array
 		 *    {
           "touser":"OPENID",
           "template_id":"ngqIpbwh8bUfcSsECmogfXcV14J0tQlEpBO27izEYtY",
           "url":"http://weixin.qq.com/download",  
           "miniprogram":{
             "appid":"xiaochengxuappid12345",
             "pagepath":"index?foo=bar"
           },          
           "data":{
                   "first": {
                       "value":"恭喜你购买成功！",
                       "color":"#173177"
                   },
 
 		 */
 		$data=array(
 			'touser'=>$user,
 			'template_id'=>$tmp,
 			'url'=>'http://www.baidu.com',
 			'data'=>array(
 				'name'=>array('value'=>$arr['name'],'color'=>'#f00'),
 				'goods'=>array('value'=>$arr['goods'],'color'=>'#f00'),
 				'time'=>array('value'=>"".date('Y-m-d H:i:s',time()),'color'=>'#f00')
 				)
 			);
 		$data=json_encode($data);
 		return $this->https_request($url,$data);
 	}
 	/**
 	 * 上传临时素材
 	 * @return [type] [description]
 	 */
 	public function uploadTmp(){
 		$url='https://api.weixin.qq.com/cgi-bin/media/upload?access_token='.$this->getAccessToken().'&type=image';
 		if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg")))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    return "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    // echo "name: " . $_FILES["file"]["name"] . "<br />";
    // echo "Type: " . $_FILES["file"]["type"] . "<br />";
    // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      return $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      	$dir="../upload/" .time()."". $_FILES["file"]["name"];

      move_uploaded_file($_FILES["file"]["tmp_name"],$dir);
      $post_data ['media']  = '@'.$dir;
      return $this->https_request($url,$post_data);
      }
    }
  }
else
  {
  return "Invalid file";
  }
 	
 	}



 	public function setTicket(){
 		 $url='https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token='.$this->getAccessToken().'&type=jsapi';
 $memcache_obj = new Memcache;
/* connect to memcached server */
	$memcache_obj->connect('123.206.119.161', 11211);	
	$res=$this->https_request($url,"");

	$res=json_decode($res,TRUE);


	$ticket=$res['ticket'];
	$memcache_obj->set('ticket', $ticket, MEMCACHE_COMPRESSED,7000);

 	}

 	public function getTicket(){
 		$memcache_obj = new Memcache;
/* connect to memcached server */
	$memcache_obj->connect('123.206.119.161', 11211);
		if (!$memcache_obj->get('ticket')) {
		$this->setTicket();
			}
 		return $memcache_obj->get('ticket');


 	}
 }