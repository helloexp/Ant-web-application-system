<?php 
include_once '../../inc/config.inc.php';
include_once '../../inc/mysql.inc.php';
$link=connect();
$html='';
if(array_key_exists("message",$_POST) && $_POST['message']!=null){
    $message=escape($link, $_POST['message']);
    $query="insert into message_1(content,time) values('$message',now())";
    $result=execute($link, $query);
    if(mysqli_affected_rows($link)!=1){
        $html.="<p>出现异常，提交失败！</p>";
    }
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Stored XSS</title>
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

<div id="xsss_main">
	<p class="xsss_title">我是一个留言板：</p>
    <form method="post">
    <textarea class="xsss_in" name="message"></textarea><br />
    <input class="xsss_submit" type="submit" name="submit" value="submit" />
    </form>
    <div id="show_message">
    	<p class="line">留言列表：</p>
        <?php echo $html;
        $query="select * from message_1";
        $result=execute($link, $query);
        while($data=mysqli_fetch_assoc($result)){
            echo "<p class='con'>{$data['content']}</p><a href='../../inc/notice/message1_del.php?id={$data['id']}'>删除</a>";       
        }
        ?>
    </div>
</div>

<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>
