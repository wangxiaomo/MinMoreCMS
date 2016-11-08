<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<!DOCTYPE HTML>
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
    <meta name="keywords" content="{$SEO['keyword']}" />
    <meta name="description" content="{$SEO['description']}" />
    <link href="{$config_siteurl}statics/special/pgpj/css/special.css" rel="stylesheet" type="text/css" />
    <link href="{$config_siteurl}statics/special/pgpj/css/slide.css" rel="stylesheet" type="text/css" /><!--轮播图-->
    <script type="text/javascript" src="{$config_siteurl}statics/special/pgpj/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/special/pgpj/js/jquery.SuperSlide.2.1.1.js"></script><!--轮播图-->
</head>

<body>
<!--banner头部开始-->
<div class="special">
	<div class="special_left">
    	<div class="special_right">
        	<div class="special_tite"></div>
        </div>
    </div>
</div>
<!--banner头部结束-->

<!--导航开始-->
<div class="Nav">
	<div class="Nav_center">
    	<ul>
        	<li><a href="{$config_siteurl}index.php?g=special&a=index&id=6" class="Selected">网站首页</a></li>
            <li><a href="{$config_siteurl}index.php?g=special&a=type&typeid=7">领导讲话</a></li>
            <li><a href="{$config_siteurl}index.php?g=special&a=type&typeid=8">工作快讯</a></li>
            <li><a href="{$config_siteurl}index.php?g=special&a=type&typeid=9">工作简讯</a></li>
            <li><a href="{$config_siteurl}index.php?g=special&a=type&typeid=10">警务公开</a></li>
            <li><a href="{$config_siteurl}index.php?g=special&a=type&typeid=11">重要文件</a></li>
            <li><a href="{$config_siteurl}index.php?g=special&a=type&typeid=12">战果通报</a></li>
            <li><a href="{$config_siteurl}index.php?g=special&a=type&typeid=13">图片新闻</a></li>
        </ul>
    </div>
</div>
<!--导航结束-->

<!--外框开始-->
<div class="special_main">
	<div class="special_main_center">
    	<!--左边开始-->
        <div class="list_left">
        	<!--位置开始-->
            <div class="list_top">您所在的位置 > <a href="{$config_siteurl}">{$Config.sitename}</a> &gt; {$name}</div>
            <!--位置结束-->
            
            <!--内容开始-->
            <div class="list_list">
            <spf mo="Special" action="content_list" specialid="$specialid"  typeid="$typeid" pagefun='specialpage' page="$page" num="6">
            	<!--1开始-->
                <volist name="data" id="vo">
                <div class="list_nav">
                	<!--标题开始-->
                    <div class="list_nav_tites"><a href="{$vo.url}" target="_blank" title="{$vo.title}">{$vo.title}</a></div>
                    <!--标题结束-->

                    <div class="list_nav_zi1">
                        <div class="list_rq">编辑日期：<span class="colr_h">{$vo.updatetime|date="Y-m-d",###}</span></div>
                            <div class="list_ly">来源：<span class="colr_h">本站提供</span></div>
                            <!--<div class="list_rs"><span class="colr_sise">访问人数：880</span></div>-->
                    </div>

                    <!--内容开始-->
                    <div class="list_nav_coner">
                    	<!--图片开始-->
                        <if condition="!empty($vo['thumb'])"> 
                            <div class="list_nav_tu">
                            	<a href="{$vo.url}" target="_blank">
                                    <img src="{$vo.thumb}" width="160" height="102" />
                                </a> 
                            </div>
                        </if>
                        <!--图片结束-->
                        <!--文字开始-->
                        <div class="list_nav_zi">
                            <div class="list_nav_zi2">{$vo.description|str_cut=###,120}...</div>
                        </div>
                        <!--文字结束-->
                    </div>
                    <!--内容结束-->
                </div>
                </volist>
                <!--1结束-->

                <!--翻页开始-->
                <div class="Flip">{$pages}</div>
                <!--翻页结束-->
                </spf>
            </div>
            <!--内容结束-->
        </div>
        <!--左边结束-->

        <!--右边开始-->
        <div class="list_right">
        	<!--最新要闻开始-->
        	<div class="list_right1">
                <!--头部开始-->
                <div class="list_right_top">
                    <h1>推荐新闻</h1>
                </div>
                <!--头部结束-->
                <!--列表开始-->
                <div class="list_right_xia">
                    <!--1开始-->
                    <spf mo="Special" action="content_list" specialid="$specialid"  typeid="$typeid" page="$page" num="8">
                        <volist name="data" id="vo" key="k">
                            <div class="list_right_xia1">
                                <if condition="$k lt 4">
                                    <h1 class="bjys1">{$k}</h1>
                                    <h2><a href="{$vo.url}">{$vo.title|str_cut=###,14}...</a></h2>
                                <else />
                                    <h1 class="bjys2">{$k}</h1>
                                    <h2><a href="{$vo.url}">{$vo.title|str_cut=###,14}...</a></h2>
                                </if>
                            </div>
                        </volist>
                    </spf>
                    <!--1结束-->
                </div>
                <!--列表结束-->
            </div>
            <!--最新要闻结束-->
        </div>
        <!--右边结束-->
    </div>
</div> 
<!--外框结束-->   

<!--底部开始-->
<div class="special_foot">
    <div class="special_foot1">
        <h1><img src="{$config_siteurl}statics/special/pgpj/images/specia10.png" width="86" height="104" /></h1>
        <h2>
            Copyright 2014 Guangan Police Security Bureau, All rights Reserve
            <br />版权所有：广安市公安局&nbsp;&nbsp;&nbsp;&nbsp;今日访问量：0001222&nbsp;&nbsp;&nbsp;&nbsp;总访问量：0001222<br />   蜀ICP备12001441号-1   技术支持： 四川速集实业集团有限公司   028-85480208
        </h2>
  </div>
</div>
<!--底部结束-->
</body>
</html>
