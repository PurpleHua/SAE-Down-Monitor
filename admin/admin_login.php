<?php require_once 'v.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
<style type="text/css">
body {
	background-color: #CCC;
	text-align: center;
	padding-top: 200px;
	padding-bottom: 400px;
}
.input1 {
	position: relative;
	height: 20px;
	width: 200px;
}
.button1 {
	width: 80px;
	height:25px;
}
</style>
</head>

<body>
<center>
<form action="" method="POST" target="_self">
	<table  border="0">
	<tr><h3>管理员登录</h3>
	</tr>
	<tr>
		<td width="100">用户名：</td>
		<td width="200"><input type="text" name="uname" class="input1" /></td>
	</tr>
	<tr>
		<td width="100">密&nbsp;码：</td>
		<td width="200"><input type="password" name="pwd"  class="input1"/></td>
	</tr>
	<tr>
		<td width="100">验证码：</td>
		<td width="200"><input type="text" name="ver" class="input1" /></td><td width="100"><?php echo $question['img_html']; ?></td>
	</tr>
	<tr>
	<td></td>
	<td width="200" align="left"></td>
	</tr>
	<tr>
		<td width="100"></td>
		<td width="200"><input type="reset" name="reset" value="重新输入" class="button1" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="确认登录"  class="button1"/></td>
	</tr>
	<tr><td></td><td>请注意验证码区分大小写</td></tr>
</table>
</form>
</center>
</body>
</html>
