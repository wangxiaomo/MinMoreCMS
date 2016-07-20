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
    <link href="{$config_siteurl}statics/themes/L3_Global/css/style.css" rel="stylesheet" type="text/css" />
    <script src="{$config_siteurl}statics/js/jquery.js"></script>
</head>
<body>
<!-- main-->
<div class="main">
    <!-- content-->
    <div class="content">
        <template file="Content/Mods/header" />
       <div id="index-mian">
           <div class="one-floor">
              <div class="slide"><img src="{$config_siteurl}statics/themes/L3_Global/images/slide.png"></div>
              <div class="brief">
                 <div class="title"><span>更多>></span><samp>派出所简介</samp></div>
                 <div class="bridfer"><div class="bridfimg"><img src="{$config_siteurl}statics/themes/L3_Global/images/briefimg.png"></div>广安市公安局钢都派出所成立于1997年，现有警力32人，其中班子成员5人，所有人员按三队一室配置，下设6个警务组。钢都派出所管理区位于辽宁重镇镁都大石桥市城区东部中心地段（石桥大街48号），地处城乡结合部，辖区地域面积达16.8平方公里，辖区含8个社区、8个行政村，实际居住人口超10万人。 <br>&nbsp;&nbsp; &nbsp;&nbsp;近年来，我派出所在局党组的正确领导下，在上级业务部门的大力指导和帮助下，在上级业务部门的大量的人力物力....</div>
              </div>
              <div class="card">
                 <div class="title"><samp>警民联系卡</samp></div>
                 <dl>
                   <dt><img src="{$config_siteurl}statics/themes/L3_Global/images/carder.png"></dt>
                   <dd><p>姓名：滕昭荣</p><p>警号：765987</p><p>职务：所长</p><p>电话：7604110</p><p>所属警局：协兴镇派出所</p></dd>
                 </dl>
              </div>
           </div>
           
           <div class="second-floor">
             <ul>
               <li><a href="{:U('Content/Site/alarm_query@' . C('GLOBAL_SITE_DOMAIN'))}"><img src="{$config_siteurl}statics/themes/L3_Global/images/police29.png"></a></li>
               <li><a href="{:U('Content/Site/case_query@' . C('GLOBAL_SITE_DOMAIN'))}"><img src="{$config_siteurl}statics/themes/L3_Global/images/police30.png"></a></li>
               <li><a href="{:U('Content/Site/order_query@' . C('GLOBAL_SITE_DOMAIN'))}"><img src="{$config_siteurl}statics/themes/L3_Global/images/police31.png"></a></li>
               <li><a href="http://sc.122.gov.cn/views/inquiry.html"><img src="{$config_siteurl}statics/themes/L3_Global/images/police32.png"></a></li>
             </ul>
           </div>
           
           <div class="thrid-floor">
           <div class="news-flash">
              <div class="second-title"><div class="tt">{:getCategory(5,'catname')}</div><div class="more"><a href="{:getCategory(5,'url')}">更多</a></div></div>
              <ul>
                <content action="lists" catid="5" order="id DESC" num="8">
                    <volist name="data" id="vo">
                        <li><a href="{$vo.url}"><span>[{$vo.updatetime|date='Y-m-d',###}]</span><img src="{$config_siteurl}statics/themes/L3_Global/images/police26.png">{$vo.title|str_cut=###,18}</a></li>
                    </volist>
                </content>
              </ul>
           </div>
           <div class="news-flash">
              <div class="second-title"><div class="tt">{:getCategory(3,'catname')}</div><div class="more"><a href="{:getCategory(3,'url')}">更多</a></div></div>
              <ul>
                <content action="lists" catid="3" order="id DESC" num="8">
                    <volist name="data" id="vo">
                        <li><a href="{$vo.url}"><span>[{$vo.updatetime|date='Y-m-d',###}]</span><img src="{$config_siteurl}statics/themes/L3_Global/images/police26.png">{$vo.title|str_cut=###,18}</a></li>
                    </volist>
                </content>
              </ul>
           </div>
           <div class="news-over">
              <p><img src="{$config_siteurl}statics/themes/L3_Global/images/police25.png"></p>
              <p><img src="{$config_siteurl}statics/themes/L3_Global/images/police24.png"></p>
              <p><img src="{$config_siteurl}statics/themes/L3_Global/images/police23.png"></p>
              <p><img src="{$config_siteurl}statics/themes/L3_Global/images/police22.png"></p>
           </div>
        </div>
        
        <div class="four-floor">
           <ul>
             <li><a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=13"><img src="{$config_siteurl}statics/themes/L3_Global/images/police21.png"></a></li>
             <li><a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=11"><img src="{$config_siteurl}statics/themes/L3_Global/images/police20.png"></a></li>
             <li><a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=10"><img src="{$config_siteurl}statics/themes/L3_Global/images/police19.png"></a></li>
             <li><a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=12"><img src="{$config_siteurl}statics/themes/L3_Global/images/police18.png"></a></li>
             <li><a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm?sid=17"><img src="{$config_siteurl}statics/themes/L3_Global/images/police17.png"></a></li>
             <li><a href="http://125.66.2.25:28081/wsga/wsga/web/working-center/working-center.htm"><img src="{$config_siteurl}statics/themes/L3_Global/images/police16.png"></a></li>
           </ul>
        </div>
        
        <div class="five-floor">        
           <div class="second-title"><div class="tt">{:getCategory(44,'catname')}</div></div>
           <ul>
             <content action="lists" catid="44" order="id DESC" num="5">
                <volist name="data" id="vo">
                   <li><a href="{$vo.url}"><img src="{$vo.thumb}"></a></li>
                </volist>
             </content>
           </ul>
        </div>  
    </div>
    <template file="Content/Mods/footer" />
</body>
</html>
