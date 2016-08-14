<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <form name="query"  class="J_ajaxForm" action="{:U('index','isadmin=1')}" method="post">
	<div style="margin:10px">
	<span>查询关键词:</span>	<input name="keyword" placeholder="姓名，主题"></input>
	<button type="submit" class="btn btn_submit" >查询</button> 
	</div>
  </form>
  <form name="myform"  class="J_ajaxForm" action="{:U('delete','isadmin=1')}" method="post" >
    <div class="table_list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td width="20" align="center"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
            <td width="50" align="center">ID</td>
            <td width="100" align="center">代表委员</td>
            <td width="180" align="center">主题</td>
            <td width="150" align="center">来信时间</td>
            <td width="150" align="center">
            状态：<select name="searchtype" onChange="window.location.href=this.value">
            <option value="{:U('index' ,array('isadmin'=>1,'type'=>$type)  )}">全部</option>
            <option value="{:U('index' ,array('isadmin'=>1,'status'=>0,'type'=>$type) )}"<if condition="$status eq '0'">selected</if>>未回复</option>
            <option value="{:U('index' ,array('isadmin'=>1,'status'=>1,'type'=>$type) )}"<if condition="$status eq '1'">selected</if>>已回复</option>
           </select>
            </td>
            <td width="180" align="center">操作</td>
          </tr>
        </thead>
        <tbody>
          <volist name="data" id="vo">
            <tr>
              <td align="center"><input class="checkbox J_check "  data-yid="J_check_y" data-xid="J_check_x"  name="ids[]" value="{$vo.id}" type="checkbox"></td>
              <td align="center">{$vo.id}</td>
              <td align="center">{$vo.username}</td>
              <td align="center">{$vo.zhuti|str_cut=###,20}</td>
              <td align="center">{$vo.createtime|date="Y-m-d H:i:s",###}</td>
              <td align="center">
		<if condition="$vo.reply eq ''">
			<p style="color:grey">未回复</p>
		<else/>
			<p style="color:blue">已回复({$vo.replytime|date="Y-m-d",###})</p>
		</if>
	      </td>
              <td align="center">
		<a class="J_ajax_del" href="{:U("delete",array("id"=>$vo['id'],'isadmin'=>1))}">删除</a>
		| <a href="{:U("reply",array("id"=>$vo['id'],'isadmin'=>1))}">回复</a>
		| <a href="{:U("reply",array("id"=>$vo['id'],'isadmin'=>1))}">详情>></a>
		</td>
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
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>
