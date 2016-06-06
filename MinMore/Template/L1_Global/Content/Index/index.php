<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
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
    <!-- content-->
    <div class="content">
        <template file="Content/Mods/top_header.php" />
        <!--导航条-->
        <ul class="banner-nav">
            <a href="#"><li class="on">首页</li></a>
            <a href="{:U('Content/Site/police_news')}"><li>警务资讯</li></a>
            <a href="{:U('Content/Site/work_building')}"><li>办事大厅</li></a>
            <a href="{:U('Content/Site/sunshine_police')}"><li>阳光警务</li></a>
            <a href="#"><li>警民互动</li></a>
            <a href="#"><li>服务民生</li></a>
        </ul>

        <!-- 警界资讯-->
        <div class="police-news">
            <!-- 公告公示-->
            <div class="news-title">
                <img src="{$config_siteurl}statics/themes/L1_Global/images/news-logo.png" alt="新闻" class="title-child"/>
                <span class="title-child">公示公告：</span>
                <marquee behavior="scroll" direction="left" width="600" hight="20" vspace="12" hspace="20" onmouseover=this.stop()
                         scrollamount="4" scrolldelay="5"  onmouseout=this.start() class="title-child">
                    <a href="#">交通技术监控设备点位清单</a>
                    <a href="#">部分交通违法行为</a>
                    <a href="#">交通技术监控设备点位清单</a>
                    <a href="#">部分交通违法行为</a>
                    <a href="#">交通技术监控设备点位清单</a>
                    <a href="#">部分交通违法行为</a>
                </marquee>
                <a href="#" class="title-child" style="margin-top: 13px">更多>></a>
            </div>
            <script></script>
            <!-- 资讯内容-->
            <div class="news-content">
                <div id="myjQuery" class="news-carousel">
                    <div id="myjQueryContent">
                        <div><a href="#" target="_blank"><img src="{$config_siteurl}statics/themes/L1_Global/images/news-caurousel1.png" title=""></a></div>
                        <div class="smask"><a href="#" target="_blank"><img src="{$config_siteurl}statics/themes/L1_Global/images/news-caurousel2.png" title=""></a></div>
                        <div class="smask"><a href="#" target="_blank"><img src="{$config_siteurl}statics/themes/L1_Global/images/news-caurousel3.png" title=""></a></div>
                        <div class="smask"><a href="#" target="_blank"><img src="{$config_siteurl}statics/themes/L1_Global/images/news-caurousel4.png" title="2016全市公安工作会议"></a></div>
                        <div class="smask"><a href="#" target="_blank"><img src="{$config_siteurl}statics/themes/L1_Global/images/news-caurousel5.png" title="公安机关深化‘一村（格）一警’工作"></a></div>
                    </div>
                    <ul id="myjQueryNav">
                        <li class="current" style="margin-left: 70px"><img src="{$config_siteurl}statics/themes/L1_Global/images/news-caurousel1.png" alt=""/></li>
                        <li><img src="{$config_siteurl}statics/themes/L1_Global/images/news-caurousel2.png" alt=""/></li>
                        <li><img src="{$config_siteurl}statics/themes/L1_Global/images/news-caurousel3.png" alt=""/></li>
                        <li><img src="{$config_siteurl}statics/themes/L1_Global/images/news-caurousel4.png" alt=""/></li>
                        <li><img src="{$config_siteurl}statics/themes/L1_Global/images/news-caurousel5.png" alt=""/></li>
                    </ul>
                </div>
                <div class="news-active">
                    <h3>市公安局开展重温入党誓词主题活动</h3>
                    <p>
                        <span>&nbsp;&nbsp;为扎实推进公安机关“两学一做”学习教育，5月6日上午，市公安局组织机关党员民警到邓小平故居开展重温入党誓词活动....</span>
                        <a href="#">[详细内容]</a>
                    </p>
                    <div class="news-divline"></div>
                    <ul>
                        <li><a href="#">·市公安局在车管中心举行升国旗仪式</a></li>
                        <li><a href="#">·市公安局在车管中心举行升国旗仪式</a></li>
                        <li><a href="#">·市公安局在车管中心举行升国旗仪式</a></li>
                        <li><a href="#">·市公安局在车管中心举行升国旗仪式</a></li>
                        <li><a href="#">·市公安局在车管中心举行升国旗仪式</a></li>
                    </ul>
                    <a href="#" class="news-more">更多>></a>
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

        <!-- 局长信箱-->
        <ul class="mail-connect">
            <li><a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/xinxiang_1.png" alt="局长信箱"/></a></li>
            <li><a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/xinxiang_2.png" alt="代表委员直通车"/></a></li>
            <li><a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/xinxiang_3.png" alt="警营风采"/></a></li>
            <li style="margin-right: 7px"><a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/xinxiang_4.png" alt="专题聚焦"/></a></li>
            <li style="margin:10px 0"><a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/xinxiang_5.png" alt="警方视频"/></a></li>
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
                <div class="work-area">
                    <ul>
                        <li class="churujing"><a href="#"></a></li>
                        <li class="jindu"><a href="#"></a></li>
                        <li class="fazhi"><a href="#"></a></li>
                        <li class="huzheng"><a href="#"></a></li>
                        <li class="jianguan"><a href="#"></a></li>
                        <li class="jiaojing"><a href="#"></a></li>
                        <li class="wangjian"><a href="#"></a></li>
                        <li class="zhian"><a href="#"></a></li>
                        <li class="xiaofang"><a href="#"></a></li>
                    </ul>
                </div>
                <div class="work-prev"> < </div>
                <div class="work-next"> > </div>
            </div>
        </div>
        <script>
            //  ----------背景轮播-------------
            var viewIndex = 0;
            setInterval(function(){
                if(viewIndex < $(".view-list li").length-1){
                    viewIndex ++;
                }else{
                    viewIndex = 0;
                }
                viewChangeTo(viewIndex);
            },7000);
            function viewChangeTo(num){
                $(".view-list").find("li").removeClass("imgOn").hide().eq(num).fadeIn(2000).addClass("imgOn");
            }
            //-------------大厅轮播------------
            var workTimer;
            function workCaurousel(){
                var $ul = $(".work-area").find("ul");
                var $lis = $ul.children("li");
                var width = $lis.eq(0).width() + 26;
                workTimer = setInterval(function(){
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
            workCaurousel();
            $(".work-area").hover(function(){
                clearInterval(workTimer);
            },function(){
                workCaurousel()
            });
            //---------前进-----------
            $(".work-next").hover(function(){
                var $ul = $(".work-area").find("ul");
                var $lis = $ul.children("li");
                var width = $lis.eq(0).width() + 26;
                clearInterval(workTimer);
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
                workCaurousel()
            });
            //                //-------------后退-------------
            $(".work-prev").hover(function(){
                var $ul = $(".work-area").find("ul");
                var $lis = $ul.children("li");
                var width = $lis.eq(0).width() + 26;
                clearInterval(workTimer);
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
                workCaurousel()
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
                        <a href="#">办事查询</a>
                    </li>
                    <li style="background-image:url('{$config_siteurl}statics/themes/L1_Global/images/bianmin_2.png')">
                        <img src="{$config_siteurl}statics/themes/L1_Global/images/bianminfuwu.png" alt="便民服务"/><br/>
                        <a href="#">便民服务</a>
                    </li>
                    <li style="background-image:url('{$config_siteurl}statics/themes/L1_Global/images/bianmin_3.png')">
                        <img src="{$config_siteurl}statics/themes/L1_Global/images/shiwuzhaoling.png" alt="失物招领" style="margin-left: 25px"/><br/>
                        <a href="#">失物招领</a>
                    </li>
                    <li style="background-image:url('{$config_siteurl}statics/themes/L1_Global/images/bianmin_4.png')">
                        <img src="{$config_siteurl}statics/themes/L1_Global/images/xunrenqishi.png" alt="寻人启事"/><br/>
                        <a href="#">寻人启事</a>
                    </li>
                    <li style="background-image:url('{$config_siteurl}statics/themes/L1_Global/images/bianmin_5.png')">
                        <img src="{$config_siteurl}statics/themes/L1_Global/images/dianziditu.png" alt="电子地图"/><br/>
                        <a href="#">电子地图</a>
                    </li>
                    <li style="background-image:url('{$config_siteurl}statics/themes/L1_Global/images/bianmin_6.png')">
                        <img src="{$config_siteurl}statics/themes/L1_Global/images/jingfangtishi.png" alt="警方提示" style="margin-top: 13px"/><br/>
                        <a href="#">警方提示</a>
                    </li>
                    <li style="background-image:url('{$config_siteurl}statics/themes/L1_Global/images/bianmin_7.png')">
                        <img src="{$config_siteurl}statics/themes/L1_Global/images/wangshangxinfang.png" alt="网上信访"/><br/>
                        <a href="#">网上信访</a>
                    </li>
                    <li style="background-image:url('{$config_siteurl}statics/themes/L1_Global/images/bianmin_1.png')">
                        <img src="{$config_siteurl}statics/themes/L1_Global/images/jingfangtishi.png" alt="警方提示" style="margin-top: 13px"/><br/>
                        <a href="#">警方提示</a>
                    </li>
                    <li style="background-image:url('{$config_siteurl}statics/themes/L1_Global/images/bianmin_2.png')">
                        <img src="{$config_siteurl}statics/themes/L1_Global/images/wangshangxinfang.png" alt="网上信访"/><br/>
                        <a href="#">网上信访</a>
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
                <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/sunshine-menu1.png" alt=""/></a>
                <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/sunshine-menu2.png" alt=""/></a>
                <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/sunshine-menu3.png" alt=""/></a>
                <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/sunshine-menu4.png" alt=""/></a>
                <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/sunshine-menu5.png" alt=""/></a>
                <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/sunshine-menu6.png" alt=""/></a>
                <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/sunshine-menu7.png" alt=""/></a>
                <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/sunshine-menu8.png" alt=""/></a>
            </div>
            <div class="interaction">
                <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/interaction1.png" alt=""/></a>
                <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/interaction2.png" alt=""/></a>
                <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/interaction3.png" alt=""/></a>
                <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/interaction4.png" alt=""/></a>
            </div>
        </div>
        <!-- 底部链接-->
        <div class="bottom-content">
            <div class="bottom-branch">
                <p>县分局子站 >>></p>
                <a href="#">广安区</a
                        ><a href="#">前锋区</a
                    ><a href="#">华蓥市</a
                    ><a href="#">邻水县</a
                    ><a href="#">岳池县</a
                    ><a href="#">武胜县</a>
            </div>
            <div class="friendly-link">
                <p>友情链接：</p>
                <ul>
                    <li>全国公安网</li>
                    <li>四川省公安网</li>
                    <li>省部门网站</li>
                    <li style="background: #f0f0f0">相关单位</li>
                    <li>广安旅游网</li>
                </ul>
            </div>
            <div class="link-content">
                <a href="#">人民公安报</a>
                <a href="#">中国普法网</a>
                <a href="#">365安全防范网</a>
                <a href="#">广安市保安协会</a>
                <a href="#">广安视窗</a>
                <a href="#">广安社区服务网</a>
            </div>
            <div class="introduce-info">
                <p>
                    丨 <a href="#">首页</a> 丨<a href="#">关于我们</a> 丨<a href="#">网站声明</a> 丨<a href="#">联系我们</a> 丨
                </p>
                <p>Copyright 2014 Guangan Police Security Bureau, All rights Reserve</p>
                <p>版权所有：广安市公安局  &nbsp;蜀ICP备12001441号-1 &nbsp;技术支持：四川速集实业集团有限公司 &nbsp;028-6643654</p>
            </div>
        </div>
    </div>
    <template file="Content/Mods/QR.php"/>
    <template file="Content/Mods/quick_nav.php"/>
    <template file="Content/utils.php"/>
</div>
</body>
</html>
