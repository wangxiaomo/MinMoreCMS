<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<!DOCTYPE HTML>
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
    <meta name="keywords" content="{$SEO['keyword']}" />
    <meta name="description" content="{$SEO['description']}" />
    <link href="{$config_siteurl}statics/special/aqfzgn/css/special.css" rel="stylesheet" type="text/css" />
    <link href="{$config_siteurl}statics/special/aqfzgn/css/slide.css" rel="stylesheet" type="text/css" /><!--轮播图-->
    <script type="text/javascript" src="{$config_siteurl}statics/special/pgpj/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/special/pgpj/js/jquery.SuperSlide.2.1.1.js"></script><!--轮播图-->
</head>

<body>
<!--顶部开始-->
<div class="spec2_top">
	<div class="spec2_top1">
    	<h1><a href="{$config_siteurl}index.php?g=special&a=index&id=7"><img src="{$config_siteurl}statics/special/aqfzgn/images/specia_er1.png" width="152" height="38" border="0"/></a></h1>
        <h2><a href="{$config_siteurl}index.php?g=special&a=index&id=7">返回首页</a> | <a href="">添加收藏</a></h2>
  </div>
</div>
<!--顶部结束-->

<!--banner图开始-->
<div class="ban1">
	<div class="ban2">
    	<div class="ban3">
        	<div class="ban4">
            	<div class="ban5">
                	<!--导航开始-->
                	<div class="ban6">
                    	<ul>
                        	<li><a href="{$config_siteurl}index.php?g=special&a=index&id=7">首页</a></li>
                        	<li><a href="{$config_siteurl}index.php?g=special&a=type&typeid=14">领导讲话</a></li>
                            <li><a href="{$config_siteurl}index.php?g=special&a=type&typeid=15">工作快讯</a></li>
                            <li><a href="{$config_siteurl}index.php?g=special&a=type&typeid=16">警务公开</a></li>
                            <li><a href="{$config_siteurl}index.php?g=special&a=type&typeid=17">重要文件</a></li>
                            <li><a href="{$config_siteurl}index.php?g=special&a=type&typeid=18">战果通报</a></li>
                        </ul>
                    </div>
                    <!--导航结束-->
                </div>
            </div>
        </div>
    </div>
</div>
<!--banner图结束-->

<!--外框开始-->
<div class="specialer_main">
	<div class="specialer_main_center">
    	<!--1开始-->
		<div class="Mainer1">
        	<!--头开始-->
            <div class="speer_top">
                <h1>领导讲话</h1><h2><a href="{$config_siteurl}index.php?g=special&a=type&typeid=14" target="_blank">+更多</a></h2>
            </div>
            <!--头结束-->
            <div class="speer_xia">
            <!--领导讲话开始-->
            <spf mo="Special" action="content_list" specialid="$specialid" order="updatetime DESC" typeid="14" num="6">
            <div class="Focuser Left">
                <!--展开信息开始-->
                    <div class="Focuser2">
                        <volist name="data" id="vo" offset="0" length="1">
                   	        <h1><a href="{$vo.url}" target="_blank">{$vo.title|str_cut=###,50}...</a></h1>
                        </volist>
                    </div>
                <!--展开信息结束-->
                
                <!--列表信息开始-->
                <div class="Focuser3">
                	<ul>
                        <volist name="data" id="vo" offset="1" length="6">
                            <li><span class="text1"><font class="dian">■</font><a href="{$vo.url}" target="_blank">{$vo.title|str_cut=###,22}...</a></span>
                                <span class="text2">{$vo.updatetime|date="Y-m-d",###}</span>
                            </li>
                        </volist>
                    </ul>
                </div>
                <!--列表信息结束-->
          </div>
          </spf>
          <!--领导讲话结束-->

            <!--轮播图开始-->
            <div class="Carouseerl Right">
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
                <spf mo="Special" action="content_list" specialid="$specialid" order="updatetime DESC" typeid="14" thumb="1" num="5">
                <div id="focus">
                            <div class="focus-bar-box" id="focus-bar-box">
                            <div class="hd">
                                <div class="focus-title" id="focus-title">
                                    <volist name="data" id="vo">
                                      <a href="{$vo.url}">{$vo.title|str_cut=###,18}...</a>
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
            </div>
        </div>
        <!--1结束-->
        
        <!--2开始-->
		<div class="Mainer1">
        	<!--头开始-->
            <div class="speer_top">
                <h1>工作快讯</h1><h2><a href="{$config_siteurl}index.php?g=special&a=type&typeid=15" target="_blank">+更多</a></h2>
            </div>
            <!--头结束-->
            <div class="speer_xia">
            <!--工作快讯开始-->
            <spf mo="Special" action="content_list" specialid="$specialid" order="updatetime DESC" typeid="15" num="6">
            <div class="Focuser Right">
                <!--展开信息开始-->
                    <div class="Focuser2">
                        <volist name="data" id="vo" offset="0" length="1">
                            <h1><a href="{$vo.url}" target="_blank">{$vo.title|str_cut=###,50}...</a></h1>
                        </volist>
                    </div>
                <!--展开信息结束-->
                
                <!--列表信息开始-->
                <div class="Focuser3">
                    <ul>
                        <volist name="data" id="vo" offset="1" length="6">
                            <li><span class="text1"><font class="dian">■</font><a href="{$vo.url}" target="_blank">{$vo.title|str_cut=###,22}...</a></span>
                                <span class="text2">{$vo.updatetime|date="Y-m-d",###}</span>
                            </li>
                        </volist>
                    </ul>
                </div>
                <!--列表信息结束-->
          </div>
          </spf>
          	<!--工作快讯结束-->

            <!--宣传图开始-->
            <div class="Carouseerl Left">
           	  <img src="{$config_siteurl}statics/special/aqfzgn/images/specia_er8.jpg" width="451" height="300" />            </div>
            <!--宣传图结束-->
            </div>
        </div>
        <!--2结束-->
        
        <!--3开始-->
		<div class="Mainer1">
        	<!--头开始-->
            <div class="speer_top">
                <h1>警务公开</h1><h2><a href="{$config_siteurl}index.php?g=special&a=type&typeid=16" target="_blank">+更多</a></h2>
            </div>
            <!--头结束-->
            <div class="speer_xia">
            <!--警务公开开始-->
            <spf mo="Special" action="content_list" specialid="$specialid" order="updatetime DESC" typeid="16" num="6">
            <div class="Focuser Left">
                <!--展开信息开始-->
                    <div class="Focuser2">
                        <volist name="data" id="vo" offset="0" length="1">
                            <h1><a href="{$vo.url}" target="_blank">{$vo.title|str_cut=###,50}...</a></h1>
                        </volist>
                    </div>
                <!--展开信息结束-->
                
                <!--列表信息开始-->
                <div class="Focuser3">
                    <ul>
                        <volist name="data" id="vo" offset="1" length="6">
                            <li><span class="text1"><font class="dian">■</font><a href="{$vo.url}" target="_blank">{$vo.title|str_cut=###,22}...</a></span>
                                <span class="text2">{$vo.updatetime|date="Y-m-d",###}</span>
                            </li>
                        </volist>
                    </ul>
                </div>
                <!--列表信息结束-->
          </div>
          </spf>
          <!--警务公开结束-->

            <!--宣传图开始-->
            <div class="Carouseerl Right">
           	  <img src="{$config_siteurl}statics/special/aqfzgn/images/specia_er9.jpg" width="451" height="300" />            </div>
            <!--宣传图结束-->
            </div>
        </div>
        <!--3结束-->
        
        <!--4开始-->
		<div class="Mainer1">
        	<!--头开始-->
            <div class="speer_top">
                <h1>重要文件</h1><h2><a href="{$config_siteurl}index.php?g=special&a=type&typeid=17" target="_blank">+更多</a></h2>
            </div>
            <!--头结束-->
            <div class="speer_xia">
            <!--重要文件开始-->
            <spf mo="Special" action="content_list" specialid="$specialid" order="updatetime DESC" typeid="17" num="6">
            <div class="Focuser Right">
                <!--展开信息开始-->
                    <div class="Focuser2">
                        <volist name="data" id="vo" offset="0" length="1">
                            <h1><a href="{$vo.url}" target="_blank">{$vo.title|str_cut=###,50}...</a></h1>
                        </volist>
                    </div>
                <!--展开信息结束-->
                
                <!--列表信息开始-->
                <div class="Focuser3">
                    <ul>
                        <volist name="data" id="vo" offset="1" length="6">
                            <li><span class="text1"><font class="dian">■</font><a href="{$vo.url}" target="_blank">{$vo.title|str_cut=###,22}...</a></span>
                                <span class="text2">{$vo.updatetime|date="Y-m-d",###}</span>
                            </li>
                        </volist>
                    </ul>
                </div>
                <!--列表信息结束-->
          </div>
          </spf>
          	<!--重要文件结束-->

            <!--宣传图开始-->
            <div class="Carouseerl Left">
           	  <img src="{$config_siteurl}statics/special/aqfzgn/images/specia_er10.jpg" width="451" height="300" />            </div>
            <!--宣传图结束-->
            </div>
        </div>
        <!--4结束-->
        
        <!--5开始-->
		<div class="Mainer1">
        	<!--头开始-->
            <div class="speer_top">
                <h1>战果通报</h1><h2><a href="{$config_siteurl}index.php?g=special&a=type&typeid=18" target="_blank">+更多</a></h2>
            </div>
            <!--头结束-->
            <div class="speer_xia">
            <!--战果通报开始-->
            <div class="Focuser Left">
                <!--展开信息开始-->
                    <spf mo="Special" action="content_list" specialid="$specialid" order="updatetime DESC" thumb="1" typeid="18" num="6">
                        <div class="Focuser2">
                            <volist name="data" id="vo" offset="0" length="1">
                                <h1><a href="{$vo.url}" target="_blank">{$vo.title|str_cut=###,50}...</a></h1>
                            </volist>
                        </div>
                    </spf>
                <!--展开信息结束-->
                
                <!--列表信息开始-->
                <spf mo="Special" action="content_list" specialid="$specialid" order="updatetime DESC" typeid="18" num="6">
                    <div class="Focuser3">
                        <ul>
                            <volist name="data" id="vo" offset="1" length="6">
                                <li><span class="text1"><font class="dian">■</font><a href="{$vo.url}" target="_blank">{$vo.title|str_cut=###,22}...</a></span>
                                    <span class="text2">{$vo.updatetime|date="Y-m-d",###}</span>
                                </li>
                            </volist>
                        </ul>
                    </div>
                </spf>
                <!--列表信息结束-->
          </div>
          <!--战果通报结束-->

            <!--宣传图开始-->
            <spf mo="Special" action="content_list" specialid="$specialid" order="updatetime DESC" thumb="1" typeid="18" num="6">
                <div class="Carouseerl Right">
                    <volist name="data" id="vo" offset="0" length="1">
               	        <a href="{$vo.url}"><img src="{$vo.thumb}" width="451" height="300" border="0"/></a>
                    </volist>
                </div>
            </spf>
            <!--宣传图结束-->
            </div>
        </div>
        <!--5结束-->
        
    </div>
</div>
<!--外框结束-->

<!--底部开始-->
<div class="special_foot">
	<div class="special_foot1">
    	<h1><img src="{$config_siteurl}statics/special/aqfzgn/images/specia10.png" width="86" height="104" /></h1>
        <h2>
        	Copyright 2014 Guangan Police Security Bureau, All rights Reserve
            <br />版权所有：广安市公安局&nbsp;&nbsp;&nbsp;&nbsp;今日访问量：0001222&nbsp;&nbsp;&nbsp;&nbsp;总访问量：0001222<br />   蜀ICP备12001441号-1   技术支持： 四川速集实业集团有限公司   028-85480208
        </h2>
  </div>
</div>
<!--底部结束-->
</body>
</html>
