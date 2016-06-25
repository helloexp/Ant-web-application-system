<?php
header("Content-type:text/html; charset=gbk");
$result='';
if(isset($_POST['submit']) && $_POST['ipaddress']!=null){
    $ip=$_POST['ipaddress'];
//     $check=explode('.', $ip);可以先拆分，然后校验数字以范围，第一位和第四位1-255，中间两位0-255
    if(stristr(php_uname('s'), 'windows')){
//         var_dump(php_uname('s'));
        $result.=shell_exec('ping '.$ip);//直接将变量拼接进来，没做处理
    }else {
        $result.=shell_exec('ping -c 4 '.$ip);
    }
    
}


?> 



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cross-Site Scripting</title>
<link rel="stylesheet" type="text/css" href="../../style/header.css"/>
<link rel="stylesheet" type="text/css" href="../../style/comminject.css"/>
</head>

<body>
<div id="top">
    <h1 class="title">Ant Web Application System</h1>
    <a href="../../index.php">Back to home</a>
</div>
<div id="left_bar">
	<h2 class="left_title">Sys-Command Inject</h2>
    <ul class="left_list">
    	<li><a href="comm_inject.php">Description of sys-comm inject</a></li>
        <li><a href="exec_ping.php">exec 'ping'</a></li>

    </ul>
</div>
<div id="comm_main">
<p class="comm_title">Here, please enter the target IP address!</p>
<form method="post">
<input class="ipadd" type="text" name="ipaddress" />
<input class="sub" type="submit" name="submit" value="ping" />
</form>
<pre class="result"><?php echo $result;?></pre>
</div>

<div id="right_bar">
	<p class="tips">tips:<br />"||" and ''&&'' is good friend .. </p>
</div>

<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>


