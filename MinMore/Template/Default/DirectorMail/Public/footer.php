          <div class="clear"></div>
        </div>

        <!-- 底部链接-->
        <div class="bottom-content">
            <div class="bottom-branch">
                <p>县分局子站 >>></p>
                <a href="#">广安区</a
                        ><a href="#">前锋区</a
                    ><a href="#">华蓥市</a
                    ><a href="#">邻水县</a
                    ><a href="#">岳池县</a
                    ><a href="#">武胜县</a>
            </div>
            <div class="friendly-link">
                <p>友情链接：</p>
                <ul>
                    <li>全国公安网</li>
                    <li>四川省公安网</li>
                    <li>省部门网站</li>
                    <li style="background: #f0f0f0">相关单位</li>
                    <li>广安旅游网</li>
                </ul>
            </div>
            <div class="link-content">
                <a href="#">人民公安报</a>
                <a href="#">中国普法网</a>
                <a href="#">365安全防范网</a>
                <a href="#">广安市保安协会</a>
                <a href="#">广安视窗</a>
                <a href="#">广安社区服务网</a>
            </div>
            <div class="introduce-info">
                <p>
                    丨 <a href="#">首页</a> 丨<a href="#">关于我们</a> 丨<a href="#">网站声明</a> 丨<a href="#">联系我们</a> 丨
                </p>
                <p>Copyright 2014 Guangan Police Security Bureau, All rights Reserve</p>
                <p>版权所有：广安市公安局  &nbsp;蜀ICP备12001441号-1 &nbsp;技术支持：四川速集实业集团有限公司 &nbsp;028-6643654</p>
            </div>
        </div>
    </div>
    <!-- 快速导航栏-->
    <div class="fast-nav">
        <div class="work-build-nav">
            <div class="police-news-nav">
                <div class="sunshine-nav">
                    <a href="#"><p>阳光警务</p></a>
                </div>
                <a href="#"><p>警界资讯</p></a>
            </div>
            <a href="#"><p>办事大厅</p></a>
        </div>
        <p>快速功能导航</p>
    </div>
    <script>
        $(function(){
            $(".fast-nav").hover(function(){
//                $(this).stop(false,true).animate();
//                $(this).animate({
//                    "left":"0"
//                },2000);
                $(this).css("left","0")

            },function(){
//                $(this).stop(false,true).animate();
//                $(this).animate({
//                    "left":"-90px"
//                },2000);
                $(this).css("left","-90px")
            });
        })
    </script>
    <!-- 二维码侧边栏-->
    <div class="erweima">
        <a href="#"><img src="{$model_extresdir}images/cebianlan_police.png" alt=""/></a>
        <a href="#"><img src="{$model_extresdir}images/cebianlan_phone.png" alt=""/></a>
        <a href="#"><img src="{$model_extresdir}images/cebianlan-weibo.png" alt="" style="margin:10px 0 0 25px"/></a>
        <a href="#"><img src="{$model_extresdir}images/cebianlan-top.png" alt="" style="margin:0 0 0 25px"/></a>
    </div>
</div>
</body>
</html>
