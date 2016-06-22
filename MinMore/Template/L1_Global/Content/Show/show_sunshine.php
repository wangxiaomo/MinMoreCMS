<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <link href="favicon.ico" rel="shortcut icon" />
    <link rel="canonical" href="{$config_siteurl}" />
    <title>{$title}</title>
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
            <div class="body-content">
                <div class="body-content-hd">
                    <h3><img src="{$config_siteurl}statics/themes/L1_Global/images/book.png" />{$title}</h3><a href="{:U('Content/Site/sunshine_police')}"><span class="go-back-home">返回首页</span></a>
                </div>
                <div class="body-content-detail">
                    <h3 style="text-align:center;">{$title}</h3>
                    {$content}
                </div>
            </div>
        </div>
        <template file="Content/Mods/footer.php" />
        <template file="Content/Mods/quick_nav.php" />
        <template file="Content/utils.php" />
    </div>
</body>
</html>
