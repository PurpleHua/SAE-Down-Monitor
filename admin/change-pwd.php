<?php require_once 'isLogin.php';?>
<?php 
	require_once 'config.php';
	$pwd_ori=$_POST['origin'];
	$pwd_new1=$_POST['new_1'];
	$pwd_new2=$_POST['new_2'];
	if($pwd_ori!=""&&$pwd_new1!=""&&$pwd_new2!="")
	if(md5($pwd_ori)==$_SESSION['pwd'])
	{
		if($pwd_new1==$pwd_new2)
		{
			$tosql_pwd=md5($pwd_new1);
			$tosql_uname=$_SESSION['uname'];
			$mysql = new SaeMysql();
			$sql = "UPDATE `admin` SET `pwd`='$tosql_pwd' where `uname` ='$tosql_uname'";
			$mysql->runSql( $sql );
			if( 0==($mysql->errno()) )
			{
				echo '<script language="javascript">alert("密码修改成功！");</script>';
			}
			 
			$mysql->closeDb();
		}
		else
		{
			echo '<script language="javascript">alert("两次输入的密码不一致请重新输入！")</script>';
		}
	}
	else
	{
		echo '<script language="javascript">alert("密码输入错误，请重新输入！")</script>';
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改密码</title>
<style type="text/css">
body {
	background-color: #CCC;
	margin: 0px;
	padding: 10px;
}
</style>
</head>

<body><form action="" method="post" target="_self">
<table border="0">
	<tr>
		<td>原密码：</td>
		<td><input type="password" name="origin" /></td>
	</tr>
	<tr>
		<td>新密码：</td>
		<td><input type="password" name="new_1" /></td>
	</tr>
	<tr>
		<td>新密码：</td>
		<td><input type="password" name="new_2" /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="reset" value="重新输入" />&nbsp;&nbsp;<input type="submit" value="确认修改" /></td>
	</tr>
</table>

</form>

</body>
</html>
