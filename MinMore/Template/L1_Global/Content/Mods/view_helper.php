<div class="view-helper" style="text-align:right;width:100%;">
    <a href="#" class="bigger-view">放大</a> |
    <a href="#" class="smaller-view">缩小</a>
</div>
<script>
$(function(){
    var fontSize = parseInt($(".article-content p span").css("font-size"));
    var changeViewSize = function(e) {
        e.preventDefault();
        if($(this).hasClass("bigger-view")){
            fontSize += 5;
        }else if($(this).hasClass("smaller-view")){
            fontSize -= 5;
        }
        $(".article-content p span").css("font-size", fontSize + "px");
    };
    $(".bigger-view,.smaller-view").on("click", changeViewSize);
});
</script>
