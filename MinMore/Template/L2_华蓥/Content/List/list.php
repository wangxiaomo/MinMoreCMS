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
<link href="{$config_siteurl}statics/themes/L2_华蓥/css/common.css" rel="stylesheet" type="text/css" />
<link href="{$config_siteurl}statics/themes/L2_华蓥/css/list.css" rel="stylesheet" type="text/css" />
<script src="{$config_siteurl}statics/js/jquery.js"></script>
</head>

<body>
<template file="Content/Mods/header.php" />
<div class="content_box"> <div class="content_up">
	<div class="up_left float_left">
    	<div class="left_title">
    		<span>{:getCategory($catid, 'catname')}</span>
        </div>
        <div class="up_left_cont">
            <content action="lists" catid="$catid" order="id DESC" num="20" page="$page">
                <volist name="data" id="vo">
                    <div class="left_cont_list">
                        <a href="{$vo.url}">{$vo.title}</a><span>{$vo.updatetime|date='Y-m-d',###}</span>
                        <p>{$vo.description|str_cut=###,50}</p>
                    </div>
                </volist>
                <div class="left_cont_page">
                    {$pages}
                </div>
            </content>
        </div>
    </div>
    <div class="up_right float_right">
        <div class="gonggao">
        	<div class="gg_title"><img class="float_left" src="{$config_siteurl}statics/themes/L2_华蓥/images/title_4.png" /><a class="float_right" href="#">更多</a></div>
            <div class="gg_cont">
            	<ul>
                    <content action="lists" catid="2" order="id DESC" num="3">
                        <volist name="data" id="vo">
                            <li><img src="{$config_siteurl}statics/themes/L2_华蓥/images/icon/num_1.png" /><a href="#">省内煤市要闻回顾</a></li>
                        </volist>
                    </content>
                </ul>
            </div>
        </div>
        <div class="enter">
            <ul>
                <li><img src="{$config_siteurl}statics/themes/L2_华蓥/images/enter_1.png" /></li>
                <li><img src="{$config_siteurl}statics/themes/L2_华蓥/images/enter_2.png" /></li>
                <li><img src="{$config_siteurl}statics/themes/L2_华蓥/images/enter_3.png" /></li>
                <li><img src="{$config_siteurl}statics/themes/L2_华蓥/images/enter_4.png" /></li>
                <li><img src="{$config_siteurl}statics/themes/L2_华蓥/images/enter_5.png" /></li>
                <li><img src="{$config_siteurl}statics/themes/L2_华蓥/images/enter_6.png" /></li>
                <li style="margin:0;"><img src="{$config_siteurl}statics/themes/L2_华蓥/images/enter_7.png" /></li>
            </ul>
        </div>
    </div>
</div>
<template file="Content/Mods/footer.php" />
</div>
</body>
</html>
