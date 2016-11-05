<style>
.demo{margin:10px auto}
</style>
<template file="DirectorMail/Public/header.php"/>
<link rel="stylesheet" href="{$model_extresdir}css/int.css" />
<link rel="stylesheet" type="text/css" href="statics/js/htmlplay5/css/willesPlay.css"/>
<!--<script src="statics/htmlplay5/js/html5media.min.js"></script>-->
<script src="statics/js/htmlplay5/js/willesPlay.js"></script>
<script type="text/javascript">

	function sendmsg(){
		var msg 		= $("#msg").val();
		var tel 		= $("#tel").val();
		var username 	= $("#username").val();
		var view_id 	= $("#view_id").val();
		var guestsl 	= $("#guestsl").val();
		
		if(msg.length==0) {alert("留言不能为空");return;}
		if(tel.length==0) {alert("手机号不能为空");return;}
		if(username.length==0) {alert("用户名不能为空");return;}
		//if(guestsl.length==0) {alert("交流人不能为空");$("#guestsl").focus();return;}
		$.post("{:U('Index/sendmsg')}",{msg:msg,tel:tel,username:username,view_id:view_id,role_id:guestsl},function(data){
			if(data.success){
				//alert(data.msg);
				$("#msg").val("");
				$("#tel").val(tel);
				$("#username").val(username);
				
				$('#tel').attr("readonly","readonly");
				$('#username').attr("readonly","readonly");
				$("#code").val("");
				 refreshs();
				var info = "<dl><dt style=\"color: #ffa800;font-size:14px;\">["+data.data.create_time+"]"+data.data.username+"：</dt>"
			              +"<dd style=\"font-size:13px;\">"+data.data.info+"</dd></dl>";
				$("#guestmsginfo").append(info);
				$("#guestmsginfo").scrollTop($("#guestmsginfo")[0].scrollHeight);
			}
			else  alert(data.msg);
		},"json");
	}
	
	function cleanform(){
		$("#msg").val("");
		$("#tel").val("");
		$("#username").val("");
		$('#tel').removeAttr("readonly");
		$('#username').removeAttr("readonly");
	}
	
	function changeguest(){
		if($("#guestsl").val()!=""){
			$("#msg").val("@"+$("#guestsl").find("option:selected").text());
		}
		else {
			$("#msg").val("");
		}
	}
	
	
</script>

<div class="content-fd">
	<div class="int-right"  style="margin:0px; ">
			<div class="int-contTitle">{$obj.title}</div>
			<div class="int-contMain">
				<div class="intImg" style="text-align:center;margin:0 auto;">
					<div id="willesPlay" >
						<div class="playHeader">
							<div class="videoName"></div>
						</div>
						<div class="playContent">
							<video width="800" height="400px" id="playVideo">
								<!--<source src="http://220.167.105.121/170/2/11/acloud/151672/letv.v.yinyuetai.com/he.yinyuetai.com/uploads/videos/common/6609014F06AE1C8E99DE142502A2B157.flv" type="video/mp4"></source>-->
								<source src="{$obj.video}" type="video/mp4"></source>
								当前浏览器不支持 video直接播放，点击这里下载视频： <a href="/">下载视频</a>
							</video>
							<div class="playTip glyphicon glyphicon-play"></div>
						</div>
						<div class="playControll">
							<div class="playPause playIcon"></div>
							<div class="timebar">
								<span class="currentTime">0:00:00</span>
								<div class="progress">
									<div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
									</div>
								<span class="duration">0:00:00</span>
							</div>
							<div class="otherControl">
								<span class="volume glyphicon glyphicon-volume-down"></span>
								<span class="fullScreen glyphicon glyphicon-fullscreen"></span>
								<div class="volumeBar">
									<div class="volumewrap">
										<div class="progress">
											<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 8px;height: 40%;"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>	
				</div>
				<div class="intSmall" style="margin-top:20px;">
				   <dl>主 题:{$obj.title}</dl>
				   <dl>时 间:{$obj.create_time}</dl>
				   <dl>嘉 宾：{$obj.guest}</dl>
				   <dl>简 介：<span>{$obj.summary}</span></dl>
				</div> 
			</div>
			<div class="int-contMain" style="margin-top:5px">
				<div class="int-contLeft">
					<div class="int-Texttitle">
						<span><samp onclick="startplay()"> 顺序</samp> ｜<samp onclick="showall()">全文</samp>｜<samp onclick="stopplay()">停止刷新</samp><a href="{:U("info",array("id"=>$obj['id']))}" > 更多</a>></span>
						<div class="int-Texter">文字实录</div>
					</div>
					<div class="int-contText" id="msginfo">
					</div>
					<div class="int-contText" id="msginfo1" style="display:none;">
						{$objrely.info}
					</div>
				</div>
				<div class="int-contRight">
					<div class="int-comTxt">在线交流
						<select id="guestsl"  name="" class="int-option"  style="margin-left:30px;"  onchange= "changeguest()">
							<option value="">请选择</option>
							<volist name="rolelist"  id="vo">
								<option  value="{$vo.id}">{$vo.name}</option>
							</volist>  
						</select>
					</div>
                  <div class="guest" id="guestmsginfo">
                  	  <volist name="datalist"  id="vo">
                  		<dl>
						 <if condition="$vo.is_admin neq on">
							<dt style="color: #ffa800;font-size:14px;">[{$vo.create_time}]{$vo.username}：</dt>
							<dd style="font-size:13px;">{$vo.info}</dd>
						 <else />
							<dt style="color: #D82F12;font-size:14px;">[{$vo.create_time}]{$vo.rolename}：</dt> 
							<dd style="font-size:13px;">@{$vo.at_username} {$vo.info}</dd>
						 </if>
	                    </dl>
                  	</volist>  
                  </div>
				  
				  <if condition="$vo.is_open_msg eq on">
					<div class="NetMagges">
						<input  id="view_id" type="hidden" value="{$obj.id}" />
						<textarea id="msg" style="margin: 0px; width: 260px; height: 37px;"></textarea>
						<dl>手机号：<input  id="tel"  type="text" class="TextBox"><span>*</span>姓名：<input id="username" type="text" class="TextBox"></dl>
						<dl>验证码：<input  id="code" type="text" class="TextBox">
							<img class="yanzheng_img" style="margin-bottom: -5px;" id="code_img" alt="" src="{:U('Api/Checkcode/index','code_len=4&font_size=15&width=120&height=25&font_color=&background=')}" onClick="refreshs()" >
							<br/>
							<div style="float:right;" >点击验证码刷新</div>
							<br/>
						</dl>
						<dl><input name="" type="button" value="提交" class="Netbtn" onclick="sendmsg()">
						<input name="" type="button" value="清除" class="Netbtn" onclick="cleanform()"></dl>
					</div>
				 <else />
				 <script>
					$("#guestmsginfo").css("height","345px");
				 </script>
				 
				 </if>
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
