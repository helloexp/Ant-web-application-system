<?php
include_once '../../../inc/config.inc.php';
include_once '../../../inc/mysql.inc.php';
include_once '../../../inc/function.php';
$link=connect();
if(!check_op2_login($link)){
    skip('您没有登录，不需要退出','overadmin.php');
}
session_unset();
session_destroy();
setcookie(session_name(),'',time()-3600,'/');
skip('退出成功', 'overadmin.php');
?>
