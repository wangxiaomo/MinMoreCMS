<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
<div class="h_a">说明</div>
<form class="J_ajaxForm" action="{:U('quickreply','isadmin=1')}" method="post">
  <div class="table_list">
    <table width="100%" cellspacing="0">
      <thead>
        <tr>
          <td width="80" align="left">选择</td>
          <td  align="left">快捷回复</td>
        </tr>
      </thead>
      <tbody>
        <volist name="data" id="vo">
          <tr>
            <td><input class="input-text" type="checkbox" name="id[]" value="{$vo.id}" ></td>
            <td><textarea name="quickreply[{$vo.id}]" style="width:600px; height:50px;">{$vo.quickreply}</textarea> <a href="{:U('deletequickreply','isadmin=1&id='.$vo['id'])}" class="J_ajax_del">删除快捷回复</a></td>
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
