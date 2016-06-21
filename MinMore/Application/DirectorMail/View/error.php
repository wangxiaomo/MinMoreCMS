<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
  <link href="{$model_extresdir}css/common.css" rel="stylesheet" />
</head>
<body>
  <div class="error-wrapper">
    <div class="error">
      <div class="error-content">
        <img src="{$model_extresdir}images/error.png" />
        <span class="large-error-text">页面怎么打不开了呢？</span>
        <span class="error-text">{$error} 请<a href="{$jumpUrl}">返回</a></span>
      </div>
    </div>
  </div>
</body>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script language="javascript">
setTimeout(function(){
    location.href = '{$jumpUrl}';
},{$waitSecond});
</script>
</html>
