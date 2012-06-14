<?php
 class SendMSG
 {
 	
 	public function __construct($tel, $pwd,$msg) 
   	{
		$f = new SaeFetchurl();
		$content = $f->fetch("http://2.smsfx.sinaapp.com/monitorsend.php?tel=".$tel."&pwd=".$pwd."&text=".$msg."&aim=".$tel);
  	}
 
}