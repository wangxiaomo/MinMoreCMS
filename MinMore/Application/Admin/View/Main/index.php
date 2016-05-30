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
      <li> <em>版权所有</em> <span><a href="http://www.minmore.com" target="_blank">http://www.minmore.com/</a></span> </li>
      <li> <em>负责人</em> <span>王小默</span> </li>
      <li> <em>联系邮箱</em> <span>codevvip@yeah.net</span> </li>
    </ul>
  </div>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script> 
</body>
</html>
