<?php 
include_once '../../../inc/config.inc.php';
include_once '../../../inc/mysql.inc.php';
include_once '../../../inc/function.php';
$link=connect();

$is_login_id=check_sqli_login($link);
if(!$is_login_id){
    skip('你没有登录，请登录后在访问这里', 'http_header.php');
}
// $remoteipadd=escape($link, $_SERVER['REMOTE_ADDR']);
// $useragent=escape($link, $_SERVER['HTTP_USER_AGENT']);
// $httpaccept=escape($link, $_SERVER['HTTP_ACCEPT']);
// $httpreferer=escape($link, $_SERVER['HTTP_REFERER']);
$remoteipadd=$_SERVER['REMOTE_ADDR'];
$useragent=$_SERVER['HTTP_USER_AGENT'];
$httpaccept=$_SERVER['HTTP_ACCEPT'];
$remoteport=$_SERVER['REMOTE_PORT'];

//这里把http的头信息存到数据库里面去了，但是存进去之前没有进行转义，导致SQL注入漏洞
$query="insert httpinfo(userid,ipaddress,useragent,httpaccept,remoteport) values('$is_login_id','$remoteipadd','$useragent','$httpaccept','$remoteport')";
$result=execute($link, $query);
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

<?php 
$html=<<<A
<div id="http_main">
    <h1>朋友，你好，你的访问信息如下：<a href="http_logout.php">点击退出</a></h1>
    <p>你的ip地址:$remoteipadd</p>
    <p>你的user agent:$useragent</p>
    <p>你的http accept:$httpaccept</p>
    <p>你的端口（本次连接）:tcp$remoteport</p>
</div>
A;
echo $html;
?>


<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>
