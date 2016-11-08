<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>{$title|default='广安公安局'}</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/vendor/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{$model_extresdir}css/mailbox.css"/>
    <script src="{$model_extresdir}js/jquery.min.js"></script>
    <script src="{$config_siteurl}statics/js/utils2.js" type="text/javascript"></script>
</head>
<body>
<!-- main-->
<div class="main">
    <div class="head">
        <template file="Content/Mods/top_header.php" />
    </div>
    <!-- content-->
    <div class="content">
        <!--导航条-->
        <ul class="banner-nav">
            <a href="/"><li>首页</li></a>
            <a href="{:U('Content/Site/police_news')}"><li>警务资讯</li></a>
            <a href="{:U('Content/Site/work_building')}"><li>办事大厅</li></a>
            <a href="{:U('Content/Site/sunshine_police')}"><li>阳光警务</li></a>
            <a href="{:U('Content/Site/police_interaction')}"><li class="on">警民互动</li></a>
            <a href="{:U('Content/Site/service_people')}"><li style="width:165px;">服务民生</li></a>
        </ul>
        <div class="sub-menu">
          <ul>
            <li><a href="{:U('DirectorMail/Index/add')}" class="{$director_mail_page?'menu-on':''}">局长信箱</a></li>
            <li><a href="{:U('DirectorMail/Consult/add', array('type'=>'jyxc'))}" class="{$headicon=='建言献策'?'menu-on':''}">建言献策</a></li>
            <li><a href="{:U('DirectorMail/Consult/add', array('type'=>'qzts'))}" class="{$headicon=='群众投诉'?'menu-on':''}">群众投诉</a></li>
            <li><a href="{:U('DirectorMail/Consult/add', array('type'=>'wsjb'))}" class="{$headicon=='网上举报'?'menu-on':''}">网上举报</a></li>
            <li><a href="{:U('DirectorMail/Consult/add', array('type'=>'wszx'))}" class="{$headicon=='网上咨询'?'menu-on':''}">网上咨询</a></li>
            <li><a href="{:U('Interview/Index/index')}" class="{$headicon=='在线访谈'?'menu-on':''}">在线访谈</a></li>
            <li><a href="{:U('DirectorMail/Onlinepetition/add')}" class="{$headicon=='网上接访'?'menu-on':''}">网上接访</a></li>
            <li><a href="{:getCategory(10,'url')}" class="{$catid==10?'menu-on':''}">{:getCategory(10,'catname')}</a></li>
            <li><a href="{:getCategory(41,'url')}" class="{$catid==41?'menu-on':''}">{:getCategory(41,'catname')}</a></li>
            <li><a href="http://weibo.com/u/2918589882?nick=%E9%87%91%E7%9B%BE%E5%B9%BF%E5%AE%89&is_hot=1">警方微博</a></li>
            <li><a href="{:U('DirectorMail/Membermail/login')}" class="{$npc_page?'menu-on':''}">代表委员直通车</a></li>
          </ul>
        </div>
        <div class="page-point">
            <p>欢迎访问广安市公安局</p>
            <div>
                当前位置:
                <a href="/">首页</a>
                &gt;
                <a href="#">警民互动</a>
                &gt;
                <a href="#">{$headicon}</a>
            </div>
        </div>
        <div class="content-wrapper">
          <div class="sidebar">
            <div class="sidebar-menu">
              <img src="{$model_extresdir}images/sidebar-top.png" />
              <div style="margin-top:-2px;">
                <ul>
                    <li><a href="{:U('DirectorMail/Index/add')}" class="{$director_mail_page?'menu-on':''}">局长信箱</a></li>
                    <li><a href="{:U('DirectorMail/Consult/add', array('type'=>'jyxc'))}" class="{$headicon=='建言献策'?'menu-on':''}">建言献策</a></li>
                    <li><a href="{:U('DirectorMail/Consult/add', array('type'=>'qzts'))}" class="{$headicon=='群众投诉'?'menu-on':''}">群众投诉</a></li>
                    <li><a href="{:U('DirectorMail/Consult/add', array('type'=>'wsjb'))}" class="{$headicon=='网上举报'?'menu-on':''}">网上举报</a></li>
                    <li><a href="{:U('DirectorMail/Consult/add', array('type'=>'wszx'))}" class="{$headicon=='网上咨询'?'menu-on':''}">网上咨询</a></li>
                    <li><a href="{:U('Interview/Index/index')}" class="{$headicon=='在线访谈'?'menu-on':''}">在线访谈</a></li>
                    <li><a href="{:U('DirectorMail/Onlinepetition/add')}" class="{$headicon=='网上接访'?'menu-on':''}">网上接访</a></li>
                    <li><a href="{:getCategory(10,'url')}" class="{$catid==10?'menu-on':''}">{:getCategory(10,'catname')}</a></li>
                    <li><a href="{:getCategory(41,'url')}" class="{$catid==41?'menu-on':''}">{:getCategory(41,'catname')}</a></li>
                    <li><a href="http://weibo.com/u/2918589882?nick=%E9%87%91%E7%9B%BE%E5%B9%BF%E5%AE%89&is_hot=1">警方微博</a></li>
                    <li><a href="{:U('DirectorMail/Membermail/login')}" class="{$npc_page?'menu-on':''}">代表委员直通车</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="content-box">
