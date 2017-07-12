<?php
/**
  * wechat php test
  */

//define your token
include('memcache/cache.class.php');
define("TOKEN", "weixin");
$wechatObj = new wechatCallbackapiTest();
$wechatObj->valid();
$wechatObj->responseMsg();
class wechatCallbackapiTest
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }




            // 关注或者取消判断
 public function event_ck($Event,$postObj){
                      
}
       // 关注或者取消====END  






public function replyNews($data){
       foreach ($data as $k => $v) {
                $str.='<item>
            <Title><![CDATA['.$v['Title'].']]></Title> 
            <Description><![CDATA['.$v['Description'].']]></Description>
            <PicUrl><![CDATA['.$v['PicUrl'].']]></PicUrl>
            <Url><![CDATA['.$v['Url'].']]></Url>
            </item>';
            }
                $xml='<xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%d</CreateTime>
            <MsgType><![CDATA[news]]></MsgType>
            <ArticleCount>'.count($data).'</ArticleCount>
            <Articles>'.$str.'</Articles>
            </xml>';
    

return $xml;
}

    public function responseMsg()
    {
        $cache= new cache();
        $cache->setAccessToken();

		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        $link = mysqli_connect("localhost", "root", "", "wechat");
        mysqli_set_charset($link, "utf8");
      	//extract post data
		if (!empty($postStr)){
                
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
                $MsgType=$postObj->MsgType;

            // 消息类型判断
                switch ($MsgType) {
                    case 'voice':
                       $rs=$postObj->Recognition;
                       $xml='<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%d</CreateTime>
<MsgType><![CDATA[text]]></MsgType>
<Content><![CDATA[%s]]></Content>
 <MsgId>%s</MsgId>
</xml>';
                 echo  printf($xml,$fromUsername,$toUsername,time(),$rs,$postObj->MsgId);
                       break;
                    case 'text':
                                      $xml='<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%d</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<Content><![CDATA[%s]]></Content>
</xml>';
            // 点歌开始
                switch ($keyword) {
                    case '音乐':
                    $str="欢迎来到点歌系统!\n";

$files=scandir('music');
$i=1;
foreach ($files as $key => $value) {
    if ($value !='.' && $value !='..') {
        $str.=$i.'.'.$value."\n";
        $i++;
    }
    
}
    $str.="请输入对应的试听歌曲编号\n";
        echo  printf($xml,$fromUsername,$toUsername,$time,$MsgType,$str); 
 
                        break;

                            case '笑话':
             echo  printf($xml,$fromUsername,$toUsername,$time,$MsgType,'笑话开始了,做好准备!'); 
                        break;

                            case '趣事':
                            $data=array(
                                array(
                                'Title'=>'一万两千的世界',
                                'Description'=>'一个神奇的故事',
                                'PicUrl'=>'http://shuaizi.mylzs.cn/a.jpg',
                                'Url'=>'http://www.baidu.com',
                                    ),
                                array(
                                'Title'=>'nayeaasda',
                                'Description'=>'一个神adsad奇的故事',
                                'PicUrl'=>'http://shuaizi.mylzs.cn/a.jpg',
                                'Url'=>'http://www.baidu.com',
                                    ),
                                array(
                                'Title'=>'12413556',
                                'Description'=>'kjhgfdstre',
                                'PicUrl'=>'http://shuaizi.mylzs.cn/a.jpg',
                                'Url'=>'http://www.baidu.com',
                                    )
                                );
                 
               $xml=$this->replyNews($data);
             echo  printf($xml,$fromUsername,$toUsername,$time); 

                        break;
                
                    default:
                 preg_match('/^sq([\x{4e00}-\x{9fa5}]+)/ui',$keyword,$res);
                    if ($res[0]) {
                        $sql="insert into text values(null,'$postObj->FromUserName','$res[1]')";
                        mysqli_query($link, $sql);
                  $xml='<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%d</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<Content><![CDATA[%s]]></Content>
</xml>';     
       
         echo  printf($xml,$fromUsername,$toUsername,$time,'text','上墙成功！'); 
                      
                    }
                preg_match('/^ss([\x{4e00}-\x{9fa5}]+)/ui',$keyword,$gos);
                    if ($gos[0]) {  
       
        $sql="select * from position where openid='$postObj->FromUserName' order by time desc limit 1";
        $result=mysqli_query($link, $sql);
        $position=mysqli_fetch_assoc($result);
        $url="http://shuaizi.mylzs.cn/baidu/index.php?j=".$position['Latitude']."&w=".$position['Longitude']."&search=".$gos[1];
  
     $data=array(
                                array(
                                'Title'=>'周边的'.$gos[1].'信息',
                                'Description'=>'搜索导航!',
                                'PicUrl'=>'http://shuaizi.mylzs.cn/bb.jpg',
                                'Url'=>$url,
                                    )
                         
                                );
          $xml=$this->replyNews($data);
             echo  printf($xml,$fromUsername,$toUsername,$time); 
        break;
                      
                    }
               if (preg_match('/^\d{1,2}$/', $keyword)) {



        // 回复音乐
        // 
        $files=scandir('music');
        $i=1;
                foreach ($files as $key => $value) {
                            if ($value !='.' && $value !='..') {

                        if ($keyword==$i) {
                            
                                $xml='<xml>
                                <ToUserName><![CDATA[%s]]></ToUserName>
                                <FromUserName><![CDATA[%s]]></FromUserName>
                                <CreateTime>%d</CreateTime>
                                <MsgType><![CDATA[%s]]></MsgType>
                                <Music>
                                <Title><![CDATA[%s]]></Title>
                                <Description><![CDATA[%s]]></Description>
                                <MusicUrl><![CDATA[%s]]></MusicUrl>
                                <HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
                                </Music>
                                </xml>';
                                $data=array(
                                    'Title'=>$value,
                                    'Description'=>$value,
                                    'MusicUrl'=>'http://shuaizi.mylzs.cn/music/'.$value,
                                    'HQMusicUrl'=>'http://shuaizi.mylzs.cn/music/'.$value,
                                    );
                     echo  printf($xml,$fromUsername,$toUsername,$time,'music',$data['Title'],$data['Description'],$data['MusicUrl'],$data['HQMusicUrl']);
                        }
         
                                $i++;
                            }
                    
                }
                            // 结束音乐
                      

            }

                        break;
                }
            // 点歌结束
                  // echo  printf($xml,$fromUsername,$toUsername,$time,$MsgType,'Go With Me');
                        break;
                        //地理位置
                        case 'location':
                           $sql="insert into position values(null,'$postObj->FromUserName','$postObj->Location_Y','$postObj->Location_X',".time().")";
                            mysqli_query($link, $sql);

                                      $xml='<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%d</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<Content><![CDATA[%s]]></Content>
</xml>';     
        $posi='你的经度是：'.$postObj->Location_Y.'你的维度是:'.$postObj->Location_X;
         echo  printf($xml,$fromUsername,$toUsername,$time,'text',$posi); 
                            break;
                        // 图片回复
                        
                    case 'image':
                        $xml='<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%d</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<Image>
<MediaId><![CDATA[%s]]></MediaId>
</Image>
</xml>';
                $MediaId=$postObj->MediaId;
                     echo  printf($xml,$fromUsername,$toUsername,$time,'image',$MediaId);
                        break;
                        case 'event':
                        $Event=$postObj->Event;
                         switch ($Event) {
                            //自定菜单点击推送事件
                            case 'CLICK':
                                switch ($postObj->EventKey) {
                                    //抽奖活动
                                    case 'chou':
                                    $data=array(
                                array(
                                'Title'=>'欢迎来到抽奖活动入口！',
                                'Description'=>'点击进入抽奖!',
                                'PicUrl'=>'http://shuaizi.mylzs.cn/choujiang/chou.jpg',
                                'Url'=>'http://shuaizi.mylzs.cn/choujiang/index.php?openid='.$postObj->FromUserName,
                                    )
                                
                                );

                                $xml=$this->replyNews($data);        
                 echo  printf($xml,$fromUsername,$toUsername,$time); 
                                        break;
                                    
                                    default:
                                        # code...
                                        break;
                                }
                                break;
                            //地理位置
                            case 'LOCATION':
                            $sql="insert into position values(null,'$postObj->FromUserName','$postObj->Latitude','$postObj->Longitude',".time().")";
                            mysqli_query($link, $sql);
                               
                        //订阅
                           case 'subscribe':

                            // ========
                            $data=array(
                                array(
                                'Title'=>'一万两千的世界',
                                'Description'=>'一个神奇的故事',
                                'PicUrl'=>'http://shuaizi.mylzs.cn/a.jpg',
                                'Url'=>'http://www.baidu.com',
                                    ),
                                array(
                                'Title'=>'nayeaasda',
                                'Description'=>'一个神adsad奇的故事',
                                'PicUrl'=>'http://shuaizi.mylzs.cn/a.jpg',
                                'Url'=>'http://www.baidu.com',
                                    ),
                                array(
                                'Title'=>'12413556',
                                'Description'=>'kjhgfdstre',
                                'PicUrl'=>'http://shuaizi.mylzs.cn/a.jpg',
                                'Url'=>'http://www.baidu.com',
                                    )
                                );
                 
               $xml=$this->replyNews($data);
               //获取access_token
if($cache->getAccessToken()){
   $access_token=$cache->getAccessToken(); 
}else{
         $cache->setAccessToken();
}


               //获取access_token 结束
               $url='https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$access_token.'&openid='.$postObj->FromUserName.'&lang=zh_CN';
                $ch = curl_init();
 
 curl_setopt($ch,CURLOPT_URL,$url); 
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

 //不验证证书 
 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
  //不验证证书
   curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

      $str = curl_exec($ch);
     $str=json_decode($str,TRUE);
  // $str=$str['user_info_list'];
      curl_close($ch);
$query = "insert into user values(null,'$str[openid]','$str[nickname]','$str[sex]','$str[city]','$str[country]','$str[province]','$str[headimgurl]')";
mysqli_query($link, $query);

   $sql="insert into chou values(null,'$postObj->FromUserName','3','')";



mysqli_query($link, $sql); 

             echo  printf($xml,$fromUsername,$toUsername,$time); 
//                    $xml='<xml>
// <ToUserName><![CDATA[%s]]></ToUserName>
// <FromUserName><![CDATA[%s]]></FromUserName>
// <CreateTime>%d</CreateTime>
// <MsgType><![CDATA[text]]></MsgType>
// <Content><![CDATA[%s]]></Content>
// </xml>';
//         echo  printf($xml,$fromUsername,$toUsername,$time,$str);

                            // ========
                               break;
                        //取消
                           case 'unsubscribe':
                               $sql="delete from user where openid='$postObj->FromUserName'";
                              mysqli_query($link, $sql);
                               break;
                        
                       }
               
                            break;

                        
                    default:
                      // if (preg_match('/^\d{1,2}$/', $keyword)) {



        // 回复音乐
        // 
//         $files=scandir('music');
// $i=1;
                // foreach ($files as $key => $value) {
                //             if ($value !='.' && $value !='..') {

                //                             if ($keyword==$i) {
                                                
                //                                     $xml='<xml>
                //                                     <ToUserName><![CDATA[%s]]></ToUserName>
                //                                     <FromUserName><![CDATA[%s]]></FromUserName>
                //                                     <CreateTime>%d</CreateTime>
                //                                     <MsgType><![CDATA[%s]]></MsgType>
                //                                     <Music>
                //                                     <Title><![CDATA[%s]]></Title>
                //                                     <Description><![CDATA[%s]]></Description>
                //                                     <MusicUrl><![CDATA[%s]]></MusicUrl>
                //                                     <HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
                //                                     </Music>
                //                                     </xml>'
                //                                     $data=array(
                //                                         'Title'=>$value,
                //                                         'Description'=>$value,
                //                                         'MusicUrl'=>'http://shuaizi.mylzs.cn/music/'.$value,
                //                                         'HQMusicUrl'=>'http://shuaizi.mylzs.cn/music/'.$value,
                //                                         );
                //                          echo  printf($xml,$fromUsername,$toUsername,$time,'music',$data['Title'],$data['Description'],$data['MusicUrl'],$data['HQMusicUrl']);
                //                             }
                             
                //                 $i++;
                //             }
                    
                // }
                            // 结束音乐


                          # code...
                      // }
                        break;
                }



    //             $textTpl = "<xml>
				// 			<ToUserName><![CDATA[%s]]></ToUserName>
				// 			<FromUserName><![CDATA[%s]]></FromUserName>
				// 			<CreateTime>%s</CreateTime>
				// 			<MsgType><![CDATA[%s]]></MsgType>
				// 			<Content><![CDATA[%s]]></Content>
				// 			<FuncFlag>0</FuncFlag>
				// 			</xml>";             
				// if(!empty( $keyword ))
    //             {
    //           		$msgType = "text";
    //             	$contentStr = "Welcome to wechat world!";
    //             	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
    //             	echo $resultStr;
    //             }else{
    //             	echo "Input something...";
    //             }

        }else {
        	echo "";
        	exit;
        }
    }
		
	private function checkSignature()
	{
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];	
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}

?>