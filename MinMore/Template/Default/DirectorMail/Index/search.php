<template file="DirectorMail/Public/header.php"/> 
<template file="DirectorMail/Public/mailbox.php"/> 
<template file="DirectorMail/Public/button.php"/>
  </div>
  <div clkss="content-fd">
    <div class="querybox">
      <div class="left"><span>信件查询:</span></div>
      <div class="right">
        <form method="post" action="{:U('DirectorMail/Index/search')}">
        <p>请输入手机号码<input type="tel" name="tel" /><i class="red">*</i></p>
        <p>请输入信件编号<input type="text" name="code" /><i class="red">*</i><input type="submit" style="border:none; background:#fff; cursor:pointer;outline:none;" value="[提交搜索]"></p>
        </form>
      </div>
    </div>
    <div class="mailbox-list">
      <div class="content-hd">
        我的信件
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
