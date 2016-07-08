<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<div id="top">
 <div class="toper">
   <div class="Logo"><img src="{$config_siteurl}statics/themes/L3_Global/images/role/{$global_role}/LOGO.png"></div>
 </div>      
<!--导航条-->
 <div class="banner-nav">
    <ul> 
      <li><a href="{$config_siteurl}">网站首页</a></li>
      <li>派出所简介</li>
      <li>警民联系卡</li>
      <li><a href="{:getCategory(3,'url')}">{:getCategory(3,'catname')}</a></li>
      <li><a href="{:getCategory(4,'url')}">{:getCategory(4,'catname')}</a></li>
      <li><a href="{:getCategory(5,'url')}">{:getCategory(5,'catname')}</a></li>
      <li><a href="{:getCategory(19,'url')}">{:getCategory(19,'catname')}</a></li>
      <li><a href="{:getCategory(9,'url')}">{:getCategory(9,'catname')}</a></li>
      <li><a href="{:U('Content/Site/work_building@' . C('GLOBAL_SITE_DOMAIN'))}">办事大厅</a></li>
      <li><a href="{:getCategory(44,'url')}">{:getCategory(44,'catname')}</a></li>
    </ul>  
 </div>
</div>
