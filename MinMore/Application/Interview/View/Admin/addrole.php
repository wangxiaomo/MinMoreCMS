<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>

<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <form class="J_ajaxForm" action="{:U('addrole')}" method="post" id="myform">
    <div class="h_a">添加访谈角色信息</div>
    <div class="table_full">
      <table width="100%" >
	    <tr>
		  <th width="200">访谈标题：</th>
		  <input type="hidden" name="id" value="{$objrole.id}" />
		  <input type="hidden" name="view_id" value="{$obj.id}" />
		  <th><input type="text" name="title" value="{$obj.title}" class="input length_6" readonly="readonly" ></th>
		</tr>
		<tr>
		  <th width="200">角色名称：</th>
		  <th>
		  <input type="text" name="name" value="{$objrole.name}" class="input length_6">
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
