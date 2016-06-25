<?php
include_once '../../../inc/config.inc.php';
include_once '../../../inc/mysql.inc.php';
include_once '../../../inc/function.php';
$link=connect();
// 判断是否登录，没有登录不能访问
if(!check_op2_login($link)){
    skip('你没有登录，无权管理中心，请登录', 'overadmin.php');
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cross-site request forgery</title>
<link rel="stylesheet" type="text/css" href="../../../style/header.css"/>
<link rel="stylesheet" type="text/css" href="../../../style/op.css"/>
</head>

<body>
<div id="top">
<h1 class="title">Ant Web Application System</h1>
<a href="../../../index.php">回到首页</a>
</div>

<div id="admin_left">
    <p class="left_title">用户管理</p>
    <ul>
        <li><a href="op_user.php">查看用户列表</a></li>
    </ul>
   
</div>

<div id="admin_main">
<p class="admin_title">欢迎来到后台管理中心 | <a style="color:bule;" href="op_logout.php">退出登录</a></p>
<table>
    <tr>
        <td>用户名</td>
        <td>性别</td>
        <td>手机号</td>
        <td>邮箱</td>
        <td>地址</td>
    </tr>
<?php 
   $query="select * from uname";
   $result=execute($link, $query);
   while ($data=mysqli_fetch_assoc($result)){
$html=<<<A
    <tr>
        <td>{$data['username']}</td>
        <td>{$data['sex']}</td>
        <td>{$data['phonenum']}</td>
        <td>{$data['email']}</td>
        <td>{$data['address']}</td>
    </tr>
A;
       
    echo $html;
   }
   
?>


</table>

</div>


<div id="bottom">
<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>
