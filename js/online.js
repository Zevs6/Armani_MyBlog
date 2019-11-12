/* 客服代码 */
$("#onlineOpen").mouseover(function(){
	var onService_panel=$("#onService_panel");
	onService_panel.animate({right:0},function(){});
	$(this).hide();
});

$("#onlineClose").click(function(){
	var onService_panel=$("#onService_panel");
	onService_panel.animate({right:-102});
	onService_panel.find(".online_tab").fadeOut(100);
	$("#onlineOpen").show();
});

$(".online_icon").click(function(){
	$(".online_tab").fadeOut(100);
	var onclickId=$(this).attr("id");
	var findparent_tab;
	switch (onclickId){
		case "online_tel_icon":
		findparent_tab=$("#onlineTelTab");
		break;
		case "online_qq_icon":
		findparent_tab=$("#onlineQQTab");
		break;
		case "online_message_icon":
		findparent_tab=$("#onlineMessageTab");
		break;
	}
	findparent_tab.fadeIn(100);
});

$("#onService_panel .tab_close").click(function(){
	$(this).parents(".online_tab").hide();
});

/* 限制文字字数 */
function checkLen(obj,maxs){
	var maxChars = maxs;//最多字符数 
	if (obj.value.length > maxChars){
		obj.value = obj.value.substring(0,maxChars);
	}
	var curr = maxChars - obj.value.length; 
	$(obj).parents("dl").find(".text_length b").text(curr.toString());
} 