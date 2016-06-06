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
                            <li><a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/><span>行政法律</span></a></li>
                            <li><a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/>治安管理</a></li>
                            <li><a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/>刑事法律</a></li>
                            <li><a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/>交通管理</a></li>
                            <li><a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/>更多....</a></li>
                        </ul>
                    </div>
                    <div class="enforce-open">
                        <ul>
                            <li><a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/>行政案件办理流程</a></li>
                            <li><a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/>刑事案件办理流程</a></li>
                        </ul>
                    </div>
                    <div class="right-open">
                        <ul>
                            <li><a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/>执法内容及权限查询</a></li>
                        </ul>
                    </div>
                    <div class="punish-open">
                        <ul>
                            <li><a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/>行政处罚决定文书</a></li>
                        </ul>
                    </div>
                </div>
                <div class="nav-bottom">
                    <div class="traffic-query">
                        <ul>
                            <li><a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/>行政案件办理流程</a></li>
                            <li><a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/>刑事案件办理流程</a></li>
                        </ul>
                    </div>
                    <div class="Alarm-query">
                        <ul>
                            <li><a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/><p>查询刑事案件、治安(行政)案件办理状态</p></a></li>
                            <li><a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/>刑事案件办理流程</a></li>
                        </ul>
                    </div>
                    <div class="order-query">
                        <ul>
                            <li><a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/>报案受理及处置情况查询</a></li>
                        </ul>
                    </div>
                    <div class="case-query">
                        <ul>
                            <li><a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/><p>查询刑事案件、治安(行政)案件办理状态</p></a></li>
                            <li><a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/triangle.png" alt=""/>刑事案件办理流程</a></li>
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
                    <h4>以案说法</h4>
                    <a href="#" class="more-news">更多>></a>
                    <ul  type="square">
                        <li>
                            <a href="#" class="case-view-con">岳池县局破获一起妨害公务案</a>
                            <span class="case-view-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="case-view-con">岳池县局破获一起妨害公务案</a>
                            <span class="case-view-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="case-view-con">岳池县局破获一起妨害公务案</a>
                            <span class="case-view-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="case-view-con">岳池县局破获一起妨害公务案</a>
                            <span class="case-view-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="case-view-con">岳池县局破获一起妨害公务案</a>
                            <span class="case-view-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="case-view-con">岳池县局破获一起妨害公务案</a>
                            <span class="case-view-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="case-view-con">岳池县局破获一起妨害公务案</a>
                            <span class="case-view-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="case-view-con">岳池县局破获一起妨害公务案</a>
                            <span class="case-view-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="case-view-con">岳池县局破获一起妨害公务案</a>
                            <span class="case-view-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="case-view-con">岳池县局破获一起妨害公务案</a>
                            <span class="case-view-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="case-view-con">岳池县局破获一起妨害公务案</a>
                            <span class="case-view-time">05-10</span>
                        </li>
                    </ul>
                </div>
                <div class="police-explain">
                    <h4>民警说事</h4>
                    <a href="#" class="more-news">更多>></a>
                    <ul  type="square">
                        <li>
                            <a href="#" class="case-view-con">岳池县局破获一起妨害公务案</a>
                            <span class="case-view-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="case-view-con">岳池县局破获一起妨害公务案</a>
                            <span class="case-view-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="case-view-con">岳池县局破获一起妨害公务案</a>
                            <span class="case-view-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="case-view-con">岳池县局破获一起妨害公务案</a>
                            <span class="case-view-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="case-view-con">岳池县局破获一起妨害公务案</a>
                            <span class="case-view-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="case-view-con">岳池县局破获一起妨害公务案</a>
                            <span class="case-view-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="case-view-con">岳池县局破获一起妨害公务案</a>
                            <span class="case-view-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="case-view-con">岳池县局破获一起妨害公务案</a>
                            <span class="case-view-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="case-view-con">岳池县局破获一起妨害公务案</a>
                            <span class="case-view-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="case-view-con">岳池县局破获一起妨害公务案</a>
                            <span class="case-view-time">05-10</span>
                        </li>
                        <li>
                            <a href="#" class="case-view-con">岳池县局破获一起妨害公务案</a>
                            <span class="case-view-time">05-10</span>
                        </li>
                    </ul>
                </div>
                <div class="fast-link">
                    <div class="supervise-phone"><a href="#"><p>监督电话</p></a></div>
                    <div class="AI-police"><a href="#"><p>电子警察</p></a></div>
                    <div class="data-total"><a href="#"><p>数据统计</p></a></div>
                </div>
            </div>
            <!-- footer-->
            <div class="introduce-info">
                <p>
                    丨 <a href="#">首页</a> 丨<a href="#">关于我们</a> 丨<a href="#">网站声明</a> 丨<a href="#">联系我们</a> 丨
                </p>
                <p>Copyright 2014 Guangan Police Security Bureau, All rights Reserve</p>
                <p>版权所有：广安市公安局  &nbsp;蜀ICP备12001441号-1 &nbsp;技术支持：四川速集实业集团有限公司 &nbsp;028-6643654</p>
            </div>
        <template file="Content/Mods/quick_nav.php" />
        <template file="Content/utils.php" />
    </div>
</body>
</html>
