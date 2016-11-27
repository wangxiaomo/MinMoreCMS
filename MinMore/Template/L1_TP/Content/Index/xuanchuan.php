<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="chrome=1" />
    <link href="favicon.ico" rel="shortcut icon" />
    <link rel="canonical" href="{$config_siteurl}" />
    <title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>安全宣传</title>
    <meta name="description" content="{$SEO['description']}" />
    <meta name="keywords" content="{$SEO['keyword']}" />
    <!-- 公共样式 -->
    <link href="{$config_siteurl}statics/themes/L1_TP/css/public.css" type="text/css" rel="stylesheet">
    <!-- 安全宣传样式 -->
    <link href="{$config_siteurl}statics/themes/L1_TP/css/publicity.css" type="text/css" rel="stylesheet">
</head>

<body>
<template file="Content/Mods/header.php" />
<div class="main">
  <!-- 第一栏 --> 
  <div class="content marginT20">
    <div class="Traffic-leftTop">
        <div id="banner_tabs" class="flexslider">
        <position action="position" posid="2" num="6">
	    <ul class="slides">
          <volist name="data" id="vo">
              <li class="slidesList"><a href="{$vo.data.url}"><img src="{$vo.data.thumb}" /></a></li>
          </volist>
	    </ul>
	    <ol id="bannerCtrl" class="SmallPic flex-control-nav flex-control-paging" >
          <volist name="data" id="vo">
            <li class="{$i==1?'active':''}"><a><img src="{$vo.data.thumb}" /></a></li>
          </volist>
	    </ol>
        </position>
        <div class="SmallPicBG"></div>
        </div>
<script src="{$config_siteurl}statics/js/jquery.js"></script>
<script src="{$config_siteurl}statics/themes/L1_TP/js/slider.js"></script>
<script type="text/javascript">
$(function() {
	var bannerSlider = new Slider($('#banner_tabs'), {
		time: 5000,
		delay: 400,
		event: 'click',
		auto: true,
		mode: 'fade',
		controller: $('#bannerCtrl'),
		activeControllerCls:'active'
	});
	$('#banner_tabs .flex-prev').click(function() {
		bannerSlider.prev()
	});
	$('#banner_tabs .flex-next').click(function() {
		bannerSlider.next()
	});
})
</script>
      
    </div>
    <div class="Traffic-rightTop">
      <div class="fs20 blue"><span class="fr"><a href="{:getCategory(88,'url')}">更多</a></span>最新通告</div>
      <content action="lists" catid="88" order="id DESC" num="5">
        <volist name="data" id="vo" offset="0" length="1">
          <a href="{$vo.url}">
              <div class="fs18 red">{$vo.title|str_cut=###,20}</div>
              <div class="fs14 gray line-height30">{$vo.description|str_cut=###,90}<span style="float:right;font-weight:bold;">[详细内容]</span></div>
          </a>
        </volist>
      <div class="dashed"></div>
      <ul class="NewList line-height35">
        <volist name="data" id="vo" offset="1" length="4">
            <a href="{$vo.url}"><li><span class="fs14 fr">{$vo.updatetime|date='Y-m-d',###}</span><i><img src="{$config_siteurl}statics/themes/L1_TP/images/yuan.png"></i>{$vo.title|str_cut=###,20}</li></a>
        </volist>
      </ul>
      </content>
    </div>
  </div>
  <!-- 第一栏结束 -->
  
  <!-- 第二栏 -->
  <div class="content marginT20">
    <!-- 第二栏左 -->
    <div class="Traffic-leftMid fl">
       <!-- 交管要闻 -->
       <div class="AllNews fl">
         <div class="Title"><samp class="More fs14 fr marginR20"><a href="{:getCategory(84,'url')}">查看更多</a></samp><span class="fs18 yellow">政策</span>法规</div>
         <div class="padding10 border">
         <ul class="NewList line-height35">
          <content action="lists" catid="84" order="id DESC" num="10">
            <volist name="data" id="vo">
               <a href="{$vo.url}"><li><span class="fs14 fr">{$vo.updatetime|date='Y-m-d',###}</span><i><img src="{$config_siteurl}statics/themes/L1_TP/images/yuan.png"></i>{$vo.title|str_cut=###,15}</li></a>
            </volist>
          </content>
         </ul>
         </div>
       </div>
       <!-- 交管要闻结束 -->
       
       <!-- 交管动态 -->
       <div class="AllNews fr">
         <div class="Title"><samp class="More fs14 fr marginR20"><a href="{:getCategory(85,'url')}">查看更多</a></samp><span class="fs18 yellow">交警</span>提示</div>
         <div class="padding10 border">
         <ul class="NewList line-height35">
          <content action="lists" catid="85" order="id DESC" num="10">
            <volist name="data" id="vo">
               <a href="{$vo.url}"><li><span class="fs14 fr">{$vo.updatetime|date='Y-m-d',###}</span><i><img src="{$config_siteurl}statics/themes/L1_TP/images/yuan.png"></i>{$vo.title|str_cut=###,15}</li></a>
            </volist>
          </content>
         </ul>
         </div>
       </div>
       <!-- 交管动态结束 -->
    </div>
    <!-- 第二栏左结束 -->
    
    <!-- 第二栏右 -->
    <div class="Traffic-rightMid fr">
       <ul class="TrafficBut">
         <a href="{:getCategory(76,'url')}"><li><i><img src="{$config_siteurl}statics/themes/L1_TP/images/GA21.png"></i>政务信息公开</li></a>
         <a href="{:getCategory(77,'url')}"><li class="marginT20"><i><img src="{$config_siteurl}statics/themes/L1_TP/images/GA22.png"></i>交通管理公告</li></a>
         <a href="{:getCategory(78,'url')}"><li class="marginT20"><i><img src="{$config_siteurl}statics/themes/L1_TP/images/GA23.png"></i>机动车管理公告</li></a>
         <a href="{:getCategory(79,'url')}"><li class="marginT20"><i><img src="{$config_siteurl}statics/themes/L1_TP/images/GA24.png"></i>驾驶人管理公告</li></a>
         <a href="{:getCategory(80,'url')}"><li class="marginT20"><i><img src="{$config_siteurl}statics/themes/L1_TP/images/GA25.png"></i>交通管理公告</li></a>
       </ul>
    </div>
    <!-- 第二栏右结束 -->
  </div>
  <!-- 第二栏结束 -->
  
  <!-- 宣传视频 -->  
  <div class="content marginT20">
     <div class="Title"><samp class="More fs14 fr marginR20"><a href="{:getCategory(81,'url')}">查看更多</a></samp><span class="fs18 yellow">宣传</span>视频</div>
     <div class="Traffic">
       <ul>
          <content action="lists" catid="81" order="id DESC" num="5">
            <volist name="data" id="vo">
                 <a href="{$vo.url}"><li><img src="{$vo.thumb}"><p>{$vo.title|str_cut=###,10}</p></li></a>
            </volist>
          </content>
       </ul>
     </div>
  </div>
  <!-- 宣传视频结束 --> 
  
  
  <!-- 交警风采 -->  
  <div class="content marginT20">
     <div class="Title"><samp class="More fs14 fr marginR20"><a href="{:getCategory(83,'url')}">查看更多</a></samp><span class="fs18 yellow">交警</span>风采</div>
     <div class="Traffic">
       <ul>
          <content action="lists" catid="83" order="id DESC" num="5">
            <volist name="data" id="vo">
                 <a href="{$vo.url}"><li><img src="{$vo.thumb}"><p>{$vo.title|str_cut=###,10}</p></li></a>
            </volist>
          </content>
       </ul>
     </div>
  </div>
  <!-- 交警风采结束 --> 
  <template file="Content/Mods/links.php" />
</div>
<template file="Content/Mods/footer.php" />
</body>
</html>
