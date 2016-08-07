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
    $(".send-sms-vcode").on("click", function(){
	var caseID= $.trim($("input[name=caseID]").val());
      var mobile = $.trim($("input[name=mobile]").val());
        $.post("/index.php?g=api&m=site&a=query_alarm_phone", {caseID:caseID,mobile:mobile}, function(d){
	if(d.r==1){
	      if(mobile && mobile.length == 11){
		$.post("/index.php?g=api&m=sms&a=send", {mobile:mobile}, function(d){});
		tic();
	      }else{
		alert("请正确填写手机号码!");
	      }
	}else{
		alert(d.msg);
	}
        });
    });
});
