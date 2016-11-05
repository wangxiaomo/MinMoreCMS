

//banner图轮播

$(function () {

    (function () {

        var len = $("#idNum > li").length; var index = 0; var adTimer; var adwidth = $("#idTransformView").width();

        $("#idNum li").mouseover(function () {

            index = $("#idNum li").index(this);

            showImg(index);

        }).eq(0).mouseover();

        //滑入 停止动画，滑出开始动画.

        $("#idTransformView").hover(function () {

            clearInterval(adTimer);

        }, function () {

            adTimer = setInterval(function () {

                showImg(index)

                index++;

                if (index == len) { index = 0; }

            }, 2000);

        }).trigger("mouseleave");

        function showImg(index) {

            $("#idSlider").stop(true, false).animate({ left: -adwidth * index }, 500);

            $("#idNum li").removeClass("on").eq(index).addClass("on");

        }

    } ());

});




