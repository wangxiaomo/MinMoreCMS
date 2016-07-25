<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<style>
.pop_nav{
	padding: 0px;
}
.pop_nav ul{
	border-bottom:1px solid #266AAE;
	padding:0 5px;
	height:25px;
	clear:both;
}
.pop_nav ul li.current a{
	border:1px solid #266AAE;
	border-bottom:0 none;
	color:#333;
	font-weight:700;
	background:#F3F3F3;
	position:relative;
	border-radius:2px;
	margin-bottom:-1px;
}

</style>
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <div class="pop_nav">
    <ul class="J_tabs_nav">
      <li class="current"><a href="javascript:;;">基本属性</a></li>
      <li class=""><a href="javascript:;;">扩展设置</a></li>
    </ul>
  </div>
  <form class="J_ajaxForm" name="myform" id="myform" action="{:U("Special/add")}" method="post">
    <div class="J_tabs_contents">
      <div>
        <div class="h_a">基本属性</div>
        <div class="table_full">
          <table width="100%" class="table_form ">
            <tr>
              <th width="200">专题名称：</th>
              <td><input type="text" name="special[title]" id="title" class="input" value=""></td>
            </tr>
            <tr>
              <th>专题横幅：</th>
              <td><Form function="images" parameter="special[banner],banner,'',special"/></td>
            </tr>
            <tr>
              <th>专题缩略图：</th>
              <td><Form function="images" parameter="special[thumb],thumb,'',special"/></td>
            </tr>
            <tr>
              <th>专题导读：</th>
              <td><textarea name="special[description]" maxlength="255" style="width:300px;height:60px;"></textarea></td>
            </tr>
            <tr>
              <th>生成静态：</th>
              <td><label><input type="radio" name="special[ishtml]" checked value="1"> 是</label><label><input type="radio" name="special[ishtml]" value="0"> 否</label></td>
            </tr>
            <tr>
              <th>专题生成目录：</th>
              <td><input type="text" name="special[filename]" id="filename" class="input" value=""><span class="gray"> 请输入专题页文件名，以便生成静态时使用，提交后不能修改！</span></td>
            </tr>
            <tr>
              <th>专题子分类：</th>
              <td><div class="cross" style="width:600px;">
						<ul id="J_ul_list_addItem" class="J_ul_list_public" >
                            <li>
								<span class="span_2" style="width:40px;">分类ID</span>
                                <span class="span_3">分类名称</span>
								<span class="span_3">分类路径</span>
                                <span class="span_3">排序</span>
							</li>
                            <li>
								<span class="span_2" style="width:40px;"></span>
                                <span class="span_3"><input name="type[0][name]" type="text" class="input length_2" value=""></span>
                                <span class="span_3"><input name="type[0][typedir]" type="text" class="input length_2" value=""></span>
								<span class="span_4"><input name="type[0][listorder]" type="text" class="input mr15 length_1"  value="0"></span>
							</li>
                        </ul>
                      </div>
                      <a href="" class="link_add Js_ul_list_add" data-related="addItem">添加分类</a>
                      </td>
            </tr>
          </table>
        </div>
      </div>
      <div style="display:none">
        <div class="h_a">扩展设置</div>
        <div class="table_full">
          <table width="100%" class="table_form ">
            <tr>
              <th width="200">专题模板：</th>
              <td><select name="special[index_template]" id="index_template">
                  <option value="index<?php echo C("TMPL_TEMPLATE_SUFFIX")?>" selected>默认专题首页模板：index<?php echo C("TMPL_TEMPLATE_SUFFIX")?></option>
                  <volist name="index_template" id="vo">
                    <option value="{$vo}">{$vo}</option>
                  </volist>
                </select>
                <span class="gray">新增模板以index_x<?php echo C("TMPL_TEMPLATE_SUFFIX")?>形式</span></td>
            </tr>
            <tr>
              <th>分类页模板：</th>
              <td><select name="special[list_template]" id="list_template">
                  <option value="list<?php echo C("TMPL_TEMPLATE_SUFFIX")?>" selected>默认专题分类模板：list<?php echo C("TMPL_TEMPLATE_SUFFIX")?></option>
                  <volist name="list_template" id="vo">
                    <option value="{$vo}">{$vo}</option>
                  </volist>
                </select>
                <span class="gray">新增模板以list_x<?php echo C("TMPL_TEMPLATE_SUFFIX")?>形式</span></td>
            </tr>
            <tr>
              <th>专题内容页模板：</th>
              <td><select name="special[show_template]" id="show_template">
                  <option value="show<?php echo C("TMPL_TEMPLATE_SUFFIX")?>" selected>默认专题分类模板：show<?php echo C("TMPL_TEMPLATE_SUFFIX")?></option>
                  <volist name="show_template" id="vo">
                    <option value="{$vo}">{$vo}</option>
                  </volist>
                </select>
                <span class="gray">新增模板以show_x<?php echo C("TMPL_TEMPLATE_SUFFIX")?>形式</span></td>
            </tr>
            <tr>
              <th>专题状态：</th>
              <td><label><input type="radio" name="special[disabled]" checked value="1"> 开放</label><label><input type="radio" name="special[disabled]" value="0"> 暂停</label></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="btn_wrap">
      <div class="btn_wrap_pd">
        <button class="btn btn_submit mr10 J_ajax_submit_btn " type="submit">提交</button>
      </div>
    </div>
  </form>
</div>
<script type="text/javascript" src="{$config_siteurl}statics/js/common.js?v"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/content_addtop.js"></script>
<script type="text/javascript">
var Js_ul_list_add = $('a.Js_ul_list_add');
var new_key = 0;
if (Js_ul_list_add.length) {
    //添加
    Js_ul_list_add.click(function (e) {
        e.preventDefault();
        new_key++;
        var $this = $(this);
		//添加分类
		var _li_html = '<li>\
								<span class="span_2" style="width:40px;"></span>\
                                <span class="span_3"><input name="type[' + new_key + '][name]" type="text" class="input length_2" value=""></span>\
                                <span class="span_3"><input name="type[' + new_key + '][typedir]" type="text" class="input length_2" value=""></span>\
								<span class="span_4"><input name="type[' + new_key + '][listorder]" type="text" class="input mr15 length_1"  value="0"><a href="#" class="J_ul_list_remove">[删除]</a></span>\
							</li>';
        //"new_"字符加上唯一的key值，_li_html 由列具体页面定义
        var $li_html = $(_li_html.replace(/new_/g, 'new_' + new_key));
        $('#J_ul_list_' + $this.data('related')).append($li_html);
        $li_html.find('input.input').first().focus();
    });

    //删除
    $('ul.J_ul_list_public').on('click', 'a.J_ul_list_remove', function (e) {
        e.preventDefault();
        $(this).parents('li').remove();
    });
}
</script>
</body>
</html>