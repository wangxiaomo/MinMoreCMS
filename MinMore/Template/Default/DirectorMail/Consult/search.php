<template file="DirectorMail/Public/header.php"/> 
<template file="DirectorMail/Public/mailbox.php"/> 
<template file="DirectorMail/Public/button.php"/>
  </div>
  <div clkss="content-fd">
  <div class="mailbox-list" style="margin-top:-80px;">
    <div class="content-hd">
      {$headicon}-我的信件
    </div>
  </div>
    <div class="querybox">
      <div class="right">
        <form method="post" action="{:U('DirectorMail/Consult/search', array('type'=>$flag))}">
        <p>手机号码<input type="tel" name="sjhm" /><i class="red">*</i></p>
        <p>查询密码<input type="text" name="cxmm" /><i class="red">*</i></p>
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
              <th>受理单位</th>
            </tr>
          </thead>
          <tbody>
            <volist name="dataList" id="vo">
            <tr>
              <td><a href="{:U('mail', array('mailid'=>$vo['id'],'type'=>$flag))}">{$vo.xjzt}</a></td>
              <if condition=" $vo['hfnr'] ">
              <td>已回复</td>
              <else /><td>未回复</td>
              </if>
              <td>{$vo.tjsj|date="Y-m-d H:i:s",###}</td>
              <td>{$vo.sljg}</td>
            </tr>
            </volist>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<template file="DirectorMail/Public/footer.php"/>
