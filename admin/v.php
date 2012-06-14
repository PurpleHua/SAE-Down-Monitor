<?php
session_start();
$vcode = new SaeVCode();
if ($vcode === false)
        var_dump($vcode->errno(), $vcode->errmsg());
$_SESSION['vcode'] = $vcode->answer();
$question=$vcode->question();

 
