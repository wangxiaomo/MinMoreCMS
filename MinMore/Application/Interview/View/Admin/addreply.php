<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<script type="text/javascript">
	function setRole(id){
		$.post("{:U('Admin/creataDefaultRole')}",{id:id},function(data){
			if(data.success){
				alert(data.msg);
				location.reload(); 
			}
			else  alert(data.msg);
		},"json");
	}
</script>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <form class="J_ajaxForm" action="{:U('addreply')}" method="post" id="myform">
    <div class="h_a">添加访谈信息</div>
    <div class="table_full">
      <table width="100%" >
           <tr>
              <th width="200">回复人：</th>
              <input type="hidden" name="view_id" value="{$obj.view_id}" />
			  <input type="hidden" name="is_admin" value="on" />
              <th><input type="text" name="at_username" value="{$obj.username}" class="input length_6" readonly="readonly" ></th>
            </tr>
            <tr>
              <th width="200">回复人文字信息：</th>
              <th>
				<textarea  style="width:380px; height:150px;">{$obj.info}</textarea> 
              </th>
            </tr>
            <tr>
              <th width="200">回复信息：</th>
              <th>
              <textarea name="info" style="width:380px; height:150px;"></textarea> 
              </th>
            </tr>
            <tr>
              <th width="200">回复角色:</th>
              <th>
				<empty name="rolelist">
					<a href="javascript:setRole('{$obj.view_id}')">设置默认</a>
				<else /> 
					<foreach name="rolelist" item="vo" >
						 <input type="radio"   value="{$vo.id}" name="role_id"> {$vo.name}
					</foreach>
				</empty> 
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
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>
