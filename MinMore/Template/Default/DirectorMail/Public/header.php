<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>{$title|default='广安公安局'}</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/vendor/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{$model_extresdir}css/mailbox.css"/>
    <script src="{$model_extresdir}js/jquery.min.js"></script>
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
            <a href="{:U('DirectorMail/Index/index')}"><li class="on">警民互动</li></a>
            <a href="{:getCategory(16,'url')}"><li>服务民生</li></a>
            <i class="square-icon"></i>
        </ul>
        <div class="sub-menu">
          <ul>
            <a href="{:U('DirectorMail/Index/index')}"><li>局长信箱</li></a>
            <li>我要投诉</li>
            <li>举报台</li>
            <li>在线咨询</li>
            <li>在线访谈</li>
            <li>网上接访</li>
            <li>民意征集</li>
            <li>在线调查</li>
            <li>专门监督</li>
            <li>警方微博</li>
            <a href="{:U('DirectorMail/Membermail/info')}"><li>代表委员直通车</li></a>
          </ul>
        </div>
        <div class="crumb">
          <span>欢迎访问广安市公安局</span>
          <div class="crumb-detail">当前位置：首页&gt;警民互动&gt;局长信箱</div>
        </div>
        <div class="content-wrapper">
          <div class="sidebar">
            <div class="sidebar-menu">
              <img src="{$model_extresdir}images/sidebar-top.png" />
              <div>
                <ul>
                  <a href="{:U('DirectorMail/Index/index')}"><li class="{$director_mail_page?'on':''}"><img src="{$model_extresdir}images/sidebar-li.png" />局长信箱</li></a>
                  <li><img src="{$model_extresdir}images/sidebar-li.png" />我要投诉</li>
                  <li><img src="{$model_extresdir}images/sidebar-li.png" />举报台</li>
                  <li><img src="{$model_extresdir}images/sidebar-li.png" />在线咨询</li>
                  <li><img src="{$model_extresdir}images/sidebar-li.png" />网上接访</li>
                  <li><img src="{$model_extresdir}images/sidebar-li.png" />在线访谈</li>
                  <li><img src="{$model_extresdir}images/sidebar-li.png" />民意征集</li>
                  <li><img src="{$model_extresdir}images/sidebar-li.png" />在线调查</li>
                  <li><img src="{$model_extresdir}images/sidebar-li.png" />专门监督</li>
                  <li><img src="{$model_extresdir}images/sidebar-li.png" />警方微博</li>
                  <a href="{:U('DirectorMail/Membermail/info')}"><li class="{$npc_page?'on':''}"><img src="{$model_extresdir}images/sidebar-li.png" />代表委员直通车</li></a>
                </ul>
              </div>
            </div>
          </div>
          <div class="content-box">
