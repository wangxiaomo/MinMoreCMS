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
              局长信箱－信件查询
            </div>
          </div>
            <div class="querybox">
                  <div class="right">
                    <form method="post" action="{:U('DirectorMail/Index/search')}">
                    <p>请输入手机号码<input type="tel" name="tel" /><i class="red">*</i></p>
                    <p>请输入身份证号<input type="text" name="cardid" /><i class="red">*</i></p>
                    <div class="form-button-groups">
                    <p><button>查询</button></p>
                    </div>
                    </form>
                  </div>
            </div>
	    <div class="mailbox-list">
	      <div class="mailbox-data-list">
            <table>
              <thead>
                <tr>
                  <th>来信主题</th>
                  <th>状态</th>
                  <th>时间</th>
                  <th>办理单位</th>
                  <th>联系电话</th>
                </tr>
              </thead>
              <tbody>
                <volist name="dataList" id="vo">
                <tr>
                  <td><a href="{:U('mail?mailid='.$vo['id'])}">{$vo.zhuti}</a></td>
                  <if condition=" $vo['reply'] ">
                  <td>已回复</td>
                  <else /><td>未回复</td>
                  </if>
                  <td>{$vo.createtime|date="Y-m-d H:i:s",###}</td>
                  <td>{$vo.roleid}</td>
                  <td>{$vo.shouji}</td>
                </tr>
                </volist>
              </tbody>
            </table>
	      </div>
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
