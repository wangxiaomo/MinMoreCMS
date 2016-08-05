<template file="DirectorMail/Public/header.php"/>
<template file="DirectorMail/Public/mailbox.php"/>
  </div>
  <div class="content-fd">
  <div class="mailbox-list" style="margin-top:-80px;">
    <div class="content-hd">
      网上信访－信件查看
    </div>
  </div>
<br/>
    <table class="result-table">
      <tr>
        <td class="row-prompt">编号:</td><td class="row-content">C{$data.createtime|date="Ymd",###}{$data.id}</td><td class="row-prompt">来信人:</td><td class="row-content">{$data.name}</td>
      </tr>
      <tr>
        <td class="row-prompt">来信时间:</td><td class="row-content">{$data.createtime|date="Y-m-d h:i:s",###}</td><td class="row-prompt">受理单位:</td><td class="row-content">{$data.roleid}</td>
      </tr>
      <tr>
        <td class="row-prompt">信件类型:</td><td class="row-content">{$data.typeid}</td><td class="row-prompt">办事状态:</td><td class="row-content">{$data.zt}</td>
      </tr>
      <tr>
        <td class="row-prompt">领导单位:</td><td colspan="3">{$data.oname}</td>
      </tr>
      <tr>
        <td class="row-prompt">领导姓名:</td><td colspan="3">{$data.chief_name}</td>
      </tr>
      <tr>
      </tr>
      <tr class="large-table-row">
        <td class="row-prompt">来信主题:</td><td colspan="3">{$data.zhuti}</td>
      </tr>
      <tr class="large-table-row">
        <td class="row-prompt">来信内容:</td><td colspan="3">{$data.introduce}</td>
      </tr>
    </table>
    <p class="download-files">来信附件:<if condition=" $data['upload'] "><a href="{$data.upload}">显示附件</a><else/>&nbsp;没有附件</if></p>
    <table class="result-table">
      <tr>
        <td class="row-prompt">办理单位:</td><td class="row-content">{$data.roleid}</td><td class="row-prompt">办理时间:</td><td class="row-content"><if condition=" $data['replytime'] eq 0">暂无<else/>{$data.replytime|date="Y-m-d h:i:s",###}</if></td>
      </tr>
      <tr class="large-table-row">
        <td class="row-prompt">处理情况:</td><td colspan="3">{$data.reply}</td>
      </tr>
    </table>
  </div>
<div>
	<span>评价：</span>
	<input type="radio" name="evaluation" value="verysatisfied">非常满意&nbsp;&nbsp;&nbsp;
        <input type="radio" name="evaluation" value="satisfied">满意&nbsp;&nbsp;&nbsp;
        <input type="radio" name="evaluation" value="unsatisfy">不满意&nbsp;&nbsp;&nbsp;
	<input type="button" id="evaluate_submit" value="确定" class="submit-button">
</div>
</div>
<script>
$("#evaluate_submit").click(function () {
	var url="{:U('DirectorMail/Onlinepetition/evaluate')}";
        var rate = $("input[name='evaluation'][checked]").val();
        var evaluate_json= {
                mailid:{$data.id}
                , evaluation:rate 
            };
            $.post(url,evaluate_json, function (resp) {
                if (resp.state=== 'success') {
                    alert(resp.info);
                } else {
                    alert(resp.info);
                }
            }, 'json').error(function () {
                alert("网络连接错误，请稍后再试");
            });
});
</script>
<template file="DirectorMail/Public/footer.php"/>
