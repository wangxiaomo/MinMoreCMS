<template file="DirectorMail/Public/header.php"/> 
<template file="DirectorMail/Public/mailbox.php"/> 
<template file="DirectorMail/Public/button.php"/>
</div>
<div clkss="content-fd">
  <div class="mailbox-list" style="margin-top:-80px;">
    <div class="content-hd">
      局长信箱－最新回复信件
    </div>
    <div class="mailbox-data-list">
      <table>
        <thead>
          <tr>
            <th>来信主题</th>
            <th>状态</th>
            <th>时间</th>
            <th>受理单位</th>
          </tr>
        </thead>
        <tbody>
            <volist name="dataList" id="vo">
            <tr>
              <td><a href="{:U('mail?mailid='.$vo['id'])}">{$vo.zhuti}</a></td>
              <if condition=" $vo['reply'] ">
              <td>已回复</td>
              <else /><td>未回复</td>
              </if>
              <td>{$vo.createtime|date="Y-m-d H:i:s",###}</td>
              <td>{$vo.roleid}</td>
            </tr>
            </volist>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
<template file="DirectorMail/Public/footer.php"/>
