<?php
include_once '../../../inc/config.inc.php';
include_once '../../../inc/mysql.inc.php';
include_once '../../../inc/function.php';
$link=connect();
// 判断是否登录，没有登录不能访问
if(!check_csrf_login($link)){
    skip('你没有登录，无权访问会员中心，请登录', 'csrf_login.php');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cross-site request forgery</title>
<link rel="stylesheet" type="text/css" href="../../../style/header.css"/>
<link rel="stylesheet" type="text/css" href="../../../style/csrf.css"/>
</head>

<body>
<div id="top">
<h1 class="title">Ant Web Application System</h1>
<a href="../../../index.php">回到首页</a>
</div>
<?php 
$username=$_SESSION['csrf']['username'];//通过当前session-name到数据库查询，并显示其对应信息
$query="select * from uname where username='$username'";
$result=execute($link, $query);
$data=mysqli_fetch_array($result, MYSQL_ASSOC);
$name=$data['username'];
$sex=$data['sex'];
$phonenum=$data['phonenum'];
$add=$data['address'];
$email=$data['email'];

$html=<<<A
<div id="per_info">
   <h1 class="per_title">hello,{$name},欢迎来到个人会员中心 | <a style="color:bule;" href="csrf_logout.php">退出登录</a></h1>
   <p class="per_name">姓名:{$name}</p>
   <p class="per_sex">性别:{$sex}</p>
   <p class="per_phone">手机号:{$phonenum}</p>    
   <p class="per_add">住址:{$add}</p> 
   <p class="per_email">邮箱地址:{$email}</p> 
   <a class="edit" href="csrf_mem_edit.php">修改个人信息</a>
</div>
A;
echo $html;
?>

<div id="bottom">
<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>
