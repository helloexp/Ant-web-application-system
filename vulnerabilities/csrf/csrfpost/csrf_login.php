<?php 
include_once '../../../inc/config.inc.php';
include_once '../../../inc/mysql.inc.php';
include_once '../../../inc/function.php';
$link=connect();

//判断是是否登录，如果已经登录，点击时，直接进入会员中心
if(check_csrf_login($link)){
    skip('你已登录，请直接进入会员中心', 'csrf_mem.php'); 
}
if(isset($_POST['submit'])){
    if($_POST['username']!=null && $_POST['password']!=null){
        $username=escape($link, $_POST['username']);
        $password=escape($link, $_POST['password']);//转义，防注入
        $query="select * from uname where username='$username' and pw=md5('$password')";
        $result=execute($link, $query);
        if(mysqli_num_rows($result)==1){
            $data=mysqli_fetch_assoc($result);
            $_SESSION['csrf']['username']=$username;
            $_SESSION['csrf']['password']=sha1(md5($password));
            skip('登录成功，欢迎进入个人中心', 'csrf_mem.php');
        }else{
            skip('登录失败，请重试', 'csrf_login.php');
        }
    
    } 
    
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
<div id="left_bar">
	<h2 class="left_title">Cross-site request forgery</h2>
    <ul class="left_list">
    	<li><a href="../csrf.php">CSRF(跨站请求伪造)概述</a></li>
        <li><a href="../csrfget/csrf_login.php">CSRF(get)</a></li>
        <li><a href="csrf_login.php">CSRF(post)</a></li>
        <li><a href="../csrftoken/csrf_login.php">CSRF(token)</a></li>
    </ul>
</div>

<div id="csrf_main">
	<p class="tips">这个时候你是lucy,你有一个lucy的账号：lucy/111111</p>
    <p class="csrf_title">用户登录</p>
	<form class="csrf_form" method="post">
    	<label>用户名：<input class="username" name="username" type="text" /></label><br />
        <label>密&nbsp;&nbsp;&nbsp;码：<input class="passowrd" name="password" type="password" /></label><br />
        <label><input class="submit" name="submit" type="submit" value="Login" /></label>
    </form>
</div>

<div id="right_bar">
	<p class="tips">tips:<br />这里只是将表单以post形式发送了,如何利用？<br />试试看！</p>
</div>

<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>
