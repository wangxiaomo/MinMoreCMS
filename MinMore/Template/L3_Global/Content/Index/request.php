<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="favicon.ico" rel="shortcut icon" />
    <link rel="canonical" href="{$config_siteurl}" />
    <title><if condition=" isset($SEO['title']) && !empty($SEO['title']) ">{$SEO['title']}</if>{$SEO['site_title']}</title>
    <meta name="description" content="{$SEO['description']}" />
    <meta name="keywords" content="{$SEO['keyword']}" />
	<link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/themes/L4_Global/css/style.css">
</head>
<body>
    <template file="Content/Mods/header.php" />
	<div id="main" class="wrap">
		<div id="aside">
			<div class="aside-wrap">
				<div class="aside-hd">
					<p>社区介绍</p><a href="">更多</a>
				</div>
				<div class="aside-bd aside-con">
					<img src="{$config_siteurl}statics/themes/L4_Global/images/img.png">
					<p>枣山派出所校园警务室成立于1997年，现有警力32人，其中班子成员5人，所有人员按三队一室配置，下设6个警务组。钢都派出所管理区位于辽宁重镇镁都大石桥市城区。东部中心地段（石桥大街48号），地处城乡结合部，辖区地域面积达16.8平方公里，辖区含8个社区、8个行政村，实际居住人口超10万人。</p>
				</div>
			</div>
			<div class="links">
				<a href=""><img src="{$config_siteurl}statics/themes/L4_Global/images/ll1.png"></a>
				<a href=""><img src="{$config_siteurl}statics/themes/L4_Global/images/ll2.png"></a>
				<a href=""><img src="{$config_siteurl}statics/themes/L4_Global/images/ll3.png"></a>
				<a href=""><img src="{$config_siteurl}statics/themes/L4_Global/images/ll4.png"></a>
			</div>			
		</div>
		<div id="content">
			<div class="con-hd">
				您所在的位置：<a href="">首页</a>><a href="">线索举报</a>
			</div>
			<div class="con-bd">
				<div class="report">
					<form>
						<h3>请填写您的<b>个人信息：</b></h3>
						<p><label>姓<b style="visibility:hidden;">用户</b>名：</label><input type="text" class="info"><span>*</span></p>
						<p><label>邮政编码：</label><input type="text" class="info"></p>
						<p><label>联系地址：</label><input type="text" class="info"></p>
						<p><label>联系电话：</label><input type="text" class="info"></p>
						<p><label>邮箱地址：</label><input type="text" class="info"></p>
						<h3 style="margin-bottom: 15px;">请填写您的<b>申报信息：</b></h3>
						<p><label>信件标题：</label><input type="text" id="form-title"><span>*</span></p>
						<p><label style="vertical-align: top;">信件内容：</label><textarea id="form-con"></textarea><span>*</span></p>
						<p class="file-wrap"><label>线索上传：</label><input type="file" class="file"><span>*附件大小不能大于2M</span></p>
						<p><label>是否公开：</label>
							<em><input type="radio" checked="checked" class="radio" name="public">公开</em>
							<em class="private"><input type="radio" class="radio" checked="" name="public">不公开</em></p>
						<p class="v-code-wrap"><label><b style="visibility:hidden;">图</b>验证码：</label><input type="text"><span>*</span><img id="v-code" src="{$config_siteurl}statics/themes/L4_Global/images/code.png"></p>
						<p class="btns"><button>确定</button><button>取消</button><button>来访选登</button></p>
					</form>
				</div>
			</div>
		</div>
	</div>
    <template file="Content/Mods/footer.php" />
	<script type="text/javascript" src="{$config_siteurl}statics/js/jquery.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/themes/L4_Global/js/core.js"></script>
</body>
</html>
