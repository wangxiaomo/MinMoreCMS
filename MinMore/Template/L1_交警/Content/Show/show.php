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
    <link href="{$config_siteurl}statics/themes/common.css" type="text/css" rel="stylesheet">
    <!-- 公共样式 -->
    <link href="{$config_siteurl}statics/themes/L1_TP/css/public.css" type="text/css" rel="stylesheet">
    <!-- 机构职能样式 -->
    <link href="{$config_siteurl}statics/themes/L1_TP/css/function.css" type="text/css" rel="stylesheet">
</head>

<body>
<template file="Content/Mods/header.php" />
<div class="main">
  <!-- 机构职能 -->
  <div class="content marginT20">
    <!-- 机构职能左 -->
    <div class="Traffic-leftMid fl">
       <div class="fs18"></div>
       <div class="function marginT20">
         <div class="fs20 blue text-fm">{$title}</div>
         <div class="fs14 text-fm"> 编辑日期：{$updatetime|date='Y-m-d',###} 来源：本站提供</div>
         <div class="dashed"></div>
         <div class="fs16 line-height30">
            {$content}
         </div>
       </div>
    </div>
    <!-- 机构职能左结束 -->
    <template file="Content/Mods/sidebar.php" />
  </div>
  <!-- 机构职能结束 -->

   
  <template file="Content/Mods/links.php" />
</div>
<template file="Content/Mods/footer.php" />

</body>
</html>
