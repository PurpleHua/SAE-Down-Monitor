<?php require_once 'isLogin.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Webluker监控</title>
<style type="text/css">
body {
	background-color: #CCC;
}
</style>
</head>

<body>
<h2>Webluker监控相关（此功能为辅助功能，方便集成化监控使用）</h2>
<h3>此回调地址也可以向用户设定飞信（或用户自定义代码使用SAE短信服务）的手机发送消息</h3>
<h3>监控回调URL地址为：<?php echo $_SERVER['HTTP_HOST']."/monitor/webluker.php";?></h3>
<h4>更多相关内容和使用说明请参加<a href="http://blog.webluker.com/?p=355">Webluker官方网站</a></h4>
</body>
</html>
