<?php 
include_once '../../inc/config.inc.php';
include_once '../../inc/mysql.inc.php';
$link=connect();
//var_dump($_SESSION['vcode']);
//var_dump($_POST);
$html="";
if(isset($_POST['submit'])){
    if(empty($_POST['username'])){
        $html.="<p class='notice'>用户名不能为空</p>"; 
    }else {
        if(empty($_POST['password'])){
            $html.="<p class='notice'>密码不能为空</p>";
        }else {
            if(empty($_POST['vcode'])){
                $html.="<p class='notice'>验证码不能为空哦！</p>";
            }else {
                if(strtolower($_POST['vcode'])!=strtolower($_SESSION['vcode'])){
                    $html.="<p class='notice'>验证码输入错误哦！</p>";
            } 
        }
    }
    }
    $username=escape($link, $_POST['username']);
    $password=escape($link, $_POST['password']);
    $query="select * from uname where username='$username' and pw=md5('$password')";
    $result=execute($link, $query);
    //虽然做了是否为空的验证，但登录验证时后台并没有对验证码进行确认，仍然容易被暴力破解
        if(mysqli_num_rows($result)==1){
            $html.="<p class='notice'>$username,你好！</p>";
        }else{
            $html.="<p class='notice'>Login failed!</p>";
        }
     
    }
    //正确的写法：对账号密码验证的同时，对验证码也进行比较
//     if(mysqli_num_rows($result)==1 && strtolower($_POST['vcode'])==strtolower($_SESSION['vcode'])){
//         $html.="<p class='notice'>$username,你好！</p>";
//     }else{
//         $html.="<p class='notice'>Login failed!</p>";
//     }
   
// }

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Burt Force</title>
<link rel="stylesheet" type="text/css" href="../../style/header.css" />
<link rel="stylesheet" type="text/css" href="../../style/bf.css" />
</head>

<body>
<div id="top">
    <h1 class="title">Ant Web Application System</h1>
    <a href="../../index.php">回到首页</a>
</div>
<div id="left_bar">
	<h2 class="left_title">Burp Force</h2>
    <ul class="left_list">
    	<li><a href="burtforce.php">Burp Force（暴力破解）概述</a></li>
        <li><a href="bf_form.php">基于表单的暴力破解</a></li>
        <li><a href="bf_vcode_1.php">验证码绕过(on server)</a></li>
        <li><a href="bf_vcode_2.php">验证码绕过(on client)</a></li>
        <li><a href="bf_token.php">认证+token</a></li>
    </ul>

</div>
<div id="bf_main">
	<p class="tips">有验证码，还可以暴力破解么？</p>
    <p class="bf_title">用户登录</p>
	<form class="bf_form" method="post">
    	<label>用户名：<input class="username" name="username" type="text" /></label><br />
        <label>密&nbsp;&nbsp;&nbsp;码：<input class="passowrd" name="password" type="password" /></label><br />
        <label>验证码：<input class="vcode" name="vcode" placeholder="输入下面的验证码" type="text" /></label><br />
        <label><img src="../../inc/showvcode.php" onclick="this.src='../../inc/showvcode.php?'+new Date().getTime();" /></label><br />
        <label><input class="submit" name="submit" type="submit" value="Login" /></label>
    </form>
    <?php 
    echo $html;
    ?>
</div>
<div id="right_bar">
	<p class="tips">tips:<br />虽然有验证码，但是后台好像校验不是太严格<br />试试看！</p>
</div>
<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>