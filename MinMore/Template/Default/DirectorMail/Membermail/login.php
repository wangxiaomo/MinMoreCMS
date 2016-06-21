<template file="DirectorMail/Public/header.php"/>
<h3 class="content-box-title red">温馨提示：请输入您的手机号码和姓名登录，进行建议、投诉、举报、咨询。</h3>
<div class="content-fd NPCMember-login-box">
  <div class="NPCMember-login-form">
    <img src="{$model_extresdir}images/NPCMember-login-bg.png" />
    <div class="login-form">
      <form method="POST" action="{:U('Membermail/login')}">
        <p>手机号:<input type="tel" name="tel" style="width:200px;"/></p>
        <p>密&nbsp;&nbsp;&nbsp;&nbsp;码:<input type="password" name="pwd" style="width:198px;" /></p>
        <div class="login-button-groups">
          <button>登录</button>
          <button type="reset">重置</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<template file="DirectorMail/Public/footer.php"/>                               
