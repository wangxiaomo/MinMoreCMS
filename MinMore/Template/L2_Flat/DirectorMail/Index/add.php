<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="favicon.ico" rel="shortcut icon" />
<link rel="canonical" href="{$config_siteurl}" />
<title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
<meta name="description" content="{$SEO['description']}" />
<meta name="keywords" content="{$SEO['keyword']}" />
<link href="{$config_siteurl}statics/themes/L2_Flat/css/list.css" rel="stylesheet" type="text/css" />
<link href="{$config_siteurl}statics/themes/L2_Flat/css/common.css" rel="stylesheet" type="text/css" />
<link href="{$config_siteurl}statics/extres/directormail/css/mailbox.css" rel="stylesheet" type="text/css" />
<script src="{$config_siteurl}statics/js/jquery.js"></script>
</head>

<body>
<template file="Content/Mods/header.php" />
<div class="content-bar">
	<div class="wrapper">
    	<div class="pull-left list-bar mar-t30">
            <div class="content-fd">
                <div class="mailbox-list">
                    <div class="content-hd">
                        局长信箱－信件填写
                    </div>
                </div>
                <div class="director-mail-description">
                    欢迎您进入我的信箱，感谢您长期以来对公安工作的关心和支持，我们热诚欢迎您对公安工作提出意见和建议，您的诉求我们将认真办理。
                </div>
                <div class="mailbox-form">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="data-line">
                            <span class="prompt">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</span>
                            <div>
                                <input type="text" name="name" />
                            </div>
                        </div>               
                        <div class="data-line">
                            <span class="prompt">身份证号：</span>
                            <div>
                                <input type="text" name="cardid" />
                                <!--<input type="checkbox" name="receiveCallback" />是否接受短信通知-->
                            </div>
                        </div>
                        <div class="data-line">
                            <span class="prompt">手机号码：</span>
                            <div>
                                <input type="tel" name="shouji" />
                                <!--<input type="checkbox" name="receiveCallback" />是否接受短信通知-->
                            </div>
                        </div>
                        <div class="data-line">
                            <span class="prompt">邮箱地址：</span>
                            <div>
                                <input type="text" name="email" />
                            </div>
                        </div>
                        <div class="data-line">
                            <span class="prompt">联系地址：</span>
                            <div>
                                <input type="text" name="addr" />
                            </div>
                        </div>
                        <div class="data-line">
                            <span class="prompt">主&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;题：</span>
                            <div>
                                <input type="text" name="zhuti" />
                            </div>
                        </div>
                        <div class="data-line data-textarea">
                            <span class="prompt">详细内容：</span>
                            <div>
                                <p class="small-prompt">***至少20字</p>
                                <textarea name="introduce"></textarea>
                            </div>
                        </div>
                        <div class="data-line">
                            <span class="prompt">附&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;件：</span>
                            <div>
                                <input type="file" name="upload" />
                            </div>
                        </div>
                        <div class="data-line">
                            <span class="prompt">验&nbsp;&nbsp;证&nbsp;&nbsp;码：</span>
                            <div>
                                <input type="text" name="validate" />
                                <img src='{:U('Api/Checkcode/index','type=DirectorMail&code_len=4&font_size=20&width=130&height=30&font_color=&background=')}' align="absmiddle" title="看不清？点击更新验证码" alt="看不清？点击更新验证码" onClick="this.src='{:U('Api/Checkcode/index','type=DirectorMail&code_len=4&font_size=20&width=130&height=30&font_color=&background=&refresh=1')}'" style="cursor:pointer;"/>
                        </div>
                    </div>
                    <div class="form-button-groups">
                        <button type="submit">提交</button>
                        <button type="reset">重置</button>
                        <button class="query-button">查询</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
        <template file="Content/Mods/sidebar.php" />
    </div>
    
</div>
<div class="wrapper-2"><img src="{$config_siteurl}statics/themes/L2_Flat/images/con-foot.png" /></div>
<template file="Content/Mods/footer.php" />
<template file="Content/Mods/quick_nav.php" />
<script>
    $(function () {
        $(".query-button").on("click", function (e) {
            e.preventDefault();
            window.location = "{:U('DirectorMail/Index/search')}";
        });
    });
</script>
</body>
</html>
