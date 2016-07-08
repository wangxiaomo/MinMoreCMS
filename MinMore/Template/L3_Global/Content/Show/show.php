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
    <link href="{$config_siteurl}statics/themes/L3_Global/css/public.css" rel="stylesheet" type="text/css" />
    <link href="{$config_siteurl}statics/themes/L3_Global/css/guide.css" rel="stylesheet" type="text/css" />
    <script src="{$config_siteurl}statics/js/jquery.js"></script>
</head>
<body>
<!-- main-->
<div class="main">
    <!-- content-->
    <div class="content">
        <template file="Content/Mods/header" />
   <div id="index-mian">
      <div class="cont-left">
         <div class="profile">           
           <div class="profile-Text">
           <img src="index/images/police11.png">广安市公安局协兴镇派出所成立于1997年，现有警力32人，其中班子成员5人，所有人员按三队一室配置，下设6个警务组。钢都派出所管理区位于辽宁重镇镁都大石桥市城区东部中心地段（石桥大街48号），地处城乡结合部，辖区地域面积达16.8平方公里，辖区含8个社区....
           </div>
         </div>
         
         <div class="thrid-title">派出所简介</div>
      </div>
      <div class="cont-right">
         <div class="four-title"><span><a href="{$config_siteurl}">首页</a> &gt; <a href="{:getCategory($catid,'url')}">{:getCategory($catid,'catname')}</a></span></div>
         <div class="introduction-Text">
            <div class="New-title">{$title}</div>
            <div class="New-Text">
                {$content}
            </div>
         </div>         
      </div>
   </div>
    <template file="Content/Mods/footer" />
</div>
</body>
</html>
