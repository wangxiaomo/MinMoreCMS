<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<script type="text/javascript">
 
</script>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
    <ul class="cc">
        <li class="current"><a href="http://alhelp.cn/index.php?g=Interview&m=Admin" >访谈列表信息</a></li>
      </ul>
</div>
  <form name="myform"  class="J_ajaxForm" action="http://alhelp.cn/index.php?g=Interview&m=Admin&a=deletemsg&isadmin=1" method="post" >
    <div class="table_list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td width="20" align="center"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
            <td width="50" align="center">ID</td>
			<td width="200px">访谈</td>
            <td width="100px">用户</td>
            <td width="200px">手机号</td>
            <td width="140px">开始时间</td>
			<td   >内容</td>
            <td width="240" align="center">操作</td>
          </tr>
        </thead>
        <tbody>
		<volist name="dataList" id="vo">
            <tr>
              <td align="center"><input class="checkbox J_check "  data-yid="J_check_y" data-xid="J_check_x"  name="ids[]" value="{$vo.id}" type="checkbox"></td>
              <td >{$vo.id}</td>
              <td >{$vo.title}</td>
			  <td >{$vo.username}</td>
              <td >{$vo.tel}</td>
			  <td >{$vo.create_time}</td>
			  <td >{$vo.info}</td>
              <td ><a class="J_ajax_del" href="{:U("deletemsg",array("id"=>$vo['id'],'isadmin'=>1))}">删除</a>
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
