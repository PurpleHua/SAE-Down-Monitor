<?php require_once 'isLogin.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cron监控介绍</title>
<style type="text/css">
body {
	background-color: #CCC;
	margin: 0px;
	padding: 2px;
}
p {
	margin: 0px;
	padding: 0px;
	text-align: left;
	font-size: 18px;
}
#atten {
	font-size: 16px;
}
</style>
</head>

<body>

	<h2>Cron监控服务介绍</h2>
	<p>Cron服务是SAE平台的特有服务，Cron监控正式基于SAE-Cron服务的定时调度而生，通过配置config.yaml来执行。<br />由于SAE没有写入权限，代码部署只能依靠SVN和在线编辑器，所以后台无法直接修改config.yaml文件。</p><br />
	<h2>Cron监控网站宕机服务介绍</h2>
	<p>通过配置config.yaml文件实现定时执行特定页面文件。特定页面的地址为：<?php echo "http://".$_SERVER['HTTP_HOST']."/cron/cron.php";?>该页面通过定时访问被监控站点，根据站点返回的status判断服务器宕机情况。若服务器满足宕机条件，则向用户手机发送飞信消息（如果用户已经开通SAE短信服务，则可以改为短信通知）</p>
	<p>若写config.yaml有困难，可以使用官方提供的小工具<a href="diy-cron.php">Cron自动生成</a></p>
	<p id="atten">请注意：Cron作业只能调用应用默认版本的URL，其添加和删除都需要通过代码发布完成。</p>

</body>
</html>
