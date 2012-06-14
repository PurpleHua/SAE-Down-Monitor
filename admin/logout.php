<?php
	session_start();
	$_SESSION['isLogin']=0;
	$_SESSION['uname']="";
	$_SESSION['pwd']="";
	
	session_destroy();
	echo '<script language="javascript">alert("退出成功！");window.location="../admin/index.php"</script>';