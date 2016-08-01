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
<link href="{$config_siteurl}statics/themes/L2_Global/css/index.css" rel="stylesheet" type="text/css" />
<script src="{$config_siteurl}statics/js/jquery.js"></script>
<script src="{$config_siteurl}statics/js/jquery.luara.0.0.1.min.js"></script>
<script>
window.onload = function (){
	  $(function(){
		  $(".example1").luara({width:"320",height:"200",interval:3000,selected:"seleted",deriction:"top"});

	  });
};
</script>
            
</head>

<body>
<template file="Content/Mods/header.php" />
<div class="content_box">
<div class="content_up">
	<div class="dongtai float_left">
    	<div class="left_title">
    		<img src="{$config_siteurl}statics/themes/L2_Global/images/title_1.png" />
        </div>
        <div class="dt_cont">
        	<div class="cont_part float_left">
            	<div class="part_title"><p>热点新闻 </p></div>
                <div class="part_img">
                  <position action="position" posid="1" num="4">
                  <div class="example1">
                      <ul>
                          <volist name="data" id="vo">
                              <a href="{$vo.data.url}"><li><img src="{$vo.data.thumb}" /></li></a>
                          </volist>
                      </ul>
                      <ol>
                        <volist name="data" id="vo">
                            <li>{$i}</li>
                        </volist>
                      </ol>
                  </div>
                  </position>
              </div>
            </div>
             
            <div class="cont_part float_right">
            	<div class="part_title"><p>{:getCategory(54, 'catname')} </p><a href="{:getCategory(54, 'url')}">更多</a></div>
                <div class="part_list">
                	<ul>
                        <content action="lists" catid="54" order="id DESC" num="8">
                            <volist name="data" id="vo">
                                <li><img src="{$config_siteurl}statics/themes/L2_Global/images/point.png" /><a href="{$vo.url}">{$vo.title|str_cut=###,18}</a></li>
                            </volist>
                        </content>
                    </ul>
                </div>
            </div>
            <div class="cont_part float_left">
            	<div class="part_title"><p>{:getCategory(55, 'catname')} </p><a href="{:getCategory(55, 'url')}">更多</a></div>
                <div class="part_list">
                	<ul>
                        <content action="lists" catid="55" order="id DESC" num="8">
                            <volist name="data" id="vo">
                                <li><img src="{$config_siteurl}statics/themes/L2_Global/images/point.png" /><a href="{$vo.url}">{$vo.title|str_cut=###,18}</a></li>
                            </volist>
                        </content>
                    </ul>
                </div>
            </div>
            <div class="cont_part float_right">
            	<div class="part_title"><p>{:getCategory(56, 'catname')} </p><a href="{:getCategory(56, 'url')}">更多</a></div>
                <div class="part_list">
                	<ul>
                        <content action="lists" catid="56" order="id DESC" num="8">
                            <volist name="data" id="vo">
                                <li><img src="{$config_siteurl}statics/themes/L2_Global/images/point.png" /><a href="{$vo.url}">{$vo.title|str_cut=###,18}</a></li>
                            </volist>
                        </content>
                    </ul>
                </div>
            </div>   
        </div>
    </div>
    <div class="up_right float_right">
    	<div class="wap">
    		<img class="float_left" src="{$config_siteurl}statics/themes/L2_Global/images/icon/map.png" />
            <img class="float_right" src="{$config_siteurl}statics/themes/L2_Global/images/icon/arr.png" />
            <a href="{:U('Content/Site/map@' . C('GLOBAL_SITE_DOMAIN'))}"><span class="float_right">电子地图</span></a>
        </div>
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
<div class="banner"><img src="{$config_siteurl}statics/themes/L2_Global/images/banner.png" /></div>
<div class="content_down">
	<div class="down_left float_left">
        <div class="hall">
            <div class="left_title">
                <img src="{$config_siteurl}statics/themes/L2_Global/images/title_2.png" />
            </div>
            <div class="hall_cont">
                    <a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=11"><img src="{$config_siteurl}statics/themes/L2_Global/images/img/hall_1.png" /></a>
                    <a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=14"><img src="{$config_siteurl}statics/themes/L2_Global/images/img/hall_2.png" /></a>
                    <a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=15"><img src="{$config_siteurl}statics/themes/L2_Global/images/img/hall_3.png" /></a>
                    <a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=9"><img src="{$config_siteurl}statics/themes/L2_Global/images/img/hall_4.png" /></a>
                    <a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=16"><img src="{$config_siteurl}statics/themes/L2_Global/images/img/hall_5.png" /></a>
                    <a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=12"><img src="{$config_siteurl}statics/themes/L2_Global/images/img/hall_6.png" /></a>
                    <a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=13"><img src="{$config_siteurl}statics/themes/L2_Global/images/img/hall_7.png" /></a>
                    <a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=10"><img src="{$config_siteurl}statics/themes/L2_Global/images/img/hall_8.png" /></a>
                    <a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=17"><img src="{$config_siteurl}statics/themes/L2_Global/images/img/hall_9.png" /></a>
                    <a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm"><img src="{$config_siteurl}statics/themes/L2_Global/images/img/hall_10.png" /></a>
            </div>
        </div>
        <div class="dt_cont">
                <div class="cont_part float_left">
                    <div class="part_title"><p>{:getCategory(57,'catname')} </p><a href="{:getCategory(57,'url')}">更多</a></div>
                    <div class="part_list">
                        <ul>
                            <content action="lists" catid="57" order="id DESC" num="8">
                                <volist name="data" id="vo">
                                    <li><img src="{$config_siteurl}statics/themes/L2_Global/images/point.png" /><a href="{$vo.url}">{$vo.title|str_cut=###,18}</a></li>
                                </volist>
                            </content>
                        </ul>
                    </div>
                </div>
                <div class="cont_part float_right">
                    <div class="part_title"><p>{:getCategory(58,'catname')} </p><a href="{:getCategory(58,'url')}">更多</a></div>
                    <div class="part_list">
                        <ul>
                            <content action="lists" catid="58" order="id DESC" num="8">
                                <volist name="data" id="vo">
                                    <li><img src="{$config_siteurl}statics/themes/L2_Global/images/point.png" /><a href="{$vo.url}">{$vo.title|str_cut=###,18}</a></li>
                                </volist>
                            </content>
                        </ul>
                    </div>
                </div>   
            </div>
	</div>
    <div class="down_right float_right">
    	<div class="sun_title">
				阳光警务
        </div>
        <div class="sun_cont">
            <a href="{:U('Content/Index/lists@' . C('GLOBAL_SITE_DOMAIN'), array('catid'=>25))}"><span class="sun_img float_left"><img src="{$config_siteurl}statics/themes/L2_Global/images/icon/sun_1.png" /></span> <span class="sun_text float_left">法律法规依据公开</span></a>
            <a href="{:U('Content/Index/lists@' . C('GLOBAL_SITE_DOMAIN'), array('catid'=>29))}"><span class="sun_img float_left"><img src="{$config_siteurl}statics/themes/L2_Global/images/icon/sun_2.png" /></span> <span class="sun_text float_left">执法办案流程公开</span></a>
            <a href="{:U('Content/Index/lists@' . C('GLOBAL_SITE_DOMAIN'), array('catid'=>33))}"><span class="sun_img float_left"><img src="{$config_siteurl}statics/themes/L2_Global/images/icon/sun_3.png" /></span> <span class="sun_text float_left">执法权力清单公开</span></a>
            <a href="{:U('Content/Index/lists@' . C('GLOBAL_SITE_DOMAIN'), array('catid'=>31))}"><span class="sun_img float_left"><img src="{$config_siteurl}statics/themes/L2_Global/images/icon/sun_4.png" /></span> <span class="sun_text float_left">行政处罚决定公开</span></a>
            <a href="{:U('Content/Site/alarm_query@' . C('GLOBAL_SITE_DOMAIN'))}"><span class="sun_img float_left"><img src="{$config_siteurl}statics/themes/L2_Global/images/icon/sun_5.png" /></span> <span class="sun_text float_left">警情受理查询</span></a>
            <a href="{:U('Content/Site/case_query@' . C('GLOBAL_SITE_DOMAIN'))}"><span class="sun_img float_left"><img src="{$config_siteurl}statics/themes/L2_Global/images/icon/sun_6.png" /></span> <span class="sun_text float_left">治安案件查询</span></a>
            <a href="{:U('Content/Site/order_query@' . C('GLOBAL_SITE_DOMAIN'))}"><span class="sun_img float_left"><img src="{$config_siteurl}statics/themes/L2_Global/images/icon/sun_7.png" /></span> <span class="sun_text float_left">刑事案件查询</span></a>
            <a href="http://sc.122.gov.cn/views/inquiry.html" target="_blank"><span class="sun_img float_left"><img src="{$config_siteurl}statics/themes/L2_Global/images/icon/sun_8.png" /></span> <span class="sun_text float_left">交通违法查询</span></a>
        </div>
    </div>
</div>
       <!-- 警营风采-->
<div class="police_cont">
		<div class="cont_part part_title">
                <p>{:getCategory(59, 'catname')}</p>
                <a href="{:getCategory(59, 'url')}" class="more-news">更多>></a>
		</div>
	<div class="style-bg">
            <div class="police-style">
                <ul>
                    <content action="lists" catid="59" order="id DESC" num="6">
                        <volist name="data" id="vo">
                            <li>
                                <a href="{$vo.url}">
                                    <img src="{$vo.thumb}" alt="{$vo.title}"/>
                                    <p>{$vo.title}</p>
                                </a>
                            </li>
                        </volist>
                    </content>
                </ul>
	    </div>
	</div>
</div>
        <script>
            var styleTimer;
            function styleCaurousel(){
                var $ul = $(".police-style").find("ul");
                var $lis = $ul.children("li");
                var width = $lis.eq(0).width() + 15;
                styleTimer = setInterval(function(){
                            $ul.animate({
                                        'margin-left':'-'+ width +'px'
                                    },
                                    2000,
                                    function(){
                                        $ul.css({'margin-left':0}).
                                                children('li').
                                                last().
                                                after(
                                                $ul.children('li').first()
                                        );
                                    });
                        },4000
                );
            }
            styleCaurousel();
            $(".police-style").hover(function(){
                clearInterval(styleTimer);
            },function(){
                styleCaurousel()
            });
        </script>
<template file="Content/Mods/footer.php" />
</div>
</body>
</html>
