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
				<b>便民服务</b>
			</div>
			<div class="con-bd link">
				<div class="icons">
					<ul>
						<li><a href=""><img src="{$config_siteurl}statics/themes/L4_Global/images/i1.png"><p>开锁信息查询</p></a></li>
						<li><a href=""><img src="{$config_siteurl}statics/themes/L4_Global/images/i2.png"><p>不跑腿33项</p></a></li>
						<li><a href=""><img src="{$config_siteurl}statics/themes/L4_Global/images/i3.png"><p>便民举措</p></a></li>
						<li><a href=""><img src="{$config_siteurl}statics/themes/L4_Global/images/i4.png"><p>公开电话</p></a></li>
						<li><a href=""><img src="{$config_siteurl}statics/themes/L4_Global/images/i5.png"><p>18个不该由公安机关出具的证明</p></a></li>
						<li><a href=""><img src="{$config_siteurl}statics/themes/L4_Global/images/i6.png"><p>邮编区号</p></a></li>
						<li><a href=""><img src="{$config_siteurl}statics/themes/L4_Global/images/i7.png"><p>常用电话</p></a></li>
						<li><a href=""><img src="{$config_siteurl}statics/themes/L4_Global/images/i8.png"><p>天气查询</p></a></li>
						<li><a href=""><img src="{$config_siteurl}statics/themes/L4_Global/images/i9.png"><p>IP查询</p></a></li>
						<li><a href=""><img src="{$config_siteurl}statics/themes/L4_Global/images/i10.png"><p>政府导航</p></a></li>
						<li><a href=""><img src="{$config_siteurl}statics/themes/L4_Global/images/i11.png"><p>航班信息</p></a></li>
						<li><a href=""><img src="{$config_siteurl}statics/themes/L4_Global/images/i12.png"><p>EMS查询</p></a></li>
						<li><a href=""><img src="{$config_siteurl}statics/themes/L4_Global/images/i13.png"><p>公交线路</p></a></li>
						<li><a href=""><img src="{$config_siteurl}statics/themes/L4_Global/images/i14.png"><p>列车时刻</p></a></li>
						<li><a href=""><img src="{$config_siteurl}statics/themes/L4_Global/images/i15.png"><p>万年历</p></a></li>
						<li><a href=""><img src="{$config_siteurl}statics/themes/L4_Global/images/i16.png"><p>行政区域</p></a></li>
						<li><a href=""><img src="{$config_siteurl}statics/themes/L4_Global/images/i17.png"><p>社保查询</p></a></li>
						<li><a href=""><img src="{$config_siteurl}statics/themes/L4_Global/images/i18.png"><p>电视节目</p></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
    <template file="Content/Mods/footer.php" />
	<script type="text/javascript" src="{$config_siteurl}statics/js/jquery.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/themes/L4_Global/js/core.js"></script>
</body>
</html>
