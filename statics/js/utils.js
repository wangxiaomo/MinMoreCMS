$(function(){
  var wait = 90,
      tic = function() {
        if(wait == 1) {
          $(".send-sms-vcode")
            .val("获取手机验证码")
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
    $(".send-sms-vcode").on("click", function(){
      var mobile = $.trim($("input[name=mobile]").val());
      if(mobile && mobile.length == 11){
        $.post("/index.php?g=api&m=sms&a=send", {mobile:mobile}, function(d){});
        tic();
      }else{
        alert("请正确填写手机号码!");
      }
    });
});
