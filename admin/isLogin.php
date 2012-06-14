<?php session_start();
	if($_SESSION['isLogin'])
	{
		require_once 'config.php';
		if($_SESSION['uname']!=$sql_uname||$_SESSION['pwd']!=$sql_pwd)
		{
			//判断如果修改密码则提示重新登录
			echo '<script language="javascript">alert("您已经修改密码，请重新登录！")</script>';
			$_SESSION['isLogin']=0;
			echo '<script language="javascript">window.location="index.php"</script>';
		}
	}
	else
	{
		echo '<script language="javascript">window.location="index.php"</script>';
	}