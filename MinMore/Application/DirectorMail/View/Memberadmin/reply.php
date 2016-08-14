<Admintemplate file="Common/Head"/>
<script>
    function qreply(val) {
        if (val != '')
            reply = document.getElementById('reply');
            reply.value = val;
    }
</script>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <div class="h_a">回复评论</div>
  <form name="myform" action="{:U("reply","isadmin=1")}" method="post" class="J_ajaxForm">
    <input type="hidden" name="id" value="{$info.id}">
    <div class="table_full"> 
    <table width="100%" class="table_form contentWrap">
        <tbody>
        <tr>
          <th width="100">代表委员信息</th>
          <td>{$info.usermsg}</td>
        </tr>
        <tr>
          <th>信件内容</th>
          <td>{$info.introduce}</td>
        </tr>
        <tr>
          <th>快捷回复</th>
          <td> 
            <select name="quickreply" style="width:600px" onchange="qreply(this.value)">
              <option value="" selected="true">不使用快捷回复</option>
              <volist name="quickreply" id="vo">
              <option value="{$vo}">{$vo}</option>
              </volist>
            </select>
          </td>
        </tr>
        <tr>
          <th>回复时间</th>
          <td>
		<if condition="$info.reply NEQ ''">
		{$info.replytime|date="Y-m-d H:i:s",###}
		<else/>
		<p>暂无</p>
		</if>
	</td>
        </tr>
        <tr>
          <th>回复内容</th>
          <td><textarea name="reply" style="width:600px; height:200px;" id="reply">{$info.reply}</textarea></td>
        </tr>
      </tbody></table>
    </div>
     <div class="btn_wrap" style="z-index:999;">
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">回复</button>
      </div>
    </div>
  </form>
</div>
</body>
</html>
