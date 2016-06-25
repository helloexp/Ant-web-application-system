<?php 
include_once '../../inc/config.inc.php';
include_once '../../inc/mysql.inc.php';
include_once '../../inc/function.php';
$link=connect();

$html='';
if(isset($_POST['submit'])){
    if($_POST['username']!=null && $_POST['password']!=null){
        $username=escape($link, $_POST['username']);
        $password=escape($link, $_POST['password']);//转义，防注入
        $query="select * from uname where username='$username' and pw=md5('$password')";
        $result=execute($link, $query);
        if(mysqli_num_rows($result)==1){
            $data=mysqli_fetch_assoc($result);
            setcookie('ant[uname]',$_POST['username'],time()+36000);
            setcookie('ant[pw]',md5($_POST['password']),time()+36000);
            //登录时，生成cookie,10个小时有效期，供其他页面判断
            $html.="<p class='notice'>登录成功</p>";
        }else{
            $html.="<p class='notice'>噢噢,登录失败</p>";
        }
    }  
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cross-site request forgery</title>
<link rel="stylesheet" type="text/css" href="../../style/header.css"/>
<link rel="stylesheet" type="text/css" href="../../style/infoleak.css"/>
</head>

<body>
<div id="top">
    <h1 class="title">Ant Web Application System</h1>
    <a href="../../index.php">回到首页</a>
</div>
<div id="left_bar">
	<h2 class="left_title">i can see your ABC</h2>
    <ul class="left_list">
    	<li><a href="infoleak.php">敏感信息泄露概述</a></li>
        <li><a href="findabc.php">找找看</a></li>

    </ul>
</div>

<div id="infoleak_main">
    <p class="leak_title">用户登录</p>
	<form class="leak_form" method="post"><!--test user：lucy /111111 -->
    	<label>用户名：<input class="username" name="username" type="text" /></label><br />
        <label>密&nbsp;&nbsp;&nbsp;码：<input class="passowrd" name="password" type="password" /></label><br />
        <label><input class="submit" name="submit" type="submit" value="Login" /></label>
    </form>
    <?php 
    echo $html;
    ?>
</div>

<div id="right_bar">
	<p class="tips">tips:<br />找找看，看有没有啥发现！</p>
</div>

<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>
