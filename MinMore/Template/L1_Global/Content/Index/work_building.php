<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <link href="favicon.ico" rel="shortcut icon" />
    <link rel="canonical" href="{$config_siteurl}" />
    <title>办事大厅</title>
    <meta name="description" content="{$SEO['description']}" />
    <meta name="keywords" content="{$SEO['keyword']}" />
    <link href="{$config_siteurl}statics/themes/L1_Global/css/work-building.css" rel="stylesheet" type="text/css" />
    <script src="{$config_siteurl}statics/js/jquery.js" type="text/javascript"></script>
</head>
<body>
<!-- main-->
<div class="main">
    <template file="top_header.php" />
    <!-- content-->
    <div class="content">
        <div class="banner-logo">
            <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/banner_0004.png" alt=""/></a>
            <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/banner_0003.png" alt="" style="width: 95px;"/></a>
        </div>
        <div class="top-nav">
            <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/nav_handle.png" alt="" style="margin-left: 32px"/></a>
            <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/nav_consultation.png" alt=""/></a>
            <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/nav_load.png" alt="" style="width: 103px;height: 145px;"/></a>
            <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/nav_login.png" alt=""/></a>
            <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/nav_query.png" alt=""/></a>
            <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/nav_help.png" alt=""/></a>
        </div>
        <script>
            $(function(){
                var imgSrc;
                var imgStr;
                $(".top-nav img").hover(function(){
                    imgSrc = $(this).attr("src").split(".");
                    imgStr = imgSrc[0];
                    $(this).attr("src",imgStr+"2.png");
                },function(){
                    imgSrc = $(this).attr("src").split("2");
                    imgStr = imgSrc[0];
                    $(this).attr("src",imgStr+".png");
                })
            })
        </script>

         <!--办事大厅-->
        <div class="work-build">
            <div class="work-build-top"></div>
            <div class="work-build-con">
                <div class="work-view">
                    <ul class="view-list" style="background-image: url('/statics/themes/L1_Global/images/view-bgs.png')">
                        <li class="imgOn" style="background-image: url('/statics/themes/L1_Global/images/other_0001.png')"></li>
                        <li style="background-image: url('/statics/themes/L1_Global/images/other_0002.png')"></li>
                        <li style="background-image: url('/statics/themes/L1_Global/images/other_0003.png')"></li>
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
            //-------------后退-------------
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

        <div class="build-bottom-logo"></div>
        <!-- 便民服务-->
        <div class="fast-service">
            <a href="#" style="margin-left: 10px">
                <img src="{$config_siteurl}statics/themes/L1_Global/images/service1.png" alt="" style="margin-top: 10px"/><br/>
                <span>开锁信息查询</span>
            </a>
            <a href="#">
                <img src="{$config_siteurl}statics/themes/L1_Global/images/service2.png" alt="" style="margin-top: 10px"/><br/>
                <span>不跑腿33项</span>
            </a>
            <a href="#">
                <img src="{$config_siteurl}statics/themes/L1_Global/images/service3.png" alt="" style="margin-top: 25px"/><br/>
                <span>便民举措</span>
            </a>
            <a href="#">
                <img src="{$config_siteurl}statics/themes/L1_Global/images/service4.png" alt="" style="margin-top: 5px"/><br/>
                <span>公开电话</span>
            </a>
            <a href="#" style="width: 120px">
                <img src="{$config_siteurl}statics/themes/L1_Global/images/service5.png" alt=""/><br/>
                <span style="width: 120px;margin-bottom: -10px">18个不该由公安机关出具的证明</span>
            </a>
            <a href="#">
                <img src="{$config_siteurl}statics/themes/L1_Global/images/service6.png" alt="" style="margin-top: 10px"/><br/>
                <span>邮编区号</span>
            </a>
            <a href="#">
                <img src="{$config_siteurl}statics/themes/L1_Global/images/service7.png" alt="" style="margin-top: 20px"/><br/>
                <span>行政区域</span>
            </a>
            <a href="#">
                <img src="{$config_siteurl}statics/themes/L1_Global/images/service8.png" alt="" style="margin-top: 20px"/><br/>
                <span>社保查询</span>
            </a>
            <a href="#">
                <img src="{$config_siteurl}statics/themes/L1_Global/images/service9.png" alt="" style="margin-top: 20px"/><br/>
                <span>电视节目</span>
            </a>
            <a href="#" style="margin-left: 10px">
                <img src="{$config_siteurl}statics/themes/L1_Global/images/service10.png" alt="" style="margin-top: 30px"/><br/>
                <span>常用电话</span>
            </a>
            <a href="#">
                <img src="{$config_siteurl}statics/themes/L1_Global/images/service11.png" alt="" style="margin-top: 30px"/><br/>
                <span>天气查询</span>
            </a>
            <a href="#">
                <img src="{$config_siteurl}statics/themes/L1_Global/images/service12.png" alt="" style="margin-top: 30px"/><br/>
                <span>IP查询</span>
            </a>
            <a href="#">
                <img src="{$config_siteurl}statics/themes/L1_Global/images/service13.png" alt="" style="margin-top: 20px"/><br/>
                <span>政府导航</span>
            </a>
            <a href="#">
                <img src="{$config_siteurl}statics/themes/L1_Global/images/service14.png" alt="" style="margin-top: 30px"/><br/>
                <span>航班信息</span>
            </a>
            <a href="#">
                <img src="{$config_siteurl}statics/themes/L1_Global/images/service15.png" alt="" style="margin-top: 30px"/><br/>
                <span>EMS查询</span>
            </a>
            <a href="#">
                <img src="{$config_siteurl}statics/themes/L1_Global/images/service16.png" alt="" style="margin-top: 30px"/><br/>
                <span>公交路线</span>
            </a>
            <a href="#">
                <img src="{$config_siteurl}statics/themes/L1_Global/images/service17.png" alt="" style="margin-top: 30px"/><br/>
                <span>列车时刻</span>
            </a>
            <a href="#">
                <img src="{$config_siteurl}statics/themes/L1_Global/images/service18.png" alt="" style="margin-top: 30px"/><br/>
                <span>万年历</span>
            </a>
        </div>
        <!-- 公告公示-->
        <div class="bottom-notice">
            <div class="handle-notice">
                <p>办件公示</p>
                <table border="0">
                    <thead>
                        <tr>
                            <th>身份证号</th>
                            <th>办理事项</th>
                            <th>日期</th>
                            <th>办理状态</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>20322************3</td>
                            <td>省内城镇之间或农村迁入城镇</td>
                            <td>2016-5-26 12:00</td>
                            <td>已办结</td>
                        </tr>
                        <tr>
                            <td>20322************3</td>
                            <td>省内城镇之间或农村迁入城镇</td>
                            <td>2016-5-26 12:00</td>
                            <td>已办结</td>
                        </tr>
                        <tr>
                            <td>20322************3</td>
                            <td>省内城镇之间或农村迁入城镇</td>
                            <td>2016-5-26 12:00</td>
                            <td>已办结</td>
                        </tr>
                        <tr>
                            <td>20322************3</td>
                            <td>省内城镇之间或农村迁入城镇</td>
                            <td>2016-5-26 12:00</td>
                            <td>已办结</td>
                        </tr>
                        <tr>
                            <td>20322************3</td>
                            <td>省内城镇之间或农村迁入城镇</td>
                            <td>2016-5-26 12:00</td>
                            <td>已办结</td>
                        </tr>
                        <tr>
                            <td>20322************3</td>
                            <td>省内城镇之间或农村迁入城镇</td>
                            <td>2016-5-26 12:00</td>
                            <td>已办结</td>
                        </tr>
                        <tr>
                            <td>20322************3</td>
                            <td>省内城镇之间或农村迁入城镇</td>
                            <td>2016-5-26 12:00</td>
                            <td>已办结</td>
                        </tr>
                        <tr>
                            <td>20322************3</td>
                            <td>省内城镇之间或农村迁入城镇</td>
                            <td>2016-5-26 12:00</td>
                            <td>已办结</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="lost-notice">
                <div class="lost-nav">
                    <p class="lost-nav-on">失物招领</p>
                    <p>找寻失物</p>
                    <a href="#">更多>></a>
                </div>
                <div class="pickup-content">
                    <p>
                        <span class="pickup-detail">2016年5月26日在公园拾取手包一个</span>
                        <span class="pickup-time">2015-5-26</span>
                    </p>
                    <p>
                        <span class="pickup-detail">2016年5月26日在公园拾取手包一个</span>
                        <span class="pickup-time">2015-5-26</span>
                    </p>
                    <p>
                        <span class="pickup-detail">2016年5月26日在公园拾取手包一个</span>
                        <span class="pickup-time">2015-5-26</span>
                    </p>
                    <p>
                        <span class="pickup-detail">2016年5月26日在公园拾取手包一个</span>
                        <span class="pickup-time">2015-5-26</span>
                    </p>
                    <p>
                        <span class="pickup-detail">2016年5月26日在公园拾取手包一个</span>
                        <span class="pickup-time">2015-5-26</span>
                    </p>
                    <p>
                        <span class="pickup-detail">2016年5月26日在公园拾取手包一个</span>
                        <span class="pickup-time">2015-5-26</span>
                    </p>
                    <p>
                        <span class="pickup-detail">2016年5月26日在公园拾取手包一个</span>
                        <span class="pickup-time">2015-5-26</span>
                    </p>
                    <p>
                        <span class="pickup-detail">2016年5月26日在公园拾取手包一个</span>
                        <span class="pickup-time">2015-5-26</span>
                    </p>
                    <p>
                        <span class="pickup-detail">2016年5月26日在公园拾取手包一个</span>
                        <span class="pickup-time">2015-5-26</span>
                    </p>
                    <p>
                        <span class="pickup-detail">2016年5月26日在公园拾取手包一个</span>
                        <span class="pickup-time">2015-5-26</span>
                    </p>
                </div>
                <div class="lost-content">
                    <p>
                        <span class="pickup-detail">2016年5月25日在公园丢失手包一个</span>
                        <span class="pickup-time">2015-5-25</span>
                    </p>
                    <p>
                        <span class="pickup-detail">2016年5月25日在公园丢失手包一个</span>
                        <span class="pickup-time">2015-5-25</span>
                    </p>
                    <p>
                        <span class="pickup-detail">2016年5月25日在公园丢失手包一个</span>
                        <span class="pickup-time">2015-5-25</span>
                    </p>
                    <p>
                        <span class="pickup-detail">2016年5月25日在公园丢失手包一个</span>
                        <span class="pickup-time">2015-5-25</span>
                    </p>
                    <p>
                        <span class="pickup-detail">2016年5月25日在公园丢失手包一个</span>
                        <span class="pickup-time">2015-5-25</span>
                    </p>
                    <p>
                        <span class="pickup-detail">2016年5月25日在公园丢失手包一个</span>
                        <span class="pickup-time">2015-5-25</span>
                    </p>
                    <p>
                        <span class="pickup-detail">2016年5月25日在公园丢失手包一个</span>
                        <span class="pickup-time">2015-5-25</span>
                    </p>
                    <p>
                        <span class="pickup-detail">2016年5月25日在公园丢失手包一个</span>
                        <span class="pickup-time">2015-5-25</span>
                    </p>
                    <p>
                        <span class="pickup-detail">2016年5月25日在公园丢失手包一个</span>
                        <span class="pickup-time">2015-5-25</span>
                    </p>
                    <p>
                        <span class="pickup-detail">2016年5月25日在公园丢失手包一个</span>
                        <span class="pickup-time">2015-5-25</span>
                    </p>
                </div>
            </div>
            <script>
                $(function(){
                    $(".lost-nav p").eq(1).hover(function(){
                        $(".lost-nav p").eq(0).removeClass("lost-nav-on");
                        $(this).addClass("lost-nav-on");
                        $(".pickup-content").css("display","none");
                        $(".lost-content").css("display","block");
                    });
                    $(".lost-nav p").eq(0).hover(function(){
                        $(".lost-nav p").eq(1).removeClass("lost-nav-on");
                        $(this).addClass("lost-nav-on");
                        $(".pickup-content").css("display","block");
                        $(".lost-content").css("display","none");
                    })
                })
            </script>
            <div class="count-notice">
                <div class="search-box">
                    <input type="text"  placeholder="请输入搜索关键字" class="search-key"/>
                    <input type="button" value="搜 索" class="search-btn"/>
                </div>
                <p style="font-size: 13px">
                    <span style="color: red">热门搜索：</span>
                    <span>身份证</span>
                    <span>户口</span>
                    <span>交警</span>
                </p>
                <div class="data-total">
                    <div class="total-left">
                        <p class="total-title">应用数据统计</p>
                        <p class="total-num">
                            <span style="margin-top: 20px;">总访问数量</span>
                            <span style="font-size: 25px">1284730</span>
                        </p>
                        <p class="regist-num">
                            <span style="margin-top: 15px;">注册用户数量</span>
                            <span style="font-size: 25px">1940947</span>
                        </p>
                    </div>
                    <div class="total-right">
                        <p class="handle-num">
                            <span style="margin-top: 30px;font-size: 14px">总办件量统计</span>
                            <span style="font-size: 25px">54678</span>
                        </p>
                        <p class="online-num">
                            <span style="margin-top: 30px;">在线人数</span>
                            <span style="font-size: 25px">766</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <template file="Content/Mods/base_footer.php" />
    </div>
    <template file="Content/Mods/quick_nav.php" />
    <template file="Content/utils.php" />
</div>
</body>
</html>
