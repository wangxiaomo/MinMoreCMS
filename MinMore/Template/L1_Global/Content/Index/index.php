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
    <div class="head">
        <template file="Content/Mods/top_header.php" />
        <!--导航条-->
        <ul class="banner-nav">
            <a href="/"><li class="on">首页</li></a>
            <a href="{:U('Content/Site/police_news')}"><li>警务资讯</li></a>
            <a href="{:U('Content/Site/work_building')}"><li>办事大厅</li></a>
            <a href="{:U('Content/Site/sunshine_police')}"><li>阳光警务</li></a>
            <a href="{:U('Content/Site/police_interaction')}"><li>警民互动</li></a>
            <a href="{:U('Content/Site/service_people')}"><li>服务民生</li></a>
        </ul>
    </div>
    <!-- content-->
    <div class="content">
        <!-- 警界资讯-->
        <div class="police-news">
            <!-- 公告公示-->
            <div class="news-title">
                <img src="{$config_siteurl}statics/themes/L1_Global/images/news-logo.png" alt="新闻" class="title-child"/>
                <span class="title-child">公示公告：</span>
                <marquee behavior="scroll" direction="left" width="600" hight="20" vspace="12" hspace="20" onmouseover=this.stop()
                         scrollamount="4" scrolldelay="5"  onmouseout=this.start() class="title-child slider">
                    <content action="lists" catid="2" order="id DESC" num="6">
                        <volist name="data" id="vo">
                            <a href="{$vo.url}">{$vo.title}</a>
                        </volist>
                    </content>
                </marquee>
                <a href="{:getCategory(2, 'url')}" class="title-child" style="margin-top: 13px">更多>></a>
            </div>
            <script></script>
            <!-- 资讯内容-->
            <div class="news-content">
                <position action="position" posid="1" num="6">
                <div id="myjQuery" class="news-carousel">
                    <position action="position" posid="1" num="6">
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
                    </position>
                </div>
                </position>
                <position action="position" posid="2" num="6">
                <div class="news-active">
                    <volist name="data" id="vo" offset="0" length="1">
                        <h3>{$vo.data.title|str_cut=###,16}</h3>
                        <p style="position:relative;height:70px;overflow:hidden;">
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

        <!-- 局长信箱-->
        <ul class="mail-connect">
            <li><a href="{:U('DirectorMail/Index/add')}"><img src="{$config_siteurl}statics/themes/L1_Global/images/xinxiang_1.png" alt="局长信箱"/></a></li>
            <li><a href="{:U('DirectorMail/Membermail/add')}"><img src="{$config_siteurl}statics/themes/L1_Global/images/xinxiang_2.png" alt="代表委员直通车"/></a></li>
            <li><a href="{:U('DirectorMail/Consult/add', array('type'=>'wszx'))}"><img src="{$config_siteurl}statics/themes/L1_Global/images/zixun.png" alt="网上咨询"/></a></li>
            <li style="margin-right: 7px"><a href="{:U('DirectorMail/Consult/add', array('type'=>'qzts'))}"><img src="{$config_siteurl}statics/themes/L1_Global/images/tousu.png" alt="群众投诉"/></a></li>
            <li style="margin:10px 0"><a href="#" class="disabled-link"><img src="{$config_siteurl}statics/themes/L1_Global/images/zhuantijujiao.png" alt="专题聚焦"/></a></li>
        </ul>
        <!-- 办事大厅-->
        <div class="work-build">
            <div class="work-build-top"></div>
            <div class="work-build-con">
                <div class="work-view">
                    <ul class="view-list" style="background-image: url('{$config_siteurl}statics/themes/L1_Global/images/view-bgs.png')">
                        <li class="imgOn" style="background-image: url('{$config_siteurl}statics/themes/L1_Global/images/other_0001.png')"></li>
                        <li style="background-image: url('{$config_siteurl}statics/themes/L1_Global/images/other_0002.png')"></li>
                        <li style="background-image: url('{$config_siteurl}statics/themes/L1_Global/images/other_0003.png')"></li>
                    </ul>
                </div>
                <div class="welcome">
                    <ul>
                        <li>您好, 很高兴<br/>&nbsp;&nbsp;&nbsp;为您服务!&nbsp;</li>
                        <li>您好, 很高兴<br/>&nbsp;&nbsp;&nbsp;为您服务!&nbsp;</li>
                        <li>您好, 很高兴<br/>&nbsp;&nbsp;&nbsp;为您服务!&nbsp;</li>
                        <li>您好, 很高兴<br/>&nbsp;&nbsp;&nbsp;为您服务!&nbsp;</li>
                        <li>您好, 很高兴<br/>&nbsp;&nbsp;&nbsp;为您服务!&nbsp;</li>
                        <li>您好, 很高兴<br/>&nbsp;&nbsp;&nbsp;为您服务!&nbsp;</li>
                        <li>您好, 很高兴<br/>&nbsp;&nbsp;&nbsp;为您服务!&nbsp;</li>
                        <li>您好, 很高兴<br/>&nbsp;&nbsp;&nbsp;为您服务!&nbsp;</li>
                        <li>您好, 很高兴<br/>&nbsp;&nbsp;&nbsp;为您服务!&nbsp;</li>
                    </ul>
                </div>
                <div class="work-area">
                    <ul>
                        <li class="churujing"><a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=11"></a></li>
                        <li class="jindu"><a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=14"></a></li>
                        <li class="fazhi"><a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=15"></a></li>
                        <li class="huzheng"><a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=9"></a></li>
                        <li class="jianguan"><a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=16"></a></li>
                        <li class="jiaojing"><a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=12"></a></li>
                        <li class="wangjian"><a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=13"></a></li>
                        <li class="zhian"><a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=10"></a></li>
                        <li class="xiaofang"><a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=17"></a></li>
                    </ul>
                </div>
                <div class="work-prev"> < </div>
                <div class="work-next"> > </div>
            </div>
        </div>
        <script>
            //  ----------背景轮播-------------
            var viewIndex = 0;
            setInterval(function () {
                if (viewIndex < $(".view-list li").length - 1) {
                    viewIndex++;
                } else {
                    viewIndex = 0;
                }
                viewChangeTo(viewIndex);
            }, 7000);
            function viewChangeTo(num) {
                $(".view-list").find("li").removeClass("imgOn").hide().eq(num).fadeIn(2000).addClass("imgOn");
            }
            //----------欢迎显示---------
            var welTimer;
            function welCaurousel(){
                var $ul = $(".welcome").find("ul");
                var $lis = $ul.children("li");
                var width = $lis.eq(0).width() + 26;
                welTimer = setInterval(function () {
                            $ul.animate({
                                        'margin-left': '-' + width + 'px'
                                    },
                                    2000,
                                    function () {
                                        $ul.css({'margin-left': 0}).
                                                children('li').
                                                last().
                                                after(
                                                $ul.children('li').first()
                                        );
                                    });
                        }, 4000
                );
            }
            welCaurousel();
            $(".work-area li").hover(function () {
                        var welIndex = $(this).index();
                        $(".welcome li").eq(welIndex).css("visibility", "visible")
                    }, function () {
                        var welIndex = $(this).index();
                        $(".welcome li").eq(welIndex).css("visibility", "hidden")
                    }
            );
            //-------------大厅轮播------------
            var workTimer;
            function workCaurousel() {
                var $ul = $(".work-area").find("ul");
                var $lis = $ul.children("li");
                var width = $lis.eq(0).width() + 26;
                workTimer = setInterval(function () {
                            $ul.animate({
                                        'margin-left': '-' + width + 'px'
                                    },
                                    2000,
                                    function () {
                                        $ul.css({'margin-left': 0}).
                                                children('li').
                                                last().
                                                after(
                                                $ul.children('li').first()
                                        );
                                    });
                        }, 4000
                );
            }
            workCaurousel();
            $(".work-area").hover(function () {
                clearInterval(workTimer);
                clearInterval(welTimer);
            }, function () {
                workCaurousel();
                welCaurousel();
            });
            //---------前进-----------
            $(".work-next").hover(function () {
                var $ul = $(".work-area").find("ul");
                var $lis = $ul.children("li");
                var width = $lis.eq(0).width() + 26;
                clearInterval(workTimer);
                clearInterval(welTimer);
                $(this).unbind('click').click(function () {
                    $ul.stop(false, true).animate();
                    $ul.animate({
                                'margin-left': '-' + width + 'px'
                            },
                            2000,
                            function () {
                                $ul.css({'margin-left': 0}).
                                        children('li').
                                        last().
                                        after(
                                        $ul.children('li').first()
                                );
                            }
                    );
                })
            }, function () {
                workCaurousel();
                welCaurousel();
            });
            //-------------后退-------------
            $(".work-prev").hover(function () {
                var $ul = $(".work-area").find("ul");
                var $lis = $ul.children("li");
                var width = $lis.eq(0).width() + 26;
                clearInterval(workTimer);
                clearInterval(welTimer);
                $(this).unbind("click").click(function () {
                    $ul.stop(false, true).animate();
                    $ul.css({'margin-left': '-' + width + 'px'}).
                            children('li').
                            first().
                            before(
                            $ul.children('li').last()
                    );
                    $ul.animate({
                                'margin-left': 0
                            },
                            2000
                    );
                })
            }, function () {
                workCaurousel();
                welCaurousel();
            });
        </script>
        <!-- 特色服务-->
        <div class="feature-service">
            <div class="build-bottom-logo"></div>
            <img src="{$config_siteurl}statics/themes/L1_Global/images/tesefuwu_1.png" alt="" class="feature-menu"/>
            <img src="{$config_siteurl}statics/themes/L1_Global/images/tesefuwu_left.png" alt="" class="bianmin-lbtn" style="margin: 15px 0 0 20px"/>
            <div class="service-menu">
                <ul>
                    <li style="background-image:url('{$config_siteurl}statics/themes/L1_Global/images/bianmin_1.png')">
                        <img src="{$config_siteurl}statics/themes/L1_Global/images/banshichaxun.png" alt="办事查询" style="margin-top: 13px"/><br/>
                        <a href="#" class="disabled-link">办事查询</a>
                    </li>
                    <li style="background-image:url('{$config_siteurl}statics/themes/L1_Global/images/bianmin_2.png')">
                        <img src="{$config_siteurl}statics/themes/L1_Global/images/bianminfuwu.png" alt="便民服务"/><br/>
                        <a href="{:U('Content/Site/service_people')}">便民服务</a>
                    </li>
                    <li style="background-image:url('{$config_siteurl}statics/themes/L1_Global/images/bianmin_3.png')">
                        <img src="{$config_siteurl}statics/themes/L1_Global/images/shiwuzhaoling.png" alt="失物招领" style="margin-left: 25px"/><br/>
                        <a href="{:getCategory(18,'url')}">{:getCategory(18,'catname')}</a>
                    </li>
                    <li style="background-image:url('{$config_siteurl}statics/themes/L1_Global/images/bianmin_4.png')">
                        <img src="{$config_siteurl}statics/themes/L1_Global/images/xunrenqishi.png" alt="寻人启事"/><br/>
                        <a href="{:getCategory(19,'url')}">{:getCategory(19,'catname')}</a>
                    </li>
                    <li style="background-image:url('{$config_siteurl}statics/themes/L1_Global/images/bianmin_5.png')">
                        <img src="{$config_siteurl}statics/themes/L1_Global/images/dianziditu.png" alt="电子地图"/><br/>
                        <a href="http://j.map.baidu.com/yc88C">电子地图</a>
                    </li>
                    <li style="background-image:url('{$config_siteurl}statics/themes/L1_Global/images/bianmin_6.png')">
                        <img src="{$config_siteurl}statics/themes/L1_Global/images/jingfangtishi.png" alt="警方提示" style="margin-top: 13px"/><br/>
                        <a href="{:getCategory(3,'url')}">{:getCategory(3,'catname')}</a>
                    </li>
                    <li style="background-image:url('{$config_siteurl}statics/themes/L1_Global/images/bianmin_7.png')">
                        <img src="{$config_siteurl}statics/themes/L1_Global/images/wangshangxinfang.png" alt="网上信访"/><br/>
                        <a href="{:U('DirectorMail/Onlinepetition/add')}">网上信访</a>
                    </li>
                </ul>
            </div>
            <img src="{$config_siteurl}statics/themes/L1_Global/images/tesefuwu_right.png" alt="" class="bianmin-rbtn" style="margin-top: 15px"/>
            <script>
                $(".service-menu li").hover(function(){
                    $(this).css("margin-top","0")
                },function(){
                    $(this).css("margin-top","5px")
                });
                var timer;
                function servicecaurousel(){
                    var $ul = $(".service-menu").find("ul");
                    var $lis = $ul.children("li");
                    var width = $lis.eq(0).width() + 40;
                    timer = setInterval(function(){
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
                servicecaurousel();
                $(function(){
                    $(".service-menu li").hover(function(){
                        clearInterval(timer);
                    },function(){
                        servicecaurousel()
                    });
                });
                //---------前进-----------
                $(".bianmin-rbtn").hover(function(){
                    var $ul = $(".service-menu").find("ul");
                    var $lis = $ul.children("li");
                    var width = $lis.eq(0).width() + 40;
                    clearInterval(timer);
                    $(this).unbind('click').click(function(){
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
                                }
                        );
                    })
                },function(){
                    servicecaurousel()
                });
                //-------------后退-------------
                $(".bianmin-lbtn").hover(function(){
                    var $ul = $(".service-menu").find("ul");
                    var $lis = $ul.children("li");
                    var width = $lis.eq(0).width() + 40;
                    clearInterval(timer);
                    $(this).unbind('click').click(function(){
                        $ul.css({'margin-left':'-'+ width +'px'}).
                                children('li').
                                first().
                                before(
                                $ul.children('li').last()
                        );
                        $ul.animate({
                                    'margin-left':0
                                },
                                2000
                        );
                    })
                },function(){
                    servicecaurousel()
                });

            </script>
            <!-- 阳光警务-->
            <div class="sunshine-police">
                <a href="{:getCategory(25,'url')}"><img src="{$config_siteurl}statics/themes/L1_Global/images/sunshine-menu1.png" alt=""/></a>
                <a href="{:getCategory(29,'url')}"><img src="{$config_siteurl}statics/themes/L1_Global/images/sunshine-menu2.png" alt=""/></a>
                <a href="{:getCategory(31,'url')}"><img src="{$config_siteurl}statics/themes/L1_Global/images/sunshine-menu3.png" alt=""/></a>
                <a href="{:getCategory(33,'url')}"><img src="{$config_siteurl}statics/themes/L1_Global/images/sunshine-menu4.png" alt=""/></a>
                <a href="{:U('Content/Site/alarm_query')}"><img src="{$config_siteurl}statics/themes/L1_Global/images/sunshine-menu5.png" alt=""/></a>
                <a href="{:U('Content/Site/case_query')}"><img src="{$config_siteurl}statics/themes/L1_Global/images/sunshine-menu6.png" alt=""/></a>
                <a href="{:U('Content/Site/order_query')}"><img src="{$config_siteurl}statics/themes/L1_Global/images/sunshine-menu7.png" alt=""/></a>
                <a href="http://sc.122.gov.cn/views/inquiry.html"><img src="{$config_siteurl}statics/themes/L1_Global/images/sunshine-menu8.png" alt=""/></a>
            </div>
            <div class="interaction">
                <a href="{:U('DirectorMail/Consult/add', array('type'=>'jyxc'))}"><img src="{$config_siteurl}statics/themes/L1_Global/images/interaction1.png" alt=""/></a>
                <a href="{:U('DirectorMail/Consult/add', array('type'=>'qzts'))}"><img src="{$config_siteurl}statics/themes/L1_Global/images/interaction2.png" alt=""/></a>
                <a href="{:U('DirectorMail/Consult/add', array('type'=>'wsjb'))}"><img src="{$config_siteurl}statics/themes/L1_Global/images/interaction3.png" alt=""/></a>
                <a href="{:U('DirectorMail/Consult/add', array('type'=>'wszx'))}"><img src="{$config_siteurl}statics/themes/L1_Global/images/interaction4.png" alt=""/></a>
            </div>
        </div>
        <template file="Content/Mods/footer.php" />
    </div>
    <template file="Content/Mods/QR.php"/>
    <template file="Content/Mods/AD.php"/>
    <template file="Content/Mods/quick_nav.php"/>
    <template file="Content/utils.php"/>
</div>
</body>
</html>
