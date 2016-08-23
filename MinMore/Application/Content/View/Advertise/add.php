<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <if condition="$isSuperUser">
      <Admintemplate file="Common/Nav"/>
  </if>
  <div class="h_a">广告位编辑</div>
  <form name="myform" enctype="multipart/form-data" action="{:U("add")}" method="post" class="J_ajaxForm">
  <div class="table_full"> 
  <table width="100%" class="table_form contentWrap">
        <tr>
          <th  width="80">主题</th>
          <td><input type="text" name="topic"/></td>
        </tr>
        <tr>
          <th>类型</th>
          <td>
		<input type="radio" name="type" value="1">左侧固定</input>
		<input type="radio" name="type" value="2">右侧固定</input>
		<input type="radio" name="type" value="3">全屏浮动</input>
	</td>
        </tr>
        <tr>
          <th>是否启用</th>
          <td>
		<input type="radio" name="status" value="0">不启用</input>
		<input type="radio" name="status" value="1">启用</input>
	</td>
        </tr>
        <tr>
          <th>图片</th>
          <td>
		<input type="file" name="picture"/>
	</td>
        </tr>
        <tr>
          <th  width="80">链接地址</th>
          <td><input type="text" name="link"/></td>
        </tr>
      </table>
  </div>
  <div class="">
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
      </div>
    </div>
  </form>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script>
</body>
</html>
