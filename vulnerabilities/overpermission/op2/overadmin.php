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
            if($data['level']==1){//如果级别是1，进入admin.php
                $_SESSION['op2']['username']=$username;
                $_SESSION['op2']['password']=sha1(md5($password));
                $_SESSION['op2']['level']=1;
                skip('登录成功，欢迎进入后台管理中心', 'op_admin.php');
            }
            if($data['level']==2){//如果级别是2，进入user.php
                $_SESSION['op2']['username']=$username;
                $_SESSION['op2']['password']=sha1(md5($password));
                $_SESSION['op2']['level']=2;
                skip('登录成功，欢迎进入后台管理中心', 'op_user.php');
            }
            
        }else{}//查询不到，登录失败
            skip('登录失败，请重试', 'overadmin.php');
        }
    
    } 
 

//只要退到这个界面就先清除登录状态，需要重新登录
session_unset();
session_destroy();
setcookie(session_name(),'',time()-3600,'/');

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
<div id="left_bar">
	<h2 class="left_title">Over permission</h2>
    <ul class="left_list">
    	<li><a href="../overpermission.php">越权漏洞概述</a></li>
        <li><a href="../op1/overadmin.php">Over permission</a></li>
        <li><a href="overadmin.php">Over permission+</a></li>
    </ul>
</div>

<div id="op_main">
	<p class="tips">测试账号1：admin/password</p>
	<p class="tips">测试账号2：user1/password</p>
    <p class="op_title">后台管理中心</p>
	<form class="op_form" method="post">
    	<label>用户名：<input class="username" name="username" type="text" /></label><br />
        <label>密&nbsp;&nbsp;&nbsp;码：<input class="passowrd" name="password" type="password" /></label><br />
        <label><input class="submit" name="submit" type="submit" value="Login" /></label>
    </form>
</div>

<div id="right_bar">
	<p class="tips">tips:<br />使用两个不同权限的账号登录看看，看是否可以通过小权限操作大权限账号的内容？</p>
</div>

<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>
