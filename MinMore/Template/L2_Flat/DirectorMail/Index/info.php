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
                <p>“局长信箱”栏目是公众与我局沟通交流的重要渠道，是我局公众互动工作的组成部分，您的来信我局将按照一定的程序处理，并在一定的时限内向您反馈处理结果。</p>
                <p>一、受理事项</p>
                <p>您对我局机关及下属单位工作人员的职务行为反映情况，提出建议、意见，或者不服，可以提出事项。</p>
                <p>二、不予受理事项</p>
                <p>1、对依法应当通过诉讼、仲裁、行政复议等法定途径解决的投诉请求，应当按照有关法律、行政法规规定的程序向我局提出。</p>
                <p>2、如果您是对我局相关职能处室办事过程中的有关法规、政策、程序等作咨询，请直接向本网站的“网上咨询”栏目提交问题。</p>
                <p>3、其他有关推销、邀请等本栏目管理人员认为不应该受理的事项。</p>
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