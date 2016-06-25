<?php
include_once '../../../inc/config.inc.php';
include_once '../../../inc/mysql.inc.php';
include_once '../../../inc/function.php';
$link=connect();

$is_login_id=check_xss_login($link);
if(!$is_login_id){
    skip('没有登录，无权访问', 'blind_login.php');
}

if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id=escape($link, $_GET['id']);
    $query="delete from message_4 where id=$id";
    execute($link, $query);
 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cross-site request forgery</title>
<link rel="stylesheet" type="text/css" href="../../../style/header.css"/>
<link rel="stylesheet" type="text/css" href="../../../style/xss.css"/>
</head>
<body>
<div id="top">
    <h1 class="title">Ant Web Application System</h1>
    <a href="../../../index.php">回到首页</a>
</div>


<div id="logout">
<a href="blind_logout.php">退出登录</a>
</div>
<div id="list_blid_con">
<h1>用户反馈的意见列表：</h1>
<table>
    <tr>
        <td>编号</td>
        <td>时间</td>
        <td>内容</td>
        <td>姓名</td>
        <td>删除</td>
    </tr>
    <?php 
    $query="select * from message_4";
    $result=mysqli_query($link, $query);
    while($data=mysqli_fetch_assoc($result)){
$html=<<<A
    <tr>
        <td>{$data['id']}</td>
        <td>{$data['time']}</td>
        <td>{$data['content']}</td>
        <td>{$data['name']}</td>
        <td><a href="blind_admin.php?id={$data['id']}">删除</a></td>
    </tr>
A;
        echo $html;
    }
    
    ?>
    
</table>
</div>
</body>
</html>