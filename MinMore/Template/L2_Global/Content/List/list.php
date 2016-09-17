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
        <template file="Content/Mods/right_enter.php" />
    </div>
</div>
<template file="Content/Mods/footer.php" />
</div>
<template file="Content/Mods/quick_nav.php" />
</body>
</html>
