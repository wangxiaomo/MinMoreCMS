<link rel="stylesheet" href="{$model_extresdir}css/int.css" />
<template file="DirectorMail/Public/header.php"/>
 
<div class="content-fd">
	<div class="int-right">
		<div class="intTitle"><img src="{$model_extresdir}/images/int01.png">在线访谈</div>
		<div class="int-imglist">
			<ul>
			<volist name="interlist" id="vo" offset="0" length="3" >
				<li>
					<dl><img src="__ROOT__{$vo.banner}" style="width:227px;height:175px;"></dl>
					<dl class="dlbg01">
						<dt>主题</dt>
						<dd>{$vo.title}</dd>
					</dl>
					<dl class="dlbg02">
						<dt>时间</dt>
						<dd>{$vo.start_time}</dd>
					</dl>
					<dl class="dlbg01">
						<dt>嘉宾</dt>
						<dd style="height:48px;">{$vo.guest}</dd>
					</dl>
					<dl class="dlbg02">
						<dt><br><br>介绍</dt>
						<dd style="height:120px;">{$vo.summary}</dd>
					</dl> 
					<dl class="dlbg01"><span><a href="{:U("detail",array("id"=>$vo['id']))}" >进入访谈></a></span></dl>
				</li>
			</volist>
			</ul>
		</div>
		<div class="int-Textlist">
            <if condition="$interlist">
                <div class="int-Texttitle"><span>更多>></span><div class="int-Texter">更多访谈</div></div>
                <ul class="int-list">
                    <volist name="interlist" id="vo" offset="3" length="5" >
                        <li><span>{$vo.start_time}</span><a href="{:U("detail",array("id"=>$vo['id']))}" >{$vo.title}</a></li>
                    </volist>
                </ul>
            <else />
                <p>暂无访谈，敬请期待</p>
            </if>
		</div>
	</div>
</div>
</div>
<template file="DirectorMail/Public/footer.php"/>
