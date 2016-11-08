$(function(){
    var wait = 90,
        tic = function() {
            if(wait == 1) {
                $(".send-sms-vcode")
                    .val("手机获取验证码")
                    .prop("disabled", false);
                wait = 90;
            }else{
                $(".send-sms-vcode")
                    .prop("disabled", true)
                    .val(wait + "秒后可重新发送");
                wait--;
                setTimeout(tic,1000);
            }
        };
    var mobile = $.trim($("input[name=mobile]").val());
    $('.send-sms-vcode').on('click',function(){
        var xing=$('#name').val();
        var phone=$('#mobile').val();
        $.post("/index.php?g=DirectorMail&m=Membermail&a=verification",{username:xing,tel:phone},function(data){
            if(data=="result1"){
                $.post("/index.php?g=api&m=sms&a=send", {mobile:mobile}, function(d){});
                tic();
            }else if(data=="result2"){
                alert("姓名和电话号码不一致，请核对后重新输入");
            }else{
                alert("您不是代表委员，操作错误");
             }
        })
    })
});
