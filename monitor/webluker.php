<?php

	require_once '../cron/config.php';
	require_once '../class/index.php';
	$date=$_GET['date'];
	$code=$_GET['code'];
	$resp_time=$_GET['resp_time'];
	$desc=$_GET['desc'];
	$sign=$_GET['sign'];
        $status=$_GET['status'];
	//此处为Webluker宕机代码
        $sms=new SendMSG($mobile,$password,$desc);
            if (0==$status)
            {
              $msg = $desc."【发生故障时间:".$date."当前网站访问延时为:".$resp_time."】";//此处可以自定义每一个错误的代码所代表的具体意义 定义的内容放入变量$msg 
              $sms=new SendMSG($mobile,$password,$msg);//发送手机飞信消息
            }
            else if(1==$status)
            {
                $msg = $desc."【恢复时间：".$date."当前网站访问延时为:".$resp_time."】";
                $sms=new SendMSG($mobile,$password,$msg);//发送手机飞信消息
            }
            else
            	$sms=new SendMSG($mobile,$password,$desc);//发送手机飞信消息     
	echo "OK-".$sign;