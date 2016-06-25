<?php 
include_once 'inc/config.inc.php';
$html="";
if(!@mysqli_connect(DBHOST,DBUSER,DBPW,DBNAME)){
    $html=
    "<p >
        <a href='install.php' style='color:red;'>
        提示:Ant还没有初始化，点击进行初始化!
        </a>
    </p>";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ant Web Application system</title>
<link rel="stylesheet" type="text/css" href="style/index.css"/>
</head>
<body>
<div id="top">
	<div class="logo_title"><a href="introduce.php">Ant:Web漏洞练习系统</a></div>
    <p>“蚂蚁”是一个带有漏洞的web应用测试系统</p>
    <p>这里包含了常见的Web安全漏洞</p>
    <p>你可以使用它在测试环境里面进行常见漏洞的练习</p>
    <?php echo $html;?>
</div>

<div id="main">
    <p class="main_title">Vulnerability List：</p>
    <ul class="vul_list">
        <div class="vul_block">
            <li><a href="vulnerabilities/burtforce/burtforce.php">Burt force</a></li>
            <li><a href="vulnerabilities/xss/xss.php">Cross-Site Scripting</a></li>
            <li><a href="vulnerabilities/csrf/csrf.php">Cross-site request forgery</a></li>
            <li><a href="vulnerabilities/sqlinject/sqlinject.php">SQL-Inject</a></li>
            <li><a href="vulnerabilities/commandinject/comm_inject.php">Sys-Command-Inject</a></li>
            <li><a href="vulnerabilities/fileinclude/fileinclude.php">File Inclusion</a></li>
            <li><a href="vulnerabilities/unsafefiledown/download.php">Unsafe file downloads</a></li>
            <li><a href="vulnerabilities/unsafefileup/upload.php">Unsafe file uploads</a></li>
            <li><a href="vulnerabilities/overpermission/overpermission.php">Over permission</a></li>
            <li><a href="vulnerabilities/directorytraversal/directory_traversal.php">../../../</a></li>
            <li><a href="vulnerabilities/infoleak/infoleak.php">I can see your ABC</a></li>
            <li><a href="more.php">More...</a></li>
        </div>
    </ul>
</div>
<div id="bottom">
	<p class="bottom_info">Ant v1.0 | Powered by hanlu | Email:317096829@qq.com | <a href="introduce.php">系统简介</a></p>
</div>
</body>
</html>
