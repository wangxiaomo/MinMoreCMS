$(function(){
	$(document.body).append("<a id='to-top'><img src='/statics/themes/L4_Global/images/totop.png'></a>");
	var toTop = $("#to-top");
	var sysHeight = window.screen.height;
	toTop.click(function(){
		window.scrollTo(0,0);
	});
	$(window).scroll(function(){
		if(scrollY > 0){
			toTop.show();
		}
		else{
			toTop.hide();
		}
	});
	
    function AddFavorite(sURL, sTitle) {
        try {
            window.external.addFavorite(sURL, sTitle);
        }
        catch (e) {
            try {
                window.sidebar.addPanel(sTitle, sURL, "");
            }
            catch (e) {
                alert("您的浏览器不支持加入收藏，请按 Ctrl+D 进行添加");
            }
        }
    }

	$("#set-home").click(function() {
		var url = this.href;
		try {
			this.style.behavior = "url(#default#homepage)";
			this.setHomePage(url);
		} catch(e) {
			if (document.all) {
				document.body.style.behavior = "url(#default#homepage)";
				document.body.setHomePage(url);
			} else if (window.sidebar) {
				if (window.netscape) {
					try {
						netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
					} catch(e) {
						alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入“about:config”并回车\n然后将 [signed.applets.codebase_principal_support]的值设置为'true',双击即可。");
						return false;
					}
				}
				var prefs = Components.classes["@mozilla.org/preferences-service;1"].getService(Components.interfaces.nsIPrefBranch);
				prefs.setCharPref('browser.startup.homepage', url);
			} else {
				alert('您的浏览器不支持自动设置首页, 使用浏览器菜单或在浏览器地址栏输入“chrome://settings/browser”手动设置!'); 
			}
		}
		return false;
	});
	
	$("#add-fav").click(function(){
		AddFavorite(location.href,document.title);
	});
	
	var $this=$("#scroll-wrap"); 
	var scrollTimer; 
	$this.hover(function(){ 
	clearInterval(scrollTimer); 
	},function(){ 
		scrollTimer = setInterval(function() { 
			scrollNews($this); 
		}, 3000); 
	}).trigger("mouseleave");
	function scrollNews(obj){ 
		var $self=obj.children("div"); 
		var lineHeight=$self.children("p:first").height(); 
		$self.animate({ 
			"marginTop":-lineHeight+ "px" 
			}, 600, function(){ 
			$self.css({ 
				marginTop:0 
			}).children("p:first").appendTo($self); 
		});
	} 	
	
});
