<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="chrome=1" />
    <link href="favicon.ico" rel="shortcut icon" />
    <link rel="canonical" href="{$config_siteurl}" />
    <title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>专题列表</title>
    <meta name="description" content="{$SEO['description']}" />
    <meta name="keywords" content="{$SEO['keyword']}" />
    <link href="{$config_siteurl}statics/themes/common.css" type="text/css" rel="stylesheet">
    <!-- 公共样式 -->
    <link href="{$config_siteurl}statics/themes/L1_TP/css/public.css" type="text/css" rel="stylesheet">
    <!-- 机构职能样式 -->
    <link href="{$config_siteurl}statics/themes/L1_TP/css/function.css" type="text/css" rel="stylesheet">
    <style>
    .special02_yi{width:155px;height:141px;float:left;margin-left:19px;background-color:#f2faff;border:1px solid #ccc;padding:5px;margin-bottom:15px;overflow: hidden;margin-top:5px;}
    .special02_yi h1{width:155px;height:auto;margin:0px;padding:0px;}
    .special02_yi h2{width:155px;height:auto;font-size: 13px;line-height: 20px;font-weight: normal;color: #000;text-aling:center;margin:0px;padding:7px 0 0 0;text-align:center;}
    .special02_yi a{color:#000;text-decoration: none;}
    </style>
</head>

<body>
<template file="Content/Mods/header.php" />
<div class="main">
  <!-- 机构职能 -->
  <div class="content marginT20" style="min-height:450px;">
        <!-- content-right-->
        <div class="content-right" style="width:930px;margin-left:0px;">
            <volist name="specials" id="v">
                <div class="special02_yi">
                    <h1><a href="{$config_siteurl}index.php?g=special&id={$v.id}" target="_blank" ><img src="{$v.thumb}" width="155" height="91" border="0"/></a></h1>
                    <h2><a href="{$config_siteurl}index.php?g=special&id={$v.id}" target="_blank">{$v.title}</a></h2>
                </div>
            </volist>
        </div>
        <div class="clear"></div>
  </div>
  <!-- 机构职能结束 -->

   
  <template file="Content/Mods/links.php" />
</div>
<template file="Content/Mods/footer.php" />

</body>
</html>
