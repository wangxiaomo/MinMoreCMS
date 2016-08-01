<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <form class="J_ajaxForm" action="{:U('addchief','isadmin=1')}" method="post" id="myform">
    <div class="h_a">基本属性</div>
    <div class="table_full">
      <table width="100%" >
           <tr>
              <th width="200">姓名：</th>
              <th><input type="text" name="name" value="" class="input"></th>
            </tr>
           <tr>
              <th width="200">部门：</th>
              <th>
		一级部门：
	    <select  name="city" style="width:150px">
		<option value="0">--请选择--</option>
		<foreach name='citys' item='v' >
		    <option value="{$v.oid}">{$v.osimplename}</option>
		</foreach>
	    </select>&nbsp;&nbsp;&nbsp;
</th>
              <th>
		二级部门：
	    <select  name="barue" style="width:150px">
		<option value="0">--请选择--</option>                    
	    </select >&nbsp;&nbsp;&nbsp;
</th>
              <th>
		三级部门：
	    <select  name="station" style="width:150px">
		<option value="0">--请选择--</option>
	    </select>
</th>
            </tr>
      </table>
    </div>
    <div class="">
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
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
