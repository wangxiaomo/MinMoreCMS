<template file="DirectorMail/Public/header.php"/>
<div class="meta-description">
    <h3>人大代表、政协委员、警风警纪监督员直通车</h3>
    <div class="description">
        <p>尊敬的人大代表、政协委员、警风警纪监督员，您好！</p>
        <p>我们在“广安公安网”网站开通了“代表委员会直通车”。各位人大代表、政协委员、警风警纪监督员均可通过“人大代表政协委员直通车”向我局提出建议、意见和批评，以及需要帮助协调解决的事项，我们承诺对人大代表、政协委员、警风警纪监督员网上建议和意见，做到认真办理、件件答复。</p>
    </div>
</div>
<div class="content-fd NPCMember-login-box">
  <div class="NPCMember-login-form">
    <img src="{$model_extresdir}images/NPCMember-login-bg.png" />
    <div class="login-form">
      <form method="POST" action="{:U('Membermail/login')}">
        <p>姓&nbsp;&nbsp;&nbsp;&nbsp;名:<input type="text" name="username" style="width:198px;"/></p>
        <p>手机号:<input type="text" name="mobile" style="width:200px;"/></p>
        <p>验证码:<input type="text" name="vcode" style="width:100px;" /><input type="button" class="send-sms-vcode" value="手机获取验证码"/></p>
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
