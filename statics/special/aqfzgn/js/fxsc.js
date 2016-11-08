
$(function () {
    
    $(".rbtn-top .rbtn-fav, .rbtn-top .rbtn-share").hover(function () {
        $(this).find(".droplist").show()
    }, function () {
        $(this).find(".droplist").hide()
    });

});