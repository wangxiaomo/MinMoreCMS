<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
  <Admintemplate file="Common/Nav"/>
  <table class="table table-hover">
    <thead class="table-head">
      <th>#</th>
      <th>站点等级</th>
      <th>站点角色</th>
      <th>站点域名</th>
      <th>模板选择</th>
      <th>描述</th>
      <th>操作</th>
    </thead>
    <tbody>
      <volist name="data" id="v">
        <tr data-id="{$v.id}">
          <td>{$v.id}</td>
          <td>{$v.level}</td>
          <td class="red-font">{$v.name}</td>
          <td><input type="text" value="{$v.domain}" style="width:200px;"></td>
          <td>
            <select style="width:250px;">
              <option value=""></option>
              <volist name="v['theme_list']" id="theme">
                <if condition="$theme eq $v['theme']">
                  <option value="{$theme}" selected>{$theme}</option>
                <else />
                  <option value="{$theme}">{$theme}</option>
                </if>
              </volist>
            </select>
          </td>
          <td>{$v.remark}</td>
          <td><button type="button" class="btn admin-button update-site-domain">修改</button></td>
        </tr>
      </volist>
    </tbody>
  </table>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script> 
<script>
$(function(){
  $(".update-site-domain").on("click", function(e){
    e.preventDefault();
    var tr = $(this).closest("tr"),
        id = $(tr).data("id"),
        input = $(tr).find("input"),
        domain = $.trim($(input).val()),
        select = $(tr).find("select"),
        theme = $(select).val();
    $.post("{:U('Admin/Site/domain_management')}", {id:id,domain:domain,theme:theme}, function(d){
        console.log(d);
        if(d.r == 1){
            alert("修改成功!");
        }else{
            alert("请确认数据!");
        }
    });
  });
});
</script>
</body>
</html>
