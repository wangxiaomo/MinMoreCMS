<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
<Admintemplate file="Common/Nav"/>
  <form name="query"  class="J_ajaxForm" action="{:U('member','isadmin=1')}" method="post">
	<div style="margin:10px">
	<span>查询关键词:</span>	<input name="keyword" placeholder="姓名，手机号"></input>
	<button type="submit" class="btn btn_submit" >查询</button> 
	</div>
  </form>
<div class="h_a">说明</div>
<form class="J_ajaxForm" action="{:U('member','isadmin=1')}" method="post">
  <div class="table_list">
    <table width="100%" cellspacing="0">
      <thead>
        <tr>
          <td width="80" align="left">选择</td>
          <td  align="left">手机号码</td>
          <td  align="left">姓名</td>
          
        </tr>
      </thead>
      <tbody>
        <volist name="data" id="vo">
          <tr>
            <td><input class="input-text" type="checkbox" name="uid[]" value="{$vo.uid}" ></td>
            <td><input type="text" class="input" size="30" name="mobile[{$vo.uid}]" value="{$vo.mobile}" ></td>
            <td><input type="text" class="input" size="30" name="username[{$vo.uid}]" value="{$vo.username}" > <a href="{:U('deletemember','isadmin=1:&uid='.$vo['uid'])}" class="J_ajax_del">删除代表委员</a></td>
          </tr>
        </volist>
      </tbody>
    </table>
  </div>
  <div class="">
    <div class="btn_wrap_pd">
      <button class="btn btn_submit mr10 J_ajax_submit_btn1" type="submit">更新</button>
    </div>
  </div>
</form>
<div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>
