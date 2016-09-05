<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <form name="query"  class="J_ajaxForm" action="{:U('index','isadmin=1')}" method="post">
	<div style="margin:10px">
	<span>查询关键词:</span>	<input name="keyword" placeholder="姓名，主题"></input>
	<button type="submit" class="btn btn_submit" >查询</button> 
	</div>
  </form>
  <form name="myform"  class="J_ajaxForm" action="{:U('delete','isadmin=1')}" method="post" >
    <div class="table_list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td width="20" align="center"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
            <td width="50" align="center">ID</td>
            <td width="100" align="center">代表委员</td>
            <td width="180" align="center">主题</td>
            <td width="150" align="center">来信时间</td>
            <td width="150" align="center">
            状态：<select name="searchtype" onChange="window.location.href=this.value">
            <option value="{:U('index' ,array('isadmin'=>1,'type'=>$type)  )}">全部</option>
            <option value="{:U('index' ,array('isadmin'=>1,'status'=>0,'type'=>$type) )}"<if condition="$status eq '0'">selected</if>>未回复</option>
            <option value="{:U('index' ,array('isadmin'=>1,'status'=>1,'type'=>$type) )}"<if condition="$status eq '1'">selected</if>>已回复</option>
           </select>
            </td>
            <td width="180" align="center">操作</td>
          </tr>
        </thead>
        <tbody>
          <volist name="data" id="vo">
            <tr>
              <td align="center"><input class="checkbox J_check "  data-yid="J_check_y" data-xid="J_check_x"  name="ids[]" value="{$vo.id}" type="checkbox"></td>
              <td align="center">{$vo.id}</td>
              <td align="center">{$vo.username}</td>
              <td align="center">{$vo.zhuti|str_cut=###,20}</td>
              <td align="center">{$vo.createtime|date="Y-m-d H:i:s",###}</td>
              <td align="center">
		<if condition="$vo.reply eq ''">
			<p style="color:grey">未回复</p>
		<else/>
			<p style="color:blue">已回复({$vo.replytime|date="Y-m-d",###})</p>
		</if>
	      </td>
              <td align="center">
		<a class="J_ajax_del" href="{:U("delete",array("id"=>$vo['id'],'isadmin'=>1))}">删除</a>
		| <a href="{:U("reply",array("id"=>$vo['id'],'isadmin'=>1))}">回复</a>
		| <a class="forward" href="javascript:void(0);" onclick="showSubDept({$vo['id']},'{$vo.zhuti}')">转发</a>
		| <a href="{:U("reply",array("id"=>$vo['id'],'isadmin'=>1))}">详情>></a>
		</td>
            </tr>
          </volist>
        </tbody>
      </table>
      <div class="p10">
        <div class="pages"> {$Page} </div>
      </div>
    </div>
    <div class="btn_wrap">
      <div class="btn_wrap_pd">
      	<label class="mr20"><input type="checkbox" class="J_check_all" data-direction="y" data-checklist="J_check_y">全选</label>
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">删除</button>
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
    <form class="fd_form" method="post" action=""> 
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
<script src="{$config_siteurl}statics/js/common.js?v"></script>
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
		var action="{:U('forward',array('id'=>mailid))}"
		$(".fd_form").attr("action",action);
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
</style>  
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>
