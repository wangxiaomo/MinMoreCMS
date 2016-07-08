<style>
.head {
    background:url(statics/themes/L4_Global/images/role/{$global_role}/head.png) no-repeat scroll center #186fbc;
}
</style>
<div id="header">
    <div class="head">
        <div class="wrap">
            <div id="user-bar">
                <a href="" id="set-home">设为首页</a><span>丨</span><a href="" id="add-fav">加入收藏</a>
            </div>
        </div>
    </div>
    <div id="nav" class="wrap">
        <ul>
            <li><a href="{$config_siteurl}" class="{$current_index_page?'cu':''}">网站首页</a></li>
            <li><a href="{:U('Content/Site/l4_info')}" class="{$show_info_page?'cu':''}">社区简介</a></li>
            <li><a href="{:U('Content/Site/sunshine_police@' . C("GLOBAL_SITE_DOMAIN"))}">阳光警务</a></li>
            <li><a href="{:U('Content/Site/work_building@' . C("GLOBAL_SITE_DOMAIN"))}">办事大厅</a></li>
            <li><a href="{:U('Content/Site/l4_service')}" class="{$show_service_page?'cu':''}">服务指南</a></li>
            <li><a href="{:U('Content/Site/l4_request')}" class="{$show_request_page?'cu':''}">线索举报</a></li>
            <li><a href="{:getCategory(3,'url')}" class="{$catid==3?'cu':''}">{:getCategory(3,'catname')}</a></li>
            <li><a href="{:getCategory(23,'url')}" class="{$catid==23?'cu':''}">{:getCategory(23,'catname')}</a></li>
            <li><a href="">社区风采</a></li>
        </ul>
    </div>
    <div id="headline" class="wrap">
        <div id="scroll-news">
            <span>最新要闻：</span>
            <div id="scroll-wrap">
                <div>
                    <p><a href="">枣山派出所校园警务室聘请分局法制领导来所授课</a></p>
                    <p><a href="">枣山派出所校园警务室聘请分局法制领导来所授课3</a></p>
                    <p><a href="">枣山派出所校园警务室聘请分局法制领导来所授课3</a></p>
                </div>
            </div>
        </div>
        <div id="search">
            <form>
                <input id="search-txt" type="text" placeholder="请输入搜索关键字">
                <input id="search-btn" type="submit" value="搜索">
            </form>
        </div>			
    </div>
</div>
