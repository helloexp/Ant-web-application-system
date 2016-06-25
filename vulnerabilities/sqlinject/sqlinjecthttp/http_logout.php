<?php 
include_once '../../../inc/config.inc.php';
include_once '../../../inc/mysql.inc.php';
include_once '../../../inc/function.php';
$link=connect();
$is_login_id=check_sqli_login($link);
if(!$is_login_id){
    skip('你还没有有登录，so...不需要退出', 'http_header.php');
}
setcookie('ant[uname]','',time()-3600);
setcookie('ant[pw]','',time()-3600);
skip('退出成功！', 'http_header.php');
?>