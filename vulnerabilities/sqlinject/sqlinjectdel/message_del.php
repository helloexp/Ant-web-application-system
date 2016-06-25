<?php
include_once '../../../inc/config.inc.php';
include_once '../../../inc/mysql.inc.php';
include_once '../../../inc/function.php';
$link=connect();
// if(array_key_exists('id', $_GET) && is_numeric($_GET['id'])){
    if(array_key_exists('id', $_GET)){//没对传进来的id进行处理，导致DEL注入
    $query="delete from message_3 where id={$_GET['id']}";
    $result=execute($link, $query);
    if(mysqli_affected_rows($link)==1){
        skip("删除成功，正在往回跳转", 'sqli_del.php');
    }else{
        skip("删除失败，正在往回跳转", 'sqli_del.php');
    }
}
?>
