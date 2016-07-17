<template file="DirectorMail/Public/header.php"/>
<template file="DirectorMail/Public/mailbox.php"/>
<template file="DirectorMail/Public/button.php"/>
  </div>
  <div class="content-fd">
    <div class="director-mail-description" style="margin-top:-100px;">
       <p>1、本栏目主要提供涉及公安机关的相关法律法规、政策和服务事项的咨询。</p>
       <p>2、请您认真填写完整、准确、真实、有效的信息，不得发布不符合国家法律法规和任何有害的信息。</p>
       <p>3、提问内容不要超过500字。</p>
    </div>
    <div class="mailbox-form">
      <form method="POST" enctype="multipart/form-data">
        <div class="data-line">
          <span class="prompt">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</span>
          <div>
            <input type="text" name="xm" /><i class="red">*</i>
          </div>
        </div>               
        <div class="data-line">
          <span class="prompt">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：</span>
          <div>
            <input type="text" name="xb" />
          </div>
        </div>               
        <div class="data-line">
          <span class="prompt">身份证号：</span>
          <div>
            <input type="text" name="sfzh" /><i class="red">*</i>
          </div>
        </div>
        <div class="data-line">
          <span class="prompt">手机号码：</span>
          <div>
            <input type="tel" name="sjhm" /><i class="red">*</i>
          </div>
        </div>
        <div class="data-line">
          <span class="prompt">联系电话：</span>
          <div>
            <input type="tel" name="lxdh" />
          </div>
        </div>
        <div class="data-line">
          <span class="prompt">邮箱地址：</span>
          <div>
            <input type="text" name="yxdz" /><i class="red">*</i>
          </div>
        </div>
        <div class="data-line">
          <span class="prompt">联系地址：</span>
          <div>
            <input type="text" name="lxdz" />
          </div>
        </div>
        <div class="data-line">
          <span class="prompt">查询密码：</span>
          <div>
            <input type="text" name="cxmm" /><i class="red">*</i>
          </div>
        </div>
        <div class="data-line">
          <span class="prompt">受理机构：</span>
          <div>
            <select name="sljg" style="width:400px">
                <volist name="data" id="vo">
                <option value="{$vo.id}">{$vo.name}</option>
                </volist>
            </select><i class="red">*</i>
          </div>
        </div>
        <div class="data-line">
          <span class="prompt">业务类别：</span>
          <div>
            <select name="ywlb">
                <option value="">请选择</option>
                <option value="出入境">出入境</option>
                <option value="交通">交通</option>
                <option value="户籍">户籍</option>
                <option value="其他">其他</option>
            </select><i class="red">*</i>
          </div>
        </div>
        <div class="data-line">
          <span class="prompt">主&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;题：</span>
          <div>
            <input type="text" name="xjzt" /><i class="red">*</i>
          </div>
        </div>
        <div class="data-line data-textarea">
          <span class="prompt">详细内容：</span>
          <div>
            <textarea name="xxnr"></textarea><i class="red">*</i>
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
          <button type="submit">提交</button>
          <button type="reset">重置</button>
          <button class="query-button">查询</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
$(function(){
    $(".query-button").on("click", function(e){
        e.preventDefault();
        
        url = "{:U('DirectorMail/Consult/index')}&type="+"{$flag}";
        window.location = url;
    });
});
</script>
<template file="DirectorMail/Public/footer.php"/>
