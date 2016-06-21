<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="{$config_siteurl}statics/vendor/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{$model_extresdir}css/mailbox.css"/>
    <script src="{$model_extresdir}js/jquery.min.js"></script>
</head>
<body>
<!-- main-->
<div class="main">
    <!-- content-->
    <div class="content">
        <!-- 头部导航-->
        <div class="top-nav">
            <img src="{$model_extresdir}images/user-login.png" alt="登录" class="top-nav-img"/>
            <div class="user-action">
                <a href="#">用户登录</a>
                <a href="#">注册</a>
                <a href="#">收藏</a>
                <a href="#">返回首页</a>
            </div>
            <div class="nav-weather">
                <span>天气: <img src="{$model_extresdir}images/nav-weather.png" alt="天气"/>19℃~24℃</span>
                <span>日期: 2016年 5月 18日 星期三</span>
            </div>
            <div class="nav-search">
                <input type="text" value="请输入关键字" class="search-box" onfocus="if(value=='请输入关键字'){value=''}" onblur="if(value==''){value='请输入关键字'}"/>
                <input type="button" value="搜 索" class="search-btn"/>
                <img src="{$model_extresdir}images/search_logo.png" alt="搜索" class="search-logo"/>
            </div>
        </div>

        <!-- logo-->
        <div class="top-logo">
            <div class="public-logo">
                <img src="{$model_extresdir}images/banner-logo_2.png" alt=""/>
            </div>
            <div class="view-window">
                <div class="banner">
                    <ul class="imgList">
                        <li class="imgOn"><img src="{$model_extresdir}images/view-window1.png" width="350px" height="165px" alt=""></li>
                        <li><img src="{$model_extresdir}images/view-window2.png" width="350px" height="165px" alt=""></li>
                        <li><img src="{$model_extresdir}images/view-window3.png" width="350px" height="165px" alt=""></li>
                        <li><img src="{$model_extresdir}images/view-window4.png" width="350px" height="165px" alt=""></li>
                        <li><img src="{$model_extresdir}images/view-window5.png" width="350px" height="165px" alt=""></li>
                    </ul>
                </div>
            </div>
            <div class="banner-sign">
                <img src="{$model_extresdir}images/banner-sign1.png" alt="" style="margin: 40px 0 0 60px;display: block"/>
                <img src="{$model_extresdir}images/banner-sign2.png" alt="" style="margin: 15px 0 0 110px;display: none;position: absolute;top: 65px"/>
            </div>
        </div>
        <script>
            $(".public-logo img").animate({
                "opacity":"1"
            },3000);
            var curIndex = 0;
            var signIndex = 0;
            var autoChange = setInterval(function(){
                if(curIndex < $(".imgList li").length-1){
                    curIndex ++;
                }else{
                    curIndex = 0;
                }
                changeTo(curIndex);
            },5000);

            function changeTo(num){
                $(".imgList").find("li").removeClass("imgOn").hide().eq(num).fadeIn(3000).addClass("imgOn");
            }
            setInterval(function(){
                if(signIndex == 0){
                    $(".banner-sign img:first").fadeOut(2500);
                    $(".banner-sign img:last").fadeIn(2500);
                    signIndex = 1
                }else{
                    $(".banner-sign img:last").fadeOut(2500);
                    $(".banner-sign img:first").fadeIn(2500);
                    signIndex = 0
                }
            },5000);
        </script>

        <!--导航条-->
        <ul class="banner-nav">
            <li>首页</li>
            <li>警务资讯</li>
            <li>办事大厅</li>
            <li>阳光警务</li>
            <li class="on">警民互动</li>
            <li>服务民生</li>
            <i class="square-icon"></i>
        </ul>
        <div class="sub-menu">
          <ul>
            <li>局长信箱</li>
            <li>我要投诉</li>
            <li>举报台</li>
            <li>在线咨询</li>
            <li>在线访谈</li>
            <li>网上接访</li>
            <li>民意征集</li>
            <li>在线调查</li>
            <li>专门监督</li>
            <li>警方微博</li>
            <li><a href="{:U('Membermail/info')}" style="text-decoration:none;">代表委员直通车</a></li>
          </ul>
        </div>
        <div class="crumb">
          <span>欢迎访问广安市公安局</span>
          <div class="crumb-detail">当前位置：首页&gt;警民互动&gt;局长信箱</div>
        </div>
        <div class="content-wrapper">
          <div class="sidebar">
            <div class="sidebar-menu">
              <img src="{$model_extresdir}images/sidebar-top.png" />
              <div>
                <ul>
                  <li class="on"><img src="{$model_extresdir}images/sidebar-li.png" />局长信箱</li>
                  <li><img src="{$model_extresdir}images/sidebar-li.png" />我要投诉</li>
                  <li><img src="{$model_extresdir}images/sidebar-li.png" />举报台</li>
                  <li><img src="{$model_extresdir}images/sidebar-li.png" />在线咨询</li>
                  <li><img src="{$model_extresdir}images/sidebar-li.png" />网上接访</li>
                  <li><img src="{$model_extresdir}images/sidebar-li.png" />在线访谈</li>
                  <li><img src="{$model_extresdir}images/sidebar-li.png" />民意征集</li>
                  <li><img src="{$model_extresdir}images/sidebar-li.png" />在线调查</li>
                  <li><img src="{$model_extresdir}images/sidebar-li.png" />专门监督</li>
                  <li><img src="{$model_extresdir}images/sidebar-li.png" />警方微博</li>
                  <li><a href="{:U('Membermail/info')}" style="text-decoration:none;"><img src="{$model_extresdir}images/sidebar-li.png" />代表委员直通车</a></li>
                </ul>
              </div>
            </div>
            <div class="sidebar-extra">
              <div class="hd">
                便民服务
              </div>
              <div class="item-wrapper">
                <div class="item">
                  <img src="{$model_extresdir}images/sidebar-extra1.png">
                  <div class="item-content">
                    <span>路口监控视频</span>
                    <p>运用先进的3G技术..</p>
                  </div>
                </div>
                <div class="item">
                  <img src="{$model_extresdir}images/sidebar-extra2.png">
                  <div class="item-content">
                    <span>路口监控视频</span>
                    <p>运用先进的3G技术..</p>
                  </div>
                </div>
                <div class="item">
                  <img src="{$model_extresdir}images/sidebar-extra3.png">
                  <div class="item-content">
                    <span>路口监控视频</span>
                    <p>运用先进的3G技术..</p>
                  </div>
                </div>
                <div class="item">
                  <img src="{$model_extresdir}images/sidebar-extra4.png">
                  <div class="item-content">
                    <span>路口监控视频</span>
                    <p>运用先进的3G技术..</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="content-box">
