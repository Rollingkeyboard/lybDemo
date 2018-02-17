<?php
include 'autocode.php';
date_default_timezone_set('PRC');
session_start();
if(isset($_POST['sub'])){
	$code=$_POST['code'];
	if(strtolower($code)==strtolower($_SESSION['autocode'])){
		//插入数据库，跳转到index.php展示
		
		$link=mysqli_connect('localhost','root','wuruizhi','lyb') or die('数据库连接失败');
		mysqli_query($link,'set names utf8');
		$username=$_POST['username'];
		$content=$_POST['content'];
		$wtime=date("Y-m-d H:i:s",time());
		if(!$username||!$content){
			die ("<script>alert('请输入您的署名或内容!');location.href='./wish.php'</script>");
		}
		$sql="INSERT INTO marks(wid,wname,wcontent,wtime) VALUE(DEFAULT,'$username','$content','$wtime')";
		if(mysqli_query($link,$sql)){
			echo "<script>alert('许愿成功！');location.href='./index.php';</script>";
		}else{
			echo "<script>alert('写入数据库错误！".mysqli_error($link)."！');location.href='./index.php';</script>";
		}
	}
	else
		echo "<script>alert('验证码输入有误，请重新输入!');</script>";
}
?>
<html>
<head>
	<meta charset="utf-8">
<script type="text/javascript" src="http://www.francescomalagrino.com/BootstrapPageGenerator/3/js/jquery-2.0.0.min.js"></script>
<script type="text/javascript" src="http://www.francescomalagrino.com/BootstrapPageGenerator/3/js/jquery-ui"></script>
<link href="http://www.francescomalagrino.com/BootstrapPageGenerator/3/css/bootstrap-combined.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="http://www.francescomalagrino.com/BootstrapPageGenerator/3/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid" id="LG">
	<div class="row-fluid">
		<div class="span12">
			<h3>
				写下你的祝愿
			</h3>
			<form style="display: inline" class="form-horizontal" action="#" method="post">
				<legend>请输入你的祝福内容</legend>
				<textarea cols="30" name="content" rows="5"></textarea>
				<p><br/></p>
				<p><br/></p>
				<label>您的署名</label><input name="username" type="text" /> 
				<label>验证码</label><input name="code" type="text" />
				<input type="text" readonly value="<?php ccode(); ?>" style="width: 58px;background-color: pink;text-align: center">
				<p><br/></p>
				<!-- <center> -->
				<button name="sub" type="submit">-&gt;开始粘贴你的祝福-&gt;</button> 
				<!-- </center> -->
			</form> 
			<button style="display: inline;" name="back" type="submit" onclick="location.href='./index.php'" >返回</button>
		</div>
	</div>
</div>
</body>
</html>