<?php
	$msg=$_GET['msg'];
	if($msg!="" && $_GET['e']==1)
	{

				$mysql_sms = new SaeMysql();
				$sql = "SELECT * FROM `user` LIMIT 10";
				$data_sms = $mysql_sms->getData( $sql );
				$sms_num=$data_sms['0']['sms'];
				if( $mysql_sms->errno() == 0 )
					{
						 $sms = apibus::init( "sms"); //创建短信服务对象
						 $obj = $sms->send( $sms_num, $msg , "UTF-8"); 
						 print_r($obj);	
						 /*
						 stdClass Object ( [status] => 短信提交成功 [sms] => stdClass Object ( [mobile] => 13395412101 [msg] => 还在bug吗 [encoding] => UTF-8 ) )
						 */	
						  //错误输出 Tips: 亲，如果调用失败是不收费的 
						/*if ( $sms->isError( $obj ) )
						 { 
						 print_r( $obj->ApiBusError->errcode ); 
						 print_r( $obj->ApiBusError->errdesc );
						}*/
					}
				 $mysql_sms->closeDb();				
	}
		
	