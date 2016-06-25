<?php 
include_once '../../../inc/config.inc.php';
include_once '../../../inc/mysql.inc.php';
include_once '../../../inc/function.php';
$link=connect();

if(isset($_POST['submit'])){
    if($_POST['username']!=null && $_POST['password']!=null){
        $username=escape($link, $_POST['username']);
        $password=escape($link, $_POST['password']);//转义，防注入
        $query="select * from admin where username='$username' and pw=md5('$password')";
        $result=execute($link, $query);
        if(mysqli_num_rows($result)==1){
            $data=mysqli_fetch_assoc($result);
            setcookie('ant[uname]',$_POST['username'],time()+36000);
            setcookie('ant[pw]',sha1(md5($_POST['password'])),time()+36000);
            //登录时，生成cookie,10个小时有效期，供其他页面判断
            skip('登录成功，欢迎进入', 'blind_admin.php');
        }else{
            skip('登录失败，请重试', 'blind_login.php');
        }
    }  
}

setcookie('ant[uname]','',time()-3600);
setcookie('ant[pw]','',time()-3600);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cross-site request forgery</title>
<link rel="stylesheet" type="text/css" href="../../../style/header.css"/>
<link rel="stylesheet" type="text/css" href="../../../style/sqli.css"/>
</head>

<body>
<div id="top">
    <h1 class="title">Ant Web Application System</h1>
    <a href="../../../index.php">回到首页</a>
</div>

<div id="left_bar">
	<h2 class="left_title">Cross-Site Scripting</h2>
    <ul class="left_list">
    	<li><a href="../xss.php">xss（跨站脚本）概述</a></li>
        <li><a href="../xss_reflected_get.php">反射型XSS(get)</a></li>
        <li><a href="../xsspost/post_login.php">反射型XSS(post)</a></li>
        <li><a href="../xss_stored.php">存储型XSS</a></li>
        <li><a href="../xss_dom.php">DOM型XSS</a></li>
        <li><a href="xss_blind.php">XSS盲打</a></li>
        <li><a href="../xss_challenge.php">xss+</a></li>
        <li><a href="../xss_htmlspecialchars.php">xss++</a></li>
    </ul>
</div>

<div id="idu_login_main">
	<p class="tips">管理员账号：admin/password</p>
    <p class="idu_title">用户登录</p>
	<form class="idu_form" method="post">
    	<label>用户名：<input class="username" name="username" type="text" /></label><br />
        <label>密&nbsp;&nbsp;&nbsp;码：<input class="passowrd" name="password" type="password" /></label><br />
        <label><input class="submit" name="submit" type="submit" value="Login" /></label>
    </form>
  
</div>


<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>
