<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<link rel="stylesheet" type="text/css" href="__ROOT__/statics/vendor/webuploader/webuploader.css">
<script type="text/javascript" src="__ROOT__/statics/vendor/webuploader/webuploader.js"></script>

<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <form class="J_ajaxForm" action="{:U('editeinfo')}" method="post" id="myform">
    <div class="h_a">添加文字实录信息</div>
    <div class="table_full">
      <table width="100%" >
           <tr>
           	  <input type="hidden" name="id" value="{$view.id}" />
              <th width="200">访谈标题：</th>
              <th><input type="text"  value="{$obj.title}" class="input length_6" readonly="readonly"></th>
            </tr>
            <tr>
              <th width="200">实录标题：</th>
              <th><input type="text" name="title" value="{$view.title}" class="input length_6" ></th>
            </tr>
             <tr>
              <th width="200">主持人：</th>
              <th><input type="text" name="master" value="{$view.master}" class="input length_6"  ></th>
            </tr>
            <tr>
              <th width="200">文字实录(简介)：</th>
              <th>
              <textarea name="summary" style="width:40%;; height:150px;">{$view.summary}</textarea> 
              </th>
            </tr>
            
            <tr>
              <th width="200">文字实录(简介)：</th>
              <th>
              <textarea id="content" name="info" style="width:70%;">{$view.info}</textarea> 
              </th>
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

<script type="text/javascript">
                //编辑器路径定义
                var editorURL = GV.DIMAUB;
                </script>
                <script type="text/javascript"  src="__ROOT__/statics/js/ueditor/editor_config.js"></script>
                <script type="text/javascript"  src="__ROOT__/statics/js/ueditor/editor_all_min.js"></script>
<script type="text/javascript">
 var editorcontent = UE.getEditor('content',{  
                            textarea:'content',
                            toolbars:[[
            'fullscreen', 'source', '|', 'undo', 'redo', '|',
            'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
            'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
            'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
            'directionalityltr', 'directionalityrtl', 'indent', '|',
            'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
            'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
            'simpleupload', 'insertimage', 'emotion', 'scrawl', 'insertvideo', 'music', 'attachment', 'map', 'gmap', 'insertframe', 'insertcode', 'webapp', 'pagebreak', 'template', 'background', '|',
            'horizontal', 'date', 'time', 'spechars', 'snapscreen', 'wordimage', '|',
            'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
            'print', 'preview', 'searchreplace', 'help', 'drafts'
        ]],
                            autoHeightEnabled:false
                      });
                      editorcontent.ready(function(){
                            editorcontent.execCommand('serverparam', {
                                  'catid': '36',
                                  '_https':'/',
                                  'isadmin':'1',
                                  'module':'contents',
                                  'uid':'1',
                                  'groupid':'0',
                                  'sessid':'1469374661',
                                  'authkey':'1bc0c1a3e6dc2a363c6b9320e9ab6f76',
                                  'allowupload':'1',
                                  'allowbrowser':'1',
                                  'alowuploadexts':''
                             });
                             editorcontent.setHeight(400);
                      });
                      
</script>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>
