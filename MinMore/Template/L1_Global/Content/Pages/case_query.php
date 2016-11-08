<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="chrome=1" />
    <link href="favicon.ico" rel="shortcut icon" />
    <link rel="canonical" href="{$config_siteurl}" />
    <title>治安案件查询</title>
    <meta name="description" content="{$SEO['description']}" />
    <meta name="keywords" content="{$SEO['keyword']}" />
    <link rel="stylesheet" href="{$config_siteurl}statics/themes/L1_Global/css/case-query.css"/>
    <script src="{$config_siteurl}statics/js/jquery.js" type="text/javascript"></script>
</head>
<body>
<!-- main-->
<div class="main">
    <!-- content-->
    <div class="content">
        <!-- head-->
        <div class="head"></div>
        <!-- body-->
        <div class="body-con">
            <div class="body-top">
                <img src="{$config_siteurl}statics/themes/L1_Global/images/case-query.png" alt=""/>
                <p>案件查询</p>
                <a href="{:U('Content/Site/sunshine_police')}"> << 返回首页 </a>
            </div>
            <div class="query-area">
                <div class="query-condition">
                    <h3>治安案件查询</h3>
                    <p class="case-num">案件编号：<input type="text" name="caseID" id="x_casenum"/></p>
                    <p class="phone-num">手机号：<input type="text" name="mobile" id="x_phonenum"/></p>
                    <p class="phone-code">验证码：<input type="text" name="code"/>&nbsp;<input type="button" class="send-sms-vcode" value="手机获取验证码"/></p>
                    <p class="query-btn"><input type="button" value="查询"/></p>
                </div>
            </div>
            <input type="hidden" id="jjsldw">
            <div class="query-detail">
                <table>
                    <tr>
                        <td class="first-td">处理单位：</td>
                        <td class="data-sljjdw"></td>
                    </tr>
                    <tr>
                        <td class="first-td">处理民警：</td>
                        <td class="data-mjxm"></td>
                    </tr>
                    <tr>
                        <td class="first-td">联系电话：</td>
                        <td class="data-mjdh"></td>
                    </tr>
                    <tr style="height:200px;">
                        <td class="first-td">进展状态：</td>
                        <td class="data-sl_ajclqk">
                            <p class="data-zyaq"></p>
                            <p class="data-ajclqk" style="margin-top: 10px;color: orangered"></p>
                        </td>
                    </tr>
                    <tr>
                        <td class="first-td">评价信息：</td>
                        <td>
                            <label><input type="radio" name="evaluate" checked="checked" value="1"/><span class="t_span">满意</span></label>
                            <label><input type="radio" name="evaluate" value="0"/><span class="t_span">基本满意</span></label>
                            <label><input type="radio" name="evaluate" value="-1"/><span class="t_span">不满意</span></label>
                        </td>
                    </tr>
                </table>
                <input type="button" value="提 交" class="submit-btn" id="pingjia"/>
            </div>
            <div class="loading-page">
                <div class="loading-con">
                    <img src="{$config_siteurl}statics/themes/L1_Global/images/loading.gif" alt=""/>
                    <p>系统正在努力查询，此过程需要几秒钟，请等待...</p>
                </div>
            </div>
        </div>
        <script>
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
                $(".send-sms-vcode")
                    .prop("disabled", false);
                $(".send-sms-vcode").on("click", function(){
                    var caseID= $.trim($("input[name=caseID]").val());
                    var mobile = $.trim($("input[name=mobile]").val());
                    if(caseID!==''&&mobile!==''&&caseID.length==23&&mobile.length==11){
                        if(!(/^1(3|4|5|7|8)\d{9}$/.test(mobile))){
                            alert("手机号码有误，请重填");
                            return false;
                        }
                        setTimeout(tic,1000);
                        var charactors="1234567890";
                        var value='',i;
                        for(j=1;j<=4;j++){
                            i = parseInt(10*Math.random());
                            value = value + charactors.charAt(i);
                        }
                    $.post("/index.php?g=api&m=site&a=query_case_phone", {caseID:caseID,mobile:mobile,round:value}, function(d){
                        if(d==0){
                            alert("警情编号或者手机号码不正确，请核对后重新获取验证码");
                        }else {
                            if(mobile && mobile.length == 11){
                                $.post("/index.php?g=api&m=sms&a=send", {mobile:mobile}, function(d){});
                                tic();
                            }else{
                                alert("请正确填写手机号码!");
                            }
                        }
                    });
                    }else {
                        alert("警情编号或者手机号码不正确，请重新填写")
                    }
                });
            });

        </script>
        <script>
            $(function(){
                $('#pingjia').attr('disabled','true');
                $('#pingjia').attr('title','请成功查询后再评价');
                var loading = function() {
                    $(".loading-page").css("display","block");
                }, loadingDismissed = function() {
                    setTimeout(function(){
                        $(".loading-page").css("display","none");
                        $(".query-result").css("visibility","visible");
                    },1000);
                };

                $(".query-btn input").click(function(){
                    var caseID = $.trim($("input[name=caseID]").val()),
                        mobile = $.trim($("input[name=mobile]").val()),
                        code = $.trim($("input[name=code]").val());
                    if(caseID.length==23 && mobile.length==11 && code.length==4){
                        loading();
                        $.post("/index.php?g=api&m=site&a=query_case", {
                            caseID:caseID,mobile:mobile,code:code
                        },function(d){
                            loadingDismissed();
                            if(d == 0){
                                alert("手机验证码不正确，查询失败");
                            }else{
                                var dd=eval("("+d+")");
                                $(".data-sljjdw").text(dd['sljjdw']);
                                $(".data-mjxm").text(dd['mjxm']);
                                $(".data-mjdh").text(dd['mjdh']);
                                if(dd['slAjclqk']!==''){
                                    $(".data-ajclqk").text(dd['slAjclqk']);
                                }else {
                                    $(".data-ajclqk").text("正在处理中");
                                }
                                $("#jjsldw").val(dd['sljjdw']);
                              $('#pingjia').removeAttr('disabled');
                            }
                        });
                    }else{
                        alert("请正确输入信息!");
                    }
                })
            })
        </script>
        <script>
            $(function(){
                $('#pingjia').on("click",function(){
                        var xuan=$("input[type='radio']:checked").val();
                        $.post("/index.php?g=api&m=site&a=case_pingjia",{kuang:xuan},function(data){
                            if(data==1){
                                alert("提交成功，感谢您的评价");
                                $('#pingjia').attr('disabled','true');
                                $("#pingjia").val("提交成功");
                                $('#pingjia').attr('title','您已评价，请勿重复评价');
                            }else {
                                alert("提交失败，请您重新评价");
                                $('#pingjia').attr('disabled','false');
                                $("#pingjia").val("提交");
                            }
                        });
                })
            })
        </script>
        <template file="Content/Mods/footer.php" />
        <template file="Content/Mods/quick_nav.php" />
        <template file="Content/utils.php" />
    </div>
    <a href="#" class="move-top"></a>
</div>
</body>
</html>
