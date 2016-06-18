<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <link href="favicon.ico" rel="shortcut icon" />
    <link rel="canonical" href="{$config_siteurl}" />
    <title>警务资讯</title>
    <meta name="description" content="{$SEO['description']}" />
    <meta name="keywords" content="{$SEO['keyword']}" />
    <link href="{$config_siteurl}statics/themes/L1_Global/css/police-news.css" rel="stylesheet" type="text/css" />
    <script src="{$config_siteurl}statics/js/jquery.js" type="text/javascript"></script>
</head>
<body>
<!-- main-->
<div class="main">
    <!-- head-->
    <div class="head">
        <template file="Content/Mods/top_header.php" />
        <!--导航条-->
        <ul class="banner-nav">
            <a href="/"><li>首页</li></a>
            <a href="{:U('Content/Site/police_news')}"><li class="on">警务资讯</li></a>
            <a href="{:U('Content/Site/work_building')}"><li>办事大厅</li></a>
            <a href="{:U('Content/Site/sunshine_police')}"><li>阳光警务</li></a>
            <a href="#"><li>警民互动</li></a>
            <a href="#"><li>服务民生</li></a>
        </ul>
    </div>

    <!-- content-->
    <div class="content">
        <!-- 资讯概况-->
        <div class="survey-news">
            <div class="survey-content">
                <position action="position" posid="1" num="6">
                <div id="myjQuery" class="news-carousel">
                    <div id="myjQueryContent">
                        <volist name="data" id="vo">
                            <if condition="$i eq 1">
                                <div><a href="{$vo.data.url}" target="_blank"><img src="{$vo.data.thumb}" title="{$vo.data.title}"></a></div>
                            <else />
                                <div class="smask"><a href="{$vo.data.url}" target="_blank"><img src="{$vo.data.thumb}" title="{$vo.data.title}"></a></div>
                            </if>
                        </volist>
                    </div>
                    <ul id="myjQueryNav">
                        <volist name="data" id="vo">
                            <if condition="$i eq 1">
                                <li class="current"><img src="{$vo.data.thumb}" alt="{$vo.data.title}"/></li>
                            <else />
                                <li><img src="{$vo.data.thumb}" alt="{$vo.data.title}"/></li>
                            </if>
                        </volist>
                    </ul>
                </div>
                </position>
                <position action="position" posid="2" num="6">
                <div class="news-active">
                    <volist name="data" id="vo" offset="0" length="1">
                        <h3>{$vo.data.title|str_cut=###,16}</h3>
                        <p style="text-indent:2em;position:relative;height:70px;">
                            <span>{$vo.data.description|str_cut=###,54}</span>
                            <a href="{$vo.data.url}" style="position:absolute;right:4%;">[详细内容]</a>
                        </p>
                    </volist>
                    <div class="news-divline"></div>
                    <ul>
                        <volist name="data" id="vo" offset="1" length="5">
                            <li><a href="{$vo.data.url}">·{$vo.data.title|str_cut=###,20}</a></li>
                        </volist>
                    </ul>
                </div>
                </position>
            </div>
        </div>
        <script>
            jQuery(function($){
                var index = 0;
                var maximg = 6;
                //滑动导航改变内容
                $("#myjQueryNav li").hover(function(){
                    if(MyTime){
                        clearInterval(MyTime);
                    }
                    index  =  $("#myjQueryNav li").index(this);
                    MyTime = setTimeout(function(){
                        ShowjQueryFlash(index);
                        $('#myjQueryContent').stop();
                    } , 100);

                }, function(){
                    clearInterval(MyTime);
                    MyTime = setInterval(function(){
                        ShowjQueryFlash(index);
                        index++;
                        if(index==maximg){index=0;}
                    } , 3000);
                });
                //滑入 停止动画，滑出开始动画.
                $('#myjQueryContent').hover(function(){
                    if(MyTime){
                        clearInterval(MyTime);
                    }
                },function(){
                    MyTime = setInterval(function(){
                        ShowjQueryFlash(index);
                        index++;
                        if(index==maximg){index=0;}
                    } , 3000);
                });
                //自动播放
                var MyTime = setInterval(function(){
                    ShowjQueryFlash(index);
                    index++;
                    if(index==maximg){index=0;}
                } , 3000);
            });
            function ShowjQueryFlash(i) {
                $("#myjQueryContent div").eq(i).animate({opacity: 1},1000).css({"z-index": "1"}).siblings().animate({opacity: 0},1000).css({"z-index": "0"});
                $("#myjQueryNav li").eq(i).addClass("current").siblings().removeClass("current");
            }
        </script>

        <!-- 局长信箱-->
        <ul class="mail-connect">
            <li><a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/xinxiang_1.png" alt="局长信箱"/></a></li>
            <li><a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/xinxiang_2.png" alt="代表委员直通车"/></a></li>
            <li><a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/xinxiang_3.png" alt="警营风采"/></a></li>
            <li style="margin-right: 7px"><a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/xinxiang_4.png" alt="专题聚焦"/></a></li>
            <li style="margin:5px 0 0 0;"><a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/xinxiang_5.png" alt="警方视频"/></a></li>
        </ul>
        <!-- 资讯内容-->
        <div class="police-news">
            <div class="news-top">
                <div class="notice-news">
                    <h3>{:getCategory(2, 'catname')}</h3>
                    <a href="{:getCategory(2, 'url')}" class="more-news">更多>></a>
                    <ul type="square">
                        <content action="lists" catid="2" order="id DESC" num="10">
                            <volist name="data" id="vo">
                                <li>
                                    <a href="{$vo.url}" class="notice-news-con"><span>{$vo.title|str_cut=###,30}</span></a>
                                    <span class="notice-news-time">{$vo.updatetime|date='m-d',###}</span>
                                </li>
                            </volist>
                        </content>
                    </ul>
                </div>
                <div class="police-active">
                    <h3>{:getCategory(5, 'catname')}</h3>
                    <a href="{:getCategory(5, 'url')}" class="more-news">更多>></a>
                    <ul  type="square">
                        <content action="lists" catid="5" order="id DESC" num="10">
                            <volist name="data" id="vo">
                                <li>
                                    <a href="{$vo.url}" class="police-active-con">{$vo.title|str_cut=###,30}</a>
                                    <span class="police-active-time">{$vo.updatetime|date='m-d',###}</span>
                                </li>
                            </volist>
                        </content>
                    </ul>
                </div>
                <div class="police-case">
                    <h3>{:getCategory(9, 'catname')}</h3>
                    <a href="{:getCategory(9, 'url')}" class="more-news">更多>></a>
                    <ul  type="square">
                        <content action="lists" catid="9" order="id DESC" num="10">
                            <volist>
                                <li>
                                    <a href="{$vo.url}" class="police-case-con">{$vo.title|str_cut=###,18}</a>
                                    <span class="police-case-time">{$vo.updatetime|date='m-d',###}</span>
                                </li>
                            </volist>
                        </content>
                    </ul>
                </div>
                <div class="public-collect">
                    <h3>{:getCategory(3, 'catname')}</h3>
                    <a href="{:getCategory(3, 'url')}" class="more-news">更多>></a>
                    <ul  type="square">
                        <content action="lists" catid="10" order="id DESC" num="10">
                            <volist name="data" id="vo">
                                <li>
                                    <a href="{$vo.url}" class="public-collect-con">{$vo.title|str_cut=###,30}</a>
                                    <span class="public-collect-time">{$vo.updatetime|date='m-d',###}</span>
                                </li>
                            </volist>
                        </content>
                    </ul>
                </div>
                <div class="police-report">
                    <h3>{:getCategory(4, 'catname')}</h3>
                    <a href="{:getCategory(4, 'url')}" class="more-news">更多>></a>
                    <ul  type="square">
                        <content action="lists" catid="4" order="id DESC" num="10">
                            <volist name="data" id="vo">
                                <li>
                                    <a href="{$vo.url}" class="police-report-con">{$vo.title|str_cut=###,30}</a>
                                    <span class="police-report-time">{$vo.updatetime|date='m-d',###}</span>
                                </li>
                            </volist>
                        </content>
                    </ul>
                </div>
                <div class="police-video">
                    <h3>{:getCategory(7, 'catname')}</h3>
                    <a href="{:getCategory(7, 'url')}" class="more-news">更多>></a>
                    <content action="lists" catid="7" order="id DESC" num="1">
                        <volist name="data" id="vo">
                            <iframe src="{$vo.description}" allowfullscreen="" class="embed-responsive-item" frameborder="0" height="219" width="242"></iframe>
                        </volist>
                    </content>
                </div>
            </div>
            <div class="news-mid"><img src="{$config_siteurl}statics/themes/L1_Global/images/mid-logo-bg.png" alt=""/></div>
            <div class="news-bottom">
                <div class="police-report police-report-small">
                    <h3>{:getCategory(23, 'catname')}</h3>
                    <a href="{:getCategory(23, 'url')}" class="more-news">更多>></a>
                    <ul  type="square">
                        <content action="lists" catid="23" order="id DESC" num="8">
                            <volist name="data" id="vo">
                                <li>
                                    <a href="{$vo.url}" class="police-report-con">{$vo.title|str_cut=###,30}</a>
                                    <span class="police-report-time">{$vo.updatetime|date='m-d',###}</span>
                                </li>
                            </volist>
                        </content>
                    </ul>
                </div>
                <div class="police-report police-report-small">
                    <h3>{:getCategory(24, 'catname')}</h3>
                    <a href="{:getCategory(24, 'url')}" class="more-news">更多>></a>
                    <ul  type="square">
                        <content action="lists" catid="24" order="id DESC" num="8">
                            <volist name="data" id="vo">
                                <li>
                                    <a href="{$vo.url}" class="police-report-con">{$vo.title|str_cut=###,30}</a>
                                    <span class="police-report-time">{$vo.updatetime|date='m-d',###}</span>
                                </li>
                            </volist>
                        </content>
                    </ul>
                </div>
                <div class="fast-link">
                    <a href="#"><p style="background-image: url('/statics/themes/L1_Global/images/link1.png')">机构职能</p></a>
                    <a href="#"><p style="background-image: url('/statics/themes/L1_Global/images/link2.png')">领导简介</p></a>
                    <a href="#"><p style="background-image: url('/statics/themes/L1_Global/images/link3.png')">电子地图</p></a>
                </div>
            </div>
        </div>
        <script>
            jQuery(function($){
                var index = 0;
                var maximg = 5;
                //滑动导航改变内容
                $("#myjQueryNav li").hover(function(){
                    if(MyTime){
                        clearInterval(MyTime);
                    }
                    index  =  $("#myjQueryNav li").index(this);
                    MyTime = setTimeout(function(){
                        ShowjQueryFlash(index);
                        $('#myjQueryContent').stop();
                    } , 200);

                }, function(){
                    clearInterval(MyTime);
                    MyTime = setInterval(function(){
                        ShowjQueryFlash(index);
                        index++;
                        if(index==maximg){index=0;}
                    } , 3000);
                });
                //滑入 停止动画，滑出开始动画.
                $('#myjQueryContent').hover(function(){
                    if(MyTime){
                        clearInterval(MyTime);
                    }
                },function(){
                    MyTime = setInterval(function(){
                        ShowjQueryFlash(index);
                        index++;
                        if(index==maximg){index=0;}
                    } , 3000);
                });
                //自动播放
                var MyTime = setInterval(function(){
                    ShowjQueryFlash(index);
                    index++;
                    if(index==maximg){index=0;}
                } , 3000);
            });
            function ShowjQueryFlash(i) {
                $("#myjQueryContent div").eq(i).animate({opacity: 1},1000).css({"z-index": "1"}).siblings().animate({opacity: 0},1000).css({"z-index": "0"});
                $("#myjQueryNav li").eq(i).addClass("current").siblings().removeClass("current");
            }
        </script>
       <!-- 警营风采-->
        <div class="style-bg">
            <div class="police-style">
                <h3>{:getCategory(6, 'catname')}</h3>
                <a href="{:getCategory(6, 'url')}" class="more-news">更多>></a>
                <ul>
                    <content action="lists" catid="6" order="id DESC" num="10">
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
        <!-- footer-->
        <template file="Content/Mods/footer.php" />
    </div>
    <template file="Content/Mods/QR.php" />
    <template file="Content/Mods/quick_nav.php" />
    <template file="Content/utils.php" />
</div>
</body>
</html>
