<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<div class="user_copyright"> <a href="http://www.minmore.com" target="_blank">www.minmore.com</a> 版权所有，保留一切权利！ © 2016 MinMoreCMS 驱动  执行时间：{:G('run', 'end')}s</div>
<script type="text/javascript" src="{$model_extresdir}js/jquery.artDialog.min.js"></script>
<script type="text/javascript">
	//监听消息
	listenMsg.start();
	//用户导航
	nav.userMenu();
	nav.init();
</script>  
