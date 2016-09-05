<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<link rel="stylesheet" type="text/css" href="__ROOT__/statics/vendor/fex-webuploader/webuploader.css">
<script type="text/javascript" src="__ROOT__/statics/vendor/fex-webuploader/webuploader.js"></script>

<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <form class="J_ajaxForm" action="{:U('addinterview')}" method="post" id="myform">
    <div class="h_a">添加访谈信息</div>
    <div class="table_full">
      <table width="100%" >
           <tr>
              <th width="200">访谈标题：</th>
              <input type="hidden" name="id" value="{$obj.id}" />
              <th><input type="text" name="title" value="{$obj.title}" class="input length_6"></th>
            </tr>
            <tr>
              <th width="200">访谈开始时间：</th>
              <th>
               <input type="text" name="start_time" class="input length_2 J_date" value="{$obj.start_time}" placeholder="上传日期">
              </th>
            </tr>
            <tr>
              <th width="200">嘉宾信息：</th>
              <th>
              <textarea name="guest" style="width:380px; height:150px;">{$obj.guest}</textarea> 
              </th>
            </tr>
            <tr>
              <th width="200">访谈信息：</th>
              <th>
              <textarea name="summary" style="width:380px; height:150px;">{$obj.summary}</textarea> 
              </th>
            </tr>
            <tr>
              <th width="200">是否开启:</th>
              <th>
			  
			 <if condition="$obj.is_open eq 'on'">
				<input type="radio" checked="" value="on" name="is_open">开启
			  	<input type="radio" value="off" name="is_open">关闭
				<else />
				<input type="radio" value="on" name="is_open">开启
			  	<input type="radio"  checked="" value="off" name="is_open">关闭
			</if>
											
											
              	
              </th>
            </tr>
            <input type="hidden" id="baseurl"  value="{$config_siteurl}" />
            <tr>
              <th width="200">访谈封面：</th>
              <th>
              	<div id="uploader-img">
              		<input type="hidden" id="img" name="img" value="{$obj.banner}" />
				    <div id="showimg">
						<img heigth="100px" src="{$obj.banner}">
				    </div>
				    <div id="filePicker-img">选择图片</div>
				</div>
              </th>
            </tr>
            <tr>
              <th width="200">视频：</th>
              <th>
              	<div id="uploader-vedio">
              	    <input type="hidden" id="video" name="video" value="{$obj.video}" />
				    <div id="showideo"><a src='{$obj.video}' >{$obj.video}</a></div>
					 <div id="fileList" class="uploader-list"></div>
				    <div id="filePicker-vedio">选择视频</div>
				</div>
			</th>
            </tr>
      </table>
    </div>
    <div class="">
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
      </div>
    </div>
  </form>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script >
//初始化Web Uploader
var uploader_img = WebUploader.create({
    // 选完文件后，是否自动上传。
    auto: true,
    // swf文件路径
    swf:'vendor/webuploader/js/Uploader.swf',
    // 文件接收服务端。 http://gan.cn/index.php?g=Interview&m=Admin&a=addinterview&menuid=210
    server: 'index.php?g=Interview&m=Admin&a=uploadImage',
    // 选择文件的按钮。可选。
    // 内部根据当前运行是创建，可能是input元素，也可能是flash.
    pick: '#filePicker-img',
    // 只允许选择图片文件。
    accept: {
        title: 'Images',
        extensions: 'gif,jpg,jpeg,bmp,png',
        mimeTypes: 'image/*'
    }
});
//文件上传过程中创建进度条实时显示。
uploader_img.on( 'uploadProgress', function( file, percentage ) {
    var $li = $( '#'+file.id ),
        $percent = $li.find('.progress span');

    // 避免重复创建
    if ( !$percent.length ) {
        $percent = $('<p class="progress"><span></span></p>')
                .appendTo( $li )
                .find('span');
    }

    $percent.css( 'width', percentage * 100 + '%' );
});

// 文件上传成功，给item添加成功class, 用样式标记上传成功。
uploader_img.on( 'uploadSuccess', function( file,response) {
	//alert("__ROOT__"+response.data);
	$("#img").val("__ROOT__"+response.data);
    $("#showimg").html("<img src='__ROOT__"+response.data+"' heigth='100px'>");
});

// 文件上传失败，显示上传出错。
uploader_img.on( 'uploadError', function( file,response) {
    var $li = $( '#'+file.id ),
        $error = $li.find('div.error');

    // 避免重复创建
    if ( !$error.length ) {
        $error = $('<div class="error"></div>').appendTo( $li );
    }

    $error.text('上传失败');
});

// 完成上传完了，成功或者失败，先删除进度条。
uploader_img.on( 'uploadComplete', function( file ) {
    $( '#'+file.id ).find('.progress').remove();
});



var uploader_video = WebUploader.create({
    // 选完文件后，是否自动上传。
    auto: true,
    // swf文件路径
    swf:'vendor/webuploader/js/Uploader.swf',
    // 文件接收服务端。
    server: 'index.php?g=Interview&m=Admin&a=uploadVideo',
    // 选择文件的按钮。可选。
    // 内部根据当前运行是创建，可能是input元素，也可能是flash.
    pick: '#filePicker-vedio',
    // 只允许选择mp4文件。
    accept: {
        title: 'Images',
        extensions: 'mp4,avi,rmvb'
    }
});

// 文件上传成功，给item添加成功class, 用样式标记上传成功。
uploader_video.on( 'uploadSuccess', function( file,response ) {
	$("#video").val("__ROOT__"+response.data);
    $("#showideo").html("<a src='"+response.data+"' >"+response.filename+"</a>");
});


uploader_video.on( 'uploadProgress', function( file, percentage ) {
	var per = percentage*100+"";
	if(per.indexOf(".")==1)
	    per = per.substring(0,1);
	else if(per.indexOf(".")==2) per = per.substring(0,2);
	per = per.substring(0,3);
	
	$("#fileList").html("已经完成:"+per+"%"); 
});



// 文件上传失败，显示上传出错。
uploader_video.on( 'uploadError', function( file ) {
    var $li = $( '#'+file.id ),
        $error = $li.find('div.error');

    // 避免重复创建
    if ( !$error.length ) {
        $error = $('<div class="error"></div>').appendTo( $li );
    }

    $error.text('上传失败');
});

// 完成上传完了，成功或者失败，先删除进度条。
uploader_video.on( 'uploadComplete', function( file ) {
    $( '#'+file.id ).find('.progress').remove();
});

 
</script>
</body>
</html>
