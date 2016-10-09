<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <form name="query"  class="J_ajaxForm" action="{:U('chief','isadmin=1')}" method="post">
	  <div style="margin:10px">
		  <span>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名:</span>       
		  <input name="name" placeholder="姓名" style="margin:10px;width:150px;"></input>&nbsp;&nbsp;&nbsp;
	  </div>
	  <div style="margin:10px">
		  <span>一级部门：</span>
		  <select  name="city" style="width:150px">
			<option value="0">--请选择--</option>
			  <foreach name='citys' item='v' >
			  <option value="{$v.oid}">{$v.osimplename}</option>
			  </foreach>
		  </select>&nbsp;&nbsp;&nbsp;
		  <span>二级部门：</span>
		  <select  name="barue" style="width:150px">
			  <option value="0">--请选择--</option>                    
		  </select >&nbsp;&nbsp;&nbsp;
		  <span>三级部门：</span>
		  <select  name="station" style="width:150px">
			  <option value="0">--请选择--</option>
		  </select>
		  <button type="submit" class="btn btn_submit" >查询</button> 
	  </div>
  </form>
  <form name="myform"  class="J_ajaxForm" action="{:U('delchief','isadmin=1')}" method="post" >
    <div class="table_list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td width="20" align="center"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
            <td width="50" align="center">ID</td>
            <td width="100" align="center">姓名</td>
            <td width="300" align="center">部门</td>
            <td width="180" align="center">操作</td>
          </tr>
        </thead>
        <tbody>
          <volist name="data" id="vo">
            <tr>
              <td align="center"><input class="checkbox J_check "  data-yid="J_check_y" data-xid="J_check_x"  name="ids[]" value="{$vo.id}" type="checkbox"></td>
              <td align="center">{$vo.id}</td>
              <td align="center">{$vo.name}</td>
              <td >{$vo.oname}
              </td>
              <td align="center"><a class="J_ajax_del" href="{:U('delchief',array("id"=>$vo['id'],'isadmin'=>1))}">删除</a></td>
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
<script>
$(function(){
	var sub_org_url="{:U('DirectorMail/Onlinepetition/get_sub_org')}";
	$("select[name='city']").on("change",function(){
	var pid=$("select[name='city']").val();
	var request={pid:pid,level:1};
	$.ajax({
            cache: false,
            type: "POST",
            url: sub_org_url,
            dataType: "json",
            data: request,
            timeout: 3000,
            error: function () {
                alert("网络错误，请稍候尝试！");
            },
	    success: function (resp){
		 $("select[name='barue']").empty();
                $("select[name='barue']").append("<option value='0'>--请选择--</option>");
		 $("select[name='station']").empty();
                $("select[name='station']").append("<option value='0'>--请选择--</option>");
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
	var pid=$("select[name='barue']").val();
	var level=2;
	var request={pid:pid,level:level};
	$.ajax({
            cache: false,
            type: "POST",
            url: sub_org_url,
            dataType: "json",
            data: request,
            timeout: 3000,
            error: function () {
                alert("网络错误，请稍候尝试！");
            },
	    success: function (resp){
		 $("select[name='station']").empty();
                $("select[name='station']").append("<option value='0'>--请选择--</option>");
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
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>
