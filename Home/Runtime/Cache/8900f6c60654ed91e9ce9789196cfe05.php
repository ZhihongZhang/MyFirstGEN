<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
	<head>
		<title>显示页面</title>
		<meta charset="utf-8" />
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<link rel="stylesheet" href="__BOO__/bootstrap.min.css" >
		<link rel="stylesheet" href="__CSS__/show.css" >
		<script src="__JS__/jquery.min.js"></script>
		<script src="__JS__/layer/layer.min.js"></script>
		<script src="__BOO__/bootstrap.min.js"></script>
		<script src="__JS__/show.js"></script>
		<style>
			th{
				text-align:center;
			}
			
			td a{
				color:#000;
				font-size:20px;
				letter-spacing:2px;
			}
			
		</style>
	</head>
	<body>
		
		<div id="show">
			<div id="show_top">
				<div class="show_top">
					<div class="welcome">你好，<?php echo ($user["text"]); ?></div>
					<div class="edit_pass"><a id="edit_pass" href="javascript:void(0)">修改密码</a></div>
					<div class="logout"><a id="logout" href="__URL__/logout">退出</a></div>
				</div>
			</div>
			<div style="position:relative;left:1080px;top:57px;"><a href="/test2/index.php/Index/show">返回主页面</a></div>
			<div class="adduser">
				<a id="adduser" href="javascript:void(0)">新增用户</a>
				
			</div>
			<div class="search">
				<input type="text"  class="form-control" placeholder="请输入用户名">
				<button type="button" class="btn btn-primary" onclick="search(this)">搜索</button>
			</div>
			<div id="table">
				
				<table class="table table-hover">
					<tr>
					  <th>用户名</th>
					  <th>邮箱</th>
					  <th>电话号码</th>
					  <th>个人简介</th>
					  <th>操作</th>
					</tr>
					<?php if(is_array($data)): foreach($data as $key=>$vo): ?><tr>
					  <td ><?php echo ($vo["text"]); ?></td>
					  <td ><?php echo ($vo["e-mail"]); ?></td>
					  <td ><?php echo ($vo["number"]); ?></td>
					  <td ><?php echo ($vo["text-area"]); ?></td>
					  <input type="hidden" value="<?php echo ($vo["id"]); ?>">
					  <td ><a onclick="seluser(this)" href="javascript:void(0)">查看</a>|<a onclick="edituser(this)"  href="javascript:void(0)">修改</a>|<a  onclick="deluser(this)" href="javascript:void(0)">删除</a></td>
					</tr><?php endforeach; endif; ?>
				</table>
				<div class="page"><?php echo ($page); ?></div>
			</div>
			<div class="add" 	style="display:none" >
				<div id="form_top">
					<p class="form_top">修改密码</p>
				</div>
				<form class="form-horizontal" role="form" >
				  <div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">原密码</label>
					<div class="col-sm-10">
					  <input type="password" class="form-control" id="inputPassword1" placeholder="请输入原密码">
					</div>
				  </div>
				  <div class="trig1"></div>
				  <div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">新密码</label>
					<div class="col-sm-10">
					  <input type="password" class="form-control" id="inputPassword2" placeholder="请输入新密码">
					</div>
				  </div>
				   <div class="trig2"></div>
				  <div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">重复新密码</label>
					<div class="col-sm-10">
					  <input type="password" class="form-control" id="inputPassword3" placeholder="请重复新密码">
					</div>
				  </div>
					<div class="trig3"></div>				  
				  <div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <div  class="btn1 btn-default" onclick="edit_pass(this)">确定</div>
					</div>
				  </div>
				</form>
			</div>
			
			<div class="adduser2" 	style="display:none" >
				<div id="form_top">
					<p class="form_top">新增用户</p>
				</div>
				<form class="form-horizontal" role="form" >
				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
					<div class="col-sm-10">
					  <input type="text" id="adduser2_name" class="form-control" placeholder="请输入用户名">
					</div>
				  </div>
				  <div class="adduser2_trig1"></div>
				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
					  <input type="email" class="form-control" id="adduser2_email" placeholder="Email">
					</div>
				  </div>
				  <div class="adduser2_trig2"></div>
				  <div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">密码</label>
					<div class="col-sm-10">
					  <input type="password" class="form-control" id="adduser2_pass" placeholder="请输入6-18位密码">
					</div>
				  </div>
				  <div class="adduser2_trig3"><p style="color:green;">仅支持小写英文字母,数字,_,-</p></div>
				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">电话号码</label>
					<div class="col-sm-10">
					  <input type="text" id="adduser2_tel" class="form-control" placeholder="仅支持中国大陆手机号码">
					</div>
				  </div>
				  <div class="adduser2_trig4"></div>
				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">个人简介</label>
					<div class="col-sm-10">
					 <textarea id="adduser2_text" class="form-control" rows="3"></textarea>
					</div>
				  </div>
				  <div class="adduser2_trig5"></div>				  
				  <div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <div  class="btn1 btn-default" onclick="adduser2(this)">确定</div>
					</div>
				  </div>
				</form>
			</div>
			
			<div id="dom"></div>
		</div>	
	</body>
</html>