<style>
#topDateTime,#topWeather { float:right; }
</style>
<div class="top-bar">
	<div class="wrapper-2">
    	<div class="top-left pull-left color-white mar-r40">
        	<a class="color-white" href="{:C('MINMORE_LOGIN_URL')}">登录</a> |
            <a class="color-white" href="{:C('MINMORE_REGISTER_URL')}">注册</a> |
            <a class="color-white" href="#" id="addBookmark">收藏</a> |
            <a class="color-white" href="#">设为首页</a>
        </div>
        <div class="pull-left">天气：<span id="topWeather"></span></div>
        <div class="pull-right search">
        	<input class="search-int search-box" type="text" placeholder="请输入关键字" />
            <a class="top-search-btn"><img src="{$config_siteurl}statics/themes/L2_Flat/images/sear.png" /></a>
        </div>
        <div class="pull-right mar-r40">日期：<span id="topDateTime"></span></div>
    </div>
</div>
<div class="logo-bar">
	<div class="wrapper-2">
		<div class="pull-left"><img src="{$config_siteurl}statics/themes/L2_Flat/images/role/{$global_role}/logo.png" height="160px" /></div>
    	<div class="pull-right"><img src="{$config_siteurl}statics/themes/L2_Flat/images/top-r.png" height="160px"/></div>
    </div>
</div>
<div class="nav-bar">
	<div class="wrapper-2">
    	<span><img src="{$config_siteurl}statics/themes/L2_Flat/images/nav-bor.png"  width="2px" height="44px"/></span>
    	<a class="{$current_index_page?'nav-active':''}" href="{$config_siteurl}">网站首页</a>
        <span><img src="{$config_siteurl}statics/themes/L2_Flat/images/nav-bor.png"  width="2px" height="44px"/></span>
        <a href="{:U('Content/Index/lists', array('catid'=>45))}" class="{$catid==45?'nav-active':''}">公安简介</a>
        <span><img src="{$config_siteurl}statics/themes/L2_Flat/images/nav-bor.png"  width="2px" height="44px"/></span>
        <a href="{:getCategory(54,'url')}" class="{$catid==54?'nav_select':''}">{:getCategory(54,'catname')}</a>
        <span><img src="{$config_siteurl}statics/themes/L2_Flat/images/nav-bor.png"  width="2px" height="44px"/></span>
        <a href="{:getCategory(55,'url')}" class="{$catid==55?'nav_select':''}">{:getCategory(55,'catname')}</a>
        <span><img src="{$config_siteurl}statics/themes/L2_Flat/images/nav-bor.png"  width="2px" height="44px"/></span>
        <a href="{:U('Content/Site/work_building@' . C('GLOBAL_SITE_DOMAIN'))}">办事大厅</a>
        <span><img src="{$config_siteurl}statics/themes/L2_Flat/images/nav-bor.png"  width="2px" height="44px"/></span>
        <a href="{:U('Content/Site/sunshine_police@' . C('GLOBAL_SITE_DOMAIN'))}">阳光警务</a>
        <span><img src="{$config_siteurl}statics/themes/L2_Flat/images/nav-bor.png"  width="2px" height="44px"/></span>
        <a href="{:getCategory(57,'url')}" class="{$catid==57?'nav_select':''}">{:getCategory(57,'catname')}</a>
        <span><img src="{$config_siteurl}statics/themes/L2_Flat/images/nav-bor.png"  width="2px" height="44px"/></span>
        <a href="{:getCategory(56,'url')}" class="{$catid==56?'nav_select':''}">{:getCategory(56,'catname')}</a>
        <span><img src="{$config_siteurl}statics/themes/L2_Flat/images/nav-bor.png"  width="2px" height="44px"/></span>
        <a href="{:getCategory(58,'url')}" class="{$catid==58?'nav_select':''}">{:getCategory(58,'catname')}</a>
        <span><img src="{$config_siteurl}statics/themes/L2_Flat/images/nav-bor.png"  width="2px" height="44px"/></span>
        <a href="{:getCategory(59,'url')}" class="{$catid==59?'nav_select':''}">{:getCategory(59,'catname')}</a>
        <span><img src="{$config_siteurl}statics/themes/L2_Flat/images/nav-bor.png"  width="2px" height="44px"/></span>
    </div>
</div>
<script src="http://weather.gtimg.cn/city/01012707.js?ref=qqnews"></script>
<script>
var numCN = '天一二三四五六',
    date = new Date(),
    year = date.getFullYear(),
    month = date.getMonth() + 1,
    day = date.getDate(),
    weekday = numCN[date.getDay()];
$("#topDateTime").text(year + "年" + month + "月" + day + "日 星期" + weekday);

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
$("#topWeather").html(imgText + wTp + "℃");

$(function(){
    $("#addBookmark").on("click", function(e){
        e.preventDefault();
        if (window.sidebar && window.sidebar.addPanel) { // Mozilla Firefox Bookmark
                window.sidebar.addPanel(document.title,window.location.href,'');
        } else if(window.external && ('AddFavorite' in window.external)) { // IE Favorite
            window.external.AddFavorite(location.href,document.title); 
        } else if(window.opera && window.print) { // Opera Hotlist
            this.title=document.title;
            return true;
        } else { // webkit - safari/chrome
            alert('使用键盘 ' + (navigator.userAgent.toLowerCase().indexOf('mac') != - 1 ? 'Command/Cmd' : 'CTRL') + ' + D 来收藏此网站.');
        }
    });

    $(".top-search-btn").on("click", function(e){
        e.preventDefault();
        var keyword = $.trim($(".search-box").val());
        if(keyword){
            window.location = "{$config_siteurl}index.php?g=Search&g=Search&q=" + encodeURI(keyword);
        }
    });

    $(".disabled-link").on("click", function(e){
        e.preventDefault();
        alert("正在紧急开发中,敬请期待...");
    });
});
</script>
