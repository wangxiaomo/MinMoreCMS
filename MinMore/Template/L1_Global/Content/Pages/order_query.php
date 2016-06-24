<!DOCTYPE html>
<html>
<head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <link href="favicon.ico" rel="shortcut icon" />
    <link rel="canonical" href="{$config_siteurl}" />
    <title>刑事案件查询</title>
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
                <p>刑事案件查询</p>
                <a href="{:U('Content/Site/sunshine_police')}"> << 返回首页 </a>
            </div>
            <div class="query-area">
                <div class="query-condition">
                    <h3>刑事案件查询</h3>
                    <p class="case-num">案件编号：<input type="text"/></p>
                    <p class="phone-num">手机号：<input type="text"/></p>
                    <p class="phone-code">验证码：<input type="text"/>&nbsp;<input type="button" value="获取手机验证码"/></p>
                    <p class="query-btn"><input type="button" value="查询"/></p>
                </div>
            </div>
            <div class="query-detail">
                <table>
                    <tr>
                        <td style="width: 20%;" class="first-td">案件名称：</td>
                        <td style="width: 80%;"></td>
                    </tr>
                    <tr>
                        <td class="first-td">办事单位：</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="first-td">办案民警：</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="first-td">联系电话：</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="first-td">进展状态：</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="first-td">评价信息：</td>
                        <td>
                            <input type="radio" name="evaluate" checked="checked"/>满意
                            <input type="radio" name="evaluate"/>基本满意
                            <input type="radio" name="evaluate"/>不满意
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
                $(".query-btn input").click(function(){
                    $(".loading-page").css("display","block");
                    setTimeout(function(){
                        $(".loading-page").css("display","none");
                        $(".query-result").css("visibility","visible");
                    },3000)
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
