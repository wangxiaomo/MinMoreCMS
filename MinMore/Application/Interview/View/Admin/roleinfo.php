<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
	<a class="btn btn_submit mr10 J_ajax_submit_btn"  href="{:U("addrole",array("view_id"=>$view_id))}" >添加访谈角色</a>
	<div class="nav">
		
		<ul class="cc">
			<li class="current"><a href="{:U('index')}">访谈列表信息</a></li>
		</ul>
	</div>
	
	<form name="myform"  class="J_ajaxForm" action="{:U('deleterole')}" method="post" >
    <div class="table_list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td width="20" align="center"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
            <td width="50" align="center">ID</td>
			<td  width="200">角色名称</td>
            <td >标题</td>
           
            <td  width="240" align="center">操作</td>
          </tr>
        </thead>
        <tbody>
		<volist name="dataList" id="vo">
            <tr>
              <td align="center"><input class="checkbox J_check "  data-yid="J_check_y" data-xid="J_check_x"  name="ids[]" value="{$vo.id}" type="checkbox"></td>
              <td >{$vo.id}</td>
              <td >{$vo.name}</td>
			  <td >{$vo.title}</td>
              <td ><a href="{:U("addrole",array("id"=>$vo['id'],"view_id"=>$vo['view_id']))}">修改</a>
              		|<a class="J_ajax_del" href="{:U("deleterole",array("id"=>$vo['id'],"isadmin"=>1))}">删除</a>
              </td>
            </tr>
          </volist>
	  </tbody>
      </table>
      <div class="p10">
        <div class="pages">  </div>
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
<script src="/statics/js/common.js?v"></script>
</body>
</html>
