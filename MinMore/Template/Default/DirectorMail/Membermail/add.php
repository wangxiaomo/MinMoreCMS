<template file="DirectorMail/Public/header.php"/>                               
<div class="content-bd">
  <div class="request-form">
    <div class="request-form-title">建言献策</div>
    <div class="request-form-box">
      <form method="POST">
        <div class="data-line">
          <span class="prompt" style="height:25px;line-height:25px;">信件主题：</span>
          <div>
            <input type="text" name="zhuti" style="height:25px;width:400px;"/>
          </div>
        </div>
        <div class="data-line data-textarea" style="margin-top:20px;">
          <span class="prompt" style="height:25px;line-height:25px;">详细内容：</span>
          <div>
            <textarea name="introduce" style="width:400px;height:250px;"></textarea>
          </div>
        </div>
        <div class="form-button-groups">
          <button>提交</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="content-fd">
  <div class="mailbox-list">
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
