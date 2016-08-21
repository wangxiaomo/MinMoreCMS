<!-- 广告图-->
<!--
ad_pos:ad_left,ad_right,ad_fload
-->
<div class="ad_left" style="display:none">
	<p class="ad_topic"></p>
	<div class="ad_close">
	<a  href="javascript:;" onclick="javascript:$('.ad_left').hide();">关闭</a>
	</div>
	<a class="link" href="" target="_blank">
		<img src="" alt=""/>
	</a>
</div>
<div class="ad_right" style="display:none">
	<div class="ad_close">
	<a href="javascript:;" onclick="javascript:$('.ad_right').hide();">关闭</a>
	</div>
	<a class="link" href="" target="_blank">
		<img src="" alt=""/>
	</a>
</div>
<div  class="ad_fload" style="display:none">
	<div class="ad_close">
	<a href="javascript:;" onclick="javascript:$('.ad_fload').hide();clearInterval(ad_itl);">关闭</a>
	</div>
	<a class="link" href="" target="_blank">
		<img src="" alt=""/>
	</a>
</div>
<script>
$(function(){ 
var url="{:U('advertise')}";
var request="{1:1}";
$.ajax({
            cache: false,
            type: "POST",
            url: url,
            dataType: "json",
            data: request,
            timeout: 3000,
            error: function () {
		return;
                //alert("网络错误，请稍候尝试！");
            },
            success: function (resp){
                var data=resp.info;
                if(resp.status=='0'){
                return;
                }
		if(data.left!=null){
			$(".ad_left .link").attr("href",data.left.link);
			$(".ad_left img").attr("src",data.left.picture);
			$(".ad_left .topic").text(data.left.topic);
			$(".ad_left").show();
		}
		if(data.right!=null){
			$(".ad_right .link").attr("href",data.right.link);
			$(".ad_right img").attr("src",data.right.picture);
			$(".ad_right .topic").text(data.right.topic);
			$(".ad_right").show();
		}
		if(data.fload!=null){
			$(".ad_fload .link").attr("href",data.fload.link);
			$(".ad_fload img").attr("src",data.fload.picture);
			$(".ad_float .topic").text(data.fload.topic);
			$(".ad_fload").show();
		}
            }
        });

}); 
var x = 150,y = 150 
var xin = true, yin = true 
var step = 1 
var delay = 10 
var obj=$(".ad_fload") 
function float() { 
var L=T=0 
var R= $(window).width()-obj.width() 
var B = $(window).height()-obj.height()
obj.css("left",x + document.body.scrollLeft)
obj.css("top",y + document.body.scrollTop) 
x = x + step*(xin?1:-1) 
if (x < L) { xin = true; x = L} 
if (x > R){ xin = false; x = R} 
y = y + step*(yin?1:-1) 
if (y < T) { yin = true; y = T } 
if (y > B) { yin = false; y = B } 
} 
var ad_itl= setInterval("float()", delay);
obj.on("mouseover",function(){clearInterval(ad_itl);}); 
obj.on("mouseout",function(){ad_itl=setInterval("float()", delay);}); 
</script>
