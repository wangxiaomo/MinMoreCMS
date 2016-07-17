<template file="DirectorMail/Public/header.php"/>
<template file="DirectorMail/Public/mailbox.php"/>
  </div>
  <div class="content-fd">
  <div class="mailbox-list" style="margin-top:-80px;">
  </div>
<br/>
    <p class="download-files row-title">信件内容</p>
    <table class="result-table">
      <tr>
        <td class="row-content">信件编号：WSZX{$data.tjsj|date="Ymd",###}{$data.id}</td><td class="row-content">咨询标题：{$data.xjzt}</td><td class="row-content">业务类别：{$data.ywlb}</td>
      </tr>
      <tr class="large-table-row">
        <td class="row-prompt">咨询内容</td><td colspan="3">{$data.xxnr}</td>
      </tr>
    </table>
    <p class="download-files row-title">咨询人信息</p>
    <table class="result-table">
      <tr>
        <td class="row-content">姓名：{$data.xm}</td><td class="row-content">手机号码：{$data.sjhm}</td>
      </tr>
      <tr>
        <td class="row-content">性别：{$data.xb}</td><td class="row-content">Email：{$data.yxdz}</td>
      </tr>
    </table>
    <p class="download-files row-title">回复内容</p>
    <table class="result-table">
      <tr>
        <td class="row-content">回复状态：<if condition=" $data['hfnr'] ">已回复<else />未回复</if></td><td class="row-content">回复单位：{$data.hfdw}</td><td class="row-content">回复时间：{$data.hfsj|date="Y-m-d H:i",###}</td>
      </tr>
      <tr class="large-table-row">
        <td class="row-prompt">回复内容</td><td colspan="3">{$data.hfnr}</td>
      </tr>
    </table>
  </div>
</div>
<template file="DirectorMail/Public/footer.php"/>
