<!-- 快速导航栏-->
<div class="fast-nav">
    <div class="work-build-nav">
        <div class="police-news-nav">
            <div class="sunshine-nav">
                <div class="home-nav">
                    <a href="{:U('Content/Index/index')}"><p>首页</p></a>
                </div>
                <a href="{:U('Content/Site/sunshine_police')}"><p>阳光警务</p></a>
            </div>
            <a href="{:U('Content/Site/police_news')}"><p>警界资讯</p></a>
        </div>
        <a href="{:U('Content/Site/work_building')}"><p>办事大厅</p></a>
    </div>
    <p>快速功能导航</p>
</div>
<script>
    $(function(){
        $(".fast-nav").hover(function(){
            $(this).css("left","0")

        },function(){
            $(this).css("left","-119px")
        });
    })
</script>
