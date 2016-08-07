<volist name="datalist"  id="vo">
<dl>
<if condition="$vo.is_admin neq on">
<dt style="color: #ffa800;font-size:14px;">[{$vo.create_time}]{$vo.username}：</dt>
<dd style="font-size:13px;">{$vo.info}</dd>
<else />
<dt style="color:#D82F12;font-size:14px;">[{$vo.create_time}]{$vo.rolename}：</dt> 
<dd style="font-size:13px;">@{$vo.at_username} {$vo.info}</dd>
</if>
 </dl>
</volist>  
                  	
                  	