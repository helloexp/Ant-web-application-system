<?php 
include_once '../../../inc/config.inc.php';
include_once '../../../inc/mysql.inc.php';
include_once '../../../inc/function.php';
$link=connect();
$is_login_id=check_sqli_login($link);

if(!$is_login_id){
    skip('你没有登录，请登录', 'post_login.php');
}
$html='';
if(isset($_POST['submit'])){
    if(empty($_POST['message'])){
        $html.="<p class='notice'>输入点啥吧！</p>";
    }else{
        if(strtolower($_POST['message'])=='kobe'){
            $html.="<p class='notice'>愿你和{$_POST['message']}一样，永远年轻，永远热血沸腾！</p><img src='../../../style/images/kobe.png' />";
        }else{
            $html.="<p class='notice'>who is {$_POST['message']},i don't care!</p>";
        }
    } 
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reflected XSS(post)</title>
<link rel="stylesheet" type="text/css" href="../../../style/header.css" />
<link rel="stylesheet" type="text/css" href="../../../style/xss.css" />
</head>
<body>
<div id="top">
    <h1 class="title">Ant Web Application System</h1>
    <a href="../../../index.php">回到首页</a>
</div>

<div id="xssr_main_post">
	<p class="xssr_title">Which NBA player do you like? | <a style="color:bule;" href="post_logout.php">退出登录</a></p>
    <form method="post">
    <input class="xssr_in" type="text" name="message" />
    <input class="xssr_submit" type="submit" name="submit" value="submit" />
    </form>
    <?php echo $html;?>
</div>
<div id="right_bar">
	<p class="tips">tips:<br />输入点不正经的代码，弹个框试试！(如果你也喜欢kobe,输入他的名字试试—_-)</p>
</div>
<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>

