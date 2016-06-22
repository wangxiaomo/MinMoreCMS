<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <link href="favicon.ico" rel="shortcut icon" />
    <link rel="canonical" href="{$config_siteurl}" />
    <title>{:getCategory($catid,'catname')}</title>
    <meta name="description" content="{$SEO['description']}" />
    <meta name="keywords" content="{$SEO['keyword']}" />
    <link href="{$config_siteurl}statics/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
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
            <div class="body-content">
                <div class="body-content-wrapper">
                    <div class="wrapper-hd">
                        <a href="{:U('Content/Site/sunshine_police')}"><span class="go-back-home">回到首页</span></a>
                    </div>
                    <div class="query-box">
                        <p>{$parent.catname}标题：<input type="text" name="q" /><button>查询</button></p>
                    </div>
                    <div class="body-content-details">
                        <div class="sidebar">
                            <h4><img src="{$config_siteurl}statics/themes/L1_Global/images/book.png" />{$parent.catname}</h4>
                            <ul>
                                <volist name="children" id="vo">
                                    <li><a href="{$vo.url}" class="{$catid==$vo['id']?'menu-on':''}"><i class="fa fa-caret-right"></i>{$vo.name}</a></li>
                                </volist>
                            </ul>
                        </div>
                        <div class="details">
                            <content action="lists" catid="$catid" order="id DESC" num="20" page="$page">
                            <volist name="data" id="vo">
                                <a href="{$vo.url}">
                                    <div class="item">
                                        <span class="item-title">{$vo.title}</span>
                                        <span class="item-updatetime">{$vo.updatetime|date='Y-m-d',###}</span>
                                    </div>
                                </a>
                            </volist>
                            </content>
                            <div class="pagination">
                                {$pages}
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <template file="Content/Mods/footer.php" />
        <template file="Content/Mods/quick_nav.php" />
        <template file="Content/utils.php" />
    </div>
</body>
</html>
