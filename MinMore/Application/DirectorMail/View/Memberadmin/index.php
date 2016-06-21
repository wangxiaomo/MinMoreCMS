<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <form name="myform"  class="J_ajaxForm" action="{:U('delete','isadmin=1')}" method="post" >
    <div class="table_list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td width="20" align="center"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
            <td width="50" align="center">ID</td>
            <td width="180" align="center">代表委员</td>
            <td width="180" align="center">信件内容</td>
            <td width="180" align="center">
            类别：<select name="searchtype" onChange="window.location.href=this.value">
            <option value="{:U('index', array('type'=>'全部'))}" >全部</option>
            <option value="{:U('index', array('type'=>'建议'))}" <if condition=" $type eq '建议'">selected</if>>建议</option>
            <option value="{:U('index', array('type'=>'举报'))}" <if condition=" $type eq '举报'">selected</if>>举报</option>
            <option value="{:U('index', array('type'=>'投诉'))}" <if condition=" $type eq '投诉'">selected</if>>投诉</option>
            <option value="{:U('index', array('type'=>'咨询'))}" <if condition=" $type eq '咨询'">selected</if>>咨询</option>
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
              <td align="center">{$vo.uid}</td>
              <td >主题：{$vo.zhuti}
              <br/>信件内容：<br/>
              {$vo.introduce}
              <br/>来信时间：{$vo.createtime|date="Y-m-d H:i:s",###}
              <if condition=" $vo['reply'] ">
              <br/>
              <p><span style="background:#25547E;color:white"> 管理员回复：{$vo.reply}</span></p>
              </if>
              </td>
              <td align="center">{$vo['type']}</td>
              <td align="center"><a class="J_ajax_del" href="{:U("delete",array("id"=>$vo['id'],'isadmin'=>1))}">删除</a> | <a href="{:U("reply",array("id"=>$vo['id'],'isadmin'=>1))}">回复</a></td>
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
