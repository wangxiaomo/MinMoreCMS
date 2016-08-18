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
        <link href="{$config_siteurl}statics/extres/directormail/css/mailbox.css" rel="stylesheet" type="text/css" />
        <script src="{$config_siteurl}statics/js/jquery.js"></script>
    </head>
    <body>
        <template file="Content/Mods/header.php" />
        <div class="content_box">
            <div class="content_up">
                <div class="up_left float_left">
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
                            <li><a href="{:U('DirectorMail/Index/add')}"><img src="{$config_siteurl}statics/themes/L2_Global/images/enter_6.png" /></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $(".query-button").on("click", function (e) {
                e.preventDefault();
                window.location = "{:U('DirectorMail/Index/search')}";
            });
        });
    </script>
<template file="Content/Mods/footer.php" />
<template file="Content/Mods/quick_nav.php" />
</body>
