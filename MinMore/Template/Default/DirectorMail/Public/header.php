<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>{$title|default='广安公安局'}</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/vendor/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{$model_extresdir}css/mailbox.css"/>
    <script src="{$model_extresdir}js/jquery.min.js"></script>
    <script src="{$config_siteurl}statics/js/utils.js" type="text/javascript"></script>
</head>
<body>
<!-- main-->
<div class="main">
    <!-- content-->
    <div class="content">
        <template file="Content/Mods/top_header.php" />
        <!--导航条-->
        <ul class="banner-nav">
            <a href="/"><li>首页</li></a>
            <a href="{:U('Content/Site/police_news')}"><li>警务资讯</li></a>
            <a href="{:U('Content/Site/work_building')}"><li>办事大厅</li></a>
            <a href="{:U('Content/Site/sunshine_police')}"><li>阳光警务</li></a>
            <a href="{:U('Content/Site/police_interaction')}"><li class="on">警民互动</li></a>
            <a href="{:U('Content/Site/service_people')}"><li>服务民生</li></a>
        </ul>
        <div class="sub-menu">
          <ul>
            <li><a href="{:U('DirectorMail/Index/add')}" class="{$director_mail_page?'menu-on':''}">局长信箱</a></li>
            <li><a href="#" class="disabled-link">群众投诉</a></li>
            <li><a href="#" class="disabled-link">网上举报</a></li>
            <li><a href="{:getCategory(43,'url')}" class="{$catid==43?'menu-on':''}">{:getCategory(43,'catname')}</a></li>
            <li><a href="{:getCategory(42,'url')}" class="{$catid==42?'menu-on':''}">{:getCategory(42,'catname')}</a></li>
            <li><a href="#" class="disabled-link">网上接访</a></li>
            <li><a href="{:getCategory(10,'url')}" class="{$catid==10?'menu-on':''}">{:getCategory(10,'catname')}</a></li>
            <li><a href="{:getCategory(41,'url')}" class="{$catid==41?'menu-on':''}">{:getCategory(41,'catname')}</a></li>
            <li><a href="http://weibo.com/u/2918589882?nick=%E9%87%91%E7%9B%BE%E5%B9%BF%E5%AE%89&is_hot=1">警方微博</a></li>
            <li><a href="{:U('DirectorMail/Membermail/add')}" class="{$npc_page?'menu-on':''}">代表委员直通车</a></li>
          </ul>
        </div>
        <div class="crumb">
          <span>欢迎访问广安市公安局</span>
          <div class="crumb-detail">当前位置：首页&gt;警民互动&gt;{$headicon}</div>
        </div>
        <div class="content-wrapper">
          <div class="sidebar">
            <div class="sidebar-menu">
              <img src="{$model_extresdir}images/sidebar-top.png" />
              <div>
                <ul>
                    <li><a href="{:U('DirectorMail/Index/add')}" class="{$director_mail_page?'menu-on':''}">局长信箱</a></li>
                    <li><a href="#" class="disabled-link">群众投诉</a></li>
                    <li><a href="#" class="disabled-link">网上举报</a></li>
                    <li><a href="{:getCategory(43,'url')}" class="{$catid==43?'menu-on':''}">{:getCategory(43,'catname')}</a></li>
                    <li><a href="{:getCategory(42,'url')}" class="{$catid==42?'menu-on':''}">{:getCategory(42,'catname')}</a></li>
                    <li><a href="#" class="disabled-link">网上接访</a></li>
                    <li><a href="{:getCategory(10,'url')}" class="{$catid==10?'menu-on':''}">{:getCategory(10,'catname')}</a></li>
                    <li><a href="{:getCategory(41,'url')}" class="{$catid==41?'menu-on':''}">{:getCategory(41,'catname')}</a></li>
                    <li><a href="http://weibo.com/u/2918589882?nick=%E9%87%91%E7%9B%BE%E5%B9%BF%E5%AE%89&is_hot=1">警方微博</a></li>
                    <li><a href="{:U('DirectorMail/Membermail/add')}" class="{$npc_page?'menu-on':''}">代表委员直通车</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="content-box">
