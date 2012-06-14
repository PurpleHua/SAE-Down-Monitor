<?php require_once 'isLogin.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理系统</title>
<style type="text/css">
a {
	font-family: "宋体";
	font-size: 15px;
	color: #000;
	text-decoration: none;
	
	text-align: left;
}
td{
	background-color: #CCC;
}
table {
	background-color: #999999;
	
}
#id-left-h2{
	position: absolute;
	top: 30px;
}
body {
	margin: 0px;
	padding: 1px;
	background-color: #999999;
}
#left {
	background-color: #999999;
}
</style>
</head>
<body><div id="left">
<h3><center>宕机监控后台管理系统</center></h3>
<table border="0" width="100%" >
	<tr>
		<td><a href="main.php" target="w_right">查看已添加监控站点</a></td>
	</tr>
	<tr>
		<td><a href="cron-p.php" target="w_right">Cron监控介绍</a></td>
	</tr>
	<tr>
		<td><a href="addurl.php" target="w_right">添加Cron监控网站</a></td>
	</tr>
	<tr>
		<td><a href="../cron/check.php" target="w_right">即时检测网站宕机情况</a></td>
	</tr>
	<tr>
		<td><a href="diy-cron.php" target="w_right">Cron设置小工具</a></td>
	</tr>
	<tr>
		<td><a href="http://sae.sina.com.cn/?m=devcenter&catId=195" target="w_right">Cron服务介绍</a></td>
	</tr>
	<tr>
		<td><a href="set-sms.php" target="w_right">飞信帐号密码设置</a></td>
	</tr>
	<tr>
		<td><a href="set-mail.php" target="w_right">邮箱帐号密码设置</a></td>
	</tr>
	<tr>
		<td><a href="user-config.php" target="w_right">设置通知方式</a></td>
	</tr>
	<tr>
		<td><a href="change-pwd.php" target="w_right">修改后台密码</a></td>
	</tr>
	
	<tr>
		<td>以下为辅助功能</td>
	</tr>
	<tr>
		<td><a href="dnspod.php" target="w_right">DNSPod监控</a></td>
	</tr>
	<tr>
		<td><a href="webluker.php" target="w_right">Webluker监控</a></td>
	</tr>
	<tr>
		<td><a href="http://weibo.com/sdnugonghua" target="_blank">联系作者反馈问题</a></td>
	</tr>
	
	<tr>
		<td><a href="logout.php" target="w_right">安全退出</a></td>
	</tr>
</table>
</div>
</body>
</html>
