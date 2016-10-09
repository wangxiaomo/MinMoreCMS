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
    <link href="{$config_siteurl}statics/themes/L1_Global/css/service-peoples.css" rel="stylesheet" type="text/css" />
    <script src="{$config_siteurl}statics/js/jquery.js" type="text/javascript"></script>
</head>
<body>
<!-- main-->
<div class="main">
    <!-- head-->
    <div class="head">
        <template file="Content/Mods/top_header.php" />
        <!--nav-->
        <ul class="banner-nav">
            <a href="/"><li>首页</li></a>
            <a href="{:U('Content/Site/police_news')}"><li>警务资讯</li></a>
            <a href="{:U('Content/Site/work_building')}"><li>办事大厅</li></a>
            <a href="{:U('Content/Site/sunshine_police')}"><li>阳光警务</li></a>
            <a href="{:U('Content/Site/police_interaction')}"><li>警民互动</li></a>
            <a href="{:U('Content/Site/service_people')}"><li class="on" style="width:165px;">服务民生</li></a>
        </ul>
    </div>

    <!-- content-->
    <div class="content">
        <div class="child-menu">
            <ul>
                <volist name="children" id="vo">
                    <li><a href="{$vo.url}" class="{$catid==$vo['id']?'menu-on':''}">{$vo.name}</a></li>
                </volist>
            </ul>
        </div>
        <div class="page-point">
            <p>欢迎访问广安市公安局</p>
            <div>当前位置: <a href="{$config_siteurl}">首页</a> &gt; <a href="{:U('Content/Site/service_people')}">服务民生</a></div>
        </div>
        <!-- aside-left-->
        <div class="aside-left">
            <div class="interact-menu">
                <p>服务民生</p>
                <ul>
                    <volist name="children" id="vo">
                        <li><a href="{$vo.url}" class="{$catid==$vo['id']?'menu-on':''}">{$vo.name}</a></li>
                    </volist>
                </ul>
            </div>
        </div>
        <!-- content-right-->
        <div class="content-right-service">
            <div class="fast-service">
                <div class="service-head">
                    <p style="color: #0048b1;">便民服务</p>
                    <p style="color: #ffe503;">让数据多跑步，让群众少跑路</p>
                </div>
                <ul class="service-list">
                  <li>
                    <a href="{:getCategory(38,'url')}">
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
