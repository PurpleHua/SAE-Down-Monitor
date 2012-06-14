<?php
	//从数据库中取出帐号密码赋值给变量
        $mysql = new SaeMysql();      
        $sql = "SELECT * FROM `admin` where 1 LIMIT 10";
        $data = $mysql->getData( $sql );
        $mysql->closeDb();
		if(!empty($data))
		{
			$sql_uname=$data['0']['uname'];//用户名
			$sql_pwd=$data['0']['pwd'];//用户密码	
		}
            
		
 