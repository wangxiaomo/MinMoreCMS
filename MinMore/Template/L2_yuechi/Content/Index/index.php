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
<link href="{$config_siteurl}statics/themes/L2_岳池/css/common.css" rel="stylesheet" type="text/css" />
<link href="{$config_siteurl}statics/themes/L2_岳池/css/index.css" rel="stylesheet" type="text/css" />
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
    		<img src="{$config_siteurl}statics/themes/L2_岳池/images/title_1.png" />
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
            	<div class="part_title"><p>{:getCategory(5, 'catname')} </p><a href="{:getCategory(5, 'url')}">更多</a></div>
                <div class="part_list">
                	<ul>
                        <content action="lists" catid="5" order="id DESC" num="8">
                            <volist name="data" id="vo">
                                <li><img src="{$config_siteurl}statics/themes/L2_岳池/images/point.png" /><a href="{$vo.url}">{$vo.title|str_cut=###,18}</a></li>
                            </volist>
                        </content>
                    </ul>
                </div>
            </div>
            <div class="cont_part float_left">
            	<div class="part_title"><p>{:getCategory(4, 'catname')} </p><a href="{:getCategory(4, 'url')}">更多</a></div>
                <div class="part_list">
                	<ul>
                        <content action="lists" catid="4" order="id DESC" num="8">
                            <volist name="data" id="vo">
                                <li><img src="{$config_siteurl}statics/themes/L2_岳池/images/point.png" /><a href="{$vo.url}">{$vo.title|str_cut=###,18}</a></li>
                            </volist>
                        </content>
                    </ul>
                </div>
            </div>
            <div class="cont_part float_right">
            	<div class="part_title"><p>{:getCategory(3, 'catname')} </p><a href="{:getCategory(3, 'url')}">更多</a></div>
                <div class="part_list">
                	<ul>
                        <content action="lists" catid="3" order="id DESC" num="8">
                            <volist name="data" id="vo">
                                <li><img src="{$config_siteurl}statics/themes/L2_岳池/images/point.png" /><a href="{$vo.url}">{$vo.title|str_cut=###,18}</a></li>
                            </volist>
                        </content>
                    </ul>
                </div>
            </div>   
        </div>
    </div>
    <div class="up_right float_right">
    	<div class="wap">
    		<img class="float_left" src="{$config_siteurl}statics/themes/L2_岳池/images/icon/map.png" />
            <img class="float_right" src="{$config_siteurl}statics/themes/L2_岳池/images/icon/arr.png" />
            <span class="float_right">电子地图</span>
        </div>
        <div class="gonggao">
        	<div class="gg_title"><img class="float_left" src="{$config_siteurl}statics/themes/L2_岳池/images/title_4.png" /><a class="float_right" href="{:getCategory(2, 'url')}">更多</a></div>
            <div class="gg_cont">
            	<ul>
                    <content action="lists" catid="2" order="id DESC" num="3">
                        <volist name="data" id="vo">
                            <li><img src="{$config_siteurl}statics/themes/L2_岳池/images/icon/num_1.png" /><a href="{$vo.url}">{$vo.title|str_cut=###,12}</a></li>
                        </volist>
                    </content>
                </ul>
            </div>
        </div>
        <div class="enter">
            <ul>
                <li><img src="{$config_siteurl}statics/themes/L2_岳池/images/enter_1.png" /></li>
                <li><img src="{$config_siteurl}statics/themes/L2_岳池/images/enter_2.png" /></li>
                <li><img src="{$config_siteurl}statics/themes/L2_岳池/images/enter_3.png" /></li>
                <li><img src="{$config_siteurl}statics/themes/L2_岳池/images/enter_4.png" /></li>
                <li><img src="{$config_siteurl}statics/themes/L2_岳池/images/enter_5.png" /></li>
                <li><img src="{$config_siteurl}statics/themes/L2_岳池/images/enter_6.png" /></li>
                <li style="margin:0;"><img src="{$config_siteurl}statics/themes/L2_岳池/images/enter_7.png" /></li>
            </ul>
        </div>
    </div>
</div>
<div class="banner"><img src="{$config_siteurl}statics/themes/L2_岳池/images/banner.png" /></div>
<div class="content_down">
	<div class="down_left float_left">
        <div class="hall">
            <div class="left_title">
                <img src="{$config_siteurl}statics/themes/L2_岳池/images/title_2.png" />
            </div>
            <div class="hall_cont">
                    <a href="#"><img src="{$config_siteurl}statics/themes/L2_岳池/images/img/hall_1.png" /></a>
                    <a href="#"><img src="{$config_siteurl}statics/themes/L2_岳池/images/img/hall_2.png" /></a>
                    <a href="#"><img src="{$config_siteurl}statics/themes/L2_岳池/images/img/hall_3.png" /></a>
                    <a href="#"><img src="{$config_siteurl}statics/themes/L2_岳池/images/img/hall_4.png" /></a>
                    <a href="#"><img src="{$config_siteurl}statics/themes/L2_岳池/images/img/hall_5.png" /></a>
                    <a href="#"><img src="{$config_siteurl}statics/themes/L2_岳池/images/img/hall_6.png" /></a>
                    <a href="#"><img src="{$config_siteurl}statics/themes/L2_岳池/images/img/hall_7.png" /></a>
                    <a href="#"><img src="{$config_siteurl}statics/themes/L2_岳池/images/img/hall_8.png" /></a>
                    <a href="#"><img src="{$config_siteurl}statics/themes/L2_岳池/images/img/hall_9.png" /></a>
                    <a href="#"><img src="{$config_siteurl}statics/themes/L2_岳池/images/img/hall_10.png" /></a>
            </div>
        </div>
        <div class="dt_cont">
                <div class="cont_part float_left">
                    <div class="part_title"><p>{:getCategory(23,'catname')} </p><a href="{:getCategory(23,'url')}">更多</a></div>
                    <div class="part_list">
                        <ul>
                            <content action="lists" catid="23" order="id DESC" num="8">
                                <volist name="data" id="vo">
                                    <li><img src="{$config_siteurl}statics/themes/L2_岳池/images/point.png" /><a href="{$vo.url}">{$vo.title}</a></li>
                                </volist>
                            </content>
                        </ul>
                    </div>
                </div>
                <div class="cont_part float_right">
                    <div class="part_title"><p>{:getCategory(6,'catname')} </p><a href="{:getCategory(6,'url')}">更多</a></div>
                    <div class="part_list">
                        <ul>
                            <content action="lists" catid="6" order="id DESC" num="8">
                                <volist name="data" id="vo">
                                    <li><img src="{$config_siteurl}statics/themes/L2_岳池/images/point.png" /><a href="{$vo.url}">{$vo.title}</a></li>
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
            <a href="#"><span class="sun_img float_left"><img src="{$config_siteurl}statics/themes/L2_岳池/images/icon/sun_1.png" /></span> <span class="sun_text float_left">法律法规依据公开</span></a>
            <a href="#"><span class="sun_img float_left"><img src="{$config_siteurl}statics/themes/L2_岳池/images/icon/sun_2.png" /></span> <span class="sun_text float_left">执法办案流程公开</span></a>
            <a href="#"><span class="sun_img float_left"><img src="{$config_siteurl}statics/themes/L2_岳池/images/icon/sun_3.png" /></span> <span class="sun_text float_left">执法办案流程公开</span></a>
            <a href="#"><span class="sun_img float_left"><img src="{$config_siteurl}statics/themes/L2_岳池/images/icon/sun_4.png" /></span> <span class="sun_text float_left">执法权利清单公开</span></a>
            <a href="#"><span class="sun_img float_left"><img src="{$config_siteurl}statics/themes/L2_岳池/images/icon/sun_5.png" /></span> <span class="sun_text float_left">警情受理查询</span></a>
            <a href="#"><span class="sun_img float_left"><img src="{$config_siteurl}statics/themes/L2_岳池/images/icon/sun_6.png" /></span> <span class="sun_text float_left">治安案件查询</span></a>
            <a href="#"><span class="sun_img float_left"><img src="{$config_siteurl}statics/themes/L2_岳池/images/icon/sun_7.png" /></span> <span class="sun_text float_left">刑事案件查询</span></a>
            <a href="#"><span class="sun_img float_left"><img src="{$config_siteurl}statics/themes/L2_岳池/images/icon/sun_8.png" /></span> <span class="sun_text float_left">交通违法查询</span></a>
        </div>
    </div>
</div>
<template file="Content/Mods/footer.php" />
</div>
</body>
</html>
