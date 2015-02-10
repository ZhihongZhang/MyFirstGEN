$(function(){
	$("#inputEmail3").blur(function(){
		
		var email = $("#inputEmail3").val();
		if(email == ""){
			layer.alert("邮箱不能为空！");
			return false;
		}else{
			var reg = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
			if(!reg.test(email)){
				layer.alert("邮箱格式错误！");
				return false;
			}
		}
	})
	
	$("#inputPassword3").blur(function(){
		var pass = $("#inputPassword3").val();
		if(pass==""){
			layer.alert("密码不能为空！");
			return false;
		}else{
			var reg=/^[a-z0-9_-]{6,18}$/;
			if(!reg.test(pass)){
				layer.alert("密码格式不正确或位数不足！");
				return false;
			}	
		}
	})
	

})

function sub(obj){
		var email = $("#inputEmail3").val();
		var pass = $("#inputPassword3").val();
		if(email == ""){
			layer.alert("请输入邮箱！");
			return false;
		}
		if(pass==""){
			layer.alert("请输入密码！");
			return false;
		}
		
		$.post('dologin',{'email':email,'pass':pass},function(data){
			if(data == "1"){
				location.href="/test2/index.php/Index/show";
			}else{
				layer.alert(data);
			}
		});
		
		//$(".form-horizontal").submit();
}