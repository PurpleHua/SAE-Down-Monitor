<?php 
	require_once 'isLogin.php';
	if(isset($_POST['submit']))
	{
		$post_tel=$_POST['tel'];
		$post_pwd=$_POST['pwd'];
	}
	$mysql = new SaeMysql();
	$sql = "SELECT * FROM `user` LIMIT 10";
	$data = $mysql->getData( $sql ); 
	$mysql->closeDb();
	if($post_tel!=""&&$post_pwd!=""&&$data['0']['tel']=="")
	{
		$mysql = new SaeMysql();
		$sql = "UPDATE `user` SET tel= '$post_tel',pwd='$post_pwd'  ";
		$mysql->runSql( $sql );
		if($mysql->errno() == 0)
		{
			echo '<script language="javascript">alert("帐号密码更新成功");</script>';
		}
		$mysql->closeDb();
	}
	else if($post_tel!=""&&$post_pwd!=""&&!empty($data))
	{
		echo '<script language="javascript">alert("帐号密码已存在，请到数据删除相应记录后操作！");</script>';
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>飞信设置</title>
<style type="text/css">
body {
	background-color: #CCC;
	padding:2px;
}

.input-button {
	height: 25px;
	width: 70px;
}
.td-1{
	height: 15px;
	width: 180px;	
}
</style>
</head>

<body>
<p>为保障帐号安全，此处帐号只允许设置一次，并写入数据库进行保存。若以后需要修改，请到数据库中将该条记录删除即可重新设置！</p>
<form action="" method="post" target="_self">
<table border="0">
	<tr>
		<td>飞信帐号：</td>
		<td><input type="tel" name="tel" class="td-1"/></td>
	</tr>
	<tr>
		<td>飞信密码：</td>
		<td><input type="password" name="pwd" class="td-1" /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="reset" value="重新填写" class="input-button" />&nbsp;&nbsp;<input type="submit" value="确认提交" name="submit" class="input-button" /></td>
	</tr>
</table></form>

</body>
</html>
