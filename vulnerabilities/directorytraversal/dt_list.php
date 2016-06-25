
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cross-Site Scripting</title>
<link rel="stylesheet" type="text/css" href="../../style/header.css"/>
<link rel="stylesheet" type="text/css" href="../../style/dirtra.css"/>
</head>

<body>
<div id="top">
    <h1 class="title">Ant Web Application System</h1>
    <a href="../../index.php">回到首页</a>
</div>
<div id="left_bar">
    <h2 class="left_title">Directory traversal</h2>
    <ul class="left_list">
    <li><a href="directory_traversal.php">目录遍历漏洞概述</a></li>
    <li><a href="dt_list.php">../../etc/passwd</a></li>
    
    </ul>
</div>
<div id="dt_main">
<p class="dt_title">(1)it's time to get up!</p>
<a class="dt_title" href="dt_exec.php?title=jarheads.php">we're jarheads!</a>
<p class="dt_title">(2)it's time to say goodbye!</p>
<a class="dt_title" href="dt_exec.php?title=truman.php">Truman's word!</a>
</div>

<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>


