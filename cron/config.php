<?php
        $mysql = new SaeMysql();
        $sql = "SELECT * FROM `website` LIMIT 10";
        $data = $mysql->getData( $sql );
        $sql = "SELECT * FROM `user` where 1 LIMIT 10";
        $sms_login = $mysql->getData( $sql );
		$sql = "SELECT * FROM `dnspod` LIMIT 10";
        $callback_dnspod = $mysql->getData( $sql );
		$dnspod_callback=$callback_dnspod['0']['callback'];
		
       
		$mobile=$sms_login['0']['tel'];//飞信手机号
		$password=$sms_login['0']['pwd'];//飞信密码
		$sms_num=$sms_login['0']['sms'];//通过SAE要发送到的手机号码
		
		//获取配置信息 SAE-SMS fsms email tosql
		
		$config_sql="SELECT * FROM `config` WHERE 1 LIMIT 10";
		$config_data=$mysql->getData($config_sql);
		$sendto_info_sql="SELECT * FROM `user` WHERE 1 LIMIT 10";
		$sendto_info_data=$mysql->getData($sendto_info_sql);
		$sendto_email=$sendto_info_data['0']['email'];
		$sendto_email_pwd=$sendto_info_data['0']['epwd'];
//print_r($sendto_info_data);
		$mysql->closeDb();
		if(!empty($config_data))
		{
			$isSMS=$config_data['0']['sms'];
			$isFSMS=$config_data['0']['fsms'];
			$isEMAIL=$config_data['0']['email'];
			$isTOSQL=$config_data['0']['tosql'];
                  //print_r($config_data);
			
		}
		else
		{
			$isSMS=0;
			$isFSMS=0;
			$isEMAIL=0;
			$isTOSQL=0;
		}
		