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
          <span class="prompt">所在区域：</span>
	   <div>
	    <select  name="city" style="width:140px">
		<option value="0">--请选择--</option>
		<foreach name='citys' item='v' >
		    <option value="{$v.oid}">{$v.osimplename}</option>
		</foreach>
	    </select>&nbsp;&nbsp;&nbsp;
	    <select  name="barue" style="width:140px">
		<option value="0">--请选择--</option> 
	    </select >&nbsp;&nbsp;&nbsp;
	    <select  name="station" style="width:140px">
		<option value="0">--请选择--</option>
	    </select>
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
$(function(){
	$("select[name='city']").on("change",function(){
		 $("select[name='barue']").empty();
                $("select[name='barue']").append("<option value='0'>--请选择--</option>");
		 $("select[name='station']").empty();
                $("select[name='station']").append("<option value='0'>--请选择--</option>");
	var url="{:U('DirectorMail/Onlinepetition/get_sub_org')}";
	var pid=$("select[name='city']").val();
	if(pid==0)return;
	var request={pid:pid,level:1};
	$.ajax({
            cache: false,
            type: "POST",
            url: url,
            dataType: "json",
            data: request,
            timeout: 3000,
            error: function () {
                alert("网络错误，请稍候尝试！");
            },
	    success: function (resp){
		var data=resp.info;
                var count = data.length;
                var i = 0;
                var b = "";
                for (i = 0; i < count; i++) {
                    b += "<option value='" + data[i].oid + "'>" + data[i].osimplename+ "</option>";
                }
                $("select[name='barue']").append(b);
                }
	});
});
	$("select[name='barue']").on("change",function(){
		$("select[name='station']").empty();
                $("select[name='station']").append("<option value='0'>--请选择--</option>");
	var url="{:U('DirectorMail/OnlinePetition/get_sub_org')}";
	var pid=$("select[name='barue']").val();
	if(pid==0)return;
	var level=2;
	var request={pid:pid,level:level};
	$.ajax({
            cache: false,
            type: "POST",
            url: url,
            dataType: "json",
            data: request,
            timeout: 3000,
            error: function () {
                alert("网络错误，请稍候尝试！");
            },
	    success: function (resp){
		var data=resp.info;
                var count = data.length;
                var i = 0;
                var b = "";
                for (i = 0; i < count; i++) {
                    b += "<option value='" + data[i].oid + "'>" + data[i].osimplename+ "</option>";
                }
                $("select[name='station']").append(b);
                }
	});
});
});
</script>
<template file="DirectorMail/Public/footer.php"/>
