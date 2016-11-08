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
<link href="{$config_siteurl}statics/extres/directormail/css/mailbox.css" rel="stylesheet" type="text/css" />
<script src="{$config_siteurl}statics/js/jquery.js"></script>
</head>

<body>
<template file="Content/Mods/header.php" />
<div class="content-bar">
	<div class="wrapper">
    	<div class="pull-left list-bar mar-t30">
            <div class="content-fd">
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
        </div>
        <template file="Content/Mods/sidebar.php" />
    </div>
    
</div>
<div class="wrapper-2"><img src="{$config_siteurl}statics/themes/L2_Flat/images/con-foot.png" /></div>
<template file="Content/Mods/footer.php" />
<template file="Content/Mods/quick_nav.php" />
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