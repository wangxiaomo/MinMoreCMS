<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <link href="favicon.ico" rel="shortcut icon" />
    <link rel="canonical" href="{$config_siteurl}" />
    <title>阳光警务</title>
    <meta name="description" content="{$SEO['description']}" />
    <meta name="keywords" content="{$SEO['keyword']}" />
    <link href="{$config_siteurl}statics/themes/L1_Global/css/sunshine-police.css" rel="stylesheet" type="text/css" />
    <script src="{$config_siteurl}statics/js/jquery.js" type="text/javascript"></script>
</head>
<body>
    <!-- main-->
    <div class="main">
        <!-- content-->
        <div class="content">
            <!-- head-->
            <div class="head"></div>
            <!-- body-->
            <div class="body-nav">
                <div class="nav-top">
                    <div class="law-open">
                        <ul>
                            <li><a href="{:getCategory(25,'url')}"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/>{:getCategory(25,'catname')}</a></li>
                            <li><a href="{:getCategory(26,'url')}"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/>{:getCategory(26,'catname')}</a></li>
                            <li><a href="{:getCategory(27,'url')}"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/>{:getCategory(27,'catname')}</a></li>
                            <li><a href="{:getCategory(28,'url')}"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/>{:getCategory(28,'catname')}</a></li>
                        </ul>
                    </div>
                    <div class="enforce-open">
                        <ul>
                            <li><a href="{:getCategory(29,'url')}"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/>{:getCategory(29,'catname')}</a></li>
                            <li><a href="{:getCategory(30,'url')}"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/>{:getCategory(30,'catname')}</a></li>
                        </ul>
                    </div>
                    <div class="right-open">
                        <ul>
                            <li><a href="{:getCategory(33,'url')}"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/>{:getCategory(33,'catname')}</a></li>
                        </ul>
                    </div>
                    <div class="punish-open">
                        <ul>
                            <li><a href="{:getCategory(31,'url')}"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/>{:getCategory(31,'catname')}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="nav-bottom">
                    <div class="traffic-query">
                        <ul>
                            <li><a href="{:getCategory(29,'url')}"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/>{:getCategory(29,'catname')}</a></li>
                            <li><a href="{:getCategory(30,'url')}"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/>{:getCategory(30,'catname')}</a></li>
                        </ul>
                    </div>
                    <div class="Alarm-query">
                        <ul>
                            <li><a href="http://sc.122.gov.cn/" target="_blank"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/>查询机动车电子违法情况</a></li>
                            <li><a href="http://sc.122.gov.cn/" target="_blank"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/>查询驾驶证违法积分情况</a></li>
                        </ul>
                    </div>
                    <div class="order-query">
                        <ul>
                            <li><a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/>查询警情受理情况</a></li>
                        </ul>
                    </div>
                    <div class="case-query">
                        <ul>
                            <li><a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/>查询刑事案件办理情况</a></li>
                        </ul>
                    </div>
                </div>
                <div class="complaint">
                    <a href="#">
                        <img src="{$config_siteurl}statics/themes/L1_Global/images/complaint-phone.png" alt=""/>
                        <p>我要投诉</p>
                    </a>

                </div>
            </div>
            <script>
                $(function(){
                    $(".nav-top div").hover(function(){
                        var marginTop = parseInt($(this).css("margin-top")) - 5;
                        $(this).css("margin-top",marginTop)
                    },function(){
                        var marginTop = parseInt($(this).css("margin-top")) + 5;
                        $(this).css("margin-top",marginTop)
                    });
                    $(".nav-bottom div").hover(function(){
                        var marginTop = parseInt($(this).css("margin-top")) + 5;
                        $(this).css("margin-top",marginTop)
                    },function(){
                        var marginTop = parseInt($(this).css("margin-top")) - 5;
                        $(this).css("margin-top",marginTop)
                    });
                    $(".complaint").hover(function(){
                        var imgWid = $(".complaint img").width()+10;
                        $(".complaint img").css({"width":imgWid,"margin-left":"15px"});
                        $(".complaint p").css({"font-size":"20px","font-weight":"bolder"})
                    }, function () {
                        var imgWid = $(".complaint img").width()-10;
                        $(".complaint img").css({"width":imgWid,"margin-left":"20px"});
                        $(".complaint p").css({"font-size":"16px","font-weight":"inherit"})
                    })
                })
            </script>
            <div class="news-content">
                <div class="case-view">
                    <h4>{:getCategory(23,'catname')}</h4>
                    <a href="{:getCategory(23,'url')}" class="more-news">更多>></a>
                    <ul  type="square">
                        <content action="lists" catid="23" order="id DESC" num="10">
                            <volist name="data" id="vo">
                                <li>
                                    <a href="{$vo.url}" class="case-view-con">{$vo.title|str_cut=###,30}</a>
                                    <span class="case-view-time">{$vo.updatetime|date='m-d',###}</span>
                                </li>
                            </volist>
                        </content>
                    </ul>
                </div>
                <div class="police-explain">
                    <h4>{:getCategory(24,'catname')}</h4>
                    <a href="{:getCategory(24,'url')}" class="more-news">更多>></a>
                    <ul  type="square">
                        <content action="lists" catid="24" order="id DESC" num="10">
                            <volist name="data" id="vo">
                                <li>
                                    <a href="{$vo.url}" class="case-view-con">{$vo.title|str_cut=###,30}</a>
                                    <span class="case-view-time">{$vo.updatetime|date='m-d',###}</span>
                                </li>
                            </volist>
                        </content>
                    </ul>
                </div>
                <div class="fast-link">
                    <div class="supervise-phone"><a href="#"><p>监督电话</p></a></div>
                    <div class="AI-police"><a href="#"><p>电子警察</p></a></div>
                    <div class="data-total"><a href="#"><p>数据统计</p></a></div>
                </div>
            </div>
            <!-- footer-->
        <template file="Content/Mods/base_footer.php" />
        <template file="Content/Mods/quick_nav.php" />
        <template file="Content/utils.php" />
    </div>
</body>
</html>
