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
    <script type="text/javascript" src="{$config_siteurl}statics/special/aqfzgn/js/fxsc.js"></script><!--轮播图-->
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
<div class="specialer_main2">
	<div class="specialer_main_center2">
    	<!--左边开始-->
        <div class="list_left">
        	<!--位置开始-->
            <div class="list_top">您所在的位置 > <a href="{$config_siteurl}">{$Config.sitename}</a> &gt; {$name}</div>
            <!--位置结束-->
            
            <!--内容开始-->
            <div class="list_list">
				<!--标题开始-->
              <div class="special_show">
                <div class="show_tites">{$title}</div>
                    <div class="show_tites2">
                      <div class="list_rq">编辑日期：<span class="colr_h">{$vo.updatetime|date="Y-m-d",###}</span></div>
                        <div class="list_ly">来源：<span class="colr_h">本站提供</span></div>
                        <!--<div class="list_rs"><span class="colr_sise">访问人数：880</span></div>-->
                    </div>
                </div>
                <!--标题结束-->
                
                <!--详情内容开始-->
                <div class="show_cont">
                    {$content}
                </div>
                <!--详情内容结束-->
                
            </div>
            <!--内容结束-->
        </div>
        <!--左边结束-->
        
        <!--右边开始-->
        <div class="list_right">
            <!--收藏分享开始-->
            <div class="scfx">
                <div class="rbtn-top">
                    <div class="Lbtn">
                        <div class="rbtn-fav">
                            <a href="javscript:window.external.AddFavorite('http://www.gajjw.gov.cn/', '广安交警网')" rel="nofollow" title="一键收藏" class="btn">收藏</a>
                        </div>
                    </div>
                <div class="Rbtn">
                        <div class="rbtn-share">
                            <a href="javascript:void(0);" rel="nofollow" title="一键分享" class="btn">分享</a>
                            <div class="droplist hide">
                                <!-- Baidu Button BEGIN -->
                                <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
                                <a class="bds_qzone"></a>
                                <a class="bds_tsina"></a>
                                <a class="bds_tqq"></a>
                                <a class="bds_renren"></a>
                                <a class="bds_t163"></a>
                                <span class="bds_more">更多</span>
                                <a class="shareCount"></a>
                                </div>
                                <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=5714845" ></script>
                                <script type="text/javascript" id="bdshell_js"></script>
                                <script type="text/javascript">
                                document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
                                </script>
                                <!-- Baidu Button END -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--收藏分享结束-->
        
            <!--战果通报开始-->
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
            <!--战果通报结束-->
            
            <!--新媒体平台关注开始-->
            <div class="list_right1">
                <!--头部开始-->
                <div class="list_right_top2">新媒体平台关注</div>
                <!--头部结束-->
                <!--二维码开始-->
                <div class="list_right_xiaer">
                    <!--关注微博开始 -->
                    <div class="list_right_xiaer1">
                        <div class="list_right_xiaer1_left">
                            <h1>扫描二维码关注官方微博</h1>
                            <h2><img src="{$config_siteurl}statics/special/aqfzgn/images/specia_er12.jpg" width="93" height="106" /></h2>
                        </div>
                        <div class="list_right_xiaer1_right"><img src="{$config_siteurl}statics/special/aqfzgn/images/specia_er14.jpg" width="93" height="157" /></div>
                    </div>
                    <!--关注微博结束 -->
                    <!--关注微信开始 -->
                    <div class="list_right_xiaer1">
                        <div class="list_right_xiaer1_left">
                            <h1>扫描二维码关注官方微信</h1>
                            <h2><img src="{$config_siteurl}statics/special/aqfzgn/images/specia_er13.jpg" width="93" height="106" /></h2>
                        </div>
                        <div class="list_right_xiaer1_right"><img src="{$config_siteurl}statics/special/aqfzgn/images/specia_er15.jpg" width="93" height="157" /></div>
                    </div>
                    <!--关注微信结束 -->
                </div>
                <!--二维码开始-->
             </div>
             <!--新媒体平台关注开始-->
        </div>
        <!--右边结束-->
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
