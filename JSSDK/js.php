
<?php
require_once('../memcache/cache.class.php');
$cache=new cache();
$appid="wx6b099591e1916ea8";
$ticket=$cache->getTicket();
$noncestr=rand(1000,2000)*45;
$timestamp=time();
$str='jsapi_ticket='.$ticket.'&noncestr='.$noncestr.'&timestamp='.$timestamp.'&url=http://shuaizi.mylzs.cn/JSSDK/js.php';

$signature=sha1($str);

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>.....</title>
</head>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<body>

<form>

<button id="but" onclick="choose()">选择图片</button>
</form>
<script type="text/javascript">
wx.config({
    debug: true, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参
    appId:'<?php echo $appid?>', // 必填，公众号的唯一标识
    timestamp:<?php echo $timestamp ;?> , // 必填，生成签名的时间戳
    nonceStr:'<?php echo $noncestr;?>', // 必填，生成签名的随机串
    signature:'<?php echo $signature;?>',// 必填，签名，见附录1
    jsApiList: ['chooseImage'], // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
});
wx.ready(function(){


});

 function choose(){
var images = {
    localId: [],
    serverId: []
  };
wx.chooseImage({
    count: 1, // 默认9
    sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
    sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
    success: function (res) {
        var localId = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
       alert(localId);
    }
});
}
</script>
</body>
</html>