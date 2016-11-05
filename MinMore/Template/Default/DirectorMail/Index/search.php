<template file="DirectorMail/Public/header.php"/> 
<template file="DirectorMail/Public/mailbox.php"/> 
<template file="DirectorMail/Public/button.php"/>
  </div>
  <div class="content-fd">
  <div class="mailbox-list" style="margin-top:-80px;">
    <div class="content-hd">
      局长信箱－信件查询
    </div>
  </div>
    <div class="querybox">
      <div class="right">
        <form method="post" action="{:U('DirectorMail/Index/search')}">
        <p>请输入手机号码<input type="tel" name="tel" /><i class="red">*</i></p>
        <p>请输入身份证号<input type="text" name="cardid" /><i class="red">*</i></p>
        <div class="form-button-groups">
        <p><button>查询</button></p>
        </div>
        </form>
      </div>
    </div>
    <div class="mailbox-list">
      <div class="mailbox-data-list">
        <table>
          <thead>
            <tr>
              <th>来信主题</th>
              <th>状态</th>
              <th>时间</th>
              <th>办理单位</th>
              <th>联系电话</th>
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
              <td>{$vo.shouji}</td>
            </tr>
            </volist>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<template file="DirectorMail/Public/footer.php"/>
