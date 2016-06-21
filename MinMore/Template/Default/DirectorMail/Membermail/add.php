<template file="DirectorMail/Public/header.php"/>                               
<div class="content-bd">
  <div class="request-form">
    <div class="request-form-title">我要建议</div>
    <div class="request-form-box">
      <form method="POST">
        <div class="data-line">
          <span class="prompt">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;质：</span>
          <div>
            <label><input type="radio" name="type" value="咨询" />咨询</label>
            <label><input type="radio" name="type" value="投诉" />投诉</label>
            <label><input type="radio" name="type" value="举报" />举报</label>
            <label><input type="radio" name="type" value="建议" />建议</label>
          </div>
        </div>
        <div class="data-line">
          <span class="prompt">信件主题：</span>
          <div>
            <input type="text" name="zhuti" />
          </div>
        </div>
        <div class="data-line data-textarea">
          <span class="prompt">详细内容：</span>
          <div>
            <textarea name="introduce"></textarea>
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
