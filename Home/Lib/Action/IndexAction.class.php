<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
		$this->display();
    }
	
	public function dologin(){
		$data["e-mail"] = $_POST["email"];
		$data["password"] =$_POST["pass"];
		$m = M("User");
		$result = $m->where($data)->find();
		if($result){
			$_SESSION["user"]["id"] = $result["id"];
			echo "1";
		}else{
			echo "用户名或密码错误！";
		}
	}
	
	public function show(){
		if(isset($_SESSION["user"]["id"])){
			$m = M("User");
			$user["id"] = $_SESSION["user"]["id"];
			$res = $m->where($user)->find();
			$this->assign("user",$res);
			if($_GET["name"]){
				$data["text"] = array("like","%".$_GET["name"]."%");
				$url = "show/name/".$_GET["name"];
			}else{
				$url = "show";
			}
			$sum = count($m->where($data)->select());
			$p = 0;
			if($_GET["p"]){
				$p = $_GET["p"];
			}
			$line = 2;
			if($_GET["line"]){
				$line = $_GET["line"];
			}
			
			$page = $this->fenye($sum,$p,$line,$url);
			$re = $m->where($data)->limit(($p*$line),$line)->select();
			$this->assign("page",$page);
			$this->assign("data",$re);
			$this->display();
		}else{
			$this->redirect("index");
		}
	}
	
	public function logout(){
		unset($_SESSION["user"]["id"]);
		$this->redirect("index");
	}
	
	public function deluser(){
		$data["id"] = $_POST["id"];
		$m = M("User");
		$res = $m->where($data)->delete();
		if($res){
			echo "删除成功！";
		}else{
			echo "没有该用户！";
		}
		
	}
	
	public function edituser(){
		$m = M("User");
		$data["id"] = $_POST["id"];
		$res = $m->where($data)->find();
		$str = '<div class="edituser" style="width:570px;">
				<input type="hidden" value="'.$res["id"].'">
				<form class="form-horizontal" role="form" >
				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
					<div class="col-sm-10">
					  <input type="text" id="edituser_name" onblur="editu_name(this)" class="form-control" value="'. $res["text"] .'">
					</div>
				  </div>
				  <div class="adduser2_trig1"></div>
				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
					  <input type="email" id="edituser_email" class="form-control"  onblur="editu_email(this)" value="'.$res["e-mail"].'">
					</div>
				  </div>
				  <div class="adduser2_trig2"></div>
				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">电话号码</label>
					<div class="col-sm-10">
					  <input type="text" id="edituser_tel" class="form-control" onblur="editu_tel(this)" value="'.$res["number"].'">
					</div>
				  </div>
				  <div class="adduser2_trig3"></div>
				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">个人简介</label>
					<div class="col-sm-10">
					 <textarea onblur="editu_text(this)" id="edituser_text" class="form-control" rows="3">'.$res["text-area"].'</textarea>
					</div>
				  </div>
				  <div class="adduser2_trig4"></div>				  
				  <div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <div  class="btn1 btn-default" onclick="doedit(this)">确定</div>
					</div>
				  </div>
				</form>
			</div>';
			echo $str;
	}
	
	public function seluser(){
		$m = M("User");
		$data["id"] = $_POST["id"];
		$res = $m->where($data)->find();
		$str = '<div  style="width:570px;">
				<form class="form-horizontal" role="form" >
				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" disabled="disabled" value="'. $res["text"] .'">
					</div>
				  </div>
				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
					  <input type="email" class="form-control"  disabled="disabled" value="'.$res["e-mail"].'">
					</div>
				  </div>
				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">电话号码</label>
					<div class="col-sm-10">
					  <input type="text"  class="form-control" disabled="disabled" value="'.$res["number"].'">
					</div>
				  </div>
				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">个人简介</label>
					<div class="col-sm-10">
					 <textarea  class="form-control" disabled="disabled" rows="3">'.$res["text-area"].'</textarea>
					</div>
				  </div>
				</form>
			</div>';
			echo $str;
	}
	
	public function doedit(){
		$m = M("User");
		$data["id"] = $_POST["id"];
		$dat["e-mail"] = $_POST["email"];
		$res = $m->where($dat)->find();
		if($res&&$res["id"] != $data["id"]){
			echo "邮箱已被占用！";
		}else{
			$dat["text"] = $_POST["name"];
			$dat["number"] = $_POST["tel"];
			$dat["text-area"] = $_POST["text"];
			$ress = $m->where($data)->save($dat);
			if($ress){
				echo "用户信息更改成功！";
			}else{
				echo "用户信息更改失败！";
			}
		}
		
	}
	
	public function edit_pass(){
		$m = M("User");
		$data["password"] = $_POST["npass"];
		$dat["id"] = $_SESSION["user"]["id"];
		$res = $m->where($dat)->find();
		if($res["password"] != $_POST["opass"]){
			echo "原密码错误！";
		}else{
			$ress = $m->where($dat)->save($data);
			if($ress){
				echo "密码更改成功！";
			}else{
				echo "密码更改失败！";
			}
		}
	}
	
	public function adduser2(){
		$m = M("User");
		$data["e-mail"] = $_POST["email"];
		$res = $m->where($data)->find();
		if($res){
			echo "邮箱已被占用！";
		}else{
			$data["text"] = $_POST["name"];
			$data["password"] = $_POST["pass"];
			$data["number"] = $_POST["tel"];
			$data["text-area"] = $_POST["text"];
			$res = $m->add($data);
			if($res){
				echo "创建用户成功！";
			}else{
				echo "创建用户失败！";
			}
		}
		
	}
	public function testemail(){
		$m = M("User");
		$data["e-mail"] = $_POST["email"];
		$res = $m->where($data)->find();
		if($res){
			if(isset($_POST["id"])&&$res["id"] == $_POST["id"]){
				echo "1";
			}else{
				echo "0";
			}	
		}else{
			echo "1";
		}
	} 
	
	private function fenye($count,$p,$line,$url){
	
		
		//  $line = 2  每页行数
		
		$page = ceil($count/$line) ; //总页数
		$str = "";
		$str = $str.'<a href="__URL__/'.$url.'/p/0">首页</a>&nbsp;&nbsp;&nbsp;';
		
		if($page>6&&$p>2){
				for($prev=2;$prev>0;$prev--){
					$str = $str.'<a href="__URL__/'.$url.'/p/'.$p-$prev.'" >'.($p-$prev+1).'</a>&nbsp;&nbsp;';
				}
				$str = $str.'<a href="__URL__/'.$url.'/p/'.$p.'" class="current" >'.($p+1).'</a>&nbsp;&nbsp;';
				for($next=1;$next<4;$next++){
					$str = $str.'<a href="__URL__/'.$url.'/p/'.$p+$next.'" >'.($p+$next+1).'</a>&nbsp;&nbsp;';
				}
			
		}else if($page>6){
			for($k=0;$k<6;$k++){
				if($k == $p){
					$str = $str.'<a href="__URL__/'.$url.'/p/'.$k.'"  class="current" >'.($k+1).'</a>&nbsp;&nbsp;';
				}else{
					$str = $str.'<a href="__URL__/'.$url.'/p/'.$k.'" >'.($k+1).'</a>&nbsp;&nbsp;';
				}
			}
		}else{
			for($k=0;$k<$page;$k++){
				if($k == $p){
					$str = $str.'<a href="__URL__/'.$url.'/p/'.$k.'"  class="current" >'.($k+1).'</a>&nbsp;&nbsp;';
				}else{
					$str = $str.'<a href="__URL__/'.$url.'/p/'.$k.'" >'.($k+1).'</a>&nbsp;&nbsp;';
				}
			}
		}
			$str = $str.'<a href="__URL__/'.$url.'/p/'.($page-1).' ">尾页</a>&nbsp;&nbsp;&nbsp;';
			$str = $str.'<a href="javascript:void(0);">跳转到</a><select name="fy_tz">';
			for($a=0;$a<$page;$a++){
				$str = $str.'<option value="'.$a.'" onclick="jump(this)">'.($a+1).'</option>';
			}
			$str = $str.'</select>&nbsp;&nbsp;<a href="#">共'.$page.'页</a>';
		
		return $str;
	}
}