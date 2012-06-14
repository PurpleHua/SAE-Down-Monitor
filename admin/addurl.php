<?php 
	require_once 'isLogin.php';
	$arry_sitename=$_POST['sitename'];
	$arry_siteurl=$_POST['siteurl'];
	if(!empty($arry_sitename)&&!empty($arry_siteurl))
	{
		$mysql = new SaeMysql();
		$i=0;
		$errno=0;
		foreach ($arry_sitename as $tosql_sitename)
		{
			if(""==$tosql_sitename) break;
			$tosql_siteurl=$arry_siteurl[$i++];
			$sql = "INSERT  INTO `website` (  `name` , `url` ) VALUES ('$tosql_sitename','$tosql_siteurl') ";
			$mysql->runSql( $sql );
			$errno+=$mysql->errno();
		}
		if(0==$errno&&$mysql->errno()!="" )
		{
			echo '<script language="javascript">alert("网站添加成功！")</script>';
		}
		$mysql->closeDb();	
	}
	else if(!empty($arry_siteurl))
	{
		echo '<script language="javascript">alert("提交数据不合法或者为空请正确填写后再提交！")</script>';
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加监控</title>
<style type="text/css">
.main {
	background-color: #CCC;
}
.input-name {
	text-decoration: none;
	height: 20px;
	width: 180px;
}
body {
	background-color: #CCC;
}
.input-url{
	text-decoration: none;
	height: 20px;
	width: 250px;
}
table {
	padding-top: 100px;
	padding-bottom: 100px;
	padding-left: 20px;
}
.button-1 {
	height: 30px;
	width: 80px;
}
</style>
</head>

<body>
<div class="main">
<?php require_once 'main.php';?><br />
<br />
<br />
<h2>添加新的监控网站</h2>
<form action="" method="post" target="_self">
<table border="0">
	<tr>
		<td>站点名称</td>
		<td>站点URL（包含http://）</td>
	</tr>
	<tr>
		<td><input type="text" name="sitename[]" class="input-name"/></td>
		<td><input type="text" name="siteurl[]" value="http://" class="input-url"/></td>
	</tr>
	<tr>
		<td><input type="text" name="sitename[]" class="input-name"/></td>
		<td><input type="text" name="siteurl[]" value="http://" class="input-url"/></td>
	</tr>
	<tr>
		<td><input type="text" name="sitename[]" class="input-name"/></td>
		<td><input type="text" name="siteurl[]" value="http://" class="input-url"/></td>
	</tr>
	<tr>
		<td><input type="text" name="sitename[]" class="input-name"/></td>
		<td><input type="text" name="siteurl[]" value="http://" class="input-url"/></td>
	</tr>
	<tr>
		<td><input type="text" name="sitename[]" class="input-name"/></td>
		<td><input type="text" name="siteurl[]" value="http://" class="input-url"/></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="reset" class="button-1" value="重新填写" />&nbsp;&nbsp;<input class="button-1" type="submit" value="确认提交" /></td>
	</tr>
	
</table>
</form>
</div>
</body>
</html>
