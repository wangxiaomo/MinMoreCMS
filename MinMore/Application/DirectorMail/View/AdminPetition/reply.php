<Admintemplate file="Common/Head"/>
<script>
    function qreply(val) {
        if (val != '')
            reply = document.getElementById('reply');
            reply.value = val;
    }
</script>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <div class="h_a">回复评论</div>
  <form name="myform" action="{:U("reply","isadmin=1")}" method="post" class="J_ajaxForm">
    <input type="hidden" name="id" value="{$info.id}">
    <div class="table_full"> 
    <table width="100%" class="table_form contentWrap">
        <tbody>
        <tr>
          <th width="100">上访人姓名</th>
          <td>{$info.name}</td>
        </tr>
        <tr>
          <th>联系方式</th>
          <td> 手机：{$info.shouji}，Email：{$info.email}</td>
        </tr>
        <tr>
          <th>信访方式</th>
          <td>{$info.type}</td>
        </tr>
        <tr>
          <th>信访主题</th>
          <td>{$info.zhuti}</td>
        </tr>
        <tr>
          <th>上访事由</th>
          <td style="width:600px; height:150px;">{$info.introduce}</td>
        </tr>
        <tr>
	<if condition="$comments">
        <tr>
          <th>转发意见</th>
          <td>
	<volist name="comments" id="vo">
		<h5>【<span style="color:blue">{$vo.from}</span>的意见({$vo.createtime})】:</h5></br>
          	<p>&nbsp;&nbsp;{$vo.comment}</p></br>
	</volist>
	  </td>
        </tr>
	</if>
          <th>快捷回复</th>
          <td> 
            <select name="quickreply" style="width:600px" onchange="qreply(this.value)">
              <option value="" selected="true">不使用快捷回复</option>
              <volist name="quickreply" id="vo">
              <option value="{$vo}">{$vo}</option>
              </volist>
            </select>
          </td>
        </tr>
        <tr>
          <th>回复时间</th>
          <td>
		<if condition="$info.reply NEQ ''">
		{$info.replytime|date="Y-m-d H:i:s",###}
		<else/>
		<p>暂无</p>
		</if>
	</td>
        </tr>
        <tr>
          <th>回复内容</th>
          <td><textarea name="reply" style="width:600px; height:200px;" id="reply">{$info.reply}</textarea></td>
        </tr>
      </tbody></table>
    </div>
     <div class="btn_wrap" style="z-index:999;">
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">回复</button>
	<a class="btn btn_submit mr10" href="javascript:void(0);" onclick="showSubDept('{$info.id}','{$info.zhuti}')" value="{$info.id}">转发>></a>
      </div>
    </div>
  </form>
</div>
<div id="overlay" class="black_overlay">  
</div>  
<div id="fd_modal"  class="white_content_small">  
<div class="model_title" style="background:grey;height:30px">
<div class="title" style="text-align:center;font-size:20px;color:white;float:left;width:80%">
	<p>信件转发</p>
</div>
   <a style="color:white;font-size:18px;" herf="javascrip:void(0)" onclick="closeSubDept()">
  <div class="close_modal">  
  </div>  
</a>  
</div>
    <div class="fd_modal_container"> 
    <div class="fd_description">
	<H4>说明:转发后该信件将会从您的信件列表里被移除</H4>
    </div>
    <form class="fd_form" method="post" action="{:U('forward')}"> 
	<div class="fd_item">
	<span for="fd_title">信件标题:</span>
	<input type="text" name="fd_title" class="fd_title" disabled="disabled"></input>
	<input type="text" name="fd_mailid" value="" style="display:none"></input>
	</div>
	<div class="fd_item">
	<span for="fd_target">下级部门:</span>
	<select name="fd_target" class="fd_target">
		<option value="0">--请选择--</option>
	</select>
	</div>
	<div class="fd_item">
	<span for="fd_comment">意&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;见:</span>
	<textarea class="fd_comment" name="fd_comment">
	</textarea>
	</div>
	<div class="fd_item">
	<button class="bt_reset" type="reset">重置</button>
	<button class="bt_submit" type="submit">确认转发</button>
	</div>
    </form> 
        </div> 
    </div> 
</div> 
<script>
function showSubDept(mailid,title){
        var url="{:U('get_sub_department')}";
        var request={mailid:mailid};
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
                $("select[name='fd_target']").empty();
                $("select[name='fd_target']").append("<option value='0'>--请选择--</option>");
                var data=resp.info;
                if(resp.status==0){
                alert("获取子部门失败,"+resp.info);
                return;
                }
                var count = data.length;
                var i = 0;
                var b = "";
                for (i = 0; i < count; i++) {
                    b += "<option value='" + data[i].oid + "'>" + data[i].oname+ "</option>";
                }
                $("select[name='fd_target']").append(b);
		$("input[name='fd_title']").val(title);
		$("input[name='fd_mailid']").val(mailid);
		$("#fd_modal").show();
		$("#overlay").show();
                }
        });
}
function closeSubDept(show_div,bg_div)  
{  
	$('#fd_modal').hide();  
	$('#overlay').hide();  
}; 
</script>
<style>
.black_overlay{  
 display: none;  
 position: absolute;  
 top: 0%;  
 left: 0%;  
 width: 100%;  
 height: 100%;  
 background-color: black;  
 z-index:1001;  
 opacity:0.6;  
 filter: alpha(opacity=80);  
}  
.white_content {  
 display: none;  
 position: absolute;  
 top: 0;  
 left: 0;  
 right: 0;  
 bottom: 0;  
 margin:auto;
 width: 800px;  
 height: 600px;  
 border: 10px solid lightgrey;  
 border-radius: 15px;
 background-color:white;  
 z-index:1002;  
 overflow: auto;  
}  
.white_content_small {  
 display: none;  
 position: absolute;  
 top: 0;  
 left: 0;  
 right: 0;  
 bottom: 0;  
 margin:auto;
 width: 600px;  
 height: 450px;  
 border: 5px solid lightgrey;  
 background-color: white;  
 z-index:1002;  
 overflow: auto;  
}  
.fd_modal_container {
    margin-left:20px;
    margin-right:20px;
    margin-top:20px;
}
.fd_modal_container span{
    width:20%;
}
.fd_modal_container .fd_title{
    width:80%;
    overflow:hide;
    height:30px;
}
.fd_modal_container .fd_target{
    width:80%;
    overflow:hide;
    height:30px;
}
.fd_modal_container .fd_comment{
    width:80%;
    height:150px;
}
.fd_item {
    margin:20px;
}
.fd_modal_container .bt_reset{
    background: lightcoral;
    padding: 5px 30px;
    color: #fff;
    border-radius: 8px;
    font-size: 16px;
    border: none;
    margin: 0px 10%;
    cursor: pointer;
}
.fd_modal_container .bt_submit{
    background: #1b75b6;
    padding: 5px 30px;
    color: #fff;
    border-radius: 8px;
    font-size: 16px;
    border: none;
    margin: 0px 10%;
    cursor: pointer;
}
.close_modal {
    width: 25px;
    height: 25px;
    position: absolute;
    top: 0px;
    right: 0px;
    background: rgba(0,0,0,0.5);
    border-radius: 12px;
    line-height: 25px;
    text-align: center;
}
.close_modal::before {
    display: inline-block;
    content: "\2716";
    color: white;
    font-size: 18pt;
}
</body>
</html>
