<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <form class="J_ajaxForm" action="{:U('addmember','isadmin=1')}" method="post" id="myform">
    <div class="h_a">基本属性</div>
    <div class="table_full">
      <table width="100%" >
           <tr>
              <th width="200">手机号码：</th>
              <th><input type="text" name="tel" value="" class="input length_6"></th>
            </tr>
           <tr>
              <th width="200">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</th>
              <th><input type="password" name="pwd" value="" class="input length_6"></th>
            </tr>
           <tr>
              <th width="200">代表备注：</th>
              <th><input type="text" name="remarks" value="" class="input length_6"></th>
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
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>
