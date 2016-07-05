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
					<p>警方提醒</p><a href="">更多</a>
				</div>
				<div class="aside-bd aside-news">
					<ul>
						<li><a href="">枣山派出所校园警务室聘请分局....</a></li>
						<li><a href="">枣山派出所校园警务室聘请分局....</a></li>
						<li><a href="">枣山派出所校园警务室聘请分局....</a></li>
						<li><a href="">枣山派出所校园警务室聘请分局....</a></li>
						<li><a href="">枣山派出所校园警务室聘请分局....</a></li>
						<li><a href="">枣山派出所校园警务室聘请分局....</a></li>
						<li><a href="">枣山派出所校园警务室聘请分局....</a></li>
						<li><a href="">枣山派出所校园警务室聘请分局....</a></li>
						<li><a href="">枣山派出所校园警务室聘请分局....</a></li>
						<li><a href="">枣山派出所校园警务室聘请分局....</a></li>
					</ul>
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
				您所在的位置：<a href="">首页</a>><a href="">社区简介</a>
			</div>
			<div class="con-bd">
                <p style="text-align:center;"><img src="{$config_siteurl}statics/themes/L4_Global/images/slider.png" style="text-align:center;"></p>
				<p>    枣山派出所校园警务室成立于1997年，现有警力32人，其中班子成员5人，所有人员按三队一室配置，下设6个警务组。钢都派出所管理区位于辽宁重镇镁都大石桥市城区东部中心地段（石桥大街48号），地处城乡结合部，辖区地域面积达16.8平方公里，辖区含8个社区、8个行政村，实际居住人口超10万人。
    近年来，我警务室在局党组的正确领导下，在上级业务部门的大力指导和帮助下，在上级业务部门的大量的人力物力，取得了初步性建设成果。相信在派出所领导的正确领导和指挥下，钢都分局的各项业务会完成的更加出色，更好的实现为人民服务的宗旨。</p>
			</div>
		</div>
	</div>
    <template file="Content/Mods/footer.php" />
	<script type="text/javascript" src="{$config_siteurl}statics/js/jquery.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/themes/L4_Global/js/core.js"></script>
</body>
</html>
