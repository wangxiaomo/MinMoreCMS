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
<link href="{$config_siteurl}statics/themes/L2_Global/css/service.css" rel="stylesheet" type="text/css" />
<script src="{$config_siteurl}statics/js/jquery.js"></script>
</head>

<body>
<template file="Content/Mods/header.php" />
<div class="content-bar">
	<div class="wrapper">
    	<div class="pull-left list-bar mar-t30">
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
