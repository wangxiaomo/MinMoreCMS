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
    	<!--1开始-->
		<div class="Main1">
        	<!--轮播图开始-->
            <div class="Carousel">
            	<script type="text/javascript">
					$(function(){
							$("#focus").hover(function(){$("#focus-prev,#focus-next").show();},function(){$("#focus-prev,#focus-next").hide();});
							$("#focus").slide({ 
								mainCell:"#focus-bar-box ul",
								targetCell:"#focus-title a",
								titCell:"#focus-num a",
								prevCell:"#focus-prev",
								nextCell:"#focus-next",
								effect:"left",
								easing:"easeInOutCirc",
								autoPlay:true,
								delayTime:200
							})
						})
				</script>
                <spf mo="Special" action="content_list" specialid="$specialid" order="updatetime DESC" typeid="6" thumb="1" num="5">
                <div id="focus">
                            <div class="focus-bar-box" id="focus-bar-box">
                            <div class="hd">
                                <div class="focus-title" id="focus-title">
                                    <volist name="data" id="vo">
                                      <a href="{$vo.url}">{$vo.title|str_cut=###,23}...</a>
                                    </volist>
                                </div>
                            </div>
                              <ul class="focus-bar">
                                <volist name="data" id="vo">
                                    <li><a href="{$vo.url}"><img src="{$vo.thumb}"></a></li>
                                </volist>
                              </ul>
                                  <a href="javascript:void(0);" class="btn-prev" onclick="return false;" hidefocus="" id="focus-prev"></a>
                                  <a href="javascript:void(0);" class="btn-next" onclick="return false;" hidefocus="" id="focus-next"></a>
                                  <div class="ft">
                                    <div class="ftbg"></div>
                                    <div id="focus-num" class="change">
                                        <volist name="data" id="vo">
                                            <a class=""></a>
                                        </volist>
                                    </div>
                                  </div>
                            </div>
   					 </div>
                </spf>
            </div>
            <!--轮播图结束-->
            
            <!--最新要闻开始-->
            <div class="Focus">
            	<!--头开始-->
                <div class="Focus_top">
                    <h1>最新要闻</h1><h2><a href="{$config_siteurl}index.php?g=special&a=type&typeid=6" target="_blank" target="_blank">+更多</a></h2>
                </div>
                <!--头结束-->
                
                <!--展开信息开始-->
                <spf mo="Special" action="content_list" specialid="$specialid" order="updatetime DESC" typeid="6" num="1">
                    <volist name="data" id="vo" offset="0" length="1">
                        <div class="Focus2">
                       	    <h1><a href="{$vo.url}" target="_blank">{$vo.title|str_cut=###,23}...</a></h1>
                            <h2>{$vo.description|str_cut=###,90}...<span class="righdq"><a href="{$vo.url}" target="_blank">[详细内容]</a></span></h2>
                        </div>
                    </volist>
                </spf>
                <!--展开信息结束-->
                
                <!--列表信息开始-->
                <spf mo="Special" action="content_list" specialid="$specialid" order="updatetime DESC" typeid="6" num="5">
                    <div class="Focus3">
                    	<ul>
                            <volist name="data" id="vo" offset="1" length="5">
                                <li><span class="text1"><font class="dian">■</font><a href="{$vo.url}" target="_blank">{$vo.title|str_cut=###,23}...</a></span>
                                    <span class="text2">{$vo.updatetime|date="Y-m-d",###}</span>
                                </li>
                            </volist>
                        </ul>
                    </div>
                </spf>
                <!--列表信息结束-->
          </div>
            <!--最新要闻结束-->
        </div>
        <!--1结束-->
        
        <!--2开始-->
		<div class="Main2">
        	<!--领导讲话开始 -->
            <div class="Main2_a">
                <h1>
                	<span class="tiete">领导讲话</span>
                	<span class="tiet_sji"><a href="{$config_siteurl}index.php?g=special&a=type&typeid=7" target="_blank">+ 更多</a></span>
                </h1>
                <spf mo="Special" action="content_list" specialid="$specialid" order="updatetime DESC" typeid="7" num="9">
                <ul>
                    <volist name="data" id="vo">
                        <li>
                        	<span class="text4"><font class="dian">■</font><a href="{$vo.url}" target="_blank">{$vo.title|str_cut=###,13}...</a></span>
                            <span class="text3">{$vo.updatetime|date="Y-m-d",###}</span>
                        </li>
                    </volist>
                </ul>
                </spf>
            </div>
            <!--领导讲话结束 -->
            
            <!--工作快讯开始 -->
            <div class="Main2_a">
                <h1>
                	<span class="tiete">工作快讯</span>
                	<span class="tiet_sji"><a href="{$config_siteurl}index.php?g=special&a=type&typeid=8" target="_blank">+ 更多</a></span>
                </h1>
                <spf mo="Special" action="content_list" specialid="$specialid" order="updatetime DESC" typeid="8" num="9">
                <ul>
                    <volist name="data" id="vo">
                        <li>
                            <span class="text4"><font class="dian">■</font><a href="{$vo.url}" target="_blank">{$vo.title|str_cut=###,13}...</a></span>
                            <span class="text3">{$vo.updatetime|date="Y-m-d",###}</span>
                        </li>
                    </volist>
                </ul>
                </spf>
            </div>
            <!--工作快讯结束 -->
            
            <!--工作简讯开始 -->
            <div class="Main2_a">
                <h1>
                	<span class="tiete">工作简讯</span>
                	<span class="tiet_sji"><a href="{$config_siteurl}index.php?g=special&a=type&typeid=9" target="_blank">+ 更多</a></span>
                </h1>
                <spf mo="Special" action="content_list" specialid="$specialid" order="updatetime DESC" typeid="9" num="9">
                <ul>
                    <volist name="data" id="vo">
                        <li>
                            <span class="text4"><font class="dian">■</font><a href="{$vo.url}" target="_blank">{$vo.title|str_cut=###,13}...</a></span>
                            <span class="text3">{$vo.updatetime|date="Y-m-d",###}</span>
                        </li>
                    </volist>
                </ul>
                </spf>
            </div>
            <!--工作简讯结束 -->
        </div>
        <!--2结束-->
        
        <!--banner开始-->
        <div class="Main3"><img src="{$config_siteurl}statics/special/pgpj/images/specia8.jpg" width="1039" height="100" /></div>
        <!--banner结束-->
        
        <!--4开始-->
		<div class="Main2">
        	<!--警务公开开始 -->
            <div class="Main2_a">
                <h1>
                	<span class="tiete">警务公开</span>
                	<span class="tiet_sji"><a href="{$config_siteurl}index.php?g=special&a=type&typeid=10" target="_blank">+ 更多</a></span>
                </h1>
                <spf mo="Special" action="content_list" specialid="$specialid" order="updatetime DESC" typeid="10" num="9">
                <ul>
                    <volist name="data" id="vo">
                        <li>
                            <span class="text4"><font class="dian">■</font><a href="{$vo.url}" target="_blank">{$vo.title|str_cut=###,13}...</a></span>
                            <span class="text3">{$vo.updatetime|date="Y-m-d",###}</span>
                        </li>
                    </volist>
                </ul>
                </spf>
            </div>
            <!--警务公开结束 -->
            
            <!--重要文件开始 -->
            <div class="Main2_a">
                <h1>
                	<span class="tiete">重要文件</span>
                	<span class="tiet_sji"><a href="{$config_siteurl}index.php?g=special&a=type&typeid=11" target="_blank">+ 更多</a></span>
                </h1>
                <spf mo="Special" action="content_list" specialid="$specialid" order="updatetime DESC" typeid="11" num="9">
                <ul>
                    <volist name="data" id="vo">
                        <li>
                            <span class="text4"><font class="dian">■</font><a href="{$vo.url}" target="_blank">{$vo.title|str_cut=###,13}...</a></span>
                            <span class="text3">{$vo.updatetime|date="Y-m-d",###}</span>
                        </li>
                    </volist>
                </ul>
                </spf>
            </div>
            <!--重要文件结束 -->
            
            <!--战果通报开始 -->
            <div class="Main2_a">
                <h1>
                	<span class="tiete">战果通报</span>
                	<span class="tiet_sji"><a href="{$config_siteurl}index.php?g=special&a=type&typeid=12" target="_blank">+ 更多</a></span>
                </h1>
                <spf mo="Special" action="content_list" specialid="$specialid" order="updatetime DESC" typeid="12" num="9">
                <ul>
                    <volist name="data" id="vo">
                        <li>
                            <span class="text4"><font class="dian">■</font><a href="{$vo.url}" target="_blank">{$vo.title|str_cut=###,13}...</a></span>
                            <span class="text3">{$vo.updatetime|date="Y-m-d",###}</span>
                        </li>
                    </volist>
                </ul>
                </spf>
            </div>
            <!--战果通报结束 -->
        </div>
        <!--4结束-->
        
        <!--图片新闻开始-->
        <div class="Main3">
        	<div class="Main2_a" style="width:1039px;margin-left:0px;">
                <h1>
                	<span class="tiete">图片新闻</span>
                	<span class="tiet_sji"><a href="{$config_siteurl}index.php?g=special&a=type&typeid=13" target="_blank">+ 更多</a></span>
                </h1>
                <spf mo="Special" action="content_list" specialid="$specialid" order="updatetime DESC" typeid="13" num="5">
                <ul class="mas">
                	<!--1 -->
                    <volist name="data" id="vo">
                    <div class="mias">
                    	<div class="mias1"><a href="{$vo.url}" target="_blank"><img src="{$vo.thumb}" width="180" height="125" border="0" /></a></div>
                        <div class="mias2"><a href="{$vo.url}" target="_blank">{$vo.title|str_cut=###,11}</a></div>
                    </div>
                    </volist>
                    <!--1 -->
                </ul>
                </spf>
            </div>
        </div>
        <!--图片新闻结束-->
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
