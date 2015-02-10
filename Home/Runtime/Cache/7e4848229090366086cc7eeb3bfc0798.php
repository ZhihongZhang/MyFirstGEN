<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
	<head>
		<title>登录页面</title>
		<meta charset="utf-8" />
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<link rel="stylesheet" href="__BOO__/bootstrap.min.css" >
		<link rel="stylesheet" href="__CSS__/login.css" >
		<script src="__JS__/jquery.min.js"></script>
		<script src="__BOO__/bootstrap.min.js"></script>
		<script src="__JS__/layer/layer.min.js"></script>
		<script src="__JS__/login.js"></script>
	</head>
	<body>
		
		<div id="form">
			<div id="form_top">
				<p class="form_top">用户登录</p>
			</div>
			<!--<form class="form-horizontal" role="form" action="__URL__/dologin" method="post">-->
			<form class="form-horizontal" role="form" >
			  <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">邮箱</label>
				<div class="col-sm-10">
				  <input type="email" class="form-control" id="inputEmail3" placeholder="请输入邮箱地址">
				</div>
			  </div>
			  <div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">密码</label>
				<div class="col-sm-10">
				  <input type="password" class="form-control" id="inputPassword3" placeholder="请输入密码">
				</div>
			  </div>
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <div  class="btn1 btn-default" onclick="sub(this)">登录</div>
				</div>
			  </div>
			</form>
		</div>
	</body>
</html>