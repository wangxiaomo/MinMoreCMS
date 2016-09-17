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
<link href="{$config_siteurl}statics/themes/L2_Global/css/service.css" rel="stylesheet" type="text/css" />
<script src="{$config_siteurl}statics/js/jquery.js"></script>
</head>

<body>
<template file="Content/Mods/header.php" />
<div class="content_box"> <div class="content_up">
	<div class="up_left float_left">
    	<div class="left_title">
    		<span>便民专栏</span>
        </div>
        <div class="up_left_cont">
            <div class="fast-service">
                <div class="service-head">
                    <p style="color: #0048b1;">便民服务</p>
                    <p style="color: #ffe503;">让数据多跑步，让群众少跑路</p>
                </div>
                <ul class="service-list">
                  <li>
                    <a href="http://{:C('GLOBAL_SITE_DOMAIN')}{:getCategory(38,'url')}">
                        <img src="{$config_siteurl}statics/themes/L1_Global/images/service1.png" alt="" style="margin-top: 10px"/><br/>
                        <span>开锁信息查询</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                        <img src="{$config_siteurl}statics/themes/L1_Global/images/service3.png" alt="" style="margin-top: 5px"/><br/>
                        <span>便民举措</span>
                    </a>
                  </li>
                  <li>
                    <a href="http://www.ip138.com/">
                        <img src="{$config_siteurl}statics/themes/L1_Global/images/service12.png" alt="" style="margin-top: 5px"/><br/>
                        <span>IP查询</span>
                    </a>
                  </li>
                  <li>
                    <a href="http://www.ctrip.com/">
                        <img src="{$config_siteurl}statics/themes/L1_Global/images/service14.png" alt="" style="margin-top: 5px"/><br/>
                        <span>航班信息</span>
                    </a>
                  </li>
                  <li>
                    <a href="http://www.12306.cn/mormhweb/">
                        <img src="{$config_siteurl}statics/themes/L1_Global/images/service17.png" alt="" style="margin-top: 5px"/><br/>
                        <span>列车时刻</span>
                    </a>
                  </li>
                  <li>
                    <a href="http://tianqi.2345.com/guangan/57415.htm">
                        <img src="{$config_siteurl}statics/themes/L1_Global/images/service11.png" alt="" style="margin-top: 5px"/><br/>
                        <span>天气查询</span>
                    </a>
                  </li>
                  <li>
                    <a href="http://tools.2345.com/rili.htm">
                        <img src="{$config_siteurl}statics/themes/L1_Global/images/service18.png" alt="" style="margin-top: 5px"/><br/>
                        <span>万年历</span>
                    </a>
                  </li>
                  <li>
                    <a href="http://www.ickd.cn/outlets/ems-398.html">
                        <img src="{$config_siteurl}statics/themes/L1_Global/images/service15.png" alt="" style="margin-top: 5px"/><br/>
                        <span>EMS查询</span>
                    </a>
                  </li>
                </ul>                               
            </div>
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
</body>
</html>
