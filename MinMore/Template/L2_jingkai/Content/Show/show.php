<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="favicon.ico" rel="shortcut icon" />
<link rel="canonical" href="{$config_siteurl}" />
<title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
<meta name="description" content="{$SEO['description']}" />
<meta name="keywords" content="{$SEO['keyword']}" />
<link href="{$config_siteurl}statics/themes/L2_经开/css/common.css" rel="stylesheet" type="text/css" />
<link href="{$config_siteurl}statics/themes/L2_经开/css/details.css" rel="stylesheet" type="text/css" />
<script src="{$config_siteurl}statics/js/jquery.js"></script>
</head>

<body>
<template file="Content/Mods/header.php" />
<div class="content_box">
<div class="content_up">
	<div class="up_left float_left">
    	<div class="left_title">
    		<span>{:getCategory($catid, 'catname')}</span>
        </div>
        <div class="up_left_cont">
        	<h3>{$title}</h3>
            <p class="details_time"><span class="float_left">来源：{$copyfrom|default='本站原创'}</span><span class="float_right">发布时间：{$updatetime|strtotime=###|date='Y-m-d',###}</span></p>
            <div class="details_text">
                <if condition="$catid eq 7">
                    <div style="text-align:center">
                        <iframe src="{$description}" allowfullscreen="" class="embed-responsive-item" frameborder="0" height=498 width=510></iframe>
                    </div>
                <else />
                    {$content}
                </if>
                    <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more">分享到：</a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间">QQ空间</a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友">QQ好友</a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信">微信</a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博">新浪微博</a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网">人人网</a><a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网">豆瓣网</a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{"bdSize":16}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
            </div>
        </div>
    </div>
    <div class="up_right float_right">
        <div class="gonggao">
        	<div class="gg_title"><img class="float_left" src="{$config_siteurl}statics/themes/L2_经开/images/title_4.png" /><a class="float_right" href="#">更多</a></div>
            <div class="gg_cont">
            	<ul>
                    <content action="lists" catid="2" order="id DESC" num="3">
                        <volist name="data" id="vo">
                            <li><img src="{$config_siteurl}statics/themes/L2_经开/images/icon/num_1.png" /><a href="#">省内煤市要闻回顾</a></li>
                        </volist>
                    </content>
                </ul>
            </div>
        </div>
        <div class="enter">
            <ul>
                <li><img src="{$config_siteurl}statics/themes/L2_经开/images/enter_1.png" /></li>
                <li><img src="{$config_siteurl}statics/themes/L2_经开/images/enter_2.png" /></li>
                <li><img src="{$config_siteurl}statics/themes/L2_经开/images/enter_3.png" /></li>
                <li><img src="{$config_siteurl}statics/themes/L2_经开/images/enter_4.png" /></li>
                <li><img src="{$config_siteurl}statics/themes/L2_经开/images/enter_5.png" /></li>
                <li><img src="{$config_siteurl}statics/themes/L2_经开/images/enter_6.png" /></li>
                <li style="margin:0;"><img src="{$config_siteurl}statics/themes/L2_经开/images/enter_7.png" /></li>
            </ul>
        </div>
    </div>
</div>
<template file="Content/Mods/footer.php" />
</div>
</body>
</html>