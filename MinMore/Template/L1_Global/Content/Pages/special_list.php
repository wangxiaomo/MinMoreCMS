<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="chrome=1" />
    <link href="favicon.ico" rel="shortcut icon" />
    <link rel="canonical" href="{$config_siteurl}" />
    <title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
    <meta name="description" content="{$SEO['description']}" />
    <meta name="keywords" content="{$SEO['keyword']}" />
    <link href="{$config_siteurl}statics/themes/L1_Global/css/index.css" rel="stylesheet" type="text/css" />
    <script src="{$config_siteurl}statics/js/jquery.js" type="text/javascript"></script>
    <style>
    .special02_yi{width:155px;height:141px;float:left;margin-left:19px;background-color:#f2faff;border:1px solid #ccc;padding:5px;margin-bottom:15px;overflow: hidden;margin-top:5px;}
    .special02_yi h1{width:155px;height:auto;margin:0px;padding:0px;}
    .special02_yi h2{width:155px;height:auto;font-size: 13px;line-height: 20px;font-weight: normal;color: #000;text-aling:center;margin:0px;padding:7px 0 0 0;text-align:center;}
    .special02_yi a{color:#000;text-decoration: none;}
    </style>
</head>
<body>
<!-- main-->
<div class="main">
    <!-- content-->
    <div class="head">
        <template file="Content/Mods/top_header.php" />
        <!--导航条-->
        <ul class="banner-nav">
            <a href="{$config_siteurl}"><li>首页</li></a>
            <a href="{:U('Content/Site/police_news')}"><li class="{$parent['catid']==1?'on':''}">警务资讯</li></a>
            <a href="{:U('Content/Site/work_building')}"><li>办事大厅</li></a>
            <a href="{:U('Content/Site/sunshine_police')}"><li>阳光警务</li></a>
            <a href="{:U('Content/Site/police_interaction')}"><li class="{$parent['catid']==40?'on':''}">警民互动</li></a>
            <a href="{:U('Content/Site/service_people')}"><li style="width:165px;">服务民生</li></a>
        </ul>
    </div>
    <!-- content-->
    <div class="content" style="min-height:600px;">
        <!-- content-right-->
        <div class="content-right" style="width:930px;margin-left:0px;">
            <volist name="specials" id="v">
                <div class="special02_yi">
                    <h1><a href="{$config_siteurl}index.php?g=special&id={$v.id}" target="_blank" ><img src="{$config_siteurl}{$v.thumb}" width="155" height="91" border="0"/></a></h1>
                    <h2><a href="{$config_siteurl}index.php?g=special&id={$v.id}" target="_blank">{$v.title}</a></h2>
                </div>
            </volist>
        </div>
        <div class="clear"></div>
    </div>
    <template file="Content/Mods/footer.php"/>
    </div>
    <template file="Content/Mods/QR.php"/>
    <template file="Content/Mods/quick_nav.php"/>
    <template file="Content/utils.php"/>
</div>
</body>
</html>
