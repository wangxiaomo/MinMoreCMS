<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<script type="text/javascript">
	function openmsg(id,op){
		$.post("{:U('Admin/changeop')}",{id:id,op:op},function(data){
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
  <div class="nav">
    <ul class="cc">
        <li class="current"><a href="{:U('index')}">访谈列表信息</a></li>
      </ul>
</div>
  <form name="myform"  class="J_ajaxForm" action="http://alhelp.cn/index.php?g=DirectorMail&m=Admin&a=delete&isadmin=1" method="post" >
    <div class="table_list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td width="20" align="center"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
            <td width="50" align="center">ID</td>
            <td >标题</td>
            <td  width="200">封面</td>
            <td  width="140">开始时间</td>
			<td  width="140">是否开启</td>
			<td  width="140">留言条数</td>
			<td  width="140">是否开启留言</td>
            <td width="240" align="center">操作</td>
          </tr>
        </thead>
        <tbody>
		<volist name="dataList" id="vo">
            <tr>
              <td align="center"><input class="checkbox J_check "  data-yid="J_check_y" data-xid="J_check_x"  name="ids[]" value="{$vo.id}" type="checkbox"></td>
              <td >{$vo.id}</td>
              <td >{$vo.title}</td>
              <td ><img src="{$vo.banner}" style="height:100px;" /></td>
			  <td >{$vo.start_time}</td>
			  <td >{$vo.is_open}</td>
			  <td >{$vo.msgtotal}条/<a href="{:U("msginfo",array("id"=>$vo['id']))}">管理</a></td>
			  <td >
			 	 <if condition="$vo.is_open_msg neq on">
					<a href="javascript:openmsg('{$vo[id]}','on')">开启</a>
				 <else />
				 	<a href="javascript:openmsg('{$vo[id]}','off')">关闭</a>
				 </if>
			  </td>
              <td ><a class="J_ajax_del" href="{:U("delete",array("id"=>$vo['id'],'isadmin'=>1))}">删除</a>
              		|<a href="{:U("addinterview",array("id"=>$vo['id']))}">修改</a>
              		|<if condition="$vo.is_have neq true">
              			<a href="{:U("addinfo",array("id"=>$vo['id']))}">添加实录</a>
						<else />
						<a href="{:U("editeinfo",array("id"=>$vo['id']))}">修改实录</a>
					 </if>
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
