<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<div id="top">
 <div class="toper">
   <div class="Logo"><img src="{$config_siteurl}statics/themes/L3_Global/images/role/{$global_role}/LOGO.png"></div>
 </div>      
<!--导航条-->
 <div class="banner-nav">
    <ul> 
      <li class="{$current_index_page?'on':''}"><a href="{$config_siteurl}">网站首页</a></li>
      <li class="">派出所简介</li>
      <li class="{$show_police_cards?'on':''}"><a href="{:U('Content/Site/police_cards')}">警民联系卡</a></li>
      <li class="{$catid==3?'on':''}"><a href="{:getCategory(3,'url')}">{:getCategory(3,'catname')}</a></li>
      <li class="{$catid==4?'on':''}"><a href="{:getCategory(4,'url')}">{:getCategory(4,'catname')}</a></li>
      <li class="{$catid==5?'on':''}"><a href="{:getCategory(5,'url')}">{:getCategory(5,'catname')}</a></li>
      <li class="{$catid==19?'on':''}"><a href="{:getCategory(19,'url')}">{:getCategory(19,'catname')}</a></li>
      <li class="{$catid==9?'on':''}"><a href="{:getCategory(9,'url')}">{:getCategory(9,'catname')}</a></li>
      <li><a href="{:U('Content/Site/work_building@' . C('GLOBAL_SITE_DOMAIN'))}">办事大厅</a></li>
      <li class="{$catid==44?'on':''}"><a href="{:getCategory(44,'url')}">{:getCategory(44,'catname')}</a></li>
    </ul>  
 </div>
</div>
