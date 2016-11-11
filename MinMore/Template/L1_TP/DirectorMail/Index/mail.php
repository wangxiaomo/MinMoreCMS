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
    <link href="{$config_siteurl}statics/extres/directormail/css/mailbox.css" rel="stylesheet" type="text/css" />
    <!-- 公共样式 -->
    <link href="{$config_siteurl}statics/themes/L1_TP/css/public.css" type="text/css" rel="stylesheet">
    <!-- 机构职能样式 -->
    <link href="{$config_siteurl}statics/themes/L1_TP/css/function.css" type="text/css" rel="stylesheet">
    <script src="{$config_siteurl}statics/js/jquery.js"></script>
</head>

<body>
<template file="Content/Mods/header.php" />
<div class="main">
  <!-- 机构职能 -->
  <div class="content marginT20">
    <!-- 机构职能左 -->
    <div class="Traffic-leftMid fl">
              <div class="mailbox-list">
                <div class="content-hd">
                  局长信箱－信件查看
                </div>
              </div>
               <br/>
                <table class="result-table">
                  <tr>
                <td class="row-prompt">编号:</td><td class="row-content">C{$data.createtime|date="Ymd",###}{$data.id}</td><td class="row-prompt">来信人:</td><td class="row-content">{$data.name}</td>
                  </tr>
                  <tr>
                <td class="row-prompt">来信时间:</td><td class="row-content">{$data.createtime|date="Y-m-d h:i:s",###}</td><td class="row-prompt">受理单位:</td><td class="row-content">{$data.roleid}</td>
                  </tr>
                  <tr>
                     <td class="row-prompt" colspan=2>办事状态:</td><td class="row-content" colspan=2>{$data.zt}</td>
                  </tr>
                  <tr class="large-table-row">
                <td class="row-prompt">来信主题:</td><td colspan="3">{$data.zhuti}</td>
                  </tr>
                  <tr class="large-table-row">
                <td class="row-prompt">来信内容:</td><td colspan="3">{$data.introduce}</td>
                  </tr>
                </table>
                <p class="download-files">来信附件:<if condition=" $data['upload'] "><a href="{$data.upload}">显示附件</a><else/>&nbsp;没有附件</if></p>
                <table class="result-table">
                  <tr>
                <td class="row-prompt">办理单位:</td><td class="row-content">{$data.roleid}</td><td class="row-prompt">办理时间:</td><td class="row-content"><if condition=" $data['replytime'] eq 0">暂无<else/>{$data.replytime|date="Y-m-d h:i:s",###}</if></td>
                  </tr>
                  <tr class="large-table-row">
                <td class="row-prompt">处理情况:</td><td colspan="3">{$data.reply}</td>
                  </tr>
                </table>
    </div>
    <!-- 机构职能左结束 -->
    <template file="Content/Mods/sidebar.php" />
  </div>
  <!-- 机构职能结束 -->

   
  <template file="Content/Mods/links.php" />
</div>
<template file="Content/Mods/footer.php" />
<script>
    $(function () {
        $(".query-button").on("click", function (e) {
            e.preventDefault();
            window.location = "{:U('DirectorMail/Index/search')}";
        });
    });
</script>
</body>
</html>
