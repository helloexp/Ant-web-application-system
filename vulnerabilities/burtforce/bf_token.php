<?php 
include_once '../../inc/config.inc.php';
include_once '../../inc/mysql.inc.php';
include_once '../../inc/function.php';
$link=connect();


$html="";
if(isset($_POST['submit'])){
    //判断token

    if(isset($_POST['token']) && $_POST['token']==$_SESSION['token']){
        $username=escape($link, $_POST['username']);
        $password=escape($link, $_POST['password']);
        $query="select * from uname where username='$username' and pw=md5('$password')";
        $result=execute($link, $query);
        if(mysqli_num_rows($result)==1){//判断用户名密码
            $html.="<p class='notice'>$username,你好！</p>";
        }else {
            $html.="<p class='notice'>Login failed!</p>";
        }
    }
} 
//生成token
set_token();
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
	<p class="tips">好像每次提交,都会携带一串长长的字符,是啥,有用吗？</p>
    <p class="bf_title">用户登录</p>
	<form class="bf_form" method="post">
    	<label>用户名：<input class="username" name="username" type="text" /></label><br />
        <label>密&nbsp;&nbsp;&nbsp;码：<input class="passowrd" name="password" type="password" /></label><br />
        <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
        <label><input class="submit" name="submit" type="submit" value="Login" /></label>
    </form>
    <?php 
    echo $html;
    ?>
</div>
<div id="right_bar">
	<p class="tips">tips:<br />Token输出在客户端了,容易被获取，并不能防暴力破解哦</p>
</div>
<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>