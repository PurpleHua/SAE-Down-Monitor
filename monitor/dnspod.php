<?php
	$back=$_GET['callbackid'];
	require_once '../cron/config.php';
	require_once '../class/index.php';
	//以下为DNSPod返回的宕机代码
        $callback_key = $dnspod_callback; // 添加监控时设置的密钥
        $monitor_id = $_POST['monitor_id']; // 监控编号
        $domain_id = $_POST['domain_id']; // 域名编号
        $domain = $_POST['domain']; // 域名名称
        $record_id = $_POST['record_id']; // 记录编号
        $sub_domain = $_POST['sub_domain']; // 主机名称
        $record_line = $_POST['record_line']; // 记录线路
        $ip = $_POST['ip']; // 记录IP
        $status = $_POST['status']; // 当前状态
        $status_code = $_POST['status_code']; // 状态代码
        $reason = $_POST['reason']; // 宕机原因
        $created_at = $_POST['created_at']; // 发生时间
        $checksum = $_POST['checksum']; // 校检代码
        
        if (md5($monitor_id. $domain_id. $record_id. $callback_key. $created_at) != $checksum) {
            echo 'BAD REQUEST';
        } else {
            if ($status == 'Warn' || $status == 'Ok') {
                $msg="您的网站".$domain."在".$created_at."恢复正常!";
                $sms=new SendMSG($mobile,$password,$msg);//发送手机飞信消息
                echo $msg;
          } elseif ($status == 'Down') {
              $msg="您的网站".$domain."(".$sun_domain.")"."在".$created_at."宕机"."宕机原因为：".$reason."【记录线路：".$record_line."状态代码为:".$status_code."】";//这里可以添加您自己的宕机返回相关信息
              $sms=new SendMSG($mobile,$password,$msg);//发送手机飞信消息  
              echo $msg;
          }
       }
 	echo 'DONE';