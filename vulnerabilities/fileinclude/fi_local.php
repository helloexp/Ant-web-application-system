<?php
$html='';
if(isset($_GET['submit']) && $_GET['filename']!=null){
    $filename=$_GET['filename'];
    include "include/$filename";//变量传进来直接包含,没做任何的安全限制
//     //安全的写法,使用白名单，严格指定包含的文件名
//     if($filename=='file1.php' || $filename=='file2.php' || $filename=='file3.php' || $filename=='file4.php' || $filename=='file5.php'){
//         include "include/$filename";
        
//     }
}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cross-Site Scripting</title>
<link rel="stylesheet" type="text/css" href="../../style/header.css"/>
<link rel="stylesheet" type="text/css" href="../../style/fi.css"/>
</head>

<body>
<div id="top">
    <h1 class="title">Ant Web Application System</h1>
    <a href="../../index.php">回到首页</a>
</div>
<div id="left_bar">
	<h2 class="left_title">File Inclusion</h2>
    <ul class="left_list">
    	<li><a href="fileinclude.php">文件包含漏洞概述</a></li>
        <li><a href="fi_local.php">File Inclusion(local)</a></li>
        <li><a href="fi_remote.php">File Inclusion(remote)</a></li>

    </ul>
</div>

<div id=fi_main>
<p class="fi_title">which NBA player do you like?</p>
<form method="get">
     <select name="filename">
             <option value="">--------------</option>
             <option value="file1.php">Kobe bryant</option>
             <option value="file2.php">Allen Iverson</option>
             <option value="file3.php">Kevin Durant</option>
             <option value="file4.php">Tracy McGrady</option>
             <option value="file5.php">Ray Allen</option>
        </select>
        <input class="sub" type="submit" name="submit" />
</form>
<?php echo $html;?>
</div>

<div id="right_bar">
	<p class="tips">tips:<br />后台用了包含函数?可以包含其他的文件吗?<br />试试看?</p>
</div>

<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>
