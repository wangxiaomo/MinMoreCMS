<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
  <link href="{$model_extresdir}css/common.css" rel="stylesheet" />
</head>
<body>
  <div class="success-wrapper">
    <div class="success">
      <img src="{$model_extresdir}images/ballon.png"  />
      <div class="content">
        <div class="content-hd">
          您的信件已经提交，我们将为您尽快处理<br />请牢记您的信件编号，以便查询使用
        </div>
        <div class="content-bd">
          信件编号:{$message}
        </div>
        <div class="content-fd">
          <a href="{:U('DirectorMail/Index/add')}">继续写信</a>
          <a href="/">返回首页</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
