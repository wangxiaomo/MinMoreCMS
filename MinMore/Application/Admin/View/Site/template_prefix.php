<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
  <Admintemplate file="Common/Nav"/>
  <table class="table table-hover">
    <thead class="table-head">
      <th>#</th>
      <th>角色等级</th>
      <th>模板前缀</th>
      <th>操作</th>
    </thead>
    <tbody>
      <foreach name="levels" item="v">
        <tr data-id="{$v.id}">
          <td>{$v.id}</td>
          <td>{$v.name}</td>
          <td><input type="text" value="{$v.template_prefix}" /></td>
          <td><button type="button" class="btn admin-button update-template-prefix">修改</button></td>
        </tr>
      </foreach>
    </tbody>
  </table>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script> 
<script>
$(function(){
  $(".update-template-prefix").on("click", function(e){
    e.preventDefault();
    var tr = $(this).closest("tr"),
        id = $(tr).data("id"),
        input = $(tr).find("input"),
        prefix = $.trim($(input).val());
    $.post("{:U('Admin/Site/template_prefix')}", {id:id,prefix:prefix}, function(d){
      alert("修改成功!");
    });
  });
});
</script>
</body>
</html>
