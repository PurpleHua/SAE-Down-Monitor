<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>初始化</title>
</head>

<body>
<?php 
$sql1='SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO"';
$sql2='
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(100) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `pwd` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;';

$sql3='CREATE TABLE IF NOT EXISTS `dnspod` (
  `callback` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;';

$sql4='
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(1) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `sms` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `epwd` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;';
$sql5='CREATE TABLE IF NOT EXISTS `website` (
  `siteid` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  PRIMARY KEY (`siteid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;';
$sql6='CREATE TABLE IF NOT EXISTS `config` (
  `sms` int(1) NOT NULL,
  `fsms` int(1) NOT NULL,
  `email` int(1) NOT NULL,
  `tosql` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;';
$sql_1='CREATE TABLE IF NOT EXISTS `down_info` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `sitename` varchar(1000) NOT NULL,
  `siteurl` varchar(1000) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `status` varchar(1000) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;';
$mysql = new SaeMysql();
$mysql->runSql($sql1);
$mysql->runSql($sql2);
$mysql->runSql($sql3);
$mysql->runSql($sql4);
$mysql->runSql($sql5);
$mysql->runSql($sql6);
$mysql->runSql($sql_1);
$pwd_init=md5('admin');
$sql = "SELECT * FROM `admin` LIMIT 10";
$data = $mysql->getData($sql);
print_r($data);
if(!empty($data))
{
	echo '<script language="javascript">alert("已经初始化，请勿重新初始化！为安全起见，请删除服务器的该文件！");window.location="../index.php"</script>;';
}
else
{
	$sql7='INSERT INTO `config` (`sms`, `fsms`, `email`, `tosql`) VALUES (0, 0, 0, 0);';
	$sql8="INSERT INTO `user` (`id`, `tel`, `pwd`, `sms`, `email`, `epwd`) VALUES (0, '', '0', '', '', '0');";
	$sql="INSERT INTO `admin` (`uname`,`pwd`) VALUES ('admin','$pwd_init')";
	$mysql->runSql($sql7);
	$mysql->runSql($sql8);
	$mysql->runSql( $sql );
	if( 0==($mysql->errno()))
	{
		echo '<script language="javascript">alert("初始化成功！");window.location="../admin/index.php"</script>';
	}
	else
	{
		echo '<script language="javascript">alert("初始化失败！");window.location="../admin/index.php"</script>';
	}
}
	$mysql->closeDb();
?>
</body>
</html>
