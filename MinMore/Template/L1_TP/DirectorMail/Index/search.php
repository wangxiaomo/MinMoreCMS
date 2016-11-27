<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="chrome=1" />
    <link href="favicon.ico" rel="shortcut icon" />
    <link rel="canonical" href="{$config_siteurl}" />
    <title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
    <meta name="description" content="{$SEO['description']}" />
    <meta name="keywords" content="{$SEO['keyword']}" />
    <link href="{$config_siteurl}statics/themes/common.css" type="text/css" rel="stylesheet">
    <link href="{$config_siteurl}statics/extres/directormail/css/mailbox.css" rel="stylesheet" type="text/css" />
    <!-- 公共样式 -->
    <link href="{$config_siteurl}statics/themes/L1_TP/css/public.css" type="text/css" rel="stylesheet">
    <!-- 机构职能样式 -->
    <link href="{$config_siteurl}statics/themes/L1_TP/css/function.css" type="text/css" rel="stylesheet">
    <script src="{$config_siteurl}statics/js/jquery.js"></script>
</head>

<body>
<template file="Content/Mods/header.php" />
<div class="main">
  <!-- 机构职能 -->
  <div class="content marginT20">
    <p style="font-size:15px;font-weight:bold;padding:0px 0px 15px;">您所在的位置 广安交警网 &gt; 支队长信箱 </p>
    <!-- 机构职能左 -->
    <div class="Traffic-leftMid fl">
          <div class="mailbox-list">
            <div class="content-hd">
              支队长信箱－信件查询
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
    <!-- 机构职能左结束 -->
    <template file="Content/Mods/sidebar.php" />
  </div>
  <!-- 机构职能结束 -->

   
  <template file="Content/Mods/links.php" />
</div>
<template file="Content/Mods/footer.php" />
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
