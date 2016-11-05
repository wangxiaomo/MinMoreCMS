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
<link href="{$config_siteurl}statics/themes/common.css" rel="stylesheet" type="text/css" />
<link href="{$config_siteurl}statics/themes/L2_Flat/css/index.css" rel="stylesheet" type="text/css" />
<link href="{$config_siteurl}statics/themes/L2_Flat/css/common.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{$config_siteurl}statics/js/jquery.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/themes/L2_Flat/js/tab.js"></script>
</head>

<body>
<template file="Content/Mods/header.php" />
<div class="content-bar">
	<div class="wrapper">
    	<div class="pull-left state-bar mar-t30">
        	<div class="left-title">
            	<h3><img src="{$config_siteurl}statics/themes/L2_Flat/images/lt-point.png" style="vertical-align:middle" />&nbsp;&nbsp;公安动态</h3>
            </div>
            <div class="state-con">
            	<div class="state-part width-298 pull-left">
                	<h4>热点新闻</h4>
                    <div class="state-part-img">
                      <div class="focus" id="idTransformView">
                          <position action="position" posid="1" num="4">
                          <ul class="slider" id="idSlider">
                              <volist name="data" id="vo">
                              <li><a target="_blank"  href="{$vo.data.url}">
                                  <img src="{$vo.data.thumb}" alt="" /></a></li>
                              </volist>
                          </ul>
                          <ul class="num" id="idNum">
                              <volist name="data" id="vo">
                                <li></li>
                              </volist>
                          </ul>
                          </position>
                      </div>
                  </div>
                </div>
                <div class="state-part width-348 pull-right">
                	<h4>{:getCategory(54,'catname')}<a href="{:getCategory(54, 'url')}" class="pull-right mar-r10 font-nor">更多</a></h4>
                    <div class="state-part-con">
                    	<ul>
                            <content action="lists" catid="54" order="id DESC" num="7">
                              <volist name="data" id="vo">
                                <li><a href="{$vo.url}">{$vo.title|str_cut=###,18}</a><span>[{$vo.updatetime|date_format='m-d',###}]</span></li>
                              </volist>
                            </content>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    	<div class="pull-right notice-bar mar-t30">
        	<div class="right-title">
            	<h4>{:getCategory(60,'catname')}</h4><a class="pull-right mar-r10 font-nor" href="{:getCategory(60,'url')}">更多</a>
            </div>
            <div class="notice-con">
            	<ul>
                    <content action="lists" catid="60" order="id DESC" num="8">
                        <volist name="data" id="vo">
                            <li><a href="{$vo.url}">{$vo.title|str_cut=###,18}</a></li>
                        </volist>
                    </content>
                </ul>
            </div>
        </div>
    </div>
    <div class="wrapper">
    	<div class="pull-left enter-bar-1 mar-t30">
        	<div class="left-title">
            	<h3><img src="{$config_siteurl}statics/themes/L2_Flat/images/lt-point.png" style="vertical-align:middle" />&nbsp;&nbsp;网上办事</h3>
            </div>
            <div class="enter-con">
            	<div class="ec-img-box">
                	<a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=11"><img src="{$config_siteurl}statics/themes/L2_Flat/images/enter-1.png" /></a>
                    <a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=9"><img src="{$config_siteurl}statics/themes/L2_Flat/images/enter-2.png" /></a>
                    <a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=16"><img src="{$config_siteurl}statics/themes/L2_Flat/images/enter-3.png" /></a>
                    <a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=12"><img src="{$config_siteurl}statics/themes/L2_Flat/images/enter-4.png" /></a>
                    <a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=15"><img src="{$config_siteurl}statics/themes/L2_Flat/images/enter-5.png" /></a>
                    <a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=10"><img src="{$config_siteurl}statics/themes/L2_Flat/images/enter-6.png" /></a>
                    <a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm"><img src="{$config_siteurl}statics/themes/L2_Flat/images/enter-7.png" /></a>
                    <a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=13"><img src="{$config_siteurl}statics/themes/L2_Flat/images/enter-8.png" /></a>
                    <a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=14"><img src="{$config_siteurl}statics/themes/L2_Flat/images/enter-9.png" /></a>
                    <a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=17"><img src="{$config_siteurl}statics/themes/L2_Flat/images/enter-10.png" /></a>
                </div>
            </div>
        </div>
        <div class="pull-right sun-bar mar-t30">
        	<div class="right-title">
            	<h4>阳光警务</h4>
            </div>
            <div class="sun-con">
				<a class="sc-img-1 sc-icon-1" href="{:U('Content/Index/lists@' . C('GLOBAL_SITE_DOMAIN'), array('catid'=>25))}">法律法规依据公开</a> 
                <a class="sc-img-1 sc-icon-2" href="{:U('Content/Index/lists@' . C('GLOBAL_SITE_DOMAIN'), array('catid'=>29))}">执法办案流程公开</a>
                <a class="sc-img-1 sc-icon-3" href="{:U('Content/Index/lists@' . C('GLOBAL_SITE_DOMAIN'), array('catid'=>33))}">执法权力清单公开</a>
                <a class="sc-img-1 sc-icon-4" href="{:U('Content/Index/lists@' . C('GLOBAL_SITE_DOMAIN'), array('catid'=>31))}">行政处罚决定公开</a> 
                <a class="sc-img-2 mar-r10" href="http://sc.122.gov.cn/views/inquiry.html">
                	<p><img src="{$config_siteurl}statics/themes/L2_Flat/images/sun-1.png" /></p>
                    <span>交通违法查询</span>
                </a> 
                <a class="sc-img-2" href="{:U('Content/Site/alarm_query@' . C('GLOBAL_SITE_DOMAIN'))}">
                	<p><img src="{$config_siteurl}statics/themes/L2_Flat/images/sun-2.png" /></p>
                    <span>警情受理查询</span>
                </a>
                <a class="sc-img-2 mar-r10" href="{:U('Content/Site/order_query@' . C('GLOBAL_SITE_DOMAIN'))}">
                	<p><img src="{$config_siteurl}statics/themes/L2_Flat/images/sun-3.png" /></p>
                    <span>刑事案件查询</span>
                </a>
                <a class="sc-img-2" href="{:U('Content/Site/case_query@' . C('GLOBAL_SITE_DOMAIN'))}">
                	<p><img src="{$config_siteurl}statics/themes/L2_Flat/images/sun-4.png" /></p>
                    <span>治安案件查询</span>
                </a>           
            </div>
        </div>
    </div>
    <div class="wrapper-2 mar-t30">
    	<img src="{$config_siteurl}statics/themes/L2_Global/images/banner.gif" />
    </div>
    <div class="wrapper mar-t30">
    	<div class="ban-bar pull-left">
        	<div class="ban-part pull-left">
            	<div class="ban-part-title">{:getCategory(55,'catname')}<a class="pull-right font-nor" href="{:getCategory(55,'url')}">更多</a></div>
                <div class="ban-pert-con">
                	<ul>
                        <content action="lists" catid="55" order="id DESC" num="6">
                            <volist name="data" id="vo">
                                <li><a href="{$vo.url}">{$vo.title|str_cut=###,25}</a></li>
                            </volist>
                        </content>
                    </ul>
                </div>
            </div>
            <div class="ban-part pull-right">
            	<div class="ban-part-title">{:getCategory(56,'catname')}<a href="{:getCategory(56,'url')}" class="pull-right font-nor">更多</a></div>
                <div class="ban-pert-con">
                	<ul>
                        <content action="lists" catid="56" order="id DESC" num="6">
                            <volist name="data" id="vo">
                                <li><a href="{$vo.url}">{$vo.title|str_cut=###,25}</a></li>
                            </volist>
                        </content>
                    </ul>
                </div>
            </div>
            <div class="ban-part pull-left mar-t20">
            	<div class="ban-part-title">{:getCategory(57,'catname')}<a class="pull-right font-nor" href="{:getCategory(57,'url')}">更多</a></div>
                <div class="ban-pert-con">
                	<ul>
                        <content action="lists" catid="57" order="id DESC" num="6">
                            <volist name="data" id="vo">
                                <li><a href="{$vo.url}">{$vo.title|str_cut=###,25}</a></li>
                            </volist>
                        </content>
                    </ul>
                </div>
            </div>
            <div class="ban-part pull-right mar-t20">
            	<div class="ban-part-title">{:getCategory(58,'catname')}<a href="{:getCategory(58,'url')}" class="pull-right font-nor">更多</a></div>
                <div class="ban-pert-con">
                	<ul>
                        <content action="lists" catid="58" order="id DESC" num="6">
                            <volist name="data" id="vo">
                                <li><a href="{$vo.url}">{$vo.title|str_cut=###,25}</a></li>
                            </volist>
                        </content>
                    </ul>
                </div>
            </div>
        </div>
        <div class="pull-right enter-bar-2">
        	<a href="{:U('Content/Site/map@' . C('GLOBAL_SITE_DOMAIN'))}"><img src="{$config_siteurl}statics/themes/L2_Flat/images/en-1.png" /></a>
            <a href="{:U('Content/Index/lists', array('catid'=>45))}"><img src="{$config_siteurl}statics/themes/L2_Flat/images/en-2.png" /></a>
            <a href="http://weibo.com/u/2918589882?nick=%E9%87%91%E7%9B%BE%E5%B9%BF%E5%AE%89&is_hot=1"><img src="{$config_siteurl}statics/themes/L2_Flat/images/en-3.png" /></a>
            <a href="{:U('DirectorMail/Consult/add@' . C('GLOBAL_SITE_DOMAIN'), array('type'=>'wsjb'))}"><img src="{$config_siteurl}statics/themes/L2_Flat/images/en-4.png" /></a>
            <a href="{:U('Content/Site/l2_service')}"><img src="{$config_siteurl}statics/themes/L2_Flat/images/en-6.png" /></a>
            <a href="#" class="disabled-link"><img src="{$config_siteurl}statics/themes/L2_Flat/images/en-5.png" /></a>
            <a href="{:U('DirectorMail/Index/add')}"><img src="{$config_siteurl}statics/themes/L2_Flat/images/en-7.png" /></a>
        </div>
    </div>
    <div class="wrapper padding-b20">
    	<div class="pull-left jing-bar">
        	<div class="left-title">
            	<h3><img src="{$config_siteurl}statics/themes/L2_Flat/images/lt-point.png" style="vertical-align:middle" />&nbsp;&nbsp;{:getCategory(59,'catname')}</h3>
                <a  class="pull-right mar-t10 mar-r10" href="{:getCategory(59,'url')}">更多</a>
            </div>
            <div class="jing-con">
                <content action="lists" catid="59" order="id DESC" num="5">
                    <volist name="data" id="vo">
                        <p class="jing-con-img"><img src="{$vo.thumb}" /><a href="{$vo.url}">{$vo.title|str_cut=###,10}</a><p>
                    </volist>
                </content>
            </div>
        </div>
    </div>
</div>
<div class="wrapper-2"><img src="{$config_siteurl}statics/themes/L2_Flat/images/con-foot.png" /></div>
<!--
<div class="link wrapper-2 mar-t10">
	<p class="pull-left"><img src="{$config_siteurl}statics/themes/L2_Flat/images/link-int.png"  style="vertical-align:middle"/>&nbsp;&nbsp;网站导航</p>
    <div class="link-con pull-left">
    	<select>
        	<option>全国公安导航</option>
            <option>全国公安导航</option>
            <option>全国公安导航</option>
            <option>全国公安导航</option>
        </select>
        <select>
        	<option>省内公安网站导航</option>
            <option>省内公安网站导航</option>
            <option>省内公安网站导航</option>
            <option>省内公安网站导航</option>
        </select>
        <select>
        	<option>本市各县区公安网站</option>
            <option>本市各县区公安网站</option>
            <option>本市各县区公安网站</option>
            <option>本市各县区公安网站</option>
        </select>
        <select>
        	<option>其他网站导航</option>
            <option>其他网站导航</option>
            <option>其他网站导航</option>
            <option>其他网站导航</option>
        </select>
    </div>
</div>
-->
<template file="Content/Mods/footer.php" />
<template file="Content/Mods/quick_nav.php" />
<script type="text/javascript">
    $(function(){
        $("#navx").slide({
            type: "menu",
            titCell: ".mod_cate",
            targetCell: ".mod_subcate",
            delayTime: 0,
            triggerTime: 10,
            defaultPlay: false,
            returnDefault: true
        });
    })
</script>
</body>
</html>
