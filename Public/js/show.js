

$(function(){
	$("#edit_pass").toggle(
		function(){
			$(".add").removeAttr("style");
			$(".adduser2").attr("style","display:none");
		},
		function(){
			$(".add").attr("style","display:none");	
		}
		
	);
	$("#inputPassword1").blur(function(){
		var opass = $("#inputPassword1").val();
		var reg = /^[A-Za-z0-9_-]{6,18}$/;
		if(opass == ""){
			$(".trig1").html("请输入原密码！");
			return false;
		}else if(opass.length<6||opass.length>18){
			$(".trig1").html("请输入6-18位之间的原密码！");
			return false;
		}else if(!(reg.test(opass))){
			$(".trig1").html("原密码格式不正确！");
			return false;
		}else{
			$(".trig1").html(" ");
		}
	})
	
	$("#inputPassword2").blur(function(){
		var npass = $("#inputPassword2").val();
		var reg = /^[A-Za-z0-9_-]{6,18}$/;
		if(npass == ""){
			$(".trig2").html("请输入新密码！");
			return false;
		}else if(npass.length<6||npass.length>18){
			$(".trig2").html("请输入6-18位之间的新密码！");
			return false;
		}else if(!(reg.test(npass))){
			$(".trig2").html("新密码格式不正确！");
			return false;
		}else{
			$(".trig2").html(" ");
		}
	})
	
	$("#inputPassword3").blur(function(){
		var npass = $("#inputPassword2").val();
		var rpass = $("#inputPassword3").val();
		var reg = /^[A-Za-z0-9_-]{6,18}$/;
		if(rpass == ""){
			$(".trig3").html("请输入重复密码！");
			return false;
		}else if(rpass.length<6||rpass.length>18){
			$(".trig3").html("请输入6-18位之间的重复密码！");
			return false;
		}else if(!(reg.test(rpass))){
			$(".trig3").html("重复密码格式不正确！");
			return false;
		}else if(rpass != npass){
			$(".trig3").html("重复密码与新密码不一致！");
			return false;
		}else{
			$(".trig3").html(" ");
		}
	})

	$("#adduser").toggle(
		function(){
			$(".adduser2").removeAttr("style");
			$(".add").attr("style","display:none");
		},
		function(){
			$(".adduser2").attr("style","display:none");
		}	
	);
	$("#adduser2_name").blur(function(){
		var name = $("#adduser2_name").val();
		if(name == ""){
			$(".adduser2_trig1").html("请输入用户名！");
			return false;
		}else{
			$(".adduser2_trig1").html(" ");
		}
	});
	$("#adduser2_email").blur(function(){
		var email = $("#adduser2_email").val();
		var reg = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
		if(email == ""){
			$(".adduser2_trig2").html("请输入邮箱！");
			return false;
		}else if(!reg.test(email)){
			$(".adduser2_trig2").html("邮箱格式错误！");
			return false;
		}else{
			$.post("/test2/index.php/Index/testemail",{"email":email},function(data){
				if(data != "1"){
					$(".adduser2_trig2").html("该邮箱已被使用！");
					return false;
				}else{
					$(".adduser2_trig2").html(" ");
				}
			})
		}
		
	});
	$("#adduser2_pass").blur(function(){
		var pass = $("#adduser2_pass").val();
		var reg = /^[A-Za-z0-9_-]{6,18}$/;
		if(pass == ""){
			$(".adduser2_trig3").html("请输入密码！");
			return false;
		}else if(pass.length<6||pass.length>18){
			$(".adduser2_trig3").html("请输入6-18位之间的密码！");
			return false;
		}else if(!(reg.test(pass))){
			$(".adduser2_trig3").html("密码中包含不支持的字符！");
			return false;
		}else{
			$(".adduser2_trig3").html(" ");
		}
	});
	$("#adduser2_tel").blur(function(){
		var tel = $("#adduser2_tel").val();
		var reg = /^1[3|5|7|8|][0-9]{9}$/;
		if(tel == ""){
			$(".adduser2_trig4").html("请输入手机号码！");
			return false;
		}else if(tel.length != 11){
			$(".adduser2_trig4").html("手机号码位数错误！");
			return false;
		}else if(!(reg.test(tel))){
			$(".adduser2_trig4").html("手机号码中有非数字字符！");
			return false;
		}else{
			$(".adduser2_trig4").html(" ");
		}
	});
	$("#adduser2_text").blur(function(){
		var text = $("#adduser2_text").val();
		if(text == ""){
			$(".adduser2_trig5").html("请输入个人简介！");
			return false;
		}else{
			$(".adduser2_trig5").html(" ");
		}
	});
	
	
})



function jump(obj){
	
	var p = $(obj).val();
	var url = "/test2/index.php/Index/show/p/"+p
	location.href= url;
}

function edit_pass(obj){
	var opass = $("#inputPassword1").val();
	var npass = $("#inputPassword2").val();
	var rpass = $("#inputPassword3").val();
	
	if(opass == ""){
		$(".trig1").html("请输入原密码！");
		return false;
	}
	if(npass == ""){
		$(".trig2").html("请输入新密码！");
		return false;
	}
	if(rpass == ""){
		$(".trig3").html("请输入重复密码！");
		return false;
	}
	$(".add").attr("style","display:none");
	$.post("/test2/index.php/Index/edit_pass",{"opass":opass,"npass":npass},function(data){
		layer.alert(data);
		location.href="/test2/index.php/Index/show";
	});
	
}

function adduser2(obj){
	var name = $("#adduser2_name").val();
	var email = $("#adduser2_email").val();
	var pass = $("#adduser2_pass").val();
	var tel = $("#adduser2_tel").val();
	var text = $("#adduser2_text").val();
	
	if(name == ""){
		$(".adduser2_trig1").html("请输入用户名！");
		return false;
	}
	if(email == ""){
		$(".adduser2_trig2").html("请输入邮箱！");
		return false;
	}
	if(pass == ""){
		$(".adduser2_trig3").html("请输入密码！");
		return false;
	}
	if(tel == ""){
		$(".adduser2_trig4").html("请输入手机号码！");
		return false;
	}
	if(text == ""){
		$(".adduser2_trig5").html("请输入个人简介！");
		return false;
	}
	
	$(".adduser2").attr("style","display:none");
	$.post("/test2/index.php/Index/adduser2",{"name":name,"email":email,"pass":pass,"tel":tel,"text":text},function(data){
		layer.alert(data);
		location.href="/test2/index.php/Index/show";
	});
	
}

function deluser(obj){
	if(confirm("确定删除该用户吗？")){
		var id = $(obj).parent().prev().val();
		$.post('/test2/index.php/Index/deluser',{'id':id},function(data){
			layer.alert(data);
			location.href = "/test2/index.php/Index/show";
		});
	}
}

function edituser(obj){
	var id = $(obj).parent().prev().val();
	$.post('/test2/index.php/Index/edituser',{'id':id},function(data){
		$("#dom").html(data);
	});
	$.layer({
			type : 1,
			area : ['570px','400px'],
			title : "修改用户信息",
			border : [10,0.5,'#000'],
			btn : ["确定","取消"],
			closeBtn : [1,true],
			fadeIn : 300,
			shade : [0.6,'#000'],
			page :{
				dom : '#dom',
			},
			shift : 'top',
		});
}

function seluser(obj){
	var id = $(obj).parent().prev().val();
	$.post('/test2/index.php/Index/seluser',{'id':id},function(data){
		$("#dom").html(data);
	});
	$.layer({
			type : 1,
			area : ['570px','333px'],
			title : "查看用户",
			border : [10,0.5,'#000'],
			btn : ["确定","取消"],
			closeBtn : [1,true],
			fadeIn : 300,
			shade : [0.6,'#000'],
			page :{
				dom : '#dom',
			},
			shift : 'top',
			});
}

function doedit(obj){
	var id = $(obj).parent().parent().parent().prev().val();
	var name = $("#edituser_name").val();
	var email = $("#edituser_email").val();
	var tel = $("#edituser_tel").val();
	var text = $("#edituser_text").val();
	
	if(name == ""){
		$(".edituser_trig1").html("请输入用户名！");
		return false;
	}
	if(email == ""){
		$(".edituser_trig2").html("请输入邮箱！");
		return false;
	}
	if(tel == ""){
		$(".edituser_trig3").html("请输入手机号码！");
		return false;
	}
	if(text == ""){
		$(".edituser_trig4").html("请输入个人简介！");
		return false;
	}
	
	layer.close(layer.index);
	$.post("/test2/index.php/Index/doedit",{"id":id,"name":name,"email":email,"tel":tel,"text":text},function(data){
		layer.alert(data);
		window.setTimeout('location.href="/test2/index.php/Index/show";',3000);	
	});
}


function editu_name(obj){
	var name = $(obj).val();
	if(name == ""){
		$(obj).parent().parent().next().html("请输入用户名！");
		return false;
	}else{
		$(obj).parent().parent().next().html(" ");
	}
	
}

function editu_email(obj){
	var email = $(obj).val();
	var id = $(obj).parent().parent().parent().prev().val();
	var reg = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
	if(email == ""){
		$(obj).parent().parent().next().html("请输入邮箱！");
		return false;
	}else if(!reg.test(email)){
		$(obj).parent().parent().next().html("邮箱格式错误！");
		return false;
	}else{
		$.post("/test2/index.php/Index/testemail",{"id":id,"email":email},function(data){
			if(data != "1"){
				$(obj).parent().parent().next().html("该邮箱已被使用！");
				return false;
			}else{
				$(obj).parent().parent().next().html(" ");
			}
		})
	}
}

function editu_tel(obj){
	var tel = $(obj).val();
	var reg = /^1[3|5|7|8|][0-9]{9}$/;
	if(tel == ""){
		$(obj).parent().parent().next().html("请输入手机号码！");
		return false;
	}else if(tel.length != 11){
		$(obj).parent().parent().next().html("手机号码位数错误！");
		return false;
	}else if(!(reg.test(tel))){
		$(obj).parent().parent().next().html("手机号码中格式错误！");
		return false;
	}else{
		$(obj).parent().parent().next().html(" ");
	}
}

function editu_text(obj){
	var text = $(obj).val();
	if(text == ""){
		$(obj).parent().parent().next().html("请输入个人简介！");
		return false;
	}else{
		$(obj).parent().parent().next().html(" ");
	}
}

function search(obj){
	var name = $(obj).prev().val();
	if(name != ""){
		location.href = "/test2/index.php/Index/show/name/"+name;
	}
}
