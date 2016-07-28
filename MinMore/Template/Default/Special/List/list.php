<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<!DOCTYPE HTML>
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
	<meta name="keywords" content="{$SEO['keyword']}" />
	<meta name="description" content="{$SEO['description']}" />
    <script type="text/javascript">
        var _USER_LOGIN_ACTION_ = "",
            _S_MDD_NAME_ = "山西公安交警网",
            _IS_LOGIN_ = "0",
            _LOGIN_ = "hide",
            _NEWFANSHIDE_ = "hide",
            _NEWRECHIDE_ = "hide",
            _LOGOUT_ = "",
            _NEW_GUIDE_ = "";
    </script>
<link href="{$config_siteurl}statics/sxjjw20130922/css/post_detail.css" rel="stylesheet" type="text/css"/>    
<link href="{$config_siteurl}statics/sxjjw20130922/css/mfw_common_nohead.css" rel="stylesheet" type="text/css"/>
<link href="{$config_siteurl}statics/sxjjw20130922/css/header.css" rel="stylesheet" type="text/css"/>
<script language="javascript" src="{$config_siteurl}statics/sxjjw20130922/js/jquery-1.4.4.min.js" type="text/javascript"></script>
<script language="javascript" src="{$config_siteurl}statics/sxjjw20130922/js/m.index.js" type="text/javascript"></script>
<script language="javascript" src="{$config_siteurl}statics/sxjjw20130922/js/mfw_common_head_nojquery.js" type="text/javascript"></script>
<!--<script src="{$config_siteurl}statics/sxjjw20130922/js/wb.js" type="text/javascript" charset="utf-8"></script>-->
<script src="{$config_siteurl}statics/sxjjw20130922/js/showhied.js" type="text/javascript" charset="utf-8"></script>
<script>
$(function(){
        $(".difang").click(function () { $('#ggdsmc').css('display','block'); });
		$("#cheph").click(function () { $('#paihao').css('display','block'); });
		$('#ggdsmc li').each(function(i){
		$(this).click(function(){
			// var l=$('#xialak01 h1').size();
			$('.difang').text($(this).text());
			$('#ggdsmc').hide();
		  });
	    });
		$("#ggdsmc").hover(function(){
			$(this).show();
		},function(){
			$(this).hide();
		});
		
		$('#paihao li').each(function(i){
		$(this).click(function(){
			// var l=$('#xialak01 h1').size();
			$('#cheph').text($(this).text());
			$('#paihao').hide();
		  });
	    });
		$("#paihao").hover(function(){
			$(this).show();
		},function(){
			$(this).hide();
		});
			
			
});
</script>
</head>

<body>
<template file="Contents/header.php"/>
<!--maincon-->
<div class="post_wrap">
<!--位置导航 start-->
<div class="crumb">
<span class="home_ico">当前位置：<a href="{$config_siteurl}">{$Config.sitename}</a> &gt; <navigate catid="$catid" space=" &gt; " /></span>
<p style="float:right;padding-right:15px;"></p>
</div>
<!--位置导航 end-->

<!--右边开始 -->
<div class="post_side">
    <div class="rbtn-top">
        <div class="Lbtn">
            <div class="rbtn-fav">
                <a href="javascript:AddFavorite('__SELF__', '山西公安交警网')" rel="nofollow" title="一键收藏" class="btn">收藏</a>
				<!--
                <div class="droplist hide">
                    <a href="javascript:void(0);" title="我收藏的行程" target="_blank">我收藏的行程</a>
                    <a href="javascript:void(0);" target="_blank" title="我收藏的游记" class="youji">我收藏的游记</a>
                </div>
				-->
            </div>
        </div>
        <div class="Rbtn">
            <div class="rbtn-share">
                <a href="javascript:void(0);" rel="nofollow" title="一键分享" class="btn">分享(46)</a>
                <div class="droplist hide">
                    <ul>
                        <li><a title="分享到新浪微博" rel="nofollow" href="javascript:eval(sns_share_show('wb_tinfo_1',share_title,share_content,share_url,share_img));record_share(tid,'sina');void 0;" class="btn-s weibo">新浪</a></li>
                        <li><a title="分享到人人网" rel="nofollow" href="javascript:eval(sns_share_show('rr_tinfo_1',share_title,share_content,share_url,share_img));record_share(tid,'renren');void 0;" class="btn-s renren">人人</a></li>
                        <li><a title="分享到QQ空间" rel="nofollow" href="javascript:eval(sns_share_show('qz_tinfo_1',share_title,share_content,share_url,share_img));record_share(tid,'qq');void 0;" class="btn-s qqzone">空间</a></li>
                        <li><a title="分享到腾讯微博" rel="nofollow" href="javascript:eval(sns_share_show('qt_tinfo_1',share_title,share_content,share_url,share_img));record_share(tid,'tqq');void 0;" class="btn-s tqq">腾讯</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

        <!--右边内正式容开始 -->
        <div class="neixx_wen">
          <div class="neixx_wen_top">
            <h1>新闻推荐</h1><h2><a href="{$Categorys[$catid]['url']}">查看更多</a></h2>
          </div>
          <div class="neixx_wen_xia">
            <spf mo="Special" action="content_list" specialid="$specialid"  typeid="$typeid" page="$page" num="10">
                <volist name="data" id="r" key="k">
                <if condition="$k lt 4">
                    <h1><span class="nei_shuzi">{$k}</span><a href="{$r.url}" title="{$r.title}">{$r.title|str_cut=###,14}</a></h1>
                <else /> 
                    <h1>{$k}<a href="{$r.url}" title="{$vo.title}">{$r.title|str_cut=###,14}</a></h1>
                </if>
            </volist>
            </spf>
          </div>
        </div>
        <div class="neixx_tu"><a href="javascript:void(0);"><img src="{$config_siteurl}statics/sxjjw20130922/images/neitu02.jpg" width="250" height="451" border="0" /></a></div>
        <!--右边正式内容结束 -->    

</div>
<!--右边结束 -->

<!--左边开始 -->
<div class="post_main">

<div class="post_item">
	<!--正式内容开始 -->
	<spf mo="Special" action="content_list" specialid="$specialid"  typeid="$typeid" page="$page" num="5">
         <volist name="data" id="r">
		<div class="mnxxl_list">
        <div class="mnxxl_1t"><a href="{$r.url}" target="_blank" title="{$r.title}">{$r.title}</a></div>
        <div class="mnxxl_time"><a href="{$Categorys[$catid]['url']}">{$Categorys[$catid]['catname']}</a>   &nbsp; {$r.updatetime|date="m-d H:i:s",###}</div>
        <div class="mnxxl_txt">
		<if condition="!empty($r['thumb'])"> 
		<div class="list_tupi">
			<a href="{$r.url}" target="_blank" title="{$r.title}">
			<img src="{$r.thumb}" alt="{$r.title}" width="80" height="99" />
			</a> 
		</div>
		</if>
		{$r.description|new_str_cut=###,110}...<a href="{$r.url}" class="mnxx_more" target="_blank">全文</a></div>
        </div>
		</volist>
 <!--翻页开始 -->
          <div class="fanye">
           <div class="fanye_nei">
			<dl>{$pages}</dl>
           </div>
           </div>
	</spf>
          <!--翻页结束 -->
     
	<!--正式内容结束 -->  
  </div>
</div>
<!--左边结束 -->
</div>
<template file="Contents/footer.php"/>
<!--<div class="FeedBackBtn"><a href="javascript:void(0)" onclick="return show_feedback();">意见反馈</a></div> -->
<div id="pnl_feedback" class="hide">
    <div class="FeedBackA">
        <div class="FeedTit">意见反馈</div>
        <div class="FeedDesc">我们倾听你的声音</div>
        <div class="FeedForm">
            <textarea>欢迎提出宝贵的意见和建议。抱歉我们无法逐一回复，但我们会认真阅读，你的支持是对我们最大的鼓励和帮助。</textarea>
        </div>
        <div class="FeedAct"><a href="javascript:void(0)" onClick="return to_feedback();">提 交</a><span class="err hide">内容不能为空！</span></div>
    </div>
</div>

<!-- 弹窗回复 end -->
<script type="text/javascript">
    //全局变量
    var scope={//图片分享菜单配置
        introtmp:"<a href='/u/940322.html' target='_blank'>@kido</a> 喜欢你的这张#精美照片#，来自游记《也许是史上最长的日本游记（DAY10更新ing）》",
        linktmp:"http://www.mafengwo.cn/i/1326320.html",
        aidtmp:"1326320",
        atuid:"940322",
        mddname:"日本"
    };
    //文章类型
    var ttype = "travels";
    //发表文章积分
    var append_score = "";
    //帖子基本信息
    var tid = parseInt("1326320");
    var feedid = parseInt("0");
    //新等级
    var new_guide = "";
    //当前页码
    var page_start = parseInt("0");
    //是否显示金币
    var pick_dis = "none";
</script>

<!-- baidu_tc block_end -->
<script type="text/javascript">
function AddFavorite(sURL, sTitle)
{
    try
    {
        window.external.addFavorite(sURL, sTitle);
    }
    catch (e)
    {
        try
        {
            window.sidebar.addPanel(sTitle, sURL, "");
        }
        catch (e)
        {
            alert("加入收藏失败，请使用Ctrl+D进行添加");
        }
    }
}
</script>
        </body>
</html>
