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
            <a href="{:U('Content/Site/service_people')}"><li>服务民生</li></a>
        </ul>
    </div>
    <!-- content-->
    <div class="content">
        <div class="child-menu">
            <ul>
                <if condition="$parent['catid'] eq 40">
                    <li><a href="{:U('DirectorMail/Index/add')}" class="{$director_mail_page?'menu-on':''}">局长信箱</a></li>
                    <li><a href="{:U('DirectorMail/Consult/add', array('type'=>'qzts'))}" class="{$headicon=='群众投诉'?'menu-on':''}">群众投诉</a></li>
                    <li><a href="{:U('DirectorMail/Consult/add', array('type'=>'wsjb'))}" class="{$headicon=='网上举报'?'menu-on':''}">网上举报</a></li>
                    <li><a href="{:U('DirectorMail/Consult/add', array('type'=>'wszx'))}" class="{$headicon=='网上咨询'?'menu-on':''}">网上咨询</a></li>
                    <li><a href="{:U('Interview/Index/index')}" class="{$headicon=='在线访谈'?'menu-on':''}">在线访谈</a></li>
                    <li><a href="{:U('DirectorMail/Onlinepetition/add')}" class="{$headicon=='网上接访'?'menu-on':''}">网上接访</a></li>
                    <li><a href="{:getCategory(10,'url')}" class="{$catid==10?'menu-on':''}">{:getCategory(10,'catname')}</a></li>
                    <li><a href="{:getCategory(41,'url')}" class="{$catid==41?'menu-on':''}">{:getCategory(41,'catname')}</a></li>
                    <li><a href="http://weibo.com/u/2918589882?nick=%E9%87%91%E7%9B%BE%E5%B9%BF%E5%AE%89&is_hot=1">警方微博</a></li>
                    <li><a href="{:U('DirectorMail/Membermail/add')}" class="{$npc_page?'menu-on':''}">代表委员直通车</a></li>
                <else />
                    <volist name="children" id="vo">
                        <li><a href="{$vo.url}" class="{$catid==$vo['id']?'menu-on':''}">{$vo.name}</a></li>
                    </volist>
                </if>
            </ul>
        </div>
        <div class="page-point">
            <p>欢迎访问广安市公安局</p>
            <div>当前位置: <a href="{$config_siteurl}">首页</a> &gt; <navigate catid="$catid" space=" &gt; " /></div>
        </div>
        <!-- aside-left-->
        <div class="aside-left">
            <div class="interact-menu">
                <p>{$parent.catname}</p>
                <ul>
                <if condition="$parent['catid'] eq 40">
                    <li><a href="{:U('DirectorMail/Index/add')}" class="{$director_mail_page?'menu-on':''}">局长信箱</a></li>
                    <li><a href="{:U('DirectorMail/Consult/add', array('type'=>'qzts'))}" class="{$headicon=='群众投诉'?'menu-on':''}">群众投诉</a></li>
                    <li><a href="{:U('DirectorMail/Consult/add', array('type'=>'wsjb'))}" class="{$headicon=='网上举报'?'menu-on':''}">网上举报</a></li>
                    <li><a href="{:U('DirectorMail/Consult/add', array('type'=>'wszx'))}" class="{$headicon=='网上咨询'?'menu-on':''}">网上咨询</a></li>
                    <li><a href="{:U('Interview/Index/index')}" class="{$headicon=='在线访谈'?'menu-on':''}">在线访谈</a></li>
                    <li><a href="{:U('DirectorMail/Onlinepetition/add')}" class="{$headicon=='网上接访'?'menu-on':''}">网上接访</a></li>
                    <li><a href="{:getCategory(10,'url')}" class="{$catid==10?'menu-on':''}">{:getCategory(10,'catname')}</a></li>
                    <li><a href="{:getCategory(41,'url')}" class="{$catid==41?'menu-on':''}">{:getCategory(41,'catname')}</a></li>
                    <li><a href="http://weibo.com/u/2918589882?nick=%E9%87%91%E7%9B%BE%E5%B9%BF%E5%AE%89&is_hot=1">警方微博</a></li>
                    <li><a href="{:U('DirectorMail/Membermail/add')}" class="{$npc_page?'menu-on':''}">代表委员直通车</a></li>
                <else />
                    <volist name="children" id="vo">
                        <li><a href="{$vo.url}" class="{$catid==$vo['id']?'menu-on':''}">{$vo.name}</a></li>
                    </volist>
                </if>
                </ul>
            </div>
        </div>
        <!-- content-right-->
        <div class="content-right">
            <content action="lists" catid="$catid" order="id DESC" num="20" page="$page">
            <ul class="notice-detail">
                <volist name="data" id="vo">
                    <li>
                        <img src="{$config_siteurl}statics/themes/L1_Global/images/notice-detail.png" alt=""/>
                        <a href="{$vo.url}">{$vo.title|str_cut=###,25}</a>
                        <span>[{$vo.updatetime|date="Y-m-d",###}]</span>
                    </li>
                </volist>
            </ul>
            <div class="pagination">
                {$pages}
            </div>
            </content>
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
