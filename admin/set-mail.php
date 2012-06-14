<?php 
	if(isset($_POST['submit'])&&isset($_POST['email'])&&isset($_POST['pwd']))
	{
		$post_email=$_POST['email'];
		$post_pwd=$_POST['pwd'];
		if($post_email==""||$post_pwd=="")
			echo '<script language="javascript">alert("请检查邮箱和密码是否填写完整！");</script>';
		else 
		{
			$mysql = new SaeMysql();
			$sql = "UPDATE `user` SET email='$post_email',epwd='$post_pwd'where 1";
			$mysql->runSql( $sql );
			if( $mysql->errno() == 0 )
			{
			    echo '<script language="javascript">alert("邮箱修改成功！");</script>';
			}
			else 
			{
				echo '<script language="javascript">alert("邮箱更新失败！");</script>';
			}
			$mysql->closeDb();
		}
	}
	 $mysql = new SaeMysql(); 
	 $sql='SELECT * FROM `user` where 1';
	 $data_tmp=$mysql->getData($sql);
	 $email_tmp=$data_tmp['0']['email'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>设置邮件地址</title>
<style type="text/css">
body {
	background-color: #CCC;
}
.input-button {
	height: 25px;
	width: 70px;
}
</style>
</head>

<body>
<form action="" method="post" target="_self">
<table border="0">
	<tr>
		<td>邮箱地址：</td>
		<td><input type="email" name="email" <?php if($email_tmp!="") echo "value=$email_tmp ";?> /></td>
	</tr>
	<tr>
		<td>邮箱密码：</td>
		<td><input type="password" name="pwd" /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="reset" value="重新填写" class="input-button"/>&nbsp;&nbsp;<input type="submit" value="确认提交" name="submit" class="input-button"/></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>请尽量使用126 163 gmail等SAE默认支持的邮箱</td>
	</tr>
</table>

</form>
</body>
</html>