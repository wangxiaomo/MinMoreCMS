<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="chrome=1" />
    <link href="favicon.ico" rel="shortcut icon" />
    <link rel="canonical" href="{$config_siteurl}" />
    <title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
    <meta name="description" content="{$SEO['description']}" />
    <meta name="keywords" content="{$SEO['keyword']}" />
    <!-- 公共样式 -->
    <link href="{$config_siteurl}statics/themes/L1_TP/css/public.css" type="text/css" rel="stylesheet">
    <!-- 公告列表样式 -->
    <link href="{$config_siteurl}statics/themes/L1_TP/css/mentlist.css" type="text/css" rel="stylesheet">
</head>

<body>
<template file="Content/Mods/header.php" />
<div class="main">
 
  <!-- 公告列表 -->
  <div class="content marginT20">
    <!-- 公告列表左 -->
    <div class="Traffic-leftMid fl">
        <p style="font-size:15px;font-weight:bold;padding:0px 0px 15px;">您所在的位置 广安交警网 &gt; {$catname} </p>
        <content action="lists" catid="$catid" order="id DESC" num="20" page="$page">
       <div class="mentlist">
         <ul class="marginT10">
           <volist name="data" id="vo">
           <a href="{$vo.url}" class="no-hover">
           <li style="border-bottom:1px dotted #777">
             <div class="fs18 blue marginb10">{$vo.title}</div>
             <div class="fs14 marginb10">编辑日期：{$vo.updatetime|date='Y-m-d',###}<span class="marginR20"> 来源：本站提供</span></div>
             <div class="fs14 line-height25">{$vo.description|str_cut=###,200}</div>
           </li>
           </a>
           </volist>
         </ul>
         <div class="pag">
           {$pages}
         </div>
         </content>
       </div>
    </div>
    <!-- 公告列表左结束 -->
    <template file="Content/Mods/sidebar.php" />
  </div>
  <!-- 公告列表结束 -->
  

   
  <template file="Content/Mods/links.php" />
</div>
<template file="Content/Mods/footer.php" />
</body>
</html>
