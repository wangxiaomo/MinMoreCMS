<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <if condition="$isSuperUser">
      <Admintemplate file="Common/Nav"/>
  </if>
  <div class="h_a">广告位列表</div>
  <form name="myform"  class="J_ajaxForm" action="{:U('delete','isadmin=1')}" method="post" >
  <div class="table_list">
    <table width="100%" cellspacing="0">
      <thead>
        <tr>
            <td width="20" align="center"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
          <td width="50" align="center">ID</td>
          <td width="180" align="center">广告主题</td>
          <td width="100" align="center">位置类型</td>
          <td width="180" align="center">状态</td>
          <td width="180" align="center">图片</td>
          <td width="180" align="center">链接地址</td>
          <td width="180" align="center">操作</td>
        </tr>
      </thead>
      <tbody>
        <volist name="data" id="vo">
          <tr>
              <td align="center"><input class="checkbox J_check "  data-yid="J_check_y" data-xid="J_check_x"  name="ids[]" value="{$vo.id}" type="checkbox"></td>
            <td align="center">{$vo.id}</td>
            <td>{$vo.topic}</td>
            <td align="center">
		    <switch name="vo.type">
		    <case value="1">
			<p>左侧固定</p>
		    </case>
		    <case value="2">
			<p>右侧固定</p>
		    </case>
		    <case value="3">
			<p>全屏浮动</p>
		    </case>
		    <default />
			<p>未知</p>
		    </switch>
            </td>
            <td align="center">
            <if condition="$vo.status eq 0">
		<p>
		<span style="color:grey">未启用</span>|<a class="J_ajax_update" href="{:U("operate", array('id'=>$vo['id'],'name'=>'status','op'=>'open'))}">开启</a>
		</p>
            <else />
		<p>
		<span style="color:green">已启用</span>|<a href="{:U('operate',array('id'=>$vo['id'],name=>'status','op'=>'close'))}">关闭</a>
		</p>
            </if>
            </td>
            <td align="center">
            <if condition="empty($vo['picture'])">
		<p>未添加图片</p>
            <else />
		<img src="{$vo.picture}" style="height:100px">
            </if>
            </td>
            <td align="center">
            <if condition="empty($vo['link'])">
		<p>未添加链接</p>
            <else/>
		<a href="{$vo.link}" target="_blank">{$vo.link}</a>
            </if>
            </td>
              <td align="center">
		<a class="J_ajax_del" href="{:U("delete",array("id"=>$vo['id'],'isadmin'=>1))}" style="color:red;">删除</a> 
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
  </div>
</form>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>
