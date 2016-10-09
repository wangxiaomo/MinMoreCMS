<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
  <div id="home_toptip"></div>
  <h2 class="h_a">待处理业务</h2>
  <div class="home_info">
    <ul>
      <volist name="todo_list" id="vo">
        <li>
	   	<em>{$key}:</em>
			<if condition="$vo['count'] neq 0">
			<a href="{$vo['link']}" target="_blank">(<h style="color:red">{$vo['count']}</h>件待处理) 立即处理>></a> 
			<else/>
			暂无待处理
			</if>
		</li>
      </volist>
    </ul>
  </div>
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
      <li> <em>开发负责人</em> <span>任克</span> </li>
      <li> <em>联系方式</em> <span>13808085678</span> </li>
    </ul>
  </div>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script> 
</body>
</html>
