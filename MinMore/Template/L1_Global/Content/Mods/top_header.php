        <template file="Content/Mods/top_banner.php" />
        <!-- logo-->
        <div class="top-logo">
            <div class="public-logo">
                <img src="{$config_siteurl}statics/themes/L1_Global/images/banner-logo_2.png" alt=""/>
            </div>
            <div class="view-window">
                <div class="banner">
                    <ul class="imgList">
                        <li class="imgOn"><img src="{$config_siteurl}statics/themes/L1_Global/images/view-window1.png" width="350px" height="165px" alt=""></li>
                        <li><img src="{$config_siteurl}statics/themes/L1_Global/images/view-window2.png" width="350px" height="165px" alt=""></li>
                        <li><img src="{$config_siteurl}statics/themes/L1_Global/images/view-window3.png" width="350px" height="165px" alt=""></li>
                        <li><img src="{$config_siteurl}statics/themes/L1_Global/images/view-window4.png" width="350px" height="165px" alt=""></li>
                        <li><img src="{$config_siteurl}statics/themes/L1_Global/images/view-window5.png" width="350px" height="165px" alt=""></li>
                    </ul>
                </div>
            </div>
            <div class="banner-sign">
                <img src="{$config_siteurl}statics/themes/L1_Global/images/banner-sign1.png" alt="" style="margin: 40px 0 0 60px;display: block"/>
                <img src="{$config_siteurl}statics/themes/L1_Global/images/banner-sign2.png" alt="" style="margin: 15px 0 0 110px;display: none;position: absolute;top: 65px"/>
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
