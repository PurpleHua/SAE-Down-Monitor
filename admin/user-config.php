<?php
require_once '../cron/config.php';
$mysql = new SaeMysql();
$sql = "SELECT * FROM `user` LIMIT 10";
$data = $mysql->getData( $sql );
if(!empty($data))
{
	$sms=$data['0']['sms'];
	$email=$data['0']['email'];
}
else 
{
	$sms="";
	$email="";
}

if(isset($_POST['submit']))
{
	$isSMS=0;
	$isFSMS=0;
	$isEMAIL=0;
	$isTOSQL=0;
	$i=0;
	if(isset($_POST['check']))
	{
		$check=$_POST['check'];
		foreach ($check as $temp) {		
			if($temp=="sms")
				$isSMS=1;
			if($temp=="email")
				$isEMAIL=1;
			if($temp=="tosql")
				$isTOSQL=1;
			if($temp=="fsms")
				$isFSMS=1;
		}
	}
	if(isset($_POST['smsinput']))
		$config_form_smsnum=$_POST['smsinput'];
	if(isset($_POST['emailinput']))
		$config_form_emailaddress=$_POST['emailinput'];
	if($config_form_emailaddress!=$email)
	{
		$update_sql="UPDATE `user` SET email='$config_form_emailaddress' WHERE 1";
		$mysql->runSql($update_sql);
	}
	if($config_form_smsnum!=$sms)
	{
		$update_sql="UPDATE `user` SET sms='$config_form_smsnum' WHERE 1";
		$mysql->runSql($update_sql);
	}	
	$update_sql_final="UPDATE `config` SET sms='$isSMS',fsms='$isFSMS',email='$isEMAIL',tosql='$isTOSQL'";
	$mysql->runSql($update_sql_final);
	echo '<script language="javascript">window.location=""</script>';
}
$mysql->closeDb();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>设置通知方式</title>
<style type="text/css">
<!--
.td-text {
	height: 20px;
	width: 180px;
	text-align: left;
	vertical-align: middle;
}
.input-box {
	height: 20px;
	width: 200px;
}
table {
	margin: 0px;
	padding: 0px;
}
td {
	margin: 0px;
	padding: 0px;
}
.input-button {
	height: 25px;
	width: 70px;
}
body {
	background-color: #CCCCCC;
}
-->
</style>
</head>

<body>

<form action="" method="post" target="_self">
	<table  border="0" cellspacing="20px" cellpadding="10px">
  <tr>
    <td class="td-text"><input type="checkbox" name="check[]" <?php if($isSMS) echo " checked "?> value="sms"/>普通短信（收费）</td>
    <td><input type="text" maxlength="11" name="smsinput" class="input-box" value='<?php echo $sms;?>'/>&nbsp;&nbsp;请填入手机号码</td>
  </tr>
  <tr>
    <td class="td-text"><input type="checkbox" name="check[]"  <?php if($isEMAIL) echo " checked "?> value="email"/>电子邮件</td>
    <td><input type="text" name="emailinput" class="input-box" value='<?php echo $email;?>'/>&nbsp;&nbsp;请填入电子邮箱地址</td>
  </tr>
  <tr>
    <td class="td-text"><input type="checkbox" name="check[]" value="tosql"  <?php if($isTOSQL) echo " checked "?>/>是否写入数据库保存</td>
    <td><input type="checkbox" name="check[]" value="fsms"  <?php if($isFSMS) echo " checked "?> />飞信短信（免费）</td>
  </tr>
  <tr>
    <td class="td-text"></td>
    <td><input type="reset" value="重新填写" class="input-button" />&nbsp;&nbsp;<input type="submit" value="确认提交" name="submit" class="input-button"/></td>
  </tr>
</table>

</form>

</body>
</html>

	