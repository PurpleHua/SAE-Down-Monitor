<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>手动检测</title>
<style type="text/css">
body {
	background-color: #CCC;
}
</style>
</head>

<body><center>
<table border="0">
<?php 
	require_once 'config.php';
	require_once '../class/index.php';
	if(!empty($data))
	foreach ($data as $arry)
        {
        	$f = new SaeFetchurl();
    		$content = $f->fetch($arry['url']);
                $num=$f->errno();
                	if($num>=500)
                        {
                        	$msg="您的网站".$arry['name']."(".$arry['url'].")"."服务器故障"."返回代码为：".$num;
							echo "<tr><td>";
                          	echo $msg;//手工检测
							echo "</td></tr>";     
                        }      
	}
	else
	{
		echo '<script language="javascript">alert("您还没有添加网站，请先添加网站！");window.location="../admin/addurl.php"</script>';
	}
?>
</table></center>
</body>
</html>

