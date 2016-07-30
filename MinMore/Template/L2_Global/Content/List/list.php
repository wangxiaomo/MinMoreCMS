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
<link href="{$config_siteurl}statics/themes/L2_Global/css/common.css" rel="stylesheet" type="text/css" />
<link href="{$config_siteurl}statics/themes/L2_Global/css/list.css" rel="stylesheet" type="text/css" />
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
                        <a href="{$vo.url}">{$vo.title|str_cut=###,25}</a><span>{$vo.updatetime|date='Y-m-d',###}</span>
                        <p>{$vo.description|str_cut=###,100}</p>
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
        	<div class="gg_title"><img class="float_left" src="{$config_siteurl}statics/themes/L2_Global/images/title_4.png" /><a class="float_right" href="{:getCategory(60, 'url')}">更多</a></div>
            <div class="gg_cont">
            	<ul>
                    <content action="lists" catid="60" order="id DESC" num="3">
                        <volist name="data" id="vo">
                            <li><img src="{$config_siteurl}statics/themes/L2_Global/images/icon/num_{$i}.png" /><a href="{$vo.url}">{$vo.title|str_cut=###,12}</a></li>
                        </volist>
                    </content>
                </ul>
            </div>
        </div>
        <div class="enter">
            <ul>
                <li><a href="{:U('Content/Index/lists', array('catid'=>45))}"><img src="{$config_siteurl}statics/themes/L2_Global/images/enter_1.png" /></a></li>
                <li><a href="http://weibo.com/u/2918589882?nick=%E9%87%91%E7%9B%BE%E5%B9%BF%E5%AE%89&is_hot=1"><img src="{$config_siteurl}statics/themes/L2_Global/images/enter_2.png" /></a></li>
                <li><a href="{:U('DirectorMail/Consult/add@' . C('GLOBAL_SITE_DOMAIN'), array('type'=>'wsjb'))}"><img src="{$config_siteurl}statics/themes/L2_Global/images/enter_3.png" /></a></li>
                <li><a href="{:U('Content/Site/l2_service')}"><img src="{$config_siteurl}statics/themes/L2_Global/images/enter_4.png" /></a></li>
                <li><img src="{$config_siteurl}statics/themes/L2_Global/images/enter_5.png" /></li>
                <li><a href="{:U('DirectorMail/Index/add@' . C('GLOBAL_SITE_DOMAIN'))}"><img src="{$config_siteurl}statics/themes/L2_Global/images/enter_6.png" /></a></li>
            </ul>
        </div>
    </div>
</div>
<template file="Content/Mods/footer.php" />
</div>
</body>
</html>
