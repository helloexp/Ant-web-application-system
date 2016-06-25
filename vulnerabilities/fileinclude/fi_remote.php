<?php
$html1='';
if(!ini_get('allow_url_include')){
    $html1.="<p class='alarm'>warning:你的allow_url_include没有打开,请在php.ini中打开了再测试该漏洞,记得修改后,重启中间件服务!</p>";
}
$html2='';
if(!ini_get('allow_url_fopen')){
    $html2.="<p class='alarm'>warning:你的allow_url_fopen没有打开,请在php.ini中打开了再测试该漏洞,重启中间件服务!</p>";
}
$html3='';
if(phpversion()<='5.3.0' && !ini_get('magic_quotes_gpc')){
    $html3.="<p class='alarm'>warning:你的magic_quotes_gpc打开了,请在php.ini中关闭了再测试该漏洞,重启中间件服务!</p>";
}
//远程文件包含漏洞,需要php.ini的配置文件符合相关的配置


$html='';
if(isset($_GET['submit']) && $_GET['filename']!=null){
    $filename=$_GET['filename'];
    include "include/$filename";//变量传进来直接包含,没做任何的安全限制
    
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

<?php 
echo $html1;
echo $html2;
echo $html3;
echo $html;
?>
</div>
<div id="right_bar">
	<p class="tips">tips:<br />后台用了包含函数?可以包含其他的文件吗?远程站点上的文件呢?<br />试试看?</p>
</div>

<div id="bottom">
	<p class="bottom_info">Powered by hanlu | Email:317096829@qq.com</p>
</div>

</body>
</html>
