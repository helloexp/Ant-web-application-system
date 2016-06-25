<?php 
include_once '../../../inc/config.inc.php';
include_once '../../../inc/mysql.inc.php';
include_once '../../../inc/function.php';
$link=connect();
$is_login_id=check_sqli_login($link);
if($is_login_id){
    skip('你已经登录，将直接进入会员中心', 'iu_mem.php');
}

if(isset($_POST['submit'])){
    if($_POST['username']!=null && $_POST['password']!=null){
        $username=escape($link, $_POST['username']);
        $password=escape($link, $_POST['password']);//转义，防注入
        $query="select * from uname where username='$username' and pw=md5('$password')";
        $result=execute($link, $query);
        if(mysqli_num_rows($result)==1){
            $data=mysqli_fetch_assoc($result);
            setcookie('ant[uname]',$_POST['username'],time()+36000);
            setcookie('ant[pw]',sha1(md5($_POST['password'])),time()+36000);
            //登录时，生成cookie,10个小时有效期，供其他页面判断
            skip('登录成功，欢迎进入个人中心', 'iu_mem.php');
        }else{
            skip('登录失败，请重试', 'iu_login.php');
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
<link rel="stylesheet" type="text/css" href="../../../style/sqli.css"/>
</head>

<body>
<div id="top">
    <h1 class="title">Ant Web Application System</h1>
    <a href="../../../index.php">回到首页</a>
</div>
<div id="left_bar">
	<h2 class="left_title">Sql Inject</h2>
    <ul class="left_list">
  		<li><a href="../sqlinject.php">Sql Inject（SQL注入）概述</a></li>
        <li><a href="../sqlinject_id.php">数字型注入(post)</a></li>
        <li><a href="../sqlinject_str.php">字符型注入(get)</a></li>
        <li><a href="../sqlinject_search.php">搜索型注入</a></li>
        <li><a href="../sqlinject_xxx.php">xxx型注入</a></li>
        <li><a href="iu_login.php">“insert/update”注入</a></li>
        <li><a href="../sqlinjectdel/sqli_del.php">“delete”注入</a></li>
        <li><a href="../sqlinjecthttp/http_header.php">http头注入</a></li>
        <li><a href="../sqlinject_blind_b.php">盲注（base on boolian）</a></li>
        <li><a href="../sqlinject_blind_t.php">盲注（base on time）</a></li>
    </ul>
</div>

<div id="idu_login_main">
	<p class="tips">如果你不想是lucy，你就自己注册一个账号 ！<a href="iu_register.php">点击注册</a></p>
    <p class="idu_title">用户登录</p>
	<form class="idu_form" method="post">
    	<label>用户名：<input class="username" name="username" type="text" /></label><br />
        <label>密&nbsp;&nbsp;&nbsp;码：<input class="passowrd" name="password" type="password" /></label><br />
        <label><input class="submit" name="submit" type="submit" value="Login" /></label>
    </form>
  
</div>

<div id="right_bar">
	<p class="tips">tips:<br />搞得定select，也得搞的定insert和update!<br />试试看！</p>
</div>

<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>
