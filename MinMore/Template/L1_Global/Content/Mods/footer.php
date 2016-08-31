<style>
.friendly-link li.on {
    background:#f0f0f0;
}
</style>
<!-- 底部链接-->
<div class="bottom-content">
    <div class="bottom-branch">
        <p>县分局子站 >>></p>
            <a href="{:get_site_url('广安区公安')}">广安区</a>
            <a href="{:get_site_url('前锋区公安')}">前锋区</a>
            <a href="{:get_site_url('华蓥市公安')}">华蓥市</a>
            <a href="{:get_site_url('邻水县公安')}">邻水县</a>
            <a href="{:get_site_url('岳池县公安')}">岳池县</a>
            <a href="{:get_site_url('武胜县公安')}">武胜县</a>
            <a href="{:get_site_url('经开区公安')}">经开区</a>
            <a href="{:get_site_url('枣山园区公安')}">枣山园区</a>
            <a href="{:get_site_url('协兴园区')}">协兴园区</a>
    </div>
    <div class="friendly-link">
        <p>友情链接：</p>
        <ul>
            <li data-link="全国公安网"><a href="http://www.mps.gov.cn/">全国公安网</a></li>
            <li data-link="四川省公安网"><a href="http://www.scga.gov.cn/">四川省公安网</a></li>
            <li data-link="相关单位">相关单位</li>
            <li data-link="广安旅游网"><a href="http://www.cpd.com.cn/">广安旅游网</a></li>
        </ul>
    </div>
    <div class="link-content" style="display:none;padding-left:10px;width:990px;height:auto;"></div>
    <div class="clear"></div>
    <template file="Mods/AD.php"/>
    <template file="Content/Mods/base_footer.php" />
</div>

<script>
$(function(){
    var ALL_LINKS = {
        "全国公安网": [
            ["中华人民共和国公安部", "http://www.mps.gov.cn/"],
            ["北京市公安局", "http://www.bjgaj.gov.cn/web/"],
            ["上海市公安局", "http://www.police.sh.cn/shga/index.html"],
            ["福建省公安厅", "http://www.fjgat.gov.cn/"],
            ["吉林省公安厅", "http://gat.jl.gov.cn/"],
            ["四川省公安厅", "http://www.scga.gov.cn/"]
        ],
        "四川省公安网": [
            ["四川省公安厅", "http://www.scga.gov.cn/"],
            ["成都市公安局", "http://www.gaj.chengdu.gov.cn/"],
            ["绵阳市公安局", "http://gaj.my.gov.cn/"],
            ["自贡市公安局", "http://www.zgjc.gov.cn/default.php"],
            ["攀枝花公安局", "http://www.pzhga.com/"],
            ["广元市公安局", "http://www.gygaj.gov.cn/"],
            ["广安市公安局", "http://www.gaga.gov.cn"],
            ["泸州市公安局", "http://www.sclzga.gov.cn/"],
            ["南充市公安局", "http://www.ncgaj.gov.cn/"]
        ],
        "相关单位": [
            ["人民公安报", "http://www.cpd.com.cn/"],
            ["中国普法网", "http://www.legalinfo.gov.cn/"],
            ["广安视窗", "http://special.scol.com.cn/13dxpjn/"],
            ["广安社区服务网", "http://www.cpd.com.cn/"]
        ],
        "广安旅游网": [
            ["广安旅游政务网", "http://www.gata.gov.cn/"],
            ["邓小平故里旅游景区", "http://www.dxpgl.cn/"],
            ["武胜旅游资讯网", "http://www.wslyw.org.cn/"],
            ["邻水县旅游信息网", "http://www.galsly.cn/"]
        ]
    };

    $(".friendly-link li").on("click", function(e){
        e.preventDefault();
        var current = $(this).data("link"),
            links = ALL_LINKS[current];
        $(".friendly-link li").removeClass("on");
        $(this).addClass("on");

        $(".link-content").html("");
        for(var i=0;i<links.length;i++){
            var link = links[i];
            $(".link-content").append("<a href='" + link[1] + "'>" + link[0] + "</a>");
        }
        $(".link-content").show();
    });
});
</script>
