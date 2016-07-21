<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="chrome=1" />
    <link href="favicon.ico" rel="shortcut icon" />
    <link rel="canonical" href="{$config_siteurl}" />
    <title>站点地图</title>
    <meta name="description" content="{$SEO['description']}" />
    <meta name="keywords" content="{$SEO['keyword']}" />
    <link rel="stylesheet" href="{$config_siteurl}statics/themes/L1_Global/css/index.css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/themes/L1_Global/css/map.css"/>
    <script src="{$config_siteurl}statics/js/jquery.js" type="text/javascript"></script>
</head>
<body>
<!-- main-->
<div class="main">
    <!-- content-->
    <div class="content">
        <!-- 头部导航-->
        <template file="Content/Mods/top_header.php" />
        <!--导航条-->
        <ul class="banner-nav">
            <a href="/"><li class="on">首页</li></a>
            <a href="{:U('Content/Site/police_news')}"><li>警务资讯</li></a>
            <a href="{:U('Content/Site/work_building')}"><li>办事大厅</li></a>
            <a href="{:U('Content/Site/sunshine_police')}"><li>阳光警务</li></a>
            <a href="{:U('Content/Site/police_interaction')}"><li>警民互动</li></a>
            <a href="{:U('Content/Site/service_people')}"><li>服务民生</li></a>
        </ul>
        <!-- 电子地图-->
        <div class="map">
           <div class="map-MaxPic">
              <p><img src="{$config_siteurl}statics/themes/L1_Global/images/map12.png" width="716" height="73"></p>
              <div class="map-Img">
                 <ul>
                   <li style="position:absolute; z-index:10; display:block; top:226px; left:66px"><a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/map08.png"></a>
                       <div class="cty-ws" id="dis">
                        <div class="cty-title"><a href="{:get_site_url('武胜县公安')}">武胜县公安局</a></div>
                        <ul class="cty-List">
                          <li><a href="{:get_site_url('三溪')}">三溪派出所</a></li>
                          <li><a href="{:get_site_url('双星')}">双星派出所</a></li>
                          <li><a href="{:get_site_url('乐善')}">乐善派出所</a></li>
                          <li><a href="{:get_site_url('永胜')}">永胜派出所</a></li>
                          <li><a href="{:get_site_url('胜利')}">胜利派出所</a></li>
                          <li><a href="{:get_site_url('龙女')}">龙女派出所</a></li>
                          <li><a href="{:get_site_url('华封')}">华封派出所</a></li>
                          <li><a href="{:get_site_url('街子')}">街子派出所</a></li>
                          <li><a href="{:get_site_url('龙庭')}">龙庭派出所</a></li>
                          <li><a href="{:get_site_url('城中')}">城中派出所</a></li>
                          <li><a href="{:get_site_url('万隆')}">万隆派出所</a></li>
                          <li><a href="{:get_site_url('飞龙')}">飞龙派出所</a></li>
                          <li><a href="{:get_site_url('宝派')}">宝派派出所</a></li>
                          <li><a href="{:get_site_url('旧县')}">旧县派出所</a></li>
                          <li><a href="{:get_site_url('新学')}">新学乡派出所</a></li>
                          <li><a href="{:get_site_url('白坪')}">白坪派出所</a></li>
                          <li><a href="{:get_site_url('猛山')}">猛山派出所</a></li>
                          <li><a href="{:get_site_url('烈面')}">烈面派出所</a></li>
                          <li><a href="{:get_site_url('鼓匠')}">鼓匠派出所</a></li>
                        </ul>
                       </div>
                   </li>
                   <li style="position:absolute; z-index:10; display:block; top:120px; left:250px; display:block;">
                     <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/map07.png"></a>
                     <div class="cty-yc" id="dis">
                       <div class="cty-title"><a href="{:get_site_url('岳池县公安')}">岳池县公安局</a></div>
                       <ul class="cty-List">
                          <li><a href="#">三溪派出所</a></li>
                          <li><a href="#">双星派出所</a></li>
                          <li><a href="#">乐善派出所</a></li>
                          <li><a href="#">永胜派出所</a></li>
                          <li><a href="#">胜利派出所</a></li>
                          <li><a href="#">龙女派出所</a></li>
                          <li><a href="#">华封派出所</a></li>
                          <li><a href="#">街子派出所</a></li>
                          <li><a href="#">龙庭派出所</a></li>
                          <li><a href="#">城中派出所</a></li>
                          <li><a href="#">万隆派出所</a></li>
                          <li><a href="#">飞龙派出所</a></li>
                          <li><a href="#">宝派派出所</a></li>
                          <li><a href="#">旧县派出所</a></li>
                          <li><a href="#">新学乡派出所</a></li>
                          <li><a href="#">白坪派出所</a></li>
                          <li><a href="#">猛山派出所</a></li>
                          <li><a href="#">烈面派出所</a></li>
                          <li><a href="#">鼓匠派出所</a></li>
                       </ul>
                    </div>
                   </li>
                   
                   <li style="position:absolute; z-index:10; display:block; top:70px; right:380px; display:block;">
                     <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/map06.png"></a>
                     <div class="cty-ga" id="dis">
                         <div class="cty-title"><a href="{:get_site_url('广安区公安')}">广安区公安分局</a></div>
                         <ul class="cty-List">
                          <li>小井派出所</li>
                          <li>浓回派出所</li>
                          <li>方坪乡派出所</li>
                          <li>苏溪派出所</li>
                          <li>协兴派出所</li>
                          <li>东岳派出所</li>
                          <li>兴平派出所</li>
                          <li>代市派出所</li>
                          <li>观阁派出所</li>
                          <li>花桥派出所</li>
                          <li>恒升派出所</li>
                          <li>白市派出所</li>
                          <li>广福派出所</li>
                          <li>石笋派出所</li>
                          <li>大寨派出所</li>
                          <li>万盛派出所</li>
                          <li>北辰派出所</li>
                         </ul>
                     </div>
                   </li>
                   
                   <li style="position:absolute; z-index:10; display:block; top:180px; left:442px; display:block;">
                     <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/map03.png"></a>
                     <div class="cty-xx" id="dis">
                         <div class="cty-title"><a href="{:get_site_url('协兴园区公安')}">协兴园区公安分局</a></div>
                         <ul class="cty-List">
                          <li>协兴派出所</li>
                          <li>小平故里</li>
                          <li>水上派出所</li>
                          <li>浓溪派出所</li>
                         </ul>
                     </div
                   </li>
                   
                   <li style="position:absolute; z-index:10; display:block; top:237px; left:495px; display:block;">
                     <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/map04.png"></a>
                     <div class="cty-jk" id="dis">
                         <div class="cty-title"><a href="{:get_site_url('经开区公安')}">经开区公安分局</a></div>
                         <ul class="cty-List">
                          <li>奎阁派出所</li>
                          <li>护安派出所</li>
                          <li>新桥派出所</li>
                         </ul>
                     </div
                   </li>
                                                      
                   <li style="position:absolute; z-index:1; display:block; top:270px; left:437px; display:block;">
                     <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/map02.png"></a>
                     <div class="cty-zsyq" id="dis">
                         <div class="cty-title"><a href="{:get_site_url('枣山园区公安')}">枣山园区公安分局</a></div>
                         <ul class="cty-List">
                          <li>枣山派出所</li>
                          <li>广门派出所</li>
                         </ul>
                     </div>
                   </li>
                   
                   <li style="position:absolute; z-index:1; display:block; top:435px; left:485px; display:block;">
                     <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/map10.png"></a>
                     <div class="cty-hj" id="dis">
                         <div class="cty-title"><a href="{:get_site_url('华蓥市公安')}">华蓥市公安局</div>
                         <ul class="cty-List">
                          <li>双河派出所</li>
                          <li>天池派出所</li>
                          <li>禄市派出所</li>
                          <li>永兴派出所</li>
                          <li>明月派出所</li>
                          <li>阳和派出所</li>
                          <li>高兴派出所</li>
                          <li>溪口派出所</li>
                          <li>华庆派出所</li>
                          <li>红岩派出所</li>
                          <li>古桥派出所</li>
                          <li>观音派出所</li>
                          <li>华龙派出所</li>
                         </ul>
                     </div>
                   </li>
                   
                   <li style="position:absolute; z-index:1; display:block; top:322px; right:160px; display:block;">
                     <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/map09.png"></a>
                     <div class="cty-ls" id="dis">
                         <div class="cty-title"><a href="{:get_site_url('邻水县公安')}">邻水县公安局</a></div>
                         <ul class="cty-List">
                          <li>九峰派出所</li>
                          <li>鼎屏派出所</li>
                          <li>城南派出所</li>
                          <li>城北派出所</li>
                          <li>梁桥派出所</li>
                          <li>八耳派出所</li>
                          <li>古路派出所</li>
                          <li>复盛派出所</li>
                          <li>九龙派出所</li>
                          <li>高滩镇派出所</li>
                          <li>龙安派出所</li>
                          <li>柑子派出所</li>
                          <li>王家派出所</li>
                          <li>兴仁派出所</li>
                          <li>城东派出所</li>
                          <li>关河派出所</li>
                          <li>牟家镇派出所</li>
                          <li>西天派出所</li>
                          <li>风垭乡派出所</li>
                          <li>石滓派出所</li>
                          <li>两河派出所</li>
                         </ul>
                     </div>
                   </li>
                   
                   <li style="position:absolute; z-index:1; display:block; top:225px; left:570px; display:block;">
                     <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/map05.png"></a>
                     <div class="cty-qf" id="dis">
                         <div class="cty-title"><a href="{:get_site_url('前锋区公安')}">前锋区公安分局</a></div>
                         <ul class="cty-List">
                          <li>前锋派出所</li>
                          <li>广兴派出所</li>
                          <li>龙滩派出所</li>
                          <li>观阁派出所</li>
                          <li>小井派出所</li>
                          <li>桂兴派出所</li>
                          <li>虎城派出所</li>
                          <li>观增派出所</li>
                          <li>代市派出所</li>
                          <li>光辉派出所</li>
                         </ul>
                     </div>
                   </li>
                   
                 </ul>
             </div>
              
           </div>
        </div>
        <template file="Content/Mods/footer.php" />
    </div>
</div>
</body>
</html>
