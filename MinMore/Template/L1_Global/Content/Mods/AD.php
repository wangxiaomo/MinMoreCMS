<!-- 广告图-->
<!--
ad_pos:ad_left,ad_right,ad_float
-->
<if condition="$ad_post">
<div class="{$ad_pos}">
<a href="{$ad_url}">
	<img src="{$config_siteurl}{$ad_pic}" alt=""/>
</a>
</div>
<if condition="$ad_pos eq ad_float">
<script>
</script>
</if>
</if>
