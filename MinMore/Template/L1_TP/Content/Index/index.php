<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<!doctype html>
<html class="no-js">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="chrome=1" />
    <link href="favicon.ico" rel="shortcut icon" />
    <link rel="canonical" href="{$config_siteurl}" />
    <title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
    <meta name="description" content="{$SEO['description']}" />
    <meta name="keywords" content="{$SEO['keyword']}" />
    <!-- 公共样式 -->
    <link href="{$config_siteurl}statics/themes/L1_TP/css/public.css" type="text/css" rel="stylesheet">
    <!-- 首页样式 -->
    <link href="{$config_siteurl}statics/themes/L1_TP/css/index.css" type="text/css" rel="stylesheet">
</head>

<body>
<template file="Content/Mods/header.php" />
<div class="main">

  <!-- 第一栏 -->
  <div class="content marginT20 marginb20">
    <!-- 第一栏左 -->
    <div class="LeftTop grayBG fl">
      <div class="Query">
        <div class="QueTit hlde"><img src="{$config_siteurl}statics/themes/L1_TP/images/GA01.png" class="fl marginR10"><h3 class="Zanglan">查询中心</h3></div>
        <ul>
          <li class="aLi text-fl"><a href="http://sc.122.gov.cn/views/inquiry.html">机动车违法</a></li>
          <li class="aLi text-fm"><a href="http://sc.122.gov.cn/views/inquiry.html">驾驶证记分</a></li>
          <li class="aLi text-fr"><a href="http://sc.122.gov.cn/views/inquiry.html">报废车辆</a></li>
        </ul>
        <hr>
      </div>
      <div class="Query">
        <div class="QueTit hlde"><img src="{$config_siteurl}statics/themes/L1_TP/images/GA02.png" class="fl marginR10"><h3 class="Zanglan">机动车</h3></div>
        <ul>
          <li class="aLi text-fl"><a href="http://sc.122.gov.cn/m/showPageVeh">机动车号牌</a></li>
          <li class="aLi text-fm"><a href="http://sc.122.gov.cn/views/member/vehiclemodify.html">联系变更</a></li>
          <li class="aLi text-fr"><a href="http://sc.122.gov.cn/veh/nsyy/initNsyyQuery">车检预约</a></li>
        </ul>
        <hr>
      </div>
      <div class="Query">
        <div class="QueTit hlde"><img src="{$config_siteurl}statics/themes/L1_TP/images/GA03.png" class="fl marginR10"><h3 class="Zanglan">驾驶证</h3></div>
        <ul>
          <li class="aLi text-fl"><a href="http://sc.122.gov.cn/m/showPageDrv">期满换证</a></li>
          <li class="aLi text-fm"><a href="http://sc.122.gov.cn/m/showPageDrv">遗失补证</a></li>
          <li class="aLi text-fr"><a href="http://sc.122.gov.cn/drv/yy/initYyQuery">考试预约</a></li>
          <li class="aLi text-fl"><a href="http://sc.122.gov.cn/m/showPageDrv">损毁换证</a></li>
        </ul>
        <hr>
      </div>
      <ul class="LeftTop-down">
        <li><img src="{$config_siteurl}statics/themes/L1_TP/images/GA04.png" class="fl marginR10"><a href="http://sc.122.gov.cn/">交通管理综合服务平台</a></li>
        <li><img src="{$config_siteurl}statics/themes/L1_TP/images/GA05.png" class="fl marginR10"><a href="http://www.gaga.gov.cn">“互联网+公安”综合服务平台</a></li>
        <li><img src="{$config_siteurl}statics/themes/L1_TP/images/GA06.png" class="fl marginR10"><a href="http://www.gaga.gov.cn/index.php?m=Site&a=sunshine_police">广安阳光警务执法公开平台</a></li>
      </ul>
    </div>
    <!-- 第一栏左结束 -->
    <!-- 第一栏中 -->
    <div class="MidTop">
      <div class="MidTit"><div class="headlines">头条热点</div>
        <content action="lists" catid="67" order="id DESC" num="1">
            <volist name="data" id="vo">
                <a href="{$vo.url}">{$vo.title|str_cut=###,20}</a>
            </volist>
        </content>
      </div>
      <hr>
      <div class="MidPic marginT10">
        <position action="position" posid="2" num="4">
        <div id="banner_tabs" class="flexslider">
            <ul class="slides">
                <volist name="data" id="vo">
                    <li class="slidesList"><a href="{$vo.data.url}">
                        <div class="bannerTxt">             
                            <div class="bannerBG"></div>      
                            <p class="fs16">{$vo.data.title|str_cut=###,20}</p>
                          </div></a>
                          <a href="{$vo.data.url}"><img src="{$vo.data.thumb}" /></a>
                    </li>
                </volist>
            </ul>
            <ol id="bannerCtrl" class="flex-control-nav flex-control-paging" >
                <volist name="data" id="vo">
                    <li><a></a></li>
                </volist>
            </ol>
        </div>
        </position>
<script src="{$config_siteurl}statics/js/jquery.js"></script>
<script src="{$config_siteurl}statics/themes/L1_TP/js/slider.js"></script>
<script type="text/javascript">
$(function() {
	var bannerSlider = new Slider($('#banner_tabs'), {
		time: 5000,
		delay: 400,
		event: 'hover',
		auto: true,
		mode: 'fade',
		controller: $('#bannerCtrl'),
		activeControllerCls: 'active'
	});
	$('#banner_tabs .flex-prev').click(function() {
		bannerSlider.prev()
	});
	$('#banner_tabs .flex-next').click(function() {
		bannerSlider.next()
	});
})
</script>
      </div>
    </div>
    <!-- 第一栏中结束 -->
    
    
    <!-- 第一栏右 -->
    <div class="RgihtTop fr">
      <h3 class="text-fm Zanglan">用户登录</h3>
      <div class="row  marginb10">  
        <div class="col-md-6 fl text-fm marginT10"><input type="button" class="But blueBG fs16 login-btn" value="登录" data-url="{:C('MINMORE_LOGIN_URL')}"></div>
        <div class="col-md-6 fr text-fm marginT10"><input type="button" class="But orangeBG fs16 register-btn" value="注册" data-url="{:C('MINMORE_REGISTER_URL')}"></div>
      </div>
      <ul class="RgihtTop-List">
        <a href="http://www.gaga.gov.cn/wsga/wsga/web/index.htm"><li class="border_r"><ol><img src="{$config_siteurl}statics/themes/L1_TP/images/GA09.png"></ol><p>办事指南</p></li></a>
        <a href="http://www.sxgajj.gov.cn/About_us/Calculator.html"><li><ol><img src="{$config_siteurl}statics/themes/L1_TP/images/GA10.png"></ol><p>车检计算器</p></li></a>
        <a href="http://www.gaga.gov.cn/index.php?g=DirectorMail&m=Consult&a=add&type=wszx"><li class="border_r"><ol><img src="{$config_siteurl}statics/themes/L1_TP/images/GA11.png"></ol><p>智能问答</p></li></a>
        <a href="http://sc.122.gov.cn"><li><ol><img src="{$config_siteurl}statics/themes/L1_TP/images/GA12.png"></ol><p>网上驾校</p></li></a>
        <a href="http://www.scjj.gov.cn/"><li class="border_r"><ol><img src="{$config_siteurl}statics/themes/L1_TP/images/GA13.png"></ol><p>在线选号</p></li></a>
        <a href="http://sc.122.gov.cn/views/member/violation.html"><li><ol><img src="{$config_siteurl}statics/themes/L1_TP/images/GA14.png"></ol><p>违法查询</p></li></a>
      </ul>
    </div>
    <!-- 第一栏右结束 -->
  </div>
  <!-- 第一栏结束 -->
  
  <!-- 最新公告 -->
  <div class="LavenderBG fs20">
    <span class="fs14"><a href="{:getCategory(72,'url')}">更多内容</a></span><i><img src="{$config_siteurl}statics/themes/L1_TP/images/GA15.png"></i><samp class="Light-blue">最新公告：</samp>
    <content action="lists" catid="72" order="id DESC" num="1">
        <volist name="data" id="vo">
            <samp class="red"><a href="{$vo.url}">{$vo.title|str_cut=###,20}</a></samp>
        </volist>
    </content>
  </div>
  <!-- 最新公告结束 -->
  
  
  <!-- 第二栏 -->
  <div class="content marginT20 marginb10">
    <!-- 信箱 -->
    <div class="mailbox fl">
       <p class="marginb10"><a href="{:U('DirectorMail/Index/add')}"><img src="{$config_siteurl}statics/themes/L1_TP/images/GA16.png"></a></p>
       <p class="marginb10"><a href="{:getCategory(73,'url')}"><img src="{$config_siteurl}statics/themes/L1_TP/images/GA17.png"></a></p>
       <p><a href="{:getCategory(74,'url')}"><img src="{$config_siteurl}statics/themes/L1_TP/images/GA18.png"></a></p>
    </div>
    <!-- 信箱结束 -->
    
    <!-- 交警动态 -->
    <div class="dynamic fl">
      <div id="tb_" class="xqer">
        <ul>
          <li id="tb_1" class="hovertab news-tab-hd" onClick="x:hoverLi(1);" data-url="{:getCategory(68,'url')}">交管要文</li>
          <li id="tb_2" class="normaltab news-tab-hd" onClick="i:hoverLi(2);" data-url="{:getCategory(69, 'url')}">交管动态</li>
          <li id="tb_3" class="normaltab news-tab-hd" onClick="o:hoverLi(3);" data-url="{:getCategory(70, 'url')}">媒体报道</li>
          <li id="tb_4" class="normaltab news-tab-hd" onClick="p:hoverLi(4);" data-url="{:getCategory(71, 'url')}">安全宣传</li>
          <span class="More fr tabs-show-more pointer-cursor">查看更多</span>
        </ul>
      </div>
      <div class="dis news-tab" id="tbc_01"> 
        <div class="jsp">
         <content action="lists" catid="68" order="id DESC" num="5">
            <volist name="data" id="vo" offset="0" length="1">
              <dl>
                <dt class="Time fr marginT5">{$vo.updatetime|date='Y-m-d',###}</dt>
                <dd class="fl fs18"><a href="{$vo.url}">{$vo.title|str_cut=###,25}</a></dd>
              </dl>
              <div class="profile">{$vo.description|str_cut=###,120}<span class="red"><a href="{$vo.url}">【详细内容】</a></span></div>
            </volist>
          <ul class="SmallNew">
            <volist name="data" id="vo" offset="1" length="4">
                <li><a href="{$vo.url}">{$vo.title|str_cut=###,14}</a></li>
            </volist>
          </ul>
          </content>
        </div>
      </div>
      <div class="undis news-tab" id="tbc_02"> 
        <div class="jsp">
         <content action="lists" catid="69" order="id DESC" num="5">
            <volist name="data" id="vo" offset="0" length="1">
              <dl>
                <dt class="Time fr marginT5">{$vo.updatetime|date='Y-m-d',###}</dt>
                <dd class="fl fs18"><a href="{$vo.url}">{$vo.title|str_cut=###,25}</a></dd>
              </dl>
              <div class="profile">{$vo.description|str_cut=###,120}<span class="red"><a href="{$vo.url}">【详细内容】</a></span></div>
            </volist>
          <ul class="SmallNew">
            <volist name="data" id="vo" offset="1" length="4">
                <li><a href="{$vo.url}">{$vo.title|str_cut=###,14}</a></li>
            </volist>
          </ul>
          </content>
        </div>
      </div>
      <div class="undis news-tab" id="tbc_03"> 
        <div class="jsp">
         <content action="lists" catid="70" order="id DESC" num="5">
            <volist name="data" id="vo" offset="0" length="1">
              <dl>
                <dt class="Time fr marginT5">{$vo.updatetime|date='Y-m-d',###}</dt>
                <dd class="fl fs18"><a href="{$vo.url}">{$vo.title|str_cut=###,25}</a></dd>
              </dl>
              <div class="profile">{$vo.description|str_cut=###,120}<span class="red"><a href="{$vo.url}">【详细内容】</a></span></div>
            </volist>
          <ul class="SmallNew">
            <volist name="data" id="vo" offset="1" length="4">
                <li><a href="{$vo.url}">{$vo.title|str_cut=###,14}</a></li>
            </volist>
          </ul>
          </content>
        </div>
      </div>
      <div class="undis news-tab" id="tbc_04"> 
        <div class="jsp">
         <content action="lists" catid="71" order="id DESC" num="5">
            <volist name="data" id="vo" offset="0" length="1">
              <dl>
                <dt class="Time fr marginT5">{$vo.updatetime|date='Y-m-d',###}</dt>
                <dd class="fl fs18"><a href="{$vo.url}">{$vo.title|str_cut=###,25}</a></dd>
              </dl>
              <div class="profile">{$vo.description|str_cut=###,120}<span class="red"><a href="{$vo.url}">【详细内容】</a></span></div>
            </volist>
          <ul class="SmallNew">
            <volist name="data" id="vo" offset="1" length="4">
                <li><a href="{$vo.url}">{$vo.title|str_cut=###,14}</a></li>
            </volist>
          </ul>
          </content>
        </div>
      </div>
      <script src="{$config_siteurl}statics/themes/L1_TP/js/Glide.js" type="text/javascript" language="javascript"></script>
    </div>
    <!-- 交警动态结束 -->
    
    <!-- 天气 -->
    <div class="MidRight fr border">
       <h3 class="blue text-fm marginb10 marginT5">天气预报</h3>
       <div class="gray text-fm marginb10 weather-context"></div>
       <img src="{$config_siteurl}statics/themes/L1_TP/images/GA19.png">
    </div>
    <!-- 天气结束 -->
  </div>
  
  <!-- 第三栏 -->
  <div class="content marginb20">
    <!-- 调查研究 -->
    <div class="mailbox fl">
      <div class="Title"><samp class="More fs14 fr marginR20"><a href="{:getCategory(86,'url')}">查看更多</a></samp><span class="fs18 yellow">调查</span>研究</div>
      <content action="lists" catid="86" order="id DESC" num="4">
        <volist name="data" id="vo" offset="0" length="1">
          <div class="MaiboxPic marginT20 marginb10">
            <a href="{$vo.url}"><img src="{$vo.thumb}" style="width:250px;height:207px;"></a>
          </div>
        </volist>
          <div class="MaiboxPic">        
            <ul class="MaiboxTxt">
              <volist name="data" id="vo" offset="1" length="3">
                  <li><a href="{$vo.url}">{$vo.title|str_cut=###,15}</a></li>
              </volist>
            </ul>
            <div class="colorTit">往<br>期<br>回<br>顾</div>
          </div>      
        </content>
    </div>
    <!-- 调查研究结束 -->
    
    <!-- 警务公开 -->
    <div class="MidMain fr">
      <div class="Title"><span class="fs18 yellow">警务</span>公开</div>
      <!-- 警务公开中 -->
      <ul class="PolicMain marginT20">
        <li>
        <a href="{:getCategory(76,'url')}"><div class="TitBG blueBG fs16"><img src="{$config_siteurl}statics/themes/L1_TP/images/GA21.png">政务信息公开</div></a>
        <div class="Policing">
          <content action="lists" catid="76" order="id DESC" num="1">
            <volist name="data" id="vo">
              <h4 class="marginT10"><a href="{$vo.url}">{$vo.title|str_cut=###,12}</a></h4>
              <p class="fs14 gray">{$vo.description|str_cut=###,30}</p>
            </volist>
          </content>
        </div>
        </li>
        <li>
        <a href="{:getCategory(77,'url')}"><div class="TitBG blueBG fs16"><img src="{$config_siteurl}statics/themes/L1_TP/images/GA22.png">交通管理公告</div></a>
        <div class="Policing">
          <content action="lists" catid="77" order="id DESC" num="1">
            <volist name="data" id="vo">
              <h4 class="marginT10"><a href="{$vo.url}">{$vo.title|str_cut=###,12}</a></h4>
              <p class="fs14 gray">{$vo.description|str_cut=###,30}</p>
            </volist>
          </content>
        </div>
        </li>
        <li>
        <a href="{:getCategory(78,'url')}"><div class="TitBG blueBG fs16"><img src="{$config_siteurl}statics/themes/L1_TP/images/GA23.png">机动车管理公告</div></a>
        <div class="Policing">
          <content action="lists" catid="78" order="id DESC" num="1">
            <volist name="data" id="vo">
              <h4 class="marginT10"><a href="{$vo.url}">{$vo.title|str_cut=###,12}</a></h4>
              <p class="fs14 gray">{$vo.description|str_cut=###,30}</p>
            </volist>
          </content>
        </div>
        </li>
        <li class="marginT10">
        <a href="{:getCategory(79,'url')}"><div class="TitBG blueBG fs16"><img src="{$config_siteurl}statics/themes/L1_TP/images/GA24.png">驾驶人管理公告</div></a>
        <div class="Policing">
          <content action="lists" catid="79" order="id DESC" num="1">
            <volist name="data" id="vo">
              <h4 class="marginT10"><a href="{$vo.url}">{$vo.title|str_cut=###,12}</a></h4>
              <p class="fs14 gray">{$vo.description|str_cut=###,30}</p>
            </volist>
          </content>
        </div>
        </li>
        <li class="marginT10">
        <a href="{:getCategory(80,'url')}"><div class="TitBG blueBG fs16"><img src="{$config_siteurl}statics/themes/L1_TP/images/GA25.png">交通违法公告</div></a>
        <div class="Policing">
          <content action="lists" catid="80" order="id DESC" num="1">
            <volist name="data" id="vo">
              <h4 class="marginT10"><a href="{$vo.url}">{$vo.title|str_cut=###,12}</a></h4>
              <p class="fs14 gray">{$vo.description|str_cut=###,30}</p>
            </volist>
          </content>
        </div>
        </li>
      </ul>
      <!-- 警务公开中结束 -->
      
      <!-- 图个明白 -->
      <div class="MidRight fr marginT20">
       <div class="TitBG orangeBG fs16 marginb10"><img src="{$config_siteurl}statics/themes/L1_TP/images/GA26.png">图个明白</div>
       <img src="{$config_siteurl}statics/themes/L1_TP/images/GA27.png">
      </div>
      <!-- 图个明白结束 -->
    </div>
    <!-- 警务公开结束 -->
  </div>
  <!-- 第三栏结束 -->
  
  
  <!-- 第四栏 -->
  <div class="content">
    <!-- 宣传视频 -->
    <div class="mailbox fl">
      <div class="Title"><samp class="More fs14 fr marginR20"><a href="{:getCategory(81,'url')}">查看更多</a></samp><span class="fs18 yellow">宣传</span>视频</div>
      <content action="lists" catid="81" order="id DESC" num="4">
      <div class="MaiboxPic marginT20 marginb10">
        <volist name="data" id="vo" offset="0" length="1">
            <a href="{$vo.url}"><img src="{$vo.thumb}" style="width:250px;height:207px;"></a>
        </volist>
      </div>
      <div class="MaiboxPic">        
        <ul class="MaiboxTxt">
          <volist name="data" id="vo" offset="1" length="3">
              <li><img src="{$config_siteurl}statics/themes/L1_TP/images/vido.png"><a href="{$vo.url}">{$vo.title|str_cut=###,15}</a></li>
          </volist>
        </ul>
        <div class="colorTit">往<br>期<br>回<br>顾</div>
      </div>      
      </content>
    </div>
    <!-- 宣传视频结束 -->
    
    <!-- 专题热点 -->
    <div class="MidMain fr">
      <div class="Title"><samp class="More fs14 fr marginR20"><a href="{:U('Content/Site/special_list')}">查看更多</a></samp><span class="fs18 yellow">专题</span>热点</div>
      <ul class="Topic marginT20">
        <volist name="specials" id="vo">
            <li>
              <p class="topImg"><img src="{$vo.thumb}" style="width:160px;height:112px;"></p>
              <p class="fs16 marginT5 gray">{$vo.title|str_cut=###,18}</p>
            </li>
        </volist>
      </ul>
    </div>
    <!-- 专题热点结束 -->
  </div>
  <!-- 第四栏结束 -->
  
  <div class="content"><img src="{$config_siteurl}statics/themes/L1_TP/images/GA29.png"></div>
  
  <!-- 第五栏 -->
  <div class="content">
    <!-- 新媒体平台关注 -->
    <div class="mailbox fl">
      <div class="downTitle blue">新媒体平台关注</div>
      <div class="WeiXin">
         <img src="{$config_siteurl}statics/themes/L1_TP/images/GA30.png">
         <p class="fs16">广安交警微信号</p>
         <p class="fs14 blue">“扫一扫”</p>
         <p class="fs14 gray">关注官方微信</p>
      </div> 
      <hr>
      <div class="WeiXin">
         <img src="{$config_siteurl}statics/themes/L1_TP/images/GA30.png">
         <p class="fs16">广安交警微信号</p>
         <p class="fs14 blue">“扫一扫”</p>
         <p class="fs14 gray">关注官方微信</p>
      </div> 
    </div>
    <!-- 新媒体平台关注 -->
    
    <!-- 问答 -->
    <div class="MidMain fr">
      <div class="downTitle blue">咨询问答<span class="blueBG"><a href="{:U('DirectorMail/Consult/add', array('type'=>'wszx'))}">我要提问</a></span><samp>广安微博</samp></div>
      <ul class="AskList">
        <content action="lists" catid="82" order="id DESC" num="2">
          <volist name="data" id="vo">
            <li>
              <div class="question"><div class="Qbox blueBG">问</div><p class="fs16 blue">{$vo.title|str_cut=###,30}</p></div>
              <div class="ask"><div class="Abox blueBG">答</div><p class="fs16">{:get_article_content($vo.id,200)}</p></div>         
            </li>
          </volist>
        </content>
      </ul>
      <!-- 微博 -->
      <div class="micro">
        <div class="microPic"><img src="{$config_siteurl}statics/themes/L1_TP/images/GA19.png"></div>
        <div class="microName"><p class="fs18 black">广安交警<button class="WeiBoBut">+关注</button></p><p>官方新浪微薄</p></div>
      </div>  
      <div class="micro">
        <div class="blue">最新消息</div>
        <div class="microTxt">
          <ul>
           <li><p>广安市公安局交警支队<span class="blue">V</span>: </p><p>"五一"期间，全市道路安全畅通，未发生死亡以上道路交通事故，也未发生大面积或长时间交通拥堵，安全态势总体平稳！</p></li>
           <div class="dashed"></div>
           <li><p>广安市公安局交警支队<span class="blue">V</span>: </p><p>"五一"期间，全市道路安全畅通，未发生死亡以上道路交通事故，也未发生大面积或长时间交通拥堵，安全态势总体平稳！</p></li>
          </ul> 
        </div>      
      </div>
      <!-- 微博结束 -->
    </div>
    <!-- 问答结束 -->
  </div>
  <!-- 第五栏结束 -->  
  
  <!-- 第六栏警务风采 -->  
  <div class="content">
     <div class="Title"><samp class="More fs14 fr marginR20"><a href="{:getCategory(83,'url')}">查看更多</a></samp><span class="fs18 yellow">交警</span>风采</div>
     <div class="Traffic">
       <ul>
         <content action="lists" catid="83" order="id DESC" num="5">
            <volist name="data" id="vo"> 
                 <li><a href="{$vo.url}"><img src="{$vo.thumb}"><p>{$vo.title|str_cut=###,10}</p></a></li>
            </volist>
         </content>
       </ul>
     </div>
  </div>
  <!-- 第六栏警务风采结束 --> 
  <template file="Content/Mods/links.php" />
</div>
<template file="Content/Mods/footer.php" />
<script src="http://weather.gtimg.cn/city/01012707.js?ref=qqnews"></script>
<script>
$(function(){

//wangxiaomo: weather info
var weatherIconSets = {
    "00":{
        "text": "晴",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/sun.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/sunnight.png"
    },
    "01":{
        "text": "多云",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/cloudy.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/cloudynight.png"
    },
    "02":{
        "text": "阴",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/overcast.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/cloudynight.png"
    },
    "03":{
        "text": "阵雨",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/rain.sun.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/rain.sun.png"
    },
    "04":{
        "text": "雷阵雨",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/rainstorm.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/rainstorm.png"
    },
    "05":{
        "text": "雷阵雨并伴有冰雹",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/rainstorm.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/rainstorm.png"
    },
    "06":{
        "text": "雨夹雪",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/sleet.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/sleet.png"
    },
    "07":{
        "text": "小雨",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/drizzle.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/drizzle.png"
    },
    "08":{
        "text": "中雨",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/rainy2.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/rainy2.png"
    },
    "09":{
        "text": "大雨",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/rainy1.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/rainy1.png"
    },
    "10":{
        "text": "暴雨",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/showers.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/showers.png"
    },
    "11":{
        "text": "大暴雪",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/snowstorm.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/snowstorm.png"
    },
    "12":{
        "text": "特大暴雪",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/snowstorm.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/snowstorm.png"
    },
    "13":{
        "text": "阵雪",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/snow1.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/snow1.png"
    },
    "14":{
        "text": "小雪",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/snow1.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/snow1.png"
    },
    "15":{
        "text": "中雪",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/snow2.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/snow2.png"
    },
    "16":{
        "text": "大雪",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/snowstorm.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/snowstorm.png"
    },
    "17":{
        "text": "暴雪",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/snowstorm.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/snowstorm.png"
    },
    "18":{
        "text": "雾",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/mist.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/mist.png"
    },
    "19":{
        "text": "冻雨",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/sleet.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/sleet.png"
    },
    "20":{
        "text": "沙尘暴",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/sand.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/sand.png"
    },
    "21":{
        "text": "小雨-中雨",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/drizzle.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/drizzle.png"
    },
    "22":{
        "text": "中雨-大雨",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/rainy2.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/rainy2.png"
    },
    "23":{
        "text": "大雨-暴雨",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/rainy1.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/rainy1.png"
    },
    "24":{
        "text": "暴雨-大暴雨",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/showers.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/showers.png"
    },
    "25":{
        "text": "大暴雨-特大暴雨",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/showers.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/showers.png"
    },
    "26":{
        "text": "小雪-中雪",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/snow1.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/snow1.png"
    },
    "27":{
        "text": "中雪-大雪",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/snow2.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/snow2.png"
    },
    "28":{
        "text":  "大雪-暴雪",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/snowstorm.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/snowstorm.png"
    },
    "29":{
        "text": "浮尘",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/sand.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/sand.png"
    },
    "30":{
        "text": "扬沙",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/sand.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/sand.png"
    },
    "31":{
        "text": "强沙尘暴",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/sand.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/sand.png"
    },
    "32":{
        "text": "飑",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/rainy2.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/rainy2.png"
    },
    "33":{
        "text": "龙卷风",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/sand.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/sand.png"
    },
    "34":{
        "text": "弱高吹雪",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/snow2.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/snow2.png"
    },
    "35":{
        "text": "轻雾",
        "day":"http://mat1.gtimg.com/news/newsweather/wIco/mist.png",
        "night":"http://mat1.gtimg.com/news/newsweather/wIco/mist.png"
    }
};
    
    var weatherIcon = weatherIconSets[__weather_city.sk_wt],
        imgText = weatherIcon.text,
        wTp = __weather_city.sk_tp;
    $(".weather-context").html("今日" + imgText + wTp + "℃");
    $(".login-btn,.register-btn").on("click", function(e){
        var url = $(this).data("url");
        window.location = url;
    });

    $(".tabs-show-more").on("click", function(e){
        var url = $(".hovertab").data("url");
        window.location = url;
    });
});
</script>
</body>
</html>
