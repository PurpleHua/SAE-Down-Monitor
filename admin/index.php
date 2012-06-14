<?php session_start();
require_once 'config.php';
if(isset($_POST['uname'])&&isset($_POST['pwd'])&&isset($_POST['ver'])&&isset($_POST['submit']))
{
	$uname=$_POST['uname'];
	$pwd=$_POST['pwd'];
	$ver=$_POST['ver'];
}
if(!isset($_SESSION['isLogin']))
{	
	if($uname==$sql_uname && md5($pwd)==$sql_pwd && $ver==$_SESSION['vcode'])
	{
		$_SESSION['isLogin']=1;
		$_SESSION['uname']=$uname;
		$_SESSION['pwd']=md5($pwd);
		echo '<script language="javascript">alert("登录成功！")</script>';
		echo '<script language="javascript">window.location="admin.php"</script>';
	}
	else
	{
		require_once 'admin_login.php';
	}
}
else
{
  echo '<script language="javascript">window.location="admin.php";</script>';
}
?>