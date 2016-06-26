<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <link href="favicon.ico" rel="shortcut icon" />
    <link rel="canonical" href="{$config_siteurl}" />
    <title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
    <meta name="description" content="{$SEO['description']}" />
    <meta name="keywords" content="{$SEO['keyword']}" />
    <link href="{$config_siteurl}statics/themes/L1_Global/css/index.css" rel="stylesheet" type="text/css" />
    <link href="{$config_siteurl}statics/themes/L1_Global/css/interact-style.css" rel="stylesheet" type="text/css" />
    <script src="{$config_siteurl}statics/js/jquery.js" type="text/javascript"></script>
</head>
<body>
<!-- main-->
<div class="main">
    <!-- head-->
    <div class="head">
        <template file="Content/Mods/top_header.php" />
        <!--nav-->
        <ul class="banner-nav">
            <a href="/"><li>首页</li></a>
            <a href="{:U('Content/Site/police_news')}"><li>警务资讯</li></a>
            <a href="{:U('Content/Site/work_building')}"><li>办事大厅</li></a>
            <a href="{:U('Content/Site/sunshine_police')}"><li>阳光警务</li></a>
            <a href="{:U('Content/Site/police_interaction')}"><li class="on">警民互动</li></a>
            <a href="{:U('Content/Site/service_people')}"><li>服务民生</li></a>
        </ul>
    </div>

    <!-- content-->
    <div class="content">
        <div class="interact-table1">
            <div class="interact-mail">
               <div class="interact-mail-title"><img src="{$config_siteurl}statics/themes/L1_Global/images/interact1.png">局长信箱</div>
               <div class="interact-mail-img"><p><img src="{$config_siteurl}statics/themes/L1_Global/images/interact7.png"></p><p style="line-height:25px;">广安市人民政府副市长邓文国</p></div>
               <div class="interact-mail-text">
                  <div class="interact-mail-text-down"><p style="width:440px; height:auto; overflow:hidden; margin:0 auto;font-weight:normal;letter-spacing:2px;">您好：<br>{:nbsp(6)}欢迎您在局长信箱留言！您的诉求，意见和建议，我们在倾听，您的期待就是我们工作努力的方向，我们将热诚为您服务。</p></div>
                  <!--
                  <ul>
                    <li class="mail-button"><a href="{:U('DirectorMail/Index/info')}">信箱说明</a></li>
                    <li class="mail-button"><a href="{:U('DirectorMail/Index/add')}">我要写信</a></li>
                    <li><img src="{$config_siteurl}statics/themes/L1_Global/images/interact9.png">今日来信：{$today}</li>
                    <li><img src="{$config_siteurl}statics/themes/L1_Global/images/interact9.png">昨日天信：{$yestoday}</li>
                    <li class="mail-button"><a href="{:U('DirectorMail/Index/search')}">信件查询</a></li>
                    <li class="mail-button"><a href="{:U('DirectorMail/Index/index')}">热点咨询</a></li>
                    <li><img src="{$config_siteurl}statics/themes/L1_Global/images/interact9.png">办结数量：{$over}</li>
                    <li><img src="{$config_siteurl}statics/themes/L1_Global/images/interact9.png">热点咨询：0</li>
                  </ul>
                  -->
                 <div style="width:100%;text-align:center;margin-top:50px;">
                    <li class="mail-button" style="display:inline-block;margin:20px;"><a href="{:U('DirectorMail/Index/add')}" style="line-height:30px;">我要写信</a></li>
                    <li class="mail-button" style="display:inline-block;margin:20px;"><a href="{:U('DirectorMail/Index/search')}" style="line-height:30px;">信件查询</a></li>
                 </div>
               </div>
            </div>
            <div class="interact-table1-right">
                <ul>
                   <a href="#" class="disabled-link"><li style="margin-bottom:20px"><img src="{$config_siteurl}statics/themes/L1_Global/images/interact3.png"></li></a>
                   <a href="#" class="disabled-link"><li style="margin-bottom:20px"><img src="{$config_siteurl}statics/themes/L1_Global/images/interact4.png"></li></a>
                   <a href="http://weibo.com/u/2918589882?nick=%E9%87%91%E7%9B%BE%E5%B9%BF%E5%AE%89&is_hot=1"><li style="margin-bottom:20px"><img src="{$config_siteurl}statics/themes/L1_Global/images/interact5.png"></li></a>
                   <a href="{:U('DirectorMail/Membermail/info')}"<li><img src="{$config_siteurl}statics/themes/L1_Global/images/interact6.png"></li></a>
                </ul>
            </div>   
        </div>
        
        <div class="interact-table1"><img src="{$config_siteurl}statics/themes/L1_Global/images/interact10.png"></div>
        <div class="interact-table2">
           <div class="interact-table2-tab1">
              <div class="interact-table2-titele"><samp>更多>></samp><span>民意征集</span></div>
              <div class="interact-table2-text">
                 <ul>
                   <li><span>05-18</span><img src="{$config_siteurl}statics/themes/L1_Global/images/interact13.png">养老机构规范服务工作征集意见</li>
                   <li><span>05-18</span><img src="{$config_siteurl}statics/themes/L1_Global/images/interact13.png">养老机构规范服务工作征集意见</li>
                   <li><span>05-18</span><img src="{$config_siteurl}statics/themes/L1_Global/images/interact13.png">养老机构规范服务工作征集意见</li>
                   <li><span>05-18</span><img src="{$config_siteurl}statics/themes/L1_Global/images/interact13.png">养老机构规范服务工作征集意见</li>
                   <li><span>05-18</span><img src="{$config_siteurl}statics/themes/L1_Global/images/interact13.png">养老机构规范服务工作征集意见</li>
                   <li><span>05-18</span><img src="{$config_siteurl}statics/themes/L1_Global/images/interact13.png">养老机构规范服务工作征集意见</li>
                   <li><span>05-18</span><img src="{$config_siteurl}statics/themes/L1_Global/images/interact13.png">养老机构规范服务工作征集意见</li>

                 </ul>
              </div>
           </div>
           
           <div class="interact-table2-tab2">
              <div class="interact-table2-titele"><samp>更多>></samp><span>网上咨询</span></div>
              <div class="interact-table2-text">
                 <ul>
                   <li><span>05-18</span><img src="{$config_siteurl}statics/themes/L1_Global/images/interact13.png">养老机构规范服务工作征集意见</li>
                   <li><span>05-18</span><img src="{$config_siteurl}statics/themes/L1_Global/images/interact13.png">养老机构规范服务工作征集意见</li>
                   <li><span>05-18</span><img src="{$config_siteurl}statics/themes/L1_Global/images/interact13.png">养老机构规范服务工作征集意见</li>
                   <li><span>05-18</span><img src="{$config_siteurl}statics/themes/L1_Global/images/interact13.png">养老机构规范服务工作征集意见</li>
                   <li><span>05-18</span><img src="{$config_siteurl}statics/themes/L1_Global/images/interact13.png">养老机构规范服务工作征集意见</li>
                   <li><span>05-18</span><img src="{$config_siteurl}statics/themes/L1_Global/images/interact13.png">养老机构规范服务工作征集意见</li>
                   <li><span>05-18</span><img src="{$config_siteurl}statics/themes/L1_Global/images/interact13.png">养老机构规范服务工作征集意见</li>

                 </ul>
              </div>
           </div>
           
           <div class="interact-table2-tab3">
              <div class="interact-table2-titele"><span>服务之星</span></div>
              <dl>
                  <dt><img src="{$config_siteurl}statics/themes/L1_Global/images/interact14.jpg" style="width:100%;margin-top:12px;"></dt>
                  <dd>
                    <p><span>姓名：</span>王晓洲</p>
                    <p><span>警号：</span>049840</p>
                    <p><span>职务：</span>主任科员</p>
                    <p><span>单位：</span>出入境管理支队</p>
                  </dd>
              </dl>
           </div>
        </div>
        
        
        <div class="interact-table2">
           <div class="interact-table2-tab1">
              <div class="interact-table2-titele"><samp>更多>></samp><span>在线访谈</span></div>
              <div class="interact-table2-text">
                 <p>主题：出入有境，服务无境——推广网上便民服务出入境民警在线访谈</p>
                 <p>日期：2015-11-30 15:30:00</p>
                 <p>访谈嘉宾：郑州市公安局出入境管理处</p>
                 <p>访谈内容：本栏目将于十月中旬组织开展一期出入境业务在线访谈，目前正在紧张筹备中，届时请网友踊跃参与。</p>
                 <p>&nbsp;</p>
              </div>
           </div>
           
           <div class="interact-table2-tab2">
              <div class="interact-table2-titele"><samp>更多>></samp><span>在线调查</span></div>
              <div class="interact-table2-text">
                 <p>主题：出入有境，服务无境——推广网上便民服务出入境民警在线访谈</p>
                 <p>日期：2015-11-30 15:30:00</p>
                 <p>访谈嘉宾：郑州市公安局出入境管理处</p>
                 <p>访谈内容：本栏目将于十月中旬组织开展一期出入境业务在线访谈，目前正在紧张筹备中，届时请网友踊跃参与。</p>
                 <p>&nbsp;</p>
              </div>
           </div>
           
           <div class="interact-table2-tab3">
              <div class="interact-table2-titele"><span>电子地图</span></div>
              <img src="{$config_siteurl}statics/themes/L1_Global/images/interact15.png">
           </div>
        </div>
        <template file="Content/Mods/footer.php" />
    </div>
    <template file="Content/Mods/QR.php"/>
    <template file="Content/Mods/quick_nav.php"/>
    <template file="Content/utils.php"/>
</div>
</body>
</html>
