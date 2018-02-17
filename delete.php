<?php 
header("Content-type: text/html; charset=utf-8"); 
function del($rid){
	$link=mysqli_connect('localhost','root','wuruizhi','lyb') or die('数据库连接失败');
	mysqli_query($link,'set names utf8');
	$sql='DELETE FROM marks WHERE wid='.$rid;
	if(mysqli_query($link,$sql)){
		$result=mysqli_query($link,'SELECT * FROM marks');
		$data=mysqli_fetch_all($result,MYSQLI_ASSOC);
		if(empty($data)){
			mysqli_query($link,'ALTER TABLE marks AUTO_INCREMENT=1');
		}
		return 1;
	}else{
		return 0;
	}
}
$sub=$_POST['sub'];
$name=$_POST['username'];
$pass=$_POST['password'];
if(isset($_POST['sub'])){
	if($name==='root'&&$pass==='wuruizhi'){
		$id=$_GET['id'];
		if(del($id)){
		echo "<script>alert('删除数据成功！');location.href='./index.php';</script>";
		}else {
		echo "<script>alert('删除数据失败！');location.href='./index.php';</script>";
		}
	}else{
		echo "<script>alert('身份验证错误！');location.href='./index.php';</script>";
	}
}
// echo '请输入管理员账号与密码<br/>';

// echo "<form sclass=\"form-horizontal\" action=\"#\" method=\"post\">";
// echo "<label>账号</label><input name=\"username\" type=\"text\" ><br/>";
// echo "<label>密码</label><input name=\"password\" type=\"text\" ><br/>";
// echo "<input type=\"submit\" value=\"提交\" name=\"sub\"></input>";
// echo "</form>";

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
<label>请输入管理员账号与密码</label><br/>
<form action="#" method="post">
<label>账号</label><input name="username" type="text" ><br/>
<label>密码</label><input name="password" type="text" ><br/>
<input type="submit" value="提交" name="sub" class="btn btn-primary bgn-lg">
</form>

</body>
</html>



