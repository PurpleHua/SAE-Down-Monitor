<?php 
	require_once 'isLogin.php';
	require_once '../cron/config.php';
	if(isset($_POST['callbackid']))
		$callback_dnspod_new=$_POST['callbackid'];
	if(""!=$callback_dnspod_new)
	{
		$mysql_new = new SaeMysql();
		$sql_sql="SELECT * FROM `dnspod` where 1 limit 10";
		$sql_data=$mysql_new->getData( $sql_sql );
		if(!empty($sql_data))
			$sql_new="UPDATE `dnspod` set callback ='$callback_dnspod_new' where 1";
		else
			$sql_new = "INSERT  INTO `dnspod`  (`callback`) VALUES ('$callback_dnspod_new')";
		$mysql_new->runSql( $sql_new );
			echo '<script language="javascript">alert("更新成功！");</script>';
			echo '<script language="javascript">window.location="dnspod.php"</script>';
		$mysql_new->closeDb();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DNSPod监控</title>
<style type="text/css">
body {
	background-color: #CCC;
}
</style>
</head>

<body>
<h2>DNSPod监控相关（此功能为辅助功能，方便集成化监控使用）</h2>
<h3>此回调地址也可以向用户设定飞信（或用户自定义代码使用SAE短信服务）的手机发送消息</h3>
<h3>监控回调URL地址为：<?php echo $_SERVER['HTTP_HOST']."/monitor/dnspod.php";?></h3>
<h4>更多相关内容和使用说明请参加<a href="https://www.dnspod.cn/support/index/fid/208">DNSPod官方网站</a></h4>
<form action="" method="post" target="_self"><table border="0">
	<tr>
		<td>DNSPod回调密钥设置</td>
		<td><input type="text" name="callbackid" /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="reset" value="重新填写" />&nbsp;<input type="submit" value="确认提交" /></td>
	</tr>
</table>
<?php 
	if(""==$dnspod_callback) 
		echo "您尚未设置回调密钥！";
	else
		echo '<h4>您需要填入DNSPod的格式为：<h3>callbackid='. $dnspod_callback .'</h3></h4>';
?>
</form>
</body>
</html>
