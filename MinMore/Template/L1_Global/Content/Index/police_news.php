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
            <a href="#"><li style="background: #e5840d;padding: 0 2px">警务资讯</li></a>
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
                <div id="myjQuery" class="news-carousel">
                    <div id="myjQueryContent">
                        <div><a href="#" target="_blank"><img src="{$config_siteurl}statics/themes/L1_Global/images/news-caurousel1.png" title="公安大会"></a></div>
                        <div class="smask"><a href="#" target="_blank"><img src="{$config_siteurl}statics/themes/L1_Global/images/news-caurousel2.png" title="赃物发还"></a></div>
                        <div class="smask"><a href="#" target="_blank"><img src="{$config_siteurl}statics/themes/L1_Global/images/news-caurousel3.png" title="'两学一做'工作回忆"></a></div>
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
                    <h3>公示公告</h3>
                    <a href="#" class="more-news">更多>></a>
                    <ul type="square">
                        <li>
                            <a href="#" class="notice-news-con"><span>广安交警夜查“酒驾”</span></a>
                            <span class="notice-news-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="notice-news-con">广安交警夜查“酒驾”</a>
                            <span class="notice-news-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="notice-news-con">广安交警夜查“酒驾”</a>
                            <span class="notice-news-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="notice-news-con">广安交警夜查“酒驾”</a>
                            <span class="notice-news-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="notice-news-con">广安交警夜查“酒驾”</a>
                            <span class="notice-news-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="notice-news-con">广安交警夜查“酒驾”</a>
                            <span class="notice-news-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="notice-news-con">广安交警夜查“酒驾”</a>
                            <span class="notice-news-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="notice-news-con">广安交警夜查“酒驾”</a>
                            <span class="notice-news-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="notice-news-con">广安交警夜查“酒驾”</a>
                            <span class="notice-news-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="notice-news-con">广安交警夜查“酒驾”</a>
                            <span class="notice-news-time">05-10</span>
                        </li>
                    </ul>
                </div>
                <div class="police-active">
                    <h3>警务动态</h3>
                    <a href="#" class="more-news">更多>></a>
                    <ul  type="square">
                        <li>
                            <a href="#" class="police-active-con">前锋区公安局分局圆满完成2016年辅警“轮换”</a>
                            <span class="police-active-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="police-active-con">前锋区公安局分局圆满完成2016年辅警“轮换”</a>
                            <span class="police-active-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="police-active-con">前锋区公安局分局圆满完成2016年辅警“轮换”</a>
                            <span class="police-active-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="police-active-con">前锋区公安局分局圆满完成2016年辅警“轮换”</a>
                            <span class="police-active-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="police-active-con">前锋区公安局分局圆满完成2016年辅警“轮换”</a>
                            <span class="police-active-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="police-active-con">前锋区公安局分局圆满完成2016年辅警“轮换”</a>
                            <span class="police-active-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="police-active-con">前锋区公安局分局圆满完成2016年辅警“轮换”</a>
                            <span class="police-active-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="police-active-con">前锋区公安局分局圆满完成2016年辅警“轮换”</a>
                            <span class="police-active-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="police-active-con">前锋区公安局分局圆满完成2016年辅警“轮换”</a>
                            <span class="police-active-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="police-active-con">前锋区公安局分局圆满完成2016年辅警“轮换”</a>
                            <span class="police-active-time">05-10</span>
                        </li>
                    </ul>
                </div>
                <div class="police-case">
                    <h3>案侦快讯</h3>
                    <a href="#" class="more-news">更多>></a>
                    <ul  type="square">
                        <li>
                            <a href="#" class="police-case-con">广安交警夜查“酒驾”</a>
                            <span class="police-case-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="police-case-con">广安交警夜查“酒驾”</a>
                            <span class="police-case-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="police-case-con">广安交警夜查“酒驾”</a>
                            <span class="police-case-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="police-case-con">广安交警夜查“酒驾”</a>
                            <span class="police-case-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="police-case-con">广安交警夜查“酒驾”</a>
                            <span class="police-case-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="police-case-con">广安交警夜查“酒驾”</a>
                            <span class="police-case-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="police-case-con">广安交警夜查“酒驾”</a>
                            <span class="police-case-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="police-case-con">广安交警夜查“酒驾”</a>
                            <span class="police-case-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="police-case-con">广安交警夜查“酒驾”</a>
                            <span class="police-case-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="police-case-con">广安交警夜查“酒驾”</a>
                            <span class="police-case-time">05-10</span>
                        </li>
                    </ul>
                </div>
                <div class="public-collect">
                    <h3>民意征集</h3>
                    <a href="#" class="more-news">更多>></a>
                    <ul  type="square">
                        <li>
                            <a href="#" class="public-collect-con">副市长、公安局局长邓文国到广安区白马进行视察</a>
                            <span class="public-collect-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="public-collect-con">副市长、公安局局长邓文国到广安区白马进行视察</a>
                            <span class="public-collect-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="public-collect-con">副市长、公安局局长邓文国到广安区白马进行视察</a>
                            <span class="public-collect-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="public-collect-con">副市长、公安局局长邓文国到广安区白马进行视察</a>
                            <span class="public-collect-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="public-collect-con">副市长、公安局局长邓文国到广安区白马进行视察</a>
                            <span class="public-collect-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="public-collect-con">副市长、公安局局长邓文国到广安区白马进行视察</a>
                            <span class="public-collect-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="public-collect-con">副市长、公安局局长邓文国到广安区白马进行视察</a>
                            <span class="public-collect-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="public-collect-con">副市长、公安局局长邓文国到广安区白马进行视察</a>
                            <span class="public-collect-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="public-collect-con">副市长、公安局局长邓文国到广安区白马进行视察</a>
                            <span class="public-collect-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="public-collect-con">副市长、公安局局长邓文国到广安区白马进行视察</a>
                            <span class="public-collect-time">05-10</span>
                        </li>
                    </ul>
                </div>
                <div class="police-report">
                    <h3>警方报道</h3>
                    <a href="#" class="more-news">更多>></a>
                    <ul  type="square">
                        <li>
                            <a href="#" class="police-report-con">岳池县局破获一起妨害公务案</a>
                            <span class="police-report-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="police-report-con">岳池县局破获一起妨害公务案</a>
                            <span class="police-report-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="police-report-con">岳池县局破获一起妨害公务案</a>
                            <span class="police-report-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="police-report-con">岳池县局破获一起妨害公务案</a>
                            <span class="police-report-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="police-report-con">岳池县局破获一起妨害公务案</a>
                            <span class="police-report-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="police-report-con">岳池县局破获一起妨害公务案</a>
                            <span class="police-report-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="police-report-con">岳池县局破获一起妨害公务案</a>
                            <span class="police-report-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="police-report-con">岳池县局破获一起妨害公务案</a>
                            <span class="police-report-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="police-report-con">岳池县局破获一起妨害公务案</a>
                            <span class="police-report-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="police-report-con">岳池县局破获一起妨害公务案</a>
                            <span class="police-report-time">05-10</span>
                        </li>
                    </ul>
                </div>
                <div class="police-video">
                    <h3>警方视频</h3>
                    <a href="#" class="more-news">更多>></a>
                    <iframe src="http://player.youku.com/embed/XMTU0MDE5NjU5Ng==" allowfullscreen="" class="embed-responsive-item" frameborder="0" height="219" width="242"></iframe>
                </div>
            </div>
            <div class="news-mid"><img src="police-news/images/mid-logo-bg.png" alt=""/></div>
            <div class="news-bottom">
                <div class="visit-online">
                    <h3>在线访谈</h3>
                    <a href="#" class="more-news">更多>></a>
                    <div class="visit-content">
                        <p><b>主题：</b><span>出入有境，服务无境——推广网上便民服务出入境民警在线访谈</span></p>
                        <p><b>日期：</b><span>2016-6-2 12:00:00</span></p>
                        <p><b>访谈嘉宾：</b><span>广安市公安局出入境管理处</span></p>
                        <p><b>访谈内容：</b><span>本栏目将于七月中旬组织开展一期出入境业务在线访谈，目前正在紧张筹备中，届时请网友踊跃参与。</span></p>
                    </div>
                </div>
                <div class="investigate-online">
                    <h3>在线调查</h3>
                    <a href="#" class="more-news">更多>></a>
                    <div class="investigate-content">
                        <p><b>主题：</b><span>养老服务规范服务工作征集意见民警在线调查</span></p>
                        <p><b>日期：</b><span>2016-6-2 12:00:00</span></p>
                        <p><b>访谈嘉宾：</b><span>广安市公安局出入境管理处</span></p>
                        <p><b>访谈内容：</b><span>本栏目将于七月中旬组织开展一期出入境业务在线访谈，目前正在紧张筹备中，届时请网友踊跃参与。</span></p>
                    </div>
                </div>
                <div class="fast-link">
                    <a href="#"><p style="background-image: url('police-news/images/link1.png')">机构职能</p></a>
                    <a href="#"><p style="background-image: url('police-news/images/link2.png')">领导简介</p></a>
                    <a href="#"><p style="background-image: url('police-news/images/link3.png')">电子地图</p></a>
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
                <h3>警营风采</h3>
                <a href="#" class="more-news">更多>></a>
                <ul>
                    <li>
                        <a href="#">
                            <img src="police-news/images/police-style1.png" alt=""/>
                            <p>2015广安市公安特巡警比武竞赛掠影</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="police-news/images/police-style2.png" alt=""/>
                            <p>110守护平安</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="police-news/images/police-style3.png" alt=""/>
                            <p>秉公执法，为民解困</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="police-news/images/police-style4.png" alt=""/>
                            <p>省市领导关心重视公安工作</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="police-news/images/police-style5.png" alt=""/>
                            <p>反恐防暴实战演练</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="police-news/images/police-style6.png" alt=""/>
                            <p>升旗仪式</p>
                        </a>
                    </li>
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
    <template file="Content/Mods/QR.php" />
    <template file="Content/Mods/quick_nav.php" />
    <template file="Content/utils.php" />
</div>
</body>
</html>
