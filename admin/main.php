<?php require_once 'isLogin.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加监控网站</title>
<style type="text/css">
#td-id
{
	width: 50px;
	background-color: #FFF;
}
a {
	color: #003;
	text-decoration: none;
	background-color: #FFF;
}
#td-name{
	width:100px;
	background-color: #FFF;
}
#td-url{
	width: 300px;
	text-align: left;
	background-color: #FFF;
}
body {
	background-color: #CCC;
	margin: 0px;
	padding: 2px;
}
</style>
</head>

<body>
<h2>Cron已有监控网站列表</h2>
<table >
<tr>
	<td id="td-id">ID</td>
	<td id="td-name">名称</td>
	<td id="td-url">URL</td>
</tr>
<?php 
	$mysql = new SaeMysql();
    $sql = "SELECT * FROM `website` LIMIT 10";
    $data = $mysql->getData( $sql );
	if(!empty($data))
	foreach ($data as $arry)
	{
		echo '<tr>';
		echo '<td id="td-id">'.$arry['siteid'].'</td>';
		echo '<td id="td-name">'.$arry['name'].'</td>';
		echo '<td id="td-url"><a href="'.$arry['url'].'">'.$arry['url'].'</a></td>';
		echo '</tr>';
	}
?>
</table>

</body>
</html>
