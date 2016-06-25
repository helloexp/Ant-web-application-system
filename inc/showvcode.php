<?php 
session_start();
include_once 'function.php';
$_SESSION['vcode']=vcode(100,40,30,4);
setcookie('bf[vcode]',$_SESSION['vcode']);
?>