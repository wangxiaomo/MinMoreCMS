<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="chrome=1" />
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
            <a href="{:U('Content/Site/service_people')}"><li style="width:165px;">服务民生</li></a>
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
                 <div style="width:100%;text-align:center;margin-top:30px;">
                    <li class="mail-button" style="display:inline-block;margin:20px;"><a href="{:U('DirectorMail/Index/add')}" style="line-height:30px;">我要写信</a></li>
                    <li class="mail-button" style="display:inline-block;margin:20px;"><a href="{:U('DirectorMail/Index/search')}" style="line-height:30px;">信件查询</a></li>
                 </div>
               </div>
            </div>
            <div class="interact-table1-right">
                <ul>
                   <a href="{:U('DirectorMail/Consult/add', array('type'=>'wsjb'))}"><li style="margin-bottom:20px"><img src="{$config_siteurl}statics/themes/L1_Global/images/interact3.png"></li></a>
                   <a href="{:U('DirectorMail/Onlinepetition/add')}"><li style="margin-bottom:20px"><img src="{$config_siteurl}statics/themes/L1_Global/images/interact4.png"></li></a>
                   <a href="http://weibo.com/u/2918589882?nick=%E9%87%91%E7%9B%BE%E5%B9%BF%E5%AE%89&is_hot=1"><li style="margin-bottom:20px"><img src="{$config_siteurl}statics/themes/L1_Global/images/interact5.png"></li></a>
                   <a href="{:U('DirectorMail/Membermail/login')}"<li><img src="{$config_siteurl}statics/themes/L1_Global/images/interact6.png"></li></a>
                </ul>
            </div>   
        </div>
        
        <div class="interact-table1"><img src="{$config_siteurl}statics/themes/L1_Global/images/mid-logo-bg.gif"></div>
        <div class="interact-table2">
           <div class="interact-table2-tab1">
              <div class="interact-table2-titele"><samp><a href="{:getCategory(10,'url')}">更多>></a></samp><span>{:getCategory(10,'catname')}</span></div>
              <div class="interact-table2-text">
                 <ul>
                   <content action="lists" catid="10" order="id DESC" num="7">
                     <volist name="data" id="vo">
                       <a href="{$vo.url}"><li><span>{$vo.updatetime|date='m-d',###}</span><img src="{$config_siteurl}statics/themes/L1_Global/images/interact13.png">{$vo.title|str_cut=###,20}</li></a>
                     </volist>
                   </content>
                 </ul>
              </div>
           </div>
           
           <div class="interact-table2-tab2">
              <div class="interact-table2-titele"><samp><a href="{:getCategory(43,'url')}">更多>></a></samp><span>{:getCategory(43,'catname')}</span></div>
              <div class="interact-table2-text">
                 <ul>
                   <content action="lists" catid="43" order="id DESC" num="7">
                     <volist name="data" id="vo">
                       <a href="{$vo.url}"><li><span>{$vo.updatetime|date='m-d',###}</span><img src="{$config_siteurl}statics/themes/L1_Global/images/interact13.png">{$vo.title|str_cut=###,20}</li></a>
                     </volist>
                   </content>
                 </ul>
              </div>
           </div>
           
           <div class="interact-table2-tab3">
              <div class="interact-table2-titele"><span>服务之星</span></div>
              <dl>
                  <dt><img src="{$star.thumb}" style="width:100%;margin-top:12px;"></dt>
                  <dd>
                    <p><span>姓名：</span>{$star.name}</p>
                    <p><span>警号：</span>{$star.policeid}</p>
                    <p><span>职务：</span>{$star.position}</p>
                    <p><span>单位：</span>{$star.department}</p>
                  </dd>
              </dl>
           </div>
        </div>
        
        
        <div class="interact-table2">
           <div class="interact-table2-tab1">
              <div class="interact-table2-titele"><samp><a href="{:U('Interview/Index/index')}">更多>></a></samp><span>在线访谈</span></div>
              <div class="interact-table2-text">
                 <p>主题：{$interview.title}</p>
                 <p>日期：{$interview.create_time}</p>
                 <p>访谈嘉宾：{$interview.guest}  </p>
                 <p>访谈内容：{$interview.summary} </p>
                 <p>&nbsp;</p>
              </div>
           </div>
           
           <div class="interact-table2-tab2">
              <div class="interact-table2-titele"><samp>更多>></samp><span>在线调查</span></div>
              <div class="interact-table2-text">
                 <p>主题：广安“网上公安”功能设计问卷调查</p>
                 <p>截止日期：2016-12-30 15:30:00</p>
                 <p>发起单位：广安市公安局</p>
                 <p>问卷主旨：通过本问卷广征网民意见，实现对现有网上办事功能的完善和补充，改进我们的服务质量。</p>
                 <p>&nbsp;</p>
              </div>
           </div>
           
           <div class="interact-table2-tab3">
              <div class="interact-table2-titele"><span>电子地图</span></div>
              <a href="{:U('Content/Site/map')}"><img src="{$config_siteurl}statics/themes/L1_Global/images/interact15.png"></a>
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
