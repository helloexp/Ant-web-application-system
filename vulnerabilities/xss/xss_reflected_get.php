<?php 
$html='';
if(isset($_GET['submit'])){
    if(empty($_GET['message'])){
        $html.="<p class='notice'>输入点啥吧！</p>";
    }else{
        if($_GET['message']=='kobe'){
            $html.="<p class='notice'>愿你和{$_GET['message']}一样，永远年轻，永远热血沸腾！</p><img src='../../style/images/kobe.png' />";
        }else{
            $html.="<p class='notice'>who is {$_GET['message']},i don't care!</p>";
        }
    } 
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reflected XSS(get)</title>
<link rel="stylesheet" type="text/css" href="../../style/header.css"/>
<link rel="stylesheet" type="text/css" href="../../style/xss.css"/>
</head>
<body>
<div id="top">
    <h1 class="title">Ant Web Application System</h1>
    <a href="../../index.php">回到首页</a>
</div>
<div id="left_bar">
	<h2 class="left_title">Cross-Site Scripting</h2>
    <ul class="left_list">
    	<li><a href="xss.php">xss（跨站脚本）概述</a></li>
        <li><a href="xss_reflected_get.php">反射型XSS(get)</a></li>
        <li><a href="xsspost/post_login.php">反射型XSS(post)</a></li>
        <li><a href="xss_stored.php">存储型XSS</a></li>
        <li><a href="xss_dom.php">DOM型XSS</a></li>
        <li><a href="xssblind/xss_blind.php">XSS盲打</a></li>
        <li><a href="xss_challenge.php">xss+</a></li>
        <li><a href="xss_htmlspecialchars.php">xss++</a></li>
    </ul>
</div>

<div id="xssr_main">
	<p class="xssr_title">Which NBA player do you like?</p>
    <form method="get">
    <input class="xssr_in" type="text" maxlength="20" name="message" />
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

