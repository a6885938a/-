<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
</body>
<script src='//res.tybj-food.com/public/js/jquery.min.js'></script>
<script src="//res.tybj-food.com/public/js/jweixin-1.0.0.js"></script>
<script>
url = location.href;
$.ajax({
    type: "get",
    url: "https://www.tybj-food.com/wp-content/themes/tybj/jssdk.php?url=" + url, //替换网址，xxx根据自己jssdk文件位置修改 
    dataType: "jsonp",
    jsonp: "callback",
    jsonpCallback: "success_jsonpCallback",
    success: function(data) {
        wx.config({
            appId: data.appId,
            timestamp: data.timestamp,
            nonceStr: data.nonceStr,
            signature: data.signature,
            jsApiList: [
                "onMenuShareTimeline", //分享给好友 
                "onMenuShareAppMessage", //分享到朋友圈 
                "onMenuShareQQ", //分享到QQ 
                "onMenuShareWeibo" //分享到微博 
            ]
        });
    },
    error: function(data) {
        console.log('error');
        console.log(url);
    }
});
wx.ready(function() {
    var shareData = {
        title: '标题',
        desc: '简介', //这里请特别注意是要去除html 
        link: '链接',
        imgUrl: '题图'
    };
    wx.onMenuShareAppMessage(shareData);
    wx.onMenuShareTimeline(shareData);
    wx.onMenuShareQQ(shareData);
    wx.onMenuShareWeibo(shareData);
});
</script>

</html>