<template file="DirectorMail/Public/header.php"/>
  <div class="content-fd">
    <table class="result-table">
      <tr>
        <td class="row-prompt">编号:</td><td class="row-content">C{$data.createtime|date="Ymd",###}{$data.id}</td><td class="row-prompt">来信人:</td><td class="row-content">{$data.tel}</td>
      </tr>
      <tr>
        <td class="row-prompt">来信时间:</td><td class="row-content">{$data.createtime|date="Y-m-d h:i:s",###}</td><td class="row-prompt">受理单位:</td><td class="row-content">{$data.roleid}</td>
      </tr>
      <tr>
        <td class="row-prompt">信件类型:</td><td class="row-content">{$data.type}</td><td class="row-prompt">办事状态:</td><td class="row-content">{$data.zt}</td>
      </tr>
      <tr class="large-table-row">
        <td class="row-prompt">来信主题:</td><td colspan="3">{$data.zhuti}</td>
      </tr>
      <tr class="large-table-row">
        <td class="row-prompt">来信内容:</td><td colspan="3">{$data.introduce}</td>
      </tr>
    </table>
    <table class="result-table">
      <tr>
        <td class="row-prompt">办理单位:</td><td class="row-content">{$data.roleid}</td><td class="row-prompt">办理时间:</td><td class="row-content"><if condition=" $data['replytime'] eq 0">暂无<else/>{$data.replytime|date="Y-m-d h:i:s",###}</if></td>
      </tr>
      <tr class="large-table-row">
        <td class="row-prompt">处理情况:</td><td colspan="3">{$data.reply}</td>
      </tr>
    </table>
  </div>
</div>
<template file="DirectorMail/Public/footer.php"/>
