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
        <div class="multi_data-line">
          <span class="prompt">信访形式：</span>
          <div>
            <input type="radio" name="type" value="mail"/>书信来访&nbsp;&nbsp;&nbsp;
            <input type="radio" name="type" value="present"/>现场接访&nbsp;&nbsp;&nbsp;
            <input type="radio" name="type" value="video"/>视频接访&nbsp;&nbsp;&nbsp;
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
	    <select  name="city" style="width:150px">
		<option value="0">--请选择--</option>
		<foreach name='citys' item='v' >
		    <option value="{$v.oid}">{$v.osimplename}</option>
		</foreach>
	    </select>&nbsp;&nbsp;&nbsp;
	    <select  name="barue" style="width:150px">
		<option value="0">--请选择--</option>                    
	    </select >&nbsp;&nbsp;&nbsp;
	    <select  name="station" style="width:150px">
		<option value="0">--请选择--</option>
	    </select>
	  </div>
        </div>
        <div class="multi_data-line">
          <span class="prompt">接访领导：</span>
          <div class="left">
            <input type="text" name="chief_name" />
		<i class="red">*</i>
          </div>
          <span class="prompt">可约访的领导：</span>
          <div class="right">
            <input type="button" name="sel-leader" value="点击自选" onclick="showSelectChief()"/></a>
	    	<select  name="chief" style="width:150px;display:none">
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
	$("select[name='city']").on("change",function(){
		 $("select[name='barue']").empty();
		$("input[name='chief_name']").val("");
                $("select[name='barue']").append("<option value='0'>--请选择--</option>");
		 $("select[name='station']").empty();
                $("select[name='station']").append("<option value='0'>--请选择--</option>");
		$("select[name='chief']").hide();
	var url="{:U('get_sub_org')}";
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
		$("input[name='chief_name']").val("");
                $("select[name='station']").append("<option value='0'>--请选择--</option>");
		$("select[name='chief']").hide();
	var url="{:U('get_sub_org')}";
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
	$("select[name='station']").on("change",function(){
		$("input[name='chief_name']").val("");
		$("select[name='chief']").hide();
	pid=$("select[name='station']").val();
	if(pid==0)return;
	});
});
	$("select[name='chief']").on("change",function(){
	var chief_name=$("select[name='chief'] option:selected").text();
	if($("select[name='chief']").val()==0){
		chief_name="";
	}
	$("input[name='chief_name']").val(chief_name);
//	$("select[name='chief']").hide();
	});
});
function showSelectChief(){
	var oid1=$("select[name='city']").val();
	var oid2=$("select[name='barue']").val();
	var oid3=$("select[name='station']").val();
	if(oid3<1&&oid2<1&&oid1<1){
	return;
	}
	var url="{:U('get_petition_chief')}";
	var request={oid1:oid1,oid2:oid2,oid3:oid3};
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
		$("select[name='chief']").empty();
                $("select[name='chief']").append("<option value='0'>--请选择--</option>");
		var data=resp.info;
		if(data==null){
                alert("所选部门未找到可约访领导，您可以自行填写接访领导的姓名");
		return;
		}
                var count = data.length;
                var i = 0;
                var b = "";
                for (i = 0; i < count; i++) {
                    b += "<option value='" + data[i].id + "'>" + data[i].name+ "</option>";
                }
                $("select[name='chief']").append(b);
		$("select[name='chief']").show();
                }
	});
}
</script>
<template file="DirectorMail/Public/footer.php"/>
