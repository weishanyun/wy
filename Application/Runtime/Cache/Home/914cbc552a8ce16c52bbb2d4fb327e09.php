<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta  http-equiv="content" charset="UTF-8">
	<meta name="viewpoint" content="initial-scale=1.0;width=device-width"/>
	<title>微信分享js接口</title>
	<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
	<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
</head>
<body>
<?php echo ($name); ?>
	<script>
		wx.config({
		    debug: true, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
		    appId: 'wxbd6ba2d898068938', // 必填，公众号的唯一标识
		    timestamp: '<?php echo ($timestamp); ?>', // 必填，生成签名的时间戳
		    nonceStr: '<?php echo ($noncestr); ?>', // 必填，生成签名的随机串
		    signature:'<?php echo ($signature); ?>',// 必填，签名，见附录1
		    jsApiList: [
		    'onMenuShareTimeline',
		    'onMenuShareAppMessage',
		    'chooseImage',
		    'previewImage',
		    'uploadImage',
		    'downloadImage',
		    ]// 必填，需要使用的JS接口列表，所有JS接口列表见附录2
        });

        wx.ready(function(){
		  
		   wx.onMenuShareTimeline({
		    title: 'test1', // 分享标题
		    link: 'http://www.imooc.com/', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
		    imgUrl: 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1494153540176&di=cb366cb3e33b303c6e58b221524e3b93&imgtype=0&src=http%3A%2F%2Ffile101.mafengwo.net%2Fs6%2FM00%2FEF%2F01%2FwKgB4lYu9JeABK-JABNCl3o-wIQ67.jpeg', // 分享图标
		    success: function () { 
		        // 用户确认分享后执行的回调函数
		    },
		    cancel: function () { 
		        // 用户取消分享后执行的回调函数
		    }
            });

		   wx.onMenuShareAppMessage({
			    title: 'test2', // 分享标题
			    desc: 'llalalal', // 分享描述
			    link: 'http://www.imooc.com/', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
			    imgUrl: 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1494153540176&di=cb366cb3e33b303c6e58b221524e3b93&imgtype=0&src=http%3A%2F%2Ffile101.mafengwo.net%2Fs6%2FM00%2FEF%2F01%2FwKgB4lYu9JeABK-JABNCl3o-wIQ67.jpeg', // 分享图标
			    type: '', // 分享类型,music、video或link，不填默认为link
			    dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
			    success: function () { 
			        // 用户确认分享后执行的回调函数
			    },
			    cancel: function () { 
			        // 用户取消分享后执行的回调函数
			    }
			});

		});

      function show(){
		   wx.chooseImage({
			    count: 1, // 默认9
			    sizeType: ['compressed'], // 可以指定是原图还是压缩图，默认二者都有
			    sourceType: ['camera'], // 可以指定来源是相册还是相机，默认二者都有
			    success: function (res) {
			        var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
			         if (localIds.length == 0) {
			        alert('请先使用 chooseImage 接口选择图片');
			        return;
				    }
				    alert(1);
				    for(var k in localIds){
				        var localId = localIds[k];
		
				        wx.uploadImage({
				            localId: localId, // 需要上传的图片的本地ID，由chooseImage接口获得
				            isShowProgressTips: 1, // 默认为1，显示进度提示
				            success: function (res) {
				            var serverId = res.serverId;
				            $("#serverid").val(serverId); // 返回图片的服务器端ID
                                // $.ajax({
                                //     type:"POST",
                                //     url:"http://php.shuochuang/hdd/index.php?c=Index&a=downFile",
                                //     data:"serverid="+serverId,
                                //     dataType:"json",
                                //     success:function(msg){
                                        
                                //             $("#picpath").html(msg.filepath);
                                                                               
                                //     }               
                                // });
				            },
				            complete :function(){
				            	// alert(1);
				            }
				        });    	
				    }
							    }
							});
						}
		wx.error(function(res){
		    
		});

    function onImageDone(){
    if (localIds.length == 0) {
        alert('请先使用 chooseImage 接口选择图片');
        return;
    }
    alert(1);
    for(var k in localIds){
        var localId = localIds[k];
 
        wx.uploadImage({
            localId: localId, // 需要上传的图片的本地ID，由chooseImage接口获得
            isShowProgressTips: 1, // 默认为1，显示进度提示
            success: function (res) {
               images.serverId.push(res.serverId);
               var sI =  images.serverId;
    //                      var serverId = res.serverId; // 返回图片的服务器端ID
                alert(sI);
               document.getElementById('img1').src=sI;
			   document.getElementById('imgsrc').value=sI;
            },
            complete :function(){
            	alert(1);
            }
        });    	
    }	
       }
	</script>
	<button onclick="show()">test</button>
	<form action="?c=Index&a=downFile" method="post">
	<div><img id="img1" src=""></div>
	<input id="imgsrc" type="hidden" name="imgsrc" value="">
	<input type="" name="serverid" id="serverid" value="">  
	<input type="submit" name="submit" value="提交">
	</form>
</body>
</html>