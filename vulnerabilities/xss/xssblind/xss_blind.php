<?php 
include_once '../../../inc/config.inc.php';
include_once '../../../inc/mysql.inc.php';
$link=connect();
$html='';
if(array_key_exists("content",$_POST) && $_POST['content']!=null){
    $content=escape($link, $_POST['content']);
    $name=escape($link, $_POST['name']);
    $time=$time=date('Y-m-d g:i:s');
    $query="insert into message_4(time,content,name) values('$time','$content','$name')";
    $result=execute($link, $query);
    if(mysqli_affected_rows($link)==1){
        $html.="<p>谢谢反馈，我们已经收到!</p>";
    }else {
        $html.="<p>ooo.提交出现异常，请重新提交</p>";
    }
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Stored XSS</title>
<link rel="stylesheet" type="text/css" href="../../../style/header.css"/>
<link rel="stylesheet" type="text/css" href="../../../style/xss.css"/>
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
<div id="login">
    <a href="blind_login.php">admin后台登录</a>
</div><br />
<div id="xss_blind">
    <p class="blindxss_tip">请在下面输入你对"锅盖头"这种发型的看法：</p>
    <form method="post">
        <textarea class="content" name="content"></textarea><br />
        <label>你的大名：</label><br />
        <input class="name" type="text" name="name"/><br />
        <input type="submit" name="submit" value="提交" />
    </form>
    <?php echo $html;?>
</div>

<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>
