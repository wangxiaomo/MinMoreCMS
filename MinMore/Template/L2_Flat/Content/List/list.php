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
<link href="{$config_siteurl}statics/themes/L2_Flat/css/list.css" rel="stylesheet" type="text/css" />
<link href="{$config_siteurl}statics/themes/L2_Flat/css/common.css" rel="stylesheet" type="text/css" />
<script src="{$config_siteurl}statics/js/jquery.js"></script>
</head>

<body>
<template file="Content/Mods/header.php" />
<div class="content-bar">
	<div class="wrapper">
    	<div class="pull-left list-bar mar-t30">
        	<div class="left-title">
            	<h3><img src="{$config_siteurl}statics/themes/L2_Flat/images/lt-point.png" style="vertical-align:middle" />&nbsp;&nbsp;{:getCategory($catid, 'catname')}</h3>
            </div>
            <content action="lists" catid="$catid" order="id DESC" num="20" page="$page">
            <div class="list-con">
            	<div class="list-floor-box">
                    <volist name="data" id="vo">
                        <div class="list-floor">
                            <div class="list-floor-title"><a href="{$vo.url}">{$vo.title}</a><span>{$vo.updatetime|date_format='Y-m-d',###}</span></div>
                            <p>{$vo.description|str_cut=###,100}</p>
                        </div>
                    </volist>
                </div>
                <div class="page" data-total="{$pagetotal}">
                	<span data-page="{$page-1}">上一页</span>
                    <span data-page="{$page+1}" style="margin-left:15px;">下一页</span>
                    <p style="height:28px;line-height:28px;float:left;padding-left:10px;">共{$pagetotal}页</p>
                </div>
            </div>
            </content>
        </div>
        <template file="Content/Mods/sidebar.php" />
    </div>
    
</div>
<div class="wrapper-2"><img src="{$config_siteurl}statics/themes/L2_Flat/images/con-foot.png" /></div>
<template file="Content/Mods/footer.php" />
<template file="Content/Mods/quick_nav.php" />
<script>
$(function(){
    $(".page span").on("click", function(){
        var page = $(this).data('page'),
            pageTotal = $('.page').data('total');
        if(page < 1 ){
            alert("已经到达第一页!");
        }else if(page > pageTotal){
            alert("已经到达最后一页!");
        }else{
            window.location = "{$config_siteurl}index.php?a=lists&catid={$catid}&page=" + page;
        }
    });
});
</script>
</body>
</html>
