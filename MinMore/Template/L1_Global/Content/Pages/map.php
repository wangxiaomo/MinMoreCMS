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
            <a href="{:U('Content/Site/service_people')}"><li style="width:165px;">服务民生</li></a>
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
                          <li><a href="{:get_site_url('武胜城中')}">城中派出所</a></li>
                          <li><a href="{:get_site_url('武胜城北')}">城北派出所</a></li>
                          <li><a href="{:get_site_url('烈面')}">烈面派出所</a></li>
                          <li><a href="{:get_site_url('飞龙')}">飞龙派出所</a></li>
                          <li><a href="{:get_site_url('中心')}">中心派出所</a></li>
                          <li><a href="{:get_site_url('万善')}">万善派出所</a></li>
                          <li><a href="{:get_site_url('乐善')}">乐善派出所</a></li>
                          <li><a href="{:get_site_url('街子')}">街子派出所</a></li>
                          <li><a href="{:get_site_url('金牛')}">金牛派出所</a></li>
                          <li><a href="{:get_site_url('赛马')}">赛马派出所</a></li>
                          <li><a href="{:get_site_url('万隆')}">万隆派出所</a></li>
                          <li><a href="{:get_site_url('鼓匠')}">鼓匠派出所</a></li>
                          <li><a href="{:get_site_url('华封')}">华封派出所</a></li>
                          <li><a href="{:get_site_url('龙女')}">龙女派出所</a></li>
                          <li><a href="{:get_site_url('胜利')}">胜利派出所</a></li>
                        </ul>
                       </div>
                   </li>
                   <li style="position:absolute; z-index:10; display:block; top:120px; left:250px; display:block;">
                     <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/map07.png"></a>
                     <div class="cty-yc" id="dis">
                       <div class="cty-title"><a href="{:get_site_url('岳池县公安')}">岳池县公安局</a></div>
                       <ul class="cty-List">
                          <li><a href="{:get_site_url('岳池城东')}">城东派出所</a></li>
                          <li><a href="{:get_site_url('岳池城南')}">城南派出所</a></li>
                          <li><a href="{:get_site_url('岳池城北')}">城北派出所</a></li>
                          <li><a href="{:get_site_url('石垭')}">石垭派出所</a></li>
                          <li><a href="{:get_site_url('普安')}">普安派出所</a></li>
                          <li><a href="{:get_site_url('裕民')}">裕民派出所</a></li>
                          <li><a href="{:get_site_url('罗渡')}">罗渡派出所</a></li>
                          <li><a href="{:get_site_url('伏龙')}">伏龙派出所</a></li>
                          <li><a href="{:get_site_url('中和')}">中和派出所</a></li>
                          <li><a href="{:get_site_url('花园')}">花园派出所</a></li>
                          <li><a href="{:get_site_url('顾县')}">顾县派出所</a></li>
                          <li><a href="{:get_site_url('苟角')}">苟角派出所</a></li>
                          <li><a href="{:get_site_url('天平')}">天平派出所</a></li>
                          <li><a href="{:get_site_url('乔家')}">乔家派出所</a></li>
                          <li><a href="{:get_site_url('新场')}">新场派出所</a></li>
                          <li><a href="{:get_site_url('白庙')}">白庙派出所</a></li>
                          <li><a href="{:get_site_url('酉溪')}">酉溪派出所</a></li>
                          <li><a href="{:get_site_url('龙孔')}">龙孔派出所</a></li>
                          <li><a href="{:get_site_url('坪滩')}">坪滩派出所</a></li>
                          <li><a href="{:get_site_url('镇裕')}">镇裕派出所</a></li>
                          <li><a href="{:get_site_url('同兴')}">同兴派出所</a></li>
                          <li><a href="{:get_site_url('兴隆')}">兴隆派出所</a></li>
                       </ul>
                    </div>
                   </li>
                   
                   <li style="position:absolute; z-index:10; display:block; top:70px; right:380px; display:block;">
                     <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/map06.png"></a>
                     <div class="cty-ga" id="dis">
                         <div class="cty-title"><a href="{:get_site_url('广安区公安')}">广安区公安分局</a></div>
                         <ul class="cty-List">
                           <li><a href="{:get_site_url('广福')}">广福派出所</a></li>
                           <li><a href="{:get_site_url('万盛')}">万盛派出所</a></li>
                           <li><a href="{:get_site_url('大寨')}">大寨派出所</a></li>
                           <li><a href="{:get_site_url('中桥')}">中桥派出所</a></li>
                           <li><a href="{:get_site_url('浓洄')}">浓洄派出所</a></li>
                           <li><a href="{:get_site_url('北辰')}">北辰派出所</a></li>
                           <li><a href="{:get_site_url('龙台')}">龙台派出所</a></li>
                           <li><a href="{:get_site_url('官盛')}">官盛派出所</a></li>
                           <li><a href="{:get_site_url('崇望')}">崇望派出所</a></li>
                           <li><a href="{:get_site_url('悦来')}">悦来派出所</a></li>
                           <li><a href="{:get_site_url('井河')}">井河派出所</a></li>
                           <li><a href="{:get_site_url('花桥')}">花桥派出所</a></li>
                           <li><a href="{:get_site_url('恒升')}">恒升派出所</a></li>
                           <li><a href="{:get_site_url('肖溪')}">肖溪派出所</a></li>
                           <li><a href="{:get_site_url('石笋')}">石笋派出所</a></li>
                           <li><a href="{:get_site_url('大安')}">大安派出所</a></li>
                         </ul>
                     </div>
                   </li>
                   
                   <li style="position:absolute; z-index:10; display:block; top:180px; left:442px; display:block;">
                     <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/map03.png"></a>
                     <div class="cty-xx" id="dis">
                         <div class="cty-title"><a href="{:get_site_url('协兴园区公安')}">协兴园区公安分局</a></div>
                         <ul class="cty-List">
                           <li><a href="{:get_site_url('协兴派出所')}">协兴派出所</a></li>
                           <li><a href="{:get_site_url('邓小平故居派出所')}">邓小平故居派出所</a></li>
                           <li><a href="{:get_site_url('浓溪')}">浓溪派出所</a></li>
                         </ul>
                     </div>
                   </li>
                   
                   <li style="position:absolute; z-index:10; display:block; top:237px; left:495px; display:block;">
                     <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/map04.png"></a>
                     <div class="cty-jk" id="dis">
                         <div class="cty-title"><a href="{:get_site_url('经开区公安')}">经开区公安分局</a></div>
                         <ul class="cty-List">
                           <li><a href="{:get_site_url('奎阁')}">奎阁派出所</a></li>
                           <li><a href="{:get_site_url('护安')}">护安派出所</a></li>
                           <li><a href="{:get_site_url('新桥')}">新桥派出所</a></li>
                         </ul>
                     </div>
                   </li>
                                                      
                   <li style="position:absolute; z-index:1; display:block; top:270px; left:437px; display:block;">
                     <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/map02.png"></a>
                     <div class="cty-zsyq" id="dis">
                         <div class="cty-title"><a href="{:get_site_url('枣山园区公安')}">枣山园区公安分局</a></div>
                         <ul class="cty-List">
                           <li><a href="{:get_site_url('枣山派出所')}">枣山派出所</a></li>
                           <li><a href="{:get_site_url('广门')}">广门派出所</a></li>
                           <li><a href="{:get_site_url('穿石')}">穿石派出所</a></li>
                           <li><a href="{:get_site_url('红庙')}">红庙派出所</a></li>
                         </ul>
                     </div>
                   </li>
                   
                   <li style="position:absolute; z-index:1; display:block; top:435px; left:485px; display:block;">
                     <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/map10.png"></a>
                     <div class="cty-hj" id="dis">
                         <div class="cty-title"><a href="{:get_site_url('华蓥市公安')}">华蓥市公安局</div>
                         <ul class="cty-List">
                           <li><a href="{:get_site_url('双河')}">双河派出所</a></li>
                           <li><a href="{:get_site_url('天池')}">天池派出所</a></li>
                           <li><a href="{:get_site_url('红岩')}">红岩派出所</a></li>
                           <li><a href="{:get_site_url('禄市')}">禄市派出所</a></li>
                           <li><a href="{:get_site_url('华龙')}">华龙派出所</a></li>
                           <li><a href="{:get_site_url('永兴')}">永兴派出所</a></li>
                           <li><a href="{:get_site_url('明月')}">明月派出所</a></li>
                           <li><a href="{:get_site_url('古桥')}">古桥派出所</a></li>
                           <li><a href="{:get_site_url('阳和')}">阳和派出所</a></li>
                           <li><a href="{:get_site_url('高兴')}">高兴派出所</a></li>
                           <li><a href="{:get_site_url('观音溪')}">观音溪派出所</a></li>
                           <li><a href="{:get_site_url('溪口')}">溪口派出所</a></li>
                           <li><a href="{:get_site_url('庆华')}">庆华派出所</a></li>
                         </ul>
                     </div>
                   </li>
                   
                   <li style="position:absolute; z-index:1; display:block; top:322px; right:160px; display:block;">
                     <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/map09.png"></a>
                     <div class="cty-ls" id="dis">
                         <div class="cty-title"><a href="{:get_site_url('邻水县公安')}">邻水县公安局</a></div>
                         <ul class="cty-List">
                           <li><a href="{:get_site_url('鼎屏')}">鼎屏派出所</a></li>
                           <li><a href="{:get_site_url('邻水城东')}">城东派出所</a></li>
                           <li><a href="{:get_site_url('邻水城北')}">城北派出所</a></li>
                           <li><a href="{:get_site_url('邻水城南')}">城南派出所</a></li>
                           <li><a href="{:get_site_url('柑子')}">柑子派出所</a></li>
                           <li><a href="{:get_site_url('坛同')}">坛同派出所</a></li>
                           <li><a href="{:get_site_url('高滩')}">高滩派出所</a></li>
                           <li><a href="{:get_site_url('牟家')}">牟家派出所</a></li>
                           <li><a href="{:get_site_url('合流')}">合流派出所</a></li>
                           <li><a href="{:get_site_url('袁市')}">袁市派出所</a></li>
                           <li><a href="{:get_site_url('九龙')}">九龙派出所</a></li>
                           <li><a href="{:get_site_url('丰禾')}">丰禾派出所</a></li>
                           <li><a href="{:get_site_url('石永')}">石永派出所</a></li>
                           <li><a href="{:get_site_url('石滓')}">石滓派出所</a></li>
                           <li><a href="{:get_site_url('王家')}">王家派出所</a></li>
                           <li><a href="{:get_site_url('兴仁')}">兴仁派出所</a></li>
                         </ul>
                     </div>
                   </li>
                   
                   <li style="position:absolute; z-index:1; display:block; top:225px; left:570px; display:block;">
                     <a href="#"><img src="{$config_siteurl}statics/themes/L1_Global/images/map05.png"></a>
                     <div class="cty-qf" id="dis">
                         <div class="cty-title"><a href="{:get_site_url('前锋区公安')}">前锋区公安分局</a></div>
                         <ul class="cty-List">
                           <li><a href="{:get_site_url('大佛寺')}">大佛寺派出所</a></li>
                           <li><a href="{:get_site_url('广兴')}">广兴派出所</a></li>
                           <li><a href="{:get_site_url('龙滩')}">龙滩派出所</a></li>
                           <li><a href="{:get_site_url('观阁')}">观阁派出所</a></li>
                           <li><a href="{:get_site_url('小井')}">小井派出所</a></li>
                           <li><a href="{:get_site_url('桂兴')}">桂兴派出所</a></li>
                           <li><a href="{:get_site_url('虎城')}">虎城派出所</a></li>
                           <li><a href="{:get_site_url('观塘')}">观塘派出所</a></li>
                           <li><a href="{:get_site_url('代市')}">代市派出所</a></li>
                           <li><a href="{:get_site_url('光辉')}">光辉派出所</a></li>
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
