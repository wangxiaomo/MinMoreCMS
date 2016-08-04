<link rel="stylesheet" href="{$model_extresdir}css/int.css" />
<script src="statics/extres/interview/js/html5media.min.js"></script>
<style>
.demo{margin:10px auto}
</style>
<template file="DirectorMail/Public/header.php"/>
<script type="text/javascript">
	function sendmsg(){
		var msg 		= $("#msg").val();
		var tel 		= $("#tel").val();
		var username 	= $("#username").val();
		var view_id 	= $("#view_id").val();
		if(msg.length==0) {alert("留言不能为空");return;}
		if(tel.length==0) {alert("手机号不能为空");return;}
		if(username.length==0) {alert("用户名不能为空");return;}
		$.post("{:U('Index/sendmsg')}",{msg:msg,tel:tel,username:username,view_id:view_id},function(data){
			if(data.success){
				alert(data.msg);
				$("#msg").val("");
				$("#tel").val("");
				$("#username").val("");

				
			}
			else  alert(data.msg);
		},"json");
	}
</script>

<div clkss="content-fd">
	<div class="int-right"  style="margin:0px; ">
			<div class="int-contTitle">{$obj.title}</div>
			<div class="int-contMain">
				<div class="intImg">
					<!--<img src="__ROOT__{$obj.banner}"></div>
					<div class="intImg" style="display:none;">-->
					<div class="demo">
						<video class="video" poster="__ROOT__{$obj.banner}"  controls preload>
							<source src="{$obj.video}" media="only screen and (min-device-width:640px)"></source>
						</video>
				   </div>	
				</div>
				<div class="intSmall">
				   <dl>主 题:{$obj.title}</dl>
				   <dl>时 间:{$obj.create_time}</dl>
				   <dl>嘉 宾：{$obj.guest}</dl>
				   <dl>简 介：<span>{$obj.summary}</span></dl>
				</div> 
			</div>
			<div class="int-contMain" style="margin-top:5px">
               <div class="int-contLeft">
                  <div class="int-Texttitle"><span><samp onclick="startplay()"> 顺序</samp> ｜<samp onclick="showall()">全文</samp>｜<samp onclick="stopplay()">停止刷新</samp><a href="{:U("info",array("id"=>$obj['id']))}" > 更多</a>></span><div class="int-Texter">文字实录</div></div>
                  <div class="int-contText" id="msginfo">
                  	 
                  </div>
                  <div class="int-contText" id="msginfo1" style="display:none;">
                  	 {$objrely.info}
                  </div>
               </div>
               <div class="int-contRight">
                  <div class="int-comTxt">在线交流<select name="" class="int-option"  style="margin-left:30px;">
                    <option>主持人</option>
                 </select></div>
                  <div class="guest" id="guestmsginfo">
                  	  <volist name="datalist"  id="vo">
                  		<dl>
	                      <dt style="color: #ffa800;font-size:14px;">[{$vo.create_time}]{$vo.username}：</dt>
	                      <dd style="font-size:13px;">{$vo.info}</dd>
	                    </dl>
                  	</volist>  
                  </div>
                  <div class="NetMagges">
				    <input  id="view_id" type="hidden" value="{$obj.id}" />
					<textarea id="msg" style="margin: 0px; width: 260px; height: 37px;"></textarea>
                    <dl>手机号：<input  id="tel"  type="text" class="TextBox"><span>*</span>姓名：<input id="username" type="text" class="TextBox"></dl>
                  <!--  <dl>验证码：<input  id="code" type="text" class="TextBox"><samp>7364</samp></dl> --> 
                    <dl>验证码：<input  id="code" type="text" class="TextBox">
                    <img class="yanzheng_img" style="margin-bottom: -5px;" id="code_img" alt="" src="{:U('Api/Checkcode/index','code_len=4&font_size=15&width=120&height=25&font_color=&background=')}" onClick="refreshs()" >
                    <br/>
                     <div style="float:right;" >击验证码刷新</div>
                     <br/>
                    </dl>
                    <dl><input name="" type="button" value="提交" class="Netbtn" onclick="sendmsg()"><input name="" type="button" value="清除" class="Netbtn"></dl>
                  </div>
               </div>
           </div>
        </div>
        
		<div class="int-right" style="margin-top:20px;margin-left:0px;">
		<div class="int-recomTitle"><img src="{$model_extresdir}images/int04.png">往期推荐</div>
			<ul class="recomList">
				<volist name="interlist" id="vo" offset="0" length="4" >
				<li><a href="{:U("detail",array("id"=>$vo['id']))}" ><img src="{$vo.banner}" width="100%"><dl>{$vo.title}</dl></a></li>

				</volist>
			</ul>
		</div>
</div></div>
<script>
var i=0;
var time1;
$(document).ready(function(){
	run();
	var beforeHeight = $("#guestmsginfo").scrollTop();
	$("#guestmsginfo").scrollTop($("#guestmsginfo")[0].scrollHeight);
	var size = $("#msginfo1").children().length;
	if(i<size){
		$("#msginfo").append($("#msginfo1").children()[i]);
		i++;
	}
	runshow();
})


function run() {  
	interval = setInterval(chat, "10000");  
} 

function runshow() {  
	time1 = setInterval(infoshow, "1000");  
} 

function infoshow() 
{  
	var size = $("#msginfo1").children().length;
	if(i<size){
		$("#msginfo").append($("#msginfo1").children()[i]);
	}
	$("#msginfo").scrollTop($("#msginfo")[0].scrollHeight);
}

function  startplay(){
	$("#msginfo").html("");
	time1 = setInterval(infoshow, "1000");
}
function  stopplay(){
	clearInterval(time1);
}
function  showall(){
	clearInterval(time1);
	$("#msginfo").html($("#msginfo1").html());
	$("#msginfo").scrollTop($("#msginfo")[0].scrollHeight);
}

function chat() 
{  
	$.get("{:U('Index/getmsglist')}",{id:'{$obj.id}'},function(data){
		$("#guestmsginfo").html(data);
		$("#guestmsginfo").scrollTop($("#guestmsginfo")[0].scrollHeight);
	},"html");
}

	
//刷新广告
function refreshs(){
	document.getElementById('code_img').src='{:U('Api/Checkcode/index','code_len=4&font_size=15&width=120&height=25&font_color=&background=&refresh=1')}&time='+Math.random();void(0);
}
$(function(){
	$('#verifycode').focus(function(){
		$('a.change_img').trigger("click");
	});
});
</script>
<template file="DirectorMail/Public/footer.php"/>