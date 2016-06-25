<template file="DirectorMail/Public/header.php"/>
<template file="DirectorMail/Public/mailbox.php"/>
<template file="DirectorMail/Public/button.php"/>
  </div>
  <div class="content-fd">
  <div class="mailbox-list" style="margin-top:-95px;">
    <div class="content-hd">
      局长信箱－信件填写
    </div>
  </div>
    <div class="director-mail-description">
        欢迎您进入我的信箱，感谢您长期以来对公安工作的关心和支持，我们热诚欢迎您对公安工作提出意见和建议，您的诉求我们将认真办理。
    </div>
    <div class="mailbox-form">
      <form method="POST" enctype="multipart/form-data">
        <div class="data-line">
          <span class="prompt">信件类型：</span>
          <div>
            <volist name="typeList" id="vo">
            <label><input type="radio" name="typeid" value="{$vo.typeid}" />{$vo.name}</label>
            </volist>
          </div>
        </div>               
        <div class="data-line">
          <span class="prompt">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</span>
          <div>
            <input type="text" name="name" />
          </div>
        </div>               
        <div class="data-line">
          <span class="prompt">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：</span>
          <div>
            <label><input type="radio" name="sex" value="男" checked="true"/>男</label>
            <label><input type="radio" name="sex" value="女" />女</label>
          </div>
        </div>
        <div class="data-line">
          <span class="prompt">身份证号：</span>
          <div>
            <input type="text" name="cardid" />
            <!--<input type="checkbox" name="receiveCallback" />是否接受短信通知-->
          </div>
        </div>
        <div class="data-line">
          <span class="prompt">手机号码：</span>
          <div>
            <input type="tel" name="shouji" />
            <!--<input type="checkbox" name="receiveCallback" />是否接受短信通知-->
          </div>
        </div>
        <div class="data-line">
          <span class="prompt">邮箱地址：</span>
          <div>
            <input type="text" name="email" />
          </div>
        </div>
        <div class="data-line">
          <span class="prompt">联系地址：</span>
          <div>
            <input type="text" name="addr" />
          </div>
        </div>
        <div class="data-line">
          <span class="prompt">主&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;题：</span>
          <div>
            <input type="text" name="zhuti" />
          </div>
        </div>
        <div class="data-line">
          <span class="prompt">信件公开：</span>
          <div>
            <label><input type="radio" name="secrecy" value="1" checked="true"/>公开</label>
            <label><input type="radio" name="secrecy" value="0" />保密</label>
          </div>
        </div>
        <div class="data-line data-textarea">
          <span class="prompt">详细内容：</span>
          <div>
            <p class="small-prompt">***至少20字</p>
            <textarea name="introduce"></textarea>
          </div>
        </div>
        <div class="data-line">
          <span class="prompt">附&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;件：</span>
          <div>
            <input type="file" name="upload" />
          </div>
        </div>
        <div class="data-line">
          <span class="prompt">验&nbsp;&nbsp;证&nbsp;&nbsp;码：</span>
          <div>
            <input type="text" name="validate" />
            <img src='{:U('Api/Checkcode/index','type=DirectorMail&code_len=4&font_size=20&width=130&height=30&font_color=&background=')}' align="absmiddle" title="看不清？点击更新验证码" alt="看不清？点击更新验证码" onClick="this.src='{:U('Api/Checkcode/index','type=DirectorMail&code_len=4&font_size=20&width=130&height=30&font_color=&background=&refresh=1')}'" style="cursor:pointer;"/>
          </div>
        </div>
        <div class="form-button-groups">
          <button>提交</button>
          <button type="reset">重置</button>
        </div>
      </form>
    </div>
  </div>
</div>
<template file="DirectorMail/Public/footer.php"/>
