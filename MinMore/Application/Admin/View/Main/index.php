<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
  <div id="home_toptip"></div>
  <h2 class="h_a">系统信息</h2>
  <div class="home_info">
    <ul>
      <volist name="server_info" id="vo">
        <li> <em>{$key}</em> <span>{$vo}</span> </li>
      </volist>
    </ul>
  </div>
  <h2 class="h_a">开发团队</h2>
  <div class="home_info" id="home_devteam">
    <ul>
      <li> <em>版权所有</em> <span><a href="#" target="_blank">四川广安公安局与四川速集实业集团有限公司联合开发</a></span> </li>
      <li> <em>开发负责人</em> <span>林之栋</span> </li>
      <li> <em>联系方式</em> <span>13981918328 971596713@qq.com</span> </li>
    </ul>
  </div>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script> 
</body>
</html>
