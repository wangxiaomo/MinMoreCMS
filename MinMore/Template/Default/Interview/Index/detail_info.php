<link rel="stylesheet" href="{$model_extresdir}css/int.css" />
<template file="DirectorMail/Public/header.php"/> 
	<div class="int-right" style="margin:0px; ">
		<div class="Text-record" >文字实录</div>
		<div class="record-Main" style="height:600px; overflow:auto">
			<dl style="text-align: center;">{$objview.title}</dl>
			<dl style="text-align: center;"><img src="{$objview.banner}" /></dl>
			<dl>
				<dt>{$obj.title}</dt>
				<dd>主持人：{$obj.master}</dd>
				<dd>{$obj.summary}</dd>
				<div class="record-Text">{$obj.info}
				</div>
				<div id="info"  style="display:none;">{$obj.info}</div>
			</dl>
		</div>  
	</div>
</div>
<template file="DirectorMail/Public/footer.php"/>
<script>

$(document).ready(function(){

	
alert($("#info").$('ul.level-2').children().lenght);
	
})
</script>


