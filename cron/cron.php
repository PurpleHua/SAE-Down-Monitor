<?php 
	require_once 'config.php';
	require_once '../class/index.php';
	
	if(!empty($data))
		foreach ($data as $arry)
	        {
				$siteurl=$arry['url'];
				$id=$arry['id'];
				$sitename=$arry['name'];
	        	$f = new SaeFetchurl();
	    		$content = $f->fetch($siteurl);
	            $status=$f->errno();
	            if($status!=0)
	            {
					if($status>=500)//将5XX 6XX都看作出现故障，此处可以自定义修改
					{
						$msg="您的网站".$arry['name']."(".$siteurl.")"."出现故障！"."错误代码为：".$status;
					  
						//发送飞信
						if($isFSMS)
								$sms=new SendMSG($mobile,$password,$msg);
						//通过SAE发送短信
						if($isSMS)
						{
									$sms = apibus::init( "sms"); //创建短信服务对象
									$obj = $sms->send( $sms_num, $msg , "UTF-8");   
						}
						//发送邮件
						if($isEMAIL)
						{
							$mail = new SaeMail();
                                                   	$ret = $mail->quickSend( $sendto_email , '宕机监控报警' , $msg , $sendto_email ,$sendto_email_pwd ); 
							$mail->clean(); // 重用此对象
						}
						//写入数据库
						if($isTOSQL)
						{
							
							$to_sql=new SaeMysql();
							$sql="INSERT INTO `down_info` (`sitename`,`siteurl`,`msg`,`status`,`time`) VALUES ('$sitename','$siteurl','$msg','$status',NOW());";
							$to_sql->runSql($sql);
						if( $to_sql->errno() != 0 )
                                                {
                                                    die( "Error:" . $to_sql->errmsg() );
                                                }
							$to_sql->closeDB();
						}
					}
				}
                
                
        }
