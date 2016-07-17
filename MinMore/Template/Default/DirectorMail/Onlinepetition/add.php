<template file="DirectorMail/Public/header.php"/>
<template file="DirectorMail/Public/mailbox.php"/>
<template file="DirectorMail/Public/button.php"/>
  </div>
  <div class="content-fd">
  <div class="mailbox-list" style="margin-top:-95px;">
    <div class="content-hd">
      网上信访－信件填写
    </div>
  </div>
    <div class="director-mail-description">
	<h4>信访须知:</h4>
	<a>
	1、请您如实填写姓名、身份证号码和联系方式。<br/>
	2、请您如实填写您的信访诉求。<br/>
	3、请您在信访时遵守法律法规，依法信访。<br/>
	4、请牢记您预留的查询密码,勿设置过于简单的查询密码。
	</a>
    </div>
    <div class="multi_mailbox-form">
      <form method="POST" enctype="multipart/form-data">
        <div class="multi_data-line">
          <span class="prompt">信&nbsp;&nbsp;访&nbsp;&nbsp;人：</span>
          <div class="left">
            <input type="text" name="name" />
		<i class="red">*</i>
          </div>
          <span class="prompt">邮箱地址：</span>
          <div class="right">
            <input type="text" name="email" />
          &nbsp;&nbsp; 
          </div>
        </div>
        <div class="multi_data-line">
          <span class="prompt">身份证号：</span>
          <div class="left">
            <input type="text" name="cardid" />
          <i class="red">*</i>
          </div>
          <span class="prompt">查询密码：</span>
          <div class="right">
            <input type="text" name="passwd" />
		<i class="red">*</i>
          </div>
        </div>
        <div class="multi_data-line">
          <span class="prompt">手机号码：</span>
          <div class="left">
            <input type="tel" name="shouji" />
		<i class="red">*</i>
          </div>
          <span class="prompt">联系地址：</span>
          <div>
            <input type="text" name="addr" />
		<i class="red">*</i>
          </div>
        </div>
        <div class="multi_data-line">
          <span class="prompt">信访标题：</span>
          <div class="total">
            <input type="text" name="zhuti" />
		<i class="red">*</i>
          </div>
        </div>
        <div class="multi_data-textarea">
          <span class="prompt">上访事由：</span>
          <div>
            <textarea name="introduce"></textarea>
        	<i class="red">*</i> 
            <p class="small-prompt">提示：“信访事由”不得超过2000字</p>
	  </div>
        </div>
        <div class="multi_data-line">
          <span class="prompt">附&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;件：</span>
          <div>
            <input type="file" name="upload" />
          </div>
        </div>
        <div class="multi_data-line">
          <span class="prompt">所在区域：</span>
	   <div>
	    <select  name="city">
		<option value="0">--请选择--</option>
		<option value="1">广安市<option>                    
		<foreach name='city' item='v' >
		    <option value="{$v.id}">{$v.name}</option>
		</foreach>
	    </select>&nbsp;&nbsp;&nbsp;
	    <select  name="barue">
		<option value="0">--请选择--</option>                    
		<option value="1">岳池县公安局<option>                    
	    </select >&nbsp;&nbsp;&nbsp;
	    <select  name="station">
		<option value="0">--请选择--</option>
		<option value="1">金牛派出所<option>                    
	    </select>
	  </div>
        </div>
        <div class="multi_data-line">
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
        window.location = "{:U('DirectorMail/Onlinepetition/search')}";
    });
});
</script>
<template file="DirectorMail/Public/footer.php"/>
