<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="chrome=1" />
    <link href="favicon.ico" rel="shortcut icon" />
    <link rel="canonical" href="{$config_siteurl}" />
    <title>警情受理查询</title>
    <meta name="description" content="{$SEO['description']}" />
    <meta name="keywords" content="{$SEO['keyword']}" />
    <link rel="stylesheet" href="{$config_siteurl}statics/themes/L1_Global/css/case-query.css"/>
    <script src="{$config_siteurl}statics/js/jquery.js" type="text/javascript"></script>
    <script src="{$config_siteurl}statics/js/utils.js" type="text/javascript"></script>
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
                <p>警情受理查询</p>
                <a href="{:U('Content/Site/sunshine_police')}"> << 返回首页 </a>
            </div>
            <div class="query-area">
                <div class="query-condition">
                    <h3>警情受理查询</h3>
                    <p class="case-num">案件编号：<input type="text" name="caseID"/></p>
                    <p class="phone-num">手机号：<input type="text" name="mobile"/></p>
                    <p class="phone-code">验证码：<input type="text" name="code"/>&nbsp;<input type="button" class="send-sms-vcode" value="获取手机验证码"/></p>
                    <p class="query-btn"><input type="button" value="查询"/></p>
                </div>
            </div>
            <div class="query-detail">
                <table>
                    <tr style="height:200px;">
                        <td style="width: 20%;" class="first-td">案件名称：</td>
                        <td style="width: 80%;" class="data-zyaq"></td>
                    </tr>
                    <tr>
                        <td class="first-td">办事单位：</td>
                        <td class="data-sljjdw"></td>
                    </tr>
                    <tr>
                        <td class="first-td">办案民警：</td>
                        <td class="data-mjxm"></td>
                    </tr>
                    <tr>
                        <td class="first-td">联系电话：</td>
                        <td class="data-mjdh"></td>
                    </tr>
                    <tr style="height:200px;">
                        <td class="first-td">进展状态：</td>
                        <td class="data-sl_ajclqk"></td>
                    </tr>
                    <tr>
                        <td class="first-td">评价信息：</td>
                        <td>
                            <label><input type="radio" name="evaluate" checked="checked"/>满意</label>
                            <label><input type="radio" name="evaluate"/>基本满意</label>
                            <label><input type="radio" name="evaluate"/>不满意</label>
                        </td>
                    </tr>
                </table>
                <input type="button" value="提 交" class="submit-btn"/>
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
                $(".submit-btn").on("click", function(e){
                    if($.trim($(".data-zyaq").text())){
                        alert("评价成功,重复评价无效!");
                    }
                });

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
                    if(caseID && mobile && code){
                        loading();
                        $.post("/index.php?g=api&m=site&a=query_alarm", {
                            caseID:caseID,mobile:mobile,code:code
                        },function(d){
                            loadingDismissed();
                            if(d.r == 1){
                                $(".data-zyaq").text(d.data.zyaq);
                                $(".data-sljjdw").text(d.data.sljjdw);
                                $(".data-mjxm").text(d.data.mjxm);
                                $(".data-mjdh").text(d.data.mjdh);
                                $(".data-sl_ajclqk").text(d.data.sl_ajclqk);
                            }else{
                                alert(d.msg);
                            }
                        });   
                    }else{
                        alert("请正确输入信息!");
                    }
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
