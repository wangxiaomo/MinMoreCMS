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
		    <p>“局长信箱”栏目是公众与我局沟通交流的重要渠道，是我局公众互动工作的组成部分，您的来信我局将按照一定的程序处理，并在一定的时限内向您反馈处理结果。</p>
		    <p>一、受理事项</p>
		    <p>您对我局机关及下属单位工作人员的职务行为反映情况，提出建议、意见，或者不服，可以提出事项。</p>
		    <p>二、不予受理事项</p>
		    <p>1、对依法应当通过诉讼、仲裁、行政复议等法定途径解决的投诉请求，应当按照有关法律、行政法规规定的程序向我局提出。</p>
		    <p>2、如果您是对我局相关职能处室办事过程中的有关法规、政策、程序等作咨询，请直接向本网站的“网上咨询”栏目提交问题。</p>
		    <p>3、其他有关推销、邀请等本栏目管理人员认为不应该受理的事项。</p>
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
</body>
<template file="Content/Mods/footer.php" />
